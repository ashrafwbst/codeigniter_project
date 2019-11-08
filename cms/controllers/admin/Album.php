<?php 
if(!defined('BASEPATH')) exit('NO direct script access allowed');
class Album extends CI_Controller
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

	public function index()
	{
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
     
        $settings = $this->Cms_admin_model->load_config();

        $allAlbums = $this->Cms_admin_model->getAllAlbums();
         $this->template->setSub('allAlbums', $allAlbums);
        $this->template->loadSub('admin/album_index');
	}

    public function addAlbum()
    {   

        if($this->input->post())
        {

        //     print_r($_POST);
        // print_r($_FILES);
        // die;
             $this->form_validation->set_rules('heading', 'Album Heading', 'required');
             $this->form_validation->set_rules('content', 'Album Content', 'required');

             if($this->form_validation->run() == FALSE)
             {
                $this->session->set_flashdata('error_message','Please fill all the fields');
                redirect("admin/addAlbum");
             }else
             {
                 $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->insertAlbum();
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Album insert successfully');
                     redirect("album");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/addAlbum");

                }

             }

        }else
        {
            $this->template->loadSub('admin/album_add');
        }
    }

    public function delete()
    {
        $album_id = $this->uri->segment(4); 

        $isDeleted = $this->Cms_admin_model->deletAlbum($album_id);

        if($isDeleted > 0)
        {
             $this->session->set_flashdata('success','Album deleted successfully');
             redirect('album');
        }else
        {
             $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
             redirect('album');
            
        }
    }



    public function update()
    {
        $album_id = $this->uri->segment(4); 
         $this->form_validation->set_rules('heading', 'Album Heading', 'required');
         $this->form_validation->set_rules('content', 'Album Content', 'required');
         if($this->input->post())
         {
            if($this->form_validation->run() == FALSE)
             {
                $this->session->set_flashdata('error_message','Please fill all the fields');
                redirect("admin/album/update/".$album_id);
             }else
             {
                 $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->update($album_id);
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Album update successfully');
                     redirect("album");

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/album/update/".$album_id);

                }

             }

         }else
         {

             $getAlbum = $this->Cms_admin_model->getAlbum($album_id);
             $this->template->setSub('album', $getAlbum);
             $this->template->setSub('album_id', $album_id);
             $this->template->loadSub('admin/album_edit');

         }
     }


   public function subimageIndex()
    {
         $album_id = $this->uri->segment(4); 
        admin_helper::is_logged_in($this->session->userdata('admin_email'));
     
        $settings = $this->Cms_admin_model->load_config();

         $allAlbums = $this->Cms_admin_model->getAllSubAlbums($album_id);
         $this->template->setSub('allAlbums', $allAlbums);
          $this->template->setSub('album_id', $album_id);
        $this->template->loadSub('admin/album_subImage_index');
    }

    public function SubAlbumdelete()
    {
        $sub_album_id = $this->uri->segment(4); 
        $album_id = $this->uri->segment(5); 

        $isDeleted = $this->Cms_admin_model->deletSubAlbum($sub_album_id);

        if($isDeleted > 0)
        {
             $this->session->set_flashdata('success','Sub image deleted successfully');
             redirect("admin/album/subimageIndex/".$album_id);
        }else
        {
             $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
             redirect("admin/album/subimageIndex/".$album_id);
            
        }
    }

    

    public function addSubAlbum()
    {
        $album_id = $this->uri->segment(3); 


       
        if($this->input->post())
        {
                $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->insertSubAlbum();
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Sub Album insert successfully');
                     redirect("admin/album/subimageIndex/".$album_id);

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/album/subimageIndex/".$album_id);

                }

           

        }else
        {
             $this->template->setSub('album_id', $album_id);
            $this->template->loadSub('admin/add_album_subImage');
        }
    }

     public function updateSubAlbum()
    {
        $sub_album_id = $this->uri->segment(3); 
        $album_id = $this->uri->segment(4); 
      
         if($this->input->post())
         {
             
                 $this->db->cache_delete_all();
                $isInserted =  $this->Cms_admin_model->updateSubAlbum($sub_album_id);
                if($isInserted > 0)
                {
                     $this->session->set_flashdata('success','Album update successfully');
                      redirect("admin/album/subimageIndex/".$album_id);

                }else
                {
                    $this->session->set_flashdata('error_message','oops something went wrong! Please try after some time');
                    redirect("admin/album/subimageIndex/".$album_id);
                }

         }else
         {

             $getsubAlbum = $this->Cms_admin_model->getSubAlbum($sub_album_id);
             $this->template->setSub('album', $getsubAlbum);
             $this->template->setSub('sub_album_id', $sub_album_id);
             $this->template->setSub('album_id', $album_id);
             $this->template->loadSub('admin/sub_album_edit');

         }
     }



}
?>