<?php


abstract class BaseCcpregun extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pregun;

	
	protected $collCcresusus;

	
	protected $lastCcresusuCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPregun()
  {

    return trim($this->pregun);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcpregunPeer::ID;
      }
  
	} 
	
	public function setPregun($v)
	{

    if ($this->pregun !== $v) {
        $this->pregun = $v;
        $this->modifiedColumns[] = CcpregunPeer::PREGUN;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->pregun = $rs->getString($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccpregun object", $e);
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
			$con = Propel::getConnection(CcpregunPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcpregunPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcpregunPeer::DATABASE_NAME);
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
					$pk = CcpregunPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcpregunPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcresusus !== null) {
				foreach($this->collCcresusus as $referrerFK) {
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


			if (($retval = CcpregunPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcresusus !== null) {
					foreach($this->collCcresusus as $referrerFK) {
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
		$pos = CcpregunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPregun();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpregunPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPregun(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpregunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPregun($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpregunPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPregun($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcpregunPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcpregunPeer::ID)) $criteria->add(CcpregunPeer::ID, $this->id);
		if ($this->isColumnModified(CcpregunPeer::PREGUN)) $criteria->add(CcpregunPeer::PREGUN, $this->pregun);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcpregunPeer::DATABASE_NAME);

		$criteria->add(CcpregunPeer::ID, $this->id);

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

		$copyObj->setPregun($this->pregun);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcresusus() as $relObj) {
				$copyObj->addCcresusu($relObj->copy($deepCopy));
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
			self::$peer = new CcpregunPeer();
		}
		return self::$peer;
	}

	
	public function initCcresusus()
	{
		if ($this->collCcresusus === null) {
			$this->collCcresusus = array();
		}
	}

	
	public function getCcresusus($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcresusus === null) {
			if ($this->isNew()) {
			   $this->collCcresusus = array();
			} else {

				$criteria->add(CcresusuPeer::CCPREGUN_ID, $this->getId());

				CcresusuPeer::addSelectColumns($criteria);
				$this->collCcresusus = CcresusuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcresusuPeer::CCPREGUN_ID, $this->getId());

				CcresusuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcresusuCriteria) || !$this->lastCcresusuCriteria->equals($criteria)) {
					$this->collCcresusus = CcresusuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcresusuCriteria = $criteria;
		return $this->collCcresusus;
	}

	
	public function countCcresusus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcresusuPeer::CCPREGUN_ID, $this->getId());

		return CcresusuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcresusu(Ccresusu $l)
	{
		$this->collCcresusus[] = $l;
		$l->setCcpregun($this);
	}


	
	public function getCcresususJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcresusus === null) {
			if ($this->isNew()) {
				$this->collCcresusus = array();
			} else {

				$criteria->add(CcresusuPeer::CCPREGUN_ID, $this->getId());

				$this->collCcresusus = CcresusuPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcresusuPeer::CCPREGUN_ID, $this->getId());

			if (!isset($this->lastCcresusuCriteria) || !$this->lastCcresusuCriteria->equals($criteria)) {
				$this->collCcresusus = CcresusuPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcresusuCriteria = $criteria;

		return $this->collCcresusus;
	}

} 