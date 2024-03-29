<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Member_helper{

    static function is_logged_in($email){
        $CI =& get_instance();
        if(!$email){
            $url_return = 'http'.(isset($_SERVER['HTTPS'])?'s':'').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $sess_data = array('flogin_cururl' => $url_return);
            $CI->session->set_userdata($sess_data);
            redirect($CI->Cms_model->base_link().'/member/login', 'refresh');
        }else if($email && $_SESSION['session_id']){
            $chk = $CI->Cms_admin_model->sessionLoginChk();
            if($chk === FALSE){
                redirect($CI->Cms_model->base_link().'/member/logout', 'refresh');
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
        if($email_session){
            $CI =& get_instance();
            redirect($CI->Cms_model->base_link().'/member', 'refresh');
        }
    }
    
    /**
    * plugin_not_active
    *
    * Function for check the plugin active (frontend use)
    *
    * @param	string	$plugin_config_filename    Plugin config filename
    */
    static function plugin_not_active($plugin_config_filename){
        $CI =& get_instance();
        if($CI->Cms_model->load_config()->maintenance_active){
            redirect($CI->Cms_model->base_link(), 'refresh');
        }
        $chkactive = $CI->Cms_admin_model->chkPluginActive($plugin_config_filename);
        if($chkactive === FALSE){
            redirect($CI->Cms_model->base_link(), 'refresh');
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
            if($CI->Cms_auth_model->is_group_allowed($perms_name, 'frontend') === FALSE){
                $CI->session->set_flashdata('f_error_message','<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$CI->Cms_model->getLabelLang('not_permission_txt').'</div>');
                redirect($CI->Cms_model->base_link().'/member', 'refresh');
            }
        }
    }
    
    /**
    * chk_reset_password
    *
    * Function for check the password change
    *
    */
    static function chk_reset_password(){
        if($_SESSION['session_id'] && $_SESSION['user_admin_id']){
            $CI =& get_instance();
            $user = $CI->Cms_admin_model->getUser($_SESSION['user_admin_id'], 'member');
            if($user !== FALSE && $user->pass_change != 1){
                unset($user);
                redirect($CI->Cms_model->base_link().'/member/edit', 'refresh');
            }
        }
    }
} 