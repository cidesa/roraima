<?php


abstract class BaseCccredit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numexp;


	
	protected $natcre;


	
	protected $destino;


	
	protected $monapr;


	
	protected $actapr;


	
	protected $fecapr;


	
	protected $apercue;


	
	protected $feccrecue;


	
	protected $numcue;


	
	protected $gentxt;


	
	protected $fecliq;


	
	protected $disdes;


	
	protected $estatu;


	
	protected $ccbenefi_id;


	
	protected $ccfuefin_id;


	
	protected $cctipcar_id;


	
	protected $ccsolici_id;


	
	protected $cctipmon_id;


	
	protected $ccbanco_id;


	
	protected $ccagenci_id;


	
	protected $ccprioridad_id;


	
	protected $cccondic_id;


	
	protected $observ;


	
	protected $cctipups_id;


	
	protected $numnom;


	
	protected $cpcompro_id;

	
	protected $aCcbenefi;

	
	protected $aCcfuefin;

	
	protected $aCctipcar;

	
	protected $aCcsolici;

	
	protected $aCctipmon;

	
	protected $aCcbanco;

	
	protected $aCcagenci;

	
	protected $aCcprioridad;

	
	protected $aCccondic;

	
	protected $aCctipups;

	
	protected $aCpcompro;

	
	protected $collCcactanas;

	
	protected $lastCcactanaCriteria = null;

	
	protected $collCcamoacts;

	
	protected $lastCcamoactCriteria = null;

	
	protected $collCcamoactresps;

	
	protected $lastCcamoactrespCriteria = null;

	
	protected $collCcamopags;

	
	protected $lastCcamopagCriteria = null;

	
	protected $collCcanacres;

	
	protected $lastCcanacreCriteria = null;

	
	protected $collCcbitcreds;

	
	protected $lastCcbitcredCriteria = null;

	
	protected $collCcconcres;

	
	protected $lastCcconcreCriteria = null;

	
	protected $collCccreregs;

	
	protected $lastCccreregCriteria = null;

	
	protected $collCccresess;

	
	protected $lastCccresesCriteria = null;

	
	protected $collCccuadess;

	
	protected $lastCccuadesCriteria = null;

	
	protected $collCcdedcres;

	
	protected $lastCcdedcreCriteria = null;

	
	protected $collCcdefamos;

	
	protected $lastCcdefamoCriteria = null;

	
	protected $collCcestcres;

	
	protected $lastCcestcreCriteria = null;

	
	protected $collCcfiadors;

	
	protected $lastCcfiadorCriteria = null;

	
	protected $collCcgarants;

	
	protected $lastCcgarantCriteria = null;

	
	protected $collCcgarsols;

	
	protected $lastCcgarsolCriteria = null;

	
	protected $collCcgescobs;

	
	protected $lastCcgescobCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcpagos;

	
	protected $lastCcpagoCriteria = null;

	
	protected $collCcparcres;

	
	protected $lastCcparcreCriteria = null;

	
	protected $collCcparrecs;

	
	protected $lastCcparrecCriteria = null;

	
	protected $collCcprocreds;

	
	protected $lastCcprocredCriteria = null;

	
	protected $collCcreccres;

	
	protected $lastCcreccreCriteria = null;

	
	protected $collCcrecprocres;

	
	protected $lastCcrecprocreCriteria = null;

	
	protected $collCcsoldess;

	
	protected $lastCcsoldesCriteria = null;

	
	protected $collCcsolliqs;

	
	protected $lastCcsolliqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getNatcre()
  {

    return trim($this->natcre);

  }
  
  public function getDestino()
  {

    return trim($this->destino);

  }
  
  public function getMonapr($val=false)
  {

    if($val) return number_format($this->monapr,2,',','.');
    else return $this->monapr;

  }
  
  public function getActapr()
  {

    return trim($this->actapr);

  }
  
  public function getFecapr($format = 'Y-m-d')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getApercue()
  {

    return trim($this->apercue);

  }
  
  public function getFeccrecue($format = 'Y-m-d')
  {

    if ($this->feccrecue === null || $this->feccrecue === '') {
      return null;
    } elseif (!is_int($this->feccrecue)) {
            $ts = adodb_strtotime($this->feccrecue);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccrecue] as date/time value: " . var_export($this->feccrecue, true));
      }
    } else {
      $ts = $this->feccrecue;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getGentxt()
  {

    return trim($this->gentxt);

  }
  
  public function getFecliq($format = 'Y-m-d')
  {

    if ($this->fecliq === null || $this->fecliq === '') {
      return null;
    } elseif (!is_int($this->fecliq)) {
            $ts = adodb_strtotime($this->fecliq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecliq] as date/time value: " . var_export($this->fecliq, true));
      }
    } else {
      $ts = $this->fecliq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDisdes()
  {

    return trim($this->disdes);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCcfuefinId()
  {

    return $this->ccfuefin_id;

  }
  
  public function getCctipcarId()
  {

    return $this->cctipcar_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCctipmonId()
  {

    return $this->cctipmon_id;

  }
  
  public function getCcbancoId()
  {

    return $this->ccbanco_id;

  }
  
  public function getCcagenciId()
  {

    return $this->ccagenci_id;

  }
  
  public function getCcprioridadId()
  {

    return $this->ccprioridad_id;

  }
  
  public function getCccondicId()
  {

    return $this->cccondic_id;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCctipupsId()
  {

    return $this->cctipups_id;

  }
  
  public function getNumnom()
  {

    return trim($this->numnom);

  }
  
  public function getCpcomproId()
  {

    return $this->cpcompro_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccreditPeer::ID;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = CccreditPeer::NUMEXP;
      }
  
	} 
	
	public function setNatcre($v)
	{

    if ($this->natcre !== $v) {
        $this->natcre = $v;
        $this->modifiedColumns[] = CccreditPeer::NATCRE;
      }
  
	} 
	
	public function setDestino($v)
	{

    if ($this->destino !== $v) {
        $this->destino = $v;
        $this->modifiedColumns[] = CccreditPeer::DESTINO;
      }
  
	} 
	
	public function setMonapr($v)
	{

    if ($this->monapr !== $v) {
        $this->monapr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CccreditPeer::MONAPR;
      }
  
	} 
	
	public function setActapr($v)
	{

    if ($this->actapr !== $v) {
        $this->actapr = $v;
        $this->modifiedColumns[] = CccreditPeer::ACTAPR;
      }
  
	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = CccreditPeer::FECAPR;
    }

	} 
	
	public function setApercue($v)
	{

    if ($this->apercue !== $v) {
        $this->apercue = $v;
        $this->modifiedColumns[] = CccreditPeer::APERCUE;
      }
  
	} 
	
	public function setFeccrecue($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccrecue] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccrecue !== $ts) {
      $this->feccrecue = $ts;
      $this->modifiedColumns[] = CccreditPeer::FECCRECUE;
    }

	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CccreditPeer::NUMCUE;
      }
  
	} 
	
	public function setGentxt($v)
	{

    if ($this->gentxt !== $v) {
        $this->gentxt = $v;
        $this->modifiedColumns[] = CccreditPeer::GENTXT;
      }
  
	} 
	
	public function setFecliq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecliq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecliq !== $ts) {
      $this->fecliq = $ts;
      $this->modifiedColumns[] = CccreditPeer::FECLIQ;
    }

	} 
	
	public function setDisdes($v)
	{

    if ($this->disdes !== $v) {
        $this->disdes = $v;
        $this->modifiedColumns[] = CccreditPeer::DISDES;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CccreditPeer::ESTATU;
      }
  
	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCcfuefinId($v)
	{

    if ($this->ccfuefin_id !== $v) {
        $this->ccfuefin_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCFUEFIN_ID;
      }
  
		if ($this->aCcfuefin !== null && $this->aCcfuefin->getId() !== $v) {
			$this->aCcfuefin = null;
		}

	} 
	
	public function setCctipcarId($v)
	{

    if ($this->cctipcar_id !== $v) {
        $this->cctipcar_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCTIPCAR_ID;
      }
  
		if ($this->aCctipcar !== null && $this->aCctipcar->getId() !== $v) {
			$this->aCctipcar = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCctipmonId($v)
	{

    if ($this->cctipmon_id !== $v) {
        $this->cctipmon_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCTIPMON_ID;
      }
  
		if ($this->aCctipmon !== null && $this->aCctipmon->getId() !== $v) {
			$this->aCctipmon = null;
		}

	} 
	
	public function setCcbancoId($v)
	{

    if ($this->ccbanco_id !== $v) {
        $this->ccbanco_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCBANCO_ID;
      }
  
		if ($this->aCcbanco !== null && $this->aCcbanco->getId() !== $v) {
			$this->aCcbanco = null;
		}

	} 
	
	public function setCcagenciId($v)
	{

    if ($this->ccagenci_id !== $v) {
        $this->ccagenci_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCAGENCI_ID;
      }
  
		if ($this->aCcagenci !== null && $this->aCcagenci->getId() !== $v) {
			$this->aCcagenci = null;
		}

	} 
	
	public function setCcprioridadId($v)
	{

    if ($this->ccprioridad_id !== $v) {
        $this->ccprioridad_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCPRIORIDAD_ID;
      }
  
		if ($this->aCcprioridad !== null && $this->aCcprioridad->getId() !== $v) {
			$this->aCcprioridad = null;
		}

	} 
	
	public function setCccondicId($v)
	{

    if ($this->cccondic_id !== $v) {
        $this->cccondic_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCCONDIC_ID;
      }
  
		if ($this->aCccondic !== null && $this->aCccondic->getId() !== $v) {
			$this->aCccondic = null;
		}

	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CccreditPeer::OBSERV;
      }
  
	} 
	
	public function setCctipupsId($v)
	{

    if ($this->cctipups_id !== $v) {
        $this->cctipups_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CCTIPUPS_ID;
      }
  
		if ($this->aCctipups !== null && $this->aCctipups->getId() !== $v) {
			$this->aCctipups = null;
		}

	} 
	
	public function setNumnom($v)
	{

    if ($this->numnom !== $v) {
        $this->numnom = $v;
        $this->modifiedColumns[] = CccreditPeer::NUMNOM;
      }
  
	} 
	
	public function setCpcomproId($v)
	{

    if ($this->cpcompro_id !== $v) {
        $this->cpcompro_id = $v;
        $this->modifiedColumns[] = CccreditPeer::CPCOMPRO_ID;
      }
  
		if ($this->aCpcompro !== null && $this->aCpcompro->getId() !== $v) {
			$this->aCpcompro = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->natcre = $rs->getString($startcol + 2);

      $this->destino = $rs->getString($startcol + 3);

      $this->monapr = $rs->getFloat($startcol + 4);

      $this->actapr = $rs->getString($startcol + 5);

      $this->fecapr = $rs->getDate($startcol + 6, null);

      $this->apercue = $rs->getString($startcol + 7);

      $this->feccrecue = $rs->getDate($startcol + 8, null);

      $this->numcue = $rs->getString($startcol + 9);

      $this->gentxt = $rs->getString($startcol + 10);

      $this->fecliq = $rs->getDate($startcol + 11, null);

      $this->disdes = $rs->getString($startcol + 12);

      $this->estatu = $rs->getString($startcol + 13);

      $this->ccbenefi_id = $rs->getInt($startcol + 14);

      $this->ccfuefin_id = $rs->getInt($startcol + 15);

      $this->cctipcar_id = $rs->getInt($startcol + 16);

      $this->ccsolici_id = $rs->getInt($startcol + 17);

      $this->cctipmon_id = $rs->getInt($startcol + 18);

      $this->ccbanco_id = $rs->getInt($startcol + 19);

      $this->ccagenci_id = $rs->getInt($startcol + 20);

      $this->ccprioridad_id = $rs->getInt($startcol + 21);

      $this->cccondic_id = $rs->getInt($startcol + 22);

      $this->observ = $rs->getString($startcol + 23);

      $this->cctipups_id = $rs->getInt($startcol + 24);

      $this->numnom = $rs->getString($startcol + 25);

      $this->cpcompro_id = $rs->getInt($startcol + 26);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 27; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccredit object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CccreditPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccreditPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CccreditPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}

			if ($this->aCcfuefin !== null) {
				if ($this->aCcfuefin->isModified()) {
					$affectedRows += $this->aCcfuefin->save($con);
				}
				$this->setCcfuefin($this->aCcfuefin);
			}

			if ($this->aCctipcar !== null) {
				if ($this->aCctipcar->isModified()) {
					$affectedRows += $this->aCctipcar->save($con);
				}
				$this->setCctipcar($this->aCctipcar);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCctipmon !== null) {
				if ($this->aCctipmon->isModified()) {
					$affectedRows += $this->aCctipmon->save($con);
				}
				$this->setCctipmon($this->aCctipmon);
			}

			if ($this->aCcbanco !== null) {
				if ($this->aCcbanco->isModified()) {
					$affectedRows += $this->aCcbanco->save($con);
				}
				$this->setCcbanco($this->aCcbanco);
			}

			if ($this->aCcagenci !== null) {
				if ($this->aCcagenci->isModified()) {
					$affectedRows += $this->aCcagenci->save($con);
				}
				$this->setCcagenci($this->aCcagenci);
			}

			if ($this->aCcprioridad !== null) {
				if ($this->aCcprioridad->isModified()) {
					$affectedRows += $this->aCcprioridad->save($con);
				}
				$this->setCcprioridad($this->aCcprioridad);
			}

			if ($this->aCccondic !== null) {
				if ($this->aCccondic->isModified()) {
					$affectedRows += $this->aCccondic->save($con);
				}
				$this->setCccondic($this->aCccondic);
			}

			if ($this->aCctipups !== null) {
				if ($this->aCctipups->isModified()) {
					$affectedRows += $this->aCctipups->save($con);
				}
				$this->setCctipups($this->aCctipups);
			}

			if ($this->aCpcompro !== null) {
				if ($this->aCpcompro->isModified()) {
					$affectedRows += $this->aCpcompro->save($con);
				}
				$this->setCpcompro($this->aCpcompro);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccreditPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccreditPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcactanas !== null) {
				foreach($this->collCcactanas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamoacts !== null) {
				foreach($this->collCcamoacts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamoactresps !== null) {
				foreach($this->collCcamoactresps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamopags !== null) {
				foreach($this->collCcamopags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcanacres !== null) {
				foreach($this->collCcanacres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbitcreds !== null) {
				foreach($this->collCcbitcreds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcconcres !== null) {
				foreach($this->collCcconcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccreregs !== null) {
				foreach($this->collCccreregs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccresess !== null) {
				foreach($this->collCccresess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccuadess !== null) {
				foreach($this->collCccuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdedcres !== null) {
				foreach($this->collCcdedcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdefamos !== null) {
				foreach($this->collCcdefamos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcres !== null) {
				foreach($this->collCcestcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcfiadors !== null) {
				foreach($this->collCcfiadors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgarants !== null) {
				foreach($this->collCcgarants as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgarsols !== null) {
				foreach($this->collCcgarsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgescobs !== null) {
				foreach($this->collCcgescobs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcliquids !== null) {
				foreach($this->collCcliquids as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagos !== null) {
				foreach($this->collCcpagos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparcres !== null) {
				foreach($this->collCcparcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparrecs !== null) {
				foreach($this->collCcparrecs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcprocreds !== null) {
				foreach($this->collCcprocreds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcreccres !== null) {
				foreach($this->collCcreccres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecprocres !== null) {
				foreach($this->collCcrecprocres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsoldess !== null) {
				foreach($this->collCcsoldess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolliqs !== null) {
				foreach($this->collCcsolliqs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}

			if ($this->aCcfuefin !== null) {
				if (!$this->aCcfuefin->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcfuefin->getValidationFailures());
				}
			}

			if ($this->aCctipcar !== null) {
				if (!$this->aCctipcar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipcar->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCctipmon !== null) {
				if (!$this->aCctipmon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipmon->getValidationFailures());
				}
			}

			if ($this->aCcbanco !== null) {
				if (!$this->aCcbanco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbanco->getValidationFailures());
				}
			}

			if ($this->aCcagenci !== null) {
				if (!$this->aCcagenci->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcagenci->getValidationFailures());
				}
			}

			if ($this->aCcprioridad !== null) {
				if (!$this->aCcprioridad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprioridad->getValidationFailures());
				}
			}

			if ($this->aCccondic !== null) {
				if (!$this->aCccondic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccondic->getValidationFailures());
				}
			}

			if ($this->aCctipups !== null) {
				if (!$this->aCctipups->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipups->getValidationFailures());
				}
			}

			if ($this->aCpcompro !== null) {
				if (!$this->aCpcompro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpcompro->getValidationFailures());
				}
			}


			if (($retval = CccreditPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcactanas !== null) {
					foreach($this->collCcactanas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamoacts !== null) {
					foreach($this->collCcamoacts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamoactresps !== null) {
					foreach($this->collCcamoactresps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamopags !== null) {
					foreach($this->collCcamopags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcanacres !== null) {
					foreach($this->collCcanacres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbitcreds !== null) {
					foreach($this->collCcbitcreds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcconcres !== null) {
					foreach($this->collCcconcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccreregs !== null) {
					foreach($this->collCccreregs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccresess !== null) {
					foreach($this->collCccresess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccuadess !== null) {
					foreach($this->collCccuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdedcres !== null) {
					foreach($this->collCcdedcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdefamos !== null) {
					foreach($this->collCcdefamos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcres !== null) {
					foreach($this->collCcestcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcfiadors !== null) {
					foreach($this->collCcfiadors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgarants !== null) {
					foreach($this->collCcgarants as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgarsols !== null) {
					foreach($this->collCcgarsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgescobs !== null) {
					foreach($this->collCcgescobs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcliquids !== null) {
					foreach($this->collCcliquids as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagos !== null) {
					foreach($this->collCcpagos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparcres !== null) {
					foreach($this->collCcparcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparrecs !== null) {
					foreach($this->collCcparrecs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcprocreds !== null) {
					foreach($this->collCcprocreds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcreccres !== null) {
					foreach($this->collCcreccres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecprocres !== null) {
					foreach($this->collCcrecprocres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsoldess !== null) {
					foreach($this->collCcsoldess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolliqs !== null) {
					foreach($this->collCcsolliqs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreditPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getNatcre();
				break;
			case 3:
				return $this->getDestino();
				break;
			case 4:
				return $this->getMonapr();
				break;
			case 5:
				return $this->getActapr();
				break;
			case 6:
				return $this->getFecapr();
				break;
			case 7:
				return $this->getApercue();
				break;
			case 8:
				return $this->getFeccrecue();
				break;
			case 9:
				return $this->getNumcue();
				break;
			case 10:
				return $this->getGentxt();
				break;
			case 11:
				return $this->getFecliq();
				break;
			case 12:
				return $this->getDisdes();
				break;
			case 13:
				return $this->getEstatu();
				break;
			case 14:
				return $this->getCcbenefiId();
				break;
			case 15:
				return $this->getCcfuefinId();
				break;
			case 16:
				return $this->getCctipcarId();
				break;
			case 17:
				return $this->getCcsoliciId();
				break;
			case 18:
				return $this->getCctipmonId();
				break;
			case 19:
				return $this->getCcbancoId();
				break;
			case 20:
				return $this->getCcagenciId();
				break;
			case 21:
				return $this->getCcprioridadId();
				break;
			case 22:
				return $this->getCccondicId();
				break;
			case 23:
				return $this->getObserv();
				break;
			case 24:
				return $this->getCctipupsId();
				break;
			case 25:
				return $this->getNumnom();
				break;
			case 26:
				return $this->getCpcomproId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreditPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getNatcre(),
			$keys[3] => $this->getDestino(),
			$keys[4] => $this->getMonapr(),
			$keys[5] => $this->getActapr(),
			$keys[6] => $this->getFecapr(),
			$keys[7] => $this->getApercue(),
			$keys[8] => $this->getFeccrecue(),
			$keys[9] => $this->getNumcue(),
			$keys[10] => $this->getGentxt(),
			$keys[11] => $this->getFecliq(),
			$keys[12] => $this->getDisdes(),
			$keys[13] => $this->getEstatu(),
			$keys[14] => $this->getCcbenefiId(),
			$keys[15] => $this->getCcfuefinId(),
			$keys[16] => $this->getCctipcarId(),
			$keys[17] => $this->getCcsoliciId(),
			$keys[18] => $this->getCctipmonId(),
			$keys[19] => $this->getCcbancoId(),
			$keys[20] => $this->getCcagenciId(),
			$keys[21] => $this->getCcprioridadId(),
			$keys[22] => $this->getCccondicId(),
			$keys[23] => $this->getObserv(),
			$keys[24] => $this->getCctipupsId(),
			$keys[25] => $this->getNumnom(),
			$keys[26] => $this->getCpcomproId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccreditPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setNatcre($value);
				break;
			case 3:
				$this->setDestino($value);
				break;
			case 4:
				$this->setMonapr($value);
				break;
			case 5:
				$this->setActapr($value);
				break;
			case 6:
				$this->setFecapr($value);
				break;
			case 7:
				$this->setApercue($value);
				break;
			case 8:
				$this->setFeccrecue($value);
				break;
			case 9:
				$this->setNumcue($value);
				break;
			case 10:
				$this->setGentxt($value);
				break;
			case 11:
				$this->setFecliq($value);
				break;
			case 12:
				$this->setDisdes($value);
				break;
			case 13:
				$this->setEstatu($value);
				break;
			case 14:
				$this->setCcbenefiId($value);
				break;
			case 15:
				$this->setCcfuefinId($value);
				break;
			case 16:
				$this->setCctipcarId($value);
				break;
			case 17:
				$this->setCcsoliciId($value);
				break;
			case 18:
				$this->setCctipmonId($value);
				break;
			case 19:
				$this->setCcbancoId($value);
				break;
			case 20:
				$this->setCcagenciId($value);
				break;
			case 21:
				$this->setCcprioridadId($value);
				break;
			case 22:
				$this->setCccondicId($value);
				break;
			case 23:
				$this->setObserv($value);
				break;
			case 24:
				$this->setCctipupsId($value);
				break;
			case 25:
				$this->setNumnom($value);
				break;
			case 26:
				$this->setCpcomproId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccreditPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNatcre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDestino($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonapr($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActapr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecapr($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setApercue($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFeccrecue($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumcue($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setGentxt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecliq($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDisdes($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEstatu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCcbenefiId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCcfuefinId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCctipcarId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCcsoliciId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCctipmonId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCcbancoId($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCcagenciId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCcprioridadId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCccondicId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setObserv($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCctipupsId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setNumnom($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCpcomproId($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccreditPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccreditPeer::ID)) $criteria->add(CccreditPeer::ID, $this->id);
		if ($this->isColumnModified(CccreditPeer::NUMEXP)) $criteria->add(CccreditPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(CccreditPeer::NATCRE)) $criteria->add(CccreditPeer::NATCRE, $this->natcre);
		if ($this->isColumnModified(CccreditPeer::DESTINO)) $criteria->add(CccreditPeer::DESTINO, $this->destino);
		if ($this->isColumnModified(CccreditPeer::MONAPR)) $criteria->add(CccreditPeer::MONAPR, $this->monapr);
		if ($this->isColumnModified(CccreditPeer::ACTAPR)) $criteria->add(CccreditPeer::ACTAPR, $this->actapr);
		if ($this->isColumnModified(CccreditPeer::FECAPR)) $criteria->add(CccreditPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(CccreditPeer::APERCUE)) $criteria->add(CccreditPeer::APERCUE, $this->apercue);
		if ($this->isColumnModified(CccreditPeer::FECCRECUE)) $criteria->add(CccreditPeer::FECCRECUE, $this->feccrecue);
		if ($this->isColumnModified(CccreditPeer::NUMCUE)) $criteria->add(CccreditPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CccreditPeer::GENTXT)) $criteria->add(CccreditPeer::GENTXT, $this->gentxt);
		if ($this->isColumnModified(CccreditPeer::FECLIQ)) $criteria->add(CccreditPeer::FECLIQ, $this->fecliq);
		if ($this->isColumnModified(CccreditPeer::DISDES)) $criteria->add(CccreditPeer::DISDES, $this->disdes);
		if ($this->isColumnModified(CccreditPeer::ESTATU)) $criteria->add(CccreditPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CccreditPeer::CCBENEFI_ID)) $criteria->add(CccreditPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CccreditPeer::CCFUEFIN_ID)) $criteria->add(CccreditPeer::CCFUEFIN_ID, $this->ccfuefin_id);
		if ($this->isColumnModified(CccreditPeer::CCTIPCAR_ID)) $criteria->add(CccreditPeer::CCTIPCAR_ID, $this->cctipcar_id);
		if ($this->isColumnModified(CccreditPeer::CCSOLICI_ID)) $criteria->add(CccreditPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CccreditPeer::CCTIPMON_ID)) $criteria->add(CccreditPeer::CCTIPMON_ID, $this->cctipmon_id);
		if ($this->isColumnModified(CccreditPeer::CCBANCO_ID)) $criteria->add(CccreditPeer::CCBANCO_ID, $this->ccbanco_id);
		if ($this->isColumnModified(CccreditPeer::CCAGENCI_ID)) $criteria->add(CccreditPeer::CCAGENCI_ID, $this->ccagenci_id);
		if ($this->isColumnModified(CccreditPeer::CCPRIORIDAD_ID)) $criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->ccprioridad_id);
		if ($this->isColumnModified(CccreditPeer::CCCONDIC_ID)) $criteria->add(CccreditPeer::CCCONDIC_ID, $this->cccondic_id);
		if ($this->isColumnModified(CccreditPeer::OBSERV)) $criteria->add(CccreditPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CccreditPeer::CCTIPUPS_ID)) $criteria->add(CccreditPeer::CCTIPUPS_ID, $this->cctipups_id);
		if ($this->isColumnModified(CccreditPeer::NUMNOM)) $criteria->add(CccreditPeer::NUMNOM, $this->numnom);
		if ($this->isColumnModified(CccreditPeer::CPCOMPRO_ID)) $criteria->add(CccreditPeer::CPCOMPRO_ID, $this->cpcompro_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccreditPeer::DATABASE_NAME);

		$criteria->add(CccreditPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumexp($this->numexp);

		$copyObj->setNatcre($this->natcre);

		$copyObj->setDestino($this->destino);

		$copyObj->setMonapr($this->monapr);

		$copyObj->setActapr($this->actapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setApercue($this->apercue);

		$copyObj->setFeccrecue($this->feccrecue);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setGentxt($this->gentxt);

		$copyObj->setFecliq($this->fecliq);

		$copyObj->setDisdes($this->disdes);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

		$copyObj->setCcfuefinId($this->ccfuefin_id);

		$copyObj->setCctipcarId($this->cctipcar_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);

		$copyObj->setCctipmonId($this->cctipmon_id);

		$copyObj->setCcbancoId($this->ccbanco_id);

		$copyObj->setCcagenciId($this->ccagenci_id);

		$copyObj->setCcprioridadId($this->ccprioridad_id);

		$copyObj->setCccondicId($this->cccondic_id);

		$copyObj->setObserv($this->observ);

		$copyObj->setCctipupsId($this->cctipups_id);

		$copyObj->setNumnom($this->numnom);

		$copyObj->setCpcomproId($this->cpcompro_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcactanas() as $relObj) {
				$copyObj->addCcactana($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoacts() as $relObj) {
				$copyObj->addCcamoact($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoactresps() as $relObj) {
				$copyObj->addCcamoactresp($relObj->copy($deepCopy));
			}

			foreach($this->getCcamopags() as $relObj) {
				$copyObj->addCcamopag($relObj->copy($deepCopy));
			}

			foreach($this->getCcanacres() as $relObj) {
				$copyObj->addCcanacre($relObj->copy($deepCopy));
			}

			foreach($this->getCcbitcreds() as $relObj) {
				$copyObj->addCcbitcred($relObj->copy($deepCopy));
			}

			foreach($this->getCcconcres() as $relObj) {
				$copyObj->addCcconcre($relObj->copy($deepCopy));
			}

			foreach($this->getCccreregs() as $relObj) {
				$copyObj->addCccrereg($relObj->copy($deepCopy));
			}

			foreach($this->getCccresess() as $relObj) {
				$copyObj->addCccreses($relObj->copy($deepCopy));
			}

			foreach($this->getCccuadess() as $relObj) {
				$copyObj->addCccuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcdedcres() as $relObj) {
				$copyObj->addCcdedcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcdefamos() as $relObj) {
				$copyObj->addCcdefamo($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcres() as $relObj) {
				$copyObj->addCcestcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcfiadors() as $relObj) {
				$copyObj->addCcfiador($relObj->copy($deepCopy));
			}

			foreach($this->getCcgarants() as $relObj) {
				$copyObj->addCcgarant($relObj->copy($deepCopy));
			}

			foreach($this->getCcgarsols() as $relObj) {
				$copyObj->addCcgarsol($relObj->copy($deepCopy));
			}

			foreach($this->getCcgescobs() as $relObj) {
				$copyObj->addCcgescob($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagos() as $relObj) {
				$copyObj->addCcpago($relObj->copy($deepCopy));
			}

			foreach($this->getCcparcres() as $relObj) {
				$copyObj->addCcparcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcparrecs() as $relObj) {
				$copyObj->addCcparrec($relObj->copy($deepCopy));
			}

			foreach($this->getCcprocreds() as $relObj) {
				$copyObj->addCcprocred($relObj->copy($deepCopy));
			}

			foreach($this->getCcreccres() as $relObj) {
				$copyObj->addCcreccre($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecprocres() as $relObj) {
				$copyObj->addCcrecprocre($relObj->copy($deepCopy));
			}

			foreach($this->getCcsoldess() as $relObj) {
				$copyObj->addCcsoldes($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolliqs() as $relObj) {
				$copyObj->addCcsolliq($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CccreditPeer();
		}
		return self::$peer;
	}

	
	public function setCcbenefi($v)
	{


		if ($v === null) {
			$this->setCcbenefiId(NULL);
		} else {
			$this->setCcbenefiId($v->getId());
		}


		$this->aCcbenefi = $v;
	}


	
	public function getCcbenefi($con = null)
	{
		if ($this->aCcbenefi === null && ($this->ccbenefi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';

      $c = new Criteria();
      $c->add(CcbenefiPeer::ID,$this->ccbenefi_id);
      
			$this->aCcbenefi = CcbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbenefi;
	}

	
	public function setCcfuefin($v)
	{


		if ($v === null) {
			$this->setCcfuefinId(NULL);
		} else {
			$this->setCcfuefinId($v->getId());
		}


		$this->aCcfuefin = $v;
	}


	
	public function getCcfuefin($con = null)
	{
		if ($this->aCcfuefin === null && ($this->ccfuefin_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcfuefinPeer.php';

      $c = new Criteria();
      $c->add(CcfuefinPeer::ID,$this->ccfuefin_id);
      
			$this->aCcfuefin = CcfuefinPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcfuefin;
	}

	
	public function setCctipcar($v)
	{


		if ($v === null) {
			$this->setCctipcarId(NULL);
		} else {
			$this->setCctipcarId($v->getId());
		}


		$this->aCctipcar = $v;
	}


	
	public function getCctipcar($con = null)
	{
		if ($this->aCctipcar === null && ($this->cctipcar_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipcarPeer.php';

      $c = new Criteria();
      $c->add(CctipcarPeer::ID,$this->cctipcar_id);
      
			$this->aCctipcar = CctipcarPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipcar;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
	}

	
	public function setCctipmon($v)
	{


		if ($v === null) {
			$this->setCctipmonId(NULL);
		} else {
			$this->setCctipmonId($v->getId());
		}


		$this->aCctipmon = $v;
	}


	
	public function getCctipmon($con = null)
	{
		if ($this->aCctipmon === null && ($this->cctipmon_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipmonPeer.php';

      $c = new Criteria();
      $c->add(CctipmonPeer::ID,$this->cctipmon_id);
      
			$this->aCctipmon = CctipmonPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipmon;
	}

	
	public function setCcbanco($v)
	{


		if ($v === null) {
			$this->setCcbancoId(NULL);
		} else {
			$this->setCcbancoId($v->getId());
		}


		$this->aCcbanco = $v;
	}


	
	public function getCcbanco($con = null)
	{
		if ($this->aCcbanco === null && ($this->ccbanco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbancoPeer.php';

      $c = new Criteria();
      $c->add(CcbancoPeer::ID,$this->ccbanco_id);
      
			$this->aCcbanco = CcbancoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbanco;
	}

	
	public function setCcagenci($v)
	{


		if ($v === null) {
			$this->setCcagenciId(NULL);
		} else {
			$this->setCcagenciId($v->getId());
		}


		$this->aCcagenci = $v;
	}


	
	public function getCcagenci($con = null)
	{
		if ($this->aCcagenci === null && ($this->ccagenci_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcagenciPeer.php';

      $c = new Criteria();
      $c->add(CcagenciPeer::ID,$this->ccagenci_id);
      
			$this->aCcagenci = CcagenciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcagenci;
	}

	
	public function setCcprioridad($v)
	{


		if ($v === null) {
			$this->setCcprioridadId(NULL);
		} else {
			$this->setCcprioridadId($v->getId());
		}


		$this->aCcprioridad = $v;
	}


	
	public function getCcprioridad($con = null)
	{
		if ($this->aCcprioridad === null && ($this->ccprioridad_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprioridadPeer.php';

      $c = new Criteria();
      $c->add(CcprioridadPeer::ID,$this->ccprioridad_id);
      
			$this->aCcprioridad = CcprioridadPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprioridad;
	}

	
	public function setCccondic($v)
	{


		if ($v === null) {
			$this->setCccondicId(NULL);
		} else {
			$this->setCccondicId($v->getId());
		}


		$this->aCccondic = $v;
	}


	
	public function getCccondic($con = null)
	{
		if ($this->aCccondic === null && ($this->cccondic_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccondicPeer.php';

      $c = new Criteria();
      $c->add(CccondicPeer::ID,$this->cccondic_id);
      
			$this->aCccondic = CccondicPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccondic;
	}

	
	public function setCctipups($v)
	{


		if ($v === null) {
			$this->setCctipupsId(NULL);
		} else {
			$this->setCctipupsId($v->getId());
		}


		$this->aCctipups = $v;
	}


	
	public function getCctipups($con = null)
	{
		if ($this->aCctipups === null && ($this->cctipups_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipupsPeer.php';

      $c = new Criteria();
      $c->add(CctipupsPeer::ID,$this->cctipups_id);
      
			$this->aCctipups = CctipupsPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipups;
	}

	
	public function setCpcompro($v)
	{


		if ($v === null) {
			$this->setCpcomproId(NULL);
		} else {
			$this->setCpcomproId($v->getId());
		}


		$this->aCpcompro = $v;
	}


	
	public function getCpcompro($con = null)
	{
		if ($this->aCpcompro === null && ($this->cpcompro_id !== null)) {
						include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';

      $c = new Criteria();
      $c->add(CpcomproPeer::ID,$this->cpcompro_id);
      
			$this->aCpcompro = CpcomproPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpcompro;
	}

	
	public function initCcactanas()
	{
		if ($this->collCcactanas === null) {
			$this->collCcactanas = array();
		}
	}

	
	public function getCcactanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
			   $this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
					$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcactanaCriteria = $criteria;
		return $this->collCcactanas;
	}

	
	public function countCcactanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

		return CcactanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcactana(Ccactana $l)
	{
		$this->collCcactanas[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcactanasJoinCcactivi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcactivi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcactivi($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}

	
	public function initCcamoacts()
	{
		if ($this->collCcamoacts === null) {
			$this->collCcamoacts = array();
		}
	}

	
	public function getCcamoacts($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
			   $this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
					$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoactCriteria = $criteria;
		return $this->collCcamoacts;
	}

	
	public function countCcamoacts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

		return CcamoactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoact(Ccamoact $l)
	{
		$this->collCcamoacts[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcamoactsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}


	
	public function getCcamoactsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}


	
	public function getCcamoactsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}

	
	public function initCcamoactresps()
	{
		if ($this->collCcamoactresps === null) {
			$this->collCcamoactresps = array();
		}
	}

	
	public function getCcamoactresps($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
			   $this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
					$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;
		return $this->collCcamoactresps;
	}

	
	public function countCcamoactresps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

		return CcamoactrespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoactresp(Ccamoactresp $l)
	{
		$this->collCcamoactresps[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcamoactrespsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}


	
	public function getCcamoactrespsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}


	
	public function getCcamoactrespsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}

	
	public function initCcamopags()
	{
		if ($this->collCcamopags === null) {
			$this->collCcamopags = array();
		}
	}

	
	public function getCcamopags($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
			   $this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
					$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamopagCriteria = $criteria;
		return $this->collCcamopags;
	}

	
	public function countCcamopags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

		return CcamopagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamopag(Ccamopag $l)
	{
		$this->collCcamopags[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcamopagsJoinCcamoact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpago($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}

	
	public function initCcanacres()
	{
		if ($this->collCcanacres === null) {
			$this->collCcanacres = array();
		}
	}

	
	public function getCcanacres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanacrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanacres === null) {
			if ($this->isNew()) {
			   $this->collCcanacres = array();
			} else {

				$criteria->add(CcanacrePeer::CCCREDIT_ID, $this->getId());

				CcanacrePeer::addSelectColumns($criteria);
				$this->collCcanacres = CcanacrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanacrePeer::CCCREDIT_ID, $this->getId());

				CcanacrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanacreCriteria) || !$this->lastCcanacreCriteria->equals($criteria)) {
					$this->collCcanacres = CcanacrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanacreCriteria = $criteria;
		return $this->collCcanacres;
	}

	
	public function countCcanacres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanacrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanacrePeer::CCCREDIT_ID, $this->getId());

		return CcanacrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanacre(Ccanacre $l)
	{
		$this->collCcanacres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcanacresJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanacrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanacres === null) {
			if ($this->isNew()) {
				$this->collCcanacres = array();
			} else {

				$criteria->add(CcanacrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcanacres = CcanacrePeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanacrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcanacreCriteria) || !$this->lastCcanacreCriteria->equals($criteria)) {
				$this->collCcanacres = CcanacrePeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcanacreCriteria = $criteria;

		return $this->collCcanacres;
	}

	
	public function initCcbitcreds()
	{
		if ($this->collCcbitcreds === null) {
			$this->collCcbitcreds = array();
		}
	}

	
	public function getCcbitcreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
			   $this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

				CcbitcredPeer::addSelectColumns($criteria);
				$this->collCcbitcreds = CcbitcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

				CcbitcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
					$this->collCcbitcreds = CcbitcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbitcredCriteria = $criteria;
		return $this->collCcbitcreds;
	}

	
	public function countCcbitcreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

		return CcbitcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbitcred(Ccbitcred $l)
	{
		$this->collCcbitcreds[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcbitcredsJoinCcestatu($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
				$this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcestatu($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcestatu($criteria, $con);
			}
		}
		$this->lastCcbitcredCriteria = $criteria;

		return $this->collCcbitcreds;
	}


	
	public function getCcbitcredsJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
				$this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbitcredPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcbitcredCriteria = $criteria;

		return $this->collCcbitcreds;
	}

	
	public function initCcconcres()
	{
		if ($this->collCcconcres === null) {
			$this->collCcconcres = array();
		}
	}

	
	public function getCcconcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
			   $this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
					$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconcreCriteria = $criteria;
		return $this->collCcconcres;
	}

	
	public function countCcconcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

		return CcconcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconcre(Ccconcre $l)
	{
		$this->collCcconcres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcconcresJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}

	
	public function initCccreregs()
	{
		if ($this->collCccreregs === null) {
			$this->collCccreregs = array();
		}
	}

	
	public function getCccreregs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreregPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreregs === null) {
			if ($this->isNew()) {
			   $this->collCccreregs = array();
			} else {

				$criteria->add(CccreregPeer::CCCREDIT_ID, $this->getId());

				CccreregPeer::addSelectColumns($criteria);
				$this->collCccreregs = CccreregPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreregPeer::CCCREDIT_ID, $this->getId());

				CccreregPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreregCriteria) || !$this->lastCccreregCriteria->equals($criteria)) {
					$this->collCccreregs = CccreregPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreregCriteria = $criteria;
		return $this->collCccreregs;
	}

	
	public function countCccreregs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreregPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreregPeer::CCCREDIT_ID, $this->getId());

		return CccreregPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccrereg(Cccrereg $l)
	{
		$this->collCccreregs[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCccreregsJoinCcregnot($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreregPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreregs === null) {
			if ($this->isNew()) {
				$this->collCccreregs = array();
			} else {

				$criteria->add(CccreregPeer::CCCREDIT_ID, $this->getId());

				$this->collCccreregs = CccreregPeer::doSelectJoinCcregnot($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreregPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCccreregCriteria) || !$this->lastCccreregCriteria->equals($criteria)) {
				$this->collCccreregs = CccreregPeer::doSelectJoinCcregnot($criteria, $con);
			}
		}
		$this->lastCccreregCriteria = $criteria;

		return $this->collCccreregs;
	}

	
	public function initCccresess()
	{
		if ($this->collCccresess === null) {
			$this->collCccresess = array();
		}
	}

	
	public function getCccresess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccresesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccresess === null) {
			if ($this->isNew()) {
			   $this->collCccresess = array();
			} else {

				$criteria->add(CccresesPeer::CCCREDIT_ID, $this->getId());

				CccresesPeer::addSelectColumns($criteria);
				$this->collCccresess = CccresesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccresesPeer::CCCREDIT_ID, $this->getId());

				CccresesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccresesCriteria) || !$this->lastCccresesCriteria->equals($criteria)) {
					$this->collCccresess = CccresesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccresesCriteria = $criteria;
		return $this->collCccresess;
	}

	
	public function countCccresess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccresesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccresesPeer::CCCREDIT_ID, $this->getId());

		return CccresesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccreses(Cccreses $l)
	{
		$this->collCccresess[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCccresessJoinCcsesion($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccresesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccresess === null) {
			if ($this->isNew()) {
				$this->collCccresess = array();
			} else {

				$criteria->add(CccresesPeer::CCCREDIT_ID, $this->getId());

				$this->collCccresess = CccresesPeer::doSelectJoinCcsesion($criteria, $con);
			}
		} else {
									
			$criteria->add(CccresesPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCccresesCriteria) || !$this->lastCccresesCriteria->equals($criteria)) {
				$this->collCccresess = CccresesPeer::doSelectJoinCcsesion($criteria, $con);
			}
		}
		$this->lastCccresesCriteria = $criteria;

		return $this->collCccresess;
	}

	
	public function initCccuadess()
	{
		if ($this->collCccuadess === null) {
			$this->collCccuadess = array();
		}
	}

	
	public function getCccuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
			   $this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

				CccuadesPeer::addSelectColumns($criteria);
				$this->collCccuadess = CccuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

				CccuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
					$this->collCccuadess = CccuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccuadesCriteria = $criteria;
		return $this->collCccuadess;
	}

	
	public function countCccuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

		return CccuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccuades(Cccuades $l)
	{
		$this->collCccuadess[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCccuadessJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
				$this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

				$this->collCccuadess = CccuadesPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
				$this->collCccuadess = CccuadesPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCccuadesCriteria = $criteria;

		return $this->collCccuadess;
	}


	
	public function getCccuadessJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
				$this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

				$this->collCccuadess = CccuadesPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuadesPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
				$this->collCccuadess = CccuadesPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCccuadesCriteria = $criteria;

		return $this->collCccuadess;
	}

	
	public function initCcdedcres()
	{
		if ($this->collCcdedcres === null) {
			$this->collCcdedcres = array();
		}
	}

	
	public function getCcdedcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdedcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdedcres === null) {
			if ($this->isNew()) {
			   $this->collCcdedcres = array();
			} else {

				$criteria->add(CcdedcrePeer::CCCREDIT_ID, $this->getId());

				CcdedcrePeer::addSelectColumns($criteria);
				$this->collCcdedcres = CcdedcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdedcrePeer::CCCREDIT_ID, $this->getId());

				CcdedcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdedcreCriteria) || !$this->lastCcdedcreCriteria->equals($criteria)) {
					$this->collCcdedcres = CcdedcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdedcreCriteria = $criteria;
		return $this->collCcdedcres;
	}

	
	public function countCcdedcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdedcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdedcrePeer::CCCREDIT_ID, $this->getId());

		return CcdedcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdedcre(Ccdedcre $l)
	{
		$this->collCcdedcres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcdedcresJoinCcdeducc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdedcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdedcres === null) {
			if ($this->isNew()) {
				$this->collCcdedcres = array();
			} else {

				$criteria->add(CcdedcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcdedcres = CcdedcrePeer::doSelectJoinCcdeducc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdedcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdedcreCriteria) || !$this->lastCcdedcreCriteria->equals($criteria)) {
				$this->collCcdedcres = CcdedcrePeer::doSelectJoinCcdeducc($criteria, $con);
			}
		}
		$this->lastCcdedcreCriteria = $criteria;

		return $this->collCcdedcres;
	}

	
	public function initCcdefamos()
	{
		if ($this->collCcdefamos === null) {
			$this->collCcdefamos = array();
		}
	}

	
	public function getCcdefamos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
			   $this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
					$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdefamoCriteria = $criteria;
		return $this->collCcdefamos;
	}

	
	public function countCcdefamos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamo(Ccdefamo $l)
	{
		$this->collCcdefamos[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcdefamosJoinCcperiodRelatedByCcperiodId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcperiodRelatedByCcpergravaId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcperiodRelatedByFrecuoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}

	
	public function initCcestcres()
	{
		if ($this->collCcestcres === null) {
			$this->collCcestcres = array();
		}
	}

	
	public function getCcestcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
			   $this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

				CcestcrePeer::addSelectColumns($criteria);
				$this->collCcestcres = CcestcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

				CcestcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
					$this->collCcestcres = CcestcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcreCriteria = $criteria;
		return $this->collCcestcres;
	}

	
	public function countCcestcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

		return CcestcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcre(Ccestcre $l)
	{
		$this->collCcestcres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcestcresJoinCcestatu($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
				$this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcestcres = CcestcrePeer::doSelectJoinCcestatu($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
				$this->collCcestcres = CcestcrePeer::doSelectJoinCcestatu($criteria, $con);
			}
		}
		$this->lastCcestcreCriteria = $criteria;

		return $this->collCcestcres;
	}


	
	public function getCcestcresJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
				$this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcestcres = CcestcrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
				$this->collCcestcres = CcestcrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcreCriteria = $criteria;

		return $this->collCcestcres;
	}

	
	public function initCcfiadors()
	{
		if ($this->collCcfiadors === null) {
			$this->collCcfiadors = array();
		}
	}

	
	public function getCcfiadors($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfiadorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcfiadors === null) {
			if ($this->isNew()) {
			   $this->collCcfiadors = array();
			} else {

				$criteria->add(CcfiadorPeer::CCCREDIT_ID, $this->getId());

				CcfiadorPeer::addSelectColumns($criteria);
				$this->collCcfiadors = CcfiadorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcfiadorPeer::CCCREDIT_ID, $this->getId());

				CcfiadorPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcfiadorCriteria) || !$this->lastCcfiadorCriteria->equals($criteria)) {
					$this->collCcfiadors = CcfiadorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcfiadorCriteria = $criteria;
		return $this->collCcfiadors;
	}

	
	public function countCcfiadors($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfiadorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcfiadorPeer::CCCREDIT_ID, $this->getId());

		return CcfiadorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcfiador(Ccfiador $l)
	{
		$this->collCcfiadors[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcfiadorsJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfiadorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcfiadors === null) {
			if ($this->isNew()) {
				$this->collCcfiadors = array();
			} else {

				$criteria->add(CcfiadorPeer::CCCREDIT_ID, $this->getId());

				$this->collCcfiadors = CcfiadorPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcfiadorPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcfiadorCriteria) || !$this->lastCcfiadorCriteria->equals($criteria)) {
				$this->collCcfiadors = CcfiadorPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcfiadorCriteria = $criteria;

		return $this->collCcfiadors;
	}

	
	public function initCcgarants()
	{
		if ($this->collCcgarants === null) {
			$this->collCcgarants = array();
		}
	}

	
	public function getCcgarants($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarants === null) {
			if ($this->isNew()) {
			   $this->collCcgarants = array();
			} else {

				$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

				CcgarantPeer::addSelectColumns($criteria);
				$this->collCcgarants = CcgarantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

				CcgarantPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
					$this->collCcgarants = CcgarantPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgarantCriteria = $criteria;
		return $this->collCcgarants;
	}

	
	public function countCcgarants($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

		return CcgarantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarant(Ccgarant $l)
	{
		$this->collCcgarants[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcgarantsJoinCctipgar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarants === null) {
			if ($this->isNew()) {
				$this->collCcgarants = array();
			} else {

				$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgarants = CcgarantPeer::doSelectJoinCctipgar($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
				$this->collCcgarants = CcgarantPeer::doSelectJoinCctipgar($criteria, $con);
			}
		}
		$this->lastCcgarantCriteria = $criteria;

		return $this->collCcgarants;
	}


	
	public function getCcgarantsJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarants === null) {
			if ($this->isNew()) {
				$this->collCcgarants = array();
			} else {

				$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgarants = CcgarantPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarantPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
				$this->collCcgarants = CcgarantPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcgarantCriteria = $criteria;

		return $this->collCcgarants;
	}

	
	public function initCcgarsols()
	{
		if ($this->collCcgarsols === null) {
			$this->collCcgarsols = array();
		}
	}

	
	public function getCcgarsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
			   $this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
					$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgarsolCriteria = $criteria;
		return $this->collCcgarsols;
	}

	
	public function countCcgarsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

		return CcgarsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarsol(Ccgarsol $l)
	{
		$this->collCcgarsols[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcgarsolsJoinCctipgar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCctipgar($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCctipgar($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}

	
	public function initCcgescobs()
	{
		if ($this->collCcgescobs === null) {
			$this->collCcgescobs = array();
		}
	}

	
	public function getCcgescobs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
			   $this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
					$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgescobCriteria = $criteria;
		return $this->collCcgescobs;
	}

	
	public function countCcgescobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

		return CcgescobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgescob(Ccgescob $l)
	{
		$this->collCcgescobs[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcgescobsJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcactana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}

	
	public function initCcliquids()
	{
		if ($this->collCcliquids === null) {
			$this->collCcliquids = array();
		}
	}

	
	public function getCcliquids($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
			   $this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
					$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcliquidCriteria = $criteria;
		return $this->collCcliquids;
	}

	
	public function countCcliquids($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcliquidsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcsolliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

	
	public function initCcpagos()
	{
		if ($this->collCcpagos === null) {
			$this->collCcpagos = array();
		}
	}

	
	public function getCcpagos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
			   $this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
					$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagoCriteria = $criteria;
		return $this->collCcpagos;
	}

	
	public function countCcpagos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

		return CcpagoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpago(Ccpago $l)
	{
		$this->collCcpagos[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcpagosJoinCcperparamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}

	
	public function initCcparcres()
	{
		if ($this->collCcparcres === null) {
			$this->collCcparcres = array();
		}
	}

	
	public function getCcparcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
			   $this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

				CcparcrePeer::addSelectColumns($criteria);
				$this->collCcparcres = CcparcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

				CcparcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
					$this->collCcparcres = CcparcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparcreCriteria = $criteria;
		return $this->collCcparcres;
	}

	
	public function countCcparcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

		return CcparcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparcre(Ccparcre $l)
	{
		$this->collCcparcres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcparcresJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
				$this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcparcres = CcparcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
				$this->collCcparcres = CcparcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparcreCriteria = $criteria;

		return $this->collCcparcres;
	}


	
	public function getCcparcresJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
				$this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcparcres = CcparcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
				$this->collCcparcres = CcparcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcparcreCriteria = $criteria;

		return $this->collCcparcres;
	}

	
	public function initCcparrecs()
	{
		if ($this->collCcparrecs === null) {
			$this->collCcparrecs = array();
		}
	}

	
	public function getCcparrecs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparrecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparrecs === null) {
			if ($this->isNew()) {
			   $this->collCcparrecs = array();
			} else {

				$criteria->add(CcparrecPeer::CCCREDIT_ID, $this->getId());

				CcparrecPeer::addSelectColumns($criteria);
				$this->collCcparrecs = CcparrecPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparrecPeer::CCCREDIT_ID, $this->getId());

				CcparrecPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparrecCriteria) || !$this->lastCcparrecCriteria->equals($criteria)) {
					$this->collCcparrecs = CcparrecPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparrecCriteria = $criteria;
		return $this->collCcparrecs;
	}

	
	public function countCcparrecs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparrecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparrecPeer::CCCREDIT_ID, $this->getId());

		return CcparrecPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparrec(Ccparrec $l)
	{
		$this->collCcparrecs[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcparrecsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparrecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparrecs === null) {
			if ($this->isNew()) {
				$this->collCcparrecs = array();
			} else {

				$criteria->add(CcparrecPeer::CCCREDIT_ID, $this->getId());

				$this->collCcparrecs = CcparrecPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparrecPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcparrecCriteria) || !$this->lastCcparrecCriteria->equals($criteria)) {
				$this->collCcparrecs = CcparrecPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcparrecCriteria = $criteria;

		return $this->collCcparrecs;
	}

	
	public function initCcprocreds()
	{
		if ($this->collCcprocreds === null) {
			$this->collCcprocreds = array();
		}
	}

	
	public function getCcprocreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprocredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprocreds === null) {
			if ($this->isNew()) {
			   $this->collCcprocreds = array();
			} else {

				$criteria->add(CcprocredPeer::CCCREDIT_ID, $this->getId());

				CcprocredPeer::addSelectColumns($criteria);
				$this->collCcprocreds = CcprocredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcprocredPeer::CCCREDIT_ID, $this->getId());

				CcprocredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcprocredCriteria) || !$this->lastCcprocredCriteria->equals($criteria)) {
					$this->collCcprocreds = CcprocredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcprocredCriteria = $criteria;
		return $this->collCcprocreds;
	}

	
	public function countCcprocreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprocredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcprocredPeer::CCCREDIT_ID, $this->getId());

		return CcprocredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcprocred(Ccprocred $l)
	{
		$this->collCcprocreds[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcprocredsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprocredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprocreds === null) {
			if ($this->isNew()) {
				$this->collCcprocreds = array();
			} else {

				$criteria->add(CcprocredPeer::CCCREDIT_ID, $this->getId());

				$this->collCcprocreds = CcprocredPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprocredPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcprocredCriteria) || !$this->lastCcprocredCriteria->equals($criteria)) {
				$this->collCcprocreds = CcprocredPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcprocredCriteria = $criteria;

		return $this->collCcprocreds;
	}

	
	public function initCcreccres()
	{
		if ($this->collCcreccres === null) {
			$this->collCcreccres = array();
		}
	}

	
	public function getCcreccres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcreccres === null) {
			if ($this->isNew()) {
			   $this->collCcreccres = array();
			} else {

				$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

				CcreccrePeer::addSelectColumns($criteria);
				$this->collCcreccres = CcreccrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

				CcreccrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
					$this->collCcreccres = CcreccrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcreccreCriteria = $criteria;
		return $this->collCcreccres;
	}

	
	public function countCcreccres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

		return CcreccrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcreccre(Ccreccre $l)
	{
		$this->collCcreccres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcreccresJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcreccres === null) {
			if ($this->isNew()) {
				$this->collCcreccres = array();
			} else {

				$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcreccres = CcreccrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
				$this->collCcreccres = CcreccrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcreccreCriteria = $criteria;

		return $this->collCcreccres;
	}


	
	public function getCcreccresJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcreccres === null) {
			if ($this->isNew()) {
				$this->collCcreccres = array();
			} else {

				$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcreccres = CcreccrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcreccrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
				$this->collCcreccres = CcreccrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcreccreCriteria = $criteria;

		return $this->collCcreccres;
	}

	
	public function initCcrecprocres()
	{
		if ($this->collCcrecprocres === null) {
			$this->collCcrecprocres = array();
		}
	}

	
	public function getCcrecprocres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
			   $this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

				CcrecprocrePeer::addSelectColumns($criteria);
				$this->collCcrecprocres = CcrecprocrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

				CcrecprocrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
					$this->collCcrecprocres = CcrecprocrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;
		return $this->collCcrecprocres;
	}

	
	public function countCcrecprocres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

		return CcrecprocrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecprocre(Ccrecprocre $l)
	{
		$this->collCcrecprocres[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcrecprocresJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
				$this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;

		return $this->collCcrecprocres;
	}


	
	public function getCcrecprocresJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
				$this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecprocrePeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;

		return $this->collCcrecprocres;
	}

	
	public function initCcsoldess()
	{
		if ($this->collCcsoldess === null) {
			$this->collCcsoldess = array();
		}
	}

	
	public function getCcsoldess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldess === null) {
			if ($this->isNew()) {
			   $this->collCcsoldess = array();
			} else {

				$criteria->add(CcsoldesPeer::CCCREDIT_ID, $this->getId());

				CcsoldesPeer::addSelectColumns($criteria);
				$this->collCcsoldess = CcsoldesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoldesPeer::CCCREDIT_ID, $this->getId());

				CcsoldesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoldesCriteria) || !$this->lastCcsoldesCriteria->equals($criteria)) {
					$this->collCcsoldess = CcsoldesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoldesCriteria = $criteria;
		return $this->collCcsoldess;
	}

	
	public function countCcsoldess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoldesPeer::CCCREDIT_ID, $this->getId());

		return CcsoldesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsoldes(Ccsoldes $l)
	{
		$this->collCcsoldess[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcsoldessJoinCctipdes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldess === null) {
			if ($this->isNew()) {
				$this->collCcsoldess = array();
			} else {

				$criteria->add(CcsoldesPeer::CCCREDIT_ID, $this->getId());

				$this->collCcsoldess = CcsoldesPeer::doSelectJoinCctipdes($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoldesPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcsoldesCriteria) || !$this->lastCcsoldesCriteria->equals($criteria)) {
				$this->collCcsoldess = CcsoldesPeer::doSelectJoinCctipdes($criteria, $con);
			}
		}
		$this->lastCcsoldesCriteria = $criteria;

		return $this->collCcsoldess;
	}

	
	public function initCcsolliqs()
	{
		if ($this->collCcsolliqs === null) {
			$this->collCcsolliqs = array();
		}
	}

	
	public function getCcsolliqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
					$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqCriteria = $criteria;
		return $this->collCcsolliqs;
	}

	
	public function countCcsolliqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

		return CcsolliqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliq(Ccsolliq $l)
	{
		$this->collCcsolliqs[] = $l;
		$l->setCccredit($this);
	}


	
	public function getCcsolliqsJoinCcsoldes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCCREDIT_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}

} 