<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *	----------------------------------------------------------------------------------------------
 *	Post Tags App Controller
 *	----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_tag extends Admin_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model("{$this->admin_dir}/Post_tag_model");
			$this->lang->load("admin_post_tag", $this->lang_now);
			$this->post_tag = $this->Post_tag_model;
			$this->to_tag = admin_url("post/tags/");
		}

		public function datatables() {
			// AJAX Handle
			if ($this->input->is_ajax_request()) {
				$datatables  = $_POST;
				$datatables['table']    = DB_PREFIX . "post_tags";
				$datatables['col-display'] = array(
											   'id',
											   'id',
											   'title',
											   'make_date',
											   'active'
											 );

				$this->post_tag->all_post_tag_datatables($datatables);
			}
			else
				exit("You forbidden to access this page because this page only for AJAX request!");
		}

		public function index() {
			if (!$this->user->check_privilege($this->user_id, "read", "post_tag"))
				$this->forbidden();

			else {
				$data["user"] = $this->user_m->user_info($this->session->userdata("id_user"));
				$data["title"] = "Manajemen Tag | PlayCMS";
				$data["page"] = "all_tag";
				$data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$data["ajax_datatables"] = admin_url("post_tag/datatables");
				$data["datatables_id"] = "all_tag";
				
				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $data)
;;;;;;;;;;;;;;;;$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $data)
;;;;;;;;;;;;;;;;$this->load->view("themes/backend/{$this->backend_theme}/Admin_all_post_tag", $data)
;;;;;;;;;;;;;;;;$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $data);
			}
		}

		public function all() {
			// Call index method
			$this->index();
		}

		public function create() {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			else {
				if (!$this->user->check_privilege($this->user_id, "write", "post_tag")){
					echo "Forbidden!";
					exit();
				}
				
				$this->post_tag->title = $this->str->xss_clean_adv($_POST["title"]);

				if (empty($_POST["sef_url"]))
					$this->post_tag->sef_url = $this->play->sef_url($this->post_tag->title);
				else
					$this->post_tag->sef_url = $this->str->xss_clean_adv($_POST["sef_url"]);

				if (empty($_POST["description"]))
					$this->post_tag->description = NULL;
				else
					$this->post_tag->description = $this->str->xss_clean_adv($_POST["description"]);

				$mod = ($this->user->check_privilege($this->user_id, "write_moderate", "post_tag")) ? "Y" : "N";

				if ($this->post_tag->create_tag($mod, $this->user_id))
					echo "OK!";
				else
					echo "GAGAL!";
			}
		}

		public function edit_form($id) {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			else {	
				if (!$this->user->check_privilege($this->user_id, "edit", "post_tag"))
					die("Forbidden!");
				
				$id = $this->str->sql_inject_validate(abs((int) $id));
				
				if (!$this->post_tag->get_tag($id))
					die("Not Found!");
				
				else {
					$data["tag"] = $this->post_tag->get_tag($id);
					$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_post_tag", $data);
				}
			}
		}

		public function edit() {
			if (!$this->session->has_userdata("id_user"))
				die ("Not Logged!");

			else {
				if (!$this->user->check_privilege($this->user_id, "edit", "post_tag"))
					die("Forbidden!");
				
				$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));
				
				if (!$this->post_tag->get_tag($id))
					die("Not Found!");
				
				else {
					$this->post_tag->title = $this->str->xss_clean_adv($_POST["title"]);

					if (empty($_POST["sef_url"]))
						$this->post_tag->sef_url = $this->play->sef_url($this->post_tag->title);
					else
						$this->post_tag->sef_url = $this->str->xss_clean_adv($_POST["sef_url"]);

					if (empty($_POST["description"]))
						$this->post_tag->description = NULL;
					else
						$this->post_tag->description = $this->str->xss_clean_adv($_POST["description"]);	

					$mod = ($this->user->check_privilege($user_id, "edit", "post_tag")) ? "Y" : "N";
					if ($this->post_tag->edit_tag($id, $mod))
						echo "OK!";
					else
						die("GAGAL!");
				}
			}
		}

		public function delete() {
			if (empty($_POST["id"])) {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_tag);				
			}

			else {
				if (!$this->user->check_privilege($this->user_id, "delete", "post_tag"))
					$this->forbidden();

				$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));

				if (!$this->post_tag->get_tag($id))
					show_404();

				else {
					if($this->post_tag->delete($id)) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_tag);
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_tag);
					}
				}
			}
		}

		public function delete_selected() {
			if (isset($_POST["tag"])) {


				if ($this->user->check_access($this->user_id, "delete_selected", "post_tag")) {
					$i = 0;
					foreach ($_POST["tag"] as $id) {
						if ($this->post_tag->delete($this->str->sql_inject_validate($id)))
							$i++;
					}
					
					($i > 0) ? $this->session->set_userdata("per", "success") : 
							   $this->session->set_userdata("per", "query_ggl");
					redirect($this->to_tag);
				}
				else
					$this->forbidden();
			}
			else {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_tag);
			}
		}

		public function activation($id) {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			else {
				if (!$this->user->check_privilege($this->user_id, "activate", "post_tag"))
					echo "Forbidden!";

				$id = $this->security->xss_clean(abs((int) $id));

				if (!$this->post_tag->get_tag($id))
					echo "Not Found!";

				else {
					if ($this->post_tag->activation($id)) 
						echo "OK!";
					else 
						echo "GAGAL!";
				}
			}
		}
		
		public function delete_all() {
			if (!$this->user->check_privilege($this->user_id, "delete_all", "post_tag"))
				$this->forbidden();

			else {
				if ($this->post_tag->delete_all()) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_tag);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_tag);				
				}
			}
		}
	}