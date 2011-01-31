<?php


abstract class BaseCatalogo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $descta;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $salant;


	
	protected $debcre;


	
	protected $cargab;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getDescta()
  {

    return trim($this->descta);

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

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getSalant($val=false)
  {

    if($val) return number_format($this->salant,2,',','.');
    else return $this->salant;

  }
  
  public function getDebcre()
  {

    return trim($this->debcre);

  }
  
  public function getCargab()
  {

    return trim($this->cargab);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CatalogoPeer::CODCTA;
      }
  
	} 
	
	public function setDescta($v)
	{

    if ($this->descta !== $v) {
        $this->descta = $v;
        $this->modifiedColumns[] = CatalogoPeer::DESCTA;
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
      $this->modifiedColumns[] = CatalogoPeer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = CatalogoPeer::FECCIE;
    }

	} 
	
	public function setSalant($v)
	{

    if ($this->salant !== $v) {
        $this->salant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CatalogoPeer::SALANT;
      }
  
	} 
	
	public function setDebcre($v)
	{

    if ($this->debcre !== $v) {
        $this->debcre = $v;
        $this->modifiedColumns[] = CatalogoPeer::DEBCRE;
      }
  
	} 
	
	public function setCargab($v)
	{

    if ($this->cargab !== $v) {
        $this->cargab = $v;
        $this->modifiedColumns[] = CatalogoPeer::CARGAB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatalogoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcta = $rs->getString($startcol + 0);

      $this->descta = $rs->getString($startcol + 1);

      $this->fecini = $rs->getDate($startcol + 2, null);

      $this->feccie = $rs->getDate($startcol + 3, null);

      $this->salant = $rs->getFloat($startcol + 4);

      $this->debcre = $rs->getString($startcol + 5);

      $this->cargab = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catalogo object", $e);
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
			$con = Propel::getConnection(CatalogoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatalogoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatalogoPeer::DATABASE_NAME);
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
					$pk = CatalogoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatalogoPeer::doUpdate($this, $con);
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


			if (($retval = CatalogoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatalogoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getDescta();
				break;
			case 2:
				return $this->getFecini();
				break;
			case 3:
				return $this->getFeccie();
				break;
			case 4:
				return $this->getSalant();
				break;
			case 5:
				return $this->getDebcre();
				break;
			case 6:
				return $this->getCargab();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatalogoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getDescta(),
			$keys[2] => $this->getFecini(),
			$keys[3] => $this->getFeccie(),
			$keys[4] => $this->getSalant(),
			$keys[5] => $this->getDebcre(),
			$keys[6] => $this->getCargab(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatalogoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setDescta($value);
				break;
			case 2:
				$this->setFecini($value);
				break;
			case 3:
				$this->setFeccie($value);
				break;
			case 4:
				$this->setSalant($value);
				break;
			case 5:
				$this->setDebcre($value);
				break;
			case 6:
				$this->setCargab($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatalogoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccie($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDebcre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCargab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatalogoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatalogoPeer::CODCTA)) $criteria->add(CatalogoPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CatalogoPeer::DESCTA)) $criteria->add(CatalogoPeer::DESCTA, $this->descta);
		if ($this->isColumnModified(CatalogoPeer::FECINI)) $criteria->add(CatalogoPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(CatalogoPeer::FECCIE)) $criteria->add(CatalogoPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(CatalogoPeer::SALANT)) $criteria->add(CatalogoPeer::SALANT, $this->salant);
		if ($this->isColumnModified(CatalogoPeer::DEBCRE)) $criteria->add(CatalogoPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(CatalogoPeer::CARGAB)) $criteria->add(CatalogoPeer::CARGAB, $this->cargab);
		if ($this->isColumnModified(CatalogoPeer::ID)) $criteria->add(CatalogoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatalogoPeer::DATABASE_NAME);

		$criteria->add(CatalogoPeer::ID, $this->id);

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

		$copyObj->setCodcta($this->codcta);

		$copyObj->setDescta($this->descta);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setSalant($this->salant);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCargab($this->cargab);


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
			self::$peer = new CatalogoPeer();
		}
		return self::$peer;
	}

} 