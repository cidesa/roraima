<?php


abstract class BaseInrecaud extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ingruprec_id;


	
	protected $codrec;


	
	protected $desrec;


	
	protected $limita;


	
	protected $unitri;


	
	protected $id;

	
	protected $aIngruprec;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getIngruprecId()
  {

    return $this->ingruprec_id;

  }
  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getDesrec()
  {

    return trim($this->desrec);

  }
  
  public function getLimita()
  {

    return $this->limita;

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
	
	public function setIngruprecId($v)
	{

    if ($this->ingruprec_id !== $v) {
        $this->ingruprec_id = $v;
        $this->modifiedColumns[] = InrecaudPeer::INGRUPREC_ID;
      }
  
		if ($this->aIngruprec !== null && $this->aIngruprec->getId() !== $v) {
			$this->aIngruprec = null;
		}

	} 
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = InrecaudPeer::CODREC;
      }
  
	} 
	
	public function setDesrec($v)
	{

    if ($this->desrec !== $v) {
        $this->desrec = $v;
        $this->modifiedColumns[] = InrecaudPeer::DESREC;
      }
  
	} 
	
	public function setLimita($v)
	{

    if ($this->limita !== $v) {
        $this->limita = $v;
        $this->modifiedColumns[] = InrecaudPeer::LIMITA;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InrecaudPeer::UNITRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InrecaudPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ingruprec_id = $rs->getInt($startcol + 0);

      $this->codrec = $rs->getString($startcol + 1);

      $this->desrec = $rs->getString($startcol + 2);

      $this->limita = $rs->getBoolean($startcol + 3);

      $this->unitri = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inrecaud object", $e);
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
			$con = Propel::getConnection(InrecaudPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InrecaudPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InrecaudPeer::DATABASE_NAME);
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


												
			if ($this->aIngruprec !== null) {
				if ($this->aIngruprec->isModified()) {
					$affectedRows += $this->aIngruprec->save($con);
				}
				$this->setIngruprec($this->aIngruprec);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InrecaudPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InrecaudPeer::doUpdate($this, $con);
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


												
			if ($this->aIngruprec !== null) {
				if (!$this->aIngruprec->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIngruprec->getValidationFailures());
				}
			}


			if (($retval = InrecaudPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InrecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIngruprecId();
				break;
			case 1:
				return $this->getCodrec();
				break;
			case 2:
				return $this->getDesrec();
				break;
			case 3:
				return $this->getLimita();
				break;
			case 4:
				return $this->getUnitri();
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
		$keys = InrecaudPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIngruprecId(),
			$keys[1] => $this->getCodrec(),
			$keys[2] => $this->getDesrec(),
			$keys[3] => $this->getLimita(),
			$keys[4] => $this->getUnitri(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InrecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIngruprecId($value);
				break;
			case 1:
				$this->setCodrec($value);
				break;
			case 2:
				$this->setDesrec($value);
				break;
			case 3:
				$this->setLimita($value);
				break;
			case 4:
				$this->setUnitri($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InrecaudPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIngruprecId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLimita($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUnitri($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InrecaudPeer::DATABASE_NAME);

		if ($this->isColumnModified(InrecaudPeer::INGRUPREC_ID)) $criteria->add(InrecaudPeer::INGRUPREC_ID, $this->ingruprec_id);
		if ($this->isColumnModified(InrecaudPeer::CODREC)) $criteria->add(InrecaudPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(InrecaudPeer::DESREC)) $criteria->add(InrecaudPeer::DESREC, $this->desrec);
		if ($this->isColumnModified(InrecaudPeer::LIMITA)) $criteria->add(InrecaudPeer::LIMITA, $this->limita);
		if ($this->isColumnModified(InrecaudPeer::UNITRI)) $criteria->add(InrecaudPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(InrecaudPeer::ID)) $criteria->add(InrecaudPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InrecaudPeer::DATABASE_NAME);

		$criteria->add(InrecaudPeer::ID, $this->id);

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

		$copyObj->setIngruprecId($this->ingruprec_id);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setDesrec($this->desrec);

		$copyObj->setLimita($this->limita);

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
			self::$peer = new InrecaudPeer();
		}
		return self::$peer;
	}

	
	public function setIngruprec($v)
	{


		if ($v === null) {
			$this->setIngruprecId(NULL);
		} else {
			$this->setIngruprecId($v->getId());
		}


		$this->aIngruprec = $v;
	}


	
	public function getIngruprec($con = null)
	{
		if ($this->aIngruprec === null && ($this->ingruprec_id !== null)) {
						include_once 'lib/model/om/BaseIngruprecPeer.php';

			$this->aIngruprec = IngruprecPeer::retrieveByPK($this->ingruprec_id, $con);

			
		}
		return $this->aIngruprec;
	}

} 