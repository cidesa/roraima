<?php


abstract class BaseFatipmov extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desmov;


	
	protected $nomabr;


	
	protected $debcre;


	
	protected $codcta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesmov()
  {

    return trim($this->desmov);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getDebcre()
  {

    return trim($this->debcre);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesmov($v)
	{

    if ($this->desmov !== $v) {
        $this->desmov = $v;
        $this->modifiedColumns[] = FatipmovPeer::DESMOV;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = FatipmovPeer::NOMABR;
      }
  
	} 
	
	public function setDebcre($v)
	{

    if ($this->debcre !== $v) {
        $this->debcre = $v;
        $this->modifiedColumns[] = FatipmovPeer::DEBCRE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = FatipmovPeer::CODCTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FatipmovPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desmov = $rs->getString($startcol + 0);

      $this->nomabr = $rs->getString($startcol + 1);

      $this->debcre = $rs->getString($startcol + 2);

      $this->codcta = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fatipmov object", $e);
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
			$con = Propel::getConnection(FatipmovPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatipmovPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatipmovPeer::DATABASE_NAME);
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
					$pk = FatipmovPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FatipmovPeer::doUpdate($this, $con);
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


			if (($retval = FatipmovPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatipmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesmov();
				break;
			case 1:
				return $this->getNomabr();
				break;
			case 2:
				return $this->getDebcre();
				break;
			case 3:
				return $this->getCodcta();
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
		$keys = FatipmovPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesmov(),
			$keys[1] => $this->getNomabr(),
			$keys[2] => $this->getDebcre(),
			$keys[3] => $this->getCodcta(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatipmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesmov($value);
				break;
			case 1:
				$this->setNomabr($value);
				break;
			case 2:
				$this->setDebcre($value);
				break;
			case 3:
				$this->setCodcta($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatipmovPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesmov($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomabr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDebcre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatipmovPeer::DATABASE_NAME);

		if ($this->isColumnModified(FatipmovPeer::DESMOV)) $criteria->add(FatipmovPeer::DESMOV, $this->desmov);
		if ($this->isColumnModified(FatipmovPeer::NOMABR)) $criteria->add(FatipmovPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(FatipmovPeer::DEBCRE)) $criteria->add(FatipmovPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(FatipmovPeer::CODCTA)) $criteria->add(FatipmovPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(FatipmovPeer::ID)) $criteria->add(FatipmovPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatipmovPeer::DATABASE_NAME);

		$criteria->add(FatipmovPeer::ID, $this->id);

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

		$copyObj->setDesmov($this->desmov);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setCodcta($this->codcta);


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
			self::$peer = new FatipmovPeer();
		}
		return self::$peer;
	}

} 