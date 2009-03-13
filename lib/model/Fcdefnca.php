<?php

/**
 * Subclass for representing a row from the 'fcdefnca' table.
 *
 *
 *
 * @package lib.model
 */
class Fcdefnca extends BaseFcdefnca
{
	protected $empresa="";
	protected $codpar1="";

    public static function getEmpresa()
    {
      $result=array();
      $sql = "select nomemp from empresa";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        return $nombre_empresa=$result[0]['nomemp'];
      }
      else
      {
        return "";
      }
   }

   public function getCodpar1()
   {
   	   $var=self::getCodpar()."-".self::getCodmun()."-".self::getCodedo()."-".self::getCodpai();
       return $var;
   }


}
