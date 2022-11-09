<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
	<div class="progress loading-pass active" style="display: none;">
		<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
	</div>
	<div class="alert alert-warning alert-dismissable alert-form-error-pass" style="display: none;">
		<button type="button" class="close close-alert" data-alert="alert-form-error-pass">&times;</button>
		<h4>	
			<i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!
		</h4>
		<span id="form-error-pass-msg"></span>
	</div>
	<input type="hidden" name="id-user" value="<?php echo $id ?>" id="id-user">
<?php if ($user->id == $this->session->userdata("id_user")) : ?>
	<div class="form-group">
		<label><?php echo $this->lang->line("old_password") ?>*</label>
		<input type="password" title="<?php echo $this->lang->line("old_password") ?>" name="old_pass" id="old_pass" class="form-control" placeholder="Masukkan password lama disini..." required>
	</div>
<?php else : ?>
	<input type="hidden" name="old_pass" value="kosong" id="old_pass">
<?php endif ?>
	<div class="form-group">
		<label><?php echo $this->lang->line("new_password") ?>*</label>
		<input type="password" title="<?php echo $this->lang->line("new_password") ?>" name="new_pass" id="new_pass" class="form-control" placeholder="Masukkan password baru disini..." required>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("retype_new_password") ?>*</label>
		<input type="password" title="<?php echo $this->lang->line("retype_new_password") ?>" name="r_new_pass" id="r_new_pass" class="form-control" placeholder="Ulangi memasukkan password baru disini..." required>
	</div>
	<script>
	$(".close-alert").on("click", function() {
	var alertnya = $(this).attr("data-alert");
	$("." + alertnya).slideUp("normal");
});
</script>