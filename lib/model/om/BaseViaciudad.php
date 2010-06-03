<?php


abstract class BaseViaciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codciu;


	
	protected $nomciu;


	
	protected $codest;


	
	protected $codpai;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = ViaciudadPeer::CODCIU;
      }
  
	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = $v;
        $this->modifiedColumns[] = ViaciudadPeer::NOMCIU;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = ViaciudadPeer::CODEST;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = ViaciudadPeer::CODPAI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaciudadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codciu = $rs->getString($startcol + 0);

      $this->nomciu = $rs->getString($startcol + 1);

      $this->codest = $rs->getString($startcol + 2);

      $this->codpai = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaciudad object", $e);
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
			$con = Propel::getConnection(ViaciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaciudadPeer::DATABASE_NAME);
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
					$pk = ViaciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaciudadPeer::doUpdate($this, $con);
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


			if (($retval = ViaciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodciu();
				break;
			case 1:
				return $this->getNomciu();
				break;
			case 2:
				return $this->getCodest();
				break;
			case 3:
				return $this->getCodpai();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodciu(),
			$keys[1] => $this->getNomciu(),
			$keys[2] => $this->getCodest(),
			$keys[3] => $this->getCodpai(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodciu($value);
				break;
			case 1:
				$this->setNomciu($value);
				break;
			case 2:
				$this->setCodest($value);
				break;
			case 3:
				$this->setCodpai($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodciu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomciu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpai($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaciudadPeer::CODCIU)) $criteria->add(ViaciudadPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(ViaciudadPeer::NOMCIU)) $criteria->add(ViaciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(ViaciudadPeer::CODEST)) $criteria->add(ViaciudadPeer::CODEST, $this->codest);
		if ($this->isColumnModified(ViaciudadPeer::CODPAI)) $criteria->add(ViaciudadPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(ViaciudadPeer::ID)) $criteria->add(ViaciudadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaciudadPeer::DATABASE_NAME);

		$criteria->add(ViaciudadPeer::ID, $this->id);

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

		$copyObj->setCodciu($this->codciu);

		$copyObj->setNomciu($this->nomciu);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodpai($this->codpai);


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
			self::$peer = new ViaciudadPeer();
		}
		return self::$peer;
	}

} 