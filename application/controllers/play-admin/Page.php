<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  ----------------------------------------------------------------------------------------------
 *  Post App Controller
 *  ----------------------------------------------------------------------------------------------
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Page extends Admin_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->model("{$this->admin_dir}/Page_model");

			$this->lang->load("admin_page", $this->lang_now);
			$this->page = $this->Page_model;
			$this->to_page = admin_url("page/");

			if(!$this->play->check_backend_app("page"))
				die("Ooops, sorry but Post App is not activated!");

		}

		public function datatables() {
			// AJAX Handle
			if ($this->input->is_ajax_request()) {
				$this->datatables  = $_POST;
				$pref = DB_PREFIX;
				$this->datatables['table']    = "{$pref}pages p";
				$this->datatables['col-display'] = array(
											   'p.id',
											   'p.id',
											   'p.title',
											   'p.make_date',
											   'p.active'
											 );

				$this->page->all_page_datatables($this->datatables);
			}
			else
				die ("You forbidden to access this page because this page only for AJAX request!");
		}

		public function index() {

			if (!$this->user->check_privilege($this->user_id, "read", "page"))
				$this->forbidden();

			else {
				$this->data["title"] = $this->lang->line("all_pages") . " | FridayCMS";
				$this->data["page"] = "all_page";
				$this->data["datatables_id"] = "all_page";
				$this->data["ajax_datatables"] = admin_url("page/datatables");
				$this->data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
				$this->load->view("themes/backend/{$this->backend_theme}/Admin_all_page", $this->data);
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
			$this->form_valid->set_rules("title", "Judul", "required|min_length[4]", $e);
			$this->form_valid->set_rules("content", "Konten", "required|min_length[4]", $e);
			return $this->form_valid->run();
		}

		private function create_load() {
			$this->data["title"] = $this->lang->line("create_new_page") . " | FridayCMS";
			$this->data["page"] = "create_page";
			$this->data["tinymce_id"] = "create";

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_create_page", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);

		}

		public function create() {

			if (!$this->user->check_privilege($this->user_id, "write", "page"))
				$this->forbidden();

			if (isset($_POST["submit"])) {

				if ($this->valid() == TRUE) {

					$this->page->title = $this->str->xss_clean_adv($_POST["title"]);

					// SEF URL
					if (empty($_POST["sefurl"]))
						$this->page->sef_url = $this->play->sef_url($this->post->title);
					else
						$this->page->sef_url = $_POST["sefurl"];

					// Meta Keywords
					if(empty($_POST["keywords"]))
						$this->page->keywords = NULL;
					else
						$this->page->keywords = $this->str->xss_clean_adv($_POST["keywords"]);

					// Meta Description
					if(empty($_POST["description"]))
						$this->page->description = NULL;
					else
						$this->page->description = $this->str->xss_clean_adv($_POST["description"]);

					$this->page->content = $_POST["content"];
					$this->page->user_id = $this->user_id;
					$this->page->active = ($this->user->check_privilege($this->user_id, "write_moderate", "page")) ? "N" : "Y";

					if ($this->page->create_page()) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_page);
						exit();
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_page);
						exit();
					}
				}

				else
					$this->create_load();
			}

			else
				$this->create_load();
		}

		private function edit_load($id) {
			$this->data["title"] = $this->lang->line("change_page") . " | FridayCMS";
			$this->data["page"] = "edit_page";
			$this->data["page_data"] = $this->page->get_page($id);
			$this->data["tinymce_id"] = "edit";

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_page", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);
		}

		public function edit($id) {

			if (!$this->user->check_privilege($this->user_id, "edit", "page"))
				$this->forbidden();

			$id = $this->str->sql_inject_validate(abs((int) $id));

			if (!$this->page->get_page($id))
				show_404();

			if (isset($_POST["submit"])) {

				if ($this->valid() == TRUE) {

					$this->page->page_id = $id;
					$this->page->title = $this->str->xss_clean_adv($_POST["title"]);

					// SEF URL
					if (empty($_POST["sefurl"]))
						$this->page->sef_url = $this->play->sef_url($this->post->title);
					else
						$this->page->sef_url = $_POST["sefurl"];

					// Meta Keywords
					if (empty($_POST["keywords"]))
						$this->page->keywords = NULL;
					else
						$this->page->keywords = $this->str->xss_clean_adv($_POST["keywords"]);

					// Meta Description
					if(empty($_POST["description"]))
						$this->page->description = NULL;
					else
						$this->page->description = $this->str->xss_clean_adv($_POST["description"]);

					$this->page->content = $_POST["content"];
					$this->page->active = ($this->user->check_privilege($this->user_id, "edit_moderate", "page")) ? "N" : "Y";

					if ($this->page->edit_page()) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_page);
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_page);
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
				redirect($this->to_post);
			}

			$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));

			if (!$this->user->check_privilege($this->user_id, "delete", "page"))
				$this->forbidden();

			elseif (!$this->page->get_page($id))
				show_404();

			else {
				if ($this->page->delete($id)) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_page);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_page);
				}
			}
		}

		public function delete_selected() {

			if (isset($_POST["page"])) {

				if ($this->user->check_privilege($this->user_id, "delete", "page")) {
					$i = 0;
					foreach($this->security->xss_clean($_POST["page"]) as $id) {

						if ($this->page->delete($this->str->sql_inject_validate(abs((int)$id))))
							$i++;
					}

					($i > 0) ? $this->session->set_userdata("per", "success") :
							   $this->session->set_userdata("per", "query_ggl");

					redirect($this->to_page);
				}

				else
					$this->forbidden();
			}

			else {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_page);
			}
		}

		public function activation($id) {
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
			   )
			{
				if (!$this->user->check_privilege($this->user_id, "activate", "page"))
					echo "Forbidden!";

				$id = $this->str->sql_inject_validate(abs((int) $id));

				if (!$this->page->get_page($id))
					echo "Not Found!";

				else {
					if ($this->page->activation($id))
						echo "OK!";

					else
						echo "ERROR!";
				}
			}
			else
				die ("You forbidden to access this page because this page only for AJAX request!");
		}

		public function delete_all() {

			if (!$this->user->check_privilege($this->user_id, "delete_all", "page"))
				$this->forbidden();

			else {
				if ($this->page->delete_all()) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_page);
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_page);
				}
			}
		}
	}
