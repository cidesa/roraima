<?php


abstract class BaseViaregtipser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $destipser;


	
	protected $id;

	
	protected $collViadettipsers;

	
	protected $lastViadettipserCriteria = null;

	
	protected $collViaregdetgassolvias;

	
	protected $lastViaregdetgassolviaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDestipser()
  {

    return trim($this->destipser);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDestipser($v)
	{

    if ($this->destipser !== $v) {
        $this->destipser = $v;
        $this->modifiedColumns[] = ViaregtipserPeer::DESTIPSER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregtipserPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->destipser = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregtipser object", $e);
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
			$con = Propel::getConnection(ViaregtipserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregtipserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregtipserPeer::DATABASE_NAME);
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
					$pk = ViaregtipserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregtipserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViadettipsers !== null) {
				foreach($this->collViadettipsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collViaregdetgassolvias !== null) {
				foreach($this->collViaregdetgassolvias as $referrerFK) {
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


			if (($retval = ViaregtipserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViadettipsers !== null) {
					foreach($this->collViadettipsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collViaregdetgassolvias !== null) {
					foreach($this->collViaregdetgassolvias as $referrerFK) {
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
		$pos = ViaregtipserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDestipser();
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
		$keys = ViaregtipserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDestipser(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregtipserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDestipser($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregtipserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDestipser($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregtipserPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregtipserPeer::DESTIPSER)) $criteria->add(ViaregtipserPeer::DESTIPSER, $this->destipser);
		if ($this->isColumnModified(ViaregtipserPeer::ID)) $criteria->add(ViaregtipserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregtipserPeer::DATABASE_NAME);

		$criteria->add(ViaregtipserPeer::ID, $this->id);

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

		$copyObj->setDestipser($this->destipser);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViadettipsers() as $relObj) {
				$copyObj->addViadettipser($relObj->copy($deepCopy));
			}

			foreach($this->getViaregdetgassolvias() as $relObj) {
				$copyObj->addViaregdetgassolvia($relObj->copy($deepCopy));
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
			self::$peer = new ViaregtipserPeer();
		}
		return self::$peer;
	}

	
	public function initViadettipsers()
	{
		if ($this->collViadettipsers === null) {
			$this->collViadettipsers = array();
		}
	}

	
	public function getViadettipsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
			   $this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

				ViadettipserPeer::addSelectColumns($criteria);
				$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

				ViadettipserPeer::addSelectColumns($criteria);
				if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
					$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViadettipserCriteria = $criteria;
		return $this->collViadettipsers;
	}

	
	public function countViadettipsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

		return ViadettipserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViadettipser(Viadettipser $l)
	{
		$this->collViadettipsers[] = $l;
		$l->setViaregtipser($this);
	}


	
	public function getViadettipsersJoinViaregtiptab($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
				$this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtiptab($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtiptab($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}


	
	public function getViadettipsersJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
				$this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->getId());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}

	
	public function initViaregdetgassolvias()
	{
		if ($this->collViaregdetgassolvias === null) {
			$this->collViaregdetgassolvias = array();
		}
	}

	
	public function getViaregdetgassolvias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetgassolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetgassolvias === null) {
			if ($this->isNew()) {
			   $this->collViaregdetgassolvias = array();
			} else {

				$criteria->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, $this->getId());

				ViaregdetgassolviaPeer::addSelectColumns($criteria);
				$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, $this->getId());

				ViaregdetgassolviaPeer::addSelectColumns($criteria);
				if (!isset($this->lastViaregdetgassolviaCriteria) || !$this->lastViaregdetgassolviaCriteria->equals($criteria)) {
					$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaregdetgassolviaCriteria = $criteria;
		return $this->collViaregdetgassolvias;
	}

	
	public function countViaregdetgassolvias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetgassolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, $this->getId());

		return ViaregdetgassolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregdetgassolvia(Viaregdetgassolvia $l)
	{
		$this->collViaregdetgassolvias[] = $l;
		$l->setViaregtipser($this);
	}


	
	public function getViaregdetgassolviasJoinViaregdetsolvia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetgassolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetgassolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetgassolvias = array();
			} else {

				$criteria->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, $this->getId());

				$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelectJoinViaregdetsolvia($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetgassolviaPeer::VIAREGTIPSER_ID, $this->getId());

			if (!isset($this->lastViaregdetgassolviaCriteria) || !$this->lastViaregdetgassolviaCriteria->equals($criteria)) {
				$this->collViaregdetgassolvias = ViaregdetgassolviaPeer::doSelectJoinViaregdetsolvia($criteria, $con);
			}
		}
		$this->lastViaregdetgassolviaCriteria = $criteria;

		return $this->collViaregdetgassolvias;
	}

} 