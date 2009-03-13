<?php


abstract class BaseCadetordc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcon;


	
	protected $codpre;


	
	protected $descon;


	
	protected $moncon;


	
	protected $cancon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcon()
  {

    return trim($this->ordcon);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getDescon()
  {

    return trim($this->descon);

  }
  
  public function getMoncon($val=false)
  {

    if($val) return number_format($this->moncon,2,',','.');
    else return $this->moncon;

  }
  
  public function getCancon($val=false)
  {

    if($val) return number_format($this->cancon,2,',','.');
    else return $this->cancon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcon($v)
	{

    if ($this->ordcon !== $v) {
        $this->ordcon = $v;
        $this->modifiedColumns[] = CadetordcPeer::ORDCON;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CadetordcPeer::CODPRE;
      }
  
	} 
	
	public function setDescon($v)
	{

    if ($this->descon !== $v) {
        $this->descon = $v;
        $this->modifiedColumns[] = CadetordcPeer::DESCON;
      }
  
	} 
	
	public function setMoncon($v)
	{

    if ($this->moncon !== $v) {
        $this->moncon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordcPeer::MONCON;
      }
  
	} 
	
	public function setCancon($v)
	{

    if ($this->cancon !== $v) {
        $this->cancon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetordcPeer::CANCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetordcPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcon = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->descon = $rs->getString($startcol + 2);

      $this->moncon = $rs->getFloat($startcol + 3);

      $this->cancon = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetordc object", $e);
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
			$con = Propel::getConnection(CadetordcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetordcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetordcPeer::DATABASE_NAME);
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
					$pk = CadetordcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetordcPeer::doUpdate($this, $con);
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


			if (($retval = CadetordcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetordcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcon();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getDescon();
				break;
			case 3:
				return $this->getMoncon();
				break;
			case 4:
				return $this->getCancon();
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
		$keys = CadetordcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcon(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getDescon(),
			$keys[3] => $this->getMoncon(),
			$keys[4] => $this->getCancon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetordcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcon($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setDescon($value);
				break;
			case 3:
				$this->setMoncon($value);
				break;
			case 4:
				$this->setCancon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetordcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCancon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetordcPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetordcPeer::ORDCON)) $criteria->add(CadetordcPeer::ORDCON, $this->ordcon);
		if ($this->isColumnModified(CadetordcPeer::CODPRE)) $criteria->add(CadetordcPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CadetordcPeer::DESCON)) $criteria->add(CadetordcPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CadetordcPeer::MONCON)) $criteria->add(CadetordcPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(CadetordcPeer::CANCON)) $criteria->add(CadetordcPeer::CANCON, $this->cancon);
		if ($this->isColumnModified(CadetordcPeer::ID)) $criteria->add(CadetordcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetordcPeer::DATABASE_NAME);

		$criteria->add(CadetordcPeer::ID, $this->id);

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

		$copyObj->setOrdcon($this->ordcon);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setDescon($this->descon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setCancon($this->cancon);


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
			self::$peer = new CadetordcPeer();
		}
		return self::$peer;
	}

} 