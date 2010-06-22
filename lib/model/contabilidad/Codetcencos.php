<?php

/**
 * Subclase para representar una fila de la tabla 'codetcencos'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Codetcencos extends BaseCodetcencos
{
   public function getDescta()
   {
     return Herramientas::getX('codcta','Contabb','descta',self::getCodcta());
   }

   public function getDescencos()
   {
     return Herramientas::getX('codcencos','Codefcencos','descencos',self::getCodcencos());
   }

  public function getMonasi()
  {
    $r= new Criteria();
    $r->add(Contabc1Peer::NUMCOM,self::getNumcom());
    $r->add(Contabc1Peer::CODCTA,self::getCodcta());
    $reg= Contabc1Peer::doSelectOne($r);
    if ($reg)
    {
        $montoasi=number_format($reg->getMonasi(),2,',','.');
    }else $montoasi='0,00';

    return $montoasi;
  }


}
