<?php

/**
 * facliente actions.
 *
 * @package    Roraima
 * @subpackage facliente
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faclienteActions extends autofaclienteActions
{

    // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;



    
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {
    $resp=-1;
    $resp4=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
     $this->facliente = $this->getFaclienteOrCreate();
         $facliente = $this->getRequestParameter('facliente');
         $valor = $facliente['codpro'];
         $campo='codpro';
       $valor1 = $facliente['rifpro'];
         $campo1='rifpro';
       $valor2 = $facliente['codcta'];
         $campo2='codcta';

       /**********VALIDACION DE FECHA****************/
       $fecreg =   $facliente['fecreg'];
       $fecven =   $facliente['fecven'];

       if ($fecreg!='' && $fecven!='')
       {
        /*$fecha1 = split("/",$fecreg);
        $fecha2 = split("/",$fecven);

        $fecreg = $fecha1[1]."/".$fecha1[0]."/".$fecha1[2];
        $fecven = $fecha2[1]."/".$fecha2[0]."/".$fecha2[2];*/

      //$rfecreg = strtotime($fecreg);
      //$rfecven = strtotime($fecven);

      $rfecreg = adodb_strtotime($fecreg);
      $rfecven = adodb_strtotime($fecven);

      if (!(($rfecreg === -1 || $rfecreg===false) || ($rfecven === -1 || $rfecven===false)))
      {
          if ($rfecreg > $rfecven)
          {
            $resp4=131;
          }else
          {
            $resp4=-1;
          }
      }else
      {
          $resp4=130;
      }
      }

       /**********FIN****************/


       $resp=Herramientas::ValidarCodigo($valor,$this->facliente,$campo);
       $resp1=Herramientas::ValidarCodigo($valor1,$this->facliente,$campo1);
       //$resp2=Herramientas::ValidarCodigo($valor2,$this->facliente,$campo2);

     if($resp!=-1){
        $this->coderror = $resp;
        return false;
      }
    else if($resp1!=-1){
        $this->coderror = $resp1;
        return false;
      }
//    else if($resp2!=-1){
//        $this->coderror = $resp2;
//        return false;
//      }
   else if($resp4!=-1){
        $this->coderror = $resp4;
        return false;
      }
       else return true;

    }else return true;

    }

    /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
      {
         if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
      }else
      {
        $this->ent='';
      }

         $this->preExecute();
         $this->labels = $this->getLabels();
         $this->facliente = $this->getFaclienteOrCreate();

         try{
         $this->updateFaclienteFromRequest();
         }
         catch(Exception $ex){}

         $this->encontrado=false;

         if ($this->facliente->getId()!= "")
         {
          $this->c = new Criteria();
          $this->c->add(CarecaudPeer::CODTIPREC,$this->facliente->getCodtiprec());

          $c = new Criteria();
          $c->add(Contabc1Peer::CODCTA, $this->facliente->getCodcta());
          $rs=Contabc1Peer::doSelectOne($c);
          if ($rs)
          {
            $this->encontrado=true;
          }
          else
          {
            $this->encontrado=false;
          }
         }
         else
         {
           //esto se hizo asi, porque es un engaño para que cuando se registre un nuevo proveedor, la lista de recaudos salga en blanco
           //POR FAVOR NO MODIFICAR ESTAS LINEAS, GRACIAS.....
           $this->c = new Criteria();
           $this->c->add(CarecaudPeer::CODTIPREC,$this->getRequestParameter('facliente[codtiprec]'));
          }

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
          if($this->coderror!=-1 && $this->coderror!=""){
          $err = Herramientas::obtenerMensajeError($this->coderror);
          $this->getRequest()->setError('',$err);
          }
      }
      return sfView::SUCCESS;
     }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    if(SF_ENVIRONMENT=='dev'){
      $this->ent='_dev';
    }else
    {
      $this->ent='';
    }

    $this->setVars();
    $this->facliente = $this->getFaclienteOrCreate();
    $this->encontrado=false;


  if ($this->facliente->getId()!= "")
  {
    $this->c = new Criteria();
    $this->c->add(CarecaudPeer::CODTIPREC,$this->facliente->getCodtiprec());

    $c = new Criteria();
      $c->add(Contabc1Peer::CODCTA, $this->facliente->getCodcta());
    $rs=Contabc1Peer::doSelectOne($c);
    if ($rs)
  {
    $this->encontrado=true;
  }
  else
  {
    $this->encontrado=false;
  }
  }else
  {
     //esto se hizo asi, porque es un engaño para que cuando se registre un nuevo proveedor, la lista de recaudos salga en blanco
     //POR FAVOR NO MODIFICAR ESTAS LINEAS, GRACIAS.....
     $this->c = new Criteria();
     $this->c->add(CarecaudPeer::CODTIPREC,'wsgf34t');
  }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFaclienteFromRequest();


      $this->saveFacliente($this->facliente);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facliente/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facliente/list');
      }
      else
      {
        return $this->redirect('facliente/edit?id='.$this->facliente->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFaclienteFromRequest()
  {
    $facliente = $this->getRequestParameter('facliente');
    $this->setVars();
     $this->encontrado=false;

    if (isset($facliente['codpro']))
    {
      $this->facliente->setCodpro($facliente['codpro']);
    }
    if (isset($facliente['nompro']))
    {
      $this->facliente->setNompro($facliente['nompro']);
    }
    if (isset($facliente['rifpro']))
    {
      $this->facliente->setRifpro($facliente['rifpro']);
    }
    if (isset($facliente['nitpro']))
    {
      $this->facliente->setNitpro($facliente['nitpro']);
    }
    if (isset($facliente['dirpro']))
    {
      $this->facliente->setDirpro($facliente['dirpro']);
    }
    if (isset($facliente['telpro']))
    {
      $this->facliente->setTelpro($facliente['telpro']);
    }
    if (isset($facliente['nrocei']))
    {
      $this->facliente->setNrocei($facliente['nrocei']);
    }
    if (isset($facliente['email']))
    {
      $this->facliente->setEmail($facliente['email']);
    }
    if (isset($facliente['pagweb']))
    {
      $this->facliente->setPagweb($facliente['pagweb']);
    }
    if (isset($facliente['codram']))
    {
      $this->facliente->setCodram($facliente['codram']);
    }
    if (isset($facliente['limcre']))
    {
      $this->facliente->setLimcre($facliente['limcre']);
    }
    if (isset($facliente['codcta']))
    {
      $this->facliente->setCodcta($facliente['codcta']);
    }
    if (isset($facliente['descta']))
    {
      $this->facliente->setDescta($facliente['descta']);
    }
    if (isset($facliente['codord']))
    {
      $this->facliente->setCodord($facliente['codord']);
    }
    if (isset($facliente['desctacodord']))
    {
      $this->facliente->setDesctacodord($facliente['desctacodord']);
    }
    if (isset($facliente['codpercon']))
    {
      $this->facliente->setCodpercon($facliente['codpercon']);
    }
    if (isset($facliente['desctacodpercon']))
    {
      $this->facliente->setDesctacodpercon($facliente['desctacodpercon']);
    }
    if (isset($facliente['fecinscir']))
    {
      if ($facliente['fecinscir'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($facliente['fecinscir']))
          {
            $value = $dateFormat->format($facliente['fecinscir'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $facliente['fecinscir'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->facliente->setFecinscir($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->facliente->setFecinscir(null);
      }
    }
    if (isset($facliente['faxpro']))
    {
      $this->facliente->setFaxpro($facliente['faxpro']);
    }
    if (isset($facliente['numinscir']))
    {
      $this->facliente->setNuminscir($facliente['numinscir']);
    }
    if (isset($facliente['regmer']))
    {
      $this->facliente->setRegmer($facliente['regmer']);
    }
    if (isset($facliente['tomreg']))
    {
      $this->facliente->setTomreg($facliente['tomreg']);
    }
    if (isset($facliente['capsus']))
    {
      $this->facliente->setCapsus($facliente['capsus']);
    }
    if (isset($facliente['fecreg']))
    {
      if ($facliente['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($facliente['fecreg']))
          {
            $value = $dateFormat->format($facliente['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $facliente['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->facliente->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->facliente->setFecreg(null);
      }
    }
    if (isset($facliente['folreg']))
    {
      $this->facliente->setFolreg($facliente['folreg']);
    }
    if (isset($facliente['cappag']))
    {
      $this->facliente->setCappag($facliente['cappag']);
    }
    if (isset($facliente['fecven']))
    {
      if ($facliente['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($facliente['fecven']))
          {
            $value = $dateFormat->format($facliente['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $facliente['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->facliente->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->facliente->setFecven(null);
      }
    }
   if (isset($facliente['rifpercon']))
    {
      $this->facliente->setRifpercon($facliente['rifpercon']);
    }
   if (isset($facliente['nompercon']))
    {
      $this->facliente->setNompercon($facliente['nompercon']);
    }
   if (isset($facliente['dirpercon']))
    {
      $this->facliente->setDirpercon($facliente['dirpercon']);
    }
   if (isset($facliente['telpercon']))
    {
      $this->facliente->setTelpercon($facliente['telpercon']);
    }
   if (isset($facliente['corpercon']))
    {
      $this->facliente->setCorpercon($facliente['corpercon']);
    }
    if (isset($facliente['rifrepleg']))
    {
      $this->facliente->setRifrepleg($facliente['rifrepleg']);
    }
    if (isset($facliente['nomrepleg']))
    {
      $this->facliente->setNomrepleg($facliente['nomrepleg']);
    }
    if (isset($facliente['dirrepleg']))
    {
      $this->facliente->setDirrepleg($facliente['dirrepleg']);
    }
    if (isset($facliente['telrepleg']))
    {
      $this->facliente->setTelrepleg($facliente['telrepleg']);
    }
    if (isset($facliente['correpleg']))
    {
      $this->facliente->setCorrepleg($facliente['correpleg']);
    }
    if (isset($facliente['codtiprec']))
    {
      $this->facliente->setCodtiprec($facliente['codtiprec']);
    }
    if (isset($facliente['destiprec']))
    {
      $this->facliente->setDestiprec($facliente['destiprec']);
    }
    if (isset($facliente['nacpro']))
    {
      $this->facliente->setNacpro($facliente['nacpro']);
    }
    if (isset($facliente['tipo']))
    {
      $this->facliente->setTipo($facliente['tipo']);
    }
    if (isset($facliente['codctasec']))
    {
      $this->facliente->setCodctasec($facliente['codctasec']);
    }
    if (isset($facliente['codordadi']))
    {
      $this->facliente->setCodordadi($facliente['codordadi']);
    }
    if (isset($facliente['codperconadi']))
    {
      $this->facliente->setCodperconadi($facliente['codperconadi']);
    }
    if (isset($facliente['codordmercon']))
    {
      $this->facliente->setCodordmercon($facliente['codordmercon']);
    }
    if (isset($facliente['codpermercon']))
    {
      $this->facliente->setCodpermercon($facliente['codpermercon']);
    }
    if (isset($facliente['codordcontra']))
    {
      $this->facliente->setCodordcontra($facliente['codordcontra']);
    }
    if (isset($facliente['codpercontra']))
    {
      $this->facliente->setCodpercontra($facliente['codpercontra']);
    }

      $this->facliente->setRecargo($this->getRequestParameter('associated_recargo'));

   if (isset($facliente['codtipemp']))
    {
      $this->facliente->setCodtipemp($facliente['codtipemp']);
    }
   if (isset($facliente['fatipcte_id']))
    {
      $this->facliente->setFatipcteId($facliente['fatipcte_id']);
    }
   if (isset($facliente['tipper']))
    {
      $this->facliente->setTipper($facliente['tipper']);
    }
    $this->facliente->setEscontrib(isset($facliente['escontrib']) ? $facliente['escontrib'] : 0);
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function savefacliente($facliente)
  {
    Cliente::salvarFacliente($facliente);
  }

/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            //,["'.$cajtexcom.'","20","c"]
      }
     else  if ($this->getRequestParameter('ajax')=='3')
      {
        $dato=CadefubiPeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
     else  if ($this->getRequestParameter('ajax')=='4')
      {
        $dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
     else  if ($this->getRequestParameter('ajax')=='5')
      {
        $codigo=$this->getRequestParameter('codigo');
        $aux=FaclientePeer::getCodpro($codigo);
        $dato=$aux;
        $output = '[["codproaux","'.$dato.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
        $codigo=$this->getRequestParameter('codigo');
        $aux=FaclientePeer::getRifpro($codigo);
        $dato=$aux;
        $output = '[["rifproaux","'.$dato.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='7')
      {
        $dato=CatipempsncPeer::getDestip($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('RAMART','Caramart','Ramart',trim($this->getRequestParameter('facliente[codram]')));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('facliente[codcta]')));
      }
    else if ($this->getRequestParameter('ajax')=='4')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIPREC','Catiprec','codtiprec',trim($this->getRequestParameter('facliente[codtiprec]')));
      }
     else if ($this->getRequestParameter('ajax')=='5')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIP','Catipempsnc','codtip',$this->getRequestParameter('facliente[codtipemp]'));
      }
  }

  public function executeDoble()
  {

  ///////////////
  $this->facliente = $this->getFaclienteOrCreate();
  $this->cod = $this->getRequestParameter('codigo');
  if ($this->cod=='')
  {
    $this->c=null;
  }else
  {
    $this->c = new Criteria();
      $this->c->add(CarecaudPeer::CODTIPREC,$this->cod);

  }

  $this->labels= $this->getLabels();

  $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
  if ($this->getRequestParameter('ajax')=='4')
      {
        $dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        //return sfView::HEADER_ONLY;

  }

  public function setVars()
  {
      $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
      $this->loncta=strlen($this->mascara);
      $this->c=null;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->facliente = FaclientePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->facliente);

	$c = new Criteria();
	$c->add(FafacturPeer::CODCLI,$this->facliente->getCodpro());
	$fafactur = FafacturPeer::doSelectOne($c);

	$c = new Criteria();
	$c->add(FapedidoPeer::CODCLI,$this->facliente->getCodpro());
	$fapedido = FapedidoPeer::doSelectOne($c);

	$c = new Criteria();
	$c->add(FapresupPeer::CODCLI,$this->facliente->getCodpro());
	$fapresup = FapresupPeer::doSelectOne($c);
	if((!$fafactur)&&(!$fapedido)&&(!$fapresup)){
      try
      {
        //$this->deleteFacliente($this->facliente);
        Cliente::eliminarFacliente($this->facliente);
        $this->Bitacora('Elimino');
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('delete', 'Could not delete the selected Facliente. Make sure it does not have any associated items.');
        return $this->forward('facliente', 'list');
      }

      return $this->redirect('facliente/list');
	}else{
      $this->getRequest()->setError('delete', 'Could not delete the selected Facliente. Make sure it does not have any associated items.');
      return $this->forward('facliente', 'list');
	}



  }

    public function Bitacora($acc)
  {
    $id= $this->facliente->getId();
    $this->SalvarBitacora($id ,$acc);
}

}
