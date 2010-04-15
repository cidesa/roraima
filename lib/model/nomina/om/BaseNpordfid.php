<?php


abstract class BaseNpordfid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $fecha;


	
	protected $codemp;


	
	protected $cedemp;


	
	protected $codpre;


	
	protected $numord;


	
	protected $monfid;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getMonfid($val=false)
  {

    if($val) return number_format($this->monfid,2,',','.');
    else return $this->monfid;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpordfidPeer::CODNOM;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = NpordfidPeer::FECHA;
    }

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpordfidPeer::CODEMP;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = NpordfidPeer::CEDEMP;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = NpordfidPeer::CODPRE;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = NpordfidPeer::NUMORD;
      }
  
	} 
	
	public function setMonfid($v)
	{

    if ($this->monfid !== $v) {
        $this->monfid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpordfidPeer::MONFID;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpordfidPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->fecha = $rs->getDate($startcol + 1, null);

      $this->codemp = $rs->getString($startcol + 2);

      $this->cedemp = $rs->getString($startcol + 3);

      $this->codpre = $rs->getString($startcol + 4);

      $this->numord = $rs->getString($startcol + 5);

      $this->monfid = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npordfid object", $e);
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
			$con = Propel::getConnection(NpordfidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpordfidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpordfidPeer::DATABASE_NAME);
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
					$pk = NpordfidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpordfidPeer::doUpdate($this, $con);
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


			if (($retval = NpordfidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpordfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getCedemp();
				break;
			case 4:
				return $this->getCodpre();
				break;
			case 5:
				return $this->getNumord();
				break;
			case 6:
				return $this->getMonfid();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpordfidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getCedemp(),
			$keys[4] => $this->getCodpre(),
			$keys[5] => $this->getNumord(),
			$keys[6] => $this->getMonfid(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpordfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setCedemp($value);
				break;
			case 4:
				$this->setCodpre($value);
				break;
			case 5:
				$this->setNumord($value);
				break;
			case 6:
				$this->setMonfid($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpordfidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumord($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonfid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpordfidPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpordfidPeer::CODNOM)) $criteria->add(NpordfidPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpordfidPeer::FECHA)) $criteria->add(NpordfidPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(NpordfidPeer::CODEMP)) $criteria->add(NpordfidPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpordfidPeer::CEDEMP)) $criteria->add(NpordfidPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(NpordfidPeer::CODPRE)) $criteria->add(NpordfidPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NpordfidPeer::NUMORD)) $criteria->add(NpordfidPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(NpordfidPeer::MONFID)) $criteria->add(NpordfidPeer::MONFID, $this->monfid);
		if ($this->isColumnModified(NpordfidPeer::ID)) $criteria->add(NpordfidPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpordfidPeer::DATABASE_NAME);

		$criteria->add(NpordfidPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setFecha($this->fecha);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNumord($this->numord);

		$copyObj->setMonfid($this->monfid);


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
			self::$peer = new NpordfidPeer();
		}
		return self::$peer;
	}

} 