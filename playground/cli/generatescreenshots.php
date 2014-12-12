<?php
/** Script to generate screenshots for current gzaases **/
require_once('../../application/bin/loadzend.php');
define('MIGRATION', true);

// Let's measure time of script
$start = microtime(true);

// Let's retrieve all the messages' / gzaases' urlKeys
$messageModel = new Gzaas_Model_Message();
$urlKeys = $messageModel->getAllUrlKeysMessages();

// Slice (testing)
$urlKeys = array_slice($urlKeys,0,10);

$screenshotModel = new Gzaas_Model_Screenshot();
foreach ($urlKeys as $urlKey) {
	echo "generating screenshot for: " . $urlKey . PHP_EOL;
	$screenshotModel->createScreenshotGzaas($urlKey);
}

$end = microtime(true) - $start;
echo "Finished in " . $end . " seconds" . PHP_EOL;