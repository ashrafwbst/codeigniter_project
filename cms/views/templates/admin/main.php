<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
header( "Cache-Control: no-cache, no-store, must-revalidate" ); /* HTTP 1.1. */
header( "Pragma: no-cache" ); /* HTTP 1.0. */
header( "Expires: 0" ); /* Proxies. */
$row = $this->Cms_admin_model->load_config();
?><?php $config = $this->Cms_admin_model->load_config();

?>
<?php echo doctype('html5') ?>
<html lang="<?php echo $row->admin_lang ?>">
<head>
	<meta http-equiv="refresh" content="7205;url=<?php echo $this->Cms_model->base_link().'/admin/logout'; ?>"/>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<?php echo $meta_tags ?>
	<?php echo link_tag(base_url('', '', TRUE).'templates/admin/favicon.ico', 'shortcut icon', 'image/ico','','', FALSE); ?>
	<?php echo $core_css ?>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url('', '', TRUE) ?>templates/admin/favicon.ico"/>
	<link rel="icon" sizes="192x192" href="<?php echo base_url('', '', TRUE) ?>templates/admin/img/cms_icon_192.png">
	<link rel="apple-touch-icon" sizes="128x128" href="<?php echo base_url('', '', TRUE) ?>templates/admin/img/cms_icon_128.png"/>
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('', '', TRUE) ?>templates/admin/img/cms_icon_152.png"/>
	<link rel="manifest" href="<?php echo $this->Cms_model->base_link() ?>/admin/manifest">
	<meta name="theme-color" content="#337ab7">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<title>
		<?php echo $title ?>
	</title>
</head>
<?php
@$page2 = $this->uri->segment( 2 );
@$page3 = $this->uri->segment( 3 );
if ( $page2 == 'login' || $page3 == 'forgot' ) {
	?>

<body class="hold-transition skin-blue sidebar-mini auth-bg">
	<?php 
			}
			else{ 
			?>

	<body class="hold-transition skin-blue sidebar-mini">
		<?php 
			}
			?>

		<?php if($this->session->userdata('user_admin_id') && $this->session->userdata('admin_email') && $this->session->userdata('admin_logged_in')){ ?>
		<?php $users = $this->Cms_admin_model->getUser($this->session->userdata('user_admin_id')); /* Get admin user information */
            ($users->picture) ? $user_img = base_url() . 'photo/profile/' . $users->picture : $user_img = base_url() . 'photo/no_image.png'; ?>
		<div class="fixed layout-boxed layout-boxed-fixed">
		<div class="wrapper">
			
			
			<!-- Start topbar -->
			<header class="main-header">
				<!-- Logo -->
				<a class="logo" href="<?php echo $this->Cms_model->base_link().'/admin'; ?>">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>CMS</b></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b><?php echo $this->lang->line('backend_system'); ?></b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
				
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->
							<?php if( 0 && $this->Cms_auth_model->is_group_allowed('pm', 'backend') !== FALSE){
                                    $unread = $this->Cms_auth_model->count_unread_pms(); ?>
							<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope"></i>
                                        <?php if($unread != 0){ ?><span class="label label-danger"><b><?php echo $unread ?></b></span><?php } ?>
                                      </a>
							
								<ul class="dropdown-menu">
									<li class="header">
										<b>
											<?php echo sprintf($this->lang->line('pm_unread_txt'), $unread) ?>
										</b>
									</li>
									<li>
										<ul class="menu">
											<?php $unread_msg = $this->Cms_auth_model->list_pms(10, 0, $this->session->userdata('user_admin_id'), '', TRUE);
                                              if($unread_msg !== FALSE){
                                              foreach($unread_msg as $value){ ?>
											<li>
												<a href="<?php echo $this->Cms_model->base_link(); ?>/admin/pm/view/<?php echo $value['id']; ?>">
													<div class="pull-left" style="margin-top:-5px;">
														<i class="fa fa-envelope"></i>
													</div>
													<h4 style="margin: 0 0 0 20px;">
														<?php echo $this->Cms_admin_model->getUser($value['sender_id'])->name ?>
														<small><i class="fa fa-clock-o"></i> <?php echo $value['date_sent'] ?></small>
													</h4>
													<p style="margin:0;white-space:nowrap;width:100%;overflow:hidden;text-overflow:ellipsis;">
														<?php echo $value['title'] ?>
													</p>
												</a>
											</li>
											<?php } 
                                              }else{?>
											<!-- start message -->
											<span class="text-center">
												<h4>
													<?php echo $this->lang->line('pm_nomsg_alert') ?>
												</h4>
											</span>
											<?php } ?>
										</ul>
									</li>
									<li class="footer"><a href="<?php echo $this->Cms_model->base_link(); ?>/admin/pm"><b><?php echo $this->lang->line('pm_seeall_msg') ?></b></a>
									</li>
								</ul>
							</li>
							<?php } ?>
							
						        <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-language"></i>
                                        Language
                                      </a>
                                      <ul class="dropdown-menu">
                                        <li class="">
                                            <a href="<?php echo base_url('admin/lang/chinese'); ?>">
                                                <div class="pull-left">
                                                    <i class="flag-icon flag-icon-cn"></i>
                                                 </div>
                                                <h4 style="margin: 0 0 0 20px;">
                                                    <small>Chinese</small>
                                                </h4>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="<?php echo base_url('admin/lang/english'); ?>">
                                                <div class="pull-left">
                                                    <i class="flag-icon flag-icon-gb"></i>
                                                 </div>
                                                <h4 style="margin: 0 0 0 20px;">
                                                   <small>English</small>
                                                </h4>
                                            </a>
                                        </li>
                                      </ul>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>" target="_blank">
                                        <i class="fa fa-eye"></i>
                                        <span class="hidden-xs"><?php echo $this->lang->line('nav_view_site'); ?></span>
                                    </a>
							
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- End topbar -->
			<!-- Start Left side menu -->			
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="<?php echo $user_img; ?>" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>
								<b>
									<?php echo $users->name; ?>
								</b>
							</p>
							<a href="<?php echo $this->Cms_model->base_link(); ?>/admin/users/edit/<?php echo $this->session->userdata('user_admin_id'); ?>"><i class="fa fa-edit"></i> <b><?php echo $this->lang->line('user_edit_header'); ?></b></a>
						</div>
					</div>
					<!-- search form -->
					<div class="sidebar-form">
						<div class="input-group">
							<input type="text" id="adminmenusearch" class="form-control" placeholder="<?php echo $this->lang->line('search')?>...">
							<span class="input-group-addon btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </span>
						
						</div>
					</div>
					<!-- /.search form -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<?php echo  $this->Headfoot_html->admin_leftmenu($cur_page) ?>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<!-- End Left side menu -->
			</div>
			
			<!-- Start Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<div class="container-fluid">
					<br>
					<!-- Check upgrade version -->
					<?php if($this->Cms_admin_model->chkVerUpdate($this->Cms_model->getVersion()) !== FALSE){ ?>
					<a href="<?php echo $this->Cms_model->base_link()?>/admin/upgrade" title="<?php echo $this->lang->line('btn_upgrade')?>">
						<div class="alert alert-warning text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<?php echo $this->lang->line('upgrade_newlast_alert')?>
						</div>
					</a>
					<?php } ?>
					<?php if($this->session->flashdata('error_message') != ''){ ?>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<?php echo $this->session->flashdata('error_message'); ?>
						</div>
					</div>
					<?php } ?>
					<!-- Main content -->
					<?php echo $content; ?>
					<!-- /.content -->
					<br><br>
				</div>
			</div>
			<!-- End Content Wrapper. Contains page content -->

			<!-- Start Footer -->
			<?php echo  $this->Headfoot_html->admin_footer() ?>
			<!-- End Footer -->

			<div class="footer" style="position:absolute;right:2%;transform:translateY(-100%);">
				<div class="row col-md-12 text-center">
					<a href="#top" title="To Top" style="text-decoration:none;">
                            <span class="h2"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </a>
				
				</div>
			</div>

			<!-- Start Control Sidebar For Theme Settings -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Create the tabs -->
				<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
					<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-copyright"></i></a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">

				</div>
			</aside>
			<!-- End Control Sidebar For Theme Settings -->

			<!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		
		<!-- ./wrapper -->
		<?php }else{ ?>
		<!-- Check upgrade version -->
		<?php if($this->Cms_admin_model->chkVerUpdate($this->Cms_model->getVersion()) !== FALSE){ ?>
		<div class="col-md-3 hidden-sm hidden-xs"></div>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<a href="<?php echo $this->Cms_model->base_link() ?>/admin/upgrade" title="<?php echo $this->lang->line('btn_upgrade') ?>">
				<div class="alert alert-warning text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo $this->lang->line('upgrade_newlast_alert') ?>
				</div>
			</a>
		</div>
		<div class="col-md-3 hidden-sm hidden-xs"></div>
		<?php } ?>
		<br><br><br>
		<!-- Start For Content -->
		<?php echo $content; ?>
		<!-- End For Content -->
		<br><br><br>
		<?php echo $this->Headfoot_html->admin_footer() ?>
		<?php } ?>
		<!-- Theme style -->
		<?php echo link_tag(base_url('', '', TRUE).'templates/admin/css/AdminLTE.min.css') ?>
		<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<?php echo link_tag(base_url('', '', TRUE).'templates/admin/css/skins/_all-skins.min.css') ?>
		<!-- Bootstrap core JavaScript
        ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<?php echo $core_js ?>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url('', '', TRUE) ?>templates/admin/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo base_url('', '', TRUE) ?>templates/admin/js/demo.js"></script>
		<!-- Custom Plugin JavaScript -->
		<script src="<?php echo base_url('', '', TRUE) ?>templates/admin/js/script.js"></script>	
	
		<script type="text/javascript">
			$( function () {
				tinymce.init( {
					selector: ".body-tinymce",
					height: "500px",
					content_css: [ "<?php echo base_url('', '', TRUE); ?>assets/css/bootstrap.min.css", "<?php echo base_url('', '', TRUE); ?>templates/<?php echo $row->themes_config; ?>/css/<?php echo $row->themes_config; ?>.min.css", "<?php echo base_url('', '', TRUE); ?>assets/font-awesome/css/font-awesome.min.css" ],
					allow_conditional_comments: false,
					allow_html_in_named_anchor: true,
					element_format: "html",
					entity_encoding: "raw",
					protect: [ '/\<\/?(if|endif)\>/g', '/\<xsl\:[^>]+\>/g', '/<\?php.*?\?>/g' ],
					remove_trailing_brs: false,
					convert_urls: false,
					keep_styles: true,
					plugins: "advlist autolink link image lists charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code codesample fullscreen insertdatetime media nonbreaking table directionality emoticons paste textcolor colorpicker imagetools glyphicons b_button jumbotron row_cols boots_panels boot_alert form_insert fontawesome file",
					external_filemanager_path: "<?php echo $this->Cms_model->base_link(); ?>/admin/",
					relative_urls: !1,
					toolbar1: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage codesample",
					toolbar2: "forecolor backcolor emoticons glyphicons fontawesome | b_button jumbotron row_cols boots_panels boot_alert form_insert",
					image_advtab: true,
					image_class_list: [ {
						title: "None",
						value: ""
					}, {
						title: "Responsive",
						value: "img-responsive"
					}, {
						title: "Rounded & Responsive",
						value: "img-responsive img-rounded"
					}, {
						title: "Circle & Responsive",
						value: "img-responsive img-circle"
					}, {
						title: "Thumbnail & Responsive",
						value: "img-responsive img-thumbnail"
					} ],
					style_formats: [ {
						title: "Text",
						items: [ {
							title: "Muted text",
							inline: "span",
							classes: "text-muted"
						}, {
							title: "Primary text",
							inline: "span",
							classes: "text-primary"
						}, {
							title: "Success text",
							inline: "span",
							classes: "text-success"
						}, {
							title: "Info text",
							inline: "span",
							classes: "text-info"
						}, {
							title: "Warning text",
							inline: "span",
							classes: "text-warning"
						}, {
							title: "Danger text",
							inline: "span",
							classes: "text-danger"
						}, {
							title: "Badges",
							inline: "span",
							classes: "badge"
						} ]
					}, {
						title: "Label",
						items: [ {
							title: "Default Label",
							inline: "span",
							classes: "label label-default"
						}, {
							title: "Primary Label",
							inline: "span",
							classes: "label label-primary"
						}, {
							title: "Success Label",
							inline: "span",
							classes: "label label-success"
						}, {
							title: "Info Label",
							inline: "span",
							classes: "label label-info"
						}, {
							title: "Warning Label",
							inline: "span",
							classes: "label label-warning"
						}, {
							title: "Danger Label",
							inline: "span",
							classes: "label label-danger"
						} ]
					}, {
						title: "Headers",
						items: [ {
							title: "h1",
							block: "h1"
						}, {
							title: "h2",
							block: "h2"
						}, {
							title: "h3",
							block: "h3"
						}, {
							title: "h4",
							block: "h4"
						}, {
							title: "h5",
							block: "h5"
						}, {
							title: "h6",
							block: "h6"
						} ]
					}, {
						title: "Blocks",
						items: [ {
							title: "p",
							block: "p"
						}, {
							title: "div",
							block: "div"
						}, {
							title: "pre",
							block: "pre"
						} ]
					}, {
						title: "Containers",
						items: [ {
							title: "section",
							block: "section",
							wrapper: !0,
							merge_siblings: !1
						}, {
							title: "article",
							block: "article",
							wrapper: !0,
							merge_siblings: !1
						}, {
							title: "blockquote",
							block: "blockquote",
							wrapper: !0
						}, {
							title: "hgroup",
							block: "hgroup",
							wrapper: !0
						}, {
							title: "aside",
							block: "aside",
							wrapper: !0
						}, {
							title: "figure",
							block: "figure",
							wrapper: !0
						} ]
					} ]
				} )
			} ), $( function () {
				$( "#adminmenusearch" ).on( "keyup", function () {
					"" != this.value && this.value.length > 0 ? ( $( ".sidebar-menu, #treeview-menu" ).find( "li" ).hide().filter( function () {
						return -1 != $( this ).text().toLowerCase().indexOf( $( "#adminmenusearch" ).val().toLowerCase() )
					} ).show(), $( ".sidebar-menu, #treeview" ).find( "li" ).addClass( "active" ) ) : ( $( ".sidebar-menu, #treeview-menu" ).find( "li" ).show(), $( ".sidebar-menu, #treeview" ).find( "li" ).removeClass( "active" ) )
				} )
			} );
		</script>
		<!-- Load Extra JavaScript -->
		<?php if(!empty($extra_js)){ 
        echo $extra_js;
        } ?>
			</div>
	</body>
</html>