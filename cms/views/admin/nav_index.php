<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="glyphicon glyphicon-object-align-top"></span></i> <?php echo  $this->lang->line('nav_nav_header') ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo  $this->lang->line('nav_nav_header') ?>  <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/navigation/new" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('navpage_addnew') ?></a></div> 
		<div class="card">
			<div class="card-body">
        <div class="row">
			<div class="col-md-7" style="padding-top: 12px;">
				<p class="warning">** <?php echo $this->lang->line('navpage_index_remark_txt') ?></p>
			</div>
            <div class="col-md-5">
				<div class="pull-right">
					<form id="lang_sel" style="margin-bottom: 10px;">
                    <?php echo  $this->lang->line('lang_header') ?>: <select class="form-control-static" onchange="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/navigation/'+this.options[this.selectedIndex].value);" onblur="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/navigation/'+this.options[this.selectedIndex].value);">
                        <?php foreach ($lang as $lg) { ?>
                            <option value="<?php echo $lg->lang_iso?>"<?php echo ($this->uri->segment(3) == $lg->lang_iso)?' selected="selected"':''?>><?php echo $lg->lang_name?></option>
                        <?php } ?>
                    </select>
                </form>
				</div>                
            </div>
			 </div>
        </div>
        </div>
        <?php echo  form_open($this->Cms_model->base_link(). '/admin/navigation/save'); ?>
        <?php if(!empty($position)){
            foreach ($position as $key => $val) { 
                $nav = $this->Cms_admin_model->getAllMenu('', $cur_lang, $key); ?>

            
		<div class="card">
			<div class="card-body">
                <div class="row">           
                    <div class="col-lg-6 col-md-6"> 
						<div class="h4 sub-header"><?php echo $val ?></div>                       
                    </div>
					<div class="col-lg-6 col-md-6"> 
						<div class="h4 sub-header">Sub Menu</div>                       
                    </div>
                </div>
                <div class="row menu_section">           
                    <div class="col-lg-6 col-md-6">                        
                        <ul class="ui-sortable">
                        <?php if(!empty($nav)){
                        foreach ($nav as $n) { ?>
                            <li class="ui-state-default">
                                <div style="float: left;"<?php echo (!$n->active)?' class="inactive-data"':''?>>
                                    <?php echo $n->menu_name?><?php echo ($n->drop_menu)?' <span class="caret"></span>':''?>
                                    <input type="hidden" name="menu_id[]" value="<?php echo $n->page_menu_id?>">
                                </div>
                                <div style="float: right;">
                                    <a href="<?php echo $this->Cms_model->base_link()?>/admin/navigation/edit/<?php echo $n->page_menu_id?>" style="padding-left:10px;"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="<?php echo $this->Cms_model->base_link()?>/admin/navigation/delete/<?php echo $n->page_menu_id?>" onclick="return confirm('<?php echo $this->lang->line('delete_message')?>')" style="padding-left:10px;"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>                        
                            </li>
                        <?php } 
                        }?>   
                        </ul>
                    </div>
               
                </div>
			</div>
		</div>
            <?php }
        } ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php $data = array(
                    'name' => 'submit',
                    'id' => 'submit',
                    'class' => 'btn btn-primary',
                    'value' => $this->lang->line('btn_save'),
                );
                echo form_submit($data);
                ?>
            </div>
        </div>
        <?php echo form_close();?>
        <!-- /widget-content --> 
    </div>
</div>