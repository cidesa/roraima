<?php


abstract class BaseViaregtiptab extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $destiptab;


	
	protected $id;

	
	protected $collViadettipsers;

	
	protected $lastViadettipserCriteria = null;

	
	protected $collViaregsolvias;

	
	protected $lastViaregsolviaCriteria = null;

	
	protected $collViadettabcars;

	
	protected $lastViadettabcarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDestiptab()
  {

    return trim($this->destiptab);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDestiptab($v)
	{

    if ($this->destiptab !== $v) {
        $this->destiptab = $v;
        $this->modifiedColumns[] = ViaregtiptabPeer::DESTIPTAB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregtiptabPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->destiptab = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregtiptab object", $e);
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
			$con = Propel::getConnection(ViaregtiptabPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregtiptabPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregtiptabPeer::DATABASE_NAME);
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
					$pk = ViaregtiptabPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregtiptabPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViadettipsers !== null) {
				foreach($this->collViadettipsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collViaregsolvias !== null) {
				foreach($this->collViaregsolvias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collViadettabcars !== null) {
				foreach($this->collViadettabcars as $referrerFK) {
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


			if (($retval = ViaregtiptabPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViadettipsers !== null) {
					foreach($this->collViadettipsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collViaregsolvias !== null) {
					foreach($this->collViaregsolvias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collViadettabcars !== null) {
					foreach($this->collViadettabcars as $referrerFK) {
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
		$pos = ViaregtiptabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDestiptab();
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
		$keys = ViaregtiptabPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDestiptab(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregtiptabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDestiptab($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregtiptabPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDestiptab($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregtiptabPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregtiptabPeer::DESTIPTAB)) $criteria->add(ViaregtiptabPeer::DESTIPTAB, $this->destiptab);
		if ($this->isColumnModified(ViaregtiptabPeer::ID)) $criteria->add(ViaregtiptabPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregtiptabPeer::DATABASE_NAME);

		$criteria->add(ViaregtiptabPeer::ID, $this->id);

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

		$copyObj->setDestiptab($this->destiptab);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViadettipsers() as $relObj) {
				$copyObj->addViadettipser($relObj->copy($deepCopy));
			}

			foreach($this->getViaregsolvias() as $relObj) {
				$copyObj->addViaregsolvia($relObj->copy($deepCopy));
			}

			foreach($this->getViadettabcars() as $relObj) {
				$copyObj->addViadettabcar($relObj->copy($deepCopy));
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
			self::$peer = new ViaregtiptabPeer();
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

				$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

				ViadettipserPeer::addSelectColumns($criteria);
				$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

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

		$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

		return ViadettipserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViadettipser(Viadettipser $l)
	{
		$this->collViadettipsers[] = $l;
		$l->setViaregtiptab($this);
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

				$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}


	
	public function getViadettipsersJoinViaregtipser($criteria = null, $con = null)
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

				$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->getId());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}

	
	public function initViaregsolvias()
	{
		if ($this->collViaregsolvias === null) {
			$this->collViaregsolvias = array();
		}
	}

	
	public function getViaregsolvias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregsolvias === null) {
			if ($this->isNew()) {
			   $this->collViaregsolvias = array();
			} else {

				$criteria->add(ViaregsolviaPeer::VIAREGTIPTAB_ID, $this->getId());

				ViaregsolviaPeer::addSelectColumns($criteria);
				$this->collViaregsolvias = ViaregsolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregsolviaPeer::VIAREGTIPTAB_ID, $this->getId());

				ViaregsolviaPeer::addSelectColumns($criteria);
				if (!isset($this->lastViaregsolviaCriteria) || !$this->lastViaregsolviaCriteria->equals($criteria)) {
					$this->collViaregsolvias = ViaregsolviaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaregsolviaCriteria = $criteria;
		return $this->collViaregsolvias;
	}

	
	public function countViaregsolvias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaregsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaregsolviaPeer::VIAREGTIPTAB_ID, $this->getId());

		return ViaregsolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregsolvia(Viaregsolvia $l)
	{
		$this->collViaregsolvias[] = $l;
		$l->setViaregtiptab($this);
	}

	
	public function initViadettabcars()
	{
		if ($this->collViadettabcars === null) {
			$this->collViadettabcars = array();
		}
	}

	
	public function getViadettabcars($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettabcarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettabcars === null) {
			if ($this->isNew()) {
			   $this->collViadettabcars = array();
			} else {

				$criteria->add(ViadettabcarPeer::VIAREGTIPTAB_ID, $this->getId());

				ViadettabcarPeer::addSelectColumns($criteria);
				$this->collViadettabcars = ViadettabcarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViadettabcarPeer::VIAREGTIPTAB_ID, $this->getId());

				ViadettabcarPeer::addSelectColumns($criteria);
				if (!isset($this->lastViadettabcarCriteria) || !$this->lastViadettabcarCriteria->equals($criteria)) {
					$this->collViadettabcars = ViadettabcarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViadettabcarCriteria = $criteria;
		return $this->collViadettabcars;
	}

	
	public function countViadettabcars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViadettabcarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViadettabcarPeer::VIAREGTIPTAB_ID, $this->getId());

		return ViadettabcarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViadettabcar(Viadettabcar $l)
	{
		$this->collViadettabcars[] = $l;
		$l->setViaregtiptab($this);
	}

} 