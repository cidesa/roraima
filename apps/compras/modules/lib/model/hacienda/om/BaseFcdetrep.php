<?php


abstract class BaseFcdetrep extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrep;


	
	protected $descrip;


	
	protected $tipo;


	
	protected $monto;


	
	protected $fecha;


	
	protected $fuente;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumrep()
  {

    return trim($this->numrep);

  }
  
  public function getDescrip()
  {

    return trim($this->descrip);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFuente()
  {

    return trim($this->fuente);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumrep($v)
	{

    if ($this->numrep !== $v) {
        $this->numrep = $v;
        $this->modifiedColumns[] = FcdetrepPeer::NUMREP;
      }
  
	} 
	
	public function setDescrip($v)
	{

    if ($this->descrip !== $v) {
        $this->descrip = $v;
        $this->modifiedColumns[] = FcdetrepPeer::DESCRIP;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcdetrepPeer::TIPO;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetrepPeer::MONTO;
      }
  
	} 
	
	public function setFecha($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = FcdetrepPeer::FECHA;
    }

	} 
	
	public function setFuente($v)
	{

    if ($this->fuente !== $v) {
        $this->fuente = $v;
        $this->modifiedColumns[] = FcdetrepPeer::FUENTE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetrepPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numrep = $rs->getString($startcol + 0);

      $this->descrip = $rs->getString($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->monto = $rs->getFloat($startcol + 3);

      $this->fecha = $rs->getDate($startcol + 4, null);

      $this->fuente = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetrep object", $e);
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
			$con = Propel::getConnection(FcdetrepPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetrepPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetrepPeer::DATABASE_NAME);
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
					$pk = FcdetrepPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetrepPeer::doUpdate($this, $con);
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


			if (($retval = FcdetrepPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrep();
				break;
			case 1:
				return $this->getDescrip();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getMonto();
				break;
			case 4:
				return $this->getFecha();
				break;
			case 5:
				return $this->getFuente();
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
		$keys = FcdetrepPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrep(),
			$keys[1] => $this->getDescrip(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getFecha(),
			$keys[5] => $this->getFuente(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetrepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrep($value);
				break;
			case 1:
				$this->setDescrip($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setFecha($value);
				break;
			case 5:
				$this->setFuente($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetrepPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescrip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecha($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFuente($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetrepPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetrepPeer::NUMREP)) $criteria->add(FcdetrepPeer::NUMREP, $this->numrep);
		if ($this->isColumnModified(FcdetrepPeer::DESCRIP)) $criteria->add(FcdetrepPeer::DESCRIP, $this->descrip);
		if ($this->isColumnModified(FcdetrepPeer::TIPO)) $criteria->add(FcdetrepPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcdetrepPeer::MONTO)) $criteria->add(FcdetrepPeer::MONTO, $this->monto);
		if ($this->isColumnModified(FcdetrepPeer::FECHA)) $criteria->add(FcdetrepPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(FcdetrepPeer::FUENTE)) $criteria->add(FcdetrepPeer::FUENTE, $this->fuente);
		if ($this->isColumnModified(FcdetrepPeer::ID)) $criteria->add(FcdetrepPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetrepPeer::DATABASE_NAME);

		$criteria->add(FcdetrepPeer::ID, $this->id);

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

		$copyObj->setNumrep($this->numrep);

		$copyObj->setDescrip($this->descrip);

		$copyObj->setTipo($this->tipo);

		$copyObj->setMonto($this->monto);

		$copyObj->setFecha($this->fecha);

		$copyObj->setFuente($this->fuente);


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
			self::$peer = new FcdetrepPeer();
		}
		return self::$peer;
	}

} 