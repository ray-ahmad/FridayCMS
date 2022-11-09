<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *	License : see LICENSE.txt file
 *
 *	----------------------------------------------------------------------------------------
 *
 *	This controller used for manage user request for managing post.
 *
 *	Controller ini digunakan untuk mengatur permintaan user yang ingin mengatur post.
 */

 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post extends Admin_Controller {

		/**
		 *  Constructor Method
		 *
		 *	This method used for initialize model, and check if this app is activated.
		 *
		 *	Metode ini digunakan untuk menginisalisasi model, dan mengecek apakah aplikasi 
		 *	ini aktif.
		 */
		public function __construct() {

			parent::__construct();
			/**
			 *	Initialize model
			 *
			 *	Inisialisasi model
			 */
			$this->load->model("{$this->admin_dir}/Post_model");
			$this->load->model("{$this->admin_dir}/Post_category_model");
			$this->load->model("{$this->admin_dir}/Post_tag_model");
			$this->load->model("{$this->admin_dir}/User_model");

			$this->lang->load("admin_post", $this->lang_now);
			/**
			 *	Change model class name
			 *
			 *	Mengubah nama kelas model
			 */
			$this->post = $this->Post_model;
			$this->post_cat = $this->Post_category_model;
			$this->post_tag = $this->Post_tag_model;

			/**
			 *	URL to post app
			 *
			 *	URL menuju aplikasi post
			 */
			$this->to_post = admin_url("post/");

			if(!$this->play->check_backend_app("post"))
				die("Ooops, sorry but Post App is not activated!");

		}

		/**
		 *  Datatable Method
		 *
		 *	This method used for handling AJAX Datatable request if want all post with JSON 
		 *	format.
		 *
		 *	Metode ini digunakan menangani permintaan AJAX Datatable jika meminta data semua 
		 *	post dengan format JSON.
		 */
		public function datatables() {
			//if ($this->input->is_ajax_request()) {
				$this->datatables  = $_POST;
				$pref = DB_PREFIX;
				$this->datatables['table']    = "{$pref}posts p";
				$this->datatables['col-display'] = array(
											   'p.id',
											   'p.id',
											   $pref . 'post_categories.name',
											   'p.title',
											   'p.date_posted',
											   'p.active'
											 );

				$this->post->all_post_datatables($this->datatables);
			//}
			//else
				//die ("You forbidden to access this page because this page only for AJAX request!");
		}

		/**
		 *  Index Method
		 *
		 *	This method used to showing all post.
		 *
		 *	Metode ini digunakan untuk menampilkan semua post.
		 */
		public function index() {

			if($this->user->can('read_others_posts') || $this->user->can('read_posts')) {
				$this->data["title"] = "{$this->lang->line("all_posts")} | FridayCMS";
				$this->data["page"] = "all_post";
				$this->data["datatables_id"] = "all_post";
				$this->data["ajax_datatables"] = admin_url("post/datatables");
				$this->data["per"] = $this->session->has_userdata("per") ? $this->session->userdata("per") : "";
				$this->session->has_userdata("per") ? $this->session->unset_userdata("per") : "";

				$this->load->theme("Admin_header", $this->data);
				$this->load->theme("Admin_aside", $this->data);
				$this->load->theme("Admin_all_post", $this->data);
				$this->load->theme("Admin_footer", $this->data);
			}
			else
				$this->forbidden();
		}

		/**
		 *  All Post Method
		 *
		 *	Alternate for Index Method.
		 *
		 *	Alternatif Metode Index.
		 */
		public function all() {
			$this->index();
		}

		/**
		 *  Method for Validate Create/Edit Post Form
		 *
		 *	This method used for validate create/edit post form.
		 *
		 *	Metode ini digunakan untuk validasi form buat/edit post.
		 */
		private function valid() {
			$e = array("required" => "Field \"%s\" wajib kamu isi/pilih!",
					   "min_length" => "Panjang karakter \"%s\" minimal 4 karakter!"
					  );
			$this->form_valid->set_rules("title", "Judul", "required|min_length[4]", $e);
			$this->form_valid->set_rules("category", "Kategori", "required", $e);
			$this->form_valid->set_rules("content", "Konten", "required|min_length[4]", $e);
			return $this->form_valid->run();
		}

		public function create_load() {
			$post_cat_data = $this->post_cat->get_all_category_option();
			$this->data["title"] = $this->lang->line("create_new_post") . " | FridayCMS";
			$this->data["page"] = "create_post";
			$this->data["tinymce_id"] = "create";
			$this->data["categories_data"] = (!$post_cat_data and isset($row_c)) ? 0 : $post_cat_data;
			$this->data["tags"] = $this->post_tag->all_tag("Y");

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_create_post", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);

		}

		public function create() {

			if(!$this->user->can('create_posts'))
				$this->forbidden();

			if (isset($_POST["submit"])) {

				if ($this->valid() == TRUE) {

					$this->post->title = $this->str->xss_clean_adv($_POST["title"]);
					$this->post->category = $this->str->xss_clean_adv($_POST["category"]);

					// SEF URL
					if (empty($_POST["sefurl"]))
						$this->post->sef_url = $this->play->sef_url($this->post->title);
					else
						$this->post->sef_url = $_POST["sefurl"];

					// Post Tag
					if (empty($_POST["tag_id"]))
						$this->post->tag = NULL;
					else
						$this->post->tag = implode(", ", $_POST["tag_id"]);

					// Meta Keywords
					if (empty($_POST["keywords"]))
						$this->post->keywords = NULL;
					else
						$this->post->keywords = $this->str->xss_clean_adv($_POST["keywords"]);

					// Meta Description
					if (empty($_POST["description"]))
						$this->post->description = NULL;
					else
						$this->post->description = $this->str->xss_clean_adv($_POST["description"]);

					$this->post->content = $_POST["content"];

					if (empty($_POST["image"]))
						$this->post->image = NULL;

					else {
						$post_img = $_POST["image"];

						if (preg_match("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", $post_img)) {
							$replace = preg_replace("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", "", $post_img);

							if (file_exists(ASSETS_FOLDER . "/" . IMG_FOLDER . "/{$replace}"))
								$this->post->image = $replace;
							else
								$this->post->image = NULL;
						}

						else
							$this->post->image = $post_img;
					}

					$this->post->user_id = $this->user_id;
					$this->post->active = ($this->user->check_access($this->user_id, "write_moderate", "post")) ? "N" : "Y";

					if ($this->post->create_post()) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_post);
						exit();
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_post);
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
			$post_data = $this->post->get_post($id);
			$post_cat_data = $this->post_cat->get_all_category_option();

			$this->data["title"] = $this->lang->line("edit_post") . " | FridayCMS";
			$this->data["page"] = "edit_post";
			$this->data["post"] = $post_data;
			$this->data["categories_data"] = (!$post_cat_data and isset($row_c)) ? 0 : $post_cat_data;
			$this->data["tinymce_id"] = "create";
			$this->data["tags"] = $this->post_tag->all_tag("Y");

			$this->load->view("themes/backend/{$this->backend_theme}/Admin_header", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_aside", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_edit_post", $this->data);
			$this->load->view("themes/backend/{$this->backend_theme}/Admin_footer", $this->data);	
		}

		public function edit($id) {

			if (!$this->user->check_privilege($this->user_id, "edit", "post"))
				$this->forbidden();

			$id = $this->str->sql_inject_validate(abs((int) $id));

			if (!$this->post->get_post($id))
				show_404();

			if (isset($_POST["submit"])) {

				if ($this->valid() == TRUE) {
					$this->post->post_id = $id;
					$this->post->title = $this->str->xss_clean_adv($_POST["title"]);
					$this->post->category = $this->str->xss_clean_adv($_POST["category"]);

					// SEF URL
					if (empty($_POST["sefurl"]))
						$this->post->sef_url = $this->play->sef_url($this->post->title);
					else
						$this->post->sef_url = $_POST["sefurl"];

					// Post Tag
					if (empty($_POST["tag_id"]))
						$this->post->tag = NULL;
					else
						$this->post->tag = implode(", ", $_POST["tag_id"]);

					// Meta Keywords
					if(empty($_POST["keywords"]))
						$this->post->keywords = NULL;
					else
						$this->post->keywords = $this->str->xss_clean_adv($_POST["keywords"]);

					// Meta Description
					if(empty($_POST["description"]))
						$this->post->description = NULL;
					else
						$this->post->description = $this->str->xss_clean_adv($_POST["description"]);

					$this->post->content = $_POST["content"];

					// Image
					if (empty($_POST["image"]))
						$this->post->image = NULL;

					else {
						$post_img = $_POST["image"];

						if (preg_match("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", $post_img)) {
							$replace = preg_replace("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", "", $post_img);

							if (file_exists(ASSETS_FOLDER . "/" . IMG_FOLDER . "/{$replace}"))
								$this->post->image = $replace;
							else
								$this->post->image = NULL;
						}

						else
							$this->post->image = $post_img;
					}

					$this->post->user_id = $this->user_id;
					$this->post->active = ($this->user->check_privilege($this->post->user_id, "edit_moderate", "post")) ? "N" : "Y";

					if ($this->post->edit_post()) {
						$this->session->set_userdata("per", "success");
						redirect($this->to_post);
					}

					else {
						$this->session->set_userdata("per", "query_ggl");
						redirect($this->to_post);
					}
				}
				else
					$this->edit_load($id);
			}

			else
				$this->edit_load($id);
		}

		public function sef_check($id = 0) {
			$this->post->sef = $this->str->xss_clean_adv($_POST["sef"]);
			$id = $this->str->xss_clean_adv($id);
			$forbidden_words = array("sitemap.xml", "rss.xml", "page", "post", "tag", "category", "posts", "search", "albums", "album");

			if (in_array($this->post->sef, $forbidden_words))
				echo "Forbidden";
			elseif (!$this->post->sef_check($id))
				echo "Not Available";
			else
				echo "Available";
			
		}

		public function delete() {

			if (empty($_POST["id"])) {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_post);
			}
			
			$id = $this->str->sql_inject_validate(abs((int) $_POST["id"]));

			if (!$this->user->check_privilege($this->user_id, "delete", "post"))
				$this->forbidden();

			elseif (!$this->post->get_post($id))
				show_404();

			else {
				if ($this->post->delete($id)) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_post);				
				}

				else {
					$this->session->set_userdata("per", "query_ggl");
					redirect($this->to_post);				
				}
			}
		}

		public function delete_selected() {

			if(isset($_POST["post"])) {

				if($this->user->check_privilege($this->user_id, "delete_selected", "post")) {
					$i = 0;
					foreach($this->security->xss_clean($_POST["post"]) as $p_id) {

						if($this->post->delete($this->str->sql_inject_validate($p_id)))
							$i++;
					}
					
					($i > 0) ? $this->session->set_userdata("per", "success") : 
							   $this->session->set_userdata("per", "query_ggl");

					redirect($this->to_post);
				}

				else
					$this->forbidden();
			}

			else {
				$this->session->set_userdata("per", "blm_dipilih");
				redirect($this->to_post);
			}
		}

		public function activation($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			if(!$this->user->can('update_posts_status'))
				die('Forbidden!');
				
			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
			   )
			{

				$id = $this->str->sql_inject_validate(abs((int) $id));

				if (!$this->post->get_post($id))
					echo "Not Found!";

				else {
					if ($this->post->activation($id))
						echo "OK!";

					else
						echo "ERROR!";
				}
			}
			else
				die ("You forbidden to access this page because this page only for AJAX request!");
		}

		public function hot_post($id) {
			// If not logged, don't give access!
			if (!$this->session->has_userdata("id_user"))
				die("Not Logged!");

			if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
				strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
			   )
			{
				if (!$this->user->check_privilege($this->user_id, "activate", "post"))
					echo "Forbidden!";

				$id = $this->str->sql_inject_validate(abs((int) $id));

				if (!$this->post->get_post($id))
					echo "Not Found!";

				else {
					if ($this->post->hot_post($id))
						echo "OK!";
					else
						echo "ERROR!";
				}
			}
			else
				die ("You forbidden to access this page because this page only for AJAX request!");
		}

		public function delete_all() {

			if(!$this->user->check_privilege($this->user_id, "delete_all", "post"))
				$this->forbidden();

			else {
				if($this->post->delete_all()) {
					$this->session->set_userdata("per", "success");
					redirect($this->to_post);
				}

				else {
					$this->session->set_userdata("per", $per);
					redirect($this->to_post);				
				}
			}
		}
	}