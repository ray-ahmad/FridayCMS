<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  Post Category App Model
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_category_model extends Admin_Model {

		public function __construct() {

			parent::__construct();
			$this->to_cat = admin_url("post/category/");
			$this->lang->load("admin_global", $this->lang_now);
			$this->lang->load("admin_post", $this->lang_now);
		}

		public function get_all_category_option() {

			$q = $this->db->get_where("post_categories", array("active" => "Y"));
			
			if ($q->num_rows() <= 0) {
				$row_c = 0;
				return FALSE;
			}
			return $q->result();
		}

		public function all_post_cat_datatables($dt) {
			$columns = implode(", ", $dt['col-display']);
			$sql  = "SELECT {$columns}, sefurl, make_day, make_time FROM {$dt["table"]}";
			$data = $this->db->query($sql);
			$rowCount = $data->num_rows();
			$data->free_result();

			$columnd = $dt["col-display"];
			$count_c = count($columnd);

			$search = $dt["search"]["value"];

			$where = "";
			if ($search != "") {
				for ($i=0; $i < $count_c ; $i++) {
					$where .= $columnd[$i] . ' LIKE "%'. $search .'%"';

					if ($i < $count_c - 1) 
						$where .= " OR ";
				}
			}

			$user_id = $this->session->userdata("id_user");
			if ($where != "") {
				$sql .= " WHERE (" . $where . ")";
				if ($this->user->check_privilege($user_id, "read_all", "post_category"))
					$sql .= " AND user_id = '{$user_id}'";
			}
			else
				if ($this->user->check_privilege($user_id, "read_all", "post_category"))
					$sql .= " WHERE user_id = '{$user_id}'";

			// ORDER BY
			$sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
			
			// LIMIT ..., ...
			$start  = $dt['start'];
			$length = $dt['length'];

			$sql .= " LIMIT {$start}, {$length}";

			$list = $this->db->query($sql);

			// Konversi Ke JSON
			$option['draw']            = $dt['draw'];
			$option['recordsTotal']    = $rowCount;
			$option['recordsFiltered'] = $rowCount;
			$option['data']            = array();

			foreach ($list->result() as $row) {

				$rows = array();

				for ($i=0; $i < $count_c; $i++) {

					//$sef = BASE_URL. "category/{$row->sefurl}/";
					$sef = cat_url($row->sefurl);
					$active = ($row->active == "Y") ? $this->lang->line("active") : $this->lang->line("not_active");
					$tooltip = ($row->active == "Y") ? $this->lang->line("non_activate") . "!" : $this->lang->line("activate") . "!";
					$btn_fa = ($row->active == "Y") ? "fa fa-eye-slash" : "fa fa-eye";
					$btn_fa_ket = ($row->active == "Y") ? "fa fa-eye" : "fa fa-eye-slash";
					$btn_act_bg = ($row->active == "Y") ? "bg-maroon" : "bg-olive";

					if ($this->user->check_privilege($user_id, "edit", "post_category"))
						$btn_edit = '<a href="' . $this->to_cat . 'edit/' . $row->id . '/" class="btn btn-success btn-flat btn-xs btn-block" title="' . $this->lang->line("edit") .'!"><i class="fa fa-pencil"></i></a>';

					else
						$btn_edit = "";

					if ($this->user->check_privilege($user_id, "activate", "post_category"))
						$btn_act = '<a class="btn ' . $btn_act_bg . ' btn-flat btn-xs btn-block btn-activation btn-act-' . $row->id . '" id="' . $row->id . '" data-toggle="tooltip" title="' . $tooltip . '"><i class="fa-act-' . $row->id . ' ' . $btn_fa . '"></i></a>';

					else
						$btn_act = "";

					if($this->user->check_privilege($user_id, "delete", "post_category"))
						$btn_del = '<a class="btn btn-danger btn-flat btn-xs btn-block btn-hapus" id="' . $row->id . '" title="'. $this->lang->line("delete") .'!"><i class="fa fa-trash"></i></a>';
					else
						$btn_del = "";

					$ket = "<em>{$row->name}</em>";
					$ket .= '<br>
							<a href="' . $sef .'" target="_blank">' . $sef . '</a>
							<br>
							<div class="btn-group">
								<a class="btn btn-default btn-flat btn-sm"><i class="' . $btn_fa_ket . ' fa-act-cat-' . $row->id . '"></i> <span class="activation-' . $row->id . '">' . $active . '</span></a>
							</div>';
					$action = '<div class="btn-group">'
								. $btn_edit . $btn_del . $btn_act
								. '</div>';
					$checkbox = '<input type="checkbox" class="checkbox icheck" name="cat[]" value="' . $row->id . '">';
					$rows[] = $checkbox;
					$rows[] = $row->id;
					$rows[] = $ket;
					$rows[] = $action;
			   }

			   $option['data'][] = $rows;
			}

			// eksekusi json
			echo json_encode($option);
		}

		public function all_cat() {
			$this->db->select("post_category.id, post_category.name, post_category.sefurl, 
							   post_category.make_day, post_category.make_date, post_category.make_time, 
							   post_category.active, user.full_name");
			$this->db->from("post_categories");
			$this->db->join("user",
							"user.id = post_category.user_id");
			$this->db->order_by("post_category.id", "ASC");
			$q = $this->db->get();
			
			if ($q->num_rows() <= 0)
				return FALSE;

			return $q->result();
		}

		public function get_cat($id, $active = "N") {

			$where["id"] = $id;

			if ($active == "Y")
				$where["active"] = "Y";

			$this->db->where($where);

			$q = $this->db->get("post_categories");

			if($q->num_rows() <= 0)
				return FALSE;

			return(($q) ? $q->row() : FALSE);
		}

		public function sef_check($id) {
			$d["sefurl"] = $this->sef;
			if ($id != 0)
				$d["id !="] = $id;
			return ($this->db->get_where("post_categories", $d)->num_rows() > 0) ? FALSE : TRUE;
		}

		public function activation($id) {
			$q = $this->db->get_where("post_categories", array("id" => $id));

			if(!$q)
				return FALSE;

			elseif($q->num_rows() <= 0)
				return FALSE;

			else {
				$d = $q->row();

				$this->db->where("id", $id);				
				if($d->active == "Y")
					$q_c = $this->db->update("post_categories", array("active" => "N"));
				else
					$q_c = $this->db->update("post_categories", array("active" => "Y"));

				return(($q_c) ? TRUE : FALSE);
			}
		}
		public function create_cat($moderate, $user_id) {

			$day = date("D"); // Hari 3 karakter
			$date = date("Y-m-d"); //Format tahun-bulan-tgl
			$time = date("G:i:s"); // Jam:menit:detik
			if ($moderate == "Y") {
				$array = array("user_id" => $user_id,
							   "name" => $this->name,
							   "keywords" => $this->keywords,
							   "description" => $this->description,
							   "sefurl" => $this->sef_url,
							   "make_day" => $day,
							   "make_date" => $date,
							   "make_time" => $time,
							   "active" => "N");
				}
			else {
				$array = array("user_id" => $user_id,
							   "name" => $this->name,
							   "keywords" => $this->keywords,
							   "description" => $this->description,
							   "sefurl" => $this->sef_url,
							   "make_day" => $day,
							   "make_date" => $date,
							   "make_time" => $time,
							   "active" => "Y");
			}

			if($this->db->insert("post_categories", $array))
				return TRUE;

			else 
				return FALSE;
		}

		public function edit_cat($moderate, $user_id, $cat_id) {

			if ($moderate == "Y") {
				$array = array("name" => $this->name,
							   "keywords" => $this->keywords,
							   "description" => $this->description,
							   "sefurl" => $this->sef_url,
							   "active" => "N");
			}

			else {
				$array = array("name" => $this->name,
							   "keywords" => $this->keywords,
							   "description" => $this->description,
							   "sefurl" => $this->sef_url,
							   "active" => "Y");
			}

			$this->db->where("id", $cat_id);
			return ($this->db->update("post_categories", $array)) ? TRUE : FALSE;
		}

		public function delete($id) {
			$this->db->where("id", $id);
			$q = $this->db->delete("post_categories");

			return(($q) ? TRUE : FALSE);
		}
		
		public function delete_all() {
			return ($this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "post_categories`")) ? TRUE : FALSE;
		}
	}