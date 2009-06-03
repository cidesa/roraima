<?php


abstract class BaseCattramo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $catdivgeo_id;


	
	protected $nomtramo;


	
	protected $alitramo;


	
	protected $cattipvia_id;


	
	protected $catsenvia_id;


	
	protected $catdirvia_id;

	
	protected $aCatdivgeo;

	
	protected $aCattipvia;

	
	protected $aCatsenvia;

	
	protected $aCatdirvia;

	
	protected $collCatmansRelatedByCattramonorId;

	
	protected $lastCatmanRelatedByCattramonorIdCriteria = null;

	
	protected $collCatmansRelatedByCattramosurId;

	
	protected $lastCatmanRelatedByCattramosurIdCriteria = null;

	
	protected $collCatmansRelatedByCattramoestId;

	
	protected $lastCatmanRelatedByCattramoestIdCriteria = null;

	
	protected $collCatmansRelatedByCattramooesId;

	
	protected $lastCatmanRelatedByCattramooesIdCriteria = null;

	
	protected $collCatreginmsRelatedByCattramofroId;

	
	protected $lastCatreginmRelatedByCattramofroIdCriteria = null;

	
	protected $collCatreginmsRelatedByCattramolatId;

	
	protected $lastCatreginmRelatedByCattramolatIdCriteria = null;

	
	protected $collCatreginmsRelatedByCattramolat2Id;

	
	protected $lastCatreginmRelatedByCattramolat2IdCriteria = null;

	
	protected $collCatregpersRelatedByCattramofroId;

	
	protected $lastCatregperRelatedByCattramofroIdCriteria = null;

	
	protected $collCatregpersRelatedByCattramolatId;

	
	protected $lastCatregperRelatedByCattramolatIdCriteria = null;

	
	protected $collCatregpersRelatedByCattramolat2Id;

	
	protected $lastCatregperRelatedByCattramolat2IdCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCatdivgeoId()
  {

    return $this->catdivgeo_id;

  }
  
  public function getNomtramo()
  {

    return trim($this->nomtramo);

  }
  
  public function getAlitramo()
  {

    return trim($this->alitramo);

  }
  
  public function getCattipviaId()
  {

    return $this->cattipvia_id;

  }
  
  public function getCatsenviaId()
  {

    return $this->catsenvia_id;

  }
  
  public function getCatdirviaId()
  {

    return $this->catdirvia_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CattramoPeer::ID;
      }
  
	} 
	
	public function setCatdivgeoId($v)
	{

    if ($this->catdivgeo_id !== $v) {
        $this->catdivgeo_id = $v;
        $this->modifiedColumns[] = CattramoPeer::CATDIVGEO_ID;
      }
  
		if ($this->aCatdivgeo !== null && $this->aCatdivgeo->getId() !== $v) {
			$this->aCatdivgeo = null;
		}

	} 
	
	public function setNomtramo($v)
	{

    if ($this->nomtramo !== $v) {
        $this->nomtramo = $v;
        $this->modifiedColumns[] = CattramoPeer::NOMTRAMO;
      }
  
	} 
	
	public function setAlitramo($v)
	{

    if ($this->alitramo !== $v) {
        $this->alitramo = $v;
        $this->modifiedColumns[] = CattramoPeer::ALITRAMO;
      }
  
	} 
	
	public function setCattipviaId($v)
	{

    if ($this->cattipvia_id !== $v) {
        $this->cattipvia_id = $v;
        $this->modifiedColumns[] = CattramoPeer::CATTIPVIA_ID;
      }
  
		if ($this->aCattipvia !== null && $this->aCattipvia->getId() !== $v) {
			$this->aCattipvia = null;
		}

	} 
	
	public function setCatsenviaId($v)
	{

    if ($this->catsenvia_id !== $v) {
        $this->catsenvia_id = $v;
        $this->modifiedColumns[] = CattramoPeer::CATSENVIA_ID;
      }
  
		if ($this->aCatsenvia !== null && $this->aCatsenvia->getId() !== $v) {
			$this->aCatsenvia = null;
		}

	} 
	
	public function setCatdirviaId($v)
	{

    if ($this->catdirvia_id !== $v) {
        $this->catdirvia_id = $v;
        $this->modifiedColumns[] = CattramoPeer::CATDIRVIA_ID;
      }
  
		if ($this->aCatdirvia !== null && $this->aCatdirvia->getId() !== $v) {
			$this->aCatdirvia = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->catdivgeo_id = $rs->getInt($startcol + 1);

      $this->nomtramo = $rs->getString($startcol + 2);

      $this->alitramo = $rs->getString($startcol + 3);

      $this->cattipvia_id = $rs->getInt($startcol + 4);

      $this->catsenvia_id = $rs->getInt($startcol + 5);

      $this->catdirvia_id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cattramo object", $e);
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
			$con = Propel::getConnection(CattramoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CattramoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CattramoPeer::DATABASE_NAME);
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


												
			if ($this->aCatdivgeo !== null) {
				if ($this->aCatdivgeo->isModified()) {
					$affectedRows += $this->aCatdivgeo->save($con);
				}
				$this->setCatdivgeo($this->aCatdivgeo);
			}

			if ($this->aCattipvia !== null) {
				if ($this->aCattipvia->isModified()) {
					$affectedRows += $this->aCattipvia->save($con);
				}
				$this->setCattipvia($this->aCattipvia);
			}

			if ($this->aCatsenvia !== null) {
				if ($this->aCatsenvia->isModified()) {
					$affectedRows += $this->aCatsenvia->save($con);
				}
				$this->setCatsenvia($this->aCatsenvia);
			}

			if ($this->aCatdirvia !== null) {
				if ($this->aCatdirvia->isModified()) {
					$affectedRows += $this->aCatdirvia->save($con);
				}
				$this->setCatdirvia($this->aCatdirvia);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CattramoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CattramoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatmansRelatedByCattramonorId !== null) {
				foreach($this->collCatmansRelatedByCattramonorId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmansRelatedByCattramosurId !== null) {
				foreach($this->collCatmansRelatedByCattramosurId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmansRelatedByCattramoestId !== null) {
				foreach($this->collCatmansRelatedByCattramoestId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatmansRelatedByCattramooesId !== null) {
				foreach($this->collCatmansRelatedByCattramooesId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatreginmsRelatedByCattramofroId !== null) {
				foreach($this->collCatreginmsRelatedByCattramofroId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatreginmsRelatedByCattramolatId !== null) {
				foreach($this->collCatreginmsRelatedByCattramolatId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatreginmsRelatedByCattramolat2Id !== null) {
				foreach($this->collCatreginmsRelatedByCattramolat2Id as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatregpersRelatedByCattramofroId !== null) {
				foreach($this->collCatregpersRelatedByCattramofroId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatregpersRelatedByCattramolatId !== null) {
				foreach($this->collCatregpersRelatedByCattramolatId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCatregpersRelatedByCattramolat2Id !== null) {
				foreach($this->collCatregpersRelatedByCattramolat2Id as $referrerFK) {
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


												
			if ($this->aCatdivgeo !== null) {
				if (!$this->aCatdivgeo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatdivgeo->getValidationFailures());
				}
			}

			if ($this->aCattipvia !== null) {
				if (!$this->aCattipvia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattipvia->getValidationFailures());
				}
			}

			if ($this->aCatsenvia !== null) {
				if (!$this->aCatsenvia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatsenvia->getValidationFailures());
				}
			}

			if ($this->aCatdirvia !== null) {
				if (!$this->aCatdirvia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatdirvia->getValidationFailures());
				}
			}


			if (($retval = CattramoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatmansRelatedByCattramonorId !== null) {
					foreach($this->collCatmansRelatedByCattramonorId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmansRelatedByCattramosurId !== null) {
					foreach($this->collCatmansRelatedByCattramosurId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmansRelatedByCattramoestId !== null) {
					foreach($this->collCatmansRelatedByCattramoestId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatmansRelatedByCattramooesId !== null) {
					foreach($this->collCatmansRelatedByCattramooesId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatreginmsRelatedByCattramofroId !== null) {
					foreach($this->collCatreginmsRelatedByCattramofroId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatreginmsRelatedByCattramolatId !== null) {
					foreach($this->collCatreginmsRelatedByCattramolatId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatreginmsRelatedByCattramolat2Id !== null) {
					foreach($this->collCatreginmsRelatedByCattramolat2Id as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatregpersRelatedByCattramofroId !== null) {
					foreach($this->collCatregpersRelatedByCattramofroId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatregpersRelatedByCattramolatId !== null) {
					foreach($this->collCatregpersRelatedByCattramolatId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCatregpersRelatedByCattramolat2Id !== null) {
					foreach($this->collCatregpersRelatedByCattramolat2Id as $referrerFK) {
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
		$pos = CattramoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCatdivgeoId();
				break;
			case 2:
				return $this->getNomtramo();
				break;
			case 3:
				return $this->getAlitramo();
				break;
			case 4:
				return $this->getCattipviaId();
				break;
			case 5:
				return $this->getCatsenviaId();
				break;
			case 6:
				return $this->getCatdirviaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CattramoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCatdivgeoId(),
			$keys[2] => $this->getNomtramo(),
			$keys[3] => $this->getAlitramo(),
			$keys[4] => $this->getCattipviaId(),
			$keys[5] => $this->getCatsenviaId(),
			$keys[6] => $this->getCatdirviaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CattramoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCatdivgeoId($value);
				break;
			case 2:
				$this->setNomtramo($value);
				break;
			case 3:
				$this->setAlitramo($value);
				break;
			case 4:
				$this->setCattipviaId($value);
				break;
			case 5:
				$this->setCatsenviaId($value);
				break;
			case 6:
				$this->setCatdirviaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CattramoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatdivgeoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomtramo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlitramo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCattipviaId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatsenviaId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCatdirviaId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CattramoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CattramoPeer::ID)) $criteria->add(CattramoPeer::ID, $this->id);
		if ($this->isColumnModified(CattramoPeer::CATDIVGEO_ID)) $criteria->add(CattramoPeer::CATDIVGEO_ID, $this->catdivgeo_id);
		if ($this->isColumnModified(CattramoPeer::NOMTRAMO)) $criteria->add(CattramoPeer::NOMTRAMO, $this->nomtramo);
		if ($this->isColumnModified(CattramoPeer::ALITRAMO)) $criteria->add(CattramoPeer::ALITRAMO, $this->alitramo);
		if ($this->isColumnModified(CattramoPeer::CATTIPVIA_ID)) $criteria->add(CattramoPeer::CATTIPVIA_ID, $this->cattipvia_id);
		if ($this->isColumnModified(CattramoPeer::CATSENVIA_ID)) $criteria->add(CattramoPeer::CATSENVIA_ID, $this->catsenvia_id);
		if ($this->isColumnModified(CattramoPeer::CATDIRVIA_ID)) $criteria->add(CattramoPeer::CATDIRVIA_ID, $this->catdirvia_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CattramoPeer::DATABASE_NAME);

		$criteria->add(CattramoPeer::ID, $this->id);

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

		$copyObj->setCatdivgeoId($this->catdivgeo_id);

		$copyObj->setNomtramo($this->nomtramo);

		$copyObj->setAlitramo($this->alitramo);

		$copyObj->setCattipviaId($this->cattipvia_id);

		$copyObj->setCatsenviaId($this->catsenvia_id);

		$copyObj->setCatdirviaId($this->catdirvia_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatmansRelatedByCattramonorId() as $relObj) {
				$copyObj->addCatmanRelatedByCattramonorId($relObj->copy($deepCopy));
			}

			foreach($this->getCatmansRelatedByCattramosurId() as $relObj) {
				$copyObj->addCatmanRelatedByCattramosurId($relObj->copy($deepCopy));
			}

			foreach($this->getCatmansRelatedByCattramoestId() as $relObj) {
				$copyObj->addCatmanRelatedByCattramoestId($relObj->copy($deepCopy));
			}

			foreach($this->getCatmansRelatedByCattramooesId() as $relObj) {
				$copyObj->addCatmanRelatedByCattramooesId($relObj->copy($deepCopy));
			}

			foreach($this->getCatreginmsRelatedByCattramofroId() as $relObj) {
				$copyObj->addCatreginmRelatedByCattramofroId($relObj->copy($deepCopy));
			}

			foreach($this->getCatreginmsRelatedByCattramolatId() as $relObj) {
				$copyObj->addCatreginmRelatedByCattramolatId($relObj->copy($deepCopy));
			}

			foreach($this->getCatreginmsRelatedByCattramolat2Id() as $relObj) {
				$copyObj->addCatreginmRelatedByCattramolat2Id($relObj->copy($deepCopy));
			}

			foreach($this->getCatregpersRelatedByCattramofroId() as $relObj) {
				$copyObj->addCatregperRelatedByCattramofroId($relObj->copy($deepCopy));
			}

			foreach($this->getCatregpersRelatedByCattramolatId() as $relObj) {
				$copyObj->addCatregperRelatedByCattramolatId($relObj->copy($deepCopy));
			}

			foreach($this->getCatregpersRelatedByCattramolat2Id() as $relObj) {
				$copyObj->addCatregperRelatedByCattramolat2Id($relObj->copy($deepCopy));
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
			self::$peer = new CattramoPeer();
		}
		return self::$peer;
	}

	
	public function setCatdivgeo($v)
	{


		if ($v === null) {
			$this->setCatdivgeoId(NULL);
		} else {
			$this->setCatdivgeoId($v->getId());
		}


		$this->aCatdivgeo = $v;
	}


	
	public function getCatdivgeo($con = null)
	{
		if ($this->aCatdivgeo === null && ($this->catdivgeo_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatdivgeoPeer.php';

			$this->aCatdivgeo = CatdivgeoPeer::retrieveByPK($this->catdivgeo_id, $con);

			
		}
		return $this->aCatdivgeo;
	}

	
	public function setCattipvia($v)
	{


		if ($v === null) {
			$this->setCattipviaId(NULL);
		} else {
			$this->setCattipviaId($v->getId());
		}


		$this->aCattipvia = $v;
	}


	
	public function getCattipvia($con = null)
	{
		if ($this->aCattipvia === null && ($this->cattipvia_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattipviaPeer.php';

			$this->aCattipvia = CattipviaPeer::retrieveByPK($this->cattipvia_id, $con);

			
		}
		return $this->aCattipvia;
	}

	
	public function setCatsenvia($v)
	{


		if ($v === null) {
			$this->setCatsenviaId(NULL);
		} else {
			$this->setCatsenviaId($v->getId());
		}


		$this->aCatsenvia = $v;
	}


	
	public function getCatsenvia($con = null)
	{
		if ($this->aCatsenvia === null && ($this->catsenvia_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatsenviaPeer.php';

			$this->aCatsenvia = CatsenviaPeer::retrieveByPK($this->catsenvia_id, $con);

			
		}
		return $this->aCatsenvia;
	}

	
	public function setCatdirvia($v)
	{


		if ($v === null) {
			$this->setCatdirviaId(NULL);
		} else {
			$this->setCatdirviaId($v->getId());
		}


		$this->aCatdirvia = $v;
	}


	
	public function getCatdirvia($con = null)
	{
		if ($this->aCatdirvia === null && ($this->catdirvia_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatdirviaPeer.php';

			$this->aCatdirvia = CatdirviaPeer::retrieveByPK($this->catdirvia_id, $con);

			
		}
		return $this->aCatdirvia;
	}

	
	public function initCatmansRelatedByCattramonorId()
	{
		if ($this->collCatmansRelatedByCattramonorId === null) {
			$this->collCatmansRelatedByCattramonorId = array();
		}
	}

	
	public function getCatmansRelatedByCattramonorId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramonorId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByCattramonorId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMONOR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByCattramonorId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::CATTRAMONOR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByCattramonorIdCriteria) || !$this->lastCatmanRelatedByCattramonorIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByCattramonorId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByCattramonorIdCriteria = $criteria;
		return $this->collCatmansRelatedByCattramonorId;
	}

	
	public function countCatmansRelatedByCattramonorId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::CATTRAMONOR_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByCattramonorId(Catman $l)
	{
		$this->collCatmansRelatedByCattramonorId[] = $l;
		$l->setCattramoRelatedByCattramonorId($this);
	}


	
	public function getCatmansRelatedByCattramonorIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramonorId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByCattramonorId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMONOR_ID, $this->getId());

				$this->collCatmansRelatedByCattramonorId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATTRAMONOR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByCattramonorIdCriteria) || !$this->lastCatmanRelatedByCattramonorIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByCattramonorId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByCattramonorIdCriteria = $criteria;

		return $this->collCatmansRelatedByCattramonorId;
	}

	
	public function initCatmansRelatedByCattramosurId()
	{
		if ($this->collCatmansRelatedByCattramosurId === null) {
			$this->collCatmansRelatedByCattramosurId = array();
		}
	}

	
	public function getCatmansRelatedByCattramosurId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramosurId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByCattramosurId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMOSUR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByCattramosurId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::CATTRAMOSUR_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByCattramosurIdCriteria) || !$this->lastCatmanRelatedByCattramosurIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByCattramosurId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByCattramosurIdCriteria = $criteria;
		return $this->collCatmansRelatedByCattramosurId;
	}

	
	public function countCatmansRelatedByCattramosurId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::CATTRAMOSUR_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByCattramosurId(Catman $l)
	{
		$this->collCatmansRelatedByCattramosurId[] = $l;
		$l->setCattramoRelatedByCattramosurId($this);
	}


	
	public function getCatmansRelatedByCattramosurIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramosurId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByCattramosurId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMOSUR_ID, $this->getId());

				$this->collCatmansRelatedByCattramosurId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATTRAMOSUR_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByCattramosurIdCriteria) || !$this->lastCatmanRelatedByCattramosurIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByCattramosurId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByCattramosurIdCriteria = $criteria;

		return $this->collCatmansRelatedByCattramosurId;
	}

	
	public function initCatmansRelatedByCattramoestId()
	{
		if ($this->collCatmansRelatedByCattramoestId === null) {
			$this->collCatmansRelatedByCattramoestId = array();
		}
	}

	
	public function getCatmansRelatedByCattramoestId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramoestId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByCattramoestId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMOEST_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByCattramoestId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::CATTRAMOEST_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByCattramoestIdCriteria) || !$this->lastCatmanRelatedByCattramoestIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByCattramoestId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByCattramoestIdCriteria = $criteria;
		return $this->collCatmansRelatedByCattramoestId;
	}

	
	public function countCatmansRelatedByCattramoestId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::CATTRAMOEST_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByCattramoestId(Catman $l)
	{
		$this->collCatmansRelatedByCattramoestId[] = $l;
		$l->setCattramoRelatedByCattramoestId($this);
	}


	
	public function getCatmansRelatedByCattramoestIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramoestId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByCattramoestId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMOEST_ID, $this->getId());

				$this->collCatmansRelatedByCattramoestId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATTRAMOEST_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByCattramoestIdCriteria) || !$this->lastCatmanRelatedByCattramoestIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByCattramoestId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByCattramoestIdCriteria = $criteria;

		return $this->collCatmansRelatedByCattramoestId;
	}

	
	public function initCatmansRelatedByCattramooesId()
	{
		if ($this->collCatmansRelatedByCattramooesId === null) {
			$this->collCatmansRelatedByCattramooesId = array();
		}
	}

	
	public function getCatmansRelatedByCattramooesId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramooesId === null) {
			if ($this->isNew()) {
			   $this->collCatmansRelatedByCattramooesId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMOOES_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				$this->collCatmansRelatedByCattramooesId = CatmanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatmanPeer::CATTRAMOOES_ID, $this->getId());

				CatmanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatmanRelatedByCattramooesIdCriteria) || !$this->lastCatmanRelatedByCattramooesIdCriteria->equals($criteria)) {
					$this->collCatmansRelatedByCattramooesId = CatmanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatmanRelatedByCattramooesIdCriteria = $criteria;
		return $this->collCatmansRelatedByCattramooesId;
	}

	
	public function countCatmansRelatedByCattramooesId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatmanPeer::CATTRAMOOES_ID, $this->getId());

		return CatmanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatmanRelatedByCattramooesId(Catman $l)
	{
		$this->collCatmansRelatedByCattramooesId[] = $l;
		$l->setCattramoRelatedByCattramooesId($this);
	}


	
	public function getCatmansRelatedByCattramooesIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatmanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatmansRelatedByCattramooesId === null) {
			if ($this->isNew()) {
				$this->collCatmansRelatedByCattramooesId = array();
			} else {

				$criteria->add(CatmanPeer::CATTRAMOOES_ID, $this->getId());

				$this->collCatmansRelatedByCattramooesId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatmanPeer::CATTRAMOOES_ID, $this->getId());

			if (!isset($this->lastCatmanRelatedByCattramooesIdCriteria) || !$this->lastCatmanRelatedByCattramooesIdCriteria->equals($criteria)) {
				$this->collCatmansRelatedByCattramooesId = CatmanPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatmanRelatedByCattramooesIdCriteria = $criteria;

		return $this->collCatmansRelatedByCattramooesId;
	}

	
	public function initCatreginmsRelatedByCattramofroId()
	{
		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			$this->collCatreginmsRelatedByCattramofroId = array();
		}
	}

	
	public function getCatreginmsRelatedByCattramofroId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
			   $this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
					$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;
		return $this->collCatreginmsRelatedByCattramofroId;
	}

	
	public function countCatreginmsRelatedByCattramofroId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginmRelatedByCattramofroId(Catreginm $l)
	{
		$this->collCatreginmsRelatedByCattramofroId[] = $l;
		$l->setCattramoRelatedByCattramofroId($this);
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatsubprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatman($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCattipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatconinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatusoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatconsoc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatrut($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatcarterinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}


	
	public function getCatreginmsRelatedByCattramofroIdJoinCatproter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramofroIdCriteria) || !$this->lastCatreginmRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramofroId = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramofroId;
	}

	
	public function initCatreginmsRelatedByCattramolatId()
	{
		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			$this->collCatreginmsRelatedByCattramolatId = array();
		}
	}

	
	public function getCatreginmsRelatedByCattramolatId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
			   $this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
					$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;
		return $this->collCatreginmsRelatedByCattramolatId;
	}

	
	public function countCatreginmsRelatedByCattramolatId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginmRelatedByCattramolatId(Catreginm $l)
	{
		$this->collCatreginmsRelatedByCattramolatId[] = $l;
		$l->setCattramoRelatedByCattramolatId($this);
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatsubprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatman($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCattipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatconinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatusoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatconsoc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatrut($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatcarterinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}


	
	public function getCatreginmsRelatedByCattramolatIdJoinCatproter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolatIdCriteria) || !$this->lastCatreginmRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolatId = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolatId;
	}

	
	public function initCatreginmsRelatedByCattramolat2Id()
	{
		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			$this->collCatreginmsRelatedByCattramolat2Id = array();
		}
	}

	
	public function getCatreginmsRelatedByCattramolat2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
			   $this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				CatreginmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
					$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;
		return $this->collCatreginmsRelatedByCattramolat2Id;
	}

	
	public function countCatreginmsRelatedByCattramolat2Id($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

		return CatreginmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatreginmRelatedByCattramolat2Id(Catreginm $l)
	{
		$this->collCatreginmsRelatedByCattramolat2Id[] = $l;
		$l->setCattramoRelatedByCattramolat2Id($this);
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatsubprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatsubprc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatprc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatprc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatman($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatman($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatciu($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatciu($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCattipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCattipviv($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatconinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatconinm($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatusoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatconsoc($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatconsoc($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatrut($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatrut($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatcarterinm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatcarterinm($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}


	
	public function getCatreginmsRelatedByCattramolat2IdJoinCatproter($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatreginmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatreginmsRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatreginmsRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		} else {
									
			$criteria->add(CatreginmPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatreginmRelatedByCattramolat2IdCriteria) || !$this->lastCatreginmRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatreginmsRelatedByCattramolat2Id = CatreginmPeer::doSelectJoinCatproter($criteria, $con);
			}
		}
		$this->lastCatreginmRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatreginmsRelatedByCattramolat2Id;
	}

	
	public function initCatregpersRelatedByCattramofroId()
	{
		if ($this->collCatregpersRelatedByCattramofroId === null) {
			$this->collCatregpersRelatedByCattramofroId = array();
		}
	}

	
	public function getCatregpersRelatedByCattramofroId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
			   $this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
					$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;
		return $this->collCatregpersRelatedByCattramofroId;
	}

	
	public function countCatregpersRelatedByCattramofroId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

		return CatregperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatregperRelatedByCattramofroId(Catregper $l)
	{
		$this->collCatregpersRelatedByCattramofroId[] = $l;
		$l->setCattramoRelatedByCattramofroId($this);
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}


	
	public function getCatregpersRelatedByCattramofroIdJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramofroId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramofroId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramofroIdCriteria) || !$this->lastCatregperRelatedByCattramofroIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramofroId = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramofroIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramofroId;
	}

	
	public function initCatregpersRelatedByCattramolatId()
	{
		if ($this->collCatregpersRelatedByCattramolatId === null) {
			$this->collCatregpersRelatedByCattramolatId = array();
		}
	}

	
	public function getCatregpersRelatedByCattramolatId($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
			   $this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
					$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;
		return $this->collCatregpersRelatedByCattramolatId;
	}

	
	public function countCatregpersRelatedByCattramolatId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

		return CatregperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatregperRelatedByCattramolatId(Catregper $l)
	{
		$this->collCatregpersRelatedByCattramolatId[] = $l;
		$l->setCattramoRelatedByCattramolatId($this);
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}


	
	public function getCatregpersRelatedByCattramolatIdJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolatId === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolatId = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolatIdCriteria) || !$this->lastCatregperRelatedByCattramolatIdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolatId = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolatIdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolatId;
	}

	
	public function initCatregpersRelatedByCattramolat2Id()
	{
		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			$this->collCatregpersRelatedByCattramolat2Id = array();
		}
	}

	
	public function getCatregpersRelatedByCattramolat2Id($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
			   $this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				CatregperPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
					$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;
		return $this->collCatregpersRelatedByCattramolat2Id;
	}

	
	public function countCatregpersRelatedByCattramolat2Id($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

		return CatregperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatregperRelatedByCattramolat2Id(Catregper $l)
	{
		$this->collCatregpersRelatedByCattramolat2Id[] = $l;
		$l->setCattramoRelatedByCattramolat2Id($this);
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatbarurb($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatbarurb($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatsec($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatsec($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatpar($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatpar($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatmun($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatmun($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatest($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatest($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}


	
	public function getCatregpersRelatedByCattramolat2IdJoinCatcodpos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatregperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatregpersRelatedByCattramolat2Id === null) {
			if ($this->isNew()) {
				$this->collCatregpersRelatedByCattramolat2Id = array();
			} else {

				$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		} else {
									
			$criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->getId());

			if (!isset($this->lastCatregperRelatedByCattramolat2IdCriteria) || !$this->lastCatregperRelatedByCattramolat2IdCriteria->equals($criteria)) {
				$this->collCatregpersRelatedByCattramolat2Id = CatregperPeer::doSelectJoinCatcodpos($criteria, $con);
			}
		}
		$this->lastCatregperRelatedByCattramolat2IdCriteria = $criteria;

		return $this->collCatregpersRelatedByCattramolat2Id;
	}

} 