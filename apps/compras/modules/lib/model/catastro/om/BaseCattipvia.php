<?php


abstract class BaseCattipvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desvia;


	
	protected $id;

	
	protected $collCatmansRelatedByTiplinnorId;

	
	protected $lastCatmanRelatedByTiplinnorIdCriteria = null;

	
	protected $collCatmansRelatedByTiplinsurId;

	
	protected $lastCatmanRelatedByTiplinsurIdCriteria = null;

	
	protected $collCatmansRelatedByTiplinestId;

	
	protected $lastCatmanRelatedByTiplinestIdCriteria = null;

	
	protected $collCatmansRelatedByTiplinoesId;

	
	protected $lastCatmanRelatedByTiplinoesIdCriteria = null;

	
	protected $collCattramos;

	
	protected $lastCattramoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesvia()
  {

    return trim($this->desvia);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesvia($v)
	{

    if ($this->desvia !== $v) {
        $this->desvia = $v;
        $this->modifiedColumns[] = CattipviaPeer::DESVIA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CattipviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desvia = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cattipvia object", $e);
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
			$con = Propel::getConnection(CattipviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CattipviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CattipviaPeer::DATABASE_NAME);
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
					$pk = CattipviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CattipviaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatmansRelatedByTiplinnorId !== null) {
				foreach($this->collCatmansRelatedByTiplinnorId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmansRelatedByTiplinsurId !== null) {
				foreach($this->collCatmansRelatedByTiplinsurId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmansRelatedByTiplinestId !== null) {
				foreach($this->collCatmansRelatedByTiplinestId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmansRelatedByTiplinoesId !== null) {
				foreach($this->collCatmansRelatedByTiplinoesId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCattramos !== null) {
				foreach($this->collCattramos as $referrerFK) {
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


			if (($retval = CattipviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatmansRelatedByTiplinnorId !== null) {
					foreach($this->collCatmansRelatedByTiplinnorId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmansRelatedByTiplinsurId !== null) {
					foreach($this->collCatmansRelatedByTiplinsurId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmansRelatedByTiplinestId !== null) {
					foreach($this->collCatmansRelatedByTiplinestId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmansRelatedByTiplinoesId !== null) {
					foreach($this->collCatmansRelatedByTiplinoesId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCattramos !== null) {
					foreach($this->collCattramos as $referrerFK) {
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
		$pos = CattipviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesvia();
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
		$keys = CattipviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesvia(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CattipviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesvia($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CattipviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesvia($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CattipviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CattipviaPeer::DESVIA)) $criteria->add(CattipviaPeer::DESVIA, $this->desvia);
		if ($this->isColumnModified(CattipviaPeer::ID)) $criteria->add(CattipviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CattipviaPeer::DATABASE_NAME);

		$criteria->add(CattipviaPeer::ID, $this->id);

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

		$copyObj->setDesvia($this->desvia);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatmansRelatedByTiplinnorId() as $relObj) {
				$copyObj->addCatmanRelatedByTiplinnorId($relObj->copy($deepCopy));
			}

			foreach($this->getCatmansRelatedByTiplinsurId() as $relObj) {
				$copyObj->addCatmanRelatedByTiplinsurId($relObj->copy($deepCopy));
			}

			foreach($this->getCatmansRelatedByTiplinestId() as $relObj) {
				$copyObj->addCatmanRelatedByTiplinestId($relObj->copy($deepCopy));
			}

			foreach($this->getCatmansRelatedByTiplinoesId() as $relObj) {
				$copyObj->addCatmanRelatedByTiplinoesId($relObj->copy($deepCopy));
			}

			foreach($this->getCattramos() as $relObj) {
				$copyObj->addCattramo($relObj->copy($deepCopy));
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
			self::$peer = new CattipviaPeer();
		}
		return self::$peer;
	}

	
	public function initCatmansRelatedByTiplinnorId()
	{
		if ($this->collCatmansRelatedByTiplinnorId === null) {
			$this->collCatmansRelatedByTiplinnorId = array();
		}
	}

	
	public function getCatmansRelatedByTiplinnorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinnorId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByTiplinnorId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByTiplinnorIdCriteria) || !$this->lastCatmanRelatedByTiplinnorIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByTiplinnorIdCriteria = $criteria;
		return $this->collCatmansRelatedByTiplinnorId;
	}

	
	public function countCatmansRelatedByTiplinnorId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByTiplinnorId(Catman $l)
	{
		$this->collCatmansRelatedByTiplinnorId[] = $l;
		$l->setCattipviaRelatedByTiplinnorId($this);
	}


	
	public function getCatmansRelatedByTiplinnorIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinnorId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinnorId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinnorIdCriteria) || !$this->lastCatmanRelatedByTiplinnorIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinnorIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinnorId;
	}


	
	public function getCatmansRelatedByTiplinnorIdJoinCattramoRelatedByCattramonorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinnorId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinnorId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinnorIdCriteria) || !$this->lastCatmanRelatedByTiplinnorIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinnorIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinnorId;
	}


	
	public function getCatmansRelatedByTiplinnorIdJoinCattramoRelatedByCattramosurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinnorId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinnorId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinnorIdCriteria) || !$this->lastCatmanRelatedByTiplinnorIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinnorIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinnorId;
	}


	
	public function getCatmansRelatedByTiplinnorIdJoinCattramoRelatedByCattramoestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinnorId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinnorId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinnorIdCriteria) || !$this->lastCatmanRelatedByTiplinnorIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinnorIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinnorId;
	}


	
	public function getCatmansRelatedByTiplinnorIdJoinCattramoRelatedByCattramooesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinnorId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinnorId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINNOR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinnorIdCriteria) || !$this->lastCatmanRelatedByTiplinnorIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinnorId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinnorIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinnorId;
	}

	
	public function initCatmansRelatedByTiplinsurId()
	{
		if ($this->collCatmansRelatedByTiplinsurId === null) {
			$this->collCatmansRelatedByTiplinsurId = array();
		}
	}

	
	public function getCatmansRelatedByTiplinsurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinsurId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByTiplinsurId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByTiplinsurIdCriteria) || !$this->lastCatmanRelatedByTiplinsurIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByTiplinsurIdCriteria = $criteria;
		return $this->collCatmansRelatedByTiplinsurId;
	}

	
	public function countCatmansRelatedByTiplinsurId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByTiplinsurId(Catman $l)
	{
		$this->collCatmansRelatedByTiplinsurId[] = $l;
		$l->setCattipviaRelatedByTiplinsurId($this);
	}


	
	public function getCatmansRelatedByTiplinsurIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinsurId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinsurId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinsurIdCriteria) || !$this->lastCatmanRelatedByTiplinsurIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinsurIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinsurId;
	}


	
	public function getCatmansRelatedByTiplinsurIdJoinCattramoRelatedByCattramonorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinsurId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinsurId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinsurIdCriteria) || !$this->lastCatmanRelatedByTiplinsurIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinsurIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinsurId;
	}


	
	public function getCatmansRelatedByTiplinsurIdJoinCattramoRelatedByCattramosurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinsurId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinsurId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinsurIdCriteria) || !$this->lastCatmanRelatedByTiplinsurIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinsurIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinsurId;
	}


	
	public function getCatmansRelatedByTiplinsurIdJoinCattramoRelatedByCattramoestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinsurId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinsurId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinsurIdCriteria) || !$this->lastCatmanRelatedByTiplinsurIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinsurIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinsurId;
	}


	
	public function getCatmansRelatedByTiplinsurIdJoinCattramoRelatedByCattramooesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinsurId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinsurId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINSUR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinsurIdCriteria) || !$this->lastCatmanRelatedByTiplinsurIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinsurId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinsurIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinsurId;
	}

	
	public function initCatmansRelatedByTiplinestId()
	{
		if ($this->collCatmansRelatedByTiplinestId === null) {
			$this->collCatmansRelatedByTiplinestId = array();
		}
	}

	
	public function getCatmansRelatedByTiplinestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinestId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByTiplinestId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByTiplinestIdCriteria) || !$this->lastCatmanRelatedByTiplinestIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByTiplinestIdCriteria = $criteria;
		return $this->collCatmansRelatedByTiplinestId;
	}

	
	public function countCatmansRelatedByTiplinestId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByTiplinestId(Catman $l)
	{
		$this->collCatmansRelatedByTiplinestId[] = $l;
		$l->setCattipviaRelatedByTiplinestId($this);
	}


	
	public function getCatmansRelatedByTiplinestIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinestId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinestId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinestIdCriteria) || !$this->lastCatmanRelatedByTiplinestIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinestIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinestId;
	}


	
	public function getCatmansRelatedByTiplinestIdJoinCattramoRelatedByCattramonorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinestId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinestId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinestIdCriteria) || !$this->lastCatmanRelatedByTiplinestIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinestIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinestId;
	}


	
	public function getCatmansRelatedByTiplinestIdJoinCattramoRelatedByCattramosurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinestId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinestId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinestIdCriteria) || !$this->lastCatmanRelatedByTiplinestIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinestIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinestId;
	}


	
	public function getCatmansRelatedByTiplinestIdJoinCattramoRelatedByCattramoestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinestId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinestId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinestIdCriteria) || !$this->lastCatmanRelatedByTiplinestIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinestIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinestId;
	}


	
	public function getCatmansRelatedByTiplinestIdJoinCattramoRelatedByCattramooesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinestId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinestId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINEST_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinestIdCriteria) || !$this->lastCatmanRelatedByTiplinestIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinestId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinestIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinestId;
	}

	
	public function initCatmansRelatedByTiplinoesId()
	{
		if ($this->collCatmansRelatedByTiplinoesId === null) {
			$this->collCatmansRelatedByTiplinoesId = array();
		}
	}

	
	public function getCatmansRelatedByTiplinoesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinoesId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByTiplinoesId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByTiplinoesIdCriteria) || !$this->lastCatmanRelatedByTiplinoesIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByTiplinoesIdCriteria = $criteria;
		return $this->collCatmansRelatedByTiplinoesId;
	}

	
	public function countCatmansRelatedByTiplinoesId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByTiplinoesId(Catman $l)
	{
		$this->collCatmansRelatedByTiplinoesId[] = $l;
		$l->setCattipviaRelatedByTiplinoesId($this);
	}


	
	public function getCatmansRelatedByTiplinoesIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinoesId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinoesId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinoesIdCriteria) || !$this->lastCatmanRelatedByTiplinoesIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinoesIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinoesId;
	}


	
	public function getCatmansRelatedByTiplinoesIdJoinCattramoRelatedByCattramonorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinoesId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinoesId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinoesIdCriteria) || !$this->lastCatmanRelatedByTiplinoesIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinoesIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinoesId;
	}


	
	public function getCatmansRelatedByTiplinoesIdJoinCattramoRelatedByCattramosurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinoesId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinoesId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinoesIdCriteria) || !$this->lastCatmanRelatedByTiplinoesIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinoesIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinoesId;
	}


	
	public function getCatmansRelatedByTiplinoesIdJoinCattramoRelatedByCattramoestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinoesId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinoesId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinoesIdCriteria) || !$this->lastCatmanRelatedByTiplinoesIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinoesIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinoesId;
	}


	
	public function getCatmansRelatedByTiplinoesIdJoinCattramoRelatedByCattramooesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByTiplinoesId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByTiplinoesId = array();
			} else {

				$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::TIPLINOES_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByTiplinoesIdCriteria) || !$this->lastCatmanRelatedByTiplinoesIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByTiplinoesId = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByTiplinoesIdCriteria = $criteria;

		return $this->collCatmansRelatedByTiplinoesId;
	}

	
	public function initCattramos()
	{
		if ($this->collCattramos === null) {
			$this->collCattramos = array();
		}
	}

	
	public function getCattramos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
			   $this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

				CattramoPeer::addSelectColumns($criteria);
				$this->collCattramos = CattramoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

				CattramoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
					$this->collCattramos = CattramoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCattramoCriteria = $criteria;
		return $this->collCattramos;
	}

	
	public function countCattramos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

		return CattramoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCattramo(Cattramo $l)
	{
		$this->collCattramos[] = $l;
		$l->setCattipvia($this);
	}


	
	public function getCattramosJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
				$this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}


	
	public function getCattramosJoinCatsenvia($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
				$this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatsenvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCatsenvia($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}


	
	public function getCattramosJoinCatdirvia($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
				$this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatdirvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATTIPVIA_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCatdirvia($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}

} 