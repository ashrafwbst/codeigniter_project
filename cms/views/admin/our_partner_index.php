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

        <div class="h2 sub-header">Update Partners</div>
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
        <form method="post" action="<?php echo base_url()."admin/updatePartner/".$our_partners['id'] ; ?>" enctype="multipart/form-data">

        <div class="control-group">   
            <label class="control-label" for="lang_iso">Background Image</label>
            <input type="file" name="background_image" class="form-control">
           <img src="<?php echo base_url()."photo/partner/".$our_partners['background_image']; ?>" height="150" width="150">
        </div> 
            

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Heading</label>
            <input type="text" name="heading" value="<?php echo ($our_partners['heading'] != '') ?  $our_partners['heading'] : 'NA' ; ?>" class="form-control">
        </div> 
  <div class="clearfix"></div>

           <label class="control-label" for="content">Sub Heading</label>

            <textarea name="content" id="content" class="form-control body-tinymce"><?php echo ($our_partners['sub_heading'] != '') ?  $our_partners['sub_heading'] : 'NA' ; ?></textarea>


        <div class="control-group">   
            <label class="control-label" for="lang_iso">Image 1</label>
            <input type="file" name="image_one" class="form-control">
           <img src="<?php echo base_url()."photo/partner/".$our_partners['image_one']; ?>" height="150" width="150">
        </div> 
         <div class="control-group">   
            <label class="control-label" for="lang_iso">Image 2</label>
            <input type="file" name="image_two" class="form-control">
           <img src="<?php echo base_url()."photo/partner/".$our_partners['image_two']; ?>" height="150" width="150">
        </div> 
         <div class="control-group">   
            <label class="control-label" for="lang_iso">Image 3</label>
            <input type="file" name="image_three" class="form-control">
           <img src="<?php echo base_url()."photo/partner/".$our_partners['image_three']; ?>" height="150" width="150">
        </div> 
         <div class="control-group">   
            <label class="control-label" for="lang_iso">Image 4</label>
            <input type="file" name="image_four" class="form-control">
           <img src="<?php echo base_url()."photo/partner/".$our_partners['image_four']; ?>" height="150" width="150">
        </div> 



        
         <div class="clearfix"></div><br>

         <div class="control-group">   
            <input type="submit" class="btn btn-primary" name="submit">
        </div> 

       
         </form>

        <!-- /widget-content --> 
</div>

</div>
    </div>

</div>