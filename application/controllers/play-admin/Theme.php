<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  ----------------------------------------------------------------------------------------------
 *  Post App Controller
 *  ----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Theme extends Admin_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model("{$this->admin_dir}/Theme_model");

			$this->theme = $this->Theme_model;
			$this->to_theme = admin_url("theme/");
			$this->temp_dir = TEMP_DIR;
			$conf["allowed_types"] = "zip";
			$conf["upload_path"] = $this->temp_dir;
			$this->load->library("upload", $conf);
			$this->load->helper("file");

			// Khusus untuk Aplikasi Setting, User, Tema, dan "Aplikasi" (Coming Soon di Versi Alpha 2/1.0.7), tidak perlu dicek apakah aktif atau tidak karena aplikasi tersebut sangat penting di PlayCMS


		}

		public function index() {

			if(!$this->user->check_access($this->user_id, "read_access", "themes"))
				$this->forbidden();

			else {
				$data["user"] = $this->user_m->user_info($this->user_id);
				$data["title"] = "Semua Tema Frontend | PlayCMS";
				$data["page"] = "all_theme";
				$data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$data["themes"] = $this->theme->all_frontend_theme();
				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_all_theme", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $data);
			}
		}

		public function all() {
			// Call index method
			$this->index();
		}

		public function frontend_theme_upload() {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_access($this->user_id, "write_access", "themes"))
				echo "Forbidden!";

			else {
				// Inisialisasi library Play_file
				$this->load->library("play_file");
				$this->p_file = $this->play_file;
				
				// Upload tema ke direktori temporary (direktori sementara)
				if (!$this->upload->do_upload("theme_file"))
					die ($this->upload->display_errors());

				// Persiapan Ekstrak (Inisialisasi nama file, raw name(nama file tanpa ekstensi) , nama folder yang diminta user, dan lokasi file zip yang baru di upload)
				$file_name = $this->upload->data("file_name");
				$raw_name = $this->upload->data("raw_name");
				$folder_name = (empty($_POST["folder_name"])) ? $raw_name : $this->str->xss_clean_adv($_POST["folder_name"]);
				$to_zip = "{$this->temp_dir}/{$file_name}";

				// Ekstrak Tema yang Di Upload
				$this->zip = new ZipArchive;

				if ($this->zip->open($to_zip) === FALSE)
					die("1");

				$this->zip->extractTo("{$this->temp_dir}/");
				$this->zip->close();

				$to_theme = "{$this->temp_dir}/{$raw_name}/";

				// Cek apakah berhasil di ekstrak?
				if (!file_exists($to_theme)) {
					unlink($to_zip);
					die("2");
				}

				// Cek keberadaan file config.json (file ini diharuskan ada)
				$to_config = "{$to_theme}/config.json";

				if (!file_exists($to_config)) {
					delete_files($to_theme, TRUE);
					rmdir($to_theme);
					unlink($to_zip);
					die("3");
				}

				// Cek apakah tema ada di database sebelumnya?

				$config = json_decode(file_get_contents($to_config));
				$check_theme = $this->db->get_where("themes", array("name", $config->name))->num_rows();

				if ($check_theme > 0) {
					delete_files($to_theme, TRUE);
					rmdir($to_theme);
					unlink($to_zip);
					die("4");
				}

				// Menyalin semua file di direktrori temporary dan menghapusnya.

				$views_dir = APPPATH . "views" . DIR_SEP . "themes" . DIR_SEP . "frontend" . DIR_SEP . $folder_name . DIR_SEP;
				$assets_dir = ASSETS_FOLDER . "/{$folder_name}/";
				
				mkdir($views_dir);
				mkdir($assets_dir);

				copy("{$to_theme}/{$config->preview}", "{$assets_dir}/{$config->preview}");
				unlink("{$to_theme}/{$config->preview}");

				$this->p_file->recurse_copy("{$to_theme}views/", $views_dir);
				$this->p_file->recurse_copy("{$to_theme}assets/", $assets_dir);

				delete_files($to_theme, TRUE);
				rmdir($to_theme);
				unlink($to_zip);

				// Memasukkan info tentang tema ke database
				$d = array("position" => "frontend",
						   "name" => $config->name,
						   "author" => $config->author,
						   "author_web" => $config->author_web,
						   "folder" => $folder_name,
						   "active" => "N");
				$q = $this->db->insert("themes", $d);
				if ($q)
					echo "5";
				else
					echo "6";
			}
		
		}

		private function edit_file_load($folder_path, $folder, $file_path, $file) {

			$get_theme =  $this->theme->get_theme($folder, "frontend");
			$data["user"] = $this->user_m->user_info($this->session->userdata("id_user"));
			$data["title"] = "Edit File Tema \"{$get_theme->name}\" | PlayCMS";
			$data["page"] = "edit_thm_file";
			$data["file_content"] = file_get_contents($file_path);
			$data["all_file"] = list_file($folder_path);
			$data["theme"] = $get_theme;
			$data["file_theme"] = $file;
			$data["codemirror_id"] = "theme_file";

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_theme_file", $data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $data);	
		}

		public function edit_file($folder, $file) {
			$folder = $this->str->xss_clean_adv($folder);
			$file = $this->str->xss_clean_adv($file);
			$folder_path = APPPATH . "views" . DIR_SEP . "themes" . DIR_SEP . "frontend" . DIR_SEP . $folder . DIR_SEP;
			$file_path = APPPATH . "views" . DIR_SEP . "themes" . DIR_SEP . "frontend" . DIR_SEP . $folder . DIR_SEP . $file;

			if (!$this->user->check_access($this->user_id, "edit_access", "themes"))
				$this->forbidden();

			elseif (!$this->theme->get_theme($folder, "frontend")
				or !file_exists($file_path) or is_dir($file_path))
				show_404();

			else
				$this->edit_file_load($folder_path, $folder, $file_path, $file);
		}

		public function get_theme_file() {
			$folder = $this->str->xss_clean_adv($_POST["folder"]);
			$file = $this->str->xss_clean_adv($_POST["file"]);
			$folder_path = APPPATH . "views/themes/frontend/{$folder}/";
			$file_path = APPPATH . "views/themes/frontend/{$folder}/{$file}";

			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_access($this->user_id, "edit_access", "themes"))
				$this->forbidden();

			elseif (!$this->theme->get_theme($folder, "frontend")
				or !file_exists($file_path) or is_dir($file_path))
				echo "Not Found!";

			else {
				$data["file_content"] = file_get_contents($file_path);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_theme_file_ajax", $data);
			}
		}

		public function edit_file_sub($folder, $file) {
			$folder = $this->str->xss_clean_adv($folder);
			$file = $this->str->xss_clean_adv($file);
			$folder_path = APPPATH . "views/themes/frontend/{$folder}/";
			$file_path = APPPATH . "views/themes/frontend/{$folder}/{$file}";

			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_access($this->user_id, "edit_access", "themes"))
				$this->forbidden();

			elseif (!$this->theme->get_theme($folder, "frontend")
				or !file_exists($file_path) or is_dir($file_path))
				echo "Not Found!";

			else {
				if (isset($_POST["submit"])) {
					$this->theme->folder_name = $folder;
					$this->theme->file_name = $file;
					$this->theme->file_path = $file_path;
					$this->theme->file_content = $_POST["file_content"];
					if ($this->theme->edit_theme_file())
						echo "OK!";
					else
						echo "GAGAL!";
				}
			}
		}

		public function delete() {

			if (!$this->user->check_access($this->user_id, "delete_access", "post"))
				$this->forbidden();

			$folder = $this->str->xss_clean_adv($_POST["folder"]);
			$position = $this->str->xss_clean_adv($_POST["position"]);

			if (!$this->theme->get_theme($folder, $position))
				show_404();

			else {
				// Hapus tema di folder views dan assets beserta seluruh isi filenya
				$to_views = APPPATH . "views" . DIR_SEP . "themes" . DIR_SEP . "frontend" . DIR_SEP . $folder . DIR_SEP;

				if (file_exists($to_views) and is_dir($to_views)) {
					delete_files($to_views, TRUE);
					rmdir($to_views);
				}

				$to_assets = ASSETS_FOLDER . DIR_SEP . $folder . DIR_SEP;

				if (file_exists($to_assets) and is_dir($to_assets)) {
					delete_files($to_assets, TRUE);
					rmdir($to_assets);
				}

				if ($this->theme->delete($folder, $position)) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_theme);				
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_theme);				
				}
			}
		}

		public function activate($folder) {
			if (!$this->user->check_access($this->user_id, "edit_access", "themes"))
				$this->forbidden();

			$folder = $this->str->xss_clean_adv($folder);

			if (!$this->theme->get_theme($folder, "frontend"))
				show_404();

			else {
				if ($this->theme->activate_frontend($folder)) {
					$this->session->set_userdata("per", "success");
					redirect(admin_url("theme/"));
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect(admin_url("theme/"));
				}
			}
		}
	}