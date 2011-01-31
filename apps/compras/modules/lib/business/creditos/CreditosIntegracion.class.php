<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CreditosIntegracion
 *
 * @author luelher
 */
class CreditosIntegracion {


    public static function eliminarLiquidacionCredito($idopordpag)
    {

      $ordcre = Herramientas::getX('CODEMP','Opdefemp','ordcre','001');
      if($tipcau==$ordcre){
        $c = new Criteria();
        $c->add(CcdetcuadesPeer::CPCAUSAD_ID,$idopordpag);
        $ccdetcuades = CcdetcuadesPeer::doSelectJoinCccuades($c);
        foreach($ccdetcuades as $detcuades){
          $detcuades->setCpcausadId(null);
          $detcuades->save();
        }
        if($ccdetcuades){
          $cccuades = $ccdetcuades[0]->getCccuades();
          $cccuades->setEstatu('POR LIQUIDAR');
          $cccuades->save();
        }
      }

    }

    public static function actualizarLiquidacionCreditos($opordpag, $refcre)
    {

       if($refcre){
         $ccdetcuades = CcdetcuadesPeer::retrieveByPK($refcre);
         if($ccdetcuades){
           $ccdetcuades->setCpcausadId($opordpag->getId());
           $ccdetcuades->save();
         }
         $cccuades = $ccdetcuades->getCccuades();
         if($cccuades)
         {
           $c = new Criteria();
           $c->add($ccdetcuades->getCccuadesId());
           $c->add(CcdetcuadesPeer::CPCAUSAD_ID,null,Criteria::ISNULL);
           $detcuades = CcdetcuadesPeer::doSelect($c);
           if($detcuades){
             $cccuades->setEstatu('ORDEN DE PAGO (CAUSADO PARCIAL)');
           }else{
             $cccuades->setEstatu('ORDEN DE PAGO');
           }
           $cccuades->save();
         }

       }


    }


}
?>
