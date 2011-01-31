<?php


abstract class BaseNptippre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $tippre;


	
	protected $codtippre;


	
	protected $destippre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getTippre()
  {

    return trim($this->tippre);

  }
  
  public function getCodtippre()
  {

    return trim($this->codtippre);

  }
  
  public function getDestippre()
  {

    return trim($this->destippre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NptipprePeer::CODCON;
      }
  
	} 
	
	public function setTippre($v)
	{

    if ($this->tippre !== $v) {
        $this->tippre = $v;
        $this->modifiedColumns[] = NptipprePeer::TIPPRE;
      }
  
	} 
	
	public function setCodtippre($v)
	{

    if ($this->codtippre !== $v) {
        $this->codtippre = $v;
        $this->modifiedColumns[] = NptipprePeer::CODTIPPRE;
      }
  
	} 
	
	public function setDestippre($v)
	{

    if ($this->destippre !== $v) {
        $this->destippre = $v;
        $this->modifiedColumns[] = NptipprePeer::DESTIPPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NptipprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->tippre = $rs->getString($startcol + 1);

      $this->codtippre = $rs->getString($startcol + 2);

      $this->destippre = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nptippre object", $e);
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
			$con = Propel::getConnection(NptipprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptipprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptipprePeer::DATABASE_NAME);
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
					$pk = NptipprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NptipprePeer::doUpdate($this, $con);
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


			if (($retval = NptipprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getTippre();
				break;
			case 2:
				return $this->getCodtippre();
				break;
			case 3:
				return $this->getDestippre();
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
		$keys = NptipprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getTippre(),
			$keys[2] => $this->getCodtippre(),
			$keys[3] => $this->getDestippre(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setTippre($value);
				break;
			case 2:
				$this->setCodtippre($value);
				break;
			case 3:
				$this->setDestippre($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptipprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTippre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtippre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDestippre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptipprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NptipprePeer::CODCON)) $criteria->add(NptipprePeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NptipprePeer::TIPPRE)) $criteria->add(NptipprePeer::TIPPRE, $this->tippre);
		if ($this->isColumnModified(NptipprePeer::CODTIPPRE)) $criteria->add(NptipprePeer::CODTIPPRE, $this->codtippre);
		if ($this->isColumnModified(NptipprePeer::DESTIPPRE)) $criteria->add(NptipprePeer::DESTIPPRE, $this->destippre);
		if ($this->isColumnModified(NptipprePeer::ID)) $criteria->add(NptipprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptipprePeer::DATABASE_NAME);

		$criteria->add(NptipprePeer::ID, $this->id);

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

		$copyObj->setTippre($this->tippre);

		$copyObj->setCodtippre($this->codtippre);

		$copyObj->setDestippre($this->destippre);


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
			self::$peer = new NptipprePeer();
		}
		return self::$peer;
	}

} 