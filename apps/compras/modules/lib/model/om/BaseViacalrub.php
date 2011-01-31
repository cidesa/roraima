<?php


abstract class BaseViacalrub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrub;


	
	protected $codnivtra;


	
	protected $canunitri;


	
	protected $valunitri;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrub()
  {

    return trim($this->codrub);

  }
  
  public function getCodnivtra()
  {

    return trim($this->codnivtra);

  }
  
  public function getCanunitri($val=false)
  {

    if($val) return number_format($this->canunitri,2,',','.');
    else return $this->canunitri;

  }
  
  public function getValunitri($val=false)
  {

    if($val) return number_format($this->valunitri,2,',','.');
    else return $this->valunitri;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrub($v)
	{

    if ($this->codrub !== $v) {
        $this->codrub = $v;
        $this->modifiedColumns[] = ViacalrubPeer::CODRUB;
      }
  
	} 
	
	public function setCodnivtra($v)
	{

    if ($this->codnivtra !== $v) {
        $this->codnivtra = $v;
        $this->modifiedColumns[] = ViacalrubPeer::CODNIVTRA;
      }
  
	} 
	
	public function setCanunitri($v)
	{

    if ($this->canunitri !== $v) {
        $this->canunitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViacalrubPeer::CANUNITRI;
      }
  
	} 
	
	public function setValunitri($v)
	{

    if ($this->valunitri !== $v) {
        $this->valunitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViacalrubPeer::VALUNITRI;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViacalrubPeer::MONTO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViacalrubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrub = $rs->getString($startcol + 0);

      $this->codnivtra = $rs->getString($startcol + 1);

      $this->canunitri = $rs->getFloat($startcol + 2);

      $this->valunitri = $rs->getFloat($startcol + 3);

      $this->monto = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viacalrub object", $e);
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
			$con = Propel::getConnection(ViacalrubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViacalrubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViacalrubPeer::DATABASE_NAME);
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
					$pk = ViacalrubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViacalrubPeer::doUpdate($this, $con);
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


			if (($retval = ViacalrubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViacalrubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrub();
				break;
			case 1:
				return $this->getCodnivtra();
				break;
			case 2:
				return $this->getCanunitri();
				break;
			case 3:
				return $this->getValunitri();
				break;
			case 4:
				return $this->getMonto();
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
		$keys = ViacalrubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrub(),
			$keys[1] => $this->getCodnivtra(),
			$keys[2] => $this->getCanunitri(),
			$keys[3] => $this->getValunitri(),
			$keys[4] => $this->getMonto(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViacalrubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrub($value);
				break;
			case 1:
				$this->setCodnivtra($value);
				break;
			case 2:
				$this->setCanunitri($value);
				break;
			case 3:
				$this->setValunitri($value);
				break;
			case 4:
				$this->setMonto($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViacalrubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrub($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnivtra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanunitri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValunitri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViacalrubPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViacalrubPeer::CODRUB)) $criteria->add(ViacalrubPeer::CODRUB, $this->codrub);
		if ($this->isColumnModified(ViacalrubPeer::CODNIVTRA)) $criteria->add(ViacalrubPeer::CODNIVTRA, $this->codnivtra);
		if ($this->isColumnModified(ViacalrubPeer::CANUNITRI)) $criteria->add(ViacalrubPeer::CANUNITRI, $this->canunitri);
		if ($this->isColumnModified(ViacalrubPeer::VALUNITRI)) $criteria->add(ViacalrubPeer::VALUNITRI, $this->valunitri);
		if ($this->isColumnModified(ViacalrubPeer::MONTO)) $criteria->add(ViacalrubPeer::MONTO, $this->monto);
		if ($this->isColumnModified(ViacalrubPeer::ID)) $criteria->add(ViacalrubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViacalrubPeer::DATABASE_NAME);

		$criteria->add(ViacalrubPeer::ID, $this->id);

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

		$copyObj->setCodrub($this->codrub);

		$copyObj->setCodnivtra($this->codnivtra);

		$copyObj->setCanunitri($this->canunitri);

		$copyObj->setValunitri($this->valunitri);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new ViacalrubPeer();
		}
		return self::$peer;
	}

} 