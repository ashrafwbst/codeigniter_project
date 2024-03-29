<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Widget extends CI_Controller {

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
        admin_helper::is_allowchk('old plugin widget');
        $this->load->library('pagination');
        $this->db->cache_on();
        $this->cms_referrer->setIndex();
        // Pages variable
        $result_per_page = 20;
        $total_row = $this->Cms_admin_model->countTable('widget_xml');
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/widget/';

        // Pageination config
        $this->Cms_admin_model->pageSetting($base_url, $total_row, $result_per_page, $num_link);
        ($this->uri->segment(3)) ? $pagination = ($this->uri->segment(3)) : $pagination = 0;

        //Get users from database
        $this->template->setSub('widget', $this->Cms_admin_model->getIndexData('widget_xml', $result_per_page, $pagination, 'widget_xml_id', 'ASC'));

        //Load the view
        $this->template->loadSub('admin/widget_index');
    }

    public function addWidget() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('old plugin widget');        
        $this->template->set('extra_js', '<script type="text/javascript">'.$this->Cms_admin_model->getSaveDraftJS().'</script>');
        //Load the form helper
        $this->load->helper('form');
        //Load the view
        $this->template->loadSub('admin/widget_add');
    }

    public function insert() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('old plugin widget');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('widget_name', 'Widget Name', 'required');
        $this->form_validation->set_rules('xml_url', 'Widget XML URL', 'required');
        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            $this->addWidget();
        } else {
            //Validation passed
            //Add the user
            $this->Cms_admin_model->insertWidget();
            //Return to user list
            $this->db->cache_delete_all();
            $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">' . $this->lang->line('success_message_alert') . '</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function editWidget() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('old plugin widget');
        //Load the form helper
        $this->load->helper('form');
        if ($this->uri->segment(4)) {
            $this->db->cache_on();
            $widget = $this->Cms_model->getValue('*', 'widget_xml', 'widget_xml_id', $this->uri->segment(4), 1);
            if($widget !== FALSE){
                $this->template->setSub('widget', $widget);
                //Load the view
                $this->template->loadSub('admin/widget_edit');
            }else{
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        } else {
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function edited() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('old plugin widget');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('widget_name', 'Widget Name', 'required');
        $this->form_validation->set_rules('xml_url', 'Widget XML URL', 'required');
        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            $this->editWidget();
        } else {
            //Validation passed
            if($this->uri->segment(4)){
                //Update the user
                $this->Cms_admin_model->updateWidget($this->uri->segment(4));
                //Return to user list
                $this->db->cache_delete_all();
                $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">' . $this->lang->line('success_message_alert') . '</div>');
            }          
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function delete() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('old plugin widget');
        admin_helper::is_allowchk('delete');
        if ($this->uri->segment(4)) {
            //Delete the widget
            $this->Cms_admin_model->removeData('widget_xml', 'widget_xml_id', $this->uri->segment(4));
            $this->db->cache_delete_all();
            $this->Cms_model->clear_file_cache('widget_*', TRUE);
            $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">' . $this->lang->line('success_message_alert') . '</div>');
        }
        //Return to widget list
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }

}
