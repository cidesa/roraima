<?php


abstract class BaseFapresup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $despre;


	
	protected $fecpre;


	
	protected $codcli;


	
	protected $monpre;


	
	protected $mondesc;


	
	protected $monrgo;


	
	protected $faconpag_id;


	
	protected $fafordes_id;


	
	protected $faforsol_id;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $autpor;


	
	protected $observ;


	
	protected $codubi;


	
	protected $id;

	
	protected $aFaconpag;

	
	protected $aFafordes;

	
	protected $aFaforsol;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpre()
  {

    return trim($this->refpre);

  }
  
  public function getDespre()
  {

    return trim($this->despre);

  }
  
  public function getFecpre($format = 'Y-m-d')
  {

    if ($this->fecpre === null || $this->fecpre === '') {
      return null;
    } elseif (!is_int($this->fecpre)) {
            $ts = adodb_strtotime($this->fecpre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
      }
    } else {
      $ts = $this->fecpre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getFaconpagId()
  {

    return $this->faconpag_id;

  }
  
  public function getFafordesId()
  {

    return $this->fafordes_id;

  }
  
  public function getFaforsolId()
  {

    return $this->faforsol_id;

  }
  
  public function getTipmon()
  {

    return trim($this->tipmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getAutpor()
  {

    return trim($this->autpor);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FapresupPeer::REFPRE;
      }
  
	} 
	
	public function setDespre($v)
	{

    if ($this->despre !== $v) {
        $this->despre = $v;
        $this->modifiedColumns[] = FapresupPeer::DESPRE;
      }
  
	} 
	
	public function setFecpre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpre !== $ts) {
      $this->fecpre = $ts;
      $this->modifiedColumns[] = FapresupPeer::FECPRE;
    }

	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FapresupPeer::CODCLI;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONPRE;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONDESC;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONRGO;
      }
  
	} 
	
	public function setFaconpagId($v)
	{

    if ($this->faconpag_id !== $v) {
        $this->faconpag_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FACONPAG_ID;
      }
  
		if ($this->aFaconpag !== null && $this->aFaconpag->getId() !== $v) {
			$this->aFaconpag = null;
		}

	} 
	
	public function setFafordesId($v)
	{

    if ($this->fafordes_id !== $v) {
        $this->fafordes_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FAFORDES_ID;
      }
  
		if ($this->aFafordes !== null && $this->aFafordes->getId() !== $v) {
			$this->aFafordes = null;
		}

	} 
	
	public function setFaforsolId($v)
	{

    if ($this->faforsol_id !== $v) {
        $this->faforsol_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FAFORSOL_ID;
      }
  
		if ($this->aFaforsol !== null && $this->aFaforsol->getId() !== $v) {
			$this->aFaforsol = null;
		}

	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = FapresupPeer::TIPMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::VALMON;
      }
  
	} 
	
	public function setAutpor($v)
	{

    if ($this->autpor !== $v) {
        $this->autpor = $v;
        $this->modifiedColumns[] = FapresupPeer::AUTPOR;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FapresupPeer::OBSERV;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = FapresupPeer::CODUBI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapresupPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->despre = $rs->getString($startcol + 1);

      $this->fecpre = $rs->getDate($startcol + 2, null);

      $this->codcli = $rs->getString($startcol + 3);

      $this->monpre = $rs->getFloat($startcol + 4);

      $this->mondesc = $rs->getFloat($startcol + 5);

      $this->monrgo = $rs->getFloat($startcol + 6);

      $this->faconpag_id = $rs->getInt($startcol + 7);

      $this->fafordes_id = $rs->getInt($startcol + 8);

      $this->faforsol_id = $rs->getInt($startcol + 9);

      $this->tipmon = $rs->getString($startcol + 10);

      $this->valmon = $rs->getFloat($startcol + 11);

      $this->autpor = $rs->getString($startcol + 12);

      $this->observ = $rs->getString($startcol + 13);

      $this->codubi = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapresup object", $e);
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
			$con = Propel::getConnection(FapresupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapresupPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapresupPeer::DATABASE_NAME);
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


												
			if ($this->aFaconpag !== null) {
				if ($this->aFaconpag->isModified()) {
					$affectedRows += $this->aFaconpag->save($con);
				}
				$this->setFaconpag($this->aFaconpag);
			}

			if ($this->aFafordes !== null) {
				if ($this->aFafordes->isModified()) {
					$affectedRows += $this->aFafordes->save($con);
				}
				$this->setFafordes($this->aFafordes);
			}

			if ($this->aFaforsol !== null) {
				if ($this->aFaforsol->isModified()) {
					$affectedRows += $this->aFaforsol->save($con);
				}
				$this->setFaforsol($this->aFaforsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FapresupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapresupPeer::doUpdate($this, $con);
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


												
			if ($this->aFaconpag !== null) {
				if (!$this->aFaconpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaconpag->getValidationFailures());
				}
			}

			if ($this->aFafordes !== null) {
				if (!$this->aFafordes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFafordes->getValidationFailures());
				}
			}

			if ($this->aFaforsol !== null) {
				if (!$this->aFaforsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaforsol->getValidationFailures());
				}
			}


			if (($retval = FapresupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapresupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpre();
				break;
			case 1:
				return $this->getDespre();
				break;
			case 2:
				return $this->getFecpre();
				break;
			case 3:
				return $this->getCodcli();
				break;
			case 4:
				return $this->getMonpre();
				break;
			case 5:
				return $this->getMondesc();
				break;
			case 6:
				return $this->getMonrgo();
				break;
			case 7:
				return $this->getFaconpagId();
				break;
			case 8:
				return $this->getFafordesId();
				break;
			case 9:
				return $this->getFaforsolId();
				break;
			case 10:
				return $this->getTipmon();
				break;
			case 11:
				return $this->getValmon();
				break;
			case 12:
				return $this->getAutpor();
				break;
			case 13:
				return $this->getObserv();
				break;
			case 14:
				return $this->getCodubi();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapresupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getDespre(),
			$keys[2] => $this->getFecpre(),
			$keys[3] => $this->getCodcli(),
			$keys[4] => $this->getMonpre(),
			$keys[5] => $this->getMondesc(),
			$keys[6] => $this->getMonrgo(),
			$keys[7] => $this->getFaconpagId(),
			$keys[8] => $this->getFafordesId(),
			$keys[9] => $this->getFaforsolId(),
			$keys[10] => $this->getTipmon(),
			$keys[11] => $this->getValmon(),
			$keys[12] => $this->getAutpor(),
			$keys[13] => $this->getObserv(),
			$keys[14] => $this->getCodubi(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapresupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpre($value);
				break;
			case 1:
				$this->setDespre($value);
				break;
			case 2:
				$this->setFecpre($value);
				break;
			case 3:
				$this->setCodcli($value);
				break;
			case 4:
				$this->setMonpre($value);
				break;
			case 5:
				$this->setMondesc($value);
				break;
			case 6:
				$this->setMonrgo($value);
				break;
			case 7:
				$this->setFaconpagId($value);
				break;
			case 8:
				$this->setFafordesId($value);
				break;
			case 9:
				$this->setFaforsolId($value);
				break;
			case 10:
				$this->setTipmon($value);
				break;
			case 11:
				$this->setValmon($value);
				break;
			case 12:
				$this->setAutpor($value);
				break;
			case 13:
				$this->setObserv($value);
				break;
			case 14:
				$this->setCodubi($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapresupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcli($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondesc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrgo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFaconpagId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFafordesId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFaforsolId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipmon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setValmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAutpor($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObserv($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodubi($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapresupPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapresupPeer::REFPRE)) $criteria->add(FapresupPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FapresupPeer::DESPRE)) $criteria->add(FapresupPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(FapresupPeer::FECPRE)) $criteria->add(FapresupPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(FapresupPeer::CODCLI)) $criteria->add(FapresupPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FapresupPeer::MONPRE)) $criteria->add(FapresupPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(FapresupPeer::MONDESC)) $criteria->add(FapresupPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FapresupPeer::MONRGO)) $criteria->add(FapresupPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FapresupPeer::FACONPAG_ID)) $criteria->add(FapresupPeer::FACONPAG_ID, $this->faconpag_id);
		if ($this->isColumnModified(FapresupPeer::FAFORDES_ID)) $criteria->add(FapresupPeer::FAFORDES_ID, $this->fafordes_id);
		if ($this->isColumnModified(FapresupPeer::FAFORSOL_ID)) $criteria->add(FapresupPeer::FAFORSOL_ID, $this->faforsol_id);
		if ($this->isColumnModified(FapresupPeer::TIPMON)) $criteria->add(FapresupPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(FapresupPeer::VALMON)) $criteria->add(FapresupPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(FapresupPeer::AUTPOR)) $criteria->add(FapresupPeer::AUTPOR, $this->autpor);
		if ($this->isColumnModified(FapresupPeer::OBSERV)) $criteria->add(FapresupPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FapresupPeer::CODUBI)) $criteria->add(FapresupPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(FapresupPeer::ID)) $criteria->add(FapresupPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapresupPeer::DATABASE_NAME);

		$criteria->add(FapresupPeer::ID, $this->id);

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

		$copyObj->setRefpre($this->refpre);

		$copyObj->setDespre($this->despre);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setFaconpagId($this->faconpag_id);

		$copyObj->setFafordesId($this->fafordes_id);

		$copyObj->setFaforsolId($this->faforsol_id);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setAutpor($this->autpor);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodubi($this->codubi);


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
			self::$peer = new FapresupPeer();
		}
		return self::$peer;
	}

	
	public function setFaconpag($v)
	{


		if ($v === null) {
			$this->setFaconpagId(NULL);
		} else {
			$this->setFaconpagId($v->getId());
		}


		$this->aFaconpag = $v;
	}


	
	public function getFaconpag($con = null)
	{
		if ($this->aFaconpag === null && ($this->faconpag_id !== null)) {
						include_once 'lib/model/om/BaseFaconpagPeer.php';

			$this->aFaconpag = FaconpagPeer::retrieveByPK($this->faconpag_id, $con);

			
		}
		return $this->aFaconpag;
	}

	
	public function setFafordes($v)
	{


		if ($v === null) {
			$this->setFafordesId(NULL);
		} else {
			$this->setFafordesId($v->getId());
		}


		$this->aFafordes = $v;
	}


	
	public function getFafordes($con = null)
	{
		if ($this->aFafordes === null && ($this->fafordes_id !== null)) {
						include_once 'lib/model/om/BaseFafordesPeer.php';

			$this->aFafordes = FafordesPeer::retrieveByPK($this->fafordes_id, $con);

			
		}
		return $this->aFafordes;
	}

	
	public function setFaforsol($v)
	{


		if ($v === null) {
			$this->setFaforsolId(NULL);
		} else {
			$this->setFaforsolId($v->getId());
		}


		$this->aFaforsol = $v;
	}


	
	public function getFaforsol($con = null)
	{
		if ($this->aFaforsol === null && ($this->faforsol_id !== null)) {
						include_once 'lib/model/om/BaseFaforsolPeer.php';

			$this->aFaforsol = FaforsolPeer::retrieveByPK($this->faforsol_id, $con);

			
		}
		return $this->aFaforsol;
	}

} 