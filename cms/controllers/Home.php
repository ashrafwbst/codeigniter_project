<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    var $page_rs;
    var $page_url;
    
    function __construct() {
         
        parent::__construct(); 
        $this->CI = & get_instance();
        $this->load->database();
        $this->load->library("pagination");
        $this->load->model('Cms_model');
        $this->Cms_model->getarticle();
        $row = $this->Cms_model->load_config();
        if ($row->themes_config) {
            $this->template->set_template($row->themes_config);
        }
        if(!$this->session->userdata('fronlang_iso')){ 
            $this->Cms_model->setSiteLang();
        }
        if($this->Cms_model->chkLangAlive($this->session->userdata('fronlang_iso')) == 0){ 
            $this->session->unset_userdata('fronlang_iso');
            $this->Cms_model->setSiteLang(); 
        }
        $this->_init();
    }

    public function _init() {
        $row = $this->Cms_model->load_config();
        $pageURL = $this->Cms_model->getCurPages();
        if(strpos($pageURL, 'plugin') !== FALSE){
            redirect($this->Cms_model->base_link().'/'.$pageURL);
        }
        $this->page_url = $pageURL;
        $this->page_rs = $this->Cms_model->load_page($pageURL);
        $page_rs = $this->page_rs;
        $this->template->set('additional_js', $row->additional_js);
        $this->template->set('additional_metatag', $row->additional_metatag);
        $this->template->set('additional_css', $row->additional_css);
        if ($page_rs !== FALSE) {
            $this->template->set('core_css', $this->Cms_model->coreCss($page_rs->custom_css, FALSE));
            $this->template->set('core_js', $this->Cms_model->coreJs($page_rs->custom_js, FALSE));
            $title = $page_rs->page_title . ' | ' . $row->site_name;
            $this->template->set('title', $title);
            $this->template->set('meta_tags', $this->Cms_model->coreMetatags($page_rs->page_desc, $page_rs->page_keywords, $title, '', $page_rs->more_metatag));
            $this->template->set('cur_page', $page_rs->page_url);
        } else {
            $this->template->set('core_css', $this->Cms_model->coreCss());
            $this->template->set('core_js', $this->Cms_model->coreJs());
            $title = '404 Page not Found | ' . $row->site_name;
            $this->template->set('title', $title);
            $this->template->set('meta_tags', $this->Cms_model->coreMetatags('404 Page not Found',$row->keywords,$title));
            $this->template->set('cur_page', $pageURL);
        }
    }

    public function index() {
    $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            if($this->page_rs === FALSE){
                set_status_header(404);
                $this->error_404();
            }else{


                 $products=$this->Cms_admin_model->getIndexData_paging('products', '', '', 'id', 'asc','','','product_category','products.product_category=product_category.id','','products.*,product_category.category_name');
                  $this->template->setSub('products',$products);
                 $slider=$this->db->where(['active'=>1])->get('upload_file')->result_array();
                $totSegments = $this->uri->total_segments();
                $this->template->setSub('slider',$slider);
                $this->template->setSub('content', $this->Cms_model->getHtmlContent($this->page_rs->content, $this->uri->segment($totSegments)));

             //   $this->template->setSub('logo', $this->Cms_model->getLogo()); 
              //  $this->template->setSub('page_menu', $this->Cms_model->getPageMenu()); 

                  $this->template->loadFrontViews('static/home');
                // $this->template->loadSub('frontpage/getpage');
            }
            if ($this->Cms_model->findFrmTag($this->output->get_output(), TRUE) !== false) {
                /* For CSRF Protection on page (random CSRF token not use cache) */
                $config->pagecache_time = 0;
            }
            if ($this->uri->segment(1) && $config->pagecache_time != 0) {
                $this->db->cache_on();
                $this->output->cache($config->pagecache_time);
            }
        }

        // $config = $this->Cms_model->load_config();
        // if($config->maintenance_active){
        //     $this->template->loadFrontViews('static/maintenance');
        // }else{
        //     if($this->page_rs === FALSE){
        //         set_status_header(404);
        //         $this->error_404();
        //     }else{
        //         $totSegments = $this->uri->total_segments();
        //         $this->template->setSub('content', $this->Cms_model->getHtmlContent($this->page_rs->content, $this->uri->segment($totSegments)));
        //         $this->template->loadFrontViews('static/home');
        //     }
        //     if ($this->Cms_model->findFrmTag($this->output->get_output(), TRUE) !== false) {
        //         /* For CSRF Protection on page (random CSRF token not use cache) */
        //         $config->pagecache_time = 0;
        //     }
        //     if ($this->uri->segment(1) && $config->pagecache_time != 0) {
        //         $this->db->cache_on();
        //         $this->output->cache($config->pagecache_time);
        //     }
        // }
    }
    

      public function contact() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            $contact=$this->db->get_where('pages',array('pages_id'=>6))->row_array();
            $this->template->setSub('contact',$contact);
         $this->template->loadFrontViews('static/contact');
        }
    }


    public function company() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            $company=$this->db->get_where('pages',array('pages_id'=>5))->row_array();
        $this->template->setSub('company',$company);
         $this->template->loadFrontViews('static/company');
        }
    }

public function corporate() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            $company=$this->db->get_where('pages',array('pages_id'=>6))->row_array();
                $this->template->loadFrontViews('static/corporate');
        }
    }
    public function private_event() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            $company=$this->db->get_where('pages',array('pages_id'=>8))->row_array();
         $this->template->loadFrontViews('static/private_event');
        }
    }
    public function space() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            $company=$this->db->get_where('pages',array('pages_id'=>9))->row_array();
         $this->template->loadFrontViews('static/space');
        }
    }

    public function menu() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            $menu=$this->db->get_where('pages',array('pages_id'=>15))->row_array();
        $this->template->setSub('menu',$menu);
         $this->template->loadFrontViews('static/menu');
        }
    }



    public function services() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
                 $services=$this->db->get_where('pages',array('pages_id'=>14))->row_array();
        $this->template->setSub('services',$services);
         $this->template->loadFrontViews('static/services');
        }
    }



    public function error_404() {
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
            set_status_header(404);
            $html = '<h1>Sorry, Page not Found!</h1>
                            <p>Sorry! Page not Found. (' . current_url() . ') <br>Please back to home page.<p>
                                <a class="btn btn-primary btn-lg" href="' . $this->cms_referrer->getReferrer() . '" role="button">back to home &raquo;</a>';
            $this->template->setSub('content', $html);
            //Load the view
            $this->template->loadFrontViews('static/error404');
            if ($config->pagecache_time != 0) {
                $this->db->cache_on();
                $this->output->cache($config->pagecache_time);
            }
        }
    }
    
    public function setLang() {
        $this->Cms_model->setSiteLang($this->uri->segment(2));
        redirect(base_url(), 'refresh');
    }

    public function getCoreCSS(){
        if (function_exists('session_cache_limiter')) {
            @session_cache_limiter(''); // add this line to the beginning of your php script to disable the cache limiter function:
        }
        $expires = 60 * 60 * 24 * 30; // Cache lifetime 30 days
        $file = FCPATH.'assets/css/bootstrap.min.css';
        $cssFiles = array(
            $file,
            FCPATH.'assets/css/flag-icon.min.css',
            FCPATH.'assets/css/full-slider.css',
        );
        $etag = @md5_file($file); // Generate Etag
        $fileModified = @filemtime($file);
        /*
          Set 304 Not Modified if old visitor
         */
        if (isset($_SERVER['SERVER_PROTOCOL']) && isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && isset($_SERVER['HTTP_IF_NONE_MATCH']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $fileModified && trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
            echo $this->Cms_model->setJSCSScache($cssFiles, 'corecss', 'css', $expires);
        } else {
            $this->Cms_model->setJSCSSheader($fileModified, $expires, $etag, 'text/css');
            echo $this->Cms_model->setJSCSScache($cssFiles, 'corecss', 'css', $expires);
        }
        $this->output->cache(43200);
        exit(0);
    }
    
    public function getCoreJS(){
        if (function_exists('session_cache_limiter')) {
            @session_cache_limiter(''); // add this line to the beginning of your php script to disable the cache limiter function:
        }
        $expires = 60 * 60 * 24 * 30; // Cache lifetime 30 days
        $file = FCPATH.'assets/js/bootstrap.min.js';
        $jsFiles = array(
            FCPATH.'assets/js/jquery-1.12.4.min.js',
            $file,
            FCPATH.'assets/js/jquery-ui.min.js',
            FCPATH.'assets/js/ui-loader.min.js',
            FCPATH.'assets/js/scripts.min.js',
        );
        $etag = @md5_file($file); // Generate Etag
        $fileModified = @filemtime($file);
        /*
          Set 304 Not Modified if old visitor
         */
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && isset($_SERVER['HTTP_IF_NONE_MATCH']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $fileModified && trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
            echo $this->Cms_model->setJSCSScache($jsFiles, 'corejs', 'js', $expires);
        } else {
            $this->Cms_model->setJSCSSheader($fileModified, $expires, $etag, 'text/javascript');
            echo $this->Cms_model->setJSCSScache($jsFiles, 'corejs', 'js', $expires);
        }
        $this->output->cache(43200);
        exit(0);
    }


    public function blog(){
        $blogarticle=$this->Cms_model->getarticle();
        $this->load->library("pagination");
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
        $this->load->library('pagination');
        // Pages variable
        $result_per_page = 3;
        $total_row = $this->Cms_model->countData('article_db','active=1');
        $num_link = 10;
        $base_url = $this->Cms_model->base_link().'/blog';

        // Pageination config
        $blogarticle=$this->Cms_model->getarticle();
        $this->Cms_admin_model->pageSetting($base_url, $total_row, $result_per_page, $num_link, 2);
        ($this->uri->segment(2)) ? $pagination = $this->uri->segment(2) : $pagination = 0;
         $blogs=$this->Cms_admin_model->getIndexData('article_db', '', '', 'timestamp_create', 'desc','article_db.active=1','','user_admin','article_db.user_admin_id=user_admin.user_admin_id','','article_db.*,user_admin.name');
         $this->template->setSub('blogs',$blogs);
          $this->template->setSub('blogs',$blogs);
          $this->template->loadFrontViews('static/blog');
      }
    }

    public function blogDetail(){
            $blogid = $this->uri->segment(2);
            $articledetails=$this->Cms_model->getarticleid($blogid);

            //print_r($articledetails['content']); die;
         $blog=$this->Cms_model->getValue('*', 'article_db', 'url_rewrite', "elegant-flower-arrangements-with-christofle");
        $blog_creator=$this->Cms_model->getValue('*', 'user_admin', 'user_admin_id','8');
        
         $this->template->setSub('artdetail',$articledetails);
         $this->template->setSub('blog',$blog);
        $this->template->setSub('blog_creator',$blog_creator);
        $this->template->loadFrontViews('static/blogdetail');
    }

    public function eventEmail()
    {
                $config = $this->Cms_model->load_config();
                $Email_id = $this->Cms_admin_model->getSocialValue('email');

                $name =  ucfirst($this->input->post('name'));
                $emailmy =  ucfirst($this->input->post('email'));
                $contact =  $this->input->post('number');
                $event =  ucfirst($this->input->post('event'));
                $datepicker =  $this->input->post('datepicker');
                $note =  ucfirst($this->input->post('message'));

                $to      = $Email_id;
                $subject = "Event Booking";
                $message ="Welcome to Divinepalate \r\n";
                $message.="\r\n";
                $message.="Booking From:\r\n";
                $message.="\r\n";
                $message.="Name: ".$name."\r\n";
                $message.="Contact: ".$contact."\r\n";
                $message.="Email Address: ".$emailmy."\r\n";
                $message.="For Event: ".$event."\r\n";
                $message.="Dated On: ".$datepicker."\r\n";
                $message.="Note: ".$note."\r\n";
                //$message.='<a href="'.base_url('welcome/verifySupplierEmailAddress/').'/'.$id.'">' .$click.'</a>'."\r\n";
                $headers = "From:". $emailmy ."\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
               
                mail($to,$subject,'<pre style="font-size:14px;">'.$message.'</pre>',$headers);

                 $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'."Booking Sent Successfully".'</div>');

             redirect("blog");
    }



    public function gallery()
    {
        $this->load->library("pagination");
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
        $this->load->library('pagination');
        // Pages variable
        $result_per_page = 3;
        $total_row = $this->Cms_model->countData('gallery_db','active=1');
        $num_link = 10;
        $base_url = $this->Cms_model->base_link().'/gallery';

        // Pageination config
        $this->Cms_admin_model->pageSetting($base_url, $total_row, $result_per_page, $num_link, 2);
        ($this->uri->segment(2)) ? $pagination = $this->uri->segment(2) : $pagination = 0;
         $album=$this->Cms_admin_model->getIndexData('gallery_db', '', '', 'timestamp_create', 'desc',['gallery_db.active'=>'1'],'gallery_db.gallery_db_id','gallery_picture','gallery_db.gallery_db_id=gallery_picture.gallery_db_id','','gallery_db.*,gallery_picture.file_upload');
         
         // echo '<pre>';
         // print_r($album);
         // die();
          $this->template->setSub('album',$album);
          $this->template->loadFrontViews('static/gallery');
      }
    }

    public function albumgallery()
    {
        $slug = $this->uri->segment(2);
        $this->load->library("pagination");
        $config = $this->Cms_model->load_config();
        if($config->maintenance_active){
            $this->template->loadFrontViews('static/maintenance');
        }else{
        $this->load->library('pagination');
        // Pages variable
        $result_per_page = 3;
        $total_row = $this->Cms_model->countData('gallery_db','active=1');
        $num_link = 10;
        $base_url = $this->Cms_model->base_link().'/albumgallery';

        // Pageination config
        $this->Cms_admin_model->pageSetting($base_url, $total_row, $result_per_page, $num_link, 2);
        ($this->uri->segment(2)) ? $pagination = $this->uri->segment(2) : $pagination = 0;
         $gallery=$this->Cms_admin_model->getIndexData('gallery_db', '', '', 'timestamp_create', 'desc',['gallery_db.active'=>'1','url_rewrite'=>$slug],'','gallery_picture','gallery_db.gallery_db_id=gallery_picture.gallery_db_id','','gallery_db.*,gallery_picture.file_upload');

         // echo '<pre>';
         // print_r($gallery);
         // echo $slug;
         // die();
          $this->template->setSub('gallery',$gallery);
          $this->template->loadFrontViews('static/albumgallery');
      }
    }

public function contactEmail()
    {
                $config = $this->Cms_model->load_config();
                $Email_id = $this->Cms_admin_model->getSocialValue('email');

                $fname =  ucfirst($this->input->post('first'));
                $lname =  ucfirst($this->input->post('last'));
                 $comp =  ucfirst($this->input->post('company'));
                 $phone =  $this->input->post('phone');
                $email =  ucfirst($this->input->post('email'));
                $check_box1 =  $this->input->post('checkbox1');
                $check_box2 =  $this->input->post('checkbox2');
                $check_box3 =  $this->input->post('checkbox3');
                $event_date =  $this->input->post('EVENTDATE');
                $event_time =  $this->input->post('EVENTTIME');
                $gname =  $this->input->post('GUESTS');
                $msg =  $this->input->post('message');
                $check1 =  $this->input->post('check1');
                $check2 =  $this->input->post('check2');
                $check3 =  $this->input->post('check3');
                $check4 =  $this->input->post('check4');
                //$lte = $this->input->post('url');
                

                $to      = $Email_id;
                $subject = "Event Booking";
                $message ="Welcome to Divinepalate \r\n";
                $message.="\r\n";
                $message.="Booking From:\r\n";
                $message.="\r\n";
                $message.="First Name: ".$fname."\r\n";
                $message.="Last Name: ".$lname."\r\n";
                $message.="company: ".$comp."\r\n";
                $message.="Contact: ".$phone."\r\n";
                $message.="Email Address: ".$email."\r\n";
                $message.="Subject: ".$check_box1."\r\n";
                $message.="Subject: ".$check_box2."\r\n";
                $message.="Subject: ".$check_box3."\r\n";
                $message.="Event Date: ".$event_date."\r\n";
                $message.="Event Time: ".$event_time."\r\n";
                $message.="Approx No Of Guest: ".$gname."\r\n";
                $message.="Note: ".$msg."\r\n";
                $message.="HOW DID YOU HEAR ABOUT FINE PALATE?: ".$check1."\r\n";
                $message.="HOW DID YOU HEAR ABOUT FINE PALATE?: ".$check2."\r\n";
                $message.="HOW DID YOU HEAR ABOUT FINE PALATE?: ".$check3."\r\n";
                $message.="HOW DID YOU HEAR ABOUT FINE PALATE?: ".$check4."\r\n";
                $message.="Empty Box Message: ".$lte."\r\n";
                //$message.='<a href="'.base_url('welcome/verifySupplierEmailAddress/').'/'.$id.'">' .$click.'</a>'."\r\n";
                $headers = "From:".$email."\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
               
                mail($to,$subject,'<pre style="font-size:14px;">'.$message.'</pre>',$headers);

                 $this->session->set_flashdata('error_message','<div class="alert alert-success" role="alert">'."Booking Sent Successfully".'</div>');

             redirect("blog");
    }

   
}