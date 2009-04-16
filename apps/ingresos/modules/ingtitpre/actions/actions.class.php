<?php

/**
 * ingtitpre actions.
 *
 * @package    siga
 * @subpackage ingtitpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtitpreActions extends autoingtitpreActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->setVars();

  }

  public function setVars()
  {

  	$this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
  	$this->longpre=strlen($this->mascarapresupuesto);

    }

  protected function updateCideftitFromRequest()
  {
    $cideftit = $this->getRequestParameter('cideftit');

    if (isset($cideftit['codpre']))
    {
      $this->cideftit->setCodpre($cideftit['codpre']);
    }
    if (isset($cideftit['nompre']))
    {
      $this->cideftit->setNompre($cideftit['nompre']);
    }
    if (isset($cideftit['codcta']))
    {
      $this->cideftit->setCodcta($cideftit['codcta']);
    }

  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $javascript="";
    switch ($ajax){
      case '1':
        $cad=split("-",$codigo);
        $max=count($cad);
        $i=0;
        $seguir=true;
        $cod=$cad[0];

        while ($i<$max-1 and $seguir){
          if (!H::buscarCodigoPadre('codpre','cideftit', $cod))
          {
           $seguir=false;
           $javascript="alert('Código Presupuestario inválido, no se ha definido el nivel anterior');";
    	   break;
          }else{
          	$i++;
          	$cod=$cod."-".$cad[$i];
          }
        }
        $output = '[["javascript","'.$javascript.'",""]]';
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
       break;
       case '2':
        $codigo = $this->getRequestParameter('codigo','');
    	$cajtexmos=$this->getRequestParameter('cajtexmos');
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
    	$dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
    	//print($dato2);exit;
    	if ($dato2=='S'){
    		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    	}else{
    		$javascript="alert('El código contable no es cargable');$('cideftit_codcta').value='';";
    		$output = '[["javascript","'.$javascript.'",""]]';
    	}


    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){


      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($cideftit)
  {
    $cad=split("-",$cideftit->getCodpre());
    $max=count($cad);
    $i=0;
    $error=-1;
    $seguir=true;
    $cod=$cad[0];

    while ($i<$max-1 and $seguir){
      if (!H::buscarCodigoPadre('codpre','cideftit', $cod))
      {
           $seguir=false;
           $error=1500;
    	   break;
      }else{
          	$i++;
          	$cod=$cod."-".$cad[$i];
      }
    }
    if ($seguir){
    	$cideftit->save();
    	$c = new Criteria();
    	$c->add(CiasiiniPeer::CODPRE,$cideftit->getCodpre());
    	$asig=CiasiiniPeer::doSelect($c);

      foreach ($asig as $per2){//Modificacion del nombre en la asignacion inicial

		 $per2->setNompre($cideftit->getNompre());
         $per2->save();
      }

    }
    return $error;
  }

  public function deleting($cideftit)
  {
  	//$error=-1;

	//Verificamos que el codigo presupuestario no tenga movimiento asociados
  	if (Ingresos::movcod($cideftit->getCodpre())==1){
  		$error=1501;
  	}else{
  		$error=-1;
  	}

	//Verificamos que no sea codigo padre
  	if (strlen($cideftit->getCodpre())==$this->longpre){

  		$error=1503;

  	}else{
  		$error=-1;
  	}

	if ($error!=1501 and $error!=1503){
		$cideftit->delete();
	}

    return $error;
  }

}
