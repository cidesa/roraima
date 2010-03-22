<?php


abstract class BaseTsdesmon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmon;


	
	protected $nommon;


	
	protected $valmon;


	
	protected $aumdis;


	
	protected $fecmon;


	
	protected $id;

	
	protected $collCasolarts;

	
	protected $lastCasolartCriteria = null;

	
	protected $collCaordcoms;

	
	protected $lastCaordcomCriteria = null;

	
	protected $collCacotizas;

	
	protected $lastCacotizaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getNommon()
  {

    return trim($this->nommon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getAumdis()
  {

    return trim($this->aumdis);

  }
  
  public function getFecmon($format = 'Y-m-d')
  {

    if ($this->fecmon === null || $this->fecmon === '') {
      return null;
    } elseif (!is_int($this->fecmon)) {
            $ts = adodb_strtotime($this->fecmon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmon] as date/time value: " . var_export($this->fecmon, true));
      }
    } else {
      $ts = $this->fecmon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = TsdesmonPeer::CODMON;
      }
  
	} 
	
	public function setNommon($v)
	{

    if ($this->nommon !== $v) {
        $this->nommon = $v;
        $this->modifiedColumns[] = TsdesmonPeer::NOMMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdesmonPeer::VALMON;
      }
  
	} 
	
	public function setAumdis($v)
	{

    if ($this->aumdis !== $v) {
        $this->aumdis = $v;
        $this->modifiedColumns[] = TsdesmonPeer::AUMDIS;
      }
  
	} 
	
	public function setFecmon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmon !== $ts) {
      $this->fecmon = $ts;
      $this->modifiedColumns[] = TsdesmonPeer::FECMON;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdesmonPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmon = $rs->getString($startcol + 0);

      $this->nommon = $rs->getString($startcol + 1);

      $this->valmon = $rs->getFloat($startcol + 2);

      $this->aumdis = $rs->getString($startcol + 3);

      $this->fecmon = $rs->getDate($startcol + 4, null);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdesmon object", $e);
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
			$con = Propel::getConnection(TsdesmonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdesmonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdesmonPeer::DATABASE_NAME);
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
					$pk = TsdesmonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdesmonPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCasolarts !== null) {
				foreach($this->collCasolarts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCaordcoms !== null) {
				foreach($this->collCaordcoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCacotizas !== null) {
				foreach($this->collCacotizas as $referrerFK) {
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


			if (($retval = TsdesmonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCasolarts !== null) {
					foreach($this->collCasolarts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCaordcoms !== null) {
					foreach($this->collCaordcoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCacotizas !== null) {
					foreach($this->collCacotizas as $referrerFK) {
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
		$pos = TsdesmonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmon();
				break;
			case 1:
				return $this->getNommon();
				break;
			case 2:
				return $this->getValmon();
				break;
			case 3:
				return $this->getAumdis();
				break;
			case 4:
				return $this->getFecmon();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdesmonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmon(),
			$keys[1] => $this->getNommon(),
			$keys[2] => $this->getValmon(),
			$keys[3] => $this->getAumdis(),
			$keys[4] => $this->getFecmon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdesmonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmon($value);
				break;
			case 1:
				$this->setNommon($value);
				break;
			case 2:
				$this->setValmon($value);
				break;
			case 3:
				$this->setAumdis($value);
				break;
			case 4:
				$this->setFecmon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdesmonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValmon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAumdis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecmon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdesmonPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdesmonPeer::CODMON)) $criteria->add(TsdesmonPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(TsdesmonPeer::NOMMON)) $criteria->add(TsdesmonPeer::NOMMON, $this->nommon);
		if ($this->isColumnModified(TsdesmonPeer::VALMON)) $criteria->add(TsdesmonPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(TsdesmonPeer::AUMDIS)) $criteria->add(TsdesmonPeer::AUMDIS, $this->aumdis);
		if ($this->isColumnModified(TsdesmonPeer::FECMON)) $criteria->add(TsdesmonPeer::FECMON, $this->fecmon);
		if ($this->isColumnModified(TsdesmonPeer::ID)) $criteria->add(TsdesmonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdesmonPeer::DATABASE_NAME);

		$criteria->add(TsdesmonPeer::ID, $this->id);

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

		$copyObj->setCodmon($this->codmon);

		$copyObj->setNommon($this->nommon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setAumdis($this->aumdis);

		$copyObj->setFecmon($this->fecmon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCasolarts() as $relObj) {
				$copyObj->addCasolart($relObj->copy($deepCopy));
			}

			foreach($this->getCaordcoms() as $relObj) {
				$copyObj->addCaordcom($relObj->copy($deepCopy));
			}

			foreach($this->getCacotizas() as $relObj) {
				$copyObj->addCacotiza($relObj->copy($deepCopy));
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
			self::$peer = new TsdesmonPeer();
		}
		return self::$peer;
	}

	
	public function initCasolarts()
	{
		if ($this->collCasolarts === null) {
			$this->collCasolarts = array();
		}
	}

	
	public function getCasolarts($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCasolartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCasolarts === null) {
			if ($this->isNew()) {
			   $this->collCasolarts = array();
			} else {

				$criteria->add(CasolartPeer::TIPMON, $this->getCodmon());

				CasolartPeer::addSelectColumns($criteria);
				$this->collCasolarts = CasolartPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CasolartPeer::TIPMON, $this->getCodmon());

				CasolartPeer::addSelectColumns($criteria);
				if (!isset($this->lastCasolartCriteria) || !$this->lastCasolartCriteria->equals($criteria)) {
					$this->collCasolarts = CasolartPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCasolartCriteria = $criteria;
		return $this->collCasolarts;
	}

	
	public function countCasolarts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCasolartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CasolartPeer::TIPMON, $this->getCodmon());

		return CasolartPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCasolart(Casolart $l)
	{
		$this->collCasolarts[] = $l;
		$l->setTsdesmon($this);
	}

	
	public function initCaordcoms()
	{
		if ($this->collCaordcoms === null) {
			$this->collCaordcoms = array();
		}
	}

	
	public function getCaordcoms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
			   $this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				CaordcomPeer::addSelectColumns($criteria);
				$this->collCaordcoms = CaordcomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				CaordcomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
					$this->collCaordcoms = CaordcomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaordcomCriteria = $criteria;
		return $this->collCaordcoms;
	}

	
	public function countCaordcoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

		return CaordcomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaordcom(Caordcom $l)
	{
		$this->collCaordcoms[] = $l;
		$l->setTsdesmon($this);
	}


	
	public function getCaordcomsJoinCaprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaprovee($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}


	
	public function getCaordcomsJoinCaconpag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaconpag($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaconpag($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}


	
	public function getCaordcomsJoinCaforent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaforent($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaforent($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}

	
	public function initCacotizas()
	{
		if ($this->collCacotizas === null) {
			$this->collCacotizas = array();
		}
	}

	
	public function getCacotizas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCacotizas === null) {
			if ($this->isNew()) {
			   $this->collCacotizas = array();
			} else {

				$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

				CacotizaPeer::addSelectColumns($criteria);
				$this->collCacotizas = CacotizaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

				CacotizaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCacotizaCriteria) || !$this->lastCacotizaCriteria->equals($criteria)) {
					$this->collCacotizas = CacotizaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCacotizaCriteria = $criteria;
		return $this->collCacotizas;
	}

	
	public function countCacotizas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

		return CacotizaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCacotiza(Cacotiza $l)
	{
		$this->collCacotizas[] = $l;
		$l->setTsdesmon($this);
	}


	
	public function getCacotizasJoinCaprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCacotizas === null) {
			if ($this->isNew()) {
				$this->collCacotizas = array();
			} else {

				$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

				$this->collCacotizas = CacotizaPeer::doSelectJoinCaprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCacotizaCriteria) || !$this->lastCacotizaCriteria->equals($criteria)) {
				$this->collCacotizas = CacotizaPeer::doSelectJoinCaprovee($criteria, $con);
			}
		}
		$this->lastCacotizaCriteria = $criteria;

		return $this->collCacotizas;
	}

} 