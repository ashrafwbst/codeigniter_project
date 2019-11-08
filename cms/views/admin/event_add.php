<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">

                <i><span class="glyphicon glyphicon-globe"></span></i> <?php echo  $this->lang->line('pages_addnew') ?>

            </li>

        </ol>

    </div>

</div>

<!-- /.row -->

<div class="row">

    <div class="col-lg-12 col-md-12">

        <div class="h2 sub-header">New Event</div>
		<div class="card">
			<div class="card-body">
                 <?php 
                // echo validation_errors();
                  if($this->session->flashdata('success'))
                    { ?>
                        <div class="" style="color:green">
                     <?php      echo $this->session->flashdata('success'); ?>
                       </div>
                     <?php  }  ?>

                   <?php   if($this->session->flashdata('error_message'))
                    { ?>
                        <div class="" style="color:red">
                     <?php      echo $this->session->flashdata('error_message'); ?>
                       </div>
                     <?php  } ?>

               
       <!--  <?php //echo form_open($this->Cms_model->base_link(). '/admin/pages/insert'); ?> -->
     
        <form method="post" action="<?php echo base_url()."admin/addblog"; ?>" enctype="multipart/form-data">
            
        
        <div class="control-group">	
            <label class="control-label" for="lang_iso">Event Heading</label>
            <input type="text" name="heading" class="form-control">
        </div> 
        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Event SubHeading</label>
            <input type="text" name="subheading" class="form-control">
        </div> 
  <div class="clearfix"></div>

           <label class="control-label" for="content">Event Content</label>

            <textarea name="content" id="content" class="form-control body-tinymce"></textarea>

      <div class="clearfix"></div><br>

        <div class="control-group">   
            <label class="control-label" for="lang_iso">Event Image</label>
            <input type="file" name="blog_image" class="form-control">
        </div> 

         <!-- <div class="control-group">   
            <label class="control-label" for="lang_iso">Event Date</label>
            <input type="date" id="start" name="trip-start">

        </div>  -->

         <div class="control-group">   
            <input type="submit" class="btn btn-primary" name="submit">
        </div> 

       
	     </form>

        <!-- /widget-content --> 
</div>

</div>
    </div>

</div>