<?php


abstract class BaseCcamoactresp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $capini;


	
	protected $monint;


	
	protected $fecven;


	
	protected $estatu;


	
	protected $monpri;


	
	protected $monsalcap;


	
	protected $numcuo;


	
	protected $moncuo;


	
	protected $monintmor;


	
	protected $ccdefamo_id;


	
	protected $cccredit_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;

	
	protected $aCcdefamo;

	
	protected $aCccredit;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
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
  
  public function getMoncuo($val=false)
  {

    if($val) return number_format($this->moncuo,2,',','.');
    else return $this->moncuo;

  }
  
  public function getMonintmor($val=false)
  {

    if($val) return number_format($this->monintmor,2,',','.');
    else return $this->monintmor;

  }
  
  public function getCcdefamoId()
  {

    return $this->ccdefamo_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::ID;
      }
  
	} 
	
	public function setCapini($v)
	{

    if ($this->capini !== $v) {
        $this->capini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactrespPeer::CAPINI;
      }
  
	} 
	
	public function setMonint($v)
	{

    if ($this->monint !== $v) {
        $this->monint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactrespPeer::MONINT;
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
      $this->modifiedColumns[] = CcamoactrespPeer::FECVEN;
    }

	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::ESTATU;
      }
  
	} 
	
	public function setMonpri($v)
	{

    if ($this->monpri !== $v) {
        $this->monpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactrespPeer::MONPRI;
      }
  
	} 
	
	public function setMonsalcap($v)
	{

    if ($this->monsalcap !== $v) {
        $this->monsalcap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactrespPeer::MONSALCAP;
      }
  
	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::NUMCUO;
      }
  
	} 
	
	public function setMoncuo($v)
	{

    if ($this->moncuo !== $v) {
        $this->moncuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactrespPeer::MONCUO;
      }
  
	} 
	
	public function setMonintmor($v)
	{

    if ($this->monintmor !== $v) {
        $this->monintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactrespPeer::MONINTMOR;
      }
  
	} 
	
	public function setCcdefamoId($v)
	{

    if ($this->ccdefamo_id !== $v) {
        $this->ccdefamo_id = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::CCDEFAMO_ID;
      }
  
		if ($this->aCcdefamo !== null && $this->aCcdefamo->getId() !== $v) {
			$this->aCcdefamo = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcamoactrespPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
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

      $this->moncuo = $rs->getFloat($startcol + 8);

      $this->monintmor = $rs->getFloat($startcol + 9);

      $this->ccdefamo_id = $rs->getInt($startcol + 10);

      $this->cccredit_id = $rs->getInt($startcol + 11);

      $this->ccpartid_id = $rs->getInt($startcol + 12);

      $this->ccprogra_id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccamoactresp object", $e);
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
			$con = Propel::getConnection(CcamoactrespPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcamoactrespPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcamoactrespPeer::DATABASE_NAME);
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


												
			if ($this->aCcdefamo !== null) {
				if ($this->aCcdefamo->isModified()) {
					$affectedRows += $this->aCcdefamo->save($con);
				}
				$this->setCcdefamo($this->aCcdefamo);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcamoactrespPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcamoactrespPeer::doUpdate($this, $con);
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


												
			if ($this->aCcdefamo !== null) {
				if (!$this->aCcdefamo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdefamo->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}


			if (($retval = CcamoactrespPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamoactrespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMoncuo();
				break;
			case 9:
				return $this->getMonintmor();
				break;
			case 10:
				return $this->getCcdefamoId();
				break;
			case 11:
				return $this->getCccreditId();
				break;
			case 12:
				return $this->getCcpartidId();
				break;
			case 13:
				return $this->getCcprograId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamoactrespPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCapini(),
			$keys[2] => $this->getMonint(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getEstatu(),
			$keys[5] => $this->getMonpri(),
			$keys[6] => $this->getMonsalcap(),
			$keys[7] => $this->getNumcuo(),
			$keys[8] => $this->getMoncuo(),
			$keys[9] => $this->getMonintmor(),
			$keys[10] => $this->getCcdefamoId(),
			$keys[11] => $this->getCccreditId(),
			$keys[12] => $this->getCcpartidId(),
			$keys[13] => $this->getCcprograId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamoactrespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setMoncuo($value);
				break;
			case 9:
				$this->setMonintmor($value);
				break;
			case 10:
				$this->setCcdefamoId($value);
				break;
			case 11:
				$this->setCccreditId($value);
				break;
			case 12:
				$this->setCcpartidId($value);
				break;
			case 13:
				$this->setCcprograId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamoactrespPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCapini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonint($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstatu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonsalcap($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcuo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncuo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonintmor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcdefamoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCccreditId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCcpartidId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCcprograId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcamoactrespPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcamoactrespPeer::ID)) $criteria->add(CcamoactrespPeer::ID, $this->id);
		if ($this->isColumnModified(CcamoactrespPeer::CAPINI)) $criteria->add(CcamoactrespPeer::CAPINI, $this->capini);
		if ($this->isColumnModified(CcamoactrespPeer::MONINT)) $criteria->add(CcamoactrespPeer::MONINT, $this->monint);
		if ($this->isColumnModified(CcamoactrespPeer::FECVEN)) $criteria->add(CcamoactrespPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcamoactrespPeer::ESTATU)) $criteria->add(CcamoactrespPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcamoactrespPeer::MONPRI)) $criteria->add(CcamoactrespPeer::MONPRI, $this->monpri);
		if ($this->isColumnModified(CcamoactrespPeer::MONSALCAP)) $criteria->add(CcamoactrespPeer::MONSALCAP, $this->monsalcap);
		if ($this->isColumnModified(CcamoactrespPeer::NUMCUO)) $criteria->add(CcamoactrespPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(CcamoactrespPeer::MONCUO)) $criteria->add(CcamoactrespPeer::MONCUO, $this->moncuo);
		if ($this->isColumnModified(CcamoactrespPeer::MONINTMOR)) $criteria->add(CcamoactrespPeer::MONINTMOR, $this->monintmor);
		if ($this->isColumnModified(CcamoactrespPeer::CCDEFAMO_ID)) $criteria->add(CcamoactrespPeer::CCDEFAMO_ID, $this->ccdefamo_id);
		if ($this->isColumnModified(CcamoactrespPeer::CCCREDIT_ID)) $criteria->add(CcamoactrespPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcamoactrespPeer::CCPARTID_ID)) $criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcamoactrespPeer::CCPROGRA_ID)) $criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->ccprogra_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcamoactrespPeer::DATABASE_NAME);

		$criteria->add(CcamoactrespPeer::ID, $this->id);

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

		$copyObj->setMoncuo($this->moncuo);

		$copyObj->setMonintmor($this->monintmor);

		$copyObj->setCcdefamoId($this->ccdefamo_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);


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
			self::$peer = new CcamoactrespPeer();
		}
		return self::$peer;
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

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
	}

} 