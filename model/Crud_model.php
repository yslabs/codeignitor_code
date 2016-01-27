<?php

/**
 * Main Crud Model
 */
class Crud_model extends CI_Model{
    
    /**
     * table name
     */
    const DB_TABLE='abstract';
    
    /**
     * table primary key
     */
    const DB_TBL_PK='abstract';
    
    
    public $data =array();
    
    /**
     * constructor function
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * function to insert data
     */
    public function insert_data()
    {

        $this->db->insert($this::DB_TABLE,$this->data);
    }
    
    /**
     * function to update data
     */
    public function update_data()
    {
       $this->db->replace($this::DB_TABLE, $this, $this::DB_TBL_PK);
    }
   
    /**
     * function to delete
     */
    public function delete_data()
    {
       $this->db->delete($this::DB_TABLE,$this::DB_TBL_PK);
    }
    
    /**
     * setting field values
     * @param array $data
     */
    public function set_data($data)
    {    
        $this->data=$data;
    }
    
    /**
     * function for selecting data from table with a given condition
     */
    public function select_data()
    {    
        $query= $this->db->get_where($this::DB_TABLE);
        $result=$query->result();
        if($result){
            return $result;
        } else {
            return false;
        }
    }
  
}