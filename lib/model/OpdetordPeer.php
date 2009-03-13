<?php

/**
 * Subclass for performing query and update operations on the 'opdetord' table.
 *
 * 
 *
 * @package lib.model
 */ 
class OpdetordPeer extends BaseOpdetordPeer
{
  public static function getRetiva($codigo)
  {
  	$c= new Criteria();
  	$reg= CadefartPeer::doSelectOne($c);
  	if ($reg)
  	{ $afectarecargo=$reg->getAsiparrec();
  	}else {$afectarecargo='C';}
  	
  	if ($afectarecargo=='R' || $afectarecargo=='S')
  	{
  	  Herramientas::obtenerFormatoCategoria(&$formatopar,&$iniciopartida);  	 
  	  $par=substr($codigo,$iniciopartida,strlen($formatopar));
  	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,$par);
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';
   }else if ($afectarecargo=='P')
   {
   	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,$codigo);
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';
   	
   }
  }
}
