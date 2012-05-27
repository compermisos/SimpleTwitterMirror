<?php

#######################################################################
#                         config zone                                 #
#######################################################################
$CacheDir = './cache/';
$CacheTime = 300;
$DefaultUser = "JesusCCruz";

$TwitterBaseURL = "https://twitter.com/statuses/user_timeline/";
/*yes you can make a chain of proxys =P */
$TwitterCloseURL = ".xml?count=10";



#######################################################################
#                         end config zone                             #
#######################################################################
include("JG_cache.php");

$cache = new JG_Cache($CacheDir);  
if(isset($_GET['user'])){
	$user = $_GET['user'];
}else{
	$user = $DefaultUser;
}
$data = $cache->get($user, $CacheTime);  
  
if ($data === FALSE)  
{  
	$url = $TwitterBaseUR . $user . $TwitterCloseURL;
	$data = file_get_contents($url);
	$cache->set($user, $data);  
}  
  
echo $data;
