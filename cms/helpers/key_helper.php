<?php  defined('BASEPATH') OR exit('No direct script access allowed');
 

class Key_helper{

    static function chkPrivateKey(){
        $CI =& get_instance();
        $private_key = $CI->input->get('pkey', TRUE);
        if($CI->Cms_model->chkPrivateKey($private_key) === FALSE){
            $error_txt = 'Your private key invalid. Please try again. [IP: '.$CI->input->ip_address().', Time: '. date('Y-m-d H:i:s').']';
            log_message('error', $error_txt);
            show_error($error_txt, 403);
        }
    }
} 