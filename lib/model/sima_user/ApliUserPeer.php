<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'apli_user'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class ApliUserPeer extends BaseApliUserPeer
{
  
  public static function doSelectArray($c)
  {
    $rs = parent::doSelectRS($c);
    $result = array();
    $columns = self::getFieldNames(BasePeer::TYPE_FIELDNAME);
    while($rs->next()) {
      $reg = array();
      foreach($columns as $colindex => $colname){
        $reg[$colname] = $rs->get($colindex + 1);
      }
      $result[] = $reg;
    }
    return $result;
  }
  
  private static function getColumnsForSelectSql()
  {
    $columns = self::getFieldNames(BasePeer::TYPE_COLNAME);
    $strcolumns='';
    foreach($columns as $colindex => $colname){
      if($colindex+1 == self::NUM_COLUMNS) $strcolumns .= $colname;
      else $strcolumns .= $colname.', ';
    }
    return $strcolumns;
  }
  
  
  public static function doSelectSql($sql)
  {
    
    $sql = sprintf($sql,self::getColumnsForSelectSql());
    
    $con = Propel::getConnection(self::DATABASE_NAME);
    $stmt = $con->createStatement();
    $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);

    return self::populateObjects($rs);

  }
  
  
}
