<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_comment_model extends CI_Model {
		public function count_comments($post_id) {
			$q = $this->db->get_where("post_comment", array("post_id" => $post_id));
			if ($q->num_rows() > 0)
				return $q->num_rows() . " Komentar";
			else
				return "Tidak Ada Komentar";
		}
		
		public function get_all_comments($post_id, $parent_id = 0, $order = "DESC", $where = NULL, $limit = 0, $offset = 0) {
			$q = "SELECT * FROM `mpc_post_comment` c WHERE `c`.`active` = 'Y'";

			if ($parent_id != 0)
				$q .= " AND `c`.`parent_id` = '{$parent_id}`";

			if ($where !== NULL)
				$q .= " AND {$where}";

			$q .= "ORDER BY `c`.`id` {$order}";

			if ($limit != 0)
				$q .= " LIMIT {$offset}, {$limit}";

			return $this->db->query($q);
		}

	}
