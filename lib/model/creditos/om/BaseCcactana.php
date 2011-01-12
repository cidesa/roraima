<?php


abstract class BaseCcactana extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $observ;


	
	protected $fecasi;


	
	protected $feccul;


	
	protected $nomact;


	
	protected $desact;


	
	protected $resact;


	
	protected $estatu;


	
	protected $ccactivi_id;


	
	protected $ccclaact_id;


	
	protected $ccanalis_id;


	
	protected $cccredit_id;

	
	protected $aCcactivi;

	
	protected $aCcclaact;

	
	protected $aCcanalis;

	
	protected $aCccredit;

	
	protected $collCcgescobs;

	
	protected $lastCcgescobCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getFecasi($format = 'Y-m-d')
  {

    if ($this->fecasi === null || $this->fecasi === '') {
      return null;
    } elseif (!is_int($this->fecasi)) {
            $ts = adodb_strtotime($this->fecasi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecasi] as date/time value: " . var_export($this->fecasi, true));
      }
    } else {
      $ts = $this->fecasi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccul($format = 'Y-m-d')
  {

    if ($this->feccul === null || $this->feccul === '') {
      return null;
    } elseif (!is_int($this->feccul)) {
            $ts = adodb_strtotime($this->feccul);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
      }
    } else {
      $ts = $this->feccul;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomact()
  {

    return trim($this->nomact);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getResact()
  {

    return trim($this->resact);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcactiviId()
  {

    return $this->ccactivi_id;

  }
  
  public function getCcclaactId()
  {

    return $this->ccclaact_id;

  }
  
  public function getCcanalisId()
  {

    return $this->ccanalis_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcactanaPeer::ID;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcactanaPeer::OBSERV;
      }
  
	} 
	
	public function setFecasi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecasi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecasi !== $ts) {
      $this->fecasi = $ts;
      $this->modifiedColumns[] = CcactanaPeer::FECASI;
    }

	} 
	
	public function setFeccul($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccul !== $ts) {
      $this->feccul = $ts;
      $this->modifiedColumns[] = CcactanaPeer::FECCUL;
    }

	} 
	
	public function setNomact($v)
	{

    if ($this->nomact !== $v) {
        $this->nomact = $v;
        $this->modifiedColumns[] = CcactanaPeer::NOMACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = CcactanaPeer::DESACT;
      }
  
	} 
	
	public function setResact($v)
	{

    if ($this->resact !== $v) {
        $this->resact = $v;
        $this->modifiedColumns[] = CcactanaPeer::RESACT;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcactanaPeer::ESTATU;
      }
  
	} 
	
	public function setCcactiviId($v)
	{

    if ($this->ccactivi_id !== $v) {
        $this->ccactivi_id = $v;
        $this->modifiedColumns[] = CcactanaPeer::CCACTIVI_ID;
      }
  
		if ($this->aCcactivi !== null && $this->aCcactivi->getId() !== $v) {
			$this->aCcactivi = null;
		}

	} 
	
	public function setCcclaactId($v)
	{

    if ($this->ccclaact_id !== $v) {
        $this->ccclaact_id = $v;
        $this->modifiedColumns[] = CcactanaPeer::CCCLAACT_ID;
      }
  
		if ($this->aCcclaact !== null && $this->aCcclaact->getId() !== $v) {
			$this->aCcclaact = null;
		}

	} 
	
	public function setCcanalisId($v)
	{

    if ($this->ccanalis_id !== $v) {
        $this->ccanalis_id = $v;
        $this->modifiedColumns[] = CcactanaPeer::CCANALIS_ID;
      }
  
		if ($this->aCcanalis !== null && $this->aCcanalis->getId() !== $v) {
			$this->aCcanalis = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcactanaPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->observ = $rs->getString($startcol + 1);

      $this->fecasi = $rs->getDate($startcol + 2, null);

      $this->feccul = $rs->getDate($startcol + 3, null);

      $this->nomact = $rs->getString($startcol + 4);

      $this->desact = $rs->getString($startcol + 5);

      $this->resact = $rs->getString($startcol + 6);

      $this->estatu = $rs->getString($startcol + 7);

      $this->ccactivi_id = $rs->getInt($startcol + 8);

      $this->ccclaact_id = $rs->getInt($startcol + 9);

      $this->ccanalis_id = $rs->getInt($startcol + 10);

      $this->cccredit_id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccactana object", $e);
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
			$con = Propel::getConnection(CcactanaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcactanaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcactanaPeer::DATABASE_NAME);
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


												
			if ($this->aCcactivi !== null) {
				if ($this->aCcactivi->isModified()) {
					$affectedRows += $this->aCcactivi->save($con);
				}
				$this->setCcactivi($this->aCcactivi);
			}

			if ($this->aCcclaact !== null) {
				if ($this->aCcclaact->isModified()) {
					$affectedRows += $this->aCcclaact->save($con);
				}
				$this->setCcclaact($this->aCcclaact);
			}

			if ($this->aCcanalis !== null) {
				if ($this->aCcanalis->isModified()) {
					$affectedRows += $this->aCcanalis->save($con);
				}
				$this->setCcanalis($this->aCcanalis);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcactanaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcactanaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcgescobs !== null) {
				foreach($this->collCcgescobs as $referrerFK) {
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


												
			if ($this->aCcactivi !== null) {
				if (!$this->aCcactivi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcactivi->getValidationFailures());
				}
			}

			if ($this->aCcclaact !== null) {
				if (!$this->aCcclaact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcclaact->getValidationFailures());
				}
			}

			if ($this->aCcanalis !== null) {
				if (!$this->aCcanalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcanalis->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}


			if (($retval = CcactanaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcgescobs !== null) {
					foreach($this->collCcgescobs as $referrerFK) {
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
		$pos = CcactanaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObserv();
				break;
			case 2:
				return $this->getFecasi();
				break;
			case 3:
				return $this->getFeccul();
				break;
			case 4:
				return $this->getNomact();
				break;
			case 5:
				return $this->getDesact();
				break;
			case 6:
				return $this->getResact();
				break;
			case 7:
				return $this->getEstatu();
				break;
			case 8:
				return $this->getCcactiviId();
				break;
			case 9:
				return $this->getCcclaactId();
				break;
			case 10:
				return $this->getCcanalisId();
				break;
			case 11:
				return $this->getCccreditId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcactanaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObserv(),
			$keys[2] => $this->getFecasi(),
			$keys[3] => $this->getFeccul(),
			$keys[4] => $this->getNomact(),
			$keys[5] => $this->getDesact(),
			$keys[6] => $this->getResact(),
			$keys[7] => $this->getEstatu(),
			$keys[8] => $this->getCcactiviId(),
			$keys[9] => $this->getCcclaactId(),
			$keys[10] => $this->getCcanalisId(),
			$keys[11] => $this->getCccreditId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcactanaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObserv($value);
				break;
			case 2:
				$this->setFecasi($value);
				break;
			case 3:
				$this->setFeccul($value);
				break;
			case 4:
				$this->setNomact($value);
				break;
			case 5:
				$this->setDesact($value);
				break;
			case 6:
				$this->setResact($value);
				break;
			case 7:
				$this->setEstatu($value);
				break;
			case 8:
				$this->setCcactiviId($value);
				break;
			case 9:
				$this->setCcclaactId($value);
				break;
			case 10:
				$this->setCcanalisId($value);
				break;
			case 11:
				$this->setCccreditId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcactanaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObserv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecasi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccul($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesact($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setResact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEstatu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcactiviId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcclaactId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcanalisId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCccreditId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcactanaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcactanaPeer::ID)) $criteria->add(CcactanaPeer::ID, $this->id);
		if ($this->isColumnModified(CcactanaPeer::OBSERV)) $criteria->add(CcactanaPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcactanaPeer::FECASI)) $criteria->add(CcactanaPeer::FECASI, $this->fecasi);
		if ($this->isColumnModified(CcactanaPeer::FECCUL)) $criteria->add(CcactanaPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(CcactanaPeer::NOMACT)) $criteria->add(CcactanaPeer::NOMACT, $this->nomact);
		if ($this->isColumnModified(CcactanaPeer::DESACT)) $criteria->add(CcactanaPeer::DESACT, $this->desact);
		if ($this->isColumnModified(CcactanaPeer::RESACT)) $criteria->add(CcactanaPeer::RESACT, $this->resact);
		if ($this->isColumnModified(CcactanaPeer::ESTATU)) $criteria->add(CcactanaPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcactanaPeer::CCACTIVI_ID)) $criteria->add(CcactanaPeer::CCACTIVI_ID, $this->ccactivi_id);
		if ($this->isColumnModified(CcactanaPeer::CCCLAACT_ID)) $criteria->add(CcactanaPeer::CCCLAACT_ID, $this->ccclaact_id);
		if ($this->isColumnModified(CcactanaPeer::CCANALIS_ID)) $criteria->add(CcactanaPeer::CCANALIS_ID, $this->ccanalis_id);
		if ($this->isColumnModified(CcactanaPeer::CCCREDIT_ID)) $criteria->add(CcactanaPeer::CCCREDIT_ID, $this->cccredit_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcactanaPeer::DATABASE_NAME);

		$criteria->add(CcactanaPeer::ID, $this->id);

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

		$copyObj->setObserv($this->observ);

		$copyObj->setFecasi($this->fecasi);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setNomact($this->nomact);

		$copyObj->setDesact($this->desact);

		$copyObj->setResact($this->resact);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcactiviId($this->ccactivi_id);

		$copyObj->setCcclaactId($this->ccclaact_id);

		$copyObj->setCcanalisId($this->ccanalis_id);

		$copyObj->setCccreditId($this->cccredit_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcgescobs() as $relObj) {
				$copyObj->addCcgescob($relObj->copy($deepCopy));
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
			self::$peer = new CcactanaPeer();
		}
		return self::$peer;
	}

	
	public function setCcactivi($v)
	{


		if ($v === null) {
			$this->setCcactiviId(NULL);
		} else {
			$this->setCcactiviId($v->getId());
		}


		$this->aCcactivi = $v;
	}


	
	public function getCcactivi($con = null)
	{
		if ($this->aCcactivi === null && ($this->ccactivi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactiviPeer.php';

      $c = new Criteria();
      $c->add(CcactiviPeer::ID,$this->ccactivi_id);
      
			$this->aCcactivi = CcactiviPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcactivi;
	}

	
	public function setCcclaact($v)
	{


		if ($v === null) {
			$this->setCcclaactId(NULL);
		} else {
			$this->setCcclaactId($v->getId());
		}


		$this->aCcclaact = $v;
	}


	
	public function getCcclaact($con = null)
	{
		if ($this->aCcclaact === null && ($this->ccclaact_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcclaactPeer.php';

      $c = new Criteria();
      $c->add(CcclaactPeer::ID,$this->ccclaact_id);
      
			$this->aCcclaact = CcclaactPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcclaact;
	}

	
	public function setCcanalis($v)
	{


		if ($v === null) {
			$this->setCcanalisId(NULL);
		} else {
			$this->setCcanalisId($v->getId());
		}


		$this->aCcanalis = $v;
	}


	
	public function getCcanalis($con = null)
	{
		if ($this->aCcanalis === null && ($this->ccanalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';

      $c = new Criteria();
      $c->add(CcanalisPeer::ID,$this->ccanalis_id);
      
			$this->aCcanalis = CcanalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcanalis;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function initCcgescobs()
	{
		if ($this->collCcgescobs === null) {
			$this->collCcgescobs = array();
		}
	}

	
	public function getCcgescobs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
			   $this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
					$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgescobCriteria = $criteria;
		return $this->collCcgescobs;
	}

	
	public function countCcgescobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

		return CcgescobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgescob(Ccgescob $l)
	{
		$this->collCcgescobs[] = $l;
		$l->setCcactana($this);
	}


	
	public function getCcgescobsJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCACTANA_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}

} 