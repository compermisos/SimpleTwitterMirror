<?php
include("JG_cache.php");

$cache = new JG_Cache('./cache/');  
if(isset($_GET['user'])){
	$user = $_GET['user'];
}else{
	$user = "G20Mexico";
}
$data = $cache->get($user, 300);  
  
if ($data === FALSE)  
{  
	$url = "https://twitter.com/statuses/user_timeline/" . $user . ".xml?count=10";
	$data = file_get_contents($url);
	$cache->set($user, $data);  
}  
  
echo $data;
?>
