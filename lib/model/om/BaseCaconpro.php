<?php


abstract class BaseCaconpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $cedcon;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $telcon;


	
	protected $emacon;


	
	protected $relcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCedcon()
  {

    return trim($this->cedcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getTelcon()
  {

    return trim($this->telcon);

  }
  
  public function getEmacon()
  {

    return trim($this->emacon);

  }
  
  public function getRelcon()
  {

    return trim($this->relcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CaconproPeer::CODPRO;
      }
  
	} 
	
	public function setCedcon($v)
	{

    if ($this->cedcon !== $v) {
        $this->cedcon = $v;
        $this->modifiedColumns[] = CaconproPeer::CEDCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = CaconproPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = CaconproPeer::DIRCON;
      }
  
	} 
	
	public function setTelcon($v)
	{

    if ($this->telcon !== $v) {
        $this->telcon = $v;
        $this->modifiedColumns[] = CaconproPeer::TELCON;
      }
  
	} 
	
	public function setEmacon($v)
	{

    if ($this->emacon !== $v) {
        $this->emacon = $v;
        $this->modifiedColumns[] = CaconproPeer::EMACON;
      }
  
	} 
	
	public function setRelcon($v)
	{

    if ($this->relcon !== $v) {
        $this->relcon = $v;
        $this->modifiedColumns[] = CaconproPeer::RELCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaconproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->cedcon = $rs->getString($startcol + 1);

      $this->nomcon = $rs->getString($startcol + 2);

      $this->dircon = $rs->getString($startcol + 3);

      $this->telcon = $rs->getString($startcol + 4);

      $this->emacon = $rs->getString($startcol + 5);

      $this->relcon = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caconpro object", $e);
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
			$con = Propel::getConnection(CaconproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaconproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaconproPeer::DATABASE_NAME);
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
					$pk = CaconproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaconproPeer::doUpdate($this, $con);
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


			if (($retval = CaconproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaconproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCedcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getDircon();
				break;
			case 4:
				return $this->getTelcon();
				break;
			case 5:
				return $this->getEmacon();
				break;
			case 6:
				return $this->getRelcon();
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
		$keys = CaconproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCedcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getDircon(),
			$keys[4] => $this->getTelcon(),
			$keys[5] => $this->getEmacon(),
			$keys[6] => $this->getRelcon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaconproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCedcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setDircon($value);
				break;
			case 4:
				$this->setTelcon($value);
				break;
			case 5:
				$this->setEmacon($value);
				break;
			case 6:
				$this->setRelcon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaconproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDircon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmacon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRelcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaconproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaconproPeer::CODPRO)) $criteria->add(CaconproPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaconproPeer::CEDCON)) $criteria->add(CaconproPeer::CEDCON, $this->cedcon);
		if ($this->isColumnModified(CaconproPeer::NOMCON)) $criteria->add(CaconproPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(CaconproPeer::DIRCON)) $criteria->add(CaconproPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(CaconproPeer::TELCON)) $criteria->add(CaconproPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(CaconproPeer::EMACON)) $criteria->add(CaconproPeer::EMACON, $this->emacon);
		if ($this->isColumnModified(CaconproPeer::RELCON)) $criteria->add(CaconproPeer::RELCON, $this->relcon);
		if ($this->isColumnModified(CaconproPeer::ID)) $criteria->add(CaconproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaconproPeer::DATABASE_NAME);

		$criteria->add(CaconproPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCedcon($this->cedcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setEmacon($this->emacon);

		$copyObj->setRelcon($this->relcon);


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
			self::$peer = new CaconproPeer();
		}
		return self::$peer;
	}

} 