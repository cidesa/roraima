<?php


abstract class BaseCcclaact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomclaact;


	
	protected $desclaact;

	
	protected $collCcactanas;

	
	protected $lastCcactanaCriteria = null;

	
	protected $collCcactivis;

	
	protected $lastCcactiviCriteria = null;

	
	protected $collCcgescobs;

	
	protected $lastCcgescobCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomclaact()
  {

    return trim($this->nomclaact);

  }
  
  public function getDesclaact()
  {

    return trim($this->desclaact);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcclaactPeer::ID;
      }
  
	} 
	
	public function setNomclaact($v)
	{

    if ($this->nomclaact !== $v) {
        $this->nomclaact = $v;
        $this->modifiedColumns[] = CcclaactPeer::NOMCLAACT;
      }
  
	} 
	
	public function setDesclaact($v)
	{

    if ($this->desclaact !== $v) {
        $this->desclaact = $v;
        $this->modifiedColumns[] = CcclaactPeer::DESCLAACT;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomclaact = $rs->getString($startcol + 1);

      $this->desclaact = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccclaact object", $e);
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
			$con = Propel::getConnection(CcclaactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcclaactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcclaactPeer::DATABASE_NAME);
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
					$pk = CcclaactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcclaactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcactanas !== null) {
				foreach($this->collCcactanas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcactivis !== null) {
				foreach($this->collCcactivis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgescobs !== null) {
				foreach($this->collCcgescobs as $referrerFK) {
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


			if (($retval = CcclaactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcactanas !== null) {
					foreach($this->collCcactanas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcactivis !== null) {
					foreach($this->collCcactivis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgescobs !== null) {
					foreach($this->collCcgescobs as $referrerFK) {
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
		$pos = CcclaactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomclaact();
				break;
			case 2:
				return $this->getDesclaact();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcclaactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomclaact(),
			$keys[2] => $this->getDesclaact(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcclaactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomclaact($value);
				break;
			case 2:
				$this->setDesclaact($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcclaactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomclaact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesclaact($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcclaactPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcclaactPeer::ID)) $criteria->add(CcclaactPeer::ID, $this->id);
		if ($this->isColumnModified(CcclaactPeer::NOMCLAACT)) $criteria->add(CcclaactPeer::NOMCLAACT, $this->nomclaact);
		if ($this->isColumnModified(CcclaactPeer::DESCLAACT)) $criteria->add(CcclaactPeer::DESCLAACT, $this->desclaact);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcclaactPeer::DATABASE_NAME);

		$criteria->add(CcclaactPeer::ID, $this->id);

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

		$copyObj->setNomclaact($this->nomclaact);

		$copyObj->setDesclaact($this->desclaact);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcactanas() as $relObj) {
				$copyObj->addCcactana($relObj->copy($deepCopy));
			}

			foreach($this->getCcactivis() as $relObj) {
				$copyObj->addCcactivi($relObj->copy($deepCopy));
			}

			foreach($this->getCcgescobs() as $relObj) {
				$copyObj->addCcgescob($relObj->copy($deepCopy));
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
			self::$peer = new CcclaactPeer();
		}
		return self::$peer;
	}

	
	public function initCcactanas()
	{
		if ($this->collCcactanas === null) {
			$this->collCcactanas = array();
		}
	}

	
	public function getCcactanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
			   $this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
					$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcactanaCriteria = $criteria;
		return $this->collCcactanas;
	}

	
	public function countCcactanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

		return CcactanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcactana(Ccactana $l)
	{
		$this->collCcactanas[] = $l;
		$l->setCcclaact($this);
	}


	
	public function getCcactanasJoinCcactivi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcactivi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcactivi($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}

	
	public function initCcactivis()
	{
		if ($this->collCcactivis === null) {
			$this->collCcactivis = array();
		}
	}

	
	public function getCcactivis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactiviPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactivis === null) {
			if ($this->isNew()) {
			   $this->collCcactivis = array();
			} else {

				$criteria->add(CcactiviPeer::CCCLAACT_ID, $this->getId());

				CcactiviPeer::addSelectColumns($criteria);
				$this->collCcactivis = CcactiviPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcactiviPeer::CCCLAACT_ID, $this->getId());

				CcactiviPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcactiviCriteria) || !$this->lastCcactiviCriteria->equals($criteria)) {
					$this->collCcactivis = CcactiviPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcactiviCriteria = $criteria;
		return $this->collCcactivis;
	}

	
	public function countCcactivis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactiviPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcactiviPeer::CCCLAACT_ID, $this->getId());

		return CcactiviPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcactivi(Ccactivi $l)
	{
		$this->collCcactivis[] = $l;
		$l->setCcclaact($this);
	}

	
	public function initCcgescobs()
	{
		if ($this->collCcgescobs === null) {
			$this->collCcgescobs = array();
		}
	}

	
	public function getCcgescobs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
			   $this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
					$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgescobCriteria = $criteria;
		return $this->collCcgescobs;
	}

	
	public function countCcgescobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

		return CcgescobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgescob(Ccgescob $l)
	{
		$this->collCcgescobs[] = $l;
		$l->setCcclaact($this);
	}


	
	public function getCcgescobsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcactana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCCLAACT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}

} 