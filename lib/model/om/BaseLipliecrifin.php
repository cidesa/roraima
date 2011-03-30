<?php


abstract class BaseLipliecrifin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codcri;


	
	protected $puntua;


	
	protected $porcen;


	
	protected $limit;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodcri()
  {

    return trim($this->codcri);

  }
  
  public function getPuntua($val=false)
  {

    if($val) return number_format($this->puntua,2,',','.');
    else return $this->puntua;

  }
  
  public function getPorcen($val=false)
  {

    if($val) return number_format($this->porcen,2,',','.');
    else return $this->porcen;

  }
  
  public function getLimit()
  {

    return trim($this->limit);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LipliecrifinPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LipliecrifinPeer::NUMEXP;
      }
  
	} 
	
	public function setCodcri($v)
	{

    if ($this->codcri !== $v) {
        $this->codcri = $v;
        $this->modifiedColumns[] = LipliecrifinPeer::CODCRI;
      }
  
	} 
	
	public function setPuntua($v)
	{

    if ($this->puntua !== $v) {
        $this->puntua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LipliecrifinPeer::PUNTUA;
      }
  
	} 
	
	public function setPorcen($v)
	{

    if ($this->porcen !== $v) {
        $this->porcen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LipliecrifinPeer::PORCEN;
      }
  
	} 
	
	public function setLimit($v)
	{

    if ($this->limit !== $v) {
        $this->limit = $v;
        $this->modifiedColumns[] = LipliecrifinPeer::LIMIT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LipliecrifinPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->codcri = $rs->getString($startcol + 2);

      $this->puntua = $rs->getFloat($startcol + 3);

      $this->porcen = $rs->getFloat($startcol + 4);

      $this->limit = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lipliecrifin object", $e);
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
			$con = Propel::getConnection(LipliecrifinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LipliecrifinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LipliecrifinPeer::DATABASE_NAME);
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
					$pk = LipliecrifinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LipliecrifinPeer::doUpdate($this, $con);
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


			if (($retval = LipliecrifinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliecrifinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getCodcri();
				break;
			case 3:
				return $this->getPuntua();
				break;
			case 4:
				return $this->getPorcen();
				break;
			case 5:
				return $this->getLimit();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliecrifinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getCodcri(),
			$keys[3] => $this->getPuntua(),
			$keys[4] => $this->getPorcen(),
			$keys[5] => $this->getLimit(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliecrifinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setCodcri($value);
				break;
			case 3:
				$this->setPuntua($value);
				break;
			case 4:
				$this->setPorcen($value);
				break;
			case 5:
				$this->setLimit($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliecrifinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPuntua($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorcen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLimit($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LipliecrifinPeer::DATABASE_NAME);

		if ($this->isColumnModified(LipliecrifinPeer::NUMPLIE)) $criteria->add(LipliecrifinPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LipliecrifinPeer::NUMEXP)) $criteria->add(LipliecrifinPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LipliecrifinPeer::CODCRI)) $criteria->add(LipliecrifinPeer::CODCRI, $this->codcri);
		if ($this->isColumnModified(LipliecrifinPeer::PUNTUA)) $criteria->add(LipliecrifinPeer::PUNTUA, $this->puntua);
		if ($this->isColumnModified(LipliecrifinPeer::PORCEN)) $criteria->add(LipliecrifinPeer::PORCEN, $this->porcen);
		if ($this->isColumnModified(LipliecrifinPeer::LIMIT)) $criteria->add(LipliecrifinPeer::LIMIT, $this->limit);
		if ($this->isColumnModified(LipliecrifinPeer::ID)) $criteria->add(LipliecrifinPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LipliecrifinPeer::DATABASE_NAME);

		$criteria->add(LipliecrifinPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodcri($this->codcri);

		$copyObj->setPuntua($this->puntua);

		$copyObj->setPorcen($this->porcen);

		$copyObj->setLimit($this->limit);


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
			self::$peer = new LipliecrifinPeer();
		}
		return self::$peer;
	}

} 