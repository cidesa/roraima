<?php


abstract class BaseGiregind extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numuni;


	
	protected $numindg;


	
	protected $nomindg;


	
	protected $estindg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumuni()
  {

    return trim($this->numuni);

  }
  
  public function getNumindg()
  {

    return trim($this->numindg);

  }
  
  public function getNomindg()
  {

    return trim($this->nomindg);

  }
  
  public function getEstindg()
  {

    return trim($this->estindg);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumuni($v)
	{

    if ($this->numuni !== $v) {
        $this->numuni = $v;
        $this->modifiedColumns[] = GiregindPeer::NUMUNI;
      }
  
	} 
	
	public function setNumindg($v)
	{

    if ($this->numindg !== $v) {
        $this->numindg = $v;
        $this->modifiedColumns[] = GiregindPeer::NUMINDG;
      }
  
	} 
	
	public function setNomindg($v)
	{

    if ($this->nomindg !== $v) {
        $this->nomindg = $v;
        $this->modifiedColumns[] = GiregindPeer::NOMINDG;
      }
  
	} 
	
	public function setEstindg($v)
	{

    if ($this->estindg !== $v) {
        $this->estindg = $v;
        $this->modifiedColumns[] = GiregindPeer::ESTINDG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = GiregindPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numuni = $rs->getString($startcol + 0);

      $this->numindg = $rs->getString($startcol + 1);

      $this->nomindg = $rs->getString($startcol + 2);

      $this->estindg = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Giregind object", $e);
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
			$con = Propel::getConnection(GiregindPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GiregindPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(GiregindPeer::DATABASE_NAME);
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
					$pk = GiregindPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GiregindPeer::doUpdate($this, $con);
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


			if (($retval = GiregindPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GiregindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumuni();
				break;
			case 1:
				return $this->getNumindg();
				break;
			case 2:
				return $this->getNomindg();
				break;
			case 3:
				return $this->getEstindg();
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
		$keys = GiregindPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumuni(),
			$keys[1] => $this->getNumindg(),
			$keys[2] => $this->getNomindg(),
			$keys[3] => $this->getEstindg(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GiregindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumuni($value);
				break;
			case 1:
				$this->setNumindg($value);
				break;
			case 2:
				$this->setNomindg($value);
				break;
			case 3:
				$this->setEstindg($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GiregindPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumuni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumindg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomindg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstindg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GiregindPeer::DATABASE_NAME);

		if ($this->isColumnModified(GiregindPeer::NUMUNI)) $criteria->add(GiregindPeer::NUMUNI, $this->numuni);
		if ($this->isColumnModified(GiregindPeer::NUMINDG)) $criteria->add(GiregindPeer::NUMINDG, $this->numindg);
		if ($this->isColumnModified(GiregindPeer::NOMINDG)) $criteria->add(GiregindPeer::NOMINDG, $this->nomindg);
		if ($this->isColumnModified(GiregindPeer::ESTINDG)) $criteria->add(GiregindPeer::ESTINDG, $this->estindg);
		if ($this->isColumnModified(GiregindPeer::ID)) $criteria->add(GiregindPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GiregindPeer::DATABASE_NAME);

		$criteria->add(GiregindPeer::ID, $this->id);

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

		$copyObj->setNumuni($this->numuni);

		$copyObj->setNumindg($this->numindg);

		$copyObj->setNomindg($this->nomindg);

		$copyObj->setEstindg($this->estindg);


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
			self::$peer = new GiregindPeer();
		}
		return self::$peer;
	}

} 