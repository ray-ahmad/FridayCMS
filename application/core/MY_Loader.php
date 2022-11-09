<?php

	class MY_Loader extends CI_Loader {
		public function __construct() {
			parent::__construct();
			$this->CI =& get_instance();
		}

		public function theme($layout, $data = NULL) {
			if (substr($layout, 0, 5) == "Admin") {
				$theme_folder = $this->CI->play->get_backend_theme();
				$path = APP_DIR . "/views/themes/backend/{$theme_folder}/";
				$path2 = "themes/backend/{$theme_folder}/";
				//$layout = substr($layout, 5);
			}
			else {
				$theme_folder = $this->CI->play->get_frontend_theme();
				$path = APP_DIR . "/views/themes/frontend/{$theme_folder}/";
				$path2 = "themes/frontend/{$theme_folder}/";
			}

			if (!file_exists($path . $layout . ".php"))
				show_error('Layout "' . $layout . '" is not exists on "' . $path . '"', 500, "FridayCMS Error");
			else {
				$this->view($path2 . $layout, $data);
			}
		}

	}