<?php

	class Index_model extends CI_Model {

		public function __construct() {

			parent::__construct();
			$this->load->database();
			$this->load->library("parser");

			// If there is (xxx_)settings table was null...

			if ($this->db->get("settings")->num_rows() <= 0) {
				
				require_once "application/config/database.php";
				
				echo "<b>Warning</b> : Tidak ada baris sama sekali di
				tabel " . $db["default"]["dbprefix"] . "settings! Pastikan
				kamu telah mengistal Merah Putih CMS dengan benar!";
				exit();

			}

		}

		public function getThemes() {

			$q_t = $this->db->get_where("themes", array("aktif" => "Y"));

			// If there is not any theme activated on (xxx_)themes table...

			if ($q_t->num_rows() <= 0) {

				echo "<b>Warning</b> : Tidak ada tema yang aktif di table "
						. $db["default"]["dbprefix"] . "themes! Pastikan Kamu
						telah mengaktifkan salah satu tema di halaman backend!";
				exit();

			}

			$d_t = $q_t->row();

			// If application/views/ThemesFolder was not found...

			if (!file_exists("application/views/" . $d_t->folder . "/")) {

				echo "<b>Warning</b> : Tidak bisa memuat tema!
						Direktori \"application/views/" . $d_t->folder . "/\" tidak ditemukan!";
				exit();

			}

			elseif (!file_exists("application/views/" . $d_t->folder . "/header.php")
					or !file_exists("application/views/" . $d_t->folder . "/content.php")
					or !file_exists("application/views/" . $d_t->folder . "/footer.php")) {

					echo "<b>Warning</b> : Tidak bisa memuat tema!
							File wajib (header.php/content.php/footer.php)
							sepertinya tidak ada di direktori
							\"application/views/" . $d_t->folder . "/\"";
					exit();
			}

			return $d_t;

		}

		public function parseThemes() {


		}

	}