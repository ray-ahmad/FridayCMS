<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  ----------------------------------------------------------------------------------------------
 *  WEBSITE CONFIGURATION
 *  ----------------------------------------------------------------------------------------------
 */

	// Alternative "\" and/or "DIRECTORY_SEPARATOR"
	defined("DIR_SEP") OR define("DIR_SEP", DIRECTORY_SEPARATOR);
	$dir_sep = DIR_SEP;

 	/**
	 *  - Codeigniter System Directory Name
	 *    Default, it set "system", you can change!
	 *    Without start and final /
	 */
	defined("SYSTEM_DIR") OR define("SYSTEM_DIR", "system");

 	/**
	 *  - Codeigniter Application Directory Name
	 *    Default, it set "application", you can change!
	 *    Without start and final /
	 */
	defined("APP_DIR") OR define("APP_DIR", "application");
	
 	/**
	 *  - Admin Directory Name
	 *    Default, it set "play-admin", you can change!
	 *    Without start and final /
	 */
	defined("ADMIN_DIR") OR define("ADMIN_DIR", "play-admin");


	/**
	 *	- Temporary Folder Name
	 * 	  Default, this location inside the image folder
	 *    Without start and final /
	 */
	defined("TEMP_DIR") OR define("TEMP_DIR", "play-tmp");

	/**
	 *  - Base URL 
	 *    ex : "http://www.google.co.id/" or "https://google.co.id/aiueo/" or "http://localhost/"
	 *    With final /
	 */
	defined("BASE_URL") OR define("BASE_URL", "http://localhost:8080/playcms_ci/");
	
	/**
	 *	- Assets Folder Name
	 *    Without start and final /
	 */
	defined("ASSETS_FOLDER") OR define("ASSETS_FOLDER", "play-assets");

	/**
	 *	- Assets URL
	 * 	  You can change base url on "BASE_URL" Constant and assets folder on Constant "ASSETS_FOLDER"
	 *	  Ex : "http://google.co.id/assets/" or leave default, like : BASE_URL . ASSETS_FOLDER . "/" for easier to change
	 *    With final /
	 */
	defined("ASSETS_URL") OR define("ASSETS_URL", BASE_URL . ASSETS_FOLDER . "/");

	/**
	 *	- Image Folder Name
	 *    Without start and final /
	 */
	defined("FILE_FOLDER") OR define("FILE_FOLDER", "file");

	/**
	 *	- Image Folder Name
	 *    Without start and final /
	 */
	defined("IMG_FOLDER") OR define("IMG_FOLDER", "image");

	/**
	 *	- Image Thumbs Folder Name
	 *	  Default, it set "img-thumbs", you can change!
	 *    Without start and final /
	 */
	defined("IMG_THUMBS_FOLDER") OR define("IMG_THUMBS_FOLDER", "img-thumbs");

	/**
	 *	- User Profile Photo Folder Name
	 * 	  Default, this location inside the image folder
	 *    Without start and final /
	 */
	defined("USER_IMG_FOLDER") OR define("USER_IMG_FOLDER", "user-img");

	/**
	 *	----------------------------------------------------------------------------------------------
	 *  END OF WEBSITE CONFIGURATION
	 *	----------------------------------------------------------------------------------------------
	 *
	 *	----------------------------------------------------------------------------------------------
	 *	RESPONSIVE FILEMANAGER CONFIGURATION
	 *	----------------------------------------------------------------------------------------------
	 */

	/*
	 *  - Upload Directory
	 *	  Path from base url to your upload folder. Ex : (http://websiteku.com) /playcms/assets/file-mu/
	 *	  With start and final /
	 */
	defined("UPLOAD_DIR_FILEMANAGER") OR define("UPLOAD_DIR_FILEMANAGER", "/playcms_ci/". ASSETS_FOLDER . "/" . FILE_FOLDER . "/");
	
	/*
	 *  - Image Upload Directory
	 *	  Path from base url to your image upload folder. Ex : (http://websiteku.com) /playcms/assets/gambar/
	 *	  With start and final /
	 */
	defined("IMG_DIR_FILEMANAGER") OR define("IMG_DIR_FILEMANAGER", "/playcms_ci/" . ASSETS_FOLDER . "/" . IMG_FOLDER . "/");

	/*
	 *  - Upload Path
	 *	  Path from base url/your-assets-folder/plugins/responsive_filemanager/filemanager/ to your upload folder
	 *	  With final /
	 */
	defined("UPLOAD_PATH_FILEMANAGER") OR define("UPLOAD_PATH_FILEMANAGER", "../../../" . FILE_FOLDER . "/");

	/*
	 *  - Image Upload Path
	 *	  Path from base url/your-assets-folder/plugins/responsive_filemanager/filemanager/ to your image upload folder
	 *	  With final /
	 */
	defined("IMG_PATH_FILEMANAGER") OR define("IMG_PATH_FILEMANAGER", "../../../" . IMG_FOLDER . "/");

	/*
	 *  - Image Thumbs Path
	 *	  Path from base url/your-assets-folder/plugins/responsive_filemanager/filemanager/ to your image thumbs folder
	 *	  With final / (DON'T PUT INSIDE IMAGE UPLOAD/UPLOAD DIR!)
	 */
	defined("IMG_THUMBS_PATH_FILEMANAGER") OR define("IMG_THUMBS_PATH_FILEMANAGER", "../../../" . IMG_THUMBS_FOLDER . "/");

	/*
	 *  - Use Access Key?
	 *	  TRUE if you agree, FALSE if not
	 */
	defined("USE_ACCESS_KEY_FILEMANAGER") OR define("USE_ACCESS_KEY_FILEMANAGER", FALSE);

	/*
	 *  - Access Key
	 *	  You can fill this IF YOU FILL "- Use Access Key?" VALUE TO TRUE. If not, leave it.
	 *	  Ex : array("myPrivateKey", "someoneElseKey");
	 *	  Note : CASE SENSITIVE!
	 */
	$access_key_filemanager = array();

	/*
	 *  - Maximum Upload Size
	 *	  ...in Megabytes
	 */
	defined("MAX_SIZE_FILEMANAGER") OR define("MAX_SIZE_FILEMANAGER", 5);