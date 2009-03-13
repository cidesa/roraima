<?php


abstract class BaseFcdetret extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numret;


	
	protected $numref;


	
	protected $monasi = 0;


	
	protected $monabo = 0;


	
	protected $mondeu = 0;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumret()
  {

    return trim($this->numret);

  }
  
  public function getNumref()
  {

    return trim($this->numref);

  }
  
  public function getMonasi($val=false)
  {

    if($val) return number_format($this->monasi,2,',','.');
    else return $this->monasi;

  }
  
  public function getMonabo($val=false)
  {

    if($val) return number_format($this->monabo,2,',','.');
    else return $this->monabo;

  }
  
  public function getMondeu($val=false)
  {

    if($val) return number_format($this->mondeu,2,',','.');
    else return $this->mondeu;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumret($v)
	{

    if ($this->numret !== $v) {
        $this->numret = $v;
        $this->modifiedColumns[] = FcdetretPeer::NUMRET;
      }
  
	} 
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = FcdetretPeer::NUMREF;
      }
  
	} 
	
	public function setMonasi($v)
	{

    if ($this->monasi !== $v || $v === 0) {
        $this->monasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetretPeer::MONASI;
      }
  
	} 
	
	public function setMonabo($v)
	{

    if ($this->monabo !== $v || $v === 0) {
        $this->monabo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetretPeer::MONABO;
      }
  
	} 
	
	public function setMondeu($v)
	{

    if ($this->mondeu !== $v || $v === 0) {
        $this->mondeu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetretPeer::MONDEU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetretPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numret = $rs->getString($startcol + 0);

      $this->numref = $rs->getString($startcol + 1);

      $this->monasi = $rs->getFloat($startcol + 2);

      $this->monabo = $rs->getFloat($startcol + 3);

      $this->mondeu = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetret object", $e);
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
			$con = Propel::getConnection(FcdetretPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetretPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetretPeer::DATABASE_NAME);
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
					$pk = FcdetretPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetretPeer::doUpdate($this, $con);
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


			if (($retval = FcdetretPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumret();
				break;
			case 1:
				return $this->getNumref();
				break;
			case 2:
				return $this->getMonasi();
				break;
			case 3:
				return $this->getMonabo();
				break;
			case 4:
				return $this->getMondeu();
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
		$keys = FcdetretPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumret(),
			$keys[1] => $this->getNumref(),
			$keys[2] => $this->getMonasi(),
			$keys[3] => $this->getMonabo(),
			$keys[4] => $this->getMondeu(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumret($value);
				break;
			case 1:
				$this->setNumref($value);
				break;
			case 2:
				$this->setMonasi($value);
				break;
			case 3:
				$this->setMonabo($value);
				break;
			case 4:
				$this->setMondeu($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetretPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumret($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumref($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonasi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonabo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondeu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetretPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetretPeer::NUMRET)) $criteria->add(FcdetretPeer::NUMRET, $this->numret);
		if ($this->isColumnModified(FcdetretPeer::NUMREF)) $criteria->add(FcdetretPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(FcdetretPeer::MONASI)) $criteria->add(FcdetretPeer::MONASI, $this->monasi);
		if ($this->isColumnModified(FcdetretPeer::MONABO)) $criteria->add(FcdetretPeer::MONABO, $this->monabo);
		if ($this->isColumnModified(FcdetretPeer::MONDEU)) $criteria->add(FcdetretPeer::MONDEU, $this->mondeu);
		if ($this->isColumnModified(FcdetretPeer::ID)) $criteria->add(FcdetretPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetretPeer::DATABASE_NAME);

		$criteria->add(FcdetretPeer::ID, $this->id);

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

		$copyObj->setNumret($this->numret);

		$copyObj->setNumref($this->numref);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setMonabo($this->monabo);

		$copyObj->setMondeu($this->mondeu);


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
			self::$peer = new FcdetretPeer();
		}
		return self::$peer;
	}

} 