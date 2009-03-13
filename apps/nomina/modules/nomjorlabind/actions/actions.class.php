<?php

/**
 * nomjorlabind actions.
 *
 * @package    siga
 * @subpackage nomjorlabind
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomjorlabindActions extends autonomjorlabindActions
{

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$dato="";
	  	$dato2="";
	  	$dato3="";
	  	$dato4="";
	  	$c= new Criteria();
	  	$c->add(NphojintPeer::CODEMP,$this->getRequestParameter('codigo'));
	  	$data=NphojintPeer::doSelectOne($c);
	  	if ($data)
	  	{
	  	  $dato=NphojintPeer::getNomemp($this->getRequestParameter('codigo'));
	  	  $c= new Criteria();
	  	  $c->add(NpasicarempPeer::CODEMP,$this->getRequestParameter('codigo'));
	  	  $resul= NpasicarempPeer::doSelectOne($c);
	  	  if ($resul)
	  	  {
	  	   $dato2=NphojintPeer::getCodnom($this->getRequestParameter('codigo'));
	  	   $dato3=NphojintPeer::getNomnom($dato2);
	  	   $aux4=NphojintPeer::getCodcar($this->getRequestParameter('codigo'));
	  	   $dato4=NphojintPeer::getNomcar($aux4);
	  	   $existe='0';
	  	  }
	  	  else
	  	  {
	  	  	$existe='2';
	  	  }
	  	}
	  	else
	  	{
          $existe='1';
	  	}
	  	$output = '[["existe","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""],["npempjorlab_codnom","'.$dato2.'",""],["npempjorlab_nomnom","'.$dato3.'",""],["npempjorlab_nomcar","'.$dato4.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;

	  }
	  else if ($this->getRequestParameter('ajax')=='2')
	    {

	      $idejor=$this->getRequestParameter('codigo');
	  	  $nomina=$this->getRequestParameter('nom');
	      $c= new Criteria();
	      $c->add(NpdefjorlabPeer::CODNOM,$nomina);
	      $c->add(NpdefjorlabPeer::IDEJOR,$idejor);
	      $resul=NpdefjorlabPeer::doselectOne($c);
	      if ($resul)
	      {
	      	$this->l=NpdefjorlabPeer::getLunes($idejor,$nomina);
			$this->m=NpdefjorlabPeer::getMartes($idejor,$nomina);
			$this->i=NpdefjorlabPeer::getMiercoles($idejor,$nomina);
			$this->j=NpdefjorlabPeer::getJueves($idejor,$nomina);
			$this->v=NpdefjorlabPeer::getViernes($idejor,$nomina);
			$this->s=NpdefjorlabPeer::getSabado($idejor,$nomina);
			$this->d=NpdefjorlabPeer::getDomingo($idejor,$nomina);
	      }
	      else
	      {
	       $existe3='S';
	       $output = '[["existe3","'.$existe3.'",""]]';
		   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	       return sfView::HEADER_ONLY;
	      }

	    }

	}


	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODEMP','Nphojint','CODEMP',$this->getRequestParameter('npempjorlab[codemp]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$datox=$this->getRequestParameter('x');
	    	$datico=$this->getRequestParameter('npempjorlab[idejor]');
	     $sql="select idejor from npdefjorlab where codnom='".$datox."'
               and idejor like '".$datico."%' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {
	     	$arr=array();

	     	foreach ($result as $resultico)
	     	{$arr[]=$resultico["idejor"];
	     	}
	     	$this->tags=$arr;
	     }
	    }
	}

	protected function updateNpempjorlabFromRequest()
  {
    $npempjorlab = $this->getRequestParameter('npempjorlab');

    if (isset($npempjorlab['codemp']))
    {
      $this->npempjorlab->setCodemp($npempjorlab['codemp']);
    }
    if (isset($npempjorlab['codnom']))
    {
      $this->npempjorlab->setCodnom($npempjorlab['codnom']);
    }
    if (isset($npempjorlab['idejor']))
    {
      $this->npempjorlab->setIdejor($npempjorlab['idejor']);
    }
  }

}
