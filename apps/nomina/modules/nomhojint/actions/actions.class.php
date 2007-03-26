<?php

/**
 * nomhojint actions.
 *
 * @package    siga
 * @subpackage nomhojint
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomhojintActions extends autonomhojintActions
{
  public function CargarBancos()
	{
	$c = new Criteria();
	$lista_ban = NpbancosPeer::doSelect($c);
	
	$bancos = array();
	
	foreach($lista_ban as $obj_ban)
	{
		$bancos += array($obj_ban->getCodban() => $obj_ban->getNomban());    
	}
	return $bancos;
    } 
    
public function CargarGrupoL()
	{
	$c = new Criteria();
	$lista_grup = NpgrulabPeer::doSelect($c);
	
	$grupol = array();
	
	foreach($lista_grup as $obj_grup)
	{
		$grupol += array($obj_grup->getCodgrulab() => $obj_grup->getDesgrulab());    
	}
	return $grupol;
    }

 public function IngresosEgresos()    
    {
    if ($this->nphojint->getCodemp()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT nphiineg.fecing, nphiineg.fecegr, nphiineg.observ FROM nphiineg  WHERE (nphiineg.codemp='".($this->nphojint->getCodemp())."')";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($rs->next())
             {
                $resultado[]=$rs->getRow();
             }
        //y la envio al template:
        $this->rs=$resultado;
        return $this->rs;
    }
    else
    {
    	return '';
    }    
    
}

public function ExperenciaLaboralD()    
    {
    if ($this->nphojint->getCodemp()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT npexplab.codcar, npexplab.descar, npexplab.fecini, npexplab.fecter, npexplab.sueobt, npexplab.compobt from npexplab, nphojint where (npexplab.codemp='".($this->nphojint->getCodemp())."') AND (npexplab.stacar='D')";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $dentro = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($dentro->next())
             {
                $resultado[]=$dentro->getRow();
             }
        //y la envio al template:
        $this->dentro=$resultado;
        return $this->dentro;
    }
    else
    {
    	return '';
    }    
    
}

public function ExperenciaLaboralF()    
    {
    if ($this->nphojint->getCodemp()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT DISTINCT npexplab.nomemp, npexplab.descar, npexplab.fecini, npexplab.fecter, npexplab.sueobt, npexplab.tiporg from npexplab, nphojint where (npexplab.codemp='".($this->nphojint->getCodemp())."') AND (npexplab.stacar='F')";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $fuera = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($fuera->next())
             {
                $resultado[]=$fuera->getRow();
             }
        //y la envio al template:
        $this->fuera=$resultado;
        return $this->fuera;
    }
    else
    {
    	return '';
    }    
    
}

public function DatosCurricular()    
    {
    if ($this->nphojint->getCodemp()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT npinfcur.nomtit, npinfcur.descur, npinfcur.instit, npinfcur.durcur, npinfcur.anocul from npinfcur, nphojint where (npinfcur.codemp='".($this->nphojint->getCodemp())."')";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $curricular = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($curricular->next())
             {
                $resultado[]=$curricular->getRow();
             }
        //y la envio al template:
        $this->curricular=$resultado;
        return $this->curricular;
    }
    else
    {
    	return '';
    }    
    
}

public function DatosFamiliar()    
    {
    if ($this->nphojint->getCodemp()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT npinffam.cedfam, npinffam.nomfam, npinffam.sexfam, npinffam.fecnac, npinffam.edafam, npinffam.parfam, npinffam.edociv, npinffam.grains, npinffam.traofi, npinffam.codgua, npinffam.seghcm from npinffam, nphojint where (npinffam.codemp='".($this->nphojint->getCodemp())."')";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $familiar = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($familiar->next())
             {
                $resultado[]=$familiar->getRow();
             }
        //y la envio al template:
        $this->familiar=$resultado;
        return $this->familiar;
    }
    else
    {
    	return '';
    }    
    
}
 public function executeEdit()
  {
    $this->nphojint = $this->getNphojintOrCreate();
    $this->listaestadocivil= Constantes::ListaEstadoCivil();
    $this->listaestatus= Constantes::ListaEstatus();
    $this->listaformapago= Constantes::ListaFormaPago();
    $this->listatipocuenta= Constantes::ListaTipoCuenta();
    $this->listatalla= Constantes::ListaTalla();
    $this->listagruposanguineo= Constantes::ListaGrupoSanguineo();
    $this->listatipovivienda= Constantes::ListaTipoVivienda();
    $this->listaformatenencia= Constantes::ListaFormaTenencia();
    $this->grupol = $this->CargarGrupoL();  
    $this->listaformatraslado= Constantes::ListaFormaTraslado();
    $this->bancos = $this->CargarBancos();
    $this->rs = $this->IngresosEgresos();
    $this->dentro = $this->ExperenciaLaboralD(); 
    $this->fuera = $this->ExperenciaLaboralF();   
    $this->curricular = $this->DatosCurricular();
    $this->familiar = $this->DatosFamiliar();
    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNphojintFromRequest();

      $this->saveNphojint($this->nphojint);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomhojint/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomhojint/list');
      }
      else
      {
        return $this->redirect('nomhojint/edit?id='.$this->nphojint->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
 protected function updateNphojintFromRequest()
  {
    $nphojint = $this->getRequestParameter('nphojint');

    if (isset($nphojint['codemp']))
    {
      $this->nphojint->setCodemp(str_pad($nphojint['codemp'],16,''));
    }
    if (isset($nphojint['nomemp']))
    {
      $this->nphojint->setNomemp($nphojint['nomemp']);
    }
    if (isset($nphojint['cedemp']))
    {
      $this->nphojint->setCedemp($nphojint['cedemp']);
    }
    if (isset($nphojint['edociv']))
    {
      $this->nphojint->setEdociv($nphojint['edociv']);
    }
    if (isset($nphojint['numcon']))
    {
      $this->nphojint->setNumcon($nphojint['numcon']);
    }
    if (isset($nphojint['nacemp']))
    {
      $this->nphojint->setNacemp($nphojint['nacemp']);
    }
    if (isset($nphojint['sexemp']))
    {
      $this->nphojint->setSexemp($nphojint['sexemp']);
    }
    if (isset($nphojint['codniv']))
    {
      $this->nphojint->setCodniv($nphojint['codniv']);
    }
    if (isset($nphojint['fotemp']))
    {
      $this->nphojint->setFotemp($nphojint['fotemp']);
    }
    if (isset($nphojint['lugnac']))
    {
      $this->nphojint->setLugnac($nphojint['lugnac']);
    }
    if (isset($nphojint['fecnac']))
    {
      if ($nphojint['fecnac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecnac']))
          {
            $value = $dateFormat->format($nphojint['fecnac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecnac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecnac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecnac(null);
      }
    }
    if (isset($nphojint['edaemp']))
    {
      $this->nphojint->setEdaemp($nphojint['edaemp']);
    }
    if (isset($nphojint['obsgen']))
    {
      $this->nphojint->setObsgen($nphojint['obsgen']);
    }
    if (isset($nphojint['dirhab']))
    {
      $this->nphojint->setDirhab($nphojint['dirhab']);
    }
    if (isset($nphojint['codpai']))
    {
      $this->nphojint->setCodpai($nphojint['codpai']);
    }
    if (isset($nphojint['codest']))
    {
      $this->nphojint->setCodest($nphojint['codest']);
    }
    if (isset($nphojint['codciu']))
    {
      $this->nphojint->setCodciu($nphojint['codciu']);
    }
    if (isset($nphojint['telhab']))
    {
      $this->nphojint->setTelhab($nphojint['telhab']);
    }
    if (isset($nphojint['telotr']))
    {
      $this->nphojint->setTelotr($nphojint['telotr']);
    }
    if (isset($nphojint['celemp']))
    {
      $this->nphojint->setCelemp($nphojint['celemp']);
    }
    if (isset($nphojint['dirotr']))
    {
      $this->nphojint->setDirotr($nphojint['dirotr']);
    }
    if (isset($nphojint['codpa2']))
    {
      $this->nphojint->setCodpa2($nphojint['codpa2']);
    }
    if (isset($nphojint['codes2']))
    {
      $this->nphojint->setCodes2($nphojint['codes2']);
    }
    if (isset($nphojint['codci2']))
    {
      $this->nphojint->setCodci2($nphojint['codci2']);
    }
    if (isset($nphojint['telha2']))
    {
      $this->nphojint->setTelha2($nphojint['telha2']);
    }
    if (isset($nphojint['telot2']))
    {
      $this->nphojint->setTelot2($nphojint['telot2']);
    }
    if (isset($nphojint['emaemp']))
    {
      $this->nphojint->setEmaemp($nphojint['emaemp']);
    }
    if (isset($nphojint['codpos']))
    {
      $this->nphojint->setCodpos($nphojint['codpos']);
    }
    if (isset($nphojint['fecing']))
    {
      if ($nphojint['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecing']))
          {
            $value = $dateFormat->format($nphojint['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecing(null);
      }
    }
    if (isset($nphojint['fecret']))
    {
      if ($nphojint['fecret'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecret']))
          {
            $value = $dateFormat->format($nphojint['fecret'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecret'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecret($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecret(null);
      }
    }
    if (isset($nphojint['fecrei']))
    {
      if ($nphojint['fecrei'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecrei']))
          {
            $value = $dateFormat->format($nphojint['fecrei'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecrei'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecrei($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecrei(null);
      }
    }
    if (isset($nphojint['obsemp']))
    {
      $this->nphojint->setObsemp($nphojint['obsemp']);
    }
    if (isset($nphojint['staemp']))
    {
      $this->nphojint->setStaemp($nphojint['staemp']);
    }
    if (isset($nphojint['codtippag']))
    {
      $this->nphojint->setCodtippag($nphojint['codtippag']);
    }
    if (isset($nphojint['codban']))
    {
      $this->nphojint->setCodban($nphojint['codban']);
    }
    if (isset($nphojint['numcue']))
    {
      $this->nphojint->setNumcue($nphojint['numcue']);
    }
    if (isset($nphojint['tipcue']))
    {
      $this->nphojint->setTipcue($nphojint['tipcue']);
    }
    if (isset($nphojint['fecadmpub']))
    {
      if ($nphojint['fecadmpub'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecadmpub']))
          {
            $value = $dateFormat->format($nphojint['fecadmpub'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecadmpub'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecadmpub($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecadmpub(null);
      }
    }
    if (isset($nphojint['numsso']))
    {
      $this->nphojint->setNumsso($nphojint['numsso']);
    }
    if (isset($nphojint['numpolseg']))
    {
      $this->nphojint->setNumpolseg($nphojint['numpolseg']);
    }
    if (isset($nphojint['feccotsso']))
    {
      if ($nphojint['feccotsso'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['feccotsso']))
          {
            $value = $dateFormat->format($nphojint['feccotsso'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['feccotsso'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFeccotsso($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFeccotsso(null);
      }
    }
    if (isset($nphojint['anoadmpub']))
    {
      $this->nphojint->setAnoadmpub($nphojint['anoadmpub']);
    }
    if (isset($nphojint['tiefid']))
    {
      $this->nphojint->setTiefid($nphojint['tiefid']);
    }
    if (isset($nphojint['talcam']))
    {
      $this->nphojint->setTalcam($nphojint['talcam']);
    }
    if (isset($nphojint['talpan']))
    {
      $this->nphojint->setTalpan($nphojint['talpan']);
    }
    if (isset($nphojint['talcal']))
    {
      $this->nphojint->setTalcal($nphojint['talcal']);
    }
    if (isset($nphojint['grusan']))
    {
      $this->nphojint->setGrusan($nphojint['grusan']);
    }
    if (isset($nphojint['codregpai']))
    {
      $this->nphojint->setCodregpai($nphojint['codregpai']);
    }
    if (isset($nphojint['codregest']))
    {
      $this->nphojint->setCodregest($nphojint['codregest']);
    }
    if (isset($nphojint['codregciu']))
    {
      $this->nphojint->setCodregciu($nphojint['codregciu']);
    }
    if (isset($nphojint['grulab']))
    {
      $this->nphojint->setGrulab($nphojint['grulab']);
    }
    if (isset($nphojint['gruotr']))
    {
      $this->nphojint->setGruotr($nphojint['gruotr']);
    }
    if (isset($nphojint['traslado']))
    {
      $this->nphojint->setTraslado($nphojint['traslado']);
    }
    if (isset($nphojint['traotr']))
    {
      $this->nphojint->setTraotr($nphojint['traotr']);
    }
    if (isset($nphojint['numexp']))
    {
      $this->nphojint->setNumexp($nphojint['numexp']);
    }
    if (isset($nphojint['detexp']))
    {
      $this->nphojint->setDetexp($nphojint['detexp']);
    }
    if (isset($nphojint['derzur']))
    {
      $this->nphojint->setDerzur($nphojint['derzur']);
    }
    if (isset($nphojint['tipviv']))
    {
      $this->nphojint->setTipviv($nphojint['tipviv']);
    }
    if (isset($nphojint['vivotr']))
    {
      $this->nphojint->setVivotr($nphojint['vivotr']);
    }
    if (isset($nphojint['forten']))
    {
      $this->nphojint->setForten($nphojint['forten']);
    }
    if (isset($nphojint['tenotr']))
    {
      $this->nphojint->setTenotr($nphojint['tenotr']);
    }
    if (isset($nphojint['sercon']))
    {
      $this->nphojint->setSercon($nphojint['sercon']);
    }
    if (isset($nphojint['temporal']))
    {
      $this->nphojint->setTemporal($nphojint['temporal']);
    }
  }
  
 protected function getNphojintOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nphojint = new Nphojint();
    }
    else
    {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }
}
