<?php

/**
 * Subclass for representing a row from the 'bndefcon'.
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
class Bndefcon extends BaseBndefcon
{
   protected $codact1="";
  public function getDesmue()
  {
    $filtros=array('CODACT','CODMUE');//arreglo donde mando los filtros de las clases
    $variables=array(self::getCodact(),self::getCodmue());//arreglo donde mando los parametros de la funcion
    return $destipact= Herramientas::getXx('Bnregmue',$filtros,$variables,'Desmue');
  }
  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtadepcar());

  }
  public function getDesctaabo()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtadepabo());
  }
  public function getDesctaajucar()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtaajucar());

  }
  public function getDesctaajuabo()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtaajuabo());

  }
  public function getDesctarevcar()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtarevcar());

  }
  public function getDesctarevabo()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtarevabo());

  }
  public function getDesctapercar()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtapercar());

  }
  public function getDesctaperabo()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtaperabo());
  }
}
