<?php


abstract class BaseAtrecaud extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $desrec;


	
	protected $requerido;


	
	protected $id;

	
	protected $collAtrecayus;

	
	protected $lastAtrecayuCriteria = null;

	
	protected $collAtdetrecayus;

	
	protected $lastAtdetrecayuCriteria = null;

	
	protected $collAtdetrecrubs;

	
	protected $lastAtdetrecrubCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getDesrec()
  {

    return trim($this->desrec);

  }
  
  public function getRequerido()
  {

    return trim($this->requerido);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = AtrecaudPeer::CODREC;
      }
  
	} 
	
	public function setDesrec($v)
	{

    if ($this->desrec !== $v) {
        $this->desrec = $v;
        $this->modifiedColumns[] = AtrecaudPeer::DESREC;
      }
  
	} 
	
	public function setRequerido($v)
	{

    if ($this->requerido !== $v) {
        $this->requerido = $v;
        $this->modifiedColumns[] = AtrecaudPeer::REQUERIDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtrecaudPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrec = $rs->getString($startcol + 0);

      $this->desrec = $rs->getString($startcol + 1);

      $this->requerido = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atrecaud object", $e);
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
			$con = Propel::getConnection(AtrecaudPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtrecaudPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtrecaudPeer::DATABASE_NAME);
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
					$pk = AtrecaudPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtrecaudPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtrecayus !== null) {
				foreach($this->collAtrecayus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdetrecayus !== null) {
				foreach($this->collAtdetrecayus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdetrecrubs !== null) {
				foreach($this->collAtdetrecrubs as $referrerFK) {
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


			if (($retval = AtrecaudPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtrecayus !== null) {
					foreach($this->collAtrecayus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdetrecayus !== null) {
					foreach($this->collAtdetrecayus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdetrecrubs !== null) {
					foreach($this->collAtdetrecrubs as $referrerFK) {
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
		$pos = AtrecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getDesrec();
				break;
			case 2:
				return $this->getRequerido();
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
		$keys = AtrecaudPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getDesrec(),
			$keys[2] => $this->getRequerido(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtrecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setDesrec($value);
				break;
			case 2:
				$this->setRequerido($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtrecaudPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRequerido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtrecaudPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtrecaudPeer::CODREC)) $criteria->add(AtrecaudPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(AtrecaudPeer::DESREC)) $criteria->add(AtrecaudPeer::DESREC, $this->desrec);
		if ($this->isColumnModified(AtrecaudPeer::REQUERIDO)) $criteria->add(AtrecaudPeer::REQUERIDO, $this->requerido);
		if ($this->isColumnModified(AtrecaudPeer::ID)) $criteria->add(AtrecaudPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtrecaudPeer::DATABASE_NAME);

		$criteria->add(AtrecaudPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setDesrec($this->desrec);

		$copyObj->setRequerido($this->requerido);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtrecayus() as $relObj) {
				$copyObj->addAtrecayu($relObj->copy($deepCopy));
			}

			foreach($this->getAtdetrecayus() as $relObj) {
				$copyObj->addAtdetrecayu($relObj->copy($deepCopy));
			}

			foreach($this->getAtdetrecrubs() as $relObj) {
				$copyObj->addAtdetrecrub($relObj->copy($deepCopy));
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
			self::$peer = new AtrecaudPeer();
		}
		return self::$peer;
	}

	
	public function initAtrecayus()
	{
		if ($this->collAtrecayus === null) {
			$this->collAtrecayus = array();
		}
	}

	
	public function getAtrecayus($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtrecayus === null) {
			if ($this->isNew()) {
			   $this->collAtrecayus = array();
			} else {

				$criteria->add(AtrecayuPeer::ATRECAUD_ID, $this->getId());

				AtrecayuPeer::addSelectColumns($criteria);
				$this->collAtrecayus = AtrecayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtrecayuPeer::ATRECAUD_ID, $this->getId());

				AtrecayuPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtrecayuCriteria) || !$this->lastAtrecayuCriteria->equals($criteria)) {
					$this->collAtrecayus = AtrecayuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtrecayuCriteria = $criteria;
		return $this->collAtrecayus;
	}

	
	public function countAtrecayus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtrecayuPeer::ATRECAUD_ID, $this->getId());

		return AtrecayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtrecayu(Atrecayu $l)
	{
		$this->collAtrecayus[] = $l;
		$l->setAtrecaud($this);
	}


	
	public function getAtrecayusJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtrecayus === null) {
			if ($this->isNew()) {
				$this->collAtrecayus = array();
			} else {

				$criteria->add(AtrecayuPeer::ATRECAUD_ID, $this->getId());

				$this->collAtrecayus = AtrecayuPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtrecayuPeer::ATRECAUD_ID, $this->getId());

			if (!isset($this->lastAtrecayuCriteria) || !$this->lastAtrecayuCriteria->equals($criteria)) {
				$this->collAtrecayus = AtrecayuPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtrecayuCriteria = $criteria;

		return $this->collAtrecayus;
	}

	
	public function initAtdetrecayus()
	{
		if ($this->collAtdetrecayus === null) {
			$this->collAtdetrecayus = array();
		}
	}

	
	public function getAtdetrecayus($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetrecayus === null) {
			if ($this->isNew()) {
			   $this->collAtdetrecayus = array();
			} else {

				$criteria->add(AtdetrecayuPeer::ATRECAUD_ID, $this->getId());

				AtdetrecayuPeer::addSelectColumns($criteria);
				$this->collAtdetrecayus = AtdetrecayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetrecayuPeer::ATRECAUD_ID, $this->getId());

				AtdetrecayuPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetrecayuCriteria) || !$this->lastAtdetrecayuCriteria->equals($criteria)) {
					$this->collAtdetrecayus = AtdetrecayuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetrecayuCriteria = $criteria;
		return $this->collAtdetrecayus;
	}

	
	public function countAtdetrecayus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetrecayuPeer::ATRECAUD_ID, $this->getId());

		return AtdetrecayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetrecayu(Atdetrecayu $l)
	{
		$this->collAtdetrecayus[] = $l;
		$l->setAtrecaud($this);
	}


	
	public function getAtdetrecayusJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetrecayus === null) {
			if ($this->isNew()) {
				$this->collAtdetrecayus = array();
			} else {

				$criteria->add(AtdetrecayuPeer::ATRECAUD_ID, $this->getId());

				$this->collAtdetrecayus = AtdetrecayuPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetrecayuPeer::ATRECAUD_ID, $this->getId());

			if (!isset($this->lastAtdetrecayuCriteria) || !$this->lastAtdetrecayuCriteria->equals($criteria)) {
				$this->collAtdetrecayus = AtdetrecayuPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtdetrecayuCriteria = $criteria;

		return $this->collAtdetrecayus;
	}

	
	public function initAtdetrecrubs()
	{
		if ($this->collAtdetrecrubs === null) {
			$this->collAtdetrecrubs = array();
		}
	}

	
	public function getAtdetrecrubs($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetrecrubPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetrecrubs === null) {
			if ($this->isNew()) {
			   $this->collAtdetrecrubs = array();
			} else {

				$criteria->add(AtdetrecrubPeer::ATRECAUD_ID, $this->getId());

				AtdetrecrubPeer::addSelectColumns($criteria);
				$this->collAtdetrecrubs = AtdetrecrubPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetrecrubPeer::ATRECAUD_ID, $this->getId());

				AtdetrecrubPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetrecrubCriteria) || !$this->lastAtdetrecrubCriteria->equals($criteria)) {
					$this->collAtdetrecrubs = AtdetrecrubPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetrecrubCriteria = $criteria;
		return $this->collAtdetrecrubs;
	}

	
	public function countAtdetrecrubs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetrecrubPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetrecrubPeer::ATRECAUD_ID, $this->getId());

		return AtdetrecrubPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetrecrub(Atdetrecrub $l)
	{
		$this->collAtdetrecrubs[] = $l;
		$l->setAtrecaud($this);
	}


	
	public function getAtdetrecrubsJoinAtrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetrecrubPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetrecrubs === null) {
			if ($this->isNew()) {
				$this->collAtdetrecrubs = array();
			} else {

				$criteria->add(AtdetrecrubPeer::ATRECAUD_ID, $this->getId());

				$this->collAtdetrecrubs = AtdetrecrubPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetrecrubPeer::ATRECAUD_ID, $this->getId());

			if (!isset($this->lastAtdetrecrubCriteria) || !$this->lastAtdetrecrubCriteria->equals($criteria)) {
				$this->collAtdetrecrubs = AtdetrecrubPeer::doSelectJoinAtrubros($criteria, $con);
			}
		}
		$this->lastAtdetrecrubCriteria = $criteria;

		return $this->collAtdetrecrubs;
	}

} 