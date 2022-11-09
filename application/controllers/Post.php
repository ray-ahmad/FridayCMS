<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post extends Frontend_Controller {

		public function read($sef) {

			$sef = $this->str->xss_clean_adv($sef);

			if ($this->post->get_post($sef)->num_rows() <= 0 or $sef === NULL)
				show_404();

			$post = $this->post->get_post($sef)->row();
			$this->post->update_hits($post->id, $post->hits);
			$this->data["post"] = $post;
			$this->data["page"] = "post";
			$this->data["title"] = "{$post->title} | {$this->play->_set("site_name")} - {$this->play->_set("site_motto")}";
			$this->data["description"] = ($post->description !== NULL) ? character_limiter($post->description, 100, "...") : character_limiter(strip_tags($post->content), 100, "...");
			$this->data["keywords"] = $post->keywords;
			$this->load->view("themes/frontend/{$this->frontend_theme}/post", $this->data);
		}
		public function all($page = 0) {
			$per_page = 7;
			$paging_conf["base_url"] = posts_url("page/");
			$paging_conf["total_rows"] = $this->post->count_all_posts();
			$paging_conf["per_page"] = $per_page;
			$paging_conf["use_page_numbers"] = TRUE;
			$paging_conf["first_url"] = posts_url();
			$paging_conf['prev_tag_open'] = '<li>';
			$paging_conf['prev_tag_close'] = '</li>';
			$paging_conf['next_tag_open'] = '<li>';
			$paging_conf['next_tag_close'] = '</li>';
			$paging_conf['first_link'] = '&laquo;';
			$paging_conf['last_link'] = '&raquo;';
			$paging_conf['first_tag_open'] = '<li>';
			$paging_conf['first_tag_close'] = '</li>';
			$paging_conf['last_tag_open'] = '<li>';
			$paging_conf['last_tag_close'] = '</li>';
			$paging_conf['num_tag_open'] = '<li>';
			$paging_conf['num_tag_close'] = '</li>';
			$paging_conf["cur_tag_open"] = '<li class="active"><a>';
			$paging_conf["cur_tag_close"] = "</a></li>";
			$this->pagination->initialize($paging_conf);
			$offset = ($page != 0) ? ($page - 1) * $per_page : 0;
			$this->data["posts_data"] = $this->post->get_all_posts("DESC", "Y", "", $per_page, $offset);
			$this->data["page"] = "all_posts";
			$this->data["title"] = "All Posts | {$this->play->_set("site_name")} - {$this->play->_set("site_motto")}";
			$this->data["description"] = "All Posts of {$this->play->_set("site_name")} - {$this->play->_set("meta_description")}";
			$this->data["keywords"] = $this->play->_set("meta_keywords");
			$this->load->view("themes/frontend/{$this->frontend_theme}/all_posts", $this->data);
		}
	}
