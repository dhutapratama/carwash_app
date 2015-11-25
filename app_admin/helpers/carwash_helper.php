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

if ( ! function_exists('asset_url'))
{
	function asset_url($folder = '') {
		$CI =& get_instance();
		$static_url = $CI->config->item('static_url');
		$static_url .= 'assets/';
		$static_url .= $folder;

		echo $static_url;

		if($folder) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists('admin_url'))
{
	function admin_url($folder = '') {
		$CI =& get_instance();
		$admin_url = $CI->config->item('admin_url');
		$admin_url .= $folder;

		echo $admin_url;

		if($folder) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists('admin_uri'))
{
	function admin_uri($folder = '') {
		$CI =& get_instance();
		$admin_url = $CI->config->item('admin_url');
		$admin_url .= $folder;

		return $admin_url;
	}
}

if ( ! function_exists('admin_static'))
{
	function admin_static($folder = '') {
		$CI =& get_instance();
		$static_url = $CI->config->item('admin_url');
		$static_url .= 'assets/';
		$static_url .= $folder;

		echo $static_url;

		if($folder) {
			return true;
		} else {
			return false;
		}
	}
}