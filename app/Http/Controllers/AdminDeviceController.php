<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Illuminate\Support\Facades\Http;


	class AdminDeviceController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {
	    	# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->table 			   = "device";	        
			$this->title_field         = "name";
			$this->limit               = 20;
			$this->orderby             = "id,desc";
			$this->show_numbering      = FALSE;
			$this->global_privilege    = FALSE;	        
			$this->button_table_action = TRUE;   
			$this->button_action_style = "button_icon";     
			$this->button_add          = TRUE;
			$this->button_delete       = TRUE;
			$this->button_edit         = TRUE;
			$this->button_detail       = TRUE;
			$this->button_show         = TRUE;
			$this->button_filter       = TRUE;        
			$this->button_export       = FALSE;	        
			$this->button_import       = FALSE;
			$this->button_bulk_action  = TRUE;	
			$this->sidebar_mode		   = "normal"; //normal,mini,collapse,collapse-mini
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Users","name"=>"id_users","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Number","name"=>"number"];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			$this->col[] = ["label"=>"Description","name"=>"description"];
			$this->col[] = ["label"=>"Status","name"=>"status",'callback_php'=>'($row->status=="AUTHENTICATED")?"<span class=\"badge bg-green\">AUTHENTICATED</span>":"<span class=\"badge bg-red\">Disconnected</span>"'];
			# END COLUMNS DO NOT REMOVE THIS LINE
			
			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Number','name'=>'number','type'=>'number','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Description','name'=>'description','type'=>'text','validation'=>'max:255','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			# END FORM DO NOT REMOVE THIS LINE

	        $this->sub_module = array();
	        $this->addaction = array();
			$this->addaction[] = ['label' => 'Scan', 'icon' => 'fa fa-qrcode', 'color' => 'success', 'url' => CRUDBooster::mainpath('scan/[id]'),'showIf'=>'[status] <> "AUTHENTICATED"'];
	        $this->addaction[] = ['label' => 'Disconnect', 'icon' => 'fa fa-times', 'color' => 'danger', 'url' => CRUDBooster::mainpath('disconnect/[id]'), 'confirmation' => true,'showIf'=>'[status] == "AUTHENTICATED"'];
			$this->button_selected = array();
	        $this->alert        = array();
	        $this->index_button = array();
	        $this->table_row_color = array();     	          
	        $this->index_statistic = array();
	        $this->script_js = NULL;
	        $this->pre_index_html = null;
	        $this->post_index_html = null;
	        $this->load_js = array();
	        $this->style_css = NULL;
	        $this->load_css = array();
	        
	        
	    }
		public function Scan($id)
		{
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			  }
			// ambil sessionid
			$device = DB::table('device')->select('name')->where('id', $id)->first();
			// cek device ready?
			$find = Http::get(env('URL_WA_SERVER').'/sessions/'.$device->name.'/status');
			$cek = json_decode($find->getBody());
			// dd($cek);
			if($cek->status == "AUTHENTICATED"){
				$image = asset('image/connect.gif');
				DB::table('device')->where('id', $id)->update(['status' => $cek->status ,'updated_at' => now()]);
				return redirect()->back()->with('success', 'AUTHENTICATED');   
				
			}
			else{
				DB::table('device')->where('id', $id)->update(['status' => $cek->status,'updated_at' => now()]);

				
				// add session
				$response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['sessionId' => $device->name]);
				$res = json_decode($response->getBody());

				// dd($res);
				if($res->error == "Session already exists"){
					//delete session if already exist
					$hapus = Http::delete(env('URL_WA_SERVER').'/sessions/'.$device->name);
					$res = json_decode($hapus->getBody());
					
					$newsessionID = $device->name . rand(10,100);
					sleep(1);
					// request qr ulang 
					$response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['sessionId' => $newsessionID]);
					$res = json_decode($response->getBody());

					// update db device name
					DB::table('device')->where('id', $id)->update(['name' => $newsessionID]);
					// dd($res);
				}
				$image = $res->qr;

			}
			// dd($image);

			$data = [];
			$data['page_title'] = 'Scan Device';
			$data['result'] = $image;
			$data['script_js'] = 'setTimeout(function(){window.location.reload(1);}, 20000);';
			
			//Please use view method instead view method from laravel
			return $this->view('device.scan',$data);
		}
		public function disconnect($id)
		{
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			  }
			  $device = DB::table('device')->select('name')->where('id', $id)->first();

			$response = Http::delete(env('URL_WA_SERVER').'/sessions/'.$device->name);
			return CRUDBooster::redirect(CRUDBooster::mainPath(),$response ,"success");

		}
	    public function actionButtonSelected($id_selected,$button_name) {
	            
	    }
	    public function hook_query_index(&$query) {
	            $getdata = DB::table('device')->select('name')->get();
				// dd($getdata);
				foreach ($getdata as $cek){
					// dd($cek->name);
					//  dd(env('URL_WA_SERVER').'/sessions/find/'.$cek->name);
					$find = Http::get(env('URL_WA_SERVER').'/sessions/'.$cek->name.'/status');
					// dd($find->getBody());
					$getres = json_decode($find->getBody());
					// dd($getres->status);
						$status = $getres->status;
						// dd($status);
						DB::table('device')->where('name', $cek->name)->update(['status' => $status,'updated_at' => now()]);
				}
	    }
	    public function hook_row_index($column_index,&$column_value) {	        
	    }
	    public function hook_before_add(&$postdata) {        
			$postdata['id_users'] = Session('admin_id');

	    }
	    public function hook_after_add($id) {        


	    }
	    public function hook_before_edit(&$postdata,$id) {        

	    }
	    public function hook_after_edit($id) {

	    }
	    public function hook_before_delete($id) {
			$d = DB::table('device')->select('name')->where('id',$id)->first();
			Http::delete(env('URL_WA_SERVER').'/sessions/delete/'.$d->name);

	    }
	    public function hook_after_delete($id) {


	    }


	}