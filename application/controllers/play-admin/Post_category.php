<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *	----------------------------------------------------------------------------------------------
 *	Post Category App Controller
 *	----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_category extends Admin_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model("{$this->admin_dir}/Post_category_model");
			$this->lang->load("admin_post_category", $this->lang_now);
			$this->post_cat = $this->Post_category_model;
			$this->to_cat = admin_url("post/category/");
			
		}

		public function datatables() {
			if ($this->input->is_ajax_request()) {
				$this->datatables  = $_POST;
				$this->datatables['table']    = DB_PREFIX . "post_categories";
				$this->datatables['col-display'] = array(
											   'id',
											   'id',
											   'name',
											   'active'
											 );

				$this->post_cat->all_post_cat_datatables($this->datatables);
			}
			else
				exit("You forbidden to access this page because this page only for AJAX request!");
		}

		public function index() {
			if(!$this->user->check_privilege($this->user_id, "read", "post_category"))
				$this->forbidden();

			else {
				// Get all category and Get User Data

				$this->data["title"] = $this->lang->line("all_post_categories") . " | FridayCMS";
				$this->data["page"] = "all_cat";
				$this->data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$this->data["ajax_datatables"] = admin_url("post_category/datatables");
				$this->data["datatables_id"] = "all_cat";
				
				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_all_post_category", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
			}
		}

		public function all() {
			// Call index method
			$this->index();
		}

		private function valid() {
			$e = array("required" => "Field \"%s\" wajib kamu isi/pilih!",
					   "min_length" => "Panjang karakter \"%s\" minimal 4 karakter!"
					  );
			$this->form_valid->set_rules("name", "Nama Kategori", "required|min_length[4]", $e);
			return $this->form_valid->run();
		}

		private function create_load() {
			$this->data["title"] = $this->lang->line("create_new_post_category") . " | FridayCMS";
			$this->data["page"] = "create_cat";

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_create_post_category", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
		}

		public function create() {
			if(!$this->user->check_privilege($this->user_id, "write", "post_category"))
				$this->forbidden();

			else {

				if (isset($_POST["submit"])) {

					if ($this->valid() == TRUE) {
						$this->post_cat->name = $this->str->xss_clean_adv($_POST["name"]);

						// SEF URL
						if (empty($_POST["sef_url"]))
							$this->post_cat->sef_url = $this->play->sef_url($this->post_cat->title);
						else
							$this->post_cat->sef_url = $_POST["sef_url"];

						// Meta Keywords
						if(empty($_POST["keywords"]))
							$this->post_cat->keywords = NULL;
						else
							$this->post_cat->keywords = $this->str->xss_clean_adv($_POST["keywords"]);

						// Meta Description
						if(empty($_POST["description"]))
							$this->post_cat->description = NULL;
						else
							$this->post_cat->description = $this->str->xss_clean_adv($_POST["description"]);	
							
						$moderate = ($this->user->check_privilege($this->user_id, "write", "post_category") ? "Y" : "N");
						if ($this->post_cat->create_cat($moderate, $this->user_id)) {
							$this->session->set_userdata("per", "success");
							redirect($this->to_cat);
						}
						else {
							$this->session->set_userdata("per", "query_ggl");
							redirect($this->to_cat);
						}
					}

					else {
						$this->session->set_flashdata("warning", validation_errors());
						$this->create_load();
					}
				}

				else
					$this->create_load();
			}
		}

		private function edit_load($id) {
			$this->data["title"] = $this->lang->line("edit_post_category") . " | FridayCMS";
			$this->data["page"] = "edit_cat";
			$this->data["cat_data"] = $this->post_cat->get_cat($id);

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_post_category", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);

		}

		public function edit($id) {
			if (!$this->user->check_privilege($this->user_id, "edit", "post_category"))
				$this->forbidden();

			$cat_id = $this->str->sql_inject_validate(abs((int)$id));

			if (!$this->post_cat->get_cat($cat_id))
				show_404();

			else {
				if (isset($_POST["submit"])) {

					if ($this->valid() == TRUE) {

						$this->post_cat->name = $this->str->xss_clean_adv($_POST["name"]);
						$this->post_cat->sef_url = $this->str->xss_clean_adv((isset($_POST["sef_url"])) ? $_POST["sef_url"] : $this->play->sef_url($_POST["name"]));
						$this->post_cat->keywords = $this->str->xss_clean_adv((isset($_POST["keywords"])) ? $_POST["keywords"] : NULL);
						$this->post_cat->description = $this->str->xss_clean_adv((isset($_POST["description"])) ? $_POST["description"] : NULL);
						$moderate = ($this->user->check_privilege($this->user_id, "edit_moderate", "post_category") ? "Y" : "N");

						if ($this->post_cat->edit_cat($moderate, $this->user_id, $cat_id)) {
							$this->session->set_userdata("per", "success");
							redirect($this->to_cat);
						}

						else {
							$this->session->set_userdata("per", "query_ggl");
							redirect($this->to_cat);
						}
					}

					else {
						$this->session->set_flashdata("warning", validation_errors());
						$this->edit_load($id);
					}
				}

				else
					$this->edit_load($id);
			}
		}

		public function sef_check($id = 0) {
			$this->post_cat->sef = $this->str->xss_clean_adv($_POST["sef"]);
			$forbidden_words = array("sitemap.xml", "rss.xml", "page", "post", "tag", "category", "posts", "search", "albums", "album");

			if (in_array($this->post_cat->sef, $forbidden_words))
				echo "Forbidden";
			elseif (!$this->post_cat->sef_check($id))
				echo "Not Available";
			else
				echo "Available";
			
		}

		public function delete() {
			if (empty($_POST["id"])) {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_cat);				
			}

			$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));

			if (!$this->post_cat->get_cat($id))
				show_404();

			if (!$this->user->check_privilege($this->user_id, "delete", "post_category"))
				$this->forbidden();

			else {
				if ($this->post_cat->delete($id)) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_cat);
				}
				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_cat);
				}
			}
		}

		public function delete_selected() {
			if (isset($_POST["cat"])) {

				if ($this->user->check_privilege($this->user_id, "delete", "post_category")) {
					$i = 0;
					foreach ($_POST["cat"] as $c_id) {

						if ($this->post_cat->delete($this->str->sql_inject_validate($c_id)))
							$i++;
					}
					
					($i > 0) ? $this->session->set_userdata("per", "success") : 
							   $this->session->set_userdata("per", "query_ggl");

					redirect($this->to_cat);
				}

				else
					$this->forbidden();
			}

			else {

				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_cat);
			}
		}

		public function activation($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			elseif (!$this->user->check_privilege($this->user_id, "edit", "post_category"))
				echo "Forbidden!";

			else {
				$id = $this->str->sql_inject_validate(abs((int) $id));

				if (!$this->post_cat->get_cat($id))
					echo "Not Found!";

				else {

					if ($this->post_cat->activation($id)) 
						echo "OK!";
					else 
						echo "GAGAL!";
				}
			}
		}
		
		public function delete_all() {
			if (!$this->user->check_privilege($this->user_id, "delete", "post_category"))
				$this->forbidden();

			else {

				if ($this->post_cat->delete_all()) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_cat);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_cat);				
				}
			}
		}
	}