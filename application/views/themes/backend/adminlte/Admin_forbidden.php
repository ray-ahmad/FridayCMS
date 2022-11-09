        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line("forbidden_header") ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL;?>admin/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><i class="fa fa-warning"></i> 403 Akses Tidak Diizinkan!</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="error-page">
            <h2 class="headline text-red"> 403</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-red"></i> <?php echo $this->lang->line("forbidden_body") ?></h3>
              <p>
                <a href="<?php echo BASE_URL;?>admin/"><?php echo $this->lang->line("back_to_homepage") ?></a>
              </p>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->