<?php


abstract class BaseRhdefdetran extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codran;


	
	protected $valran;


	
	protected $desdet;


	
	protected $valdes;


	
	protected $valhas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodran()
  {

    return trim($this->codran);

  }
  
  public function getValran($val=false)
  {

    if($val) return number_format($this->valran,2,',','.');
    else return $this->valran;

  }
  
  public function getDesdet()
  {

    return trim($this->desdet);

  }
  
  public function getValdes($val=false)
  {

    if($val) return number_format($this->valdes,2,',','.');
    else return $this->valdes;

  }
  
  public function getValhas($val=false)
  {

    if($val) return number_format($this->valhas,2,',','.');
    else return $this->valhas;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodran($v)
	{

    if ($this->codran !== $v) {
        $this->codran = $v;
        $this->modifiedColumns[] = RhdefdetranPeer::CODRAN;
      }
  
	} 
	
	public function setValran($v)
	{

    if ($this->valran !== $v) {
        $this->valran = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhdefdetranPeer::VALRAN;
      }
  
	} 
	
	public function setDesdet($v)
	{

    if ($this->desdet !== $v) {
        $this->desdet = $v;
        $this->modifiedColumns[] = RhdefdetranPeer::DESDET;
      }
  
	} 
	
	public function setValdes($v)
	{

    if ($this->valdes !== $v) {
        $this->valdes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhdefdetranPeer::VALDES;
      }
  
	} 
	
	public function setValhas($v)
	{

    if ($this->valhas !== $v) {
        $this->valhas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = RhdefdetranPeer::VALHAS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhdefdetranPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codran = $rs->getString($startcol + 0);

      $this->valran = $rs->getFloat($startcol + 1);

      $this->desdet = $rs->getString($startcol + 2);

      $this->valdes = $rs->getFloat($startcol + 3);

      $this->valhas = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhdefdetran object", $e);
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
			$con = Propel::getConnection(RhdefdetranPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdefdetranPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdefdetranPeer::DATABASE_NAME);
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
					$pk = RhdefdetranPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhdefdetranPeer::doUpdate($this, $con);
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


			if (($retval = RhdefdetranPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefdetranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodran();
				break;
			case 1:
				return $this->getValran();
				break;
			case 2:
				return $this->getDesdet();
				break;
			case 3:
				return $this->getValdes();
				break;
			case 4:
				return $this->getValhas();
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
		$keys = RhdefdetranPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodran(),
			$keys[1] => $this->getValran(),
			$keys[2] => $this->getDesdet(),
			$keys[3] => $this->getValdes(),
			$keys[4] => $this->getValhas(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdefdetranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodran($value);
				break;
			case 1:
				$this->setValran($value);
				break;
			case 2:
				$this->setDesdet($value);
				break;
			case 3:
				$this->setValdes($value);
				break;
			case 4:
				$this->setValhas($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdefdetranPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodran($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setValran($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesdet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValhas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdefdetranPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdefdetranPeer::CODRAN)) $criteria->add(RhdefdetranPeer::CODRAN, $this->codran);
		if ($this->isColumnModified(RhdefdetranPeer::VALRAN)) $criteria->add(RhdefdetranPeer::VALRAN, $this->valran);
		if ($this->isColumnModified(RhdefdetranPeer::DESDET)) $criteria->add(RhdefdetranPeer::DESDET, $this->desdet);
		if ($this->isColumnModified(RhdefdetranPeer::VALDES)) $criteria->add(RhdefdetranPeer::VALDES, $this->valdes);
		if ($this->isColumnModified(RhdefdetranPeer::VALHAS)) $criteria->add(RhdefdetranPeer::VALHAS, $this->valhas);
		if ($this->isColumnModified(RhdefdetranPeer::ID)) $criteria->add(RhdefdetranPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdefdetranPeer::DATABASE_NAME);

		$criteria->add(RhdefdetranPeer::ID, $this->id);

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

		$copyObj->setCodran($this->codran);

		$copyObj->setValran($this->valran);

		$copyObj->setDesdet($this->desdet);

		$copyObj->setValdes($this->valdes);

		$copyObj->setValhas($this->valhas);


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
			self::$peer = new RhdefdetranPeer();
		}
		return self::$peer;
	}

} 