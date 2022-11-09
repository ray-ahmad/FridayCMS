<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_tag_model extends CI_Model {

		public function get_tag($tag_id, $style) {

			$tag_id = explode(", ", $tag_id);

			foreach ($this->db->get("post_tags")->result() as $tag) {

				if (!in_array($tag->id, $tag_id))
					continue;
				else
					return str_replace("{tag_name}", $tag->title, $style);

			}
		}

	}