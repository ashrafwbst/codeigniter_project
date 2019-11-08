<!-- Page Heading -->

<div class="row">

	<div class="col-lg-12">

		<ol class="breadcrumb">

			<li class="active">

				<i><span class="glyphicon glyphicon-globe"></span></i>

				<?php echo  $this->lang->line('pages_header') ?>

			</li>

		</ol>
s
	</div>

</div>

<!-- /.row -->

<div class="row">

	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header" style="margin-bottom: 15px;">
			Event Album <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/addblog" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Add Events</a>
		</div>
		<div class="card">
			<div class="card-body">
				 <?php 
                 echo validation_errors();
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
			<!-- 	<div class="pull-right">
					<form id="lang_sel">
						<div class="control-group-fluid" style="padding-bottom: 15px;">
							<?php echo  $this->lang->line('lang_header') ?>:
							<select class="form-control-static" onchange="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/pages/?lang='+this.options[this.selectedIndex].value);" onblur="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/pages/?lang='+this.options[this.selectedIndex].value);">
								<option value="all">
									<?php echo  $this->lang->line('option_all') ?>
								</option>
								<?php foreach ($lang as $lg) { ?>
								<option value="<?php echo $lg->lang_iso?>" <?php echo ($this->input->get('lang') == $lg->lang_iso)?' selected="selected"':''?>>
									<?php echo $lg->lang_name?>
								</option>
								<?php } ?>
							</select>
						</div>
					</form>
				</div>
 -->
				<div class="box box-body table-responsive no-padding">

					<table class="table table-hover">

						<thead>

							<tr>

								<th>

									<?php echo $this->lang->line('id_col_table'); ?>

								</th>
									
								
								
								<th width="30%" >

									Heading

								</th>
								<th width="30%" >

									Sub Heading

								</th>


								<th>

								Image

								</th>
								<!-- <th>

								Sub Images

								</th> -->

								

								<th >

									Status

								</th>

							

								<th >
									Add Date
								</th>

								<th>Action</th>

							</tr>

						</thead>

						<tbody>

							<?php if(!empty($allBlog))
							{
								$counter = 1;
								foreach ($allBlog as $value) { ?>

								<tr>
									<td><?php echo $counter++; ?></td>
									<!-- <?php $getName =  $this->Cms_admin_model->getPageName($value['menu_id']) ; ?> -->
									
								
									<td><?php echo $value['heading']; ?></td>
									<td><?php echo $value['subheading']; ?></td>
									<td><img height="150" width="150" src="<?php echo base_url()."photo/blog/".$value['image']; ?>"></td>
								 <!-- <td><a href="<?php echo base_url('admin/blog/subimageIndex/').$value['id']; ?>">View Sub Images</a></td> --> 
									<td><?php echo ($value['status'] == 1) ? 'Active' : 'InActive'; ?></td>
									<td><?php echo $value['add_date']; ?></td>

									<td><a href="<?php echo base_url()."admin/blog/update/".$value['id'] ; ?>" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; 
										<a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(<?php echo $value['heading']; ?>)" href="<?php echo base_url()."admin/blog/delete/".$value['id'];  ?>"><i class="fa fa-trash-o"></i></a>
									</td>
									
								</tr>

                                           


									
							<?php	}

                             
							}?>

							

						</tbody>

					</table>

				</div>

				

				<b>

					

				</b>

				<!-- /widget-content -->

				<br><br>

				
			</div>

		</div>
	</div>

</div>

	<script type="text/javascript">
		    function delete(value)
		    {
		      if(confirm("Are you sure you want to delete album: "+value))
		      {
		        return true;
		      }else
		      {
		        return false;
		      }
		    }
		   </script>