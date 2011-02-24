<?php

/**
 * Subclase para representar una fila de la tabla 'npasiempcont'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npasiempcont.php 32413 2009-09-02 01:02:54Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasiempcont extends BaseNpasiempcont
{
	protected $montocalculado=0;
	protected $codasi='';
        protected $objcon=array();
	public function getDestipcon()
        {
          return Herramientas::getX('codtipcon','nptipcon','destipcon',self::getCodtipcon());
        }
        public function getNomnom()
        {
          return Herramientas::getX('Codnom','npnomina','nomnom',$this->codnom);
        }
        public function getNomemp()
        {
          return Herramientas::getX('codemp','nphojint','nomemp',self::getcodemp());
        }
}
