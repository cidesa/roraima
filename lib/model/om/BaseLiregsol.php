<?php


abstract class BaseLiregsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $dessol;


	
	protected $lidatste_id;


	
	protected $litipsol_id;


	
	protected $fecsol;


	
	protected $fecres;


	
	protected $obssol;


	
	protected $licomlic_id;


	
	protected $codemp;


	
	protected $id;

	
	protected $aLidatste;

	
	protected $aLitipsol;

	
	protected $aLicomlic;

	
	protected $collLiressols;

	
	protected $lastLiressolCriteria = null;

	
	protected $collLireglics;

	
	protected $lastLireglicCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getLidatsteId()
  {

    return $this->lidatste_id;

  }
  
  public function getLitipsolId()
  {

    return $this->litipsol_id;

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecres($format = 'Y-m-d')
  {

    if ($this->fecres === null || $this->fecres === '') {
      return null;
    } elseif (!is_int($this->fecres)) {
            $ts = adodb_strtotime($this->fecres);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
      }
    } else {
      $ts = $this->fecres;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObssol()
  {

    return trim($this->obssol);

  }
  
  public function getLicomlicId()
  {

    return $this->licomlic_id;

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = LiregsolPeer::NUMSOL;
      }
  
	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = LiregsolPeer::DESSOL;
      }
  
	} 
	
	public function setLidatsteId($v)
	{

    if ($this->lidatste_id !== $v) {
        $this->lidatste_id = $v;
        $this->modifiedColumns[] = LiregsolPeer::LIDATSTE_ID;
      }
  
		if ($this->aLidatste !== null && $this->aLidatste->getId() !== $v) {
			$this->aLidatste = null;
		}

	} 
	
	public function setLitipsolId($v)
	{

    if ($this->litipsol_id !== $v) {
        $this->litipsol_id = $v;
        $this->modifiedColumns[] = LiregsolPeer::LITIPSOL_ID;
      }
  
		if ($this->aLitipsol !== null && $this->aLitipsol->getId() !== $v) {
			$this->aLitipsol = null;
		}

	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = LiregsolPeer::FECSOL;
    }

	} 
	
	public function setFecres($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = LiregsolPeer::FECRES;
    }

	} 
	
	public function setObssol($v)
	{

    if ($this->obssol !== $v) {
        $this->obssol = $v;
        $this->modifiedColumns[] = LiregsolPeer::OBSSOL;
      }
  
	} 
	
	public function setLicomlicId($v)
	{

    if ($this->licomlic_id !== $v) {
        $this->licomlic_id = $v;
        $this->modifiedColumns[] = LiregsolPeer::LICOMLIC_ID;
      }
  
		if ($this->aLicomlic !== null && $this->aLicomlic->getId() !== $v) {
			$this->aLicomlic = null;
		}

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LiregsolPeer::CODEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregsolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->dessol = $rs->getString($startcol + 1);

      $this->lidatste_id = $rs->getInt($startcol + 2);

      $this->litipsol_id = $rs->getInt($startcol + 3);

      $this->fecsol = $rs->getDate($startcol + 4, null);

      $this->fecres = $rs->getDate($startcol + 5, null);

      $this->obssol = $rs->getString($startcol + 6);

      $this->licomlic_id = $rs->getInt($startcol + 7);

      $this->codemp = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregsol object", $e);
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
			$con = Propel::getConnection(LiregsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregsolPeer::DATABASE_NAME);
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


												
			if ($this->aLidatste !== null) {
				if ($this->aLidatste->isModified()) {
					$affectedRows += $this->aLidatste->save($con);
				}
				$this->setLidatste($this->aLidatste);
			}

			if ($this->aLitipsol !== null) {
				if ($this->aLitipsol->isModified()) {
					$affectedRows += $this->aLitipsol->save($con);
				}
				$this->setLitipsol($this->aLitipsol);
			}

			if ($this->aLicomlic !== null) {
				if ($this->aLicomlic->isModified()) {
					$affectedRows += $this->aLicomlic->save($con);
				}
				$this->setLicomlic($this->aLicomlic);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiregsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregsolPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiressols !== null) {
				foreach($this->collLiressols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLireglics !== null) {
				foreach($this->collLireglics as $referrerFK) {
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


												
			if ($this->aLidatste !== null) {
				if (!$this->aLidatste->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLidatste->getValidationFailures());
				}
			}

			if ($this->aLitipsol !== null) {
				if (!$this->aLitipsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipsol->getValidationFailures());
				}
			}

			if ($this->aLicomlic !== null) {
				if (!$this->aLicomlic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicomlic->getValidationFailures());
				}
			}


			if (($retval = LiregsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiressols !== null) {
					foreach($this->collLiressols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLireglics !== null) {
					foreach($this->collLireglics as $referrerFK) {
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
		$pos = LiregsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getDessol();
				break;
			case 2:
				return $this->getLidatsteId();
				break;
			case 3:
				return $this->getLitipsolId();
				break;
			case 4:
				return $this->getFecsol();
				break;
			case 5:
				return $this->getFecres();
				break;
			case 6:
				return $this->getObssol();
				break;
			case 7:
				return $this->getLicomlicId();
				break;
			case 8:
				return $this->getCodemp();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getDessol(),
			$keys[2] => $this->getLidatsteId(),
			$keys[3] => $this->getLitipsolId(),
			$keys[4] => $this->getFecsol(),
			$keys[5] => $this->getFecres(),
			$keys[6] => $this->getObssol(),
			$keys[7] => $this->getLicomlicId(),
			$keys[8] => $this->getCodemp(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setDessol($value);
				break;
			case 2:
				$this->setLidatsteId($value);
				break;
			case 3:
				$this->setLitipsolId($value);
				break;
			case 4:
				$this->setFecsol($value);
				break;
			case 5:
				$this->setFecres($value);
				break;
			case 6:
				$this->setObssol($value);
				break;
			case 7:
				$this->setLicomlicId($value);
				break;
			case 8:
				$this->setCodemp($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLidatsteId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLitipsolId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecsol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObssol($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLicomlicId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodemp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregsolPeer::NUMSOL)) $criteria->add(LiregsolPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(LiregsolPeer::DESSOL)) $criteria->add(LiregsolPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(LiregsolPeer::LIDATSTE_ID)) $criteria->add(LiregsolPeer::LIDATSTE_ID, $this->lidatste_id);
		if ($this->isColumnModified(LiregsolPeer::LITIPSOL_ID)) $criteria->add(LiregsolPeer::LITIPSOL_ID, $this->litipsol_id);
		if ($this->isColumnModified(LiregsolPeer::FECSOL)) $criteria->add(LiregsolPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(LiregsolPeer::FECRES)) $criteria->add(LiregsolPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(LiregsolPeer::OBSSOL)) $criteria->add(LiregsolPeer::OBSSOL, $this->obssol);
		if ($this->isColumnModified(LiregsolPeer::LICOMLIC_ID)) $criteria->add(LiregsolPeer::LICOMLIC_ID, $this->licomlic_id);
		if ($this->isColumnModified(LiregsolPeer::CODEMP)) $criteria->add(LiregsolPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LiregsolPeer::ID)) $criteria->add(LiregsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregsolPeer::DATABASE_NAME);

		$criteria->add(LiregsolPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setDessol($this->dessol);

		$copyObj->setLidatsteId($this->lidatste_id);

		$copyObj->setLitipsolId($this->litipsol_id);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setFecres($this->fecres);

		$copyObj->setObssol($this->obssol);

		$copyObj->setLicomlicId($this->licomlic_id);

		$copyObj->setCodemp($this->codemp);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiressols() as $relObj) {
				$copyObj->addLiressol($relObj->copy($deepCopy));
			}

			foreach($this->getLireglics() as $relObj) {
				$copyObj->addLireglic($relObj->copy($deepCopy));
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
			self::$peer = new LiregsolPeer();
		}
		return self::$peer;
	}

	
	public function setLidatste($v)
	{


		if ($v === null) {
			$this->setLidatsteId(NULL);
		} else {
			$this->setLidatsteId($v->getId());
		}


		$this->aLidatste = $v;
	}


	
	public function getLidatste($con = null)
	{
		if ($this->aLidatste === null && ($this->lidatste_id !== null)) {
						include_once 'lib/model/om/BaseLidatstePeer.php';

			$this->aLidatste = LidatstePeer::retrieveByPK($this->lidatste_id, $con);

			
		}
		return $this->aLidatste;
	}

	
	public function setLitipsol($v)
	{


		if ($v === null) {
			$this->setLitipsolId(NULL);
		} else {
			$this->setLitipsolId($v->getId());
		}


		$this->aLitipsol = $v;
	}


	
	public function getLitipsol($con = null)
	{
		if ($this->aLitipsol === null && ($this->litipsol_id !== null)) {
						include_once 'lib/model/om/BaseLitipsolPeer.php';

			$this->aLitipsol = LitipsolPeer::retrieveByPK($this->litipsol_id, $con);

			
		}
		return $this->aLitipsol;
	}

	
	public function setLicomlic($v)
	{


		if ($v === null) {
			$this->setLicomlicId(NULL);
		} else {
			$this->setLicomlicId($v->getId());
		}


		$this->aLicomlic = $v;
	}


	
	public function getLicomlic($con = null)
	{
		if ($this->aLicomlic === null && ($this->licomlic_id !== null)) {
						include_once 'lib/model/om/BaseLicomlicPeer.php';

			$this->aLicomlic = LicomlicPeer::retrieveByPK($this->licomlic_id, $con);

			
		}
		return $this->aLicomlic;
	}

	
	public function initLiressols()
	{
		if ($this->collLiressols === null) {
			$this->collLiressols = array();
		}
	}

	
	public function getLiressols($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiressolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiressols === null) {
			if ($this->isNew()) {
			   $this->collLiressols = array();
			} else {

				$criteria->add(LiressolPeer::LIREGSOL_ID, $this->getId());

				LiressolPeer::addSelectColumns($criteria);
				$this->collLiressols = LiressolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiressolPeer::LIREGSOL_ID, $this->getId());

				LiressolPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiressolCriteria) || !$this->lastLiressolCriteria->equals($criteria)) {
					$this->collLiressols = LiressolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiressolCriteria = $criteria;
		return $this->collLiressols;
	}

	
	public function countLiressols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiressolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiressolPeer::LIREGSOL_ID, $this->getId());

		return LiressolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiressol(Liressol $l)
	{
		$this->collLiressols[] = $l;
		$l->setLiregsol($this);
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

				$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

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

		$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

		return LireglicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLireglic(Lireglic $l)
	{
		$this->collLireglics[] = $l;
		$l->setLiregsol($this);
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

				$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

				$this->collLireglics = LireglicPeer::doSelectJoinLitiplic($criteria, $con);
			}
		} else {
									
			$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

			if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
				$this->collLireglics = LireglicPeer::doSelectJoinLitiplic($criteria, $con);
			}
		}
		$this->lastLireglicCriteria = $criteria;

		return $this->collLireglics;
	}


	
	public function getLireglicsJoinLisicact($criteria = null, $con = null)
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

				$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

				$this->collLireglics = LireglicPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LireglicPeer::LIREGSOL_ID, $this->getId());

			if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
				$this->collLireglics = LireglicPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLireglicCriteria = $criteria;

		return $this->collLireglics;
	}

} 