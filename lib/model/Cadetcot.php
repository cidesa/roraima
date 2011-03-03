<?php

/**
 * Subclass for representing a row from the 'cadetcot'.
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
class Cadetcot extends BaseCadetcot
{
   protected $desart="";
   protected $priori="";
   protected $recargo=0;
   protected $check="0";
   protected $anadir="";
   protected $datosrecargo="";


   public function hydrate(ResultSet $rs, $startcol = 1)
   {
       parent::hydrate($rs, $startcol);

       $reqart= Herramientas::getX('REFCOT','Cacotiza','Refsol',self::getRefcot());
      /* $t= new Criteria();
       $t->add(CaartsolPeer::REQART,$reqart);
       $t->add(CaartsolPeer::CODART,self::getCodart());
       $reg= CaartsolPeer::doSelectOne($t);
       if ($reg)
       {
           $this->desart= $reg->getDesart();
       }else {
            $this->desart= Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
       }*/
         $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
         $aplrecar=H::getConfApp2('aplrecar', 'compras', 'almcotiza');
	   $monrecargo=0;
	   $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
       $cri = new Criteria();
       $cri->add(CaartsolPeer::REQART,$reqart);
       $cri->add(CaartsolPeer::CODART,self::getCodart());
       if ($claartdes=='S') $cri->add(CaartsolPeer::DESART,trim(self::getDesart()));
       $cri->addAscendingOrderByColumn(CaartsolPeer::CODCAT);
       $reg = CaartsolPeer::doSelect($cri);
       foreach ($reg as $solegr)
	   {
             $c= new Criteria();
			 $c->add(CadisrgoPeer::REQART,$reqart);
			 $c->add(CadisrgoPeer::CODART,$solegr->getCodart());
                         if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim(self::getDesart()));
			 $c->add(CadisrgoPeer::CODCAT,$solegr->getCodcat());
			 $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
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
                         else {
                             if ($aplrecar=='S')
                             {
                                 $c= new Criteria();
                                 $c->add(CacotdisrgoPeer::REFCOT,self::getRefcot());
                                 $c->add(CacotdisrgoPeer::CODART,$solegr->getCodart());
                                 if ($claartdes=='S') $c->add(CacotdisrgoPeer::DESART,trim(self::getDesart()));
                                 $c->add(CacotdisrgoPeer::CODCAT,$solegr->getCodcat());
                                 $c->add(CacotdisrgoPeer::TIPDOC,$tipdoc);
                                 $result=CacotdisrgoPeer::doSelect($c);
                                 if ($result)
                                 {
                                    $this->check='1';
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
                             }
                         }
                         }
	   }//	 foreach ($reg as $solegr)
       $this->recargo=$monrecargo;

       
     $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $c= new Criteria();
	 $c->add(CacotdisrgoPeer::REFCOT,self::getRefcot());
	 $c->add(CacotdisrgoPeer::CODART,self::getCodart());
         if ($claartdes=='S') $c->add(CacotdisrgoPeer::DESART,trim(self::getDesart()));
	 $c->add(CacotdisrgoPeer::CODCAT,self::getCodcat());
	 $c->add(CacotdisrgoPeer::TIPDOC,$tipdoc);
	 $result=CacotdisrgoPeer::doSelect($c);
	 if ($result)
	 {
            foreach ($result as $datos)
            {
               $monrgo=number_format($datos->getMonrgo(),2,',','.');
               $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
               $this->datosrecargo=$this->datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $monrgo .'_'. $datos->getCodpar(). '!';
            }
	 }
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

    public function getCosto($val=false)
  {

    if($val) return number_format($this->costo,3,',','.');
    else return $this->costo;

}

  	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v,3);
        $this->modifiedColumns[] = CadetcotPeer::COSTO;
      }

	}
}
