<?php


abstract class BaseFctrainm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $nroinm;


	
	protected $fectra;


	
	protected $rifcon;


	
	protected $rifrep;


	
	protected $rifconant;


	
	protected $rifrepant;


	
	protected $funrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumtra()
  {

    return trim($this->numtra);

  }
  
  public function getNroinm()
  {

    return trim($this->nroinm);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getRifconant()
  {

    return trim($this->rifconant);

  }
  
  public function getRifrepant()
  {

    return trim($this->rifrepant);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = FctrainmPeer::NUMTRA;
      }
  
	} 
	
	public function setNroinm($v)
	{

    if ($this->nroinm !== $v) {
        $this->nroinm = $v;
        $this->modifiedColumns[] = FctrainmPeer::NROINM;
      }
  
	} 
	
	public function setFectra($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = FctrainmPeer::FECTRA;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FctrainmPeer::RIFCON;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FctrainmPeer::RIFREP;
      }
  
	} 
	
	public function setRifconant($v)
	{

    if ($this->rifconant !== $v) {
        $this->rifconant = $v;
        $this->modifiedColumns[] = FctrainmPeer::RIFCONANT;
      }
  
	} 
	
	public function setRifrepant($v)
	{

    if ($this->rifrepant !== $v) {
        $this->rifrepant = $v;
        $this->modifiedColumns[] = FctrainmPeer::RIFREPANT;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FctrainmPeer::FUNREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FctrainmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numtra = $rs->getString($startcol + 0);

      $this->nroinm = $rs->getString($startcol + 1);

      $this->fectra = $rs->getDate($startcol + 2, null);

      $this->rifcon = $rs->getString($startcol + 3);

      $this->rifrep = $rs->getString($startcol + 4);

      $this->rifconant = $rs->getString($startcol + 5);

      $this->rifrepant = $rs->getString($startcol + 6);

      $this->funrec = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fctrainm object", $e);
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
			$con = Propel::getConnection(FctrainmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FctrainmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FctrainmPeer::DATABASE_NAME);
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
					$pk = FctrainmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FctrainmPeer::doUpdate($this, $con);
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


			if (($retval = FctrainmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctrainmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getNroinm();
				break;
			case 2:
				return $this->getFectra();
				break;
			case 3:
				return $this->getRifcon();
				break;
			case 4:
				return $this->getRifrep();
				break;
			case 5:
				return $this->getRifconant();
				break;
			case 6:
				return $this->getRifrepant();
				break;
			case 7:
				return $this->getFunrec();
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
		$keys = FctrainmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getNroinm(),
			$keys[2] => $this->getFectra(),
			$keys[3] => $this->getRifcon(),
			$keys[4] => $this->getRifrep(),
			$keys[5] => $this->getRifconant(),
			$keys[6] => $this->getRifrepant(),
			$keys[7] => $this->getFunrec(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FctrainmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setNroinm($value);
				break;
			case 2:
				$this->setFectra($value);
				break;
			case 3:
				$this->setRifcon($value);
				break;
			case 4:
				$this->setRifrep($value);
				break;
			case 5:
				$this->setRifconant($value);
				break;
			case 6:
				$this->setRifrepant($value);
				break;
			case 7:
				$this->setFunrec($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FctrainmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNroinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFectra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifrep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRifconant($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRifrepant($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFunrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FctrainmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FctrainmPeer::NUMTRA)) $criteria->add(FctrainmPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(FctrainmPeer::NROINM)) $criteria->add(FctrainmPeer::NROINM, $this->nroinm);
		if ($this->isColumnModified(FctrainmPeer::FECTRA)) $criteria->add(FctrainmPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(FctrainmPeer::RIFCON)) $criteria->add(FctrainmPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FctrainmPeer::RIFREP)) $criteria->add(FctrainmPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FctrainmPeer::RIFCONANT)) $criteria->add(FctrainmPeer::RIFCONANT, $this->rifconant);
		if ($this->isColumnModified(FctrainmPeer::RIFREPANT)) $criteria->add(FctrainmPeer::RIFREPANT, $this->rifrepant);
		if ($this->isColumnModified(FctrainmPeer::FUNREC)) $criteria->add(FctrainmPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FctrainmPeer::ID)) $criteria->add(FctrainmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FctrainmPeer::DATABASE_NAME);

		$criteria->add(FctrainmPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setFectra($this->fectra);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setRifconant($this->rifconant);

		$copyObj->setRifrepant($this->rifrepant);

		$copyObj->setFunrec($this->funrec);


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
			self::$peer = new FctrainmPeer();
		}
		return self::$peer;
	}

} 