<?php


abstract class BaseRhprocur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcur;


	
	protected $cedpro;


	
	protected $nompro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcur()
  {

    return trim($this->codcur);

  }
  
  public function getCedpro()
  {

    return trim($this->cedpro);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcur($v)
	{

    if ($this->codcur !== $v) {
        $this->codcur = $v;
        $this->modifiedColumns[] = RhprocurPeer::CODCUR;
      }
  
	} 
	
	public function setCedpro($v)
	{

    if ($this->cedpro !== $v) {
        $this->cedpro = $v;
        $this->modifiedColumns[] = RhprocurPeer::CEDPRO;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = RhprocurPeer::NOMPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhprocurPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcur = $rs->getString($startcol + 0);

      $this->cedpro = $rs->getString($startcol + 1);

      $this->nompro = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhprocur object", $e);
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
			$con = Propel::getConnection(RhprocurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhprocurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhprocurPeer::DATABASE_NAME);
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
					$pk = RhprocurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhprocurPeer::doUpdate($this, $con);
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


			if (($retval = RhprocurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhprocurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcur();
				break;
			case 1:
				return $this->getCedpro();
				break;
			case 2:
				return $this->getNompro();
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
		$keys = RhprocurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcur(),
			$keys[1] => $this->getCedpro(),
			$keys[2] => $this->getNompro(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhprocurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcur($value);
				break;
			case 1:
				$this->setCedpro($value);
				break;
			case 2:
				$this->setNompro($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhprocurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNompro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhprocurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhprocurPeer::CODCUR)) $criteria->add(RhprocurPeer::CODCUR, $this->codcur);
		if ($this->isColumnModified(RhprocurPeer::CEDPRO)) $criteria->add(RhprocurPeer::CEDPRO, $this->cedpro);
		if ($this->isColumnModified(RhprocurPeer::NOMPRO)) $criteria->add(RhprocurPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(RhprocurPeer::ID)) $criteria->add(RhprocurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhprocurPeer::DATABASE_NAME);

		$criteria->add(RhprocurPeer::ID, $this->id);

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

		$copyObj->setCodcur($this->codcur);

		$copyObj->setCedpro($this->cedpro);

		$copyObj->setNompro($this->nompro);


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
			self::$peer = new RhprocurPeer();
		}
		return self::$peer;
	}

} 