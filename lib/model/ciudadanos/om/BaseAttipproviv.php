<?php


abstract class BaseAttipproviv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipproviv;


	
	protected $id;

	
	protected $collAtciudadanos;

	
	protected $lastAtciudadanoCriteria = null;

	
	protected $collAtestsocecos;

	
	protected $lastAtestsocecoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipproviv()
  {

    return trim($this->tipproviv);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipproviv($v)
	{

    if ($this->tipproviv !== $v) {
        $this->tipproviv = $v;
        $this->modifiedColumns[] = AttipprovivPeer::TIPPROVIV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AttipprovivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipproviv = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Attipproviv object", $e);
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
			$con = Propel::getConnection(AttipprovivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AttipprovivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AttipprovivPeer::DATABASE_NAME);
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
					$pk = AttipprovivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AttipprovivPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtciudadanos !== null) {
				foreach($this->collAtciudadanos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtestsocecos !== null) {
				foreach($this->collAtestsocecos as $referrerFK) {
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


			if (($retval = AttipprovivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtciudadanos !== null) {
					foreach($this->collAtciudadanos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtestsocecos !== null) {
					foreach($this->collAtestsocecos as $referrerFK) {
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
		$pos = AttipprovivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipproviv();
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
		$keys = AttipprovivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipproviv(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AttipprovivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipproviv($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttipprovivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipproviv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AttipprovivPeer::DATABASE_NAME);

		if ($this->isColumnModified(AttipprovivPeer::TIPPROVIV)) $criteria->add(AttipprovivPeer::TIPPROVIV, $this->tipproviv);
		if ($this->isColumnModified(AttipprovivPeer::ID)) $criteria->add(AttipprovivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AttipprovivPeer::DATABASE_NAME);

		$criteria->add(AttipprovivPeer::ID, $this->id);

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

		$copyObj->setTipproviv($this->tipproviv);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtciudadanos() as $relObj) {
				$copyObj->addAtciudadano($relObj->copy($deepCopy));
			}

			foreach($this->getAtestsocecos() as $relObj) {
				$copyObj->addAtestsoceco($relObj->copy($deepCopy));
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
			self::$peer = new AttipprovivPeer();
		}
		return self::$peer;
	}

	
	public function initAtciudadanos()
	{
		if ($this->collAtciudadanos === null) {
			$this->collAtciudadanos = array();
		}
	}

	
	public function getAtciudadanos($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
			   $this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
					$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;
		return $this->collAtciudadanos;
	}

	
	public function countAtciudadanos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

		return AtciudadanoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtciudadano(Atciudadano $l)
	{
		$this->collAtciudadanos[] = $l;
		$l->setAttipproviv($this);
	}


	
	public function getAtciudadanosJoinAtestados($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtmunicipios($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmunicipios($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmunicipios($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtparroquias($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtparroquias($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtparroquias($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttiping($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtinsrefier($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtmisiones($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmisiones($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmisiones($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}

	
	public function initAtestsocecos()
	{
		if ($this->collAtestsocecos === null) {
			$this->collAtestsocecos = array();
		}
	}

	
	public function getAtestsocecos($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
			   $this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

				AtestsocecoPeer::addSelectColumns($criteria);
				$this->collAtestsocecos = AtestsocecoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

				AtestsocecoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
					$this->collAtestsocecos = AtestsocecoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;
		return $this->collAtestsocecos;
	}

	
	public function countAtestsocecos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

		return AtestsocecoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtestsoceco(Atestsoceco $l)
	{
		$this->collAtestsocecos[] = $l;
		$l->setAttipproviv($this);
	}


	
	public function getAtestsocecosJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
				$this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}


	
	public function getAtestsocecosJoinAtciudadano($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
				$this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}


	
	public function getAtestsocecosJoinAttipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
				$this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}

} 