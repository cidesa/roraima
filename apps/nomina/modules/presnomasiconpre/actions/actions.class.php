<?php

/**
 * presnomasiconpre actions.
 *
 * @package    siga
 * @subpackage presnomasiconpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomasiconpreActions extends autopresnomasiconpreActions
{

  public  $coderror1=-1;

  public function validateEdit()
  {
    $this->npasipre= $this->getNpasipreOrCreate();
    $this->updateNpasipreFromRequest();
	$this->arrtipasi = Constantes::Tipo_Asignaciones();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
    $this->configGrid($this->npasipre->getCodcon(),$this->npasipre->getCodasi());
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    $x= $grid[0];
    $j=0;
    $s=0;
    $a=0;
    $encontrado=false;

    if(count($x)>0)
    {
   		while ($s<count($x) and !$encontrado){
      $cp= $x[$s]->getCodcpt();
        $j=0;

	    while ($j<count($x))
	    {
	    $a=0;
	      $j= $j+$s;
	      $a= $j+1;

	      if ($a>=count($x)){
	        break;}
	       else{

	        $v= $x[$a]->getCodcpt();
	      if ($cp == $v )
	    {
	        $this->coderror1= 428;
	        $encontrado=true;

	      break;

	    }
	      else
	        {   $this->coderror1=-1;

	        }

	    $j++;
	    }}		
	    $s++;}
    }else
    	$this->coderror1= 437;



    }else return true;

   if ($this->coderror1== -1)
     return true;
     else
     return false;

    }


public function handleErrorEdit()
    {
     $this->preExecute();
    $this->npasipre = $this->getNpasipreOrCreate();
    $this->updateNpasipreFromRequest();

    $this->labels = $this->getLabels();
  $this->configGrid($this->npasipre->getCodcon(),$this->npasipre->getCodasi());
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
          if($this->coderror1!=-1)
          {
            $err = Herramientas::obtenerMensajeError($this->coderror1);
            $this->getRequest()->setError('',$err);
          }

      }
      return sfView::SUCCESS;
    }


public function configGrid($codcon='',$codasi='')
  {//$sql="Select A.codcpt,B.NomCon
  //From NPConAsi A,NPDefCpt B Where A.Codcpt=B.CodCon
   //and  A.CodCon = '" . $this->npasipre->getCodcon() . "'
   //And A.CodAsi = '" . $this->npasipre->getCodasi() . "' Order By CodCpt";

    $c = new Criteria();
    $c->add(NpconasiPeer::CODCON,$codcon);
    $c->add(NpconasiPeer::CODASI,$codasi);
    $c->addAscendingOrderByColumn(NpconasiPeer::CODCPT);
    $per = NpconasiPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('npconasi');
    $opciones->setFilas(50);
    $opciones->setAnchoGrid(800);
	$opciones->setAncho(800);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $params=array("'+$('npasipre_codcon').value+'",'val2');

    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codcpt');
    $col1->setCatalogo('npdefcpt','sf_admin_edit_form',array('codcon' => 1, 'nomcon' => 2),'Npdefcpt_Presnomasiconpre_codnom',$params);
    $col1->setAjax('presnomasiconpre',3,2);
	
    $col2 =new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomCon');
    $col2->setHTML('type="text" size="50" disabled=true');
	
	$col3 =new Columna('Afecta Alicuota Bono Vacacional');
    $col3->setTipo(Columna::CHECK);
	$col3->setEsGrabable(true);
	#$col3->setCombo(array('N'=>'NO','S'=>'SI'));
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('afealibv');
    $col3->setHTML(' size="10"');
    
	
	$col4 =new Columna('Afecta Alicuota Bono Fin de Año');
	$col4->setTipo(Columna::CHECK);
	$col4->setEsGrabable(true);
	#$col4->setCombo(array('N'=>'NO','S'=>'SI'));
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('afealibf');
	$col4->setHTML(' size="10" ');
    

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj = $opciones->getConfig($per);

  }
  public function executeEdit()

  {
    $this->npasipre = $this->getNpasipreOrCreate();
    $this->configGrid($this->npasipre->getCodcon(),$this->npasipre->getCodasi());
	$this->arrtipasi = Constantes::Tipo_Asignaciones();	

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasipreFromRequest();

      $this->saveNpasipre($this->npasipre);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomasiconpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomasiconpre/list');
      }
      else
      {
        return $this->redirect('presnomasiconpre/edit');
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }

  }
  protected function saveNpasipre($npasipre)
  {

    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//2
    Nomina::salvarpresnomasicompre($npasipre,$grid);
	
	return -1;

  }


public function executeAjax()
  {
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    $js="";
    $dato="";
    if ($this->getRequestParameter('ajax')=='1')
    {
      $c = new Criteria();
      $c->add(NptipconPeer::CODTIPCON,$codigo);
      $rs = NptipconPeer::doSelect($c);
      if($rs)
		$dato=NptipconPeer::getDestipcon($codigo);
	  else
	  {
	  	$js.="$('npasipre_codcon').value='';";
		$js.="alert('Codigo de Contrato no existe');";
		$js.="$('npasipre_codcon').focus();";
	  }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }/******************************************************************************************************************/

    $cajtexmos1=$this->getRequestParameter('cajtexmos1');
    $codcont=$this->getRequestParameter('codcont');
    $codigoasi=$this->getRequestParameter('codigoasi');

    if ($this->getRequestParameter('ajax')=='2')
    {
      $dato1=NpasiprePeer::getDesasi_asi($codigoasi,$codcont);
      $dato2=NpasiprePeer::getDesasi_asi1($codigoasi);

      if ($dato2!='')
        {

         $javascript="$('npasipre_desasi').readOnly=true";
          if ($dato1!=''){
              $dato3= $dato1;
              $this->configGrid($codcont,$codigoasi);}

          else
      {       $javascript="$('npasipre_desasi').readOnly=true";
              $dato3= $dato2;
              $this->configGrid();}

         }
         else{
            $javascript="";
            $dato3="";
            $this->configGrid();
         }

      $output = '[["'.$cajtexmos1.'","'.$dato3.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }
    if ($this->getRequestParameter('ajax')=='3')
    {
	 	$c = new Criteria();
	 	$c->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigo'));
	 	$rs = NpdefcptPeer::doSelectOne($c);
		if($rs)
		{
			$c1 = new Criteria();
			$c1->add(NpasiconnomPeer::CODCON,$rs->getCodcon());
			$c1->addJoin(NpasiconnomPeer::CODNOM,NpasinomcontPeer::CODNOM);
			$rs2 = NpasiconnomPeer::doSelect($c1);
			if($rs2)
				$output = '[["'.$cajtexmos.'","'.$rs->getNomcon().'",""]]';
			else
			{
				$js="$('$cajtexcom').value='';";
				$js.="$('$cajtexcom').focus();";
				$js.="alert('Concepto no asociado a las nominas de ese contrato');";
				$output = '[["javascript","'.$js.'",""]]';
			}
		}else
		{
			$js="$('$cajtexcom').value='';";
			$js.="$('$cajtexcom').focus();";
			$js.="alert('Concepto no existe');";
			$output = '[["javascript","'.$js.'",""]]';
		}

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }


   // return sfView::HEADER_ONLY;


/*******************************************************************************************************************/


  }
  protected function updateNpasipreFromRequest()
  {
    $npasipre = $this->getRequestParameter('npasipre');

    if (isset($npasipre['codcon']))
    {
      $this->npasipre->setCodcon($npasipre['codcon']);
    }
    if (isset($npasipre['codasi']))
    {
      $this->npasipre->setCodasi($npasipre['codasi']);
    }
    if (isset($npasipre['desasi']))
    {
      $this->npasipre->setDesasi($npasipre['desasi']);
    }
	if (isset($npasipre['tipasi']))
    {
      $this->npasipre->setTipasi($npasipre['tipasi']);
    }
	if (isset($npasipre['afealibv']))
    {
      $this->npasipre->setAfealibv('S');
    }
	if (isset($npasipre['afealibf']))
    {
      $this->npasipre->setAfealibf('S');
    }
  }
 protected function getNpasipreOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npasipre = new Npasipre();
    }
    else
    {
      $npasipre = NpasiprePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($npasipre);
    }

    return $npasipre;
  }


   public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIPCON','Nptipcon','Codtipcon',$this->getRequestParameter('npasipre[codcon]'));

  }
    if ($this->getRequestParameter('ajax')=='2')
  {
    $this->tags=Herramientas::autocompleteAjax('CODASI','Npasipre','Codasi',$this->getRequestParameter('npasipre[codasi]'));
  }
  }

    public function executeDelete()
  {
    $this->npasipre = NpasiprePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npasipre);

    try
    {
      $c = new Criteria();
      $c->add(NpconasiPeer::CODCON,$this->npasipre->getCodcon());
      $c->add(NpconasiPeer::CODASI,$this->npasipre->getCodasi());
      NpconasiPeer::doDelete($c);
      $this->deleteNpasipre($this->npasipre);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npasipre. Make sure it does not have any associated items.');
      return $this->forward('presnomasiconpre', 'list');
    }

    return $this->redirect('presnomasiconpre/list');
  }

}
?>
