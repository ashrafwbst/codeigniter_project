<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$plugin_config['plugin_name']  = 'Article';
$plugin_config['plugin_urlrewrite']  = 'article'; /* Please don't have any blank space */
$plugin_config['plugin_author']  = 'CMS'; /* For your name */
$plugin_config['plugin_version']   = '1.0.6';
$plugin_config['plugin_description']   = 'aricle plugin for make blog'; /* For your plugin description */


$plugin_config['plugin_member_menu'] = '';
$plugin_config['plugin_menu_permission_name'] = '';

$plugin_config['plugin_db_table']   = array(
    'article_db',
);

$plugin_config['plugin_sitemap_viewtable']   = 'article_db';

$plugin_config['plugin_sqlextra_condition']   = "active = '1' AND url_rewrite != '' AND is_category != '1'";

$plugin_config['plugin_sitemap_cattable']   = 'article_db';

$plugin_config['plugin_sqlextra_catcondition']   = "active = '1' AND url_rewrite != '' AND is_category = '1'";

$plugin_config['plugin_file_path']   = array(
    FCPATH . '/photo/plugin/article/',
    FCPATH . '/cms/config/plugin/article.php',
    FCPATH . '/cms/controllers/admin/plugin/Article.php',
    FCPATH . '/cms/models/plugin/Article_model.php',
    FCPATH . '/cms/modules/plugin/controllers/Article.php',
    FCPATH . '/cms/modules/plugin/views/templates/default/article/',
    FCPATH . '/cms/views/admin/plugin/article/',
    FCPATH . '/cms/language/dutch/plugin/article_lang.php',
    FCPATH . '/cms/language/english/plugin/article_lang.php',
    FCPATH . '/cms/language/italian/plugin/article_lang.php',
    FCPATH . '/cms/language/spanish/plugin/article_lang.php',
    FCPATH . '/cms/language/thai/plugin/article_lang.php',
);
 
$plugin_config['plugin_widget_viewtable']   = 'article_db';

$plugin_config['plugin_widget_condition']   = "active = '1' AND url_rewrite != '' AND is_category != '1'";

$plugin_config['plugin_widget_sel_field']   = array(
    'article_db_id',
    'main_picture',
    'title',
    'keyword',
    'short_desc',
    'content',
    'timestamp_create',
    'timestamp_update',
    'url_rewrite',
);

$plugin_config['plugin_widget_othertable']   = '';
$plugin_config['plugin_widget_othertable_idkey']   = '';
$plugin_config['plugin_widget_othertable_condition']   = "";

$plugin_config['plugin_widget_othertable_selfield']   = array();


$plugin_config['backend_startup'] = '';
$plugin_config['frontend_startup'] = '';