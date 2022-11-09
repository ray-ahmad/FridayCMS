<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *	License : see LICENSE.txt file
 *
 *	----------------------------------------------------------------------------------------
 *
 *	This file used for initialize parent class used for controller on frontend and backend
 *	controller.
 *
 *	File ini digunakan untuk menginisialisasi kelas induk yang akan digunakan untuk
 *	controller di frontend dan backend.
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	/**
	 *  MY_Controller Class
	 *
	 *	This is class used in backend homepage contoller.
	 *
	 *	Kelas ini digunakan untuk controller halaman depan backend.
	 *
	 *	@parent	CI_Controller
	 */
	class MY_Controller extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->admin_dir = ADMIN_DIR;
		}

	}

	/**
	 *  Admin_Controller Class
	 *
	 *	This parent class mostly used in backend controller (except backend homepage
	 *	controller).
	 *
	 *	Kelas induk ini sering digunakan di controller backend (kecuali controller
	 *	halaman depan backend)
	 *
	 *	@parent	MY_Controller
	 */
	class Admin_Controller extends MY_Controller {

		public function __construct() {
			parent::__construct();
			if (!$this->input->is_ajax_request() and !$this->session->has_userdata("id_user"))
				redirect(admin_url("login/"));
			$this->user_id = $this->session->userdata("id_user");
			$this->load->library('user');
			$this->user->setUserID($this->user_id);
			$this->backend_theme = $this->play->get_backend_theme();
			$this->load->model("{$this->admin_dir}/User_model");
			$this->load->model("{$this->admin_dir}/Languange_model");
			$this->lang_m = $this->Languange_model;
			$this->lang_now = $this->lang_m->get_user_lang();//($this->session->has_userdata("backend_lang")) ? $this->session->userdata("backend_lang") : "english";
			$this->lang->load("admin_global", $this->lang_now);
			$this->lang->load("admin_form_validation", $this->lang_now);
			$this->user_m = $this->User_model;
			$this->user_info = $this->user_m->user_info($this->user_id);
			$this->data["user"] = $this->user_info;
		}

		protected function forbidden() {
			$data["user"] = $this->user_m->user_info($this->session->userdata("id_user"));
			$data["title"] = $this->lang->line("forbidden_header") . " | FridayCMS";
			$data["page"] = "forbidden";

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_forbidden", $data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $data);
		}

	}

	/**
	 *  Frontend_Controller Class
	 *
	 *	This parent class mostly used in front controller.
	 *
	 *	Kelas induk ini sering digunakan di controller frontend.
	 *
	 *	@parent MY_Controller
	 */
	class Frontend_Controller extends MY_Controller {

		public function __construct() {
			parent::__construct();
			$this->frontend_theme = $this->play->get_frontend_theme();

			/**
			 *	Load important apps models, and libraries.
			 *
			 *	Memuat model-model aplikasi penting, dan library-library.
			 */
			$this->load->model(array("Traffic_model", "Post_model", "Post_category_model", "Post_tag_model", "Post_comment_model", "Page_model"));			
			$this->load->helper(array("text"));
			$this->load->library("pagination");

			/**
			 *	Rename classes name.
			 *
			 *	Mengubah nama kelas-kelas.
			 */
			$this->traffic = $this->Traffic_model;
			$this->post = $this->Post_model;
			$this->cat = $this->Post_category_model;
			$this->com = $this->Post_comment_model;
			$this->tag = $this->Post_category_model;
			$this->page = $this->Page_model;

			/**
			 *	Run the traffic counter.
			 *
			 *	Menjalankan penghitungan traffic.
			 */
			$this->traffic->ip = $_SERVER["REMOTE_ADDR"];
			$this->traffic->browser = ($this->agent->is_browser()) ? $this->str->xss_clean_adv($this->agent->browser()) : NULL;
			$this->traffic->user_agent = $this->str->xss_clean_adv($this->agent->agent_string());
			$this->traffic->referrer_site = ($this->agent->is_referral()) ? $this->str->xss_clean_adv($this->agent->referrer()) : NULL;
			$this->traffic->platform = ($this->agent->platform() !== NULL) ? $this->str->xss_clean_adv($this->agent->platform()) : NULL;
			$this->traffic->run_traffic();

			$this->data["favicon"] = get_image($this->play->_set("site_favicon"), "");
			$this->data["logo"] = get_image($this->play->_set("site_logo"), "");

			if ($this->play->_set("caching") == "Y") {
				if ($this->play->_set("cache_expiration") !== NULL)
					$this->output->cache($this->play->_set("cache_expiration"));
				else
					$this->output->cache(5);
			}
			else
				$this->output->delete_cache();
		}

	}