<?php


abstract class BaseCatdivgeo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddivgeo;


	
	protected $desdivgeo;


	
	protected $id;

	
	protected $collCatbarurbs;

	
	protected $lastCatbarurbCriteria = null;

	
	protected $collCatmans;

	
	protected $lastCatmanCriteria = null;

	
	protected $collCatregpers;

	
	protected $lastCatregperCriteria = null;

	
	protected $collCattramos;

	
	protected $lastCattramoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddivgeo()
  {

    return trim($this->coddivgeo);

  }
  
  public function getDesdivgeo()
  {

    return trim($this->desdivgeo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddivgeo($v)
	{

    if ($this->coddivgeo !== $v) {
        $this->coddivgeo = $v;
        $this->modifiedColumns[] = CatdivgeoPeer::CODDIVGEO;
      }
  
	} 
	
	public function setDesdivgeo($v)
	{

    if ($this->desdivgeo !== $v) {
        $this->desdivgeo = $v;
        $this->modifiedColumns[] = CatdivgeoPeer::DESDIVGEO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatdivgeoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddivgeo = $rs->getString($startcol + 0);

      $this->desdivgeo = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catdivgeo object", $e);
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
			$con = Propel::getConnection(CatdivgeoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatdivgeoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatdivgeoPeer::DATABASE_NAME);
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
					$pk = CatdivgeoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatdivgeoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatbarurbs !== null) {
				foreach($this->collCatbarurbs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmans !== null) {
				foreach($this->collCatmans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatregpers !== null) {
				foreach($this->collCatregpers as $referrerFK) {
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


			if (($retval = CatdivgeoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatbarurbs !== null) {
					foreach($this->collCatbarurbs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmans !== null) {
					foreach($this->collCatmans as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatregpers !== null) {
					foreach($this->collCatregpers as $referrerFK) {
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
		$pos = CatdivgeoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddivgeo();
				break;
			case 1:
				return $this->getDesdivgeo();
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
		$keys = CatdivgeoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddivgeo(),
			$keys[1] => $this->getDesdivgeo(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatdivgeoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddivgeo($value);
				break;
			case 1:
				$this->setDesdivgeo($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatdivgeoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddivgeo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdivgeo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatdivgeoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatdivgeoPeer::CODDIVGEO)) $criteria->add(CatdivgeoPeer::CODDIVGEO, $this->coddivgeo);
		if ($this->isColumnModified(CatdivgeoPeer::DESDIVGEO)) $criteria->add(CatdivgeoPeer::DESDIVGEO, $this->desdivgeo);
		if ($this->isColumnModified(CatdivgeoPeer::ID)) $criteria->add(CatdivgeoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatdivgeoPeer::DATABASE_NAME);

		$criteria->add(CatdivgeoPeer::ID, $this->id);

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

		$copyObj->setCoddivgeo($this->coddivgeo);

		$copyObj->setDesdivgeo($this->desdivgeo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatbarurbs() as $relObj) {
				$copyObj->addCatbarurb($relObj->copy($deepCopy));
			}

			foreach($this->getCatmans() as $relObj) {
				$copyObj->addCatman($relObj->copy($deepCopy));
			}

			foreach($this->getCatregpers() as $relObj) {
				$copyObj->addCatregper($relObj->copy($deepCopy));
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
			self::$peer = new CatdivgeoPeer();
		}
		return self::$peer;
	}

	
	public function initCatbarurbs()
	{
		if ($this->collCatbarurbs === null) {
			$this->collCatbarurbs = array();
		}
	}

	
	public function getCatbarurbs($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatbarurbPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatbarurbs === null) {
			if ($this->isNew()) {
			   $this->collCatbarurbs = array();
			} else {

				$criteria->add(CatbarurbPeer::CATDIVGEO_ID, $this->getId());

				CatbarurbPeer::addSelectColumns($criteria);
				$this->collCatbarurbs = CatbarurbPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatbarurbPeer::CATDIVGEO_ID, $this->getId());

				CatbarurbPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatbarurbCriteria) || !$this->lastCatbarurbCriteria->equals($criteria)) {
					$this->collCatbarurbs = CatbarurbPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatbarurbCriteria = $criteria;
		return $this->collCatbarurbs;
	}

	
	public function countCatbarurbs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatbarurbPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatbarurbPeer::CATDIVGEO_ID, $this->getId());

		return CatbarurbPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatbarurb(Catbarurb $l)
	{
		$this->collCatbarurbs[] = $l;
		$l->setCatdivgeo($this);
	}

	
	public function initCatmans()
	{
		if ($this->collCatmans === null) {
			$this->collCatmans = array();
		}
	}

	
	public function getCatmans($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
			   $this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmans = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
					$this->collCatmans = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanCriteria = $criteria;
		return $this->collCatmans;
	}

	
	public function countCatmans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatman(Catman $l)
	{
		$this->collCatmans[] = $l;
		$l->setCatdivgeo($this);
	}


	
	public function getCatmansJoinCattramoRelatedByCattramonorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramonorId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattipviaRelatedByTiplinnorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinnorId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinnorId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattramoRelatedByCattramosurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramosurId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattipviaRelatedByTiplinsurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinsurId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinsurId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattramoRelatedByCattramoestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramoestId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattipviaRelatedByTiplinestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinestId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinestId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattramoRelatedByCattramooesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattramoRelatedByCattramooesId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}


	
	public function getCatmansJoinCattipviaRelatedByTiplinoesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmans === null) {
			if ($this->isNew()) {
				$this->collCatmans = array();
			} else {

				$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinoesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatmanCriteria) || !$this->lastCatmanCriteria->equals($criteria)) {
				$this->collCatmans = CatmanPeer::doSelectJoinCattipviaRelatedByTiplinoesId($criteria, $con);
			}
		}
		$this->lastCatmanCriteria = $criteria;

		return $this->collCatmans;
	}

	
	public function initCatregpers()
	{
		if ($this->collCatregpers === null) {
			$this->collCatregpers = array();
		}
	}

	
	public function getCatregpers($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
			   $this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				$this->collCatregpers = CatregperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
					$this->collCatregpers = CatregperPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatregperCriteria = $criteria;
		return $this->collCatregpers;
	}

	
	public function countCatregpers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

		return CatregperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatregper(Catregper $l)
	{
		$this->collCatregpers[] = $l;
		$l->setCatdivgeo($this);
	}


	
	public function getCatregpersJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCattramoRelatedByCattramofroId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCattramoRelatedByCattramolatId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCattramoRelatedByCattramolat2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpers === null) {
			if ($this->isNew()) {
				$this->collCatregpers = array();
			} else {

				$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
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

				$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

				CattramoPeer::addSelectColumns($criteria);
				$this->collCattramos = CattramoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

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

		$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

		return CattramoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCattramo(Cattramo $l)
	{
		$this->collCattramos[] = $l;
		$l->setCatdivgeo($this);
	}


	
	public function getCattramosJoinCattipvia($criteria = null, $con = null)
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

				$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCattipvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCattipvia($criteria, $con);
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

				$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatsenvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

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

				$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatdirvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATDIVGEO_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCatdirvia($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}

} 