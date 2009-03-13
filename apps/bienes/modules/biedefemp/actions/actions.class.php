<?php

/**
 * biedefemp actions.
 *
 * @package    siga
 * @subpackage biedefemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefempActions extends autobiedefempActions
{
  protected function getBndefinsOrCreate($id = 'id')
  {
  	$this->new=false;
  	$c = new Criteria();
	$reg = BnubibiePeer::doSelect($c);
	if (count($reg)) $this->new=true;

    if (!$this->getRequestParameter($id))
    {
      $bndefins = new Bndefins();
    }
    else
    {
      $bndefins = BndefinsPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($bndefins);
    }

    return $bndefins;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->bndefins = $this->getBndefinsOrCreate();
    try{
    	$this->updateBndefinsFromRequest();
    }
    catch(Exception $ex){}

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

    public function executeIndex()
  {
    $id=Herramientas::getX('CODINS','Bndefins','Id','001');
    if ($id!='<!Registro no Encontrado o Vacio!>')
    {
    return $this->redirect('biedefemp/edit?id='.$id);
    }
    else { return $this->redirect('biedefemp/edit');}
  }


  protected function updateBndefinsFromRequest()
  {
    $bndefins = $this->getRequestParameter('bndefins');

    $lonubi=strlen($bndefins['forubi']);
    $this->bndefins->setLonubi($lonubi);
    $lonact=strlen($bndefins['foract']);
    $this->bndefins->setLonact($lonact);

    if (isset($bndefins['codins']))
    {
      $this->bndefins->setCodins($bndefins['codins']);
    }
    if (isset($bndefins['nomins']))
    {
      $this->bndefins->setNomins($bndefins['nomins']);
    }
    if (isset($bndefins['dirins']))
    {
      $this->bndefins->setDirins($bndefins['dirins']);
    }
    if (isset($bndefins['telins']))
    {
      $this->bndefins->setTelins($bndefins['telins']);
    }
    if (isset($bndefins['faxins']))
    {
      $this->bndefins->setFaxins($bndefins['faxins']);
    }
    if (isset($bndefins['email']))
    {
      $this->bndefins->setEmail($bndefins['email']);
    }
    if (isset($bndefins['edoins']))
    {
      $this->bndefins->setEdoins($bndefins['edoins']);
    }
    if (isset($bndefins['munins']))
    {
      $this->bndefins->setMunins($bndefins['munins']);
    }
    if (isset($bndefins['paqins']))
    {
      $this->bndefins->setPaqins($bndefins['paqins']);
    }
    if (isset($bndefins['foract']))
    {
      $this->bndefins->setForact($bndefins['foract']);
    }
    if (isset($bndefins['desact']))
    {
      $this->bndefins->setDesact($bndefins['desact']);
    }
    if (isset($bndefins['forubi']))
    {
      $this->bndefins->setForubi($bndefins['forubi']);
    }
    if (isset($bndefins['desubi']))
    {
      $this->bndefins->setDesubi($bndefins['desubi']);
    }
    if (isset($bndefins['fecper']))
    {
      if ($bndefins['fecper'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndefins['fecper']))
          {
            $value = $dateFormat->format($bndefins['fecper'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndefins['fecper'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndefins->setFecper($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndefins->setFecper(null);
      }
    }
    if (isset($bndefins['feceje']))
    {
      if ($bndefins['feceje'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndefins['feceje']))
          {
            $value = $dateFormat->format($bndefins['feceje'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndefins['feceje'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndefins->setFeceje($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndefins->setFeceje(null);
      }
    }
    if (isset($bndefins['coddes']))
    {
      $this->bndefins->setCoddes($bndefins['coddes']);
    }
    if (isset($bndefins['porrev']))
    {
      $this->bndefins->setPorrev($bndefins['porrev']);
    }
    if (isset($bndefins['corrmue']))
    {
      $this->bndefins->setCorrmue($bndefins['corrmue']);
    }
    if (isset($bndefins['corrinm']))
    {
      $this->bndefins->setCorrinm($bndefins['corrinm']);
    }
    if (isset($bndefins['corrsem']))
    {
      $this->bndefins->setCorrsem($bndefins['corrsem']);
    }
  }

}
