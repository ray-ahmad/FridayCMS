<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *	License : see LICENSE.txt file
 *
 *	----------------------------------------------------------------------------------------
 *
 *	This model mostly used in backend page to show user information. 
 *
 *	Model ini banyak digunakan di halaman backend untuk mengetahui informasi user.
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class User_roles_model extends CI_Model {

		public function all_user_datatables($dt) {
			$columns = implode(", ", $dt['col-display']);
			$sql  = "SELECT {$columns}, u.level_id, ul.id AS levels_id, ul.name AS level_name
					 FROM {$dt["table"]}
					 JOIN {$this->pref}user_levels AS ul ON u.level_id = ul.id
					";
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

			if ($where != "")
				$sql .= " WHERE " . $where;
			
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

					$active = ($row->active == "Y") ? $this->lang->line("yes") : $this->lang->line("no");
					$tooltip = ($row->active == "Y") ?  $this->lang->line("non_activate") . "!" : $this->lang->line("activate") . "!";
					$btn_fa = ($row->active == "Y") ? "fa fa-eye-slash" : "fa fa-eye";
					$btn_fa_ket = ($row->active == "Y") ? "fa fa-eye" : "fa fa-eye-slash";
					$btn_act_bg = ($row->active == "Y") ? "bg-maroon" : "bg-olive";
					$dis = ($row->id == $user_id || $row->id == 1) ? "disabled" : 'id="' . $row->id . '"';
					$class_act = ($row->id == $user_id || $row->id == 1) ? "" : "btn-activation";
					$class_del = ($row->id == $user_id || $row->id == 1) ? "" : "btn-hapus";
					
					if ($this->user->can('update_users')) { 
						$btn_edit = '<a class="btn btn-edit btn-success btn-flat btn-xs btn-block" id="' . $row->id .'" title="' . $this->lang->line("edit") .'"><i class="fa fa-pencil"></i></a>';
						$btn_passwd = '<a class="btn btn-passwd bg-navy btn-flat btn-xs btn-block" id="' . $row->id .'" title="Edit Password!"><i class="glyphicon glyphicon-lock"></i></a>';
					}

					else {
						$btn_edit = "";
						$btn_passwd = "";
					}

					if ($this->user->can('update_users_status'))
						$btn_act = '<a class="btn ' . $btn_act_bg . ' btn-flat btn-xs btn-block ' . $class_act .' btn-act-' . $row->id . '" data-toggle="tooltip" title="' . $tooltip . '"' . $dis .'><i class="fa-act-' . $row->id . ' ' . $btn_fa . '"></i></a>';
					else
						$btn_act = "";

					if ($this->user->can('delete_users'))
						$btn_del = '<a class="btn btn-danger btn-flat btn-xs btn-block ' . $class_del .'" title="Hapus!"' . $dis . '><i class="fa fa-trash"></i></a>';
					else
						$btn_del = "";

					$action = '<div class="btn-group">'
								. $btn_edit . $btn_del . $btn_passwd . $btn_act
								. '</div>';
					$checkbox = '<input type="checkbox" class="checkbox icheck" name="user[]" value="' . $row->id . '"';
					$checkbox .= ($row->id == $user_id || $row->id == 1) ? ' disabled>' : '>';

					$rows[] = $checkbox;
					$rows[] = $row->id;
					$rows[] = $row->full_name;
					$rows[] = '<span class="activation-' . $row->id . '">' . $active . '</span>';
					$rows[] = $row->level_name;
					$rows[] = $row->join_date;
					$rows[] = ($row->login_date == NULL) ? "(Sepertinya, ia belum pernah login?)" : $row->login_date;
					$rows[] = $action;
			   }

			   $option['data'][] = $rows;
			}

			// eksekusi json
			echo json_encode($option);
		}

		public function get_all_level() {
			return $this->db->get_where("user_levels")->result();
		}

		public function add_user() {
			$now = date("Y-m-d G:i:s");
			$array = array("level_id" => $this->level_id,
						   "full_name" => $this->full_name,
						   "email" => $this->email,
						   "username" => $this->username,
						   "password" => $this->password,
						   "phone_nmbr" => $this->phone_number,
						   "birth_date" => $this->birthdate,
						   "join_date" => $now,
						   "active" => "Y",
						  );
			return ($this->db->insert("user", $array)) ? TRUE : FALSE;			
		}

		public function edit_user() {
			$array = array("level_id" => $this->level_id,
						   "full_name" => $this->full_name,
						   "email" => $this->email,
						   "phone_nmbr" => $this->phone_number,
						   "birth_date" => $this->birthdate,
						   "active" => "Y",
						  );
			return ($this->db->where("id", $this->user_id)
							 ->update("user", $array)) ? TRUE : FALSE;			
		}

		public function edit_pass() {
			$array = array("password" => $this->new_pass);
			return ($this->db->where("id", $this->user_id)
							 ->update("user", $array)) ? TRUE : FALSE;
		}

		public function count_users($where = NULL) {
			if ($where !== NULL)
				return $this->db->get_where("user", $where)->num_rows();
			else
				return $this->db->get("user")->num_rows();
		}

		public function activation($id) {
			$q = $this->db->get_where("user", array("id" => $id));

			if (!$q)
				return FALSE;

			elseif($q->num_rows() <= 0)
				return FALSE;

			else {
				$d = $q->row();

				$this->db->where("id", $id);				
				if ($d->active == "Y")
					$q_c = $this->db->update("user", array("active" => "N"));
				else
					$q_c = $this->db->update("user", array("active" => "Y"));

				return ($q_c) ? TRUE : FALSE;
			}
		}

		public function delete($id) {
			return ($this->db->where("id", $id)->delete("user")) ? TRUE : FALSE;
		}

		public function check_available($type, $data) {
			return ($this->db->get_where("user", array($type => $data))->num_rows() <= 0) ? TRUE : FALSE;
		}

		public function login_submit() {

			$q = $this->db->get_where("user", array("username" => $this->username, 
													"active" => "Y"));

			if ($q->num_rows() <= 0) {

				$this->session->set_userdata("per", "slh_user");
				return FALSE;

			}

			$d = $q->row();

			if (!password_verify($this->password, $d->password)) {

				$this->session->set_userdata("per", "slh_pass");
				return FALSE;
			}

			else {
				$id = $d->id;
				$date_time = date("Y-m-d G:i:s");
				$this->session->set_userdata("id_user", $id);

				if ($this->db->update("user", array("login_date" => $date_time, "online" => "Y"), array("id" => $id)))
					return TRUE;
				else
					return TRUE;
			}
		}
		
		public function user_info ($id_u, $active = "Y") {
		
			$data["id"] = $id_u;
			if ($active == "Y")
				$data["active"] = "Y";
			$q = $this->db->get_where("user", $data);

			if ($q->num_rows() <= 0)
				return FALSE;

			return $q->row();
		}

		public function logout($id) {
				$date_time = date("Y-m-d G:i:s");

				if ($this->db->update("user", array("logout_date" => $date_time, "online" => "N"), array("id" => $id)))
					return TRUE;

				else
					return TRUE;	
		}
	}