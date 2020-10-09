<?php
namespace Orm;

include_once('../orm/DownloadLog.php');

//test block has been modified only to place each echo on a new line so that it reads properly in browser
$downloadLog = DownloadLog::create();
$downloadLog->setFileId(1000);
echo ("FileId is: " . $downloadLog->getFileId() . "<br>");
$downloadLog->setUserId(2000);
echo ("UserId is: " . $downloadLog->getUserId() . "<br>");
$downloadLog->setFileId("file");
echo ("FileId is: " . $downloadLog->getFileId() . "<br>");
$downloadLog->setUserId("user");
echo ("UserId is: " . $downloadLog->getUserId() . "<br>");
