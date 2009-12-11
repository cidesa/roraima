<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'apernueper'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ApernueperPeer extends BaseApernueperPeer
{

    public static function cargarSelect($modulo='',$tabexi='')
    {
      $schema= sfContext::getInstance()->getUser()->getAttribute('schema');
      $result=array();
      $resp=array();
      $sql1='SELECT TABLE_NAME as nomtab FROM "information_schema".TABLES
                     WHERE table_schema=\''.$schema.'\'
                     AND TABLE_TYPE=\'BASE TABLE\' AND TABLE_NAME LIKE \''.$modulo.'%\'
                     ORDER BY TABLE_NAME;';
      Herramientas::BuscarDatos($sql1,&$result);
      $objects = $result;
      if ($tabexi!=''){
          $aux=split(';',$tabexi);          
          foreach($objects as $tab){
            $p=1;
            $encontro=false;
            while ($p<=(count($aux)-1)){            
              if ($aux[$p]==$tab["nomtab"]) {
              $encontro=true;
                  break;
            }            
            $p++;
          }
          if (!$encontro)
              {
                  $resp[$tab["nomtab"]] = $tab["nomtab"];
              }
          }
      }else {
          foreach($objects as $tab){
            $resp[$tab["nomtab"]] = $tab["nomtab"];
          }
      }

      return $resp;
     }
    public static function cargarSelect2()
    {      
      $resp=array();

       $t = new Criteria();     
       $t->addAscendingOrderByColumn(ApernueperPeer::ORDEN);
       $data= ApernueperPeer::doSelect($t);
       if ($data){
          foreach($data as $tab){
            $resp[$tab->getNomtab()] = $tab->getNomtab();
          }
       }

      return $resp;
     }


}
