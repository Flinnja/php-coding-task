<?php
namespace Traits;
use Exception;

trait NumericValidator{
	public function validateNumeric($n){
		try{
			if(!is_numeric($n)){
			throw new \Exception("Expected " . $n . " to be numeric, instead returned a non-numeric " . gettype($n));
			}
			return $n;
		}
		catch(Exception $e){
			echo("Error: " . $e->getMessage());
		}
	}
}
