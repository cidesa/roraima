<?php


abstract class BaseOcemppar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $codpro;


	
	protected $fecins;


	
	protected $precal;


	
	protected $montot;


	
	protected $observaciones;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getFecins($format = 'Y-m-d')
  {

    if ($this->fecins === null || $this->fecins === '') {
      return null;
    } elseif (!is_int($this->fecins)) {
            $ts = adodb_strtotime($this->fecins);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecins] as date/time value: " . var_export($this->fecins, true));
      }
    } else {
      $ts = $this->fecins;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPrecal()
  {

    return trim($this->precal);

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = OcempparPeer::CODOBR;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = OcempparPeer::CODPRO;
      }
  
	} 
	
	public function setFecins($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecins] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecins !== $ts) {
      $this->fecins = $ts;
      $this->modifiedColumns[] = OcempparPeer::FECINS;
    }

	} 
	
	public function setPrecal($v)
	{

    if ($this->precal !== $v) {
        $this->precal = $v;
        $this->modifiedColumns[] = OcempparPeer::PRECAL;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcempparPeer::MONTOT;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = OcempparPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcempparPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codobr = $rs->getString($startcol + 0);

      $this->codpro = $rs->getString($startcol + 1);

      $this->fecins = $rs->getDate($startcol + 2, null);

      $this->precal = $rs->getString($startcol + 3);

      $this->montot = $rs->getFloat($startcol + 4);

      $this->observaciones = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocemppar object", $e);
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
			$con = Propel::getConnection(OcempparPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcempparPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcempparPeer::DATABASE_NAME);
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
					$pk = OcempparPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcempparPeer::doUpdate($this, $con);
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


			if (($retval = OcempparPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcempparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getFecins();
				break;
			case 3:
				return $this->getPrecal();
				break;
			case 4:
				return $this->getMontot();
				break;
			case 5:
				return $this->getObservaciones();
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
		$keys = OcempparPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getFecins(),
			$keys[3] => $this->getPrecal(),
			$keys[4] => $this->getMontot(),
			$keys[5] => $this->getObservaciones(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcempparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setFecins($value);
				break;
			case 3:
				$this->setPrecal($value);
				break;
			case 4:
				$this->setMontot($value);
				break;
			case 5:
				$this->setObservaciones($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcempparPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrecal($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMontot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObservaciones($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcempparPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcempparPeer::CODOBR)) $criteria->add(OcempparPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcempparPeer::CODPRO)) $criteria->add(OcempparPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(OcempparPeer::FECINS)) $criteria->add(OcempparPeer::FECINS, $this->fecins);
		if ($this->isColumnModified(OcempparPeer::PRECAL)) $criteria->add(OcempparPeer::PRECAL, $this->precal);
		if ($this->isColumnModified(OcempparPeer::MONTOT)) $criteria->add(OcempparPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(OcempparPeer::OBSERVACIONES)) $criteria->add(OcempparPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(OcempparPeer::ID)) $criteria->add(OcempparPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcempparPeer::DATABASE_NAME);

		$criteria->add(OcempparPeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setFecins($this->fecins);

		$copyObj->setPrecal($this->precal);

		$copyObj->setMontot($this->montot);

		$copyObj->setObservaciones($this->observaciones);


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
			self::$peer = new OcempparPeer();
		}
		return self::$peer;
	}

} 