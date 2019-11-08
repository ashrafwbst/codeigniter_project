<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upgrade extends CI_Controller {

    var $cur_version;
    var $last_version;

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->library('unzip');
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
        $this->cur_version = $this->Cms_model->getVersion();
        $this->last_version = $this->Cms_admin_model->getLatestVersion();
    }

    public function index() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        $this->cms_referrer->setIndex();
        $this->session->unset_userdata('cms_lastver');
        $this->load->helper('directory');
        $this->template->setSub('cur_version', $this->cur_version);
        $this->template->setSub('last_version', $this->last_version);
        $this->template->setSub('logsdir', directory_map(APPPATH . '/logs/', 1, TRUE));
        //Load the view
        $this->template->loadSub('admin/upgrade_index');
    }

    
    
    public function install() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        if (function_exists('ini_set')) {
            @ini_set('max_execution_time', 600);
            @ini_set('memory_limit','512M');
        }
        /* upload zip file */
        $zip_ext = array('application/x-zip', 'application/zip', 'application/x-zip-compressed', 'application/s-compressed', 'multipart/x-zip');
        if (isset($_FILES['file_upload']) && $_FILES['file_upload'] != null) {
            if (in_array($_FILES['file_upload']['type'], $zip_ext)) {
                $config['upload_path'] = FCPATH;
                $config['max_size'] = '0';
                $config['allowed_types'] = 'zip';
                $file_name = 'manualzip_'.time().'.zip';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                @$this->upload->do_upload('file_upload');
                $newfname = FCPATH . $file_name;
                if (file_exists($newfname)) {
                    $this->Cms_admin_model->setMaintenance();
                    $this->Cms_model->clear_all_cache();
                    $this->db->cache_delete_all();
                    @$this->unzip->extract($newfname, FCPATH);
                    if (file_exists(FCPATH . 'upgrade_sql/upgrade.sql')) { /* for sql upgrade  */
                        @$this->Cms_admin_model->execSqlFile(FCPATH . 'upgrade_sql/upgrade.sql');
                        @$this->Cms_model->rmdir_recursive(FCPATH . 'upgrade_sql');
                    }
                    if (file_exists(FCPATH . 'plugin_sql/install.sql')) { /* for sql plugin install or upgrade  */
                        @$this->Cms_admin_model->execSqlFile(FCPATH . 'plugin_sql/install.sql');
                        @$this->Cms_model->rmdir_recursive(FCPATH . 'plugin_sql');
                    }
                    if (is_writable($newfname)) {
                        @unlink($newfname);
                    }
                    $this->Cms_admin_model->unsetMaintenance();
                    $this->Cms_model->clear_all_cache();
                    $this->db->cache_delete_all();
                    $this->session->set_flashdata('error_message', '<div class="alert alert-success" role="alert">' . $this->lang->line('success_message_alert') . '</div>');
                } else {
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger" role="alert">' . $this->lang->line('error_message_alert') . '</div>');
                }
            } else {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger" role="alert">' . $this->lang->line('pluginmgr_zip_remark') . '</div>');
            }
        } else {
            $this->session->set_flashdata('error_message', '<div class="alert alert-danger" role="alert">' . $this->lang->line('error_message_alert') . '</div>');
        }
        // When Success 
        redirect('admin/upgrade', 'refresh');
    }
    
    public function dbOptimize() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        $this->load->dbutil();
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_*'));
        $result = $this->dbutil->optimize_database();
        if ($result !== FALSE){
            $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('optimize_success_alert').'</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }else{
            $this->session->set_flashdata('error_message','<div class="alert alert-danger" role="alert">'.$this->lang->line('optimize_error_alert').'</div>');
            redirect('admin/upgrade', 'refresh');
        }
    }
    
    public function dbBackup() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        if (function_exists('ini_set')) {
            @ini_set('max_execution_time', 600);
            @ini_set('memory_limit','512M');
        }
        @array_map('unlink', glob(FCPATH . DB_NAME . '_*'));
        $this->load->dbutil();
        $prefs = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
        $backup = $this->dbutil->backup($prefs);
        $this->load->helper('file');
        write_file(FCPATH . DB_NAME . '_'.date('Ymd').'.sql', $backup);
        $this->load->helper('download');
        force_download(FCPATH . DB_NAME . '_'.date('Ymd').'.sql', NULL);
    }
    
    public function fileBackup() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        if (function_exists('ini_set')) {
            @ini_set('max_execution_time', 600);
            @ini_set('memory_limit','512M');
        }
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_files_*'));
        $this->load->library('zip');
        $this->zip->clear_data();
        $this->load->helper('directory');
        foreach (directory_map('templates/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if (($t != "index.html" && $t != ".htaccess") && $t != "admin" && $t != "default") {
                    $this->zip->read_dir('templates/' . $t . '/');
                }
            }
        }
        foreach (directory_map('cms/views/templates/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if (($t != "index.html") && $t != "admin" && $t != "default") {
                    $this->zip->read_dir('cms/views/templates/' . $t . '/');
                }
            }
        }
        foreach (directory_map('cms/config/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "article.php" && $t != "gallery.php") {
                    $this->zip->read_file('cms/config/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/language/english/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "article_lang.php" && $t != "gallery_lang.php") {
                    $this->zip->read_file('cms/language/english/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/language/dutch/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "article_lang.php" && $t != "gallery_lang.php") {
                    $this->zip->read_file('cms/language/dutch/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/language/italian/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "article_lang.php" && $t != "gallery_lang.php") {
                    $this->zip->read_file('cms/language/italian/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/language/spanish/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "article_lang.php" && $t != "gallery_lang.php") {
                    $this->zip->read_file('cms/language/spanish/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/language/thai/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "article_lang.php" && $t != "gallery_lang.php") {
                    $this->zip->read_file('cms/language/thai/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/controllers/admin/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "Article.php" && $t != "Gallery.php") {
                    $this->zip->read_file('cms/controllers/admin/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/modules/plugin/controllers/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "Article.php" && $t != "Gallery.php") {
                    $this->zip->read_file('cms/modules/plugin/controllers/' . $t, TRUE);
                }
            }
        }
	foreach (directory_map('cms/models/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if ($t != "index.html" && $t != "Article_model.php" && $t != "Gallery_model.php") {
                    $this->zip->read_file('cms/models/plugin/' . $t, TRUE);
                }
            }
        }
        foreach (directory_map('cms/modules/plugin/views/templates/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if (($t != "index.html") && $t != "default") {
                    $this->zip->read_dir('cms/modules/plugin/views/templates/' . $t . '/');
                }
            }
        }
        foreach (directory_map('cms/modules/plugin/views/templates/default/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if (($t != "index.html") && $t != "article" && $t != "gallery") {
                    $this->zip->read_dir('cms/modules/plugin/views/templates/default/' . $t . '/');
                }
            }
        }
        foreach (directory_map('cms/views/admin/plugin/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if (($t != "index.html") && $t != "article" && $t != "gallery") {
                    $this->zip->read_dir('cms/views/admin/plugin/' . $t . '/');
                }
            }
        }
        foreach (directory_map('cms/views/frontpage/templates/', 1) as $t) {
            if (!is_dir($t)) {
                $t = str_replace("\\", "", $t);
                $t = str_replace("/", "", $t);
                if (($t != "index.html") && $t != "default") {
                    $this->zip->read_dir('cms/views/frontpage/templates/' . $t . '/');
                }
            }
        }
        unset($t);
        $this->zip->read_file(FCPATH . '.htaccess', '.htaccess');
        $this->zip->read_file(FCPATH . 'config.inc.php', 'config.inc.php');
        $this->zip->read_file(FCPATH . 'htaccess.config.inc.php', 'htaccess.config.inc.php');
        $this->zip->read_file(FCPATH . 'cache.config.inc.php', 'cache.config.inc.php');
        $this->zip->read_file(FCPATH . 'memcached.config.inc.php', 'memcached.config.inc.php');
        $this->zip->read_file(FCPATH . 'redis.config.inc.php', 'redis.config.inc.php');
        $this->zip->read_file(FCPATH . 'proxy.inc.php', 'proxy.inc.php');
        $zip_filename = EMAIL_DOMAIN . '_files_'.date('Ymd').'.zip';
        $this->zip->archive(FCPATH . $zip_filename);
        $this->load->helper('download');
        force_download(FCPATH . $zip_filename, NULL);
    }
    
    public function photoBackup() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        if (function_exists('ini_set')) {
            @ini_set('max_execution_time', 600);
            @ini_set('memory_limit','512M');
        }
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_photo_*'));
        $this->load->library('zip');
        $this->zip->clear_data();
        $this->zip->read_dir('photo/');
        $zip_filename = EMAIL_DOMAIN . '_photo_'.date('Ymd').'.zip';
        $this->zip->archive(FCPATH . $zip_filename);
        $this->load->helper('download');
        force_download(FCPATH . $zip_filename, NULL);
    }
    
    public function clearAllCache() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        $this->Cms_model->clear_all_cache();
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_*'));
        @array_map('unlink', glob(FCPATH . DB_NAME . '_*'));
        @$this->db->empty_table('save_formdraft');
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('clearallcache_success_alert').'</div>');
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }
    
    public function clearAllDBCache() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        @$this->db->cache_delete_all();
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_*'));
        @array_map('unlink', glob(FCPATH . DB_NAME . '_*'));
        @$this->db->empty_table('save_formdraft');
        @$this->db->flush_cache();
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('clearalldbcache_success_alert').'</div>');
        redirect($this->cms_referrer->getIndex(), 'refresh');
    }
    
    public function clearAllSession() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('delete');
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_*'));
        @array_map('unlink', glob(FCPATH . DB_NAME . '_*'));
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
        $this->Cms_model->clear_all_session();
        redirect('admin/logout', 'refresh');
    }

    public function clearAllErrLog() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('delete');
        $this->Cms_model->clear_all_error_log();
        @array_map('unlink', glob(FCPATH . EMAIL_DOMAIN . '_*'));
        @array_map('unlink', glob(FCPATH . DB_NAME . '_*'));
        $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'.$this->lang->line('success_message_alert').'</div>');
        redirect('admin/upgrade', 'refresh');
    }
    
    public function downloadErrLog() {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        admin_helper::is_allowchk('maintenance');
        admin_helper::is_allowchk('save');
        if (function_exists('ini_set')) {
            @ini_set('max_execution_time', 600);
            @ini_set('memory_limit','512M');
        }
        $log_file = $this->input->post('errlogfile', TRUE);
        if($log_file){
            $this->load->helper('download');
            if($log_file == 'all'){
                $this->load->helper('directory');
                $this->load->library('zip');
                foreach (directory_map(APPPATH . 'logs/', 1) as $t) {
                    if (!is_dir($t)) {
                        $t = str_replace("\\", "", $t);
                        $t = str_replace("/", "", $t);
                        if (($t[0] != ".") && $t != "index.html") {
                            $this->zip->read_file(APPPATH . 'logs/' . $t);
                        }
                    }
                }
                $zip_filename = EMAIL_DOMAIN . '_errorlogs_'.date('Ymd').'.zip';
                $this->zip->download($zip_filename);
            }else{
                $log_file = $this->security->sanitize_filename($log_file);
                $data = read_file(APPPATH . 'logs/'.$log_file);
                $string = str_replace("<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>", '', $data);
                force_download('error_'.str_replace('.php', '', $log_file).'.txt', $string);
            }
        }else{
            $this->session->set_flashdata('error_message','<div class="alert alert-danger" role="alert">'.$this->lang->line('error_message_alert').'</div>');
            redirect($this->cms_referrer->getIndex(), 'refresh');
        }
    }
}
