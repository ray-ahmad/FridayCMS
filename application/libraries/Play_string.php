<?php
/**
 *  PlayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  --------------------------------------------------------------------------------
 *  String Filter
 *  --------------------------------------------------------------------------------
 */

	defined("BASEPATH") or exit("No direct script access allowed!");

	class Play_string {
		/*	From : CMS Lokomedia (http://bukulokomedia.com)
		 *	Thanks to : khairu a.k.a wenkhairu (http://khairu.net)
		 *	Edited By : PopojiCMS (Jenuar Dalapang) (http://popojicms.org)
		 *				and PlayCMS!
		 */
		public function sql_inject_validate($str) {
			$bad_str = array('-', '/', '\\', ',', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '%', '$', '^', '&', '*', '=', '?', '+');
			$str = str_replace($bad_str, '', $str);
			//$str = stripcslashes($str);
			$str = htmlspecialchars($str);				
			$str = preg_replace('/[^A-Za-z0-9]/', '', $str);				
			return intval($str);
		}

		/*public function xss_validate($str) {
			$bad_str = array ('\\', '#', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '%', '$', '^', '*', '=', '+');
			$str = str_replace($bad_str, '', $str);
			$str = stripcslashes($str);	
			$str = htmlspecialchars($str);
			return $str;
		}*/
		
		public function change_quote($str) {
			$quote = array("\"", "'", "`", "<", ">");
			$change = array("&doublequote;", "&singlequote", "&backquote", "&lt;", "&gt;");
			return str_replace($quote, $change, $str);
		}

		public function unchange_quote($str) {
			$quote = array("\"", "'", "`", "<", ">");
			$change = array("&doublequote;", "&singlequote", "&backquote", "&lt;", "&gt;");
			return str_replace($change, $quote, $str);
		}

		public function xss_clean_adv($str) {
			$CI =& get_instance();
			return strip_tags($CI->security->xss_clean($str));
		}
	}