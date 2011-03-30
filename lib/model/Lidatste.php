<?php

/**
 * Subclass for representing a row from the 'lidatste'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Lidatste.php 32428 2009-09-02 04:18:52Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Lidatste extends BaseLidatste
{

	protected $grid=array();
        
        public function getCodempeje()
        {
            return self::getCodemp();
        }

        public function getNomempeje()
        {
            return self::getNomemp();
        }

        public function getCodempadm()
        {
            return self::getCodemp();
        }

        public function getNomempadm()
        {
            return self::getNomemp();
        }

        public function getCoduniadm()
        {
            return self::getCoduniste();
        }

        public function getDesuniadm()
        {
            return self::getDesuniste();
        }

        public function getNompai()
        {
            return  H::GetX('Codpai','Ocpais','Nompai',$this->codpai);
        }

        public function getNomedo()
          {
              return H::GetX('Codedo','Ocestado','Nomedo',$this->codedo);
          }

          public function getNommun()
          {
              return H::GetX('Codmun','Ocmunici','Nommun',$this->codmun);
          }

          public function getNompar()
          {
              return H::GetX('Codpar','Ocparroq','Nompar',$this->codpar);
          }

          public function getNomsec()
          {
              return H::GetX('Codsec','Ocsector','Nomsec',$this->codsec);
          }

}
