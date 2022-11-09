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

	class User_activity extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model("{$this->admin_dir}/User_activity_model");
			$this->user_act = $this->User_activity_model;
		}
		/*public function __construct() {
			parent::__construct();
			// Karena sudah diload otomatis, model user nya tidak perlu diload lagi :D
			$this->to_user = admin_url("user/profile/");

			// Khusus untuk Aplikasi Setting, User, Tema, dan "Aplikasi" (Coming Soon di Versi Alpha 2/1.0.7), tidak perlu dicek apakah aktif atau tidak karena aplikasi tersebut yang sangat penting di FridayCMS

		}*/

		public function profile($id = NULL) {
			//$this->load->model("{$this->admin_dir}/Post_model");
			//$cpbu = $this->Post_model->all_post("Y", array("user_id"))
			$id = ($id !== NULL) ? $this->str->sql_inject_validate($id) : $this->user_id;
			$this->data["page"] = "profile";
			$this->data["title"] = $this->user_m->user_info($id)->full_name;
			$this->data["user_activities"] = $this->user_act->get_all_user_activities($id);
			$this->load->theme("Admin_header", $this->data);
			$this->load->theme("Admin_aside", $this->data);
			$this->load->theme("Admin_user_profile", $this->data);
			$this->load->theme("Admin_footer", $this->data);
		}
	}