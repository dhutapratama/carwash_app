<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('static'))
{
	function static_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->static_url($uri);
	}
}

if ( ! function_exists('static_base_url'))
{
	function static_base_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->static_base_url($uri);
	}
}

if ( ! function_exists('google_verify'))
{
	function google_verify()
	{
		$CI =& get_instance();
		$google_verify = $CI->config->stocknbar_config('google_site_verification');
		return $google_verify;
	}
}

if ( ! function_exists('detectify_verify'))
{
	function detectify_verify()
	{
		$CI =& get_instance();
		$detectify_verify = $CI->config->stocknbar_config('detectify_verification');
		return $detectify_verify;
	}
}
