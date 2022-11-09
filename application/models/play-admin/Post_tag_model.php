<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  Post Tags App Model
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_tag_model extends CI_Model {

		public function __construct() {

			parent::__construct();
			$this->load->database();
			$this->load->helper("url");
			$this->to_tag = admin_url("tags/");
		}

		public function all_post_tag_datatables($dt) {
			
			$columns = implode(", ", $dt['col-display']);
			$sql  = "SELECT {$columns}, make_day, make_time, sef_url FROM {$dt["table"]}";
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
				if (!$this->user->check_privilege($user_id, "read_all", "post_tag"))
					$sql .= " AND p.user_id = '{$user_id}'";
			}
			else
				if (!$this->user->check_privilege($user_id, "read_all", "post_tag"))
					$sql .= " WHERE p.user_id = '{$user_id}'";
			
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

			$user_id = $this->session->userdata("id_user");

			foreach ($list->result() as $row) {

				$rows = array();

				for ($i = 0; $i < $count_c; $i++) {

					$sef = tag_url($row->sef_url);
					$active = ($row->active == "Y") ? $this->lang->line("active") : $this->lang->line("not_active");
					$tooltip = ($row->active == "Y") ? $this->lang->line("non_activate") : $this->lang->line("activate");
					$btn_fa = ($row->active == "Y") ? "fa fa-eye-slash" : "fa fa-eye";
					$btn_fa_ket = ($row->active == "Y") ? "fa fa-eye" : "fa fa-eye-slash";
					$btn_act_bg = ($row->active == "Y") ? "bg-maroon" : "bg-olive";

					if ($this->user->check_privilege($user_id, "edit", "post_tag"))
						$btn_edit = '<a class="btn btn-edit btn-success btn-flat btn-xs btn-block" id="' . $row->id .'" title="' . $this->lang->line("edit") .'"><i class="fa fa-pencil"></i></a>';
					else
						$btn_edit = "";

					if ($this->user->check_privilege($user_id, "activate", "post_tag"))
						$btn_act = '<a class="btn ' . $btn_act_bg . ' btn-flat btn-block btn-xs btn-activation btn-act-' . $row->id . '" id="' . $row->id . '" data-toggle="tooltip" title="' . $tooltip . '"><i class="fa-act-' . $row->id . ' ' . $btn_fa . '"></i></a>';
					else
						$btn_act = "";

					if ($this->user->check_privilege($user_id, "delete", "post_tag"))
						$btn_del = '<a class="btn btn-danger btn-flat btn-block btn-xs btn-hapus" id="' . $row->id . '" title="' . $this->lang->line("delete") . '"><i class="fa fa-trash"></i></a>';
					else
						$btn_del = "";

					$ket = "<em>{$row->title}</em>";
					$ket .= '<br>
							<a href="' . $sef .'" target="_blank">' . $sef . '</a>
							<br>
							<div class="btn-group">
								<a class="btn btn-default btn-flat btn-sm"><i class="' . $btn_fa_ket . ' fa-act-tag-' . $row->id . '"></i> <span class="activation-' . $row->id . '">' . $active . '</span></a>
							</div>';
					$action = '<div class="btn-group">'
								. $btn_edit . $btn_del . $btn_act
								. '</div>';
					$checkbox = '<input type="checkbox" class="checkbox icheck" name="tag[]" value="' . $row->id . '">';
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

		public function all_tag($active = "N") {
			if ($active == "Y")
				$this->db->where("active", "Y");
			$q = $this->db->get("post_tags");
			return ($q) ? $q->result() : FALSE;

		}
		public function get_tag($id, $active = "N") {

			$where["id"] = $id;

			if ($active == "Y")
				$where["active"] = "Y";

			$q = $this->db->where($where)
						  ->get("post_tags");

			if($q->num_rows() <= 0)
				return FALSE;

			return ($q) ? $q->row() : FALSE;
		}

		public function activation($id) {
			$q = $this->db->get_where("post_tags", array("id" => $id));

			if (!$q)
				return FALSE;

			elseif($q->num_rows() <= 0)
				return FALSE;

			else {
				$d = $q->row();

				$this->db->where("id", $id);				
				if ($d->active == "Y")
					$q_c = $this->db->update("post_tags", array("active" => "N"));
				else
					$q_c = $this->db->update("post_tags", array("active" => "Y"));

				return ($q_c) ? TRUE : FALSE;
			}
		}
		public function create_tag($moderate, $user_id) {

			$day = date("D"); // Hari 3 karakter
			$date = date("Y-m-d"); //Format tahun-bulan-tgl
			$time = date("G:i:s"); // Jam:menit:detik

			$array = array("user_id" => $user_id,
						   "title" => $this->title,
						   "description" => $this->description,
						   "sef_url" => $this->sef_url,
						   "make_day" => $day,
						   "make_date" => $date,
						   "make_time" => $time,
						   );

			$array["active"] = ($moderate == "Y") ? "N" : "Y";
			if ($this->db->insert("post_tags", $array))
				return TRUE;

			else 
				return FALSE;
		}

		public function edit_tag($tag_id, $moderate) {

			$array = array("title" => $this->title,
						   "description" => $this->description,
						   "sef_url" => $this->sef_url,
						   );

			$array["active"] = ($moderate == "Y") ? "N" : "Y";

			$this->db->where("id", $tag_id);
			return ($this->db->update("post_tags", $array)) ? TRUE : FALSE;
		}

		public function delete($id) {
			$this->db->where("id", $id);
			$q = $this->db->delete("post_tags");

			return(($q) ? TRUE : FALSE);
		}
		
		public function delete_all() {
			return ($this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "post_tags`")) ? TRUE : FALSE;
		}
	}