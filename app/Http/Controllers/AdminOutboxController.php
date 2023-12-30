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
			$this->form[] = ['label'=>'Type','name'=>'type','type'=>'select2','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Text;Button;Image;Video;PDF'];
			$this->form[] = ['label'=>'Number','name'=>'number','type'=>'multitext','validation'=>'required|min:1','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Text','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Url File','name'=>'url_file','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Button','name'=>'buttonText','type'=>'custom','width'=>'col-sm-10','html'=>'<div id="inputContainer"></div>        <button id="add" type="button"  class="btn btn-primary"><i class="fa fa-plus-circle">ADD</i></button>'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Device','name'=>'id_device','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'device,name','help'=>'Will show conneted device','datatable_where'=>'status="AUTHENTICATED"'];
			//$this->form[] = ['label'=>'Type','name'=>'type','type'=>'select2','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Text;Button;Image;Video;PDF'];
			//$this->form[] = ['label'=>'Number','name'=>'number','type'=>'text','validation'=>'required|numeric|min:1','width'=>'col-sm-10','help'=>'The receiver phone number in format: [Country Code Without + Sign][Phone Number]. Example: 628231xxxxxx.'];
			//$this->form[] = ['label'=>'Text','name'=>'text','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Url File','name'=>'url_file','type'=>'upload','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Button','name'=>'buttonText','type'=>'custom','width'=>'col-sm-10','html'=>'<div id="inputContainer"></div>        <button id="add" type="button"  class="btn btn-primary"><i class="fa fa-plus-circle">ADD</i></button>'];
			# OLD END FORM

			$this->sub_module = array();
	        $this->addaction = array();
	        $this->button_selected = array();
	        $this->alert        = array();
	        $this->index_button = array();
	        $this->table_row_color = array();     	          
	        $this->index_statistic = array();
	        $this->script_js = "$(document).ready(function() {
				$('#form-group-buttonText').hide();
				$('#form-group-url_file').hide();

				$('#type').change(function() {
					var selectedValue = $(this).val();
					if (selectedValue === 'Button') {
						$('#form-group-buttonText').show();
						$('#form-group-url_file').hide();
					}
					else if (selectedValue === 'Image' || selectedValue === 'Video' || selectedValue === 'PDF') {
						$('#form-group-buttonText').hide();
						$('#form-group-url_file').show();

					}
					else {
						$('#form-group-buttonText').hide();
						$('#form-group-url_file').hide();
					}
				});
				var inputCount = 0;
	
				$('#add').click(function() {
					inputCount++;
					var inputHtml = '<div class=\"form-group header-group-0 \">';
					inputHtml += '<label for=\"inputText' + inputCount + '\" class=\"control-label col-sm-2\">Input Text ' + inputCount + ':</label>';
					inputHtml += '<div class=\"col-sm-5\"><input type=\"text\" class=\"form-control\" id=\"inputText' + inputCount + '\" name=\"buttonText[]\" class=\"form-control\">';
					inputHtml += '</div></div>';
	
					$('#inputContainer').append(inputHtml);
				});
			});";
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
			$number = explode("|", $postdata['number']);
	//		echo $this->formatNumber($number);
		//	echo count($number);
			
		//	dd($number);

			$device = DB::table('device')->select('name')->where('id',$postdata['id_device'])->first();
			// echo "tipe pesan ".$postdata['type'];
			// Text;Image;Video;PDF
			// send text
			if($postdata['type'] == "Text"){
				$body = ['text'=>$postdata['text']];
			}
			else if($postdata['type'] == "Button"){
				// send a buttons message!
				$x = 1;
				foreach ($postdata['buttonText'] as $q) {
					$button['buttonId'] = "id".$x;
					$button['buttonText'] = ['displayText' => $q];
					$button['type'] = 1; 
					$buttons[] = $button;
					$x++;
				}
				$buttonMessage = [
					'text' => $postdata['text'],
					'footer' => 'saiful.coder@gmail.com',
					'buttons' => $buttons,
					'headerType' => 1
				];
				$body = $buttonMessage;
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
			// convert to array
			$number = explode("|", $postdata['number']);
			// dd($number);
			// dd($postdata);
			foreach ($number as $q) {
				$format_number = $this->formatNumber($q);
				$data[] = [
					'jid' => $format_number.'@s.whatsapp.net',
					'type' => 'number',
					'delay' => 5000,
					'message' => $body
				];
			}

			// cek bulk number
			if(count($number) ==1){
				// single number
				$format_number = $this->formatNumber($number[0]);
				$response = Http::withHeaders([
					'Content-Type' => 'application/json'
				  ])->post(env('URL_WA_SERVER').'/'.$device->name.'/messages/send', 
					[
					'jid' => $format_number.'@s.whatsapp.net',
					'type' => 'number',
					'message' => $body
					]
				);
			}else{
				// bulk number
			$response = Http::withHeaders([
				'Content-Type' => 'application/json'					
				])->post(env('URL_WA_SERVER').'/'.$device->name.'/messages/send/bulk', $data
					);					 			
			}
		
			$res = json_decode($response->getBody());
			$status = $res->error ? $res->error : $res->status;
			unset($postdata['buttonText']);

			// dd($res);

			$postdata['status'] = $status;
	    }
		public function formatNumber($number)
		{
		if ($number[0] == "0" || $number[0] == "8") {
			$format_number = env('REGIONAL').substr($number, 1);
		}
		else{
			$format_number = $number;
		}
			return $format_number;
			# code...
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