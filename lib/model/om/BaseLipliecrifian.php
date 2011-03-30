<?php


abstract class BaseLipliecrifian extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codcomres;


	
	protected $puntua;


	
	protected $porcen;


	
	protected $empresa;


	
	protected $fecemi;


	
	protected $fecven;


	
	protected $limit;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodcomres()
  {

    return trim($this->codcomres);

  }
  
  public function getPuntua($val=false)
  {

    if($val) return number_format($this->puntua,2,',','.');
    else return $this->puntua;

  }
  
  public function getPorcen($val=false)
  {

    if($val) return number_format($this->porcen,2,',','.');
    else return $this->porcen;

  }
  
  public function getEmpresa()
  {

    return trim($this->empresa);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
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

  
  public function getLimit()
  {

    return trim($this->limit);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LipliecrifianPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LipliecrifianPeer::NUMEXP;
      }
  
	} 
	
	public function setCodcomres($v)
	{

    if ($this->codcomres !== $v) {
        $this->codcomres = $v;
        $this->modifiedColumns[] = LipliecrifianPeer::CODCOMRES;
      }
  
	} 
	
	public function setPuntua($v)
	{

    if ($this->puntua !== $v) {
        $this->puntua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LipliecrifianPeer::PUNTUA;
      }
  
	} 
	
	public function setPorcen($v)
	{

    if ($this->porcen !== $v) {
        $this->porcen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LipliecrifianPeer::PORCEN;
      }
  
	} 
	
	public function setEmpresa($v)
	{

    if ($this->empresa !== $v) {
        $this->empresa = $v;
        $this->modifiedColumns[] = LipliecrifianPeer::EMPRESA;
      }
  
	} 
	
	public function setFecemi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = LipliecrifianPeer::FECEMI;
    }

	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = LipliecrifianPeer::FECVEN;
    }

	} 
	
	public function setLimit($v)
	{

    if ($this->limit !== $v) {
        $this->limit = $v;
        $this->modifiedColumns[] = LipliecrifianPeer::LIMIT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LipliecrifianPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->codcomres = $rs->getString($startcol + 2);

      $this->puntua = $rs->getFloat($startcol + 3);

      $this->porcen = $rs->getFloat($startcol + 4);

      $this->empresa = $rs->getString($startcol + 5);

      $this->fecemi = $rs->getDate($startcol + 6, null);

      $this->fecven = $rs->getDate($startcol + 7, null);

      $this->limit = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lipliecrifian object", $e);
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
			$con = Propel::getConnection(LipliecrifianPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LipliecrifianPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LipliecrifianPeer::DATABASE_NAME);
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
					$pk = LipliecrifianPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LipliecrifianPeer::doUpdate($this, $con);
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


			if (($retval = LipliecrifianPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliecrifianPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getCodcomres();
				break;
			case 3:
				return $this->getPuntua();
				break;
			case 4:
				return $this->getPorcen();
				break;
			case 5:
				return $this->getEmpresa();
				break;
			case 6:
				return $this->getFecemi();
				break;
			case 7:
				return $this->getFecven();
				break;
			case 8:
				return $this->getLimit();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliecrifianPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getCodcomres(),
			$keys[3] => $this->getPuntua(),
			$keys[4] => $this->getPorcen(),
			$keys[5] => $this->getEmpresa(),
			$keys[6] => $this->getFecemi(),
			$keys[7] => $this->getFecven(),
			$keys[8] => $this->getLimit(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliecrifianPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setCodcomres($value);
				break;
			case 3:
				$this->setPuntua($value);
				break;
			case 4:
				$this->setPorcen($value);
				break;
			case 5:
				$this->setEmpresa($value);
				break;
			case 6:
				$this->setFecemi($value);
				break;
			case 7:
				$this->setFecven($value);
				break;
			case 8:
				$this->setLimit($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliecrifianPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcomres($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPuntua($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorcen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmpresa($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecemi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecven($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLimit($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LipliecrifianPeer::DATABASE_NAME);

		if ($this->isColumnModified(LipliecrifianPeer::NUMPLIE)) $criteria->add(LipliecrifianPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LipliecrifianPeer::NUMEXP)) $criteria->add(LipliecrifianPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LipliecrifianPeer::CODCOMRES)) $criteria->add(LipliecrifianPeer::CODCOMRES, $this->codcomres);
		if ($this->isColumnModified(LipliecrifianPeer::PUNTUA)) $criteria->add(LipliecrifianPeer::PUNTUA, $this->puntua);
		if ($this->isColumnModified(LipliecrifianPeer::PORCEN)) $criteria->add(LipliecrifianPeer::PORCEN, $this->porcen);
		if ($this->isColumnModified(LipliecrifianPeer::EMPRESA)) $criteria->add(LipliecrifianPeer::EMPRESA, $this->empresa);
		if ($this->isColumnModified(LipliecrifianPeer::FECEMI)) $criteria->add(LipliecrifianPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(LipliecrifianPeer::FECVEN)) $criteria->add(LipliecrifianPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LipliecrifianPeer::LIMIT)) $criteria->add(LipliecrifianPeer::LIMIT, $this->limit);
		if ($this->isColumnModified(LipliecrifianPeer::ID)) $criteria->add(LipliecrifianPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LipliecrifianPeer::DATABASE_NAME);

		$criteria->add(LipliecrifianPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodcomres($this->codcomres);

		$copyObj->setPuntua($this->puntua);

		$copyObj->setPorcen($this->porcen);

		$copyObj->setEmpresa($this->empresa);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setFecven($this->fecven);

		$copyObj->setLimit($this->limit);


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
			self::$peer = new LipliecrifianPeer();
		}
		return self::$peer;
	}

} 