<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Post_category extends Frontend_Controller {

		public function view($sef, $page = 0) {
			$sef = $this->str->xss_clean_adv($sef);
			if ($this->cat->get_cat($sef)->num_rows() <= 0)
				show_404();

			$d = $this->cat->get_cat($sef)->row();
			$per_page = 7;
			$paging_conf["base_url"] = cat_url("{$d->sefurl}/page/");
			$paging_conf["total_rows"] = $this->post->count_all_posts("Y", array("c.id" => $d->id));
			$paging_conf["per_page"] = $per_page;
			$paging_conf["use_page_numbers"] = TRUE;
			$paging_conf["first_url"] = cat_url("{$d->sefurl}/");
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
			$this->data["posts_data"] = $this->post->get_all_posts("DESC", "Y", array("c.id" => $d->id), $per_page, $offset);
			$this->data["cat_data"] = $d;
			$this->data["page"] = "view_cat";
			$this->data["title"] = "{$d->name} | {$this->play->_set("site_name")} - {$this->play->_set("site_motto")}";
			$this->data["description"] = "All posts ordered by category : \"{$d->name}\" {$this->play->_set("site_name")} - {$this->play->_set("meta_description")}";
			$this->data["keywords"] = $this->play->_set("meta_keywords");
			$this->load->view("themes/frontend/{$this->frontend_theme}/view_cat", $this->data);
		}
	}
