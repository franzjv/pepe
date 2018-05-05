<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		echo 'test';
	}

	public function sync_users(){
		$this->load->model('user_model', '', true);
		$csv = $this->config->item('users_doc_url');
		$row = 0;
		if (($handle = fopen($csv, "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	if($row == 0){
		    		//
		    	}else{
		    		$user = $this->user_model->get_user_by('code', $data[CODE_INDEX]);
		    		if(!$user){
		    			$this->user_model->insert_new(array(
		    				'code'=> $data[CODE_INDEX],
		    				'password' => $data[PWD_INDEX]
		    				));
		    			echo '<br> inserted: '.$data[CODE_INDEX];
		    		}
		    	}
		        $row++;
		    }
		}
	}


}
