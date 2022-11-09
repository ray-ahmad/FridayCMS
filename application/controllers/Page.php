<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Page extends Frontend_Controller {

		public function index($sef = NULL) {

			$sef = $this->str->xss_clean_adv($sef);

			if ($this->page->get_page($sef)->num_rows() <= 0)
				show_404();

			$page = $this->page->get_page($sef)->row();
			$this->data["pagedata"] = $page;
			$this->data["page"] = "page";
			$this->data["title"] = "{$page->title} | {$this->play->_set("site_name")} - {$this->play->_set("site_motto")}";
			$this->data["description"] = ($page->description !== NULL) ? character_limiter($page->description, 100, "...") : character_limiter(strip_tags($page->content), 100, "...");
			$this->data["keywords"] = $page->keywords;
			$this->load->view("themes/frontend/{$this->frontend_theme}/page", $this->data);
		}
	}