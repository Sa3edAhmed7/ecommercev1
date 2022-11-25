<?php
function check_image_exists( $url, $default = 'default'){
	$url = trim($url);
	$info = @getimagesize($url);
	if( (bool) $info ){
		return $url;
	}else{
		return $default;
	}
}
