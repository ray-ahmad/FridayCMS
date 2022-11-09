<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  ----------------------------------------------------------------------------------------------
 *  Setting App Controller
 *  ----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Setting extends Admin_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model("{$this->admin_dir}/Setting_model");

			$this->setting_m = $this->Setting_model;
			$this->to_setting = admin_url("setting/");
			$this->load->helper("file");

			// Khusus untuk Aplikasi Setting, User, Tema, dan "Aplikasi" (Coming Soon di Versi Alpha 2/1.0.7), tidak perlu dicek apakah aktif atau tidak karena aplikasi tersebut sangat penting di PlayCMS

		}

		public function index() {

			if(!$this->user->check_access($this->user_id, "read_access", "setting"))
				$this->forbidden();

			else {
				$data["user"] = $this->user_m->user_info($this->user_id);
				$data["title"] = "Pengaturan Website | PlayCMS";
				$data["page"] = "setting";
				$data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$data["codemirror_id"] = "meta_tag";

				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_setting", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $data);
			}
		}

		private function valid() {
			$e = array("required" => "Field \"%s\" wajib kamu isi/pilih!",
					   "min_length" => "Panjang karakter \"%s\" minimal 4 karakter!",
					   "max_length" =>"Panjang karakter \"%s\" maksimal 250 karakter! (15 karakter untuk field Masa Berlaku Cache)",
					   "numeric" => "Field \"%s\" hanya boleh diisi dengan angka!",
					   "alpha_numeric" => "Field \"%s\" hanya boleh diisi dengan angka dan huruf!",
					   "alpha" => "Field \"%s\" hanya boleh diisi dengan huruf!",
					   "valid_email" => "Field \"%s\" harus diisi dengan format email yang benar!",
					   );
			$this->form_valid->set_rules("site_name", "Nama Website", "required|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("site_motto", "Motto Website", "required|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("site_email", "Email Website", "required|valid_email|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("meta_key", "Meta Keywords", "min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("meta_desc", "Meta Description", "min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("favicon", "Gambar Ikon Website", "valid_url|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("logo", "Logo Website", "valid_url|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("cache_ex", "Masa Berlaku Cache", "numeric|max_length[15]", $e);
			$this->form_valid->set_rules("meta_file", "File Meta", "required|min_length[4]|max_length[250]", $e);
			return $this->form_valid->run();
		}

		public function edit() {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_access($this->user_id, "edit_access", "setting"))
				echo "Forbidden!";

			elseif ($this->valid() == FALSE)
				echo validation_errors();

			else {
				$this->s_m = $this->setting_m;
				$this->s_m->site_name = $this->str->xss_clean_adv($_POST["site_name"]);
				$this->s_m->site_motto = $this->str->xss_clean_adv($_POST["site_motto"]);
				$this->s_m->site_email = $this->str->xss_clean_adv($_POST["site_email"]);
				$this->s_m->meta_keywords = ($_POST["meta_key"] !== NULL) ? $this->str->xss_clean_adv($_POST["meta_key"]) : NULL;
				$this->s_m->meta_description = ($_POST["meta_desc"] !== NULL) ? $this->str->xss_clean_adv($_POST["meta_desc"]) : NULL;
	
				if (isset($_POST["favicon"])) {
					$fav = $_POST["favicon"];
					if (preg_match("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", $fav)) {
						$replace = preg_replace("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", "", $fav);

						if (file_exists(ASSETS_FOLDER . "/" . IMG_FOLDER . "/{$replace}"))
							$fav = $replace;
						else
							$fav = NULL;
					}

					else
						$fav = $fav;
				}

				else
					$fav = NULL;

				$this->s_m->site_favicon = $fav;

				if (isset($_POST["logo"])) {
					$logo = $_POST["logo"];
					if (preg_match("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", $logo)) {
						$replace = preg_replace("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", "", $logo);

						if (file_exists(ASSETS_FOLDER . "/" . IMG_FOLDER . "/{$replace}"))
							$logo = $replace;
						else
							$logo = NULL;
					}

					else
						$logo = $logo;
				}

				else
					$logo = NULL;

				$this->s_m->site_logo = $logo;
				$this->s_m->caching = $this->str->xss_clean_adv($_POST["cache"]);
				$this->s_m->cache_expiration = ($_POST["cache_ex"] !== NULL) ? $this->str->xss_clean_adv($_POST["cache_ex"]) : NULL;
				$this->s_m->maintenance = $this->str->xss_clean_adv($_POST["maintenance"]);
				$this->s_m->user_registration = $this->str->xss_clean_adv($_POST["user_reg"]);
				$this->s_m->user_reg_confirm = $this->str->xss_clean_adv($_POST["user_reg_conf"]);
				$this->s_m->moderate_comment = $this->str->xss_clean_adv($_POST["com_mod"]);
				$this->s_m->sitemap_priority = $this->str->xss_clean_adv($_POST["sitemap_priority"]);
				$this->s_m->sitemap_changefreq = $this->str->xss_clean_adv($_POST["sitemap_changefreq"]);
				$meta_file = $this->s_m->metatag_file = $this->str->xss_clean_adv($_POST["meta_file"]);
				$meta_tag = $this->str->xss_clean_adv($_POST["meta_tag"]);

				if ($this->s_m->edit()) {
					$to_meta = CONF_DIR . DIR_SEP . $meta_file;
					if (!file_exists($to_meta))
						echo "1";
						
					else {
						$handle = fopen($to_meta, "w");
						fwrite($handle, $meta_tag);
						fclose($handle);
						echo "2";
					}
				}
				else
					echo "3";
			}
		}

		public function delete_cache() {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_access($this->user_id, "edit_access", "setting"))
				echo "Forbidden!";

			else {
				$this->output->delete_cache();
				delete_files(APPPATH . "cache/", TRUE, TRUE);
				echo "1";
			}
		}
	}