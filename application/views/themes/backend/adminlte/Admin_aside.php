<?php
	defined("BASEPATH") or exit("No direct script access allowed!");
	$id_u = $this->session->userdata("id_user");
?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="http://localhost/playcms_ci/play-assets/image/Hydrangeas1.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $user->full_name ?></p>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="<?php echo ($page == "index") ? "active " : "" ?>treeview">
              <a href="<?php echo admin_url() ?>">
                <i class="fa fa-dashboard"></i> <span>Halaman Depan</span>
              </a>
            </li>
            <li class="header">KONTEN</li>
			<?php
				if ($this->user->check_privilege($id_u, "read", "post") 
					and $this->play->check_backend_app("post")) :
					$all_page = array("all_post", "create_post", "edit_post");
			?>
            <li class="<?php echo (in_array($page, $all_page)) ? "active " : "" ?>treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Post</span>
				<i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($page == "all_post") ? "active" : "" ?>"><a href="<?php echo admin_url("post/") ?>"><i class="fa fa-circle-o"></i> Semua Post</a></li>
			<?php
					if ($this->user->check_privilege($id_u, "write", "post")) :
			?>
                <li class="<?php echo ($page == "create_post") ? "active" : "" ?>"><a href="<?php echo admin_url("post/create") ?>"><i class="fa fa-circle-o"></i> Buat Post Baru!</a></li>
			<?php
					endif;
			?>
              </ul>
            </li>
			<?php
				endif;

				if ($this->user->check_privilege($id_u, "read", "post_category")
					and $this->play->check_backend_app("post_category")) :
					$all_page = array("all_cat", "create_cat", "edit_cat");//$page == "all_cat" or $page == "create_cat" or $page == "edit_cat"
			?>
            <li class="<?php echo (in_array($page, $all_page)) ? "active " : "" ?>treeview">
              <a href="#">
                <i class="ion ion-pricetags"></i>
                <span>Kategori</span>
				<i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($page == "all_cat") ? "active" : "" ?>"><a href="<?php echo admin_url("post/category/") ?>"><i class="fa fa-circle-o"></i> Semua Kategori</a></li>
			<?php
					if ($this->user->check_privilege($id_u, "write", "post_category")) :
			?>
                <li class="<?php echo ($page == "create_cat") ? "active" : "" ?>"><a href="<?php echo admin_url("post/category/create/") ?>"><i class="fa fa-circle-o"></i> Buat Kategori Baru!</a></li>
			<?php
					endif;
			?>
              </ul>
            </li>
			<?php
				endif;
				if ($this->user->check_privilege($id_u, "read", "post_tag") and $this->play->check_backend_app("post_tag")) :
			?>
            <li class="<?php echo ($page == "all_tag" or $page == "create_tag") ? "active " : "" ?>treeview">
              <a href="<?php echo admin_url("post/tags/") ?>">
                <i class="fa fa-files-o"></i>
                <span>Tag</span>
              </a>
            </li>
			<?php
				endif;
				if ($this->user->check_privilege($id_u, "read", "post_comment")
					and $this->play->check_backend_app("post_comment")) :
			?>
            <li class="<?php echo ($page == "all_com" or $page == "give_com") ? "active " : "" ?>treeview">
              <a href="<?php echo admin_url("post/comment/") ?>">
                <i class="fa fa-comments-o"></i>
                <span>Komentar</span>
			</a>
            </li>
			<?php
				endif;
				if ($this->user->check_privilege($id_u, "read", "page")
					and $this->play->check_backend_app("page")) :
			?>
            <li class="<?php echo ($page == "all_page" or $page == "create_page") ? "active " : "" ?>treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Halaman</span>
				        <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($page == "all_page") ? "active" : "" ?>"><a href="<?php echo admin_url("page/") ?>"><i class="fa fa-circle-o"></i> Semua Halaman</a></li>
			<?php
					if ($this->user->check_privilege($id_u, "write", "page")) :
			?>
                <li class="<?php echo ($page == "create_page") ? "active" : "" ?>"><a href="<?php echo admin_url("page/create") ?>"><i class="fa fa-circle-o"></i> Buat Halaman Baru!</a></li>
			<?php
					endif;
			?>
              </ul>
            </li>
			<?php
      endif;
				/*if ($this->user->check_privilege($id_u, "read", "themes")
					or $this->user->check_privilege($id_u, "read", "setting")
					or $this->user->check_privilege($id_u, "read", "user")
          or $this->user->check_privilege($id_u, "read", "file_manager")
					and $this->play->check_backend_app("themes")
					or $this->play->check_backend_app("setting")
					or $this->play->check_backend_app("user")
          or $this->play->check_backend_app("file_manager")) :*/
			?>
			<!--li class="header">PERALATAN</li>-->
			<?php
				//endif;
				if ($this->user->check_privilege($id_u, "read", "user")
					and $this->play->check_backend_app("user")) :
			?>
            <li class="<?php echo ($page == "all_user") ? "active " : "" ?>treeview">
              <a href="<?php echo admin_url("user/") ?>">
                <i class="ion ion-person-stalker"></i>
                <span>User</span>
				        <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($page == "all_user") ? "active" : "" ?>"><a href="<?php echo admin_url("user/") ?>"><i class="fa fa-circle-o"></i> Semua Pengguna</a></li>
                <?php if($this->user->can('read_user_roles') and $this->play->check_backend_app('user_roles')) { ?>
                <li class="<?php echo ($page == "user_roles") ? "active" : "" ?>"><a href="<?php echo admin_url("user/roles/") ?>"><i class="fa fa-circle-o"></i> Peranan Pengguna</a></li>
                <?php } if($this->user->can('read_user_privileges') and $this->play->check_backend_app('user_privileges')) { ?>
                <li class="<?php echo ($page == "user_privileges") ? "active" : "" ?>"><a href="<?php echo admin_url("user/privileges/") ?>"><i class="fa fa-circle-o"></i> Hak Akses Pengguna</a></li>
                <?php } ?>
              </ul>
            </li>
      <?php
        endif;
        if ($this->user->check_privilege($id_u, "read", "themes")
            and $this->play->check_backend_app("themes")) :
      ?>
            <li class="<?php echo ($page == "all_theme") ? "active " : "" ?>treeview">
              <a href="<?php echo admin_url("theme/") ?>">
                <i class="fa fa-desktop"></i>
                <span>Tema</span>
              </a>
            </li>
			<?php
        endif;
        if ($this->user_info->level_id == 1 and $this->play->check_backend_app("file_manager")) :
      ?>
            <li class="<?php echo ($page == "dir_file" or $page == "dir_img") ? "active " : "" ?>treeview">
              <a href="#">
                <i class="fa fa-folder-open"></i><!--glyphicon glyphicon-folder-open-->
                <span>File Manager</span>
        <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo ($page == "dir_file") ? "active" : "" ?>"><a href="<?php echo admin_url("file-manager/") ?>"><i class="fa fa-circle-o"></i> Direktori /file/</a></li>
                <li class="<?php echo ($page == "dir_img") ? "active" : "" ?>"><a href="<?php echo admin_url("file-manager/img:Y/") ?>"><i class="fa fa-circle-o"></i> Direktori /image/</a></li>
              </ul>
            </li>
      <?php
        endif;
        if ($this->user->check_privilege($id_u, "read", "settings")
          and $this->play->check_backend_app("settings")) :
      ?>
            <li class="<?php echo ($page == "setting") ? "active " : "" ?>treeview">
              <a href="<?php echo admin_url("setting/") ?>">
                <i class="fa fa-cogs"></i>
                <span>Pengaturan</span>
      </a>
            </li>
      <?php endif ?>
        </section>
        <!-- /.sidebar -->
      </aside>
	<div class="content-wrapper">