<?php

/**
 * Facpicsollic actions.
 *
 * @package    siga
 * @subpackage Facpicsollic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacpicsollicActions extends autoFacpicsollicActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
        $this->setVars();
		$this->fcsollic->setMascara($this->mascara);
		$this->configGrid();
  }

  public function setVars()
  {
    $this->mascara = Hacienda::Cargar_mascara();
  }


  protected function updateFcsollicFromRequest()
  {
    $fcsollic = $this->getRequestParameter('fcsollic');

    if (isset($fcsollic['rifcon']))
    {
  	  $c= new Criteria();
      $c->add(FcconrepPeer::RIFCON,trim($fcsollic['rifcon']));
      $fcconrep2 = FcconrepPeer::doSelectOne($c);
      if (count($fcconrep2)==0)
      {
	       $fcconrep_new = new Fcconrep();
	       $fcconrep_new->setRifcon($fcsollic['rifcon']);
           $fcconrep_new->setNomcon($fcsollic['nomcon']);
           $fcconrep_new->setRepcon("C");
	       $fcconrep_new->setDircon($fcsollic['dircon']);
	       $fcconrep_new->setNaccon($fcsollic['nacconcon']);
	       $fcconrep_new->setTipcon($fcsollic['tipconcon']);
	       $fcconrep_new->save();
      }
    }

    if (isset($fcsollic['rifrep']))
    {
  	  $c= new Criteria();
      $c->add(FcconrepPeer::RIFCON,trim($fcsollic['rifrep']));
      $fcconrep2 = FcconrepPeer::doSelectOne($c);
      if (count($fcconrep2)==0)
      {
	       $fcconrep_new = new Fcconrep();
	       $fcconrep_new->setRifcon($fcsollic['rifrep']);
           $fcconrep_new->setNomcon($fcsollic['nomcon']);
           $fcconrep_new->setRepcon("R");
	       $fcconrep_new->setDircon($fcsollic['dircon']);
	       $fcconrep_new->setNaccon($fcsollic['nacconcon']);
	       $fcconrep_new->setTipcon($fcsollic['tipconcon']);
	       $fcconrep_new->save();
      }
    }


    if (isset($fcsollic['numsol']))
    {
      $this->fcsollic->setNumsol($fcsollic['numsol']);
    }
    if (isset($fcsollic['fecsol']))
    {
      if ($fcsollic['fecsol'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecsol']))
          {
            $value = $dateFormat->format($fcsollic['fecsol'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecsol'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecsol($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecsol(null);
      }
    }
    if (isset($fcsollic['estado']))
    {
      $this->fcsollic->setEstado($fcsollic['estado']);
    }
    if (isset($fcsollic['rifcon']))
    {
      $this->fcsollic->setRifcon($fcsollic['rifcon']);
    }
    if (isset($fcsollic['dircon']))
    {
      $this->fcsollic->setDircon($fcsollic['dircon']);
    }
    if (isset($fcsollic['nacconcon']))
    {
      $this->fcsollic->setNacconcon($fcsollic['nacconcon']);
    }
    if (isset($fcsollic['tipconcon']))
    {
      $this->fcsollic->setTipconcon($fcsollic['tipconcon']);
    }
    if (isset($fcsollic['rifrep']))
    {
      $this->fcsollic->setRifrep($fcsollic['rifrep']);
    }
    if (isset($fcsollic['dirconrep']))
    {
      $this->fcsollic->setDirconrep($fcsollic['dirconrep']);
    }
    if (isset($fcsollic['nacconrep']))
    {
      $this->fcsollic->setNacconrep($fcsollic['nacconrep']);
    }
    if (isset($fcsollic['tipconrep']))
    {
      $this->fcsollic->setTipconrep($fcsollic['tipconrep']);
    }
    if (isset($fcsollic['nomneg']))
    {
      $this->fcsollic->setNomneg($fcsollic['nomneg']);
    }
    if (isset($fcsollic['dirpri']))
    {
      $this->fcsollic->setDirpri($fcsollic['dirpri']);
    }
    if (isset($fcsollic['tipinm']))
    {
      $this->fcsollic->setTipinm($fcsollic['tipinm']);
    }
    if (isset($fcsollic['catcon']))
    {
      $this->fcsollic->setCatcon($fcsollic['catcon']);
    }
    if (isset($fcsollic['tipest']))
    {
      $this->fcsollic->setTipest($fcsollic['tipest']);
    }
    if (isset($fcsollic['codrut']))
    {
      $this->fcsollic->setCodrut($fcsollic['codrut']);
    }
    if (isset($fcsollic['discli']))
    {
      $this->fcsollic->setDiscli($fcsollic['discli']);
    }
    if (isset($fcsollic['disbar']))
    {
      $this->fcsollic->setDisbar($fcsollic['disbar']);
    }
    if (isset($fcsollic['disdis']))
    {
      $this->fcsollic->setDisdis($fcsollic['disdis']);
    }
    if (isset($fcsollic['disins']))
    {
      $this->fcsollic->setDisins($fcsollic['disins']);
    }
    if (isset($fcsollic['disfun']))
    {
      $this->fcsollic->setDisfun($fcsollic['disfun']);
    }
    if (isset($fcsollic['disest']))
    {
      $this->fcsollic->setDisest($fcsollic['disest']);
    }
    if (isset($fcsollic['horini']))
    {
      if ($fcsollic['horini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horini']))
          {
            $value = $dateFormat->format($fcsollic['horini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorini(null);
      }
    }
    if (isset($fcsollic['horcie']))
    {
      if ($fcsollic['horcie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horcie']))
          {
            $value = $dateFormat->format($fcsollic['horcie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horcie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorcie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorcie(null);
      }
    }
    if (isset($fcsollic['fecini']))
    {
      if ($fcsollic['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecini']))
          {
            $value = $dateFormat->format($fcsollic['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecini(null);
      }
    }
    if (isset($fcsollic['fecfin']))
    {
      if ($fcsollic['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecfin']))
          {
            $value = $dateFormat->format($fcsollic['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecfin(null);
      }
    }
    if (isset($fcsollic['capsoc']))
    {
      $this->fcsollic->setCapsoc($fcsollic['capsoc']);
    }
    if (isset($fcsollic['grid']))
    {
      $this->fcsollic->setGrid($fcsollic['grid']);
    }
    if (isset($fcsollic['funres']))
    {
      $this->fcsollic->setFunres($fcsollic['funres']);
    }
    if (isset($fcsollic['fecres']))
    {
      if ($fcsollic['fecres'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecres']))
          {
            $value = $dateFormat->format($fcsollic['fecres'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecres'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecres($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecres(null);
      }
    }
    if (isset($fcsollic['autorizacion']))
    {
      $this->fcsollic->setAutorizacion($fcsollic['autorizacion']);
    }
    if (isset($fcsollic['negacion']))
    {
      $this->fcsollic->setNegacion($fcsollic['negacion']);
    }

    if (isset($fcsollic['numsol']))
    {
      $this->fcsollic->setNumsol($fcsollic['numsol']);
    }
    if (isset($fcsollic['numlic']))
    {
      $this->fcsollic->setNumlic($fcsollic['numlic']);
    }
    if (isset($fcsollic['fecsol']))
    {
      if ($fcsollic['fecsol'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecsol']))
          {
            $value = $dateFormat->format($fcsollic['fecsol'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecsol'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecsol($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecsol(null);
      }
    }
    if (isset($fcsollic['feclic']))
    {
      if ($fcsollic['feclic'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['feclic']))
          {
            $value = $dateFormat->format($fcsollic['feclic'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['feclic'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFeclic($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFeclic(null);
      }
    }
    if (isset($fcsollic['rifcon']))
    {
      $this->fcsollic->setRifcon($fcsollic['rifcon']);
    }
    if (isset($fcsollic['catcon']))
    {
      $this->fcsollic->setCatcon($fcsollic['catcon']);
    }
    if (isset($fcsollic['rifrep']))
    {
      $this->fcsollic->setRifrep($fcsollic['rifrep']);
    }
    if (isset($fcsollic['nomneg']))
    {
      $this->fcsollic->setNomneg($fcsollic['nomneg']);
    }
    if (isset($fcsollic['tipinm']))
    {
      $this->fcsollic->setTipinm($fcsollic['tipinm']);
    }
    if (isset($fcsollic['tipest']))
    {
      $this->fcsollic->setTipest($fcsollic['tipest']);
    }
    if (isset($fcsollic['dirpri']))
    {
      $this->fcsollic->setDirpri($fcsollic['dirpri']);
    }
    if (isset($fcsollic['codrut']))
    {
      $this->fcsollic->setCodrut($fcsollic['codrut']);
    }
    if (isset($fcsollic['capsoc']))
    {
      $this->fcsollic->setCapsoc($fcsollic['capsoc']);
    }
    if (isset($fcsollic['horini']))
    {
      if ($fcsollic['horini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horini']))
          {
            $value = $dateFormat->format($fcsollic['horini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorini(null);
      }
    }
    if (isset($fcsollic['horcie']))
    {
      if ($fcsollic['horcie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horcie']))
          {
            $value = $dateFormat->format($fcsollic['horcie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horcie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorcie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorcie(null);
      }
    }
    if (isset($fcsollic['fecini']))
    {
      if ($fcsollic['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecini']))
          {
            $value = $dateFormat->format($fcsollic['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecini(null);
      }
    }
    if (isset($fcsollic['fecfin']))
    {
      if ($fcsollic['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecfin']))
          {
            $value = $dateFormat->format($fcsollic['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecfin(null);
      }
    }
    if (isset($fcsollic['discli']))
    {
      $this->fcsollic->setDiscli($fcsollic['discli']);
    }
    if (isset($fcsollic['disbar']))
    {
      $this->fcsollic->setDisbar($fcsollic['disbar']);
    }
    if (isset($fcsollic['disdis']))
    {
      $this->fcsollic->setDisdis($fcsollic['disdis']);
    }
    if (isset($fcsollic['disins']))
    {
      $this->fcsollic->setDisins($fcsollic['disins']);
    }
    if (isset($fcsollic['disfun']))
    {
      $this->fcsollic->setDisfun($fcsollic['disfun']);
    }
    if (isset($fcsollic['disest']))
    {
      $this->fcsollic->setDisest($fcsollic['disest']);
    }
    if (isset($fcsollic['funres']))
    {
      $this->fcsollic->setFunres($fcsollic['funres']);
    }
    if (isset($fcsollic['funrel']))
    {
      $this->fcsollic->setFunrel($fcsollic['funrel']);
    }
    if (isset($fcsollic['fecres']))
    {
      if ($fcsollic['fecres'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecres']))
          {
            $value = $dateFormat->format($fcsollic['fecres'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecres'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecres($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecres(null);
      }
    }
    if (isset($fcsollic['fecapr']))
    {
      if ($fcsollic['fecapr'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecapr']))
          {
            $value = $dateFormat->format($fcsollic['fecapr'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecapr'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecapr($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecapr(null);
      }
    }
    if (isset($fcsollic['fecven']))
    {
      if ($fcsollic['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecven']))
          {
            $value = $dateFormat->format($fcsollic['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecven(null);
      }
    }
    if (isset($fcsollic['tomo']))
    {
      $this->fcsollic->setTomo($fcsollic['tomo']);
    }
    if (isset($fcsollic['folio']))
    {
      $this->fcsollic->setFolio($fcsollic['folio']);
    }
    if (isset($fcsollic['numero']))
    {
      $this->fcsollic->setNumero($fcsollic['numero']);
    }
    if (isset($fcsollic['taslic']))
    {
      $this->fcsollic->setTaslic($fcsollic['taslic']);
    }
    if (isset($fcsollic['deuanl']))
    {
      $this->fcsollic->setDeuanl($fcsollic['deuanl']);
    }
    if (isset($fcsollic['deuacl']))
    {
      $this->fcsollic->setDeuacl($fcsollic['deuacl']);
    }
    if (isset($fcsollic['implic']))
    {
      $this->fcsollic->setImplic($fcsollic['implic']);
    }
    if (isset($fcsollic['deuanp']))
    {
      $this->fcsollic->setDeuanp($fcsollic['deuanp']);
    }
    if (isset($fcsollic['deuacp']))
    {
      $this->fcsollic->setDeuacp($fcsollic['deuacp']);
    }
    if (isset($fcsollic['stasol']))
    {
      $this->fcsollic->setStasol($fcsollic['stasol']);
    }
    if (isset($fcsollic['stalic']))
    {
      $this->fcsollic->setStalic($fcsollic['stalic']);
    }
    if (isset($fcsollic['stadec']))
    {
      $this->fcsollic->setStadec($fcsollic['stadec']);
    }
    if (isset($fcsollic['staliq']))
    {
      $this->fcsollic->setStaliq($fcsollic['staliq']);
    }
    if (isset($fcsollic['nomcon']))
    {
      $this->fcsollic->setNomcon($fcsollic['nomcon']);
    }
    if (isset($fcsollic['dircon']))
    {
      $this->fcsollic->setDircon($fcsollic['dircon']);
    }
    if (isset($fcsollic['tipo']))
    {
      $this->fcsollic->setTipo($fcsollic['tipo']);
    }
    if (isset($fcsollic['estser']))
    {
      $this->fcsollic->setEstser($fcsollic['estser']);
    }
    if (isset($fcsollic['telneg']))
    {
      $this->fcsollic->setTelneg($fcsollic['telneg']);
    }
    if (isset($fcsollic['clacon']))
    {
      $this->fcsollic->setClacon($fcsollic['clacon']);
    }
    if (isset($fcsollic['capact']))
    {
      $this->fcsollic->setCapact($fcsollic['capact']);
    }
    if (isset($fcsollic['numsol1']))
    {
      $this->fcsollic->setNumsol1($fcsollic['numsol1']);
    }
    if (isset($fcsollic['numlic1']))
    {
      $this->fcsollic->setNumlic1($fcsollic['numlic1']);
    }
    if (isset($fcsollic['horainie']))
    {
      if ($fcsollic['horainie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horainie']))
          {
            $value = $dateFormat->format($fcsollic['horainie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horainie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorainie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorainie(null);
      }
    }
    if (isset($fcsollic['horaciee']))
    {
      if ($fcsollic['horaciee'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horaciee']))
          {
            $value = $dateFormat->format($fcsollic['horaciee'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horaciee'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHoraciee($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHoraciee(null);
      }
    }
    if (isset($fcsollic['unitri']))
    {
      $this->fcsollic->setUnitri($fcsollic['unitri']);
    }
    if (isset($fcsollic['tipsol']))
    {
      $this->fcsollic->setTipsol($fcsollic['tipsol']);
    }
    if (isset($fcsollic['unitrialc']))
    {
      $this->fcsollic->setUnitrialc($fcsollic['unitrialc']);
    }
    if (isset($fcsollic['unitriotr']))
    {
      $this->fcsollic->setUnitriotr($fcsollic['unitriotr']);
    }
    if (isset($fcsollic['licant']))
    {
      $this->fcsollic->setLicant($fcsollic['licant']);
    }
    if (isset($fcsollic['dueant']))
    {
      $this->fcsollic->setDueant($fcsollic['dueant']);
    }
    if (isset($fcsollic['dirant']))
    {
      $this->fcsollic->setDirant($fcsollic['dirant']);
    }
    if (isset($fcsollic['impext']))
    {
      $this->fcsollic->setImpext($fcsollic['impext']);
    }
    if (isset($fcsollic['imptotal']))
    {
      $this->fcsollic->setImptotal($fcsollic['imptotal']);
    }
    if (isset($fcsollic['codact']))
    {
      $this->fcsollic->setCodact($fcsollic['codact']);
    }
    if (isset($fcsollic['codtiplic']))
    {
      $this->fcsollic->setCodtiplic($fcsollic['codtiplic']);
    }
    if (isset($fcsollic['fecinilic']))
    {
      if ($fcsollic['fecinilic'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecinilic']))
          {
            $value = $dateFormat->format($fcsollic['fecinilic'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecinilic'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecinilic($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecinilic(null);
      }
    }

    if (isset($fcsollic['licnegada']))
    {
      $this->fcsollic->setLicnegada($fcsollic['licnegada']);
    }
    if (isset($fcsollic['licmodificada']))
    {
      $this->fcsollic->setLicmodificada($fcsollic['licmodificada']);
    }
    if (isset($fcsollic['idlic']))
    {
      $this->fcsollic->setIdlic($fcsollic['idlic']);
    }
    if (isset($fcsollic['fechlic']))
    {
      $this->fcsollic->setFechlic($fcsollic['fechlic']);
    }
    if (isset($fcsollic['comnlic']))
    {
      $this->fcsollic->setComnlic($fcsollic['comnlic']);
    }
    if (isset($fcsollic['numneg']))
    {
      $this->fcsollic->setNumneg($fcsollic['numneg']);
    }

    if (isset($fcsollic['funneg']))
    {
      $this->fcsollic->setFunneg($fcsollic['funneg']);
    }
    if (isset($fcsollic['tomon']))
    {
      $this->fcsollic->setTomon($fcsollic['tomon']);
    }
    if (isset($fcsollic['numeron']))
    {
      $this->fcsollic->setNumeron($fcsollic['numeron']);
    }
    if (isset($fcsollic['folion']))
    {
      $this->fcsollic->setFolion($fcsollic['folion']);
    }
    if (isset($fcsollic['motneg']))
    {
      $this->fcsollic->setMotneg($fcsollic['motneg']);
    }
    if (isset($fcsollic['fecneg']))
    {
      $this->fcsollic->setFecneg($fcsollic['fecneg']);
    }
    if (isset($fcsollic['resolu']))
    {
      $this->fcsollic->setResolu($fcsollic['resolu']);
    }
    if (isset($fcsollic['licnegada']))
    {
      $this->fcsollic->setLicnegada($fcsollic['licnegada']);
    }
  }



  public function deleting($fcsollic)
  {
   if ($fcsollic->getId()!="")
   {
	$c = new Criteria();
	$c->add(FcactpicPeer::NUMDOC,$fcsollic->getNumsol());
	FcactpicPeer::doDelete($c);
    $fcsollic->delete();
    return -1;
   }
  }


  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcactpicPeer::NUMDOC,$this->fcsollic->getNumsol());
    $per = FcactpicPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facpicsollic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[1][0]->setCatalogo('Fcactcom','sf_admin_edit_form', array('codact'=>'1','desact'=>'2'), 'Facpicsollic_Fcactcom');
	$this->columnas[1][2]->setCombo(Constantes::ListaFcsollic());
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcsollic->setGrid($this->grid);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
	$javascript = "";
    $ajax   = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
  	      	  $javascript = $javascript . "$('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcsollic_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcsollic_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcsollic_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcsollic_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {
   	      	$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
	      	$javascript = $javascript . "$('autorizacion').show();";
	      	$javascript = $javascript . "document.getElementById('fcsollic_nomcon').removeAttribute('readonly',1);";
	      }

          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_nomcon","'.$nomcon.'",""],["fcsollic_dircon","'.$dircon.'",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
        break;
      case '2':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
  	      	  $javascript = $javascript . "$('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcsollic_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcsollic_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcsollic_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcsollic_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
      	    $javascript = $javascript . "$('autorizacion').show();";
	      	$javascript = $javascript . "document.getElementById('fcsollic_nomconrep').removeAttribute('readonly',1);";
	      }
          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_nomconrep","'.$nomcon.'",""],["fcsollic_dirconrep","'.$dircon.'",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
        break;

      case '3':
        $codcatinm = $this->getRequestParameter('codcatinm','');
        $catcon = "";
        $descatcon = "";
        $fecha = date("d/m/Y");
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
	      $c= new Criteria();
	      $c->add(FcreginmPeer::CODCATINM,trim($codcatinm));
	      $countreg = FcreginmPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
	      	  $catcon=$countreg->getCodcatinm();
	      	  $descatcon=$countreg->getNomcon();
	      }
	      else
	      {
               $javascript = $javascript . "alert('Categoria de Catastro no Existe.');";
	      }
      	  $javascript = $javascript . "$('autorizacion').show();";
          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_catcon","'.$catcon.'",""],["fcsollic_desubicat","'.$descatcon.'",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
      break;

      case '4':
          $fecha = date("d/m/Y");
	      $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
      	  $javascript = $javascript . "$('autorizacion').show();";
          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
      break;


      case '5':
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcsolnegPeer::NUMNEG);
	      $countreg = FcsolnegPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getNumneg()+1),10,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,10,'0',STR_PAD_LEFT);
      	  $javascript = $javascript . "$('autorizacion').show();";
          $output = '[["fcsollic_licnegada","I",""],["fcsollic_numneg","'.$correlativo.'",""],["javascript","' . $javascript . '",""]]';
      break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    $this->fcsollic = $this->getFcsollicOrCreate();
    $this->updateFcsollicFromRequest();
    //exit('hola'.$this->getRequestParameter('fcsollic[idlic]'));
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if ($this->getRequestParameter('fcsollic[idlic]')!="" and $this->getRequestParameter('fcsollic[fechlic]')!="" and $this->getRequestParameter('fcsollic[comnlic]')=="")
      {
          $this->coderr=703;
          return false;
      }

      if ($this->getRequestParameter('fcsollic[numneg]')=="" and $this->getRequestParameter('fcsollic[licnegada]')=="I")
      {
          $this->coderr=704;
          return false;
      }

     }
     return true;
  }


  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGrid($this,$this->grid);
    $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($fcsollic)
  {
  	$correlativo='';
  	if ($fcsollic->getId()=='')
  	{
          $fcsollic->setNumsol(str_replace('#','0',$fcsollic->getNumsol()));
          $fcsollic->setNumsol(str_pad(trim($countreg->getNumsol()+1),12,'0',STR_PAD_LEFT));
  		  $c= new Criteria();
	      $c->add(FcsollicPeer::NUMSOL,$fcsollic->getNumsol());
	      $countreg = FcsollicPeer::doSelectOne($c);
	      if (count($countreg)<=0)
				$correlativo=$fcsollic->getNumsol();
	      else
	      {
	  		  $c= new Criteria();
	          $c->addDescendingOrderByColumn(FcsollicPeer::NUMSOL);
		      $reg = FcsollicPeer::doSelectOne($c);
		      if (count($reg)>0)
		      {
				$correlativo=str_pad(trim($reg->getNumsol()+1),12,'0',STR_PAD_LEFT);
		      }
	      }
	      $fcsollic->setNumsol($correlativo);
  	}
  	else
  	{
		if ($fcsollic->getLicmodificada()=='I') Hacienda::Grabar_Anteriores($fcsollic);
	    if ($fcsollic->getLicnegada()=='I') Hacienda::Salvarneg($fcsollic);
  	}
    $fcsollic->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Fcsollic($fcsollic, $grid);
    return -1;
  }

}
