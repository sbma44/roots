<?php
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Include the package
set_include_path(get_include_path() . ':/home/metamon/public_html/PEAR/PEAR');
require_once('Cache/Lite.php');

// Set a id for this cache
$id = 'manifestdensity-flickr-page_' . $page;

// Set a few options
$options = array(
    'cacheDir' => '/tmp/',
    'lifeTime' => 300
);

// Create a Cache_Lite object
$Cache_Lite = new Cache_Lite($options);

$data = $Cache_Lite->get($id);
if (!$data) {
	require_once('phpFlickr.php');
	$flickr = new phpFlickr('4f7b1fdf8ac04ed0a11cd7a9bcedede4', '349e83a8b179a4bd');
	$data = json_encode($flickr->people_getPhotos('44137303@N00', array('per_page'=>'50', 'page'=>$page)));
    $Cache_Lite->save($data, $id);
}

header('Content-type: application/json');
echo $data;