<?php


abstract class BaseCcrecdes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $obsrec;


	
	protected $fecrec;


	
	protected $codusurec;


	
	protected $fecreccen;


	
	protected $codusucen;


	
	protected $estatu;


	
	protected $ccrecaud_id;


	
	protected $cccuades_id;

	
	protected $aCcrecaud;

	
	protected $aCccuades;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getObsrec()
  {

    return trim($this->obsrec);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodusurec()
  {

    return $this->codusurec;

  }
  
  public function getFecreccen($format = 'Y-m-d')
  {

    if ($this->fecreccen === null || $this->fecreccen === '') {
      return null;
    } elseif (!is_int($this->fecreccen)) {
            $ts = adodb_strtotime($this->fecreccen);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreccen] as date/time value: " . var_export($this->fecreccen, true));
      }
    } else {
      $ts = $this->fecreccen;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodusucen()
  {

    return $this->codusucen;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcrecaudId()
  {

    return $this->ccrecaud_id;

  }
  
  public function getCccuadesId()
  {

    return $this->cccuades_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrecdesPeer::ID;
      }
  
	} 
	
	public function setObsrec($v)
	{

    if ($this->obsrec !== $v) {
        $this->obsrec = $v;
        $this->modifiedColumns[] = CcrecdesPeer::OBSREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = CcrecdesPeer::FECREC;
    }

	} 
	
	public function setCodusurec($v)
	{

    if ($this->codusurec !== $v) {
        $this->codusurec = $v;
        $this->modifiedColumns[] = CcrecdesPeer::CODUSUREC;
      }
  
	} 
	
	public function setFecreccen($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreccen] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreccen !== $ts) {
      $this->fecreccen = $ts;
      $this->modifiedColumns[] = CcrecdesPeer::FECRECCEN;
    }

	} 
	
	public function setCodusucen($v)
	{

    if ($this->codusucen !== $v) {
        $this->codusucen = $v;
        $this->modifiedColumns[] = CcrecdesPeer::CODUSUCEN;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcrecdesPeer::ESTATU;
      }
  
	} 
	
	public function setCcrecaudId($v)
	{

    if ($this->ccrecaud_id !== $v) {
        $this->ccrecaud_id = $v;
        $this->modifiedColumns[] = CcrecdesPeer::CCRECAUD_ID;
      }
  
		if ($this->aCcrecaud !== null && $this->aCcrecaud->getId() !== $v) {
			$this->aCcrecaud = null;
		}

	} 
	
	public function setCccuadesId($v)
	{

    if ($this->cccuades_id !== $v) {
        $this->cccuades_id = $v;
        $this->modifiedColumns[] = CcrecdesPeer::CCCUADES_ID;
      }
  
		if ($this->aCccuades !== null && $this->aCccuades->getId() !== $v) {
			$this->aCccuades = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->obsrec = $rs->getString($startcol + 1);

      $this->fecrec = $rs->getDate($startcol + 2, null);

      $this->codusurec = $rs->getInt($startcol + 3);

      $this->fecreccen = $rs->getDate($startcol + 4, null);

      $this->codusucen = $rs->getInt($startcol + 5);

      $this->estatu = $rs->getString($startcol + 6);

      $this->ccrecaud_id = $rs->getInt($startcol + 7);

      $this->cccuades_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrecdes object", $e);
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
			$con = Propel::getConnection(CcrecdesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrecdesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrecdesPeer::DATABASE_NAME);
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


												
			if ($this->aCcrecaud !== null) {
				if ($this->aCcrecaud->isModified()) {
					$affectedRows += $this->aCcrecaud->save($con);
				}
				$this->setCcrecaud($this->aCcrecaud);
			}

			if ($this->aCccuades !== null) {
				if ($this->aCccuades->isModified()) {
					$affectedRows += $this->aCccuades->save($con);
				}
				$this->setCccuades($this->aCccuades);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrecdesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrecdesPeer::doUpdate($this, $con);
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


												
			if ($this->aCcrecaud !== null) {
				if (!$this->aCcrecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcrecaud->getValidationFailures());
				}
			}

			if ($this->aCccuades !== null) {
				if (!$this->aCccuades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccuades->getValidationFailures());
				}
			}


			if (($retval = CcrecdesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObsrec();
				break;
			case 2:
				return $this->getFecrec();
				break;
			case 3:
				return $this->getCodusurec();
				break;
			case 4:
				return $this->getFecreccen();
				break;
			case 5:
				return $this->getCodusucen();
				break;
			case 6:
				return $this->getEstatu();
				break;
			case 7:
				return $this->getCcrecaudId();
				break;
			case 8:
				return $this->getCccuadesId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecdesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObsrec(),
			$keys[2] => $this->getFecrec(),
			$keys[3] => $this->getCodusurec(),
			$keys[4] => $this->getFecreccen(),
			$keys[5] => $this->getCodusucen(),
			$keys[6] => $this->getEstatu(),
			$keys[7] => $this->getCcrecaudId(),
			$keys[8] => $this->getCccuadesId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObsrec($value);
				break;
			case 2:
				$this->setFecrec($value);
				break;
			case 3:
				$this->setCodusurec($value);
				break;
			case 4:
				$this->setFecreccen($value);
				break;
			case 5:
				$this->setCodusucen($value);
				break;
			case 6:
				$this->setEstatu($value);
				break;
			case 7:
				$this->setCcrecaudId($value);
				break;
			case 8:
				$this->setCccuadesId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecdesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObsrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodusurec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreccen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodusucen($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEstatu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcrecaudId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCccuadesId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrecdesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrecdesPeer::ID)) $criteria->add(CcrecdesPeer::ID, $this->id);
		if ($this->isColumnModified(CcrecdesPeer::OBSREC)) $criteria->add(CcrecdesPeer::OBSREC, $this->obsrec);
		if ($this->isColumnModified(CcrecdesPeer::FECREC)) $criteria->add(CcrecdesPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(CcrecdesPeer::CODUSUREC)) $criteria->add(CcrecdesPeer::CODUSUREC, $this->codusurec);
		if ($this->isColumnModified(CcrecdesPeer::FECRECCEN)) $criteria->add(CcrecdesPeer::FECRECCEN, $this->fecreccen);
		if ($this->isColumnModified(CcrecdesPeer::CODUSUCEN)) $criteria->add(CcrecdesPeer::CODUSUCEN, $this->codusucen);
		if ($this->isColumnModified(CcrecdesPeer::ESTATU)) $criteria->add(CcrecdesPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcrecdesPeer::CCRECAUD_ID)) $criteria->add(CcrecdesPeer::CCRECAUD_ID, $this->ccrecaud_id);
		if ($this->isColumnModified(CcrecdesPeer::CCCUADES_ID)) $criteria->add(CcrecdesPeer::CCCUADES_ID, $this->cccuades_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrecdesPeer::DATABASE_NAME);

		$criteria->add(CcrecdesPeer::ID, $this->id);

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

		$copyObj->setObsrec($this->obsrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setCodusurec($this->codusurec);

		$copyObj->setFecreccen($this->fecreccen);

		$copyObj->setCodusucen($this->codusucen);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcrecaudId($this->ccrecaud_id);

		$copyObj->setCccuadesId($this->cccuades_id);


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
			self::$peer = new CcrecdesPeer();
		}
		return self::$peer;
	}

	
	public function setCcrecaud($v)
	{


		if ($v === null) {
			$this->setCcrecaudId(NULL);
		} else {
			$this->setCcrecaudId($v->getId());
		}


		$this->aCcrecaud = $v;
	}


	
	public function getCcrecaud($con = null)
	{
		if ($this->aCcrecaud === null && ($this->ccrecaud_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcrecaudPeer.php';

      $c = new Criteria();
      $c->add(CcrecaudPeer::ID,$this->ccrecaud_id);
      
			$this->aCcrecaud = CcrecaudPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcrecaud;
	}

	
	public function setCccuades($v)
	{


		if ($v === null) {
			$this->setCccuadesId(NULL);
		} else {
			$this->setCccuadesId($v->getId());
		}


		$this->aCccuades = $v;
	}


	
	public function getCccuades($con = null)
	{
		if ($this->aCccuades === null && ($this->cccuades_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';

      $c = new Criteria();
      $c->add(CccuadesPeer::ID,$this->cccuades_id);
      
			$this->aCccuades = CccuadesPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccuades;
	}

} 