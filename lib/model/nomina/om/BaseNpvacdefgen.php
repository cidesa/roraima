<?php


abstract class BaseNpvacdefgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnomvac;


	
	protected $codconvac;


	
	protected $pagoad;


	
	protected $codconcom;


	
	protected $codconuti;


	
	protected $vacant;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnomvac()
  {

    return trim($this->codnomvac);

  }
  
  public function getCodconvac()
  {

    return trim($this->codconvac);

  }
  
  public function getPagoad()
  {

    return trim($this->pagoad);

  }
  
  public function getCodconcom()
  {

    return trim($this->codconcom);

  }
  
  public function getCodconuti()
  {

    return trim($this->codconuti);

  }
  
  public function getVacant()
  {

    return trim($this->vacant);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnomvac($v)
	{

    if ($this->codnomvac !== $v) {
        $this->codnomvac = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::CODNOMVAC;
      }
  
	} 
	
	public function setCodconvac($v)
	{

    if ($this->codconvac !== $v) {
        $this->codconvac = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::CODCONVAC;
      }
  
	} 
	
	public function setPagoad($v)
	{

    if ($this->pagoad !== $v) {
        $this->pagoad = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::PAGOAD;
      }
  
	} 
	
	public function setCodconcom($v)
	{

    if ($this->codconcom !== $v) {
        $this->codconcom = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::CODCONCOM;
      }
  
	} 
	
	public function setCodconuti($v)
	{

    if ($this->codconuti !== $v) {
        $this->codconuti = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::CODCONUTI;
      }
  
	} 
	
	public function setVacant($v)
	{

    if ($this->vacant !== $v) {
        $this->vacant = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::VACANT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpvacdefgenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnomvac = $rs->getString($startcol + 0);

      $this->codconvac = $rs->getString($startcol + 1);

      $this->pagoad = $rs->getString($startcol + 2);

      $this->codconcom = $rs->getString($startcol + 3);

      $this->codconuti = $rs->getString($startcol + 4);

      $this->vacant = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npvacdefgen object", $e);
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
			$con = Propel::getConnection(NpvacdefgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacdefgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacdefgenPeer::DATABASE_NAME);
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
					$pk = NpvacdefgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpvacdefgenPeer::doUpdate($this, $con);
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


			if (($retval = NpvacdefgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnomvac();
				break;
			case 1:
				return $this->getCodconvac();
				break;
			case 2:
				return $this->getPagoad();
				break;
			case 3:
				return $this->getCodconcom();
				break;
			case 4:
				return $this->getCodconuti();
				break;
			case 5:
				return $this->getVacant();
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
		$keys = NpvacdefgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnomvac(),
			$keys[1] => $this->getCodconvac(),
			$keys[2] => $this->getPagoad(),
			$keys[3] => $this->getCodconcom(),
			$keys[4] => $this->getCodconuti(),
			$keys[5] => $this->getVacant(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnomvac($value);
				break;
			case 1:
				$this->setCodconvac($value);
				break;
			case 2:
				$this->setPagoad($value);
				break;
			case 3:
				$this->setCodconcom($value);
				break;
			case 4:
				$this->setCodconuti($value);
				break;
			case 5:
				$this->setVacant($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacdefgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnomvac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodconvac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPagoad($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodconcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodconuti($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVacant($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacdefgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacdefgenPeer::CODNOMVAC)) $criteria->add(NpvacdefgenPeer::CODNOMVAC, $this->codnomvac);
		if ($this->isColumnModified(NpvacdefgenPeer::CODCONVAC)) $criteria->add(NpvacdefgenPeer::CODCONVAC, $this->codconvac);
		if ($this->isColumnModified(NpvacdefgenPeer::PAGOAD)) $criteria->add(NpvacdefgenPeer::PAGOAD, $this->pagoad);
		if ($this->isColumnModified(NpvacdefgenPeer::CODCONCOM)) $criteria->add(NpvacdefgenPeer::CODCONCOM, $this->codconcom);
		if ($this->isColumnModified(NpvacdefgenPeer::CODCONUTI)) $criteria->add(NpvacdefgenPeer::CODCONUTI, $this->codconuti);
		if ($this->isColumnModified(NpvacdefgenPeer::VACANT)) $criteria->add(NpvacdefgenPeer::VACANT, $this->vacant);
		if ($this->isColumnModified(NpvacdefgenPeer::ID)) $criteria->add(NpvacdefgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacdefgenPeer::DATABASE_NAME);

		$criteria->add(NpvacdefgenPeer::ID, $this->id);

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

		$copyObj->setCodnomvac($this->codnomvac);

		$copyObj->setCodconvac($this->codconvac);

		$copyObj->setPagoad($this->pagoad);

		$copyObj->setCodconcom($this->codconcom);

		$copyObj->setCodconuti($this->codconuti);

		$copyObj->setVacant($this->vacant);


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
			self::$peer = new NpvacdefgenPeer();
		}
		return self::$peer;
	}

} 