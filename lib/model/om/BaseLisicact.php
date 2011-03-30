<?php


abstract class BaseLisicact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dessicact;


	
	protected $id;

	
	protected $collLireglics;

	
	protected $lastLireglicCriteria = null;

	
	protected $collLiprebass;

	
	protected $lastLiprebasCriteria = null;

	
	protected $collLimemorans;

	
	protected $lastLimemoranCriteria = null;

	
	protected $collLirecomens;

	
	protected $lastLirecomenCriteria = null;

	
	protected $collLiptocues;

	
	protected $lastLiptocueCriteria = null;

	
	protected $collLisolegrs;

	
	protected $lastLisolegrCriteria = null;

	
	protected $collLiplieesps;

	
	protected $lastLiplieespCriteria = null;

	
	protected $collLiregofes;

	
	protected $lastLiregofeCriteria = null;

	
	protected $collLianaofes;

	
	protected $lastLianaofeCriteria = null;

	
	protected $collLiptocuecons;

	
	protected $lastLiptocueconCriteria = null;

	
	protected $collLinotifics;

	
	protected $lastLinotificCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDessicact()
  {

    return trim($this->dessicact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDessicact($v)
	{

    if ($this->dessicact !== $v) {
        $this->dessicact = $v;
        $this->modifiedColumns[] = LisicactPeer::DESSICACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LisicactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->dessicact = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lisicact object", $e);
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
			$con = Propel::getConnection(LisicactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LisicactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LisicactPeer::DATABASE_NAME);
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
					$pk = LisicactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LisicactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLireglics !== null) {
				foreach($this->collLireglics as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiprebass !== null) {
				foreach($this->collLiprebass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLimemorans !== null) {
				foreach($this->collLimemorans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLirecomens !== null) {
				foreach($this->collLirecomens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiptocues !== null) {
				foreach($this->collLiptocues as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLisolegrs !== null) {
				foreach($this->collLisolegrs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiplieesps !== null) {
				foreach($this->collLiplieesps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregofes !== null) {
				foreach($this->collLiregofes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLianaofes !== null) {
				foreach($this->collLianaofes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiptocuecons !== null) {
				foreach($this->collLiptocuecons as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLinotifics !== null) {
				foreach($this->collLinotifics as $referrerFK) {
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


			if (($retval = LisicactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLireglics !== null) {
					foreach($this->collLireglics as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiprebass !== null) {
					foreach($this->collLiprebass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLimemorans !== null) {
					foreach($this->collLimemorans as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLirecomens !== null) {
					foreach($this->collLirecomens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiptocues !== null) {
					foreach($this->collLiptocues as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLisolegrs !== null) {
					foreach($this->collLisolegrs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiplieesps !== null) {
					foreach($this->collLiplieesps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregofes !== null) {
					foreach($this->collLiregofes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLianaofes !== null) {
					foreach($this->collLianaofes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiptocuecons !== null) {
					foreach($this->collLiptocuecons as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLinotifics !== null) {
					foreach($this->collLinotifics as $referrerFK) {
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
		$pos = LisicactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDessicact();
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
		$keys = LisicactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDessicact(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisicactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDessicact($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisicactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDessicact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LisicactPeer::DATABASE_NAME);

		if ($this->isColumnModified(LisicactPeer::DESSICACT)) $criteria->add(LisicactPeer::DESSICACT, $this->dessicact);
		if ($this->isColumnModified(LisicactPeer::ID)) $criteria->add(LisicactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LisicactPeer::DATABASE_NAME);

		$criteria->add(LisicactPeer::ID, $this->id);

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

		$copyObj->setDessicact($this->dessicact);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLireglics() as $relObj) {
				$copyObj->addLireglic($relObj->copy($deepCopy));
			}

			foreach($this->getLiprebass() as $relObj) {
				$copyObj->addLiprebas($relObj->copy($deepCopy));
			}

			foreach($this->getLimemorans() as $relObj) {
				$copyObj->addLimemoran($relObj->copy($deepCopy));
			}

			foreach($this->getLirecomens() as $relObj) {
				$copyObj->addLirecomen($relObj->copy($deepCopy));
			}

			foreach($this->getLiptocues() as $relObj) {
				$copyObj->addLiptocue($relObj->copy($deepCopy));
			}

			foreach($this->getLisolegrs() as $relObj) {
				$copyObj->addLisolegr($relObj->copy($deepCopy));
			}

			foreach($this->getLiplieesps() as $relObj) {
				$copyObj->addLiplieesp($relObj->copy($deepCopy));
			}

			foreach($this->getLiregofes() as $relObj) {
				$copyObj->addLiregofe($relObj->copy($deepCopy));
			}

			foreach($this->getLianaofes() as $relObj) {
				$copyObj->addLianaofe($relObj->copy($deepCopy));
			}

			foreach($this->getLiptocuecons() as $relObj) {
				$copyObj->addLiptocuecon($relObj->copy($deepCopy));
			}

			foreach($this->getLinotifics() as $relObj) {
				$copyObj->addLinotific($relObj->copy($deepCopy));
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
			self::$peer = new LisicactPeer();
		}
		return self::$peer;
	}

	
	public function initLireglics()
	{
		if ($this->collLireglics === null) {
			$this->collLireglics = array();
		}
	}

	
	public function getLireglics($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
			   $this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
					$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLireglicCriteria = $criteria;
		return $this->collLireglics;
	}

	
	public function countLireglics($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

		return LireglicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLireglic(Lireglic $l)
	{
		$this->collLireglics[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLireglicsJoinLitiplic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
				$this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

				$this->collLireglics = LireglicPeer::doSelectJoinLitiplic($criteria, $con);
			}
		} else {
									
			$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
				$this->collLireglics = LireglicPeer::doSelectJoinLitiplic($criteria, $con);
			}
		}
		$this->lastLireglicCriteria = $criteria;

		return $this->collLireglics;
	}

	
	public function initLiprebass()
	{
		if ($this->collLiprebass === null) {
			$this->collLiprebass = array();
		}
	}

	
	public function getLiprebass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiprebasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiprebass === null) {
			if ($this->isNew()) {
			   $this->collLiprebass = array();
			} else {

				$criteria->add(LiprebasPeer::LISICACT_ID, $this->getId());

				LiprebasPeer::addSelectColumns($criteria);
				$this->collLiprebass = LiprebasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiprebasPeer::LISICACT_ID, $this->getId());

				LiprebasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiprebasCriteria) || !$this->lastLiprebasCriteria->equals($criteria)) {
					$this->collLiprebass = LiprebasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiprebasCriteria = $criteria;
		return $this->collLiprebass;
	}

	
	public function countLiprebass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiprebasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiprebasPeer::LISICACT_ID, $this->getId());

		return LiprebasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiprebas(Liprebas $l)
	{
		$this->collLiprebass[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLimemorans()
	{
		if ($this->collLimemorans === null) {
			$this->collLimemorans = array();
		}
	}

	
	public function getLimemorans($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLimemoranPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimemorans === null) {
			if ($this->isNew()) {
			   $this->collLimemorans = array();
			} else {

				$criteria->add(LimemoranPeer::LISICACT_ID, $this->getId());

				LimemoranPeer::addSelectColumns($criteria);
				$this->collLimemorans = LimemoranPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimemoranPeer::LISICACT_ID, $this->getId());

				LimemoranPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimemoranCriteria) || !$this->lastLimemoranCriteria->equals($criteria)) {
					$this->collLimemorans = LimemoranPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimemoranCriteria = $criteria;
		return $this->collLimemorans;
	}

	
	public function countLimemorans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLimemoranPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimemoranPeer::LISICACT_ID, $this->getId());

		return LimemoranPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimemoran(Limemoran $l)
	{
		$this->collLimemorans[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLirecomens()
	{
		if ($this->collLirecomens === null) {
			$this->collLirecomens = array();
		}
	}

	
	public function getLirecomens($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLirecomenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLirecomens === null) {
			if ($this->isNew()) {
			   $this->collLirecomens = array();
			} else {

				$criteria->add(LirecomenPeer::LISICACT_ID, $this->getId());

				LirecomenPeer::addSelectColumns($criteria);
				$this->collLirecomens = LirecomenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LirecomenPeer::LISICACT_ID, $this->getId());

				LirecomenPeer::addSelectColumns($criteria);
				if (!isset($this->lastLirecomenCriteria) || !$this->lastLirecomenCriteria->equals($criteria)) {
					$this->collLirecomens = LirecomenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLirecomenCriteria = $criteria;
		return $this->collLirecomens;
	}

	
	public function countLirecomens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLirecomenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LirecomenPeer::LISICACT_ID, $this->getId());

		return LirecomenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLirecomen(Lirecomen $l)
	{
		$this->collLirecomens[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiptocues()
	{
		if ($this->collLiptocues === null) {
			$this->collLiptocues = array();
		}
	}

	
	public function getLiptocues($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiptocuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiptocues === null) {
			if ($this->isNew()) {
			   $this->collLiptocues = array();
			} else {

				$criteria->add(LiptocuePeer::LISICACT_ID, $this->getId());

				LiptocuePeer::addSelectColumns($criteria);
				$this->collLiptocues = LiptocuePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiptocuePeer::LISICACT_ID, $this->getId());

				LiptocuePeer::addSelectColumns($criteria);
				if (!isset($this->lastLiptocueCriteria) || !$this->lastLiptocueCriteria->equals($criteria)) {
					$this->collLiptocues = LiptocuePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiptocueCriteria = $criteria;
		return $this->collLiptocues;
	}

	
	public function countLiptocues($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiptocuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiptocuePeer::LISICACT_ID, $this->getId());

		return LiptocuePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiptocue(Liptocue $l)
	{
		$this->collLiptocues[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLisolegrs()
	{
		if ($this->collLisolegrs === null) {
			$this->collLisolegrs = array();
		}
	}

	
	public function getLisolegrs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLisolegrPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolegrs === null) {
			if ($this->isNew()) {
			   $this->collLisolegrs = array();
			} else {

				$criteria->add(LisolegrPeer::LISICACT_ID, $this->getId());

				LisolegrPeer::addSelectColumns($criteria);
				$this->collLisolegrs = LisolegrPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LisolegrPeer::LISICACT_ID, $this->getId());

				LisolegrPeer::addSelectColumns($criteria);
				if (!isset($this->lastLisolegrCriteria) || !$this->lastLisolegrCriteria->equals($criteria)) {
					$this->collLisolegrs = LisolegrPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLisolegrCriteria = $criteria;
		return $this->collLisolegrs;
	}

	
	public function countLisolegrs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLisolegrPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LisolegrPeer::LISICACT_ID, $this->getId());

		return LisolegrPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLisolegr(Lisolegr $l)
	{
		$this->collLisolegrs[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiplieesps()
	{
		if ($this->collLiplieesps === null) {
			$this->collLiplieesps = array();
		}
	}

	
	public function getLiplieesps($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiplieespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiplieesps === null) {
			if ($this->isNew()) {
			   $this->collLiplieesps = array();
			} else {

				$criteria->add(LiplieespPeer::LISICACT_ID, $this->getId());

				LiplieespPeer::addSelectColumns($criteria);
				$this->collLiplieesps = LiplieespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiplieespPeer::LISICACT_ID, $this->getId());

				LiplieespPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiplieespCriteria) || !$this->lastLiplieespCriteria->equals($criteria)) {
					$this->collLiplieesps = LiplieespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiplieespCriteria = $criteria;
		return $this->collLiplieesps;
	}

	
	public function countLiplieesps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiplieespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiplieespPeer::LISICACT_ID, $this->getId());

		return LiplieespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiplieesp(Liplieesp $l)
	{
		$this->collLiplieesps[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiregofes()
	{
		if ($this->collLiregofes === null) {
			$this->collLiregofes = array();
		}
	}

	
	public function getLiregofes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregofes === null) {
			if ($this->isNew()) {
			   $this->collLiregofes = array();
			} else {

				$criteria->add(LiregofePeer::LISICACT_ID, $this->getId());

				LiregofePeer::addSelectColumns($criteria);
				$this->collLiregofes = LiregofePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregofePeer::LISICACT_ID, $this->getId());

				LiregofePeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregofeCriteria) || !$this->lastLiregofeCriteria->equals($criteria)) {
					$this->collLiregofes = LiregofePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregofeCriteria = $criteria;
		return $this->collLiregofes;
	}

	
	public function countLiregofes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiregofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregofePeer::LISICACT_ID, $this->getId());

		return LiregofePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregofe(Liregofe $l)
	{
		$this->collLiregofes[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLianaofes()
	{
		if ($this->collLianaofes === null) {
			$this->collLianaofes = array();
		}
	}

	
	public function getLianaofes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLianaofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLianaofes === null) {
			if ($this->isNew()) {
			   $this->collLianaofes = array();
			} else {

				$criteria->add(LianaofePeer::LISICACT_ID, $this->getId());

				LianaofePeer::addSelectColumns($criteria);
				$this->collLianaofes = LianaofePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LianaofePeer::LISICACT_ID, $this->getId());

				LianaofePeer::addSelectColumns($criteria);
				if (!isset($this->lastLianaofeCriteria) || !$this->lastLianaofeCriteria->equals($criteria)) {
					$this->collLianaofes = LianaofePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLianaofeCriteria = $criteria;
		return $this->collLianaofes;
	}

	
	public function countLianaofes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLianaofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LianaofePeer::LISICACT_ID, $this->getId());

		return LianaofePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLianaofe(Lianaofe $l)
	{
		$this->collLianaofes[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiptocuecons()
	{
		if ($this->collLiptocuecons === null) {
			$this->collLiptocuecons = array();
		}
	}

	
	public function getLiptocuecons($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiptocueconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiptocuecons === null) {
			if ($this->isNew()) {
			   $this->collLiptocuecons = array();
			} else {

				$criteria->add(LiptocueconPeer::LISICACT_ID, $this->getId());

				LiptocueconPeer::addSelectColumns($criteria);
				$this->collLiptocuecons = LiptocueconPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiptocueconPeer::LISICACT_ID, $this->getId());

				LiptocueconPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiptocueconCriteria) || !$this->lastLiptocueconCriteria->equals($criteria)) {
					$this->collLiptocuecons = LiptocueconPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiptocueconCriteria = $criteria;
		return $this->collLiptocuecons;
	}

	
	public function countLiptocuecons($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiptocueconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiptocueconPeer::LISICACT_ID, $this->getId());

		return LiptocueconPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiptocuecon(Liptocuecon $l)
	{
		$this->collLiptocuecons[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLinotifics()
	{
		if ($this->collLinotifics === null) {
			$this->collLinotifics = array();
		}
	}

	
	public function getLinotifics($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLinotificPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLinotifics === null) {
			if ($this->isNew()) {
			   $this->collLinotifics = array();
			} else {

				$criteria->add(LinotificPeer::LISICACT_ID, $this->getId());

				LinotificPeer::addSelectColumns($criteria);
				$this->collLinotifics = LinotificPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LinotificPeer::LISICACT_ID, $this->getId());

				LinotificPeer::addSelectColumns($criteria);
				if (!isset($this->lastLinotificCriteria) || !$this->lastLinotificCriteria->equals($criteria)) {
					$this->collLinotifics = LinotificPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLinotificCriteria = $criteria;
		return $this->collLinotifics;
	}

	
	public function countLinotifics($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLinotificPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LinotificPeer::LISICACT_ID, $this->getId());

		return LinotificPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLinotific(Linotific $l)
	{
		$this->collLinotifics[] = $l;
		$l->setLisicact($this);
	}

} 