<?php


abstract class BaseViaregact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desact;


	
	protected $id;

	
	protected $collViaregdetsolvias;

	
	protected $lastViaregdetsolviaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = ViaregactPeer::DESACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desact = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregact object", $e);
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
			$con = Propel::getConnection(ViaregactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregactPeer::DATABASE_NAME);
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
					$pk = ViaregactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViaregdetsolvias !== null) {
				foreach($this->collViaregdetsolvias as $referrerFK) {
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


			if (($retval = ViaregactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViaregdetsolvias !== null) {
					foreach($this->collViaregdetsolvias as $referrerFK) {
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
		$pos = ViaregactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesact();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesact(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesact($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregactPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregactPeer::DESACT)) $criteria->add(ViaregactPeer::DESACT, $this->desact);
		if ($this->isColumnModified(ViaregactPeer::ID)) $criteria->add(ViaregactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregactPeer::DATABASE_NAME);

		$criteria->add(ViaregactPeer::ID, $this->id);

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

		$copyObj->setDesact($this->desact);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViaregdetsolvias() as $relObj) {
				$copyObj->addViaregdetsolvia($relObj->copy($deepCopy));
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
			self::$peer = new ViaregactPeer();
		}
		return self::$peer;
	}

	
	public function initViaregdetsolvias()
	{
		if ($this->collViaregdetsolvias === null) {
			$this->collViaregdetsolvias = array();
		}
	}

	
	public function getViaregdetsolvias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
			   $this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
					$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;
		return $this->collViaregdetsolvias;
	}

	
	public function countViaregdetsolvias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

		return ViaregdetsolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregdetsolvia(Viaregdetsolvia $l)
	{
		$this->collViaregdetsolvias[] = $l;
		$l->setViaregact($this);
	}


	
	public function getViaregdetsolviasJoinViaregsolvia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregsolvia($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregsolvia($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinViaregente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregente($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregente($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGACT_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}

} 