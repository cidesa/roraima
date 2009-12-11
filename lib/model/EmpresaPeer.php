<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'empresa'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class EmpresaPeer extends BaseEmpresaPeer
{
  public static function getEmpresas()
  {
    $resp = array();
    $result=array();
    $sql='select * from "SIMA_USER".empresa';
    $m = Herramientas::BuscarDatos($sql,&$result);
    if($m){
      foreach($result as $mon){
        $resp[$mon["codemp"]] = $mon["nomemp"];
      }
    }
    return $resp;
  }
  
}
