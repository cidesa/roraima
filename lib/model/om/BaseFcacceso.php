<?php


abstract class BaseFcacceso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedula;


	
	protected $nomusu;


	
	protected $pasusu;


	
	protected $autsol;


	
	protected $anupag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedula()
  {

    return trim($this->cedula);

  }
  
  public function getNomusu()
  {

    return trim($this->nomusu);

  }
  
  public function getPasusu()
  {

    return trim($this->pasusu);

  }
  
  public function getAutsol()
  {

    return trim($this->autsol);

  }
  
  public function getAnupag()
  {

    return trim($this->anupag);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedula($v)
	{

    if ($this->cedula !== $v) {
        $this->cedula = $v;
        $this->modifiedColumns[] = FcaccesoPeer::CEDULA;
      }
  
	} 
	
	public function setNomusu($v)
	{

    if ($this->nomusu !== $v) {
        $this->nomusu = $v;
        $this->modifiedColumns[] = FcaccesoPeer::NOMUSU;
      }
  
	} 
	
	public function setPasusu($v)
	{

    if ($this->pasusu !== $v) {
        $this->pasusu = $v;
        $this->modifiedColumns[] = FcaccesoPeer::PASUSU;
      }
  
	} 
	
	public function setAutsol($v)
	{

    if ($this->autsol !== $v) {
        $this->autsol = $v;
        $this->modifiedColumns[] = FcaccesoPeer::AUTSOL;
      }
  
	} 
	
	public function setAnupag($v)
	{

    if ($this->anupag !== $v) {
        $this->anupag = $v;
        $this->modifiedColumns[] = FcaccesoPeer::ANUPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcaccesoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedula = $rs->getString($startcol + 0);

      $this->nomusu = $rs->getString($startcol + 1);

      $this->pasusu = $rs->getString($startcol + 2);

      $this->autsol = $rs->getString($startcol + 3);

      $this->anupag = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcacceso object", $e);
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
			$con = Propel::getConnection(FcaccesoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcaccesoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcaccesoPeer::DATABASE_NAME);
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
					$pk = FcaccesoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcaccesoPeer::doUpdate($this, $con);
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


			if (($retval = FcaccesoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcaccesoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedula();
				break;
			case 1:
				return $this->getNomusu();
				break;
			case 2:
				return $this->getPasusu();
				break;
			case 3:
				return $this->getAutsol();
				break;
			case 4:
				return $this->getAnupag();
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
		$keys = FcaccesoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedula(),
			$keys[1] => $this->getNomusu(),
			$keys[2] => $this->getPasusu(),
			$keys[3] => $this->getAutsol(),
			$keys[4] => $this->getAnupag(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcaccesoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedula($value);
				break;
			case 1:
				$this->setNomusu($value);
				break;
			case 2:
				$this->setPasusu($value);
				break;
			case 3:
				$this->setAutsol($value);
				break;
			case 4:
				$this->setAnupag($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcaccesoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedula($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomusu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPasusu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAutsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnupag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcaccesoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcaccesoPeer::CEDULA)) $criteria->add(FcaccesoPeer::CEDULA, $this->cedula);
		if ($this->isColumnModified(FcaccesoPeer::NOMUSU)) $criteria->add(FcaccesoPeer::NOMUSU, $this->nomusu);
		if ($this->isColumnModified(FcaccesoPeer::PASUSU)) $criteria->add(FcaccesoPeer::PASUSU, $this->pasusu);
		if ($this->isColumnModified(FcaccesoPeer::AUTSOL)) $criteria->add(FcaccesoPeer::AUTSOL, $this->autsol);
		if ($this->isColumnModified(FcaccesoPeer::ANUPAG)) $criteria->add(FcaccesoPeer::ANUPAG, $this->anupag);
		if ($this->isColumnModified(FcaccesoPeer::ID)) $criteria->add(FcaccesoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcaccesoPeer::DATABASE_NAME);

		$criteria->add(FcaccesoPeer::ID, $this->id);

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

		$copyObj->setCedula($this->cedula);

		$copyObj->setNomusu($this->nomusu);

		$copyObj->setPasusu($this->pasusu);

		$copyObj->setAutsol($this->autsol);

		$copyObj->setAnupag($this->anupag);


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
			self::$peer = new FcaccesoPeer();
		}
		return self::$peer;
	}

} 