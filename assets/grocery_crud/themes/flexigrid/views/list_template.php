<?php
	$this->set_css('assets/js/plugins/datatables/dataTables.bootstrap.css');

	// Jquery
	$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);	
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
	$this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');

	if (!$this->is_IE7()) {
		$this->set_js_lib($this->default_javascript_path.'/common/list.js');
	}

	$this->set_js('assets/js/plugins/datatables/jquery.dataTables.min.js');
	$this->set_js('assets/js/plugins/datatables/dataTables.bootstrap.min.js');

	$this->set_js($this->default_theme_path.'/flexigrid/js/cookies.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/flexigrid.js');

    $this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/jquery.printElement.min.js');

	/** Fancybox */
	$this->set_css($this->default_css_path.'/jquery_plugins/fancybox/jquery.fancybox.css');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.fancybox-1.3.4.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.easing-1.3.pack.js');

	/** Jquery UI */
	$this->load_js_jqueryui();
?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo $subject?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";
</script>
<!--ga faham-->
<div id='list-report-error' class='report-div error ' ></div>

<!--alert-->
<div id='list-report-success' class='report-div success report-list' ></div>

<!--panel-->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo $subject ?></h3>
		<div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" id="mini-refresh"><i class='fa fa-refresh'></i></button>
		</div>
	</div>
    <div class="box-body">
		<div class="flexigrid" data-unique-hash="<?php echo $unique_hash; ?>">
			<div id="hidden-operations" class="hidden-operations"></div>
		
			<?php if(!$unset_add || !$unset_export || !$unset_print){?>
			<div class="tDiv row">
				<div class="tDiv2 col-xs-6">
					<?php if(!$unset_add){?>
					<!-- Button ADD  -->
			        	<a href='<?php echo $add_url?>' title='<?php echo $this->l('list_add'); ?> <?php echo $subject?>' class='add-anchor add_button btn btn-primary'>
			                <i class="fa fa-plus-circle"></i> 
							<span class="add"><?php echo $this->l('list_add'); ?> <?php echo $subject?></span>
			            </a>
			        <!-- Akhir Button ADD  -->
		            <?php }?>
				</div>
				<div class="tDiv3 col-xs-6 text-right">
					<div class="btn-group">
					<?php if(!$unset_export) { ?>
					<!-- Button Export  -->
			        	<a class="export-anchor btn btn-info" data-url="<?php echo $export_url; ?>" target="_blank">
							<i class="fa fa-file-excel-o"></i> 
							<span class="export"><?php echo $this->l('list_export');?></span>
			            </a>
			         <!-- Akhir Button Export  -->
					<?php } ?>
					<?php if(!$unset_print) { ?>
			        	<a class="print-anchor btn btn-info" data-url="<?php echo $print_url; ?>">
							<i class="fa fa-print"></i>
							<span class="print"><?php echo $this->l('list_print');?></span>
			            </a>
					<?php }?>
					</div>
				</div>        
			</div>
			<?php } ?>

			<!-- iki pencariane -->
			<?php echo form_open( $ajax_list_url, 'method="post" id="filtering_form" class="filtering_form" autocomplete = "off" data-ajax-list-info-url="'.$ajax_list_info_url.'"'); ?>

		    <!--iki tampil table'e-->
			<div id='ajax_list' class="ajax_list">
				<?php echo $list_view?>
			</div>

			<div class="pDiv" style="display: none">
				<div class="pDiv2" style="display: inline">
					<div class="pGroup" style="display: inline">
						<div class="pReload pButton ajax_refresh_and_loading" id='ajax_refresh_and_loading' style="display: inline">
							<button type="button" id="btn-refresh" class="btn btn-info"><span class='fa fa-refresh'></span></button>
						</div>
					</div>
				</div>
			</div>		
			<?php echo form_close(); ?>
			
		</div>
	</div>
	<div class="overlay" id="overlayTable" style="display:none;">
		<i class="fa fa-refresh fa-spin"></i>
	</div>
</div>
<!-- /.panel-body -->
<?php if($success_message !== null) { ?>
<script>
	$(function(){
		pesan = "<?php echo $success_message; ?>";
		alertify.success(pesan);
	});
</script>
<?php }	?>