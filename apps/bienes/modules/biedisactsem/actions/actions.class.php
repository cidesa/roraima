<?php

/**
 * biedisactsem actions.
 *
 * @package    Roraima
 * @subpackage biedisactsem
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedisactsemActions extends autobiedisactsemActions
{
  public function CargarTipos()
	{
	$c = new Criteria();
	$lista_tip = BndisbiePeer::doSelect($c);
	
	$tipos = array();
	
	foreach($lista_tip as $obj_tip)
	{
		$tipos += array($obj_tip->getCoddis()." - ".$obj_tip->getDesdis() => $obj_tip->getCoddis()." - ".$obj_tip->getDesdis());    
	}
	return $tipos;
    }
	
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bndissem = $this->getBndissemOrCreate();
    $this->tipos = $this->CargarTipos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBndissemFromRequest();

      $this->saveBndissem($this->bndissem);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('biedisactsem/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('biedisactsem/list');
      }
      else
      {
        return $this->redirect('biedisactsem/edit?id='.$this->bndissem->getId());
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
  protected function updateBndissemFromRequest()
  {
    $bndissem = $this->getRequestParameter('bndissem');

    if (isset($bndissem['codact']))
    {
      $this->bndissem->setCodact($bndissem['codact']);
    }
    if (isset($bndissem['codsem']))
    {
      $this->bndissem->setCodsem($bndissem['codsem']);
    }
    if (isset($bndissem['dessem']))
    {
      $this->bndissem->setDessem($bndissem['dessem']);
    }
    if (isset($bndissem['nrodissem']))
    {
      $this->bndissem->setNrodissem($bndissem['nrodissem']);
    }
    if (isset($bndissem['tipdissem']))
    {
      $this->bndissem->setTipdissem($bndissem['tipdissem']);
    }
    if (isset($bndissem['motdissem']))
    {
      $this->bndissem->setMotdissem($bndissem['motdissem']);
    }
    if (isset($bndissem['fecdissem']))
    {
      if ($bndissem['fecdissem'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndissem['fecdissem']))
          {
            $value = $dateFormat->format($bndissem['fecdissem'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndissem['fecdissem'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndissem->setFecdissem($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndissem->setFecdissem(null);
      }
    }
    if (isset($bndissem['fecdevdis']))
    {
      if ($bndissem['fecdevdis'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bndissem['fecdevdis']))
          {
            $value = $dateFormat->format($bndissem['fecdevdis'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bndissem['fecdevdis'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bndissem->setFecdevdis($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bndissem->setFecdevdis(null);
      }
    }
    if (isset($bndissem['mondissem']))
    {
      $this->bndissem->setMondissem($bndissem['mondissem']);
    }
    if (isset($bndissem['detdissem']))
    {
      $this->bndissem->setDetdissem($bndissem['detdissem']);
    }
    if (isset($bndissem['codubiori']))
    {
      $this->bndissem->setCodubiori($bndissem['codubiori']);
    }
    if (isset($bndissem['desubiori']))
    {
      $this->bndissem->setDesubiori($bndissem['desubiori']);
    }
    if (isset($bndissem['codubides']))
    {
      $this->bndissem->setCodubides($bndissem['codubides']);
    }
    if (isset($bndissem['desubides']))
    {
      $this->bndissem->setDesubides($bndissem['desubides']);
    }
    if (isset($bndissem['obsdissem']))
    {
      $this->bndissem->setObsdissem($bndissem['obsdissem']);
    }
    
      $this->bndissem->setStadissem('A');
   
  }
}
