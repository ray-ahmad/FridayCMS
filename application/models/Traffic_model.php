<?php
	defined("BASEPATH") or exit("No direct script access allowed!");

	class Traffic_model extends CI_Model {

		public function run_traffic() {

			$day = date("D");
			$now = date("Ymd");
			$time = date("G:i:s");

			$ip = $this->ip;
			$get = array("ip" => $ip, "date" => $now);
			$q = $this->db->get_where("traffic", $get);

			if ($q->num_rows() > 0) {

				$d = $q->row();
				$array = array("hits" => $d->hits + 1);
				$where = array("ip" => $ip, "date" => $now);
				$update = $this->db->where($where)
								   ->update("traffic", $array);
				return $update;
			}

			else {

				$array = array("ip" => $ip,
							   "hits" => 1,
							   "browser" => $this->browser,
							   "user_agent" => $this->user_agent,
							   "referrer_site" => $this->referrer_site,
							   "platform" => $this->platform,
							   "day" => $day,
							   "date" => $now,
							   "time" => $time);
				$insert = $this->db->insert("traffic", $array);
				return $insert;
			}
		}
	}