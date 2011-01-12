<?php


abstract class BaseTsfonant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffon;


	
	protected $fecfon;


	
	protected $cedrif;


	
	protected $desfon;


	
	protected $monfon;


	
	protected $stafon;


	
	protected $codfon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffon()
  {

    return trim($this->reffon);

  }
  
  public function getFecfon($format = 'Y-m-d')
  {

    if ($this->fecfon === null || $this->fecfon === '') {
      return null;
    } elseif (!is_int($this->fecfon)) {
            $ts = adodb_strtotime($this->fecfon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfon] as date/time value: " . var_export($this->fecfon, true));
      }
    } else {
      $ts = $this->fecfon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getDesfon()
  {

    return trim($this->desfon);

  }
  
  public function getMonfon($val=false)
  {

    if($val) return number_format($this->monfon,2,',','.');
    else return $this->monfon;

  }
  
  public function getStafon()
  {

    return trim($this->stafon);

  }
  
  public function getCodfon()
  {

    return trim($this->codfon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffon($v)
	{

    if ($this->reffon !== $v) {
        $this->reffon = $v;
        $this->modifiedColumns[] = TsfonantPeer::REFFON;
      }
  
	} 
	
	public function setFecfon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfon !== $ts) {
      $this->fecfon = $ts;
      $this->modifiedColumns[] = TsfonantPeer::FECFON;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TsfonantPeer::CEDRIF;
      }
  
	} 
	
	public function setDesfon($v)
	{

    if ($this->desfon !== $v) {
        $this->desfon = $v;
        $this->modifiedColumns[] = TsfonantPeer::DESFON;
      }
  
	} 
	
	public function setMonfon($v)
	{

    if ($this->monfon !== $v) {
        $this->monfon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsfonantPeer::MONFON;
      }
  
	} 
	
	public function setStafon($v)
	{

    if ($this->stafon !== $v) {
        $this->stafon = $v;
        $this->modifiedColumns[] = TsfonantPeer::STAFON;
      }
  
	} 
	
	public function setCodfon($v)
	{

    if ($this->codfon !== $v) {
        $this->codfon = $v;
        $this->modifiedColumns[] = TsfonantPeer::CODFON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsfonantPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffon = $rs->getString($startcol + 0);

      $this->fecfon = $rs->getDate($startcol + 1, null);

      $this->cedrif = $rs->getString($startcol + 2);

      $this->desfon = $rs->getString($startcol + 3);

      $this->monfon = $rs->getFloat($startcol + 4);

      $this->stafon = $rs->getString($startcol + 5);

      $this->codfon = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsfonant object", $e);
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
			$con = Propel::getConnection(TsfonantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsfonantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsfonantPeer::DATABASE_NAME);
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
					$pk = TsfonantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsfonantPeer::doUpdate($this, $con);
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


			if (($retval = TsfonantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsfonantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffon();
				break;
			case 1:
				return $this->getFecfon();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getDesfon();
				break;
			case 4:
				return $this->getMonfon();
				break;
			case 5:
				return $this->getStafon();
				break;
			case 6:
				return $this->getCodfon();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsfonantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffon(),
			$keys[1] => $this->getFecfon(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getDesfon(),
			$keys[4] => $this->getMonfon(),
			$keys[5] => $this->getStafon(),
			$keys[6] => $this->getCodfon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsfonantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffon($value);
				break;
			case 1:
				$this->setFecfon($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setDesfon($value);
				break;
			case 4:
				$this->setMonfon($value);
				break;
			case 5:
				$this->setStafon($value);
				break;
			case 6:
				$this->setCodfon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsfonantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesfon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonfon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStafon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodfon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsfonantPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsfonantPeer::REFFON)) $criteria->add(TsfonantPeer::REFFON, $this->reffon);
		if ($this->isColumnModified(TsfonantPeer::FECFON)) $criteria->add(TsfonantPeer::FECFON, $this->fecfon);
		if ($this->isColumnModified(TsfonantPeer::CEDRIF)) $criteria->add(TsfonantPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TsfonantPeer::DESFON)) $criteria->add(TsfonantPeer::DESFON, $this->desfon);
		if ($this->isColumnModified(TsfonantPeer::MONFON)) $criteria->add(TsfonantPeer::MONFON, $this->monfon);
		if ($this->isColumnModified(TsfonantPeer::STAFON)) $criteria->add(TsfonantPeer::STAFON, $this->stafon);
		if ($this->isColumnModified(TsfonantPeer::CODFON)) $criteria->add(TsfonantPeer::CODFON, $this->codfon);
		if ($this->isColumnModified(TsfonantPeer::ID)) $criteria->add(TsfonantPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsfonantPeer::DATABASE_NAME);

		$criteria->add(TsfonantPeer::ID, $this->id);

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

		$copyObj->setReffon($this->reffon);

		$copyObj->setFecfon($this->fecfon);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setDesfon($this->desfon);

		$copyObj->setMonfon($this->monfon);

		$copyObj->setStafon($this->stafon);

		$copyObj->setCodfon($this->codfon);


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
			self::$peer = new TsfonantPeer();
		}
		return self::$peer;
	}

} 