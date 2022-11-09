<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$ex = BASE_URL . "tag/";
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("management_post_tag") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
            <li class="active"><a href="<?php echo $this->to_tag ?>"><i class="fa fa-tasks"></i> <?php echo $this->lang->line("management_post_tag") ?></a></li>
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
			<?php if ($this->user->check_privilege($this->user_id, "write", "post_tag") or $this->user->check_privilege($this->user_id, "edit", "post_tag")) : ?>
			<div class="row">
				<div class="col-md-6">
			<?php endif ?>
				  <!-- Default box -->
				<div class="box box-success">
					<div class="overlay loading" style="display: none;">
						  <i class="fa fa-refresh fa-spin"></i>
					</div>
					<div class="box-header with-border">
					  <h3 class="box-title"><?php echo $this->lang->line("all_post_tags") ?></h3>
					  <div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize!"><i class="fa fa-minus"></i></button>
					  </div>
					</div>

					<div class="box-body">
						<div class="btn-group">
							<?php if ($this->user->check_privilege($this->user_id, "delete_all", "post_tag")) : ?><button class="btn btn-danger btn-flat margin" type="button" data-toggle="modal" data-target="#alertalldel"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("delete_all_post_tags") ?></button><?php endif ?>
							<?php if ($this->user->check_privilege($this->user_id, "write", "post_tag")) : ?><button class="btn btn-success btn-flat margin btn-add-tag" type="button" style="display: none;"><i class="fa fa-edit"></i> <?php echo $this->lang->line("create_new_post_tag_2") ?></a><?php endif ?>
						</div>
					</div><!-- /.box-body -->
					
					<div class="box-body table-responsive">
						<form action="<?php echo $this->to_tag ?>delete/selected/" method="post">
						  <table id="<?php echo $datatables_id ?>" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="no-sort"><i class="fa fa-check-circle-o"></i></th>
									<th><?php echo $this->lang->line("post_tag_id") ?></th>
									<th><?php echo $this->lang->line("information_2") ?></th>
									<th class="no-sort"><?php echo $this->lang->line("action_2") ?></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th class="no-sort"><i class="fa fa-check-circle-o"></i></th>
									<th><?php echo $this->lang->line("post_tag_id") ?></th>
									<th><?php echo $this->lang->line("information_2") ?></th>
									<th class="no-sort"><?php echo $this->lang->line("action_2") ?></th>
								</tr>
							</tfoot>
						  </table>
						  <?php if ($this->user->check_privilege($this->user_id, "delete_selected", "post_tag")) : ?><button class="btn btn-danger btn-flat" type="button" data-toggle="modal" data-target="#alertdelselect"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("delete_selected_post_tags") ?></button><?php endif ?>
						<div id="alertdelselect" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
										
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("post_tag_alert_delete_1_header") ?></h3>
										</div>
										<div class="modal-body">
											<?php echo $this->lang->line("post_tag_alert_delete_1_body") ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("confirm_no") ?></button>
											<button type="submit" class="btn btn-outline btn-flat"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("confirm_yes") ?></button>
										</div>
								</div>
							</div>
						</div>
						</form>
					</div><!-- /.box-body /.table-responsive-->
				</div><!-- /.box -->
				<?php if ($this->user->check_privilege($this->user_id, "write", "post_tag") or $this->user->check_privilege($this->user_id, "edit", "post_tag")) : ?>
				</div>
				<div class="col-md-6">
				<?php
					endif;
					if ($this->user->check_privilege($this->user_id, "write", "post_tag") or (!$this->user->check_privilege($this->user_id, "write", "post_tag") and $this->user->check_privilege($this->user_id, "edit", "post_tag"))) :
				?>
					<div class="box box-success box-add">
						<?php echo ($this->user->check_privilege($this->user_id, "write", "post_tag")) ? '<div class="overlay loading" style="display: none;">' : '<div class="overlay">' ?>
							  <i <?php echo (!$this->user->check_privilege($this->user_id, "write", "post_tag")) ? 'style="font-size: 70px;"' : '' ?> class="<?php echo ($this->user->check_privilege($this->user_id, "write", "post_tag")) ? "fa fa-refresh fa-spin" : "animated bounce infinite fa fa-smile-o text-center text-light-blue" ?>"></i>
						</div>
						<?php if ($this->user->check_privilege($this->user_id, "write", "post_tag")) : ?>
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $this->lang->line("create_new_post_tag") ?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize!"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label><?php echo $this->lang->line("title") ?>*</label>
								<input type="text" title="Judul" name="title" class="form-control title" placeholder="<?php echo $this->lang->line("title_placeholder") ?>" required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("sef_url") ?></label>
									<div class="input-group">
										<div class="input-group-addon"><?php echo $ex ?></div>
										<input type="text" name="sef_url" class="form-control sefurl" placeholder="<?php echo $this->lang->line("sef_url_placeholder") ?>">
										<div class="input-group-addon">/</div>
									</div>
									<p class="help-block"><?php echo $this->lang->line("sef_url_help") ?></p>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("meta_description") ?></label>
								<textarea rows="3" name="description" class="form-control description" placeholder="<?php echo $this->lang->line("meta_desc_placeholder") ?>" id="description"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-flat" id="btn-submit-create"><?php echo $this->lang->line("create_post_tag") ?></button>
							</div>
						</div>
						<?php else : ?>
						<div class="box-body with-border">
							<span style="font-size: 36px; visibility: hidden;">FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS </span>
						</div>
						<?php endif ?>
					</div>
					<?php
						endif;
						if ($this->user->check_privilege($this->user_id, "edit", "post_tag")) :
					?>
					<div class="box box-success box-edit" style="display: none;">
						<div class="overlay loading" style="display: none;">
							  <i class="fa fa-refresh fa-spin"></i>
						</div>
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $this->lang->line("change_post_tag") ?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize!"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body form-edit-tag"></div>
					</div>
			<?php
				endif;
				if ($this->user->check_privilege($this->user_id, "write", "post_tag") or $this->user->check_privilege($this->user_id, "edit", "post_tag")) :
			?>
				</div>
			</div>
			<?php endif ?>

			<form action="<?php echo $this->to_tag ?>delete/" method="post">
				<div id="modal_del" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("post_tag_alert_delete_2_header") ?></h3>
							</div>
							<div class="modal-body">
								<?php echo $this->lang->line("post_tag_alert_delete_2_body") ?>
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
									<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("post_tag_alert_delete_3_header") ?></h3>
								</div>
								<div class="modal-body">
									<?php echo $this->lang->line("post_tag_alert_delete_3_body") ?>
								</div>
								<div class="modal-footer">
									<form action="<?php echo $this->to_tag ?>delete/all/" method="post">
										<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("confirm_no") ?></button>
										<button type="submit" class="btn btn-outline btn-flat" onClick="return confirm('<?php echo $this->lang->line("post_tag_alert_delete_4_body") ?>')"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("confirm_yes") ?></button>
									</form>
								</div>
						</div>
					</div>
				</div>