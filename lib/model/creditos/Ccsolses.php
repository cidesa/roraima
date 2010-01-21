<?php

/**
 * Subclass for representing a row from the 'ccsolses' table.
 *
 *
 *
 * @package lib.model
 */
class Ccsolses extends BaseCcsolses
{

  public function getNomben()
  {
    $solici = $this->getCcsolici();
    if ($solici)
    {
    	$benefi=$solici->getCCbenefi();
        if($benefi){return $benefi->getNomben();}
                    else return '';
    }else return '';
  }

}
