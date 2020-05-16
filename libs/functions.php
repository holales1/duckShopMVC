<?php
class Functions{
	function redirect_to($location) {
		header("HTTP/1.1 303 See Other");
        header("Location: http://localhost/duckShopMVC/$location");
	}
}
?>