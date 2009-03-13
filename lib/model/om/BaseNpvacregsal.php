<?php


abstract class BaseNpvacregsal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $fechasalida;


	
	protected $fechaentrada;


	
	protected $diadis;


	
	protected $perini;


	
	protected $perfin;


	
	protected $diasbono;


	
	protected $stavac;


	
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

  
  public function getDiadis($val=false)
  {

    if($val) return number_format($this->diadis,2,',','.');
    else return $this->diadis;

  }
  
  public function getPerini()
  {

    return trim($this->perini);

  }
  
  public function getPerfin()
  {

    return trim($this->perfin);

  }
  
  public function getDiasbono($val=false)
  {

    if($val) return number_format($this->diasbono,2,',','.');
    else return $this->diasbono;

  }
  
  public function getStavac()
  {

    return trim($this->stavac);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::CODNOM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::CODCAR;
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
      $this->modifiedColumns[] = NpvacregsalPeer::FECHASALIDA;
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
      $this->modifiedColumns[] = NpvacregsalPeer::FECHAENTRADA;
    }

	} 
	
	public function setDiadis($v)
	{

    if ($this->diadis !== $v) {
        $this->diadis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacregsalPeer::DIADIS;
      }
  
	} 
	
	public function setPerini($v)
	{

    if ($this->perini !== $v) {
        $this->perini = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::PERINI;
      }
  
	} 
	
	public function setPerfin($v)
	{

    if ($this->perfin !== $v) {
        $this->perfin = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::PERFIN;
      }
  
	} 
	
	public function setDiasbono($v)
	{

    if ($this->diasbono !== $v) {
        $this->diasbono = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpvacregsalPeer::DIASBONO;
      }
  
	} 
	
	public function setStavac($v)
	{

    if ($this->stavac !== $v) {
        $this->stavac = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::STAVAC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacregsalPeer::ID;
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

      $this->diadis = $rs->getFloat($startcol + 5);

      $this->perini = $rs->getString($startcol + 6);

      $this->perfin = $rs->getString($startcol + 7);

      $this->diasbono = $rs->getFloat($startcol + 8);

      $this->stavac = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacregsal object", $e);
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
			$con = Propel::getConnection(NpvacregsalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacregsalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacregsalPeer::DATABASE_NAME);
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
					$pk = NpvacregsalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacregsalPeer::doUpdate($this, $con);
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


			if (($retval = NpvacregsalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacregsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDiadis();
				break;
			case 6:
				return $this->getPerini();
				break;
			case 7:
				return $this->getPerfin();
				break;
			case 8:
				return $this->getDiasbono();
				break;
			case 9:
				return $this->getStavac();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacregsalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getFechasalida(),
			$keys[4] => $this->getFechaentrada(),
			$keys[5] => $this->getDiadis(),
			$keys[6] => $this->getPerini(),
			$keys[7] => $this->getPerfin(),
			$keys[8] => $this->getDiasbono(),
			$keys[9] => $this->getStavac(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacregsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDiadis($value);
				break;
			case 6:
				$this->setPerini($value);
				break;
			case 7:
				$this->setPerfin($value);
				break;
			case 8:
				$this->setDiasbono($value);
				break;
			case 9:
				$this->setStavac($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacregsalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechasalida($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechaentrada($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiadis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPerini($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPerfin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDiasbono($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStavac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacregsalPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacregsalPeer::CODNOM)) $criteria->add(NpvacregsalPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpvacregsalPeer::CODEMP)) $criteria->add(NpvacregsalPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacregsalPeer::CODCAR)) $criteria->add(NpvacregsalPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpvacregsalPeer::FECHASALIDA)) $criteria->add(NpvacregsalPeer::FECHASALIDA, $this->fechasalida);
		if ($this->isColumnModified(NpvacregsalPeer::FECHAENTRADA)) $criteria->add(NpvacregsalPeer::FECHAENTRADA, $this->fechaentrada);
		if ($this->isColumnModified(NpvacregsalPeer::DIADIS)) $criteria->add(NpvacregsalPeer::DIADIS, $this->diadis);
		if ($this->isColumnModified(NpvacregsalPeer::PERINI)) $criteria->add(NpvacregsalPeer::PERINI, $this->perini);
		if ($this->isColumnModified(NpvacregsalPeer::PERFIN)) $criteria->add(NpvacregsalPeer::PERFIN, $this->perfin);
		if ($this->isColumnModified(NpvacregsalPeer::DIASBONO)) $criteria->add(NpvacregsalPeer::DIASBONO, $this->diasbono);
		if ($this->isColumnModified(NpvacregsalPeer::STAVAC)) $criteria->add(NpvacregsalPeer::STAVAC, $this->stavac);
		if ($this->isColumnModified(NpvacregsalPeer::ID)) $criteria->add(NpvacregsalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacregsalPeer::DATABASE_NAME);

		$criteria->add(NpvacregsalPeer::ID, $this->id);

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

		$copyObj->setDiadis($this->diadis);

		$copyObj->setPerini($this->perini);

		$copyObj->setPerfin($this->perfin);

		$copyObj->setDiasbono($this->diasbono);

		$copyObj->setStavac($this->stavac);


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
			self::$peer = new NpvacregsalPeer();
		}
		return self::$peer;
	}

} 