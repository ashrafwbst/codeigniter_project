<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<!-- Start Admin Menu -->
		<?php echo $this->Article_model->AdminMenu() ?>
		<!-- End Admin Menu -->
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="fa fa-edit"></span></i>
				<?php echo  $this->lang->line('article_header') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->

<div class="row">			
			<div class="col-sm-6">
				<a class="text-white" href="<?php echo $this->Cms_model->base_link(). '/admin/plugin/article/category' ?>">
				<div class="info-box bg-info">
					<div class="pull-left">
						<h4 class="info-box-text text-white">
							<?php echo $this->lang->line('category_total') ?>!
						</h4>
						<h3 class="info-box-number text-white">
							<?php echo $total_cat ?>
						</h3>
					</div>
					<div class="pull-right text-right text-font-large text-white">
						<i class="fa fa-folder-open"></i>
					</div>
				</div>
			</div></a>

			<div class="col-sm-6">
				<a class="text-white" href="<?php echo $this->Cms_model->base_link(). '/admin/plugin/article/article' ?>">
					<div class="info-box bg-cyan">
						<div class="pull-left">
							<h4 class="info-box-text text-white">
								<?php echo $this->lang->line('article_total') ?>!
							</h4>
							<h3 class="info-box-number text-white">
								<?php echo $total_art ?>
							</h3>
						</div>
						<div class="pull-right text-right text-font-large text-white">
							<i class="fa fa-file-text"></i>
						</div>
					</div></a>
	</div>				
			</div>