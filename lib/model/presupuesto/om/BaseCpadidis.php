<?php


abstract class BaseCpadidis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refadi;


	
	protected $fecadi;


	
	protected $anoadi;


	
	protected $desadi;


	
	protected $desanu;


	
	protected $adidis;


	
	protected $totadi;


	
	protected $staadi;


	
	protected $numcom;


	
	protected $fecanu;


	
	protected $peradi;


	
	protected $tipgas;


	
	protected $loguse;


	
	protected $id;

	
	protected $collCpmovadis;

	
	protected $lastCpmovadiCriteria = null;

	
	protected $collCpsoladidiss;

	
	protected $lastCpsoladidisCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefadi()
  {

    return trim($this->refadi);

  }
  
  public function getFecadi($format = 'Y-m-d')
  {

    if ($this->fecadi === null || $this->fecadi === '') {
      return null;
    } elseif (!is_int($this->fecadi)) {
            $ts = adodb_strtotime($this->fecadi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadi] as date/time value: " . var_export($this->fecadi, true));
      }
    } else {
      $ts = $this->fecadi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnoadi()
  {

    return trim($this->anoadi);

  }
  
  public function getDesadi()
  {

    return trim($this->desadi);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getAdidis()
  {

    return trim($this->adidis);

  }
  
  public function getTotadi($val=false)
  {

    if($val) return number_format($this->totadi,2,',','.');
    else return $this->totadi;

  }
  
  public function getStaadi()
  {

    return trim($this->staadi);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

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

  
  public function getPeradi()
  {

    return trim($this->peradi);

  }
  
  public function getTipgas()
  {

    return trim($this->tipgas);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::REFADI;
      }
  
	} 
	
	public function setFecadi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadi !== $ts) {
      $this->fecadi = $ts;
      $this->modifiedColumns[] = CpadidisPeer::FECADI;
    }

	} 
	
	public function setAnoadi($v)
	{

    if ($this->anoadi !== $v) {
        $this->anoadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::ANOADI;
      }
  
	} 
	
	public function setDesadi($v)
	{

    if ($this->desadi !== $v) {
        $this->desadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::DESADI;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpadidisPeer::DESANU;
      }
  
	} 
	
	public function setAdidis($v)
	{

    if ($this->adidis !== $v) {
        $this->adidis = $v;
        $this->modifiedColumns[] = CpadidisPeer::ADIDIS;
      }
  
	} 
	
	public function setTotadi($v)
	{

    if ($this->totadi !== $v) {
        $this->totadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpadidisPeer::TOTADI;
      }
  
	} 
	
	public function setStaadi($v)
	{

    if ($this->staadi !== $v) {
        $this->staadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::STAADI;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CpadidisPeer::NUMCOM;
      }
  
	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CpadidisPeer::FECANU;
    }

	} 
	
	public function setPeradi($v)
	{

    if ($this->peradi !== $v) {
        $this->peradi = $v;
        $this->modifiedColumns[] = CpadidisPeer::PERADI;
      }
  
	} 
	
	public function setTipgas($v)
	{

    if ($this->tipgas !== $v) {
        $this->tipgas = $v;
        $this->modifiedColumns[] = CpadidisPeer::TIPGAS;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = CpadidisPeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpadidisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refadi = $rs->getString($startcol + 0);

      $this->fecadi = $rs->getDate($startcol + 1, null);

      $this->anoadi = $rs->getString($startcol + 2);

      $this->desadi = $rs->getString($startcol + 3);

      $this->desanu = $rs->getString($startcol + 4);

      $this->adidis = $rs->getString($startcol + 5);

      $this->totadi = $rs->getFloat($startcol + 6);

      $this->staadi = $rs->getString($startcol + 7);

      $this->numcom = $rs->getString($startcol + 8);

      $this->fecanu = $rs->getDate($startcol + 9, null);

      $this->peradi = $rs->getString($startcol + 10);

      $this->tipgas = $rs->getString($startcol + 11);

      $this->loguse = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpadidis object", $e);
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
			$con = Propel::getConnection(CpadidisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpadidisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpadidisPeer::DATABASE_NAME);
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
					$pk = CpadidisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpadidisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpmovadis !== null) {
				foreach($this->collCpmovadis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpsoladidiss !== null) {
				foreach($this->collCpsoladidiss as $referrerFK) {
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


			if (($retval = CpadidisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpmovadis !== null) {
					foreach($this->collCpmovadis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpsoladidiss !== null) {
					foreach($this->collCpsoladidiss as $referrerFK) {
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
		$pos = CpadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getFecadi();
				break;
			case 2:
				return $this->getAnoadi();
				break;
			case 3:
				return $this->getDesadi();
				break;
			case 4:
				return $this->getDesanu();
				break;
			case 5:
				return $this->getAdidis();
				break;
			case 6:
				return $this->getTotadi();
				break;
			case 7:
				return $this->getStaadi();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getPeradi();
				break;
			case 11:
				return $this->getTipgas();
				break;
			case 12:
				return $this->getLoguse();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpadidisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getFecadi(),
			$keys[2] => $this->getAnoadi(),
			$keys[3] => $this->getDesadi(),
			$keys[4] => $this->getDesanu(),
			$keys[5] => $this->getAdidis(),
			$keys[6] => $this->getTotadi(),
			$keys[7] => $this->getStaadi(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getPeradi(),
			$keys[11] => $this->getTipgas(),
			$keys[12] => $this->getLoguse(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setFecadi($value);
				break;
			case 2:
				$this->setAnoadi($value);
				break;
			case 3:
				$this->setDesadi($value);
				break;
			case 4:
				$this->setDesanu($value);
				break;
			case 5:
				$this->setAdidis($value);
				break;
			case 6:
				$this->setTotadi($value);
				break;
			case 7:
				$this->setStaadi($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setPeradi($value);
				break;
			case 11:
				$this->setTipgas($value);
				break;
			case 12:
				$this->setLoguse($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpadidisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecadi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnoadi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesanu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdidis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotadi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaadi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPeradi($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipgas($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLoguse($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpadidisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpadidisPeer::REFADI)) $criteria->add(CpadidisPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpadidisPeer::FECADI)) $criteria->add(CpadidisPeer::FECADI, $this->fecadi);
		if ($this->isColumnModified(CpadidisPeer::ANOADI)) $criteria->add(CpadidisPeer::ANOADI, $this->anoadi);
		if ($this->isColumnModified(CpadidisPeer::DESADI)) $criteria->add(CpadidisPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(CpadidisPeer::DESANU)) $criteria->add(CpadidisPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpadidisPeer::ADIDIS)) $criteria->add(CpadidisPeer::ADIDIS, $this->adidis);
		if ($this->isColumnModified(CpadidisPeer::TOTADI)) $criteria->add(CpadidisPeer::TOTADI, $this->totadi);
		if ($this->isColumnModified(CpadidisPeer::STAADI)) $criteria->add(CpadidisPeer::STAADI, $this->staadi);
		if ($this->isColumnModified(CpadidisPeer::NUMCOM)) $criteria->add(CpadidisPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CpadidisPeer::FECANU)) $criteria->add(CpadidisPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpadidisPeer::PERADI)) $criteria->add(CpadidisPeer::PERADI, $this->peradi);
		if ($this->isColumnModified(CpadidisPeer::TIPGAS)) $criteria->add(CpadidisPeer::TIPGAS, $this->tipgas);
		if ($this->isColumnModified(CpadidisPeer::LOGUSE)) $criteria->add(CpadidisPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(CpadidisPeer::ID)) $criteria->add(CpadidisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpadidisPeer::DATABASE_NAME);

		$criteria->add(CpadidisPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setFecadi($this->fecadi);

		$copyObj->setAnoadi($this->anoadi);

		$copyObj->setDesadi($this->desadi);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setAdidis($this->adidis);

		$copyObj->setTotadi($this->totadi);

		$copyObj->setStaadi($this->staadi);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setPeradi($this->peradi);

		$copyObj->setTipgas($this->tipgas);

		$copyObj->setLoguse($this->loguse);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpmovadis() as $relObj) {
				$copyObj->addCpmovadi($relObj->copy($deepCopy));
			}

			foreach($this->getCpsoladidiss() as $relObj) {
				$copyObj->addCpsoladidis($relObj->copy($deepCopy));
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
			self::$peer = new CpadidisPeer();
		}
		return self::$peer;
	}

	
	public function initCpmovadis()
	{
		if ($this->collCpmovadis === null) {
			$this->collCpmovadis = array();
		}
	}

	
	public function getCpmovadis($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadis === null) {
			if ($this->isNew()) {
			   $this->collCpmovadis = array();
			} else {

				$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

				CpmovadiPeer::addSelectColumns($criteria);
				$this->collCpmovadis = CpmovadiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

				CpmovadiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovadiCriteria) || !$this->lastCpmovadiCriteria->equals($criteria)) {
					$this->collCpmovadis = CpmovadiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovadiCriteria = $criteria;
		return $this->collCpmovadis;
	}

	
	public function countCpmovadis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

		return CpmovadiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovadi(Cpmovadi $l)
	{
		$this->collCpmovadis[] = $l;
		$l->setCpadidis($this);
	}


	
	public function getCpmovadisJoinCpdeftit($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadis === null) {
			if ($this->isNew()) {
				$this->collCpmovadis = array();
			} else {

				$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

				$this->collCpmovadis = CpmovadiPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

			if (!isset($this->lastCpmovadiCriteria) || !$this->lastCpmovadiCriteria->equals($criteria)) {
				$this->collCpmovadis = CpmovadiPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		}
		$this->lastCpmovadiCriteria = $criteria;

		return $this->collCpmovadis;
	}

	
	public function initCpsoladidiss()
	{
		if ($this->collCpsoladidiss === null) {
			$this->collCpsoladidiss = array();
		}
	}

	
	public function getCpsoladidiss($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoladidisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsoladidiss === null) {
			if ($this->isNew()) {
			   $this->collCpsoladidiss = array();
			} else {

				$criteria->add(CpsoladidisPeer::REFADI, $this->getRefadi());

				CpsoladidisPeer::addSelectColumns($criteria);
				$this->collCpsoladidiss = CpsoladidisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsoladidisPeer::REFADI, $this->getRefadi());

				CpsoladidisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsoladidisCriteria) || !$this->lastCpsoladidisCriteria->equals($criteria)) {
					$this->collCpsoladidiss = CpsoladidisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsoladidisCriteria = $criteria;
		return $this->collCpsoladidiss;
	}

	
	public function countCpsoladidiss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoladidisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsoladidisPeer::REFADI, $this->getRefadi());

		return CpsoladidisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsoladidis(Cpsoladidis $l)
	{
		$this->collCpsoladidiss[] = $l;
		$l->setCpadidis($this);
	}


	
	public function getCpsoladidissJoinCpartley($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoladidisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsoladidiss === null) {
			if ($this->isNew()) {
				$this->collCpsoladidiss = array();
			} else {

				$criteria->add(CpsoladidisPeer::REFADI, $this->getRefadi());

				$this->collCpsoladidiss = CpsoladidisPeer::doSelectJoinCpartley($criteria, $con);
			}
		} else {
									
			$criteria->add(CpsoladidisPeer::REFADI, $this->getRefadi());

			if (!isset($this->lastCpsoladidisCriteria) || !$this->lastCpsoladidisCriteria->equals($criteria)) {
				$this->collCpsoladidiss = CpsoladidisPeer::doSelectJoinCpartley($criteria, $con);
			}
		}
		$this->lastCpsoladidisCriteria = $criteria;

		return $this->collCpsoladidiss;
	}

} 
