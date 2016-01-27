<?php


class Organization_model extends Crud_model
{
    const DB_TABLE='organizations';
    const DB_TBL_PK='id';

   
    /**
     * constructor function
     */
    public function __construct()
    {
        parent::__construct();
    }
   
    /**
     * function to create test
     */
    public function create_organization(){
        
        $this->insert_data();
    }
    
    /**
     * function to view organization
     */
    public function view_organization(){
        
        $this->select_data();
    }

}
 