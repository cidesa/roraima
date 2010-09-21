<?php


abstract class BaseFccominm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $anovig;


	
	protected $codcom;


	
	protected $descom;


	
	protected $afeinm;


	
	protected $opecom;


	
	protected $valcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAnovig()
  {

    return trim($this->anovig);

  }
  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getAfeinm()
  {

    return trim($this->afeinm);

  }
  
  public function getOpecom()
  {

    return trim($this->opecom);

  }
  
  public function getValcom($val=false)
  {

    if($val) return number_format($this->valcom,2,',','.');
    else return $this->valcom;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAnovig($v)
	{

    if ($this->anovig !== $v) {
        $this->anovig = $v;
        $this->modifiedColumns[] = FccominmPeer::ANOVIG;
      }
  
	} 
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = $v;
        $this->modifiedColumns[] = FccominmPeer::CODCOM;
      }
  
	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = FccominmPeer::DESCOM;
      }
  
	} 
	
	public function setAfeinm($v)
	{

    if ($this->afeinm !== $v) {
        $this->afeinm = $v;
        $this->modifiedColumns[] = FccominmPeer::AFEINM;
      }
  
	} 
	
	public function setOpecom($v)
	{

    if ($this->opecom !== $v) {
        $this->opecom = $v;
        $this->modifiedColumns[] = FccominmPeer::OPECOM;
      }
  
	} 
	
	public function setValcom($v)
	{

    if ($this->valcom !== $v) {
        $this->valcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FccominmPeer::VALCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FccominmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->anovig = $rs->getString($startcol + 0);

      $this->codcom = $rs->getString($startcol + 1);

      $this->descom = $rs->getString($startcol + 2);

      $this->afeinm = $rs->getString($startcol + 3);

      $this->opecom = $rs->getString($startcol + 4);

      $this->valcom = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fccominm object", $e);
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
			$con = Propel::getConnection(FccominmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FccominmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FccominmPeer::DATABASE_NAME);
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
					$pk = FccominmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FccominmPeer::doUpdate($this, $con);
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


			if (($retval = FccominmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccominmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAnovig();
				break;
			case 1:
				return $this->getCodcom();
				break;
			case 2:
				return $this->getDescom();
				break;
			case 3:
				return $this->getAfeinm();
				break;
			case 4:
				return $this->getOpecom();
				break;
			case 5:
				return $this->getValcom();
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
		$keys = FccominmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAnovig(),
			$keys[1] => $this->getCodcom(),
			$keys[2] => $this->getDescom(),
			$keys[3] => $this->getAfeinm(),
			$keys[4] => $this->getOpecom(),
			$keys[5] => $this->getValcom(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccominmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAnovig($value);
				break;
			case 1:
				$this->setCodcom($value);
				break;
			case 2:
				$this->setDescom($value);
				break;
			case 3:
				$this->setAfeinm($value);
				break;
			case 4:
				$this->setOpecom($value);
				break;
			case 5:
				$this->setValcom($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FccominmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAnovig($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAfeinm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOpecom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setValcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FccominmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FccominmPeer::ANOVIG)) $criteria->add(FccominmPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FccominmPeer::CODCOM)) $criteria->add(FccominmPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(FccominmPeer::DESCOM)) $criteria->add(FccominmPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(FccominmPeer::AFEINM)) $criteria->add(FccominmPeer::AFEINM, $this->afeinm);
		if ($this->isColumnModified(FccominmPeer::OPECOM)) $criteria->add(FccominmPeer::OPECOM, $this->opecom);
		if ($this->isColumnModified(FccominmPeer::VALCOM)) $criteria->add(FccominmPeer::VALCOM, $this->valcom);
		if ($this->isColumnModified(FccominmPeer::ID)) $criteria->add(FccominmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FccominmPeer::DATABASE_NAME);

		$criteria->add(FccominmPeer::ID, $this->id);

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

		$copyObj->setAnovig($this->anovig);

		$copyObj->setCodcom($this->codcom);

		$copyObj->setDescom($this->descom);

		$copyObj->setAfeinm($this->afeinm);

		$copyObj->setOpecom($this->opecom);

		$copyObj->setValcom($this->valcom);


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
			self::$peer = new FccominmPeer();
		}
		return self::$peer;
	}

} 