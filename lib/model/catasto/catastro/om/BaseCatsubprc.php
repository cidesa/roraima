<?php


abstract class BaseCatsubprc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $catprc_id;


	
	protected $catman_id;


	
	protected $catsec_id;


	
	protected $catpar_id;


	
	protected $catmun_id;


	
	protected $catciu_id;


	
	protected $catest_id;


	
	protected $nomsubprc;


	
	protected $alisubprc;

	
	protected $aCatprc;

	
	protected $aCatman;

	
	protected $aCatsec;

	
	protected $aCatpar;

	
	protected $aCatmun;

	
	protected $aCatciu;

	
	protected $aCatest;

	
	protected $collCatreginms;

	
	protected $lastCatreginmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCatprcId()
  {

    return $this->catprc_id;

  }
  
  public function getCatmanId()
  {

    return $this->catman_id;

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
  
  public function getNomsubprc()
  {

    return trim($this->nomsubprc);

  }
  
  public function getAlisubprc()
  {

    return trim($this->alisubprc);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::ID;
      }
  
	} 
	
	public function setCatprcId($v)
	{

    if ($this->catprc_id !== $v) {
        $this->catprc_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATPRC_ID;
      }
  
		if ($this->aCatprc !== null && $this->aCatprc->getId() !== $v) {
			$this->aCatprc = null;
		}

	} 
	
	public function setCatmanId($v)
	{

    if ($this->catman_id !== $v) {
        $this->catman_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATMAN_ID;
      }
  
		if ($this->aCatman !== null && $this->aCatman->getId() !== $v) {
			$this->aCatman = null;
		}

	} 
	
	public function setCatsecId($v)
	{

    if ($this->catsec_id !== $v) {
        $this->catsec_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATSEC_ID;
      }
  
		if ($this->aCatsec !== null && $this->aCatsec->getId() !== $v) {
			$this->aCatsec = null;
		}

	} 
	
	public function setCatparId($v)
	{

    if ($this->catpar_id !== $v) {
        $this->catpar_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATPAR_ID;
      }
  
		if ($this->aCatpar !== null && $this->aCatpar->getId() !== $v) {
			$this->aCatpar = null;
		}

	} 
	
	public function setCatmunId($v)
	{

    if ($this->catmun_id !== $v) {
        $this->catmun_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATMUN_ID;
      }
  
		if ($this->aCatmun !== null && $this->aCatmun->getId() !== $v) {
			$this->aCatmun = null;
		}

	} 
	
	public function setCatciuId($v)
	{

    if ($this->catciu_id !== $v) {
        $this->catciu_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATCIU_ID;
      }
  
		if ($this->aCatciu !== null && $this->aCatciu->getId() !== $v) {
			$this->aCatciu = null;
		}

	} 
	
	public function setCatestId($v)
	{

    if ($this->catest_id !== $v) {
        $this->catest_id = $v;
        $this->modifiedColumns[] = CatsubprcPeer::CATEST_ID;
      }
  
		if ($this->aCatest !== null && $this->aCatest->getId() !== $v) {
			$this->aCatest = null;
		}

	} 
	
	public function setNomsubprc($v)
	{

    if ($this->nomsubprc !== $v) {
        $this->nomsubprc = $v;
        $this->modifiedColumns[] = CatsubprcPeer::NOMSUBPRC;
      }
  
	} 
	
	public function setAlisubprc($v)
	{

    if ($this->alisubprc !== $v) {
        $this->alisubprc = $v;
        $this->modifiedColumns[] = CatsubprcPeer::ALISUBPRC;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->catprc_id = $rs->getInt($startcol + 1);

      $this->catman_id = $rs->getInt($startcol + 2);

      $this->catsec_id = $rs->getInt($startcol + 3);

      $this->catpar_id = $rs->getInt($startcol + 4);

      $this->catmun_id = $rs->getInt($startcol + 5);

      $this->catciu_id = $rs->getInt($startcol + 6);

      $this->catest_id = $rs->getInt($startcol + 7);

      $this->nomsubprc = $rs->getString($startcol + 8);

      $this->alisubprc = $rs->getString($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catsubprc object", $e);
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
			$con = Propel::getConnection(CatsubprcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatsubprcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatsubprcPeer::DATABASE_NAME);
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


												
			if ($this->aCatprc !== null) {
				if ($this->aCatprc->isModified()) {
					$affectedRows += $this->aCatprc->save($con);
				}
				$this->setCatprc($this->aCatprc);
			}

			if ($this->aCatman !== null) {
				if ($this->aCatman->isModified()) {
					$affectedRows += $this->aCatman->save($con);
				}
				$this->setCatman($this->aCatman);
			}

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
					$pk = CatsubprcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatsubprcPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatreginms !== null) {
				foreach($this->collCatreginms as $referrerFK) {
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


												
			if ($this->aCatprc !== null) {
				if (!$this->aCatprc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatprc->getValidationFailures());
				}
			}

			if ($this->aCatman !== null) {
				if (!$this->aCatman->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatman->getValidationFailures());
				}
			}

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


			if (($retval = CatsubprcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatreginms !== null) {
					foreach($this->collCatreginms as $referrerFK) {
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
		$pos = CatsubprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCatprcId();
				break;
			case 2:
				return $this->getCatmanId();
				break;
			case 3:
				return $this->getCatsecId();
				break;
			case 4:
				return $this->getCatparId();
				break;
			case 5:
				return $this->getCatmunId();
				break;
			case 6:
				return $this->getCatciuId();
				break;
			case 7:
				return $this->getCatestId();
				break;
			case 8:
				return $this->getNomsubprc();
				break;
			case 9:
				return $this->getAlisubprc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatsubprcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCatprcId(),
			$keys[2] => $this->getCatmanId(),
			$keys[3] => $this->getCatsecId(),
			$keys[4] => $this->getCatparId(),
			$keys[5] => $this->getCatmunId(),
			$keys[6] => $this->getCatciuId(),
			$keys[7] => $this->getCatestId(),
			$keys[8] => $this->getNomsubprc(),
			$keys[9] => $this->getAlisubprc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatsubprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCatprcId($value);
				break;
			case 2:
				$this->setCatmanId($value);
				break;
			case 3:
				$this->setCatsecId($value);
				break;
			case 4:
				$this->setCatparId($value);
				break;
			case 5:
				$this->setCatmunId($value);
				break;
			case 6:
				$this->setCatciuId($value);
				break;
			case 7:
				$this->setCatestId($value);
				break;
			case 8:
				$this->setNomsubprc($value);
				break;
			case 9:
				$this->setAlisubprc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatsubprcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatprcId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCatmanId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCatsecId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCatparId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatmunId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCatciuId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCatestId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomsubprc($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAlisubprc($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatsubprcPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatsubprcPeer::ID)) $criteria->add(CatsubprcPeer::ID, $this->id);
		if ($this->isColumnModified(CatsubprcPeer::CATPRC_ID)) $criteria->add(CatsubprcPeer::CATPRC_ID, $this->catprc_id);
		if ($this->isColumnModified(CatsubprcPeer::CATMAN_ID)) $criteria->add(CatsubprcPeer::CATMAN_ID, $this->catman_id);
		if ($this->isColumnModified(CatsubprcPeer::CATSEC_ID)) $criteria->add(CatsubprcPeer::CATSEC_ID, $this->catsec_id);
		if ($this->isColumnModified(CatsubprcPeer::CATPAR_ID)) $criteria->add(CatsubprcPeer::CATPAR_ID, $this->catpar_id);
		if ($this->isColumnModified(CatsubprcPeer::CATMUN_ID)) $criteria->add(CatsubprcPeer::CATMUN_ID, $this->catmun_id);
		if ($this->isColumnModified(CatsubprcPeer::CATCIU_ID)) $criteria->add(CatsubprcPeer::CATCIU_ID, $this->catciu_id);
		if ($this->isColumnModified(CatsubprcPeer::CATEST_ID)) $criteria->add(CatsubprcPeer::CATEST_ID, $this->catest_id);
		if ($this->isColumnModified(CatsubprcPeer::NOMSUBPRC)) $criteria->add(CatsubprcPeer::NOMSUBPRC, $this->nomsubprc);
		if ($this->isColumnModified(CatsubprcPeer::ALISUBPRC)) $criteria->add(CatsubprcPeer::ALISUBPRC, $this->alisubprc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatsubprcPeer::DATABASE_NAME);

		$criteria->add(CatsubprcPeer::ID, $this->id);

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

		$copyObj->setCatprcId($this->catprc_id);

		$copyObj->setCatmanId($this->catman_id);

		$copyObj->setCatsecId($this->catsec_id);

		$copyObj->setCatparId($this->catpar_id);

		$copyObj->setCatmunId($this->catmun_id);

		$copyObj->setCatciuId($this->catciu_id);

		$copyObj->setCatestId($this->catest_id);

		$copyObj->setNomsubprc($this->nomsubprc);

		$copyObj->setAlisubprc($this->alisubprc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatreginms() as $relObj) {
				$copyObj->addCatreginm($relObj->copy($deepCopy));
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
			self::$peer = new CatsubprcPeer();
		}
		return self::$peer;
	}

	
	public function setCatprc($v)
	{


		if ($v === null) {
			$this->setCatprcId(NULL);
		} else {
			$this->setCatprcId($v->getId());
		}


		$this->aCatprc = $v;
	}


	
	public function getCatprc($con = null)
	{
		if ($this->aCatprc === null && ($this->catprc_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatprcPeer.php';

			$this->aCatprc = CatprcPeer::retrieveByPK($this->catprc_id, $con);

			
		}
		return $this->aCatprc;
	}

	
	public function setCatman($v)
	{


		if ($v === null) {
			$this->setCatmanId(NULL);
		} else {
			$this->setCatmanId($v->getId());
		}


		$this->aCatman = $v;
	}


	
	public function getCatman($con = null)
	{
		if ($this->aCatman === null && ($this->catman_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatmanPeer.php';

			$this->aCatman = CatmanPeer::retrieveByPK($this->catman_id, $con);

			
		}
		return $this->aCatman;
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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginms = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

		$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginm(Catreginm $l)
	{
		$this->collCatreginms[] = $l;
		$l->setCatsubprc($this);
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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramofroId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolatId($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattramoRelatedByCattramolat2Id($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

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

				$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATSUBPRC_ID, $this->getId());

			if (!isset($this->lastCatreginmCriteria) || !$this->lastCatreginmCriteria->equals($criteria)) {
				$this->collCatreginms = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmCriteria = $criteria;

		return $this->collCatreginms;
	}

} 