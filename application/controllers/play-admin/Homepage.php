<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *	License : see LICENSE.txt file
 *
 *	----------------------------------------------------------------------------------------
 *
 *	This controller used for organize homepage, login page, register page, fogot password 
 *	page, and logout page.
 *
 *	Controller ini digunakan untuk mengatur halaman depan, halaman Login, daftar, lupa 
 *	password, dan logout.
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Homepage extends MY_Controller {

		public function __construct() {

			parent::__construct();
			if($this->session->has_userdata("id_user")){
				$this->user_id = $this->session->userdata("id_user");
				$this->load->library('user');
				$this->user->setUserID($this->user_id);
			}
			/**
			 *	Initialize model.
			 *
			 *	Inisialisasi model.
			 */
			$this->load->model("{$this->admin_dir}/User_model");
			$this->load->model("{$this->admin_dir}/Traffic_model");
			$this->load->model("{$this->admin_dir}/Languange_model");
			/**
			 *	Change model class name.
			 *
			 *	Mengubah nama kelas model.
			 */
			$this->traffic = $this->Traffic_model;
			$this->user_m = $this->User_model;
			$this->lang_m = $this->Languange_model;

			/**
			 *	Get active backend theme.
			 *
			 *	Mendapatkan tema backend yang aktif.
			 */
			$this->backend_theme = $this->play->get_backend_theme();

			$this->lang_now = $this->lang_m->get_user_lang();
			$this->lang->load("admin_global", $this->lang_now);
			$this->lang->load("admin_home", $this->lang_now);
		}

		/**
		 *  Validate Login Form Method
		 *
		 *	This method used if user is not logged in.
		 *
		 *	Metode ini digunakan jika seseorang belum login sama sekali.
		 */
		private function valid() {
			$error = array("required" => "%s harus kamu isi!",
						   "min_length" => "Panjang karakter %s minimal 4 karakter!",
						   );
			$this->form_valid->set_rules("username", "Username", "required|min_length[4]", $error);
			$this->form_valid->set_rules("password", "Password", "required|min_length[4]", $error);
			return $this->form_valid->run();
		}

		/**
		 *  Login Page Method
		 *
		 *	This method used if user is not logged in
		 *
		 *	Metode ini digunakan jika seseorang belum login sama sekali
		 */
		public function login() {
			if ($this->session->has_userdata("id_user"))
				redirect(admin_url());
			elseif (isset($_POST["submit"])) {
				if (!$this->valid())
					$this->load->theme("Admin_login");
				else {
					$this->user_m->username = $this->str->xss_clean_adv($_POST["username"]);
					$this->user_m->password = $this->str->xss_clean_adv($_POST["password"]);
					if ($this->user_m->login_submit())
						redirect(admin_url());
					else
						$this->load->theme("Admin_login");
				}
			}
			else
				$this->load->theme("Admin_login");
		}

		/**
		 *  Index Method
		 *
		 *	This method used to showing homepage if user has been logged in.
		 *
		 *	Metode ini digunakan untuk menampilkan halaman depan jika seseorang sudah login.
		 */
		public function index() {
			if (!$this->session->has_userdata("id_user"))
				redirect(admin_url("login/"));

			$this->load->model("{$this->admin_dir}/Post_model");
			$this->user_info = $this->user_m->user_info($this->session->has_userdata("id_user"));

			/**
			 *	Get traffic data from 1 week ago to now.
			 *
			 *	Mendapatkan data traffic dari 1 minggu yang lalu sampai sekarang.
			 */
			$data["chart"]["date1"] = $this->traffic->get_date("1 week ago");
			$data["chart"]["visit1"] = $this->traffic->get_visitor("1 week ago");
			$data["chart"]["hits1"] = $this->traffic->get_hits("1 week ago");
			$n = 2;
			for ($i = 6; $i >= 2; $i--) {
				$data["chart"]["date{$n}"] = $this->traffic->get_date("{$i} days ago");
				$data["chart"]["visit{$n}"] = $this->traffic->get_visitor("{$i} days ago");
				$data["chart"]["hits{$n}"] = $this->traffic->get_hits("{$i} days ago");
				$n++;
			}
			$data["chart"]["date7"] = $this->traffic->get_date("yesterday");
			$data["chart"]["visit7"] = $this->traffic->get_visitor("yesterday");
			$data["chart"]["hits7"] = $this->traffic->get_hits("yesterday");

			/**
			 *	Alternate if you want date now (on script line 113).
			 *
			 *	Alternatif jika kamu ingin tanggal sekarang (pada script baris ke 113).
			 *
			 *	$data["chart"]["date8"] = $this->traffic->get_date("now");
			 */
			$data["chart"]["date8"] = "Sekarang";
			$data["chart"]["visit8"] = $this->traffic->get_visitor("now");
			$data["chart"]["hits8"] = $this->traffic->get_hits("now");

			$data["user"] = $this->user_m->user_info($this->session->userdata("id_user"));
			$data["title"] = $this->lang->line("homepage") . " | FridayCMS";
			$data["page"] = "index";
			$data["online_users"] = $this->user_m->count_users(array("online" => "Y"));
			$data["new_registered_users"] = $this->user_m->count_users(array("join_date" => date("Y-m-d")));
			$data["new_posts"] = $this->Post_model->count_posts(array("date_posted" => date("Y-m-d"), "active" => "Y"));

			$this->load->theme("Admin_header", $data);
			$this->load->theme("Admin_aside", $data);
			$this->load->theme("Admin_index", $data);
			$this->load->theme("Admin_footer", $data);
		}

		public function change_lang() {
			if (isset($_POST["set_lang"])) {
				$set_lang = $this->str->xss_clean_adv($_POST["set_lang"]);
				$this->session->set_userdata("backend_lang", $set_lang);
				redirect(admin_url());
			}
		}
		/**
		 *  Logout Page Method
		 *
		 *	This method used if user want to logout.
		 *
		 *	Metode ini digunakan jika user ingin logout.
		 */
		public function logout() {
			if (!$this->session->has_userdata("id_user"))
				redirect(admin_url("login/"));
			else {
				if($this->user_m->logout($this->session->userdata("id_user"))) {
					$this->session->sess_destroy();
					redirect(admin_url("login/"));
				}
			}
		}
	}