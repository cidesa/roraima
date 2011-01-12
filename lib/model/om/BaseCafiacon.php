<?php


abstract class BaseCafiacon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcon;


	
	protected $fecfia;


	
	protected $insfin;


	
	protected $tipfia;


	
	protected $numfia;


	
	protected $monfia;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcon()
  {

    return trim($this->ordcon);

  }
  
  public function getFecfia($format = 'Y-m-d')
  {

    if ($this->fecfia === null || $this->fecfia === '') {
      return null;
    } elseif (!is_int($this->fecfia)) {
            $ts = adodb_strtotime($this->fecfia);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfia] as date/time value: " . var_export($this->fecfia, true));
      }
    } else {
      $ts = $this->fecfia;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getInsfin()
  {

    return trim($this->insfin);

  }
  
  public function getTipfia()
  {

    return trim($this->tipfia);

  }
  
  public function getNumfia()
  {

    return trim($this->numfia);

  }
  
  public function getMonfia($val=false)
  {

    if($val) return number_format($this->monfia,2,',','.');
    else return $this->monfia;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcon($v)
	{

    if ($this->ordcon !== $v) {
        $this->ordcon = $v;
        $this->modifiedColumns[] = CafiaconPeer::ORDCON;
      }
  
	} 
	
	public function setFecfia($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfia] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfia !== $ts) {
      $this->fecfia = $ts;
      $this->modifiedColumns[] = CafiaconPeer::FECFIA;
    }

	} 
	
	public function setInsfin($v)
	{

    if ($this->insfin !== $v) {
        $this->insfin = $v;
        $this->modifiedColumns[] = CafiaconPeer::INSFIN;
      }
  
	} 
	
	public function setTipfia($v)
	{

    if ($this->tipfia !== $v) {
        $this->tipfia = $v;
        $this->modifiedColumns[] = CafiaconPeer::TIPFIA;
      }
  
	} 
	
	public function setNumfia($v)
	{

    if ($this->numfia !== $v) {
        $this->numfia = $v;
        $this->modifiedColumns[] = CafiaconPeer::NUMFIA;
      }
  
	} 
	
	public function setMonfia($v)
	{

    if ($this->monfia !== $v) {
        $this->monfia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CafiaconPeer::MONFIA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CafiaconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcon = $rs->getString($startcol + 0);

      $this->fecfia = $rs->getDate($startcol + 1, null);

      $this->insfin = $rs->getString($startcol + 2);

      $this->tipfia = $rs->getString($startcol + 3);

      $this->numfia = $rs->getString($startcol + 4);

      $this->monfia = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cafiacon object", $e);
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
			$con = Propel::getConnection(CafiaconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CafiaconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CafiaconPeer::DATABASE_NAME);
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
					$pk = CafiaconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CafiaconPeer::doUpdate($this, $con);
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


			if (($retval = CafiaconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CafiaconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcon();
				break;
			case 1:
				return $this->getFecfia();
				break;
			case 2:
				return $this->getInsfin();
				break;
			case 3:
				return $this->getTipfia();
				break;
			case 4:
				return $this->getNumfia();
				break;
			case 5:
				return $this->getMonfia();
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
		$keys = CafiaconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcon(),
			$keys[1] => $this->getFecfia(),
			$keys[2] => $this->getInsfin(),
			$keys[3] => $this->getTipfia(),
			$keys[4] => $this->getNumfia(),
			$keys[5] => $this->getMonfia(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CafiaconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcon($value);
				break;
			case 1:
				$this->setFecfia($value);
				break;
			case 2:
				$this->setInsfin($value);
				break;
			case 3:
				$this->setTipfia($value);
				break;
			case 4:
				$this->setNumfia($value);
				break;
			case 5:
				$this->setMonfia($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CafiaconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInsfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipfia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumfia($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonfia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CafiaconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CafiaconPeer::ORDCON)) $criteria->add(CafiaconPeer::ORDCON, $this->ordcon);
		if ($this->isColumnModified(CafiaconPeer::FECFIA)) $criteria->add(CafiaconPeer::FECFIA, $this->fecfia);
		if ($this->isColumnModified(CafiaconPeer::INSFIN)) $criteria->add(CafiaconPeer::INSFIN, $this->insfin);
		if ($this->isColumnModified(CafiaconPeer::TIPFIA)) $criteria->add(CafiaconPeer::TIPFIA, $this->tipfia);
		if ($this->isColumnModified(CafiaconPeer::NUMFIA)) $criteria->add(CafiaconPeer::NUMFIA, $this->numfia);
		if ($this->isColumnModified(CafiaconPeer::MONFIA)) $criteria->add(CafiaconPeer::MONFIA, $this->monfia);
		if ($this->isColumnModified(CafiaconPeer::ID)) $criteria->add(CafiaconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CafiaconPeer::DATABASE_NAME);

		$criteria->add(CafiaconPeer::ID, $this->id);

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

		$copyObj->setOrdcon($this->ordcon);

		$copyObj->setFecfia($this->fecfia);

		$copyObj->setInsfin($this->insfin);

		$copyObj->setTipfia($this->tipfia);

		$copyObj->setNumfia($this->numfia);

		$copyObj->setMonfia($this->monfia);


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
			self::$peer = new CafiaconPeer();
		}
		return self::$peer;
	}

} 