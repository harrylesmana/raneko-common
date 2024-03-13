<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

$testFileList = scandir(__DIR__);
foreach ($testFileList as $testFile) {
    if (stripos($testFile, "test_") === 0) {
        require_once __DIR__ . DIRECTORY_SEPARATOR . $testFile;
    }
}