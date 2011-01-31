<?php


abstract class BaseCatest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomest;

	
	protected $collCatcius;

	
	protected $lastCatciuCriteria = null;

	
	protected $collCatmuns;

	
	protected $lastCatmunCriteria = null;

	
	protected $collCatpars;

	
	protected $lastCatparCriteria = null;

	
	protected $collCatprcs;

	
	protected $lastCatprcCriteria = null;

	
	protected $collCatreginms;

	
	protected $lastCatreginmCriteria = null;

	
	protected $collCatregpers;

	
	protected $lastCatregperCriteria = null;

	
	protected $collCatsecs;

	
	protected $lastCatsecCriteria = null;

	
	protected $collCatsubprcs;

	
	protected $lastCatsubprcCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomest()
  {

    return trim($this->nomest);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatestPeer::ID;
      }
  
	} 
	
	public function setNomest($v)
	{

    if ($this->nomest !== $v) {
        $this->nomest = $v;
        $this->modifiedColumns[] = CatestPeer::NOMEST;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomest = $rs->getString($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catest object", $e);
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
			$con = Propel::getConnection(CatestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatestPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatestPeer::DATABASE_NAME);
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
					$pk = CatestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatestPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatcius !== null) {
				foreach($this->collCatcius as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmuns !== null) {
				foreach($this->collCatmuns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatpars !== null) {
				foreach($this->collCatpars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatprcs !== null) {
				foreach($this->collCatprcs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatreginms !== null) {
				foreach($this->collCatreginms as $referrerFK) {
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

			if ($this->collCatsecs !== null) {
				foreach($this->collCatsecs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatsubprcs !== null) {
				foreach($this->collCatsubprcs as $referrerFK) {
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


			if (($retval = CatestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatcius !== null) {
					foreach($this->collCatcius as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmuns !== null) {
					foreach($this->collCatmuns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatpars !== null) {
					foreach($this->collCatpars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatprcs !== null) {
					foreach($this->collCatprcs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatreginms !== null) {
					foreach($this->collCatreginms as $referrerFK) {
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

				if ($this->collCatsecs !== null) {
					foreach($this->collCatsecs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatsubprcs !== null) {
					foreach($this->collCatsubprcs as $referrerFK) {
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
		$pos = CatestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomest();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomest(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomest($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomest($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatestPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatestPeer::ID)) $criteria->add(CatestPeer::ID, $this->id);
		if ($this->isColumnModified(CatestPeer::NOMEST)) $criteria->add(CatestPeer::NOMEST, $this->nomest);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatestPeer::DATABASE_NAME);

		$criteria->add(CatestPeer::ID, $this->id);

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

		$copyObj->setNomest($this->nomest);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatcius() as $relObj) {
				$copyObj->addCatciu($relObj->copy($deepCopy));
			}

			foreach($this->getCatmuns() as $relObj) {
				$copyObj->addCatmun($relObj->copy($deepCopy));
			}

			foreach($this->getCatpars() as $relObj) {
				$copyObj->addCatpar($relObj->copy($deepCopy));
			}

			foreach($this->getCatprcs() as $relObj) {
				$copyObj->addCatprc($relObj->copy($deepCopy));
			}

			foreach($this->getCatreginms() as $relObj) {
				$copyObj->addCatreginm($relObj->copy($deepCopy));
			}

			foreach($this->getCatregpers() as $relObj) {
				$copyObj->addCatregper($relObj->copy($deepCopy));
			}

			foreach($this->getCatsecs() as $relObj) {
				$copyObj->addCatsec($relObj->copy($deepCopy));
			}

			foreach($this->getCatsubprcs() as $relObj) {
				$copyObj->addCatsubprc($relObj->copy($deepCopy));
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
			self::$peer = new CatestPeer();
		}
		return self::$peer;
	}

	
	public function initCatcius()
	{
		if ($this->collCatcius === null) {
			$this->collCatcius = array();
		}
	}

	
	public function getCatcius($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatciuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcius === null) {
			if ($this->isNew()) {
			   $this->collCatcius = array();
			} else {

				$criteria->add(CatciuPeer::CATEST_ID, $this->getId());

				CatciuPeer::addSelectColumns($criteria);
				$this->collCatcius = CatciuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatciuPeer::CATEST_ID, $this->getId());

				CatciuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatciuCriteria) || !$this->lastCatciuCriteria->equals($criteria)) {
					$this->collCatcius = CatciuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatciuCriteria = $criteria;
		return $this->collCatcius;
	}

	
	public function countCatcius($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatciuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatciuPeer::CATEST_ID, $this->getId());

		return CatciuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatciu(Catciu $l)
	{
		$this->collCatcius[] = $l;
		$l->setCatest($this);
	}

	
	public function initCatmuns()
	{
		if ($this->collCatmuns === null) {
			$this->collCatmuns = array();
		}
	}

	
	public function getCatmuns($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmunPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmuns === null) {
			if ($this->isNew()) {
			   $this->collCatmuns = array();
			} else {

				$criteria->add(CatmunPeer::CATEST_ID, $this->getId());

				CatmunPeer::addSelectColumns($criteria);
				$this->collCatmuns = CatmunPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmunPeer::CATEST_ID, $this->getId());

				CatmunPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmunCriteria) || !$this->lastCatmunCriteria->equals($criteria)) {
					$this->collCatmuns = CatmunPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmunCriteria = $criteria;
		return $this->collCatmuns;
	}

	
	public function countCatmuns($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmunPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmunPeer::CATEST_ID, $this->getId());

		return CatmunPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmun(Catmun $l)
	{
		$this->collCatmuns[] = $l;
		$l->setCatest($this);
	}


	
	public function getCatmunsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmunPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmuns === null) {
			if ($this->isNew()) {
				$this->collCatmuns = array();
			} else {

				$criteria->add(CatmunPeer::CATEST_ID, $this->getId());

				$this->collCatmuns = CatmunPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmunPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatmunCriteria) || !$this->lastCatmunCriteria->equals($criteria)) {
				$this->collCatmuns = CatmunPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatmunCriteria = $criteria;

		return $this->collCatmuns;
	}

	
	public function initCatpars()
	{
		if ($this->collCatpars === null) {
			$this->collCatpars = array();
		}
	}

	
	public function getCatpars($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatpars === null) {
			if ($this->isNew()) {
			   $this->collCatpars = array();
			} else {

				$criteria->add(CatparPeer::CATEST_ID, $this->getId());

				CatparPeer::addSelectColumns($criteria);
				$this->collCatpars = CatparPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatparPeer::CATEST_ID, $this->getId());

				CatparPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatparCriteria) || !$this->lastCatparCriteria->equals($criteria)) {
					$this->collCatpars = CatparPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatparCriteria = $criteria;
		return $this->collCatpars;
	}

	
	public function countCatpars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatparPeer::CATEST_ID, $this->getId());

		return CatparPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatpar(Catpar $l)
	{
		$this->collCatpars[] = $l;
		$l->setCatest($this);
	}


	
	public function getCatparsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatpars === null) {
			if ($this->isNew()) {
				$this->collCatpars = array();
			} else {

				$criteria->add(CatparPeer::CATEST_ID, $this->getId());

				$this->collCatpars = CatparPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatparPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatparCriteria) || !$this->lastCatparCriteria->equals($criteria)) {
				$this->collCatpars = CatparPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatparCriteria = $criteria;

		return $this->collCatpars;
	}


	
	public function getCatparsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatpars === null) {
			if ($this->isNew()) {
				$this->collCatpars = array();
			} else {

				$criteria->add(CatparPeer::CATEST_ID, $this->getId());

				$this->collCatpars = CatparPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatparPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatparCriteria) || !$this->lastCatparCriteria->equals($criteria)) {
				$this->collCatpars = CatparPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatparCriteria = $criteria;

		return $this->collCatpars;
	}

	
	public function initCatprcs()
	{
		if ($this->collCatprcs === null) {
			$this->collCatprcs = array();
		}
	}

	
	public function getCatprcs($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatprcs === null) {
			if ($this->isNew()) {
			   $this->collCatprcs = array();
			} else {

				$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

				CatprcPeer::addSelectColumns($criteria);
				$this->collCatprcs = CatprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

				CatprcPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
					$this->collCatprcs = CatprcPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatprcCriteria = $criteria;
		return $this->collCatprcs;
	}

	
	public function countCatprcs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

		return CatprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatprc(Catprc $l)
	{
		$this->collCatprcs[] = $l;
		$l->setCatest($this);
	}


	
	public function getCatprcsJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatprcs === null) {
			if ($this->isNew()) {
				$this->collCatprcs = array();
			} else {

				$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
				$this->collCatprcs = CatprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatprcCriteria = $criteria;

		return $this->collCatprcs;
	}


	
	public function getCatprcsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatprcs === null) {
			if ($this->isNew()) {
				$this->collCatprcs = array();
			} else {

				$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
				$this->collCatprcs = CatprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatprcCriteria = $criteria;

		return $this->collCatprcs;
	}


	
	public function getCatprcsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatprcs === null) {
			if ($this->isNew()) {
				$this->collCatprcs = array();
			} else {

				$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
				$this->collCatprcs = CatprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatprcCriteria = $criteria;

		return $this->collCatprcs;
	}


	
	public function getCatprcsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatprcs === null) {
			if ($this->isNew()) {
				$this->collCatprcs = array();
			} else {

				$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
				$this->collCatprcs = CatprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatprcCriteria = $criteria;

		return $this->collCatprcs;
	}

	
	public function initCatreginms()
	{
		if ($this->collCatreginms === null) {
			$this->collCatreginms = array();
		}
	}

	
	public function getCatreginms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
			   $this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
					$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatreginmCriteria = $criteria;
		return $this->collCatreginms;
	}

	
	public function countCatreginms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginm(Catreginm $l)
	{
		$this->collCatreginms[] = $l;
		$l->setCatest($this);
	}


	
	public function getCatreginmsJoinCatsubprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatman($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramofroId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramolatId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattramoRelatedByCattramolat2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCattipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatconinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatusoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatconsoc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatrut($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatcarterinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatproter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginms === null) {
			if ($this->isNew()) {
				$this->collCatreginms = array();
			} else {

				$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				$this->collCatregpers = CatregperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

		$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

		return CatregperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatregper(Catregper $l)
	{
		$this->collCatregpers[] = $l;
		$l->setCatest($this);
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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}


	
	public function getCatregpersJoinCatdivgeo($criteria = null, $con = null)
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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
	}

	
	public function initCatsecs()
	{
		if ($this->collCatsecs === null) {
			$this->collCatsecs = array();
		}
	}

	
	public function getCatsecs($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsecs === null) {
			if ($this->isNew()) {
			   $this->collCatsecs = array();
			} else {

				$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

				CatsecPeer::addSelectColumns($criteria);
				$this->collCatsecs = CatsecPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

				CatsecPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatsecCriteria) || !$this->lastCatsecCriteria->equals($criteria)) {
					$this->collCatsecs = CatsecPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatsecCriteria = $criteria;
		return $this->collCatsecs;
	}

	
	public function countCatsecs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

		return CatsecPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatsec(Catsec $l)
	{
		$this->collCatsecs[] = $l;
		$l->setCatest($this);
	}


	
	public function getCatsecsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsecs === null) {
			if ($this->isNew()) {
				$this->collCatsecs = array();
			} else {

				$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

				$this->collCatsecs = CatsecPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsecCriteria) || !$this->lastCatsecCriteria->equals($criteria)) {
				$this->collCatsecs = CatsecPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatsecCriteria = $criteria;

		return $this->collCatsecs;
	}


	
	public function getCatsecsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsecs === null) {
			if ($this->isNew()) {
				$this->collCatsecs = array();
			} else {

				$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

				$this->collCatsecs = CatsecPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsecCriteria) || !$this->lastCatsecCriteria->equals($criteria)) {
				$this->collCatsecs = CatsecPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatsecCriteria = $criteria;

		return $this->collCatsecs;
	}


	
	public function getCatsecsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsecs === null) {
			if ($this->isNew()) {
				$this->collCatsecs = array();
			} else {

				$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

				$this->collCatsecs = CatsecPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsecPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsecCriteria) || !$this->lastCatsecCriteria->equals($criteria)) {
				$this->collCatsecs = CatsecPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatsecCriteria = $criteria;

		return $this->collCatsecs;
	}

	
	public function initCatsubprcs()
	{
		if ($this->collCatsubprcs === null) {
			$this->collCatsubprcs = array();
		}
	}

	
	public function getCatsubprcs($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
			   $this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				CatsubprcPeer::addSelectColumns($criteria);
				$this->collCatsubprcs = CatsubprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				CatsubprcPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
					$this->collCatsubprcs = CatsubprcPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatsubprcCriteria = $criteria;
		return $this->collCatsubprcs;
	}

	
	public function countCatsubprcs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

		return CatsubprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatsubprc(Catsubprc $l)
	{
		$this->collCatsubprcs[] = $l;
		$l->setCatest($this);
	}


	
	public function getCatsubprcsJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatman($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatman($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatsubprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatsubprcs === null) {
			if ($this->isNew()) {
				$this->collCatsubprcs = array();
			} else {

				$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATEST_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}

} 