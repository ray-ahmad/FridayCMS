<?php

class tes extends CI_Controller {

	public function index() {
$this->load->library('user_agent');

if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}

echo $agent;

echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
print_r ( $this->agent->agent_string() );
}

}