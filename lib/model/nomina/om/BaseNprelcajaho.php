<?php


abstract class BaseNprelcajaho extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $conret;


	
	protected $conapo;


	
	protected $conpre;


	
	protected $conseg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getConret($val=false)
  {

    if($val) return number_format($this->conret,2,',','.');
    else return $this->conret;

  }
  
  public function getConapo($val=false)
  {

    if($val) return number_format($this->conapo,2,',','.');
    else return $this->conapo;

  }
  
  public function getConpre($val=false)
  {

    if($val) return number_format($this->conpre,2,',','.');
    else return $this->conpre;

  }
  
  public function getConseg($val=false)
  {

    if($val) return number_format($this->conseg,2,',','.');
    else return $this->conseg;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NprelcajahoPeer::CODEMP;
      }
  
	} 
	
	public function setConret($v)
	{

    if ($this->conret !== $v) {
        $this->conret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NprelcajahoPeer::CONRET;
      }
  
	} 
	
	public function setConapo($v)
	{

    if ($this->conapo !== $v) {
        $this->conapo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NprelcajahoPeer::CONAPO;
      }
  
	} 
	
	public function setConpre($v)
	{

    if ($this->conpre !== $v) {
        $this->conpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NprelcajahoPeer::CONPRE;
      }
  
	} 
	
	public function setConseg($v)
	{

    if ($this->conseg !== $v) {
        $this->conseg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NprelcajahoPeer::CONSEG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NprelcajahoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->conret = $rs->getFloat($startcol + 1);

      $this->conapo = $rs->getFloat($startcol + 2);

      $this->conpre = $rs->getFloat($startcol + 3);

      $this->conseg = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nprelcajaho object", $e);
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
			$con = Propel::getConnection(NprelcajahoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NprelcajahoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NprelcajahoPeer::DATABASE_NAME);
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
					$pk = NprelcajahoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NprelcajahoPeer::doUpdate($this, $con);
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


			if (($retval = NprelcajahoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NprelcajahoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getConret();
				break;
			case 2:
				return $this->getConapo();
				break;
			case 3:
				return $this->getConpre();
				break;
			case 4:
				return $this->getConseg();
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
		$keys = NprelcajahoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getConret(),
			$keys[2] => $this->getConapo(),
			$keys[3] => $this->getConpre(),
			$keys[4] => $this->getConseg(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NprelcajahoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setConret($value);
				break;
			case 2:
				$this->setConapo($value);
				break;
			case 3:
				$this->setConpre($value);
				break;
			case 4:
				$this->setConseg($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NprelcajahoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setConret($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setConapo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setConpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setConseg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NprelcajahoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NprelcajahoPeer::CODEMP)) $criteria->add(NprelcajahoPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NprelcajahoPeer::CONRET)) $criteria->add(NprelcajahoPeer::CONRET, $this->conret);
		if ($this->isColumnModified(NprelcajahoPeer::CONAPO)) $criteria->add(NprelcajahoPeer::CONAPO, $this->conapo);
		if ($this->isColumnModified(NprelcajahoPeer::CONPRE)) $criteria->add(NprelcajahoPeer::CONPRE, $this->conpre);
		if ($this->isColumnModified(NprelcajahoPeer::CONSEG)) $criteria->add(NprelcajahoPeer::CONSEG, $this->conseg);
		if ($this->isColumnModified(NprelcajahoPeer::ID)) $criteria->add(NprelcajahoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NprelcajahoPeer::DATABASE_NAME);

		$criteria->add(NprelcajahoPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setConret($this->conret);

		$copyObj->setConapo($this->conapo);

		$copyObj->setConpre($this->conpre);

		$copyObj->setConseg($this->conseg);


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
			self::$peer = new NprelcajahoPeer();
		}
		return self::$peer;
	}

} 