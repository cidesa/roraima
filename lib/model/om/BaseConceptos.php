<?php


abstract class BaseConceptos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $nomcon;


	
	protected $afecon;


	
	protected $codpar;


	
	protected $frecon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getAfecon()
  {

    return trim($this->afecon);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getFrecon()
  {

    return trim($this->frecon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = ConceptosPeer::CODCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = ConceptosPeer::NOMCON;
      }
  
	} 
	
	public function setAfecon($v)
	{

    if ($this->afecon !== $v) {
        $this->afecon = $v;
        $this->modifiedColumns[] = ConceptosPeer::AFECON;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ConceptosPeer::CODPAR;
      }
  
	} 
	
	public function setFrecon($v)
	{

    if ($this->frecon !== $v) {
        $this->frecon = $v;
        $this->modifiedColumns[] = ConceptosPeer::FRECON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ConceptosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->nomcon = $rs->getString($startcol + 1);

      $this->afecon = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->frecon = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Conceptos object", $e);
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
			$con = Propel::getConnection(ConceptosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ConceptosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ConceptosPeer::DATABASE_NAME);
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
					$pk = ConceptosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ConceptosPeer::doUpdate($this, $con);
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


			if (($retval = ConceptosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConceptosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNomcon();
				break;
			case 2:
				return $this->getAfecon();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getFrecon();
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
		$keys = ConceptosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNomcon(),
			$keys[2] => $this->getAfecon(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getFrecon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ConceptosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNomcon($value);
				break;
			case 2:
				$this->setAfecon($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setFrecon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ConceptosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAfecon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFrecon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ConceptosPeer::DATABASE_NAME);

		if ($this->isColumnModified(ConceptosPeer::CODCON)) $criteria->add(ConceptosPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(ConceptosPeer::NOMCON)) $criteria->add(ConceptosPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(ConceptosPeer::AFECON)) $criteria->add(ConceptosPeer::AFECON, $this->afecon);
		if ($this->isColumnModified(ConceptosPeer::CODPAR)) $criteria->add(ConceptosPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ConceptosPeer::FRECON)) $criteria->add(ConceptosPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(ConceptosPeer::ID)) $criteria->add(ConceptosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ConceptosPeer::DATABASE_NAME);

		$criteria->add(ConceptosPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setAfecon($this->afecon);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setFrecon($this->frecon);


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
			self::$peer = new ConceptosPeer();
		}
		return self::$peer;
	}

} 