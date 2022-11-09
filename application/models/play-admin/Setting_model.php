<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  Post App Model
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Setting_model extends CI_Model {

		public function edit() {

			$array = array("site_name", "site_motto", "site_email", "meta_keywords", 
						   "meta_description", "caching", "cache_expiration", "cache_expiration", 
						   "maintenance", "user_registration", "user_reg_confirm", "moderate_comment", 
						   "metatag_file", "site_favicon", "site_logo", "sitemap_priority",
						   "sitemap_changefreq");

			$i = 0;

			foreach ($array as $name){
				if ($this->db->where("name", $name)->update("settings", array("value" => $this->$name)))
					$i++;
			}
			return ($i > 0) ? TRUE : FALSE;
		}
	}