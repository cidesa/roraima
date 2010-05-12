<?php

/**
 * pagemiord actions.
 *
 * @package    Roraima
 * @subpackage pagemiord
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagemiordActions extends autopagemiordActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror3=-1;
  public  $coderror4=-1;
  public  $coderror5=-1;
  public  $coderror6=-1;
  public  $codigo="";
  public  $monto="";
  public  $salvarretencion=-1;






  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->opordpag = $this->getOpordpagOrCreate();
      try{ $this->updateOpordpagFromRequest();}catch(Exception $ex){}
	  #SE AGREGO MOMENTANEAMENTE
	  if ($this->opordpag->getId()=="")
      {
      		  $cc = new Criteria();
			  $cc->add(OpordpagPeer::NUMORD,$this->opordpag->getNumord());
			  $percc = OpordpagPeer::doSelectOne($cc);
			  if($percc)
			  {
			  	$this->coderror5="99999999";
				return false;
			  }
	  }
	  ##FIN##
      $this->setVars();
      if ($this->opordpag->getId()=="")
      {
      	$this->configGridFactura();
        $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
	  	$this->mannivelapr="";
	  	$this->comprobaut="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('generales',$varemp))
		   if(array_key_exists('mannivapr',$varemp['generales']))
		   {
		   	$this->mannivelapr=$varemp['generales']['mannivapr'];
		   	if(array_key_exists('comprobaut',$varemp['generales']))
		   	{
		   		$this->comprobaut=$varemp['generales']['comprobaut'];
		   	}
		   }

        if ($this->mannivelapr=='S')
        {
          $login=$this->getUser()->getAttribute('loguse');
          Autenticacion::validadNivelAprobacion($login,H::tofloat($this->getRequestParameter('opordpag[monord]')),&$erro);
          if ($erro!=-1)
          {
          	$this->coderror5=$erro;
		    return false;
          }
        }

        if ($this->opordpag->getTipcau()!=$this->ordpagnom && $this->opordpag->getTipcau()!=$this->ordpagapo && $this->opordpag->getTipcau()!=$this->ordpagliq && $this->opordpag->getTipcau()!=$this->ordpagfid)
        {
          $this->configGridApliret();
          $grid2 = Herramientas::CargarDatosGrid($this,$this->obj5);
          $grid3 = Herramientas::CargarDatosGrid($this,$this->obj6);
          if ((count($grid2[0])>0) && ($this->getRequestParameter('opordpag[presiono]')!='S'))
          {
            $this->salvarretencion=516;
            return false;
          }
        }
        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('opordpag[fecemi]'))==true)
      	{
          $this->coderror6=529;
          return false;
      	}
        if ($this->comprobaut!="S"){
          if (self::validarGeneraComprobante())
	      {
	        $this->coderror4=508;
	        return false;
	      }
        }
    $this->configGridFactura();
    $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
    $cedrif=$this->getRequestParameter('opordpag[cedrif]');
    $l= new Criteria();
    $l->add(OpordpagPeer::CEDRIF,$cedrif);
    $benefi= OpordpagPeer::doSelect($l);
    if ($benefi)
    {
      foreach ($benefi as $provee)
      {
      	$y= new Criteria();
      	$y->add(OpfacturPeer::NUMORD,$provee->getNumord());
      	$resul= OpfacturPeer::doSelect($y);
      	if ($resul)
      	{
           foreach ($resul as $factur)
           {
           	 $t=0;
		     $u=$factura[0];
		     while ($t<count($u))
		     {
               if ($factur->getNumfac()==$u[$t]["numfac"])
               {
               	$this->coderror4=532;
                return false;
               	break;
               }
		       $t++;
		     }
           }
      	}
      }
    }

      if ($this->getRequestParameter('opordpag[afectapre]')==1)
      {
      $this->configGrid();
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);
      if (count($grid[0])==0)
      {
        $this->coderror5=510;//508;
        return false;
      }

      if ($this->opordpag->getTipcau()==$this->ordpagnom || $this->opordpag->getTipcau()==$this->ordpagapo || $this->opordpag->getTipcau()==$this->ordpagliq || $this->opordpag->getTipcau()==$this->ordpagfid)
      {
        if (!OrdendePago::validarDisponibilidadPresu($grid,$this->getRequestParameter('opordpag[afectapre]'),&$cod))
        {
          $this->codigo=$cod;
          $this->coderror1=513;
          return false;
        }
        else
        {
          return true;
        }
      }
      else
      {
        if (!($this->getRequestParameter('opordpag[documento]')=='C' || $this->getRequestParameter('opordpag[documento]')=='P'))
        {
          OrdendePago::validarPagemiord($grid,$this->getRequestParameter('opordpag[afectapre]'),&$cod,&$msj,&$monto);
          $this->codigo=$cod;
          $this->monto=$monto;
          $this->coderror2=$msj;
          if ($this->coderror2<>-1)
          {
           return false;
          }else return true;
        }
      }
       }else
       {
       	if (H::tofloat($this->getRequestParameter('opordpag[neto]'))<=0)
      	{
  			$this->coderror4=535;
	        return false;
      	}
       }
      }else
      {

      	$this->configGridFactura();
	    $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
	    $cedrif=$this->opordpag->getCedrif();

	    $l= new Criteria();
	    $l->add(OpordpagPeer::CEDRIF,$cedrif);
	    $benefi= OpordpagPeer::doSelect($l);
	    if ($benefi)
	    {
	      foreach ($benefi as $provee)
	      {
	      	$y= new Criteria();
	      	$y->add(OpfacturPeer::NUMORD,$provee->getNumord());
	      	$resul= OpfacturPeer::doSelect($y);
	      	if ($resul)
	      	{
	           foreach ($resul as $factur)
	           {
	           	 $t=0;
			     $u=$factura[0];
			     while ($t<count($u))
			     {
	               if ($factur->getNumfac()==$u[$t]["numfac"] && $u[$t]["id"]=="")
	               {
	               	$this->coderror4=532;
	                return false;
	               	break;
	               }
			       $t++;
			     }
	           }
	      	}
	      }
	    }

      }
      return true;
    }else return true;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->grabo=$this->getRequestParameter('grabo');
    $this->setVars();
    if ($this->opordpag->getId()!='')
    {
       switch ($this->opordpag->getStatus()) {
         case 'A':
           $this->color='#CC0000';
           $c = new Criteria();
           $c->add(UsuariosPeer::LOGUSE,$this->opordpag->getUsuanu());
           $objUsuario = UsuariosPeer::doSelectOne($c);
           if ($objUsuario)
           {
           	$nombre=$objUsuario->getNomuse();
           }else $nombre="";

            $q= new Criteria();
			$regi= OpdefempPeer::doSelectOne($q);
			if ($regi)
			{
			  $tmot=$regi->getOrdmotanu();
			}else $tmot="";
			if ($tmot=='S')
			{
               if ($this->opordpag->getFecanu()!="")
	           { $this->eti="ANULADA EL ".date('d/m/Y',strtotime($this->opordpag->getFecanu()))." por el usuario ".$nombre;}
	           else { $this->eti="ANULADA por el usuario".$nombre;}
			}else {
	           if ($this->opordpag->getFecanu()!="")
	           { $this->eti="ANULADA EL ".date('d/m/Y',strtotime($this->opordpag->getFecanu()));}
	           else { $this->eti="ANULADA";}
			}
           break;
         case 'E':
           $this->color='#CC0000';
           $this->eti="ELABORADA";
           break;
         case 'C':
           $this->color='#CC0000';
           $this->eti="EN CONTRALORIA";
           break;
         case ('I' || 'N'):
          $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d
                 where a.numche=b.reflib and a.codcta=b.numcue and
                 b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and
                 a.numord='".$this->opordpag->getNumord()."'";
           $result=array();
           if (Herramientas::BuscarDatos($sql,$result))
           {
             if ($this->opordpag->getStatus()=='N')
             {
               $this->color='#CC0000';
               $this->eti="PAGADA PARCIALMENTE CON ";
             }
             else
             {
               $this->color='#0000CC';
               $this->eti="PAGADA CON ";
             }

             if ($result[0]["tipmovche"]!="")
             {
              ///////////////////////////////////////
               $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d
                 where a.numche=b.reflib and a.codcta=b.numcue and a.tipmov=b.tipmov and
                 b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and
                 a.numord='".$this->opordpag->getNumord()."'";
           		$resultad=array();
          		if (Herramientas::BuscarDatos($sql,$resultad))
           		{
           		     foreach ($resultad as $datos)
		             {
		               $this->eti=$this->eti.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
		             }
           		}
           		else $this->eti="";
              ///////////////////////////////////////
             }
			else
			{
             foreach ($result as $datos)
             {
               $this->eti=$this->eti.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
             }
			}

             $this->eti=substr($this->eti,0,strlen($this->eti)-2);
           }
           else
           {
              if ($this->opordpag->getStatus()=='I')
              {
                $sql1="select a.tipmov as tipmov,a.reflib as reflib,a.feclib as feclib,a.numcue as numcue,b.nomcue as nomcue,c.destip as destip
                from  tsmovlib a, tsdefban b,tstipmov c
                where a.numcue=b.numcue and
                a.tipmov=c.codtip and
                a.numcue='".$this->opordpag->getCtaban()."' and
                a.reflib='".$this->opordpag->getNumche()."'";
                $result2=array();
                if(Herramientas::BuscarDatos($sql1,$result2))
                {
                  $this->color='#0000CC';
                  $this->eti="PAGADA CON ".$result2[0]["destip"]." N° ".$result2[0]["reflib"]." EL ".date('d/m/Y',strtotime($result2[0]["feclib"]))." - ".$result2[0]["nomcue"];
                }
                else
                {
                  $this->color='#0000CC';
                  $this->eti="PAGADA SIN CHEQUE ASOCIADO";
                }
              }
              else
              {
                $this->color='#CC0000';
                $this->eti="PENDIENTE POR PAGAR";
              }
          }
       }
    }
    else
    {
      $this->color='';
      $this->eti='';
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $this->saveOpordpag($this->opordpag);

      $this->opordpag->setId(Herramientas::getX_vacio('numord','opordpag','id',$this->opordpag->getNumord()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagemiord/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagemiord/list');
      }
      else
      {
        return $this->redirect('pagemiord/edit?id='.$this->opordpag->getId().'&grabo=S');
      }
    }
    else
    {
      $this->labels = $this->getLabels();
      $this->getUser()->getAttributeHolder()->remove('presiona','pagemiord');
    }
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
    $this->opordpag = $this->getOpordpagOrCreate();
    try{ $this->updateOpordpagFromRequest();}catch(Exception $ex){}
    $this->grabo="";
    Herramientas::CargarDatosGrid($this,$this->obj);
    if ($this->getRequestParameter('opordpag[documento]')=='N')
      { $this->configGrid();}
      else { $this->configGrid2();}

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('',$err.' para Código Presupuestario '.$this->codigo);
      }

     if($this->coderror2!=-1)
     {
      $err1 = Herramientas::obtenerMensajeError($this->coderror2);
      $this->getRequest()->setError('',$err1.' del Codigo Presupuestario '.$this->codigo.'el Monto disponible es '.$this->monto);
     }

      if($this->coderror3!=-1)
     {
       $err1 = Herramientas::obtenerMensajeError($this->coderror3);
       $this->getRequest()->setError('',$err1);
     }

     if($this->coderror4!=-1)
     {
       $err2 = Herramientas::obtenerMensajeError($this->coderror4);
       $this->getRequest()->setError('',$err2);
     }

      if($this->coderror5!=-1)
     {
       $err3 = Herramientas::obtenerMensajeError($this->coderror5);
       $this->getRequest()->setError('',$err3);
     }
     if($this->coderror6!=-1)
     {
       $err3 = Herramientas::obtenerMensajeError($this->coderror6);
       $this->getRequest()->setError('opordpag{fecemi}',$err3);
     }
     if($this->salvarretencion!=-1)
     {
       $err4 = Herramientas::obtenerMensajeError($this->salvarretencion);
       $this->getRequest()->setError('',$err4);
     }
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
  protected function saveOpordpag($opordpag)
  {
  	$numerocomp="";
    if ($opordpag->getId())
    {
      $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);
      OrdendePago::actualizarPagemiord($opordpag,$factura);
    }
    else
    {
      $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
      $form="sf_admin/pagemiord/confincomgen";
      if ($concom!=1)
      {
       $grabo=$this->getUser()->getAttribute('grabo',null,$form.'1');
       $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'1');
      }
      else
      {
       $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
       $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      }

      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          //Verificamos el formato del correlativo,
 		  //ya que es parametrizable
	      $c = new Criteria();
    	  $c->add(OpdefempPeer::CODEMP,'001');
    	  $per = OpdefempPeer::doSelectOne($c);
           if ($this->getUser()->getAttribute('confcorcom')=='N')
           {  $numcom = H::iif($per->getOrdconpre()=='t',$reftra,$numcom); }
           else
           {  $numcom = H::iif($per->getOrdconpre()=='t','OP'.substr($numcom = Comprobante::Buscar_Correlativo(),2,strlen($numcom)),$numcom); }
          $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
          $opordpag->setNumcom($numcom);
          $numerocomp = $numcom;
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'1');
      $this->comprobaut="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('generales',$varemp))
  	   	  if(array_key_exists('comprobaut',$varemp['generales']))
		  {
		  	$this->comprobaut=$varemp['generales']['comprobaut'];
		  }

     $detalle=Herramientas::CargarDatosGrid($this,$this->obj);
     if ($this->getRequestParameter('opordpag[vacio]')=='1')
     { $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);}
     else { $factura=Herramientas::CargarDatosGrid($this,$this->obj2,true);}
     $retenc=Herramientas::CargarDatosGrid($this,$this->obj6,true);
     OrdendePago::salvarPagemiord($opordpag,$detalle,$factura,$retenc,$opordpag->getReferencias(),$opordpag->getCuentarendicion(),$numerocomp,$this->comprobaut);

     if ($opordpag->getTipcau()==$this->ordpagnom)
     {
       $aux=split('_',$opordpag->getDatosnomina());
       if ($aux[4]!='N')
       $sql="DELETE FROM NPCIENOM WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And CODBAN='".$aux[2]."' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."' AND CODNOMESP='".$aux[5]."'";
       else $sql="DELETE FROM NPCIENOM WHERE CODNOM='".$aux[0]."' And CODTIPGAS='".$aux[1]."' And CODBAN='".$aux[2]."' And (ASIDED='A' OR ASIDED='D') And FECNOM=TO_DATE('".$aux[3]."','YYYY-MM-DD') AND ESPECIAL='".$aux[4]."'";
       Herramientas::insertarRegistros($sql);
     }
     //aportes
     if ($opordpag->getTipcau()==$this->ordpagapo)
     {
      $sql="DELETE FROM NPCIENOM WHERE  CODCON='".$this->getRequestParameter('codigoaporte')."' And CodTipGas='".$this->getRequestParameter('gasto2')."' AND FECNOM=TO_DATE('".$this->getRequestParameter('fecnom')."','YYYY-MM-DD')";
      Herramientas::insertarRegistros($sql);
     }
    //liquidacion
     if ($opordpag->getTipcau()==$this->ordpagliq)
     {
      if ($this->getRequestParameter('codigoemp')!="")
      {
        $sql="UPDATE NPLiquidacion_det set NumOrd='".$opordpag->getNumord()."' where CodEmp='".$this->getRequestParameter('codigoemp')."'";
        Herramientas::insertarRegistros($sql);
      }
     }
     //fideicomiso
     if ($opordpag->getTipcau()==$this->ordpagfid)
     {
       if ($this->getRequestParameter('lanomina')!="" && $this->getRequestParameter('lafecha')!="")
       {
      $sql="UPDATE npordfid set NumOrd='".$opordpag->getNumord()."' where Codnom='".$this->getRequestParameter('lanomina')."' And Fecha='".$this->getRequestParameter('lafecha')."'";
      Herramientas::insertarRegistros($sql);
       }
     }
     if($opordpag->getTipcau()==$this->ordpagcre)
     {
        CreditosIntegracion::actualizarLiquidacionCreditos($opordpag, $this->getRequestParameter('refcre',''));
     }
   }
   $this->getUser()->getAttributeHolder()->remove('presiona','pagemiord');
 }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOpordpagFromRequest()
  {
    $opordpag = $this->getRequestParameter('opordpag');
    $this->setVars();
    if (isset($opordpag['numord']))
    {
      $this->opordpag->setNumord($opordpag['numord']);
    }
    if (isset($opordpag['fecemi']))
    {
      if ($opordpag['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecemi']))
          {
            $value = $dateFormat->format($opordpag['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecemi(null);
      }
    }
    if (isset($opordpag['tipcau']))
    {
      $this->opordpag->setTipcau($opordpag['tipcau']);
    }
    if (isset($opordpag['nomext']))
    {
      $this->opordpag->setNomext($opordpag['nomext']);
    }
    if (isset($opordpag['desord']))
    {
      $this->opordpag->setDesord($opordpag['desord']);
    }
    if (isset($opordpag['cedrif']))
    {
      $this->opordpag->setCedrif($opordpag['cedrif']);
    }
    if (isset($opordpag['nomben']))
    {
      $this->opordpag->setNomben($opordpag['nomben']);
    }
    if (isset($opordpag['nombensus']))
    {
      $this->opordpag->setNombensus($opordpag['nombensus']);
    }
    if (isset($opordpag['ctapag']))
    {
      $this->opordpag->setCtapag($opordpag['ctapag']);
    }
    if (isset($opordpag['descta']))
    {
      $this->opordpag->setDescta($opordpag['descta']);
    }
    if (isset($opordpag['coduni']))
    {
      $this->opordpag->setCoduni($opordpag['coduni']);
    }
    if (isset($opordpag['desubi']))
    {
      $this->opordpag->setDesubi($opordpag['desubi']);
    }
    if (isset($opordpag['tipfin']))
    {
      $this->opordpag->setTipfin($opordpag['tipfin']);
    }
    if (isset($opordpag['nomext2']))
    {
      $this->opordpag->setNomext2($opordpag['nomext2']);
    }
    if (isset($opordpag['obsord']))
    {
      $this->opordpag->setObsord($opordpag['obsord']);
    }
    if (isset($opordpag['monord']))
    {
      $this->opordpag->setMonord($opordpag['monord']);
    }
    if (isset($opordpag['mondes']))
    {
      $this->opordpag->setMondes($opordpag['mondes']);
    }
    if (isset($opordpag['monret']))
    {
      $this->opordpag->setMonret($opordpag['monret']);
    }
    if (isset($opordpag['status']))
    {
      $this->opordpag->setStatus($opordpag['status']);
    }
    if (isset($opordpag['referencias']))
    {
      $this->opordpag->setReferencias($opordpag['referencias']);
    }
    if (isset($opordpag['documento']))
    {
      $this->opordpag->setDocumento($opordpag['documento']);
    }
    if (isset($opordpag['afectapre']))
    {
      $this->opordpag->setAfectapre($opordpag['afectapre']);
    }
    if (isset($opordpag['totalcomprobantes']))
    {
      $this->opordpag->setTotalcomprobantes($opordpag['totalcomprobantes']);
    }
    if (isset($opordpag['cuentarendicion']))
    {
      $this->opordpag->setCuentarendicion($opordpag['cuentarendicion']);
    }
    if (isset($opordpag['vacio']))
    {
      $this->opordpag->setVacio($opordpag['vacio']);
    }
    if (isset($opordpag['presiono']))
    {
      $this->opordpag->setPresiono($opordpag['presiono']);
    }
    if (isset($opordpag['neto']))
    {
      $this->opordpag->setNeto($opordpag['neto']);
    }
    if (isset($opordpag['totfonter']))
    {
      $this->opordpag->setTotfonter($opordpag['totfonter']);
    }
    if (isset($opordpag['numsigecof']))
    {
      $this->opordpag->setNumsigecof($opordpag['numsigecof']);
    }
    if (isset($opordpag['fecsigecof']))
    {
      if ($opordpag['fecsigecof'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecsigecof']))
          {
            $value = $dateFormat->format($opordpag['fecsigecof'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecsigecof'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecsigecof($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecsigecof(null);
      }
    }
    if (isset($opordpag['expsigecof']))
    {
      $this->opordpag->setExpsigecof($opordpag['expsigecof']);
    }
    if (isset($opordpag['datosnomina']))
    {
      $this->opordpag->setDatosnomina($opordpag['datosnomina']);
    }
    if (isset($opordpag['codconcepto']))
    {
      $this->opordpag->setCodconcepto($opordpag['codconcepto']);
    }
    if (isset($opordpag['numforpre']))
    {
      $this->opordpag->setNumforpre($opordpag['numforpre']);
    }
    if (isset($opordpag['numcta']))
    {
      $this->opordpag->setNumcta($opordpag['numcta']);
  }
    if (isset($opordpag['tipdoc']))
    {
      $this->opordpag->setTipdoc($opordpag['tipdoc']);
    }
  }

  protected function getOpordpagOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $opordpag = new Opordpag();
      $this->configGrid();
      $this->configGridApliret();
      $ar11=array();
      $ar11[0]=array();
      $ar22=array();
      $ar22[0]=array();
      $ar1=OrdendePago::llenarComboIva($ar11,'','','','');
      $ar2=OrdendePago::llenarComboIslr($ar22,'','');
      $this->configGridFactura('',$ar1,$ar2);
      $this->configGridConsulRet();
      $this->configGridRetenciones();
    }
    else
    {
      $opordpag = OpordpagPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGridConsulta($opordpag->getNumord());
      $this->configGridFactura($opordpag->getNumord());
      $this->configGridConsulRet($opordpag->getNumord());
      $this->configGridApliret();
      $this->configGridRetenciones();
      $this->forward404Unless($opordpag);
    }

    return $opordpag;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
     $c = new Criteria();
     $c->add(OpdetordPeer::NUMORD,$codigo);
     $per = OpdetordPeer::doSelect($c);

    $this->numconsul=count($per);
    $mascaraformato=$this->mascarapresupuesto;
    $lonpre=strlen($this->mascarapresupuesto);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Opdetord');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(150);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');
    $col1->setJScript('onClick="totalmarcadas(this.id)"');

    $obj= array('codpre' => 2);
    $col2 = new Columna('Código Presupuestario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpre');
    $col2->setHTML('type="text" size="25" maxlength="'.chr(39).$lonpre.chr(39).'"');
    $col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraformato.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,6);" onBlur="javascript:event.keyCode=13;ajax(event,this.id)"');
    $col2->setCatalogo('Cpasiini','sf_admin_edit_form',$obj,'Cpasiini_Pagemiord');

    $col3 = new Columna('Monto a Causar');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('moncau');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" maxlength="21"');
    $col3->setJScript('onKeyPress="entermonto(event,this.id); sumardatosgrid2(event);" onBlur="javascript:event.keyCode=13; disponibilidad(event,this.id)"');
    $col3->setEsTotal(true,'opordpag_monord');

    $col4 = clone $col3;
    $col4->setTitulo('Retenciones');
    $col4->setNombreCampo('monret');
    $col4->setHTML('readonly=true');
    $col4->setEsTotal(true,'opordpag_monret');

    $col5 = clone $col3;
    $col5->setTitulo('Amortización');
    $col5->setNombreCampo('mondes');
    $col5->setJScript('onKeyPress="entermonto(event,this.id); sumardatosgrid2(event);"');
    $col5->setEsTotal(true,'opordpag_mondes');

    $col6 = new Columna('Aplica Iva');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('retiva');
    $col6->setHTML('type="text" size="10"');
    $col6->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($per);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($codigo='')
  {
      $c = new Criteria();
      $c->add(OpdetordPeer::NUMORD,$codigo);
      $per = OpdetordPeer::doSelect($c);

      $this->numconsul=count($per);

  $opciones = new OpcionesGrid();
  $opciones->setEliminar(false);
    $opciones->setTabla('Opdetord');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(150);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');
    $col1->setJScript('onClick="totalmarcadas(this.id)"');

    $col2 = new Columna('Código Presupuestario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpre');
    $col2->setHTML('type="text" size="25" readonly=true');

    $col3 = new Columna('Monto a Causar');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('moncau');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="15" readonly=true');
    $col3->setEsTotal(true,'opordpag_monord');

    $col4 = clone $col3;
    $col4->setTitulo('Retenciones');
    $col4->setNombreCampo('monret');
    $col4->setEsTotal(true,'opordpag_monret');

    $col5 = clone $col3;
    $col5->setTitulo('Amortización');
    $col5->setNombreCampo('mondes');
    $col5->setHTML('type="text" size="15"');
    $col5->setJScript('onKeypress="entermonto(event,this.id); sumardatosgrid2(event);"');
    $col5->setEsTotal(true,'opordpag_mondes');

    $col6 = new Columna('Aplica Iva');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('retiva');
    $col6->setHTML('type="text" size="25"');
    $col6->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulta($codigo='',$otrotipo='',$arreglo=array())
  {
    if ($otrotipo=='OPNN' || $otrotipo=='APOR' || $otrotipo=='LIQU' || $otrotipo=='OPFD' || $otrotipo=='OPVA')
    { $reg=$arreglo;
    }
    else
    {
     $c = new Criteria();
     $c->add(OpdetordPeer::NUMORD,$codigo);
     $reg = OpdetordPeer::doSelect($c);
    }
    $this->numconsul=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opdetord');
    $opciones->setAnchoGrid(700);
    $opciones->setAncho(750);
    $opciones->setFilas(0);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');
    $col1->setOculta(true);

    $col2 = new Columna('Código Presupuestario');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codpre');
    $col2->setHTML('type="text" size="25" readonly=true');

    $col3 = new Columna('Monto a Causar');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('moncau');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly="true"');
    $col3->setEsTotal(true,'opordpag_monord');

    $col4 = clone $col3;
    $col4->setTitulo('Retenciones');
    $col4->setNombreCampo('monret');
    $col4->setEsTotal(true,'opordpag_monret');

    $col5 = clone $col3;
    $col5->setTitulo('Amortización');
    $col5->setNombreCampo('mondes');
    $col5->setEsTotal(true,'opordpag_mondes');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFactura($codigo='',$arreglo1=array(),$arreglo2=array(),$arreglo3=array())
  {
    $sql="SELECT b.fecfac as fecfac, (CASE when b.tiptra='01' THEN b.numfac
  else '' END) as numfac,b.numctr as numctr,(CASE when b.tiptra='02' THEN b.numfac
  else '' END) as notdeb,(CASE when b.tiptra='03' THEN b.numfac
  else '' END) as notcrd,b.tiptra as tiptra,b.facafe as facafe,b.poriva as poriva,b.totfac as totfac,b.exeiva as exeiva,
  b.basimp as basimp,b.monret as monret,b.moniva as moniva,(CASE when b.basltf!=0 THEN 1
  else 0 END) as unocien,b.basltf as basltf,b.porltf as porltf,b.monltf as monltf,(CASE when b.basislr!=0 THEN 1
  else 0 END) as impusob,b.basislr as basislr,b.porislr as porislr,b.monislr as monislr,b.codislr as codislr,b.rifalt as rifalt,a.nomben as nomben,b.basirs as basirs,b.porirs as porirs,b.monirs as monirs,b.codirs as codirs,b.id as id
  from opfactur b left outer join opbenefi a on b.rifalt=a.cedrif where b.numord='".$codigo."'";

    $resp = Herramientas::BuscarDatos($sql,&$reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true,'colocarmonto(this.id)');
    $opciones->setTabla('Opfactur');
    $opciones->setAnchoGrid(2800);
    $opciones->setAncho(2800);
    $opciones->setTitulo('Facturas');
    $opciones->setName('b');
    $opciones->setFilas(150);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Fecha Factura');
    $col1->setTipo(Columna::FECHA);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('fecfac');
    $col1->setHTML(' ');
    $col1->setVacia(true);

    $col2 = new Columna('Factura Nro.');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('numfac');
    $col2->setHTML('type="text" size="15" maxlength="20"');
    $col2->setJScript('onBlur="javascript:event.keyCode=13; nrofacturadeshabilitar(event,this.id);"');

    $col3 = new Columna('Nro. Control');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('numctr');
    $col3->setHTML('type="text" size="15" maxlength="20"');

    $col4 = new Columna('Nota Débito');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('notdeb');
    $col4->setHTML('type="text" size="15" maxlength="20"');
    $col4->setJScript('onkeyPress="javascript: debitodeshabilitar(event,this.id)"');

    $col5 = new Columna('Nota de Crédito');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('notcrd');
    $col5->setHTML('type="text" size="15" maxlength="20"');
    $col5->setJScript('onkeyPress="javascript: creditodeshabilitar(event,this.id)"');

    $col6 = new Columna('Tipo de Transacción');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('tiptra');
    $col6->setHTML('type="text" size="4" readonly="true" maxlength="2"');

    $col7 = new Columna('Factura Afectada');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('facafe');
    $col7->setHTML('type="text" size="15" maxlength="20"');

    $col8 = new Columna('% Alícuota');
    $col8->setTipo(Columna::COMBO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('poriva');
    $col8->setCombo($arreglo1);
    $col8->setHTML(' ');
    $col8->setJScript('onChange="totalizar2(this.id);"');

    $col9 = new Columna('Total Factura');
    $col9->setTipo(Columna::MONTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionContenido(Columna::DERECHA);
    $col9->setAlineacionObjeto(Columna::DERECHA);
    $col9->setNombreCampo('totfac');
    $col9->setHTML('type="text" size="15" maxlength="21"');
    $col9->setEsNumerico(true);
    $col9->setJScript('onKeypress="entermonto_b(event,this.id); totalizar(event,this.id);" onBlur="javascript:event.keyCode=13; validacau(this.id)"');
    $col9->setEsTotal(true,'totfac');

    $col10 = new Columna('Exento Iva');
    $col10->setTipo(Columna::MONTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionContenido(Columna::DERECHA);
    $col10->setAlineacionObjeto(Columna::DERECHA);
    $col10->setNombreCampo('exeiva');
    $col10->setHTML('type="text" size="15" maxlength="21"');
    $col10->setEsNumerico(true);
    $col10->setJScript('onKeypress="entermonto_b(event,this.id); totalizar(event,this.id);"');
    $col10->setEsTotal(true,'totexen');

    $col11 = new Columna('Base Imponible');
    $col11->setTipo(Columna::MONTO);
    $col11->setEsGrabable(true);
    $col11->setAlineacionContenido(Columna::DERECHA);
    $col11->setAlineacionObjeto(Columna::DERECHA);
    $col11->setNombreCampo('basimp');
    $col11->setEsNumerico(true);
    $col11->setJScript('onKeypress="entermonto_b(event,this.id); totalizar(event,this.id);"');
    $col11->setHTML('size="15"');
    $col11->setEsTotal(true,'totbas');

    $col12 = new Columna('Impuesto');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionContenido(Columna::DERECHA);
    $col12->setAlineacionObjeto(Columna::DERECHA);
    $col12->setNombreCampo('moniva');
    $col12->setEsNumerico(true);
    $col12->setJScript('onKeypress="entermonto_b(event,this.id)"');
    $col12->setHTML('size="15"');
    $col12->setEsTotal(true,'totiva');

    $col13 = new Columna('IVA Retenido');
    $col13->setTipo(Columna::MONTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionContenido(Columna::DERECHA);
    $col13->setAlineacionObjeto(Columna::DERECHA);
    $col13->setNombreCampo('monret');
    $col13->setEsNumerico(true);
    $col13->setJScript('onKeypress="entermonto_b(event,this.id)"');
    $col13->setHTML(' size="15"');
    $col13->setEsTotal(true,'totimp');

    $col14 = new Columna('1x100');
    $col14->setTipo(Columna::CHECK);
    $col14->setNombreCampo('unocien');
    $col14->setEsGrabable(true);
    $col14->setHTML(' ');
    $col14->setJScript('onClick="unoxmil(this.id)"');

    $col15 = new Columna('Base Imponible 1xMil');
    $col15->setTipo(Columna::MONTO);
    $col15->setEsGrabable(true);
    $col15->setAlineacionContenido(Columna::DERECHA);
    $col15->setAlineacionObjeto(Columna::DERECHA);
    $col15->setNombreCampo('basltf');
    $col15->setEsNumerico(true);
    $col15->setJScript(' onblur="javascript:recalunoxmil(this.id);" ');
    $col15->setHTML('size="15"');
    $col15->setEsTotal(true,'totbasmil');

    $col16 = new Columna('% 1xMil');
    $col16->setTipo(Columna::MONTO);
    $col16->setEsGrabable(true);
    $col16->setAlineacionContenido(Columna::DERECHA);
    $col16->setAlineacionObjeto(Columna::DERECHA);
    $col16->setNombreCampo('porltf');
    $col16->setEsNumerico(true);
    $col16->setJScript(' ');
    $col16->setHTML('readonly="true"');

    $col17 = new Columna('Monto 1xMil');
    $col17->setTipo(Columna::MONTO);
    $col17->setEsGrabable(true);
    $col17->setAlineacionContenido(Columna::DERECHA);
    $col17->setAlineacionObjeto(Columna::DERECHA);
    $col17->setNombreCampo('monltf');
    $col17->setEsNumerico(true);
    $col17->setJScript(' ');
    $col17->setHTML('readonly="true" size="15"');
    $col17->setEsTotal(true,'totmontmil');

    $col18 = new Columna('I.S.L.R');
    $col18->setTipo(Columna::CHECK);
    $col18->setNombreCampo('impusob');
    $col18->setEsGrabable(true);
    $col18->setHTML(' ');
    $col18->setJScript('onClick="islr(this.id)"');

    $col19 = new Columna('Base Imponible I.S.L.R');
    $col19->setTipo(Columna::MONTO);
    $col19->setEsGrabable(true);
    $col19->setAlineacionContenido(Columna::DERECHA);
    $col19->setAlineacionObjeto(Columna::DERECHA);
    $col19->setNombreCampo('basislr');
    $col19->setEsNumerico(true);
    $col19->setJScript(' onblur="javascript:recalislr(this.id);"');
    $col19->setHTML('size="15"');
    $col19->setEsTotal(true,'totbasislr');

    $col20 = new Columna('% I.S.L.R');
    $col20->setTipo(Columna::COMBO);
    $col20->setEsGrabable(true);
    $col20->setNombreCampo('porislr');
    $col20->setCombo($arreglo2);
    $col20->setHTML(' ');

    $col21 = new Columna('Monto I.S.L.R');
    $col21->setTipo(Columna::MONTO);
    $col21->setEsGrabable(true);
    $col21->setAlineacionContenido(Columna::DERECHA);
    $col21->setAlineacionObjeto(Columna::DERECHA);
    $col21->setNombreCampo('monislr');
    $col21->setEsNumerico(true);
    $col21->setJScript(' ');
    $col21->setHTML('readonly="true" size="15"');
    $col21->setEsTotal(true,'totmontislr');

    $col22 = new Columna('islr');
    $col22->setTipo(Columna::TEXTO);
    $col22->setEsGrabable(true);
    $col22->setAlineacionObjeto(Columna::CENTRO);
    $col22->setAlineacionContenido(Columna::CENTRO);
    $col22->setNombreCampo('codislr');
    $col22->setHTML('type="text" size="15"');
    $col22->setOculta(true);

    $col23 = new Columna('C.I / R.I.F');
    $col23->setTipo(Columna::TEXTO);
    $col23->setAlineacionObjeto(Columna::CENTRO);
    $col23->setAlineacionContenido(Columna::CENTRO);
    $col23->setEsGrabable(true);
    $col23->setNombreCampo('rifalt');
    $objos= array('cedrif' => 23,'nomben' => 24);
    $col23->setCatalogo('opbenefi','sf_admin_edit_form', $objos,'Opbenefi_Pagemiord');
    $col23->setHTML('type="text" size="15" maxlength="15"');
    $col23->setAjax('pagemiord',24,24);

    $col24 = new Columna('Descripción');
    $col24->setTipo(Columna::TEXTO);
    $col24->setAlineacionObjeto(Columna::IZQUIERDA);
    $col24->setAlineacionContenido(Columna::IZQUIERDA);
    $col24->setNombreCampo('nomben');
    $col24->setHTML('type="text" size="20" readonly="true"');

    $col25 = new Columna('I.R.S');
    $col25->setTipo(Columna::CHECK);
    $col25->setNombreCampo('imprs');
    $col25->setEsGrabable(true);
    $col25->setHTML(' ');
    $col25->setJScript('onClick="irs(this.id)"');

    $col26 = new Columna('Base Imponible I.R.S');
    $col26->setTipo(Columna::MONTO);
    $col26->setEsGrabable(true);
    $col26->setAlineacionContenido(Columna::DERECHA);
    $col26->setAlineacionObjeto(Columna::DERECHA);
    $col26->setNombreCampo('basirs');
    $col26->setEsNumerico(true);
    $col26->setJScript(' onblur="javascript:recalirs(this.id);"');
    $col26->setHTML('size="15"');
    $col26->setEsTotal(true,'totbasirs');

    $col27 = new Columna('% I.R.S');
    $col27->setTipo(Columna::COMBO);
    $col27->setEsGrabable(true);
    $col27->setNombreCampo('porirs');
    $col27->setCombo($arreglo3);
    $col27->setHTML(' ');

    $col28 = new Columna('Monto I.R.S');
    $col28->setTipo(Columna::MONTO);
    $col28->setEsGrabable(true);
    $col28->setAlineacionContenido(Columna::DERECHA);
    $col28->setAlineacionObjeto(Columna::DERECHA);
    $col28->setNombreCampo('monirs');
    $col28->setEsNumerico(true);
    $col28->setJScript(' ');
    $col28->setHTML('readonly="true" size="15"');
    $col28->setEsTotal(true,'totmontirs');

    $col29 = new Columna('irs');
    $col29->setTipo(Columna::TEXTO);
    $col29->setEsGrabable(true);
    $col29->setAlineacionObjeto(Columna::CENTRO);
    $col29->setAlineacionContenido(Columna::CENTRO);
    $col29->setNombreCampo('codirs');
    $col29->setHTML('type="text" size="15"');
    $col29->setOculta(true);


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);
    $opciones->addColumna($col21);
    $opciones->addColumna($col22);
    $opciones->addColumna($col23);
    $opciones->addColumna($col24);
    $opciones->addColumna($col25);
    $opciones->addColumna($col26);
    $opciones->addColumna($col27);
    $opciones->addColumna($col28);
    $opciones->addColumna($col29);

    $this->obj2 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRefere($codigo='')
  {
    $c = new Criteria();
    $c->add(CpimpprcPeer::REFPRC,$codigo);
    $reg = CpimpprcPeer::doSelect($c);

    $this->numfila=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Cpimpprc');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(0);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setName('c');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="25" readonly=true');

    $col2 = new Columna('Monto a Causar');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionContenido(Columna::DERECHA);
    $col2->setAlineacionObjeto(Columna::DERECHA);
    $col2->setNombreCampo('monimpaju');
    $col2->setEsNumerico(true);
    $col2->setJScript('onKeypress="entermonto_c(event,this.id)"');
    $col2->setHTML('type="text" size="15" readonly=true');

    $col3 = clone $col2;
    $col3->setTitulo('Incremento');
    $col3->setNombreCampo('moncau');

    $col4 = clone $col2;
    $col4->setTitulo('Monto Causado');
    $col4->setNombreCampo('moncau');

    $col5 = clone $col2;
    $col5->setTitulo('Monto por Causar');
    $col5->setNombreCampo('montrue');
    $q= new Criteria();
    $regi= OpdefempPeer::doSelectOne($q);
    if ($regi)
    {
      $cautot=$regi->getOrdcomptot();
    }else $cautot="";
    if ($cautot=='S')
    {$col5->setHTML('type="text" size="15" maxlength="21" readonly=true');}
    else { $col5->setHTML('type="text" size="15" maxlength="21"'); }
    $col5->setJScript('onKeypress="entermonto_c(event,this.id); calculo(event,this.id);"');
    $col5->setEsTotal(true,'totalcau');

    $col6 = clone $col2;
    $col6->setTitulo('Monto ajuste');
    $col6->setNombreCampo('montrue');
    $col6->setEsTotal(true,'total');
    $col6->setOculta(true);

    $col7 = clone $col1;
    $col7->setTitulo('Aplica Iva');
    $col7->setNombreCampo('retiva');
    $col7->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    $this->obj4 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRefere2($codigo='')
  {
    $c = new Criteria();
    $c->add(CpimpcomPeer::REFCOM,$codigo);
    $reg = CpimpcomPeer::doSelect($c);

    $this->numfila=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Cpimpcom');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(0);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setName('c');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="25" readonly=true');

    $col2 = new Columna('Comprometido');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionContenido(Columna::DERECHA);
    $col2->setAlineacionObjeto(Columna::DERECHA);
    $col2->setNombreCampo('comprometido');
    $col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="15" readonly=true');
    $col2->setEsTotal(true,'totalcomprometido');

    $col3 = clone $col2;
    $col3->setTitulo('Incremento');
    $col3->setNombreCampo('moncau');
    $col3->setOculta(true);

    $col4 = clone $col2;
    $col4->setTitulo('Monto Causado');
    $col4->setNombreCampo('moncau');

    $col5 = clone $col2;
    $col5->setTitulo('Monto por Causar');
    $col5->setNombreCampo('acausar');
     $q= new Criteria();
    $regi= OpdefempPeer::doSelectOne($q);
    if ($regi)
    {
      $cautot=$regi->getOrdcomptot();
    }else $cautot="";
    if ($cautot=='S')
    {$col5->setHTML('type="text" size="15" maxlength="21" readonly=true');}
    else { $col5->setHTML('type="text" size="15" maxlength="21"'); }
    $col5->setJScript('onKeypress=" entermonto_c(event,this.id); calculo(event,this.id);"');
    $col5->setEsTotal(true,'totalcau');

    $col6 = clone $col2;
    $col6->setTitulo('Monto ajuste');
    $col6->setNombreCampo('acausar');
    $col6->setEsTotal(true,'total');
    $col6->setOculta(true);

    $col7 = clone $col1;
    $col7->setTitulo('Aplica Iva');
    $col7->setNombreCampo('retiva');
    $col7->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    $this->obj4 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulRet($codigo='')
  {
    $SQL1 = "select (CASE when a.numret!='NOASIGNA' THEN a.numret
else '' END) as numret,a.codtip,b.destip,b.basimp,b.porret,b.factor,b.porsus,b.unitri,
(CASE when d.codret=a.codtip THEN 'S'
else 'N' END) as esta,
(CASE when c.codret=a.codtip and c.codrep='002' THEN 'S'
else 'N' END) as estaislr,
(CASE when c.codret=a.codtip and c.codrep='003' THEN 'S'
else 'N' END) as esta1xmil,
round(sum(a.monret),2 ) as montoret, (CASE when c.codret=a.codtip and c.codrep='005' THEN 'S'
else 'N' END) as estairs,1 as id, count(d.codret) as valor
 from  optipret b,(select distinct(codret) from tsretiva) d RIGHT outer join (opretord a left outer join tsrepret c on c.codret = a.codtip) on d.codret=a.codtip
 where a.numord = '".$codigo."'
 and a.codtip = b.codtip
group by numret,a.codtip,b.destip,b.basimp,b.porret,b.factor,b.porsus,b.unitri,c.codrep,c.codret,d.codret";
     $resp = Herramientas::BuscarDatos($SQL1,&$reg);

    $this->numretencion=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opretord');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setFilas(0);
    $opciones->setTitulo('Retenciones');
    $opciones->setName('d');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Num. Retención');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('numret');
    $col1->setHTML('type="text" size="10" readonly="true"');

    $col2 = clone $col1;
    $col2->setTitulo('Tipo');
    $col2->setNombreCampo('codtip');
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="10" readonly="true"');

    $col3 = clone $col1;
    $col3->setTitulo('Descripción');
    $col3->setNombreCampo('destip');
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setHTML('type="text" size="40" readonly="true"');

    $col4 = new Columna('Base');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('basimp');
    $col4->setEsNumerico(true);
    $col4->setOculta(true);

    $col5 = clone $col4;
    $col5->setTitulo('Porcentaje');
    $col5->setNombreCampo('porret');

    $col6 = clone $col4;
    $col6->setTitulo('Factor');
    $col6->setNombreCampo('factor');

    $col7 = clone $col4;
    $col7->setTitulo('% sustraendo');
    $col7->setNombreCampo('porsus');

    $col8 = clone $col4;
    $col8->setTitulo('unidad');
    $col8->setNombreCampo('unitri');

    $col9 = clone $col1;
    $col9->setTitulo('Esta');
    $col9->setNombreCampo('esta');
    $col9->setOculta(true);

    $col10 = clone $col1;
    $col10->setTitulo('EstaISLR');
    $col10->setNombreCampo('estaislr');
    $col10->setOculta(true);

    $col11 = clone $col1;
    $col11->setTitulo('Esta1xmil');
    $col11->setNombreCampo('esta1xmil');
    $col11->setOculta(true);

    $col12= new Columna('Monto');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setAlineacionContenido(Columna::DERECHA);
    $col12->setAlineacionObjeto(Columna::DERECHA);
    $col12->setNombreCampo('montoret');
    $col12->setEsNumerico(true);
    $col12->setHTML('type="text" size="15" readonly="true"');
    $col12->setEsTotal(true,'total');

    $col13 = clone $col1;
    $col13->setTitulo('EstaIRS');
    $col13->setNombreCampo('estairs');
    $col13->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);

    $this->obj3 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridApliRet()
  {
    $reg = array();
    $this->numret=count($reg);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Optipret');
    $opciones->setAnchoGrid(850);
    $opciones->setAncho(850);
    $opciones->setTitulo('Datos de las Retenciones');
    $opciones->setFilas(20);
    $opciones->setName('e');
    $opciones->setHTMLTotalFilas(' ');

    $params= array('param1' => "'+$('opordpag_cedrif').value+'", 'val2');

    $col1 = new Columna('Tipo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codtip');
    $objs= array('codtip' => 1,'destip' => 2,'codcon' => 3,'basimp' => 4, 'porret' => 5,'factor' => 6,'porsus' => 7,'unitri' => 8,'esta' => 9,'estaislr' => 12,'esta1xmil' => 13,'montoiva' => 14);
    $col1->setCatalogo('Optipret','sf_admin_edit_form', $objs,'Optipret_Pagemiret',$params);
    $col1->setHTML('type="text" size="10" maxlength="3"');
    $col1->setJScript('onKeypress="perderfocus(event,this.id,14);" onBlur="javascript:event.keyCode=13; ajaxretenciones(event,this.id);"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('destip');
    $col2->setHTML('type="text" size="20" readonly="true"');

    $col3 = new Columna('Contable');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcon');
    $col3->setOculta(true);

    $col4 = new Columna('Base');
    $col4->setTipo(Columna::MONTO);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('basimp');
    $col4->setEsNumerico(true);
    $col4->setOculta(true);

    $col5 = clone $col4;
    $col5->setTitulo('Porcentaje');
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('porret');

    $col6 = clone $col4;
    $col6->setTitulo('Factor');
    $col6->setNombreCampo('factor');

    $col7 = clone $col4;
    $col7->setTitulo('% sustraendo');
    $col7->setNombreCampo('porsus');

    $col8 = clone $col4;
    $col8->setTitulo('unidad');
    $col8->setNombreCampo('unitri');

    $col9 = clone $col3;
    $col9->setTitulo('Esta');
    $col9->setNombreCampo('esta');

    $col10 = new Columna('Base para el calculo');
    $col10->setTipo(Columna::MONTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionContenido(Columna::DERECHA);
    $col10->setAlineacionObjeto(Columna::DERECHA);
    $col10->setNombreCampo('base');
    $col10->setEsNumerico(true);
    $col10->setHTML('type="text" size="15" maxlength="21"');
    $col10->setJScript('onKeypress="entermonto_e(event,this.id);modifico(event); cambioBase(this.id);"');

    $col11 = clone $col10;
    $col11->setTitulo('Monto Retencion');
    $col11->setNombreCampo('montorete');
    $col11->setJScript('onKeypress="entermonto_e(event,this.id);modificar(event);"');
    $col11->setEsTotal(true,'totalmontorete');

    $col12 = clone $col3;
    $col12->setTitulo('EstaISLR');
    $col12->setNombreCampo('estaislr');

    $col13 = clone $col3;
    $col13->setTitulo('Esta1xmil');
    $col13->setNombreCampo('esta1xmil');

    $col14 = clone $col4;
    $col14->setTitulo('Montoiva');
    $col14->setNombreCampo('montoiva');

    $col15 = clone $col3;
    $col15->setTitulo('EstaIRS');
    $col15->setNombreCampo('estairs');

    $col16 = clone $col4;
    $col16->setTitulo('Monto Base Minimo');
    $col16->setNombreCampo('monbasmin');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);

    $this->obj5 = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRetenciones($arreglo1=array())
  {
    $per=$arreglo1;

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('opretord');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo(' ');
    $opciones->setFilas(300);
    $opciones->setName('f');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Codigo Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="25"');

    $col2 = clone $col1;
    $col2->setTitulo('Tipo de Retencion');
    $col2->setNombreCampo('codtip');

    $col3 = new Columna('Monto Retencion');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('monret');
    $col3->setEsNumerico(true);

    $col4 = clone $col1;
    $col4->setTitulo('Referencia');
    $col4->setNombreCampo('refere');

    $col5 = clone $col1;
    $col5->setTitulo('unomil');
    $col5->setNombreCampo('estaunomil');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj6 = $opciones->getConfig($per);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {$this->ajax='';
    $this->setVars();
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $cuenta=$this->getRequestParameter('cuenta');
    $descta=$this->getRequestParameter('descuenta');
    $cuentasec=$this->getRequestParameter('cuenta2');
    $javascript="";
  if ($this->getRequestParameter('ajax')=='1')
  {
   $c= new Criteria();
   $c->add(CpdoccauPeer::TIPCAU,$this->getRequestParameter('codigo'));
   $resultado=CpdoccauPeer::doSelectOne($c);
   if ($resultado)
   {
      $this->div='TIPCAU';
      $this->setVars();
      $this->tipcau=$this->getRequestParameter('codigo');
     $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));
     $this->afeprc=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Afeprc');
     $this->afecom=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Afecom');
     $this->afecau=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Afecau');
     if (($this->afeprc=='N') && ($this->afecom=='N') && ($this->afecau=='N'))
     {$dato2=0;}else {$dato2=1;}

     OrdendePago::partida(&$partidas);
     $par=$partidas;
     $this->docrefiere=CpdoccauPeer::getDato($this->getRequestParameter('codigo'),'Refier');

     if ($this->tipcau==$this->ordpagnom || $this->tipcau=="OPNN")
     {
       $this->configGridConsulta();
       $this->configGridRetenciones();
     }
     else if ($this->tipcau==$this->ordpagapo || $this->tipcau=="APOR")
     {
       $this->configGridConsulta();
     }
     else if ($this->tipcau==$this->ordpagliq || $this->tipcau=="LIQU")
     {
      $this->configGridConsulta();
        $this->configGridRetenciones();
     }
     else if ($this->tipcau==$this->ordpagfid || $this->tipcau=="OPFD")
     {
        $this->configGridConsulta();
     }
     else if ($this->tipcau==$this->ordpagval || $this->tipcau=="OPVA")
     {
        $this->configGridConsulta();
     }
     else
     {
        if ($this->docrefiere=='N')
        {
          $this->configGrid();
          $this->configGridApliret();
          $this->configGridRetenciones();
        }
        else
        {
          $this->configGrid2();
          $this->configGridRefere();
          $this->configGridRefere2();
          $this->configGridApliret();
          $this->configGridRetenciones();
        }
     }

     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["opordpag_afectapre","'.$dato2.'",""],["partidas","'.$par.'",""],["opordpag_documento","'.$this->docrefiere.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

   }
   else
   {
      $noexiste='S';
     $output = '[["noexistipcau","'.$noexiste.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  }
  else  if ($this->getRequestParameter('ajax')=='2')
  {
    $existe="S";
    $codigo=str_replace('@','.',$this->getRequestParameter('codigo'));
    $c= new Criteria();
    $c->add(OpbenefiPeer::CEDRIF,$codigo);
    $resul= OpbenefiPeer::doSelectOne($c);
    if ($resul)
    {
     $dato=OpbenefiPeer::getDato($codigo,'Nomben');
     $dato1=OpbenefiPeer::getDato($codigo,'Codcta');
     $dato2=OpbenefiPeer::getDato2($dato1,'Descta');
     if ($resul->getCodctasec()!='')
     {
       $this->div='CIRIF';
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""],["'.$cuentasec.'","'.$this->dato3.'",""],["existeben","'.$existe.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     }
     else
     {
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""],["'.$cuentasec.'","'.$this->dato3.'",""],["existeben","'.$existe.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
    }
    else
    {
     $existe="N";
     $output = '[["existeben","'.$existe.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
    }
  }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
    $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
    $dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cargable","'.$dato2.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $gen="";
    $dato=BnubicaPeer::getDato($this->getRequestParameter('codigo'),'Desubi');
    $this->dato1=BnubicaPeer::getDato($this->getRequestParameter('codigo'),'Stacod');
    if ($this->dato1=='C')
    {
      $gen=true;
    }else {$gen=false;}
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["generaotro","'.$gen.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='5')
  {
    $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='6')
  {$this->ajax='';
    $this->div='REF'; // div grid de la referencia
    $this->docrefiere=CpdoccauPeer::getRefier($this->getRequestParameter('tipcau'));
    $refcre = $this->getRequestParameter('refcre','');
    if ($this->docrefiere=='P')
    {
      OrdendePago::datosRefere($this->getRequestParameter('codigo'),$this->getRequestParameter('fecha2'),&$fecha,&$descripcion,&$tipo,&$destipo,&$elrif,&$descripcion2,&$msj);
      $fechas=$fecha;
      $descripcions=htmlspecialchars($descripcion);
      $descripcions=eregi_replace("[\n|\r|\n\r]", "", $descripcions);
      $descripcion2=htmlspecialchars($descripcion2);
      $descripcion2=eregi_replace("[\n|\r|\n\r]", "", $descripcion2);
      $tipos=$tipo;
      $destipos=$destipo;
      $dato=htmlspecialchars(OpbenefiPeer::getDato($elrif,'Nomben'));
      $dato1=OpbenefiPeer::getDato($elrif,'Codcta');
      $dato2=htmlspecialchars(OpbenefiPeer::getDato2($dato1,'Descta'));
      if ($msj=='')
      {
        $this->configGridRefere(str_pad($this->getRequestParameter('codigo'),8,'0',STR_PAD_LEFT));
      }else {$this->configGridRefere();}
      if ($this->getRequestParameter('observe')=="")
      {
        $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_desord","'.$descripcion2.'",""],["opordpag_cedrif","'.$elrif.'",""],["opordpag_nomben","'.$dato.'",""],["opordpag_ctapag","'.$dato1.'",""],["opordpag_descta","'.$dato2.'",""],["opordpag_observe","N",""]]';
      }else
      {
      	$output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_observe","N",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     }else if ($this->docrefiere=='C')
     {
        OrdendePago::datosRefere2($this->getRequestParameter('codigo'),$this->getRequestParameter('fecha2'),$this->getRequestParameter('arreglo'),&$fecha,&$descripcion,&$tipo,&$elrif,&$descripcion2,&$destipo,&$financiamiento,&$oppermanente,&$opper,&$msj);
        $fechas=$fecha;
        $descripcions=htmlspecialchars($descripcion);
        $descripcions=eregi_replace("[\n|\r|\n\r]", "", $descripcions);
        $descripcion2=htmlspecialchars($descripcion2);
        $descripcion2=eregi_replace("[\n|\r|\n\r]", "", $descripcion2);
        $tipos=$tipo;
        $destipos=$destipo;
        $dato=htmlspecialchars(OpbenefiPeer::getDato($elrif,'Nomben'));
        $dato1=OpbenefiPeer::getDato($elrif,'Codcta');
        $dato2=htmlspecialchars(OpbenefiPeer::getDato2($dato1,'Descta'));
        $dato3=htmlspecialchars(FortipfinPeer::getDesfin($financiamiento));

        if ($msj=='')
        {
         $this->configGridRefere2(str_pad($this->getRequestParameter('codigo'),8,'0',STR_PAD_LEFT));
        }else {
          $this->configGridRefere2();
        }
        if($refcre){
          $ccdetcuades = CcdetcuadesPeer::retrieveByPK($refcre);
          if($ccdetcuades){
            if($this->obj4['datos']){
              $this->obj4['datos'][0]->setMondescre($ccdetcuades->getMonto());
            }
            $elrif = $ccdetcuades->getRifter();
            $dato = $ccdetcuades->getNomter();
          }
        }
      	$this->cedrifdesh="";
        $varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('tesoreria',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
		     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
		       if(array_key_exists('cedrifdesh',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
		       {
		       	$this->cedrifdesh=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['cedrifdesh'];
		       }
		     }
		 if ($this->cedrifdesh=='S')
		 {
		 	$javascript=" $('opordpag_cedrif').readOnly=true; $('opordpag_nomben').readOnly=true; $$('.botoncat')[1].disabled=true;";
		 }

        if ($this->getRequestParameter('observe')=="")
        {
         $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_desord","'.$descripcion2.'",""],["opordpag_cedrif","'.$elrif.'",""],["opordpag_nomben","'.$dato.'",""],["opordpag_ctapag","'.$dato1.'",""],["opordpag_descta","'.$dato2.'",""],["opordpag_tipfin","'.$financiamiento.'",""],["opordpag_nomext2","'.$dato3.'",""],["opordpag_observe","N",""],["javascript","'.$javascript.'",""]]';
        }else{
         $output = '[["fecha","'.$fechas.'",""],["descripcion","'.$descripcions.'",""],["tipo","'.$tipos.'",""],["destipo","'.$destipos.'",""],["fila","'.$this->numfila.'",""],["mensaje","'.$msj.'",""],["ajaxs","6",""],["opordpag_observe","N",""],["javascript","'.$javascript.'",""]]';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     }
  }
  else  if ($this->getRequestParameter('ajax')=='7')
  {
    $codigo=$this->getRequestParameter('codigo');
    $mascaraformato=$this->mascarapresupuesto;
    $lonpre=strlen($this->mascarapresupuesto);
    $dato=OpdetordPeer::getRetiva($this->getRequestParameter('codigo'));
    OrdendePago::validarGrid($codigo,$lonpre,&$error1,&$error2,&$error3);

    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["noexiste","'.$error1.'",""],["nonivel","'.$error2.'",""],["noasigna","'.$error3.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='8')
  {
    $numord=$this->getRequestParameter('numord');
    $tipcau=$this->getRequestParameter('tipcau');
    $coduni=$this->getRequestParameter('coduni');
    $compadic=$this->getRequestParameter('compadic');

    $id=0;
    $c = new Criteria();
    $c->add(OpordpagPeer::NUMORD,$numord);
    $resul=OpordpagPeer::doSelectOne($c);
    if ($resul)  $id=$resul->getId();

    $msg = $this->executeEliminar();
    $this->ajax='8';

    if ($msg=='')
    {
      $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('pagemiord/edit');
    }
    else
    {
      $this->setFlash('notice',$msg);
      return $this->redirect('pagemiord/edit?id='.$id);
    }
  }
  else if ($this->getRequestParameter('ajax')=='9')
  {
    $fila=$this->getRequestParameter('fila');
    $monto=Herramientas::toFloat($this->getRequestParameter('monto'));
    $letra=$this->getRequestParameter('letra');
    $codigo=$this->getRequestParameter('codigo');
    $afecta=$this->getRequestParameter('afecta');
    OrdendePago::montoValido($fila,$monto, $letra, $codigo,$afecta,&$msj,&$mondis,&$sobregiro);
    $output = '[["errormonto","'.$msj.'",""],["montodisponible","'.$mondis.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='10')
  {
    $this->filretpro="";
    $this->limbaseret="";
    $varemp = $this->getUser()->getAttribute('configemp');
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria'])) {
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('filretpro',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$this->filretpro=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['filretpro'];
	       }
	     }
             if(array_key_exists('pagtipret',$varemp['aplicacion']['tesoreria']['modulos'])){
               if(array_key_exists('limbaseret',$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']))
	       {
	       	$this->limbaseret=$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']['limbaseret'];
	       }
	     }
           }


    $c= new Criteria();
    if ($this->filretpro=='S'){
    	$codpro=H::getX_vacio('RIFPRO','Caprovee','Codpro',$this->getRequestParameter('codprovee'));
    	$sql="optipret.codtip='".$this->getRequestParameter('codigo')."' and optipret.codtip in (select codret from caproret where codpro='".$codpro."')";
      $c->add(OptipretPeer::CODTIP,$sql,Criteria::CUSTOM);
    }else {
    $c->add(OptipretPeer::CODTIP,$this->getRequestParameter('codigo'));
    }
    $resul=OptipretPeer::doSelectOne($c);
    if ($resul)
    {
    $existe='S';
    $dato1=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
    $dato2=OptipretPeer::getDato($this->getRequestParameter('codigo'),'Codcon');
    $dato3=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Basimp'),2,',','.');
    $dato4=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Porret'),2,',','.');
    $dato5=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Factor'),4,',','.');
    $dato6=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Porsus'),2,',','.');
    $dato7=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Unitri'),2,',','.');
    $dato8=OptipretPeer::getEsta($this->getRequestParameter('codigo'));
    $dato9=OptipretPeer::getEstaislr($this->getRequestParameter('codigo'));
    $dato10=OptipretPeer::getEsta1xmil($this->getRequestParameter('codigo'));
    $dato11=number_format(OptipretPeer::getMontoiva($this->getRequestParameter('codigo')),2,',','.');
    $dato12=OptipretPeer::getEstairs($this->getRequestParameter('codigo'));

    if ($this->limbaseret=='S') {
        $t = new Criteria();
        $resultado=OpdefempPeer::doSelectOne($t);
        if ($resultado)
        {
         $unitri=$resultado->getUnitri();
        }else $unitri=0;
        $montobasmin=$resul->getMbasmi()*$unitri;
        $dato13=number_format($montobasmin,2,',','.');
    }else $dato13='0,00';

    }
    else
    {
    $existe='N';
    $dato1='';
    $dato2='';
    $dato3='0,00';
    $dato4='0,00';
    $dato5='0,0000';
    $dato6='0,00';
    $dato7='0,00';
    $dato8='';
    $dato9='';
    $dato10='';
    $dato11='0,00';
    $dato12='';
    $dato13='0,00';
    }
    $output = '[["existeretencion","'.$existe.'",""],["'.$cajtexmos.'","'.$dato1.'",""],["'.$this->getRequestParameter('contable').'","'.$dato2.'",""],["'.$this->getRequestParameter('base').'","'.$dato3.'",""],["'.$this->getRequestParameter('porretencion').'","'.$dato4.'",""],["'.$this->getRequestParameter('factor').'","'.$dato5.'",""],["'.$this->getRequestParameter('porsustra').'","'.$dato6.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato7.'",""],["'.$this->getRequestParameter('esta').'","'.$dato8.'",""],["'.$this->getRequestParameter('estaislr').'","'.$dato9.'",""],["'.$this->getRequestParameter('estairs').'","'.$dato12.'",""],["'.$this->getRequestParameter('esta1xmil').'","'.$dato10.'",""],["'.$this->getRequestParameter('montoiva').'","'.$dato11.'",""],["'.$this->getRequestParameter('monbasmin').'","'.$dato13.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='11')
  {
    $this->div='OPNN';
    $datosnomina=$this->getRequestParameter('tipnom')."_".$this->getRequestParameter('gasto')."_".$this->getRequestParameter('banco')."_".$this->getRequestParameter('fecha')."_".$this->getRequestParameter('nomespecial')."_".$this->getRequestParameter('codnomesp');
    OrdendePago::ArregloNomina($this->getRequestParameter('tipnom'),$this->getRequestParameter('banco'),$this->getRequestParameter('gasto'),$this->getRequestParameter('fecha'),$this->getRequestParameter('opordpag_referencias'),&$arreglodet,&$arregloret,&$dato,$this->impcpt,$this->getRequestParameter('nomespecial'),$this->getRequestParameter('codnomesp'));

    $this->divu=$this->getRequestParameter('divu');
    if ($this->getRequestParameter('divu')==1)
    {
    $this->configGridConsulta('','OPNN',$arreglodet);}
    else{
    if (count($arregloret)>0)
    {
     $this->getUser()->setAttribute('retencion', 'S','pagemiord');
    }
    $this->configGridRetenciones($arregloret);}

    $output = '[["opordpag_cedrif","'.$dato.'",""],["opordpag_datosnomina","'.$datosnomina.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
  else if ($this->getRequestParameter('ajax')=='12')
  {
    $this->div='APOR';
    OrdendePago::ArregloAporte($this->getRequestParameter('codigoaporte'),$this->getRequestParameter('fecnom'),$this->getRequestParameter('gasto2'),$this->getRequestParameter('opordpag_referencias'),&$arreglodet);
    $this->configGridConsulta('','APOR',$arreglodet);
  }
  else if ($this->getRequestParameter('ajax')=='13')
  {
    $this->div='LIQU';
    OrdendePago::ArregloLiquidacion($this->getRequestParameter('codemp'),$this->getRequestParameter('nomemp'),$this->getRequestParameter('cedemp'),$this->getRequestParameter('opordpag_referencias'),&$arreglodet,&$arregloret,&$dato);

    $this->divu=$this->getRequestParameter('divu');
    if ($this->getRequestParameter('divu')==1)
    {
    $this->configGridConsulta('','LIQU',$arreglodet);}
    else{
    if (count($arregloret)>0)
    {
     $this->getUser()->setAttribute('retencion', 'S','pagemiord');
    }
    $this->configGridRetenciones($arregloret);}

    $output = '[["opordpag_cedrif","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
  else if ($this->getRequestParameter('ajax')=='14')
  {
    $this->div='OPFD';
    OrdendePago::ArregloFideicomiso($this->getRequestParameter('codnom'),$this->getRequestParameter('nomnom'),$this->getRequestParameter('fecha'),$this->getRequestParameter('opordpag_referencias'),&$arreglodet);
    $this->configGridConsulta('','OPFD',$arreglodet);
  }
  else if ($this->getRequestParameter('ajax')=='15')
  {
    $codigo="";
    $msj="";
    $mondis="0,00";
    $afecta=$this->getRequestParameter('afecta');
    $detalle=Herramientas::CargarDatosGrid($this,$this->obj);
    $x=$detalle[0];
    $i=0;
    while ($i<count($x))
    {
     $codigo=$x[$i]->getCodpre();
     OrdendePago::montoValido($i,$x[$i]->getMoncau(),'N',$codigo,$afecta,&$msj,&$mondis,&$sobregiro);
     if ($msj!="")
     { break;}
     $i++;
    }
    $output = '[["errormonto","'.$msj.'",""],["montodisponible","'.$mondis.'",""],["codigopresupuestario","'.$codigo.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='16')
  {
    if (Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
    {
     $valido='N';
    }else { $valido='S';}
    $output = '[["valfec","'.$valido.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='17')
  {
    $this->getUser()->setAttribute('presiona', 'S','pagemiord');
    $this->getUser()->setAttribute('retencion', 'S','pagemiord');
    $output = '[["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='18')
  {
    $dato=number_format(OptipretPeer::getDato($this->getRequestParameter('codigo'),'Factor'),4,',','.');
    $output = '[["fac","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='19')
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$this->getRequestParameter('numord'));
    $data=OpordpagPeer::doSelectOne($c);
    if ($data)
    {
      if ($fecha<$data->getFecemi())
      {
        $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha de la Orden de Pago'); $('opordpag_fecanu').value='';";
      }
      else{$msj="";}

      if ($msj=="")
      {
        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
        {
          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('opordpag_fecanu').value='';";
        }
        else { $msj=""; }
      }

    }
    else
    {
      $msj="";
    }

    $output = '[["javascript","'.$msj.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='20')
  {
    $this->div='val';
  $c= new Criteria();
  $c->add(OcregconPeer::CODCON,$this->getRequestParameter('contrato'));
  $c->add(OcregconPeer::STACON,'A');
  $c->addJoin(OcregconPeer::REFCOM,CpcomproPeer::REFCOM);
  $c->addJoin(CpcomproPeer::CEDRIF,OpbenefiPeer::CEDRIF);
  $result= CpcomproPeer::doSelectOne($c);
  if ($result)
  {
       $dato=$result->getRefcom();
       $dato1=$result->getCedrif();
       $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$dato1);
      $resul= OpbenefiPeer::doSelectOne($c);
      if ($resul)
      {
      $dato3=OpbenefiPeer::getDato($dato1,'Nomben');
      $dato4=OpbenefiPeer::getDato($dato3,'Codcta');
      $dato5=OpbenefiPeer::getDato2($dato4,'Descta');
      }


      $javascript="";
      $output = '[["refcomv","'.$dato.'",""],["rifcom","'.$dato1.'",""],["opordpag_cedrif","'.$dato1.'",""],["opordpag_nomben","'.$dato3.'",""],["opordpag_ctapag","'.$dato4.'",""],["opordpag_descta","'.$dato5.'",""],["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }else
  {
    $javascript="alert('El Contrato no Existe');";
    $output = '[["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  }
  else if ($this->getRequestParameter('ajax')=='21')
  {
    $this->div='OPVA';
    OrdendePago::ArregloValuacion($this->getRequestParameter('refcom'),$this->getRequestParameter('montoval'),$this->getRequestParameter('opordpag_referencias'),&$arreglodet);
    $this->configGridConsulta('','OPVA',$arreglodet);
  }
  else if ($this->getRequestParameter('ajax')=='22')
  {
  	$javascript="";
  	$c= new Criteria();
  	$c->add(TsmotanuPeer::CODMOTANU,$this->getRequestParameter('codigo'));
  	$reg= TsmotanuPeer::doSelectOne($c);
  	if ($reg)
  	{
       $dato=$reg->getDesmotanu();
  	}else $javascript="alert('El Motivo de Anulación no Existe'); $('$cajtexcom').value=''; ";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='23')
  {
  	$javascript="";
  	$c= new Criteria();
  	$c->add(OpconpagPeer::CODCONCEPTO,$this->getRequestParameter('codigo'));
  	$reg= OpconpagPeer::doSelectOne($c);
  	if ($reg)
  	{
       $dato=$reg->getNomconcepto();
  	}else $javascript="alert('El Concepto de Pago no Existe'); $('$cajtexcom').value=''; ";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='24')
  {
  	$javascript="";
  	$c= new Criteria();
  	$c->add(OpbenefiPeer::CEDRIF,$this->getRequestParameter('codigo'));
  	$reg= OpbenefiPeer::doSelectOne($c);
  	if ($reg)
  	{
       $dato=$reg->getNomben();
  	}else $javascript="alert('El Beneficiario Alterno no Existe'); $('$cajtexcom').value=''; ";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='99')
  {
      $output = '[["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='25')
  {
  	$javascript=""; $dato="";
  	$c= new Criteria();
  	$c->add(TsdefbanPeer::NUMCUE,$this->getRequestParameter('codigo'));
  	$reg= TsdefbanPeer::doSelectOne($c);
  	if ($reg)
  	{
       $dato=$reg->getNomcue();
  	}else $javascript="alert('La Cuenta Bancaria no Existe'); $('$cajtexcom').value=''; ";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else if ($this->getRequestParameter('ajax')=='26')
  {
  	$javascript=""; $dato="";
  	$c= new Criteria();
  	$c->add(CpdocpagPeer::TIPPAG,$this->getRequestParameter('codigo'));
  	$reg= CpdocpagPeer::doSelectOne($c);
  	if ($reg)
  	{
       $dato=$reg->getNomext();
  	}else $javascript="alert('El Tipo de Pagado no Existe'); $('$cajtexcom').value=''; ";
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

 }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfactura()
  {
  	$javascript="";
    if ($this->getRequestParameter('id')=="")
    {
      $this->configGridApliret();
      $retenciones=Herramientas::CargarDatosGrid($this,$this->obj5,true);
      if ($this->getRequestParameter('opordpag[vacio]')=='')
      {
      OrdendePago::facturar($this->getRequestParameter('opordpag[numord]'),$this->getRequestParameter('id'),$retenciones,$this->getRequestParameter('referencia2'),&$eliva,&$elislr,&$elirs,&$eltimbre,&$msj,&$arreglo1,&$arreglo2,&$arreglo3);
      if ($msj=='')
      { $this->div='Fac';
        $this->configGridFactura('',$arreglo1,$arreglo2,$arreglo3);
        $output = '[["eliva","'.$eliva.'",""],["elislr","'.$elislr.'",""],["elirs","'.$elirs.'",""],["eltimbre","'.$eltimbre.'",""],["msj","'.$msj.'",""],["opordpag_vacio","1",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }else
      {
        $output = '[["nota","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      }else
      {
      	$javascript="";
      	$output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
    else
    {
      $this->configGridConsulret($this->getRequestParameter('opordpag[numord]'));
      $retenciones=Herramientas::CargarDatosGrid($this,$this->obj3,true);
      if ($this->getRequestParameter('opordpag[vacio]')=='')
      {
      OrdendePago::facturar($this->getRequestParameter('opordpag[numord]'),$this->getRequestParameter('id'),$retenciones,$this->getRequestParameter('referencia2'),&$eliva,&$elislr,&$elirs,&$eltimbre,&$msj,&$arreglo1,&$arreglo2,&$arreglo3);
      if ($msj=='')
      { $this->div='Fac';
        $this->configGridFactura($this->getRequestParameter('opordpag[numord]'),$arreglo1,$arreglo2,$arreglo3);
        $output = '[["eliva","'.$eliva.'",""],["elislr","'.$elislr.'",""],["elirs","'.$elirs.'",""],["eltimbre","'.$eltimbre.'",""],["msj","'.$msj.'",""],["opordpag_vacio","1",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      }else
      {
        $output = '[["nota","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      }
      else
      {
      	$javascript="";
      	$output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
    }
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->opordpag = $this->getOpordpagOrCreate();
     $this->updateOpordpagFromRequest();
     $concom=0;
     $mensaje1="";
     $msj1="";
     $msj2="";
     $cuentaporpagarrendicion="";
     $mensajeuno="";
     $msjuno="";
     $msjdos="";
     $msjtres="";
     $comprobante="";
     $this->mensajeuno="";
     $this->msj1="";
     $this->msj2="";
     $this->mensaje1="";
     $this->msjuno="";
     $this->msjdos="";
     $this->msjtres="";
     $this->i="";
     $this->formulario=array();
     $detalle=Herramientas::CargarDatosGrid($this,$this->obj);
     if ($this->opordpag->getAfectapre()==1)
     {
     if ($this->opordpag->getCedrif()=="" || $this->opordpag->getCtapag()=="" || count($detalle[0])==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario, el Código Contable y las Imputaciones Presupuestarias, para luego generar el comprobante";
     }
     }
     else{
     if ($this->opordpag->getCedrif()=="" || $this->opordpag->getCtapag()=="" || H::toFloat($this->opordpag->getNeto())<=0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario, el Código Contable ó si el Monto Neto a Pagar es mayor a cero, para luego generar el comprobante";
     }
     }

     if ($this->getRequestParameter('opordpag[documento]')=="C" || $this->getRequestParameter('opordpag[documento]')=="P")
     {
      if ($this->getRequestParameter('generactaord')=='S')
      {
        $x=OrdendePago::grabarComprobanteOrden($this->opordpag,$this->getRequestParameter('tipoben'),&$mensaje1,&$msj1,&$msj2,&$comprobante);
        $concom=$concom + 1;
      }
     }

     if ($mensaje1=="" && $msj1=="" && $msj2=="" && $msjtres=="")
     {
       $c= new Criteria();
       $reg= OpdefempPeer::doSelectOne($c);
       if ($reg)
       {
         /*if ($reg->getGencomalc()=='S')
         {
          $x=OrdendePago::grabarComprobanteAlc($this->opordpag,&$mensajeuno,&$msjuno,&$msjdos,&$comprobante);
         }
         else
         {*/
            $x=OrdendePago::grabarComprobante($this->opordpag,$detalle,&$cuentaporpagarrendicion,&$mensajeuno,&$msjuno,&$msjdos,&$comprobante);
         //}
       }
      $concom=$concom + 1;

      if ($mensajeuno=="" && $msjuno=="" && $msjdos=="")
      {

      $form="sf_admin/pagemiord/confincomgen";
      $i=0;
      while ($i<$concom)
      {
       $f[$i]=$form.$i;
       $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
       $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
       $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
       $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
       $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
       $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
       $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
       $this->getUser()->setAttribute('tipmov', '');
       $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
       $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
       $i++;
      }
      $this->i=$concom-1;
      $this->formulario=$f;
      }else
      {
        $this->mensajeuno=$mensajeuno;
        $this->msjuno=$msjuno;
        $this->msjdos=$msjdos;
      }
     }
     else
     {
       $this->mensaje1=$mensaje1;
        $this->msj1=$msj1;
        $this->msj2=$msj2;
        $this->msjtres=$msjtres;
     }
      $output = '[["opordpag_totalcomprobantes","'.$concom.'",""],["opordpag_cuentarendicion","'.$cuentaporpagarrendicion.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='2')
  {
    $this->tags=Herramientas::autocompleteAjax('CEDRIF','Opbenefi','Cedrif',$this->getRequestParameter('opordpag[cedrif]'));
  }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
    $this->tags=Herramientas::autocompleteAjax('CODCONCEPTO','Opconpag','Codconcepto',$this->getRequestParameter('opordpag[codconcepto]'));
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $this->tags=Herramientas::autocompleteAjax('CODUBI','Bnubica','Codubi',$this->getRequestParameter('opordpag[coduni]'));
    }
    else  if ($this->getRequestParameter('ajax')=='5')
  {
    $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','Codfin',$this->getRequestParameter('opordpag[tipfin]'));
    }
    else if ($this->getRequestParameter('ajax')=='6')
    {
      $this->docrefiere=CpdoccauPeer::getRefier($this->getRequestParameter('tipcau'));
      if ($this->docrefiere=='P')
      {
        $this->tags=Herramientas::autocompleteAjax('REFPRC','Cpprecom','Refprc',$this->getRequestParameter('refere'));
      }
      else if ($this->docrefiere=='C')
      {
        $this->tags=Herramientas::autocompleteAjax('REFCOM','Cpcompro','Refcom',$this->getRequestParameter('refere'));
      }
    }
    else  if ($this->getRequestParameter('ajax')=='7')
    {
      $this->tags=Herramientas::autocompleteAjax('CODMOTANU','Tsmotanu','Codmotanu',$this->getRequestParameter('opordpag[codmotanu]'));
    }
    else  if ($this->getRequestParameter('ajax')=='8')
    {
      $this->tags=Herramientas::autocompleteAjax('NUMCUE','Tsdefban','Numcue',$this->getRequestParameter('opordpag[numcta]'));
  }
    else  if ($this->getRequestParameter('ajax')=='9')
    {
      $this->tags=Herramientas::autocompleteAjax('TIPPAG','Cpdocpag','Tippag',$this->getRequestParameter('opordpag[tipdoc]'));
    }
  }

  public function setVars()
  {
  $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
  $this->loncta=strlen($this->mascara);
  $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');
  $this->lonubi=strlen($this->mascaraubi);
  $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
  OrdendePago::formload(&$afectarecargo,&$ordpagnom,&$ordpagapo,&$ordpagliq,&$ordpagfid,&$ordpagval,&$compadic,&$genctaord,&$ordpagcre);
  Herramientas::obtenerFormatoCategoria(&$formatopar,&$iniciopartida);
  $this->afectarec=$afectarecargo;
  $this->formatpar=$formatopar;
  $this->iniciopar=$iniciopartida;
  $this->ordpagnom=$ordpagnom;
  $this->ordpagapo=$ordpagapo;
  $this->ordpagliq=$ordpagliq;
  $this->ordpagfid=$ordpagfid;
  $this->ordpagval=$ordpagval;
  $this->compadic=$compadic;
  $this->genctaord=$genctaord;
  $this->ordpagcre=$ordpagcre;
  $this->unidad=Herramientas::getX('CODEMP','Opdefemp','Unitri','001');
  //$this->anoini=substr(Herramientas::getX('CODEMP','Cpdefniv','fecini','001'),0,4);
  //$this->anocie=substr(Herramientas::getX('CODEMP','Cpdefniv','feccie','001'),0,4);
  OrdendePago::partida(&$partidas);
  $this->esta=$partidas;
  $this->color='';
  $this->eti="";
  $c= new Criteria();
  $dato= OpdefempPeer::doSelectOne($c);
  if ($dato) $this->genordret=$dato->getGenordret(); else $this->genordret="";

    $this->comprobaut="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('generales',$varemp))
	{
		if(array_key_exists('comprobaut',$varemp['generales']))
		{
		   $this->comprobaut=$varemp['generales']['comprobaut'];
		}
		$this->impcpt='';
		if(array_key_exists('impcpt',$varemp['generales']))
		{
		   $this->impcpt=$varemp['generales']['impcpt'];
		}
	}

        $this->numdesh="";
        $this->mansolocor="";
        $this->bloqfec="";
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numorddesh',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$this->numdesh=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['numorddesh'];
	       }
         if(array_key_exists('mansolocor',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['bloqfec'];
	       }
	     }


  }

  public function validarGeneraComprobante()
  {
    $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
    $form="sf_admin/pagemiord/confincomgen";
    if ($concom!=1)
    {
     $grabo=$this->getUser()->getAttribute('grabo',null,$form.'1');
    }
    else
    {
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
    }
    if ($grabo=='')
    { return true;}
    else { return false;}
  }

  public function executeAnular()
  {
   $this->referencia="########";//$this->getRequestParameter('referencia');
   $numord=$this->getRequestParameter('numord');
   $fecemi=$this->getRequestParameter('fecemi');
   $this->compadic=$this->getRequestParameter('compadic');
   $q= new Criteria();
    $regi= OpdefempPeer::doSelectOne($q);
    if ($regi)
    {
      $this->tienemot=$regi->getOrdmotanu();
    }else $this->tienemot="";


   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(OpordpagPeer::NUMORD,$numord);
   $c->add(OpordpagPeer::FECEMI,$fec);
   $this->opordpag = OpordpagPeer::doSelectOne($c);
   sfView::SUCCESS;
   }

  public function executeSalvaranu()
  {
    $numord=$this->getRequestParameter('numord');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $codmotanu=$this->getRequestParameter('codmotanu');
    $compadic=$this->getRequestParameter('compadic');
    $this->msg='';
    $this->msg2='';
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    if (Tesoreria::validaPeriodoCerrado($fecanu)==true)
    {
      $this->msg2="La Fecha no se encuentra de un Perido Contable Abierto.";
      return sfView::SUCCESS;
    }
    else {
    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$numord);
    $resul= OpordpagPeer::doSelectOne($c);
    if ($resul)
    {
      if (($resul->getNumche()=='') || (strlen($resul->getNumche())==0))
      {
        $documentorefiere=Herramientas::getX('Tipcau','Cpdoccau','Refier',$resul->getTipcau());
        if ($documentorefiere=='C')
        {
          $b= new Criteria();
          $dato= OpdefempPeer::doSelectOne($b);
          if ($dato)
          {
            if ($dato->getGenctaord()=='S')
            {
              $numcom=$resul->getNumcom();
              if (OrdendePago::verificarStatusComprobante($numcom))
              {
                $t=OrdendePago::anularComprobOrden($numcom,$fecanu,&$msj);
                if ($msj!="")
                { $this->msg=$msj;
                  return sfView::SUCCESS;
                }
              }
              else { $this->msg="No se puede anular la Orden, ya que el Comprobante de Orden asociado esta actualizado";
                return sfView::SUCCESS;}
            }
          }
        }

        OrdendePago::anularRetenciones($numord,&$msJ,&$puede_eliminar);
        if ($msJ!="")
        {
          $this->msg=$msJ;
          return sfView::SUCCESS;
        }

        if ($puede_eliminar)
        {
          OrdendePago::anularCausado($numord,$fecanu,$desanu);
          if ($resul->getNumcom()!="")
          {
            $numerocomp=$resul->getNumcom();
            $statuscodigo=Herramientas::getX('Codubi','Bnubica','Stacod',$resul->getCoduni());
            if ($statuscodigo=='C'){ $generaotro=true;}else{ $generaotro=false;}
            OrdendePago::anularComprob($numerocomp,$fecanu,$desanu,$compadic,$generaotro,&$msjs);
            if ($msjs!="")
            {
              $this->msg=$msjs;
              return sfView::SUCCESS;
            }
          }
          else
          {
          	  $cri= new Criteria();
              $dato= OpdefempPeer::doSelectOne($cri);
              if ($dato)
              {
              	if ($resul->getTipcau()!=$dato->getOrdret())
                {
             	 $this->msg="El Comprobante no será eliminado, ya que se perdió la asociación con Contabilidad";
             	 return sfView::SUCCESS;
                }
              }

          }
         OrdendePago::eliminarOPP($numord);
         Herramientas::EliminarRegistro('Opfactur','Numord',$numord);
         if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
         { $resul->setFecanu($fec);}
         $resul->setCodmotanu($codmotanu);
         $resul->setDesanu($desanu);
         $resul->setUsuanu($this->getUser()->getAttribute('loguse'));
         $resul->setStatus('A');
         $resul->save();

         $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
         Herramientas::insertarRegistros($sql);

         $sql2="Update Npordfid set numord='' where numord='".$numord."'";
         Herramientas::insertarRegistros($sql2);

        }
        else
        {
          $this->msg="La Orden no fue anulada";
          return sfView::SUCCESS;
        }
      }
      else
      {
        $this->msg="La Orden ya fue Pagada en el Módulo de Bancos";
        return sfView::SUCCESS;
      }
    }
    }
    return sfView::SUCCESS;
  }

  public function executeEliminar()
  {
    $numord=$this->getRequestParameter('numord');
    $tipcau=$this->getRequestParameter('tipcau');
    $compadic=$this->getRequestParameter('compadic');
    $coduni=$this->getRequestParameter('coduni');
    $this->msg='';

   if ($this->getUser()->getAttribute('confcorcom')=='N')
   { $numero2="PR".substr($numord,2,6);}
   else
   {
   	$reftra="PR".substr($numord,2,6);
   	$t= new Criteria();
   	$t->add(ContabcPeer::REFTRA,$reftra);
   	$resul= ContabcPeer::doSelectOne($t);
   	if ($resul)
   	{
      $numero2=$resul->getNumcom();
    }
    else { $numero2=""; }
   }

  $c= new Criteria();
  $c->add(OpordpagPeer::NUMORD,$numord);
  $data= OpordpagPeer::doSelectOne($c);
  if ($data)
  {
    $numero=$data->getNumcom();
  }

    //Verificar si la orden de pago es de retencion, si es asi se puede eliminar sin verificar los comprobantes contables
    //ya que las ordenes de pago de retención no tienen comprobantes contables asociados
    $ordret=H::getX('codemp','Opdefemp','Ordret','001');
    if ($tipcau==$ordret){
	    $c=new Criteria();
	    $c->add(OpretordPeer::NUMRET,$numord);
	    $datosret=OpretordPeer::doSelectOne($c);
	    if ($datosret)
	    {
	    $c= new Criteria();
	    $c->add(OpordpagPeer::NUMORD,$numord);
	    $data= OpordpagPeer::doSelectOne($c);
	    if ($data)
	    {
	      if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
	      {
	        OrdendePago::eliminarRetenciones($numord,&$puedeeliminar,&$msjs);
	        Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
	           OrdendePago::eliminarCausado($data->getNumord());
	           OrdendePago::eliminarOrdenRetencion($data->getNumord());
	           OrdendePago::eliminarOPP($data->getNumord());
	           Herramientas::EliminarRegistro('Opfactur','Numord',$data->getNumord());

	           $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
	           Herramientas::insertarRegistros($sql);

	           $sql2="Update Npordfid set numord='' where numord='".$numord."'";
	           Herramientas::insertarRegistros($sql2);

	           $data->delete();
	      }
	      else { return $this->msj="La Orden ya fue pagada en el Módulo de Bancos";}
	    }//  if ($data)
	    }// if ($datosret)
	    else {
	    		$c= new Criteria();
			    $c->add(OpordpagPeer::NUMORD,$numord);
			    $data= OpordpagPeer::doSelectOne($c);
			    if ($data)
			    {
			      if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
			      {
			        OrdendePago::eliminarRetenciones($numord,&$puedeeliminar,&$msjs);
			        Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
			           OrdendePago::eliminarCausado($data->getNumord());
			           OrdendePago::eliminarOrdenRetencion($data->getNumord());
			           OrdendePago::eliminarOPP($data->getNumord());
			           Herramientas::EliminarRegistro('Opfactur','Numord',$data->getNumord());

			           $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
			           Herramientas::insertarRegistros($sql);

			           $sql2="Update Npordfid set numord='' where numord='".$numord."'";
			           Herramientas::insertarRegistros($sql2);

			           $data->delete();
			      }
			      else { return $this->msj="La Orden ya fue pagada en el Módulo de Bancos";}
			    }
		    }
    }
    else //orden de pago normal
    {
        $c= new Criteria();
        $c->add(OpordpagPeer::NUMORD,$numord);
        $opordpag= OpordpagPeer::doSelectOne($c);

       if ($opordpag)
       {
        if (OrdendePago::verificarStatusComprobante($opordpag->getNumcom()))
        {
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numord);
          $data= OpordpagPeer::doSelectOne($c);
          if ($data)
          {
            if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
            {
              $documento=Herramientas::getX('Tipcau','Cpdoccau','Refier',$tipcau);
            if ($documento=='C')
            {
              $b= new Criteria();
              $dato= OpdefempPeer::doSelectOne($b);
              if ($dato)
              {
                if ($dato->getGenctaord()=='S')
                {
                  if (OrdendePago::verificarStatusComprobante($numero2))
                  {
                    Herramientas::EliminarRegistro('Contabc1','Numcom',$numero2);
                    Herramientas::EliminarRegistro('Contabc','Numcom',$numero2);
                  }
                  else { return $this->msj="No se eliminar ya que el comprobante de orden asociado esta actualizado";}
                }
              }
            }
            OrdendePago::eliminarRetenciones($numord,&$puedeeliminar,&$msjs);
            if ($msjs!="")
            {
              return $this->msj=$msjs;
            }
            if ($puedeeliminar)
            {
              if ($data->getNumcom()!='')
              {
              $numcomprob=$data->getNumcom();
              OrdendePago::eliminarComprob($data->getFecemi(),$numcomprob);
              }
              else
              {
	              $cri= new Criteria();
	              $datos= OpdefempPeer::doSelectOne($cri);
	              if ($datos)
	              {
	              	if ($data->getTipcau()!=$datos->getOrdret())
	                {
	             	 return $this->msj="El Comprobante no puede ser Eliminado, ya que se perdio la asociacion con Contabilidad";
	                }
	              }

              }

              Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
              OrdendePago::eliminarCausado($data->getNumord());
              OrdendePago::eliminarOrdenRetencion($data->getNumord());
              OrdendePago::eliminarOPP($data->getNumord());
              Herramientas::EliminarRegistro('Opfactur','Numord',$data->getNumord());

              $sql="Update Npliquidacion_det set numord='' where numord='".$numord."'";
              Herramientas::insertarRegistros($sql);

              $sql2="Update Npordfid set numord='' where numord='".$numord."'";
              Herramientas::insertarRegistros($sql2);
              $ideeli=$data->getId();
              $data->delete();
  	          $this->SalvarBitacora($ideeli ,'Elimino');

            }else { return $this->msj="La Orden no fue eliminada";}
            }else { return $this->msj="La Orden ya fue pagada en el Módulo de Bancos";}
          }
        }else { return $this->msj="No se Puede Eliminar la Orden ya que el Comprobante Contable asociado no existe o esta actualizado";}
       }//if ($opordpag)
    }//else orden de pago normal
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxretenciones()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();
    $retenciones= array();
    $grid=Herramientas::CargarDatosGrid($this,$this->obj3,true);
    $conret=$grid[0];
    $this->formulario=array();
    $this->i="";
    $i=0;
    $tiporet="";
    $cri= new Criteria();
    $dato= OpdefempPeer::doSelectOne($cri);
    if ($dato) $tiporet=$dato->getOrdret();
    while ($i<count($conret))
    {
      $f[$i]=$this->form.$i;
      if ($tiporet=="") $tiporet=$this->opordpag->getTipcau();
      $this->getUser()->setAttribute('tipo',$tiporet,$f[$i]);
      $desord=$this->opordpag->getNumord().' - '.$conret[$i]['destip'];
      $this->getUser()->setAttribute('concepto',$desord,$f[$i]);
      $this->getUser()->setAttribute('tiporet',$conret[$i]['codtip'],$f[$i]);
      $i++;
    }
    $this->i=count($conret)-1;
    $this->formulario=$f;
    $this->getUser()->getAttributeHolder()->remove('retencion','pagemiord');

    $output = '[["","",""],["","",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
}
