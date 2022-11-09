<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  Post App Model
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Theme_model extends CI_Model {

		public $id;
		public $id_u;
		public $title;
		public $category;
		public $sef_url;
		public $keywords;
		public $description;
		public $image;
		public $content;

		public function all_frontend_theme($where = "kosong", $value = 0) {
			if ($where != "kosong")
				$w[$where] = $value;

			$w["position"] = "frontend";

			return $this->db->get_where("themes", $w);
		}

		public function all_theme($active = "N", $position) {
			if($active == "Y")
				$d["active"] =  "Y";

			$d["position"] =  $position;

			return $this->db->get_where("themes", $d);
		}
		
		public function get_theme($folder, $position) {

			$w["folder"] = $folder;
			$w["position"] = $position;
			$q = $this->db->get_where("themes", $w);

			if ($q->num_rows() <= 0)
				return FALSE;

			else
				return $q->row();
	
		}
		
		public function edit_theme_file() {

			$handle = fopen($this->file_path, "w");
			fwrite($handle, $this->file_content);
			fclose($handle);

			return TRUE;

		}

		public function sef_check($id) {
			$d["sef_url"] = $this->sef;
			if ($id != 0)
				$d["id !="] = $id;
			return ($this->db->get_where("posts", $d)->num_rows() > 0) ? FALSE : TRUE;
		}
		public function delete($folder, $position) {
			return ($this->db->where(array("folder" => $folder, "position" => $position))->delete("themes")) ? TRUE : FALSE;
				
		}

		public function activate_frontend($folder) {
			$q = $this->db->get_where("themes", array("folder" => $folder, "position" => "frontend"));
			$q2 = $this->db->get_where("themes", array("active" => "Y"));

			if ($q->num_rows() > 0) {
				if ($q2->num_rows() > 0) {
					$this->db->where(array("active" => "Y", "position" => "frontend"))
							 ->update("themes", array("active" => "N"));
				}

				$d = $q->row();

				if ($this->db->where("folder", $folder)
							 ->update("themes", array("active" => "Y")))
					return TRUE;
				else
					return FALSE;
			}
			else
				return FALSE;
			
		}

		public function hot_post($post_id) {
			$q = $this->db->get_where("posts", array("id" => $post_id));
				
			if($q->num_rows() > 0) {
				$d = $q->row();

				$data["hot_post"] = ($d->hot_post == "Y") ? "N" : "Y";

				if($this->db->where("id", $post_id)
							->update("posts", $data))
					return TRUE;
				else
					return FALSE;
			}
			else
				return FALSE;
			
		}
	}