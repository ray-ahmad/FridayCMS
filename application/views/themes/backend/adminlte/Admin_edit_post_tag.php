<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$ex = BASE_URL . "tag/";
?>
	<input type="hidden" name="id" value="<?php echo $tag->id ?>" id="id">
	<div class="form-group">
		<label><?php echo $this->lang->line("title") ?>*</label>
		<input type="text" title="Judul" name="title" id="title-edit" class="form-control title" placeholder="Masukkan judul post mu disini..." value="<?php echo $tag->title ?>" required>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("sef_url") ?></label>
		<div class="input-group">
			<div class="input-group-addon"><?php echo $ex ?></div>
			<input type="text" name="sef_url" id="sefurl-edit" class="form-control sefurl" placeholder="SEF URL untuk tag post mu disini..." value="<?php echo $tag->sef_url ?>">
			<div class="input-group-addon">/</div>
		</div>
		<p class="help-block"><?php echo $this->lang->line("sef_url_help") ?></p>
	</div>
	<div class="form-group">
		<label><?php echo $this->lang->line("meta_description") ?></label>
		<textarea id="description-edit" rows="3" name="description" class="form-control" placeholder="<?php echo $this->lang->line("meta_desc_placeholder") ?>"><?php echo $tag->description ?></textarea>
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary btn-flat" id="btn-submit-edit"><?php echo $this->lang->line("change_post_tag") ?></button>
	</div>