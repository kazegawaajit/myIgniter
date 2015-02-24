<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users"></i> 
        	<?php echo lang('index_heading');?> 
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-table"></i> Users</h3>
            </div>
            <div class="panel-body">
            	<div class="row">
                    <div class="col-sm-6">
                        <p>
                            <a href="<?php echo site_url('auth/create_user') ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> <?php echo lang('index_create_user_link')?></a>
                        </p>
                    </div>   
                    <div class="col-sm-6 text-right">
                        <p>
                        	<a href="<?php echo site_url('auth/create_group') ?>" class="btn btn-info"><i class="fa fa-users"></i> <?php echo lang('index_create_group_link')?></a>
                        </p>
                    </div>   
                </div>
                <?php echo $message; ?>

        		<table class="table table-bordered table-hover table-striped" id="dataTables">
        			<thead>
        				<tr>
        					<th><?php echo lang('index_fname_th');?></th>
        					<th><?php echo lang('index_lname_th');?></th>
        					<th><?php echo lang('index_email_th');?></th>
        					<th><?php echo lang('index_groups_th');?></th>
        					<th><?php echo lang('index_status_th');?></th>
        					<th><?php echo lang('index_action_th');?></th>
        				</tr>
        			</thead>
        			<tbody>
        			<?php foreach ($users as $user):?>
        				<tr>
        		            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
        		            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
        		            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
        					<td>
        						<?php foreach ($user->groups as $group):?>
        							<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
        		                <?php endforeach?>
        					</td>
        					<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
        					<td align="right">
                                <?php echo anchor("auth/edit_user/".$user->id, '<i class="fa fa-pencil"></i> Edit') ;?>
                            </td>
        				</tr>
        			<?php endforeach;?>
        			</tbody>
        		</table>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/grocery_crud/themes/flexigrid/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/grocery_crud/themes/flexigrid/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
<script>
$(document).ready(function() {
    $('#dataTables').dataTable();
});
</script>