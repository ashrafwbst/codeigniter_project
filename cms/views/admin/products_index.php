<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="fa fa-user"></span></i> <?php echo  $this->lang->line('product') ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo  $this->lang->line('product') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/addproduct" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('product_new') ?></a></div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">		
					<form action="<?php echo $this->Cms_model->base_link(). '/admin/products/'; ?>" method="get">
						<div class="control-group-fluid">
							<label class="control-label" for="search"><?php echo $this->lang->line('search'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>"></label>               
							<input type="submit" name="submit" id="submit" class="btn btn-default" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>
        		<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl" id="list-prod">
						<thead>
							<tr>
								<th width="10%"><?php echo $this->lang->line('product_new_name'); ?></th>
								<th width="20%"><?php echo $this->lang->line('product_price'); ?></th>
								<th width="30%"><?php echo $this->lang->line('product_image'); ?></th>
								<th width="15%"><?php echo $this->lang->line('product_category'); ?></th>
								<th width="15%"><?php echo $this->lang->line('subcategorie'); ?></th>
								<th width="25%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($products === FALSE) { ?>
								<tr>
									<td colspan="5" class="text-center"><span class="h6 error"><?php echo  $this->lang->line('data_notfound') ?></span></td>
								</tr>                           
							<?php } else { ?>
								<?php
								foreach ($products as $u) {
									$uu=$this->db->get_where('product_subcategory',array('id'=>$u['product_subcategory']))->row_array();
									echo '<tr>';
									echo '<td>' . $u['product_name']. '</td>';
									echo '<td>' .'$'. number_format($u['product_price'],2). '</td>';
									 if($u['product_image']){?>
									<td><div><img class="img-thumbnail img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url().'photo/products/'. $u['product_image'];?>"></div></td>
									<?php }else{ ?>
										<td><div><img class="img-thumbnail img-responsive" style="width: 100px;height: 100px;" src="<?php echo base_url().'photo/logo/2019/1549018343_1-org.jpg';?>"></div></td>
									<?php }
									echo '<td>' . $u['category_name'] . '</td>';
									echo '<td>' . $uu['category_name'] . '</td>';
									echo '<td ><a href="'.$this->Cms_model->base_link().'/admin/product/edit/' . $u['id'] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\''.$this->lang->line('product_delete_message').'\')" href="'.$this->Cms_model->base_link().'/admin/product/delete/'.$u['id'].'"><i class="fa fa-trash-o"></i></a></td>';
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

