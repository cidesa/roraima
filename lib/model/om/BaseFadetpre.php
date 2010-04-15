<?php


abstract class BaseFadetpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $codart;


	
	protected $cansol;


	
	protected $precio;


	
	protected $mondesc;


	
	protected $monrgo;


	
	protected $totart;


	
	protected $fecent;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpre()
  {

    return trim($this->refpre);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCansol($val=false)
  {

    if($val) return number_format($this->cansol,2,',','.');
    else return $this->cansol;

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getTotart($val=false)
  {

    if($val) return number_format($this->totart,2,',','.');
    else return $this->totart;

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FadetprePeer::REFPRE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FadetprePeer::CODART;
      }
  
	} 
	
	public function setCansol($v)
	{

    if ($this->cansol !== $v) {
        $this->cansol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::CANSOL;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::PRECIO;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::MONDESC;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::MONRGO;
      }
  
	} 
	
	public function setTotart($v)
	{

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::TOTART;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = FadetprePeer::FECENT;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadetprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->cansol = $rs->getFloat($startcol + 2);

      $this->precio = $rs->getFloat($startcol + 3);

      $this->mondesc = $rs->getFloat($startcol + 4);

      $this->monrgo = $rs->getFloat($startcol + 5);

      $this->totart = $rs->getFloat($startcol + 6);

      $this->fecent = $rs->getDate($startcol + 7, null);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadetpre object", $e);
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
			$con = Propel::getConnection(FadetprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadetprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadetprePeer::DATABASE_NAME);
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
					$pk = FadetprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadetprePeer::doUpdate($this, $con);
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


			if (($retval = FadetprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpre();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCansol();
				break;
			case 3:
				return $this->getPrecio();
				break;
			case 4:
				return $this->getMondesc();
				break;
			case 5:
				return $this->getMonrgo();
				break;
			case 6:
				return $this->getTotart();
				break;
			case 7:
				return $this->getFecent();
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
		$keys = FadetprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCansol(),
			$keys[3] => $this->getPrecio(),
			$keys[4] => $this->getMondesc(),
			$keys[5] => $this->getMonrgo(),
			$keys[6] => $this->getTotart(),
			$keys[7] => $this->getFecent(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpre($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCansol($value);
				break;
			case 3:
				$this->setPrecio($value);
				break;
			case 4:
				$this->setMondesc($value);
				break;
			case 5:
				$this->setMonrgo($value);
				break;
			case 6:
				$this->setTotart($value);
				break;
			case 7:
				$this->setFecent($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCansol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrecio($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondesc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonrgo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotart($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadetprePeer::DATABASE_NAME);

		if ($this->isColumnModified(FadetprePeer::REFPRE)) $criteria->add(FadetprePeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FadetprePeer::CODART)) $criteria->add(FadetprePeer::CODART, $this->codart);
		if ($this->isColumnModified(FadetprePeer::CANSOL)) $criteria->add(FadetprePeer::CANSOL, $this->cansol);
		if ($this->isColumnModified(FadetprePeer::PRECIO)) $criteria->add(FadetprePeer::PRECIO, $this->precio);
		if ($this->isColumnModified(FadetprePeer::MONDESC)) $criteria->add(FadetprePeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FadetprePeer::MONRGO)) $criteria->add(FadetprePeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FadetprePeer::TOTART)) $criteria->add(FadetprePeer::TOTART, $this->totart);
		if ($this->isColumnModified(FadetprePeer::FECENT)) $criteria->add(FadetprePeer::FECENT, $this->fecent);
		if ($this->isColumnModified(FadetprePeer::ID)) $criteria->add(FadetprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadetprePeer::DATABASE_NAME);

		$criteria->add(FadetprePeer::ID, $this->id);

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

		$copyObj->setRefpre($this->refpre);

		$copyObj->setCodart($this->codart);

		$copyObj->setCansol($this->cansol);

		$copyObj->setPrecio($this->precio);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTotart($this->totart);

		$copyObj->setFecent($this->fecent);


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
			self::$peer = new FadetprePeer();
		}
		return self::$peer;
	}

} 