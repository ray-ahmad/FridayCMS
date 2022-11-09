<?php defined("BASEPATH") or exit("No direct script access allowed!") ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("management_user") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
            <li class="active"><a href="<?php echo $this->to_user ?>"><i class="ion ion-person-stalker"></i> <?php echo $this->lang->line("management_user") ?></a></li>
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
			<div class="alert alert-warning alert-dismissable alert-form-error" style="display: none;">
				<button type="button" class="close close-alert" data-alert="alert-form-error">&times;</button>
					<h4>	
						<i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!
					</h4>
				<span id="form-error-msg"></span>
			</div>
			<?php if($this->user->can('create_users') or $this->user->can('update_users')) { ?>
			<div class="row">
				<div class="col-md-6">
			<?php } ?>
				  <!-- Default box -->
				  <div class="box box-success">
					<div class="overlay loading" style="display: none;">
						<i class="fa fa-refresh fa-spin"></i>
					</div>
					<div class="box-header with-border">
					  <h3 class="box-title"><?php echo $this->lang->line("all_users") ?></h3>
					  <div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize"><i class="fa fa-minus"></i></button>
					  </div>
					</div>
					<?php if ($this->user->can('create_users')) { ?>
					<div class="box-body">
						<button class="btn btn-success btn-flat margin btn-add" style="display: none;"><i class="fa fa-edit"></i> <?php echo $this->lang->line("add_new_user_2") ?></button>
					</div><!-- /.box-body -->
					<?php } ?>
					<div class="box-body table-responsive">
					<?php if ($this->user->can('delete_users')) : ?><form action="<?php echo $this->to_user ?>delete/selected/" method="post"><?php endif ?>
						  <table id="<?php echo $datatables_id ?>" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th><i class="fa fa-check-circle-o"></i></th>
									<th><?php echo $this->lang->line("user_id") ?></th>
									<th><?php echo $this->lang->line("full_name") ?></th>
									<th><?php echo $this->lang->line("active") ?>?</th>
									<th><?php echo $this->lang->line("level") ?></th>
									<th><?php echo $this->lang->line("joined_date") ?></th>
									<th><?php echo $this->lang->line("last_logged") ?></th>
									<th><?php echo $this->lang->line("action_2") ?></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th><i class="fa fa-check-circle-o"></i></th>
									<th><?php echo $this->lang->line("user_id") ?></th>
									<th><?php echo $this->lang->line("full_name") ?></th>
									<th><?php echo $this->lang->line("active") ?>?</th>
									<th><?php echo $this->lang->line("level") ?></th>
									<th><?php echo $this->lang->line("joined_date") ?></th>
									<th><?php echo $this->lang->line("last_logged") ?></th>
									<th><?php echo $this->lang->line("action_2") ?></th>
								</tr>
							</tfoot>
						  </table>
						  <?php if ($this->user->can('delete_users')) : ?>
						  <button class="btn btn-danger btn-flat" type="button" data-toggle="modal" data-target="#alertdelselect"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("delete_selected_users") ?></button>
						<div id="alertdelselect" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("user_alert_delete_1_header") ?></h3>
										</div>
										<div class="modal-body">
											<?php echo $this->lang->line("user_alert_delete_1_body") ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("confirm_no") ?></button>
											<button type="submit" class="btn btn-outline btn-flat"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line("confirm_yes") ?></button>
										</div>
								</div>
							</div>
						</div>
						</form>
						  <?php endif ?>
					</div><!-- /.box-body /.table-responsive-->
				  </div><!-- /.box -->
				<?php if ($this->user->can('create_users') or $this->user->can('update_users')) { ?>
				</div>
				<div class="col-md-6">
				<?php
					}
					if ($this->user->can('create_users')) {
				?>
					<div class="box box-success box-add">
						<?php echo ($this->user->can('create_users')) ? '<div class="overlay loading" style="display: none;">' : '<div class="overlay">' ?>
							 <i <?php echo (!$this->user->can('create_users')) ? 'style="font-size: 70px;"' : '' ?> class="<?php echo ($this->user->can('create_users')) ? "fa fa-refresh fa-spin" : "animated bounce infinite fa fa-smile-o text-center text-light-blue" ?>"></i>
						</div>
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $this->lang->line("add_new_user") ?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize!"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label><?php echo $this->lang->line("full_name") ?>*</label>
								<input type="text" title="<?php echo $this->lang->line("full_name") ?>" name="full_name" id="full_name" class="form-control" placeholder="Masukkan nama lengkap disini..." required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("email") ?>*</label>
								<input type="email" title="<?php echo $this->lang->line("email") ?>" name="email" id="email" class="form-control title" placeholder="Masukkan email disini..." required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("username") ?>*</label>
								<input type="text" title="<?php echo $this->lang->line("username") ?>" name="username" id="username" class="form-control title" placeholder="Masukkan username disini..." required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("password") ?>*</label>
								<input type="password" title="<?php echo $this->lang->line("password") ?>" name="pass" id="pass" class="form-control title" placeholder="Masukkan password disini..." required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("retype_password") ?>*</label>
								<input type="password" title="<?php echo $this->lang->line("retype_password") ?>" name="pass_r" id="pass_r" class="form-control title" placeholder="Ulangi memasukkan password disini..." required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("birthdate") ?>*</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-birthday-cake"></i>
									</div>
									<input id="datemask" type="text" title="<?php echo $this->lang->line("birthdate") ?>" name="birthdate" class="datemask form-control birthdate" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask placeholder="Masukkan tanggal lahir disini...">
								</div><!-- /.input group -->
							</div><!-- /.form group -->
							<div class="form-group">
								<label><?php echo $this->lang->line("phone_number") ?>*</label>
								<input type="tel" title="<?php echo $this->lang->line("phone_number") ?>" name="telephone" id="telephone" class="form-control title" placeholder="Masukkan nomor telepon disini..." required>
							</div>
							<div class="form-group">
								<label><?php echo $this->lang->line("level") ?>*</label>
								<select name="level_id" id="level_id" class="form-control select2" style="width: 100%;" required>
									<option value="">==== <?php echo $this->lang->line("select_user_level") ?> ====</option>
									<?php foreach ($user_levels as $level) : ?>
									<option value="<?php echo $level->id; ?>"><?php echo $level->name; ?></option>
									<?php endforeach ?>
								</select>
							</div><!-- /.form-group -->
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-flat" id="btn-submit-add"><?php echo $this->lang->line("add_new_user_2") ?></button>
							</div>
						</div>
						<?php } else { ?>
						<div class="box-body with-border">
							<span style="font-size: 36px; visibility: hidden;">FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS FridayCMS </span>
						</div>
						<?php } ?>
					</div>
					<?php if ($this->user->can('update_users')) { ?>
					<div class="box box-success box-edit" style="display: none;">
						<div class="overlay loading" style="display: none;">
							<i class="fa fa-refresh fa-spin"></i>
						</div>
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $this->lang->line("edit_user_info") ?></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize!"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body form-edit-user">

						</div>
					</div>
			<?php } if ($this->user->can('create_users') or $this->user->can('update_users')) { ?>
				</div>
			</div>
			<?php } if ($this->user->can('delete_users')) { ?>

			<form action="<?php echo $this->to_user ?>delete/" method="post">
				<div id="modal_del" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line("user_alert_delete_2_header") ?></h3>
							</div>
							<div class="modal-body">
								<?php echo $this->lang->line("user_alert_delete_2_body") ?>
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
			<?php } ?>
			<div id="edit_pass" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 id="modal-title"><i class="glyphicon glyphicon-lock"></i> <?php echo $this->lang->line("change_password") ?></h3>
						</div>
						<div class="modal-body body-pass"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary btn-flat btn-sub-passwd">Submit</button>
							<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line("close_modal") ?></button>
						</div>
					</div>
				</div>
			</div>