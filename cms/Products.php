<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->lang->load('admin', $this->Cms_admin_model->getLang());
        $this->template->set_template('admin');
        $this->_init();
    }

    public function _init() {
        $this->template->set('core_css', $this->Cms_admin_model->coreCss());
        $this->template->set('core_js', $this->Cms_admin_model->coreJs());
        $this->template->set('title', 'Backend System | ' . $this->Cms_admin_model->load_config()->site_name);
        $this->template->set('meta_tags', $this->Cms_admin_model->coreMetatags('Backend System for CMS'));
        $this->template->set('cur_page', $this->Cms_admin_model->getCurPages());
    }

    public function index(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        $this->load->library('pagination');
        $this->db->cache_on();
        $this->cms_referrer->setIndex();
        $search_arr = " user_type = 'admin' ";
        if($this->input->get('search')){
            $search_arr.= ' 1=1 ';
            if($this->input->get('search')){
                $search_arr.= " AND name LIKE '%".$this->input->get('search', TRUE)."%' OR email LIKE '%".$this->input->get('search', TRUE)."%'";
            }
        }
        // Pages variable
        $result_per_page = 20;
        $total_row = $this->Cms_model->countData('products');
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/products/';
        // Pageination config
        $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link);     
        ($this->uri->segment(3))? $pagination = $this->uri->segment(3) : $pagination = 0;
        //Get users from database
        $products=$this->Cms_admin_model->getIndexData('products', $result_per_page, $pagination, 'id', 'asc','','','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
        //print_r($products); die;
        $this->template->setSub('products', $products);        
        $this->template->setSub('total_row', $total_row);       
        //Load the view
        $this->template->loadSub('admin/products_index');
    }
      
      public function addProduct(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        //Load the form helper
        $this->load->helper('form');
        $this->template->setSub('categories', $this->Cms_admin_model->get_prod_categories());
        //Load the view
        $this->template->loadSub('admin/product_add');
      }

      public function storeProduct() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('product_name', $this->lang->line('product_new_name'), 'required');
        $this->form_validation->set_rules('product_category', $this->lang->line('product_category'), 'required');
        $this->form_validation->set_rules('product_price', $this->lang->line('product_price'), 'required');
        $this->form_validation->set_message('required', $this->lang->line('required'));

        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            //echo '<pre>';print_r($_POST);die;
            $this->session->set_flashdata('error', validation_errors());

            redirect('/admin/addproduct');
        } else {
            //Validation passed
            //Add the user
            $this->Cms_admin_model->createProduct();
            $this->db->cache_delete_all();
            //Return to user list
            $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
            redirect('/admin/products', 'refresh');
        }
    }

    public function editProduct(){
        //echo "string"; die;
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        if($this->Cms_auth_model->is_group_allowed('admin users', 'backend') === FALSE && $this->session->userdata('user_admin_id') != $this->uri->segment(4)){
            redirect('/admin/users', 'refresh');
        }
        //Load the form helper
        $this->load->helper('form');
        if($this->uri->segment(4)){
            $this->db->cache_on();
            //Get user details from database
            $products = $this->Cms_admin_model->getProduct($this->uri->segment(4));
            //print_r($products);die;
            if($products !== FALSE){
                $this->template->setSub('products', $products);
                $this->template->setSub('categories', $this->Cms_admin_model->get_prod_categories());
                //Load the view
                $this->template->loadSub('admin/product_edit');
            }else{
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        }else{
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function updateProduct(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('product_name', $this->lang->line('product_new_name'), 'required');
        $this->form_validation->set_rules('product_category', $this->lang->line('product_category'), 'required');
        $this->form_validation->set_rules('product_price', $this->lang->line('product_price'), 'required');
        $this->form_validation->set_message('is_unique', $this->lang->line('is_unique'));
        $this->form_validation->set_message('required', $this->lang->line('required'));

        if ($this->form_validation->run() == FALSE) {
            //echo '<pre>';print_r($_POST);die;
            $this->editProduct();
        } else {
            $rs = $this->Cms_admin_model->updateProduct($this->uri->segment(4));
            if($rs !== FALSE){
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        }

    }

    public function categories(){
        $result_per_page = 20;
        $total_row = $this->Cms_model->countData('products');
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/categories/';
        $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link);     
        ($this->uri->segment(3))? $pagination = $this->uri->segment(3) : $pagination = 0;
        //Get users from database
        $categories=$this->Cms_admin_model->getIndexData('product_category', $result_per_page, $pagination, 'id', 'asc');
        //print_r($products); die;
        $this->template->setSub('categories', $categories);        
        $this->template->setSub('total_row', $total_row);       
        //Load the view
        $this->template->loadSub('admin/categories_index');

    }

         public function addCategory(){
            admin_helper::is_logged_in($this->session->userdata('admin_email'));
            admin_helper::is_allowchk('admin users');
            //Load the form helper
            $this->load->helper('form');
            //Load the view
            $this->template->loadSub('admin/category_add');
         }

         public function saveCategory(){
            admin_helper::is_logged_in($this->session->userdata('admin_email'));
            admin_helper::is_allowchk('admin users');
            admin_helper::is_allowchk('save');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', $this->lang->line('category_name'), 'required');
            if ($this->form_validation->run() == FALSE) {
              $this->addCategory();
            } else {
               
                $this->Cms_admin_model->createProductCategory();
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect('/admin/products/categories', 'refresh');

           }
         }

         public function editCategory(){
       // echo "string"; die;
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        if($this->Cms_auth_model->is_group_allowed('admin users', 'backend') === FALSE && $this->session->userdata('user_admin_id') != $this->uri->segment(4)){
            redirect('/admin/users', 'refresh');
        }
        //Load the form helper
        $this->load->helper('form');
        if($this->uri->segment(4)){
            $this->db->cache_on();
            //Get user details from database
            $categories = $this->Cms_admin_model->getProdCategory($this->uri->segment(4));
            //print_r($categories);die;
            if($categories !== FALSE){
                $this->template->setSub('categories', $categories);
                //Load the view
                $this->template->loadSub('admin/category_edit');
            }else{
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        }else{
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function updatecategory(){
        echo "string"; die;
    }

    
}