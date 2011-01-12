<?php


abstract class BaseCcconpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $debcomcon;


	
	protected $habcomcon;


	
	protected $numcon;


	
	protected $tipo;


	
	protected $essum;


	
	protected $intdev;


	
	protected $feccon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDebcomcon($val=false)
  {

    if($val) return number_format($this->debcomcon,2,',','.');
    else return $this->debcomcon;

  }
  
  public function getHabcomcon($val=false)
  {

    if($val) return number_format($this->habcomcon,2,',','.');
    else return $this->habcomcon;

  }
  
  public function getNumcon()
  {

    return $this->numcon;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getEssum()
  {

    return $this->essum;

  }
  
  public function getIntdev()
  {

    return $this->intdev;

  }
  
  public function getFeccon($format = 'Y-m-d')
  {

    if ($this->feccon === null || $this->feccon === '') {
      return null;
    } elseif (!is_int($this->feccon)) {
            $ts = adodb_strtotime($this->feccon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
      }
    } else {
      $ts = $this->feccon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcconpagPeer::ID;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = CcconpagPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = CcconpagPeer::FECHAS;
    }

	} 
	
	public function setDebcomcon($v)
	{

    if ($this->debcomcon !== $v) {
        $this->debcomcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcconpagPeer::DEBCOMCON;
      }
  
	} 
	
	public function setHabcomcon($v)
	{

    if ($this->habcomcon !== $v) {
        $this->habcomcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcconpagPeer::HABCOMCON;
      }
  
	} 
	
	public function setNumcon($v)
	{

    if ($this->numcon !== $v) {
        $this->numcon = $v;
        $this->modifiedColumns[] = CcconpagPeer::NUMCON;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CcconpagPeer::TIPO;
      }
  
	} 
	
	public function setEssum($v)
	{

    if ($this->essum !== $v) {
        $this->essum = $v;
        $this->modifiedColumns[] = CcconpagPeer::ESSUM;
      }
  
	} 
	
	public function setIntdev($v)
	{

    if ($this->intdev !== $v) {
        $this->intdev = $v;
        $this->modifiedColumns[] = CcconpagPeer::INTDEV;
      }
  
	} 
	
	public function setFeccon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = CcconpagPeer::FECCON;
    }

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecdes = $rs->getDate($startcol + 1, null);

      $this->fechas = $rs->getDate($startcol + 2, null);

      $this->debcomcon = $rs->getFloat($startcol + 3);

      $this->habcomcon = $rs->getFloat($startcol + 4);

      $this->numcon = $rs->getInt($startcol + 5);

      $this->tipo = $rs->getString($startcol + 6);

      $this->essum = $rs->getBoolean($startcol + 7);

      $this->intdev = $rs->getBoolean($startcol + 8);

      $this->feccon = $rs->getDate($startcol + 9, null);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccconpag object", $e);
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
			$con = Propel::getConnection(CcconpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcconpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcconpagPeer::DATABASE_NAME);
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
					$pk = CcconpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcconpagPeer::doUpdate($this, $con);
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


			if (($retval = CcconpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecdes();
				break;
			case 2:
				return $this->getFechas();
				break;
			case 3:
				return $this->getDebcomcon();
				break;
			case 4:
				return $this->getHabcomcon();
				break;
			case 5:
				return $this->getNumcon();
				break;
			case 6:
				return $this->getTipo();
				break;
			case 7:
				return $this->getEssum();
				break;
			case 8:
				return $this->getIntdev();
				break;
			case 9:
				return $this->getFeccon();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecdes(),
			$keys[2] => $this->getFechas(),
			$keys[3] => $this->getDebcomcon(),
			$keys[4] => $this->getHabcomcon(),
			$keys[5] => $this->getNumcon(),
			$keys[6] => $this->getTipo(),
			$keys[7] => $this->getEssum(),
			$keys[8] => $this->getIntdev(),
			$keys[9] => $this->getFeccon(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecdes($value);
				break;
			case 2:
				$this->setFechas($value);
				break;
			case 3:
				$this->setDebcomcon($value);
				break;
			case 4:
				$this->setHabcomcon($value);
				break;
			case 5:
				$this->setNumcon($value);
				break;
			case 6:
				$this->setTipo($value);
				break;
			case 7:
				$this->setEssum($value);
				break;
			case 8:
				$this->setIntdev($value);
				break;
			case 9:
				$this->setFeccon($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDebcomcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHabcomcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEssum($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIntdev($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFeccon($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcconpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcconpagPeer::ID)) $criteria->add(CcconpagPeer::ID, $this->id);
		if ($this->isColumnModified(CcconpagPeer::FECDES)) $criteria->add(CcconpagPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(CcconpagPeer::FECHAS)) $criteria->add(CcconpagPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(CcconpagPeer::DEBCOMCON)) $criteria->add(CcconpagPeer::DEBCOMCON, $this->debcomcon);
		if ($this->isColumnModified(CcconpagPeer::HABCOMCON)) $criteria->add(CcconpagPeer::HABCOMCON, $this->habcomcon);
		if ($this->isColumnModified(CcconpagPeer::NUMCON)) $criteria->add(CcconpagPeer::NUMCON, $this->numcon);
		if ($this->isColumnModified(CcconpagPeer::TIPO)) $criteria->add(CcconpagPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CcconpagPeer::ESSUM)) $criteria->add(CcconpagPeer::ESSUM, $this->essum);
		if ($this->isColumnModified(CcconpagPeer::INTDEV)) $criteria->add(CcconpagPeer::INTDEV, $this->intdev);
		if ($this->isColumnModified(CcconpagPeer::FECCON)) $criteria->add(CcconpagPeer::FECCON, $this->feccon);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcconpagPeer::DATABASE_NAME);

		$criteria->add(CcconpagPeer::ID, $this->id);

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

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setDebcomcon($this->debcomcon);

		$copyObj->setHabcomcon($this->habcomcon);

		$copyObj->setNumcon($this->numcon);

		$copyObj->setTipo($this->tipo);

		$copyObj->setEssum($this->essum);

		$copyObj->setIntdev($this->intdev);

		$copyObj->setFeccon($this->feccon);


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
			self::$peer = new CcconpagPeer();
		}
		return self::$peer;
	}

} 