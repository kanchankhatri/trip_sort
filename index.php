<?php
/**Author: Kanchan Khatri
 * This is the example usage of the Trip Sort.
 * Steps to perform: 
 * 1. create virtual host pointing to trip_sort dir
 * 2. got to the virtual host link.
 * 3. To sort trip - click button "Make Sorted Plan"
 */
require_once 'application/autoload.php';


$path_info = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'';
$path_info = trim($path_info,'/');
if(strpos($path_info,'/')!==false)
	die('Incorrect Path');
$t = new Trip();
if(empty($path_info))
	$t->index();
else
	$t->$path_info();
