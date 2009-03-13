<?php

/**
 * oycregval actions.
 *
 * @package    siga
 * @subpackage oycregval
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycregvalActions extends autooycregvalActions
{
  public function executeEdit()
  {
    $this->ocperval = $this->getOcpervalOrCreate();
    $this->configGrid($this->ocperval->getCodcon());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcpervalFromRequest();

      $this->saveOcperval($this->ocperval);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycregval/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycregval/list');
      }
      else
      {
        return $this->redirect('oycregval/edit?id='.$this->ocperval->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('codcon','ocregcon','codcon',$this->getRequestParameter('ocperval[codcon]'));
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $this->tags=Herramientas::autocompleteAjax('codtipval','Octipval','codtipval',$this->getRequestParameter('ocperval[codtipval]'));
    }
    else if ($this->getRequestParameter('ajax')=='3')
    {
      $this->tags=Herramientas::autocompleteAjax('codemp','Nphojint','codemp',$this->getRequestParameter('ocperval[cedfir]'));
    }
    else if ($this->getRequestParameter('ajax')=='4')
    {
      $this->tags=Herramientas::autocompleteAjax('codemp','Nphojint','codemp',$this->getRequestParameter('ocperval[cedfis]'));
    }

  }

  protected function saveOcperval($ocperval)
  {
    $ocperval->save();
    $c= new Criteria();
    $c->add(OcregvalPeer::CODCON,$ocperval->getCodcon());
    $c->add(OcregvalPeer::CODTIPVAL,$ocperval->getCodtipval());
    $c->add(OcregvalPeer::NUMVAL,$ocperval->getNumval());
    $resultado= OcregvalPeer::doSelectOne($c);
    if (!$resultado)
    {
       $ocregval= new Ocregval();
       $ocregval->setCodcon($ocperval->getCodcon());
       $ocregval->setCodtipval($ocperval->getCodtipval());
       $ocregval->setNumval($ocperval->getNumval());
       $ocregval->setMonval($ocperval->getMonval());
       $ocregval->setObsval($ocperval->getObsval());
       $ocregval->setFecreg($ocperval->getFecreg());
       $ocregval->setSalliq(0);
       $ocregval->setRetacu(0);
       $ocregval->setStaval('E');
       $ocregval->setAumobr(0);
       $ocregval->setDisobr(0);
       $ocregval->setObrext(0);
       $ocregval->setMonper(0);
       $ocregval->setTotded(0);
       $ocregval->save();

    }

  }

  public function executeDelete()
  {
    $this->ocperval = OcpervalPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocperval);

    try
    {
      $this->deleteOcperval($this->ocperval);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Ocperval. Make sure it does not have any associated items.');
      return $this->forward('oycregval', 'list');
    }

    return $this->redirect('oycregval/list');
  }

  protected function updateOcpervalFromRequest()
  {
    $ocperval = $this->getRequestParameter('ocperval');
    $this->configGrid($ocperval['codcon']);

    if (isset($ocperval['codcon']))
    {
      $this->ocperval->setCodcon($ocperval['codcon']);
    }
    if (isset($ocperval['descon']))
    {
      $this->ocperval->setDescon($ocperval['descon']);
    }
    if (isset($ocperval['codobr']))
    {
      $this->ocperval->setCodobr($ocperval['codobr']);
    }
    if (isset($ocperval['desobr']))
    {
      $this->ocperval->setDesobr($ocperval['desobr']);
    }
    if (isset($ocperval['codpro']))
    {
      $this->ocperval->setCodpro($ocperval['codpro']);
    }
    if (isset($ocperval['nompro']))
    {
      $this->ocperval->setNompro($ocperval['nompro']);
    }
    if (isset($ocperval['moncon']))
    {
      $this->ocperval->setMoncon($ocperval['moncon']);
    }
    if (isset($ocperval['codtipval']))
    {
      $this->ocperval->setCodtipval($ocperval['codtipval']);
    }
    if (isset($ocperval['destipval']))
    {
      $this->ocperval->setDestipval($ocperval['destipval']);
    }
    if (isset($ocperval['numval']))
    {
      $this->ocperval->setNumval($ocperval['numval']);
    }
    if (isset($ocperval['fecreg']))
    {
      $this->ocperval->setFecreg($ocperval['fecreg']);
    }
    if (isset($ocperval['monval']))
    {
      $this->ocperval->setMonval($ocperval['monval']);
    }
    if (isset($ocperval['obsval']))
    {
      $this->ocperval->setObsval($ocperval['obsval']);
    }
    if (isset($ocperval['cedins']))
    {
      $this->ocperval->setCedins($ocperval['cedins']);
    }
    if (isset($ocperval['nomins']))
    {
      $this->ocperval->setNomins($ocperval['nomins']);
    }
    if (isset($ocperval['cedtec']))
    {
      $this->ocperval->setCedtec($ocperval['cedtec']);
    }
    if (isset($ocperval['nomtec']))
    {
      $this->ocperval->setNomtec($ocperval['nomtec']);
    }
    if (isset($ocperval['cedfis']))
    {
      $this->ocperval->setCedfis($ocperval['cedfis']);
    }
    if (isset($ocperval['nomdir']))
    {
      $this->ocperval->setNomdir($ocperval['nomdir']);
    }
    if (isset($ocperval['cedres']))
    {
      $this->ocperval->setCedres($ocperval['cedres']);
    }
    if (isset($ocperval['nomper']))
    {
      $this->ocperval->setNomper($ocperval['nomper']);
    }
    if (isset($ocperval['cedtop']))
    {
      $this->ocperval->setCedtop($ocperval['cedtop']);
    }
    if (isset($ocperval['nomtop']))
    {
      $this->ocperval->setNomtop($ocperval['nomtop']);
    }
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(OcregconPeer::CODCON,$codigo);
        $c->add(OcregconPeer::STACON,'N',Criteria::NOT_EQUAL);
        $data=OcregconPeer::doSelectOne($c);
        if ($data)
        {
          $dato=$data->getDescon();
          $dato1=$data->getCodobr();
          $dato9=number_format($data->getMoncon(),2,',','.');
          $dato2=Herramientas::getX('CODOBR','Ocregobr','Desobr',$dato1);
          $dato3=$data->getCodpro();
          $dato4=Herramientas::getX('CODPRO','Caprovee','Nompro',$dato3);
          $dato5=Herramientas::getX('CODPRO','Caprovee','Rifrepleg',$dato3);
          $dato6=Herramientas::getX('CODPRO','Caprovee','Nomrepleg',$dato3);
          $c= new Criteria();
          $c->add(OcproperPeer::CODPRO,$dato3);
          $c->addJoin(OcdefperPeer::CEDPER,OcproperPeer::CEDPER);
          $c->addJoin(OctipcarPeer::CODTIPCAR,OcdefempPeer::CODINGRES);
          $c->addJoin(OcdefempPeer::CODINGRES,OcdefperPeer::CODTIPCAR);
          $c->addJoin(OctipcarPeer::CODTIPCAR,OcdefperPeer::CODTIPCAR);
          $resul= OcdefperPeer::doSelectOne($c);
          if ($resul)
          {
          	$dato7=$resul->getCedper();
          	$dato8=$resul->getNomper();
          }else { $dato7=""; $dato8="";}
          $javascript="";
        }
        else { $dato=""; $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5=""; $dato6=""; $dato7=""; $dato8=""; $dato9="";
        	$javascript="alert('El Número de Contrato no existe'); $('".$cajtexcom."').value";}
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocperval_codobr","'.$dato1.'",""],["ocperval_desobr","'.$dato2.'",""],["ocperval_moncon","'.$dato9.'",""],["ocperval_codpro","'.$dato3.'",""],["ocperval_nompro","'.$dato4.'",""],["ocperval_cedtop","'.$dato5.'",""],["ocperval_nomtop","'.$dato6.'",""],["ocperval_cedres","'.$dato7.'",""],["ocperval_nomper","'.$dato8.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(OctipvalPeer::CODTIPVAL,$codigo);
        $reg= OctipvalPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDestipval();
          $correl=Obras::Correlativo($this->getRequestParameter('codcon'),$codigo);
          $javascript="";
        }else
        {
         $javascript="alert('El Tipo de Valuación no Existe'); $('$cajtexcom').avlue='';";
         $correl=""; $dato="";
        }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocperval_numval","'.$correl.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '3':
        $c= new Criteria();
        $c->add(OcinginsobrPeer::CODOBR,$this->getRequestParameter('obra'));
        $reg= OcinginsobrPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getNomins();
          $javascript="";
        }else
        {
        	$dato="";
        	$javascript="alert('El Ingeniero Inspector No esta asociado a esa Obra');  $('$cajtexcom').value='';";
        }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '4':
        $c= new Criteria();
        $c->add(NphojintPeer::CEDEMP,$codigo);
        $reg=NphojintPeer::doSelectOne($c);
        if (!$reg)
        {
       	 $javascript="alert('Este Empleado no se Encuentra Registrado'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";
        }else { $javascript=""; $dato=$reg->getNomemp();}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


   public function configGrid($codcon='')
   {
       $c = new Criteria();
       $c->add(OcregvalPeer::CODCON,$codcon);
       $reg = OcregvalPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Ocregval');
       $opciones->setAncho(800);
       $opciones->setAnchoGrid(800);
       $opciones->setFilas(0);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codtipval');
       $col1->setHTML('type="text" size="17" readonly="true"');

       $col2 = clone $col1;
       $col2->setTitulo('Tipo de Valuación');
       $col2->setNombreCampo('destipval');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = clone $col1;
       $col3->setTitulo('Número Valuación');
       $col3->setNombreCampo('numval');
       $col3->setHTML('type="text" size="10" readonly=true');

       $col4 = new Columna('Fecha');
       $col4->setTipo(Columna::FECHA);
       $col4->setHTML('readonly="true"');
       $col4->setVacia(true);
       $col4->setNombreCampo('fecreg');

       $col5 = new Columna('Observaciones');
       $col5->setTipo(Columna::TEXTO);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('obsval');
       $col5->setHTML('type="text" size="30" readonly="true"');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);

       $this->obj = $opciones->getConfig($reg);
  }
}
