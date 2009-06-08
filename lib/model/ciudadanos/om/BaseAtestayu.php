<?php


abstract class BaseAtestayu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desest;


	
	protected $comest;


	
	protected $id;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesest()
  {

    return trim($this->desest);

  }
  
  public function getComest()
  {

    return trim($this->comest);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesest($v)
	{

    if ($this->desest !== $v) {
        $this->desest = $v;
        $this->modifiedColumns[] = AtestayuPeer::DESEST;
      }
  
	} 
	
	public function setComest($v)
	{

    if ($this->comest !== $v) {
        $this->comest = $v;
        $this->modifiedColumns[] = AtestayuPeer::COMEST;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtestayuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desest = $rs->getString($startcol + 0);

      $this->comest = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atestayu object", $e);
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
			$con = Propel::getConnection(AtestayuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtestayuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtestayuPeer::DATABASE_NAME);
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
					$pk = AtestayuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtestayuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
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


			if (($retval = AtestayuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
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
		$pos = AtestayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesest();
				break;
			case 1:
				return $this->getComest();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestayuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesest(),
			$keys[1] => $this->getComest(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtestayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesest($value);
				break;
			case 1:
				$this->setComest($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestayuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setComest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtestayuPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtestayuPeer::DESEST)) $criteria->add(AtestayuPeer::DESEST, $this->desest);
		if ($this->isColumnModified(AtestayuPeer::COMEST)) $criteria->add(AtestayuPeer::COMEST, $this->comest);
		if ($this->isColumnModified(AtestayuPeer::ID)) $criteria->add(AtestayuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtestayuPeer::DATABASE_NAME);

		$criteria->add(AtestayuPeer::ID, $this->id);

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

		$copyObj->setDesest($this->desest);

		$copyObj->setComest($this->comest);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
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
			self::$peer = new AtestayuPeer();
		}
		return self::$peer;
	}

	
	public function initAtayudass()
	{
		if ($this->collAtayudass === null) {
			$this->collAtayudass = array();
		}
	}

	
	public function getAtayudass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
			   $this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
					$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtayudasCriteria = $criteria;
		return $this->collAtayudass;
	}

	
	public function countAtayudass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtestayu($this);
	}


	
	public function getAtayudassJoinCaordcom($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtpriayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtciudadanoRelatedByAtsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtciudadanoRelatedByAtbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttrasoc($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtmedico($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}

} 