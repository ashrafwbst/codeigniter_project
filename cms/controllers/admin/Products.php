<?php
error_reporting(0);
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
        $search_arr = "";
        if($this->input->get('search')){
            $search_arr.= ' 1=1 ';
            if($this->input->get('search')){
                $search_arr.= " AND product_name LIKE '%".$this->input->get('search', TRUE)."%' OR email LIKE '%".$this->input->get('search', TRUE)."%'";
            }
        }
        // Pages variable
        // $result_per_page = 20;
        $total_row = $this->Cms_model->countData('products');
        // $num_link = 10;
        // $base_url = $this->Cms_model->base_link(). '/admin/products/';
        // // Pageination config
        // $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link);     
        ($this->uri->segment(3))? $pagination = $this->uri->segment(3) : $pagination = 0;
        //Get users from database
        $products=$this->Cms_admin_model->getIndexData('products', '', '', 'id', 'asc','','','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
        //print('<pre>');print_r($products); die;
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
        // $this->form_validation->set_rules('product_price', $this->lang->line('product_price'), 'required');
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
             $subcategories=$this->db->get_where('product_subcategory')->result_array();
             $this->template->setSub('subcategories', $subcategories);  
            $products = $this->Cms_admin_model->getProduct($this->uri->segment(4));
            $extra_images=$this->Cms_admin_model->getProdExtraimg($products['id']);
            //echo '<pre>';print_r($extra_images);die;
            if($products !== FALSE){
                $this->template->setSub('products', $products);
                $this->template->setSub('extra_images', $extra_images);
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
        // $this->form_validation->set_rules('product_price', $this->lang->line('product_price'), 'required');
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
                redirect('/admin/product/edit/'.$this->uri->segment(4), 'refresh');
            }
        }

    }

    public function deleteProduct(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        admin_helper::is_allowchk('delete');
        if($this->uri->segment(4)){
                //Delete the user account
                $this->Cms_admin_model->removeProduct($this->uri->segment(4));
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
               redirect($this->cms_referrer->getIndex(), 'refresh');
           
        }
        //Return to user list
    }
  //-----------------category------------------------------

    public function categories(){
        $result_per_page = 20;
        $total_row = $this->Cms_model->countData('product_category');
        $total_row1 =  $total_row-1;
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/categories/';
        $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link);     
        ($this->uri->segment(3))? $pagination = $this->uri->segment(3) : $pagination = 0;
        //Get users from database


        $categories=$this->Cms_admin_model->productCategoies();
        //print_r($products); die;
        $this->template->setSub('categories', $categories);        
        $this->template->setSub('total_row', $total_row1);       
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
                $data = array(
                'category_name' => $this->input->post('category_name', TRUE),
                'created_at'    => date('Y-m-d')
                );
                $this->Cms_admin_model->createProductCategory($data);
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect('/admin/product/categories', 'refresh');

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
            admin_helper::is_logged_in($this->session->userdata('admin_email'));
            admin_helper::is_allowchk('admin users');
            admin_helper::is_allowchk('save');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', $this->lang->line('category_name'), 'required');
            if ($this->form_validation->run() == FALSE) {
              $this->editCategory();
            } else {
                
                $this->Cms_admin_model->updateProductCategory($this->uri->segment(4));
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect('/admin/products/categories', 'refresh');

           }
    }

    public function deletecategory(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        admin_helper::is_allowchk('delete');
        if($this->uri->segment(4)){
                $this->Cms_admin_model->removeProductCat($this->uri->segment(4));
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
           
        }
        //Return to user list
        redirect('/admin/products/categories', 'refresh');
    }
    //--------------end category------------------------------
    //--------------------sub category------------------------

  public function subcategories(){

        $result_per_page = 20;
        $total_row = $this->Cms_model->countData('product_subcategory');
        $total_row1 =  $total_row-1;
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/categories/';
        $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link);     
        ($this->uri->segment(3))? $pagination = $this->uri->segment(3) : $pagination = 0;
        //Get users from database
        $categories=$this->Cms_admin_model->productsubCategoies();
        //print_r($products); die;
        $this->template->setSub('categories', $categories);        
        $this->template->setSub('total_row', $total_row1);       
        //Load the view
        $this->template->loadSub('admin/subcategories_index');

    }
 public function getsubcategories(){

     $id= $_POST['id'];
     $subcat=$this->db->get_where('product_subcategory',array('category_id'=>$id))->result_array();

    if($subcat){
    foreach($subcat as $row){
        $rowid=$row['id'];   $rowname=$row['category_name'];
     echo  '<option value="'.$rowid.'">'.$rowname.'</option>';
     }
    }else{  
     echo  '<option value="0">No Category</option>';
     }
    die;
    }
         public function addsubCategory(){
            admin_helper::is_logged_in($this->session->userdata('admin_email'));
            admin_helper::is_allowchk('admin users');
             $subcategories=$this->Cms_admin_model->get_prod_subcategories();
             $this->template->setSub('subcategories', $subcategories);
            //Load the form helper
            $this->load->helper('form');
            //Load the view
            $this->template->loadSub('admin/subcategory_add');
         }

         public function savesubCategory(){
            admin_helper::is_logged_in($this->session->userdata('admin_email'));
            admin_helper::is_allowchk('admin users');
            admin_helper::is_allowchk('save');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', $this->lang->line('category_name'), 'required');
            if ($this->form_validation->run() == FALSE) {
              $this->addCategory();
            } else {
                $data = array(
                'category_name' => $this->input->post('category_name', TRUE),
                'created_at'    => date('Y-m-d')
                );
                $this->Cms_admin_model->createProductsubCategory($data);
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect('/admin/product/subcategories', 'refresh');

           }
         }

         public function editsubCategory(){
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
            $categories = $this->Cms_admin_model->getProdsubCategory($this->uri->segment(4));
            //print_r($categories);die;
            if($categories !== FALSE){
                 $subcategories=$this->Cms_admin_model->get_prod_subcategories();
             $this->template->setSub('subcategories', $subcategories);
                $this->template->setSub('categories', $categories);
                //Load the view
                $this->template->loadSub('admin/subcategory_edit');
            }else{
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        }else{
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function updatesubcategory(){
            admin_helper::is_logged_in($this->session->userdata('admin_email'));
            admin_helper::is_allowchk('admin users');
            admin_helper::is_allowchk('save');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category_name', $this->lang->line('category_name'), 'required');
            if ($this->form_validation->run() == FALSE) {
              $this->editCategory();
            } else {
                
                $this->Cms_admin_model->updateProductsubCategory($this->uri->segment(4));
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect('/admin/products/subcategories', 'refresh');

           }
    }

    public function deletesubcategory(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        admin_helper::is_allowchk('delete');
        if($this->uri->segment(4)){
                $this->Cms_admin_model->removeProductsubCat($this->uri->segment(4));
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
           
        }
        //Return to user list
        redirect('/admin/products/subcategories', 'refresh');
    }
    //----------------end sub category------------------------------

    public function storevisitDetail(){
        $this->load->helper('form');
        $message= "<br><b>Name</b>: ".$_POST['name']."<br><b>Eamil</b>: ".$_POST['email']."<br><b>Contact details</b>: ".$_POST['contact_num']."<br><b>Message</b>: ".$_POST['message'];
        $webconfig = $this->Cms_admin_model->load_config();
        $from_name = $webconfig->site_name;
        $from_email = $webconfig->default_email;
        $to_email = $webconfig->default_email;
        $message_html = $this->Cms_model->getLabelLang('email_dear') . $to_email . ',<br><br>';
        $message_html.= $message;
        $message_html.= '<br><br>' . $this->Cms_model->getLabelLang('email_footer') . ' <br><a href="' . $this->Cms_model->base_link(). '" target="_blank"><b>' . $webconfig->site_name . '</b></a>';
        @$this->Cms_model->sendEmail($to_email, 'Store Visit Enquiry', $message_html, $from_email, $from_name, '', 'no-reply@' . EMAIL_DOMAIN);
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
                redirect('products', 'refresh');
        //print_r($_POST);die;
      }


    public function AddExtraImage(){
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
       $this->Cms_admin_model->addExtraImg();
       $this->db->cache_delete_all();
       $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
       redirect('/admin/products', 'refresh');
        
    }

     public function deleteImage(){
     	admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('admin users');
        admin_helper::is_allowchk('delete');
        if($this->uri->segment(4)){
                $this->Cms_admin_model->removeProductImg($this->uri->segment(4));
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
           
        }
        //Return to user list
        redirect('/admin/products', 'refresh');

    }

}