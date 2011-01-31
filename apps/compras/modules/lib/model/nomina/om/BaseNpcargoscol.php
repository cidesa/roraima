<?php


abstract class BaseNpcargoscol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcarcol;


	
	protected $descarcol;


	
	protected $prima;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcarcol()
  {

    return trim($this->codcarcol);

  }
  
  public function getDescarcol()
  {

    return trim($this->descarcol);

  }
  
  public function getPrima($val=false)
  {

    if($val) return number_format($this->prima,2,',','.');
    else return $this->prima;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcarcol($v)
	{

    if ($this->codcarcol !== $v) {
        $this->codcarcol = $v;
        $this->modifiedColumns[] = NpcargoscolPeer::CODCARCOL;
      }
  
	} 
	
	public function setDescarcol($v)
	{

    if ($this->descarcol !== $v) {
        $this->descarcol = $v;
        $this->modifiedColumns[] = NpcargoscolPeer::DESCARCOL;
      }
  
	} 
	
	public function setPrima($v)
	{

    if ($this->prima !== $v) {
        $this->prima = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcargoscolPeer::PRIMA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcargoscolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcarcol = $rs->getString($startcol + 0);

      $this->descarcol = $rs->getString($startcol + 1);

      $this->prima = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcargoscol object", $e);
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
			$con = Propel::getConnection(NpcargoscolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcargoscolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcargoscolPeer::DATABASE_NAME);
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
					$pk = NpcargoscolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcargoscolPeer::doUpdate($this, $con);
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


			if (($retval = NpcargoscolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargoscolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcarcol();
				break;
			case 1:
				return $this->getDescarcol();
				break;
			case 2:
				return $this->getPrima();
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
		$keys = NpcargoscolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcarcol(),
			$keys[1] => $this->getDescarcol(),
			$keys[2] => $this->getPrima(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargoscolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcarcol($value);
				break;
			case 1:
				$this->setDescarcol($value);
				break;
			case 2:
				$this->setPrima($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargoscolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcarcol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescarcol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrima($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcargoscolPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcargoscolPeer::CODCARCOL)) $criteria->add(NpcargoscolPeer::CODCARCOL, $this->codcarcol);
		if ($this->isColumnModified(NpcargoscolPeer::DESCARCOL)) $criteria->add(NpcargoscolPeer::DESCARCOL, $this->descarcol);
		if ($this->isColumnModified(NpcargoscolPeer::PRIMA)) $criteria->add(NpcargoscolPeer::PRIMA, $this->prima);
		if ($this->isColumnModified(NpcargoscolPeer::ID)) $criteria->add(NpcargoscolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcargoscolPeer::DATABASE_NAME);

		$criteria->add(NpcargoscolPeer::ID, $this->id);

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

		$copyObj->setCodcarcol($this->codcarcol);

		$copyObj->setDescarcol($this->descarcol);

		$copyObj->setPrima($this->prima);


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
			self::$peer = new NpcargoscolPeer();
		}
		return self::$peer;
	}

} 