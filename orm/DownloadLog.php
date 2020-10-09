<?php

namespace Orm;

include_once('ActiveRecord.php');
include_once('../traits/NumericValidator.php');
use Traits\NumericValidator;

final class DownloadLog extends ActiveRecord
{
	use NumericValidator;

  /* @var int */
  private $fileId;

  /* @var int */
  private $userId;

  public function isModified():bool{
  	return $this->isModified;
  }

  public function create(){
  	return new DownloadLog();
  }

  public function __destruct(){
  	echo ('Destroying DownloadLog');
  }

  public function setFileId($id){
  	$this->$fileId = $this->validateNumeric($id);
  	$this->isModified = true;
  	return $this;
  }

  public function setUserId($id){
  	$this->$userId = $this->validateNumeric($id);
  	$this->isModified = true;
  	return $this;
  }

  //not tested so not techically required but seems like a sensible method to add
  public function getFileId(){
  	return $this->$fileId;
  }

  public function getUserId(){
  	return $this->$userId;
  }
}
