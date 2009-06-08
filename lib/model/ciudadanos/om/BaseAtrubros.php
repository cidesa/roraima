<?php


abstract class BaseAtrubros extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $attipayu_id;


	
	protected $desrub;


	
	protected $id;

	
	protected $aAttipayu;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $collAtdetrecrubs;

	
	protected $lastAtdetrecrubCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAttipayuId()
  {

    return $this->attipayu_id;

  }
  
  public function getDesrub()
  {

    return trim($this->desrub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAttipayuId($v)
	{

    if ($this->attipayu_id !== $v) {
        $this->attipayu_id = $v;
        $this->modifiedColumns[] = AtrubrosPeer::ATTIPAYU_ID;
      }
  
		if ($this->aAttipayu !== null && $this->aAttipayu->getId() !== $v) {
			$this->aAttipayu = null;
		}

	} 
	
	public function setDesrub($v)
	{

    if ($this->desrub !== $v) {
        $this->desrub = $v;
        $this->modifiedColumns[] = AtrubrosPeer::DESRUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtrubrosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->attipayu_id = $rs->getInt($startcol + 0);

      $this->desrub = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atrubros object", $e);
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
			$con = Propel::getConnection(AtrubrosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtrubrosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtrubrosPeer::DATABASE_NAME);
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


												
			if ($this->aAttipayu !== null) {
				if ($this->aAttipayu->isModified()) {
					$affectedRows += $this->aAttipayu->save($con);
				}
				$this->setAttipayu($this->aAttipayu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtrubrosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtrubrosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
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


												
			if ($this->aAttipayu !== null) {
				if (!$this->aAttipayu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipayu->getValidationFailures());
				}
			}


			if (($retval = AtrubrosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
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
		$pos = AtrubrosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAttipayuId();
				break;
			case 1:
				return $this->getDesrub();
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
		$keys = AtrubrosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAttipayuId(),
			$keys[1] => $this->getDesrub(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtrubrosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAttipayuId($value);
				break;
			case 1:
				$this->setDesrub($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtrubrosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAttipayuId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrub($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtrubrosPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtrubrosPeer::ATTIPAYU_ID)) $criteria->add(AtrubrosPeer::ATTIPAYU_ID, $this->attipayu_id);
		if ($this->isColumnModified(AtrubrosPeer::DESRUB)) $criteria->add(AtrubrosPeer::DESRUB, $this->desrub);
		if ($this->isColumnModified(AtrubrosPeer::ID)) $criteria->add(AtrubrosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtrubrosPeer::DATABASE_NAME);

		$criteria->add(AtrubrosPeer::ID, $this->id);

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

		$copyObj->setAttipayuId($this->attipayu_id);

		$copyObj->setDesrub($this->desrub);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
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
			self::$peer = new AtrubrosPeer();
		}
		return self::$peer;
	}

	
	public function setAttipayu($v)
	{


		if ($v === null) {
			$this->setAttipayuId(NULL);
		} else {
			$this->setAttipayuId($v->getId());
		}


		$this->aAttipayu = $v;
	}


	
	public function getAttipayu($con = null)
	{
		if ($this->aAttipayu === null && ($this->attipayu_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAttipayuPeer.php';

			$this->aAttipayu = AttipayuPeer::retrieveByPK($this->attipayu_id, $con);

			
		}
		return $this->aAttipayu;
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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

		$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtrubros($this);
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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtestayu($criteria = null, $con = null)
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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATRUBROS_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
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

				$criteria->add(AtdetrecrubPeer::ATRUBROS_ID, $this->getId());

				AtdetrecrubPeer::addSelectColumns($criteria);
				$this->collAtdetrecrubs = AtdetrecrubPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetrecrubPeer::ATRUBROS_ID, $this->getId());

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

		$criteria->add(AtdetrecrubPeer::ATRUBROS_ID, $this->getId());

		return AtdetrecrubPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetrecrub(Atdetrecrub $l)
	{
		$this->collAtdetrecrubs[] = $l;
		$l->setAtrubros($this);
	}


	
	public function getAtdetrecrubsJoinAtrecaud($criteria = null, $con = null)
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

				$criteria->add(AtdetrecrubPeer::ATRUBROS_ID, $this->getId());

				$this->collAtdetrecrubs = AtdetrecrubPeer::doSelectJoinAtrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetrecrubPeer::ATRUBROS_ID, $this->getId());

			if (!isset($this->lastAtdetrecrubCriteria) || !$this->lastAtdetrecrubCriteria->equals($criteria)) {
				$this->collAtdetrecrubs = AtdetrecrubPeer::doSelectJoinAtrecaud($criteria, $con);
			}
		}
		$this->lastAtdetrecrubCriteria = $criteria;

		return $this->collAtdetrecrubs;
	}

} 