<?php


abstract class BaseCptrasla extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $fectra;


	
	protected $anotra;


	
	protected $pertra;


	
	protected $destra;


	
	protected $desanu;


	
	protected $tottra;


	
	protected $statra;


	
	protected $fecanu;


	
	protected $nrodec;


	
	protected $id;

	
	protected $collCpsoltraslas;

	
	protected $lastCpsoltraslaCriteria = null;

	
	protected $collCpmovtras;

	
	protected $lastCpmovtraCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnotra()
  {

    return trim($this->anotra);

  }
  
  public function getPertra()
  {

    return trim($this->pertra);

  }
  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getTottra($val=false)
  {

    if($val) return number_format($this->tottra,2,',','.');
    else return $this->tottra;

  }
  
  public function getStatra()
  {

    return trim($this->statra);

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

  
  public function getNrodec()
  {

    return trim($this->nrodec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = CptraslaPeer::REFTRA;
      }
  
	} 
	
	public function setFectra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = CptraslaPeer::FECTRA;
    }

	} 
	
	public function setAnotra($v)
	{

    if ($this->anotra !== $v) {
        $this->anotra = $v;
        $this->modifiedColumns[] = CptraslaPeer::ANOTRA;
      }
  
	} 
	
	public function setPertra($v)
	{

    if ($this->pertra !== $v) {
        $this->pertra = $v;
        $this->modifiedColumns[] = CptraslaPeer::PERTRA;
      }
  
	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = CptraslaPeer::DESTRA;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CptraslaPeer::DESANU;
      }
  
	} 
	
	public function setTottra($v)
	{

    if ($this->tottra !== $v) {
        $this->tottra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CptraslaPeer::TOTTRA;
      }
  
	} 
	
	public function setStatra($v)
	{

    if ($this->statra !== $v) {
        $this->statra = $v;
        $this->modifiedColumns[] = CptraslaPeer::STATRA;
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
      $this->modifiedColumns[] = CptraslaPeer::FECANU;
    }

	} 
	
	public function setNrodec($v)
	{

    if ($this->nrodec !== $v) {
        $this->nrodec = $v;
        $this->modifiedColumns[] = CptraslaPeer::NRODEC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CptraslaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->anotra = $rs->getString($startcol + 2);

      $this->pertra = $rs->getString($startcol + 3);

      $this->destra = $rs->getString($startcol + 4);

      $this->desanu = $rs->getString($startcol + 5);

      $this->tottra = $rs->getFloat($startcol + 6);

      $this->statra = $rs->getString($startcol + 7);

      $this->fecanu = $rs->getDate($startcol + 8, null);

      $this->nrodec = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cptrasla object", $e);
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
			$con = Propel::getConnection(CptraslaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CptraslaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CptraslaPeer::DATABASE_NAME);
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
					$pk = CptraslaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CptraslaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpsoltraslas !== null) {
				foreach($this->collCpsoltraslas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpmovtras !== null) {
				foreach($this->collCpmovtras as $referrerFK) {
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


			if (($retval = CptraslaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpsoltraslas !== null) {
					foreach($this->collCpsoltraslas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpmovtras !== null) {
					foreach($this->collCpmovtras as $referrerFK) {
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
		$pos = CptraslaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getAnotra();
				break;
			case 3:
				return $this->getPertra();
				break;
			case 4:
				return $this->getDestra();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getTottra();
				break;
			case 7:
				return $this->getStatra();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getNrodec();
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
		$keys = CptraslaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getAnotra(),
			$keys[3] => $this->getPertra(),
			$keys[4] => $this->getDestra(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getTottra(),
			$keys[7] => $this->getStatra(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getNrodec(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CptraslaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setAnotra($value);
				break;
			case 3:
				$this->setPertra($value);
				break;
			case 4:
				$this->setDestra($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setTottra($value);
				break;
			case 7:
				$this->setStatra($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setNrodec($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CptraslaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnotra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPertra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDestra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTottra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNrodec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CptraslaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CptraslaPeer::REFTRA)) $criteria->add(CptraslaPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(CptraslaPeer::FECTRA)) $criteria->add(CptraslaPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(CptraslaPeer::ANOTRA)) $criteria->add(CptraslaPeer::ANOTRA, $this->anotra);
		if ($this->isColumnModified(CptraslaPeer::PERTRA)) $criteria->add(CptraslaPeer::PERTRA, $this->pertra);
		if ($this->isColumnModified(CptraslaPeer::DESTRA)) $criteria->add(CptraslaPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(CptraslaPeer::DESANU)) $criteria->add(CptraslaPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CptraslaPeer::TOTTRA)) $criteria->add(CptraslaPeer::TOTTRA, $this->tottra);
		if ($this->isColumnModified(CptraslaPeer::STATRA)) $criteria->add(CptraslaPeer::STATRA, $this->statra);
		if ($this->isColumnModified(CptraslaPeer::FECANU)) $criteria->add(CptraslaPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CptraslaPeer::NRODEC)) $criteria->add(CptraslaPeer::NRODEC, $this->nrodec);
		if ($this->isColumnModified(CptraslaPeer::ID)) $criteria->add(CptraslaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CptraslaPeer::DATABASE_NAME);

		$criteria->add(CptraslaPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setAnotra($this->anotra);

		$copyObj->setPertra($this->pertra);

		$copyObj->setDestra($this->destra);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setTottra($this->tottra);

		$copyObj->setStatra($this->statra);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setNrodec($this->nrodec);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpsoltraslas() as $relObj) {
				$copyObj->addCpsoltrasla($relObj->copy($deepCopy));
			}

			foreach($this->getCpmovtras() as $relObj) {
				$copyObj->addCpmovtra($relObj->copy($deepCopy));
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
			self::$peer = new CptraslaPeer();
		}
		return self::$peer;
	}

	
	public function initCpsoltraslas()
	{
		if ($this->collCpsoltraslas === null) {
			$this->collCpsoltraslas = array();
		}
	}

	
	public function getCpsoltraslas($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoltraslaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsoltraslas === null) {
			if ($this->isNew()) {
			   $this->collCpsoltraslas = array();
			} else {

				$criteria->add(CpsoltraslaPeer::REFTRA, $this->getReftra());

				CpsoltraslaPeer::addSelectColumns($criteria);
				$this->collCpsoltraslas = CpsoltraslaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsoltraslaPeer::REFTRA, $this->getReftra());

				CpsoltraslaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsoltraslaCriteria) || !$this->lastCpsoltraslaCriteria->equals($criteria)) {
					$this->collCpsoltraslas = CpsoltraslaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsoltraslaCriteria = $criteria;
		return $this->collCpsoltraslas;
	}

	
	public function countCpsoltraslas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoltraslaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsoltraslaPeer::REFTRA, $this->getReftra());

		return CpsoltraslaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsoltrasla(Cpsoltrasla $l)
	{
		$this->collCpsoltraslas[] = $l;
		$l->setCptrasla($this);
	}


	
	public function getCpsoltraslasJoinCpartley($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsoltraslaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsoltraslas === null) {
			if ($this->isNew()) {
				$this->collCpsoltraslas = array();
			} else {

				$criteria->add(CpsoltraslaPeer::REFTRA, $this->getReftra());

				$this->collCpsoltraslas = CpsoltraslaPeer::doSelectJoinCpartley($criteria, $con);
			}
		} else {
									
			$criteria->add(CpsoltraslaPeer::REFTRA, $this->getReftra());

			if (!isset($this->lastCpsoltraslaCriteria) || !$this->lastCpsoltraslaCriteria->equals($criteria)) {
				$this->collCpsoltraslas = CpsoltraslaPeer::doSelectJoinCpartley($criteria, $con);
			}
		}
		$this->lastCpsoltraslaCriteria = $criteria;

		return $this->collCpsoltraslas;
	}

	
	public function initCpmovtras()
	{
		if ($this->collCpmovtras === null) {
			$this->collCpmovtras = array();
		}
	}

	
	public function getCpmovtras($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtras === null) {
			if ($this->isNew()) {
			   $this->collCpmovtras = array();
			} else {

				$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

				CpmovtraPeer::addSelectColumns($criteria);
				$this->collCpmovtras = CpmovtraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

				CpmovtraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovtraCriteria) || !$this->lastCpmovtraCriteria->equals($criteria)) {
					$this->collCpmovtras = CpmovtraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovtraCriteria = $criteria;
		return $this->collCpmovtras;
	}

	
	public function countCpmovtras($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

		return CpmovtraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovtra(Cpmovtra $l)
	{
		$this->collCpmovtras[] = $l;
		$l->setCptrasla($this);
	}


	
	public function getCpmovtrasJoinCpdeftitRelatedByCodori($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtras === null) {
			if ($this->isNew()) {
				$this->collCpmovtras = array();
			} else {

				$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

				$this->collCpmovtras = CpmovtraPeer::doSelectJoinCpdeftitRelatedByCodori($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

			if (!isset($this->lastCpmovtraCriteria) || !$this->lastCpmovtraCriteria->equals($criteria)) {
				$this->collCpmovtras = CpmovtraPeer::doSelectJoinCpdeftitRelatedByCodori($criteria, $con);
			}
		}
		$this->lastCpmovtraCriteria = $criteria;

		return $this->collCpmovtras;
	}


	
	public function getCpmovtrasJoinCpdeftitRelatedByCoddes($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtras === null) {
			if ($this->isNew()) {
				$this->collCpmovtras = array();
			} else {

				$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

				$this->collCpmovtras = CpmovtraPeer::doSelectJoinCpdeftitRelatedByCoddes($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovtraPeer::REFTRA, $this->getReftra());

			if (!isset($this->lastCpmovtraCriteria) || !$this->lastCpmovtraCriteria->equals($criteria)) {
				$this->collCpmovtras = CpmovtraPeer::doSelectJoinCpdeftitRelatedByCoddes($criteria, $con);
			}
		}
		$this->lastCpmovtraCriteria = $criteria;

		return $this->collCpmovtras;
	}

} 