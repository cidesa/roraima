<?php


abstract class BaseCamigtxtven extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $fecven;


	
	protected $codart;


	
	protected $desart;


	
	protected $cantidad;


	
	protected $subtot;


	
	protected $iva;


	
	protected $precio;


	
	protected $fecmig;


	
	protected $usumig;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

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

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getSubtot($val=false)
  {

    if($val) return number_format($this->subtot,2,',','.');
    else return $this->subtot;

  }
  
  public function getIva()
  {

    return trim($this->iva);

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getFecmig($format = 'Y-m-d')
  {

    if ($this->fecmig === null || $this->fecmig === '') {
      return null;
    } elseif (!is_int($this->fecmig)) {
            $ts = adodb_strtotime($this->fecmig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmig] as date/time value: " . var_export($this->fecmig, true));
      }
    } else {
      $ts = $this->fecmig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsumig()
  {

    return trim($this->usumig);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CamigtxtvenPeer::CODALM;
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
      $this->modifiedColumns[] = CamigtxtvenPeer::FECVEN;
    }

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CamigtxtvenPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CamigtxtvenPeer::DESART;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamigtxtvenPeer::CANTIDAD;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamigtxtvenPeer::SUBTOT;
      }
  
	} 
	
	public function setIva($v)
	{

    if ($this->iva !== $v) {
        $this->iva = $v;
        $this->modifiedColumns[] = CamigtxtvenPeer::IVA;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CamigtxtvenPeer::PRECIO;
      }
  
	} 
	
	public function setFecmig($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmig !== $ts) {
      $this->fecmig = $ts;
      $this->modifiedColumns[] = CamigtxtvenPeer::FECMIG;
    }

	} 
	
	public function setUsumig($v)
	{

    if ($this->usumig !== $v) {
        $this->usumig = $v;
        $this->modifiedColumns[] = CamigtxtvenPeer::USUMIG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CamigtxtvenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->fecven = $rs->getDate($startcol + 1, null);

      $this->codart = $rs->getString($startcol + 2);

      $this->desart = $rs->getString($startcol + 3);

      $this->cantidad = $rs->getFloat($startcol + 4);

      $this->subtot = $rs->getFloat($startcol + 5);

      $this->iva = $rs->getString($startcol + 6);

      $this->precio = $rs->getFloat($startcol + 7);

      $this->fecmig = $rs->getDate($startcol + 8, null);

      $this->usumig = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Camigtxtven object", $e);
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
			$con = Propel::getConnection(CamigtxtvenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CamigtxtvenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CamigtxtvenPeer::DATABASE_NAME);
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
					$pk = CamigtxtvenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CamigtxtvenPeer::doUpdate($this, $con);
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


			if (($retval = CamigtxtvenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CamigtxtvenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getFecven();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getDesart();
				break;
			case 4:
				return $this->getCantidad();
				break;
			case 5:
				return $this->getSubtot();
				break;
			case 6:
				return $this->getIva();
				break;
			case 7:
				return $this->getPrecio();
				break;
			case 8:
				return $this->getFecmig();
				break;
			case 9:
				return $this->getUsumig();
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
		$keys = CamigtxtvenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getFecven(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getDesart(),
			$keys[4] => $this->getCantidad(),
			$keys[5] => $this->getSubtot(),
			$keys[6] => $this->getIva(),
			$keys[7] => $this->getPrecio(),
			$keys[8] => $this->getFecmig(),
			$keys[9] => $this->getUsumig(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CamigtxtvenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setFecven($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setDesart($value);
				break;
			case 4:
				$this->setCantidad($value);
				break;
			case 5:
				$this->setSubtot($value);
				break;
			case 6:
				$this->setIva($value);
				break;
			case 7:
				$this->setPrecio($value);
				break;
			case 8:
				$this->setFecmig($value);
				break;
			case 9:
				$this->setUsumig($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CamigtxtvenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecven($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCantidad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSubtot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIva($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPrecio($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecmig($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUsumig($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CamigtxtvenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CamigtxtvenPeer::CODALM)) $criteria->add(CamigtxtvenPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CamigtxtvenPeer::FECVEN)) $criteria->add(CamigtxtvenPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CamigtxtvenPeer::CODART)) $criteria->add(CamigtxtvenPeer::CODART, $this->codart);
		if ($this->isColumnModified(CamigtxtvenPeer::DESART)) $criteria->add(CamigtxtvenPeer::DESART, $this->desart);
		if ($this->isColumnModified(CamigtxtvenPeer::CANTIDAD)) $criteria->add(CamigtxtvenPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(CamigtxtvenPeer::SUBTOT)) $criteria->add(CamigtxtvenPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(CamigtxtvenPeer::IVA)) $criteria->add(CamigtxtvenPeer::IVA, $this->iva);
		if ($this->isColumnModified(CamigtxtvenPeer::PRECIO)) $criteria->add(CamigtxtvenPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(CamigtxtvenPeer::FECMIG)) $criteria->add(CamigtxtvenPeer::FECMIG, $this->fecmig);
		if ($this->isColumnModified(CamigtxtvenPeer::USUMIG)) $criteria->add(CamigtxtvenPeer::USUMIG, $this->usumig);
		if ($this->isColumnModified(CamigtxtvenPeer::ID)) $criteria->add(CamigtxtvenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CamigtxtvenPeer::DATABASE_NAME);

		$criteria->add(CamigtxtvenPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setIva($this->iva);

		$copyObj->setPrecio($this->precio);

		$copyObj->setFecmig($this->fecmig);

		$copyObj->setUsumig($this->usumig);


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
			self::$peer = new CamigtxtvenPeer();
		}
		return self::$peer;
	}

} 