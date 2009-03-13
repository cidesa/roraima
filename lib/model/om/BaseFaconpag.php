<?php


abstract class BaseFaconpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desconpag;


	
	protected $tipconpag;


	
	protected $numdia;


	
	protected $generaop;


	
	protected $asiparrec;


	
	protected $generacom;


	
	protected $mercon;


	
	protected $ctadev;


	
	protected $ctavco;


	
	protected $univta;


	
	protected $id;

	
	protected $collFapresups;

	
	protected $lastFapresupCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesconpag()
  {

    return trim($this->desconpag);

  }
  
  public function getTipconpag()
  {

    return trim($this->tipconpag);

  }
  
  public function getNumdia()
  {

    return $this->numdia;

  }
  
  public function getGeneraop()
  {

    return trim($this->generaop);

  }
  
  public function getAsiparrec()
  {

    return trim($this->asiparrec);

  }
  
  public function getGeneracom()
  {

    return trim($this->generacom);

  }
  
  public function getMercon()
  {

    return trim($this->mercon);

  }
  
  public function getCtadev()
  {

    return trim($this->ctadev);

  }
  
  public function getCtavco()
  {

    return trim($this->ctavco);

  }
  
  public function getUnivta()
  {

    return trim($this->univta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesconpag($v)
	{

    if ($this->desconpag !== $v) {
        $this->desconpag = $v;
        $this->modifiedColumns[] = FaconpagPeer::DESCONPAG;
      }
  
	} 
	
	public function setTipconpag($v)
	{

    if ($this->tipconpag !== $v) {
        $this->tipconpag = $v;
        $this->modifiedColumns[] = FaconpagPeer::TIPCONPAG;
      }
  
	} 
	
	public function setNumdia($v)
	{

    if ($this->numdia !== $v) {
        $this->numdia = $v;
        $this->modifiedColumns[] = FaconpagPeer::NUMDIA;
      }
  
	} 
	
	public function setGeneraop($v)
	{

    if ($this->generaop !== $v) {
        $this->generaop = $v;
        $this->modifiedColumns[] = FaconpagPeer::GENERAOP;
      }
  
	} 
	
	public function setAsiparrec($v)
	{

    if ($this->asiparrec !== $v) {
        $this->asiparrec = $v;
        $this->modifiedColumns[] = FaconpagPeer::ASIPARREC;
      }
  
	} 
	
	public function setGeneracom($v)
	{

    if ($this->generacom !== $v) {
        $this->generacom = $v;
        $this->modifiedColumns[] = FaconpagPeer::GENERACOM;
      }
  
	} 
	
	public function setMercon($v)
	{

    if ($this->mercon !== $v) {
        $this->mercon = $v;
        $this->modifiedColumns[] = FaconpagPeer::MERCON;
      }
  
	} 
	
	public function setCtadev($v)
	{

    if ($this->ctadev !== $v) {
        $this->ctadev = $v;
        $this->modifiedColumns[] = FaconpagPeer::CTADEV;
      }
  
	} 
	
	public function setCtavco($v)
	{

    if ($this->ctavco !== $v) {
        $this->ctavco = $v;
        $this->modifiedColumns[] = FaconpagPeer::CTAVCO;
      }
  
	} 
	
	public function setUnivta($v)
	{

    if ($this->univta !== $v) {
        $this->univta = $v;
        $this->modifiedColumns[] = FaconpagPeer::UNIVTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaconpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desconpag = $rs->getString($startcol + 0);

      $this->tipconpag = $rs->getString($startcol + 1);

      $this->numdia = $rs->getInt($startcol + 2);

      $this->generaop = $rs->getString($startcol + 3);

      $this->asiparrec = $rs->getString($startcol + 4);

      $this->generacom = $rs->getString($startcol + 5);

      $this->mercon = $rs->getString($startcol + 6);

      $this->ctadev = $rs->getString($startcol + 7);

      $this->ctavco = $rs->getString($startcol + 8);

      $this->univta = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faconpag object", $e);
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
			$con = Propel::getConnection(FaconpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaconpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaconpagPeer::DATABASE_NAME);
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
					$pk = FaconpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaconpagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFapresups !== null) {
				foreach($this->collFapresups as $referrerFK) {
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


			if (($retval = FaconpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFapresups !== null) {
					foreach($this->collFapresups as $referrerFK) {
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
		$pos = FaconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesconpag();
				break;
			case 1:
				return $this->getTipconpag();
				break;
			case 2:
				return $this->getNumdia();
				break;
			case 3:
				return $this->getGeneraop();
				break;
			case 4:
				return $this->getAsiparrec();
				break;
			case 5:
				return $this->getGeneracom();
				break;
			case 6:
				return $this->getMercon();
				break;
			case 7:
				return $this->getCtadev();
				break;
			case 8:
				return $this->getCtavco();
				break;
			case 9:
				return $this->getUnivta();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaconpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesconpag(),
			$keys[1] => $this->getTipconpag(),
			$keys[2] => $this->getNumdia(),
			$keys[3] => $this->getGeneraop(),
			$keys[4] => $this->getAsiparrec(),
			$keys[5] => $this->getGeneracom(),
			$keys[6] => $this->getMercon(),
			$keys[7] => $this->getCtadev(),
			$keys[8] => $this->getCtavco(),
			$keys[9] => $this->getUnivta(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesconpag($value);
				break;
			case 1:
				$this->setTipconpag($value);
				break;
			case 2:
				$this->setNumdia($value);
				break;
			case 3:
				$this->setGeneraop($value);
				break;
			case 4:
				$this->setAsiparrec($value);
				break;
			case 5:
				$this->setGeneracom($value);
				break;
			case 6:
				$this->setMercon($value);
				break;
			case 7:
				$this->setCtadev($value);
				break;
			case 8:
				$this->setCtavco($value);
				break;
			case 9:
				$this->setUnivta($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaconpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesconpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipconpag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumdia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGeneraop($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAsiparrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGeneracom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMercon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCtadev($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCtavco($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnivta($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaconpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaconpagPeer::DESCONPAG)) $criteria->add(FaconpagPeer::DESCONPAG, $this->desconpag);
		if ($this->isColumnModified(FaconpagPeer::TIPCONPAG)) $criteria->add(FaconpagPeer::TIPCONPAG, $this->tipconpag);
		if ($this->isColumnModified(FaconpagPeer::NUMDIA)) $criteria->add(FaconpagPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(FaconpagPeer::GENERAOP)) $criteria->add(FaconpagPeer::GENERAOP, $this->generaop);
		if ($this->isColumnModified(FaconpagPeer::ASIPARREC)) $criteria->add(FaconpagPeer::ASIPARREC, $this->asiparrec);
		if ($this->isColumnModified(FaconpagPeer::GENERACOM)) $criteria->add(FaconpagPeer::GENERACOM, $this->generacom);
		if ($this->isColumnModified(FaconpagPeer::MERCON)) $criteria->add(FaconpagPeer::MERCON, $this->mercon);
		if ($this->isColumnModified(FaconpagPeer::CTADEV)) $criteria->add(FaconpagPeer::CTADEV, $this->ctadev);
		if ($this->isColumnModified(FaconpagPeer::CTAVCO)) $criteria->add(FaconpagPeer::CTAVCO, $this->ctavco);
		if ($this->isColumnModified(FaconpagPeer::UNIVTA)) $criteria->add(FaconpagPeer::UNIVTA, $this->univta);
		if ($this->isColumnModified(FaconpagPeer::ID)) $criteria->add(FaconpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaconpagPeer::DATABASE_NAME);

		$criteria->add(FaconpagPeer::ID, $this->id);

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

		$copyObj->setDesconpag($this->desconpag);

		$copyObj->setTipconpag($this->tipconpag);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setGeneraop($this->generaop);

		$copyObj->setAsiparrec($this->asiparrec);

		$copyObj->setGeneracom($this->generacom);

		$copyObj->setMercon($this->mercon);

		$copyObj->setCtadev($this->ctadev);

		$copyObj->setCtavco($this->ctavco);

		$copyObj->setUnivta($this->univta);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFapresups() as $relObj) {
				$copyObj->addFapresup($relObj->copy($deepCopy));
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
			self::$peer = new FaconpagPeer();
		}
		return self::$peer;
	}

	
	public function initFapresups()
	{
		if ($this->collFapresups === null) {
			$this->collFapresups = array();
		}
	}

	
	public function getFapresups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFapresups === null) {
			if ($this->isNew()) {
			   $this->collFapresups = array();
			} else {

				$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

				FapresupPeer::addSelectColumns($criteria);
				$this->collFapresups = FapresupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

				FapresupPeer::addSelectColumns($criteria);
				if (!isset($this->lastFapresupCriteria) || !$this->lastFapresupCriteria->equals($criteria)) {
					$this->collFapresups = FapresupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFapresupCriteria = $criteria;
		return $this->collFapresups;
	}

	
	public function countFapresups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

		return FapresupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFapresup(Fapresup $l)
	{
		$this->collFapresups[] = $l;
		$l->setFaconpag($this);
	}


	
	public function getFapresupsJoinFafordes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFapresups === null) {
			if ($this->isNew()) {
				$this->collFapresups = array();
			} else {

				$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

				$this->collFapresups = FapresupPeer::doSelectJoinFafordes($criteria, $con);
			}
		} else {
									
			$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

			if (!isset($this->lastFapresupCriteria) || !$this->lastFapresupCriteria->equals($criteria)) {
				$this->collFapresups = FapresupPeer::doSelectJoinFafordes($criteria, $con);
			}
		}
		$this->lastFapresupCriteria = $criteria;

		return $this->collFapresups;
	}


	
	public function getFapresupsJoinFaforsol($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFapresupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFapresups === null) {
			if ($this->isNew()) {
				$this->collFapresups = array();
			} else {

				$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

				$this->collFapresups = FapresupPeer::doSelectJoinFaforsol($criteria, $con);
			}
		} else {
									
			$criteria->add(FapresupPeer::FACONPAG_ID, $this->getId());

			if (!isset($this->lastFapresupCriteria) || !$this->lastFapresupCriteria->equals($criteria)) {
				$this->collFapresups = FapresupPeer::doSelectJoinFaforsol($criteria, $con);
			}
		}
		$this->lastFapresupCriteria = $criteria;

		return $this->collFapresups;
	}

} 