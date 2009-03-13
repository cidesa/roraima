<?php

/**
 * bieipcact actions.
 *
 * @package    siga
 * @subpackage bieipcact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieipcactActions extends autobieipcactActions
{

  private $coderror = -1;

 public function executeEdit()
  {
    $this->bnipcact = $this->getBnipcactOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnipcactFromRequest();

      $this->saveBnipcact($this->bnipcact);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('bieipcact/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('bieipcact/list');
      }
      else
      {
        return $this->redirect('bieipcact/edit?id='.$this->bnipcact->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  public function saveBnipcact($Bnipcact)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveBnipcact($Bnipcact);

      if($coderr!=-1){

        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);

      }

    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }

  public function validateEdit()
  {
    $resp=-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($resp!=-1){
        $this->coderror = $resp;
        return false;
      } else return true;

    }else return true;

  }

  public function handleErrorEdit()

  {

    $this->labels = $this->getLabels();
    $this->bnipcact = $this->getBnipcactOrCreate();
    $this->updateBnipcactFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('bnipcact{anoipc}',$err);
      }
    }
    return sfView::SUCCESS;

  }


public function executeAjax()

	{

	    $cajtexmos1=$this->getRequestParameter('cajtexmos1');
	    $cajtexmos2=$this->getRequestParameter('cajtexmos2');
	    $cajtexmos3=$this->getRequestParameter('cajtexmos3');
	    $cajtexmos4=$this->getRequestParameter('cajtexmos4');
	    $cajtexmos5=$this->getRequestParameter('cajtexmos5');
	    $cajtexmos6=$this->getRequestParameter('cajtexmos6');
	    $cajtexmos7=$this->getRequestParameter('cajtexmos7');
   		$cajtexmos8=$this->getRequestParameter('cajtexmos8');
   		$cajtexmos9=$this->getRequestParameter('cajtexmos9');
   		$cajtexmos10=$this->getRequestParameter('cajtexmos10');
   		$cajtexmos11=$this->getRequestParameter('cajtexmos11');
   		$cajtexmos12=$this->getRequestParameter('cajtexmos12');
   		$cajtexcom=$this->getRequestParameter('cajtexcom');


	    if ($this->getRequestParameter('ajax')=='1')

	    {
	    	if ($this->getRequestParameter('codigo')<>'')
	    	{
		    	$x=Herramientas::getX_vacio('anoipc','bnipcact','ipcene',$this->getRequestParameter('codigo'));

			    if (trim($x)=="")
				    {
				     $dato1="0,00";$dato2="0,00";$dato3="0,00";$dato4="0,00";$dato5="0,00";$dato6="0,00";$dato7="0,00";$dato8="0,00";$dato9="0,00";$dato10="0,00";$dato11="0,00";$dato12="0,00";
					}
			    else
	          	{
			        	$dato1=Herramientas::getX('anoipc','bnipcact','ipcene',$this->getRequestParameter('codigo'));
			            $dato2=Herramientas::getX('anoipc','bnipcact','ipcfeb',$this->getRequestParameter('codigo'));
			            $dato3=Herramientas::getX('anoipc','bnipcact','ipcmar',$this->getRequestParameter('codigo'));
			            $dato4=Herramientas::getX('anoipc','bnipcact','ipcabr',$this->getRequestParameter('codigo'));
			            $dato5=Herramientas::getX('anoipc','bnipcact','ipcmay',$this->getRequestParameter('codigo'));
			            $dato6=Herramientas::getX('anoipc','bnipcact','ipcjun',$this->getRequestParameter('codigo'));
			            $dato7=Herramientas::getX('anoipc','bnipcact','ipcjul',$this->getRequestParameter('codigo'));
			            $dato8=Herramientas::getX('anoipc','bnipcact','ipcago',$this->getRequestParameter('codigo'));
			            $dato9=Herramientas::getX('anoipc','bnipcact','ipcsep',$this->getRequestParameter('codigo'));
			            $dato10=Herramientas::getX('anoipc','bnipcact','ipcoct',$this->getRequestParameter('codigo'));
			            $dato11=Herramientas::getX('anoipc','bnipcact','ipcnov',$this->getRequestParameter('codigo'));
				    	$dato12=Herramientas::getX('anoipc','bnipcact','ipcdic',$this->getRequestParameter('codigo'));

	          	}
		    }

	    	}

	   // $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos1.'","'.$dato1.'",""],["'.$cajtexmos2.'","'.$dato2.'",""],["'.$cajtexmos3.'","'.$dato3.'",""],["'.$cajtexmos4.'","'.$dato4.'",""],["'.$cajtexmos5.'","'.$dato5.'",""],["'.$cajtexmos6.'","'.$dato6.'",""],["'.$cajtexmos7.'","'.$dato7.'",""],["'.$cajtexmos8.'","'.$dato8.'",""],["'.$cajtexmos9.'","'.$dato9.'",""],["'.$cajtexmos10.'","'.$dato10.'",""],["'.$cajtexmos11.'","'.$dato11.'",""],["'.$cajtexmos12.'","'.$dato12.'",""]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	}


}
