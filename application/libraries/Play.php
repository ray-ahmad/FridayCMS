<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  PlayCMS Library
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Play {

		public function __construct() {
			$this->CI =& get_instance();
		}

		public function check_backend_app($alias, $active = "Y") {
			$q = $this->CI->db->get_where("modules", array("alias" => $alias));
			$d = $q->row();

			if($d->active != $active or $q->num_rows() <= 0)
				return FALSE;

			return TRUE;
		}

		public function get_backend_theme($active = "Y") {

			$data["position"] = "backend";
			$data["active"] = $active;

			$q = $this->CI->db->get_where("themes", $data);

			if($q->num_rows() <= 0) 
				return show_error("No backend themes (are activated) in themes tables!", 503, "PlayCMS Warning");

			$d = $q->row();

			if(!is_dir(APP_DIR . "/views/themes/backend/{$d->folder}/"))
				show_error("Can't find themes folder \"" . APP_DIR . "/views/themes/backend/{$d->folder}/\"", 503, "PlayCMS Warning");

			return $d->folder;
		}

		public function check_frontend_app($alias, $active = "Y") {
			$q = $this->CI->db->get_where("apps", array("alias" => $alias));
			$d = $q->row();

			if($d->active_front_end != $active or $q->num_rows() <= 0)
				return FALSE;

			return TRUE;
		}

		public function get_frontend_theme($active = "Y") {

			$data["position"] = "frontend";
			$data["active"] = $active;

			$q = $this->CI->db->get_where("themes", $data);

			if($q->num_rows() <= 0) 
				return show_error("No frontend themes (are activated) in themes tables!", 503, "PlayCMS Warning");

			$d = $q->row();

			if(!is_dir(APP_DIR . "/views/themes/frontend/{$d->folder}/"))
				show_error("Can't find themes folder \"" . APP_DIR . "/views/themes/frontend/{$d->folder}/\"", 503, "PlayCMS Warning");

			return $d->folder;
		}

		public function setting($name) {

			$q = $this->CI->db->get_where("settings", array("name" => $name));

			if ($q->num_rows() <= 0)
				show_error("Setting {$name} is not found on settings table!", 503, "PlayCMS Warning");

			return $q->row()->value;
		}

		public function _set($name) {
			return $this->setting($name);
		}
	}