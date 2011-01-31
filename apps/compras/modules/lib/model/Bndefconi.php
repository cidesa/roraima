<?php

/**
 * Subclass for representing a row from the 'bndefconi'.
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
class Bndefconi extends BaseBndefconi
{
  public function getDesmue()
  {
  //  ($tabla,$filtros,$variables,$campo_retornado)
      return Herramientas::getXx('bnregmue',array('CODACT','CODMUE'),array(self::getCodact(),self::getCodinm()),'desmue');
  }

  public function getDescta()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtadepcar());
  }

  public function getDesctaabo()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtadepabo());
  }

  public function getDesctaajucar()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtaajucar());
  }

  public function getDesctaajuabo()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtaajuabo());
  }

  public function getDesctarevcar()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtarevcar());
  }

  public function getDesctarevabo()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtarevabo());
  }

  public function getDesctapercar()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtapercar());
  }

  public function getDesctaperabo()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getCtaperabo());
  }

  public function getDesinm()
  {
  //  ($tabla,$filtros,$variables,$campo_retornado)
      return Herramientas::getXx('bnreginm',array('CODACT','CODINM'),array(self::getCodact(),self::getCodinm()),'desinm');
  }

}
