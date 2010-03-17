<?php

/**
 * almregpro actions.
 *
 * @package    Roraima
 * @subpackage almregpro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */


class almregproActions extends autoalmregproActions
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
    $resp2 = -1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
         $this->caprovee = $this->getCaproveeOrCreate();
         $caprovee = $this->getRequestParameter('caprovee');
         $valor = $caprovee['codpro'];
         $campo='codpro';
         $valor1 = $caprovee['rifpro'];
         $campo1='rifpro';
         $valor2 = $caprovee['codcta'];
         $campo2='codcta';

       /**********VALIDACION DE FECHA****************/
       $fecreg =   $caprovee['fecreg'];
       $fecven =   $caprovee['fecven'];

       if ($fecreg!='' && $fecven!='')
       {

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


       $resp=Herramientas::ValidarCodigo($valor,$this->caprovee,$campo);
       $resp1=Herramientas::ValidarCodigo($valor1,$this->caprovee,$campo1);
       $this->valcodcta="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('compras',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
		     if(array_key_exists('almregpro',$varemp['aplicacion']['compras']['modulos']))
		       if(array_key_exists('valcodcta',$varemp['aplicacion']['compras']['modulos']['almregpro']))
		       {
		       	$this->valcodcta=$varemp['aplicacion']['compras']['modulos']['almregpro']['valcodcta'];
		       }
		if ($this->valcodcta=='S')
		{
           if ($this->getRequestParameter('caprovee[codcta]')=='')
           {
           	$resp2=198;
           }else{
           	$t= new Criteria();
           	$t->add(ContabbPeer::CODCTA,$this->getRequestParameter('caprovee[codcta]'));
           	$data=ContabbPeer::doSelectOne($t);
           	if (!$data)
           	{
           		$resp2=199;
           	}
           }
		}
       //$resp2=Herramientas::ValidarCodigo($valor2,$this->caprovee,$campo2);

	   //$this->configGrid();
       //$grid = Herramientas::CargarDatosGridv2($this,$this->caprovee->getObjrecaudos());
       //$resp3 = Herramientas::ValidarGrid($grid);
       $resp3 = -1;


	   //$this->configGrid_Contacto();
       //$grid = Herramientas::CargarDatosGridv2($this,$this->caprovee->getObjcontactos());
       //$resp5 = Herramientas::ValidarGrid($grid);
       $resp5 = -1;

     if($resp!=-1){
        $this->coderror = $resp;
        return false;
      }
    else if($resp1!=-1){
        $this->coderror = $resp1;
        return false;
      }
    else if($resp3!=-1){
        $this->coderror = $resp3;
        return false;
      }
    else if($resp5!=-1){
        $this->coderror = $resp5;
        return false;
      }
    else if($resp2!=-1){
        $this->coderror = $resp2;
        return false;
      }
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
         $this->caprovee = $this->getCaproveeOrCreate();

         try{
         $this->updateCaproveeFromRequest();
         //$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	    //	$this->configGrid();
	  //  H::printR($this->objR);exit();
    $gridC = Herramientas::CargarDatosGrid($this,$this->objR);
//    	$this->configGrid($grid[0],$grid[1]);

         $this->configGrid();
         $this->configGrid_Contacto();
         $this->configGrid_Ramos();
         $this->configGrid_Retenciones();

         }
         catch(Exception $ex){}

         $this->encontrado=false;

         if ($this->caprovee->getId()!= "")
         {
	          $this->c = new Criteria();
	          $this->c->add(CarecaudPeer::CODTIPREC,$this->caprovee->getCodtiprec());

	          $c = new Criteria();
	          $c->add(Contabc1Peer::CODCTA, $this->caprovee->getCodcta());
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
           //SE ELIMINO AL AGREGAR LOS RECAUDOS EN UN GRID
           //$this->c = new Criteria();
           //$this->c->add(CarecaudPeer::CODTIPREC,$this->getRequestParameter('caprovee[codtiprec]'));
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
    $this->caprovee = $this->getCaproveeOrCreate();
    $this->encontrado=false;
    $this->configGrid();
    $this->configGrid_Contacto();
    $this->configGrid_Ramos();
    $this->configGrid_Retenciones();


  if ($this->caprovee->getId()!= "")
  {
    $this->c = new Criteria();
    $this->c->add(CarecaudPeer::CODTIPREC,$this->caprovee->getCodtiprec());

    $c = new Criteria();
      $c->add(Contabc1Peer::CODCTA, $this->caprovee->getCodcta());
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
      $this->updateCaproveeFromRequest();


      $this->saveCaprovee($this->caprovee);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almregpro/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almregpro/list');
      }
      else
      {
        return $this->redirect('almregpro/edit?id='.$this->caprovee->getId());
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
  protected function updateCaproveeFromRequest()
  {
    $caprovee = $this->getRequestParameter('caprovee');
    $this->setVars();
     $this->encontrado=false;

    if (isset($caprovee['codpro']))
    {
      $this->caprovee->setCodpro($caprovee['codpro']);
    }
    if (isset($caprovee['nompro']))
    {
      $this->caprovee->setNompro($caprovee['nompro']);
    }
    if (isset($caprovee['rifpro']))
    {
      $this->caprovee->setRifpro($caprovee['rifpro']);
    }
    if (isset($caprovee['nitpro']))
    {
      $this->caprovee->setNitpro($caprovee['nitpro']);
    }
    if (isset($caprovee['dirpro']))
    {
      $this->caprovee->setDirpro($caprovee['dirpro']);
    }
    if (isset($caprovee['telpro']))
    {
      $this->caprovee->setTelpro($caprovee['telpro']);
    }
    if (isset($caprovee['nrocei']))
    {
      $this->caprovee->setNrocei($caprovee['nrocei']);
    }
    if (isset($caprovee['email']))
    {
      $this->caprovee->setEmail($caprovee['email']);
    }
    if (isset($caprovee['codram']))
    {
      $this->caprovee->setCodram($caprovee['codram']);
    }
    if (isset($caprovee['limcre']))
    {
      $this->caprovee->setLimcre($caprovee['limcre']);
    }
    if (isset($caprovee['codcta']))
    {
      $this->caprovee->setCodcta($caprovee['codcta']);
    }
    if (isset($caprovee['descta']))
    {
      $this->caprovee->setDescta($caprovee['descta']);
    }
    if (isset($caprovee['ramgen']))
    {
      $this->caprovee->setRamgen($caprovee['ramgen']);
    }
    if (isset($caprovee['codord']))
    {
      $this->caprovee->setCodord($caprovee['codord']);
    }
    if (isset($caprovee['desctacodord']))
    {
      $this->caprovee->setDesctacodord($caprovee['desctacodord']);
    }
    if (isset($caprovee['codpercon']))
    {
      $this->caprovee->setCodpercon($caprovee['codpercon']);
    }
    if (isset($caprovee['desctacodpercon']))
    {
      $this->caprovee->setDesctacodpercon($caprovee['desctacodpercon']);
    }
    if (isset($caprovee['fecinscir']))
    {
      if ($caprovee['fecinscir'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caprovee['fecinscir']))
          {
            $value = $dateFormat->format($caprovee['fecinscir'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caprovee['fecinscir'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caprovee->setFecinscir($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caprovee->setFecinscir(null);
      }
    }
    if (isset($caprovee['faxpro']))
    {
      $this->caprovee->setFaxpro($caprovee['faxpro']);
    }
    if (isset($caprovee['numinscir']))
    {
      $this->caprovee->setNuminscir($caprovee['numinscir']);
    }
    if (isset($caprovee['regmer']))
    {
      $this->caprovee->setRegmer($caprovee['regmer']);
    }
    if (isset($caprovee['tomreg']))
    {
      $this->caprovee->setTomreg($caprovee['tomreg']);
    }
    if (isset($caprovee['capsus']))
    {
      $this->caprovee->setCapsus($caprovee['capsus']);
    }
    if (isset($caprovee['fecreg']))
    {
      if ($caprovee['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caprovee['fecreg']))
          {
            $value = $dateFormat->format($caprovee['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caprovee['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caprovee->setFecreg($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caprovee->setFecreg(null);
      }
    }
    if (isset($caprovee['folreg']))
    {
      $this->caprovee->setFolreg($caprovee['folreg']);
    }
    if (isset($caprovee['cappag']))
    {
      $this->caprovee->setCappag($caprovee['cappag']);
    }
    if (isset($caprovee['fecven']))
    {
      if ($caprovee['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caprovee['fecven']))
          {
            $value = $dateFormat->format($caprovee['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caprovee['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caprovee->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caprovee->setFecven(null);
      }
    }
    if (isset($caprovee['rifrepleg']))
    {
      $this->caprovee->setRifrepleg($caprovee['rifrepleg']);
    }
    if (isset($caprovee['nomrepleg']))
    {
      $this->caprovee->setNomrepleg($caprovee['nomrepleg']);
    }
    if (isset($caprovee['dirrepleg']))
    {
      $this->caprovee->setDirrepleg($caprovee['dirrepleg']);
    }
    if (isset($caprovee['codtiprec']))
    {
      $this->caprovee->setCodtiprec($caprovee['codtiprec']);
    }
    if (isset($caprovee['destiprec']))
    {
      $this->caprovee->setDestiprec($caprovee['destiprec']);
    }
    if (isset($caprovee['nacpro']))
    {
      $this->caprovee->setNacpro($caprovee['nacpro']);
    }
    if (isset($caprovee['tipo']))
    {
      $this->caprovee->setTipo($caprovee['tipo']);
    }
    if (isset($caprovee['codctasec']))
    {
      $this->caprovee->setCodctasec($caprovee['codctasec']);
    }
    if (isset($caprovee['codordadi']))
    {
      $this->caprovee->setCodordadi($caprovee['codordadi']);
    }
    if (isset($caprovee['codperconadi']))
    {
      $this->caprovee->setCodperconadi($caprovee['codperconadi']);
    }
    if (isset($caprovee['codordmercon']))
    {
      $this->caprovee->setCodordmercon($caprovee['codordmercon']);
    }
    if (isset($caprovee['codpermercon']))
    {
      $this->caprovee->setCodpermercon($caprovee['codpermercon']);
    }
    if (isset($caprovee['codordcontra']))
    {
      $this->caprovee->setCodordcontra($caprovee['codordcontra']);
    }
    if (isset($caprovee['codpercontra']))
    {
      $this->caprovee->setCodpercontra($caprovee['codpercontra']);
    }

      $this->caprovee->setRecargo($this->getRequestParameter('associated_recargo'));

   if (isset($caprovee['codtipemp']))
    {
      $this->caprovee->setCodtipemp($caprovee['codtipemp']);
    }

   if (isset($caprovee['telrepleg']))
    {
      $this->caprovee->setTelrepleg($caprovee['telrepleg']);
    }

   if (isset($caprovee['estpro']))
    {
      $this->caprovee->setEstpro($caprovee['estpro']);
    }

   if (isset($caprovee['codban']))
    {
      $this->caprovee->setCodban($caprovee['codban']);
    }

   if (isset($caprovee['numcue']))
    {
      $this->caprovee->setNumcue($caprovee['numcue']);
    }

   if (isset($caprovee['codtip']))
    {
      $this->caprovee->setCodtip($caprovee['codtip']);
    }

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
  protected function saveCaprovee($caprovee)
  {
   $this->manprocor="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregpro',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('manprocor',$varemp['aplicacion']['compras']['modulos']['almregpro']))
	       {
	       	$this->manprocor=$varemp['aplicacion']['compras']['modulos']['almregpro']['manprocor'];
	       }
               if(array_key_exists('mascararif',$varemp['aplicacion']['compras']['modulos']['almregpro']))
	       {
	       	$this->mascararif=$varemp['aplicacion']['compras']['modulos']['almregpro']['mascararif'];
	       }
  }


  	$grid = Herramientas::CargarDatosGridv2($this,$caprovee->getObjrecaudos());
  	$gridC = Herramientas::CargarDatosGridv2($this,$caprovee->getObjcontactos());
  	$gridR = Herramientas::CargarDatosGridv2($this,$caprovee->getObjramos());
  	$gridRE = Herramientas::CargarDatosGridv2($this,$caprovee->getObjretenciones());

    Proveedor::salvarAlmregpro($caprovee,$grid,$gridC,$gridR,$gridRE,$this->manprocor,$this->mascararif);
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
    $codigo   =$this->getRequestParameter('codigo');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            //,["'.$cajtexcom.'","20","c"]

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
     else  if ($this->getRequestParameter('ajax')=='3')
      {
        $dato=CadefubiPeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
     else  if ($this->getRequestParameter('ajax')=='4')
      {
        $dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
     else  if ($this->getRequestParameter('ajax')=='5')
      {
        $codigo=$this->getRequestParameter('codigo');
        $aux=CaproveePeer::getCodpro($codigo);
        $dato=$aux;
        $output = '[["codproaux","'.$dato.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
        $codigo=$this->getRequestParameter('codigo');
        $aux=CaproveePeer::getRifpro($codigo);
        $dato=$aux;
        $output = '[["rifproaux","'.$dato.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
      else  if ($this->getRequestParameter('ajax')=='7')
      {
        $dato=CatipempsncPeer::getDestip($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
	  else  if ($this->getRequestParameter('ajax')=='8')
      {
        $destiprec = Herramientas::getX('codtiprec','Catiprec','destiprec',$codigo);
        $output = '[["'.$cajtexmos.'","'.$destiprec.'",""]]';
        $this->caprovee = $this->getCaproveeOrCreate();
        $this->configGrid();

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }
      else  if ($this->getRequestParameter('ajax')=='9')
      {
        $dato=Herramientas::getX('ramart','caramart','nomram',$codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
      else  if ($this->getRequestParameter('ajax')=='10')
      {
        $dato=Herramientas::getX('codrec','carecaud','desrec',$codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
      else  if ($this->getRequestParameter('ajax')=='11')
      {
        $dato=Herramientas::getX('codtip','optipret','destip',$codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }

        //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      //  return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('RAMART','Caramart','Ramart',trim($this->getRequestParameter('caprovee[codram]')));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('caprovee[codcta]')));
      }
    else if ($this->getRequestParameter('ajax')=='4')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIPREC','Catiprec','codtiprec',trim($this->getRequestParameter('caprovee[codtiprec]')));
      }
     else if ($this->getRequestParameter('ajax')=='5')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIP','Catipempsnc','codtip',$this->getRequestParameter('caprovee[codtipemp]'));
      }
  }

  public function executeDoble()
  {

  ///////////////
  $this->caprovee = $this->getCaproveeOrCreate();
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
    $this->mascararif='##############';
    $tienemascararif="";
  	$varemp = $this->getUser()->getAttribute('configemp');
  	$this->corcodpro = '';
  	if(is_array($varemp))
	if(array_key_exists('aplicacion',$varemp))
		if(array_key_exists('compras',$varemp['aplicacion']))
			if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
				if(array_key_exists('almregpro',$varemp['aplicacion']['compras']['modulos']))
				{
					if(array_key_exists('corcodpro',$varemp['aplicacion']['compras']['modulos']['almregpro']))
						$this->corcodpro = $varemp['aplicacion']['compras']['modulos']['almregpro']['corcodpro'];
					if(array_key_exists('mascararif',$varemp['aplicacion']['compras']['modulos']['almregpro']))
						$tienemascararif = $varemp['aplicacion']['compras']['modulos']['almregpro']['mascararif'];
				}


     if ($tienemascararif=="S") $this->mascararif='#-########-#';
      $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
      $this->loncta=strlen($this->mascara);
      $this->c=null;

   $this->manprocor="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregpro',$varemp['aplicacion']['compras']['modulos']))
	       if(array_key_exists('manprocor',$varemp['aplicacion']['compras']['modulos']['almregpro']))
	       {
	       	$this->manprocor=$varemp['aplicacion']['compras']['modulos']['almregpro']['manprocor'];
	       }
  }

  /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
 
  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()  //Recaudos
  {
   $c = new Criteria();
   $c->add(CarecproPeer::CODPRO,$this->caprovee->getCodpro());
   $c->addAscendingOrderByColumn(CarecproPeer::CODREC);
   $per = CarecproPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almregpro/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_recaudos');
   $this->columnas[1][0]->setCatalogo('carecaud','sf_admin_edit_form', array('desrec'=>'2','codrec'=>'1'), 'Almregpro_Carecaud', array( 'param1'=>"'+$('caprovee_codtiprec').value+'" ));
   $this->columnas[1][0]->setAjax('almregpro',10,2,1);


   $this->objRec = $this->columnas[0]->getConfig($per);
   $this->caprovee->setObjrecaudos($this->objRec);

  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Contacto()
  {
   $c = new Criteria();
   $c->add(CaconproPeer::CODPRO,$this->caprovee->getCodpro());
   $c->addAscendingOrderByColumn(CaconproPeer::CEDCON);
   $per = CaconproPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almregpro/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_contactos');
   $this->columnas[1][5]->setCombo(Constantes::Contacto_Proveedor());

   $this->objC = $this->columnas[0]->getConfig($per);
   $this->caprovee->setObjcontactos($this->objC);

  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Ramos()
  {
   $c = new Criteria();
   $c->add(CaramproPeer::CODPRO,$this->caprovee->getCodpro());
   $c->addAscendingOrderByColumn(CaramproPeer::RAMART);
   $per = CaramproPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almregpro/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ramos');
   $this->columnas[1][0]->setCatalogo('caramart','sf_admin_edit_form', array('nomram'=>'2','ramart'=>'1'), 'Almregpro_Caramart');
   $this->columnas[1][0]->setAjax('almregpro',9,2,1);

   $this->objR = $this->columnas[0]->getConfig($per);
   $this->caprovee->setObjramos($this->objR);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid_Retenciones()
  {
   $c = new Criteria();
   $c->add(CaproretPeer::CODPRO,$this->caprovee->getCodpro());
   $c->addAscendingOrderByColumn(CaproretPeer::CODRET);
   $per = CaproretPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almregpro/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_retenciones');
   $this->columnas[1][0]->setCatalogo('optipret','sf_admin_edit_form', array('destip'=>'2','codtip'=>'1'), 'Almregpro_Optipret');
   $this->columnas[1][0]->setAjax('almregpro',11,2,1);

   $this->objRet = $this->columnas[0]->getConfig($per);
   $this->caprovee->setObjretenciones($this->objRet);

  }

}
