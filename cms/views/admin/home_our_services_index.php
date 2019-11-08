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

        <div class="h2 sub-header">Our Services</div>
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
        <form method="post" action="<?php echo base_url()."admin/ourservices/update/"; ?>" enctype="multipart/form-data">
            

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Heading</label>
            <input type="text" name="heading" value="<?php echo ($album['heading'] != '') ?  $album['heading'] : 'NA' ; ?>" class="form-control">
        </div> 

         <div class="control-group"> 
            <label class="control-label" for="lang_iso">Sub Heading</label>
            <input type="text" name="sub_heading" value="<?php echo ($album['sub_heading'] != '') ?  $album['sub_heading'] : 'NA' ; ?>" class="form-control">
        </div> 
  

          

      <div class="clearfix"></div><br>

        <div class="control-group">   
            <label class="control-label" for="lang_iso">First Image</label>
            <input type="file" name="image_one" class="form-control">
           <img src="<?php echo base_url()."photo/album/".$album['image_one']; ?>" height="150" width="150">
        </div> 
		
		<div class="control-group"> 
            <label class="control-label" for="lang_iso">Heading</label>
            <input type="text" name="image_one_heading" value="<?php echo ($album['image_one_heading'] != '') ?  $album['image_one_heading'] : 'NA' ; ?>" class="form-control">
        </div> 

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Sub Heading</label>
            <input type="text" name="image_one_subheading" value="<?php echo ($album['image_one_subheading'] != '') ?  $album['image_one_subheading'] : 'NA' ; ?>" class="form-control">
        </div> 
  

		<div class="clearfix"></div>

		  <div class="control-group">   
            <label class="control-label" for="lang_iso">Image Second</label>
            <input type="file" name="image_two" class="form-control">
           <img src="<?php echo base_url()."photo/album/".$album['image_two']; ?>" height="150" width="150">
        </div> 
		
		<div class="control-group"> 
            <label class="control-label" for="lang_iso">Heading</label>
            <input type="text" name="image_two_heading" value="<?php echo ($album['image_two_heading'] != '') ?  $album['image_two_heading'] : 'NA' ; ?>" class="form-control">
        </div> 

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Sub Heading</label>
            <input type="text" name="image_two_subheading" value="<?php echo ($album['image_two_subheading'] != '') ?  $album['image_two_subheading'] : 'NA' ; ?>" class="form-control">
        </div> 
  

          

		<div class="clearfix"></div>
		 <div class="control-group">   
            <label class="control-label" for="lang_iso">Image Third</label>
            <input type="file" name="image_three" class="form-control">
           <img src="<?php echo base_url()."photo/album/".$album['image_three']; ?>" height="150" width="150">
        </div> 
		
		<div class="control-group"> 
            <label class="control-label" for="lang_iso">Heading</label>
            <input type="text" name="image_three_heading" value="<?php echo ($album['image_three_heading'] != '') ?  $album['image_three_heading'] : 'NA' ; ?>" class="form-control">
        </div> 

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Sub Heading</label>
            <input type="text" name="image_three_subheading" value="<?php echo ($album['image_three_subheading'] != '') ?  $album['image_three_subheading'] : 'NA' ; ?>" class="form-control">
        </div> 
  

          

		<div class="clearfix"></div>
       
         <div class="clearfix"></div><br>

         <div class="control-group">   
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
        </div> 

       
         </form>

        <!-- /widget-content --> 
</div>

</div>
    </div>

</div>