<?php

/**
 * Subclass for representing a row from the 'fcdefnca'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdefnca.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
