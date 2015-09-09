<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Config extends CI_Config {

	function static_url($uri = '')
	{
		if ($uri == '')
		{
			return $this->slash_item('static_url').$this->item('index_page');
		}

		if ($this->item('enable_query_strings') == FALSE)
		{
			return $this->slash_item('static_url').$this->slash_item('index_page').$this->_uri_string($uri);
		}
		else
		{
			return $this->slash_item('static_url').$this->item('index_page').'?'.$this->_uri_string($uri);
		}
	}

	function static_base_url($uri = '')
	{
		return $this->slash_item('static_url').ltrim($this->_uri_string($uri), '/');
	}

	function stocknbar_config($item = '')
	{
		return $this->item($item);
	}
}