<?php


abstract class BaseCcamoprin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $capini;


	
	protected $monint;


	
	protected $fecven;


	
	protected $estatu;


	
	protected $monpri;


	
	protected $monsalcap;


	
	protected $numcuo;


	
	protected $ccamoact_id;


	
	protected $ccdefamo_id;

	
	protected $aCcamoact;

	
	protected $aCcdefamo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCapini($val=false)
  {

    if($val) return number_format($this->capini,2,',','.');
    else return $this->capini;

  }
  
  public function getMonint($val=false)
  {

    if($val) return number_format($this->monint,2,',','.');
    else return $this->monint;

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

  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getMonpri($val=false)
  {

    if($val) return number_format($this->monpri,2,',','.');
    else return $this->monpri;

  }
  
  public function getMonsalcap($val=false)
  {

    if($val) return number_format($this->monsalcap,2,',','.');
    else return $this->monsalcap;

  }
  
  public function getNumcuo()
  {

    return $this->numcuo;

  }
  
  public function getCcamoactId()
  {

    return $this->ccamoact_id;

  }
  
  public function getCcdefamoId()
  {

    return $this->ccdefamo_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcamoprinPeer::ID;
      }
  
	} 
	
	public function setCapini($v)
	{

    if ($this->capini !== $v) {
        $this->capini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoprinPeer::CAPINI;
      }
  
	} 
	
	public function setMonint($v)
	{

    if ($this->monint !== $v) {
        $this->monint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoprinPeer::MONINT;
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
      $this->modifiedColumns[] = CcamoprinPeer::FECVEN;
    }

	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcamoprinPeer::ESTATU;
      }
  
	} 
	
	public function setMonpri($v)
	{

    if ($this->monpri !== $v) {
        $this->monpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoprinPeer::MONPRI;
      }
  
	} 
	
	public function setMonsalcap($v)
	{

    if ($this->monsalcap !== $v) {
        $this->monsalcap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoprinPeer::MONSALCAP;
      }
  
	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = $v;
        $this->modifiedColumns[] = CcamoprinPeer::NUMCUO;
      }
  
	} 
	
	public function setCcamoactId($v)
	{

    if ($this->ccamoact_id !== $v) {
        $this->ccamoact_id = $v;
        $this->modifiedColumns[] = CcamoprinPeer::CCAMOACT_ID;
      }
  
		if ($this->aCcamoact !== null && $this->aCcamoact->getId() !== $v) {
			$this->aCcamoact = null;
		}

	} 
	
	public function setCcdefamoId($v)
	{

    if ($this->ccdefamo_id !== $v) {
        $this->ccdefamo_id = $v;
        $this->modifiedColumns[] = CcamoprinPeer::CCDEFAMO_ID;
      }
  
		if ($this->aCcdefamo !== null && $this->aCcdefamo->getId() !== $v) {
			$this->aCcdefamo = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->capini = $rs->getFloat($startcol + 1);

      $this->monint = $rs->getFloat($startcol + 2);

      $this->fecven = $rs->getDate($startcol + 3, null);

      $this->estatu = $rs->getString($startcol + 4);

      $this->monpri = $rs->getFloat($startcol + 5);

      $this->monsalcap = $rs->getFloat($startcol + 6);

      $this->numcuo = $rs->getInt($startcol + 7);

      $this->ccamoact_id = $rs->getInt($startcol + 8);

      $this->ccdefamo_id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccamoprin object", $e);
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
			$con = Propel::getConnection(CcamoprinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcamoprinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcamoprinPeer::DATABASE_NAME);
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


												
			if ($this->aCcamoact !== null) {
				if ($this->aCcamoact->isModified()) {
					$affectedRows += $this->aCcamoact->save($con);
				}
				$this->setCcamoact($this->aCcamoact);
			}

			if ($this->aCcdefamo !== null) {
				if ($this->aCcdefamo->isModified()) {
					$affectedRows += $this->aCcdefamo->save($con);
				}
				$this->setCcdefamo($this->aCcdefamo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcamoprinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcamoprinPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aCcamoact !== null) {
				if (!$this->aCcamoact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcamoact->getValidationFailures());
				}
			}

			if ($this->aCcdefamo !== null) {
				if (!$this->aCcdefamo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdefamo->getValidationFailures());
				}
			}


			if (($retval = CcamoprinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamoprinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCapini();
				break;
			case 2:
				return $this->getMonint();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getEstatu();
				break;
			case 5:
				return $this->getMonpri();
				break;
			case 6:
				return $this->getMonsalcap();
				break;
			case 7:
				return $this->getNumcuo();
				break;
			case 8:
				return $this->getCcamoactId();
				break;
			case 9:
				return $this->getCcdefamoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamoprinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCapini(),
			$keys[2] => $this->getMonint(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getEstatu(),
			$keys[5] => $this->getMonpri(),
			$keys[6] => $this->getMonsalcap(),
			$keys[7] => $this->getNumcuo(),
			$keys[8] => $this->getCcamoactId(),
			$keys[9] => $this->getCcdefamoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamoprinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCapini($value);
				break;
			case 2:
				$this->setMonint($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setEstatu($value);
				break;
			case 5:
				$this->setMonpri($value);
				break;
			case 6:
				$this->setMonsalcap($value);
				break;
			case 7:
				$this->setNumcuo($value);
				break;
			case 8:
				$this->setCcamoactId($value);
				break;
			case 9:
				$this->setCcdefamoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamoprinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCapini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonint($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstatu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonsalcap($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcuo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcamoactId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcdefamoId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcamoprinPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcamoprinPeer::ID)) $criteria->add(CcamoprinPeer::ID, $this->id);
		if ($this->isColumnModified(CcamoprinPeer::CAPINI)) $criteria->add(CcamoprinPeer::CAPINI, $this->capini);
		if ($this->isColumnModified(CcamoprinPeer::MONINT)) $criteria->add(CcamoprinPeer::MONINT, $this->monint);
		if ($this->isColumnModified(CcamoprinPeer::FECVEN)) $criteria->add(CcamoprinPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcamoprinPeer::ESTATU)) $criteria->add(CcamoprinPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcamoprinPeer::MONPRI)) $criteria->add(CcamoprinPeer::MONPRI, $this->monpri);
		if ($this->isColumnModified(CcamoprinPeer::MONSALCAP)) $criteria->add(CcamoprinPeer::MONSALCAP, $this->monsalcap);
		if ($this->isColumnModified(CcamoprinPeer::NUMCUO)) $criteria->add(CcamoprinPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(CcamoprinPeer::CCAMOACT_ID)) $criteria->add(CcamoprinPeer::CCAMOACT_ID, $this->ccamoact_id);
		if ($this->isColumnModified(CcamoprinPeer::CCDEFAMO_ID)) $criteria->add(CcamoprinPeer::CCDEFAMO_ID, $this->ccdefamo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcamoprinPeer::DATABASE_NAME);

		$criteria->add(CcamoprinPeer::ID, $this->id);

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

		$copyObj->setCapini($this->capini);

		$copyObj->setMonint($this->monint);

		$copyObj->setFecven($this->fecven);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setMonpri($this->monpri);

		$copyObj->setMonsalcap($this->monsalcap);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setCcamoactId($this->ccamoact_id);

		$copyObj->setCcdefamoId($this->ccdefamo_id);


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
			self::$peer = new CcamoprinPeer();
		}
		return self::$peer;
	}

	
	public function setCcamoact($v)
	{


		if ($v === null) {
			$this->setCcamoactId(NULL);
		} else {
			$this->setCcamoactId($v->getId());
		}


		$this->aCcamoact = $v;
	}


	
	public function getCcamoact($con = null)
	{
		if ($this->aCcamoact === null && ($this->ccamoact_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';

      $c = new Criteria();
      $c->add(CcamoactPeer::ID,$this->ccamoact_id);
      
			$this->aCcamoact = CcamoactPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcamoact;
	}

	
	public function setCcdefamo($v)
	{


		if ($v === null) {
			$this->setCcdefamoId(NULL);
		} else {
			$this->setCcdefamoId($v->getId());
		}


		$this->aCcdefamo = $v;
	}


	
	public function getCcdefamo($con = null)
	{
		if ($this->aCcdefamo === null && ($this->ccdefamo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';

      $c = new Criteria();
      $c->add(CcdefamoPeer::ID,$this->ccdefamo_id);
      
			$this->aCcdefamo = CcdefamoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdefamo;
	}

} 