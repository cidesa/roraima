<?php


abstract class BaseFcpagos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $fecpag;


	
	protected $rifcon;


	
	protected $despag;


	
	protected $monpag;


	
	protected $monefe;


	
	protected $funpag;


	
	protected $codrec;


	
	protected $numpagold;


	
	protected $edopag;


	
	protected $fecanu;


	
	protected $motanu;


	
	protected $cedanu;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $id;

	
	protected $collFcdetpags;

	
	protected $lastFcdetpagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpag()
  {

    return trim($this->numpag);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getDespag()
  {

    return trim($this->despag);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getMonefe($val=false)
  {

    if($val) return number_format($this->monefe,2,',','.');
    else return $this->monefe;

  }
  
  public function getFunpag()
  {

    return trim($this->funpag);

  }
  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getNumpagold()
  {

    return trim($this->numpagold);

  }
  
  public function getEdopag()
  {

    return trim($this->edopag);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMotanu()
  {

    return trim($this->motanu);

  }
  
  public function getCedanu()
  {

    return trim($this->cedanu);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpag($v)
	{

    if ($this->numpag !== $v) {
        $this->numpag = $v;
        $this->modifiedColumns[] = FcpagosPeer::NUMPAG;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = FcpagosPeer::FECPAG;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcpagosPeer::RIFCON;
      }
  
	} 
	
	public function setDespag($v)
	{

    if ($this->despag !== $v) {
        $this->despag = $v;
        $this->modifiedColumns[] = FcpagosPeer::DESPAG;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcpagosPeer::MONPAG;
      }
  
	} 
	
	public function setMonefe($v)
	{

    if ($this->monefe !== $v) {
        $this->monefe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcpagosPeer::MONEFE;
      }
  
	} 
	
	public function setFunpag($v)
	{

    if ($this->funpag !== $v) {
        $this->funpag = $v;
        $this->modifiedColumns[] = FcpagosPeer::FUNPAG;
      }
  
	} 
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = FcpagosPeer::CODREC;
      }
  
	} 
	
	public function setNumpagold($v)
	{

    if ($this->numpagold !== $v) {
        $this->numpagold = $v;
        $this->modifiedColumns[] = FcpagosPeer::NUMPAGOLD;
      }
  
	} 
	
	public function setEdopag($v)
	{

    if ($this->edopag !== $v) {
        $this->edopag = $v;
        $this->modifiedColumns[] = FcpagosPeer::EDOPAG;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = FcpagosPeer::FECANU;
    }

	} 
	
	public function setMotanu($v)
	{

    if ($this->motanu !== $v) {
        $this->motanu = $v;
        $this->modifiedColumns[] = FcpagosPeer::MOTANU;
      }
  
	} 
	
	public function setCedanu($v)
	{

    if ($this->cedanu !== $v) {
        $this->cedanu = $v;
        $this->modifiedColumns[] = FcpagosPeer::CEDANU;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcpagosPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcpagosPeer::DIRCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcpagosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpag = $rs->getString($startcol + 0);

      $this->fecpag = $rs->getDate($startcol + 1, null);

      $this->rifcon = $rs->getString($startcol + 2);

      $this->despag = $rs->getString($startcol + 3);

      $this->monpag = $rs->getFloat($startcol + 4);

      $this->monefe = $rs->getFloat($startcol + 5);

      $this->funpag = $rs->getString($startcol + 6);

      $this->codrec = $rs->getString($startcol + 7);

      $this->numpagold = $rs->getString($startcol + 8);

      $this->edopag = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->motanu = $rs->getString($startcol + 11);

      $this->cedanu = $rs->getString($startcol + 12);

      $this->nomcon = $rs->getString($startcol + 13);

      $this->dircon = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcpagos object", $e);
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
			$con = Propel::getConnection(FcpagosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcpagosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcpagosPeer::DATABASE_NAME);
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
					$pk = FcpagosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcpagosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcdetpags !== null) {
				foreach($this->collFcdetpags as $referrerFK) {
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


			if (($retval = FcpagosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcdetpags !== null) {
					foreach($this->collFcdetpags as $referrerFK) {
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
		$pos = FcpagosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getFecpag();
				break;
			case 2:
				return $this->getRifcon();
				break;
			case 3:
				return $this->getDespag();
				break;
			case 4:
				return $this->getMonpag();
				break;
			case 5:
				return $this->getMonefe();
				break;
			case 6:
				return $this->getFunpag();
				break;
			case 7:
				return $this->getCodrec();
				break;
			case 8:
				return $this->getNumpagold();
				break;
			case 9:
				return $this->getEdopag();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getMotanu();
				break;
			case 12:
				return $this->getCedanu();
				break;
			case 13:
				return $this->getNomcon();
				break;
			case 14:
				return $this->getDircon();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcpagosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getFecpag(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getDespag(),
			$keys[4] => $this->getMonpag(),
			$keys[5] => $this->getMonefe(),
			$keys[6] => $this->getFunpag(),
			$keys[7] => $this->getCodrec(),
			$keys[8] => $this->getNumpagold(),
			$keys[9] => $this->getEdopag(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getMotanu(),
			$keys[12] => $this->getCedanu(),
			$keys[13] => $this->getNomcon(),
			$keys[14] => $this->getDircon(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcpagosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setFecpag($value);
				break;
			case 2:
				$this->setRifcon($value);
				break;
			case 3:
				$this->setDespag($value);
				break;
			case 4:
				$this->setMonpag($value);
				break;
			case 5:
				$this->setMonefe($value);
				break;
			case 6:
				$this->setFunpag($value);
				break;
			case 7:
				$this->setCodrec($value);
				break;
			case 8:
				$this->setNumpagold($value);
				break;
			case 9:
				$this->setEdopag($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setMotanu($value);
				break;
			case 12:
				$this->setCedanu($value);
				break;
			case 13:
				$this->setNomcon($value);
				break;
			case 14:
				$this->setDircon($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcpagosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDespag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonefe($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFunpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumpagold($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEdopag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMotanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCedanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNomcon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDircon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcpagosPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcpagosPeer::NUMPAG)) $criteria->add(FcpagosPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcpagosPeer::FECPAG)) $criteria->add(FcpagosPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(FcpagosPeer::RIFCON)) $criteria->add(FcpagosPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcpagosPeer::DESPAG)) $criteria->add(FcpagosPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(FcpagosPeer::MONPAG)) $criteria->add(FcpagosPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcpagosPeer::MONEFE)) $criteria->add(FcpagosPeer::MONEFE, $this->monefe);
		if ($this->isColumnModified(FcpagosPeer::FUNPAG)) $criteria->add(FcpagosPeer::FUNPAG, $this->funpag);
		if ($this->isColumnModified(FcpagosPeer::CODREC)) $criteria->add(FcpagosPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcpagosPeer::NUMPAGOLD)) $criteria->add(FcpagosPeer::NUMPAGOLD, $this->numpagold);
		if ($this->isColumnModified(FcpagosPeer::EDOPAG)) $criteria->add(FcpagosPeer::EDOPAG, $this->edopag);
		if ($this->isColumnModified(FcpagosPeer::FECANU)) $criteria->add(FcpagosPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FcpagosPeer::MOTANU)) $criteria->add(FcpagosPeer::MOTANU, $this->motanu);
		if ($this->isColumnModified(FcpagosPeer::CEDANU)) $criteria->add(FcpagosPeer::CEDANU, $this->cedanu);
		if ($this->isColumnModified(FcpagosPeer::NOMCON)) $criteria->add(FcpagosPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcpagosPeer::DIRCON)) $criteria->add(FcpagosPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcpagosPeer::ID)) $criteria->add(FcpagosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcpagosPeer::DATABASE_NAME);

		$criteria->add(FcpagosPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setDespag($this->despag);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonefe($this->monefe);

		$copyObj->setFunpag($this->funpag);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setNumpagold($this->numpagold);

		$copyObj->setEdopag($this->edopag);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setMotanu($this->motanu);

		$copyObj->setCedanu($this->cedanu);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcdetpags() as $relObj) {
				$copyObj->addFcdetpag($relObj->copy($deepCopy));
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
			self::$peer = new FcpagosPeer();
		}
		return self::$peer;
	}

	
	public function initFcdetpags()
	{
		if ($this->collFcdetpags === null) {
			$this->collFcdetpags = array();
		}
	}

	
	public function getFcdetpags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcdetpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetpags === null) {
			if ($this->isNew()) {
			   $this->collFcdetpags = array();
			} else {

				$criteria->add(FcdetpagPeer::NUMPAG, $this->getNumpag());

				FcdetpagPeer::addSelectColumns($criteria);
				$this->collFcdetpags = FcdetpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcdetpagPeer::NUMPAG, $this->getNumpag());

				FcdetpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcdetpagCriteria) || !$this->lastFcdetpagCriteria->equals($criteria)) {
					$this->collFcdetpags = FcdetpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcdetpagCriteria = $criteria;
		return $this->collFcdetpags;
	}

	
	public function countFcdetpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFcdetpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcdetpagPeer::NUMPAG, $this->getNumpag());

		return FcdetpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcdetpag(Fcdetpag $l)
	{
		$this->collFcdetpags[] = $l;
		$l->setFcpagos($this);
	}


	
	public function getFcdetpagsJoinFctippag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFcdetpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetpags === null) {
			if ($this->isNew()) {
				$this->collFcdetpags = array();
			} else {

				$criteria->add(FcdetpagPeer::NUMPAG, $this->getNumpag());

				$this->collFcdetpags = FcdetpagPeer::doSelectJoinFctippag($criteria, $con);
			}
		} else {
									
			$criteria->add(FcdetpagPeer::NUMPAG, $this->getNumpag());

			if (!isset($this->lastFcdetpagCriteria) || !$this->lastFcdetpagCriteria->equals($criteria)) {
				$this->collFcdetpags = FcdetpagPeer::doSelectJoinFctippag($criteria, $con);
			}
		}
		$this->lastFcdetpagCriteria = $criteria;

		return $this->collFcdetpags;
	}

} 