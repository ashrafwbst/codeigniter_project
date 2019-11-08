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

        <div class="h2 sub-header">New Client</div>
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
        <form method="post" action="<?php echo base_url()."admin/addClient"; ?>" enctype="multipart/form-data">
            

        <div class="control-group">   
            <label class="control-label" for="lang_iso">Album Image</label>
            <input type="file" name="album_image" class="form-control">
        </div> 

     <br>

         <div class="control-group">   
            <input type="submit" class="btn btn-primary" name="submit">
        </div> 

       
	     </form>

        <!-- /widget-content --> 
</div>

</div>
    </div>

</div>