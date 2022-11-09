<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$admin_dir = ADMIN_DIR;

/**
 *	Line  : "Post" App
 *  Line  : "Post Category" App
 *  Line  : "Post Tag" App
 *  Line  : "Post Comment" App
 *  Line  : "Page" App
 *  Line  : "User" App
 *  Line  : "File Manager" App
 *  Line  : "Theme" App
 *  Line  : "Theme File" App
 *  Line  : "App" App
 *  Line  : "App File" App
 *  Line  : "Widget" App
 *  Line  : "Settings" App
 */

// Homepage, Login, and Logout.
$route[$admin_dir] = "{$admin_dir}/homepage";
$route["{$admin_dir}/login"] = "{$admin_dir}/homepage/login";
$route["{$admin_dir}/logout"] = "{$admin_dir}/homepage/logout";

// "Post" App
$route["{$admin_dir}/post/edit:(:num)"] = "{$admin_dir}/post/edit/$1";
$route["{$admin_dir}/post/delete/selected"] = "{$admin_dir}/post/delete_selected";
$route["{$admin_dir}/post/delete/all"] = "{$admin_dir}/post/delete_all";

// "Post Category" App
$route["{$admin_dir}/post/category"] = "{$admin_dir}/post_category";
$route["{$admin_dir}/post/category/all"] = "{$admin_dir}/post_category/all";
$route["{$admin_dir}/post/category/create"] = "{$admin_dir}/post_category/create";
$route["{$admin_dir}/post/category/edit/(:num)"] = "{$admin_dir}/post_category/edit/$1";
$route["{$admin_dir}/post/category/delete"] = "{$admin_dir}/post_category/delete/$1";
$route["{$admin_dir}/post/category/delete/selected"] = "{$admin_dir}/post_category/delete_selected";
$route["{$admin_dir}/post/category/delete/all"] = "{$admin_dir}/post_category/delete_all";
$route["{$admin_dir}/post/category/activation/(:num)"] = "{$admin_dir}/post_category/activation/$1";

// "Post Tag" App
$route["{$admin_dir}/post/tags"] = "{$admin_dir}/post_tag";
$route["{$admin_dir}/post/tags/all"] = "{$admin_dir}/post_tag/all";
$route["{$admin_dir}/post/tags/create"] = "{$admin_dir}/post_tag/create";
$route["{$admin_dir}/post/tags/edit/(:num)"] = "{$admin_dir}/post_tag/edit/$1";
$route["{$admin_dir}/post/tags/delete"] = "{$admin_dir}/post_tag/delete/$1";
$route["{$admin_dir}/post/tags/delete/selected"] = "{$admin_dir}/post_tag/delete_selected";
$route["{$admin_dir}/post/tags/delete/all"] = "{$admin_dir}/post_tag/delete_all";
$route["{$admin_dir}/post/tags/activation/(:num)"] = "{$admin_dir}/post_tag/activation/$1";

// "Post Comment" App
$route["{$admin_dir}/post/comment"] = "{$admin_dir}/post_comment";
$route["{$admin_dir}/post/comment/all"] = "{$admin_dir}/post_comment/all";
$route["{$admin_dir}/post/comment/view_comment/(:num)"] = "{$admin_dir}/post_comment/view_comment/$1";
$route["{$admin_dir}/post/comment/give"] = "{$admin_dir}/post_comment/give/$1";
$route["{$admin_dir}/post/comment/edit/(:num)"] = "{$admin_dir}/post_comment/edit/$1";
$route["{$admin_dir}/post/comment/delete"] = "{$admin_dir}/post_comment/delete/$1";
$route["{$admin_dir}/post/comment/delete/selected"] = "{$admin_dir}/post_comment/delete_selected";
$route["{$admin_dir}/post/comment/activation/(:num)"] = "{$admin_dir}/post_comment/activation/$1";
$route["{$admin_dir}/post/comment/delete/all"] = "{$admin_dir}/post_comment/delete_all";

// "Page" App
/*
$route["{$admin_dir}/page"] = "{$admin_dir}/page";
$route["{$admin_dir}/page/all"] = "{$admin_dir}/page/all";
$route["{$admin_dir}/page/create"] = "{$admin_dir}/page/create";
*/
$route["{$admin_dir}/page/edit:(:num)"] = "{$admin_dir}/page/edit/$1";
//$route["{$admin_dir}/page/delete/(:num)"] = "{$admin_dir}/page/delete/$1";
$route["{$admin_dir}/page/delete/selected"] = "{$admin_dir}/page/delete_selected";
$route["{$admin_dir}/page/delete/all"] = "{$admin_dir}/page/delete_all";
//$route["{$admin_dir}/page/activation/(:num)"] = "{$admin_dir}/page/activation/$1";

// "Page" App
$route["{$admin_dir}/file-manager"] = "{$admin_dir}/file_manager";
$route["{$admin_dir}/file-manager/img:(:any)"] = "{$admin_dir}/file_manager/index/$1";

// "User" App
$route["{$admin_dir}/user"] = "{$admin_dir}/users";
$route["{$admin_dir}/user/all"] = "{$admin_dir}/users/all";
$route["{$admin_dir}/user/add"] = "{$admin_dir}/users/add";
$route["{$admin_dir}/user/edit/(:any)"] = "{$admin_dir}/users/edit/$1";
$route["{$admin_dir}/user/delete"] = "{$admin_dir}/users/delete";
$route["{$admin_dir}/user/delete/selected"] = "{$admin_dir}/users/delete_selected";
$route["{$admin_dir}/user/activate/(:any)"] = "{$admin_dir}/users/activate/$1";
$route["{$admin_dir}/user/deactivate/(:any)"] = "{$admin_dir}/users/dectivate/$1";

$route["{$admin_dir}/user/profile"] = "{$admin_dir}/user_activity/profile";

// "User" App
$route["{$admin_dir}/user/roles"] = "{$admin_dir}/user_roles";
$route["{$admin_dir}/user/roles/all"] = "{$admin_dir}/user_roles/all";
$route["{$admin_dir}/user/roles/add"] = "{$admin_dir}/user_roles/add";
$route["{$admin_dir}/user/roles/edit/(:any)"] = "{$admin_dir}/user_roles/edit/$1";
$route["{$admin_dir}/user/roles/delete"] = "{$admin_dir}/user_roles/delete";
$route["{$admin_dir}/user/roles/delete/selected"] = "{$admin_dir}/user_roles/delete_selected";
$route["{$admin_dir}/user/roles/activate/(:any)"] = "{$admin_dir}/user_roles/activate/$1";
$route["{$admin_dir}/user/roles/deactivate/(:any)"] = "{$admin_dir}/user_roles/dectivate/$1";

// "File Manager" App
$route["admin/file-manager"] = "admin_file_manager";

// "Theme" App
$route["admin/theme"] = "admin_theme";
$route["admin/theme/all"] = "admin_theme/all";
$route["admin/theme/add"] = "admin_theme/add";
$route["{$admin_dir}/theme/file/edit/(:any)/(:any)"] = "{$admin_dir}/theme/edit_file/$1/$2";
$route["admin/user/delete/selected"] = "admin_theme/delete_selected";
$route["admin/user/activate/(:num)"] = "admin_theme/activate/$1";
$route["admin/user/deactivate/(:num)"] = "admin_theme/dectivate/$1";
// Theme File
$route["admin/theme/add/file"] = "admin_theme/add_file";
$route["admin/theme/edit/(:num)/(:any)"] = "admin_theme/edit_file/$1/$2";
$route["admin/theme/delete/(:num)/(:any)"] = "admin_theme/delete_file/$1/$2";
$route["admin/theme/delete/selected/file"] = "admin_theme/delete_selected_file";

// "App" App
$route["admin/app"] = "admin_app";
$route["admin/app/all"] = "admin_app/all";
$route["admin/app/add"] = "admin_app/add";
$route["admin/app/edit/(:num)"] = "admin_app/edit/$1";
$route["admin/app/delete/(:num)"] = "admin_app/delete/$1";
$route["admin/app/delete/selected"] = "admin_app/delete_selected";
$route["admin/app/activate/(:num)"] = "admin_app/activate/$1";
$route["admin/app/deactivate/(:num)"] = "admin_app/dectivate/$1";
// "App" File
$route["admin/app/add/file"] = "admin_app/add_file";
$route["admin/app/edit/(:num)/(:any)"] = "admin_app/edit_file/$1/$2";
$route["admin/app/delete/(:num)/(:any)"] = "admin_app/delete_file/$1/$2";
$route["admin/app/delete/selected/file"] = "admin_app/delete_selected_file";

// "Settings" App
$route["admin/settings"] = "admin_settings";

$route["sitemap\.xml"] = "home/sitemap";
$route["posts"] = "post/all";
$route["posts/page/(:num)"] = "post/all/$1";
$route["post/(:any)"] = "post/read/$1";
$route["page/(:any)"] = "page/index/$1";
$route["category/(:any)"] = "post_category/view/$1";
$route["category/(:any)/page/(:num)"] = "post_category/view/$1/$2";
