<?php
 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Languange_model extends MY_Model {

		public function get_all_lang($act = "Y") {
			return $this->db->get_where("languange", array("active" => $act));
		}
		public function get_user_lang() {
			if ($this->session->has_userdata("backend_lang"))
				return $this->session->userdata("backend_lang");
			else {
				$u_id = $this->session->userdata("id_user");
				$q = $this->db->select("u.id, l.folder_name AS lf")
							  ->join("languange AS l", "`l`.`id` = `u`.`languange_id`")
							  ->where(array("u.id" => $u_id))
							  ->get("user u");
				$d = $q->row();
				//$this->session->set_userdata("backend_lang", $d->lf);
				//return $d->lf;
				return 2;
			}
		}
	}