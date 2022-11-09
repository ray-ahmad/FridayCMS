<?php

	class User {

		public $CI;
		public $user_id;
		public $permission;
		public $app;

		public function __construct() {
			$this->CI =& get_instance();
		}

		public function setUserID($user_id){
			$this->user_id = $user_id;
		}

		public function getUserID(){
			return $this->user_id;
		}
		
		public function check_access($user_id, $permission, $app) {

			$q = $this->CI->db->join("user_access", "user_access.level_id = user.level_id")
							  ->where(array("user_access.active" => "Y",
											"user.active" => "Y",
											"user_access.app" => $app,
											"user.id" => $user_id))
							  ->get("user");

			if($q->num_rows() > 0) {

				$d = $q->row();
				if (isset($d->$permission))
					return ($d->$permission == "Y") ? TRUE : FALSE;
				else
					return show_error("PlayCMS Warning : Permission is not valid in method check_access() on library user!", 503, "PlayCMS Warning");
			}

			else
				return show_error("Apps or User ID is not found or permissions is not activated on method check_access()", 503, "PlayCMS Warning");
		}

		public function check_privilege($user_id, $priv, $app) {

			$q = $this->CI->db->join("user_levels ul", "`ul`.`id` = `u`.`level_id`")
							  ->where(array("u.id" => $user_id,
											"u.active" => "Y"))
							  ->get("user u");
			if($q->num_rows() > 0) {

				$d = $q->row();
				
				$apps = json_decode($d->privileges, TRUE);

				foreach ($apps as $key => $value) {
					if ($apps[$key]["app"] != $app)
						continue;
					else
						$privilege = (isset($apps[$key][$priv])) ? $apps[$key][$priv] : NULL;
				}

				if ($privilege === NULL)
					throw new Exception('Privilege "' . $priv . '" for app "' . $app .'" isn\'t available on user rules table!');
				else
					return ($privilege == "Y") ? TRUE : FALSE;
			}

			else
				throw new Exception('Apps or User ID is not found or permissions is not activated on method check_privilege()');
		}

		public function can($privilege) {
			$q = $this->CI->db->where('name', $privilege)->get('user_privileges');
			if($q->num_rows()<=0){
				$q->free_result();
				throw new Exception('There is no privilege called "'.$privilege.'"');
			}

			$q = $this->CI->db->select('up.id, u.level_id, up.name')
								->join('user_roles ur', '`ur`.`id` = `u`.`level_id`')
								->join('user_privileges up', "`up`.`name` = '".$privilege."'")
								->join('user_roles_privileges urp', '`urp`.`role_id` = `u`.`level_id` AND `urp`.`privilege_id` = `up`.`id`')
								->where('u.id',$this->user_id)
								->get('user u');
			if($q->num_rows() <= 0) {
				$q->free_result();
				return FALSE;
			}
			elseif($q->num_rows() == 1) {
				$q->free_result();
				return TRUE;
			}
			else {
				$q->free_result();
				throw new Exception('Privilege may set wrong');
			}
		}
	}