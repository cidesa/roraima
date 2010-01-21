<?php


abstract class BaseCcdefamo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $montot;


	
	protected $cuotas;


	
	protected $numcuo;


	
	protected $numcuofin;


	
	protected $numcuoanu;


	
	protected $pergra;


	
	protected $permue;


	
	protected $plafin;


	
	protected $plazo;


	
	protected $fecdesdef;


	
	protected $fechasdef;


	
	protected $difint;


	
	protected $tasintmor;


	
	protected $tasint;


	
	protected $disanu;


	
	protected $pordisanu;


	
	protected $resequ;


	
	protected $cuoesp;


	
	protected $cuoespigu;


	
	protected $intgrava;


	
	protected $intcuminc;


	
	protected $aporgrava;


	
	protected $ccperiod_id;


	
	protected $cctipint_id;


	
	protected $cccredit_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;


	
	protected $ccpergrava_id;


	
	protected $cantcuoesp;


	
	protected $cuoespinic;


	
	protected $frecuoesp;


	
	protected $moncuoesp;


	
	protected $moncuopla;


	
	protected $observ;

	
	protected $aCcperiodRelatedByCcperiodId;

	
	protected $aCctipint;

	
	protected $aCccredit;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
	protected $aCcperiodRelatedByCcpergravaId;

	
	protected $aCcperiodRelatedByFrecuoesp;

	
	protected $collCcamoacts;

	
	protected $lastCcamoactCriteria = null;

	
	protected $collCcamoactresps;

	
	protected $lastCcamoactrespCriteria = null;

	
	protected $collCcamoprins;

	
	protected $lastCcamoprinCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getCuotas()
  {

    return trim($this->cuotas);

  }
  
  public function getNumcuo()
  {

    return $this->numcuo;

  }
  
  public function getNumcuofin()
  {

    return $this->numcuofin;

  }
  
  public function getNumcuoanu($val=false)
  {

    if($val) return number_format($this->numcuoanu,2,',','.');
    else return $this->numcuoanu;

  }
  
  public function getPergra()
  {

    return $this->pergra;

  }
  
  public function getPermue()
  {

    return $this->permue;

  }
  
  public function getPlafin()
  {

    return $this->plafin;

  }
  
  public function getPlazo($val=false)
  {

    if($val) return number_format($this->plazo,2,',','.');
    else return $this->plazo;

  }
  
  public function getFecdesdef($format = 'Y-m-d')
  {

    if ($this->fecdesdef === null || $this->fecdesdef === '') {
      return null;
    } elseif (!is_int($this->fecdesdef)) {
            $ts = adodb_strtotime($this->fecdesdef);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdesdef] as date/time value: " . var_export($this->fecdesdef, true));
      }
    } else {
      $ts = $this->fecdesdef;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechasdef($format = 'Y-m-d')
  {

    if ($this->fechasdef === null || $this->fechasdef === '') {
      return null;
    } elseif (!is_int($this->fechasdef)) {
            $ts = adodb_strtotime($this->fechasdef);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechasdef] as date/time value: " . var_export($this->fechasdef, true));
      }
    } else {
      $ts = $this->fechasdef;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDifint()
  {

    return $this->difint;

  }
  
  public function getTasintmor($val=false)
  {

    if($val) return number_format($this->tasintmor,2,',','.');
    else return $this->tasintmor;

  }
  
  public function getTasint($val=false)
  {

    if($val) return number_format($this->tasint,2,',','.');
    else return $this->tasint;

  }
  
  public function getDisanu()
  {

    return $this->disanu;

  }
  
  public function getPordisanu($val=false)
  {

    if($val) return number_format($this->pordisanu,2,',','.');
    else return $this->pordisanu;

  }
  
  public function getResequ()
  {

    return $this->resequ;

  }
  
  public function getCuoesp()
  {

    return $this->cuoesp;

  }
  
  public function getCuoespigu()
  {

    return $this->cuoespigu;

  }
  
  public function getIntgrava($val=false)
  {

    if($val) return number_format($this->intgrava,2,',','.');
    else return $this->intgrava;

  }
  
  public function getIntcuminc($val=false)
  {

    if($val) return number_format($this->intcuminc,2,',','.');
    else return $this->intcuminc;

  }
  
  public function getAporgrava($val=false)
  {

    if($val) return number_format($this->aporgrava,2,',','.');
    else return $this->aporgrava;

  }
  
  public function getCcperiodId()
  {

    return $this->ccperiod_id;

  }
  
  public function getCctipintId()
  {

    return $this->cctipint_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
  
  public function getCcpergravaId()
  {

    return $this->ccpergrava_id;

  }
  
  public function getCantcuoesp()
  {

    return $this->cantcuoesp;

  }
  
  public function getCuoespinic()
  {

    return $this->cuoespinic;

  }
  
  public function getFrecuoesp()
  {

    return $this->frecuoesp;

  }
  
  public function getMoncuoesp($val=false)
  {

    if($val) return number_format($this->moncuoesp,2,',','.');
    else return $this->moncuoesp;

  }
  
  public function getMoncuopla($val=false)
  {

    if($val) return number_format($this->moncuopla,2,',','.');
    else return $this->moncuopla;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::ID;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::MONTOT;
      }
  
	} 
	
	public function setCuotas($v)
	{

    if ($this->cuotas !== $v) {
        $this->cuotas = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CUOTAS;
      }
  
	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = $v;
        $this->modifiedColumns[] = CcdefamoPeer::NUMCUO;
      }
  
	} 
	
	public function setNumcuofin($v)
	{

    if ($this->numcuofin !== $v) {
        $this->numcuofin = $v;
        $this->modifiedColumns[] = CcdefamoPeer::NUMCUOFIN;
      }
  
	} 
	
	public function setNumcuoanu($v)
	{

    if ($this->numcuoanu !== $v) {
        $this->numcuoanu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::NUMCUOANU;
      }
  
	} 
	
	public function setPergra($v)
	{

    if ($this->pergra !== $v) {
        $this->pergra = $v;
        $this->modifiedColumns[] = CcdefamoPeer::PERGRA;
      }
  
	} 
	
	public function setPermue($v)
	{

    if ($this->permue !== $v) {
        $this->permue = $v;
        $this->modifiedColumns[] = CcdefamoPeer::PERMUE;
      }
  
	} 
	
	public function setPlafin($v)
	{

    if ($this->plafin !== $v) {
        $this->plafin = $v;
        $this->modifiedColumns[] = CcdefamoPeer::PLAFIN;
      }
  
	} 
	
	public function setPlazo($v)
	{

    if ($this->plazo !== $v) {
        $this->plazo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::PLAZO;
      }
  
	} 
	
	public function setFecdesdef($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdesdef] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdesdef !== $ts) {
      $this->fecdesdef = $ts;
      $this->modifiedColumns[] = CcdefamoPeer::FECDESDEF;
    }

	} 
	
	public function setFechasdef($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechasdef] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechasdef !== $ts) {
      $this->fechasdef = $ts;
      $this->modifiedColumns[] = CcdefamoPeer::FECHASDEF;
    }

	} 
	
	public function setDifint($v)
	{

    if ($this->difint !== $v) {
        $this->difint = $v;
        $this->modifiedColumns[] = CcdefamoPeer::DIFINT;
      }
  
	} 
	
	public function setTasintmor($v)
	{

    if ($this->tasintmor !== $v) {
        $this->tasintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::TASINTMOR;
      }
  
	} 
	
	public function setTasint($v)
	{

    if ($this->tasint !== $v) {
        $this->tasint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::TASINT;
      }
  
	} 
	
	public function setDisanu($v)
	{

    if ($this->disanu !== $v) {
        $this->disanu = $v;
        $this->modifiedColumns[] = CcdefamoPeer::DISANU;
      }
  
	} 
	
	public function setPordisanu($v)
	{

    if ($this->pordisanu !== $v) {
        $this->pordisanu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::PORDISANU;
      }
  
	} 
	
	public function setResequ($v)
	{

    if ($this->resequ !== $v) {
        $this->resequ = $v;
        $this->modifiedColumns[] = CcdefamoPeer::RESEQU;
      }
  
	} 
	
	public function setCuoesp($v)
	{

    if ($this->cuoesp !== $v) {
        $this->cuoesp = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CUOESP;
      }
  
	} 
	
	public function setCuoespigu($v)
	{

    if ($this->cuoespigu !== $v) {
        $this->cuoespigu = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CUOESPIGU;
      }
  
	} 
	
	public function setIntgrava($v)
	{

    if ($this->intgrava !== $v) {
        $this->intgrava = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::INTGRAVA;
      }
  
	} 
	
	public function setIntcuminc($v)
	{

    if ($this->intcuminc !== $v) {
        $this->intcuminc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::INTCUMINC;
      }
  
	} 
	
	public function setAporgrava($v)
	{

    if ($this->aporgrava !== $v) {
        $this->aporgrava = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::APORGRAVA;
      }
  
	} 
	
	public function setCcperiodId($v)
	{

    if ($this->ccperiod_id !== $v) {
        $this->ccperiod_id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CCPERIOD_ID;
      }
  
		if ($this->aCcperiodRelatedByCcperiodId !== null && $this->aCcperiodRelatedByCcperiodId->getId() !== $v) {
			$this->aCcperiodRelatedByCcperiodId = null;
		}

	} 
	
	public function setCctipintId($v)
	{

    if ($this->cctipint_id !== $v) {
        $this->cctipint_id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CCTIPINT_ID;
      }
  
		if ($this->aCctipint !== null && $this->aCctipint->getId() !== $v) {
			$this->aCctipint = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
	
	public function setCcpergravaId($v)
	{

    if ($this->ccpergrava_id !== $v) {
        $this->ccpergrava_id = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CCPERGRAVA_ID;
      }
  
		if ($this->aCcperiodRelatedByCcpergravaId !== null && $this->aCcperiodRelatedByCcpergravaId->getId() !== $v) {
			$this->aCcperiodRelatedByCcpergravaId = null;
		}

	} 
	
	public function setCantcuoesp($v)
	{

    if ($this->cantcuoesp !== $v) {
        $this->cantcuoesp = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CANTCUOESP;
      }
  
	} 
	
	public function setCuoespinic($v)
	{

    if ($this->cuoespinic !== $v) {
        $this->cuoespinic = $v;
        $this->modifiedColumns[] = CcdefamoPeer::CUOESPINIC;
      }
  
	} 
	
	public function setFrecuoesp($v)
	{

    if ($this->frecuoesp !== $v) {
        $this->frecuoesp = $v;
        $this->modifiedColumns[] = CcdefamoPeer::FRECUOESP;
      }
  
		if ($this->aCcperiodRelatedByFrecuoesp !== null && $this->aCcperiodRelatedByFrecuoesp->getId() !== $v) {
			$this->aCcperiodRelatedByFrecuoesp = null;
		}

	} 
	
	public function setMoncuoesp($v)
	{

    if ($this->moncuoesp !== $v) {
        $this->moncuoesp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::MONCUOESP;
      }
  
	} 
	
	public function setMoncuopla($v)
	{

    if ($this->moncuopla !== $v) {
        $this->moncuopla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdefamoPeer::MONCUOPLA;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcdefamoPeer::OBSERV;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->montot = $rs->getFloat($startcol + 1);

      $this->cuotas = $rs->getString($startcol + 2);

      $this->numcuo = $rs->getInt($startcol + 3);

      $this->numcuofin = $rs->getInt($startcol + 4);

      $this->numcuoanu = $rs->getFloat($startcol + 5);

      $this->pergra = $rs->getInt($startcol + 6);

      $this->permue = $rs->getInt($startcol + 7);

      $this->plafin = $rs->getInt($startcol + 8);

      $this->plazo = $rs->getFloat($startcol + 9);

      $this->fecdesdef = $rs->getDate($startcol + 10, null);

      $this->fechasdef = $rs->getDate($startcol + 11, null);

      $this->difint = $rs->getBoolean($startcol + 12);

      $this->tasintmor = $rs->getFloat($startcol + 13);

      $this->tasint = $rs->getFloat($startcol + 14);

      $this->disanu = $rs->getBoolean($startcol + 15);

      $this->pordisanu = $rs->getFloat($startcol + 16);

      $this->resequ = $rs->getBoolean($startcol + 17);

      $this->cuoesp = $rs->getBoolean($startcol + 18);

      $this->cuoespigu = $rs->getBoolean($startcol + 19);

      $this->intgrava = $rs->getFloat($startcol + 20);

      $this->intcuminc = $rs->getFloat($startcol + 21);

      $this->aporgrava = $rs->getFloat($startcol + 22);

      $this->ccperiod_id = $rs->getInt($startcol + 23);

      $this->cctipint_id = $rs->getInt($startcol + 24);

      $this->cccredit_id = $rs->getInt($startcol + 25);

      $this->ccpartid_id = $rs->getInt($startcol + 26);

      $this->ccprogra_id = $rs->getInt($startcol + 27);

      $this->ccpergrava_id = $rs->getInt($startcol + 28);

      $this->cantcuoesp = $rs->getInt($startcol + 29);

      $this->cuoespinic = $rs->getInt($startcol + 30);

      $this->frecuoesp = $rs->getInt($startcol + 31);

      $this->moncuoesp = $rs->getFloat($startcol + 32);

      $this->moncuopla = $rs->getFloat($startcol + 33);

      $this->observ = $rs->getString($startcol + 34);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 35; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdefamo object", $e);
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
			$con = Propel::getConnection(CcdefamoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdefamoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdefamoPeer::DATABASE_NAME);
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


												
			if ($this->aCcperiodRelatedByCcperiodId !== null) {
				if ($this->aCcperiodRelatedByCcperiodId->isModified()) {
					$affectedRows += $this->aCcperiodRelatedByCcperiodId->save($con);
				}
				$this->setCcperiodRelatedByCcperiodId($this->aCcperiodRelatedByCcperiodId);
			}

			if ($this->aCctipint !== null) {
				if ($this->aCctipint->isModified()) {
					$affectedRows += $this->aCctipint->save($con);
				}
				$this->setCctipint($this->aCctipint);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}

			if ($this->aCcperiodRelatedByCcpergravaId !== null) {
				if ($this->aCcperiodRelatedByCcpergravaId->isModified()) {
					$affectedRows += $this->aCcperiodRelatedByCcpergravaId->save($con);
				}
				$this->setCcperiodRelatedByCcpergravaId($this->aCcperiodRelatedByCcpergravaId);
			}

			if ($this->aCcperiodRelatedByFrecuoesp !== null) {
				if ($this->aCcperiodRelatedByFrecuoesp->isModified()) {
					$affectedRows += $this->aCcperiodRelatedByFrecuoesp->save($con);
				}
				$this->setCcperiodRelatedByFrecuoesp($this->aCcperiodRelatedByFrecuoesp);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdefamoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdefamoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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

			if ($this->collCcamoprins !== null) {
				foreach($this->collCcamoprins as $referrerFK) {
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


												
			if ($this->aCcperiodRelatedByCcperiodId !== null) {
				if (!$this->aCcperiodRelatedByCcperiodId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperiodRelatedByCcperiodId->getValidationFailures());
				}
			}

			if ($this->aCctipint !== null) {
				if (!$this->aCctipint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipint->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}

			if ($this->aCcperiodRelatedByCcpergravaId !== null) {
				if (!$this->aCcperiodRelatedByCcpergravaId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperiodRelatedByCcpergravaId->getValidationFailures());
				}
			}

			if ($this->aCcperiodRelatedByFrecuoesp !== null) {
				if (!$this->aCcperiodRelatedByFrecuoesp->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperiodRelatedByFrecuoesp->getValidationFailures());
				}
			}


			if (($retval = CcdefamoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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

				if ($this->collCcamoprins !== null) {
					foreach($this->collCcamoprins as $referrerFK) {
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
		$pos = CcdefamoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMontot();
				break;
			case 2:
				return $this->getCuotas();
				break;
			case 3:
				return $this->getNumcuo();
				break;
			case 4:
				return $this->getNumcuofin();
				break;
			case 5:
				return $this->getNumcuoanu();
				break;
			case 6:
				return $this->getPergra();
				break;
			case 7:
				return $this->getPermue();
				break;
			case 8:
				return $this->getPlafin();
				break;
			case 9:
				return $this->getPlazo();
				break;
			case 10:
				return $this->getFecdesdef();
				break;
			case 11:
				return $this->getFechasdef();
				break;
			case 12:
				return $this->getDifint();
				break;
			case 13:
				return $this->getTasintmor();
				break;
			case 14:
				return $this->getTasint();
				break;
			case 15:
				return $this->getDisanu();
				break;
			case 16:
				return $this->getPordisanu();
				break;
			case 17:
				return $this->getResequ();
				break;
			case 18:
				return $this->getCuoesp();
				break;
			case 19:
				return $this->getCuoespigu();
				break;
			case 20:
				return $this->getIntgrava();
				break;
			case 21:
				return $this->getIntcuminc();
				break;
			case 22:
				return $this->getAporgrava();
				break;
			case 23:
				return $this->getCcperiodId();
				break;
			case 24:
				return $this->getCctipintId();
				break;
			case 25:
				return $this->getCccreditId();
				break;
			case 26:
				return $this->getCcpartidId();
				break;
			case 27:
				return $this->getCcprograId();
				break;
			case 28:
				return $this->getCcpergravaId();
				break;
			case 29:
				return $this->getCantcuoesp();
				break;
			case 30:
				return $this->getCuoespinic();
				break;
			case 31:
				return $this->getFrecuoesp();
				break;
			case 32:
				return $this->getMoncuoesp();
				break;
			case 33:
				return $this->getMoncuopla();
				break;
			case 34:
				return $this->getObserv();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdefamoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMontot(),
			$keys[2] => $this->getCuotas(),
			$keys[3] => $this->getNumcuo(),
			$keys[4] => $this->getNumcuofin(),
			$keys[5] => $this->getNumcuoanu(),
			$keys[6] => $this->getPergra(),
			$keys[7] => $this->getPermue(),
			$keys[8] => $this->getPlafin(),
			$keys[9] => $this->getPlazo(),
			$keys[10] => $this->getFecdesdef(),
			$keys[11] => $this->getFechasdef(),
			$keys[12] => $this->getDifint(),
			$keys[13] => $this->getTasintmor(),
			$keys[14] => $this->getTasint(),
			$keys[15] => $this->getDisanu(),
			$keys[16] => $this->getPordisanu(),
			$keys[17] => $this->getResequ(),
			$keys[18] => $this->getCuoesp(),
			$keys[19] => $this->getCuoespigu(),
			$keys[20] => $this->getIntgrava(),
			$keys[21] => $this->getIntcuminc(),
			$keys[22] => $this->getAporgrava(),
			$keys[23] => $this->getCcperiodId(),
			$keys[24] => $this->getCctipintId(),
			$keys[25] => $this->getCccreditId(),
			$keys[26] => $this->getCcpartidId(),
			$keys[27] => $this->getCcprograId(),
			$keys[28] => $this->getCcpergravaId(),
			$keys[29] => $this->getCantcuoesp(),
			$keys[30] => $this->getCuoespinic(),
			$keys[31] => $this->getFrecuoesp(),
			$keys[32] => $this->getMoncuoesp(),
			$keys[33] => $this->getMoncuopla(),
			$keys[34] => $this->getObserv(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdefamoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMontot($value);
				break;
			case 2:
				$this->setCuotas($value);
				break;
			case 3:
				$this->setNumcuo($value);
				break;
			case 4:
				$this->setNumcuofin($value);
				break;
			case 5:
				$this->setNumcuoanu($value);
				break;
			case 6:
				$this->setPergra($value);
				break;
			case 7:
				$this->setPermue($value);
				break;
			case 8:
				$this->setPlafin($value);
				break;
			case 9:
				$this->setPlazo($value);
				break;
			case 10:
				$this->setFecdesdef($value);
				break;
			case 11:
				$this->setFechasdef($value);
				break;
			case 12:
				$this->setDifint($value);
				break;
			case 13:
				$this->setTasintmor($value);
				break;
			case 14:
				$this->setTasint($value);
				break;
			case 15:
				$this->setDisanu($value);
				break;
			case 16:
				$this->setPordisanu($value);
				break;
			case 17:
				$this->setResequ($value);
				break;
			case 18:
				$this->setCuoesp($value);
				break;
			case 19:
				$this->setCuoespigu($value);
				break;
			case 20:
				$this->setIntgrava($value);
				break;
			case 21:
				$this->setIntcuminc($value);
				break;
			case 22:
				$this->setAporgrava($value);
				break;
			case 23:
				$this->setCcperiodId($value);
				break;
			case 24:
				$this->setCctipintId($value);
				break;
			case 25:
				$this->setCccreditId($value);
				break;
			case 26:
				$this->setCcpartidId($value);
				break;
			case 27:
				$this->setCcprograId($value);
				break;
			case 28:
				$this->setCcpergravaId($value);
				break;
			case 29:
				$this->setCantcuoesp($value);
				break;
			case 30:
				$this->setCuoespinic($value);
				break;
			case 31:
				$this->setFrecuoesp($value);
				break;
			case 32:
				$this->setMoncuoesp($value);
				break;
			case 33:
				$this->setMoncuopla($value);
				break;
			case 34:
				$this->setObserv($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdefamoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMontot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCuotas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumcuo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumcuofin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumcuoanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPergra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPermue($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPlafin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPlazo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecdesdef($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFechasdef($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDifint($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTasintmor($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTasint($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDisanu($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPordisanu($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setResequ($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCuoesp($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCuoespigu($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setIntgrava($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setIntcuminc($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAporgrava($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCcperiodId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCctipintId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCccreditId($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCcpartidId($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCcprograId($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCcpergravaId($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCantcuoesp($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCuoespinic($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setFrecuoesp($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setMoncuoesp($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setMoncuopla($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setObserv($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdefamoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdefamoPeer::ID)) $criteria->add(CcdefamoPeer::ID, $this->id);
		if ($this->isColumnModified(CcdefamoPeer::MONTOT)) $criteria->add(CcdefamoPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CcdefamoPeer::CUOTAS)) $criteria->add(CcdefamoPeer::CUOTAS, $this->cuotas);
		if ($this->isColumnModified(CcdefamoPeer::NUMCUO)) $criteria->add(CcdefamoPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(CcdefamoPeer::NUMCUOFIN)) $criteria->add(CcdefamoPeer::NUMCUOFIN, $this->numcuofin);
		if ($this->isColumnModified(CcdefamoPeer::NUMCUOANU)) $criteria->add(CcdefamoPeer::NUMCUOANU, $this->numcuoanu);
		if ($this->isColumnModified(CcdefamoPeer::PERGRA)) $criteria->add(CcdefamoPeer::PERGRA, $this->pergra);
		if ($this->isColumnModified(CcdefamoPeer::PERMUE)) $criteria->add(CcdefamoPeer::PERMUE, $this->permue);
		if ($this->isColumnModified(CcdefamoPeer::PLAFIN)) $criteria->add(CcdefamoPeer::PLAFIN, $this->plafin);
		if ($this->isColumnModified(CcdefamoPeer::PLAZO)) $criteria->add(CcdefamoPeer::PLAZO, $this->plazo);
		if ($this->isColumnModified(CcdefamoPeer::FECDESDEF)) $criteria->add(CcdefamoPeer::FECDESDEF, $this->fecdesdef);
		if ($this->isColumnModified(CcdefamoPeer::FECHASDEF)) $criteria->add(CcdefamoPeer::FECHASDEF, $this->fechasdef);
		if ($this->isColumnModified(CcdefamoPeer::DIFINT)) $criteria->add(CcdefamoPeer::DIFINT, $this->difint);
		if ($this->isColumnModified(CcdefamoPeer::TASINTMOR)) $criteria->add(CcdefamoPeer::TASINTMOR, $this->tasintmor);
		if ($this->isColumnModified(CcdefamoPeer::TASINT)) $criteria->add(CcdefamoPeer::TASINT, $this->tasint);
		if ($this->isColumnModified(CcdefamoPeer::DISANU)) $criteria->add(CcdefamoPeer::DISANU, $this->disanu);
		if ($this->isColumnModified(CcdefamoPeer::PORDISANU)) $criteria->add(CcdefamoPeer::PORDISANU, $this->pordisanu);
		if ($this->isColumnModified(CcdefamoPeer::RESEQU)) $criteria->add(CcdefamoPeer::RESEQU, $this->resequ);
		if ($this->isColumnModified(CcdefamoPeer::CUOESP)) $criteria->add(CcdefamoPeer::CUOESP, $this->cuoesp);
		if ($this->isColumnModified(CcdefamoPeer::CUOESPIGU)) $criteria->add(CcdefamoPeer::CUOESPIGU, $this->cuoespigu);
		if ($this->isColumnModified(CcdefamoPeer::INTGRAVA)) $criteria->add(CcdefamoPeer::INTGRAVA, $this->intgrava);
		if ($this->isColumnModified(CcdefamoPeer::INTCUMINC)) $criteria->add(CcdefamoPeer::INTCUMINC, $this->intcuminc);
		if ($this->isColumnModified(CcdefamoPeer::APORGRAVA)) $criteria->add(CcdefamoPeer::APORGRAVA, $this->aporgrava);
		if ($this->isColumnModified(CcdefamoPeer::CCPERIOD_ID)) $criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->ccperiod_id);
		if ($this->isColumnModified(CcdefamoPeer::CCTIPINT_ID)) $criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->cctipint_id);
		if ($this->isColumnModified(CcdefamoPeer::CCCREDIT_ID)) $criteria->add(CcdefamoPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcdefamoPeer::CCPARTID_ID)) $criteria->add(CcdefamoPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcdefamoPeer::CCPROGRA_ID)) $criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->ccprogra_id);
		if ($this->isColumnModified(CcdefamoPeer::CCPERGRAVA_ID)) $criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->ccpergrava_id);
		if ($this->isColumnModified(CcdefamoPeer::CANTCUOESP)) $criteria->add(CcdefamoPeer::CANTCUOESP, $this->cantcuoesp);
		if ($this->isColumnModified(CcdefamoPeer::CUOESPINIC)) $criteria->add(CcdefamoPeer::CUOESPINIC, $this->cuoespinic);
		if ($this->isColumnModified(CcdefamoPeer::FRECUOESP)) $criteria->add(CcdefamoPeer::FRECUOESP, $this->frecuoesp);
		if ($this->isColumnModified(CcdefamoPeer::MONCUOESP)) $criteria->add(CcdefamoPeer::MONCUOESP, $this->moncuoesp);
		if ($this->isColumnModified(CcdefamoPeer::MONCUOPLA)) $criteria->add(CcdefamoPeer::MONCUOPLA, $this->moncuopla);
		if ($this->isColumnModified(CcdefamoPeer::OBSERV)) $criteria->add(CcdefamoPeer::OBSERV, $this->observ);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdefamoPeer::DATABASE_NAME);

		$criteria->add(CcdefamoPeer::ID, $this->id);

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

		$copyObj->setMontot($this->montot);

		$copyObj->setCuotas($this->cuotas);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setNumcuofin($this->numcuofin);

		$copyObj->setNumcuoanu($this->numcuoanu);

		$copyObj->setPergra($this->pergra);

		$copyObj->setPermue($this->permue);

		$copyObj->setPlafin($this->plafin);

		$copyObj->setPlazo($this->plazo);

		$copyObj->setFecdesdef($this->fecdesdef);

		$copyObj->setFechasdef($this->fechasdef);

		$copyObj->setDifint($this->difint);

		$copyObj->setTasintmor($this->tasintmor);

		$copyObj->setTasint($this->tasint);

		$copyObj->setDisanu($this->disanu);

		$copyObj->setPordisanu($this->pordisanu);

		$copyObj->setResequ($this->resequ);

		$copyObj->setCuoesp($this->cuoesp);

		$copyObj->setCuoespigu($this->cuoespigu);

		$copyObj->setIntgrava($this->intgrava);

		$copyObj->setIntcuminc($this->intcuminc);

		$copyObj->setAporgrava($this->aporgrava);

		$copyObj->setCcperiodId($this->ccperiod_id);

		$copyObj->setCctipintId($this->cctipint_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);

		$copyObj->setCcpergravaId($this->ccpergrava_id);

		$copyObj->setCantcuoesp($this->cantcuoesp);

		$copyObj->setCuoespinic($this->cuoespinic);

		$copyObj->setFrecuoesp($this->frecuoesp);

		$copyObj->setMoncuoesp($this->moncuoesp);

		$copyObj->setMoncuopla($this->moncuopla);

		$copyObj->setObserv($this->observ);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamoacts() as $relObj) {
				$copyObj->addCcamoact($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoactresps() as $relObj) {
				$copyObj->addCcamoactresp($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoprins() as $relObj) {
				$copyObj->addCcamoprin($relObj->copy($deepCopy));
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
			self::$peer = new CcdefamoPeer();
		}
		return self::$peer;
	}

	
	public function setCcperiodRelatedByCcperiodId($v)
	{


		if ($v === null) {
			$this->setCcperiodId(NULL);
		} else {
			$this->setCcperiodId($v->getId());
		}


		$this->aCcperiodRelatedByCcperiodId = $v;
	}


	
	public function getCcperiodRelatedByCcperiodId($con = null)
	{
		if ($this->aCcperiodRelatedByCcperiodId === null && ($this->ccperiod_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperiodPeer.php';

      $c = new Criteria();
      $c->add(CcperiodPeer::ID,$this->ccperiod_id);
      
			$this->aCcperiodRelatedByCcperiodId = CcperiodPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperiodRelatedByCcperiodId;
	}

	
	public function setCctipint($v)
	{


		if ($v === null) {
			$this->setCctipintId(NULL);
		} else {
			$this->setCctipintId($v->getId());
		}


		$this->aCctipint = $v;
	}


	
	public function getCctipint($con = null)
	{
		if ($this->aCctipint === null && ($this->cctipint_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipintPeer.php';

      $c = new Criteria();
      $c->add(CctipintPeer::ID,$this->cctipint_id);
      
			$this->aCctipint = CctipintPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipint;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
	}

	
	public function setCcperiodRelatedByCcpergravaId($v)
	{


		if ($v === null) {
			$this->setCcpergravaId(NULL);
		} else {
			$this->setCcpergravaId($v->getId());
		}


		$this->aCcperiodRelatedByCcpergravaId = $v;
	}


	
	public function getCcperiodRelatedByCcpergravaId($con = null)
	{
		if ($this->aCcperiodRelatedByCcpergravaId === null && ($this->ccpergrava_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperiodPeer.php';

      $c = new Criteria();
      $c->add(CcperiodPeer::ID,$this->ccpergrava_id);
      
			$this->aCcperiodRelatedByCcpergravaId = CcperiodPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperiodRelatedByCcpergravaId;
	}

	
	public function setCcperiodRelatedByFrecuoesp($v)
	{


		if ($v === null) {
			$this->setFrecuoesp(NULL);
		} else {
			$this->setFrecuoesp($v->getId());
		}


		$this->aCcperiodRelatedByFrecuoesp = $v;
	}


	
	public function getCcperiodRelatedByFrecuoesp($con = null)
	{
		if ($this->aCcperiodRelatedByFrecuoesp === null && ($this->frecuoesp !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperiodPeer.php';

      $c = new Criteria();
      $c->add(CcperiodPeer::ID,$this->frecuoesp);
      
			$this->aCcperiodRelatedByFrecuoesp = CcperiodPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperiodRelatedByFrecuoesp;
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

				$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

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

		$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

		return CcamoactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoact(Ccamoact $l)
	{
		$this->collCcamoacts[] = $l;
		$l->setCcdefamo($this);
	}


	
	public function getCcamoactsJoinCccredit($criteria = null, $con = null)
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

				$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCccredit($criteria, $con);
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

				$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

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

				$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->getId());

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

				$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

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

		$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

		return CcamoactrespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoactresp(Ccamoactresp $l)
	{
		$this->collCcamoactresps[] = $l;
		$l->setCcdefamo($this);
	}


	
	public function getCcamoactrespsJoinCccredit($criteria = null, $con = null)
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

				$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCccredit($criteria, $con);
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

				$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

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

				$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}

	
	public function initCcamoprins()
	{
		if ($this->collCcamoprins === null) {
			$this->collCcamoprins = array();
		}
	}

	
	public function getCcamoprins($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoprinPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoprins === null) {
			if ($this->isNew()) {
			   $this->collCcamoprins = array();
			} else {

				$criteria->add(CcamoprinPeer::CCDEFAMO_ID, $this->getId());

				CcamoprinPeer::addSelectColumns($criteria);
				$this->collCcamoprins = CcamoprinPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoprinPeer::CCDEFAMO_ID, $this->getId());

				CcamoprinPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoprinCriteria) || !$this->lastCcamoprinCriteria->equals($criteria)) {
					$this->collCcamoprins = CcamoprinPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoprinCriteria = $criteria;
		return $this->collCcamoprins;
	}

	
	public function countCcamoprins($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoprinPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoprinPeer::CCDEFAMO_ID, $this->getId());

		return CcamoprinPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoprin(Ccamoprin $l)
	{
		$this->collCcamoprins[] = $l;
		$l->setCcdefamo($this);
	}


	
	public function getCcamoprinsJoinCcamoact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoprinPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoprins === null) {
			if ($this->isNew()) {
				$this->collCcamoprins = array();
			} else {

				$criteria->add(CcamoprinPeer::CCDEFAMO_ID, $this->getId());

				$this->collCcamoprins = CcamoprinPeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoprinPeer::CCDEFAMO_ID, $this->getId());

			if (!isset($this->lastCcamoprinCriteria) || !$this->lastCcamoprinCriteria->equals($criteria)) {
				$this->collCcamoprins = CcamoprinPeer::doSelectJoinCcamoact($criteria, $con);
			}
		}
		$this->lastCcamoprinCriteria = $criteria;

		return $this->collCcamoprins;
	}

} 