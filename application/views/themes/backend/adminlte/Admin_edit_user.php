<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
	<input type="hidden" name="id" value="<?php echo $user->id ?>" id="id_edit">
	<div class="form-group">
		<label><?php echo $this->lang->line("full_name") ?>*</label>
		<input type="text" value="<?php echo $user->full_name ?>" title="Nama Lengkap" name="full_name" id="full_name_edit" class="form-control" placeholder="Masukkan nama lengkap disini..." required>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("email") ?>*</label>
		<input type="email" value="<?php echo $user->email ?>" title="E-mail" name="email" id="email_edit" class="form-control title" placeholder="Masukkan email disini..." required>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("username") ?>*</label>
		<input type="text" value="<?php echo $user->username ?>" data-toggle="tooltip" title="<?php echo $this->lang->line("username_cant_be_changed") ?>" class="form-control title" placeholder="Masukkan username disini..." disabled>
		<p class="help-block"><?php echo $this->lang->line("username_cant_be_changed_message") ?></p>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("birthdate") ?>*</label>
		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-birthday-cake"></i>
			</div>
			<input id="datemask2" type="text" value="<?php echo ymd2dmy($user->birth_date) ?>" title="Tanggal Lahir" name="birthdate" class="datemask form-control birthdate_edit" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask placeholder="Masukkan tanggal lahir disini...">
		</div><!-- /.input group -->
	</div><!-- /.form group -->
	<div class="form-group">
		<label><?php echo $this->lang->line("phone_number") ?>*</label>
		<input type="tel" value="<?php echo $user->phone_nmbr ?>" title="Nomor Telepon" name="telephone" id="telephone_edit" class="form-control title" placeholder="Masukkan nomor telepon disini..." required>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("level") ?>*</label>
		<select name="level_id"  id="level_id_edit" class="form-control select2" style="width: 100%;" required>
			<option value="">==== <?php echo $this->lang->line("select_user_level") ?> ====</option>
			<?php 
				foreach ($user_levels as $level) :
					$selected = ($level->id == $user->level_id) ? " selected" : "";
			?>
			<option value="<?php echo $level->id; ?>"<?php echo $selected ?>><?php echo $level->name; ?></option>
			<?php endforeach ?>
		</select>
	</div><!-- /.form-group -->
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary btn-flat" id="btn-submit-edit">Submit</button>
	</div>
	<script>
		$(".select2").select2();
		$("#datemask2").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	</script>