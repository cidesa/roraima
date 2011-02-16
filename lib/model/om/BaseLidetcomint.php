<?php


abstract class BaseLidetcomint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcomint;


	
	protected $feccomint;


	
	protected $codart;


	
	protected $reqart;


	
	protected $fecreq;


	
	protected $unires;


	
	protected $canreq;


	
	protected $costo;


	
	protected $montot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcomint()
  {

    return trim($this->numcomint);

  }
  
  public function getFeccomint($format = 'Y-m-d')
  {

    if ($this->feccomint === null || $this->feccomint === '') {
      return null;
    } elseif (!is_int($this->feccomint)) {
            $ts = adodb_strtotime($this->feccomint);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomint] as date/time value: " . var_export($this->feccomint, true));
      }
    } else {
      $ts = $this->feccomint;
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
  
  public function getReqart()
  {

    return trim($this->reqart);

  }
  
  public function getFecreq($format = 'Y-m-d')
  {

    if ($this->fecreq === null || $this->fecreq === '') {
      return null;
    } elseif (!is_int($this->fecreq)) {
            $ts = adodb_strtotime($this->fecreq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreq] as date/time value: " . var_export($this->fecreq, true));
      }
    } else {
      $ts = $this->fecreq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUnires()
  {

    return trim($this->unires);

  }
  
  public function getCanreq($val=false)
  {

    if($val) return number_format($this->canreq,2,',','.');
    else return $this->canreq;

  }
  
  public function getCosto($val=false)
  {

    if($val) return number_format($this->costo,2,',','.');
    else return $this->costo;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcomint($v)
	{

    if ($this->numcomint !== $v) {
        $this->numcomint = $v;
        $this->modifiedColumns[] = LidetcomintPeer::NUMCOMINT;
      }
  
	} 
	
	public function setFeccomint($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomint] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomint !== $ts) {
      $this->feccomint = $ts;
      $this->modifiedColumns[] = LidetcomintPeer::FECCOMINT;
    }

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LidetcomintPeer::CODART;
      }
  
	} 
	
	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = $v;
        $this->modifiedColumns[] = LidetcomintPeer::REQART;
      }
  
	} 
	
	public function setFecreq($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreq !== $ts) {
      $this->fecreq = $ts;
      $this->modifiedColumns[] = LidetcomintPeer::FECREQ;
    }

	} 
	
	public function setUnires($v)
	{

    if ($this->unires !== $v) {
        $this->unires = $v;
        $this->modifiedColumns[] = LidetcomintPeer::UNIRES;
      }
  
	} 
	
	public function setCanreq($v)
	{

    if ($this->canreq !== $v) {
        $this->canreq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcomintPeer::CANREQ;
      }
  
	} 
	
	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcomintPeer::COSTO;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcomintPeer::MONTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetcomintPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcomint = $rs->getString($startcol + 0);

      $this->feccomint = $rs->getDate($startcol + 1, null);

      $this->codart = $rs->getString($startcol + 2);

      $this->reqart = $rs->getString($startcol + 3);

      $this->fecreq = $rs->getDate($startcol + 4, null);

      $this->unires = $rs->getString($startcol + 5);

      $this->canreq = $rs->getFloat($startcol + 6);

      $this->costo = $rs->getFloat($startcol + 7);

      $this->montot = $rs->getFloat($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetcomint object", $e);
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
			$con = Propel::getConnection(LidetcomintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetcomintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetcomintPeer::DATABASE_NAME);
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
					$pk = LidetcomintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetcomintPeer::doUpdate($this, $con);
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


			if (($retval = LidetcomintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcomintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcomint();
				break;
			case 1:
				return $this->getFeccomint();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getReqart();
				break;
			case 4:
				return $this->getFecreq();
				break;
			case 5:
				return $this->getUnires();
				break;
			case 6:
				return $this->getCanreq();
				break;
			case 7:
				return $this->getCosto();
				break;
			case 8:
				return $this->getMontot();
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
		$keys = LidetcomintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcomint(),
			$keys[1] => $this->getFeccomint(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getReqart(),
			$keys[4] => $this->getFecreq(),
			$keys[5] => $this->getUnires(),
			$keys[6] => $this->getCanreq(),
			$keys[7] => $this->getCosto(),
			$keys[8] => $this->getMontot(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcomintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcomint($value);
				break;
			case 1:
				$this->setFeccomint($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setReqart($value);
				break;
			case 4:
				$this->setFecreq($value);
				break;
			case 5:
				$this->setUnires($value);
				break;
			case 6:
				$this->setCanreq($value);
				break;
			case 7:
				$this->setCosto($value);
				break;
			case 8:
				$this->setMontot($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetcomintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcomint($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccomint($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setReqart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreq($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnires($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanreq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCosto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMontot($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetcomintPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetcomintPeer::NUMCOMINT)) $criteria->add(LidetcomintPeer::NUMCOMINT, $this->numcomint);
		if ($this->isColumnModified(LidetcomintPeer::FECCOMINT)) $criteria->add(LidetcomintPeer::FECCOMINT, $this->feccomint);
		if ($this->isColumnModified(LidetcomintPeer::CODART)) $criteria->add(LidetcomintPeer::CODART, $this->codart);
		if ($this->isColumnModified(LidetcomintPeer::REQART)) $criteria->add(LidetcomintPeer::REQART, $this->reqart);
		if ($this->isColumnModified(LidetcomintPeer::FECREQ)) $criteria->add(LidetcomintPeer::FECREQ, $this->fecreq);
		if ($this->isColumnModified(LidetcomintPeer::UNIRES)) $criteria->add(LidetcomintPeer::UNIRES, $this->unires);
		if ($this->isColumnModified(LidetcomintPeer::CANREQ)) $criteria->add(LidetcomintPeer::CANREQ, $this->canreq);
		if ($this->isColumnModified(LidetcomintPeer::COSTO)) $criteria->add(LidetcomintPeer::COSTO, $this->costo);
		if ($this->isColumnModified(LidetcomintPeer::MONTOT)) $criteria->add(LidetcomintPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(LidetcomintPeer::ID)) $criteria->add(LidetcomintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetcomintPeer::DATABASE_NAME);

		$criteria->add(LidetcomintPeer::ID, $this->id);

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

		$copyObj->setNumcomint($this->numcomint);

		$copyObj->setFeccomint($this->feccomint);

		$copyObj->setCodart($this->codart);

		$copyObj->setReqart($this->reqart);

		$copyObj->setFecreq($this->fecreq);

		$copyObj->setUnires($this->unires);

		$copyObj->setCanreq($this->canreq);

		$copyObj->setCosto($this->costo);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new LidetcomintPeer();
		}
		return self::$peer;
	}

} 