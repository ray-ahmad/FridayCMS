<?php

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class File_manager extends Admin_Controller {

		public function index($img = "N") {
			/* Demi keamanan dan mencegah kejadian yang tidak diinginkan kedepannya, 
			 * Aplikasi File Manager hanya untuk Super Administrator saja
			 */

			 if ($this->user_info->level_id != 1)
				$this->forbidden();

			$this->to_file = admin_url("file-manager/");
			$this->data["title"] = "Akses File Manager | FridayCMS";
			$this->data["page"] = ($img == "N") ? "dir_file" : "dir_img";
			$this->data["img"] = $img;

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_file_manager", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
		}
	}