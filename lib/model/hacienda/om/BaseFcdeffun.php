<?php


abstract class BaseFcdeffun extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codfun;


	
	protected $nomfun;


	
	protected $coduniadm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodfun()
  {

    return trim($this->codfun);

  }
  
  public function getNomfun()
  {

    return trim($this->nomfun);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodfun($v)
	{

    if ($this->codfun !== $v) {
        $this->codfun = $v;
        $this->modifiedColumns[] = FcdeffunPeer::CODFUN;
      }
  
	} 
	
	public function setNomfun($v)
	{

    if ($this->nomfun !== $v) {
        $this->nomfun = $v;
        $this->modifiedColumns[] = FcdeffunPeer::NOMFUN;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = FcdeffunPeer::CODUNIADM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdeffunPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codfun = $rs->getString($startcol + 0);

      $this->nomfun = $rs->getString($startcol + 1);

      $this->coduniadm = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdeffun object", $e);
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
			$con = Propel::getConnection(FcdeffunPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdeffunPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdeffunPeer::DATABASE_NAME);
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
					$pk = FcdeffunPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdeffunPeer::doUpdate($this, $con);
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


			if (($retval = FcdeffunPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeffunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodfun();
				break;
			case 1:
				return $this->getNomfun();
				break;
			case 2:
				return $this->getCoduniadm();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeffunPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodfun(),
			$keys[1] => $this->getNomfun(),
			$keys[2] => $this->getCoduniadm(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeffunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodfun($value);
				break;
			case 1:
				$this->setNomfun($value);
				break;
			case 2:
				$this->setCoduniadm($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeffunPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodfun($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomfun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduniadm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdeffunPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdeffunPeer::CODFUN)) $criteria->add(FcdeffunPeer::CODFUN, $this->codfun);
		if ($this->isColumnModified(FcdeffunPeer::NOMFUN)) $criteria->add(FcdeffunPeer::NOMFUN, $this->nomfun);
		if ($this->isColumnModified(FcdeffunPeer::CODUNIADM)) $criteria->add(FcdeffunPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(FcdeffunPeer::ID)) $criteria->add(FcdeffunPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdeffunPeer::DATABASE_NAME);

		$criteria->add(FcdeffunPeer::ID, $this->id);

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

		$copyObj->setCodfun($this->codfun);

		$copyObj->setNomfun($this->nomfun);

		$copyObj->setCoduniadm($this->coduniadm);


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
			self::$peer = new FcdeffunPeer();
		}
		return self::$peer;
	}

} 