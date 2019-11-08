<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$plugin_config['plugin_name']  = 'Gallery';
$plugin_config['plugin_urlrewrite']  = 'gallery'; /* Please don't have any blank space */
$plugin_config['plugin_author']  = 'CMS'; /* For your name */
$plugin_config['plugin_version']   = '1.0.5';
$plugin_config['plugin_description']   = 'gallery plugin'; /* For your plugin description */


$plugin_config['plugin_member_menu'] = '';
$plugin_config['plugin_menu_permission_name'] = '';


$plugin_config['plugin_db_table']   = array(
    'gallery_db',
    'gallery_picture',
);

$plugin_config['plugin_sitemap_viewtable']   = 'gallery_db';

$plugin_config['plugin_sqlextra_condition']   = "active = '1' AND url_rewrite != ''";

$plugin_config['plugin_sitemap_cattable']   = '';

$plugin_config['plugin_sqlextra_catcondition']   = "";

$plugin_config['plugin_file_path']   = array(
    FCPATH . '/photo/plugin/gallery/',
    FCPATH . '/cms/config/plugin/gallery.php',
    FCPATH . '/cms/controllers/admin/plugin/Gallery.php',
    FCPATH . '/cms/models/plugin/Gallery_model.php',
    FCPATH . '/cms/modules/plugin/controllers/Gallery.php',
    FCPATH . '/cms/modules/plugin/views/templates/default/gallery/',
    FCPATH . '/cms/views/admin/plugin/gallery/',
    FCPATH . '/cms/language/dutch/plugin/gallery_lang.php',
    FCPATH . '/cms/language/english/plugin/gallery_lang.php',
    FCPATH . '/cms/language/italian/plugin/gallery_lang.php',
    FCPATH . '/cms/language/spanish/plugin/gallery_lang.php',
    FCPATH . '/cms/language/thai/plugin/gallery_lang.php',
); 

$plugin_config['plugin_widget_viewtable']   = 'gallery_db';

$plugin_config['plugin_widget_condition']   = "active = '1' AND url_rewrite != ''";

$plugin_config['plugin_widget_sel_field']   = array(
    'gallery_db_id',
    'album_name',
    'url_rewrite',
    'keyword',
    'short_desc',
    'timestamp_create',
    'timestamp_update',
);

$plugin_config['plugin_widget_othertable']   = 'gallery_picture';
$plugin_config['plugin_widget_othertable_idkey']   = 'gallery_db_id';
$plugin_config['plugin_widget_othertable_condition']   = "file_upload != ''";

$plugin_config['plugin_widget_othertable_selfield']   = array(
    'file_upload',
    'caption',
);


$plugin_config['backend_startup'] = '';
$plugin_config['frontend_startup'] = '';