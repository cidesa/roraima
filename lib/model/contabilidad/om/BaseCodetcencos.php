<?php


abstract class BaseCodetcencos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcom;


	
	protected $codcta;


	
	protected $codcencos;


	
	protected $moncencos;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getCodcencos()
  {

    return trim($this->codcencos);

  }
  
  public function getMoncencos($val=false)
  {

    if($val) return number_format($this->moncencos,2,',','.');
    else return $this->moncencos;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CodetcencosPeer::NUMCOM;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CodetcencosPeer::CODCTA;
      }
  
	} 
	
	public function setCodcencos($v)
	{

    if ($this->codcencos !== $v) {
        $this->codcencos = $v;
        $this->modifiedColumns[] = CodetcencosPeer::CODCENCOS;
      }
  
	} 
	
	public function setMoncencos($v)
	{

    if ($this->moncencos !== $v) {
        $this->moncencos = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CodetcencosPeer::MONCENCOS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CodetcencosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcom = $rs->getString($startcol + 0);

      $this->codcta = $rs->getString($startcol + 1);

      $this->codcencos = $rs->getString($startcol + 2);

      $this->moncencos = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Codetcencos object", $e);
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
			$con = Propel::getConnection(CodetcencosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CodetcencosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CodetcencosPeer::DATABASE_NAME);
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
					$pk = CodetcencosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CodetcencosPeer::doUpdate($this, $con);
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


			if (($retval = CodetcencosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CodetcencosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcom();
				break;
			case 1:
				return $this->getCodcta();
				break;
			case 2:
				return $this->getCodcencos();
				break;
			case 3:
				return $this->getMoncencos();
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
		$keys = CodetcencosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcom(),
			$keys[1] => $this->getCodcta(),
			$keys[2] => $this->getCodcencos(),
			$keys[3] => $this->getMoncencos(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CodetcencosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcom($value);
				break;
			case 1:
				$this->setCodcta($value);
				break;
			case 2:
				$this->setCodcencos($value);
				break;
			case 3:
				$this->setMoncencos($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CodetcencosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcencos($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncencos($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CodetcencosPeer::DATABASE_NAME);

		if ($this->isColumnModified(CodetcencosPeer::NUMCOM)) $criteria->add(CodetcencosPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CodetcencosPeer::CODCTA)) $criteria->add(CodetcencosPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CodetcencosPeer::CODCENCOS)) $criteria->add(CodetcencosPeer::CODCENCOS, $this->codcencos);
		if ($this->isColumnModified(CodetcencosPeer::MONCENCOS)) $criteria->add(CodetcencosPeer::MONCENCOS, $this->moncencos);
		if ($this->isColumnModified(CodetcencosPeer::ID)) $criteria->add(CodetcencosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CodetcencosPeer::DATABASE_NAME);

		$criteria->add(CodetcencosPeer::ID, $this->id);

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

		$copyObj->setNumcom($this->numcom);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setCodcencos($this->codcencos);

		$copyObj->setMoncencos($this->moncencos);


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
			self::$peer = new CodetcencosPeer();
		}
		return self::$peer;
	}

} 