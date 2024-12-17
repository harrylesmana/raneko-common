<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

$testFileList = scandir(__DIR__);
foreach ($testFileList as $testFile) {
    if (stripos($testFile, "test_") === 0) {
        require_once __DIR__ . DIRECTORY_SEPARATOR . $testFile;
    }
}

echo "-- TEST getGitCurrentBranch() --" . PHP_EOL;
$pathRepo1 = realpath(__DIR__ . "/../.git");
echo "Path '{$pathRepo1}': " . \Raneko\Common\Helper::getGitCurrentBranch($pathRepo1) . PHP_EOL;
$pathRepo2 = realpath('C:\VHOST\source-php\stg-admin\.git');
$pathGitInfo = \Raneko\Common\Helper::getGitCurrentBranch($pathRepo2, true);
var_dump($pathGitInfo);
echo "Path '{$pathRepo2}': " . $pathGitInfo['branch'] . PHP_EOL;
echo PHP_EOL . PHP_EOL;