<?php


abstract class BaseCcperiod extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $desper;


	
	protected $alias;


	
	protected $cantid;

	
	protected $collCcdefamosRelatedByCcperiodId;

	
	protected $lastCcdefamoRelatedByCcperiodIdCriteria = null;

	
	protected $collCcdefamosRelatedByCcpergravaId;

	
	protected $lastCcdefamoRelatedByCcpergravaIdCriteria = null;

	
	protected $collCcdefamosRelatedByFrecuoesp;

	
	protected $lastCcdefamoRelatedByFrecuoespCriteria = null;

	
	protected $collCcparpros;

	
	protected $lastCcparproCriteria = null;

	
	protected $collCcprogras;

	
	protected $lastCcprograCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getDesper()
  {

    return trim($this->desper);

  }
  
  public function getAlias()
  {

    return trim($this->alias);

  }
  
  public function getCantid()
  {

    return $this->cantid;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcperiodPeer::ID;
      }
  
	} 
	
	public function setDesper($v)
	{

    if ($this->desper !== $v) {
        $this->desper = $v;
        $this->modifiedColumns[] = CcperiodPeer::DESPER;
      }
  
	} 
	
	public function setAlias($v)
	{

    if ($this->alias !== $v) {
        $this->alias = $v;
        $this->modifiedColumns[] = CcperiodPeer::ALIAS;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = $v;
        $this->modifiedColumns[] = CcperiodPeer::CANTID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->desper = $rs->getString($startcol + 1);

      $this->alias = $rs->getString($startcol + 2);

      $this->cantid = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccperiod object", $e);
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
			$con = Propel::getConnection(CcperiodPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcperiodPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcperiodPeer::DATABASE_NAME);
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
					$pk = CcperiodPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcperiodPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdefamosRelatedByCcperiodId !== null) {
				foreach($this->collCcdefamosRelatedByCcperiodId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdefamosRelatedByCcpergravaId !== null) {
				foreach($this->collCcdefamosRelatedByCcpergravaId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdefamosRelatedByFrecuoesp !== null) {
				foreach($this->collCcdefamosRelatedByFrecuoesp as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparpros !== null) {
				foreach($this->collCcparpros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcprogras !== null) {
				foreach($this->collCcprogras as $referrerFK) {
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


			if (($retval = CcperiodPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdefamosRelatedByCcperiodId !== null) {
					foreach($this->collCcdefamosRelatedByCcperiodId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdefamosRelatedByCcpergravaId !== null) {
					foreach($this->collCcdefamosRelatedByCcpergravaId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdefamosRelatedByFrecuoesp !== null) {
					foreach($this->collCcdefamosRelatedByFrecuoesp as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparpros !== null) {
					foreach($this->collCcparpros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcprogras !== null) {
					foreach($this->collCcprogras as $referrerFK) {
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
		$pos = CcperiodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDesper();
				break;
			case 2:
				return $this->getAlias();
				break;
			case 3:
				return $this->getCantid();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperiodPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDesper(),
			$keys[2] => $this->getAlias(),
			$keys[3] => $this->getCantid(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcperiodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDesper($value);
				break;
			case 2:
				$this->setAlias($value);
				break;
			case 3:
				$this->setCantid($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperiodPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesper($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlias($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantid($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcperiodPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcperiodPeer::ID)) $criteria->add(CcperiodPeer::ID, $this->id);
		if ($this->isColumnModified(CcperiodPeer::DESPER)) $criteria->add(CcperiodPeer::DESPER, $this->desper);
		if ($this->isColumnModified(CcperiodPeer::ALIAS)) $criteria->add(CcperiodPeer::ALIAS, $this->alias);
		if ($this->isColumnModified(CcperiodPeer::CANTID)) $criteria->add(CcperiodPeer::CANTID, $this->cantid);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcperiodPeer::DATABASE_NAME);

		$criteria->add(CcperiodPeer::ID, $this->id);

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

		$copyObj->setDesper($this->desper);

		$copyObj->setAlias($this->alias);

		$copyObj->setCantid($this->cantid);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdefamosRelatedByCcperiodId() as $relObj) {
				$copyObj->addCcdefamoRelatedByCcperiodId($relObj->copy($deepCopy));
			}

			foreach($this->getCcdefamosRelatedByCcpergravaId() as $relObj) {
				$copyObj->addCcdefamoRelatedByCcpergravaId($relObj->copy($deepCopy));
			}

			foreach($this->getCcdefamosRelatedByFrecuoesp() as $relObj) {
				$copyObj->addCcdefamoRelatedByFrecuoesp($relObj->copy($deepCopy));
			}

			foreach($this->getCcparpros() as $relObj) {
				$copyObj->addCcparpro($relObj->copy($deepCopy));
			}

			foreach($this->getCcprogras() as $relObj) {
				$copyObj->addCcprogra($relObj->copy($deepCopy));
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
			self::$peer = new CcperiodPeer();
		}
		return self::$peer;
	}

	
	public function initCcdefamosRelatedByCcperiodId()
	{
		if ($this->collCcdefamosRelatedByCcperiodId === null) {
			$this->collCcdefamosRelatedByCcperiodId = array();
		}
	}

	
	public function getCcdefamosRelatedByCcperiodId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcperiodId === null) {
			if ($this->isNew()) {
			   $this->collCcdefamosRelatedByCcperiodId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdefamoRelatedByCcperiodIdCriteria) || !$this->lastCcdefamoRelatedByCcperiodIdCriteria->equals($criteria)) {
					$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdefamoRelatedByCcperiodIdCriteria = $criteria;
		return $this->collCcdefamosRelatedByCcperiodId;
	}

	
	public function countCcdefamosRelatedByCcperiodId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamoRelatedByCcperiodId(Ccdefamo $l)
	{
		$this->collCcdefamosRelatedByCcperiodId[] = $l;
		$l->setCcperiodRelatedByCcperiodId($this);
	}


	
	public function getCcdefamosRelatedByCcperiodIdJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcperiodId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcperiodId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcperiodIdCriteria) || !$this->lastCcdefamoRelatedByCcperiodIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcperiodIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcperiodId;
	}


	
	public function getCcdefamosRelatedByCcperiodIdJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcperiodId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcperiodId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcperiodIdCriteria) || !$this->lastCcdefamoRelatedByCcperiodIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcperiodIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcperiodId;
	}


	
	public function getCcdefamosRelatedByCcperiodIdJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcperiodId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcperiodId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcperiodIdCriteria) || !$this->lastCcdefamoRelatedByCcperiodIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcperiodIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcperiodId;
	}


	
	public function getCcdefamosRelatedByCcperiodIdJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcperiodId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcperiodId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERIOD_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcperiodIdCriteria) || !$this->lastCcdefamoRelatedByCcperiodIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcperiodId = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcperiodIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcperiodId;
	}

	
	public function initCcdefamosRelatedByCcpergravaId()
	{
		if ($this->collCcdefamosRelatedByCcpergravaId === null) {
			$this->collCcdefamosRelatedByCcpergravaId = array();
		}
	}

	
	public function getCcdefamosRelatedByCcpergravaId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcpergravaId === null) {
			if ($this->isNew()) {
			   $this->collCcdefamosRelatedByCcpergravaId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdefamoRelatedByCcpergravaIdCriteria) || !$this->lastCcdefamoRelatedByCcpergravaIdCriteria->equals($criteria)) {
					$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdefamoRelatedByCcpergravaIdCriteria = $criteria;
		return $this->collCcdefamosRelatedByCcpergravaId;
	}

	
	public function countCcdefamosRelatedByCcpergravaId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamoRelatedByCcpergravaId(Ccdefamo $l)
	{
		$this->collCcdefamosRelatedByCcpergravaId[] = $l;
		$l->setCcperiodRelatedByCcpergravaId($this);
	}


	
	public function getCcdefamosRelatedByCcpergravaIdJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcpergravaId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcpergravaId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcpergravaIdCriteria) || !$this->lastCcdefamoRelatedByCcpergravaIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcpergravaIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcpergravaId;
	}


	
	public function getCcdefamosRelatedByCcpergravaIdJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcpergravaId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcpergravaId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcpergravaIdCriteria) || !$this->lastCcdefamoRelatedByCcpergravaIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcpergravaIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcpergravaId;
	}


	
	public function getCcdefamosRelatedByCcpergravaIdJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcpergravaId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcpergravaId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcpergravaIdCriteria) || !$this->lastCcdefamoRelatedByCcpergravaIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcpergravaIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcpergravaId;
	}


	
	public function getCcdefamosRelatedByCcpergravaIdJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByCcpergravaId === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByCcpergravaId = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByCcpergravaIdCriteria) || !$this->lastCcdefamoRelatedByCcpergravaIdCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByCcpergravaId = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByCcpergravaIdCriteria = $criteria;

		return $this->collCcdefamosRelatedByCcpergravaId;
	}

	
	public function initCcdefamosRelatedByFrecuoesp()
	{
		if ($this->collCcdefamosRelatedByFrecuoesp === null) {
			$this->collCcdefamosRelatedByFrecuoesp = array();
		}
	}

	
	public function getCcdefamosRelatedByFrecuoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByFrecuoesp === null) {
			if ($this->isNew()) {
			   $this->collCcdefamosRelatedByFrecuoesp = array();
			} else {

				$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdefamoRelatedByFrecuoespCriteria) || !$this->lastCcdefamoRelatedByFrecuoespCriteria->equals($criteria)) {
					$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdefamoRelatedByFrecuoespCriteria = $criteria;
		return $this->collCcdefamosRelatedByFrecuoesp;
	}

	
	public function countCcdefamosRelatedByFrecuoesp($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamoRelatedByFrecuoesp(Ccdefamo $l)
	{
		$this->collCcdefamosRelatedByFrecuoesp[] = $l;
		$l->setCcperiodRelatedByFrecuoesp($this);
	}


	
	public function getCcdefamosRelatedByFrecuoespJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByFrecuoesp === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByFrecuoesp = array();
			} else {

				$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByFrecuoespCriteria) || !$this->lastCcdefamoRelatedByFrecuoespCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByFrecuoespCriteria = $criteria;

		return $this->collCcdefamosRelatedByFrecuoesp;
	}


	
	public function getCcdefamosRelatedByFrecuoespJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByFrecuoesp === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByFrecuoesp = array();
			} else {

				$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByFrecuoespCriteria) || !$this->lastCcdefamoRelatedByFrecuoespCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByFrecuoespCriteria = $criteria;

		return $this->collCcdefamosRelatedByFrecuoesp;
	}


	
	public function getCcdefamosRelatedByFrecuoespJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByFrecuoesp === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByFrecuoesp = array();
			} else {

				$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByFrecuoespCriteria) || !$this->lastCcdefamoRelatedByFrecuoespCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByFrecuoespCriteria = $criteria;

		return $this->collCcdefamosRelatedByFrecuoesp;
	}


	
	public function getCcdefamosRelatedByFrecuoespJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamosRelatedByFrecuoesp === null) {
			if ($this->isNew()) {
				$this->collCcdefamosRelatedByFrecuoesp = array();
			} else {

				$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::FRECUOESP, $this->getId());

			if (!isset($this->lastCcdefamoRelatedByFrecuoespCriteria) || !$this->lastCcdefamoRelatedByFrecuoespCriteria->equals($criteria)) {
				$this->collCcdefamosRelatedByFrecuoesp = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcdefamoRelatedByFrecuoespCriteria = $criteria;

		return $this->collCcdefamosRelatedByFrecuoesp;
	}

	
	public function initCcparpros()
	{
		if ($this->collCcparpros === null) {
			$this->collCcparpros = array();
		}
	}

	
	public function getCcparpros($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
			   $this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
					$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparproCriteria = $criteria;
		return $this->collCcparpros;
	}

	
	public function countCcparpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

		return CcparproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparpro(Ccparpro $l)
	{
		$this->collCcparpros[] = $l;
		$l->setCcperiod($this);
	}


	
	public function getCcparprosJoinContabb($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcdeducc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}

	
	public function initCcprogras()
	{
		if ($this->collCcprogras === null) {
			$this->collCcprogras = array();
		}
	}

	
	public function getCcprogras($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprogras === null) {
			if ($this->isNew()) {
			   $this->collCcprogras = array();
			} else {

				$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

				CcprograPeer::addSelectColumns($criteria);
				$this->collCcprogras = CcprograPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

				CcprograPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcprograCriteria) || !$this->lastCcprograCriteria->equals($criteria)) {
					$this->collCcprogras = CcprograPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcprograCriteria = $criteria;
		return $this->collCcprogras;
	}

	
	public function countCcprogras($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

		return CcprograPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcprogra(Ccprogra $l)
	{
		$this->collCcprogras[] = $l;
		$l->setCcperiod($this);
	}


	
	public function getCcprograsJoinCcfuefin($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprogras === null) {
			if ($this->isNew()) {
				$this->collCcprogras = array();
			} else {

				$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

				$this->collCcprogras = CcprograPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

			if (!isset($this->lastCcprograCriteria) || !$this->lastCcprograCriteria->equals($criteria)) {
				$this->collCcprogras = CcprograPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		}
		$this->lastCcprograCriteria = $criteria;

		return $this->collCcprogras;
	}


	
	public function getCcprograsJoinCpdoccom($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprogras === null) {
			if ($this->isNew()) {
				$this->collCcprogras = array();
			} else {

				$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

				$this->collCcprogras = CcprograPeer::doSelectJoinCpdoccom($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprograPeer::CCPERIOD_ID, $this->getId());

			if (!isset($this->lastCcprograCriteria) || !$this->lastCcprograCriteria->equals($criteria)) {
				$this->collCcprogras = CcprograPeer::doSelectJoinCpdoccom($criteria, $con);
			}
		}
		$this->lastCcprograCriteria = $criteria;

		return $this->collCcprogras;
	}

} 