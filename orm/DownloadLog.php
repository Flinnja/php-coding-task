<?php

namespace Orm;

include_once('./ActiveRecord.php');

final class DownloadLog extends ActiveRecord
{
    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;

    public function isModified():bool{
    	return $this->isModified;
    }
}
