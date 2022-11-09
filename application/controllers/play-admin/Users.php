<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *	----------------------------------------------------------------------------------------------
 *	User App Controller
 *	----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Users extends Admin_Controller {

		public function __construct() {
			parent::__construct();
			// Karena sudah diload otomatis, model user nya tidak perlu diload lagi
			$this->to_user = admin_url("user/");
			$this->lang->load("admin_user", $this->lang_now);
			// Khusus untuk Aplikasi Setting, User, Tema, dan "Aplikasi" (Coming Soon di Versi Alpha 2/1.0.7), tidak perlu dicek apakah aktif atau tidak karena aplikasi tersebut yang sangat penting di FridayCMS

		}

		public function datatables() {
			// AJAX Handle
			//if ($this->input->is_ajax_request()) {
				$datatables  = $_POST;
				$this->user_m->pref = DB_PREFIX;

				$datatables["table"]    = "user u";
				$datatables["col-display"] = array(
											   "u.id",
											   "u.id",
											   "u.full_name",
											   "u.username",
											   "u.active",
											   "ul.name",
											   "u.join_date",
											   "u.login_date",
											   "u.active"
											 );

				$this->user_m->all_user_datatables($datatables);
			//}
			//else
				//exit("You forbidden to access this page because this page only for AJAX request!");
		}

		public function index() {
			if (!$this->user->can('read_users'))
				$this->forbidden();

			else {
				$data["user"] = $this->user_m->user_info($this->session->userdata("id_user"));
				$data["user_levels"] = $this->user_m->get_all_level();
				$data["title"] = $this->lang->line("management_user") . " | FridayCMS";
				$data["page"] = "all_user";
				$data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$data["ajax_datatables"] = admin_url("users/datatables");
				$data["datatables_id"] = "all_user";
				
				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_all_user", $data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $data);
			}
		}

		public function all() {
			$this->index();
		}

		private function valid($cat = "add") {
			$e = array("required" => "Field \"%s\" wajib kamu isi/pilih!",
					   "min_length" => "Panjang karakter \"%s\" minimal 4 karakter!",
					   "max_length" =>"Panjang karakter \"%s\" maksimal 250 karakter! (10 karakter untuk field tanggal lahir)",
					   "numeric" => "Field \"%s\" hanya boleh diisi dengan angka!",
					   "alpha_numeric" => "Field \"%s\" hanya boleh diisi dengan angka dan huruf!",
					   "alpha" => "Field \"%s\" hanya boleh diisi dengan huruf!",
					   "valid_email" => "Field \"%s\" harus diisi dengan format email yang benar!",
					   );
			$this->form_valid->set_rules("full_name", "Nama Lengkap", "required|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("email", "E-mail", "required|min_length[4]|max_length[250]|valid_email", $e);
			if ($cat == "add") {
				$this->form_valid->set_rules("password", "Password", "required|min_length[4]|max_length[250]", $e);
				$this->form_valid->set_rules("password_r", "Ulangi Password", "required|min_length[4]|max_length[250]", $e);
				$this->form_valid->set_rules("username", "Username", "required|min_length[4]|max_length[250]|alpha_numeric", $e);
			}
			$this->form_valid->set_rules("birthdate", "Tanggal Lahir", "required|min_length[4]|max_length[10]", $e);
			$this->form_valid->set_rules("telephone", "Nomor Telepon", "required|min_length[4]|max_length[20]|numeric", $e);
			$this->form_valid->set_rules("level_id", "Level", "required", $e);
			return $this->form_valid->run();
		}

		public function add() {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");
			
			$user_id = $this->session->userdata("id_user");
			
			if (!$this->user->can('create_users'))
				echo "Forbidden!";

			elseif ($this->valid() == TRUE) {

				$this->user_m->full_name = $this->str->xss_clean_adv($_POST["full_name"]);
				$this->user_m->email =  $this->str->xss_clean_adv($_POST["email"]);
				$this->user_m->username =  $this->str->xss_clean_adv($_POST["username"]);
				$this->user_m->password =  password_hash($this->str->xss_clean_adv($_POST["password"]), PASSWORD_BCRYPT);
				//$this->user_m->password_r =  $this->str->xss_clean_adv($_POST["password_r"]);
				$this->user_m->birthdate = dmy2ymd($_POST["birthdate"]);
				$this->user_m->phone_number =  $this->str->xss_clean_adv($_POST["telephone"]);
				$this->user_m->level_id =  $this->str->xss_clean_adv($_POST["level_id"]);

				if (!$this->user_m->check_available("email", $this->user_m->email))
					echo "E-mail Sudah Digunakan Orang Lain!";

				elseif (!$this->user_m->check_available("username", $this->user_m->username))
					echo "Username Sudah Digunakan Orang Lain!";

				elseif ($this->user_m->add_user())
					echo "OK!";

				else
					echo "GAGAL!";
			}
			else
				echo validation_errors();
		}

		public function edit_pass($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			$user_id = $this->session->userdata("id_user");

			if (!$this->user->can('update_users'))
				echo "Forbidden!";

			$id = $this->str->sql_inject_validate(abs((int) $id));

			if (!$this->user_m->user_info($id, "N"))
				echo "Not Found!";

			else {
				$data["id"] = $this->user_m->user_info($id, "N")->id;
				$data["user"] = $this->user_m->user_info($id, "N");
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_user_pass", $data);
			}
		}

		public function edit_form($id) {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");
			
			$user_id = $this->session->userdata("id_user");
			
			if (!$this->user->can('update_users'))
				die("Forbidden!");
			
			$id = $this->str->sql_inject_validate(abs((int) $id));
			
			if (!$this->user_m->user_info($id, "N"))
				die("Not Found!");
			
			else {
				$data["user"] = $this->user_m->user_info($id, "N");
				$data["user_levels"] = $this->user_m->get_all_level();
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_user", $data);
			}
		}

		public function edit_pass_sub() {
			if (!$this->session->has_userdata("id_user"))
				die ("Not Logged!");
			
			$user_id = $this->session->userdata("id_user");
			
			if (!$this->user->can('update_users') and empty($_POST["old_pass"]))
				die("Forbidden!");
			
			$id = $this->str->sql_inject_validate(abs((int) $_POST["user_id"]));
			
			if (!$this->user_m->user_info($id, "N"))
				die("Not Found!");
			
			else {
			$e = array("required" => "Field \"%s\" wajib kamu isi/pilih!",
					   "min_length" => "Panjang karakter \"%s\" minimal 4 karakter!",
					   "max_length" =>"Panjang karakter \"%s\" maksimal 250 karakter! (10 karakter untuk field tanggal lahir)",
					   );
			if ($id == $this->session->userdata("id_user"))
				$this->form_valid->set_rules("old_pass", "Password Lama", "required|min_length[4]|max_length[250]", $e);
			else
				$this->form_valid->set_rules("old_pass", "Password Lama", "min_length[4]|max_length[250]", $e);

			$this->form_valid->set_rules("new_pass", "Password Baru", "required|min_length[4]|max_length[250]", $e);
			$this->form_valid->set_rules("r_new_pass", "Ulangi Password Baru", "required|min_length[4]|max_length[250]", $e);

				if ($this->form_valid->run() == TRUE) {
					$this->user_m->user_id = $id;
					$this->user_m->old_pass = ($_POST["old_pass"] != "kosong") ? $this->str->xss_clean_adv($_POST["old_pass"]) : NULL;
					$this->user_m->new_pass = password_hash($this->str->xss_clean_adv($_POST["new_pass"]), PASSWORD_BCRYPT);
					$this->user_m->r_new_pass = $this->str->xss_clean_adv($_POST["r_new_pass"]);

					if ($this->user_m->old_pass !== NULL and !password_verify($this->user_m->old_pass, $this->user_m->user_info($id, "N")->password))
						echo "Password Lama-mu Salah!";

					elseif ($this->user_m->edit_pass())
						echo "OK!";
					else
						echo "GAGAL!";
				}
				else
					echo validation_errors();
			}
		}

		public function edit() {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");
			
			$user_id = $this->session->userdata("id_user");
			$id = $this->str->sql_inject_validate(abs((int) $_POST["user_id"]));
			if ($this->session->userdata("id_user") != $id and !$this->user->can('update_users'))
				echo "Forbidden!";

			elseif ($this->valid("edit") == TRUE) {
				$this->user_m->user_id = $id;
				$this->user_m->full_name = $this->str->xss_clean_adv($_POST["full_name"]);
				$this->user_m->email =  $this->str->xss_clean_adv($_POST["email"]);
				$this->user_m->birthdate = dmy2ymd($_POST["birthdate"]);
				$this->user_m->phone_number =  $this->str->xss_clean_adv($_POST["telephone"]);
				$this->user_m->level_id =  $this->str->sql_inject_validate(abs((int)$_POST["level_id"]));

				if ($this->user_m->email != $this->user_m->user_info($id, "N")->email
					and !$this->user_m->check_available("email", $this->user_m->email, "Y"))
					echo "E-mail Sudah Digunakan Orang Lain!";

				elseif ($this->user_m->edit_user())
					echo "OK!";

				else
					echo "GAGAL!";
			}
			else
				echo validation_errors();
		}

		public function delete() {
			if (empty($_POST["id"])) {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_tag);				
			}

			$user_id = $this->session->userdata("id_user");

			if (!$this->user->can('delete_users'))
				$this->forbidden();

			$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));

			if ($id == $user_id or !$this->user_m->user_info($id, "N"))
				show_404();

			else {
				if($this->user_m->delete($id)) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_user);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_user);
				}
			}
		}

		public function delete_selected() {
			if (isset($_POST["user"])) {

				$id_u = $this->session->userdata("id_user");

				if ($this->user->can('delete_users')) {
					$i = 0;
					foreach ($_POST["user"] as $id) {

						if ($id == $id_u)
							continue;
						else
							if ($this->user_m->delete($this->str->sql_inject_validate($id)))
								$i++;
					}
					
					($i > 0) ? $this->session->set_userdata("per", "success") : 
							   $this->session->set_userdata("per", "query_ggl");

					redirect($this->to_user);
				}

				else
					$this->forbidden();
			}

			else {

				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_tag);
			}
		}

		public function activation($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			$user_id = $this->session->userdata("id_user");

			if (!$this->user->can('update_users_status'))
				echo "Forbidden!";

			$id = $this->str->sql_inject_validate(abs((int) $id));

			if ($id == $user_id or !$this->user_m->user_info($id, "N"))
				echo "Not Found!";

			else {

				if($this->user_m->activation($id)) 
					echo "OK!";
				else 
					echo "GAGAL!";
			}
		}
		
		/*public function delete_all() {
			if (!$this->user->check_access($this->session->userdata("id_user"), "delete_access", "post_tag"))
				$this->forbidden();

			else {

				if ($this->post_tag->delete_all()) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_tag);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_tag);				
				}
			}
		}*/
		public function profile($id = NULL) {
			//$this->load->model("{$this->admin_dir}/Post_model");
			//$cpbu = $this->Post_model->all_post("Y", array("user_id"))
			$id = ($id !== NULL) ? $this->str->sql_inject_validate($id) : $this->user_id;
			$this->data["page"] = "profile";
			$this->data["title"] = $this->user_m->user_info($id)->full_name;
			$this->data["user_activities"] = $this->user_m->get_all_user_activities($id);
			$this->load->theme("Admin_header", $this->data);
			$this->load->theme("Admin_aside", $this->data);
			$this->load->theme("Admin_user_profile", $this->data);
			$this->load->theme("Admin_footer", $this->data);
		}
	}