<?php


abstract class BaseCcgerenc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomger;


	
	protected $desger;


	
	protected $objger;


	
	protected $fecvig;


	
	protected $fecven;


	
	protected $nomyml;


	
	protected $orden;


	
	protected $enruta;

	
	protected $collCcaregers;

	
	protected $lastCcaregerCriteria = null;

	
	protected $collCcasiganas;

	
	protected $lastCcasiganaCriteria = null;

	
	protected $collCcbaremos;

	
	protected $lastCcbaremoCriteria = null;

	
	protected $collCcdetgers;

	
	protected $lastCcdetgerCriteria = null;

	
	protected $collCcestatus;

	
	protected $lastCcestatuCriteria = null;

	
	protected $collCcestcredsRelatedByCcgerencoriId;

	
	protected $lastCcestcredRelatedByCcgerencoriIdCriteria = null;

	
	protected $collCcestcredsRelatedByCcgerencdesId;

	
	protected $lastCcestcredRelatedByCcgerencdesIdCriteria = null;

	
	protected $collCcinformsRelatedByCcgerencId;

	
	protected $lastCcinformRelatedByCcgerencIdCriteria = null;

	
	protected $collCcinformsRelatedByCcresbarId;

	
	protected $lastCcinformRelatedByCcresbarIdCriteria = null;

	
	protected $collCcresbars;

	
	protected $lastCcresbarCriteria = null;

	
	protected $collCcsolinfs;

	
	protected $lastCcsolinfCriteria = null;

	
	protected $collCctipanas;

	
	protected $lastCctipanaCriteria = null;

	
	protected $collCcusugers;

	
	protected $lastCcusugerCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomger()
  {

    return trim($this->nomger);

  }
  
  public function getDesger()
  {

    return trim($this->desger);

  }
  
  public function getObjger()
  {

    return trim($this->objger);

  }
  
  public function getFecvig($format = 'Y-m-d')
  {

    if ($this->fecvig === null || $this->fecvig === '') {
      return null;
    } elseif (!is_int($this->fecvig)) {
            $ts = adodb_strtotime($this->fecvig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvig] as date/time value: " . var_export($this->fecvig, true));
      }
    } else {
      $ts = $this->fecvig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomyml()
  {

    return trim($this->nomyml);

  }
  
  public function getOrden()
  {

    return $this->orden;

  }
  
  public function getEnruta()
  {

    return trim($this->enruta);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcgerencPeer::ID;
      }
  
	} 
	
	public function setNomger($v)
	{

    if ($this->nomger !== $v) {
        $this->nomger = $v;
        $this->modifiedColumns[] = CcgerencPeer::NOMGER;
      }
  
	} 
	
	public function setDesger($v)
	{

    if ($this->desger !== $v) {
        $this->desger = $v;
        $this->modifiedColumns[] = CcgerencPeer::DESGER;
      }
  
	} 
	
	public function setObjger($v)
	{

    if ($this->objger !== $v) {
        $this->objger = $v;
        $this->modifiedColumns[] = CcgerencPeer::OBJGER;
      }
  
	} 
	
	public function setFecvig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvig !== $ts) {
      $this->fecvig = $ts;
      $this->modifiedColumns[] = CcgerencPeer::FECVIG;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = CcgerencPeer::FECVEN;
    }

	} 
	
	public function setNomyml($v)
	{

    if ($this->nomyml !== $v) {
        $this->nomyml = $v;
        $this->modifiedColumns[] = CcgerencPeer::NOMYML;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = CcgerencPeer::ORDEN;
      }
  
	} 
	
	public function setEnruta($v)
	{

    if ($this->enruta !== $v) {
        $this->enruta = $v;
        $this->modifiedColumns[] = CcgerencPeer::ENRUTA;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomger = $rs->getString($startcol + 1);

      $this->desger = $rs->getString($startcol + 2);

      $this->objger = $rs->getString($startcol + 3);

      $this->fecvig = $rs->getDate($startcol + 4, null);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->nomyml = $rs->getString($startcol + 6);

      $this->orden = $rs->getInt($startcol + 7);

      $this->enruta = $rs->getString($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccgerenc object", $e);
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
			$con = Propel::getConnection(CcgerencPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcgerencPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcgerencPeer::DATABASE_NAME);
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
					$pk = CcgerencPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcgerencPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcaregers !== null) {
				foreach($this->collCcaregers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcasiganas !== null) {
				foreach($this->collCcasiganas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbaremos !== null) {
				foreach($this->collCcbaremos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdetgers !== null) {
				foreach($this->collCcdetgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestatus !== null) {
				foreach($this->collCcestatus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcredsRelatedByCcgerencoriId !== null) {
				foreach($this->collCcestcredsRelatedByCcgerencoriId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcredsRelatedByCcgerencdesId !== null) {
				foreach($this->collCcestcredsRelatedByCcgerencdesId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcinformsRelatedByCcgerencId !== null) {
				foreach($this->collCcinformsRelatedByCcgerencId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcinformsRelatedByCcresbarId !== null) {
				foreach($this->collCcinformsRelatedByCcresbarId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcresbars !== null) {
				foreach($this->collCcresbars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolinfs !== null) {
				foreach($this->collCcsolinfs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCctipanas !== null) {
				foreach($this->collCctipanas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcusugers !== null) {
				foreach($this->collCcusugers as $referrerFK) {
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


			if (($retval = CcgerencPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcaregers !== null) {
					foreach($this->collCcaregers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcasiganas !== null) {
					foreach($this->collCcasiganas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbaremos !== null) {
					foreach($this->collCcbaremos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdetgers !== null) {
					foreach($this->collCcdetgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestatus !== null) {
					foreach($this->collCcestatus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcredsRelatedByCcgerencoriId !== null) {
					foreach($this->collCcestcredsRelatedByCcgerencoriId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcredsRelatedByCcgerencdesId !== null) {
					foreach($this->collCcestcredsRelatedByCcgerencdesId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcinformsRelatedByCcgerencId !== null) {
					foreach($this->collCcinformsRelatedByCcgerencId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcinformsRelatedByCcresbarId !== null) {
					foreach($this->collCcinformsRelatedByCcresbarId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcresbars !== null) {
					foreach($this->collCcresbars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolinfs !== null) {
					foreach($this->collCcsolinfs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCctipanas !== null) {
					foreach($this->collCctipanas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcusugers !== null) {
					foreach($this->collCcusugers as $referrerFK) {
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
		$pos = CcgerencPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomger();
				break;
			case 2:
				return $this->getDesger();
				break;
			case 3:
				return $this->getObjger();
				break;
			case 4:
				return $this->getFecvig();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getNomyml();
				break;
			case 7:
				return $this->getOrden();
				break;
			case 8:
				return $this->getEnruta();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcgerencPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomger(),
			$keys[2] => $this->getDesger(),
			$keys[3] => $this->getObjger(),
			$keys[4] => $this->getFecvig(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getNomyml(),
			$keys[7] => $this->getOrden(),
			$keys[8] => $this->getEnruta(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcgerencPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomger($value);
				break;
			case 2:
				$this->setDesger($value);
				break;
			case 3:
				$this->setObjger($value);
				break;
			case 4:
				$this->setFecvig($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setNomyml($value);
				break;
			case 7:
				$this->setOrden($value);
				break;
			case 8:
				$this->setEnruta($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcgerencPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomger($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesger($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjger($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecvig($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomyml($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOrden($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEnruta($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcgerencPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcgerencPeer::ID)) $criteria->add(CcgerencPeer::ID, $this->id);
		if ($this->isColumnModified(CcgerencPeer::NOMGER)) $criteria->add(CcgerencPeer::NOMGER, $this->nomger);
		if ($this->isColumnModified(CcgerencPeer::DESGER)) $criteria->add(CcgerencPeer::DESGER, $this->desger);
		if ($this->isColumnModified(CcgerencPeer::OBJGER)) $criteria->add(CcgerencPeer::OBJGER, $this->objger);
		if ($this->isColumnModified(CcgerencPeer::FECVIG)) $criteria->add(CcgerencPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(CcgerencPeer::FECVEN)) $criteria->add(CcgerencPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcgerencPeer::NOMYML)) $criteria->add(CcgerencPeer::NOMYML, $this->nomyml);
		if ($this->isColumnModified(CcgerencPeer::ORDEN)) $criteria->add(CcgerencPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(CcgerencPeer::ENRUTA)) $criteria->add(CcgerencPeer::ENRUTA, $this->enruta);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcgerencPeer::DATABASE_NAME);

		$criteria->add(CcgerencPeer::ID, $this->id);

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

		$copyObj->setNomger($this->nomger);

		$copyObj->setDesger($this->desger);

		$copyObj->setObjger($this->objger);

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNomyml($this->nomyml);

		$copyObj->setOrden($this->orden);

		$copyObj->setEnruta($this->enruta);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcaregers() as $relObj) {
				$copyObj->addCcareger($relObj->copy($deepCopy));
			}

			foreach($this->getCcasiganas() as $relObj) {
				$copyObj->addCcasigana($relObj->copy($deepCopy));
			}

			foreach($this->getCcbaremos() as $relObj) {
				$copyObj->addCcbaremo($relObj->copy($deepCopy));
			}

			foreach($this->getCcdetgers() as $relObj) {
				$copyObj->addCcdetger($relObj->copy($deepCopy));
			}

			foreach($this->getCcestatus() as $relObj) {
				$copyObj->addCcestatu($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcredsRelatedByCcgerencoriId() as $relObj) {
				$copyObj->addCcestcredRelatedByCcgerencoriId($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcredsRelatedByCcgerencdesId() as $relObj) {
				$copyObj->addCcestcredRelatedByCcgerencdesId($relObj->copy($deepCopy));
			}

			foreach($this->getCcinformsRelatedByCcgerencId() as $relObj) {
				$copyObj->addCcinformRelatedByCcgerencId($relObj->copy($deepCopy));
			}

			foreach($this->getCcinformsRelatedByCcresbarId() as $relObj) {
				$copyObj->addCcinformRelatedByCcresbarId($relObj->copy($deepCopy));
			}

			foreach($this->getCcresbars() as $relObj) {
				$copyObj->addCcresbar($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolinfs() as $relObj) {
				$copyObj->addCcsolinf($relObj->copy($deepCopy));
			}

			foreach($this->getCctipanas() as $relObj) {
				$copyObj->addCctipana($relObj->copy($deepCopy));
			}

			foreach($this->getCcusugers() as $relObj) {
				$copyObj->addCcusuger($relObj->copy($deepCopy));
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
			self::$peer = new CcgerencPeer();
		}
		return self::$peer;
	}

	
	public function initCcaregers()
	{
		if ($this->collCcaregers === null) {
			$this->collCcaregers = array();
		}
	}

	
	public function getCcaregers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcaregerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcaregers === null) {
			if ($this->isNew()) {
			   $this->collCcaregers = array();
			} else {

				$criteria->add(CcaregerPeer::CCGERENC_ID, $this->getId());

				CcaregerPeer::addSelectColumns($criteria);
				$this->collCcaregers = CcaregerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcaregerPeer::CCGERENC_ID, $this->getId());

				CcaregerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcaregerCriteria) || !$this->lastCcaregerCriteria->equals($criteria)) {
					$this->collCcaregers = CcaregerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcaregerCriteria = $criteria;
		return $this->collCcaregers;
	}

	
	public function countCcaregers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcaregerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcaregerPeer::CCGERENC_ID, $this->getId());

		return CcaregerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcareger(Ccareger $l)
	{
		$this->collCcaregers[] = $l;
		$l->setCcgerenc($this);
	}

	
	public function initCcasiganas()
	{
		if ($this->collCcasiganas === null) {
			$this->collCcasiganas = array();
		}
	}

	
	public function getCcasiganas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
			   $this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
					$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcasiganaCriteria = $criteria;
		return $this->collCcasiganas;
	}

	
	public function countCcasiganas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

		return CcasiganaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcasigana(Ccasigana $l)
	{
		$this->collCcasiganas[] = $l;
		$l->setCcgerenc($this);
	}


	
	public function getCcasiganasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}

	
	public function initCcbaremos()
	{
		if ($this->collCcbaremos === null) {
			$this->collCcbaremos = array();
		}
	}

	
	public function getCcbaremos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbaremoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbaremos === null) {
			if ($this->isNew()) {
			   $this->collCcbaremos = array();
			} else {

				$criteria->add(CcbaremoPeer::CCGERENC_ID, $this->getId());

				CcbaremoPeer::addSelectColumns($criteria);
				$this->collCcbaremos = CcbaremoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbaremoPeer::CCGERENC_ID, $this->getId());

				CcbaremoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbaremoCriteria) || !$this->lastCcbaremoCriteria->equals($criteria)) {
					$this->collCcbaremos = CcbaremoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbaremoCriteria = $criteria;
		return $this->collCcbaremos;
	}

	
	public function countCcbaremos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbaremoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbaremoPeer::CCGERENC_ID, $this->getId());

		return CcbaremoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbaremo(Ccbaremo $l)
	{
		$this->collCcbaremos[] = $l;
		$l->setCcgerenc($this);
	}


	
	public function getCcbaremosJoinCctitulo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbaremoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbaremos === null) {
			if ($this->isNew()) {
				$this->collCcbaremos = array();
			} else {

				$criteria->add(CcbaremoPeer::CCGERENC_ID, $this->getId());

				$this->collCcbaremos = CcbaremoPeer::doSelectJoinCctitulo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbaremoPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcbaremoCriteria) || !$this->lastCcbaremoCriteria->equals($criteria)) {
				$this->collCcbaremos = CcbaremoPeer::doSelectJoinCctitulo($criteria, $con);
			}
		}
		$this->lastCcbaremoCriteria = $criteria;

		return $this->collCcbaremos;
	}

	
	public function initCcdetgers()
	{
		if ($this->collCcdetgers === null) {
			$this->collCcdetgers = array();
		}
	}

	
	public function getCcdetgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetgers === null) {
			if ($this->isNew()) {
			   $this->collCcdetgers = array();
			} else {

				$criteria->add(CcdetgerPeer::CCGERENC_ID, $this->getId());

				CcdetgerPeer::addSelectColumns($criteria);
				$this->collCcdetgers = CcdetgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetgerPeer::CCGERENC_ID, $this->getId());

				CcdetgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetgerCriteria) || !$this->lastCcdetgerCriteria->equals($criteria)) {
					$this->collCcdetgers = CcdetgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetgerCriteria = $criteria;
		return $this->collCcdetgers;
	}

	
	public function countCcdetgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetgerPeer::CCGERENC_ID, $this->getId());

		return CcdetgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetger(Ccdetger $l)
	{
		$this->collCcdetgers[] = $l;
		$l->setCcgerenc($this);
	}

	
	public function initCcestatus()
	{
		if ($this->collCcestatus === null) {
			$this->collCcestatus = array();
		}
	}

	
	public function getCcestatus($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestatuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestatus === null) {
			if ($this->isNew()) {
			   $this->collCcestatus = array();
			} else {

				$criteria->add(CcestatuPeer::CCGERENC_ID, $this->getId());

				CcestatuPeer::addSelectColumns($criteria);
				$this->collCcestatus = CcestatuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestatuPeer::CCGERENC_ID, $this->getId());

				CcestatuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestatuCriteria) || !$this->lastCcestatuCriteria->equals($criteria)) {
					$this->collCcestatus = CcestatuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestatuCriteria = $criteria;
		return $this->collCcestatus;
	}

	
	public function countCcestatus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestatuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestatuPeer::CCGERENC_ID, $this->getId());

		return CcestatuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestatu(Ccestatu $l)
	{
		$this->collCcestatus[] = $l;
		$l->setCcgerenc($this);
	}

	
	public function initCcestcredsRelatedByCcgerencoriId()
	{
		if ($this->collCcestcredsRelatedByCcgerencoriId === null) {
			$this->collCcestcredsRelatedByCcgerencoriId = array();
		}
	}

	
	public function getCcestcredsRelatedByCcgerencoriId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencoriId === null) {
			if ($this->isNew()) {
			   $this->collCcestcredsRelatedByCcgerencoriId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcredRelatedByCcgerencoriIdCriteria) || !$this->lastCcestcredRelatedByCcgerencoriIdCriteria->equals($criteria)) {
					$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcredRelatedByCcgerencoriIdCriteria = $criteria;
		return $this->collCcestcredsRelatedByCcgerencoriId;
	}

	
	public function countCcestcredsRelatedByCcgerencoriId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

		return CcestcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcredRelatedByCcgerencoriId(Ccestcred $l)
	{
		$this->collCcestcredsRelatedByCcgerencoriId[] = $l;
		$l->setCcgerencRelatedByCcgerencoriId($this);
	}


	
	public function getCcestcredsRelatedByCcgerencoriIdJoinCcestatuRelatedByCcestatuId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencoriId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencoriId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencoriIdCriteria) || !$this->lastCcestcredRelatedByCcgerencoriIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencoriIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencoriId;
	}


	
	public function getCcestcredsRelatedByCcgerencoriIdJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencoriId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencoriId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencoriIdCriteria) || !$this->lastCcestcredRelatedByCcgerencoriIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencoriIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencoriId;
	}


	
	public function getCcestcredsRelatedByCcgerencoriIdJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencoriId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencoriId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencoriIdCriteria) || !$this->lastCcestcredRelatedByCcgerencoriIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencoriIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencoriId;
	}


	
	public function getCcestcredsRelatedByCcgerencoriIdJoinCcestatuRelatedByCcestsigId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencoriId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencoriId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCORI_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencoriIdCriteria) || !$this->lastCcestcredRelatedByCcgerencoriIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencoriId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencoriIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencoriId;
	}

	
	public function initCcestcredsRelatedByCcgerencdesId()
	{
		if ($this->collCcestcredsRelatedByCcgerencdesId === null) {
			$this->collCcestcredsRelatedByCcgerencdesId = array();
		}
	}

	
	public function getCcestcredsRelatedByCcgerencdesId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencdesId === null) {
			if ($this->isNew()) {
			   $this->collCcestcredsRelatedByCcgerencdesId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcredRelatedByCcgerencdesIdCriteria) || !$this->lastCcestcredRelatedByCcgerencdesIdCriteria->equals($criteria)) {
					$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcredRelatedByCcgerencdesIdCriteria = $criteria;
		return $this->collCcestcredsRelatedByCcgerencdesId;
	}

	
	public function countCcestcredsRelatedByCcgerencdesId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

		return CcestcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcredRelatedByCcgerencdesId(Ccestcred $l)
	{
		$this->collCcestcredsRelatedByCcgerencdesId[] = $l;
		$l->setCcgerencRelatedByCcgerencdesId($this);
	}


	
	public function getCcestcredsRelatedByCcgerencdesIdJoinCcestatuRelatedByCcestatuId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencdesId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencdesId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencdesIdCriteria) || !$this->lastCcestcredRelatedByCcgerencdesIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencdesIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencdesId;
	}


	
	public function getCcestcredsRelatedByCcgerencdesIdJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencdesId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencdesId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencdesIdCriteria) || !$this->lastCcestcredRelatedByCcgerencdesIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencdesIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencdesId;
	}


	
	public function getCcestcredsRelatedByCcgerencdesIdJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencdesId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencdesId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencdesIdCriteria) || !$this->lastCcestcredRelatedByCcgerencdesIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencdesIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencdesId;
	}


	
	public function getCcestcredsRelatedByCcgerencdesIdJoinCcestatuRelatedByCcestsigId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcredsRelatedByCcgerencdesId === null) {
			if ($this->isNew()) {
				$this->collCcestcredsRelatedByCcgerencdesId = array();
			} else {

				$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCGERENCDES_ID, $this->getId());

			if (!isset($this->lastCcestcredRelatedByCcgerencdesIdCriteria) || !$this->lastCcestcredRelatedByCcgerencdesIdCriteria->equals($criteria)) {
				$this->collCcestcredsRelatedByCcgerencdesId = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		}
		$this->lastCcestcredRelatedByCcgerencdesIdCriteria = $criteria;

		return $this->collCcestcredsRelatedByCcgerencdesId;
	}

	
	public function initCcinformsRelatedByCcgerencId()
	{
		if ($this->collCcinformsRelatedByCcgerencId === null) {
			$this->collCcinformsRelatedByCcgerencId = array();
		}
	}

	
	public function getCcinformsRelatedByCcgerencId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcgerencId === null) {
			if ($this->isNew()) {
			   $this->collCcinformsRelatedByCcgerencId = array();
			} else {

				$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcinformRelatedByCcgerencIdCriteria) || !$this->lastCcinformRelatedByCcgerencIdCriteria->equals($criteria)) {
					$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcinformRelatedByCcgerencIdCriteria = $criteria;
		return $this->collCcinformsRelatedByCcgerencId;
	}

	
	public function countCcinformsRelatedByCcgerencId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

		return CcinformPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcinformRelatedByCcgerencId(Ccinform $l)
	{
		$this->collCcinformsRelatedByCcgerencId[] = $l;
		$l->setCcgerencRelatedByCcgerencId($this);
	}


	
	public function getCcinformsRelatedByCcgerencIdJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcgerencId === null) {
			if ($this->isNew()) {
				$this->collCcinformsRelatedByCcgerencId = array();
			} else {

				$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcinformRelatedByCcgerencIdCriteria) || !$this->lastCcinformRelatedByCcgerencIdCriteria->equals($criteria)) {
				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcinformRelatedByCcgerencIdCriteria = $criteria;

		return $this->collCcinformsRelatedByCcgerencId;
	}


	
	public function getCcinformsRelatedByCcgerencIdJoinCcclainf($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcgerencId === null) {
			if ($this->isNew()) {
				$this->collCcinformsRelatedByCcgerencId = array();
			} else {

				$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcinformRelatedByCcgerencIdCriteria) || !$this->lastCcinformRelatedByCcgerencIdCriteria->equals($criteria)) {
				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		}
		$this->lastCcinformRelatedByCcgerencIdCriteria = $criteria;

		return $this->collCcinformsRelatedByCcgerencId;
	}


	
	public function getCcinformsRelatedByCcgerencIdJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcgerencId === null) {
			if ($this->isNew()) {
				$this->collCcinformsRelatedByCcgerencId = array();
			} else {

				$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcinformRelatedByCcgerencIdCriteria) || !$this->lastCcinformRelatedByCcgerencIdCriteria->equals($criteria)) {
				$this->collCcinformsRelatedByCcgerencId = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcinformRelatedByCcgerencIdCriteria = $criteria;

		return $this->collCcinformsRelatedByCcgerencId;
	}

	
	public function initCcinformsRelatedByCcresbarId()
	{
		if ($this->collCcinformsRelatedByCcresbarId === null) {
			$this->collCcinformsRelatedByCcresbarId = array();
		}
	}

	
	public function getCcinformsRelatedByCcresbarId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcresbarId === null) {
			if ($this->isNew()) {
			   $this->collCcinformsRelatedByCcresbarId = array();
			} else {

				$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcinformRelatedByCcresbarIdCriteria) || !$this->lastCcinformRelatedByCcresbarIdCriteria->equals($criteria)) {
					$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcinformRelatedByCcresbarIdCriteria = $criteria;
		return $this->collCcinformsRelatedByCcresbarId;
	}

	
	public function countCcinformsRelatedByCcresbarId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

		return CcinformPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcinformRelatedByCcresbarId(Ccinform $l)
	{
		$this->collCcinformsRelatedByCcresbarId[] = $l;
		$l->setCcgerencRelatedByCcresbarId($this);
	}


	
	public function getCcinformsRelatedByCcresbarIdJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcresbarId === null) {
			if ($this->isNew()) {
				$this->collCcinformsRelatedByCcresbarId = array();
			} else {

				$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

			if (!isset($this->lastCcinformRelatedByCcresbarIdCriteria) || !$this->lastCcinformRelatedByCcresbarIdCriteria->equals($criteria)) {
				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcinformRelatedByCcresbarIdCriteria = $criteria;

		return $this->collCcinformsRelatedByCcresbarId;
	}


	
	public function getCcinformsRelatedByCcresbarIdJoinCcclainf($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcresbarId === null) {
			if ($this->isNew()) {
				$this->collCcinformsRelatedByCcresbarId = array();
			} else {

				$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

			if (!isset($this->lastCcinformRelatedByCcresbarIdCriteria) || !$this->lastCcinformRelatedByCcresbarIdCriteria->equals($criteria)) {
				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		}
		$this->lastCcinformRelatedByCcresbarIdCriteria = $criteria;

		return $this->collCcinformsRelatedByCcresbarId;
	}


	
	public function getCcinformsRelatedByCcresbarIdJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinformsRelatedByCcresbarId === null) {
			if ($this->isNew()) {
				$this->collCcinformsRelatedByCcresbarId = array();
			} else {

				$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCRESBAR_ID, $this->getId());

			if (!isset($this->lastCcinformRelatedByCcresbarIdCriteria) || !$this->lastCcinformRelatedByCcresbarIdCriteria->equals($criteria)) {
				$this->collCcinformsRelatedByCcresbarId = CcinformPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcinformRelatedByCcresbarIdCriteria = $criteria;

		return $this->collCcinformsRelatedByCcresbarId;
	}

	
	public function initCcresbars()
	{
		if ($this->collCcresbars === null) {
			$this->collCcresbars = array();
		}
	}

	
	public function getCcresbars($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresbarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcresbars === null) {
			if ($this->isNew()) {
			   $this->collCcresbars = array();
			} else {

				$criteria->add(CcresbarPeer::CCGERENC_ID, $this->getId());

				CcresbarPeer::addSelectColumns($criteria);
				$this->collCcresbars = CcresbarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcresbarPeer::CCGERENC_ID, $this->getId());

				CcresbarPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcresbarCriteria) || !$this->lastCcresbarCriteria->equals($criteria)) {
					$this->collCcresbars = CcresbarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcresbarCriteria = $criteria;
		return $this->collCcresbars;
	}

	
	public function countCcresbars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresbarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcresbarPeer::CCGERENC_ID, $this->getId());

		return CcresbarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcresbar(Ccresbar $l)
	{
		$this->collCcresbars[] = $l;
		$l->setCcgerenc($this);
	}

	
	public function initCcsolinfs()
	{
		if ($this->collCcsolinfs === null) {
			$this->collCcsolinfs = array();
		}
	}

	
	public function getCcsolinfs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
			   $this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

				CcsolinfPeer::addSelectColumns($criteria);
				$this->collCcsolinfs = CcsolinfPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

				CcsolinfPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
					$this->collCcsolinfs = CcsolinfPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolinfCriteria = $criteria;
		return $this->collCcsolinfs;
	}

	
	public function countCcsolinfs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

		return CcsolinfPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolinf(Ccsolinf $l)
	{
		$this->collCcsolinfs[] = $l;
		$l->setCcgerenc($this);
	}


	
	public function getCcsolinfsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
				$this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcsolinfCriteria = $criteria;

		return $this->collCcsolinfs;
	}


	
	public function getCcsolinfsJoinCcclainf($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolinfs === null) {
			if ($this->isNew()) {
				$this->collCcsolinfs = array();
			} else {

				$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcclainf($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolinfPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcsolinfCriteria) || !$this->lastCcsolinfCriteria->equals($criteria)) {
				$this->collCcsolinfs = CcsolinfPeer::doSelectJoinCcclainf($criteria, $con);
			}
		}
		$this->lastCcsolinfCriteria = $criteria;

		return $this->collCcsolinfs;
	}

	
	public function initCctipanas()
	{
		if ($this->collCctipanas === null) {
			$this->collCctipanas = array();
		}
	}

	
	public function getCctipanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCctipanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCctipanas === null) {
			if ($this->isNew()) {
			   $this->collCctipanas = array();
			} else {

				$criteria->add(CctipanaPeer::CCGERENC_ID, $this->getId());

				CctipanaPeer::addSelectColumns($criteria);
				$this->collCctipanas = CctipanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CctipanaPeer::CCGERENC_ID, $this->getId());

				CctipanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCctipanaCriteria) || !$this->lastCctipanaCriteria->equals($criteria)) {
					$this->collCctipanas = CctipanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCctipanaCriteria = $criteria;
		return $this->collCctipanas;
	}

	
	public function countCctipanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCctipanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CctipanaPeer::CCGERENC_ID, $this->getId());

		return CctipanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCctipana(Cctipana $l)
	{
		$this->collCctipanas[] = $l;
		$l->setCcgerenc($this);
	}

	
	public function initCcusugers()
	{
		if ($this->collCcusugers === null) {
			$this->collCcusugers = array();
		}
	}

	
	public function getCcusugers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusugerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusugers === null) {
			if ($this->isNew()) {
			   $this->collCcusugers = array();
			} else {

				$criteria->add(CcusugerPeer::CCGERENC_ID, $this->getId());

				CcusugerPeer::addSelectColumns($criteria);
				$this->collCcusugers = CcusugerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcusugerPeer::CCGERENC_ID, $this->getId());

				CcusugerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcusugerCriteria) || !$this->lastCcusugerCriteria->equals($criteria)) {
					$this->collCcusugers = CcusugerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcusugerCriteria = $criteria;
		return $this->collCcusugers;
	}

	
	public function countCcusugers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusugerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcusugerPeer::CCGERENC_ID, $this->getId());

		return CcusugerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcusuger(Ccusuger $l)
	{
		$this->collCcusugers[] = $l;
		$l->setCcgerenc($this);
	}


	
	public function getCcusugersJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusugerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusugers === null) {
			if ($this->isNew()) {
				$this->collCcusugers = array();
			} else {

				$criteria->add(CcusugerPeer::CCGERENC_ID, $this->getId());

				$this->collCcusugers = CcusugerPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcusugerPeer::CCGERENC_ID, $this->getId());

			if (!isset($this->lastCcusugerCriteria) || !$this->lastCcusugerCriteria->equals($criteria)) {
				$this->collCcusugers = CcusugerPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcusugerCriteria = $criteria;

		return $this->collCcusugers;
	}

} 