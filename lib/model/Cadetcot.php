<?php

/**
 * Subclass for representing a row from the 'cadetcot' table.
 *
 *
 *
 * @package lib.model
 */
class Cadetcot extends BaseCadetcot
{
   protected $desart="";
   protected $priori="";
   protected $recargo=0;


   public function hydrate(ResultSet $rs, $startcol = 1)
   {
       parent::hydrate($rs, $startcol);
       $this->desart= Herramientas::getX('CODART','Caregart','Desart',self::getCodart());;
       $reqart= Herramientas::getX('REFCOT','Cacotiza','Refsol',self::getRefcot());;
	   $monrecargo=0;
       $cri = new Criteria();
       $cri->add(CaartsolPeer::REQART,$reqart);
       $cri->add(CaartsolPeer::CODART,self::getCodart());
       $cri->addAscendingOrderByColumn(CaartsolPeer::CODCAT);
       $reg = CaartsolPeer::doSelect($cri);
       foreach ($reg as $solegr)
	   {
             $c= new Criteria();
			 $c->add(CadisrgoPeer::REQART,$reqart);
			 $c->add(CadisrgoPeer::CODART,$solegr->getCodart());
			 $c->add(CadisrgoPeer::CODCAT,$solegr->getCodcat());
			 $c->add(CadisrgoPeer::TIPDOC,'SAE');
			 $result=CadisrgoPeer::doSelect($c);
			 if ($result)
			 {
		        foreach ($result as $datos)
		        {
		           $monrgopor=$datos->getMonrgoc();
		           if ($datos->getTiprgo()=='M')
				   {
				     $recargo= $monrgopor;
				   }
				   else if ($datos->getTiprgo()=='P')
				   {
				   	 $monbase = $solegr->getCanreq()*self::getCosto();
				     $recargo = (($monbase*$monrgopor)/100);
				   }
				   else
				   {
				      $recargo=0;
				   }
                   $monrecargo=$monrecargo+$recargo;
		        }// foreach ($result as $datos)
			 }//if ($result)
	   }//	 foreach ($reg as $solegr)
       $this->recargo=$monrecargo;
   }



  public function getProvee()
  {
     $c = new Criteria();
  $c->add(CacotizaPeer::REFCOT,self::getRefcot());
  $c->addJoin(CaproveePeer::CODPRO,CacotizaPeer::CODPRO);
  $datos = CaproveePeer::doSelectone($c);
  if ($datos)
          return $datos->getCodpro().'  '.$datos->getNompro();
    else
          return Herramientas::REGVACIO;
  }

   public function setProvee($val)
   {
    $this->provee = $val;

  }
}
