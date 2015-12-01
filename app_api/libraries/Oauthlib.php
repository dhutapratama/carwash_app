<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oauthlib {

	function hashcode ()
	{
	    $characters 		= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength	= strlen($characters);
	    $randomString		= '';

	    for ($i = 0; $i < 32; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    return md5($randomString);
	}
}