<?php

/**
 * Subclass for representing a row from the 'fatippag' table.
 *
 *
 *
 * @package lib.model
 */
class Fatippag extends BaseFatippag
{
	protected $monpag=0;
	protected $codban="";
	protected $numide2="";
	protected $codtip="";
	protected $desban="";
	protected $fatippagId=0;

   public function getFatippagId(){
     return self::getId();
  }
}
