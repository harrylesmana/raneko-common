<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

use \Raneko\Common\Helper as Helper;

echo "--- Testing Profile ---" . PHP_EOL;
$profileUuid = Helper::uuid4();
$profileKey = "Test::Test";
$profileProcess = "\\Raneko\\Dummy";
echo "Start : " . Helper::profile($profileUuid, $profileKey, $profileProcess) . PHP_EOL;
echo "End   : " . Helper::profile($profileUuid, $profileKey, $profileProcess) . PHP_EOL;
echo "Start : " . Helper::profile($profileUuid, $profileKey, $profileProcess) . PHP_EOL;
echo "End   : " . Helper::profile($profileUuid, $profileKey, $profileProcess) . PHP_EOL;
echo PHP_EOL;

