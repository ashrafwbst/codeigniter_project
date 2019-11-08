<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->database();
        $row = $this->Cms_model->load_config();
        if($row->maintenance_active){
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
        $title = 'Search | ' . $row->site_name;
        $this->template->set('title', $title);
        $this->template->set('meta_tags', $this->Cms_model->coreMetatags($title, $row->keywords, $title));
        $this->template->set('cur_page', $pageURL);
    }

    public function index() {
        $config = $this->Cms_admin_model->load_config();
        if($config->gsearch_active && !empty($config->gsearch_cxid) && $config->gsearch_cxid !== NULL){
            $this->template->setSub('config', $config);
            $this->template->loadFrontViews('search/search');
            $this->output->cache($config->pagecache_time);
        }else{
            redirect(BASE_URL, 'refresh');
        }
    }

}