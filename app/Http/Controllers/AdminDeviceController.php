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
			$this->col[] = ["label"=>"Status","name"=>"status",'callback_php'=>'($row->status=="connected")?"<span class=\"badge bg-green\">Connected</span>":"<span class=\"badge bg-red\">Disconnected</span>"'];
			# END COLUMNS DO NOT REMOVE THIS LINE
			
			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Number','name'=>'number','type'=>'number','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Description','name'=>'description','type'=>'text','validation'=>'max:255','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			$this->form[] = ['label'=>'Multi Device','name'=>'multidevice','type'=>'select2','validation'=>'required','width'=>'col-sm-10','dataenum'=>'YES;NO'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form[] = ["label"=>"Users","name"=>"id_users","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"users,name"];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"You can only enter the letter only"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			# OLD END FORM
	        $this->sub_module = array();
	        $this->addaction = array();
			$this->addaction[] = ['label' => 'Scan', 'icon' => 'fa fa-qrcode', 'color' => 'success', 'url' => CRUDBooster::mainpath('scan/[name]'),'showIf'=>'[status] <> "connected"'];
	        $this->addaction[] = ['label' => 'Disconnect', 'icon' => 'fa fa-times', 'color' => 'danger', 'url' => CRUDBooster::mainpath('disconnect/[name]'), 'confirmation' => true,'showIf'=>'[status] == "connected"'];
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
		public function Scan($name)
		{
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			  }
			$find = Http::get(env('URL_WA_SERVER').'/session/find/'.$name);
			$cek = json_decode($find->getBody());
			// dd($cek)
			if($cek->message == "Session found."){
				$image = asset('image/connect.gif');
				DB::table('device')->where('name', $name)->update(['status' => 'connected','updated_at' => now()]);
				
			}
			else{
				DB::table('device')->where('name', $name)->update(['status' => 'disconnected','updated_at' => now()]);

				$cekMD = DB::table('device')->select('multidevice')->where('name',$name)->first();
				if($cekMD->multidevice == "YES"){
					$islegacy = "false"; 
				}else{
					$islegacy = "true"; 
				}
				$response = Http::post(env('URL_WA_SERVER').'/session/add', ['id' => $name, 'isLegacy' => $islegacy]);
				$res = json_decode($response->getBody());
				$image = $res->data->qr;
			}

			$data = [];
			$data['page_title'] = 'Scan Device';
			$data['result'] = $image;
			$data['script_js'] = 'setTimeout(function(){window.location.reload(1);}, 20000);';
			
			//Please use view method instead view method from laravel
			return $this->view('device.scan',$data);
		}
		public function disconnect($name)
		{
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			  }
			// $res = Http::delete(env('URL_WA_SERVER').'/session/delete/'.$name);
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => env('URL_WA_SERVER').'/session/delete/'.$name,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return CRUDBooster::redirect(CRUDBooster::mainPath(),$response ,"success");

		}
	    public function actionButtonSelected($id_selected,$button_name) {
	            
	    }
	    public function hook_query_index(&$query) {
	            $getdata = DB::table('device')->select('name')->get();
				// dd($getdata);
				foreach ($getdata as $cek){
					$find = Http::get(env('URL_WA_SERVER').'/session/find/'.$cek->name);
					$getres = json_decode($find->getBody());
					// dd($getres->success);
						if($getres->message == "Session found."){
							$status= "connected";
						}
						else if($getres->message == "Session not found.")
						{
							$status= "disconnected";
						}
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
			Http::delete(env('URL_WA_SERVER').'/session/delete/'.$d->name);

	    }
	    public function hook_after_delete($id) {


	    }


	}