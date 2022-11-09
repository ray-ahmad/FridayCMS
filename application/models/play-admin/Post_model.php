<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  Post App Model
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_model extends Admin_Model {

		public function __construct() {
			parent::__construct();
			$this->to_post = admin_url("post/");
			$this->lang->load("admin_global", $this->lang_now);
			$this->lang->load("admin_post", $this->lang_now);
		}

		public function all_post_datatables($dt) {
			$pref = DB_PREFIX;
			$columns = implode(", ", $dt['col-display']);
			$sql  = "SELECT {$columns}, {$pref}user.full_name, p.user_id, p.sef_url, p.day_posted, p.time_posted, p.hot_post, p.hits
					 FROM {$dt["table"]}
					 JOIN {$pref}post_categories ON p.category_id = {$pref}post_categories.id
					 JOIN {$pref}user ON p.user_id = {$pref}user.id
					";
			$data = $this->db->query($sql);
			$rowCount = $data->num_rows();
			$data->free_result();

			$columnd = $dt["col-display"];
			$count_c = count($columnd);

			$search = $dt["search"]["value"];

			$where = "";
			if ($search != "") {
				/*if (substr_count($search, " ") > 0) {
					for ($i = 0; $i < $count_c; $i++) {
						$where .= $columnd[$i] . ' LIKE "%'. $search .'%"';

						if ($i < $count_c - 1)
							$where .= " OR ";
					}
				}
				else {
					$strings = explode("|", $search);
					foreach ($strings as $string) {
						$isrch = 1;
						switch ($string) {
							case "active:Y" :
								$where .= "p.active = 'Y'";
							break;
							case "active:N" :
								$where .= "p.active = 'N'";
							break;
							case "hotpost:Y" :
								$where .= "p.hot_post = 'Y'";
							break;
							case "hotpost:N" :
								$where .= "p.hot_post = 'N'";
							break;
							case "hits:0" :
								$where .= "p.hits = '0'";
							break;
							default :
							break;
						}
						if ($isrch < (count($strings) - 1))
							$where .= " AND ";
						$isrch++;
					}
				}*/
				switch ($search) {
					case "active:Y" :
						$where = "p.active = 'Y'";
					break;
					case "active:N" :
						$where = "p.active = 'N'";
					break;
					case "hotpost:Y" :
						$where = "p.hot_post = 'Y'";
					break;
					case "hotpost:N" :
						$where = "p.hot_post = 'N'";
					break;
					case "hits:0" :
						$where = "p.hits = '0'";
					break;
					default :
						for ($i=0; $i < $count_c; $i++) {
							$where .= $columnd[$i] . ' LIKE "%'. $search .'%"';

							if ($i < $count_c - 1)
								$where .= " OR ";
						}
					break;
				}
			}

			$user_id = $this->session->userdata("id_user");
			if ($where != "") {
				$sql .= " WHERE (" . $where . ")";
				if (!$this->user->check_privilege($user_id, "read_all", "post"))
					$sql .= " AND p.user_id = '{$user_id}'";
			}
			else
				if (!$this->user->check_privilege($user_id, "read_all", "post"))
					$sql .= " WHERE p.user_id = '{$user_id}'";

			// ORDER BY
			$sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";

			// LIMIT ..., ...
			$start  = $dt['start'];
			$length = $dt['length'];

			$sql .= " LIMIT {$start}, {$length}";
			$_SESSION["tes"] = $sql;
			$list = $this->db->query($sql);
			// Konversi Ke JSON
			$option['draw']            = $dt['draw'];
			$option['recordsTotal']    = $rowCount;
			$option['recordsFiltered'] = $rowCount;
			$option['data']            = array();

			foreach ($list->result() as $row) {

				$rows = array();

				//for ($i=0; $i < $count_c; $i++) {

					//$sef = BASE_URL. "post/" . $row->sef_url . "/";
					$sef = post_url($row->sef_url);
					$active = ($row->active == "Y") ? $this->lang->line("active") : $this->lang->line("not_active");
					$tooltip = ($row->active == "Y") ? $this->lang->line("non_activate") . "!" : $this->lang->line("activate") . "!";
					$btn_fa = ($row->active == "Y") ? "fa fa-eye-slash" : "fa fa-eye";
					$btn_fa_ket = ($row->active == "Y") ? "fa fa-eye" : "fa fa-eye-slash";
					$btn_act_bg = ($row->active == "Y") ? "bg-maroon" : "bg-olive";

					$hot = ($row->hot_post == "Y") ? $this->lang->line("hot_post") : $this->lang->line("not_hot_post");
					$btn_hot = ($row->hot_post == "Y") ? "fa fa-eye-slash" : "fa fa-eye";
					$btn_hot_ket = ($row->hot_post == "Y") ? "text-red" : "text-muted";
					$btn_hot_bg = ($row->hot_post == "Y") ? "bg-maroon" : "bg-olive";
					$tp_hot = ($row->hot_post == "Y") ? $this->lang->line("delete_from_hot_post") : $this->lang->line("add_to_hot_post");

					$ket_hot = '<a class="btn btn-default btn-flat btn-sm"><i class="glyphicon glyphicon-fire ' . $btn_hot_ket . ' hot-post-' . $row->id . '"></i> <span class="hot-' . $row->id . '">' . $hot . '</span></a>';

					if ($this->user->check_privilege($user_id, "edit", "post"))
						$btn_edit = '<a href="' . $this->to_post . 'edit:' . $row->id . '" class="btn btn-success btn-flat btn-xs btn-block" title="' . $this->lang->line("edit") .'"><i class="fa fa-pencil"></i></a>';

					else
						$btn_edit = "";

					if ($this->user->check_privilege($user_id, "activate", "post")) {
						$btn_act = '<a class="btn ' . $btn_act_bg . ' btn-flat btn-xs btn-block btn-activation btn-act-' . $row->id . '" id="' . $row->id . '" title="' . $tooltip . '"><i class="fa-act-' . $row->id . ' ' . $btn_fa . '"></i></a>';
						$btn_hot = '<a class="btn ' . $btn_hot_bg . ' btn-flat btn-xs btn-block btn-hot-post btn-hot-' . $row->id . ' tooltip-hot-' . $row->id .'" id="' . $row->id . '" data-toggle="tooltip" data-original-title="' . $tp_hot . '"><i class="glyphicon glyphicon-fire"></i></a>';

					}

					else {
						$btn_act = "";
						$btn_hot = "";
					}

					if ($this->user->check_privilege($user_id, "delete", "post"))
						$btn_del = '<a class="btn btn-danger btn-flat btn-xs btn-block btn-hapus" id="' . $row->id . '" title="'. $this->lang->line("delete") .'!"><i class="fa fa-trash"></i></a>';
					else
						$btn_del = "";

					$ket = $row->title;
					$ket .= '<br>
							<a href="' . $sef .'" target="_blank">' . $sef . '</a>
							<br>
							<div class="btn-group">
								<a class="btn btn-default btn-flat btn-sm"><i class="fa fa-user"></i> ' . $row->full_name . '</a>
								<a class="btn btn-default btn-flat btn-sm"><i class="' . $btn_fa_ket . ' fa-act-post-' . $row->id . '"></i> <span class="activation-' . $row->id . '">' . $active . '</span></a>
							' . $ket_hot .
							'	<a class="btn btn-default btn-flat btn-sm"><i class="fa fa-line-chart"></i> ' . str_replace("[hits]", $row->hits, $this->lang->line("viewed_x_times")) . '</a>
							</div>';
					$action = '<div class="btn-group">'
								. $btn_edit . $btn_del . $btn_act . $btn_hot
								. '</div>';
					$checkbox = '<input type="checkbox" name="post[]" value="' . $row->id . '">';
					$rows[] = $checkbox;
					$rows[] = $row->id;
					$rows[] = $row->name;
					$rows[] = $ket;
					$rows[] = $row->date_posted . ", " . $row->time_posted;
					$rows[] = $action;
			   //}

			  $option['data'][] = $rows;
			}

			$this->session->set_userdata("per123", json_encode($option));

			echo json_encode($option);

		}

		public function all_post($active = "N", $where = NULL) {
			if($active == "Y")
				$this->db->where("active", "Y");

			if ($where !== NULL)
				$this->db->where($where);

			return $this->db->get("posts");
		}

		public function create_post() {

			$day = date("D");
			$tgl = date("Y-m-d");
			$time = date("G:i:s");

			$array = array("category_id" => $this->category,
						   "user_id" => $this->user_id,
						   "tag_id" => $this->tag,
						   "title" => $this->title,
						   "keywords" => $this->keywords,
						   "description" => $this->description,
						   "image" => $this->image,
						   "content" => $this->content,
						   "sef_url" => $this->sef_url,
						   "day_posted" => $day,
						   "date_posted" => $tgl,
						   "time_posted" => $time,
						   "active" => $this->active,
						   "hot_post" => "N");

			if ($this->db->insert("posts", $array))
				return TRUE;

			else
				return FALSE;
		}

		public function get_post($id) {

			$w["id"] = $id;
			$q = $this->db->get_where("posts", $w);

			if ($q->num_rows() <= 0)
				return FALSE;

			else
				return $q->row();

		}

		public function edit_post() {
			$d = $this->db->get_where("posts", array("id" => $this->post_id))->row();
			$array = array(
							"category_id" => $this->category,
							"title" => $this->title,
							"tag_id" => $this->tag,
							"keywords" => $this->keywords,
							"description" => $this->description,
							"image" => $this->image,
							"content" => $this->content,
							"sef_url" => $this->sef_url,
							"active" => $this->active,
							"hot_post" => $d->hot_post);

			if ($this->db->where("id", $this->post_id)
						 ->update("posts", $array))
				return TRUE;
			else
				return FALSE;
		}

		public function sef_check($id) {
			$d["sef_url"] = $this->sef;
			if ($id != 0)
				$d["id !="] = $id;
			return ($this->db->get_where("posts", $d)->num_rows() > 0) ? FALSE : TRUE;
		}

		public function delete($post_id) {
			$this->db->where("id", $post_id);
			$q = $this->db->delete("posts");

			if($q)
				return TRUE;

			else
				return FALSE;
		}

		public function activation($post_id) {
			$q = $this->db->get_where("posts", array("id" => $post_id));

			if($q->num_rows() > 0) {
				$d = $q->row();

				$data["active"] = ($d->active == "Y") ? "N" : "Y";

				if($this->db->where("id", $post_id)
							->update("posts", $data))
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

		public function count_posts($where = NULL) {
			if ($where !== NULL)
				return $this->db->get_where("posts", $where)->num_rows();
			else
				return $this->db->get("posts")->num_rows();
		}

		public function delete_all() {
			if($this->db->query("TRUNCATE TABLE `" . DB_PREFIX . "posts`"))
				return TRUE;

			else
				return FALSE;
		}
	}
