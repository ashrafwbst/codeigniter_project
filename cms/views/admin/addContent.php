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

        <div class="h2 sub-header">New Content</div>
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
       <?php $allMenu = $this->Cms_admin_model->getMenus(); ?>
        <form method="post" action="<?php echo base_url()."admin/addContent"; ?>" enctype="multipart/form-data">



        <div class="control-group">   
            <label class="control-label" for="lang_iso">Banner Image</label>
            <input type="file" name="image_one" class="form-control">
        </div> 

       <div class="clearfix"></div><br>

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Banner Heading</label>
            <input type="text" required name="image_heading" class="form-control">
        </div> 

         <div class="control-group">    
            <label class="control-label" for="lang_iso">Banner Sub Heading</label>
            <input type="text" required name="sub_heading" class="form-control">
        </div> 

            
        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Select Page</label>
            <select class="form-control" name="menu_id">
                <?php if(!empty($allMenu))
                {
                    foreach ($allMenu as $value) { ?>
                        <option value="<?php echo $value['page_menu_id']; ?>"><?php echo $value['menu_name']; ?></option>
                  <?php  }
                }

                ?>

                
            </select>
        </div> 
        <div class="control-group">	
            <label class="control-label" for="lang_iso">Album Heading</label>
            <input type="text" required name="heading" class="form-control">
        </div> 
  <div class="clearfix"></div>

           <label class="control-label" for="content">Album Content</label>

            <textarea name="content" id="content" class="form-control body-tinymce"></textarea>

      <div class="clearfix"></div><br>

        <div class="control-group"> 
            <label class="control-label" for="lang_iso">Select Page</label>
            <select class="form-control" name="status">
                <option value="1">Active</option>
                <option value="2">Inactive</option>                
            </select>
        </div> 

         <div class="control-group">   
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div> 

       
	     </form>

        <!-- /widget-content --> 
</div>

</div>
    </div>

</div>