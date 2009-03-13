<?php


abstract class BaseForunieje extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduni;


	
	protected $codniv;


	
	protected $nomuni;


	
	protected $codemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getNomuni()
  {

    return trim($this->nomuni);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = ForuniejePeer::CODUNI;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = ForuniejePeer::CODNIV;
      }
  
	} 
	
	public function setNomuni($v)
	{

    if ($this->nomuni !== $v) {
        $this->nomuni = $v;
        $this->modifiedColumns[] = ForuniejePeer::NOMUNI;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = ForuniejePeer::CODEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForuniejePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduni = $rs->getString($startcol + 0);

      $this->codniv = $rs->getString($startcol + 1);

      $this->nomuni = $rs->getString($startcol + 2);

      $this->codemp = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forunieje object", $e);
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
			$con = Propel::getConnection(ForuniejePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForuniejePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForuniejePeer::DATABASE_NAME);
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
					$pk = ForuniejePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForuniejePeer::doUpdate($this, $con);
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


			if (($retval = ForuniejePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForuniejePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduni();
				break;
			case 1:
				return $this->getCodniv();
				break;
			case 2:
				return $this->getNomuni();
				break;
			case 3:
				return $this->getCodemp();
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
		$keys = ForuniejePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduni(),
			$keys[1] => $this->getCodniv(),
			$keys[2] => $this->getNomuni(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForuniejePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduni($value);
				break;
			case 1:
				$this->setCodniv($value);
				break;
			case 2:
				$this->setNomuni($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForuniejePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomuni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForuniejePeer::DATABASE_NAME);

		if ($this->isColumnModified(ForuniejePeer::CODUNI)) $criteria->add(ForuniejePeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(ForuniejePeer::CODNIV)) $criteria->add(ForuniejePeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(ForuniejePeer::NOMUNI)) $criteria->add(ForuniejePeer::NOMUNI, $this->nomuni);
		if ($this->isColumnModified(ForuniejePeer::CODEMP)) $criteria->add(ForuniejePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ForuniejePeer::ID)) $criteria->add(ForuniejePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForuniejePeer::DATABASE_NAME);

		$criteria->add(ForuniejePeer::ID, $this->id);

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

		$copyObj->setCoduni($this->coduni);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setNomuni($this->nomuni);

		$copyObj->setCodemp($this->codemp);


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
			self::$peer = new ForuniejePeer();
		}
		return self::$peer;
	}

} 