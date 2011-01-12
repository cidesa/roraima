<?php


abstract class BaseRhdateva extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codevdo;


	
	protected $codevor;


	
	protected $codsup;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $fecela;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodevdo()
  {

    return trim($this->codevdo);

  }
  
  public function getCodevor()
  {

    return trim($this->codevor);

  }
  
  public function getCodsup()
  {

    return trim($this->codsup);

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

  
  public function getFecela($format = 'Y-m-d')
  {

    if ($this->fecela === null || $this->fecela === '') {
      return null;
    } elseif (!is_int($this->fecela)) {
            $ts = adodb_strtotime($this->fecela);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecela] as date/time value: " . var_export($this->fecela, true));
      }
    } else {
      $ts = $this->fecela;
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
	
	public function setCodevdo($v)
	{

    if ($this->codevdo !== $v) {
        $this->codevdo = $v;
        $this->modifiedColumns[] = RhdatevaPeer::CODEVDO;
      }
  
	} 
	
	public function setCodevor($v)
	{

    if ($this->codevor !== $v) {
        $this->codevor = $v;
        $this->modifiedColumns[] = RhdatevaPeer::CODEVOR;
      }
  
	} 
	
	public function setCodsup($v)
	{

    if ($this->codsup !== $v) {
        $this->codsup = $v;
        $this->modifiedColumns[] = RhdatevaPeer::CODSUP;
      }
  
	} 
	
	public function setFecdes($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = RhdatevaPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = RhdatevaPeer::FECHAS;
    }

	} 
	
	public function setFecela($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecela] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecela !== $ts) {
      $this->fecela = $ts;
      $this->modifiedColumns[] = RhdatevaPeer::FECELA;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhdatevaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codevdo = $rs->getString($startcol + 0);

      $this->codevor = $rs->getString($startcol + 1);

      $this->codsup = $rs->getString($startcol + 2);

      $this->fecdes = $rs->getDate($startcol + 3, null);

      $this->fechas = $rs->getDate($startcol + 4, null);

      $this->fecela = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhdateva object", $e);
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
			$con = Propel::getConnection(RhdatevaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdatevaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdatevaPeer::DATABASE_NAME);
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
					$pk = RhdatevaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhdatevaPeer::doUpdate($this, $con);
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


			if (($retval = RhdatevaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdatevaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodevdo();
				break;
			case 1:
				return $this->getCodevor();
				break;
			case 2:
				return $this->getCodsup();
				break;
			case 3:
				return $this->getFecdes();
				break;
			case 4:
				return $this->getFechas();
				break;
			case 5:
				return $this->getFecela();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdatevaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodevdo(),
			$keys[1] => $this->getCodevor(),
			$keys[2] => $this->getCodsup(),
			$keys[3] => $this->getFecdes(),
			$keys[4] => $this->getFechas(),
			$keys[5] => $this->getFecela(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdatevaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodevdo($value);
				break;
			case 1:
				$this->setCodevor($value);
				break;
			case 2:
				$this->setCodsup($value);
				break;
			case 3:
				$this->setFecdes($value);
				break;
			case 4:
				$this->setFechas($value);
				break;
			case 5:
				$this->setFecela($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdatevaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodevdo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodevor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodsup($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecela($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdatevaPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdatevaPeer::CODEVDO)) $criteria->add(RhdatevaPeer::CODEVDO, $this->codevdo);
		if ($this->isColumnModified(RhdatevaPeer::CODEVOR)) $criteria->add(RhdatevaPeer::CODEVOR, $this->codevor);
		if ($this->isColumnModified(RhdatevaPeer::CODSUP)) $criteria->add(RhdatevaPeer::CODSUP, $this->codsup);
		if ($this->isColumnModified(RhdatevaPeer::FECDES)) $criteria->add(RhdatevaPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(RhdatevaPeer::FECHAS)) $criteria->add(RhdatevaPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(RhdatevaPeer::FECELA)) $criteria->add(RhdatevaPeer::FECELA, $this->fecela);
		if ($this->isColumnModified(RhdatevaPeer::ID)) $criteria->add(RhdatevaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdatevaPeer::DATABASE_NAME);

		$criteria->add(RhdatevaPeer::ID, $this->id);

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

		$copyObj->setCodevdo($this->codevdo);

		$copyObj->setCodevor($this->codevor);

		$copyObj->setCodsup($this->codsup);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setFecela($this->fecela);


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
			self::$peer = new RhdatevaPeer();
		}
		return self::$peer;
	}

} 