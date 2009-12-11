<?php


abstract class BaseApernueper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomtab;


	
	protected $orden;


	
	protected $codmod;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNomtab()
  {

    return trim($this->nomtab);

  }
  
  public function getOrden()
  {

    return $this->orden;

  }
  
  public function getCodmod()
  {

    return trim($this->codmod);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNomtab($v)
	{

    if ($this->nomtab !== $v) {
        $this->nomtab = $v;
        $this->modifiedColumns[] = ApernueperPeer::NOMTAB;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = ApernueperPeer::ORDEN;
      }
  
	} 
	
	public function setCodmod($v)
	{

    if ($this->codmod !== $v) {
        $this->codmod = $v;
        $this->modifiedColumns[] = ApernueperPeer::CODMOD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ApernueperPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nomtab = $rs->getString($startcol + 0);

      $this->orden = $rs->getInt($startcol + 1);

      $this->codmod = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Apernueper object", $e);
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
			$con = Propel::getConnection(ApernueperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ApernueperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ApernueperPeer::DATABASE_NAME);
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
					$pk = ApernueperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ApernueperPeer::doUpdate($this, $con);
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


			if (($retval = ApernueperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ApernueperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomtab();
				break;
			case 1:
				return $this->getOrden();
				break;
			case 2:
				return $this->getCodmod();
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
		$keys = ApernueperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomtab(),
			$keys[1] => $this->getOrden(),
			$keys[2] => $this->getCodmod(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ApernueperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomtab($value);
				break;
			case 1:
				$this->setOrden($value);
				break;
			case 2:
				$this->setCodmod($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ApernueperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomtab($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrden($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ApernueperPeer::DATABASE_NAME);

		if ($this->isColumnModified(ApernueperPeer::NOMTAB)) $criteria->add(ApernueperPeer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(ApernueperPeer::ORDEN)) $criteria->add(ApernueperPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(ApernueperPeer::CODMOD)) $criteria->add(ApernueperPeer::CODMOD, $this->codmod);
		if ($this->isColumnModified(ApernueperPeer::ID)) $criteria->add(ApernueperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ApernueperPeer::DATABASE_NAME);

		$criteria->add(ApernueperPeer::ID, $this->id);

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

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setOrden($this->orden);

		$copyObj->setCodmod($this->codmod);


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
			self::$peer = new ApernueperPeer();
		}
		return self::$peer;
	}

} 