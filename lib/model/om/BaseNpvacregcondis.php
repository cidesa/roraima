<?php


abstract class BaseNpvacregcondis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codnom;


	
	protected $fechasalida;


	
	protected $fechaentrada;


	
	protected $fechanomina;


	
	protected $diadis;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

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

  
  public function getDiadis($val=false)
  {

    if($val) return number_format($this->diadis,2,',','.');
    else return $this->diadis;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacregcondisPeer::CODEMP;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpvacregcondisPeer::CODNOM;
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
      $this->modifiedColumns[] = NpvacregcondisPeer::FECHASALIDA;
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
      $this->modifiedColumns[] = NpvacregcondisPeer::FECHAENTRADA;
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
      $this->modifiedColumns[] = NpvacregcondisPeer::FECHANOMINA;
    }

	} 
	
	public function setDiadis($v)
	{

    if ($this->diadis !== $v) {
        $this->diadis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacregcondisPeer::DIADIS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacregcondisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codnom = $rs->getString($startcol + 1);

      $this->fechasalida = $rs->getDate($startcol + 2, null);

      $this->fechaentrada = $rs->getDate($startcol + 3, null);

      $this->fechanomina = $rs->getDate($startcol + 4, null);

      $this->diadis = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacregcondis object", $e);
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
			$con = Propel::getConnection(NpvacregcondisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacregcondisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacregcondisPeer::DATABASE_NAME);
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
					$pk = NpvacregcondisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacregcondisPeer::doUpdate($this, $con);
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


			if (($retval = NpvacregcondisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacregcondisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getFechasalida();
				break;
			case 3:
				return $this->getFechaentrada();
				break;
			case 4:
				return $this->getFechanomina();
				break;
			case 5:
				return $this->getDiadis();
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
		$keys = NpvacregcondisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getFechasalida(),
			$keys[3] => $this->getFechaentrada(),
			$keys[4] => $this->getFechanomina(),
			$keys[5] => $this->getDiadis(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacregcondisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setFechasalida($value);
				break;
			case 3:
				$this->setFechaentrada($value);
				break;
			case 4:
				$this->setFechanomina($value);
				break;
			case 5:
				$this->setDiadis($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacregcondisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechasalida($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaentrada($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechanomina($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiadis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacregcondisPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacregcondisPeer::CODEMP)) $criteria->add(NpvacregcondisPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacregcondisPeer::CODNOM)) $criteria->add(NpvacregcondisPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpvacregcondisPeer::FECHASALIDA)) $criteria->add(NpvacregcondisPeer::FECHASALIDA, $this->fechasalida);
		if ($this->isColumnModified(NpvacregcondisPeer::FECHAENTRADA)) $criteria->add(NpvacregcondisPeer::FECHAENTRADA, $this->fechaentrada);
		if ($this->isColumnModified(NpvacregcondisPeer::FECHANOMINA)) $criteria->add(NpvacregcondisPeer::FECHANOMINA, $this->fechanomina);
		if ($this->isColumnModified(NpvacregcondisPeer::DIADIS)) $criteria->add(NpvacregcondisPeer::DIADIS, $this->diadis);
		if ($this->isColumnModified(NpvacregcondisPeer::ID)) $criteria->add(NpvacregcondisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacregcondisPeer::DATABASE_NAME);

		$criteria->add(NpvacregcondisPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setFechasalida($this->fechasalida);

		$copyObj->setFechaentrada($this->fechaentrada);

		$copyObj->setFechanomina($this->fechanomina);

		$copyObj->setDiadis($this->diadis);


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
			self::$peer = new NpvacregcondisPeer();
		}
		return self::$peer;
	}

} 