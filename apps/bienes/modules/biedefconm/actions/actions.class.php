<?php

/**
 * biedefconm actions.
 *
 * @package    siga
 * @subpackage biedefconm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconmActions extends autobiedefconmActions
{

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        //Descripcion Codigo Nivel
        // $dato=BndefconiPeer::getDescta($codigo);

        $dato=BndefactPeer::getDesact($codigo);


        //$output = '[["'.$cajtexmos.'","'.$dato.'",""], ["bndefcon_desmue","'.$dato1.'",""]]';
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '2':

      $dato=ContabbPeer::getDescta($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        break;

      case '3':
         $codcta=$this->getRequestParameter('codigo2','');

         $dato=BnregmuePeer::getDesmue($codcta,$codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;

       default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODACT','Bndefact','codact',trim($this->getRequestParameter('bndefcon[codact]')));
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('codigo')),array('cargab'),array('C'));
      }else
    if ($this->getRequestParameter('ajax')=='3')
      {
       //$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnsegmue[cobsegmue]')));
      }
  }

 public function setVars()
  {
    $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
    $lengthmask = strlen($this->mascaracontabilidad);
    $this->getUser()->setAttribute('lengthmask',$lengthmask);
  }


  public function executeEdit()
  {
    $this->bndefcon = $this->getBndefconOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndefconFromRequest();

      $this->saveBndefcon($this->bndefcon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedefconm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedefconm/list');
      }
      else
      {
        return $this->redirect('biedefconm/edit?id='.$this->bndefcon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateBndefconFromRequest()
  {
    $bndefcon = $this->getRequestParameter('bndefcon');
    $this->setVars();

    if (isset($bndefcon['codact']))
    {
      $this->bndefcon->setCodact(trim($bndefcon['codact']));
    }
    if (isset($bndefcon['codmue']))
    {
      $this->bndefcon->setCodmue(trim($bndefcon['codmue']));
    }
    if (isset($bndefcon['desmue']))
    {
      $this->bndefcon->setDesmue(trim($bndefcon['desmue']));
    }
    if (isset($bndefcon['ctadepcar']))
    {
      $this->bndefcon->setCtadepcar(trim($bndefcon['ctadepcar']));
    }
    if (isset($bndefcon['descta']))
    {
      $this->bndefcon->setDescta(trim($bndefcon['descta']));
    }
    if (isset($bndefcon['ctadepabo']))
    {
      $this->bndefcon->setCtadepabo(trim($bndefcon['ctadepabo']));
    }
    if (isset($bndefcon['desctaabo']))
    {
      $this->bndefcon->setDesctaabo(trim($bndefcon['desctaabo']));
    }
    if (isset($bndefcon['ctaajucar']))
    {
      $this->bndefcon->setCtaajucar(trim($bndefcon['ctaajucar']));
    }
    if (isset($bndefcon['desctaajucar']))
    {
      $this->bndefcon->setDesctaajucar(trim($bndefcon['desctaajucar']));
    }
    if (isset($bndefcon['ctaajuabo']))
    {
      $this->bndefcon->setCtaajuabo(trim($bndefcon['ctaajuabo']));
    }
    if (isset($bndefcon['desctaajuabo']))
    {
      $this->bndefcon->setDesctaajuabo(trim($bndefcon['desctaajuabo']));
    }
    if (isset($bndefcon['ctarevcar']))
    {
      $this->bndefcon->setCtarevcar(trim($bndefcon['ctarevcar']));
    }
    if (isset($bndefcon['desctarevcar']))
    {
      $this->bndefcon->setDesctarevcar(trim($bndefcon['desctarevcar']));
    }
    if (isset($bndefcon['ctarevabo']))
    {
      $this->bndefcon->setCtarevabo(trim($bndefcon['ctarevabo']));
    }
    if (isset($bndefcon['desctarevabo']))
    {
      $this->bndefcon->setDesctarevabo(trim($bndefcon['desctarevabo']));
    }
    if (isset($bndefcon['ctapercar']))
    {
      $this->bndefcon->setCtapercar(trim($bndefcon['ctapercar']));
    }
    if (isset($bndefcon['desctapercar']))
    {
      $this->bndefcon->setDesctapercar(trim($bndefcon['desctapercar']));
    }
    if (isset($bndefcon['ctaperabo']))
    {
      $this->bndefcon->setCtaperabo(trim($bndefcon['ctaperabo']));
    }
    if (isset($bndefcon['desctaperabo']))
    {
      $this->bndefcon->setDesctaperabo(trim($bndefcon['desctaperabo']));
    }
    if (!isset($bndefcon['stacta']))
    {
      $this->bndefcon->setStacta('A');
    }
  }

    public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
       $this->bndefcon = $this->getBndefconOrCreate();
       $this->updateBndefconFromRequest();

      Muebles::validarBndefcon($this->bndefcon,&$msj);
      $this->coderror=$msj;
      if ($this->coderror<>-1)
      {
        return false;
      }else return true;
    }else return true;
  }


  public function handleErrorEdit()
  {
  	$this->preExecute();
    $this->bndefcon = $this->getBndefconOrCreate();
    $this->updateBndefconFromRequest();
    $this->setVars();

     $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('bndefcon{codmue}',$err);
      }
    }
    return sfView::SUCCESS;

  }

}
