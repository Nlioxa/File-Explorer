<?php

session_start();

if (!isset($_SESSION['root_path'])) {
    $delimiter = '\\';
    $file_path = getcwd();
    $file_path_elements = explode($delimiter, $file_path);
    $root_path_elements = array_slice($file_path_elements, 0, -1);
    $root_path = implode($root_path_elements, '/');
    // $_SESSION['root_path'] = $root_path;
}

if (isset($_GET['path'])) {
	$_SESSION['path'] = $_GET['path'];
	if (!isset($_SESSION['root_path'])) {
		$_SESSION['root_path'] = $_GET['path'];
	}
}
else {
	$_SESSION['path'] = $_SESSION['root_path'];
}

$_SESSION['root_path'] = "D:/Programs/XAMPP/htdocs/lab/lab4";

?>