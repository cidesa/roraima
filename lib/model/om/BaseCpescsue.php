<?php


abstract class BaseCpescsue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codesc;


	
	protected $valini;


	
	protected $valfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodesc()
  {

    return trim($this->codesc);

  }
  
  public function getValini($val=false)
  {

    if($val) return number_format($this->valini,2,',','.');
    else return $this->valini;

  }
  
  public function getValfin($val=false)
  {

    if($val) return number_format($this->valfin,2,',','.');
    else return $this->valfin;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodesc($v)
	{

    if ($this->codesc !== $v) {
        $this->codesc = $v;
        $this->modifiedColumns[] = CpescsuePeer::CODESC;
      }
  
	} 
	
	public function setValini($v)
	{

    if ($this->valini !== $v) {
        $this->valini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpescsuePeer::VALINI;
      }
  
	} 
	
	public function setValfin($v)
	{

    if ($this->valfin !== $v) {
        $this->valfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpescsuePeer::VALFIN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpescsuePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codesc = $rs->getString($startcol + 0);

      $this->valini = $rs->getFloat($startcol + 1);

      $this->valfin = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpescsue object", $e);
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
			$con = Propel::getConnection(CpescsuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpescsuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpescsuePeer::DATABASE_NAME);
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
					$pk = CpescsuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpescsuePeer::doUpdate($this, $con);
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


			if (($retval = CpescsuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpescsuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodesc();
				break;
			case 1:
				return $this->getValini();
				break;
			case 2:
				return $this->getValfin();
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
		$keys = CpescsuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodesc(),
			$keys[1] => $this->getValini(),
			$keys[2] => $this->getValfin(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpescsuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodesc($value);
				break;
			case 1:
				$this->setValini($value);
				break;
			case 2:
				$this->setValfin($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpescsuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodesc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setValini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpescsuePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpescsuePeer::CODESC)) $criteria->add(CpescsuePeer::CODESC, $this->codesc);
		if ($this->isColumnModified(CpescsuePeer::VALINI)) $criteria->add(CpescsuePeer::VALINI, $this->valini);
		if ($this->isColumnModified(CpescsuePeer::VALFIN)) $criteria->add(CpescsuePeer::VALFIN, $this->valfin);
		if ($this->isColumnModified(CpescsuePeer::ID)) $criteria->add(CpescsuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpescsuePeer::DATABASE_NAME);

		$criteria->add(CpescsuePeer::ID, $this->id);

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

		$copyObj->setCodesc($this->codesc);

		$copyObj->setValini($this->valini);

		$copyObj->setValfin($this->valfin);


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
			self::$peer = new CpescsuePeer();
		}
		return self::$peer;
	}

} 