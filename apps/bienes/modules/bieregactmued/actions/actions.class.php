<?php

/**
 * bieregactmued actions.
 *
 * @package    siga
 * @subpackage bieregactmued
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieregactmuedActions extends autobieregactmuedActions
{

  private static $coderror=-1;

  public function executeAjax()
  {
   if ($this->getRequestParameter('ajax')=='1')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
      $result=array();
      $sql="select a.codact as codigo_nivel,a.DesAct as activo From bndefact a, bndefins b where length(RTrim(a.CodAct))=b.LonAct and a.codact='".$this->getRequestParameter('codigo')."' Order By codact";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $dato=$result[0]['codigo_nivel'];
      $dato1=$result[0]['activo'];
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","'.$dato1.'",""]]';
    }
    else
    {
          $javascript="alert('El código no existe...');$('bnregmue_codact').value='';$('bnregmue_desmue').value='';$('bnregmue_codmue').value='';$('bnregmue_codact').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }


     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }

   elseif ($this->getRequestParameter('ajax')=='2')
   {
      $cajtexmos=$this->getRequestParameter('cajtexmos');
      $cajtexmos_uno=$this->getRequestParameter('cajtexmos_uno');
      $cajtexmos_dos=$this->getRequestParameter('cajtexmos_dos');
      $cajtexmos_tres=$this->getRequestParameter('cajtexmos_tres');
      $result=array();
      $sql="Select a.ordcom as orden,a.codpro as proveedor, to_char(a.fecord,'dd/mm/yyyy') as fecha, b.nompro as nompro from caordcom a, caprovee b  where a.codpro=b.codpro and a.ordcom='".$this->getRequestParameter('codigo')."' order By ordcom";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $dato=$result[0]['orden'];
      $dato1=$result[0]['proveedor'];
      $dato2=$result[0]['nompro'];
      $dato3=$result[0]['fecha'];
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos_uno.'","'.$dato1.'",""],["'.$cajtexmos_dos.'","'.$dato2.'",""],["'.$cajtexmos_tres.'","'.$dato3.'",""]]';
    }
    else
    {
        $javascript="alert('La Orden de Compra no existe...');$('$cajtexmos').value='';$('$cajtexmos_uno').value='';$('$cajtexmos_dos').value='';$('$cajtexmos_tres').value='';$('$cajtexmos').focus();";
              $output = '[["javascript","'.$javascript.'",""]]';
    }
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='3')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
        $dato=BnubibiePeer::getDesubicacion(trim($this->getRequestParameter('codigo')));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='4')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
        $dato=BndisbiePeer::getDesdis_descripcion(trim($this->getRequestParameter('codigo')));

    $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   elseif ($this->getRequestParameter('ajax')=='5')
   {
   	$output = '[["","",""],["",""]]';
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    if ($codigo!="")
    {
	    $c= new Criteria();
	    $c->add(NphojintPeer::CODEMP,$codigo);
	    $result=NphojintPeer::doSelectOne($c);
	    if ($result)
	    {
	      $dato=$result->getNomemp();
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else
	    {
	      if ($cajtexmos=="bnregmue_nomrespat") $cajita="bnregmue_codrespat"; else $cajita="bnregmue_codresuso";
	      $javascript="alert('El código del empleado no existe...');$('$cajita').value=''";
	      $dato="";
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	    }
    }

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  }


  protected function updateBnregmueFromRequest()
  {
    $bnregmue = $this->getRequestParameter('bnregmue');

    if (isset($bnregmue['codact']))
    {
      $this->bnregmue->setCodact(trim($bnregmue['codact']));
    }
    if (isset($bnregmue['codmue']))
    {
      $this->bnregmue->setCodmue(trim($bnregmue['codmue']));
    }
    if (isset($bnregmue['desmue']))
    {
      $this->bnregmue->setDesmue(trim($bnregmue['desmue']));
    }
    if (isset($bnregmue['codpro']))
    {
      $this->bnregmue->setCodpro(trim($bnregmue['codpro']));
    }
    if (isset($bnregmue['ordcom']))
    {
      $this->bnregmue->setOrdcom(trim($bnregmue['ordcom']));
    }
    if (isset($bnregmue['fecreg']))
    {
      if ($bnregmue['fecreg'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecreg']))
          {
            $value = $dateFormat->format($bnregmue['fecreg'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecreg'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecreg(trim($value));
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecreg(null);
      }
    }
    if (isset($bnregmue['feccom']))
    {
      if ($bnregmue['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['feccom']))
          {
            $value = $dateFormat->format($bnregmue['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFeccom(null);
      }
    }
    if (isset($bnregmue['fecdep']))
    {
      if ($bnregmue['fecdep'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecdep']))
          {
            $value = $dateFormat->format($bnregmue['fecdep'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecdep'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecdep($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecdep(null);
      }
    }
    if (isset($bnregmue['fecaju']))
    {
      if ($bnregmue['fecaju'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecaju']))
          {
            $value = $dateFormat->format($bnregmue['fecaju'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecaju'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecaju($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecaju(null);
      }
    }
    if (isset($bnregmue['fecact']))
    {
      if ($bnregmue['fecact'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecact']))
          {
            $value = $dateFormat->format($bnregmue['fecact'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecact'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecact($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecact(null);
      }
    }
    if (isset($bnregmue['fecexp']))
    {
      if ($bnregmue['fecexp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecexp']))
          {
            $value = $dateFormat->format($bnregmue['fecexp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecexp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecexp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecexp(null);
      }
    }
    if (isset($bnregmue['ordrcp']))
    {
      $this->bnregmue->setOrdrcp(trim($bnregmue['ordrcp']));
    }
    if (isset($bnregmue['fotmue']))
    {
      $this->bnregmue->setFotmue(trim($bnregmue['fotmue']));
    }
    if (isset($bnregmue['marmue']))
    {
      $this->bnregmue->setMarmue(trim($bnregmue['marmue']));
    }
    if (isset($bnregmue['modmue']))
    {
      $this->bnregmue->setModmue(trim($bnregmue['modmue']));
    }
    if (isset($bnregmue['anomue']))
    {
      $this->bnregmue->setAnomue(trim($bnregmue['anomue']));
    }
    if (isset($bnregmue['colmue']))
    {
      $this->bnregmue->setColmue(trim($bnregmue['colmue']));
    }
    if (isset($bnregmue['codubi']))
    {
      $this->bnregmue->setCodubi(trim($bnregmue['codubi']));
    }
    if (isset($bnregmue['pesmue']))
    {
      $this->bnregmue->setPesmue(trim($bnregmue['pesmue']));
    }
    if (isset($bnregmue['capmue']))
    {
      $this->bnregmue->setCapmue(trim($bnregmue['capmue']));
    }
    if (isset($bnregmue['tipmue']))
    {
      $this->bnregmue->setTipmue(trim($bnregmue['tipmue']));
    }
    if (isset($bnregmue['viduti']))
    {
      $this->bnregmue->setViduti(trim($bnregmue['viduti']));
    }
    if (isset($bnregmue['lngmue']))
    {
      $this->bnregmue->setLngmue(trim($bnregmue['lngmue']));
    }
    if (isset($bnregmue['nropie']))
    {
      $this->bnregmue->setNropie(trim($bnregmue['nropie']));
    }
    if (isset($bnregmue['sermue']))
    {
      $this->bnregmue->setSermue(trim($bnregmue['sermue']));
    }
    if (isset($bnregmue['usomue']))
    {
      $this->bnregmue->setUsomue(trim($bnregmue['usomue']));
    }
    if (isset($bnregmue['altmue']))
    {
      $this->bnregmue->setAltmue(trim($bnregmue['altmue']));
    }
    if (isset($bnregmue['larmue']))
    {
      $this->bnregmue->setLarmue(trim($bnregmue['larmue']));
    }
    if (isset($bnregmue['ancmue']))
    {
      $this->bnregmue->setAncmue(trim($bnregmue['ancmue']));
    }
    if (isset($bnregmue['coddis']))
    {
      $this->bnregmue->setCoddis(trim($bnregmue['coddis']));
    }
    if (isset($bnregmue['detmue']))
    {
      $this->bnregmue->setDetmue(trim($bnregmue['detmue']));
    }
    if (isset($bnregmue['edomue']))
    {
      $this->bnregmue->setEdomue(trim($bnregmue['edomue']));
    }
    if (isset($bnregmue['munmue']))
    {
      $this->bnregmue->setMunmue(trim($bnregmue['munmue']));
    }
    if (isset($bnregmue['depmue']))
    {
      $this->bnregmue->setDepmue(trim($bnregmue['depmue']));
    }
    if (isset($bnregmue['dirmue']))
    {
      $this->bnregmue->setDirmue(trim($bnregmue['dirmue']));
    }
    if (isset($bnregmue['ubimue']))
    {
      $this->bnregmue->setUbimue(trim($bnregmue['ubimue']));
    }
    if (isset($bnregmue['mesdep']))
    {
      $this->bnregmue->setMesdep(trim($bnregmue['mesdep']));
    }
    if (isset($bnregmue['valini']))
    {
      $this->bnregmue->setValini(trim($bnregmue['valini']));
    }
    if (isset($bnregmue['valres']))
    {
      $this->bnregmue->setValres(trim($bnregmue['valres']));
    }
    if (isset($bnregmue['vallib']))
    {
      $this->bnregmue->setVallib(trim($bnregmue['vallib']));
    }
    if (isset($bnregmue['valrex']))
    {
      $this->bnregmue->setValrex(trim($bnregmue['valrex']));
    }
    if (isset($bnregmue['cosrep']))
    {
      $this->bnregmue->setCosrep(trim($bnregmue['cosrep']));
    }
    if (isset($bnregmue['depmen']))
    {
      $this->bnregmue->setDepmen(trim($bnregmue['depmen']));
    }
    if (isset($bnregmue['depacu']))
    {
      $this->bnregmue->setDepacu(trim($bnregmue['depacu']));
    }
    if (!$this->bnregmue->getId())
      $this->bnregmue->setStamue('A');


    if (isset($bnregmue['codalt']))
    {
      $this->bnregmue->setCodalt(trim($bnregmue['codalt']));
    }
    if (isset($bnregmue['fecrcp']))
    {
      if ($bnregmue['fecrcp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnregmue['fecrcp']))
          {
            $value = $dateFormat->format($bnregmue['fecrcp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnregmue['fecrcp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnregmue->setFecrcp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnregmue->setFecrcp(null);
      }
    }
    if (isset($bnregmue['valadi']))
    {
      $this->bnregmue->setValadi(trim($bnregmue['valadi']));
    }
    if (isset($bnregmue['aumviduti']))
    {
      $this->bnregmue->setAumviduti(trim($bnregmue['aumviduti']));
    }
    if (isset($bnregmue['dimviduti']))
    {
      $this->bnregmue->setDimviduti(trim($bnregmue['dimviduti']));
    }
    if (isset($bnregmue['stasem']))
    {
      $this->bnregmue->setStasem(trim($bnregmue['stasem']));
    }
    if (isset($bnregmue['stainm']))
    {
      $this->bnregmue->setStainm(trim($bnregmue['stainm']));
    }
    if (isset($bnregmue['codrespat']))
    {
      $this->bnregmue->setCodrespat($bnregmue['codrespat']);
    }
    if (isset($bnregmue['codresuso']))
    {
      $this->bnregmue->setCodresuso($bnregmue['codresuso']);
    }
  }

  public function setVars()
  {
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=Herramientas::ObtenerFormato('Bndefins','lonact');

  }

  public function executeEdit()
  {
    parent::executeEdit();
  }

  protected function getBnregmueOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $bnregmue = new Bnregmue();
      $this->setVars();
    }
    else
    {
      $bnregmue = BnregmuePeer::retrieveByPk($this->getRequestParameter($id));
      $this->setVars();
      $this->forward404Unless($bnregmue);
    }

    return $bnregmue;
  }

   public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bnregmue = $this->getBnregmueOrCreate();
    try{
   $this->updateBnregmueFromRequest();
    }
    catch(Exception $ex){}

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       if (self::$coderror!=-1)
        {
          $err = Herramientas::obtenerMensajeError(self::$coderror);
          $this->getRequest()->setError('',$err);
        }
       }

    return sfView::SUCCESS;


  }

    public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->bnregmue = $this->getBnregmueOrCreate();
        $this->updateBnregmueFromRequest();

        if (!$this->bnregmue->getId())
        self::$coderror=Bienes::validarBnregmue($this->bnregmue);

        if (self::$coderror<>-1)
        {
          return false;
        }
        else return true;


      }else return true;
    }


}
