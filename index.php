<?php
require('controller/frontend.php');

try{
	
	$pages = scandir('view/frontend/');
	
	if (isset($_GET['page'])) {
		/* page home */
        if ($_GET['page'] == 'home') {
            home();
		}
		/* page blog */
		elseif ($_GET['page'] == 'blog') {
			blog();
		}
		/* page post */
		elseif ($_GET['page'] == 'post') {
			post();
		}
		/* page movies */
		elseif ($_GET['page'] == 'movies') {
			movies();
		}
		/* page series */
		elseif ($_GET['page'] == 'series') {
			series();
		}
		/* search page exist */
		elseif(in_array($_GET['page'],$pages)){
			$page=$_GET['page'];
		}
		else{
			throw new Exception('Ce n\' est pas la bonne page');			
		}
	}
	else{
		home();
	}
	
}
catch(Exception $e) {
	require('view/frontend/error.php');
	
}
?>







