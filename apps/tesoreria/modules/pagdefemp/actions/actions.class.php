<?php

/**
 * pagdefemp actions.
 *
 * @package    siga
 * @subpackage pagdefemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagdefempActions extends autopagdefempActions
{

  public function executeIndex()
  {
  	$c= new Criteria();
  	$c->add(OpdefempPeer::CODEMP,'001');
  	$resul= OpdefempPeer::doSelectOne($c);
  	if ($resul)
  	{
  	 $id=$resul->getId();
  	 return $this->redirect('pagdefemp/edit?id='.$id);
  	}
  	else
  	{
  	  return $this->redirect('pagdefemp/edit');
  	}
  }


  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
   $cajtexcom=$this->getRequestParameter('cajtexcom');
   if ($this->getRequestParameter('ajax')=='1')
   {
     $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   else  if ($this->getRequestParameter('ajax')=='2')
   {
     $dato=TstipmovPeer::getDestip($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   else  if ($this->getRequestParameter('ajax')=='3')
   {
    $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   else  if ($this->getRequestParameter('ajax')=='4')
   {
    $dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   else  if ($this->getRequestParameter('ajax')=='5')
   {
    $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   else  if ($this->getRequestParameter('ajax')=='6')
   {
    $dato=OpbenefiPeer::getCedula($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   else  if ($this->getRequestParameter('ajax')=='7')
   {
    $dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
   }
   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   return sfView::HEADER_ONLY;
  }

  public function executeEdit()
  {
    $this->opdefemp = $this->getOpdefempOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpdefempFromRequest();

      $this->saveOpdefemp($this->opdefemp);

       $this->opdefemp->setId(Herramientas::getX_vacio('codemp','opdefemp','id',$this->opdefemp->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagdefemp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagdefemp/list');
      }
      else
      {
        return $this->redirect('pagdefemp/edit?id='.$this->opdefemp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }

  }

  protected function updateOpdefempFromRequest()
  {
    $opdefemp = $this->getRequestParameter('opdefemp');
    $this->setVars();

    if (isset($opdefemp['codemp']))
    {
      $this->opdefemp->setCodemp($opdefemp['codemp']);
    }
    if (isset($opdefemp['nomemp']))
    {
      $this->opdefemp->setNomemp($opdefemp['nomemp']);
    }
    if (isset($opdefemp['diremp']))
    {
      $this->opdefemp->setDiremp($opdefemp['diremp']);
    }
    if (isset($opdefemp['ctapag']))
    {
      $this->opdefemp->setCtapag($opdefemp['ctapag']);
    }
    if (isset($opdefemp['nomctapag']))
    {
      $this->opdefemp->setNomctapag($opdefemp['nomctapag']);
    }
    if (isset($opdefemp['ctades']))
    {
      $this->opdefemp->setCtades($opdefemp['ctades']);
    }
    if (isset($opdefemp['nomctades']))
    {
      $this->opdefemp->setNomctades($opdefemp['nomctades']);
    }
    if (isset($opdefemp['numini']))
    {
      $this->opdefemp->setNumini($opdefemp['numini']);
    }
    if (isset($opdefemp['forubi']))
    {
      $this->opdefemp->setForubi($opdefemp['forubi']);
    }
    if (isset($opdefemp['ordnom']))
    {
      $this->opdefemp->setOrdnom($opdefemp['ordnom']);
    }
    if (isset($opdefemp['ordobr']))
    {
      $this->opdefemp->setOrdobr($opdefemp['ordobr']);
    }
    if (isset($opdefemp['tipeje']))
    {
      $this->opdefemp->setTipeje($opdefemp['tipeje']);
    }
    if (isset($opdefemp['ordliq']))
    {
      $this->opdefemp->setOrdliq($opdefemp['ordliq']);
    }
    if (isset($opdefemp['ordfid']))
    {
      $this->opdefemp->setOrdfid($opdefemp['ordfid']);
    }
    if (isset($opdefemp['unitri']))
    {
      $this->opdefemp->setUnitri($opdefemp['unitri']);
    }
    if (isset($opdefemp['genctaord']))
    {
      $this->opdefemp->setGenctaord($opdefemp['genctaord']);
    }
    if (isset($opdefemp['gencomadi']))
    {
      $this->opdefemp->setGencomadi($opdefemp['gencomadi']);
    }
    if (isset($opdefemp['gencaubon']))
    {
      $this->opdefemp->setGencaubon($opdefemp['gencaubon']);
    }
    if (isset($opdefemp['vercomret']))
    {
      $this->opdefemp->setVercomret($opdefemp['vercomret']);
    }
    if (isset($opdefemp['genordret']))
    {
      $this->opdefemp->setGenordret($opdefemp['genordret']);
    }
    if (isset($opdefemp['emichepag']))
    {
      $this->opdefemp->setEmichepag($opdefemp['emichepag']);
    }
    if (isset($opdefemp['cuecajchi']))
    {
      $this->opdefemp->setCuecajchi($opdefemp['cuecajchi']);
    }
    if (isset($opdefemp['nomcuecajchi']))
    {
      $this->opdefemp->setNomcuecajchi($opdefemp['nomcuecajchi']);
    }
    if (isset($opdefemp['tipcajchi']))
    {
      $this->opdefemp->setTipcajchi($opdefemp['tipcajchi']);
    }
    if (isset($opdefemp['nomtipcajchi']))
    {
      $this->opdefemp->setNomtipcajchi($opdefemp['nomtipcajchi']);
    }
    if (isset($opdefemp['monapecajchi']))
    {
      $this->opdefemp->setMonapecajchi($opdefemp['monapecajchi']);
    }
    if (isset($opdefemp['porrepcajchi']))
    {
      $this->opdefemp->setPorrepcajchi($opdefemp['porrepcajchi']);
    }
    if (isset($opdefemp['tiprencajchi']))
    {
      $this->opdefemp->setTiprencajchi($opdefemp['tiprencajchi']);
    }
    if ($this->getUser()->hasCredential('M'))
    {
    if (isset($opdefemp['nomtiprencajchi']))
    {
      $this->opdefemp->setNomtiprencajchi($opdefemp['nomtiprencajchi']);
    }
      }
    if (isset($opdefemp['numinicajchi']))
    {
      $this->opdefemp->setNuminicajchi($opdefemp['numinicajchi']);
    }
    if (isset($opdefemp['cedrifcajchi']))
    {
      $this->opdefemp->setCedrifcajchi($opdefemp['cedrifcajchi']);
    }
    if (isset($opdefemp['nomben']))
    {
      $this->opdefemp->setNomben($opdefemp['nomben']);
    }
    if (isset($opdefemp['codcatcajchi']))
    {
      $this->opdefemp->setCodcatcajchi($opdefemp['codcatcajchi']);
    }
    if (isset($opdefemp['nomcat']))
    {
      $this->opdefemp->setNomcat($opdefemp['nomcat']);
    }
  }

  protected function saveOpdefemp($opdefemp)
  {
    $opdefemp->setCodemp('001');
    if ($opdefemp->getGenctaord()=='1')
    { $opdefemp->setGenctaord('S');}
    else {$opdefemp->setGenctaord(null);}
    if ($opdefemp->getGencomadi()=='1')
    { $opdefemp->setGencomadi('S');}
    else {$opdefemp->setGencomadi(null);}
    if ($opdefemp->getVercomret()=='1')
    { $opdefemp->setVercomret('S');}
    else {$opdefemp->setVercomret(null);}
    if ($opdefemp->getGencaubon()=='1')
    { $opdefemp->setGencaubon('S');}
    else {$opdefemp->setGencaubon(null);}
    if ($opdefemp->getGenordret()=='1')
    { $opdefemp->setGenordret('S');}
    else {$opdefemp->setGenordret(null);}
    if ($opdefemp->getEmichepag()=='1')
    { $opdefemp->setEmichepag('S');}
    else {$opdefemp->setEmichepag(null);}
    $opdefemp->save();

  }


  public function setVars()
  {
    $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->lonconta=strlen($this->mascaracontabilidad);
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    $this->loncat=strlen($this->mascaracategoria);
    $c = new Criteria();
    $dato=BnubicaPeer::doselect($c);
    if ($dato)
    { $this->esta='1';}
    else { $this->esta='0';}
  }


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->opdefemp = $this->getOpdefempOrCreate();
    $this->updateOpdefempFromRequest();
     $this->setVars();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $this->tags=Herramientas::autocompleteAjax('TIPCAU','Cpdoccau','Tipcau',$this->getRequestParameter('opdefemp[ordnom]'));
  }
  else  if ($this->getRequestParameter('ajax')=='2')
  {
    $this->tags=Herramientas::autocompleteAjax('TIPCAU','Cpdoccau','Tipcau',$this->getRequestParameter('opdefemp[ordobr]'));
    }
    else  if ($this->getRequestParameter('ajax')=='3')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIP','Tstipmov','Codtip',$this->getRequestParameter('opdefemp[tipeje]'));
    }
    else  if ($this->getRequestParameter('ajax')=='4')
  {
    $this->tags=Herramientas::autocompleteAjax('TIPCAU','Cpdoccau','Tipcau',$this->getRequestParameter('opdefemp[ordliq]'));
    }

   else  if ($this->getRequestParameter('ajax')=='5')
  {
    $this->tags=Herramientas::autocompleteAjax('TIPCAU','Cpdoccau','Tipcau',$this->getRequestParameter('opdefemp[ordfid]'));
    }
    else  if ($this->getRequestParameter('ajax')=='6')
  {
    $this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',$this->getRequestParameter('opdefemp[cuecajchi]'));
    }
    else  if ($this->getRequestParameter('ajax')=='7')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIP','Tstipmov','Codtip',$this->getRequestParameter('opdefemp[tipcajchi]'));
    }
   else  if ($this->getRequestParameter('ajax')=='8')
  {
    $this->tags=Herramientas::autocompleteAjax('TIPCAU','Cpdoccau','Tipcau',$this->getRequestParameter('opdefemp[tiprencajchi]'));
    }
   else  if ($this->getRequestParameter('ajax')=='9')
  {
    $this->tags=Herramientas::autocompleteAjax('CEDRIF','Opbenefi','Cedrif',$this->getRequestParameter('opdefemp[cedrifcajchi]'));
    }
  }
}
