<?php


abstract class BaseOctipval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipval;


	
	protected $destipval;


	
	protected $nomabr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipval()
  {

    return trim($this->codtipval);

  }
  
  public function getDestipval()
  {

    return trim($this->destipval);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipval($v)
	{

    if ($this->codtipval !== $v) {
        $this->codtipval = $v;
        $this->modifiedColumns[] = OctipvalPeer::CODTIPVAL;
      }
  
	} 
	
	public function setDestipval($v)
	{

    if ($this->destipval !== $v) {
        $this->destipval = $v;
        $this->modifiedColumns[] = OctipvalPeer::DESTIPVAL;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = OctipvalPeer::NOMABR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OctipvalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipval = $rs->getString($startcol + 0);

      $this->destipval = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Octipval object", $e);
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
			$con = Propel::getConnection(OctipvalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OctipvalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OctipvalPeer::DATABASE_NAME);
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
					$pk = OctipvalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OctipvalPeer::doUpdate($this, $con);
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


			if (($retval = OctipvalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipval();
				break;
			case 1:
				return $this->getDestipval();
				break;
			case 2:
				return $this->getNomabr();
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
		$keys = OctipvalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipval(),
			$keys[1] => $this->getDestipval(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipval($value);
				break;
			case 1:
				$this->setDestipval($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OctipvalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipval($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipval($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OctipvalPeer::DATABASE_NAME);

		if ($this->isColumnModified(OctipvalPeer::CODTIPVAL)) $criteria->add(OctipvalPeer::CODTIPVAL, $this->codtipval);
		if ($this->isColumnModified(OctipvalPeer::DESTIPVAL)) $criteria->add(OctipvalPeer::DESTIPVAL, $this->destipval);
		if ($this->isColumnModified(OctipvalPeer::NOMABR)) $criteria->add(OctipvalPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(OctipvalPeer::ID)) $criteria->add(OctipvalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OctipvalPeer::DATABASE_NAME);

		$criteria->add(OctipvalPeer::ID, $this->id);

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

		$copyObj->setCodtipval($this->codtipval);

		$copyObj->setDestipval($this->destipval);

		$copyObj->setNomabr($this->nomabr);


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
			self::$peer = new OctipvalPeer();
		}
		return self::$peer;
	}

} 