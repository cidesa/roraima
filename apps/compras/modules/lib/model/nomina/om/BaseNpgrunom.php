<?php


abstract class BaseNpgrunom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgrunom;


	
	protected $nomgrunom;


	
	protected $codnom;


	
	protected $tipo;


	
	protected $fecha1;


	
	protected $fecha2;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgrunom()
  {

    return trim($this->codgrunom);

  }
  
  public function getNomgrunom()
  {

    return trim($this->nomgrunom);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getFecha1($format = 'Y-m-d')
  {

    if ($this->fecha1 === null || $this->fecha1 === '') {
      return null;
    } elseif (!is_int($this->fecha1)) {
            $ts = adodb_strtotime($this->fecha1);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha1] as date/time value: " . var_export($this->fecha1, true));
      }
    } else {
      $ts = $this->fecha1;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecha2($format = 'Y-m-d')
  {

    if ($this->fecha2 === null || $this->fecha2 === '') {
      return null;
    } elseif (!is_int($this->fecha2)) {
            $ts = adodb_strtotime($this->fecha2);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha2] as date/time value: " . var_export($this->fecha2, true));
      }
    } else {
      $ts = $this->fecha2;
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
	
	public function setCodgrunom($v)
	{

    if ($this->codgrunom !== $v) {
        $this->codgrunom = $v;
        $this->modifiedColumns[] = NpgrunomPeer::CODGRUNOM;
      }
  
	} 
	
	public function setNomgrunom($v)
	{

    if ($this->nomgrunom !== $v) {
        $this->nomgrunom = $v;
        $this->modifiedColumns[] = NpgrunomPeer::NOMGRUNOM;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpgrunomPeer::CODNOM;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = NpgrunomPeer::TIPO;
      }
  
	} 
	
	public function setFecha1($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha1] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha1 !== $ts) {
      $this->fecha1 = $ts;
      $this->modifiedColumns[] = NpgrunomPeer::FECHA1;
    }

	} 
	
	public function setFecha2($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha2] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha2 !== $ts) {
      $this->fecha2 = $ts;
      $this->modifiedColumns[] = NpgrunomPeer::FECHA2;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpgrunomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgrunom = $rs->getString($startcol + 0);

      $this->nomgrunom = $rs->getString($startcol + 1);

      $this->codnom = $rs->getString($startcol + 2);

      $this->tipo = $rs->getString($startcol + 3);

      $this->fecha1 = $rs->getDate($startcol + 4, null);

      $this->fecha2 = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npgrunom object", $e);
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
			$con = Propel::getConnection(NpgrunomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpgrunomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpgrunomPeer::DATABASE_NAME);
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
					$pk = NpgrunomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpgrunomPeer::doUpdate($this, $con);
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


			if (($retval = NpgrunomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgrunomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgrunom();
				break;
			case 1:
				return $this->getNomgrunom();
				break;
			case 2:
				return $this->getCodnom();
				break;
			case 3:
				return $this->getTipo();
				break;
			case 4:
				return $this->getFecha1();
				break;
			case 5:
				return $this->getFecha2();
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
		$keys = NpgrunomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgrunom(),
			$keys[1] => $this->getNomgrunom(),
			$keys[2] => $this->getCodnom(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getFecha1(),
			$keys[5] => $this->getFecha2(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgrunomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgrunom($value);
				break;
			case 1:
				$this->setNomgrunom($value);
				break;
			case 2:
				$this->setCodnom($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setFecha1($value);
				break;
			case 5:
				$this->setFecha2($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpgrunomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgrunom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomgrunom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecha1($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecha2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpgrunomPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpgrunomPeer::CODGRUNOM)) $criteria->add(NpgrunomPeer::CODGRUNOM, $this->codgrunom);
		if ($this->isColumnModified(NpgrunomPeer::NOMGRUNOM)) $criteria->add(NpgrunomPeer::NOMGRUNOM, $this->nomgrunom);
		if ($this->isColumnModified(NpgrunomPeer::CODNOM)) $criteria->add(NpgrunomPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpgrunomPeer::TIPO)) $criteria->add(NpgrunomPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(NpgrunomPeer::FECHA1)) $criteria->add(NpgrunomPeer::FECHA1, $this->fecha1);
		if ($this->isColumnModified(NpgrunomPeer::FECHA2)) $criteria->add(NpgrunomPeer::FECHA2, $this->fecha2);
		if ($this->isColumnModified(NpgrunomPeer::ID)) $criteria->add(NpgrunomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpgrunomPeer::DATABASE_NAME);

		$criteria->add(NpgrunomPeer::ID, $this->id);

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

		$copyObj->setCodgrunom($this->codgrunom);

		$copyObj->setNomgrunom($this->nomgrunom);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setTipo($this->tipo);

		$copyObj->setFecha1($this->fecha1);

		$copyObj->setFecha2($this->fecha2);


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
			self::$peer = new NpgrunomPeer();
		}
		return self::$peer;
	}

} 