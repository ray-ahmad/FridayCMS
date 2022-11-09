<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            File Manager
            <small>PlayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo admin_url() ?>"><i class="fa fa-dashboard"></i> Halaman Depan</a></li>
            <li><a href="<?php echo $this->to_file ?>"><i class="fa fa-folder-open"></i> File Manager</a></li>
            <li><a href="<?php echo $this->to_file . ($page == "dir_file") ? "" : "img:Y/" ?>"><i class="fa fa-folder-open"></i> <?php echo ($page == "dir_file") ? "Direktori /file/" : "Direktori /image/" ?></a></li>
		  </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo ($page == "dir_file") ? "Direktori /file/" : "Direktori /image/" ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize!"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
				<div class="row">
					<div class="col-sm-6">
						Klik pada file/gambar untuk mengetahui URL File/Gambar tersebut!
					</div>
					<div class="col-sm-6">
						<input type="text" id="url" class="form-control" placeholder="URL nya nanti akan tampil disini!"><!--style="display: none;"-->
					</div>
					<div class="col-sm-12">
						<iframe src="<?php echo assets_plug_url("responsive_filemanager/filemanager/dialog.php?type=1&field_id=url&img={$img}") ?>" style="width: 100%; height: 410px;" frameborder="0"></iframe>
					</div>
			</div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
