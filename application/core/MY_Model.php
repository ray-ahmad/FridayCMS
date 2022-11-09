<?php
/**
 *  PlayCMS
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
	class MY_Model extends CI_Model {
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
	class Admin_Model extends MY_Model {
		public function __construct() {
			parent::__construct();
			$this->user_id = $this->session->userdata("id_user");
			$this->user_info = $this->user_m->user_info($this->user_id);
			$this->lang_now = ($this->session->has_userdata("backend_lang")) ? $this->session->userdata("backend_lang") : "english";
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
	class Frontend_Model extends MY_Model {
	}