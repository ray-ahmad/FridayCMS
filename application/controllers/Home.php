<?php

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Home extends Frontend_Controller {
		public function index() {
			$this->data["page"] = "home";
			$this->data["title"] = "Home | {$this->play->_set("site_name")} – {$this->play->_set("site_motto")}";
			$this->data["description"] = "Home | {$this->play->_set("meta_description")}";
			$this->load->view("themes/frontend/{$this->frontend_theme}/home", $this->data);
		}

		public function sitemap() {
			$this->load->helper("xml");
			header("Content-Type: application/xml");
			$this->load->view("sitemap");
		}
		
		public function rss() {
			
		}
	}