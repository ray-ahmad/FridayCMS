<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="animated slideInLeft">
            <?php echo $this->lang->line("homepage") ?>
            <small>FridayCMS</small>
          </h1>
          <ol class="breadcrumb">
            <li class="active"><a href="<?php echo BASE_URL;?>admin/"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("homepage") ?></a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 class="animated flipInY"><?php echo $this->lang->line("post") ?></h3>
                  <p class="animated fadeInUp"><?php echo str_replace("{app}", $this->lang->line("post"), $this->lang->line("management_app")) ?></p>
                </div>
                <div class="icon">
                  <i class="animated zoomIn fa fa-edit"></i>
                </div>
                <a href="<?php echo admin_url("post/") ?>" class="small-box-footer">
                  <?php echo str_replace("{app}", $this->lang->line("post"), $this->lang->line("to_app")) ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 class="animated flipInY"><?php echo $this->lang->line("category") ?></h3>
                  <p class="animated fadeInUp"><?php echo str_replace("{app}", $this->lang->line("category_2"), $this->lang->line("management_app")) ?></p>
                </div>
                <div class="icon">
                  <i class="animated zoomIn ion ion-pricetags"></i>
                </div>
                <a href="<?php echo admin_url("post/category/") ?>" class="small-box-footer">
                  <?php echo str_replace("{app}", $this->lang->line("category"), $this->lang->line("to_app")) ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3 class="animated flipInY"><?php echo $this->lang->line("user") ?></h3>
                  <p class="animated fadeInUp"><?php echo str_replace("{app}", $this->lang->line("user"), $this->lang->line("management_app")) ?></p>
                </div>
                <div class="icon">
                  <i class="animated zoomIn ion ion-person-stalker"></i>
                </div>
                <a href="<?php echo admin_url("user/") ?>" class="small-box-footer">
                  <?php echo str_replace("{app}", $this->lang->line("user"), $this->lang->line("to_app")) ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3 class="animated flipInY"><?php echo $this->lang->line("page") ?></h3>
                  <p class="animated fadeInUp"><?php echo str_replace("{app}", $this->lang->line("page"), $this->lang->line("management_app")) ?></p>
                </div>
                <div class="icon">
                  <i class="animated zoomIn fa fa-file-o"></i>
                </div>
                <a href="<?php echo admin_url("page/") ?>" class="small-box-footer">
                  <?php echo str_replace("{app}", $this->lang->line("page"), $this->lang->line("to_app")) ?> <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

          <!-- Default box -->
		  <div class="row">
			<div class="col-md-6">
			  <div class="box box-success">
				<div class="box-header with-border">
				  <h3 class="box-title animated fadeInUp"><?php echo $this->lang->line("traffic_statistic") ?></h3>
				</div>
				<div class="box-body">
					<div class="pull-right">
							<span style="position: relative; left: -1ex">
								<span style="font-size: 32px;">
									<i class="icon ion-ios-circle-filled" style="color: #c1c7d1;"></i>
								</span>
								<span style="font-size: 17px; position: relative; top: -1ex;"><?php echo $this->lang->line("visitor") ?></span>
							</span>	

							<span style="font-size: 32px;">
								<i class="icon ion-ios-circle-filled" style="color: rgba(60, 141, 188, 1);"></i>
							</span>
							<span style="font-size: 17px; position: relative; top: -1ex;"><?php echo $this->lang->line("hits") ?></span>
					</div>
					<div class="chart">
						<canvas id="chart-traffic" style="height: 186px;"></canvas>
					</div>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
			</div>
			<div class="col-md-6">
			  <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="animated zoomIn fa fa-map-marker"></i></span>
                <div class="info-box-content">
                  <span class="animated zoomIn info-box-text"><?php echo $this->lang->line("registered_users_online_now") ?></span>
                  <span class="info-box-number"><?php echo $online_users ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			  <div class="info-box">
                <span class="info-box-icon bg-green"><i class="animated zoomIn fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="animated zoomIn info-box-text"><?php echo $this->lang->line("registered_users_today") ?></span>
                  <span class="info-box-number"><?php echo $new_registered_users ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			  <div class="info-box">
                <span class="info-box-icon bg-red"><i class="animated zoomIn fa fa-edit"></i></span>
                <div class="info-box-content">
                  <span class="animated zoomIn info-box-text"><?php echo $this->lang->line("created_posts_today") ?></span>
                  <span class="info-box-number"><?php echo $new_posts ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			</div>
		  </div>
			

          <!-- ======================================================= -->
          <!-- ============ Select Languange ========================= -->
          <!-- ======================================================= -->

		  <div class="row">
			<div class="col-md-6">
			  <!-- Default box -->
			  <div class="box box-success">
				<div class="box-header with-border">
				  <h3 class="box-title"><?php echo $this->lang->line("select_lang") ?></h3>
				  <div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				  </div>
				</div>
				<div class="box-body">
				  <form action="<?php echo admin_url("homepage/change_lang") ?>" method="post">
					<select class="form-control select2 lang" style="width: 100%;" name="set_lang" onChange="return submit()">
						<?php
							foreach ($this->lang_m->get_all_lang()->result() as $lang_d) :
						?>
						<option value="<?php echo $lang_d->folder_name ?>" <?php echo ($this->lang_now == $lang_d->folder_name) ? "selected" : "" ?>><?php echo $lang_d->name ?></option>
						<?php endforeach ?>
					</select>
				  </form>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->	
			</div>
		  </div>		  
        </section><!-- /.content -->