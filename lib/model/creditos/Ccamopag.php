<?php

/**
 * Subclass for representing a row from the 'ccamopag' table.
 *
 *
 *
 * @package lib.model
 */
class Ccamopag extends BaseCcamopag
{
  protected $objpago=array();
  protected $numcuo="";


  public function getNumcuo(){

     $amoact=self::getCcamoactId();
     $sql= "select numcuo as numcuo from Ccamoact where id = ".$amoact." order by numcuo asc  ";
     Herramientas::BuscarDatos($sql,&$result);
     return $result[0]['numcuo'];


  }


}
