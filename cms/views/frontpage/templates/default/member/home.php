<div class="container">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="h2 sub-header"><?php echo $this->Cms_model->getLabelLang('member_dashboard_text') ?></div>
            <hr>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3">
            <?php echo $this->Headfoot_html->memberleftMenu(); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading"><b><i class="glyphicon glyphicon-user"></i> <?php echo $this->Cms_model->getLabelLang('your_profile') ?></b></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-center">
                            <?php if ($users->picture) { ?>
                                <img src="<?php echo base_url() . 'photo/profile/' . $users->picture; ?>" class="img-circle" alt="Profile Photo" width="160" height="160">
                            <?php } else { ?>
                                <img src="<?php echo base_url() . 'photo/no_image.png'; ?>" class="img-circle" alt="Profile Photo" width="160" height="160">
                            <?php } ?>
                            <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <p><b><?php echo $this->Cms_model->getLabelLang('display_name') ?>:</b> <?php echo ($users->name) ? $users->name : '-'; ?></p>
                            <p><b><?php echo $this->Cms_model->getLabelLang('email_address') ?>:</b> <?php echo ($users->email) ? $users->email : '-'; ?></p>
                            <p><b><?php echo $this->Cms_model->getLabelLang('first_name') ?> - <?php echo $this->Cms_model->getLabelLang('last_name') ?>:</b> <?php echo ($users->first_name) ? ucfirst($users->first_name) : '-'; ?> <?php echo ($users->last_name) ? ucfirst($users->last_name) : ''; ?></p>
                            <p><b><?php echo $this->Cms_model->getLabelLang('birthday') ?>:</b> <?php echo ($users->birthday && $users->birthday != '0000-00-00') ? date('d F Y', strtotime($users->birthday)) : '-'; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p><b><?php echo $this->Cms_model->getLabelLang('gender') ?>:</b> <?php echo ($users->gender) ? ucfirst($users->gender) : '-'; ?></p>
                            <p><b><?php echo $this->Cms_model->getLabelLang('phone') ?>:</b> <?php echo ($users->phone) ? $users->phone : '-'; ?></p>
                            <p><b><?php echo $this->Cms_model->getLabelLang('address') ?>:</b> <?php echo($users->address) ? $users->address : '-'; ?></p>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>