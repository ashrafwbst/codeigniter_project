<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->database();
        $row = $this->Cms_model->load_config();
        if($row->maintenance_active){
            //Return to home page
            redirect('./', 'refresh');
            exit;
        }
        if ($row->themes_config) {
            $this->template->set_template($row->themes_config);
        }
        if (!$this->session->userdata('fronlang_iso')) {
            $this->Cms_model->setSiteLang();
        }
        if ($this->Cms_model->chkLangAlive($this->session->userdata('fronlang_iso')) == 0) {
            $this->session->unset_userdata('fronlang_iso');
            $this->Cms_model->setSiteLang();
        }
         // load Pagination library
        $this->load->library('pagination');
         
        // load URL helper
        $this->load->helper('url');
        $this->_init();
        
    }
     public function _init() {
        $this->template->set('core_css', $this->Cms_model->coreCss());
        $this->template->set('core_js', $this->Cms_model->coreJs());
        $row = $this->Cms_model->load_config();
        $pageURL = $this->Cms_model->getCurPages();
        $this->template->set('additional_js', $row->additional_js);
        $this->template->set('additional_metatag', $row->additional_metatag);
        $this->template->set('additional_css', $row->additional_css);
        $title = 'Product | ' . $row->site_name;
        $this->template->set('title', $title);
        $this->template->set('meta_tags', $this->Cms_model->coreMetatags($title, $row->keywords, $title));
        $this->template->set('cur_page', $pageURL);
    }

      public function index(){

        $limit = 9;
        $pge = $this->uri->segment(2);
        if ($pge) {
            $offset = ($pge-1)*$limit;
        }else {
            $offset=0;
        }

        if (isset($_GET['ctgry']) && !empty($_GET['ctgry'])) {
            $products=$this->Cms_admin_model->getIndexData('products', '', '', 'id', 'asc',['products.product_category'=>$_GET['ctgry']],'','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
            $ttl_pdct=count($products);
            $products=$this->Cms_admin_model->getIndexData_paging('products', $limit, $offset, 'id', 'asc',['products.product_category'=>$_GET['ctgry']],'','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
        }elseif(isset($_GET['subctgry']) && !empty($_GET['subctgry'])){
            $products=$this->Cms_admin_model->getIndexData('products', '', '', 'id', 'asc',['products.product_subcategory'=>$_GET['subctgry']],'','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
            $ttl_pdct=count($products);
            $products=$this->Cms_admin_model->getIndexData_paging('products',  $limit, $offset, 'id', 'asc',['products.product_subcategory'=>$_GET['subctgry']],'','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
        }else {
            $products=$this->Cms_admin_model->getIndexData('products', '', '', 'id', 'asc','','','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
            $ttl_pdct=count($products);
            $products=$this->Cms_admin_model->getIndexData_paging('products', $limit, $offset, 'id', 'asc','','','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
        }

            $config['base_url'] = base_url() . 'products';
            $config['total_rows'] = $ttl_pdct;
            $config['per_page'] = $limit;
            $config["uri_segment"] = 2;
             
            // custom paging configuration
            $config['num_links'] = 4;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
                          
            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<li">';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="active">';
            $config['cur_tag_close'] = '</li>';
 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $links = $this->pagination->create_links();

        
        $categories=$this->Cms_admin_model->productCategoies();
        $subcategories=$this->db->get_where('product_subcategory',array('id!='=>0))->result_array();
        $this->template->setSub('subcategories',$subcategories);
        $this->template->setSub('categories',$categories);
        $this->template->setSub('products',$products);
        $this->template->setSub('links',$links);
        $this->template->setSub('d_from',$offset+1);
        $this->template->setSub('d_to',$offset+count($products));
        $this->template->setSub('d_total',$ttl_pdct);
        $this->template->loadFrontViews('products/allproduct');
      }

      public function product(){
        $this->db->cache_on();
        $product = $this->Cms_admin_model->getProduct($this->uri->segment(2));
        $extra_images=$this->Cms_admin_model->getProdExtraimg($product['id']);
        $categories = $this->Cms_admin_model->getProdCategory($product['product_category']);
        $product['category_name']=$categories['category_name'];
        $categories=$this->Cms_admin_model->productCategoies();
        // echo '<pre>';
        // print_r($product);
        // echo 'images: ';print_r($extra_images);
        // echo '<br>ctgry: ';print_r($categories);
        // die();

         $allproducts=$this->Cms_admin_model->getIndexData_paging('products', '', '', 'id', 'asc','','','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
          $this->template->setSub('allproducts',$allproducts);
         $this->template->setSub('extra_images',$extra_images);
         $this->template->setSub('product',$product);
         $this->template->setSub('categories',$categories);
         $this->db->cache_delete_all();
         $this->template->loadFrontViews('products/productdetail');
      }

      public function storevisitDetail(){
        $this->load->helper('form');
        print_r($_POST);die;
      }
}