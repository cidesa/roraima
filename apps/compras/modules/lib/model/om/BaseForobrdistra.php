<?php


abstract class BaseForobrdistra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codobr;


	
	protected $codparegr;


	
	protected $codorg;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCodparegr()
  {

    return trim($this->codparegr);

  }
  
  public function getCodorg()
  {

    return trim($this->codorg);

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForobrdistraPeer::CODCAT;
      }
  
	} 
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = ForobrdistraPeer::CODOBR;
      }
  
	} 
	
	public function setCodparegr($v)
	{

    if ($this->codparegr !== $v) {
        $this->codparegr = $v;
        $this->modifiedColumns[] = ForobrdistraPeer::CODPAREGR;
      }
  
	} 
	
	public function setCodorg($v)
	{

    if ($this->codorg !== $v) {
        $this->codorg = $v;
        $this->modifiedColumns[] = ForobrdistraPeer::CODORG;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForobrdistraPeer::MONTO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForobrdistraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codobr = $rs->getString($startcol + 1);

      $this->codparegr = $rs->getString($startcol + 2);

      $this->codorg = $rs->getString($startcol + 3);

      $this->monto = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forobrdistra object", $e);
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
			$con = Propel::getConnection(ForobrdistraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForobrdistraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForobrdistraPeer::DATABASE_NAME);
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
					$pk = ForobrdistraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForobrdistraPeer::doUpdate($this, $con);
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


			if (($retval = ForobrdistraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForobrdistraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodobr();
				break;
			case 2:
				return $this->getCodparegr();
				break;
			case 3:
				return $this->getCodorg();
				break;
			case 4:
				return $this->getMonto();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForobrdistraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodobr(),
			$keys[2] => $this->getCodparegr(),
			$keys[3] => $this->getCodorg(),
			$keys[4] => $this->getMonto(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForobrdistraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodobr($value);
				break;
			case 2:
				$this->setCodparegr($value);
				break;
			case 3:
				$this->setCodorg($value);
				break;
			case 4:
				$this->setMonto($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForobrdistraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodparegr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodorg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForobrdistraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForobrdistraPeer::CODCAT)) $criteria->add(ForobrdistraPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForobrdistraPeer::CODOBR)) $criteria->add(ForobrdistraPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(ForobrdistraPeer::CODPAREGR)) $criteria->add(ForobrdistraPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(ForobrdistraPeer::CODORG)) $criteria->add(ForobrdistraPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(ForobrdistraPeer::MONTO)) $criteria->add(ForobrdistraPeer::MONTO, $this->monto);
		if ($this->isColumnModified(ForobrdistraPeer::ID)) $criteria->add(ForobrdistraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForobrdistraPeer::DATABASE_NAME);

		$criteria->add(ForobrdistraPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setCodorg($this->codorg);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new ForobrdistraPeer();
		}
		return self::$peer;
	}

} 