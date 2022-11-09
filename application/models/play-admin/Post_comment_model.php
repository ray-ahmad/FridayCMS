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

	class Post_comment_model extends CI_Model {

		public function __construct() {

			parent::__construct();
			$this->load->database();
			$this->load->library("session");
			$this->load->helper("url");
		}

		public function all_com_datatables($dt) {
			$pref = DB_PREFIX;
			$columns = implode(", ", $dt['col-display']);
			$sql  = "SELECT {$columns}, c.commentator_email, c.commentator_web, c.make_day, c.make_time,
					 {$pref}posts.sef_url, {$pref}posts.title
					 FROM {$dt["table"]}
					 JOIN {$pref}posts ON c.post_id = {$pref}posts.id";
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

			if ($where != "")
				$sql .= " WHERE " . $where;
			
			// ORDER BY
			$sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
			
			// LIMIT ..., ...
			$start  = $dt['start'];
			$length = $dt['length'];

			$sql .= " LIMIT {$start}, {$length}";
			$_SESSION["sql"] = $sql;
			$list = $this->db->query($sql);

			$option['draw']            = $dt['draw'];
			$option['recordsTotal']    = $rowCount;
			$option['recordsFiltered'] = $rowCount;
			$option['data']            = array();

			$user_id = $this->session->userdata("id_user");

			foreach ($list->result() as $row) {

				$rows = array();

				for ($i = 0; $i < $count_c; $i++) {

					$to_com = admin_url("post/comment/");
					$sef = post_url($row->sef_url);
					$active = ($row->active == "Y") ? $this->lang->line("active") : $this->lang->line("not_active");
					$tooltip = ($row->active == "Y") ? $this->lang->line("non_activate") : $this->lang->line("activate");
					$btn_color = ($row->active == "Y") ? "text-green" : "text-red";
					$btn_act_bg = ($row->active == "Y") ? "bg-maroon" : "bg-olive";

					if ($this->user->check_privilege($user_id, "edit", "post_comment")) {
						$btn_edit = '<a href="' . $to_com . 'edit/' . $row->id . '/" class="btn btn-success btn-flat btn-xs btn-block" title="' . $this->lang->line("edit") .'"><i class="fa fa-pencil"></i></a>';
						$btn_act = '<a class="btn ' . $btn_act_bg . ' btn-flat btn-xs btn-block btn-activation btn-act-' . $row->id . '" id="' . $row->id . '" 
									   data-toggle="tooltip" title="' . $tooltip . '"><i class="fa fa-circle-o fa-act-' . $row->id . '"></i></a>';
					}

					else {
						$btn_edit = "";
						$btn_act = "";
					}

					if ($this->user->check_access($user_id, "delete_access", "post_comment"))
						$btn_del = '<a class="btn btn-danger btn-flat btn-xs btn-block btn-hapus" id="' . $row->id . '" title="' . $this->lang->line("delete") .'"><i class="fa fa-trash"></i></a>';
					else
						$btn_del = "";
					
					$btn_view = '<a class="btn btn-info btn-flat btn-xs btn-block view_com" id="' . $row->id .'" title="' . $this->lang->line("read_comment") .'"><i class="fa fa-eye"></i></a>';

					$ket = "<b>" . $this->lang->line("author") ." : {$row->commentator_name}</b>";
					$ket .= '<br>
							<div class="btn-group">
								<a class="btn btn-default btn-flat btn-sm"><i class="fa fa-circle-o ' . $btn_color . ' fa-act-com-' . $row->id . '"></i> <span class="activation-' . $row->id . '">' . $active . '</span></a>
							</div>';
					$action = '<div class="btn-group">'
								. $btn_edit . $btn_del . $btn_view . $btn_act
								. '</div>';
					$checkbox = '<input type="checkbox" name="comment[]" class="icheck" value="' . $row->id . '">';
					$rows[] = $checkbox;
					$rows[] = $row->id;
					$rows[] = '<a href="' . $sef .'#comment-' . $row->id . '" target="_blank">' . $row->title . '</a>';
					$rows[] = $ket;
					$rows[] = $row->make_date . ", " . $row->make_time;
					$rows[] = $action;
			   }

			   $option['data'][] = $rows;
			}

			// eksekusi json
			echo json_encode($option);

		}

		public function get_comment($id, $active = "N") {

			$data["id"] = $id;
			if ($active == "Y")
				$data["active"] = "Y";

			$q = $this->db->get_where("post_comment", $data);
			if($q->num_rows() <= 0)
				return FALSE;

			return $q ? $q->row() : FALSE;
		}

		public function activation($id) {
			$q = $this->db->get_where("post_comment", array("id" => $id));

			if($q->num_rows() <= 0)
				return FALSE;
			
			else {
				$d = $q->row();

				$data["active"] = ($d->active == "Y") ? "N" : "Y";
				$q = $this->db->where("id", $id)
							  ->update("post_comment", $data);

				return $q ? TRUE : FALSE;
			}
		}

		public function edit_comment() {

			$array = array("commentator_name" => $this->comtr_name,
						   "commentator_email" => $this->comtr_email,
						   "commentator_web" => $this->comtr_web,
						   "comment" => $this->comment
						   );
			$array["active"] = $this->moderate == "Y" ? "N" : "Y";

			$this->db->where("id", $this->comment_id);
			return $this->db->update("post_comment", $array) ? TRUE : FALSE;
		}

		public function delete($id) {
			$this->db->where("id", $id);
			$q = $this->db->delete("post_comment");

			return $q ? TRUE : FALSE;
		}
		
		public function delete_all() {
			return ($this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "post_comment`")) ? TRUE : FALSE ;
		}
	}