<?php


abstract class BaseCcprioridad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nompri;


	
	protected $alias;


	
	protected $despri;

	
	protected $collCccredits;

	
	protected $lastCccreditCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNompri()
  {

    return trim($this->nompri);

  }
  
  public function getAlias()
  {

    return trim($this->alias);

  }
  
  public function getDespri()
  {

    return trim($this->despri);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcprioridadPeer::ID;
      }
  
	} 
	
	public function setNompri($v)
	{

    if ($this->nompri !== $v) {
        $this->nompri = $v;
        $this->modifiedColumns[] = CcprioridadPeer::NOMPRI;
      }
  
	} 
	
	public function setAlias($v)
	{

    if ($this->alias !== $v) {
        $this->alias = $v;
        $this->modifiedColumns[] = CcprioridadPeer::ALIAS;
      }
  
	} 
	
	public function setDespri($v)
	{

    if ($this->despri !== $v) {
        $this->despri = $v;
        $this->modifiedColumns[] = CcprioridadPeer::DESPRI;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nompri = $rs->getString($startcol + 1);

      $this->alias = $rs->getString($startcol + 2);

      $this->despri = $rs->getString($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccprioridad object", $e);
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
			$con = Propel::getConnection(CcprioridadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcprioridadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcprioridadPeer::DATABASE_NAME);
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
					$pk = CcprioridadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcprioridadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccredits !== null) {
				foreach($this->collCccredits as $referrerFK) {
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


			if (($retval = CcprioridadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccredits !== null) {
					foreach($this->collCccredits as $referrerFK) {
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
		$pos = CcprioridadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNompri();
				break;
			case 2:
				return $this->getAlias();
				break;
			case 3:
				return $this->getDespri();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcprioridadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNompri(),
			$keys[2] => $this->getAlias(),
			$keys[3] => $this->getDespri(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcprioridadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNompri($value);
				break;
			case 2:
				$this->setAlias($value);
				break;
			case 3:
				$this->setDespri($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcprioridadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlias($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDespri($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcprioridadPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcprioridadPeer::ID)) $criteria->add(CcprioridadPeer::ID, $this->id);
		if ($this->isColumnModified(CcprioridadPeer::NOMPRI)) $criteria->add(CcprioridadPeer::NOMPRI, $this->nompri);
		if ($this->isColumnModified(CcprioridadPeer::ALIAS)) $criteria->add(CcprioridadPeer::ALIAS, $this->alias);
		if ($this->isColumnModified(CcprioridadPeer::DESPRI)) $criteria->add(CcprioridadPeer::DESPRI, $this->despri);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcprioridadPeer::DATABASE_NAME);

		$criteria->add(CcprioridadPeer::ID, $this->id);

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

		$copyObj->setNompri($this->nompri);

		$copyObj->setAlias($this->alias);

		$copyObj->setDespri($this->despri);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccredits() as $relObj) {
				$copyObj->addCccredit($relObj->copy($deepCopy));
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
			self::$peer = new CcprioridadPeer();
		}
		return self::$peer;
	}

	
	public function initCccredits()
	{
		if ($this->collCccredits === null) {
			$this->collCccredits = array();
		}
	}

	
	public function getCccredits($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
			   $this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
					$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreditCriteria = $criteria;
		return $this->collCccredits;
	}

	
	public function countCccredits($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

		return CccreditPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccredit(Cccredit $l)
	{
		$this->collCccredits[] = $l;
		$l->setCcprioridad($this);
	}


	
	public function getCccreditsJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcfuefin($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipcar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipmon($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcbanco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcagenci($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCPRIORIDAD_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}

} 