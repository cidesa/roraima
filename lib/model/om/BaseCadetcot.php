<?php


abstract class BaseCadetcot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcot;


	
	protected $codart;


	
	protected $canord;


	
	protected $costo;


	
	protected $totdet;


	
	protected $fecent;


	
	protected $priori;


	
	protected $justifica;


	
	protected $mondes;


	
	protected $observaciones;



	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcot()
  {

    return trim($this->refcot);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,2,',','.');
    else return $this->canord;

  }
  
  public function getCosto($val=false)
  {

    if($val) return number_format($this->costo,2,',','.');
    else return $this->costo;

  }
  
  public function getTotdet($val=false)
  {

    if($val) return number_format($this->totdet,2,',','.');
    else return $this->totdet;

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPriori($val=false)
  {

    if($val) return number_format($this->priori,2,',','.');
    else return $this->priori;

  }
  
  public function getJustifica()
  {

    return trim($this->justifica);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }

  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcot($v)
	{

    if ($this->refcot !== $v) {
        $this->refcot = $v;
        $this->modifiedColumns[] = CadetcotPeer::REFCOT;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CadetcotPeer::CODART;
      }
  
	} 
	
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetcotPeer::CANORD;
      }
  
	} 
	
	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetcotPeer::COSTO;
      }
  
	} 
	
	public function setTotdet($v)
	{

    if ($this->totdet !== $v) {
        $this->totdet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetcotPeer::TOTDET;
      }
  
	} 
	
	public function setFecent($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = CadetcotPeer::FECENT;
    }

	} 
	
	public function setPriori($v)
	{

    if ($this->priori !== $v) {
        $this->priori = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetcotPeer::PRIORI;
      }
  
	} 
	
	public function setJustifica($v)
	{

    if ($this->justifica !== $v) {
        $this->justifica = $v;
        $this->modifiedColumns[] = CadetcotPeer::JUSTIFICA;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetcotPeer::MONDES;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = CadetcotPeer::OBSERVACIONES;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetcotPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcot = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canord = $rs->getFloat($startcol + 2);

      $this->costo = $rs->getFloat($startcol + 3);

      $this->totdet = $rs->getFloat($startcol + 4);

      $this->fecent = $rs->getDate($startcol + 5, null);

      $this->priori = $rs->getFloat($startcol + 6);

      $this->justifica = $rs->getString($startcol + 7);

      $this->mondes = $rs->getFloat($startcol + 8);

      $this->observaciones = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11;
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetcot object", $e);
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
			$con = Propel::getConnection(CadetcotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetcotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetcotPeer::DATABASE_NAME);
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
					$pk = CadetcotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetcotPeer::doUpdate($this, $con);
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


			if (($retval = CadetcotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetcotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcot();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanord();
				break;
			case 3:
				return $this->getCosto();
				break;
			case 4:
				return $this->getTotdet();
				break;
			case 5:
				return $this->getFecent();
				break;
			case 6:
				return $this->getPriori();
				break;
			case 7:
				return $this->getJustifica();
				break;
			case 8:
				return $this->getMondes();
				break;
			case 9:
				return $this->getObservaciones();
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
		$keys = CadetcotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcot(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanord(),
			$keys[3] => $this->getCosto(),
			$keys[4] => $this->getTotdet(),
			$keys[5] => $this->getFecent(),
			$keys[6] => $this->getPriori(),
			$keys[7] => $this->getJustifica(),
			$keys[8] => $this->getMondes(),
			$keys[9] => $this->getObservaciones(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetcotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcot($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanord($value);
				break;
			case 3:
				$this->setCosto($value);
				break;
			case 4:
				$this->setTotdet($value);
				break;
			case 5:
				$this->setFecent($value);
				break;
			case 6:
				$this->setPriori($value);
				break;
			case 7:
				$this->setJustifica($value);
				break;
			case 8:
				$this->setMondes($value);
				break;
			case 9:
				$this->setObservaciones($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetcotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanord($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCosto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotdet($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecent($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPriori($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setJustifica($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMondes($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObservaciones($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetcotPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetcotPeer::REFCOT)) $criteria->add(CadetcotPeer::REFCOT, $this->refcot);
		if ($this->isColumnModified(CadetcotPeer::CODART)) $criteria->add(CadetcotPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadetcotPeer::CANORD)) $criteria->add(CadetcotPeer::CANORD, $this->canord);
		if ($this->isColumnModified(CadetcotPeer::COSTO)) $criteria->add(CadetcotPeer::COSTO, $this->costo);
		if ($this->isColumnModified(CadetcotPeer::TOTDET)) $criteria->add(CadetcotPeer::TOTDET, $this->totdet);
		if ($this->isColumnModified(CadetcotPeer::FECENT)) $criteria->add(CadetcotPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(CadetcotPeer::PRIORI)) $criteria->add(CadetcotPeer::PRIORI, $this->priori);
		if ($this->isColumnModified(CadetcotPeer::JUSTIFICA)) $criteria->add(CadetcotPeer::JUSTIFICA, $this->justifica);
		if ($this->isColumnModified(CadetcotPeer::MONDES)) $criteria->add(CadetcotPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CadetcotPeer::OBSERVACIONES)) $criteria->add(CadetcotPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(CadetcotPeer::ID)) $criteria->add(CadetcotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetcotPeer::DATABASE_NAME);

		$criteria->add(CadetcotPeer::ID, $this->id);

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

		$copyObj->setRefcot($this->refcot);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanord($this->canord);

		$copyObj->setCosto($this->costo);

		$copyObj->setTotdet($this->totdet);

		$copyObj->setFecent($this->fecent);

		$copyObj->setPriori($this->priori);

		$copyObj->setJustifica($this->justifica);

		$copyObj->setMondes($this->mondes);

		$copyObj->setObservaciones($this->observaciones);


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
			self::$peer = new CadetcotPeer();
		}
		return self::$peer;
	}

} 