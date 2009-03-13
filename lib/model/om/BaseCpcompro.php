<?php


abstract class BaseCpcompro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcom;


	
	protected $tipcom;


	
	protected $feccom;


	
	protected $anocom;


	
	protected $refprc;


	
	protected $tipprc;


	
	protected $descom;


	
	protected $desanu;


	
	protected $moncom;


	
	protected $salcau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $stacom;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $tipo;


	
	protected $aprcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnocom()
  {

    return trim($this->anocom);

  }
  
  public function getRefprc()
  {

    return trim($this->refprc);

  }
  
  public function getTipprc()
  {

    return trim($this->tipprc);

  }
  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getSalcau($val=false)
  {

    if($val) return number_format($this->salcau,2,',','.');
    else return $this->salcau;

  }
  
  public function getSalpag($val=false)
  {

    if($val) return number_format($this->salpag,2,',','.');
    else return $this->salpag;

  }
  
  public function getSalaju($val=false)
  {

    if($val) return number_format($this->salaju,2,',','.');
    else return $this->salaju;

  }
  
  public function getStacom()
  {

    return trim($this->stacom);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getAprcom()
  {

    return trim($this->aprcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = CpcomproPeer::REFCOM;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CpcomproPeer::TIPCOM;
      }
  
	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = CpcomproPeer::FECCOM;
    }

	} 
	
	public function setAnocom($v)
	{

    if ($this->anocom !== $v) {
        $this->anocom = $v;
        $this->modifiedColumns[] = CpcomproPeer::ANOCOM;
      }
  
	} 
	
	public function setRefprc($v)
	{

    if ($this->refprc !== $v) {
        $this->refprc = $v;
        $this->modifiedColumns[] = CpcomproPeer::REFPRC;
      }
  
	} 
	
	public function setTipprc($v)
	{

    if ($this->tipprc !== $v) {
        $this->tipprc = $v;
        $this->modifiedColumns[] = CpcomproPeer::TIPPRC;
      }
  
	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = CpcomproPeer::DESCOM;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpcomproPeer::DESANU;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcomproPeer::MONCOM;
      }
  
	} 
	
	public function setSalcau($v)
	{

    if ($this->salcau !== $v) {
        $this->salcau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcomproPeer::SALCAU;
      }
  
	} 
	
	public function setSalpag($v)
	{

    if ($this->salpag !== $v) {
        $this->salpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcomproPeer::SALPAG;
      }
  
	} 
	
	public function setSalaju($v)
	{

    if ($this->salaju !== $v) {
        $this->salaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcomproPeer::SALAJU;
      }
  
	} 
	
	public function setStacom($v)
	{

    if ($this->stacom !== $v) {
        $this->stacom = $v;
        $this->modifiedColumns[] = CpcomproPeer::STACOM;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CpcomproPeer::FECANU;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CpcomproPeer::CEDRIF;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CpcomproPeer::TIPO;
      }
  
	} 
	
	public function setAprcom($v)
	{

    if ($this->aprcom !== $v) {
        $this->aprcom = $v;
        $this->modifiedColumns[] = CpcomproPeer::APRCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpcomproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcom = $rs->getString($startcol + 0);

      $this->tipcom = $rs->getString($startcol + 1);

      $this->feccom = $rs->getDate($startcol + 2, null);

      $this->anocom = $rs->getString($startcol + 3);

      $this->refprc = $rs->getString($startcol + 4);

      $this->tipprc = $rs->getString($startcol + 5);

      $this->descom = $rs->getString($startcol + 6);

      $this->desanu = $rs->getString($startcol + 7);

      $this->moncom = $rs->getFloat($startcol + 8);

      $this->salcau = $rs->getFloat($startcol + 9);

      $this->salpag = $rs->getFloat($startcol + 10);

      $this->salaju = $rs->getFloat($startcol + 11);

      $this->stacom = $rs->getString($startcol + 12);

      $this->fecanu = $rs->getDate($startcol + 13, null);

      $this->cedrif = $rs->getString($startcol + 14);

      $this->tipo = $rs->getString($startcol + 15);

      $this->aprcom = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpcompro object", $e);
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
			$con = Propel::getConnection(CpcomproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpcomproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpcomproPeer::DATABASE_NAME);
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
					$pk = CpcomproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpcomproPeer::doUpdate($this, $con);
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


			if (($retval = CpcomproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpcomproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcom();
				break;
			case 1:
				return $this->getTipcom();
				break;
			case 2:
				return $this->getFeccom();
				break;
			case 3:
				return $this->getAnocom();
				break;
			case 4:
				return $this->getRefprc();
				break;
			case 5:
				return $this->getTipprc();
				break;
			case 6:
				return $this->getDescom();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getMoncom();
				break;
			case 9:
				return $this->getSalcau();
				break;
			case 10:
				return $this->getSalpag();
				break;
			case 11:
				return $this->getSalaju();
				break;
			case 12:
				return $this->getStacom();
				break;
			case 13:
				return $this->getFecanu();
				break;
			case 14:
				return $this->getCedrif();
				break;
			case 15:
				return $this->getTipo();
				break;
			case 16:
				return $this->getAprcom();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpcomproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcom(),
			$keys[1] => $this->getTipcom(),
			$keys[2] => $this->getFeccom(),
			$keys[3] => $this->getAnocom(),
			$keys[4] => $this->getRefprc(),
			$keys[5] => $this->getTipprc(),
			$keys[6] => $this->getDescom(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getMoncom(),
			$keys[9] => $this->getSalcau(),
			$keys[10] => $this->getSalpag(),
			$keys[11] => $this->getSalaju(),
			$keys[12] => $this->getStacom(),
			$keys[13] => $this->getFecanu(),
			$keys[14] => $this->getCedrif(),
			$keys[15] => $this->getTipo(),
			$keys[16] => $this->getAprcom(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpcomproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcom($value);
				break;
			case 1:
				$this->setTipcom($value);
				break;
			case 2:
				$this->setFeccom($value);
				break;
			case 3:
				$this->setAnocom($value);
				break;
			case 4:
				$this->setRefprc($value);
				break;
			case 5:
				$this->setTipprc($value);
				break;
			case 6:
				$this->setDescom($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setMoncom($value);
				break;
			case 9:
				$this->setSalcau($value);
				break;
			case 10:
				$this->setSalpag($value);
				break;
			case 11:
				$this->setSalaju($value);
				break;
			case 12:
				$this->setStacom($value);
				break;
			case 13:
				$this->setFecanu($value);
				break;
			case 14:
				$this->setCedrif($value);
				break;
			case 15:
				$this->setTipo($value);
				break;
			case 16:
				$this->setAprcom($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpcomproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnocom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipprc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalcau($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalpag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSalaju($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStacom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCedrif($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipo($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAprcom($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpcomproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpcomproPeer::REFCOM)) $criteria->add(CpcomproPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpcomproPeer::TIPCOM)) $criteria->add(CpcomproPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CpcomproPeer::FECCOM)) $criteria->add(CpcomproPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(CpcomproPeer::ANOCOM)) $criteria->add(CpcomproPeer::ANOCOM, $this->anocom);
		if ($this->isColumnModified(CpcomproPeer::REFPRC)) $criteria->add(CpcomproPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpcomproPeer::TIPPRC)) $criteria->add(CpcomproPeer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(CpcomproPeer::DESCOM)) $criteria->add(CpcomproPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(CpcomproPeer::DESANU)) $criteria->add(CpcomproPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpcomproPeer::MONCOM)) $criteria->add(CpcomproPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(CpcomproPeer::SALCAU)) $criteria->add(CpcomproPeer::SALCAU, $this->salcau);
		if ($this->isColumnModified(CpcomproPeer::SALPAG)) $criteria->add(CpcomproPeer::SALPAG, $this->salpag);
		if ($this->isColumnModified(CpcomproPeer::SALAJU)) $criteria->add(CpcomproPeer::SALAJU, $this->salaju);
		if ($this->isColumnModified(CpcomproPeer::STACOM)) $criteria->add(CpcomproPeer::STACOM, $this->stacom);
		if ($this->isColumnModified(CpcomproPeer::FECANU)) $criteria->add(CpcomproPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpcomproPeer::CEDRIF)) $criteria->add(CpcomproPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CpcomproPeer::TIPO)) $criteria->add(CpcomproPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CpcomproPeer::APRCOM)) $criteria->add(CpcomproPeer::APRCOM, $this->aprcom);
		if ($this->isColumnModified(CpcomproPeer::ID)) $criteria->add(CpcomproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpcomproPeer::DATABASE_NAME);

		$criteria->add(CpcomproPeer::ID, $this->id);

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

		$copyObj->setRefcom($this->refcom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setAnocom($this->anocom);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setDescom($this->descom);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setSalcau($this->salcau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStacom($this->stacom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setTipo($this->tipo);

		$copyObj->setAprcom($this->aprcom);


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
			self::$peer = new CpcomproPeer();
		}
		return self::$peer;
	}

} 