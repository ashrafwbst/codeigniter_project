<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sliders extends CI_Controller {


    public function index() {
        //Get users from database
        $this->template->setSub('banner', $this->Cms_admin_model->getIndexData('banner_mgt', $result_per_page, $pagination, 'timestamp_create', 'desc', $search_arr));
        $this->template->setSub('total_row',$total_row);
        //Load the view
        $this->template->loadSub('admin/banner_index');
    }
    
    public function addBanner() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('banner');
        //Load the form helper
        $this->load->helper('form');
        //Load the view
        $this->template->loadSub('admin/banner_add');
    }

    public function insert() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('banner');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('name', $this->lang->line('banner_name'), 'required');
        $this->form_validation->set_rules('link', $this->lang->line('banner_link'), 'required');
        $this->form_validation->set_rules('start_date', $this->lang->line('startdate_field'), 'required');
        $this->form_validation->set_rules('end_date', $this->lang->line('enddate_field'), 'required');
        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            $this->addBanner();
        } else {
            //Validation passed
            //Add the user
            $this->Cms_admin_model->insertBanner();
            //Return to user list
            $this->db->cache_delete_all();
            $this->Cms_model->clear_file_cache('banner_*', TRUE);
            $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">' . $this->lang->line('success_message_alert') . '</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }
    
    public function editBanner() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('banner');
        //Load the form helper
        $this->load->helper('form');
        if ($this->uri->segment(4)) {
            $this->db->cache_on();
            $banner = $this->Cms_model->getValue('*', 'banner_mgt', 'banner_mgt_id', $this->uri->segment(4), 1);
            if($banner !== FALSE){
                $this->template->setSub('banner', $banner);
                //Load the view
                $this->template->loadSub('admin/banner_edit');
            }else{
                redirect($this->cms_referrer->getIndex(), 'refresh');
            }
        } else {
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }

    public function update() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('banner');
        admin_helper::is_allowchk('save');
        //Load the form validation library
        $this->load->library('form_validation');
        //Set validation rules
        $this->form_validation->set_rules('name', $this->lang->line('banner_name'), 'required');
        $this->form_validation->set_rules('link', $this->lang->line('banner_link'), 'required');
        $this->form_validation->set_rules('start_date', $this->lang->line('startdate_field'), 'required');
        $this->form_validation->set_rules('end_date', $this->lang->line('enddate_field'), 'required');
        if ($this->form_validation->run() == FALSE) {
            //Validation failed
            $this->editBanner();
        } else {
            //Validation passed
            if($this->uri->segment(4)){
                //Update the user
                $this->Cms_admin_model->updateBanner($this->uri->segment(4));
                //Return to user list
                $this->db->cache_delete_all();
                $this->Cms_model->clear_file_cache('banner_*', TRUE);
                $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">' . $this->lang->line('success_message_alert') . '</div>');
            }          
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }
    
    public function view() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('banner');
        if($this->uri->segment(4)){
            if($this->uri->segment(5)){
                $search_arr = "banner_mgt_id = '".$this->uri->segment(4)."' AND timestamp_create LIKE '".$this->uri->segment(5)."%'";
                $bannerstat = $this->Cms_model->getValueArray("DATE(timestamp_create) AS bannerdate, DATE_FORMAT(timestamp_create, '%d %M %Y') AS bannerdateF", 'banner_statistic', $search_arr, '', 0, 'bannerdate', 'DESC'); /* Can't group with sql only_full_group_by sql mode */
                if ($bannerstat === FALSE) { 
                    redirect($this->cms_referrer->getIndex('view'), 'refresh');
                    exit();
                }
                $this->template->setSub('bannerstat', $bannerstat);
                $this->template->setSub('click_allcount', number_format($this->Cms_model->countData('banner_statistic', $search_arr)));
            }else{
                $this->cms_referrer->setIndex('view');
                $search_arr = "banner_mgt_id = '".$this->uri->segment(4)."' ";
                $year = $this->Cms_model->getValueArray('YEAR(timestamp_create) AS banner_year', 'banner_statistic', $search_arr, '', 0, 'banner_year', 'DESC', 'banner_year');
                if ($year === FALSE) { 
                    redirect($this->cms_referrer->getIndex(), 'refresh');
                    exit();
                }
                $this->template->setSub('year', $year);                
                $this->template->setSub('click_allcount', number_format($this->Cms_model->countData('banner_statistic', $search_arr)));
            }
            $this->template->setSub('banner', $this->Cms_model->getValue('*', 'banner_mgt', 'banner_mgt_id', $this->uri->segment(4), 1));
            //Load the view
            $this->template->loadSub('admin/banner_view');
        }else{
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }
    
    public function deleteIndex() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('banner');
        admin_helper::is_allowchk('delete');
        $delR = $this->input->post('delR');
        if(isset($delR)){
            foreach ($delR as $value) {
                if ($value) {
                    $getimg = $this->Cms_model->getValue('img_path', 'banner_mgt', 'banner_mgt_id', $value, 1);
                    if($getimg->img_path && $getimg->img_path !== NULL){ @unlink('photo/banner/'.$getimg->img_path); }
                    $this->Cms_admin_model->removeData('banner_statistic', 'banner_mgt_id', $value);
                    $this->Cms_admin_model->removeData('banner_mgt', 'banner_mgt_id', $value);
                }
            }
        }
        $this->db->cache_delete_all();
        $this->Cms_model->clear_file_cache('banner_*', TRUE);
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }
    
}