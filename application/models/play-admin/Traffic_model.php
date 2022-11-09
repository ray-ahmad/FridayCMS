<?php
 	defined("BASEPATH") or exit("No direct script access allowed!");

	class Traffic_model extends CI_Model {

		public function __construct() {
			parent::__construct();
			$this->date_now = date("Y-m-d");
			$this->min_1_week = strtotime("-1 week", strtotime($this->date_now));
			$this->conv_date = date("Y-m-d", $this->min_1_week);
		}

		public function get_date($day_ago) {
			switch($day_ago) {
				case "1 week ago" :
				return $this->conv_date;
				break;

				case "6 days ago" :
				$plus_1_days = strtotime("+1 day", strtotime($this->conv_date));
				$conv_date_6 = date("Y-m-d", $plus_1_days);

				return $conv_date_6;
				break;

				case "5 days ago" :
				$plus_2_days = strtotime("+2 day", strtotime($this->conv_date));
				$conv_date_5 = date("Y-m-d", $plus_2_days);

				return $conv_date_5;
				break;

				case "4 days ago" :
				$plus_3_days = strtotime("+3 day", strtotime($this->conv_date));
				$conv_date_4 = date("Y-m-d", $plus_3_days);

				return $conv_date_4;
				break;

				case "3 days ago" :
				$plus_4_days = strtotime("+4 day", strtotime($this->conv_date));
				$conv_date_3 = date("Y-m-d", $plus_4_days);

				return $conv_date_3;
				break;

				case "2 days ago" :
				$plus_5_days = strtotime("+5 day", strtotime($this->conv_date));
				$conv_date_2 = date("Y-m-d", $plus_5_days);

				return $conv_date_2;
				break;

				case "yesterday" :
				$plus_6_days = strtotime("+6 day", strtotime($this->conv_date));
				$conv_date_yest = date("Y-m-d", $plus_6_days);

				return $conv_date_yest;
				break;
				
				case "now" :
				return $this->date_now;
				break;
			}
		}

		public function get_visitor($day_ago) {
			switch($day_ago) {
				case "1 week ago" :
				$q = $this->db->get_where("traffic", array("date" => $this->conv_date));
				return $q->num_rows();
				break;

				case "6 days ago" :
				$q = $this->db->get_where("traffic", array("date" => $this->get_date("6 days ago")));
				return $q->num_rows();
				break;

				case "5 days ago" :
				$q = $this->db->get_where("traffic", array("date" => $this->get_date("5 days ago")));
				return $q->num_rows();
				break;

				case "4 days ago" :
				$q = $this->db->get_where("traffic", array("date" => $this->get_date("4 days ago")));
				return $q->num_rows();
				break;

				case "3 days ago" :
				$q = $this->db->get_where("traffic", array("date" => $this->get_date("3 days ago")));
				return $q->num_rows();
				break;

				case "2 days ago" :
				$q = $this->db->get_where("traffic", array("date" => $this->get_date("2 days ago")));
				return $q->num_rows();
				break;

				case "yesterday" :
				$q = $this->db->get_where("traffic", array("date" => $this->get_date("yesterday")));
				return $q->num_rows();
				break;
				
				case "now" :
				$q = $this->db->get_where("traffic", array("date" => $this->date_now));
				return $q->num_rows();
				break;
			}
		}

		public function get_hits($day_ago) {
			switch($day_ago) {
				case "1 week ago" :	
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->conv_date)
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;

				$d = $q->row();
				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;

				case "6 days ago" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->get_date("6 days ago"))
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;

				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;

				case "5 days ago" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->get_date("5 days ago"))
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;

				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;

				case "4 days ago" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->get_date("4 days ago"))
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;

				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;

				case "3 days ago" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->get_date("3 days ago"))
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;

				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;

				case "2 days ago" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->get_date("2 days ago"))
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;
				
				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;

				case "yesterday" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->get_date("yesterday"))
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;
				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;
				
				case "now" :
				$q = $this->db->select_sum("hits", "web_hits")
							  ->where("date", $this->date_now)
							  ->get("traffic");
				if($q->num_rows() <= 0)
					return (int) 0;
				$d = $q->row();

				return ($d->web_hits !== NULL) ? $d->web_hits : (int) 0;
				break;
			}
		}
	}