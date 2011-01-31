<?php


abstract class BaseIningprof extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $intipsol_id;


	
	protected $codingprof;


	
	protected $desingprof;


	
	protected $unitri;


	
	protected $id;

	
	protected $aIntipsol;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getIntipsolId()
  {

    return $this->intipsol_id;

  }
  
  public function getCodingprof()
  {

    return trim($this->codingprof);

  }
  
  public function getDesingprof()
  {

    return trim($this->desingprof);

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setIntipsolId($v)
	{

    if ($this->intipsol_id !== $v) {
        $this->intipsol_id = $v;
        $this->modifiedColumns[] = IningprofPeer::INTIPSOL_ID;
      }
  
		if ($this->aIntipsol !== null && $this->aIntipsol->getId() !== $v) {
			$this->aIntipsol = null;
		}

	} 
	
	public function setCodingprof($v)
	{

    if ($this->codingprof !== $v) {
        $this->codingprof = $v;
        $this->modifiedColumns[] = IningprofPeer::CODINGPROF;
      }
  
	} 
	
	public function setDesingprof($v)
	{

    if ($this->desingprof !== $v) {
        $this->desingprof = $v;
        $this->modifiedColumns[] = IningprofPeer::DESINGPROF;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = IningprofPeer::UNITRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IningprofPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->intipsol_id = $rs->getInt($startcol + 0);

      $this->codingprof = $rs->getString($startcol + 1);

      $this->desingprof = $rs->getString($startcol + 2);

      $this->unitri = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Iningprof object", $e);
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
			$con = Propel::getConnection(IningprofPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IningprofPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IningprofPeer::DATABASE_NAME);
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


												
			if ($this->aIntipsol !== null) {
				if ($this->aIntipsol->isModified()) {
					$affectedRows += $this->aIntipsol->save($con);
				}
				$this->setIntipsol($this->aIntipsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = IningprofPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IningprofPeer::doUpdate($this, $con);
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


												
			if ($this->aIntipsol !== null) {
				if (!$this->aIntipsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIntipsol->getValidationFailures());
				}
			}


			if (($retval = IningprofPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IningprofPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIntipsolId();
				break;
			case 1:
				return $this->getCodingprof();
				break;
			case 2:
				return $this->getDesingprof();
				break;
			case 3:
				return $this->getUnitri();
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
		$keys = IningprofPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIntipsolId(),
			$keys[1] => $this->getCodingprof(),
			$keys[2] => $this->getDesingprof(),
			$keys[3] => $this->getUnitri(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IningprofPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIntipsolId($value);
				break;
			case 1:
				$this->setCodingprof($value);
				break;
			case 2:
				$this->setDesingprof($value);
				break;
			case 3:
				$this->setUnitri($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IningprofPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIntipsolId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodingprof($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesingprof($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUnitri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IningprofPeer::DATABASE_NAME);

		if ($this->isColumnModified(IningprofPeer::INTIPSOL_ID)) $criteria->add(IningprofPeer::INTIPSOL_ID, $this->intipsol_id);
		if ($this->isColumnModified(IningprofPeer::CODINGPROF)) $criteria->add(IningprofPeer::CODINGPROF, $this->codingprof);
		if ($this->isColumnModified(IningprofPeer::DESINGPROF)) $criteria->add(IningprofPeer::DESINGPROF, $this->desingprof);
		if ($this->isColumnModified(IningprofPeer::UNITRI)) $criteria->add(IningprofPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(IningprofPeer::ID)) $criteria->add(IningprofPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IningprofPeer::DATABASE_NAME);

		$criteria->add(IningprofPeer::ID, $this->id);

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

		$copyObj->setIntipsolId($this->intipsol_id);

		$copyObj->setCodingprof($this->codingprof);

		$copyObj->setDesingprof($this->desingprof);

		$copyObj->setUnitri($this->unitri);


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
			self::$peer = new IningprofPeer();
		}
		return self::$peer;
	}

	
	public function setIntipsol($v)
	{


		if ($v === null) {
			$this->setIntipsolId(NULL);
		} else {
			$this->setIntipsolId($v->getId());
		}


		$this->aIntipsol = $v;
	}


	
	public function getIntipsol($con = null)
	{
		if ($this->aIntipsol === null && ($this->intipsol_id !== null)) {
						include_once 'lib/model/om/BaseIntipsolPeer.php';

			$this->aIntipsol = IntipsolPeer::retrieveByPK($this->intipsol_id, $con);

			
		}
		return $this->aIntipsol;
	}

} 