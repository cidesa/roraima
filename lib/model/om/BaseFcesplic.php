<?php


abstract class BaseFcesplic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $fecreg;


	
	protected $rifcon;


	
	protected $tipesp;


	
	protected $desesp;


	
	protected $diresp;


	
	protected $monesp;


	
	protected $monimp;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $rifrep;


	
	protected $staesp;


	
	protected $stadec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $semdia;


	
	protected $texexo;


	
	protected $fecesp;


	
	protected $horespi;


	
	protected $nroent;


	
	protected $monent;


	
	protected $exoesp;


	
	protected $horespf;


	
	protected $id;

	
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
  
  public function getTipesp()
  {

    return trim($this->tipesp);

  }
  
  public function getDesesp()
  {

    return trim($this->desesp);

  }
  
  public function getDiresp()
  {

    return trim($this->diresp);

  }
  
  public function getMonesp($val=false)
  {

    if($val) return number_format($this->monesp,2,',','.');
    else return $this->monesp;

  }
  
  public function getMonimp($val=false)
  {

    if($val) return number_format($this->monimp,2,',','.');
    else return $this->monimp;

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

  
  public function getRifrep()
  {

    return trim($this->rifrep);

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
  
  public function getSemdia($val=false)
  {

    if($val) return number_format($this->semdia,2,',','.');
    else return $this->semdia;

  }
  
  public function getTexexo()
  {

    return trim($this->texexo);

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

  
  public function getHorespi()
  {

    return trim($this->horespi);

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
  
  public function getExoesp()
  {

    return trim($this->exoesp);

  }
  
  public function getHorespf()
  {

    return trim($this->horespf);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNrocon($v)
	{

    if ($this->nrocon !== $v) {
        $this->nrocon = $v;
        $this->modifiedColumns[] = FcesplicPeer::NROCON;
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
      $this->modifiedColumns[] = FcesplicPeer::FECREG;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcesplicPeer::RIFCON;
      }
  
	} 
	
	public function setTipesp($v)
	{

    if ($this->tipesp !== $v) {
        $this->tipesp = $v;
        $this->modifiedColumns[] = FcesplicPeer::TIPESP;
      }
  
	} 
	
	public function setDesesp($v)
	{

    if ($this->desesp !== $v) {
        $this->desesp = $v;
        $this->modifiedColumns[] = FcesplicPeer::DESESP;
      }
  
	} 
	
	public function setDiresp($v)
	{

    if ($this->diresp !== $v) {
        $this->diresp = $v;
        $this->modifiedColumns[] = FcesplicPeer::DIRESP;
      }
  
	} 
	
	public function setMonesp($v)
	{

    if ($this->monesp !== $v) {
        $this->monesp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesplicPeer::MONESP;
      }
  
	} 
	
	public function setMonimp($v)
	{

    if ($this->monimp !== $v) {
        $this->monimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesplicPeer::MONIMP;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcesplicPeer::FUNREC;
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
      $this->modifiedColumns[] = FcesplicPeer::FECREC;
    }

	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcesplicPeer::RIFREP;
      }
  
	} 
	
	public function setStaesp($v)
	{

    if ($this->staesp !== $v) {
        $this->staesp = $v;
        $this->modifiedColumns[] = FcesplicPeer::STAESP;
      }
  
	} 
	
	public function setStadec($v)
	{

    if ($this->stadec !== $v) {
        $this->stadec = $v;
        $this->modifiedColumns[] = FcesplicPeer::STADEC;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcesplicPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcesplicPeer::DIRCON;
      }
  
	} 
	
	public function setSemdia($v)
	{

    if ($this->semdia !== $v) {
        $this->semdia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesplicPeer::SEMDIA;
      }
  
	} 
	
	public function setTexexo($v)
	{

    if ($this->texexo !== $v) {
        $this->texexo = $v;
        $this->modifiedColumns[] = FcesplicPeer::TEXEXO;
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
      $this->modifiedColumns[] = FcesplicPeer::FECESP;
    }

	} 
	
	public function setHorespi($v)
	{

    if ($this->horespi !== $v) {
        $this->horespi = $v;
        $this->modifiedColumns[] = FcesplicPeer::HORESPI;
      }
  
	} 
	
	public function setNroent($v)
	{

    if ($this->nroent !== $v) {
        $this->nroent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesplicPeer::NROENT;
      }
  
	} 
	
	public function setMonent($v)
	{

    if ($this->monent !== $v) {
        $this->monent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcesplicPeer::MONENT;
      }
  
	} 
	
	public function setExoesp($v)
	{

    if ($this->exoesp !== $v) {
        $this->exoesp = $v;
        $this->modifiedColumns[] = FcesplicPeer::EXOESP;
      }
  
	} 
	
	public function setHorespf($v)
	{

    if ($this->horespf !== $v) {
        $this->horespf = $v;
        $this->modifiedColumns[] = FcesplicPeer::HORESPF;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcesplicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrocon = $rs->getString($startcol + 0);

      $this->fecreg = $rs->getDate($startcol + 1, null);

      $this->rifcon = $rs->getString($startcol + 2);

      $this->tipesp = $rs->getString($startcol + 3);

      $this->desesp = $rs->getString($startcol + 4);

      $this->diresp = $rs->getString($startcol + 5);

      $this->monesp = $rs->getFloat($startcol + 6);

      $this->monimp = $rs->getFloat($startcol + 7);

      $this->funrec = $rs->getString($startcol + 8);

      $this->fecrec = $rs->getDate($startcol + 9, null);

      $this->rifrep = $rs->getString($startcol + 10);

      $this->staesp = $rs->getString($startcol + 11);

      $this->stadec = $rs->getString($startcol + 12);

      $this->nomcon = $rs->getString($startcol + 13);

      $this->dircon = $rs->getString($startcol + 14);

      $this->semdia = $rs->getFloat($startcol + 15);

      $this->texexo = $rs->getString($startcol + 16);

      $this->fecesp = $rs->getDate($startcol + 17, null);

      $this->horespi = $rs->getString($startcol + 18);

      $this->nroent = $rs->getFloat($startcol + 19);

      $this->monent = $rs->getFloat($startcol + 20);

      $this->exoesp = $rs->getString($startcol + 21);

      $this->horespf = $rs->getString($startcol + 22);

      $this->id = $rs->getInt($startcol + 23);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 24; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcesplic object", $e);
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
			$con = Propel::getConnection(FcesplicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcesplicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcesplicPeer::DATABASE_NAME);
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
					$pk = FcesplicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcesplicPeer::doUpdate($this, $con);
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


			if (($retval = FcesplicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcesplicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTipesp();
				break;
			case 4:
				return $this->getDesesp();
				break;
			case 5:
				return $this->getDiresp();
				break;
			case 6:
				return $this->getMonesp();
				break;
			case 7:
				return $this->getMonimp();
				break;
			case 8:
				return $this->getFunrec();
				break;
			case 9:
				return $this->getFecrec();
				break;
			case 10:
				return $this->getRifrep();
				break;
			case 11:
				return $this->getStaesp();
				break;
			case 12:
				return $this->getStadec();
				break;
			case 13:
				return $this->getNomcon();
				break;
			case 14:
				return $this->getDircon();
				break;
			case 15:
				return $this->getSemdia();
				break;
			case 16:
				return $this->getTexexo();
				break;
			case 17:
				return $this->getFecesp();
				break;
			case 18:
				return $this->getHorespi();
				break;
			case 19:
				return $this->getNroent();
				break;
			case 20:
				return $this->getMonent();
				break;
			case 21:
				return $this->getExoesp();
				break;
			case 22:
				return $this->getHorespf();
				break;
			case 23:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcesplicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getFecreg(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getTipesp(),
			$keys[4] => $this->getDesesp(),
			$keys[5] => $this->getDiresp(),
			$keys[6] => $this->getMonesp(),
			$keys[7] => $this->getMonimp(),
			$keys[8] => $this->getFunrec(),
			$keys[9] => $this->getFecrec(),
			$keys[10] => $this->getRifrep(),
			$keys[11] => $this->getStaesp(),
			$keys[12] => $this->getStadec(),
			$keys[13] => $this->getNomcon(),
			$keys[14] => $this->getDircon(),
			$keys[15] => $this->getSemdia(),
			$keys[16] => $this->getTexexo(),
			$keys[17] => $this->getFecesp(),
			$keys[18] => $this->getHorespi(),
			$keys[19] => $this->getNroent(),
			$keys[20] => $this->getMonent(),
			$keys[21] => $this->getExoesp(),
			$keys[22] => $this->getHorespf(),
			$keys[23] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcesplicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTipesp($value);
				break;
			case 4:
				$this->setDesesp($value);
				break;
			case 5:
				$this->setDiresp($value);
				break;
			case 6:
				$this->setMonesp($value);
				break;
			case 7:
				$this->setMonimp($value);
				break;
			case 8:
				$this->setFunrec($value);
				break;
			case 9:
				$this->setFecrec($value);
				break;
			case 10:
				$this->setRifrep($value);
				break;
			case 11:
				$this->setStaesp($value);
				break;
			case 12:
				$this->setStadec($value);
				break;
			case 13:
				$this->setNomcon($value);
				break;
			case 14:
				$this->setDircon($value);
				break;
			case 15:
				$this->setSemdia($value);
				break;
			case 16:
				$this->setTexexo($value);
				break;
			case 17:
				$this->setFecesp($value);
				break;
			case 18:
				$this->setHorespi($value);
				break;
			case 19:
				$this->setNroent($value);
				break;
			case 20:
				$this->setMonent($value);
				break;
			case 21:
				$this->setExoesp($value);
				break;
			case 22:
				$this->setHorespf($value);
				break;
			case 23:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcesplicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipesp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesesp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiresp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonesp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFunrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRifrep($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStaesp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStadec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNomcon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDircon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSemdia($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTexexo($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecesp($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setHorespi($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNroent($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMonent($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setExoesp($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setHorespf($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setId($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcesplicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcesplicPeer::NROCON)) $criteria->add(FcesplicPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcesplicPeer::FECREG)) $criteria->add(FcesplicPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcesplicPeer::RIFCON)) $criteria->add(FcesplicPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcesplicPeer::TIPESP)) $criteria->add(FcesplicPeer::TIPESP, $this->tipesp);
		if ($this->isColumnModified(FcesplicPeer::DESESP)) $criteria->add(FcesplicPeer::DESESP, $this->desesp);
		if ($this->isColumnModified(FcesplicPeer::DIRESP)) $criteria->add(FcesplicPeer::DIRESP, $this->diresp);
		if ($this->isColumnModified(FcesplicPeer::MONESP)) $criteria->add(FcesplicPeer::MONESP, $this->monesp);
		if ($this->isColumnModified(FcesplicPeer::MONIMP)) $criteria->add(FcesplicPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcesplicPeer::FUNREC)) $criteria->add(FcesplicPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcesplicPeer::FECREC)) $criteria->add(FcesplicPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcesplicPeer::RIFREP)) $criteria->add(FcesplicPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcesplicPeer::STAESP)) $criteria->add(FcesplicPeer::STAESP, $this->staesp);
		if ($this->isColumnModified(FcesplicPeer::STADEC)) $criteria->add(FcesplicPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcesplicPeer::NOMCON)) $criteria->add(FcesplicPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcesplicPeer::DIRCON)) $criteria->add(FcesplicPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcesplicPeer::SEMDIA)) $criteria->add(FcesplicPeer::SEMDIA, $this->semdia);
		if ($this->isColumnModified(FcesplicPeer::TEXEXO)) $criteria->add(FcesplicPeer::TEXEXO, $this->texexo);
		if ($this->isColumnModified(FcesplicPeer::FECESP)) $criteria->add(FcesplicPeer::FECESP, $this->fecesp);
		if ($this->isColumnModified(FcesplicPeer::HORESPI)) $criteria->add(FcesplicPeer::HORESPI, $this->horespi);
		if ($this->isColumnModified(FcesplicPeer::NROENT)) $criteria->add(FcesplicPeer::NROENT, $this->nroent);
		if ($this->isColumnModified(FcesplicPeer::MONENT)) $criteria->add(FcesplicPeer::MONENT, $this->monent);
		if ($this->isColumnModified(FcesplicPeer::EXOESP)) $criteria->add(FcesplicPeer::EXOESP, $this->exoesp);
		if ($this->isColumnModified(FcesplicPeer::HORESPF)) $criteria->add(FcesplicPeer::HORESPF, $this->horespf);
		if ($this->isColumnModified(FcesplicPeer::ID)) $criteria->add(FcesplicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcesplicPeer::DATABASE_NAME);

		$criteria->add(FcesplicPeer::ID, $this->id);

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

		$copyObj->setTipesp($this->tipesp);

		$copyObj->setDesesp($this->desesp);

		$copyObj->setDiresp($this->diresp);

		$copyObj->setMonesp($this->monesp);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setStaesp($this->staesp);

		$copyObj->setStadec($this->stadec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setSemdia($this->semdia);

		$copyObj->setTexexo($this->texexo);

		$copyObj->setFecesp($this->fecesp);

		$copyObj->setHorespi($this->horespi);

		$copyObj->setNroent($this->nroent);

		$copyObj->setMonent($this->monent);

		$copyObj->setExoesp($this->exoesp);

		$copyObj->setHorespf($this->horespf);


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
			self::$peer = new FcesplicPeer();
		}
		return self::$peer;
	}

} 