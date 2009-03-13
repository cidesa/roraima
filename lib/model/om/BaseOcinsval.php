<?php


abstract class BaseOcinsval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedins;


	
	protected $codcon;


	
	protected $numval;


	
	protected $codtipval;


	
	protected $nomins;


	
	protected $numciv;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedins()
  {

    return trim($this->cedins);

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
  
  public function getNomins()
  {

    return trim($this->nomins);

  }
  
  public function getNumciv()
  {

    return trim($this->numciv);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedins($v)
	{

    if ($this->cedins !== $v) {
        $this->cedins = $v;
        $this->modifiedColumns[] = OcinsvalPeer::CEDINS;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = OcinsvalPeer::CODCON;
      }
  
	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = OcinsvalPeer::NUMVAL;
      }
  
	} 
	
	public function setCodtipval($v)
	{

    if ($this->codtipval !== $v) {
        $this->codtipval = $v;
        $this->modifiedColumns[] = OcinsvalPeer::CODTIPVAL;
      }
  
	} 
	
	public function setNomins($v)
	{

    if ($this->nomins !== $v) {
        $this->nomins = $v;
        $this->modifiedColumns[] = OcinsvalPeer::NOMINS;
      }
  
	} 
	
	public function setNumciv($v)
	{

    if ($this->numciv !== $v) {
        $this->numciv = $v;
        $this->modifiedColumns[] = OcinsvalPeer::NUMCIV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcinsvalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedins = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->numval = $rs->getString($startcol + 2);

      $this->codtipval = $rs->getString($startcol + 3);

      $this->nomins = $rs->getString($startcol + 4);

      $this->numciv = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocinsval object", $e);
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
			$con = Propel::getConnection(OcinsvalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcinsvalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcinsvalPeer::DATABASE_NAME);
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
					$pk = OcinsvalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcinsvalPeer::doUpdate($this, $con);
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


			if (($retval = OcinsvalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinsvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedins();
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
				return $this->getNomins();
				break;
			case 5:
				return $this->getNumciv();
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
		$keys = OcinsvalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedins(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getNumval(),
			$keys[3] => $this->getCodtipval(),
			$keys[4] => $this->getNomins(),
			$keys[5] => $this->getNumciv(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcinsvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedins($value);
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
				$this->setNomins($value);
				break;
			case 5:
				$this->setNumciv($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcinsvalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedins($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtipval($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomins($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumciv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcinsvalPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcinsvalPeer::CEDINS)) $criteria->add(OcinsvalPeer::CEDINS, $this->cedins);
		if ($this->isColumnModified(OcinsvalPeer::CODCON)) $criteria->add(OcinsvalPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcinsvalPeer::NUMVAL)) $criteria->add(OcinsvalPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(OcinsvalPeer::CODTIPVAL)) $criteria->add(OcinsvalPeer::CODTIPVAL, $this->codtipval);
		if ($this->isColumnModified(OcinsvalPeer::NOMINS)) $criteria->add(OcinsvalPeer::NOMINS, $this->nomins);
		if ($this->isColumnModified(OcinsvalPeer::NUMCIV)) $criteria->add(OcinsvalPeer::NUMCIV, $this->numciv);
		if ($this->isColumnModified(OcinsvalPeer::ID)) $criteria->add(OcinsvalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcinsvalPeer::DATABASE_NAME);

		$criteria->add(OcinsvalPeer::ID, $this->id);

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

		$copyObj->setCedins($this->cedins);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumval($this->numval);

		$copyObj->setCodtipval($this->codtipval);

		$copyObj->setNomins($this->nomins);

		$copyObj->setNumciv($this->numciv);


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
			self::$peer = new OcinsvalPeer();
		}
		return self::$peer;
	}

} 