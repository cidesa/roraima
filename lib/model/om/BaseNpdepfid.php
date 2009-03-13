<?php


abstract class BaseNpdepfid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecnom;


	
	protected $fecing;


	
	protected $devengado;


	
	protected $diasdeposito;


	
	protected $fideicomiso;


	
	protected $codcar;


	
	protected $codnom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecnom($format = 'Y-m-d')
  {

    if ($this->fecnom === null || $this->fecnom === '') {
      return null;
    } elseif (!is_int($this->fecnom)) {
            $ts = adodb_strtotime($this->fecnom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
      }
    } else {
      $ts = $this->fecnom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDevengado($val=false)
  {

    if($val) return number_format($this->devengado,2,',','.');
    else return $this->devengado;

  }
  
  public function getDiasdeposito($val=false)
  {

    if($val) return number_format($this->diasdeposito,2,',','.');
    else return $this->diasdeposito;

  }
  
  public function getFideicomiso($val=false)
  {

    if($val) return number_format($this->fideicomiso,2,',','.');
    else return $this->fideicomiso;

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpdepfidPeer::CODEMP;
      }
  
	} 
	
	public function setFecnom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnom !== $ts) {
      $this->fecnom = $ts;
      $this->modifiedColumns[] = NpdepfidPeer::FECNOM;
    }

	} 
	
	public function setFecing($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = NpdepfidPeer::FECING;
    }

	} 
	
	public function setDevengado($v)
	{

    if ($this->devengado !== $v) {
        $this->devengado = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdepfidPeer::DEVENGADO;
      }
  
	} 
	
	public function setDiasdeposito($v)
	{

    if ($this->diasdeposito !== $v) {
        $this->diasdeposito = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdepfidPeer::DIASDEPOSITO;
      }
  
	} 
	
	public function setFideicomiso($v)
	{

    if ($this->fideicomiso !== $v) {
        $this->fideicomiso = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdepfidPeer::FIDEICOMISO;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpdepfidPeer::CODCAR;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpdepfidPeer::CODNOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdepfidPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecnom = $rs->getDate($startcol + 1, null);

      $this->fecing = $rs->getDate($startcol + 2, null);

      $this->devengado = $rs->getFloat($startcol + 3);

      $this->diasdeposito = $rs->getFloat($startcol + 4);

      $this->fideicomiso = $rs->getFloat($startcol + 5);

      $this->codcar = $rs->getString($startcol + 6);

      $this->codnom = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdepfid object", $e);
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
			$con = Propel::getConnection(NpdepfidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdepfidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdepfidPeer::DATABASE_NAME);
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
					$pk = NpdepfidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdepfidPeer::doUpdate($this, $con);
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


			if (($retval = NpdepfidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdepfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecnom();
				break;
			case 2:
				return $this->getFecing();
				break;
			case 3:
				return $this->getDevengado();
				break;
			case 4:
				return $this->getDiasdeposito();
				break;
			case 5:
				return $this->getFideicomiso();
				break;
			case 6:
				return $this->getCodcar();
				break;
			case 7:
				return $this->getCodnom();
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
		$keys = NpdepfidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecnom(),
			$keys[2] => $this->getFecing(),
			$keys[3] => $this->getDevengado(),
			$keys[4] => $this->getDiasdeposito(),
			$keys[5] => $this->getFideicomiso(),
			$keys[6] => $this->getCodcar(),
			$keys[7] => $this->getCodnom(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdepfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecnom($value);
				break;
			case 2:
				$this->setFecing($value);
				break;
			case 3:
				$this->setDevengado($value);
				break;
			case 4:
				$this->setDiasdeposito($value);
				break;
			case 5:
				$this->setFideicomiso($value);
				break;
			case 6:
				$this->setCodcar($value);
				break;
			case 7:
				$this->setCodnom($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdepfidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDevengado($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiasdeposito($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFideicomiso($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodnom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdepfidPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdepfidPeer::CODEMP)) $criteria->add(NpdepfidPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpdepfidPeer::FECNOM)) $criteria->add(NpdepfidPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NpdepfidPeer::FECING)) $criteria->add(NpdepfidPeer::FECING, $this->fecing);
		if ($this->isColumnModified(NpdepfidPeer::DEVENGADO)) $criteria->add(NpdepfidPeer::DEVENGADO, $this->devengado);
		if ($this->isColumnModified(NpdepfidPeer::DIASDEPOSITO)) $criteria->add(NpdepfidPeer::DIASDEPOSITO, $this->diasdeposito);
		if ($this->isColumnModified(NpdepfidPeer::FIDEICOMISO)) $criteria->add(NpdepfidPeer::FIDEICOMISO, $this->fideicomiso);
		if ($this->isColumnModified(NpdepfidPeer::CODCAR)) $criteria->add(NpdepfidPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpdepfidPeer::CODNOM)) $criteria->add(NpdepfidPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpdepfidPeer::ID)) $criteria->add(NpdepfidPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdepfidPeer::DATABASE_NAME);

		$criteria->add(NpdepfidPeer::ID, $this->id);

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

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setFecing($this->fecing);

		$copyObj->setDevengado($this->devengado);

		$copyObj->setDiasdeposito($this->diasdeposito);

		$copyObj->setFideicomiso($this->fideicomiso);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodnom($this->codnom);


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
			self::$peer = new NpdepfidPeer();
		}
		return self::$peer;
	}

} 