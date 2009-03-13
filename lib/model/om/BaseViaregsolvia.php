<?php


abstract class BaseViaregsolvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedemp;


	
	protected $refcom;


	
	protected $codpre;


	
	protected $tipcom;


	
	protected $fecha;


	
	protected $descr;


	
	protected $viaregtiptab_id;


	
	protected $monto;


	
	protected $id;

	
	protected $aViaregtiptab;

	
	protected $collViaregdetsolvias;

	
	protected $lastViaregdetsolviaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDescr()
  {

    return trim($this->descr);

  }
  
  public function getViaregtiptabId()
  {

    return $this->viaregtiptab_id;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::CEDEMP;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::REFCOM;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::CODPRE;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::TIPCOM;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = ViaregsolviaPeer::FECHA;
    }

	} 
	
	public function setDescr($v)
	{

    if ($this->descr !== $v) {
        $this->descr = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::DESCR;
      }
  
	} 
	
	public function setViaregtiptabId($v)
	{

    if ($this->viaregtiptab_id !== $v) {
        $this->viaregtiptab_id = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::VIAREGTIPTAB_ID;
      }
  
		if ($this->aViaregtiptab !== null && $this->aViaregtiptab->getId() !== $v) {
			$this->aViaregtiptab = null;
		}

	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViaregsolviaPeer::MONTO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregsolviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedemp = $rs->getString($startcol + 0);

      $this->refcom = $rs->getString($startcol + 1);

      $this->codpre = $rs->getString($startcol + 2);

      $this->tipcom = $rs->getString($startcol + 3);

      $this->fecha = $rs->getDate($startcol + 4, null);

      $this->descr = $rs->getString($startcol + 5);

      $this->viaregtiptab_id = $rs->getInt($startcol + 6);

      $this->monto = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregsolvia object", $e);
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
			$con = Propel::getConnection(ViaregsolviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregsolviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregsolviaPeer::DATABASE_NAME);
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


												
			if ($this->aViaregtiptab !== null) {
				if ($this->aViaregtiptab->isModified()) {
					$affectedRows += $this->aViaregtiptab->save($con);
				}
				$this->setViaregtiptab($this->aViaregtiptab);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViaregsolviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregsolviaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViaregdetsolvias !== null) {
				foreach($this->collViaregdetsolvias as $referrerFK) {
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


												
			if ($this->aViaregtiptab !== null) {
				if (!$this->aViaregtiptab->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregtiptab->getValidationFailures());
				}
			}


			if (($retval = ViaregsolviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViaregdetsolvias !== null) {
					foreach($this->collViaregdetsolvias as $referrerFK) {
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
		$pos = ViaregsolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedemp();
				break;
			case 1:
				return $this->getRefcom();
				break;
			case 2:
				return $this->getCodpre();
				break;
			case 3:
				return $this->getTipcom();
				break;
			case 4:
				return $this->getFecha();
				break;
			case 5:
				return $this->getDescr();
				break;
			case 6:
				return $this->getViaregtiptabId();
				break;
			case 7:
				return $this->getMonto();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregsolviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedemp(),
			$keys[1] => $this->getRefcom(),
			$keys[2] => $this->getCodpre(),
			$keys[3] => $this->getTipcom(),
			$keys[4] => $this->getFecha(),
			$keys[5] => $this->getDescr(),
			$keys[6] => $this->getViaregtiptabId(),
			$keys[7] => $this->getMonto(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregsolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedemp($value);
				break;
			case 1:
				$this->setRefcom($value);
				break;
			case 2:
				$this->setCodpre($value);
				break;
			case 3:
				$this->setTipcom($value);
				break;
			case 4:
				$this->setFecha($value);
				break;
			case 5:
				$this->setDescr($value);
				break;
			case 6:
				$this->setViaregtiptabId($value);
				break;
			case 7:
				$this->setMonto($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregsolviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecha($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setViaregtiptabId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregsolviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregsolviaPeer::CEDEMP)) $criteria->add(ViaregsolviaPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(ViaregsolviaPeer::REFCOM)) $criteria->add(ViaregsolviaPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(ViaregsolviaPeer::CODPRE)) $criteria->add(ViaregsolviaPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(ViaregsolviaPeer::TIPCOM)) $criteria->add(ViaregsolviaPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(ViaregsolviaPeer::FECHA)) $criteria->add(ViaregsolviaPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(ViaregsolviaPeer::DESCR)) $criteria->add(ViaregsolviaPeer::DESCR, $this->descr);
		if ($this->isColumnModified(ViaregsolviaPeer::VIAREGTIPTAB_ID)) $criteria->add(ViaregsolviaPeer::VIAREGTIPTAB_ID, $this->viaregtiptab_id);
		if ($this->isColumnModified(ViaregsolviaPeer::MONTO)) $criteria->add(ViaregsolviaPeer::MONTO, $this->monto);
		if ($this->isColumnModified(ViaregsolviaPeer::ID)) $criteria->add(ViaregsolviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregsolviaPeer::DATABASE_NAME);

		$criteria->add(ViaregsolviaPeer::ID, $this->id);

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

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setFecha($this->fecha);

		$copyObj->setDescr($this->descr);

		$copyObj->setViaregtiptabId($this->viaregtiptab_id);

		$copyObj->setMonto($this->monto);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViaregdetsolvias() as $relObj) {
				$copyObj->addViaregdetsolvia($relObj->copy($deepCopy));
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
			self::$peer = new ViaregsolviaPeer();
		}
		return self::$peer;
	}

	
	public function setViaregtiptab($v)
	{


		if ($v === null) {
			$this->setViaregtiptabId(NULL);
		} else {
			$this->setViaregtiptabId($v->getId());
		}


		$this->aViaregtiptab = $v;
	}


	
	public function getViaregtiptab($con = null)
	{
		if ($this->aViaregtiptab === null && ($this->viaregtiptab_id !== null)) {
						include_once 'lib/model/om/BaseViaregtiptabPeer.php';

			$this->aViaregtiptab = ViaregtiptabPeer::retrieveByPK($this->viaregtiptab_id, $con);

			
		}
		return $this->aViaregtiptab;
	}

	
	public function initViaregdetsolvias()
	{
		if ($this->collViaregdetsolvias === null) {
			$this->collViaregdetsolvias = array();
		}
	}

	
	public function getViaregdetsolvias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
			   $this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
					$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;
		return $this->collViaregdetsolvias;
	}

	
	public function countViaregdetsolvias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

		return ViaregdetsolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregdetsolvia(Viaregdetsolvia $l)
	{
		$this->collViaregdetsolvias[] = $l;
		$l->setViaregsolvia($this);
	}


	
	public function getViaregdetsolviasJoinViaregente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregente($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregente($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinViaregact($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregact($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregact($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}

} 