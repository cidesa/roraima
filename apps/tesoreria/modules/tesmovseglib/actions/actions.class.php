<?php

/**
 * tesmovseglib actions.
 *
 * @package    Roraima
 * @subpackage tesmovseglib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovseglibActions extends autotesmovseglibActions
{

  private $coderror = -1;
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror4=-1;
  public  $coderror5=-1;
  public  $coderror6=-1;

 
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->tsmovlib = $this->getTsmovlibOrCreate();
      try{ $this->updateTsmovlibFromRequest();}catch(Exception $ex){}

      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tsmovlib[feclib]'))==true)
  	{
      $this->coderror6=529;
      return false;
  	}

      if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('tsmovlib[feclib]'),$this->getRequestParameter('tsmovlib[numcue]'))==false)
  	{
      $this->coderror6=536;
      return false;
  	}


      $c = new Criteria();
      $c->add(TstipmovPeer::CODTIP,$this->tsmovlib->getTipmov());

      $tstipmov = TstipmovPeer::doSelectOne($c);

      if($tstipmov){
        if($tstipmov->getDebcre()=='C'){
          $contaba = ContabaPeer::doSelectOne(new Criteria());
          $saldo=0;
          if(!Tesoreria::chequear_disponibilidad_financiera($this->tsmovlib->getNumcue(),$this->tsmovlib->getMonmov(),$contaba->getFecini(),$this->tsmovlib->getFeclib(),$saldo)){
            $this->coderror5 = 195;
            return false;
          }
        }
      }


      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('tsmovlib[feclib]')))
      {
    $this->coderror1=521;
    return false;
    }

    if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('tsmovlib[feclib]'),$this->getRequestParameter('tsmovlib[fecing]'),'>'))
      {
    $this->coderror2=523;
    return false;
    }

      if (self::validarGeneraComprobante())
      {
    $this->coderror4=508;
    return false;
    }

      return true;
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
    $this->preExecute();
    $this->tsmovlib = $this->getTsmovlibOrCreate();
    try{ $this->updateTsmovlibFromRequest();}catch(Exception $ex){}
    $this->gencorrel=$this->getUser()->getAttribute('confcorcom','S');
    $this->labels = $this->getLabels();

    if($this->coderror1!=-1)
     {
       $err1 = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('tsmovlib{feclib}',$err1);
     }
     if($this->coderror2!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror2);
       $this->getRequest()->setError('tsmovlib{feclib}',$err);
     }
     if($this->coderror5!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror5);
       $this->getRequest()->setError('tsmovlib{monmov}',$err);
     }
     if($this->coderror6!=-1)
     {
       $err = Herramientas::obtenerMensajeError($this->coderror6);
       $this->getRequest()->setError('tsmovlib{feclib}',$err);
     }

    if($this->coderror4!=-1)
     {
       $err2 = Herramientas::obtenerMensajeError($this->coderror4);
       $this->getRequest()->setError('',$err2);
     }


    return sfView::SUCCESS;
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
  protected function saveTsmovlib($tsmovlib)
  {
    if ($tsmovlib->getId())
    {
      Tesoreria::salvarTesmovseglib($tsmovlib,"");
    }
    else
    {
      if ($this->getUser()->getAttribute('grabo',null,$this->getUser()->getAttribute('formulario'))=='S')
      {
        $numcom='';
        $getform=$this->getRequestParameter('formulario');
        $formulario=split('!',$getform);

        $this->getUser()->setAttribute('space',$formulario[0]);
        $i=0;
        while ($i<count($formulario)-1)
        {
          //print 'Entro';exit();
          $formcont="sf_admin/tesmovseglib/confincomgen".$i;
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formcont);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formcont);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formcont);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formcont);
          $debito=$this->getUser()->getAttribute('debito',null,$formcont);
          $credito=$this->getUser()->getAttribute('credito',null,$formcont);
          $grid=$this->getUser()->getAttribute('grid',null,$formcont);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formcont);
          $this->getUser()->getAttributeHolder()->remove('debito',$formcont);
          $this->getUser()->getAttributeHolder()->remove('credito',$formcont);
          $this->getUser()->getAttributeHolder()->remove('grid',$formcont);

          $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formcont));
          $tsmovlib->setNumcom($numcom);
          //Tesoreria::Salvarconfincomgen($numcom,$reftra,$feccom,$descom,$debito,$credito);
          //Tesoreria::Salvar_asientosconfincomgen($numcom,$reftra,$feccom,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[0]));
          $i++;
        }

        $this->getUser()->getAttributeHolder()->remove('grabo',$this->getUser()->getAttribute('formulario'));
        Tesoreria::salvarTesmovseglib($tsmovlib,$numcom);
        Tesoreria::actualiza_Bancos('A', $tsmovlib->getDebcre(), $tsmovlib->getNumcue(), $tsmovlib->getMonmov());

      }
    }

  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tsmovlib = $this->getTsmovlibOrCreate();
    ///////////////////////////////////
    /* CHEQUEO PARA VER SI PUEDE O NO ANU/ELIMINAR */

    $sql="select * from tsmovban where numcue='".$this->tsmovlib->getNumcue()."' and refban='".$this->tsmovlib->getReflib()."' and tipmov= '".$this->tsmovlib->getTipmov()."'";
    if (!Herramientas::BuscarDatos($sql,&$tsmovban))
    {
      $this->anular='S';
    }
    else
    {
      $this->anular='N';
    }
     $this->gencorrel=$this->getUser()->getAttribute('confcorcom','S');
    ////////////////////////////////////
    /* activate form */

    $sql="select CodCtaPagEje,CodCtaIngDevN,codctaingdev from contaba";
    if (Herramientas::BuscarDatos($sql,&$contaba))
    {
      $this->ctaeje=$contaba[0]["codctapageje"];
      $sql2="select descta from contabb where codcta='".$this->ctaeje."'";
      if (Herramientas::BuscarDatos($sql2,&$contabb))
      {
        $this->desctaeje=$contabb[0]["descta"];
      }
      else{$this->desctaeje='';}

      $this->ctaingdif=$contaba[0]["codctaingdevn"];
      $sql2="select descta from contabb where codcta='".$this->ctaingdif."'";
      if (Herramientas::BuscarDatos($sql2,&$contabb))
      {
        $this->desctaingdif=$contabb[0]["descta"];
      }
      else{$this->desctaingdif='';}

      $this->ctaing=$contaba[0]["codctaingdev"];
      $sql2="select descta from contabb where codcta='".$this->ctaing."'";
      if (Herramientas::BuscarDatos($sql2,&$contabb))
      {
        $this->desctaing=$contabb[0]["descta"];
      }
      else{$this->desctaing='';}
    }
    else
    {
      $this->ctaeje='';
      $this->desctaeje='';
      $this->ctaingdif='';
      $this->desctaingdif='';
      $this->ctaing='';
      $this->desctaing='';
    }
    /* activate form */
    ////////////////////////////////////


    if ($this->tsmovlib->getId()!='')
    {
      if (strtoupper($this->tsmovlib->getStatus())=='A')
      {
        $this->eti="ANULADO";
        $this->color='#CC0000';
        $this->anular='N';
      }
      else
      {
        if (strtoupper($this->tsmovlib->getStacon())=='C')
        {
          $this->eti="CONCILIADO";
          $this->color='#0000CC';
        }
        if (strtoupper($this->tsmovlib->getStacon())=='N')
        {
          $this->eti="NO CONCILIADO";
          $this->color='#0000CC';
        }
      }

      if ($this->tsmovlib->getTipmov()!='')
      {
        if ($this->tsmovlib->getTipmov()=='ANUC' && $this->tsmovlib->getTipmovpad()!='')
        {
          $criterio="SELECT to_char(feclib,'dd/mm/yyyy') as feclib FROM TSMOVLIB WHERE NUMCUE='".$this->tsmovlib->getNumcue()."' AND REFLIB='A".substr($this->tsmovlib->getReflib(),1,7)."' and tipmovPAD='".$this->tsmovlib->getTipmovpad()."'";
        }
        else
        {
          $sql2="SELECT tipmovpad FROM TSMOVLIB WHERE REFLIBPAD='".$this->tsmovlib->getReflib()."' AND TIPMOVPAD= '".$this->tsmovlib->getTipmov()."'";
          if (Herramientas::BuscarDatos($sql2,&$tsmovlibA))
            {
              $criterio="SELECT to_char(feclib,'dd/mm/yyyy') as feclib FROM TSMOVLIB WHERE NUMCUE='".$this->tsmovlib->getNumcue()."' AND REFLIB='A".substr($this->tsmovlib->getReflib(),1,7)."' and tipmovPAD='".$tsmovlibA[0]["tipmovpad"]."' ";

            }
            else
            {
              $criterio="SELECT to_char(feclib,'dd/mm/yyyy') as feclib FROM TSMOVLIB WHERE NUMCUE='".$this->tsmovlib->getNumcue()."' AND REFLIB='A".$this->tsmovlib->getReflib()."' and tipmov = 'ANUC'";
            }
        }
      }

      if (Herramientas::BuscarDatos($criterio,&$tsmovlibA))
        {
          $this->color='#CC0000';
          $this->eti='ANULADO EL '.$tsmovlibA[0]["feclib"];
          $this->anular='N';
        }

      $sql="select gencomadi from opdefemp";
      if (Herramientas::BuscarDatos($sql,&$opdefemp))
        {
          $this->compadic=$opdefemp[0]["gencomadi"];
        }
        else
        {
          $this->compadic='';
        }
    }
    else
    {
      $this->compadic='';
      $this->eti='';
      $this->color='';

	  $cadcorcomcont="";
      if ($this->gencorrel=='S')  $cadcorcomcont = "########";
   	  $this->tsmovlib->setNumcom($cadcorcomcont);
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsmovlibFromRequest();

      $this->saveTsmovlib($this->tsmovlib);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmovseglib/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmovseglib/list');
      }
      else
      {
        return $this->redirect('tesmovseglib/edit?id='.$this->tsmovlib->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function getTsmovlibOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $tsmovlib = new Tsmovlib();
      $this->configGrid();
    }
    else
    {
      $tsmovlib = TsmovlibPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($tsmovlib);

    $this->configGrid($tsmovlib->getReflib());
    }

    return $tsmovlib;
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
        $sql="select numcue,codcta from tsdefban where numcue='".$this->getRequestParameter('codigo')."'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $ctacon=$result[0]["codcta"];

          $dato=TsdefbanPeer::getNomcue($this->getRequestParameter('codigo'));
              $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tsmovlib_ctacon","'.$ctacon.'",""]]';
        }
        else
        {
          $dato='Banco No Definido';
              $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tsmovlib_ctacon","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=TstipmovPeer::getDestip($this->getRequestParameter('codigo'));
        $dato2=TstipmovPeer::getDebcre($this->getRequestParameter('codigo'));
           $output = '[["'.$cajtexmos.'","'.$dato.'",""],["tsmovlib_debcre","'.$dato2.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='3')
      {
      	  $valida=true;
          $this->error='';
          $reftra=$this->getRequestParameter('reftra');
          if ($reftra=='')
          {$valida=false;}
          $fectra=$this->getRequestParameter('fectra');
          if ($fectra=='')
          {$valida=false;}
          $tipmov=$this->getRequestParameter('tipo');
          if ($tipmov=='')
          {$valida=false;}
          $numcom=$this->getRequestParameter('numcom');
          if($numcom=='********') $numcom='########';
          if ($numcom=='')
          {$valida=false;}

          if($valida){
          	 //////// SI ES TIPO EJECUTIVO
          	if ($this->esTipoEjecutivo($this->getRequestParameter('tipo')))
          {
          $f=array();
          $this->error='';
          $this->formulario='';
          $this->i=0;
          if ($this->getRequestParameter('ctaeje')!='' && $this->getRequestParameter('ctaingdif')!='' && $this->getRequestParameter('ctaing')!='')
          {
            $this->getUser()->getAttributeHolder()->remove('formulario');
            $grabar=$this->getRequestParameter('grabar');
            $reftra=$this->getRequestParameter('reftra');
            //$numcom=$this->getRequestParameter('numcom');
            $fectra=$this->getRequestParameter('fectra');
            $destra= $this->getRequestParameter('destra');
            $ctas=$this->getRequestParameter('ctas');
            $mov=$this->getRequestParameter('mov');
            $divmont=split('_',$this->getRequestParameter('montos'));
            $monto1=Herramientas::toFloat($divmont[0]);
            $monto2=Herramientas::toFloat($divmont[1]);
            $montos=$monto1.'_'.$monto2;

              $i=0;
              while ($i<=1)
              {
              $f[$i]=$this->getRequestParameter('formulario').$i;

                $this->getUser()->setAttribute('grabar', $grabar,$f[$i]);
                $this->getUser()->setAttribute('reftra', $reftra,$f[$i]);
                $this->getUser()->setAttribute('numcomp', $numcom,$f[$i]);
                $this->getUser()->setAttribute('fectra', $fectra,$f[$i]);
                $this->getUser()->setAttribute('destra', $destra,$f[$i]);
                $this->getUser()->setAttribute('ctas', $ctas,$f[$i]);
                $this->getUser()->setAttribute('tipmov', '',$f[$i]);
                $this->getUser()->setAttribute('mov', $mov,$f[$i]);
                $this->getUser()->setAttribute('montos', $montos,$f[$i]);

              $i++;
              }
              $this->i=$i-1;
              $this->formulario=$f;

              $form_build='';
              foreach ($this->formulario as $valor)
              {
                $form_build=$form_build.$valor.'!';
              }
              $output = '[["formulario","'.$form_build.'",""]]';
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

            }
        //////// SI ES NORMAL
        }
        else
        {
            $this->getUser()->getAttributeHolder()->remove('formulario');
            $grabar=$this->getRequestParameter('grabar');
            $reftra=$this->getRequestParameter('reftra');
            //$numcom=$this->getRequestParameter('numcom');
            $fectra=$this->getRequestParameter('fectra');
            $destra= $this->getRequestParameter('destra');
            $ctas=$this->getRequestParameter('ctas');
            $mov=$this->getRequestParameter('mov');
            $divmont=split('_',$this->getRequestParameter('montos'));
            $monto1=Herramientas::toFloat($divmont[0]);
            $monto2=Herramientas::toFloat($divmont[1]);
            $montos=$monto1.'_'.$monto2;

              $i=0;
            $f[$i]=$this->getRequestParameter('formulario').$i;

            $this->getUser()->setAttribute('grabar', $grabar,$f[$i]);
            $this->getUser()->setAttribute('reftra', $reftra,$f[$i]);
            $this->getUser()->setAttribute('numcomp', $numcom,$f[$i]);
            $this->getUser()->setAttribute('fectra', $fectra,$f[$i]);
            $this->getUser()->setAttribute('destra', $destra,$f[$i]);
            $this->getUser()->setAttribute('ctas', $ctas,$f[$i]);
            $this->getUser()->setAttribute('tipmov', '',$f[$i]);
            $this->getUser()->setAttribute('mov', $mov,$f[$i]);
            $this->getUser()->setAttribute('montos', $montos,$f[$i]);

            $this->i=0;
            $this->formulario=$f;

            $form_build='';
            $form_build=$form_build.$this->formulario.'!';

            $output = '[["formulario","'.$form_build.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


        }
          }else
          {
            $this->error='El Comprobante no se puede generar debido a que faltan campos por llenar';
            $this->i='';
            $this->formu='';
            $output = '[["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          }


        $this->ajax='3';
    }
    else  if ($this->getRequestParameter('ajax')=='4')
    {
      $numcue=$this->getRequestParameter('numcue');
      $reflib=$this->getRequestParameter('reflib');
      $refpag=$this->getRequestParameter('refpag');
      $tipmov=$this->getRequestParameter('tipmov');

      $id="";
      $c = new Criteria();
      $c->add(TsmovlibPeer::NUMCUE,$numcue);
      $c->add(TsmovlibPeer::REFLIB,$reflib);
      $c->add(TsmovlibPeer::TIPMOV,$tipmov);
      $tsmovlib=TsmovlibPeer::doSelectOne($c);
      if ($tsmovlib)     $id=$tsmovlib->getId();

      $msg = $this->executeEliminar();
      $this->ajax='4';

      if ($msg=='')
      {
          $this->setFlash('notice','Registro Eliminado exitosamente');
          return $this->redirect('tesmovseglib/edit');
      }
      else
      {
        $this->setFlash('notice',$msg);
        return $this->redirect('tesmovseglib/edit?id='.$id);
      }
        return sfView::HEADER_ONLY;

    }elseif($this->getRequestParameter('ajax')=='5'){

      $numcue=$this->getRequestParameter('numcue');
      $feclib=$this->getRequestParameter('feclib');
      $monmov=H::toFloat($this->getRequestParameter('monmov'));
      $tipmov=$this->getRequestParameter('tipmov');
      $javascript="";
      $output = '[["","",""]]';
      if ($numcue!="" && $feclib!="" && $monmov>0)
      {
      $c = new Criteria();
      $c->add(TstipmovPeer::CODTIP,$tipmov);
      $tstipmov = TstipmovPeer::doSelectOne($c);

      if($tstipmov){
        if($tstipmov->getDebcre()=='C'){
          $contaba = ContabaPeer::doSelectOne(new Criteria());
          $saldo=0;
      	  $dateFormat = new sfDateFormat('es_VE');
          $feclib = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));
          if(!Tesoreria::chequear_disponibilidad_financiera($numcue,$monmov,$contaba->getFecini(),$feclib,$saldo)){
            $coderr = 195;
            $output = '[["javascript","alert(\''.H::obtenerMensajeError($coderr).'\')",""],["tsmovlib_monmov","0,00",""]]';
          }
        }
      }
      else {
      	$javascript="alert('Tipo de Movimiento no existe'); $('tsmovlib_monmov').value='0,00';";
      	$output = '[["javascript","'.$javascript.'",""]]';
      }
      }else{
      	$javascript="alert('Verifique si introdujo el N° de Cuenta Bancaria, Fecha del Movimiento Valida o si el monto es mayor a cero'); $('tsmovlib_monmov').value='0,00';";
      	$output = '[["javascript","'.$javascript.'",""]]';
      }



      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }
  }


  public function esTipoEjecutivo($tipo)
  {
    $sql="select tipeje from opdefemp";
    if (Herramientas::BuscarDatos($sql,&$opdefemp))
      {
        if ($opdefemp[0]["tipeje"]== $tipo)
        {
          return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
        return false;
      }
  }

  public function LlenarAttribute($nombre,$nombreformulario)
  {
    $this->getUser()->getAttributeHolder()->remove($nombre);
      $this->getUser()->setAttribute($nombre, $this->getRequestParameter($nombre),$nombreformulario);
  }

    public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
      $this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',trim($this->getRequestParameter('tsmovlib[numcue]')));
      }
      else if ($this->getRequestParameter('ajax')=='2')
      {
      $this->tags=Herramientas::autocompleteAjax('CODTIP','Tstipmov','Codtip',trim(strtoupper($this->getRequestParameter('tsmovlib[tipmov]'))));
      }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($numche='')
  {

      $c = new Criteria();
    $c->add(OpordpagPeer::NUMCHE,$numche);
    $obj = OpordpagPeer::doSelect($c);

      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
        $opciones->setTabla('Opordpag');
        $opciones->setAnchoGrid(600);
        $opciones->setTitulo('Ordenes de Pago Canceladas');
        $opciones->setName('a');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(0);
        $opciones->setEliminar(false);

        // Se generan las columnas
        $col1 = new Columna('Número');
        $col1->setTipo(Columna::TEXTO);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('Numord');
        $col1->setHTML('type="text" size="10" readonly=true');

        $col2 = new Columna('Fecha');
        $col2->setTipo(Columna::FECHA);
        $col2->setAlineacionObjeto(Columna::CENTRO);
        $col2->setAlineacionContenido(Columna::CENTRO);
        $col2->setNombreCampo('Fecemi');
        $col2->setHTML('type="text" size="8" readonly=true');

        $col3 = new Columna('Beneficiario');
        $col3->setNombreCampo('Nomben');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setHTML('type="text" size=40');

        $col4 = new Columna('Descripción');
        $col4->setNombreCampo('Desord');
        $col4->setTipo(Columna::TEXTO);
        $col4->setAlineacionObjeto(Columna::IZQUIERDA);
        $col4->setAlineacionContenido(Columna::IZQUIERDA);
        $col4->setHTML('type="text" size=50 ');

    $col5 = new Columna('Monto');
        $col5->setTipo(Columna::MONTO);
        $col5->setAlineacionObjeto(Columna::DERECHA);
        $col5->setAlineacionContenido(Columna::DERECHA);
        $col5->setHTML('type="text" size=12 readonly=true');
        $col5->setNombreCampo('Monord');

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
      // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($obj);

  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsmovlibFromRequest()
  {
    $tsmovlib = $this->getRequestParameter('tsmovlib');
    $this->compadic='';
    $this->eti='';
    $this->color='';
      $sql="select * from tsmovban where numcue='".$this->tsmovlib->getNumcue()."' and refban='".$this->tsmovlib->getReflib()."' and tipmov= '".$this->tsmovlib->getTipmov()."'";
    if (!Herramientas::BuscarDatos($sql,&$tsmovban))
  {
    $this->anular='S';
  }
  else
  {
    $this->anular='N';
  }

    $sql="select CodCtaPagEje,CodCtaIngDevN,codctaingdev from contaba";
    if (Herramientas::BuscarDatos($sql,&$contaba))
  {
    $this->ctaeje=$contaba[0]["codctapageje"];
    $sql2="select descta from contabb where codcta='".$this->ctaeje."'";
    if (Herramientas::BuscarDatos($sql2,&$contabb))
    {
      $this->desctaeje=$contabb[0]["descta"];
    }
    else{$this->desctaeje='';}

    $this->ctaingdif=$contaba[0]["codctaingdevn"];
    $sql2="select descta from contabb where codcta='".$this->ctaingdif."'";
    if (Herramientas::BuscarDatos($sql2,&$contabb))
    {
      $this->desctaingdif=$contabb[0]["descta"];
    }
    else{$this->desctaingdif='';}

    $this->ctaing=$contaba[0]["codctaingdev"];
    $sql2="select descta from contabb where codcta='".$this->ctaing."'";
    if (Herramientas::BuscarDatos($sql2,&$contabb))
    {
      $this->desctaing=$contabb[0]["descta"];
    }
    else{$this->desctaing='';}
  }
  else
  {
    $this->ctaeje='';
    $this->desctaeje='';
    $this->ctaingdif='';
    $this->desctaingdif='';
    $this->ctaing='';
    $this->desctaing='';
  }

  if (isset($tsmovlib['numcue']))
    {
      $this->tsmovlib->setNumcue($tsmovlib['numcue']);
    }
    if (isset($tsmovlib['nomcue']))
    {
      $this->tsmovlib->setNomcue($tsmovlib['nomcue']);
    }
    if (isset($tsmovlib['reflib']))
    {
      $this->tsmovlib->setReflib($tsmovlib['reflib']);
    }
    if (isset($tsmovlib['feclib']))
    {
      if ($tsmovlib['feclib'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['feclib']))
          {
            $value = $dateFormat->format($tsmovlib['feclib'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['feclib'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFeclib($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFeclib(null);
      }
    }
    if (isset($tsmovlib['tipmov']))
    {
      $this->tsmovlib->setTipmov($tsmovlib['tipmov']);
    }
    if (isset($tsmovlib['destip']))
    {
      $this->tsmovlib->setDestip($tsmovlib['destip']);
    }
    if (isset($tsmovlib['deslib']))
    {
      $this->tsmovlib->setDeslib($tsmovlib['deslib']);
    }
    if (isset($tsmovlib['monmov']))
    {
      $this->tsmovlib->setMonmov($tsmovlib['monmov']);
    }
    if (isset($tsmovlib['fecing']))
    {
      if ($tsmovlib['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['fecing']))
          {
            $value = $dateFormat->format($tsmovlib['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFecing(null);
      }
    }
    if (isset($tsmovlib['numcom']))
    {
      $this->tsmovlib->setNumcom($tsmovlib['numcom']);
    }
    if (isset($tsmovlib['feccom']))
    {
      if ($tsmovlib['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($tsmovlib['feccom']))
          {
            $value = $dateFormat->format($tsmovlib['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $tsmovlib['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->tsmovlib->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->tsmovlib->setFeccom(null);
      }
    }
    if (isset($tsmovlib['debcre']))
    {
      $this->tsmovlib->setDebcre($tsmovlib['debcre']);
    }
    if (isset($tsmovlib['codcta']))
    {
      $this->tsmovlib->setCodcta($tsmovlib['codcta']);
    }
    if (isset($tsmovlib['status']))
    {
      $this->tsmovlib->setStatus($tsmovlib['status']);
    }
    if (isset($tsmovlib['stacon']))
    {
      $this->tsmovlib->setStacon($tsmovlib['stacon']);
    }
    if (isset($tsmovlib['ctacon']))
    {
      $this->tsmovlib->setCtacon($tsmovlib['ctacon']);
    }
    if (isset($tsmovlib['debcre']))
    {
      $this->tsmovlib->setDebcre($tsmovlib['debcre']);
    }

  }

    public function executeEliminar()
  {
    $numcue=$this->getRequestParameter('numcue');
    $reflib=$this->getRequestParameter('reflib');
    $refpag=$this->getRequestParameter('refpag');
    $feclib=$this->getRequestParameter('feclib');
    $numcom=$this->getRequestParameter('numcom');
    $feccom=$this->getRequestParameter('feccom');
    $tipmov=$this->getRequestParameter('tipmov');
    $debcre=$this->getRequestParameter('debcre');
    $monmov=$this->getRequestParameter('monmov');
    $numcomadi=$this->getRequestParameter('numcomadi');
    $feccomadi=$this->getRequestParameter('feccomadi');
    $compadic=$this->getRequestParameter('compadic');
    $this->msg='';
    $ideeli=0;
    $mes = substr($feclib,3,2);
    $ano = substr($feclib,6,4);

    if (Tesoreria::el_Banco_Esta_Cerrado($numcue,$mes,$ano))
    {
      return 'El Movimiento no puede ser Eliminado ya que el periodo se encuentra cerrado';
    }
    else
    {
      if ($numcom!='')
      {
        $sql="Select * From Contabc Where NumCom='".$numcom."' And STACOM='D'";
        $puedeeliminar=Herramientas::BuscarDatos($sql,&$contabc);
      }
      else
      {
        $puedeeliminar=true;
      }

      if ($puedeeliminar)
      {
        $sql="Select status,stacon,tipmov From TsMovLib Where NumCue = '".$numcue."' And RefLib = '".$reflib."' and TipMov = '".$tipmov."'";
        if (Herramientas::BuscarDatos($sql,&$tsmovlib))
          {
            if ($tsmovlib[0]["status"]=='A')
            {
              return $this->msg='No se puede eliminar un movimiento Anulado';
            }
            if ($tsmovlib[0]["stacon"]!='C')
            {
              $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tsmovlib[0]["tipmov"]);
              if ($escheque==1)
              {
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Cheque('E',$numcue,$reflib);
                $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('E',$reflib,$numcue,$feclib,$refpag);
              }
              else
              {
                $sql2="Select refier From CPDocPag Where TipPag = '".$tsmovlib[0]["tipmov"]."' ";
                if (Herramientas::BuscarDatos($sql2,&$tabla))
                {
                  if ($tabla[0]["refier"]=='A')
                  {
                    $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                    $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('E',$reflib,$numcue,$feclib,$refpag);
                  }
                  else
                  {
                    $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('E',$reflib,$numcue,$feclib,$refpag);
                  $c = new Criteria();
                  $c->add(OpdetperPeer::NUMCHE,$reflib);
                  $c->add(OpdetperPeer::CTABAN,$numcue);
                  $c->add(OpdetperPeer::TIPMOV,$tipmov);
                  $opdetper = OpdetperPeer::doSelectOne($c);
                  if ($opdetper)
                  {
                    $opdetper->setFecpag(null);
                    $opdetper->setNumche(null);
                    $opdetper->save();
                  }
                  }
                }
              }
              $c = new Criteria();
            $c->add(TsmovlibPeer::NUMCUE,$numcue);
            $c->add(TsmovlibPeer::REFLIB,$reflib);
            $c->add(TsmovlibPeer::TIPMOV,$tipmov);
            $crieli=TsmovlibPeer::doSelectOne($c);
            if ($crieli) $ideeli=$crieli->getId();
            TsmovlibPeer::doDelete($c);

            Tesoreria::actualiza_Bancos('E',$debcre,$numcue,$monmov);
            Tesoreria::anular_Eliminar('E',$numcomadi,$feccomadi,$compadic,$feccom,$numcom,$numcom,$feclib);
            $this->SalvarBitacora($ideeli ,'Elimino');
            }
            else
            {
              if ($tsmovlib[0]["tipmov"]=='ANUC')
              {

              $c = new Criteria();
              $c->add(TsmovlibPeer::NUMCUE,$numcue);
              $c->add(TsmovlibPeer::REFLIB,$reflib);
              $c->add(TsmovlibPeer::TIPMOV,$tipmov);
              $crieli=TsmovlibPeer::doSelectOne($c);
              if ($crieli) $ideeli=$crieli->getId();
              TsmovlibPeer::doDelete($c);

              Tesoreria::anular_Eliminar('E',$numcomadi,$feccomadi,$compadic,$feccom,$numcom,$numcom,$feclib);
              $this->SalvarBitacora($ideeli ,'Elimino');
              }
              else
              {
                return $this->msg=$this->msg.'El Movimiento está Conciliado y No puede ser Eliminado';
              }
            }
          }
      }
      else
      {
        return $this->msg=$this->msg.'El Movimiento no puede ser Eliminado ya que el comprobante contable asociado, se encuentra actualizado en Contabilidad';
      }
    }

  }

  public function executeAnular()
  {
    $numcue=$this->getRequestParameter('numcue');
    $reflib=$this->getRequestParameter('reflib');
    $refpag=$this->getRequestParameter('refpag');
    $feclib=$this->getRequestParameter('feclib');
    $this->compadic=$this->getRequestParameter('compadic');

    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
    $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));

    $c = new Criteria();
    $c->add(TsmovlibPeer::NUMCUE,$numcue);
    $c->add(TsmovlibPeer::REFLIB,$reflib);
    $c->add(TsmovlibPeer::FECLIB,$fec);
    $this->tsmovlib = TsmovlibPeer::doSelectOne($c);
    sfView::SUCCESS;
  }


  public function executeSalvaranu()
  {
    $numcue=$this->getRequestParameter('numcue');
    $reflib=$this->getRequestParameter('reflib');
    $reflib2=$this->getRequestParameter('reflib2');
    $refpag=$this->getRequestParameter('refpag');
    $feclib_m=$this->getRequestParameter('feclib');
    $aux=split("-",$feclib_m);
    $feclib=$aux[2].'/'.$aux[1].'/'.$aux[0];
    $fecanu=$this->getRequestParameter('fecanu');
    //$fecanu=date('d/m/Y');
    $tipmov=$this->getRequestParameter('tipmov');
    $numcom=$this->getRequestParameter('numcom');
    $desanu=$this->getRequestParameter('desanu');
    $monmov=$this->getRequestParameter('monmov');
    $numcomadi=$this->getRequestParameter('numcomadi');
    $feccomadi=$this->getRequestParameter('feccomadi');
    $compadic=$this->getRequestParameter('compadic');
    $fechacom=$this->getRequestParameter('fechacom');
    $numcom=$this->getRequestParameter('numcom');
    $numcom2=$this->getRequestParameter('numcom2');
    //if($numcom2=='********')
    $numcom2 = "########";
    if($numcom=='********') $numcom = "########";
    $this->msgpercer="";
    $idmovseglib=$this->getRequestParameter('id');
    $this->id=$idmovseglib;
    $this->msg='';

   if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tsmovlib[feclib]'))==true)
   {
     $coderror=529;
     $this->msgpercer = Herramientas::obtenerMensajeError($coderror);
   }
   else
   {
    $sql="Select stacon,tipmov,monmov,codcta,numcue From TsMovLib Where NumCue = '".$numcue."' And RefLib = '".$reflib."' and TipMov = '".$tipmov."' ";
    if (Herramientas::BuscarDatos($sql,&$tsmovlib))
      {
        if (!$tsmovlib[0]["stacon"]!='C')
        {
          $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tsmovlib[0]["tipmov"]);
          if ($escheque==1)
          {
            $this->msg=$this->msg.Tesoreria::anular_Eliminar_Cheque('A',$numcue,$reflib);
            $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
            $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu, $refpag);
          }
          else
          {
            $sql2="select refier from cpdocpag where tippag='".$tsmovlib[0]["tipmov"]."' ";
            if (Herramientas::BuscarDatos($sql2,&$tabla))
            {
              if ($tabla[0]["refier"]=='A')
              {
                $this->msg=$this->msg.Tesoreria::actualiza_Orden_De_Pago($reflib,$numcue,$tipmov);
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu,$refpag);
              }
              else
              {
                $this->msg=$this->msg.Tesoreria::anular_Eliminar_Imppag('A',$reflib,$numcue,$fecanu,$refpag);

              $c = new Criteria();
              $c->add(OpdetperPeer::NUMCHE,$reflib);
              $c->add(OpdetperPeer::CTABAN,$numcue);
              $c->add(OpdetperPeer::TIPMOV,$tipmov);
              $opdetper = OpdetperPeer::doSelectOne($c);
              if ($opdetper)
              {
                $opdetper->setFecpag(null);
                $opdetper->setNumche(null);
                $opdetper->save();
              }
              }
            }
          }
          $sql3="select debcre from tstipmov where codtip='".$tipmov."'";
          if (Herramientas::BuscarDatos($sql3,&$tstipmov))
          {
            $afecta=$tstipmov[0]["debcre"];
          }

          // Generar Nuevo comprobante contable
          if($numcom2=='########') $numcom2=Comprobante::Buscar_Correlativo();
          $this->msg=$this->msg.Tesoreria::anular_Eliminar('A',$numcomadi,$feccomadi,$compadic,$fechacom,$numcom,$numcom2,$fecanu,$reflib2);

          // GENERAR NUEVO MOVIMIENTO SEGUN LIBRO
          $tsmovlibA= new Tsmovlib();
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

          $tsmovlibA->setNumcue($tsmovlib[0]["numcue"]);
          $tsmovlibA->setReflib($reflib2);
          $tsmovlibA->setRefpag($refpag);
          $tsmovlibA->setFeclib($fec);
          if ($afecta=='C')
          {
            $tsmovlibA->setTipmov('ANUC');
          }
          else if ($afecta=='D')
          {
            $tsmovlibA->setTipmov('ANUD');
          }
          $tsmovlibA->setMonmov($tsmovlib[0]["monmov"]);
          $tsmovlibA->setNumcom($numcom2);
          $tsmovlibA->setMotanu($desanu);
          $tsmovlibA->setCodcta($tsmovlib[0]["codcta"]);
          $tsmovlibA->setFeccom($fec);
          $tsmovlibA->setStatus('C');
          $tsmovlibA->setStacon('C');
          $tsmovlibA->setDeslib('Cheque Anulado');
          $tsmovlibA->setReflibpad($reflib);
          $tsmovlibA->setTipmovpad($tipmov);
          $tsmovlibA->save();

          Tesoreria::actualiza_Bancos('A','D',$numcue,$monmov);
        }//if (!$tsmovlib[0]["stacon"]!='C')
      }//  if (Herramientas::BuscarDatos($sql,&$tsmovlib))
     }//else if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tsmovlib[feclib]'))==true)
    return sfView::SUCCESS;
  }


  public function validarGeneraComprobante()
  {
    if ($this->getUser()->getAttribute('grabo',null,$this->getUser()->getAttribute('formulario'))=='S')
    { return false;}
    else { return true;}
  }

}

