<?php
namespace Orm;

include_once('../orm/DownloadLog.php');

//test block has been modified only to place each echo on a new line so that it reads properly in browser
$downloadLog = DownloadLog::create();
echo ($downloadLog->isModified() ? 'DownloadLog is modified <br>' : 'DownloadLog is not modified <br>');
$downloadLog->setFileId(1000)->setUserId(2000);
echo ($downloadLog->isModified() ? 'DownloadLog is modified <br>' : 'DownloadLog is not modified <br>');
echo ("UserId is: " . $downloadLog->getUserId() . "<br>");

