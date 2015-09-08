<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_logged_in()
{
	$ci =& get_instance();
	if($ci->session->user_id)
	{
		return true;
	}
	return false;
}
