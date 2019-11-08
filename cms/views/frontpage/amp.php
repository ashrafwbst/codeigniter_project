<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = $this->Cms_model->load_config();
if ($config->site_logo) {
    $logo = '<amp-img src="' . base_url() . 'photo/logo/' . $config->site_logo . '" layout="responsive" width="180" height="50" sizes="(min-width: 320px) 180px, 50px" alt="' . $config->site_name . '"></amp-img>';
} else {
    $logo = $config->site_name;
}
?>
<!doctype html>
<html amp lang="<?php echo $this->session->userdata('fronlang_iso') ?>">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <?php echo $canonical ?>
        <link rel="icon" href="<?php echo base_url().'assets/images/logo.png'?>">
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
        
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand page-scroll" href="<?php echo base_url() ?>"><?php echo $logo; ?></a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Start For Content -->
        <?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', preg_replace("/<img[^>]+\>/", "", $content)); ?>
        <!-- End For Content -->

        <div class="container">
            <footer>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', preg_replace("/<img[^>]+\>/", "", $this->Headfoot_html->footer()));?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
        <!-- REMOVED: Bootstrap core JavaScript -->
    </body>
</html>