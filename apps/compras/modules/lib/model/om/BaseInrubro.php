<?php


abstract class BaseInrubro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ingruprub_id;


	
	protected $codrub;


	
	protected $desrub;


	
	protected $monrub;


	
	protected $id;

	
	protected $aIngruprub;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getIngruprubId()
  {

    return $this->ingruprub_id;

  }
  
  public function getCodrub()
  {

    return trim($this->codrub);

  }
  
  public function getDesrub()
  {

    return trim($this->desrub);

  }
  
  public function getMonrub($val=false)
  {

    if($val) return number_format($this->monrub,2,',','.');
    else return $this->monrub;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setIngruprubId($v)
	{

    if ($this->ingruprub_id !== $v) {
        $this->ingruprub_id = $v;
        $this->modifiedColumns[] = InrubroPeer::INGRUPRUB_ID;
      }
  
		if ($this->aIngruprub !== null && $this->aIngruprub->getId() !== $v) {
			$this->aIngruprub = null;
		}

	} 
	
	public function setCodrub($v)
	{

    if ($this->codrub !== $v) {
        $this->codrub = $v;
        $this->modifiedColumns[] = InrubroPeer::CODRUB;
      }
  
	} 
	
	public function setDesrub($v)
	{

    if ($this->desrub !== $v) {
        $this->desrub = $v;
        $this->modifiedColumns[] = InrubroPeer::DESRUB;
      }
  
	} 
	
	public function setMonrub($v)
	{

    if ($this->monrub !== $v) {
        $this->monrub = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InrubroPeer::MONRUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InrubroPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ingruprub_id = $rs->getInt($startcol + 0);

      $this->codrub = $rs->getString($startcol + 1);

      $this->desrub = $rs->getString($startcol + 2);

      $this->monrub = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inrubro object", $e);
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
			$con = Propel::getConnection(InrubroPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InrubroPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InrubroPeer::DATABASE_NAME);
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


												
			if ($this->aIngruprub !== null) {
				if ($this->aIngruprub->isModified()) {
					$affectedRows += $this->aIngruprub->save($con);
				}
				$this->setIngruprub($this->aIngruprub);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InrubroPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InrubroPeer::doUpdate($this, $con);
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


												
			if ($this->aIngruprub !== null) {
				if (!$this->aIngruprub->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIngruprub->getValidationFailures());
				}
			}


			if (($retval = InrubroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InrubroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIngruprubId();
				break;
			case 1:
				return $this->getCodrub();
				break;
			case 2:
				return $this->getDesrub();
				break;
			case 3:
				return $this->getMonrub();
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
		$keys = InrubroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIngruprubId(),
			$keys[1] => $this->getCodrub(),
			$keys[2] => $this->getDesrub(),
			$keys[3] => $this->getMonrub(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InrubroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIngruprubId($value);
				break;
			case 1:
				$this->setCodrub($value);
				break;
			case 2:
				$this->setDesrub($value);
				break;
			case 3:
				$this->setMonrub($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InrubroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIngruprubId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrub($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrub($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonrub($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InrubroPeer::DATABASE_NAME);

		if ($this->isColumnModified(InrubroPeer::INGRUPRUB_ID)) $criteria->add(InrubroPeer::INGRUPRUB_ID, $this->ingruprub_id);
		if ($this->isColumnModified(InrubroPeer::CODRUB)) $criteria->add(InrubroPeer::CODRUB, $this->codrub);
		if ($this->isColumnModified(InrubroPeer::DESRUB)) $criteria->add(InrubroPeer::DESRUB, $this->desrub);
		if ($this->isColumnModified(InrubroPeer::MONRUB)) $criteria->add(InrubroPeer::MONRUB, $this->monrub);
		if ($this->isColumnModified(InrubroPeer::ID)) $criteria->add(InrubroPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InrubroPeer::DATABASE_NAME);

		$criteria->add(InrubroPeer::ID, $this->id);

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

		$copyObj->setIngruprubId($this->ingruprub_id);

		$copyObj->setCodrub($this->codrub);

		$copyObj->setDesrub($this->desrub);

		$copyObj->setMonrub($this->monrub);


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
			self::$peer = new InrubroPeer();
		}
		return self::$peer;
	}

	
	public function setIngruprub($v)
	{


		if ($v === null) {
			$this->setIngruprubId(NULL);
		} else {
			$this->setIngruprubId($v->getId());
		}


		$this->aIngruprub = $v;
	}


	
	public function getIngruprub($con = null)
	{
		if ($this->aIngruprub === null && ($this->ingruprub_id !== null)) {
						include_once 'lib/model/om/BaseIngruprubPeer.php';

			$this->aIngruprub = IngruprubPeer::retrieveByPK($this->ingruprub_id, $con);

			
		}
		return $this->aIngruprub;
	}

} 