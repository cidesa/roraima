<?php


abstract class BaseLiforpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numofe;


	
	protected $desant;


	
	protected $porant;


	
	protected $montot;


	
	protected $monrec;


	
	protected $subtot;


	
	protected $poramoant;


	
	protected $netpag;


	
	protected $fecant;


	
	protected $condic;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumofe()
  {

    return trim($this->numofe);

  }
  
  public function getDesant()
  {

    return trim($this->desant);

  }
  
  public function getPorant($val=false)
  {

    if($val) return number_format($this->porant,2,',','.');
    else return $this->porant;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getSubtot($val=false)
  {

    if($val) return number_format($this->subtot,2,',','.');
    else return $this->subtot;

  }
  
  public function getPoramoant($val=false)
  {

    if($val) return number_format($this->poramoant,2,',','.');
    else return $this->poramoant;

  }
  
  public function getNetpag($val=false)
  {

    if($val) return number_format($this->netpag,2,',','.');
    else return $this->netpag;

  }
  
  public function getFecant($format = 'Y-m-d')
  {

    if ($this->fecant === null || $this->fecant === '') {
      return null;
    } elseif (!is_int($this->fecant)) {
            $ts = adodb_strtotime($this->fecant);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecant] as date/time value: " . var_export($this->fecant, true));
      }
    } else {
      $ts = $this->fecant;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCondic()
  {

    return trim($this->condic);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LiforpagPeer::NUMOFE;
      }
  
	} 
	
	public function setDesant($v)
	{

    if ($this->desant !== $v) {
        $this->desant = $v;
        $this->modifiedColumns[] = LiforpagPeer::DESANT;
      }
  
	} 
	
	public function setPorant($v)
	{

    if ($this->porant !== $v) {
        $this->porant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiforpagPeer::PORANT;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiforpagPeer::MONTOT;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiforpagPeer::MONREC;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiforpagPeer::SUBTOT;
      }
  
	} 
	
	public function setPoramoant($v)
	{

    if ($this->poramoant !== $v) {
        $this->poramoant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiforpagPeer::PORAMOANT;
      }
  
	} 
	
	public function setNetpag($v)
	{

    if ($this->netpag !== $v) {
        $this->netpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiforpagPeer::NETPAG;
      }
  
	} 
	
	public function setFecant($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecant] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecant !== $ts) {
      $this->fecant = $ts;
      $this->modifiedColumns[] = LiforpagPeer::FECANT;
    }

	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = LiforpagPeer::CONDIC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiforpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numofe = $rs->getString($startcol + 0);

      $this->desant = $rs->getString($startcol + 1);

      $this->porant = $rs->getFloat($startcol + 2);

      $this->montot = $rs->getFloat($startcol + 3);

      $this->monrec = $rs->getFloat($startcol + 4);

      $this->subtot = $rs->getFloat($startcol + 5);

      $this->poramoant = $rs->getFloat($startcol + 6);

      $this->netpag = $rs->getFloat($startcol + 7);

      $this->fecant = $rs->getDate($startcol + 8, null);

      $this->condic = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liforpag object", $e);
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
			$con = Propel::getConnection(LiforpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiforpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiforpagPeer::DATABASE_NAME);
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
					$pk = LiforpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiforpagPeer::doUpdate($this, $con);
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


			if (($retval = LiforpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiforpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumofe();
				break;
			case 1:
				return $this->getDesant();
				break;
			case 2:
				return $this->getPorant();
				break;
			case 3:
				return $this->getMontot();
				break;
			case 4:
				return $this->getMonrec();
				break;
			case 5:
				return $this->getSubtot();
				break;
			case 6:
				return $this->getPoramoant();
				break;
			case 7:
				return $this->getNetpag();
				break;
			case 8:
				return $this->getFecant();
				break;
			case 9:
				return $this->getCondic();
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
		$keys = LiforpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumofe(),
			$keys[1] => $this->getDesant(),
			$keys[2] => $this->getPorant(),
			$keys[3] => $this->getMontot(),
			$keys[4] => $this->getMonrec(),
			$keys[5] => $this->getSubtot(),
			$keys[6] => $this->getPoramoant(),
			$keys[7] => $this->getNetpag(),
			$keys[8] => $this->getFecant(),
			$keys[9] => $this->getCondic(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiforpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumofe($value);
				break;
			case 1:
				$this->setDesant($value);
				break;
			case 2:
				$this->setPorant($value);
				break;
			case 3:
				$this->setMontot($value);
				break;
			case 4:
				$this->setMonrec($value);
				break;
			case 5:
				$this->setSubtot($value);
				break;
			case 6:
				$this->setPoramoant($value);
				break;
			case 7:
				$this->setNetpag($value);
				break;
			case 8:
				$this->setFecant($value);
				break;
			case 9:
				$this->setCondic($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiforpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesant($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSubtot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPoramoant($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNetpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecant($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCondic($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiforpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiforpagPeer::NUMOFE)) $criteria->add(LiforpagPeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LiforpagPeer::DESANT)) $criteria->add(LiforpagPeer::DESANT, $this->desant);
		if ($this->isColumnModified(LiforpagPeer::PORANT)) $criteria->add(LiforpagPeer::PORANT, $this->porant);
		if ($this->isColumnModified(LiforpagPeer::MONTOT)) $criteria->add(LiforpagPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(LiforpagPeer::MONREC)) $criteria->add(LiforpagPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiforpagPeer::SUBTOT)) $criteria->add(LiforpagPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiforpagPeer::PORAMOANT)) $criteria->add(LiforpagPeer::PORAMOANT, $this->poramoant);
		if ($this->isColumnModified(LiforpagPeer::NETPAG)) $criteria->add(LiforpagPeer::NETPAG, $this->netpag);
		if ($this->isColumnModified(LiforpagPeer::FECANT)) $criteria->add(LiforpagPeer::FECANT, $this->fecant);
		if ($this->isColumnModified(LiforpagPeer::CONDIC)) $criteria->add(LiforpagPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(LiforpagPeer::ID)) $criteria->add(LiforpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiforpagPeer::DATABASE_NAME);

		$criteria->add(LiforpagPeer::ID, $this->id);

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

		$copyObj->setNumofe($this->numofe);

		$copyObj->setDesant($this->desant);

		$copyObj->setPorant($this->porant);

		$copyObj->setMontot($this->montot);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setPoramoant($this->poramoant);

		$copyObj->setNetpag($this->netpag);

		$copyObj->setFecant($this->fecant);

		$copyObj->setCondic($this->condic);


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
			self::$peer = new LiforpagPeer();
		}
		return self::$peer;
	}

} 