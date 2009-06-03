<?php


abstract class BaseCatprc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $catsec_id;


	
	protected $catpar_id;


	
	protected $catmun_id;


	
	protected $catciu_id;


	
	protected $catest_id;


	
	protected $nomprc;


	
	protected $aliprc;

	
	protected $aCatsec;

	
	protected $aCatpar;

	
	protected $aCatmun;

	
	protected $aCatciu;

	
	protected $aCatest;

	
	protected $collCatreginms;

	
	protected $lastCatreginmCriteria = null;

	
	protected $collCatsubprcs;

	
	protected $lastCatsubprcCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCatsecId()
  {

    return $this->catsec_id;

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
  
  public function getNomprc()
  {

    return trim($this->nomprc);

  }
  
  public function getAliprc()
  {

    return trim($this->aliprc);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatprcPeer::ID;
      }
  
	} 
	
	public function setCatsecId($v)
	{

    if ($this->catsec_id !== $v) {
        $this->catsec_id = $v;
        $this->modifiedColumns[] = CatprcPeer::CATSEC_ID;
      }
  
		if ($this->aCatsec !== null && $this->aCatsec->getId() !== $v) {
			$this->aCatsec = null;
		}

	} 
	
	public function setCatparId($v)
	{

    if ($this->catpar_id !== $v) {
        $this->catpar_id = $v;
        $this->modifiedColumns[] = CatprcPeer::CATPAR_ID;
      }
  
		if ($this->aCatpar !== null && $this->aCatpar->getId() !== $v) {
			$this->aCatpar = null;
		}

	} 
	
	public function setCatmunId($v)
	{

    if ($this->catmun_id !== $v) {
        $this->catmun_id = $v;
        $this->modifiedColumns[] = CatprcPeer::CATMUN_ID;
      }
  
		if ($this->aCatmun !== null && $this->aCatmun->getId() !== $v) {
			$this->aCatmun = null;
		}

	} 
	
	public function setCatciuId($v)
	{

    if ($this->catciu_id !== $v) {
        $this->catciu_id = $v;
        $this->modifiedColumns[] = CatprcPeer::CATCIU_ID;
      }
  
		if ($this->aCatciu !== null && $this->aCatciu->getId() !== $v) {
			$this->aCatciu = null;
		}

	} 
	
	public function setCatestId($v)
	{

    if ($this->catest_id !== $v) {
        $this->catest_id = $v;
        $this->modifiedColumns[] = CatprcPeer::CATEST_ID;
      }
  
		if ($this->aCatest !== null && $this->aCatest->getId() !== $v) {
			$this->aCatest = null;
		}

	} 
	
	public function setNomprc($v)
	{

    if ($this->nomprc !== $v) {
        $this->nomprc = $v;
        $this->modifiedColumns[] = CatprcPeer::NOMPRC;
      }
  
	} 
	
	public function setAliprc($v)
	{

    if ($this->aliprc !== $v) {
        $this->aliprc = $v;
        $this->modifiedColumns[] = CatprcPeer::ALIPRC;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->catsec_id = $rs->getInt($startcol + 1);

      $this->catpar_id = $rs->getInt($startcol + 2);

      $this->catmun_id = $rs->getInt($startcol + 3);

      $this->catciu_id = $rs->getInt($startcol + 4);

      $this->catest_id = $rs->getInt($startcol + 5);

      $this->nomprc = $rs->getString($startcol + 6);

      $this->aliprc = $rs->getString($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catprc object", $e);
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
			$con = Propel::getConnection(CatprcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatprcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatprcPeer::DATABASE_NAME);
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


												
			if ($this->aCatsec !== null) {
				if ($this->aCatsec->isModified()) {
					$affectedRows += $this->aCatsec->save($con);
				}
				$this->setCatsec($this->aCatsec);
			}

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
					$pk = CatprcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatprcPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatreginms !== null) {
				foreach($this->collCatreginms as $referrerFK) {
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


												
			if ($this->aCatsec !== null) {
				if (!$this->aCatsec->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatsec->getValidationFailures());
				}
			}

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


			if (($retval = CatprcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatreginms !== null) {
					foreach($this->collCatreginms as $referrerFK) {
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
		$pos = CatprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCatsecId();
				break;
			case 2:
				return $this->getCatparId();
				break;
			case 3:
				return $this->getCatmunId();
				break;
			case 4:
				return $this->getCatciuId();
				break;
			case 5:
				return $this->getCatestId();
				break;
			case 6:
				return $this->getNomprc();
				break;
			case 7:
				return $this->getAliprc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatprcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCatsecId(),
			$keys[2] => $this->getCatparId(),
			$keys[3] => $this->getCatmunId(),
			$keys[4] => $this->getCatciuId(),
			$keys[5] => $this->getCatestId(),
			$keys[6] => $this->getNomprc(),
			$keys[7] => $this->getAliprc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCatsecId($value);
				break;
			case 2:
				$this->setCatparId($value);
				break;
			case 3:
				$this->setCatmunId($value);
				break;
			case 4:
				$this->setCatciuId($value);
				break;
			case 5:
				$this->setCatestId($value);
				break;
			case 6:
				$this->setNomprc($value);
				break;
			case 7:
				$this->setAliprc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatprcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatsecId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCatparId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCatmunId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCatciuId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatestId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAliprc($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatprcPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatprcPeer::ID)) $criteria->add(CatprcPeer::ID, $this->id);
		if ($this->isColumnModified(CatprcPeer::CATSEC_ID)) $criteria->add(CatprcPeer::CATSEC_ID, $this->catsec_id);
		if ($this->isColumnModified(CatprcPeer::CATPAR_ID)) $criteria->add(CatprcPeer::CATPAR_ID, $this->catpar_id);
		if ($this->isColumnModified(CatprcPeer::CATMUN_ID)) $criteria->add(CatprcPeer::CATMUN_ID, $this->catmun_id);
		if ($this->isColumnModified(CatprcPeer::CATCIU_ID)) $criteria->add(CatprcPeer::CATCIU_ID, $this->catciu_id);
		if ($this->isColumnModified(CatprcPeer::CATEST_ID)) $criteria->add(CatprcPeer::CATEST_ID, $this->catest_id);
		if ($this->isColumnModified(CatprcPeer::NOMPRC)) $criteria->add(CatprcPeer::NOMPRC, $this->nomprc);
		if ($this->isColumnModified(CatprcPeer::ALIPRC)) $criteria->add(CatprcPeer::ALIPRC, $this->aliprc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatprcPeer::DATABASE_NAME);

		$criteria->add(CatprcPeer::ID, $this->id);

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

		$copyObj->setCatsecId($this->catsec_id);

		$copyObj->setCatparId($this->catpar_id);

		$copyObj->setCatmunId($this->catmun_id);

		$copyObj->setCatciuId($this->catciu_id);

		$copyObj->setCatestId($this->catest_id);

		$copyObj->setNomprc($this->nomprc);

		$copyObj->setAliprc($this->aliprc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatreginms() as $relObj) {
				$copyObj->addCatreginm($relObj->copy($deepCopy));
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
			self::$peer = new CatprcPeer();
		}
		return self::$peer;
	}

	
	public function setCatsec($v)
	{


		if ($v === null) {
			$this->setCatsecId(NULL);
		} else {
			$this->setCatsecId($v->getId());
		}


		$this->aCatsec = $v;
	}


	
	public function getCatsec($con = null)
	{
		if ($this->aCatsec === null && ($this->catsec_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatsecPeer.php';

			$this->aCatsec = CatsecPeer::retrieveByPK($this->catsec_id, $con);

			
		}
		return $this->aCatsec;
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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

		$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginm(Catreginm $l)
	{
		$this->collCatreginms[] = $l;
		$l->setCatprc($this);
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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATPRC_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				CatsubprcPeer::addSelectColumns($criteria);
				$this->collCatsubprcs = CatsubprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

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

		$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

		return CatsubprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatsubprc(Catsubprc $l)
	{
		$this->collCatsubprcs[] = $l;
		$l->setCatprc($this);
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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

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

				$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatsubprcPeer::CATPRC_ID, $this->getId());

			if (!isset($this->lastCatsubprcCriteria) || !$this->lastCatsubprcCriteria->equals($criteria)) {
				$this->collCatsubprcs = CatsubprcPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatsubprcCriteria = $criteria;

		return $this->collCatsubprcs;
	}

} 