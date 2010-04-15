<?php


abstract class BaseFcdeftipdoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipdoc;


	
	protected $nomtipdoc;


	
	protected $temtipdoc;


	
	protected $id;

	
	protected $collFcbanents;

	
	protected $lastFcbanentCriteria = null;

	
	protected $collFcbansals;

	
	protected $lastFcbansalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipdoc()
  {

    return trim($this->codtipdoc);

  }
  
  public function getNomtipdoc()
  {

    return trim($this->nomtipdoc);

  }
  
  public function getTemtipdoc()
  {

    return trim($this->temtipdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipdoc($v)
	{

    if ($this->codtipdoc !== $v) {
        $this->codtipdoc = $v;
        $this->modifiedColumns[] = FcdeftipdocPeer::CODTIPDOC;
      }
  
	} 
	
	public function setNomtipdoc($v)
	{

    if ($this->nomtipdoc !== $v) {
        $this->nomtipdoc = $v;
        $this->modifiedColumns[] = FcdeftipdocPeer::NOMTIPDOC;
      }
  
	} 
	
	public function setTemtipdoc($v)
	{

    if ($this->temtipdoc !== $v) {
        $this->temtipdoc = $v;
        $this->modifiedColumns[] = FcdeftipdocPeer::TEMTIPDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdeftipdocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipdoc = $rs->getString($startcol + 0);

      $this->nomtipdoc = $rs->getString($startcol + 1);

      $this->temtipdoc = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdeftipdoc object", $e);
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
			$con = Propel::getConnection(FcdeftipdocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdeftipdocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdeftipdocPeer::DATABASE_NAME);
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
					$pk = FcdeftipdocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdeftipdocPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcbanents !== null) {
				foreach($this->collFcbanents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFcbansals !== null) {
				foreach($this->collFcbansals as $referrerFK) {
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


			if (($retval = FcdeftipdocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcbanents !== null) {
					foreach($this->collFcbanents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFcbansals !== null) {
					foreach($this->collFcbansals as $referrerFK) {
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
		$pos = FcdeftipdocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipdoc();
				break;
			case 1:
				return $this->getNomtipdoc();
				break;
			case 2:
				return $this->getTemtipdoc();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeftipdocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipdoc(),
			$keys[1] => $this->getNomtipdoc(),
			$keys[2] => $this->getTemtipdoc(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeftipdocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipdoc($value);
				break;
			case 1:
				$this->setNomtipdoc($value);
				break;
			case 2:
				$this->setTemtipdoc($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeftipdocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTemtipdoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdeftipdocPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdeftipdocPeer::CODTIPDOC)) $criteria->add(FcdeftipdocPeer::CODTIPDOC, $this->codtipdoc);
		if ($this->isColumnModified(FcdeftipdocPeer::NOMTIPDOC)) $criteria->add(FcdeftipdocPeer::NOMTIPDOC, $this->nomtipdoc);
		if ($this->isColumnModified(FcdeftipdocPeer::TEMTIPDOC)) $criteria->add(FcdeftipdocPeer::TEMTIPDOC, $this->temtipdoc);
		if ($this->isColumnModified(FcdeftipdocPeer::ID)) $criteria->add(FcdeftipdocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdeftipdocPeer::DATABASE_NAME);

		$criteria->add(FcdeftipdocPeer::ID, $this->id);

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

		$copyObj->setCodtipdoc($this->codtipdoc);

		$copyObj->setNomtipdoc($this->nomtipdoc);

		$copyObj->setTemtipdoc($this->temtipdoc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcbanents() as $relObj) {
				$copyObj->addFcbanent($relObj->copy($deepCopy));
			}

			foreach($this->getFcbansals() as $relObj) {
				$copyObj->addFcbansal($relObj->copy($deepCopy));
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
			self::$peer = new FcdeftipdocPeer();
		}
		return self::$peer;
	}

	
	public function initFcbanents()
	{
		if ($this->collFcbanents === null) {
			$this->collFcbanents = array();
		}
	}

	
	public function getFcbanents($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
			   $this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

				FcbanentPeer::addSelectColumns($criteria);
				$this->collFcbanents = FcbanentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

				FcbanentPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
					$this->collFcbanents = FcbanentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcbanentCriteria = $criteria;
		return $this->collFcbanents;
	}

	
	public function countFcbanents($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

		return FcbanentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbanent(Fcbanent $l)
	{
		$this->collFcbanents[] = $l;
		$l->setFcdeftipdoc($this);
	}


	
	public function getFcbanentsJoinFcdeffun($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdefentext($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdefubifis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}


	
	public function getFcbanentsJoinFcdefubimag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbanentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbanents === null) {
			if ($this->isNew()) {
				$this->collFcbanents = array();
			} else {

				$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbanentPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbanentCriteria) || !$this->lastFcbanentCriteria->equals($criteria)) {
				$this->collFcbanents = FcbanentPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		}
		$this->lastFcbanentCriteria = $criteria;

		return $this->collFcbanents;
	}

	
	public function initFcbansals()
	{
		if ($this->collFcbansals === null) {
			$this->collFcbansals = array();
		}
	}

	
	public function getFcbansals($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
			   $this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

				FcbansalPeer::addSelectColumns($criteria);
				$this->collFcbansals = FcbansalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

				FcbansalPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
					$this->collFcbansals = FcbansalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcbansalCriteria = $criteria;
		return $this->collFcbansals;
	}

	
	public function countFcbansals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

		return FcbansalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcbansal(Fcbansal $l)
	{
		$this->collFcbansals[] = $l;
		$l->setFcdeftipdoc($this);
	}


	
	public function getFcbansalsJoinFcdeffun($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdeffun($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdefentext($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefentext($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdefubifis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubifis($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}


	
	public function getFcbansalsJoinFcdefubimag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcbansalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcbansals === null) {
			if ($this->isNew()) {
				$this->collFcbansals = array();
			} else {

				$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcbansalPeer::CODTIPDOC, $this->getCodtipdoc());

			if (!isset($this->lastFcbansalCriteria) || !$this->lastFcbansalCriteria->equals($criteria)) {
				$this->collFcbansals = FcbansalPeer::doSelectJoinFcdefubimag($criteria, $con);
			}
		}
		$this->lastFcbansalCriteria = $criteria;

		return $this->collFcbansals;
	}

} 