<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="fa fa-user"></span></i> <?php echo  $this->lang->line('categories') ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo  $this->lang->line('categories') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/addproductcategory" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('category_new') ?></a></div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">		
					<form action="<?php echo $this->Cms_model->base_link(). '/admin/addproductcategory'; ?>" method="get">
						<div class="control-group-fluid">
							<label class="control-label" for="search"><?php echo $this->lang->line('search'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>"></label>               
							<input type="submit" name="submit" id="submit" class="btn btn-default" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>
        		<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="10%"><?php echo $this->lang->line('category_name'); ?></th>
					
								<th width="25%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($categories === FALSE) { ?>
								<tr>
									<td colspan="5" class="text-center"><span class="h6 error"><?php echo  $this->lang->line('data_notfound') ?></span></td>
								</tr>                           
							<?php } else { ?>
								<?php
								foreach ($categories as $category) {
									
									echo '<tr>';
									echo '<td>' . $category['category_name']. '</td>';
							
									echo '<td ><a href="'.$this->Cms_model->base_link().'/admin/product/editcategory/' . $category['id'] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\''.$this->lang->line('category_delete_message').'\')" href="'.$this->Cms_model->base_link().'/admin/product/deletecategory/'.$category['id'].'"><i class="fa fa-trash-o"></i></a></td>';
									echo '</tr>';
								}
							}
							?>
						</tbody>
					</table>
				</div>
        		<?php echo $this->pagination->create_links(); ?> <b><?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?></b>
				<!-- /widget-content -->
			</div>
		</div>
    </div>
</div>
