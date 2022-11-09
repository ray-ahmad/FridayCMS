<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *	License : see LICENSE.txt file
 *
 *	----------------------------------------------------------------------------------------
 *
 *	This model mostly used in backend page to show user information. 
 *
 *	Model ini banyak digunakan di halaman backend untuk mengetahui informasi user.
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class User_activity_model extends Admin_Model {

		public function get_all_user_activities($id) {
			return $this->db->get_where("user_activities", array("user_id" => $id));
		}
	}