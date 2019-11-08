<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="glyphicon glyphicon-globe"></span></i> <?php echo $this->lang->line('genlabel_header') ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo $this->lang->line('genlabel_header') ?> <a href="<?php echo $this->Cms_model->base_link(). '/admin/genlabel/synclang'?>" style="margin-bottom: 15px;" class="btn btn-success" onclick="return confirm('<?php echo $this->lang->line('delete_message');?>')"><i class="glyphicon glyphicon-refresh"></i> <?php echo $this->lang->line('btn_label_synclang')?></a></div>
		<div class="card">
			<div class="card-body">
        		<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="7%"><?php echo $this->lang->line('id_col_table'); ?></th>
								<th width="50%"><?php echo $this->lang->line('genlabel_name'); ?></th>
								<th width="33%"><?php echo $this->lang->line('genlabel_lang'); ?></th>
								<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($genlab === FALSE) { ?>
								<tr>
									<td colspan="3" class="text-center"><span class="h6 error"><?php echo  $this->lang->line('data_notfound') ?></span></td>
								</tr>                           
							<?php } else { ?>
								<?php
								foreach ($genlab as $gl) {
									$lang_show = '';
									echo '<tr>';
									echo '<td>' . $gl['general_label_id'] . '</td>';
									echo '<td>' . $gl['name'] . '</td>';
									echo '<td>';
									foreach ($lang as $key => $value) { 
										if($this->db->field_exists('lang_'.$key, 'general_label')){
											if($gl['lang_'.$key]){
												$lang_show.= '<span class="success">'.$value.'</span>, ';
											}else{
												$lang_show.= '<span class="error"><b>'.$value.'</b></span>, ';
											}
										}
									}
									echo rtrim($lang_show, ", ");
									echo '</td>';
									echo '<td><a href="'.$this->Cms_model->base_link().'/admin/genlabel/edit/' . $gl['general_label_id'] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a></td>';
									echo '</tr>';
								} ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
        		<?php echo $this->pagination->create_links(); ?>
        	</div>
		</div>
    </div>
</div>
