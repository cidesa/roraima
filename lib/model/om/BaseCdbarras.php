<?php


abstract class BaseCdbarras extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codigv;


	
	protected $codbar;


	
	protected $descri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodigv()
  {

    return trim($this->codigv);

  }
  
  public function getCodbar()
  {

    return trim($this->codbar);

  }
  
  public function getDescri()
  {

    return trim($this->descri);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodigv($v)
	{

    if ($this->codigv !== $v) {
        $this->codigv = $v;
        $this->modifiedColumns[] = CdbarrasPeer::CODIGV;
      }
  
	} 
	
	public function setCodbar($v)
	{

    if ($this->codbar !== $v) {
        $this->codbar = $v;
        $this->modifiedColumns[] = CdbarrasPeer::CODBAR;
      }
  
	} 
	
	public function setDescri($v)
	{

    if ($this->descri !== $v) {
        $this->descri = $v;
        $this->modifiedColumns[] = CdbarrasPeer::DESCRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CdbarrasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codigv = $rs->getString($startcol + 0);

      $this->codbar = $rs->getString($startcol + 1);

      $this->descri = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cdbarras object", $e);
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
			$con = Propel::getConnection(CdbarrasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CdbarrasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CdbarrasPeer::DATABASE_NAME);
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
					$pk = CdbarrasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CdbarrasPeer::doUpdate($this, $con);
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


			if (($retval = CdbarrasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CdbarrasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodigv();
				break;
			case 1:
				return $this->getCodbar();
				break;
			case 2:
				return $this->getDescri();
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
		$keys = CdbarrasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodigv(),
			$keys[1] => $this->getCodbar(),
			$keys[2] => $this->getDescri(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CdbarrasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodigv($value);
				break;
			case 1:
				$this->setCodbar($value);
				break;
			case 2:
				$this->setDescri($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CdbarrasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodigv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodbar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CdbarrasPeer::DATABASE_NAME);

		if ($this->isColumnModified(CdbarrasPeer::CODIGV)) $criteria->add(CdbarrasPeer::CODIGV, $this->codigv);
		if ($this->isColumnModified(CdbarrasPeer::CODBAR)) $criteria->add(CdbarrasPeer::CODBAR, $this->codbar);
		if ($this->isColumnModified(CdbarrasPeer::DESCRI)) $criteria->add(CdbarrasPeer::DESCRI, $this->descri);
		if ($this->isColumnModified(CdbarrasPeer::ID)) $criteria->add(CdbarrasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CdbarrasPeer::DATABASE_NAME);

		$criteria->add(CdbarrasPeer::ID, $this->id);

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

		$copyObj->setCodigv($this->codigv);

		$copyObj->setCodbar($this->codbar);

		$copyObj->setDescri($this->descri);


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
			self::$peer = new CdbarrasPeer();
		}
		return self::$peer;
	}

} 