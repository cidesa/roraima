<?php


abstract class BaseOcretval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $codcon;


	
	protected $numval;


	
	protected $codtipval;


	
	protected $porret;


	
	protected $monret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNumval()
  {

    return trim($this->numval);

  }
  
  public function getCodtipval()
  {

    return trim($this->codtipval);

  }
  
  public function getPorret($val=false)
  {

    if($val) return number_format($this->porret,2,',','.');
    else return $this->porret;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = OcretvalPeer::CODTIP;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = OcretvalPeer::CODCON;
      }
  
	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = OcretvalPeer::NUMVAL;
      }
  
	} 
	
	public function setCodtipval($v)
	{

    if ($this->codtipval !== $v) {
        $this->codtipval = $v;
        $this->modifiedColumns[] = OcretvalPeer::CODTIPVAL;
      }
  
	} 
	
	public function setPorret($v)
	{

    if ($this->porret !== $v) {
        $this->porret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcretvalPeer::PORRET;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcretvalPeer::MONRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcretvalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtip = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->numval = $rs->getString($startcol + 2);

      $this->codtipval = $rs->getString($startcol + 3);

      $this->porret = $rs->getFloat($startcol + 4);

      $this->monret = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocretval object", $e);
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
			$con = Propel::getConnection(OcretvalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcretvalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcretvalPeer::DATABASE_NAME);
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
					$pk = OcretvalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcretvalPeer::doUpdate($this, $con);
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


			if (($retval = OcretvalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcretvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtip();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getNumval();
				break;
			case 3:
				return $this->getCodtipval();
				break;
			case 4:
				return $this->getPorret();
				break;
			case 5:
				return $this->getMonret();
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
		$keys = OcretvalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getNumval(),
			$keys[3] => $this->getCodtipval(),
			$keys[4] => $this->getPorret(),
			$keys[5] => $this->getMonret(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcretvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtip($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setNumval($value);
				break;
			case 3:
				$this->setCodtipval($value);
				break;
			case 4:
				$this->setPorret($value);
				break;
			case 5:
				$this->setMonret($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcretvalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtipval($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonret($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcretvalPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcretvalPeer::CODTIP)) $criteria->add(OcretvalPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(OcretvalPeer::CODCON)) $criteria->add(OcretvalPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcretvalPeer::NUMVAL)) $criteria->add(OcretvalPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(OcretvalPeer::CODTIPVAL)) $criteria->add(OcretvalPeer::CODTIPVAL, $this->codtipval);
		if ($this->isColumnModified(OcretvalPeer::PORRET)) $criteria->add(OcretvalPeer::PORRET, $this->porret);
		if ($this->isColumnModified(OcretvalPeer::MONRET)) $criteria->add(OcretvalPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OcretvalPeer::ID)) $criteria->add(OcretvalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcretvalPeer::DATABASE_NAME);

		$criteria->add(OcretvalPeer::ID, $this->id);

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

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumval($this->numval);

		$copyObj->setCodtipval($this->codtipval);

		$copyObj->setPorret($this->porret);

		$copyObj->setMonret($this->monret);


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
			self::$peer = new OcretvalPeer();
		}
		return self::$peer;
	}

} 