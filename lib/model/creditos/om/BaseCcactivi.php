<?php


abstract class BaseCcactivi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomact;


	
	protected $desact;


	
	protected $fecini;


	
	protected $resact;


	
	protected $obsres;


	
	protected $feccul;


	
	protected $estatu;


	
	protected $solcrenum;


	
	protected $solcre;


	
	protected $ccclaact_id;

	
	protected $aCcclaact;

	
	protected $collCcactanas;

	
	protected $lastCcactanaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomact()
  {

    return trim($this->nomact);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getResact()
  {

    return trim($this->resact);

  }
  
  public function getObsres()
  {

    return trim($this->obsres);

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

  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getSolcrenum()
  {

    return trim($this->solcrenum);

  }
  
  public function getSolcre()
  {

    return trim($this->solcre);

  }
  
  public function getCcclaactId()
  {

    return $this->ccclaact_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcactiviPeer::ID;
      }
  
	} 
	
	public function setNomact($v)
	{

    if ($this->nomact !== $v) {
        $this->nomact = $v;
        $this->modifiedColumns[] = CcactiviPeer::NOMACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = CcactiviPeer::DESACT;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = CcactiviPeer::FECINI;
    }

	} 
	
	public function setResact($v)
	{

    if ($this->resact !== $v) {
        $this->resact = $v;
        $this->modifiedColumns[] = CcactiviPeer::RESACT;
      }
  
	} 
	
	public function setObsres($v)
	{

    if ($this->obsres !== $v) {
        $this->obsres = $v;
        $this->modifiedColumns[] = CcactiviPeer::OBSRES;
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
      $this->modifiedColumns[] = CcactiviPeer::FECCUL;
    }

	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcactiviPeer::ESTATU;
      }
  
	} 
	
	public function setSolcrenum($v)
	{

    if ($this->solcrenum !== $v) {
        $this->solcrenum = $v;
        $this->modifiedColumns[] = CcactiviPeer::SOLCRENUM;
      }
  
	} 
	
	public function setSolcre($v)
	{

    if ($this->solcre !== $v) {
        $this->solcre = $v;
        $this->modifiedColumns[] = CcactiviPeer::SOLCRE;
      }
  
	} 
	
	public function setCcclaactId($v)
	{

    if ($this->ccclaact_id !== $v) {
        $this->ccclaact_id = $v;
        $this->modifiedColumns[] = CcactiviPeer::CCCLAACT_ID;
      }
  
		if ($this->aCcclaact !== null && $this->aCcclaact->getId() !== $v) {
			$this->aCcclaact = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomact = $rs->getString($startcol + 1);

      $this->desact = $rs->getString($startcol + 2);

      $this->fecini = $rs->getDate($startcol + 3, null);

      $this->resact = $rs->getString($startcol + 4);

      $this->obsres = $rs->getString($startcol + 5);

      $this->feccul = $rs->getDate($startcol + 6, null);

      $this->estatu = $rs->getString($startcol + 7);

      $this->solcrenum = $rs->getString($startcol + 8);

      $this->solcre = $rs->getString($startcol + 9);

      $this->ccclaact_id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccactivi object", $e);
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
			$con = Propel::getConnection(CcactiviPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcactiviPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcactiviPeer::DATABASE_NAME);
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


												
			if ($this->aCcclaact !== null) {
				if ($this->aCcclaact->isModified()) {
					$affectedRows += $this->aCcclaact->save($con);
				}
				$this->setCcclaact($this->aCcclaact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcactiviPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcactiviPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcactanas !== null) {
				foreach($this->collCcactanas as $referrerFK) {
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


												
			if ($this->aCcclaact !== null) {
				if (!$this->aCcclaact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcclaact->getValidationFailures());
				}
			}


			if (($retval = CcactiviPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcactanas !== null) {
					foreach($this->collCcactanas as $referrerFK) {
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
		$pos = CcactiviPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomact();
				break;
			case 2:
				return $this->getDesact();
				break;
			case 3:
				return $this->getFecini();
				break;
			case 4:
				return $this->getResact();
				break;
			case 5:
				return $this->getObsres();
				break;
			case 6:
				return $this->getFeccul();
				break;
			case 7:
				return $this->getEstatu();
				break;
			case 8:
				return $this->getSolcrenum();
				break;
			case 9:
				return $this->getSolcre();
				break;
			case 10:
				return $this->getCcclaactId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcactiviPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomact(),
			$keys[2] => $this->getDesact(),
			$keys[3] => $this->getFecini(),
			$keys[4] => $this->getResact(),
			$keys[5] => $this->getObsres(),
			$keys[6] => $this->getFeccul(),
			$keys[7] => $this->getEstatu(),
			$keys[8] => $this->getSolcrenum(),
			$keys[9] => $this->getSolcre(),
			$keys[10] => $this->getCcclaactId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcactiviPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomact($value);
				break;
			case 2:
				$this->setDesact($value);
				break;
			case 3:
				$this->setFecini($value);
				break;
			case 4:
				$this->setResact($value);
				break;
			case 5:
				$this->setObsres($value);
				break;
			case 6:
				$this->setFeccul($value);
				break;
			case 7:
				$this->setEstatu($value);
				break;
			case 8:
				$this->setSolcrenum($value);
				break;
			case 9:
				$this->setSolcre($value);
				break;
			case 10:
				$this->setCcclaactId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcactiviPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setResact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObsres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccul($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEstatu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSolcrenum($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSolcre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcclaactId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcactiviPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcactiviPeer::ID)) $criteria->add(CcactiviPeer::ID, $this->id);
		if ($this->isColumnModified(CcactiviPeer::NOMACT)) $criteria->add(CcactiviPeer::NOMACT, $this->nomact);
		if ($this->isColumnModified(CcactiviPeer::DESACT)) $criteria->add(CcactiviPeer::DESACT, $this->desact);
		if ($this->isColumnModified(CcactiviPeer::FECINI)) $criteria->add(CcactiviPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(CcactiviPeer::RESACT)) $criteria->add(CcactiviPeer::RESACT, $this->resact);
		if ($this->isColumnModified(CcactiviPeer::OBSRES)) $criteria->add(CcactiviPeer::OBSRES, $this->obsres);
		if ($this->isColumnModified(CcactiviPeer::FECCUL)) $criteria->add(CcactiviPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(CcactiviPeer::ESTATU)) $criteria->add(CcactiviPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcactiviPeer::SOLCRENUM)) $criteria->add(CcactiviPeer::SOLCRENUM, $this->solcrenum);
		if ($this->isColumnModified(CcactiviPeer::SOLCRE)) $criteria->add(CcactiviPeer::SOLCRE, $this->solcre);
		if ($this->isColumnModified(CcactiviPeer::CCCLAACT_ID)) $criteria->add(CcactiviPeer::CCCLAACT_ID, $this->ccclaact_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcactiviPeer::DATABASE_NAME);

		$criteria->add(CcactiviPeer::ID, $this->id);

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

		$copyObj->setNomact($this->nomact);

		$copyObj->setDesact($this->desact);

		$copyObj->setFecini($this->fecini);

		$copyObj->setResact($this->resact);

		$copyObj->setObsres($this->obsres);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setSolcrenum($this->solcrenum);

		$copyObj->setSolcre($this->solcre);

		$copyObj->setCcclaactId($this->ccclaact_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcactanas() as $relObj) {
				$copyObj->addCcactana($relObj->copy($deepCopy));
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
			self::$peer = new CcactiviPeer();
		}
		return self::$peer;
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

	
	public function initCcactanas()
	{
		if ($this->collCcactanas === null) {
			$this->collCcactanas = array();
		}
	}

	
	public function getCcactanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
			   $this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

				CcactanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
					$this->collCcactanas = CcactanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcactanaCriteria = $criteria;
		return $this->collCcactanas;
	}

	
	public function countCcactanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

		return CcactanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcactana(Ccactana $l)
	{
		$this->collCcactanas[] = $l;
		$l->setCcactivi($this);
	}


	
	public function getCcactanasJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}


	
	public function getCcactanasJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcactanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcactanas === null) {
			if ($this->isNew()) {
				$this->collCcactanas = array();
			} else {

				$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

				$this->collCcactanas = CcactanaPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcactanaPeer::CCACTIVI_ID, $this->getId());

			if (!isset($this->lastCcactanaCriteria) || !$this->lastCcactanaCriteria->equals($criteria)) {
				$this->collCcactanas = CcactanaPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcactanaCriteria = $criteria;

		return $this->collCcactanas;
	}

} 