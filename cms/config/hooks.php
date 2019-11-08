<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(DEV_TOOLS_BAR === FALSE){
    $hook['display_override'][] = array(
        'class' => '',
        'function' => 'compress',
        'filename' => 'compress.php',
        'filepath' => 'hooks'
    );
}else{
    $hook['display_override'][] = array(
        'class'  	=> 'Develbar',
        'function' 	=> 'debug',
        'filename' 	=> 'Develbar.php',
        'filepath' 	=> 'third_party/DevelBar/hooks'
    );
}