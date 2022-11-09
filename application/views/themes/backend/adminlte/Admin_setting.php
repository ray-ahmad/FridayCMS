<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$activate = array("Y" => "Aktif", "N" => "Tidak Aktif");
	$yes = array("Y" => "Ya", "N" => "Tidak");
?>
		<section class="content-header">
			<h1>
				Pengaturan Website
				<small>PlayCMS</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
				<li class="active"><a href="<?php echo $this->to_setting ?>"><i class="fa fa-tasks"></i> Semua Post</a></li>
			</ol>
		</section>

		<section class="content">
              <div class="box box-solid">
                <div class="box-body">
			<?php
				if (isset($per)) : 
			?>
                  <div class="alert alert-success alert-dismissable alert-berhasil" style="<?php echo ($per != "success") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-berhasil">&times;</button>
                    <h4>	<i class="icon fa fa-check"></i> Berhasil Melakukan Aksi!</h4>
                    Aksi yang Kamu Lakukan Berhasil Di Jalankan!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-query-ggl" style="<?php echo ($per != "query_ggl") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-query-ggl">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Terjadi Kesalahan Saat Gagal Merubah Pengaturan!</h4>
                    Mohon maaf, mungkin terjadi kesalahan kueri database MySQL!
                  </div>

                  <div class="alert alert-danger alert-dismissable alert-row" style="<?php echo ($per != "row_0") ? "display: none;" : "" ?>">
                    <button type="button" class="close close-alert" data-alert="alert-row">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! File Meta Tag Gagal Di Ubah!</h4>
                    Sepertinya, File Meta Tag Di Folder Konfigurasi Tidak Ditemukan! Coba Kamu Buat Terlebih Dahulu!
                  </div>
                  <div class="alert alert-warning alert-dismissable alert-network" style="display: none;">
                    <button type="button" class="close close-alert" data-alert="alert-network">&times;</button>
                    <h4>	<i class="icon fa fa-warning"></i> Oops! Sepertinya koneksi ke server terputus!</h4>
                    Pastikan koneksi internet-mu stabil atau jika kamu di localhost pastikan xamp/wamp server-mu sudah aktif sebelum melakukan aksi ini!
                  </div>
			<?php 		
				endif;
			?>
				<div class="alert alert-warning alert-dismissable alert-form-error" style="display: none;">
					<button type="button" class="close close-alert" data-alert="alert-form-error">&times;</button>
						<h4>	
							<i class="icon fa fa-warning"></i> Oops! Sepertinya, Ada yang Salah/Tidak Sesuai!
						</h4>
					<span id="form-error-msg"></span>
				</div>
				<div class="progress loading active" style="display: none;">
					<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
				</div>
				  <div class="form-group">
					<button type="button" class="btn btn-primary btn-flat btn-edit">Edit Pengaturan!</button>
				  </div>
                  <div class="box-group" id="accordion">
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Informasi Umum
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse">
						<div class="form-horizontal">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama Website</label>
									<div class="col-sm-10"><input type="text" name="site_name" id="site_name" value="<?php echo $this->play->_set("site_name") ?>" class="form-control" required></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Motto Website</label>
									<div class="col-sm-10"><input type="text" name="site_motto" id="site_motto" value="<?php echo $this->play->_set("site_motto") ?>" class="form-control" required></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Email Website</label>
									<div class="col-sm-10"><input type="text" name="site_email" id="site_email" value="<?php echo $this->play->_set("site_email") ?>" class="form-control" required></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Meta Keywords</label>
									<div class="col-sm-10"><input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo $this->play->_set("meta_keywords") ?>" class="form-control"></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Meta Description</label>
									<div class="col-sm-10"><textarea name="meta_description" id="meta_description" class="form-control" style="height: 100px;"><?php echo $this->play->_set("meta_description") ?></textarea></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Gambar Ikon Website</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="text" id="favicon" name="favicon" value="<?php echo $this->play->_set("site_favicon") ?>" class="form-control">
											<span class="input-group-btn">
												<a class="btn btn-info btn-flat btn-filemanager" data-field-id="favicon" data-img="Y">Pilih/Upload Gambar</a>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Logo Website</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="text" id="site_logo" name="site_logo" value="<?php echo $this->play->_set("site_logo") ?>" class="form-control">
											<span class="input-group-btn">
												<a class="btn btn-info btn-flat btn-filemanager" data-field-id="site_logo" data-img="Y">Pilih/Upload Gambar</a>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<p class="help-block">
											Catatan: Saat data di submit, hanya nama file nya saja yang dimasukkan ke database, URL menuju folder gambar di website-mu akan diabaikan. (kecuali jika kamu menuliskan URL gambar selain di website mu. Ex : 1bp.blogspot.com, dll)
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Pesan Kepada Komentator.</label>
									<div class="col-sm-10"><textarea name="comment_message" id="comment_message" class="form-control" style="height: 100px;"><?php echo $this->play->_set("comment_message") ?></textarea></div>
								</div>
							</div>
						</div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Konfigurasi
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
						<div class="form-horizontal">
							<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label">Hidupkan Cache?</label>
								<div class="col-sm-10">
									<div class="input-group">
										<select class="form-control" name="cache" id="cache">
											<?php
												foreach ($yes as $k => $v) {
													$sel = ($this->play->_set("caching") == $k) ? "selected" : "";
													echo '<option value="' . $k .'" ' . $sel . '>' . $v . '</option>';
												}
											?>
										</select>
										<span class="input-group-btn">
											<a class="btn btn-danger btn-flat" <?php echo ($this->play->_set("caching") == "N") ? "disabled" : 'data-toggle="modal" data-target="#alertdelcache"' ?>><i class="fa fa-trash-o"></i> Hapus Semua Cache</a>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Masa Berlaku Cache</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="number" name="cache-expiration" id="cache-expiration" class="form-control" value="<?php echo $this->play->_set("cache_expiration") ?>">
										<div class="input-group-addon">menit</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<p class="help-block">
										Catatan: Mode caching yang aktif dengan masa berlaku cache yang terlalu lama tidak disarankan bagi website yang sering terjadi perubahan (Traffic yang banyak, sering posting, dll.) <a href="<?php echo FRI_WEBSITE ?>/doc/kenapa-masa-berlaku-cache-disarankan-tidak-terlalu-lama/" target="_blank">Baca Dokumentasinya disini!</a>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Mode Perbaikan (Maintenance)</label>
								<div class="col-sm-10">
									<select class="form-control" name="maintenance" id="maintenance">
										<?php
											foreach ($activate as $k => $v) {
												$sel = ($this->play->_set("maintenance") == $k) ? "selected" : "";
												echo '<option value="' . $k .'" ' . $sel . '>' . $v . '</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Pendaftaran User</label>
								<div class="col-sm-10">
									<select class="form-control" name="user_reg" id="user_reg">
										<?php
											foreach ($activate as $k => $v) {
												$sel = ($this->play->_set("user_registration") == $k) ? "selected" : "";
												echo '<option value="' . $k .'" ' . $sel . '>' . $v . '</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Konfirmasi Pendaftaran User Dengan</label>
								<div class="col-sm-10">
									<select class="form-control" name="user_reg_conf" id="user_reg_conf">
										<?php
											$confirm = array("email" => "Pengiriman Email Ke Alamat Email User yang Mendaftar", "user" => "User yang Memiliki Akses Untuk Mengizinkan User Baru yang Mendaftar");
											foreach ($confirm as $k => $v) {
												$sel = ($this->play->_set("user_reg_confirm") == $k) ? "selected" : "";
												echo '<option value="' . $k .'" ' . $sel . '>' . $v . '</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Aktifkan Kommentar</label>
								<div class="col-sm-10">
									<select class="form-control" name="comment" id="comment">
										<?php
											foreach ($yes as $k => $v) {
												$sel = ($this->play->_set("comment") == $k) ? "selected" : "";
												echo '<option value="' . $k .'" ' . $sel . '>' . $v . '</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Moderasi Komentar?</label>
								<div class="col-sm-10">
									<select class="form-control" name="com_mod" id="com_mod">
										<?php
											foreach ($yes as $k => $v) {
												$sel = ($this->play->_set("moderate_comment") == $k) ? "selected" : "";
												echo '<option value="' . $k .'" ' . $sel . '>' . $v . '</option>';
											}
										?>
									</select>
								</div>
							</div>
							</div>
						</div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Lebih Lengkap
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-2 control-label">Prioritas Peta Situs</label>
									<div class="col-sm-10">
										<select name="sitemap_priority" id="sitemap_priority" class="select2 form-control" style="width: 100%">
										<?php
											$priorities = array("0.1", "0.2", "0.3", "0.4", "0.5", "0.6", "0.7", "0.8", "0.9", "1.0");
											foreach ($priorities as $priority) :
										?>
											<option value="<?php echo $priority ?>" <?php echo ($priority == $this->play->_set("sitemap_priority")) ? "selected" : "" ?>><?php echo $priority ?></option>
										<?php
											endforeach;
										?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Frekuensi Peta Situs</label>
									<div class="col-sm-10">
										<select name="sitemap_changefreq" id="sitemap_changefreq" class="select2 form-control" style="width: 100%">
										<?php
											$freqs = array("None", "Never", "Always", "Hourly", "Daily", "Weekly", "Monthly", "Yearly");
											foreach ($freqs as $freq) :
										?>
											<option value="<?php echo strtolower($freq) ?>" <?php echo (strtolower($freq) == $this->play->_set("sitemap_changefreq")) ? "selected" : "" ?>><?php echo $freq ?></option>
										<?php
											endforeach;
										?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">File Meta</label>
									<div class="col-sm-10">
										<input type="text" name="meta_file" id="meta_file" class="form-control" value="<?php echo $this->play->_set("metatag_file") ?>" required>
										<p class="help-block">
											Catatan: File Meta Tag Terdapat Di folder Konfigurasi PlayCMS, "<?php echo CONF_DIR ?>".
										</p>
									</div>
								</div>
							</div>
						 <div class="box-body">
							<div class="form-group">
								<label>Tag Meta (Klik pada textarea jika tidak menampilkan apapun)</label>
								<textarea name="meta_tag" id="<?php echo $codemirror_id ?>" class="form-control"><?php echo file_get_contents(CONF_DIR . DIR_SEP . "{$this->play->_set("metatag_file")}") ?></textarea>
							</div>
							</div>
                      </div>
                    </div>
                  </div>
				  <div class="form-group">
					<button type="button" class="btn btn-primary btn-flat btn-edit2" style="display: none;">Edit Pengaturan!</button>
				  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		</section>
				<div id="alertdelcache" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 id="modal-title"><i class="fa fa-exclamation-triangle"></i> Konfirmasi Penghapusan Semua File Cache</h3>
							</div>
							<div class="modal-body">
								Apakah Kamu benar-benar yakin akan menghapus cache yang ada? Perintah ini akan MENGKOSONGKAN FILE cache dan mungkin saja akan MEMPENGARUHI PERFORMA WEBSITE! (khususnya loading web)
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-hidden="true"><i class="fa fa-sign-out"></i> Tidaaak!</button>
								<button type="button" class="btn btn-outline btn-flat btn-del-cache"><i class="fa fa-trash-o"></i> YA!</button>
							</div>
						</div>
					</div>
				</div>