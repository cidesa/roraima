<?php

/**
 * Subclass for representing a row from the 'fcsolvencia'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcsolvencia.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcsolvencia extends BaseFcsolvencia
{
	protected $grid='';
    protected $etiqueta='';

  public static function ListaSolvencia()
  {
    $c = new Criteria();
    $fctipsol = FctipsolPeer::doSelect($c);

	/*$lista = array();
	foreach ($fctipsol as $key => $value)
	{
		$lista[$key] = $value->getCodtip()." - ".$value->getDestip();
	}*/


        $l = "\$lista = Array(";
        $i = 0;
        foreach($fctipsol as $val){
            $cod = $val->getCodtip();
            $des = $val->getDestip();

            if($i == 0){
                $l = $l."'$cod' => '$des'";                
            }else{
                $l = $l.", '$cod' => '$des'";
            }

            $i++;
        }

        $l = $l.");";
        eval($l);
	return $lista;
  }

  public function getEtiqueta(){
      if (self::getStasol() == 'V'){
          $this->etiqueta = 'VIGENTE';
      }else if (self::getStasol() == 'E'){
          $this->etiqueta = 'EXPIRADA';
      }else{
          $this->etiqueta = '';
      }

      return $this->etiqueta;
  }

  public function getNomcon(){
      return H::getX('Rifcon', 'Fcconrep', 'nomcon', self::getRifcon());
  }

  public function getDircon(){
      return H::getX('Rifcon', 'Fcconrep', 'dircon', self::getRifcon());
  }

}
