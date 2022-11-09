<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Page_model extends CI_Model {

		public function get_page($sef, $active = "Y") {
			return $this->db->where(array("p.sef_url" => $sef, "p.active" => $active))
							->get("pages p");
		}

		public function get_all_posts($order = "DESC", $active = "Y", $limit = 0, $offset = 0) {
			$this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
					 ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
					 ->join("user AS u", "`u`.`id` = `p`.`user_id`")
					 ->order_by("p.id", $order)
					 ->where("p.active", $active);

			if ($limit != 0)
				$this->db->limit($limit, $offset);
			
			return $this->db->get("posts p");
		}

		public function get_all_hot_posts($limit = 0, $offset = 0, $order = "DESC") {
			$this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
					 ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
					 ->join("user AS u", "`u`.`id` = `p`.`user_id`")
					 ->order_by("p.id", $order)
					 ->where(array("p.active" => "Y", "p.hot_post" => "Y"));

			if ($limit != 0)
				$this->db->limit($limit, $offset);
			
			return $this->db->get("posts p");
		}

		public function get_all_popular_posts($limit = 0, $offset = 0) {
			$this->db->select("p.*, c.name AS category, c.sefurl AS cat_sef_url, u.full_name AS pub_name")
					 ->join("post_categories AS c", "`c`.`id` = `p`.`category_id`")
					 ->join("user AS u", "`u`.`id` = `p`.`user_id`")
					 ->order_by("p.hits", "DESC")
					 ->where("p.active", "Y");

			if ($limit != 0)
				$this->db->limit($limit, $offset);

			return $this->db->get("posts p");
		}
	}