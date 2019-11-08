<!-- Page Heading -->

<div class="row">

	<div class="col-lg-12">

		<ol class="breadcrumb">

			<li class="active">

				<i><span class="glyphicon glyphicon-user"></span></i>
				<?php echo  $this->lang->line('user_member_txt') ?>

			</li>

		</ol>

	</div>

</div>

<!-- /.row -->

<div class="row">

	<div class="col-lg-12 col-md-12">

		<div class="h2 sub-header">
			<?php echo $users->name; ?> <a href="<?php echo $this->cms_referrer->getIndex()?>" class="btn btn-default btn-sm" style="margin-bottom: 15px;"><i class="fa fa-arrow-left"></i> <?php echo $this->lang->line('btn_back') ?></a>
		</div>

		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="user_view_detail">
							<div class="user_img">	
								<?php if($users->picture && $users->picture != NULL){ ?>
								<img src="<?php echo base_url() . 'photo/profile/' . $users->picture; ?>" class="img-circle" alt="Profile Photo" width="150" height="150">
								<?php }else{ ?>
								<img src="<?php echo base_url() . 'photo/no_image.png'; ?>" class="img-circle" alt="Profile Photo" width="150" height="150">
								<?php } ?>
							</div>
							<h4><?php echo ($users->name && $users->name != NULL) ? $users->name : '-'; ?></h4>
							<h6><?php $user_group = $this->Cms_auth_model->get_groups_fromuser($users->user_admin_id); ?><?php echo ($user_group !== FALSE) ? $user_group->name : '-' ; ?></h6>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_new_email') ?>:</small>
							<h5><?php if($this->session->userdata('admin_visitor') == 0){ echo ($users->email && $users->email != NULL) ? $users->email : '-'; }else{ echo $this->lang->line('user_not_allow_txt'); } ?></h5>
						</div>
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_first_name') ?></small>
							<h5><?php echo ($users->first_name && $users->first_name != NULL) ? ucfirst($users->first_name) : '-'; ?></h5>
						</div>
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_last_name') ?>:</small>
							<h5><?php echo ($users->last_name && $users->last_name != NULL) ? ucfirst($users->last_name) : '-'; ?></h5>
						</div>
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_birthday') ?>:</small>
							<h5><?php echo ($users->birthday && $users->birthday != '0000-00-00' && $users->birthday != NULL) ? date('d F Y', strtotime($users->birthday)) : '-'; ?></h5>
						</div>
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_gender') ?>:</small>
							<h5><?php echo ($users->gender && $users->gender != NULL) ? ucfirst($users->gender) : '-'; ?></h5>
						</div>
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_phone') ?>:</small>
							<h5><?php echo ($users->phone && $users->phone != NULL) ? $users->phone : '-'; ?></h5>
						</div>
						<div class="detail_view_section">
							<small><?php echo $this->lang->line('user_address') ?>:</small>
							<h5><?php echo($users->address && $users->address != NULL) ? $users->address : '-'; ?></h5>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>