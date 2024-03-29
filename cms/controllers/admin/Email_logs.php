<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_logs extends CI_Controller {

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
        if($this->Cms_admin_model->load_config()->email_logs != 1){
            $this->session->set_flashdata('error_message','<div class="alert alert-danger" role="alert">'.$this->lang->line('error_message_alert').'</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function index() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('email logs');
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->cms_referrer->setIndex();
        // Pages variable
        $search_arr = '';
        if($this->input->get('search') || $this->input->get('start_date') || $this->input->get('end_date') || $this->input->get('result')){
            $search_arr.= ' 1=1 ';
            if($this->input->get('search')){
                $search_arr.= " AND to_email LIKE '%".$this->input->get('search', TRUE)."%' OR user_agent LIKE '%".$this->input->get('search', TRUE)."%' OR ip_address LIKE '%".$this->input->get('search', TRUE)."%' OR from_email LIKE '%".$this->input->get('search', TRUE)."%' OR from_name LIKE '%".$this->input->get('search', TRUE)."%' OR subject LIKE '%".$this->input->get('search', TRUE)."%' OR message LIKE '%".$this->input->get('search', TRUE)."%'";
            }
            if($this->input->get('result')){
                if($this->input->get('result') == 'success'){
                    $search_arr.= " AND email_result = '".$this->input->get('result', TRUE)."'";
                }else{
                    $search_arr.= " AND email_result != 'success'";
                }
            }
            if($this->input->get('start_date') && !$this->input->get('end_date')){
                $search_arr.= " AND timestamp_create >= '".$this->input->get('start_date',true)." 00:00:00'";
            }elseif($this->input->get('end_date') && !$this->input->get('start_date')){
                $search_arr.= " AND timestamp_create <= '".$this->input->get('end_date',true)." 23:59:59'";
            }elseif($this->input->get('start_date') && $this->input->get('end_date')){
                $search_arr.= " AND timestamp_create >= '".$this->input->get('start_date',true)." 00:00:00' AND timestamp_create <= '".$this->input->get('end_date',true)." 23:59:59'";
            }
        }
        $result_per_page = 20;
        $total_row = $this->Cms_admin_model->countTable('email_logs', $search_arr);
        $num_link = 10;
        $base_url = $this->Cms_model->base_link(). '/admin/emaillogs/';
        // Pageination config
        $this->Cms_admin_model->pageSetting($base_url,$total_row,$result_per_page,$num_link); 
        ($this->uri->segment(3))? $pagination = ($this->uri->segment(3)) : $pagination = 0;
        //Get users from database
        $this->template->setSub('email_logs', $this->Cms_admin_model->getIndexData('email_logs', $result_per_page, $pagination, 'timestamp_create', 'desc', $search_arr));
        $this->template->setSub('total_row',$total_row);
        //Load the view
        $this->template->loadSub('admin/emaillogs_index');
    }
    
    public function deleteEmailLogs() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('email logs');
        admin_helper::is_allowchk('delete');
        $delR = $this->input->post('delR');
        if(isset($delR)){
            foreach ($delR as $value) {
                if ($value) {
                    $this->Cms_admin_model->removeData('email_logs', 'email_logs_id', $value);
                }
            }
        }
        $this->db->cache_delete_all();
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }
    
}
