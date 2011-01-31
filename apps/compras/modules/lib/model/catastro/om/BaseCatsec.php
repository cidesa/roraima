<?php


abstract class BaseCatsec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $catpar_id;


	
	protected $catmun_id;


	
	protected $catciu_id;


	
	protected $catest_id;


	
	protected $nomsec;


	
	protected $alisec;

	
	protected $aCatpar;

	
	protected $aCatmun;

	
	protected $aCatciu;

	
	protected $aCatest;

	
	protected $collCatprcs;

	
	protected $lastCatprcCriteria = null;

	
	protected $collCatreginms;

	
	protected $lastCatreginmCriteria = null;

	
	protected $collCatregpers;

	
	protected $lastCatregperCriteria = null;

	
	protected $collCatsubprcs;

	
	protected $lastCatsubprcCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCatparId()
  {

    return $this->catpar_id;

  }
  
  public function getCatmunId()
  {

    return $this->catmun_id;

  }
  
  public function getCatciuId()
  {

    return $this->catciu_id;

  }
  
  public function getCatestId()
  {

    return $this->catest_id;

  }
  
  public function getNomsec()
  {

    return trim($this->nomsec);

  }
  
  public function getAlisec()
  {

    return trim($this->alisec);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatsecPeer::ID;
      }
  
	} 
	
	public function setCatparId($v)
	{

    if ($this->catpar_id !== $v) {
        $this->catpar_id = $v;
        $this->modifiedColumns[] = CatsecPeer::CATPAR_ID;
      }
  
		if ($this->aCatpar !== null && $this->aCatpar->getId() !== $v) {
			$this->aCatpar = null;
		}

	} 
	
	public function setCatmunId($v)
	{

    if ($this->catmun_id !== $v) {
        $this->catmun_id = $v;
        $this->modifiedColumns[] = CatsecPeer::CATMUN_ID;
      }
  
		if ($this->aCatmun !== null && $this->aCatmun->getId() !== $v) {
			$this->aCatmun = null;
		}

	} 
	
	public function setCatciuId($v)
	{

    if ($this->catciu_id !== $v) {
        $this->catciu_id = $v;
        $this->modifiedColumns[] = CatsecPeer::CATCIU_ID;
      }
  
		if ($this->aCatciu !== null && $this->aCatciu->getId() !== $v) {
			$this->aCatciu = null;
		}

	} 
	
	public function setCatestId($v)
	{

    if ($this->catest_id !== $v) {
        $this->catest_id = $v;
        $this->modifiedColumns[] = CatsecPeer::CATEST_ID;
      }
  
		if ($this->aCatest !== null && $this->aCatest->getId() !== $v) {
			$this->aCatest = null;
		}

	} 
	
	public function setNomsec($v)
	{

    if ($this->nomsec !== $v) {
        $this->nomsec = $v;
        $this->modifiedColumns[] = CatsecPeer::NOMSEC;
      }
  
	} 
	
	public function setAlisec($v)
	{

    if ($this->alisec !== $v) {
        $this->alisec = $v;
        $this->modifiedColumns[] = CatsecPeer::ALISEC;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->catpar_id = $rs->getInt($startcol + 1);

      $this->catmun_id = $rs->getInt($startcol + 2);

      $this->catciu_id = $rs->getInt($startcol + 3);

      $this->catest_id = $rs->getInt($startcol + 4);

      $this->nomsec = $rs->getString($startcol + 5);

      $this->alisec = $rs->getString($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catsec object", $e);
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
			$con = Propel::getConnection(CatsecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatsecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatsecPeer::DATABASE_NAME);
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


												
			if ($this->aCatpar !== null) {
				if ($this->aCatpar->isModified()) {
					$affectedRows += $this->aCatpar->save($con);
				}
				$this->setCatpar($this->aCatpar);
			}

			if ($this->aCatmun !== null) {
				if ($this->aCatmun->isModified()) {
					$affectedRows += $this->aCatmun->save($con);
				}
				$this->setCatmun($this->aCatmun);
			}

			if ($this->aCatciu !== null) {
				if ($this->aCatciu->isModified()) {
					$affectedRows += $this->aCatciu->save($con);
				}
				$this->setCatciu($this->aCatciu);
			}

			if ($this->aCatest !== null) {
				if ($this->aCatest->isModified()) {
					$affectedRows += $this->aCatest->save($con);
				}
				$this->setCatest($this->aCatest);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatsecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatsecPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aCatpar !== null) {
				if (!$this->aCatpar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatpar->getValidationFailures());
				}
			}

			if ($this->aCatmun !== null) {
				if (!$this->aCatmun->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatmun->getValidationFailures());
				}
			}

			if ($this->aCatciu !== null) {
				if (!$this->aCatciu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatciu->getValidationFailures());
				}
			}

			if ($this->aCatest !== null) {
				if (!$this->aCatest->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatest->getValidationFailures());
				}
			}


			if (($retval = CatsecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = CatsecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCatparId();
				break;
			case 2:
				return $this->getCatmunId();
				break;
			case 3:
				return $this->getCatciuId();
				break;
			case 4:
				return $this->getCatestId();
				break;
			case 5:
				return $this->getNomsec();
				break;
			case 6:
				return $this->getAlisec();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatsecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCatparId(),
			$keys[2] => $this->getCatmunId(),
			$keys[3] => $this->getCatciuId(),
			$keys[4] => $this->getCatestId(),
			$keys[5] => $this->getNomsec(),
			$keys[6] => $this->getAlisec(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatsecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCatparId($value);
				break;
			case 2:
				$this->setCatmunId($value);
				break;
			case 3:
				$this->setCatciuId($value);
				break;
			case 4:
				$this->setCatestId($value);
				break;
			case 5:
				$this->setNomsec($value);
				break;
			case 6:
				$this->setAlisec($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatsecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatparId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCatmunId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCatciuId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCatestId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomsec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAlisec($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatsecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatsecPeer::ID)) $criteria->add(CatsecPeer::ID, $this->id);
		if ($this->isColumnModified(CatsecPeer::CATPAR_ID)) $criteria->add(CatsecPeer::CATPAR_ID, $this->catpar_id);
		if ($this->isColumnModified(CatsecPeer::CATMUN_ID)) $criteria->add(CatsecPeer::CATMUN_ID, $this->catmun_id);
		if ($this->isColumnModified(CatsecPeer::CATCIU_ID)) $criteria->add(CatsecPeer::CATCIU_ID, $this->catciu_id);
		if ($this->isColumnModified(CatsecPeer::CATEST_ID)) $criteria->add(CatsecPeer::CATEST_ID, $this->catest_id);
		if ($this->isColumnModified(CatsecPeer::NOMSEC)) $criteria->add(CatsecPeer::NOMSEC, $this->nomsec);
		if ($this->isColumnModified(CatsecPeer::ALISEC)) $criteria->add(CatsecPeer::ALISEC, $this->alisec);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatsecPeer::DATABASE_NAME);

		$criteria->add(CatsecPeer::ID, $this->id);

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

		$copyObj->setCatparId($this->catpar_id);

		$copyObj->setCatmunId($this->catmun_id);

		$copyObj->setCatciuId($this->catciu_id);

		$copyObj->setCatestId($this->catest_id);

		$copyObj->setNomsec($this->nomsec);

		$copyObj->setAlisec($this->alisec);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatprcs() as $relObj) {
				$copyObj->addCatprc($relObj->copy($deepCopy));
			}

			foreach($this->getCatreginms() as $relObj) {
				$copyObj->addCatreginm($relObj->copy($deepCopy));
			}

			foreach($this->getCatregpers() as $relObj) {
				$copyObj->addCatregper($relObj->copy($deepCopy));
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
			self::$peer = new CatsecPeer();
		}
		return self::$peer;
	}

	
	public function setCatpar($v)
	{


		if ($v === null) {
			$this->setCatparId(NULL);
		} else {
			$this->setCatparId($v->getId());
		}


		$this->aCatpar = $v;
	}


	
	public function getCatpar($con = null)
	{
		if ($this->aCatpar === null && ($this->catpar_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatparPeer.php';

			$this->aCatpar = CatparPeer::retrieveByPK($this->catpar_id, $con);

			
		}
		return $this->aCatpar;
	}

	
	public function setCatmun($v)
	{


		if ($v === null) {
			$this->setCatmunId(NULL);
		} else {
			$this->setCatmunId($v->getId());
		}


		$this->aCatmun = $v;
	}


	
	public function getCatmun($con = null)
	{
		if ($this->aCatmun === null && ($this->catmun_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatmunPeer.php';

			$this->aCatmun = CatmunPeer::retrieveByPK($this->catmun_id, $con);

			
		}
		return $this->aCatmun;
	}

	
	public function setCatciu($v)
	{


		if ($v === null) {
			$this->setCatciuId(NULL);
		} else {
			$this->setCatciuId($v->getId());
		}


		$this->aCatciu = $v;
	}


	
	public function getCatciu($con = null)
	{
		if ($this->aCatciu === null && ($this->catciu_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatciuPeer.php';

			$this->aCatciu = CatciuPeer::retrieveByPK($this->catciu_id, $con);

			
		}
		return $this->aCatciu;
	}

	
	public function setCatest($v)
	{


		if ($v === null) {
			$this->setCatestId(NULL);
		} else {
			$this->setCatestId($v->getId());
		}


		$this->aCatest = $v;
	}


	
	public function getCatest($con = null)
	{
		if ($this->aCatest === null && ($this->catest_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatestPeer.php';

			$this->aCatest = CatestPeer::retrieveByPK($this->catest_id, $con);

			
		}
		return $this->aCatest;
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

				$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

				CatprcPeer::addSelectColumns($criteria);
				$this->collCatprcs = CatprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

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

		$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

		return CatprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatprc(Catprc $l)
	{
		$this->collCatprcs[] = $l;
		$l->setCatsec($this);
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

				$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
				$this->collCatprcs = CatprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatprcCriteria = $criteria;

		return $this->collCatprcs;
	}


	
	public function getCatprcsJoinCatest($criteria = null, $con = null)
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

				$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

				$this->collCatprcs = CatprcPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatprcPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatprcCriteria) || !$this->lastCatprcCriteria->equals($criteria)) {
				$this->collCatprcs = CatprcPeer::doSelectJoinCatest($criteria, $con);
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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

		$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginm(Catreginm $l)
	{
		$this->collCatreginms[] = $l;
		$l->setCatsec($this);
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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}


	
	public function getCatreginmsJoinCatest($criteria = null, $con = null)
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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				$this->collCatregpers = CatregperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

		$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

		return CatregperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatregper(Catregper $l)
	{
		$this->collCatregpers[] = $l;
		$l->setCatsec($this);
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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

				$this->collCatregpers = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatregperCriteria) || !$this->lastCatregperCriteria->equals($criteria)) {
				$this->collCatregpers = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatregperCriteria = $criteria;

		return $this->collCatregpers;
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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				CatsubprcPeer::addSelectColumns($criteria);
				$this->collCatsubprcs = CatsubprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

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

		$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

		return CatsubprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatsubprc(Catsubprc $l)
	{
		$this->collCatsubprcs[] = $l;
		$l->setCatsec($this);
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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatman($criteria, $con);
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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}


	
	public function getCatsubprcsJoinCatest($criteria = null, $con = null)
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

				$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATSEC_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}

} 