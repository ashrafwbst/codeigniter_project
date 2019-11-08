<div class="container-header-fluid">
	<div class="container">
		<h1><?php echo $this->Cms_model->getLabelLang('article_index_header') ?></h1>
	</div>
</div>
<div class="container-inner-fluid">
	<div class="inner-content__main inner-blog-dm">
	<!-- /.row -->
    <div class="row">
					<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary panel-primary-custom">
                <div class="panel-heading"><b><i class="glyphicon glyphicon-edit"></i> <?php echo $this->Cms_model->getLabelLang('article_search_txt').': '.$searchtxt ?></b></div>
                <div class="panel-body">
                    <?php
                    if ($article === FALSE) {
                        echo '<h3>' . $this->Cms_model->getLabelLang('article_not_found') . '</h3>';
                    } else {
                        foreach ($article as $a) { ?>
                             <div class="col-sm-6">
								<div class="panel panel-height">
									 <div class="panel-body">
                                <div class="pull-left blog-gallery galleryimgs">
                                    <a href="<?php echo $this->Cms_model->base_link().'/plugin/article/view/'.$a['article_db_id'].'/'.$a['url_rewrite'] ?>" title="<?php echo $a['title'] ?>">
                                    <?php
                                    if($a["main_picture"]){
                                        echo '<img src="'.base_url().'photo/plugin/article/'.$a['main_picture'].'" class="lazy" alt="'.$a['title'].'">';
                                    }else{
                                        echo '<img src="'.base_url().'photo/no_image.png" class="lazy" alt="'.$a['title'].'">';
                                    }
                                    ?></a>
                                </div>
                                <div class="blog-text">
                                    <h3><a href="<?php echo $this->Cms_model->base_link().'/plugin/article/view/'.$a['article_db_id'].'/'.$a['url_rewrite'] ?>" title="<?php echo $a['title'] ?>"><?php echo $a['title'] ?></a></h3>
                                    
									<div class="blog-text-time"><i class="fa fa-clock-o"></i> <?php echo $this->Cms_model->getLabelLang('article_postdate') ?>: <?php echo $a['timestamp_create'] ?></b></div>
									
                                    <div class="blog-text-desc"><?php echo $a['short_desc'] ?>...<a href="<?php echo $this->Cms_model->base_link().'/plugin/article/view/'.$a['article_db_id'].'/'.$a['url_rewrite'] ?>" title="<?php echo $a['title'] ?>"><?php echo $this->Cms_model->getLabelLang('article_readmore_text') ?></a></div>
                                </div>
									</div>
                            </div>
				</div>
                  <?php }
                    } ?>
                </div>
                <div class="blog-text-footer">
                    <?php echo $this->pagination->create_links(); ?> <b><?php echo $this->Cms_model->getLabelLang('total_txt') . ' ' . $total_row . ' ' . $this->Cms_model->getLabelLang('records_txt'); ?></b>
                </div>
            </div>
        </div>
        <?php /*?><div class="col-md-3">
            <?php echo $this->Article_model->categoryMenu($this->session->userdata('fronlang_iso')); ?>
        </div><?php */?>
    </div>
</div>
	    </div>
</div>