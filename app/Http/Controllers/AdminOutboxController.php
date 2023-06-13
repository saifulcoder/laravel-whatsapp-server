<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Illuminate\Support\Facades\Http;


	class AdminOutboxController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = false;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "outbox";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Number","name"=>"number"];
			$this->col[] = ["label"=>"Text","name"=>"text"];
			$this->col[] = ["label"=>"Device","name"=>"id_device","join"=>"device,name"];
			$this->col[] = ["label"=>"Type","name"=>"type"];
			$this->col[] = ["label"=>"Url File","name"=>"url_file"];
			$this->col[] = ["label"=>"Time","name"=>"created_at"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Device','name'=>'id_device','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'device,name','help'=>'Will show conneted device','datatable_where'=>'status="AUTHENTICATED"'];
			$this->form[] = ['label'=>'Type','name'=>'type','type'=>'select2','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Text;Image;Video;PDF'];
			$this->form[] = ['label'=>'Number','name'=>'number','type'=>'text','validation'=>'required|numeric|min:1','width'=>'col-sm-10','help'=>'The receiver phone number in format: [Country Code Without + Sign][Phone Number]. Example: 628231xxxxxx.'];
			$this->form[] = ['label'=>'Text','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Url File','name'=>'url_file','type'=>'upload','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Device','name'=>'id_device','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'device,name','help'=>'Will show conneted device','datatable_where'=>'status="AUTHENTICATED"'];
			//$this->form[] = ['label'=>'Type','name'=>'type','type'=>'select2','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Number','name'=>'number','type'=>'text','validation'=>'required|numeric|min:1','width'=>'col-sm-10','help'=>'The receiver phone number in format: [Country Code Without + Sign][Phone Number]. Example: 628231xxxxxx.'];
			//$this->form[] = ['label'=>'Text','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Url File','name'=>'url_file','type'=>'upload','width'=>'col-sm-10'];
			# OLD END FORM

			$this->sub_module = array();
	        $this->addaction = array();
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
	    public function actionButtonSelected($id_selected,$button_name) {
	            
	    }
	    public function hook_query_index(&$query) {
	            
	    }
	    public function hook_row_index($column_index,&$column_value) {	        
	    }
	    public function hook_before_add(&$postdata) { 

			$number = $postdata['number'];
			if ($number[0] == "0" || $number[0] == "8") {
				$format_number = env('REGIONAL').substr($postdata['number'], 1);
			}else{
				$format_number = $postdata['number'];
			}

			$device = DB::table('device')->select('name')->where('id',$postdata['id_device'])->first();
			// echo "tipe pesan ".$postdata['type'];
			// Text;Image;Video;PDF
			// send text
			// dd($postdata);
			if($postdata['type'] == "Text"){
				$body = ['text'=>$postdata['text']];
			}
			else if($postdata['type'] == "Image" ){
				$body = [
					'image'=>['url'=>url($postdata['url_file'])],
					'caption'=>$postdata['text'] 
				];
			}
			else if($postdata['type'] == "Video" ){
				$body = [
					'video'=>['url'=>url($postdata['url_file'])],
					'caption'=>$postdata['text'] 
				];
			}
			else if($postdata['type'] == "PDF" ){
				$body = [
					'document'=>['url'=>url($postdata['url_file'])],
					'mimetype' => 'application/pdf',
					'fileName' => 'document.pdf'
				];
			}

			
			$response = Http::withHeaders([
				'Content-Type' => 'application/json'
			  ])->post(env('URL_WA_SERVER').'/'.$device->name.'/messages/send', 
				[
				'jid' => $format_number.'@s.whatsapp.net',
				'type' => 'number',
				'message' => $body
				]
			);
				
			// dd($response->getBody());
			$res = json_decode($response->getBody());
			// dd($res);
			$postdata['status'] = $res->status;
	    }
	    public function hook_after_add($id) {        

	    }
	    public function hook_before_edit(&$postdata,$id) {        

	    }
	    public function hook_after_edit($id) {

	    }
	    public function hook_before_delete($id) {

	    }
	    public function hook_after_delete($id) {

	    }


	}