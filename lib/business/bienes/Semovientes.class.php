<?php
class Semovientes
{
    /**************************************************************************
	 **         Grid de la Requisición Formulario bieregsegsem                **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/
	/**
	 * Función para registrar la Requisición
	 *
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen.
	 * @return void
	 */ 	
  public static function salvarbieregsegmue($Bnsegsem)
  {
  	return self::salvarsegmue($Bnsegsem);
  }

  public static function salvarsegmue($bnsegsem)
  { 	
   if (date('Y-m-d') > $bnsegsem->getFecsegven())
   	{
   		$bnsegsem->setStasegsem('V');
   	}else{
   		$bnsegsem->setStasegsem('A');
   	}  	 
  	$bnsegsem->save();
  return '-1';
  }    	    
    /**************************************************************************
	 **                           FIN                                         **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/	


   /**************************************************************************
	 **                 Contable de Semovientes por Lotes                     **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/
	/**
	 * Función para registrar definicion Contable de Semovientes
	 *
	 * @static
	 * @param $Bnsegsem Object Guardar
	 * @return void
	 */ 	
  public static function salvarBiedefconlots($Bnsegsem)
  {
  	return self::salvarRegistrar_Datos($Bnsegsem);
  }

  public static function salvarRegistrar_Datos($bnsegsem)
  { 	  	
    $c = new Criteria();    
    $c->add(BnregsemPeer::CODACT,$bnsegsem->getCodact(),Criteria::GREATER_EQUAL);
    $c->add(BnregsemPeer::CODACT,$bnsegsem->getCodact1(),Criteria::LESS_EQUAL);
    $bnregsem = BnregsemPeer::doSelect($c);
         
    foreach ($bnregsem as $value)
   	{    	
   	  $c1 = new Criteria();
      $c1->add(BndefconsPeer::CODACT,$value->getCodact());
      $c1->add(BndefconsPeer::CODSEM,$value->getCodsem());
      $bndefcons=BndefconsPeer::doSelectOne($c1);
     
      if (!$bndefcons)
      {	     
      	$bndefcons = new Bndefcons();
      	$bndefcons->setCodact($bnsegsem->getCodact());      
      	$bndefcons->setCodsem($value->getCodsem()); 
      }
	    $bndefcons->setCtadepcar($bnsegsem->getCtadepcar());      
      	$bndefcons->setCtadepabo($bnsegsem->getCtadepabo());      
      	$bndefcons->setCtaajucar($bnsegsem->getCtaajucar());      
      	$bndefcons->setCtaajuabo($bnsegsem->getCtaajuabo());      
      	$bndefcons->setCtarevcar($bnsegsem->getCtarevcar());      
      	$bndefcons->setCtarevabo($bnsegsem->getCtarevabo());      
      	$bndefcons->setCtapercar($bnsegsem->getCtapercar());      
      	$bndefcons->setCtaperabo($bnsegsem->getCtaperabo());
     	$bndefcons->save();  
    }
   
  return '-1';
  }    	    
    /**************************************************************************
	 **                           FIN                                         **
	 **                       Jesus Lobaton                                   **
	 **************************************************************************/	
}
?>