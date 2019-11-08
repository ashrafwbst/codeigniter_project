<?php 
if(!defined('BASEPATH')) exit('NO direct script access allowed');
class EventBlog extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		 $this->lang->load('admin', $this->Cms_admin_model->getLang());
        $this->template->set_template('admin');
        $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->library('session');
        $this->_init();
	}

	   public function _init() {
        $this->template->set('core_css', $this->Cms_admin_model->coreCss());
        $this->template->set('core_js', $this->Cms_admin_model->coreJs());
        $this->template->set('title', 'Backend System | ' . $this->Cms_admin_model->load_config()->site_name);
        $this->template->set('meta_tags', $this->Cms_admin_model->coreMetatags('Backend System for Content Management System'));
        $this->template->set('cur_page', $this->Cms_admin_model->getCurPages());
        if (CACHE_TYPE == 'file') {
            $this->load->driver('cache', array('adapter' => 'file', 'key_prefix' => EMAIL_DOMAIN . '_'));
        } else {
            $this->load->driver('cache', array('adapter' => CACHE_TYPE, 'backup' => 'file', 'key_prefix' => EMAIL_DOMAIN . '_'));
        }
    }

	public function indexEvent()
	{
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
     
        $settings = $this->Cms_admin_model->load_config();

        $allBlog = $this->Cms_admin_model->getAllblog();
         $this->template->setSub('allBlog', $allBlog);
        $this->template->loadSub('admin/event_index');
	}

    public function addBlog()
    {
       
        if($this->input->post())
        {
             $this->form_validation->set_rules('heading', 'Event Heading', 'required');
             $this->form_validation->set_rules('subheading', 'Event Heading', 'required');
             $this->form_validation->set_rules('content', 'Event Content', 'required');

             if($this->form_validation->run() == FALSE)
             {
                $this->session->set_flashdata('error_message','Please fill all the fields');
                redirect("admin/addblog");
             }else
             {
                 $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->insertblogmanager();
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Blog insert successfully');
                     redirect("blog_event_manager");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/addblog");

                }

             }

        }else
        {
            $this->template->loadSub('admin/event_add');
        }
    }

    public function deleteBlog()
    {
        $blogmanager_id = $this->uri->segment(4); 

        $isDeleted = $this->Cms_admin_model->deleteblogmanager($blogmanager_id);

        if($isDeleted > 0)
        {
             $this->session->set_flashdata('success','Blog deleted successfully');
             redirect('blog_event_manager');
        }else
        {
             $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
             redirect('blog_event_manager');
            
        }
    }



    public function updateBlog()
    {
        $blogmanager_id = $this->uri->segment(4); 
         $this->form_validation->set_rules('heading', 'Event Heading', 'required');
         $this->form_validation->set_rules('subheading', 'Event SubHeading', 'required');
         $this->form_validation->set_rules('content', 'Event Content', 'required');
         if($this->input->post())
         {
            if($this->form_validation->run() == FALSE)
             {
                $this->session->set_flashdata('error_message','Please fill all the fields');
                redirect("admin/blog/update/".$blogmanager_id);
             }else
             {
                 $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->updateblogmanager($blogmanager_id);
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Blog update successfully');
                     redirect("blog_event_manager");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/blog/update/".$blogmanager_id);

                }

             }

         }else
         {

             $getBlog = $this->Cms_admin_model->getblogmanager($blogmanager_id);
             $this->template->setSub('blog_manager', $getBlog);
             $this->template->setSub('blogmanager_id', $blogmanager_id);
             $this->template->loadSub('admin/event_edit');

         }
     }

}
?>