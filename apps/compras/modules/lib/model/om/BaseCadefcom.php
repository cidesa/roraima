<?php


abstract class BaseCadefcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $numcon;


	
	protected $nroini;


	
	protected $afeuni;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getNumcon()
  {

    return trim($this->numcon);

  }
  
  public function getNroini()
  {

    return trim($this->nroini);

  }
  
  public function getAfeuni()
  {

    return trim($this->afeuni);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CadefcomPeer::CODCAT;
      }
  
	} 
	
	public function setNumcon($v)
	{

    if ($this->numcon !== $v) {
        $this->numcon = $v;
        $this->modifiedColumns[] = CadefcomPeer::NUMCON;
      }
  
	} 
	
	public function setNroini($v)
	{

    if ($this->nroini !== $v) {
        $this->nroini = $v;
        $this->modifiedColumns[] = CadefcomPeer::NROINI;
      }
  
	} 
	
	public function setAfeuni($v)
	{

    if ($this->afeuni !== $v) {
        $this->afeuni = $v;
        $this->modifiedColumns[] = CadefcomPeer::AFEUNI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->numcon = $rs->getString($startcol + 1);

      $this->nroini = $rs->getString($startcol + 2);

      $this->afeuni = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefcom object", $e);
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
			$con = Propel::getConnection(CadefcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefcomPeer::DATABASE_NAME);
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
					$pk = CadefcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CadefcomPeer::doUpdate($this, $con);
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


			if (($retval = CadefcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getNumcon();
				break;
			case 2:
				return $this->getNroini();
				break;
			case 3:
				return $this->getAfeuni();
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
		$keys = CadefcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getNumcon(),
			$keys[2] => $this->getNroini(),
			$keys[3] => $this->getAfeuni(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setNumcon($value);
				break;
			case 2:
				$this->setNroini($value);
				break;
			case 3:
				$this->setAfeuni($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNroini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAfeuni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefcomPeer::CODCAT)) $criteria->add(CadefcomPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CadefcomPeer::NUMCON)) $criteria->add(CadefcomPeer::NUMCON, $this->numcon);
		if ($this->isColumnModified(CadefcomPeer::NROINI)) $criteria->add(CadefcomPeer::NROINI, $this->nroini);
		if ($this->isColumnModified(CadefcomPeer::AFEUNI)) $criteria->add(CadefcomPeer::AFEUNI, $this->afeuni);
		if ($this->isColumnModified(CadefcomPeer::ID)) $criteria->add(CadefcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefcomPeer::DATABASE_NAME);

		$criteria->add(CadefcomPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setNumcon($this->numcon);

		$copyObj->setNroini($this->nroini);

		$copyObj->setAfeuni($this->afeuni);


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
			self::$peer = new CadefcomPeer();
		}
		return self::$peer;
	}

} 