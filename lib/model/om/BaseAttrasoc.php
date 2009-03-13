<?php


abstract class BaseAttrasoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedtra;


	
	protected $nomtra;


	
	protected $apetra;


	
	protected $nrocol;


	
	protected $id;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedtra()
  {

    return trim($this->cedtra);

  }
  
  public function getNomtra()
  {

    return trim($this->nomtra);

  }
  
  public function getApetra()
  {

    return trim($this->apetra);

  }
  
  public function getNrocol()
  {

    return trim($this->nrocol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedtra($v)
	{

    if ($this->cedtra !== $v) {
        $this->cedtra = $v;
        $this->modifiedColumns[] = AttrasocPeer::CEDTRA;
      }
  
	} 
	
	public function setNomtra($v)
	{

    if ($this->nomtra !== $v) {
        $this->nomtra = $v;
        $this->modifiedColumns[] = AttrasocPeer::NOMTRA;
      }
  
	} 
	
	public function setApetra($v)
	{

    if ($this->apetra !== $v) {
        $this->apetra = $v;
        $this->modifiedColumns[] = AttrasocPeer::APETRA;
      }
  
	} 
	
	public function setNrocol($v)
	{

    if ($this->nrocol !== $v) {
        $this->nrocol = $v;
        $this->modifiedColumns[] = AttrasocPeer::NROCOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AttrasocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedtra = $rs->getString($startcol + 0);

      $this->nomtra = $rs->getString($startcol + 1);

      $this->apetra = $rs->getString($startcol + 2);

      $this->nrocol = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Attrasoc object", $e);
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
			$con = Propel::getConnection(AttrasocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AttrasocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AttrasocPeer::DATABASE_NAME);
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
					$pk = AttrasocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AttrasocPeer::doUpdate($this, $con);
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


			if (($retval = AttrasocPeer::doValidate($this, $columns)) !== true) {
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
		$pos = AttrasocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedtra();
				break;
			case 1:
				return $this->getNomtra();
				break;
			case 2:
				return $this->getApetra();
				break;
			case 3:
				return $this->getNrocol();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttrasocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedtra(),
			$keys[1] => $this->getNomtra(),
			$keys[2] => $this->getApetra(),
			$keys[3] => $this->getNrocol(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AttrasocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedtra($value);
				break;
			case 1:
				$this->setNomtra($value);
				break;
			case 2:
				$this->setApetra($value);
				break;
			case 3:
				$this->setNrocol($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttrasocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApetra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNrocol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AttrasocPeer::DATABASE_NAME);

		if ($this->isColumnModified(AttrasocPeer::CEDTRA)) $criteria->add(AttrasocPeer::CEDTRA, $this->cedtra);
		if ($this->isColumnModified(AttrasocPeer::NOMTRA)) $criteria->add(AttrasocPeer::NOMTRA, $this->nomtra);
		if ($this->isColumnModified(AttrasocPeer::APETRA)) $criteria->add(AttrasocPeer::APETRA, $this->apetra);
		if ($this->isColumnModified(AttrasocPeer::NROCOL)) $criteria->add(AttrasocPeer::NROCOL, $this->nrocol);
		if ($this->isColumnModified(AttrasocPeer::ID)) $criteria->add(AttrasocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AttrasocPeer::DATABASE_NAME);

		$criteria->add(AttrasocPeer::ID, $this->id);

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

		$copyObj->setCedtra($this->cedtra);

		$copyObj->setNomtra($this->nomtra);

		$copyObj->setApetra($this->apetra);

		$copyObj->setNrocol($this->nrocol);


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
			self::$peer = new AttrasocPeer();
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
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

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
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAttrasoc($this);
	}


	
	public function getAtayudassJoinCaordcom($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtciudadanoRelatedByAtsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtciudadanoRelatedByAtbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinCaprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinCaprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinCaprovee($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtmedico($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
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

				$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTRASOC_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}

} 