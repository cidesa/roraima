<?php


abstract class BaseCiimping extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refing;


	
	protected $codpre;


	
	protected $codtiprub;


	
	protected $moning;


	
	protected $monrec;


	
	protected $mondes;


	
	protected $montot;


	
	protected $fecing;


	
	protected $staimp;


	
	protected $monaju;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefing()
  {

    return trim($this->refing);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getCodtiprub()
  {

    return trim($this->codtiprub);

  }
  
  public function getMoning($val=false)
  {

    if($val) return number_format($this->moning,2,',','.');
    else return $this->moning;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

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

  
  public function getStaimp()
  {

    return trim($this->staimp);

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefing($v)
	{

    if ($this->refing !== $v) {
        $this->refing = $v;
        $this->modifiedColumns[] = CiimpingPeer::REFING;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CiimpingPeer::CODPRE;
      }
  
	} 
	
	public function setCodtiprub($v)
	{

    if ($this->codtiprub !== $v) {
        $this->codtiprub = $v;
        $this->modifiedColumns[] = CiimpingPeer::CODTIPRUB;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONING;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONREC;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONDES;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONTOT;
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
      $this->modifiedColumns[] = CiimpingPeer::FECING;
    }

	} 
	
	public function setStaimp($v)
	{

    if ($this->staimp !== $v) {
        $this->staimp = $v;
        $this->modifiedColumns[] = CiimpingPeer::STAIMP;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CiimpingPeer::MONAJU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CiimpingPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refing = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->codtiprub = $rs->getString($startcol + 2);

      $this->moning = $rs->getFloat($startcol + 3);

      $this->monrec = $rs->getFloat($startcol + 4);

      $this->mondes = $rs->getFloat($startcol + 5);

      $this->montot = $rs->getFloat($startcol + 6);

      $this->fecing = $rs->getDate($startcol + 7, null);

      $this->staimp = $rs->getString($startcol + 8);

      $this->monaju = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ciimping object", $e);
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
			$con = Propel::getConnection(CiimpingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiimpingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiimpingPeer::DATABASE_NAME);
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
					$pk = CiimpingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CiimpingPeer::doUpdate($this, $con);
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


			if (($retval = CiimpingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiimpingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefing();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getCodtiprub();
				break;
			case 3:
				return $this->getMoning();
				break;
			case 4:
				return $this->getMonrec();
				break;
			case 5:
				return $this->getMondes();
				break;
			case 6:
				return $this->getMontot();
				break;
			case 7:
				return $this->getFecing();
				break;
			case 8:
				return $this->getStaimp();
				break;
			case 9:
				return $this->getMonaju();
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
		$keys = CiimpingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefing(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getCodtiprub(),
			$keys[3] => $this->getMoning(),
			$keys[4] => $this->getMonrec(),
			$keys[5] => $this->getMondes(),
			$keys[6] => $this->getMontot(),
			$keys[7] => $this->getFecing(),
			$keys[8] => $this->getStaimp(),
			$keys[9] => $this->getMonaju(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiimpingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefing($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setCodtiprub($value);
				break;
			case 3:
				$this->setMoning($value);
				break;
			case 4:
				$this->setMonrec($value);
				break;
			case 5:
				$this->setMondes($value);
				break;
			case 6:
				$this->setMontot($value);
				break;
			case 7:
				$this->setFecing($value);
				break;
			case 8:
				$this->setStaimp($value);
				break;
			case 9:
				$this->setMonaju($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiimpingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefing($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtiprub($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoning($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMontot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecing($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStaimp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonaju($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiimpingPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiimpingPeer::REFING)) $criteria->add(CiimpingPeer::REFING, $this->refing);
		if ($this->isColumnModified(CiimpingPeer::CODPRE)) $criteria->add(CiimpingPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CiimpingPeer::CODTIPRUB)) $criteria->add(CiimpingPeer::CODTIPRUB, $this->codtiprub);
		if ($this->isColumnModified(CiimpingPeer::MONING)) $criteria->add(CiimpingPeer::MONING, $this->moning);
		if ($this->isColumnModified(CiimpingPeer::MONREC)) $criteria->add(CiimpingPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(CiimpingPeer::MONDES)) $criteria->add(CiimpingPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CiimpingPeer::MONTOT)) $criteria->add(CiimpingPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CiimpingPeer::FECING)) $criteria->add(CiimpingPeer::FECING, $this->fecing);
		if ($this->isColumnModified(CiimpingPeer::STAIMP)) $criteria->add(CiimpingPeer::STAIMP, $this->staimp);
		if ($this->isColumnModified(CiimpingPeer::MONAJU)) $criteria->add(CiimpingPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CiimpingPeer::ID)) $criteria->add(CiimpingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiimpingPeer::DATABASE_NAME);

		$criteria->add(CiimpingPeer::ID, $this->id);

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

		$copyObj->setRefing($this->refing);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodtiprub($this->codtiprub);

		$copyObj->setMoning($this->moning);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMontot($this->montot);

		$copyObj->setFecing($this->fecing);

		$copyObj->setStaimp($this->staimp);

		$copyObj->setMonaju($this->monaju);


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
			self::$peer = new CiimpingPeer();
		}
		return self::$peer;
	}

} 