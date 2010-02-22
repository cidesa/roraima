<?php


abstract class BaseOptipret extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $destip;


	
	protected $codcon;


	
	protected $basimp;


	
	protected $porret;


	
	protected $unitri;


	
	protected $porsus;


	
	protected $factor;


	
	protected $codtipsen;


	
	protected $id;

	
	protected $collOpretcons;

	
	protected $lastOpretconCriteria = null;

	
	protected $collOpretords;

	
	protected $lastOpretordCriteria = null;

	
	protected $collTsreprets;

	
	protected $lastTsrepretCriteria = null;

	
	protected $collTsretivas;

	
	protected $lastTsretivaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getBasimp($val=false)
  {

    if($val) return number_format($this->basimp,2,',','.');
    else return $this->basimp;

  }
  
  public function getPorret($val=false)
  {

    if($val) return number_format($this->porret,2,',','.');
    else return $this->porret;

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getPorsus($val=false)
  {

    if($val) return number_format($this->porsus,2,',','.');
    else return $this->porsus;

  }
  
  public function getFactor($val=false)
  {

    if($val) return number_format($this->factor,2,',','.');
    else return $this->factor;

  }
  
  public function getCodtipsen()
  {

    return trim($this->codtipsen);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = OptipretPeer::CODTIP;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = OptipretPeer::DESTIP;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = OptipretPeer::CODCON;
      }
  
	} 
	
	public function setBasimp($v)
	{

    if ($this->basimp !== $v) {
        $this->basimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::BASIMP;
      }
  
	} 
	
	public function setPorret($v)
	{

    if ($this->porret !== $v) {
        $this->porret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::PORRET;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::UNITRI;
      }
  
	} 
	
	public function setPorsus($v)
	{

    if ($this->porsus !== $v) {
        $this->porsus = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::PORSUS;
      }
  
	} 
	
	public function setFactor($v)
	{

    if ($this->factor !== $v) {
        $this->factor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OptipretPeer::FACTOR;
      }
  
	} 
	
	public function setCodtipsen($v)
	{

    if ($this->codtipsen !== $v) {
        $this->codtipsen = $v;
        $this->modifiedColumns[] = OptipretPeer::CODTIPSEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OptipretPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtip = $rs->getString($startcol + 0);

      $this->destip = $rs->getString($startcol + 1);

      $this->codcon = $rs->getString($startcol + 2);

      $this->basimp = $rs->getFloat($startcol + 3);

      $this->porret = $rs->getFloat($startcol + 4);

      $this->unitri = $rs->getFloat($startcol + 5);

      $this->porsus = $rs->getFloat($startcol + 6);

      $this->factor = $rs->getFloat($startcol + 7);

      $this->codtipsen = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Optipret object", $e);
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
			$con = Propel::getConnection(OptipretPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OptipretPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OptipretPeer::DATABASE_NAME);
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
					$pk = OptipretPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OptipretPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOpretcons !== null) {
				foreach($this->collOpretcons as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOpretords !== null) {
				foreach($this->collOpretords as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTsreprets !== null) {
				foreach($this->collTsreprets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTsretivas !== null) {
				foreach($this->collTsretivas as $referrerFK) {
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


			if (($retval = OptipretPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOpretcons !== null) {
					foreach($this->collOpretcons as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOpretords !== null) {
					foreach($this->collOpretords as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTsreprets !== null) {
					foreach($this->collTsreprets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTsretivas !== null) {
					foreach($this->collTsretivas as $referrerFK) {
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
		$pos = OptipretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtip();
				break;
			case 1:
				return $this->getDestip();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getBasimp();
				break;
			case 4:
				return $this->getPorret();
				break;
			case 5:
				return $this->getUnitri();
				break;
			case 6:
				return $this->getPorsus();
				break;
			case 7:
				return $this->getFactor();
				break;
			case 8:
				return $this->getCodtipsen();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OptipretPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getDestip(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getBasimp(),
			$keys[4] => $this->getPorret(),
			$keys[5] => $this->getUnitri(),
			$keys[6] => $this->getPorsus(),
			$keys[7] => $this->getFactor(),
			$keys[8] => $this->getCodtipsen(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OptipretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtip($value);
				break;
			case 1:
				$this->setDestip($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setBasimp($value);
				break;
			case 4:
				$this->setPorret($value);
				break;
			case 5:
				$this->setUnitri($value);
				break;
			case 6:
				$this->setPorsus($value);
				break;
			case 7:
				$this->setFactor($value);
				break;
			case 8:
				$this->setCodtipsen($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OptipretPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBasimp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnitri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorsus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFactor($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtipsen($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OptipretPeer::DATABASE_NAME);

		if ($this->isColumnModified(OptipretPeer::CODTIP)) $criteria->add(OptipretPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(OptipretPeer::DESTIP)) $criteria->add(OptipretPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(OptipretPeer::CODCON)) $criteria->add(OptipretPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OptipretPeer::BASIMP)) $criteria->add(OptipretPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(OptipretPeer::PORRET)) $criteria->add(OptipretPeer::PORRET, $this->porret);
		if ($this->isColumnModified(OptipretPeer::UNITRI)) $criteria->add(OptipretPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(OptipretPeer::PORSUS)) $criteria->add(OptipretPeer::PORSUS, $this->porsus);
		if ($this->isColumnModified(OptipretPeer::FACTOR)) $criteria->add(OptipretPeer::FACTOR, $this->factor);
		if ($this->isColumnModified(OptipretPeer::CODTIPSEN)) $criteria->add(OptipretPeer::CODTIPSEN, $this->codtipsen);
		if ($this->isColumnModified(OptipretPeer::ID)) $criteria->add(OptipretPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OptipretPeer::DATABASE_NAME);

		$criteria->add(OptipretPeer::ID, $this->id);

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

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDestip($this->destip);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setPorret($this->porret);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setPorsus($this->porsus);

		$copyObj->setFactor($this->factor);

		$copyObj->setCodtipsen($this->codtipsen);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOpretcons() as $relObj) {
				$copyObj->addOpretcon($relObj->copy($deepCopy));
			}

			foreach($this->getOpretords() as $relObj) {
				$copyObj->addOpretord($relObj->copy($deepCopy));
			}

			foreach($this->getTsreprets() as $relObj) {
				$copyObj->addTsrepret($relObj->copy($deepCopy));
			}

			foreach($this->getTsretivas() as $relObj) {
				$copyObj->addTsretiva($relObj->copy($deepCopy));
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
			self::$peer = new OptipretPeer();
		}
		return self::$peer;
	}

	
	public function initOpretcons()
	{
		if ($this->collOpretcons === null) {
			$this->collOpretcons = array();
		}
	}

	
	public function getOpretcons($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpretconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpretcons === null) {
			if ($this->isNew()) {
			   $this->collOpretcons = array();
			} else {

				$criteria->add(OpretconPeer::CODTIP, $this->getCodtip());

				OpretconPeer::addSelectColumns($criteria);
				$this->collOpretcons = OpretconPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OpretconPeer::CODTIP, $this->getCodtip());

				OpretconPeer::addSelectColumns($criteria);
				if (!isset($this->lastOpretconCriteria) || !$this->lastOpretconCriteria->equals($criteria)) {
					$this->collOpretcons = OpretconPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOpretconCriteria = $criteria;
		return $this->collOpretcons;
	}

	
	public function countOpretcons($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOpretconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OpretconPeer::CODTIP, $this->getCodtip());

		return OpretconPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOpretcon(Opretcon $l)
	{
		$this->collOpretcons[] = $l;
		$l->setOptipret($this);
	}

	
	public function initOpretords()
	{
		if ($this->collOpretords === null) {
			$this->collOpretords = array();
		}
	}

	
	public function getOpretords($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpretordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpretords === null) {
			if ($this->isNew()) {
			   $this->collOpretords = array();
			} else {

				$criteria->add(OpretordPeer::CODTIP, $this->getCodtip());

				OpretordPeer::addSelectColumns($criteria);
				$this->collOpretords = OpretordPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OpretordPeer::CODTIP, $this->getCodtip());

				OpretordPeer::addSelectColumns($criteria);
				if (!isset($this->lastOpretordCriteria) || !$this->lastOpretordCriteria->equals($criteria)) {
					$this->collOpretords = OpretordPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOpretordCriteria = $criteria;
		return $this->collOpretords;
	}

	
	public function countOpretords($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOpretordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OpretordPeer::CODTIP, $this->getCodtip());

		return OpretordPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOpretord(Opretord $l)
	{
		$this->collOpretords[] = $l;
		$l->setOptipret($this);
	}

	
	public function initTsreprets()
	{
		if ($this->collTsreprets === null) {
			$this->collTsreprets = array();
		}
	}

	
	public function getTsreprets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsrepretPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsreprets === null) {
			if ($this->isNew()) {
			   $this->collTsreprets = array();
			} else {

				$criteria->add(TsrepretPeer::CODRET, $this->getCodtip());

				TsrepretPeer::addSelectColumns($criteria);
				$this->collTsreprets = TsrepretPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsrepretPeer::CODRET, $this->getCodtip());

				TsrepretPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsrepretCriteria) || !$this->lastTsrepretCriteria->equals($criteria)) {
					$this->collTsreprets = TsrepretPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsrepretCriteria = $criteria;
		return $this->collTsreprets;
	}

	
	public function countTsreprets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsrepretPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsrepretPeer::CODRET, $this->getCodtip());

		return TsrepretPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsrepret(Tsrepret $l)
	{
		$this->collTsreprets[] = $l;
		$l->setOptipret($this);
	}

	
	public function initTsretivas()
	{
		if ($this->collTsretivas === null) {
			$this->collTsretivas = array();
		}
	}

	
	public function getTsretivas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsretivaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsretivas === null) {
			if ($this->isNew()) {
			   $this->collTsretivas = array();
			} else {

				$criteria->add(TsretivaPeer::CODRET, $this->getCodtip());

				TsretivaPeer::addSelectColumns($criteria);
				$this->collTsretivas = TsretivaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsretivaPeer::CODRET, $this->getCodtip());

				TsretivaPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsretivaCriteria) || !$this->lastTsretivaCriteria->equals($criteria)) {
					$this->collTsretivas = TsretivaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsretivaCriteria = $criteria;
		return $this->collTsretivas;
	}

	
	public function countTsretivas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsretivaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsretivaPeer::CODRET, $this->getCodtip());

		return TsretivaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsretiva(Tsretiva $l)
	{
		$this->collTsretivas[] = $l;
		$l->setOptipret($this);
	}

} 