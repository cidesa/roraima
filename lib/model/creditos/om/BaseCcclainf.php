<?php


abstract class BaseCcclainf extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nominf;


	
	protected $desinf;


	
	protected $aplbar;

	
	protected $collCcinforms;

	
	protected $lastCcinformCriteria = null;

	
	protected $collCcsolinfs;

	
	protected $lastCcsolinfCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNominf()
  {

    return trim($this->nominf);

  }
  
  public function getDesinf()
  {

    return trim($this->desinf);

  }
  
  public function getAplbar()
  {

    return trim($this->aplbar);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcclainfPeer::ID;
      }
  
	} 
	
	public function setNominf($v)
	{

    if ($this->nominf !== $v) {
        $this->nominf = $v;
        $this->modifiedColumns[] = CcclainfPeer::NOMINF;
      }
  
	} 
	
	public function setDesinf($v)
	{

    if ($this->desinf !== $v) {
        $this->desinf = $v;
        $this->modifiedColumns[] = CcclainfPeer::DESINF;
      }
  
	} 
	
	public function setAplbar($v)
	{

    if ($this->aplbar !== $v) {
        $this->aplbar = $v;
        $this->modifiedColumns[] = CcclainfPeer::APLBAR;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nominf = $rs->getString($startcol + 1);

      $this->desinf = $rs->getString($startcol + 2);

      $this->aplbar = $rs->getString($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccclainf object", $e);
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
			$con = Propel::getConnection(CcclainfPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcclainfPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcclainfPeer::DATABASE_NAME);
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
					$pk = CcclainfPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcclainfPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcinforms !== null) {
				foreach($this->collCcinforms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolinfs !== null) {
				foreach($this->collCcsolinfs as $referrerFK) {
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


			if (($retval = CcclainfPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcinforms !== null) {
					foreach($this->collCcinforms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolinfs !== null) {
					foreach($this->collCcsolinfs as $referrerFK) {
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
		$pos = CcclainfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNominf();
				break;
			case 2:
				return $this->getDesinf();
				break;
			case 3:
				return $this->getAplbar();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcclainfPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNominf(),
			$keys[2] => $this->getDesinf(),
			$keys[3] => $this->getAplbar(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcclainfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNominf($value);
				break;
			case 2:
				$this->setDesinf($value);
				break;
			case 3:
				$this->setAplbar($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcclainfPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNominf($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesinf($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAplbar($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcclainfPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcclainfPeer::ID)) $criteria->add(CcclainfPeer::ID, $this->id);
		if ($this->isColumnModified(CcclainfPeer::NOMINF)) $criteria->add(CcclainfPeer::NOMINF, $this->nominf);
		if ($this->isColumnModified(CcclainfPeer::DESINF)) $criteria->add(CcclainfPeer::DESINF, $this->desinf);
		if ($this->isColumnModified(CcclainfPeer::APLBAR)) $criteria->add(CcclainfPeer::APLBAR, $this->aplbar);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcclainfPeer::DATABASE_NAME);

		$criteria->add(CcclainfPeer::ID, $this->id);

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

		$copyObj->setNominf($this->nominf);

		$copyObj->setDesinf($this->desinf);

		$copyObj->setAplbar($this->aplbar);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcinforms() as $relObj) {
				$copyObj->addCcinform($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolinfs() as $relObj) {
				$copyObj->addCcsolinf($relObj->copy($deepCopy));
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
			self::$peer = new CcclainfPeer();
		}
		return self::$peer;
	}

	
	public function initCcinforms()
	{
		if ($this->collCcinforms === null) {
			$this->collCcinforms = array();
		}
	}

	
	public function getCcinforms($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
			   $this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				$this->collCcinforms = CcinformPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
					$this->collCcinforms = CcinformPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcinformCriteria = $criteria;
		return $this->collCcinforms;
	}

	
	public function countCcinforms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

		return CcinformPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcinform(Ccinform $l)
	{
		$this->collCcinforms[] = $l;
		$l->setCcclainf($this);
	}


	
	public function getCcinformsJoinCcgerencRelatedByCcgerencId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcgerencId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcgerencId($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcgerencRelatedByCcresbarId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcresbarId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCCLAINF_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcresbarId($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}

	
	public function initCcsolinfs()
	{
		if ($this->collCcsolinfs === null) {
			$this->collCcsolinfs = array();
		}
	}

	
	public function getCcsolinfs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
			   $this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

				CcsolinfPeer::addSelectColumns($criteria);
				$this->collCcsolinfs = CcsolinfPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

				CcsolinfPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
					$this->collCcsolinfs = CcsolinfPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolinfCriteria = $criteria;
		return $this->collCcsolinfs;
	}

	
	public function countCcsolinfs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

		return CcsolinfPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolinf(Ccsolinf $l)
	{
		$this->collCcsolinfs[] = $l;
		$l->setCcclainf($this);
	}


	
	public function getCcsolinfsJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
				$this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

			if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcsolinfCriteria = $criteria;

		return $this->collCcsolinfs;
	}


	
	public function getCcsolinfsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
				$this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolinfPeer::CCCLAINF_ID, $this->getId());

			if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcsolinfCriteria = $criteria;

		return $this->collCcsolinfs;
	}

} 