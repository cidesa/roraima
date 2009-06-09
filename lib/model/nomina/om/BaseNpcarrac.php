<?php


abstract class BaseNpcarrac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcarrac;


	
	protected $codnivorg;


	
	protected $sueldo;


	
	protected $descar;


	
	protected $cancar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcarrac()
  {

    return trim($this->codcarrac);

  }
  
  public function getCodnivorg()
  {

    return trim($this->codnivorg);

  }
  
  public function getSueldo($val=false)
  {

    if($val) return number_format($this->sueldo,2,',','.');
    else return $this->sueldo;

  }
  
  public function getDescar()
  {

    return trim($this->descar);

  }
  
  public function getCancar($val=false)
  {

    if($val) return number_format($this->cancar,2,',','.');
    else return $this->cancar;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcarrac($v)
	{

    if ($this->codcarrac !== $v) {
        $this->codcarrac = $v;
        $this->modifiedColumns[] = NpcarracPeer::CODCARRAC;
      }
  
	} 
	
	public function setCodnivorg($v)
	{

    if ($this->codnivorg !== $v) {
        $this->codnivorg = $v;
        $this->modifiedColumns[] = NpcarracPeer::CODNIVORG;
      }
  
	} 
	
	public function setSueldo($v)
	{

    if ($this->sueldo !== $v) {
        $this->sueldo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarracPeer::SUELDO;
      }
  
	} 
	
	public function setDescar($v)
	{

    if ($this->descar !== $v) {
        $this->descar = $v;
        $this->modifiedColumns[] = NpcarracPeer::DESCAR;
      }
  
	} 
	
	public function setCancar($v)
	{

    if ($this->cancar !== $v) {
        $this->cancar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarracPeer::CANCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcarracPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcarrac = $rs->getString($startcol + 0);

      $this->codnivorg = $rs->getString($startcol + 1);

      $this->sueldo = $rs->getFloat($startcol + 2);

      $this->descar = $rs->getString($startcol + 3);

      $this->cancar = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcarrac object", $e);
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
			$con = Propel::getConnection(NpcarracPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcarracPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcarracPeer::DATABASE_NAME);
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
					$pk = NpcarracPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcarracPeer::doUpdate($this, $con);
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


			if (($retval = NpcarracPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcarracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcarrac();
				break;
			case 1:
				return $this->getCodnivorg();
				break;
			case 2:
				return $this->getSueldo();
				break;
			case 3:
				return $this->getDescar();
				break;
			case 4:
				return $this->getCancar();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcarracPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcarrac(),
			$keys[1] => $this->getCodnivorg(),
			$keys[2] => $this->getSueldo(),
			$keys[3] => $this->getDescar(),
			$keys[4] => $this->getCancar(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcarracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcarrac($value);
				break;
			case 1:
				$this->setCodnivorg($value);
				break;
			case 2:
				$this->setSueldo($value);
				break;
			case 3:
				$this->setDescar($value);
				break;
			case 4:
				$this->setCancar($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcarracPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcarrac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnivorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSueldo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCancar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcarracPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcarracPeer::CODCARRAC)) $criteria->add(NpcarracPeer::CODCARRAC, $this->codcarrac);
		if ($this->isColumnModified(NpcarracPeer::CODNIVORG)) $criteria->add(NpcarracPeer::CODNIVORG, $this->codnivorg);
		if ($this->isColumnModified(NpcarracPeer::SUELDO)) $criteria->add(NpcarracPeer::SUELDO, $this->sueldo);
		if ($this->isColumnModified(NpcarracPeer::DESCAR)) $criteria->add(NpcarracPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(NpcarracPeer::CANCAR)) $criteria->add(NpcarracPeer::CANCAR, $this->cancar);
		if ($this->isColumnModified(NpcarracPeer::ID)) $criteria->add(NpcarracPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcarracPeer::DATABASE_NAME);

		$criteria->add(NpcarracPeer::ID, $this->id);

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

		$copyObj->setCodcarrac($this->codcarrac);

		$copyObj->setCodnivorg($this->codnivorg);

		$copyObj->setSueldo($this->sueldo);

		$copyObj->setDescar($this->descar);

		$copyObj->setCancar($this->cancar);


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
			self::$peer = new NpcarracPeer();
		}
		return self::$peer;
	}

} 