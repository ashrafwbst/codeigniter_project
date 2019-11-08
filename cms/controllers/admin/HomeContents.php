<?php 
if(!defined('BASEPATH')) exit('NO direct script access allowed');
class HomeContents extends CI_Controller
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

    public function ourPartner()
    {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        $settings = $this->Cms_admin_model->load_config();
        $our_partners = $this->Cms_admin_model->getAllPartners(); 
        $this->template->setSub('our_partners', $our_partners);
        $this->template->loadSub('admin/our_partner_index');
    }

    public function updatePartner()
    {
        $client_id = $this->uri->segment(3); 
           $this->form_validation->set_rules('heading', 'Heading', 'required');
         $this->form_validation->set_rules('content', 'Sub Heading', 'required');
        
            if($this->form_validation->run() == FALSE)
             {
                $this->session->set_flashdata('error_message','Please fill all the fields');
                redirect("admin/ourPartners/");
             }else
             {
                 $this->db->cache_delete_all();
                $updated =  $this->Cms_admin_model->updatePartner();
                if($updated > 0)
                {
                     $this->session->set_flashdata('success','Partners update successfully');
                     redirect("admin/ourPartners");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/ourPartners/");

                }

             }
    }


    public function ourClients()
    {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
     
        $settings = $this->Cms_admin_model->load_config();
        
        $our_clients = $this->Cms_admin_model->getAllClients(); 
        $this->template->setSub('our_clients', $our_clients);
       $this->template->loadSub('admin/our_clients_index');
    }

    public function addClient()
    {
       
        if($this->input->post())
        {
                $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->insertClientImg();
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Client Image insert successfully');
                     redirect("admin/ourClients/");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/ourClients/");
                }

        }else
        {

            $this->template->loadSub('admin/client_add');
        }
    }

    public function deleteClient()
    {
        $client_id = $this->uri->segment(3); 

        $isDeleted = $this->Cms_admin_model->deletClientImg($client_id);

        if($isDeleted > 0)
        {
             $this->session->set_flashdata('success','Imgae deleted successfully');
             redirect("admin/ourClients");
        }else
        {
             $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
             redirect("admin/ourClients");
            
        }
    }

	public function ourServices()
	{
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
     
        $settings = $this->Cms_admin_model->load_config();
        
        $allAlbums = $this->Cms_admin_model->getServices();
        $this->template->setSub('album', $allAlbums);
       $this->template->loadSub('admin/home_our_services_index');
	}

  


    public function ourServicesUpdate()
    {
        
         $this->form_validation->set_rules('heading', 'Heading', 'required');
         $this->form_validation->set_rules('sub_heading', 'Sub Content', 'required');
         if($this->input->post())
         {
            if($this->form_validation->run() == FALSE)
             {
                $this->session->set_flashdata('error_message','Please fill all the fields');
                redirect("admin/ourServices/");
             }else
             {
                 $this->db->cache_delete_all();
                $updated =  $this->Cms_admin_model->updateServices();
                if($updated > 0)
                {
                     $this->session->set_flashdata('success','Album update successfully');
                     redirect("admin/ourServices");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/ourServices/");

                }

             }

         }else
         {

            
         }
     }



    public function mngContent()
    {
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
        $settings = $this->Cms_admin_model->load_config();

        $contents = $this->Cms_admin_model->getAllContents(); 
        $this->template->setSub('contents', $contents);
        $this->template->loadSub('admin/content_index');
    }

    public function addContent()
    {
       
        if($this->input->post())
        {
                $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->insertContent();
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Content added successfully');
                     redirect("admin/content/");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/content/");
                }

        }else
        {
           // $getMenus = $this->Cms_admin_model->getMenus();
            $this->template->loadSub('admin/addContent');
        }
    }


       public function updateContent()
    {
        $content_id = $this->uri->segment(3); 
         if($this->input->post())
         {
                 $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->updateContent($content_id);
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Content updated successfully');
                      redirect("admin/updateContent/".$content_id); 

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/updateContent/".$content_id);
                }

         }else
         {

             $upContent = $this->Cms_admin_model->getContentByID($content_id); 
         
             $this->template->setSub('upContent', $upContent);
             $this->template->loadSub('admin/updateContent');

         }
     }




}
?>