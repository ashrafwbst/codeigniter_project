<meta title="<?php echo $article->title ?>" />
<meta description="<?php echo $article->short_desc?>" />

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
        <div class="col-sm-9">
            <div class="panel panel-primary panel-primary-custom">
                <div class="panel-body">
                    <h1><?php echo $article->title ?></h1>
                    <div class="text-left"><b><?php echo $this->Cms_model->getLabelLang('article_category_menu') ?>: <?php echo $category_name ?></b> <b>| <?php echo $this->Cms_model->getLabelLang('article_postdate') ?>:</b> <?php echo $article->timestamp_create ?> <b>| <?php if($article->timestamp_create !== $article->timestamp_update){ echo $this->Cms_model->getLabelLang('article_updatedate').':</b> '.$article->timestamp_update.' <b>|';}?> <?php echo $this->Cms_model->getLabelLang('article_postby') ?>:</b> <?php echo ucfirst($this->Cms_admin_model->getUser($article->user_admin_id)->name) ?></div>
					<hr>
                    <div class="clearfix"></div>
                    <p><b><?php //echo $article->short_desc?></b></p><div class="clearfix"></div>
                    <?php if($article->main_picture){
                        echo '<center><img src="'.base_url().'photo/plugin/article/'.$article->main_picture.'" class="lazy img-responsive img-thumbnail" alt="'.$article->title.'"></center><br>';
                    } ?>
                    <?php echo $this->Cms_model->getHtmlContent($article->content, $this->uri->segment(6)) ?>
                </div>
            </div>
        </div>
        <div class="col-sm-3 sidebar-custom-dm">
            <?php echo $this->Article_model->categoryMenu($this->session->userdata('fronlang_iso')); ?>
        </div>
    </div>
		</div>
    <?php if($article->fb_comment_active){ ?>
    <!-- Facebook Comments -->
    <div class="row">
        <div class="col-sm-12">
            <?php 
            $fb_comment = $this->Cms_model->getFBComments($this->Cms_model->base_link().'/plugin/article/view/'.$article->article_db_id.'/'.$article->url_rewrite, $article->fb_comment_limit, $article->fb_comment_sort, $this->session->userdata('fronlang_iso'));
            if($fb_comment !== FALSE){ echo $fb_comment; } ?>
        </div>
    </div>
    <!-- Facebook Comments -->
    <?php } ?>
</div>
	</div>