<?php


abstract class BaseAttipayu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codayu;


	
	protected $desayu;


	
	protected $codpre;


	
	protected $id;

	
	protected $collAtrecayus;

	
	protected $lastAtrecayuCriteria = null;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $collAtrubross;

	
	protected $lastAtrubrosCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodayu()
  {

    return trim($this->codayu);

  }
  
  public function getDesayu()
  {

    return trim($this->desayu);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodayu($v)
	{

    if ($this->codayu !== $v) {
        $this->codayu = $v;
        $this->modifiedColumns[] = AttipayuPeer::CODAYU;
      }
  
	} 
	
	public function setDesayu($v)
	{

    if ($this->desayu !== $v) {
        $this->desayu = $v;
        $this->modifiedColumns[] = AttipayuPeer::DESAYU;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = AttipayuPeer::CODPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AttipayuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codayu = $rs->getString($startcol + 0);

      $this->desayu = $rs->getString($startcol + 1);

      $this->codpre = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Attipayu object", $e);
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
			$con = Propel::getConnection(AttipayuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AttipayuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AttipayuPeer::DATABASE_NAME);
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
					$pk = AttipayuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AttipayuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtrecayus !== null) {
				foreach($this->collAtrecayus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtrubross !== null) {
				foreach($this->collAtrubross as $referrerFK) {
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


			if (($retval = AttipayuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtrecayus !== null) {
					foreach($this->collAtrecayus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtrubross !== null) {
					foreach($this->collAtrubross as $referrerFK) {
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
		$pos = AttipayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodayu();
				break;
			case 1:
				return $this->getDesayu();
				break;
			case 2:
				return $this->getCodpre();
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
		$keys = AttipayuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodayu(),
			$keys[1] => $this->getDesayu(),
			$keys[2] => $this->getCodpre(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AttipayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodayu($value);
				break;
			case 1:
				$this->setDesayu($value);
				break;
			case 2:
				$this->setCodpre($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttipayuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodayu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesayu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AttipayuPeer::DATABASE_NAME);

		if ($this->isColumnModified(AttipayuPeer::CODAYU)) $criteria->add(AttipayuPeer::CODAYU, $this->codayu);
		if ($this->isColumnModified(AttipayuPeer::DESAYU)) $criteria->add(AttipayuPeer::DESAYU, $this->desayu);
		if ($this->isColumnModified(AttipayuPeer::CODPRE)) $criteria->add(AttipayuPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(AttipayuPeer::ID)) $criteria->add(AttipayuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AttipayuPeer::DATABASE_NAME);

		$criteria->add(AttipayuPeer::ID, $this->id);

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

		$copyObj->setCodayu($this->codayu);

		$copyObj->setDesayu($this->desayu);

		$copyObj->setCodpre($this->codpre);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtrecayus() as $relObj) {
				$copyObj->addAtrecayu($relObj->copy($deepCopy));
			}

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
			}

			foreach($this->getAtrubross() as $relObj) {
				$copyObj->addAtrubros($relObj->copy($deepCopy));
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
			self::$peer = new AttipayuPeer();
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
				include_once 'lib/model/om/BaseAtrecayuPeer.php';
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

				$criteria->add(AtrecayuPeer::ATTIPAYU_ID, $this->getId());

				AtrecayuPeer::addSelectColumns($criteria);
				$this->collAtrecayus = AtrecayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtrecayuPeer::ATTIPAYU_ID, $this->getId());

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
				include_once 'lib/model/om/BaseAtrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtrecayuPeer::ATTIPAYU_ID, $this->getId());

		return AtrecayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtrecayu(Atrecayu $l)
	{
		$this->collAtrecayus[] = $l;
		$l->setAttipayu($this);
	}


	
	public function getAtrecayusJoinAtrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtrecayuPeer.php';
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

				$criteria->add(AtrecayuPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtrecayus = AtrecayuPeer::doSelectJoinAtrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(AtrecayuPeer::ATTIPAYU_ID, $this->getId());

			if (!isset($this->lastAtrecayuCriteria) || !$this->lastAtrecayuCriteria->equals($criteria)) {
				$this->collAtrecayus = AtrecayuPeer::doSelectJoinAtrecaud($criteria, $con);
			}
		}
		$this->lastAtrecayuCriteria = $criteria;

		return $this->collAtrecayus;
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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

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

		$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAttipayu($this);
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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtciudadanoRelatedByAtbenefi($criteria, $con);
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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttrasoc($criteria = null, $con = null)
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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtprovee($criteria = null, $con = null)
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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
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

				$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}

	
	public function initAtrubross()
	{
		if ($this->collAtrubross === null) {
			$this->collAtrubross = array();
		}
	}

	
	public function getAtrubross($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtrubrosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtrubross === null) {
			if ($this->isNew()) {
			   $this->collAtrubross = array();
			} else {

				$criteria->add(AtrubrosPeer::ATTIPAYU_ID, $this->getId());

				AtrubrosPeer::addSelectColumns($criteria);
				$this->collAtrubross = AtrubrosPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtrubrosPeer::ATTIPAYU_ID, $this->getId());

				AtrubrosPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtrubrosCriteria) || !$this->lastAtrubrosCriteria->equals($criteria)) {
					$this->collAtrubross = AtrubrosPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtrubrosCriteria = $criteria;
		return $this->collAtrubross;
	}

	
	public function countAtrubross($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtrubrosPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtrubrosPeer::ATTIPAYU_ID, $this->getId());

		return AtrubrosPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtrubros(Atrubros $l)
	{
		$this->collAtrubross[] = $l;
		$l->setAttipayu($this);
	}

} 