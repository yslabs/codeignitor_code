<?php

//Deny Direct Access
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * organizations controller
 */
class Organizations extends MY_Controller {
    
    private $data = array();
    
    public function __construct(){
        
        //calling parent's constructor 
        parent::__construct();
        
    }
    
    /**
     * function to create an organization
     */
    public function create_organization() {
       
        /**
         * Validation of Form
         */
        if($this->form_validation->run('create_org') == FALSE)
        {
            //Field validation failed.  Redirected to create organization page
             $this->load->view('admin/header',$this->data);
             $this->load->view('organization/create_organization');
             $this->load->view('footer');
        } 
        else 
        {
            //capturing data
            $data=array(
                'owner_id'=>$owner_id,
                'org_name'=>$this->input->post('org_name'),
                'org_phone'=>$this->input->post('org_phone'),
                'fax_number'=>$this->input->post('org_fax'),
                'membership_status'=>0,
                'org_status'=>1,
                'created_by'=>$this->data['login_id'],
                'created_on'=>date('Y-m-d H:i:s')
            );
            
            //setting field values
            $this->organization_model->set_data($data);
            
            //creating organization
            $org_id=$this->organization_model->create_organization;
            
            //loading registration success page
            if($org_id) {
                $this->load->view('admin/header',$this->data);
                $this->load->view('organization/success');
                $this->load->view('footer',$this->data);
            }
        }  
    }
    
    
    
    /**
     * function to view organization
     */
    public function view_organization() {
        
        $organization_list=$this->organization_model->get_organization();
        
        $this->load->view('view_organization',$organization_list);
    }
    
    
    /**
     * function to perform pagination
     * @param int $total_row
     * @return int
     */
    public function pagination($total_row)
    {
        //setting config array for pagination
        $config = array(
                'base_url'=> base_url() . "index.php/organizations/view_organization",
                'total_rows' => $total_row,
                'per_page' => 10,
                'use_page_numbers'=>FALSE,
                'num_links'=> 1,
                'cur_tag_open'=> '&nbsp;<a class="disabled">',
                'cur_tag_close'=> '</a>',
                'next_link'=> '<span aria-hidden="true">&raquo;</span>',
                'prev_link'=> '<span aria-hidden="true">&laquo;</span> '
                );
        
        //initailizing pagination
        $this->pagination->initialize($config);
        
        //checking the url segement
        if($this->uri->segment(4)){
            $page = ($this->uri->segment(4)) ;
        } else {
            $page =0;
        }
        
        $page_info=array('offset'=>$page,'limit'=>$config['per_page']);
        return $page_info;
    }
    
}
    
