<?php


abstract class BaseNpvacregcalnom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $fechasalida;


	
	protected $fechaentrada;


	
	protected $periodos;


	
	protected $fechanomina;


	
	protected $diasbono;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getFechasalida($format = 'Y-m-d')
  {

    if ($this->fechasalida === null || $this->fechasalida === '') {
      return null;
    } elseif (!is_int($this->fechasalida)) {
            $ts = adodb_strtotime($this->fechasalida);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechasalida] as date/time value: " . var_export($this->fechasalida, true));
      }
    } else {
      $ts = $this->fechasalida;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechaentrada($format = 'Y-m-d')
  {

    if ($this->fechaentrada === null || $this->fechaentrada === '') {
      return null;
    } elseif (!is_int($this->fechaentrada)) {
            $ts = adodb_strtotime($this->fechaentrada);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechaentrada] as date/time value: " . var_export($this->fechaentrada, true));
      }
    } else {
      $ts = $this->fechaentrada;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPeriodos($val=false)
  {

    if($val) return number_format($this->periodos,2,',','.');
    else return $this->periodos;

  }
  
  public function getFechanomina($format = 'Y-m-d')
  {

    if ($this->fechanomina === null || $this->fechanomina === '') {
      return null;
    } elseif (!is_int($this->fechanomina)) {
            $ts = adodb_strtotime($this->fechanomina);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechanomina] as date/time value: " . var_export($this->fechanomina, true));
      }
    } else {
      $ts = $this->fechanomina;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDiasbono($val=false)
  {

    if($val) return number_format($this->diasbono,2,',','.');
    else return $this->diasbono;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpvacregcalnomPeer::CODNOM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacregcalnomPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpvacregcalnomPeer::CODCAR;
      }
  
	} 
	
	public function setFechasalida($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechasalida] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechasalida !== $ts) {
      $this->fechasalida = $ts;
      $this->modifiedColumns[] = NpvacregcalnomPeer::FECHASALIDA;
    }

	} 
	
	public function setFechaentrada($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechaentrada] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechaentrada !== $ts) {
      $this->fechaentrada = $ts;
      $this->modifiedColumns[] = NpvacregcalnomPeer::FECHAENTRADA;
    }

	} 
	
	public function setPeriodos($v)
	{

    if ($this->periodos !== $v) {
        $this->periodos = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacregcalnomPeer::PERIODOS;
      }
  
	} 
	
	public function setFechanomina($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechanomina] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechanomina !== $ts) {
      $this->fechanomina = $ts;
      $this->modifiedColumns[] = NpvacregcalnomPeer::FECHANOMINA;
    }

	} 
	
	public function setDiasbono($v)
	{

    if ($this->diasbono !== $v) {
        $this->diasbono = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacregcalnomPeer::DIASBONO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacregcalnomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->codcar = $rs->getString($startcol + 2);

      $this->fechasalida = $rs->getDate($startcol + 3, null);

      $this->fechaentrada = $rs->getDate($startcol + 4, null);

      $this->periodos = $rs->getFloat($startcol + 5);

      $this->fechanomina = $rs->getDate($startcol + 6, null);

      $this->diasbono = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacregcalnom object", $e);
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
			$con = Propel::getConnection(NpvacregcalnomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacregcalnomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacregcalnomPeer::DATABASE_NAME);
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
					$pk = NpvacregcalnomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacregcalnomPeer::doUpdate($this, $con);
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


			if (($retval = NpvacregcalnomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacregcalnomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getFechasalida();
				break;
			case 4:
				return $this->getFechaentrada();
				break;
			case 5:
				return $this->getPeriodos();
				break;
			case 6:
				return $this->getFechanomina();
				break;
			case 7:
				return $this->getDiasbono();
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
		$keys = NpvacregcalnomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getFechasalida(),
			$keys[4] => $this->getFechaentrada(),
			$keys[5] => $this->getPeriodos(),
			$keys[6] => $this->getFechanomina(),
			$keys[7] => $this->getDiasbono(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacregcalnomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setFechasalida($value);
				break;
			case 4:
				$this->setFechaentrada($value);
				break;
			case 5:
				$this->setPeriodos($value);
				break;
			case 6:
				$this->setFechanomina($value);
				break;
			case 7:
				$this->setDiasbono($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacregcalnomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechasalida($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechaentrada($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPeriodos($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechanomina($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiasbono($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacregcalnomPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacregcalnomPeer::CODNOM)) $criteria->add(NpvacregcalnomPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpvacregcalnomPeer::CODEMP)) $criteria->add(NpvacregcalnomPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacregcalnomPeer::CODCAR)) $criteria->add(NpvacregcalnomPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpvacregcalnomPeer::FECHASALIDA)) $criteria->add(NpvacregcalnomPeer::FECHASALIDA, $this->fechasalida);
		if ($this->isColumnModified(NpvacregcalnomPeer::FECHAENTRADA)) $criteria->add(NpvacregcalnomPeer::FECHAENTRADA, $this->fechaentrada);
		if ($this->isColumnModified(NpvacregcalnomPeer::PERIODOS)) $criteria->add(NpvacregcalnomPeer::PERIODOS, $this->periodos);
		if ($this->isColumnModified(NpvacregcalnomPeer::FECHANOMINA)) $criteria->add(NpvacregcalnomPeer::FECHANOMINA, $this->fechanomina);
		if ($this->isColumnModified(NpvacregcalnomPeer::DIASBONO)) $criteria->add(NpvacregcalnomPeer::DIASBONO, $this->diasbono);
		if ($this->isColumnModified(NpvacregcalnomPeer::ID)) $criteria->add(NpvacregcalnomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacregcalnomPeer::DATABASE_NAME);

		$criteria->add(NpvacregcalnomPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setFechasalida($this->fechasalida);

		$copyObj->setFechaentrada($this->fechaentrada);

		$copyObj->setPeriodos($this->periodos);

		$copyObj->setFechanomina($this->fechanomina);

		$copyObj->setDiasbono($this->diasbono);


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
			self::$peer = new NpvacregcalnomPeer();
		}
		return self::$peer;
	}

} 