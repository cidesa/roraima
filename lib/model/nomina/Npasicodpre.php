<?php

/**
 * Subclase para representar una fila de la tabla 'npasicodpre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasicodpre extends BaseNpasicodpre
{


  public function getNomcon()
  {
     return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }

  public function getNomnom()
  {
  return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }

  public function getNompar()
  {
  return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpre());
  }


}
