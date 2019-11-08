<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function compress()
{   
    if (function_exists('ini_set')) {
        @ini_set('max_execution_time', 600);
        @ini_set("pcre.recursion_limit", "16777");
    }
    $CI =& get_instance();
    if($CI->Cms_model->chkIPBaned() !== FALSE){
        set_status_header(401);
        echo '<!DOCTYPE html><html lang="en"><head><meta name="generator" content="'.$CI->Cms_admin_model->generateMeta().'" /><title>401 Unauthorized!</title></head><body>';
        echo '<h1>401 Unauthorized!</h1>';
        echo '<h2>Your IP Address can not access to this website!</h2><br><br>';
        echo '<h5>By '.EMAIL_DOMAIN.' ('.$CI->Cms_admin_model->generateMeta().')</h5>';
        echo '</body></html>';
        exit(0);
    }
    $config = $CI->Cms_model->load_config();
    if($config->html_optimize_disable != 1 && DEV_TOOLS_BAR === FALSE){
        $CI->output->set_output($CI->Cms_model->compress_html($CI->output->get_output()));
        $CI->output->_display();
    }
}

/* End of file compress.php */
/* Location: ./system/application/hooks/compress.php */