<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages extends CI_Controller {

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

    public function index() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');
        $this->load->library('pagination');
        $this->load->helper('form');
        $this->db->cache_on();
        $this->cms_referrer->setIndex();
        // Pages variable
        $search_arr = '';
        if($this->input->get('lang') && $this->input->get('lang') != 'all'){
            $search_arr.= ' 1=1 ';
            if($this->input->get('lang')){
                $search_arr.= " AND lang_iso LIKE '%".$this->input->get('lang', TRUE)."%'";
            }
        }
        $result_per_page = 20;
        $total_row = $this->Cms_admin_model->countTable('pages', $search_arr);
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/pages/';
        // Pageination config
        $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link);    
        ($this->uri->segment(3))? $pagination = ($this->uri->segment(3)) : $pagination = 0;        
        //Get users from database
        $this->template->setSub('pages', $this->Cms_admin_model->getIndexData('pages', $result_per_page, $pagination, 'pages_id', 'asc', $search_arr));
        $this->template->setSub('lang', $this->Cms_model->loadAllLang());
        $this->template->setSub('total_row', $total_row);
        //Load the view
        $this->template->loadSub('admin/pages_index');
    }

    public function addPages() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');       
        $this->template->set('extra_js', '<script type="text/javascript">'.$this->Cms_admin_model->getSaveDraftJS().'</script>');
        //Get lang from database
        $this->template->setSub('lang', $this->Cms_model->loadAllLang());
        
        //Load the form helper
        $this->load->helper('form');
        //Load the view
        $this->template->loadSub('admin/pages_add');
    }

    public function insert() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');
        admin_helper::is_allowchk('save');
        //Load the form validation library       
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('page_name', 'Pages Name', 'required|is_unique[pages.page_name]');
        $this->form_validation->set_rules('page_title', 'Pages Title', 'required');
        $this->form_validation->set_rules('page_keywords', 'Pages Keywords', 'required');
        $this->form_validation->set_rules('page_desc', 'Pages Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            $this->addPages();
        } else {
            //Validation passed
            //Add the user
            $this->Cms_admin_model->insertPage();
            //Return to user list
            $this->db->cache_delete_all();
            $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function editPages() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');
        //Load the form helper
        $this->load->helper('form');
        if($this->uri->segment(4)){
            $this->db->cache_on();
            $pages = $this->Cms_model->getValue('*', 'pages', 'pages_id', $this->uri->segment(4), 1);
            if($pages !== FALSE){
                $this->template->setSub('lang', $this->Cms_model->loadAllLang());
                $this->template->setSub('pages', $pages);
                //Load the view
                $this->template->loadSub('admin/pages_edit');
            }else{
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        }else{
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function edited() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('page_name', 'Pages Name', 'required|is_unique[pages.page_name.pages_id.'.$this->uri->segment(4).']');
        $this->form_validation->set_rules('page_title', 'Pages Title', 'required');
        $this->form_validation->set_rules('page_keywords', 'Pages Keywords', 'required');
        $this->form_validation->set_rules('page_desc', 'Pages Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            $this->editPages();
        } else {
            //Validation passed
            //Update the user
            $this->Cms_admin_model->updatePage($this->uri->segment(4));
            //Return to user list
            $this->db->cache_delete_all();
            $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function delete() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');
        admin_helper::is_allowchk('delete');
        if($this->uri->segment(4)){
            //Delete the languages
            if($this->uri->segment(4) != 1) {
                $this->Cms_model->clear_all_cache();
                $this->Cms_admin_model->removeData('pages', 'pages_id', $this->uri->segment(4));
                $this->db->cache_delete_all();
            } else {
                echo "<script>alert(\"" . $this->lang->line('pages_delete_default') . "\");</script>";
            }
            $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
        }
        //Return to languages list
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }
    
    public function asCopy() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('pages content');
        admin_helper::is_allowchk('save');
        if($this->uri->segment(4)){
            $page = $this->Cms_model->getValue('*', 'pages', 'pages_id', $this->uri->segment(4), 1);
            if($page !== FALSE){
                $data = array(
                    'page_name' => $this->Cms_model->findNameAsCopy('pages', 'pages_id', $page->page_name),
                    'page_url' => $this->Cms_model->findNameAsCopy('pages', 'pages_id', $page->page_url, TRUE),
                    'lang_iso' => $page->lang_iso,
                    'page_title' => $page->page_title,
                    'page_keywords' => $page->page_keywords,
                    'page_desc' => $page->page_desc,
                    'content' => $page->content,
                    'more_metatag' => $page->more_metatag,
                    'custom_css' => $page->custom_css,
                    'custom_js' => $page->custom_js,
                    'active' => 0,
                );
                $this->Cms_model->insertAsCopy('pages', $data);
                $this->db->cache_delete_all();
            }
        }
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }
}
