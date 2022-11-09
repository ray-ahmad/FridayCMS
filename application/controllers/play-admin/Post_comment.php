<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  ----------------------------------------------------------------------------------------------
 *  Post Comment App Controller
 *  ----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_comment extends Admin_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model("{$this->admin_dir}/Post_model");
			$this->load->model("{$this->admin_dir}/Post_comment_model");

			$this->post_com = $this->Post_comment_model;
			$this->post = $this->Post_model;
			$this->to_com = admin_url("post/comment/");

			$this->lang->load("admin_post_comment", $this->lang_now);
		}

		public function datatables() {
			// AJAX Handle
			if ($this->input->is_ajax_request()) {
				$this->datatables  = $_POST;
				$this->datatables['table']    = DB_PREFIX . "post_comment c";
				$this->datatables['col-display'] = array(
											   'c.id',
											   'c.id',
											   DB_PREFIX . 'posts.title',
											   'c.commentator_name',
											   'c.make_date',
											   'c.active'
											 );

				$this->post_com->all_com_datatables($this->datatables);
			}
			else
				exit("You forbidden to access this page because this page only for AJAX request!");

		}

		public function index() {
			if(!$this->user->check_access($this->user_id, "read_access", "post_comment"))
				$this->forbidden();

			else {
				// Get all comment and Get User Data

				$this->data["title"] = $this->lang->line("all_post_com") . " | FridayCMS";
				$this->data["page"] = "all_com";
				$this->data["datatables_id"] = "all_com";
				$this->data["ajax_datatables"] = admin_url("post_comment/datatables");
				$this->data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";

				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_all_post_comment", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
			}
		}

		public function all() {
			$this->index();
		}

		public function view_comment($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				echo "You must logged in to view this comment!";

			elseif(!$this->user->check_privilege($this->user_id, "read", "post_comment"))
				echo "Sorry, but you don't have access to view this comment!";

			else {
				$id = $this->str->sql_inject_validate(abs((int)$id));

				if (!$this->post_com->get_comment($id))
					echo "FridayCMS Warning : Failed to Run MySQL Query or Data isn't found on table!";

				else {
					$this->data["com"] = $this->post_com->get_comment($id);
					$this->load->view("themes/backend/{$this->backend_theme}/Admin_view_post_comment", $this->data);
				}
			}
		}

		private function valid() {
			$e = array("required" => "Field \"%s\" wajib kamu isi/pilih!",
					   "min_length" => "Panjang karakter field \"%s\" minimal 4 karakter!"
					  );
			$this->form_valid->set_rules("comtr_name", "Nama Pengirim", "required|min_length[4]", $e);
			$this->form_valid->set_rules("comtr_email", "Email Pengirim", "required|min_length[4]|valid_email", $e);
			$this->form_valid->set_rules("comtr_web", "Website Pengirim", "min_length[4]|valid_url|prep_url", $e);
			$this->form_valid->set_rules("comment", "Komentar", "required|min_length[4]", $e);
			return $this->form_valid->run();
		}

		/*private function give_load() {
			$this->data["title"] = "Berikan Komentar | FridayCMS";
			$this->data["page"] = "give_com";
			$this->data["all_post"] = (!$this->post->all_post("Y") ? "empty" : $this->post->all_post("Y"));

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_give_post_comment", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
		}

		public function give() {
			if (!$this->user->check_access($this->user_id, "write_access", "post_comment"))
				$this->forbidden();

			elseif (isset($_POST["submit"])) {

				if ($this->valid() == TRUE) {
					$this->post_com->user_id = $this->user_id;
					$this->post_com->commentator_name = $this->user_info->full_name;
					$this->post_com->commentator_email = $this->user_info->email;
					$this->post_com->post_id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));
					$this->post_com->comment = $this->str->xss_clean_adv($_POST["comment"]);
					$this->post_com->moderate = ($this->user->check_access($this->user_id, "write_moderate", "post_comment") ? "Y" : "N");

					if ($this->post_com->give_comment()) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_com);
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_com);
					}
				}
				else
					$this->give_load();
			}

			else 
				$this->give_load();
		}*/

		private function edit_load($id) {
			$this->data["title"] = "Edit Komentar Post | FridayCMS";
			$this->data["page"] = "edit_com";
			$this->data["com"] = $this->post_com->get_comment($id);
			$this->data["all_post"] = (!$this->post->all_post("Y") ? "empty" : $this->post->all_post("Y"));

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_post_comment", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
		}

		public function edit($id) {
			if (!$this->user->check_privilege($this->user_id, "change", "post_comment"))
				$this->forbidden();

			$id = $this->str->sql_inject_validate(abs((int) $id));

			if (!$this->post_com->get_comment($id))
				show_404();

			if (isset($_POST["submit"])) {

				if ($this->valid() == TRUE) {

					$this->post_com->comment_id = $id;
					//$this->post_com->post_id = $this->str->sql_inject_validate($_POST["id"]);
					$this->post_com->comtr_name = $this->str->xss_clean_adv($_POST["comtr_name"]);
					$this->post_com->comtr_email = $this->str->xss_clean_adv($_POST["comtr_email"]);
					$this->post_com->comtr_web = $this->str->xss_clean_adv($_POST["comtr_web"]);
					$this->post_com->comment = $this->str->xss_clean_adv($_POST["comment"]);
					$this->post_com->moderate = $this->user->check_privilege($this->user_id, "change_moderate", "post_comment") ? "Y" : "N";

					if ($this->post_com->edit_comment()) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_com);
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_com);
					}
				}
				else
					$this->edit_load($id);
			}

			else
				$this->edit_load($id);
		}

		public function delete() {

			if (empty($_POST["id"])) {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_com);				
			}

			elseif(!$this->user->check_access($this->user_id, "delete_access", "post_comment"))
				$this->forbidden();

			else {
				$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));

				if (!$this->post_com->get_comment($id))
					show_404();

				else {
					if ($this->post_com->delete($id)) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_com);
					}
					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_com);
					}
				}
			}
		}

		public function delete_selected() {
			if (isset($_POST["comment"])) {

				if ($this->user->check_access($this->user_id, "delete_access", "post_comment")) {
					$i = 0;
					foreach ($_POST["comment"] as $com_id) {

						if ($this->post_com->delete($this->str->sql_inject_validate($com_id)))
							$i++;
					}
					
					($i > 0) ? $this->session->set_userdata("per", "success") : 
							   $this->session->set_userdata("per", "query_ggl");

					redirect($this->to_com);
				}

				else
					$this->forbidden();
			}

			else {

				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_com);
			}
		}

		public function activation($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_access($this->user_id, "edit_access", "post_comment"))
				echo "Forbidden!";

			else {
				$id = $this->str->sql_inject_validate(abs((int) $id));

				if (!$this->post_com->get_comment($id))
					echo "Not Found!";

				else {
					if ($this->post_com->activation($id))
						echo "OK!";
					else
						echo "GAGAL!";
				}
			}
		}
		
		public function delete_all() {
			if (!$this->user->check_access($this->user_id, "delete_access", "post_comment"))
				$this->forbidden();

			else {

				if($this->post_com->delete_all()) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_com);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_com);				
				}
			}
		}
	}