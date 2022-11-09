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

	class Page_model extends Admin_Model {

		public function __construct() {
			parent::__construct();
			$this->to_post = admin_url("page/");
			$this->lang->load("admin_global", $this->lang_now);
			$this->lang->load("admin_page", $this->lang_now);
		}

		public function all_page_datatables($dt) {
			$pref = DB_PREFIX;
			$columns = implode(", ", $dt['col-display']);
			$sql  = "SELECT {$columns}, p.make_time, p.make_day, p.sef_url
					 FROM {$dt["table"]}";
			$data = $this->db->query($sql);
			$rowCount = $data->num_rows();
			$data->free_result();

			$columnd = $dt["col-display"];
			$count_c = count($columnd);

			$search = $dt["search"]["value"];

			$where = "";
			if ($search != "") {
				for ($i=0; $i < $count_c; $i++) {
					$where .= $columnd[$i] . ' LIKE "%'. $search .'%"';

					if ($i < $count_c - 1)
						$where .= " OR ";
				}
			}

			$user_id = $this->session->userdata("id_user");
			if ($where != "") {
				$sql .= " WHERE (" . $where . ")";
				if (!$this->user->check_privilege($user_id, "read_all", "page"))
					$sql .= " AND p.user_id = '{$user_id}'";
			}
			else
				if (!$this->user->check_privilege($user_id, "read_all", "page"))
					$sql .= " WHERE p.user_id = '{$user_id}'";
			
			// ORDER BY
			$sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
			
			// LIMIT ..., ...
			$start  = $dt['start'];
			$length = $dt['length'];

			$sql .= " LIMIT {$start}, {$length}";
			
			$list = $this->db->query($sql);
			//$_SESSION["tes"] = $sql;
			// Konversi Ke JSON
			$option['draw']            = $dt['draw'];
			$option['recordsTotal']    = $rowCount;
			$option['recordsFiltered'] = $rowCount;
			$option['data']            = array();

			foreach ($list->result() as $row) {

				$rows = array();

				for ($i = 0; $i < $count_c; $i++) {

					$sef = BASE_URL. "page/" . $row->sef_url . "/";
					$active = ($row->active == "Y") ? $this->lang->line("active") : $this->lang->line("not_active");
					$tooltip = ($row->active == "Y") ? $this->lang->line("non_activate") : $this->lang->line("activate");
					$btn_fa = ($row->active == "Y") ? "fa fa-eye-slash" : "fa fa-eye";
					$btn_fa_ket = ($row->active == "Y") ? "fa fa-eye" : "fa fa-eye-slash";
					$btn_act_bg = ($row->active == "Y") ? "bg-maroon" : "bg-olive";

					if ($this->user->check_privilege($user_id, "edit", "page"))
						$btn_edit = '<a href="' . $this->to_page . 'edit:' . $row->id . '" class="btn btn-success btn-flat btn-xs btn-block" title="' . $this->lang->line("edit") . '"><i class="fa fa-pencil"></i></a>';

					else
						$btn_edit = "";


					if ($this->user->check_privilege($user_id, "activate", "page"))
						$btn_act = '<a class="btn ' . $btn_act_bg . ' btn-flat btn-xs btn-block btn-activation btn-act-' . $row->id . '" id="' . $row->id . '" data-toggle="tooltip" title="' . $tooltip . '"><i class="fa-act-' . $row->id . ' ' . $btn_fa . '"></i></a>';

					else
						$btn_act = "";

					if ($this->user->check_privilege($user_id, "delete", "page"))
						$btn_del = '<a class="btn btn-danger btn-flat btn-xs btn-block btn-hapus" id="' . $row->id . '" title="' . $this->lang->line("delete") .'"><i class="fa fa-trash"></i></a>';
					else
						$btn_del = "";

					$ket = "<em>{$row->title}</em>";
					$ket .= '<br>
							<a href="' . $sef .'" target="_blank">' . $sef . '</a>
							<br>
							<div class="btn-group">
								<a class="btn btn-default btn-flat btn-sm"><i class="' . $btn_fa_ket . ' fa-act-page-' . $row->id . '"></i> <span class="activation-' . $row->id . '">' . $active . '</span></a>
							</div>';
					$action = '<div class="btn-group">'
								. $btn_edit . $btn_del . $btn_act
								. '</div>';
					$checkbox = '<input type="checkbox" name="page[]" value="' . $row->id . '">';
					$rows[] = $checkbox;
					$rows[] = $row->id;
					$rows[] = $ket;
					$rows[] = $row->make_date . ", " . $row->make_time;
					$rows[] = $action;
			   }

			   $option['data'][] = $rows;
			}

			// eksekusi json
			echo json_encode($option);

		}

		public function all_post($active = "N") {
			if($active == "Y")
				$this->db->where("active", "Y");

			$q = $this->db->get("posts");

			return $q->result();
		}

		public function create_page() {

			$day = date("D"); // Hari 3 karakter
			$tgl = date("Y-m-d"); //Format tahun-bulan-tgl
			$time = date("G:i:s"); // Jam:menit:detik

			$array = array("user_id" => $this->user_id,
						   "title" => $this->title,
						   "keywords" => $this->keywords,
						   "description" => $this->description,
						   "content" => $this->content,
						   "sef_url" => $this->sef_url,
						   "make_day" => $day,
						   "make_date" => $tgl,
						   "make_time" => $time,
						   "active" => $this->active
						   );

			if ($this->db->insert("pages", $array))
				return TRUE;

			else
				return FALSE;
		}
		
		public function get_page($id) {

			$w["id"] = $id;
			$q = $this->db->get_where("pages", $w);

			if ($q->num_rows() <= 0)
				return FALSE;

			else
				return $q->row();
	
		}
		
		public function edit_page() {
			$array = array("title" => $this->title,
						   "keywords" => $this->keywords,
						   "description" => $this->description,
						   "content" => $this->content,
						   "sef_url" => $this->sef_url,
						   "active" => $this->active
						  );

			if ($this->image !== NULL)
				$array["image"] = $this->image;

			$this->db->where("id", $this->page_id);
			$q = $this->db->update("pages", $array);

			if ($q)
				return TRUE;
			else
				return FALSE;
		}

		public function delete($id) {

			$this->db->where("id", $id);
			$q = $this->db->delete("pages");
			return ($q) ? TRUE : FALSE;
		}

		public function activation($page_id) {
			$q = $this->db->get_where("pages", array("id" => $page_id));
				
			if($q->num_rows() > 0) {
				$d = $q->row();

				$data["active"] = ($d->active == "Y") ? "N" : "Y";

				if($this->db->where("id", $page_id)
							->update("pages", $data))
					return TRUE;
				else
					return FALSE;
			}
			else
				return FALSE;
			
		}		
		
		public function delete_all() {
			if($this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "pages`"))
				return TRUE;

			else
				return FALSE;
		}
	}