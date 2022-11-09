<?php

	class test extends CI_Controller {
		
		public function index() {
						$this->load->database();
						$q = $this->db->get("post");
			$tes["tesaa"] = $q->result();
			$tes["b"] = "Footer";
			$tes["c"] = "Headers";
			$tes["d"] = "Footers";
			
			foreach ($tes as $key => $isi) { 
				$data =  $key => $isi;
			}
			
			$this->load->view("tes", array($data));
		}
	}