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
			$this->button_edit = true;
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
			$this->col[] = ["label"=>"Status","name"=>"status",'callback_php'=>'($row->status==1)?"<span class=\"badge bg-green\">Sent</span>":"<span class=\"badge bg-red\">Failed</span>"'];
			$this->col[] = ["label"=>"Time","name"=>"created_at"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Number','name'=>'number','type'=>'text','validation'=>'required|numeric|min:1','width'=>'col-sm-10','help'=>'The receiver phone number in format: [Country Code Without + Sign][Phone Number]. Example: 628231xxxxxx.'];
			$this->form[] = ['label'=>'Text','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Device','name'=>'id_device','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'device,name','help'=>'Will show conneted device','datatable_where'=>'status="connected"'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Number','name'=>'number','type'=>'text','validation'=>'required|numeric|min:1','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Text','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Device','name'=>'id_device','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'device,name','help'=>'Will show conneted device','datatable_where'=>'status="connected"'];
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

			$getnumber = substr($postdata['number'], 1);
			$regional = 62;
			if($getnumber == 0 || $getnumber == 8 ){
				$format_number = $regional.substr($postdata['number'], 1);
			}else{
				$format_number = $postdata['number'];
			}

			$device = DB::table('device')->select('name')->where('id',$postdata['id_device'])->first();
			$response = Http::post(env('URL_WA_SERVER').'/chat/send?id='.$device->name, [
				'receiver' => $format_number,
				'message' => $postdata['text']]);
			$res = json_decode($response->getBody());
			$postdata['status'] = $res->success;
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