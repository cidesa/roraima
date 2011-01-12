<?php


abstract class BaseTsdetfon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffon;


	
	protected $codart;


	
	protected $codcat;


	
	protected $monfon;


	
	protected $monrec;


	
	protected $totfon;


	
	protected $stafon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffon()
  {

    return trim($this->reffon);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getMonfon($val=false)
  {

    if($val) return number_format($this->monfon,2,',','.');
    else return $this->monfon;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getTotfon($val=false)
  {

    if($val) return number_format($this->totfon,2,',','.');
    else return $this->totfon;

  }
  
  public function getStafon()
  {

    return trim($this->stafon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffon($v)
	{

    if ($this->reffon !== $v) {
        $this->reffon = $v;
        $this->modifiedColumns[] = TsdetfonPeer::REFFON;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = TsdetfonPeer::CODART;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = TsdetfonPeer::CODCAT;
      }
  
	} 
	
	public function setMonfon($v)
	{

    if ($this->monfon !== $v) {
        $this->monfon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetfonPeer::MONFON;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetfonPeer::MONREC;
      }
  
	} 
	
	public function setTotfon($v)
	{

    if ($this->totfon !== $v) {
        $this->totfon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetfonPeer::TOTFON;
      }
  
	} 
	
	public function setStafon($v)
	{

    if ($this->stafon !== $v) {
        $this->stafon = $v;
        $this->modifiedColumns[] = TsdetfonPeer::STAFON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdetfonPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffon = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->monfon = $rs->getFloat($startcol + 3);

      $this->monrec = $rs->getFloat($startcol + 4);

      $this->totfon = $rs->getFloat($startcol + 5);

      $this->stafon = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdetfon object", $e);
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
			$con = Propel::getConnection(TsdetfonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdetfonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdetfonPeer::DATABASE_NAME);
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
					$pk = TsdetfonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdetfonPeer::doUpdate($this, $con);
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


			if (($retval = TsdetfonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetfonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffon();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getMonfon();
				break;
			case 4:
				return $this->getMonrec();
				break;
			case 5:
				return $this->getTotfon();
				break;
			case 6:
				return $this->getStafon();
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
		$keys = TsdetfonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffon(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getMonfon(),
			$keys[4] => $this->getMonrec(),
			$keys[5] => $this->getTotfon(),
			$keys[6] => $this->getStafon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetfonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffon($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setMonfon($value);
				break;
			case 4:
				$this->setMonrec($value);
				break;
			case 5:
				$this->setTotfon($value);
				break;
			case 6:
				$this->setStafon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdetfonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonfon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotfon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStafon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdetfonPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdetfonPeer::REFFON)) $criteria->add(TsdetfonPeer::REFFON, $this->reffon);
		if ($this->isColumnModified(TsdetfonPeer::CODART)) $criteria->add(TsdetfonPeer::CODART, $this->codart);
		if ($this->isColumnModified(TsdetfonPeer::CODCAT)) $criteria->add(TsdetfonPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(TsdetfonPeer::MONFON)) $criteria->add(TsdetfonPeer::MONFON, $this->monfon);
		if ($this->isColumnModified(TsdetfonPeer::MONREC)) $criteria->add(TsdetfonPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(TsdetfonPeer::TOTFON)) $criteria->add(TsdetfonPeer::TOTFON, $this->totfon);
		if ($this->isColumnModified(TsdetfonPeer::STAFON)) $criteria->add(TsdetfonPeer::STAFON, $this->stafon);
		if ($this->isColumnModified(TsdetfonPeer::ID)) $criteria->add(TsdetfonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdetfonPeer::DATABASE_NAME);

		$criteria->add(TsdetfonPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setMonfon($this->monfon);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setTotfon($this->totfon);

		$copyObj->setStafon($this->stafon);


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
			self::$peer = new TsdetfonPeer();
		}
		return self::$peer;
	}

} 