<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *	License : see LICENSE.txt file
 *
 *	----------------------------------------------------------------------------------------
 *
 *	This file used for initialize a FridayCMS helpers.
 *
 *	File ini digunakan untuk menginisialisasi helper-helper FridayCMS.
 */
	defined("BASEPATH") or exit("No direct script access allowed!");

	/**
	 *	Post URL
	 *
	 *	This function used for give a post URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju post.
	 *
	 *	@param	$sef string
	 *	@return	string
	 */
	function post_url($sef = NULL) {
		if ($sef !== NULL)
			return BASE_URL . "post/{$sef}/";
		else
			return BASE_URL . "post/";
	}
	/**
	 *	Posts URL
	 *
	 *	This function used for give a all posts URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju semua post.
	 *
	 *	@param	$sef string
	 *	@return	string
	 */
	function posts_url($sef = NULL) {
		if ($sef !== NULL)
			return BASE_URL . "posts/{$sef}/";
		else
			return BASE_URL . "posts/";
	}
	/**
	 *	Page URL
	 *
	 *	This function used for give a page URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju page.
	 *
	 *	@param	$sef string
	 *	@return	string
	 */
	function page_url($sef = NULL) {
		if ($sef !== NULL)
			return BASE_URL . "page/{$sef}/";
		else
			return BASE_URL . "page/";
	}
	/**
	 *	Category URL
	 *
	 *	This function used for give a category URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju kategori.
	 *
	 *	@param	$sef string
	 *	@return	string
	 */
	function cat_url($sef = NULL) {
		if ($sef !== NULL)
			return BASE_URL . "category/{$sef}/";
		else
			return BASE_URL . "category/";
	}

	/**
	 *	Tag URL
	 *
	 *	This function used for give a category URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju kategori.
	 *
	 *	@param	$sef string
	 *	@return	string
	 */
	function tag_url($sef = NULL) {
		if ($sef !== NULL)
			return BASE_URL . "tag/{$sef}/";
		else
			return BASE_URL . "tag/";
	}

	/**
	 *	Assets URL
	 *
	 *	This function used for give a assets URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju assets.
	 *
	 *	@param	$url string
	 *	@return	string
	 */
	function assets_url($url = NULL) {
		return ASSETS_URL . $url;
	}

	/**
	 *	Assets Plugin URL
	 *
	 *	This function used for give a plugins URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju plugin.
	 *
	 *	@param	$url string
	 *	@return	string
	 */
	function assets_plug_url($url = NULL) {
		return ASSETS_URL . "plugins/" . $url;
	}

	/**
	 *	Admin URL
	 *
	 *	This function used for give a admin page URL.
	 *
	 *	Fungsi ini digunakan untuk memberikan URL menuju halaman admin.
	 *
	 *	@param	$url string
	 *	@return	string
	 */
	function admin_url($url = NULL) {
		return BASE_URL . ADMIN_DIR . "/" . $url;
	}

	/**
	 *	dd-mm-yyyy to yyyy-mm-dd
	 *
	 *	This function used change dd-mm-yyyy date format to yyyy-mm-dd
	 *
	 *	Fungsi ini digunakan untuk mengubah format tanggal dd-mm-yyyy ke yyyy-mm-dd
	 *
	 *	@param	$date int
	 *	@return	int
	 */
	function dmy2ymd($date) {

		$day = substr($date, 0, 2);
		$month = substr($date, 3, 2);
		$year = substr($date, 6, 10);
		return $year . "-" . $month . "-" . $day;
	}

	/**
	 *	yyyy-mm-dd to dd-mm-yyyy
	 *
	 *	This function used change yyyy-mm-dd date format to dd-mm-yyyy
	 *
	 *	Fungsi ini digunakan untuk menguah format tanggal yyyy-mm-dd ke dd-mm-yyyy
	 *
	 *	@param	$date int
	 *	@return	int
	 */
	 function ymd2dmy($date) {
		$day = substr($date, 8, 2);
		$month = substr($date, 5, 2);
		$year = substr($date, 0, 4);

		return $day . "-" . $month . "-" . $year;
	}

	/**
	 *	List Files
	 *
	 *	This function used to give a file list from some directory.
	 *
	 *	Fungsi ini digunakan untuk memberikan daftar file dari sebuah directory
	 *
	 *	@param	$dir string
	 *	@return	array
	 */
	function list_file($dir) {
		if (!file_exists($dir) or !is_dir($dir))
			return show_error("Directory {$dir} is not exists!", 503, "PlayCMS Warning");

		$handle = opendir($dir);
		$files = array();
		while($file = readdir($handle)) {
			if ($file === '.' or $file === '..') 
				continue;

			$files[] = $file;
		}

			return $files;
	}

	/**
	 *	Get Image URL
	 *
	 *	This function used to give valid image URL
	 *
	 *	Fungsi ini digunakan untuk memberikan URL gambar dengan benar.
	 *
	 *	@param	$img string
	 *	@param	$no_img string
	 *	@return	string
	 */
	function get_image($img, $no_img) {
		if (!preg_match("/^(" . str_replace("/", "\/", str_replace(":", "?:", assets_url("image/"))) . ")/", $img) 
			and file_exists(ASSETS_FOLDER . "/" . IMG_FOLDER . "/{$img}"))

			return assets_url("image/{$img}");

		elseif (preg_match("((f|ht)tps?:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", $img)
				or preg_match("(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", $img)
				or preg_match("((f|ht)tp:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)",  $img)
				or preg_match("(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", $img))

				return $img;

		else
			return $no_img;
	}
	
	function cut_text($text, $limit, $end_char = "....") {
		if (strlen($text) < $limit)
			return $text;
		else
			return substr($text, 0, $limit) . $end_char;
		
	}

	function antiInject($str) {
		$bad_str = array('-', '/', '\\', ',', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '%', '$', '^', '&', '*', '=', '?', '+');
		$str = str_replace($bad_str, '', $str);
		//$str = stripcslashes($str);
		$str = htmlspecialchars($str);				
		$str = preg_replace('/[^A-Za-z0-9]/', '', $str);				
		return intval($str);
	}