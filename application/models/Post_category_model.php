<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_category_model extends CI_Model {

		public function get_cat($sef) {
			return $this->db->get_where("post_categories", array("sefurl" => $sef));
		}

		public function get_all_cats($active = "Y", $id_order = "DESC", $limit = 0, $offset = 0) {
			if ($limit != 0) {
				$this->db->limit($limit, $offset);
			}

			return $this->db->where("active", $active)
							->order_by("id", $id_order)
							->get("post_categories");
		}

	}