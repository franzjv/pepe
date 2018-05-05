<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class User_Model
 * @description Model to manage the user table
 */
class User_model extends  CI_Model{
    
    function __construct(){
        parent::__construct();

    }

    public function get_user_by($column, $value){
        $this->db->where($column, $value);
        $result = $this->db->get('user')->result();
        if(count($result) > 0){
            return $result[0];
        }else{
            return false;
        }
    }

    public function insert_new($data){
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

}
