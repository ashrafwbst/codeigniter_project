<?php

error_reporting(0);

defined('BASEPATH') OR exit('No direct script access allowed');

class Formsubmit extends CI_Controller {
      
    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        if($this->Cms_model->load_config()->maintenance_active){
            //Return to home page
            redirect(base_url(), 'refresh');
        }
    }

    public function index(){
    		
    	$data=[];
    	$data['frm'] = $_GET;
    	$frm_rs = $this->Cms_model->getValue('*', 'form_main', 'form_main_id',1, 1);
    	if ($frm_rs !== FALSE && $frm_rs->active) {
    		$data['frm_rs'] = $frm_rs;

    		$message_html .= "<br><b>Name</b>: ".$_GET['name']."<br><b>Eamil</b>: ".$_GET['email']."<br><b>Contact details</b>: ".$_GET['mobile']."<br><b>Message</b>: ".$_GET['message']."<br>".$_GET['full_msg']."<br><b>Country</b>: ".$_GET['Country']."<br><b>Property Type</b>: ".$_GET['Property']."<br><b>Property Status</b>: ".$_GET['Status']."<br><b>Area Size</b>: ".$_GET['Area_Size']."<br><b>Amount</b>: ".$_GET['amount']."<br><b>Collection Period</b>: ".$_GET['collection_period']."<br><b>Loan Required</b>: ".$_GET['loan_required']."<br><b>Style</b>: ".$_GET['style']."<br><b>Renovation Priority</b>: ".$_GET['renovation_priority'];


    		if($frm_rs->save_to_db == 1){
                $this->db->set('ip_address', $this->input->ip_address(), TRUE);
                $this->db->set('timestamp_create', 'NOW()', FALSE);
                $this->db->insert('form_' . $frm_rs->form_name, $data);
            }
            $email_from = $_GET['email'];
            $visit_email = '';
            if($frm_rs->send_to_visitor && $frm_rs->email_field_id){
                $visit_field = $this->Cms_model->getValue('field_name', 'form_field', 'form_field_id', $frm_rs->email_field_id, 1);
                if($visit_field->field_name && $frm_rs->visitor_subject){
                    $visit_email = $this->Cms_model->cleanEmailFormat($this->input->post_get($visit_field->field_name, TRUE));
                    $webconfig = $this->Cms_admin_model->load_config();
                    @$this->Cms_model->sendEmail($visit_email, $frm_rs->visitor_subject, $frm_rs->visitor_body, $email_from, $webconfig->site_name, '', $email_from);
                }
            }

    		$this->sendMail($frm_rs->sendmail, $frm_rs->email, $_GET['email'], $frm_rs->subject, $message_html, $frm_rs->form_method, $frm_rs->form_name, $visit_email);
                //Return to last page: Success
            $this->session->set_flashdata('formtag_error_message','<div class="alert alert-success text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $frm_rs->success_txt . '</div>');
            // die();
            redirect('get-in-touch', 'refresh');

    	}else{
    		redirect(base_url(), 'refresh');
    	}
		$response = array(
		'response_code' => 200,
		'device_id'=> $this->input->get('device_id'),
		'allowed_hours'=> $this->input->get('allowed_hours'),
		'product'=> 'mlc',
		'prov_ur'=> NULL 
		);

		return $this->output
		->set_content_type('Content-Type: application/json')
		->set_output(json_encode([$data])); 
		
	}

	private function sendMail($active = '', $email_to = '', $email_from = '', $subject = '', $message = '', $form_method = '', $form_name = '', $reply_to = '') {
        if ($active) {
            $webconfig = $this->Cms_admin_model->load_config();
            # ---- set from, to, bcc --#
            $from_name = $webconfig->site_name;
            $from_email = $email_from;
            if($email_to){
                $to_email = $this->Cms_model->cleanEmailFormat($email_to);
            }else{
                $to_email = $webconfig->default_email;
            }
            $file_attach = array();
            $message_html = $this->Cms_model->getLabelLang('email_dear') . $to_email . ',<br><br>';
            $message_html.= $message;
            $message_html.= '<br><br>' . $this->Cms_model->getLabelLang('email_footer') . ' <br><a href="' . $this->Cms_model->base_link(). '" target="_blank"><b>' . $webconfig->site_name . '</b></a>';
                    //echo $to_email.'<br>'.$subject.'<br>'.$message_html.'<br>'.$from_email.'<br>'.$from_name.$reply_to; die;
            @$this->Cms_model->sendEmail($to_email, $subject, $message_html, $from_email, $from_name, '', $_GET['email'], '', $file_attach);
        } else {
            return FALSE;
        }
    }


}

?>