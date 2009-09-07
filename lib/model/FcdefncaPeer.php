<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fcdefnca'.
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
class FcdefncaPeer extends BaseFcdefncaPeer
{
	public static function getLista_codpar()
    {
        $result=array();
        $arreglo = array();
        $sql="Select d.CodPar as CodParroquia, a.CodMun as CodMunicipio,a.CodEdo as CodEstado,a.CodPai as CodPais, d.NomPar as NombreParroquia, a.NomMun as NombreMunicipio,b.NomEdo  as NombreEstado, c.NomPai as NombrePais From FCParroq d,FCMunici a, FCEstado b, FCPais c where d.CodMun=a.CodMun and d.CodEdo=b.CodEdo and a.CodEdo=b.CodEdo and a.CodPai=b.CodPai  and b.CodPai=c.CodPai and c.CodPai=d.CodPai ORDER BY d.CodPai,d.CodEdo,d.CodMun,d.CodPar";
	    if (Herramientas::BuscarDatos($sql,&$result))
	    {
	        $i=0;
	        while ($i<count($result))
	        {
    	      $cadena_valor =$result[$i]['codparroquia'].'-'.$result[$i]['codmunicipio'].'-'.$result[$i]['codestado'].'-'.$result[$i]['codpais'];
    	      $cadena_texto =$result[$i]['nombreparroquia'].'-'.$result[$i]['nombremunicipio'].'-'.$result[$i]['nombreestado'].'-'.$result[$i]['nombrepais'];
	     	  $arreglo += array($cadena_valor => $cadena_texto);
	          $i++;
	        }
	    }
/*


	    $c = new Criteria();
	    $registros = FcdefncaPeer::doSelect($c);
	    $arreglo = array();
	    foreach($registros as $obj_reg)
	    {
	      $cadena_valor =$obj_reg->getCodpar().'-'.$obj_reg->getCodmun().'-'.$obj_reg->getCodedo().'-'.$obj_reg->getCodpai();
	      $cadena_texto =$obj_reg->getCodpar().'-'.$obj_reg->getCodmun().'-'.$obj_reg->getCodedo().'-'.$obj_reg->getCodpai();
	      $arreglo += array($cadena_valor => $cadena_texto);
	    }*/
	    return $arreglo;
   }
}
