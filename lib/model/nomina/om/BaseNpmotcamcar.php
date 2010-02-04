<?php


abstract class BaseNpmotcamcar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmotcamcar;


	
	protected $desmotcamcar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmotcamcar()
  {

    return trim($this->codmotcamcar);

  }
  
  public function getDesmotcamcar()
  {

    return trim($this->desmotcamcar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmotcamcar($v)
	{

    if ($this->codmotcamcar !== $v) {
        $this->codmotcamcar = $v;
        $this->modifiedColumns[] = NpmotcamcarPeer::CODMOTCAMCAR;
      }
  
	} 
	
	public function setDesmotcamcar($v)
	{

    if ($this->desmotcamcar !== $v) {
        $this->desmotcamcar = $v;
        $this->modifiedColumns[] = NpmotcamcarPeer::DESMOTCAMCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpmotcamcarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmotcamcar = $rs->getString($startcol + 0);

      $this->desmotcamcar = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npmotcamcar object", $e);
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
			$con = Propel::getConnection(NpmotcamcarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpmotcamcarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpmotcamcarPeer::DATABASE_NAME);
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
					$pk = NpmotcamcarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpmotcamcarPeer::doUpdate($this, $con);
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


			if (($retval = NpmotcamcarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmotcamcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmotcamcar();
				break;
			case 1:
				return $this->getDesmotcamcar();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmotcamcarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmotcamcar(),
			$keys[1] => $this->getDesmotcamcar(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmotcamcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmotcamcar($value);
				break;
			case 1:
				$this->setDesmotcamcar($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmotcamcarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmotcamcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmotcamcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpmotcamcarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpmotcamcarPeer::CODMOTCAMCAR)) $criteria->add(NpmotcamcarPeer::CODMOTCAMCAR, $this->codmotcamcar);
		if ($this->isColumnModified(NpmotcamcarPeer::DESMOTCAMCAR)) $criteria->add(NpmotcamcarPeer::DESMOTCAMCAR, $this->desmotcamcar);
		if ($this->isColumnModified(NpmotcamcarPeer::ID)) $criteria->add(NpmotcamcarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpmotcamcarPeer::DATABASE_NAME);

		$criteria->add(NpmotcamcarPeer::ID, $this->id);

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

		$copyObj->setCodmotcamcar($this->codmotcamcar);

		$copyObj->setDesmotcamcar($this->desmotcamcar);


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
			self::$peer = new NpmotcamcarPeer();
		}
		return self::$peer;
	}

} 