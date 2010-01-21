<?php


abstract class BaseCcgescob extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecges;


	
	protected $feccompag;


	
	protected $tipacc;


	
	protected $fecdep;


	
	protected $fecrec;


	
	protected $ccbanco_id;


	
	protected $numdep;


	
	protected $mondep;


	
	protected $envfax;


	
	protected $coment;


	
	protected $ccclaact_id;


	
	protected $ccusuint_id;


	
	protected $ccactana_id;


	
	protected $cctiptra_id;


	
	protected $cccredit_id;


	
	protected $ccanalis_id;


	
	protected $ccestado_id;

	
	protected $aCcclaact;

	
	protected $aCcusuint;

	
	protected $aCcactana;

	
	protected $aCctiptra;

	
	protected $aCccredit;

	
	protected $aCcanalis;

	
	protected $aCcestado;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecges($format = 'Y-m-d')
  {

    if ($this->fecges === null || $this->fecges === '') {
      return null;
    } elseif (!is_int($this->fecges)) {
            $ts = adodb_strtotime($this->fecges);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecges] as date/time value: " . var_export($this->fecges, true));
      }
    } else {
      $ts = $this->fecges;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccompag($format = 'Y-m-d')
  {

    if ($this->feccompag === null || $this->feccompag === '') {
      return null;
    } elseif (!is_int($this->feccompag)) {
            $ts = adodb_strtotime($this->feccompag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccompag] as date/time value: " . var_export($this->feccompag, true));
      }
    } else {
      $ts = $this->feccompag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipacc()
  {

    return trim($this->tipacc);

  }
  
  public function getFecdep($format = 'Y-m-d')
  {

    if ($this->fecdep === null || $this->fecdep === '') {
      return null;
    } elseif (!is_int($this->fecdep)) {
            $ts = adodb_strtotime($this->fecdep);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdep] as date/time value: " . var_export($this->fecdep, true));
      }
    } else {
      $ts = $this->fecdep;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCcbancoId()
  {

    return $this->ccbanco_id;

  }
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getMondep($val=false)
  {

    if($val) return number_format($this->mondep,2,',','.');
    else return $this->mondep;

  }
  
  public function getEnvfax()
  {

    return $this->envfax;

  }
  
  public function getComent()
  {

    return trim($this->coment);

  }
  
  public function getCcclaactId()
  {

    return $this->ccclaact_id;

  }
  
  public function getCcusuintId()
  {

    return $this->ccusuint_id;

  }
  
  public function getCcactanaId()
  {

    return $this->ccactana_id;

  }
  
  public function getCctiptraId()
  {

    return $this->cctiptra_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcanalisId()
  {

    return $this->ccanalis_id;

  }
  
  public function getCcestadoId()
  {

    return $this->ccestado_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcgescobPeer::ID;
      }
  
	} 
	
	public function setFecges($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecges] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecges !== $ts) {
      $this->fecges = $ts;
      $this->modifiedColumns[] = CcgescobPeer::FECGES;
    }

	} 
	
	public function setFeccompag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccompag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccompag !== $ts) {
      $this->feccompag = $ts;
      $this->modifiedColumns[] = CcgescobPeer::FECCOMPAG;
    }

	} 
	
	public function setTipacc($v)
	{

    if ($this->tipacc !== $v) {
        $this->tipacc = $v;
        $this->modifiedColumns[] = CcgescobPeer::TIPACC;
      }
  
	} 
	
	public function setFecdep($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdep] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdep !== $ts) {
      $this->fecdep = $ts;
      $this->modifiedColumns[] = CcgescobPeer::FECDEP;
    }

	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = CcgescobPeer::FECREC;
    }

	} 
	
	public function setCcbancoId($v)
	{

    if ($this->ccbanco_id !== $v) {
        $this->ccbanco_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCBANCO_ID;
      }
  
	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = $v;
        $this->modifiedColumns[] = CcgescobPeer::NUMDEP;
      }
  
	} 
	
	public function setMondep($v)
	{

    if ($this->mondep !== $v) {
        $this->mondep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcgescobPeer::MONDEP;
      }
  
	} 
	
	public function setEnvfax($v)
	{

    if ($this->envfax !== $v) {
        $this->envfax = $v;
        $this->modifiedColumns[] = CcgescobPeer::ENVFAX;
      }
  
	} 
	
	public function setComent($v)
	{

    if ($this->coment !== $v) {
        $this->coment = $v;
        $this->modifiedColumns[] = CcgescobPeer::COMENT;
      }
  
	} 
	
	public function setCcclaactId($v)
	{

    if ($this->ccclaact_id !== $v) {
        $this->ccclaact_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCCLAACT_ID;
      }
  
		if ($this->aCcclaact !== null && $this->aCcclaact->getId() !== $v) {
			$this->aCcclaact = null;
		}

	} 
	
	public function setCcusuintId($v)
	{

    if ($this->ccusuint_id !== $v) {
        $this->ccusuint_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCUSUINT_ID;
      }
  
		if ($this->aCcusuint !== null && $this->aCcusuint->getId() !== $v) {
			$this->aCcusuint = null;
		}

	} 
	
	public function setCcactanaId($v)
	{

    if ($this->ccactana_id !== $v) {
        $this->ccactana_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCACTANA_ID;
      }
  
		if ($this->aCcactana !== null && $this->aCcactana->getId() !== $v) {
			$this->aCcactana = null;
		}

	} 
	
	public function setCctiptraId($v)
	{

    if ($this->cctiptra_id !== $v) {
        $this->cctiptra_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCTIPTRA_ID;
      }
  
		if ($this->aCctiptra !== null && $this->aCctiptra->getId() !== $v) {
			$this->aCctiptra = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcanalisId($v)
	{

    if ($this->ccanalis_id !== $v) {
        $this->ccanalis_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCANALIS_ID;
      }
  
		if ($this->aCcanalis !== null && $this->aCcanalis->getId() !== $v) {
			$this->aCcanalis = null;
		}

	} 
	
	public function setCcestadoId($v)
	{

    if ($this->ccestado_id !== $v) {
        $this->ccestado_id = $v;
        $this->modifiedColumns[] = CcgescobPeer::CCESTADO_ID;
      }
  
		if ($this->aCcestado !== null && $this->aCcestado->getId() !== $v) {
			$this->aCcestado = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecges = $rs->getDate($startcol + 1, null);

      $this->feccompag = $rs->getDate($startcol + 2, null);

      $this->tipacc = $rs->getString($startcol + 3);

      $this->fecdep = $rs->getDate($startcol + 4, null);

      $this->fecrec = $rs->getDate($startcol + 5, null);

      $this->ccbanco_id = $rs->getInt($startcol + 6);

      $this->numdep = $rs->getString($startcol + 7);

      $this->mondep = $rs->getFloat($startcol + 8);

      $this->envfax = $rs->getBoolean($startcol + 9);

      $this->coment = $rs->getString($startcol + 10);

      $this->ccclaact_id = $rs->getInt($startcol + 11);

      $this->ccusuint_id = $rs->getInt($startcol + 12);

      $this->ccactana_id = $rs->getInt($startcol + 13);

      $this->cctiptra_id = $rs->getInt($startcol + 14);

      $this->cccredit_id = $rs->getInt($startcol + 15);

      $this->ccanalis_id = $rs->getInt($startcol + 16);

      $this->ccestado_id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccgescob object", $e);
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
			$con = Propel::getConnection(CcgescobPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcgescobPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcgescobPeer::DATABASE_NAME);
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


												
			if ($this->aCcclaact !== null) {
				if ($this->aCcclaact->isModified()) {
					$affectedRows += $this->aCcclaact->save($con);
				}
				$this->setCcclaact($this->aCcclaact);
			}

			if ($this->aCcusuint !== null) {
				if ($this->aCcusuint->isModified()) {
					$affectedRows += $this->aCcusuint->save($con);
				}
				$this->setCcusuint($this->aCcusuint);
			}

			if ($this->aCcactana !== null) {
				if ($this->aCcactana->isModified()) {
					$affectedRows += $this->aCcactana->save($con);
				}
				$this->setCcactana($this->aCcactana);
			}

			if ($this->aCctiptra !== null) {
				if ($this->aCctiptra->isModified()) {
					$affectedRows += $this->aCctiptra->save($con);
				}
				$this->setCctiptra($this->aCctiptra);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcanalis !== null) {
				if ($this->aCcanalis->isModified()) {
					$affectedRows += $this->aCcanalis->save($con);
				}
				$this->setCcanalis($this->aCcanalis);
			}

			if ($this->aCcestado !== null) {
				if ($this->aCcestado->isModified()) {
					$affectedRows += $this->aCcestado->save($con);
				}
				$this->setCcestado($this->aCcestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcgescobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcgescobPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aCcclaact !== null) {
				if (!$this->aCcclaact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcclaact->getValidationFailures());
				}
			}

			if ($this->aCcusuint !== null) {
				if (!$this->aCcusuint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuint->getValidationFailures());
				}
			}

			if ($this->aCcactana !== null) {
				if (!$this->aCcactana->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcactana->getValidationFailures());
				}
			}

			if ($this->aCctiptra !== null) {
				if (!$this->aCctiptra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctiptra->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcanalis !== null) {
				if (!$this->aCcanalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcanalis->getValidationFailures());
				}
			}

			if ($this->aCcestado !== null) {
				if (!$this->aCcestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestado->getValidationFailures());
				}
			}


			if (($retval = CcgescobPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcgescobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecges();
				break;
			case 2:
				return $this->getFeccompag();
				break;
			case 3:
				return $this->getTipacc();
				break;
			case 4:
				return $this->getFecdep();
				break;
			case 5:
				return $this->getFecrec();
				break;
			case 6:
				return $this->getCcbancoId();
				break;
			case 7:
				return $this->getNumdep();
				break;
			case 8:
				return $this->getMondep();
				break;
			case 9:
				return $this->getEnvfax();
				break;
			case 10:
				return $this->getComent();
				break;
			case 11:
				return $this->getCcclaactId();
				break;
			case 12:
				return $this->getCcusuintId();
				break;
			case 13:
				return $this->getCcactanaId();
				break;
			case 14:
				return $this->getCctiptraId();
				break;
			case 15:
				return $this->getCccreditId();
				break;
			case 16:
				return $this->getCcanalisId();
				break;
			case 17:
				return $this->getCcestadoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcgescobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecges(),
			$keys[2] => $this->getFeccompag(),
			$keys[3] => $this->getTipacc(),
			$keys[4] => $this->getFecdep(),
			$keys[5] => $this->getFecrec(),
			$keys[6] => $this->getCcbancoId(),
			$keys[7] => $this->getNumdep(),
			$keys[8] => $this->getMondep(),
			$keys[9] => $this->getEnvfax(),
			$keys[10] => $this->getComent(),
			$keys[11] => $this->getCcclaactId(),
			$keys[12] => $this->getCcusuintId(),
			$keys[13] => $this->getCcactanaId(),
			$keys[14] => $this->getCctiptraId(),
			$keys[15] => $this->getCccreditId(),
			$keys[16] => $this->getCcanalisId(),
			$keys[17] => $this->getCcestadoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcgescobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecges($value);
				break;
			case 2:
				$this->setFeccompag($value);
				break;
			case 3:
				$this->setTipacc($value);
				break;
			case 4:
				$this->setFecdep($value);
				break;
			case 5:
				$this->setFecrec($value);
				break;
			case 6:
				$this->setCcbancoId($value);
				break;
			case 7:
				$this->setNumdep($value);
				break;
			case 8:
				$this->setMondep($value);
				break;
			case 9:
				$this->setEnvfax($value);
				break;
			case 10:
				$this->setComent($value);
				break;
			case 11:
				$this->setCcclaactId($value);
				break;
			case 12:
				$this->setCcusuintId($value);
				break;
			case 13:
				$this->setCcactanaId($value);
				break;
			case 14:
				$this->setCctiptraId($value);
				break;
			case 15:
				$this->setCccreditId($value);
				break;
			case 16:
				$this->setCcanalisId($value);
				break;
			case 17:
				$this->setCcestadoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcgescobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecges($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccompag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipacc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcbancoId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumdep($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMondep($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEnvfax($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setComent($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCcclaactId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCcusuintId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCcactanaId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCctiptraId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCccreditId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcanalisId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCcestadoId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcgescobPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcgescobPeer::ID)) $criteria->add(CcgescobPeer::ID, $this->id);
		if ($this->isColumnModified(CcgescobPeer::FECGES)) $criteria->add(CcgescobPeer::FECGES, $this->fecges);
		if ($this->isColumnModified(CcgescobPeer::FECCOMPAG)) $criteria->add(CcgescobPeer::FECCOMPAG, $this->feccompag);
		if ($this->isColumnModified(CcgescobPeer::TIPACC)) $criteria->add(CcgescobPeer::TIPACC, $this->tipacc);
		if ($this->isColumnModified(CcgescobPeer::FECDEP)) $criteria->add(CcgescobPeer::FECDEP, $this->fecdep);
		if ($this->isColumnModified(CcgescobPeer::FECREC)) $criteria->add(CcgescobPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(CcgescobPeer::CCBANCO_ID)) $criteria->add(CcgescobPeer::CCBANCO_ID, $this->ccbanco_id);
		if ($this->isColumnModified(CcgescobPeer::NUMDEP)) $criteria->add(CcgescobPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(CcgescobPeer::MONDEP)) $criteria->add(CcgescobPeer::MONDEP, $this->mondep);
		if ($this->isColumnModified(CcgescobPeer::ENVFAX)) $criteria->add(CcgescobPeer::ENVFAX, $this->envfax);
		if ($this->isColumnModified(CcgescobPeer::COMENT)) $criteria->add(CcgescobPeer::COMENT, $this->coment);
		if ($this->isColumnModified(CcgescobPeer::CCCLAACT_ID)) $criteria->add(CcgescobPeer::CCCLAACT_ID, $this->ccclaact_id);
		if ($this->isColumnModified(CcgescobPeer::CCUSUINT_ID)) $criteria->add(CcgescobPeer::CCUSUINT_ID, $this->ccusuint_id);
		if ($this->isColumnModified(CcgescobPeer::CCACTANA_ID)) $criteria->add(CcgescobPeer::CCACTANA_ID, $this->ccactana_id);
		if ($this->isColumnModified(CcgescobPeer::CCTIPTRA_ID)) $criteria->add(CcgescobPeer::CCTIPTRA_ID, $this->cctiptra_id);
		if ($this->isColumnModified(CcgescobPeer::CCCREDIT_ID)) $criteria->add(CcgescobPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcgescobPeer::CCANALIS_ID)) $criteria->add(CcgescobPeer::CCANALIS_ID, $this->ccanalis_id);
		if ($this->isColumnModified(CcgescobPeer::CCESTADO_ID)) $criteria->add(CcgescobPeer::CCESTADO_ID, $this->ccestado_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcgescobPeer::DATABASE_NAME);

		$criteria->add(CcgescobPeer::ID, $this->id);

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

		$copyObj->setFecges($this->fecges);

		$copyObj->setFeccompag($this->feccompag);

		$copyObj->setTipacc($this->tipacc);

		$copyObj->setFecdep($this->fecdep);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setCcbancoId($this->ccbanco_id);

		$copyObj->setNumdep($this->numdep);

		$copyObj->setMondep($this->mondep);

		$copyObj->setEnvfax($this->envfax);

		$copyObj->setComent($this->coment);

		$copyObj->setCcclaactId($this->ccclaact_id);

		$copyObj->setCcusuintId($this->ccusuint_id);

		$copyObj->setCcactanaId($this->ccactana_id);

		$copyObj->setCctiptraId($this->cctiptra_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcanalisId($this->ccanalis_id);

		$copyObj->setCcestadoId($this->ccestado_id);


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
			self::$peer = new CcgescobPeer();
		}
		return self::$peer;
	}

	
	public function setCcclaact($v)
	{


		if ($v === null) {
			$this->setCcclaactId(NULL);
		} else {
			$this->setCcclaactId($v->getId());
		}


		$this->aCcclaact = $v;
	}


	
	public function getCcclaact($con = null)
	{
		if ($this->aCcclaact === null && ($this->ccclaact_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcclaactPeer.php';

      $c = new Criteria();
      $c->add(CcclaactPeer::ID,$this->ccclaact_id);
      
			$this->aCcclaact = CcclaactPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcclaact;
	}

	
	public function setCcusuint($v)
	{


		if ($v === null) {
			$this->setCcusuintId(NULL);
		} else {
			$this->setCcusuintId($v->getId());
		}


		$this->aCcusuint = $v;
	}


	
	public function getCcusuint($con = null)
	{
		if ($this->aCcusuint === null && ($this->ccusuint_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuintPeer.php';

      $c = new Criteria();
      $c->add(CcusuintPeer::ID,$this->ccusuint_id);
      
			$this->aCcusuint = CcusuintPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuint;
	}

	
	public function setCcactana($v)
	{


		if ($v === null) {
			$this->setCcactanaId(NULL);
		} else {
			$this->setCcactanaId($v->getId());
		}


		$this->aCcactana = $v;
	}


	
	public function getCcactana($con = null)
	{
		if ($this->aCcactana === null && ($this->ccactana_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';

      $c = new Criteria();
      $c->add(CcactanaPeer::ID,$this->ccactana_id);
      
			$this->aCcactana = CcactanaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcactana;
	}

	
	public function setCctiptra($v)
	{


		if ($v === null) {
			$this->setCctiptraId(NULL);
		} else {
			$this->setCctiptraId($v->getId());
		}


		$this->aCctiptra = $v;
	}


	
	public function getCctiptra($con = null)
	{
		if ($this->aCctiptra === null && ($this->cctiptra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctiptraPeer.php';

      $c = new Criteria();
      $c->add(CctiptraPeer::ID,$this->cctiptra_id);
      
			$this->aCctiptra = CctiptraPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctiptra;
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

	
	public function setCcanalis($v)
	{


		if ($v === null) {
			$this->setCcanalisId(NULL);
		} else {
			$this->setCcanalisId($v->getId());
		}


		$this->aCcanalis = $v;
	}


	
	public function getCcanalis($con = null)
	{
		if ($this->aCcanalis === null && ($this->ccanalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';

      $c = new Criteria();
      $c->add(CcanalisPeer::ID,$this->ccanalis_id);
      
			$this->aCcanalis = CcanalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcanalis;
	}

	
	public function setCcestado($v)
	{


		if ($v === null) {
			$this->setCcestadoId(NULL);
		} else {
			$this->setCcestadoId($v->getId());
		}


		$this->aCcestado = $v;
	}


	
	public function getCcestado($con = null)
	{
		if ($this->aCcestado === null && ($this->ccestado_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestadoPeer.php';

      $c = new Criteria();
      $c->add(CcestadoPeer::ID,$this->ccestado_id);
      
			$this->aCcestado = CcestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestado;
	}

} 