<?php


abstract class BaseFordefobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $nomobr;


	
	protected $codparegr;


	
	protected $obsobr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getNomobr()
  {

    return trim($this->nomobr);

  }
  
  public function getCodparegr()
  {

    return trim($this->codparegr);

  }
  
  public function getObsobr()
  {

    return trim($this->obsobr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = FordefobrPeer::CODOBR;
      }
  
	} 
	
	public function setNomobr($v)
	{

    if ($this->nomobr !== $v) {
        $this->nomobr = $v;
        $this->modifiedColumns[] = FordefobrPeer::NOMOBR;
      }
  
	} 
	
	public function setCodparegr($v)
	{

    if ($this->codparegr !== $v) {
        $this->codparegr = $v;
        $this->modifiedColumns[] = FordefobrPeer::CODPAREGR;
      }
  
	} 
	
	public function setObsobr($v)
	{

    if ($this->obsobr !== $v) {
        $this->obsobr = $v;
        $this->modifiedColumns[] = FordefobrPeer::OBSOBR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefobrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codobr = $rs->getString($startcol + 0);

      $this->nomobr = $rs->getString($startcol + 1);

      $this->codparegr = $rs->getString($startcol + 2);

      $this->obsobr = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefobr object", $e);
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
			$con = Propel::getConnection(FordefobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefobrPeer::DATABASE_NAME);
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
					$pk = FordefobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefobrPeer::doUpdate($this, $con);
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


			if (($retval = FordefobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getNomobr();
				break;
			case 2:
				return $this->getCodparegr();
				break;
			case 3:
				return $this->getObsobr();
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
		$keys = FordefobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getNomobr(),
			$keys[2] => $this->getCodparegr(),
			$keys[3] => $this->getObsobr(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setNomobr($value);
				break;
			case 2:
				$this->setCodparegr($value);
				break;
			case 3:
				$this->setObsobr($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodparegr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObsobr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefobrPeer::CODOBR)) $criteria->add(FordefobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(FordefobrPeer::NOMOBR)) $criteria->add(FordefobrPeer::NOMOBR, $this->nomobr);
		if ($this->isColumnModified(FordefobrPeer::CODPAREGR)) $criteria->add(FordefobrPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(FordefobrPeer::OBSOBR)) $criteria->add(FordefobrPeer::OBSOBR, $this->obsobr);
		if ($this->isColumnModified(FordefobrPeer::ID)) $criteria->add(FordefobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefobrPeer::DATABASE_NAME);

		$criteria->add(FordefobrPeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setNomobr($this->nomobr);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setObsobr($this->obsobr);


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
			self::$peer = new FordefobrPeer();
		}
		return self::$peer;
	}

} 