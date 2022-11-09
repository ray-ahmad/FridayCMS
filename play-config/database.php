<?php
/**
 *  FridayCMS
 *	Copyright (c) 2016, Rayhan Ahmad Rizalullah
 *
 *  ----------------------------------------------------------------------------------------------
 *  MySQL Database Costum Configuration
 *  ----------------------------------------------------------------------------------------------
 *
 *	Note : We will require this file on codeigniter database configuration
 */
 
	/**
	 *  - Host Database
	 *	  ...where databse is on
	 */
	defined("DB_HOSTNAME") OR define("DB_HOSTNAME", "localhost");

	// - Database Username
	defined("DB_USERNAME") OR define("DB_USERNAME", "root");

	// - Database Password
	defined("DB_PASSWORD") OR define("DB_PASSWORD", "");

	// - Database Name
	defined("DB_NAME") OR define("DB_NAME", "mpc_db");

	/**
	 *  - Database Prefix
	 *	  To add prefix to your tables name
	 *	  If your tables name is "xxx_post", you just write "post" in CodeIgniter Query Builder!
	 *	  or you just insert DB_PREFIX . "post" to easier changing!
	 */
	defined("DB_PREFIX") OR define("DB_PREFIX", "mpc_");

	/**
	 *  - Database Driver
	 *	  You can choose mysqli or pdo
	 *	  Note : Please, DON'T USE mysql. Because it has been deprecated!
	 */
	defined("DB_DRIVER") OR define("DB_DRIVER", "mysqli");