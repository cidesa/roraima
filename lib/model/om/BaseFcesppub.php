<?php


abstract class BaseFcesppub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $fecreg;


	
	protected $rifcon;


	
	protected $rifrep;


	
	protected $nomesp;


	
	protected $diresp;


	
	protected $fecesp;


	
	protected $horesp;


	
	protected $tipesp;


	
	protected $nroent;


	
	protected $monent;


	
	protected $monimp;


	
	protected $nomres;


	
	protected $dirres;


	
	protected $telres;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $staesp;


	
	protected $stadec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $id;

	
	protected $collFcmodesps;

	
	protected $lastFcmodespCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNrocon()
  {

    return trim($this->nrocon);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getNomesp()
  {

    return trim($this->nomesp);

  }
  
  public function getDiresp()
  {

    return trim($this->diresp);

  }
  
  public function getFecesp($format = 'Y-m-d')
  {

    if ($this->fecesp === null || $this->fecesp === '') {
      return null;
    } elseif (!is_int($this->fecesp)) {
            $ts = adodb_strtotime($this->fecesp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecesp] as date/time value: " . var_export($this->fecesp, true));
      }
    } else {
      $ts = $this->fecesp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHoresp()
  {

    return trim($this->horesp);

  }
  
  public function getTipesp()
  {

    return trim($this->tipesp);

  }
  
  public function getNroent($val=false)
  {

    if($val) return number_format($this->nroent,2,',','.');
    else return $this->nroent;

  }
  
  public function getMonent($val=false)
  {

    if($val) return number_format($this->monent,2,',','.');
    else return $this->monent;

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

  }
  
  public function getNomres()
  {

    return trim($this->nomres);

  }
  
  public function getDirres()
  {

    return trim($this->dirres);

  }
  
  public function getTelres()
  {

    return trim($this->telres);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

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

  
  public function getStaesp()
  {

    return trim($this->staesp);

  }
  
  public function getStadec()
  {

    return trim($this->stadec);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNrocon($v)
	{

    if ($this->nrocon !== $v) {
        $this->nrocon = $v;
        $this->modifiedColumns[] = FcesppubPeer::NROCON;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = FcesppubPeer::FECREG;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcesppubPeer::RIFCON;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcesppubPeer::RIFREP;
      }
  
	} 
	
	public function setNomesp($v)
	{

    if ($this->nomesp !== $v) {
        $this->nomesp = $v;
        $this->modifiedColumns[] = FcesppubPeer::NOMESP;
      }
  
	} 
	
	public function setDiresp($v)
	{

    if ($this->diresp !== $v) {
        $this->diresp = $v;
        $this->modifiedColumns[] = FcesppubPeer::DIRESP;
      }
  
	} 
	
	public function setFecesp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecesp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecesp !== $ts) {
      $this->fecesp = $ts;
      $this->modifiedColumns[] = FcesppubPeer::FECESP;
    }

	} 
	
	public function setHoresp($v)
	{

    if ($this->horesp !== $v) {
        $this->horesp = $v;
        $this->modifiedColumns[] = FcesppubPeer::HORESP;
      }
  
	} 
	
	public function setTipesp($v)
	{

    if ($this->tipesp !== $v) {
        $this->tipesp = $v;
        $this->modifiedColumns[] = FcesppubPeer::TIPESP;
      }
  
	} 
	
	public function setNroent($v)
	{

    if ($this->nroent !== $v) {
        $this->nroent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesppubPeer::NROENT;
      }
  
	} 
	
	public function setMonent($v)
	{

    if ($this->monent !== $v) {
        $this->monent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesppubPeer::MONENT;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesppubPeer::MONIMP;
      }
  
	} 
	
	public function setNomres($v)
	{

    if ($this->nomres !== $v) {
        $this->nomres = $v;
        $this->modifiedColumns[] = FcesppubPeer::NOMRES;
      }
  
	} 
	
	public function setDirres($v)
	{

    if ($this->dirres !== $v) {
        $this->dirres = $v;
        $this->modifiedColumns[] = FcesppubPeer::DIRRES;
      }
  
	} 
	
	public function setTelres($v)
	{

    if ($this->telres !== $v) {
        $this->telres = $v;
        $this->modifiedColumns[] = FcesppubPeer::TELRES;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcesppubPeer::FUNREC;
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
      $this->modifiedColumns[] = FcesppubPeer::FECREC;
    }

	} 
	
	public function setStaesp($v)
	{

    if ($this->staesp !== $v) {
        $this->staesp = $v;
        $this->modifiedColumns[] = FcesppubPeer::STAESP;
      }
  
	} 
	
	public function setStadec($v)
	{

    if ($this->stadec !== $v) {
        $this->stadec = $v;
        $this->modifiedColumns[] = FcesppubPeer::STADEC;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcesppubPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcesppubPeer::DIRCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcesppubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrocon = $rs->getString($startcol + 0);

      $this->fecreg = $rs->getDate($startcol + 1, null);

      $this->rifcon = $rs->getString($startcol + 2);

      $this->rifrep = $rs->getString($startcol + 3);

      $this->nomesp = $rs->getString($startcol + 4);

      $this->diresp = $rs->getString($startcol + 5);

      $this->fecesp = $rs->getDate($startcol + 6, null);

      $this->horesp = $rs->getString($startcol + 7);

      $this->tipesp = $rs->getString($startcol + 8);

      $this->nroent = $rs->getFloat($startcol + 9);

      $this->monent = $rs->getFloat($startcol + 10);

      $this->monimp = $rs->getFloat($startcol + 11);

      $this->nomres = $rs->getString($startcol + 12);

      $this->dirres = $rs->getString($startcol + 13);

      $this->telres = $rs->getString($startcol + 14);

      $this->funrec = $rs->getString($startcol + 15);

      $this->fecrec = $rs->getDate($startcol + 16, null);

      $this->staesp = $rs->getString($startcol + 17);

      $this->stadec = $rs->getString($startcol + 18);

      $this->nomcon = $rs->getString($startcol + 19);

      $this->dircon = $rs->getString($startcol + 20);

      $this->id = $rs->getInt($startcol + 21);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 22; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcesppub object", $e);
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
			$con = Propel::getConnection(FcesppubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcesppubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcesppubPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcesppubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcesppubPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcmodesps !== null) {
				foreach($this->collFcmodesps as $referrerFK) {
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


			if (($retval = FcesppubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcmodesps !== null) {
					foreach($this->collFcmodesps as $referrerFK) {
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
		$pos = FcesppubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrocon();
				break;
			case 1:
				return $this->getFecreg();
				break;
			case 2:
				return $this->getRifcon();
				break;
			case 3:
				return $this->getRifrep();
				break;
			case 4:
				return $this->getNomesp();
				break;
			case 5:
				return $this->getDiresp();
				break;
			case 6:
				return $this->getFecesp();
				break;
			case 7:
				return $this->getHoresp();
				break;
			case 8:
				return $this->getTipesp();
				break;
			case 9:
				return $this->getNroent();
				break;
			case 10:
				return $this->getMonent();
				break;
			case 11:
				return $this->getMonimp();
				break;
			case 12:
				return $this->getNomres();
				break;
			case 13:
				return $this->getDirres();
				break;
			case 14:
				return $this->getTelres();
				break;
			case 15:
				return $this->getFunrec();
				break;
			case 16:
				return $this->getFecrec();
				break;
			case 17:
				return $this->getStaesp();
				break;
			case 18:
				return $this->getStadec();
				break;
			case 19:
				return $this->getNomcon();
				break;
			case 20:
				return $this->getDircon();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcesppubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getFecreg(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getRifrep(),
			$keys[4] => $this->getNomesp(),
			$keys[5] => $this->getDiresp(),
			$keys[6] => $this->getFecesp(),
			$keys[7] => $this->getHoresp(),
			$keys[8] => $this->getTipesp(),
			$keys[9] => $this->getNroent(),
			$keys[10] => $this->getMonent(),
			$keys[11] => $this->getMonimp(),
			$keys[12] => $this->getNomres(),
			$keys[13] => $this->getDirres(),
			$keys[14] => $this->getTelres(),
			$keys[15] => $this->getFunrec(),
			$keys[16] => $this->getFecrec(),
			$keys[17] => $this->getStaesp(),
			$keys[18] => $this->getStadec(),
			$keys[19] => $this->getNomcon(),
			$keys[20] => $this->getDircon(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcesppubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrocon($value);
				break;
			case 1:
				$this->setFecreg($value);
				break;
			case 2:
				$this->setRifcon($value);
				break;
			case 3:
				$this->setRifrep($value);
				break;
			case 4:
				$this->setNomesp($value);
				break;
			case 5:
				$this->setDiresp($value);
				break;
			case 6:
				$this->setFecesp($value);
				break;
			case 7:
				$this->setHoresp($value);
				break;
			case 8:
				$this->setTipesp($value);
				break;
			case 9:
				$this->setNroent($value);
				break;
			case 10:
				$this->setMonent($value);
				break;
			case 11:
				$this->setMonimp($value);
				break;
			case 12:
				$this->setNomres($value);
				break;
			case 13:
				$this->setDirres($value);
				break;
			case 14:
				$this->setTelres($value);
				break;
			case 15:
				$this->setFunrec($value);
				break;
			case 16:
				$this->setFecrec($value);
				break;
			case 17:
				$this->setStaesp($value);
				break;
			case 18:
				$this->setStadec($value);
				break;
			case 19:
				$this->setNomcon($value);
				break;
			case 20:
				$this->setDircon($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcesppubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifrep($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomesp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiresp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecesp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setHoresp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipesp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNroent($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonent($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonimp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomres($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDirres($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTelres($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFunrec($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecrec($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStaesp($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setStadec($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNomcon($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDircon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcesppubPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcesppubPeer::NROCON)) $criteria->add(FcesppubPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcesppubPeer::FECREG)) $criteria->add(FcesppubPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcesppubPeer::RIFCON)) $criteria->add(FcesppubPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcesppubPeer::RIFREP)) $criteria->add(FcesppubPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcesppubPeer::NOMESP)) $criteria->add(FcesppubPeer::NOMESP, $this->nomesp);
		if ($this->isColumnModified(FcesppubPeer::DIRESP)) $criteria->add(FcesppubPeer::DIRESP, $this->diresp);
		if ($this->isColumnModified(FcesppubPeer::FECESP)) $criteria->add(FcesppubPeer::FECESP, $this->fecesp);
		if ($this->isColumnModified(FcesppubPeer::HORESP)) $criteria->add(FcesppubPeer::HORESP, $this->horesp);
		if ($this->isColumnModified(FcesppubPeer::TIPESP)) $criteria->add(FcesppubPeer::TIPESP, $this->tipesp);
		if ($this->isColumnModified(FcesppubPeer::NROENT)) $criteria->add(FcesppubPeer::NROENT, $this->nroent);
		if ($this->isColumnModified(FcesppubPeer::MONENT)) $criteria->add(FcesppubPeer::MONENT, $this->monent);
		if ($this->isColumnModified(FcesppubPeer::MONIMP)) $criteria->add(FcesppubPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcesppubPeer::NOMRES)) $criteria->add(FcesppubPeer::NOMRES, $this->nomres);
		if ($this->isColumnModified(FcesppubPeer::DIRRES)) $criteria->add(FcesppubPeer::DIRRES, $this->dirres);
		if ($this->isColumnModified(FcesppubPeer::TELRES)) $criteria->add(FcesppubPeer::TELRES, $this->telres);
		if ($this->isColumnModified(FcesppubPeer::FUNREC)) $criteria->add(FcesppubPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcesppubPeer::FECREC)) $criteria->add(FcesppubPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcesppubPeer::STAESP)) $criteria->add(FcesppubPeer::STAESP, $this->staesp);
		if ($this->isColumnModified(FcesppubPeer::STADEC)) $criteria->add(FcesppubPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcesppubPeer::NOMCON)) $criteria->add(FcesppubPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcesppubPeer::DIRCON)) $criteria->add(FcesppubPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcesppubPeer::ID)) $criteria->add(FcesppubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcesppubPeer::DATABASE_NAME);

		$criteria->add(FcesppubPeer::ID, $this->id);

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

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setNomesp($this->nomesp);

		$copyObj->setDiresp($this->diresp);

		$copyObj->setFecesp($this->fecesp);

		$copyObj->setHoresp($this->horesp);

		$copyObj->setTipesp($this->tipesp);

		$copyObj->setNroent($this->nroent);

		$copyObj->setMonent($this->monent);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setNomres($this->nomres);

		$copyObj->setDirres($this->dirres);

		$copyObj->setTelres($this->telres);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setStaesp($this->staesp);

		$copyObj->setStadec($this->stadec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcmodesps() as $relObj) {
				$copyObj->addFcmodesp($relObj->copy($deepCopy));
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
			self::$peer = new FcesppubPeer();
		}
		return self::$peer;
	}

	
	public function initFcmodesps()
	{
		if ($this->collFcmodesps === null) {
			$this->collFcmodesps = array();
		}
	}

	
	public function getFcmodesps($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcmodespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcmodesps === null) {
			if ($this->isNew()) {
			   $this->collFcmodesps = array();
			} else {

				$criteria->add(FcmodespPeer::NROCON, $this->getNrocon());

				FcmodespPeer::addSelectColumns($criteria);
				$this->collFcmodesps = FcmodespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcmodespPeer::NROCON, $this->getNrocon());

				FcmodespPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcmodespCriteria) || !$this->lastFcmodespCriteria->equals($criteria)) {
					$this->collFcmodesps = FcmodespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcmodespCriteria = $criteria;
		return $this->collFcmodesps;
	}

	
	public function countFcmodesps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcmodespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcmodespPeer::NROCON, $this->getNrocon());

		return FcmodespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcmodesp(Fcmodesp $l)
	{
		$this->collFcmodesps[] = $l;
		$l->setFcesppub($this);
	}

} 