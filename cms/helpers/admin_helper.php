<?php  defined('BASEPATH') OR exit('No direct script access allowed');
 

class Admin_helper{
    
    static function is_logged_in($email_session){
        $CI =& get_instance();
        if(!$email_session || !$_SESSION['admin_logged_in']){
            $url_return = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $sess_data = array('blogin_cururl' => $url_return);
            $CI->session->set_userdata($sess_data);
            redirect($CI->Cms_model->base_link().'/admin/login', 'refresh');
        }else if($email_session && $_SESSION['admin_logged_in'] && $_SESSION['session_id']){
            $chk = $CI->Cms_admin_model->sessionLoginChk();
            if($chk === FALSE){
                redirect($CI->Cms_model->base_link().'/admin/logout', 'refresh');
            }
        }
    }
    
    /**
    * login_already
    *
    * Function for check login already for login page
    *
    * @param	string	$email_session    Email Address from session
    */
    static function login_already($email_session){
        if($email_session && $_SESSION['admin_logged_in'] && $_SESSION['session_id']){
            $CI =& get_instance();
            redirect($CI->Cms_model->base_link().'/admin', 'refresh');
        }
    }
    
    /**
    * is_allowchk
    *
    * Function for check permission allow to access on the section
    *
    * @param	string	$perms_name    Permission Name
    */
    static function is_allowchk($perms_name){
        $CI =& get_instance();
        if($perms_name){
            if($CI->Cms_auth_model->is_group_allowed($perms_name, 'backend') === FALSE){
                $CI->session->set_flashdata('error_message','<div class="alert alert-danger" role="alert">'.$CI->lang->line('user_not_allow_txt').'</div>');
                redirect($CI->Cms_model->base_link().'/admin', 'refresh');
            }
            if($perms_name == 'save' || $perms_name == 'delete'){
                $CI->Cms_admin_model->saveActionsLogs(current_url(), $perms_name, $perms_name . ' on [' . uri_string() . ']');
            }
        }
    }
    
    /**
    * plugin_not_active
    *
    * Function for check the plugin active (backend use)
    *
    * @param	string	$plugin_config_filename    Plugin config filename
    */
    static function plugin_not_active($plugin_config_filename){
        $CI =& get_instance();
        $chkactive = $CI->Cms_admin_model->chkPluginActive($plugin_config_filename);
        if($chkactive === FALSE){
            redirect($CI->Cms_model->base_link().'/admin', 'refresh');
        }
    }
    
    /**
    * chk_reset_password
    *
    * Function for check the password change
    *
    */
    static function chk_reset_password(){
        if($_SESSION['admin_logged_in'] && $_SESSION['session_id'] && $_SESSION['user_admin_id']){
            $CI =& get_instance();
            $user = $CI->Cms_admin_model->getUser($_SESSION['user_admin_id'], 'admin');
            if($user !== FALSE && $user->pass_change != 1){
                unset($user);
                redirect($CI->Cms_model->base_link().'/admin/users/edit/'.$_SESSION['user_admin_id'], 'refresh');
            }
        }
    }
} 