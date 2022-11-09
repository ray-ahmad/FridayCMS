<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("all_post_com") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
            <li><a><i class="fa fa-comments"></i> <?php echo $this->lang->line("app_name") ?></a></li>
            <li class="active"><a href="<?php echo $this->to_com ?>"><i class="fa fa-tasks"></i> <?php echo $this->lang->line("all_post_com") ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                  <div class="alert alert-success alert-dismissable alert-berhasil" style="<?php echo ($per != "success") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-berhasil">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> <?php echo $this->lang->line("alert_success_1_header") ?></h4>
                    <?php echo $this->lang->line("alert_success_1_body") ?>
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-query-ggl" style="<?php echo ($per != "query_ggl") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-query-ggl">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> <?php echo $this->lang->line("alert_error_1_header") ?></h4>
                    <?php echo $this->lang->line("alert_error_1_body") ?>
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-blm-dipilih" style="<?php echo ($per != "blm_dipilih") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-blm-dipilih">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> <?php echo $this->lang->line("alert_error_2_header") ?></h4>
                    <?php echo $this->lang->line("alert_error_2_body") ?>
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-row" style="<?php echo ($per != "row_0") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-row">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> <?php echo $this->lang->line("alert_error_3_header") ?></h4>
                    <?php echo $this->lang->line("alert_error_3_body") ?>
                  </div>
                  <div class="alert alert-warning alert-dismissable alert-network" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-network">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> <?php echo $this->lang->line("alert_error_4_header") ?></h4>
                    <?php echo $this->lang->line("alert_error_4_body") ?>
                  </div>
          <!-- Default box -->
          <div class="box box-success">
			<div class="overlay loading" style="display: none;">
                  <i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="box-body with-border">			
				<div class="btn-group">
					<button class="btn btn-danger btn-flat margin" type="button" data-toggle="modal" data-target="#alertalldel"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("delete_all_post_com") ?>!</button>
				</div>
            </div><!-- /.box-body -->
			
			<div class="box-body table-responsive">
				<form action="<?php echo $this->to_com ?>delete/selected/" method="post">
				  <table id="<?php echo $datatables_id ?>" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="no-sort"><i class="fa fa-check-circle-o"></i></th>
							<th><?php echo $this->lang->line("post_com_id") ?></th>
							<th><?php echo $this->lang->line("in_response_to") ?></th>
							<th><?php echo $this->lang->line("information_2") ?></th>
							<th><?php echo $this->lang->line("submitted_on") ?></th>
							<th class="no-sort"><?php echo $this->lang->line("action_2") ?></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th class="no-sort"><i class="fa fa-check-circle-o"></i></th>
							<th><?php echo $this->lang->line("post_com_id") ?></th>
							<th><?php echo $this->lang->line("in_response_to") ?></th>
							<th><?php echo $this->lang->line("information_2") ?></th>
							<th><?php echo $this->lang->line("submitted_on") ?></th>
							<th class="no-sort"><?php echo $this->lang->line("action_2") ?></th>
						</tr>
					</tfoot>
				  </table>
				  <button class="btn btn-danger btn-flat" type="button" data-toggle="modal" data-target="#alertdelselect"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("delete_selected_post_com") ?>!</button>
				<div id="alertdelselect" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("post_com_alert_delete_1_header") ?></h3>
							</div>
							<div class="modal-body">
								<?php echo $this->lang->line("post_com_alert_delete_1_body") ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("confirm_no") ?></button>
								<button type="submit" class="btn btn-outline btn-flat"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("confirm_yes") ?></button>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div><!-- /.box-body .table-responsive-->
          </div><!-- /.box -->

			<form action="<?php echo $this->to_com ?>delete/" method="post">
				<div id="modal_del" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("post_com_alert_delete_2_header") ?></h3>
							</div>
							<div class="modal-body">
								<?php echo $this->lang->line("post_com_alert_delete_2_body") ?>
							</div>
							<div class="modal-footer">
								<input type="hidden" id="del_id" name="id">
								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("confirm_no") ?></button>
								<button type="submit" class="btn btn-outline btn-flat"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("confirm_yes") ?></button>
							</div>
						</div>
					</div>
				</div>
			</form>
			
				<div id="alertalldel" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("post_com_alert_delete_3_header") ?></h3>
							</div>
							<div class="modal-body">
								<?php echo $this->lang->line("post_com_alert_delete_3_body") ?>
							</div>
							<div class="modal-footer">
								<form action="<?php echo $this->to_com ?>/delete/all/" method="post">
									<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("confirm_no") ?></button>
									<button type="submit" class="btn btn-outline btn-flat" onClick="return confirm('<?php echo $this->lang->line("post_com_alert_delete_4_body") ?>')"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("confirm_yes") ?></button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div id="view_com" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-comment-o"></i> <?php echo $this->lang->line("read_comment") ?></h3>
							</div>
							<div class="modal-body"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("close_modal")  ?></button>
							</div>
						</div>
					</div>
				</div>