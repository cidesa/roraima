<?php


abstract class BaseCaprocomart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecprocom;


	
	protected $canpro;


	
	protected $monpro;


	
	protected $mespro;


	
	protected $codedo;


	
	protected $codcat;


	
	protected $codciu;


	
	protected $codmun;


	
	protected $codfin;


	
	protected $codart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecprocom($format = 'Y-m-d')
  {

    if ($this->fecprocom === null || $this->fecprocom === '') {
      return null;
    } elseif (!is_int($this->fecprocom)) {
            $ts = adodb_strtotime($this->fecprocom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecprocom] as date/time value: " . var_export($this->fecprocom, true));
      }
    } else {
      $ts = $this->fecprocom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCanpro($val=false)
  {

    if($val) return number_format($this->canpro,2,',','.');
    else return $this->canpro;

  }
  
  public function getMonpro($val=false)
  {

    if($val) return number_format($this->monpro,2,',','.');
    else return $this->monpro;

  }
  
  public function getMespro()
  {

    return trim($this->mespro);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecprocom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecprocom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecprocom !== $ts) {
      $this->fecprocom = $ts;
      $this->modifiedColumns[] = CaprocomartPeer::FECPROCOM;
    }

	} 
	
	public function setCanpro($v)
	{

    if ($this->canpro !== $v) {
        $this->canpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaprocomartPeer::CANPRO;
      }
  
	} 
	
	public function setMonpro($v)
	{

    if ($this->monpro !== $v) {
        $this->monpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaprocomartPeer::MONPRO;
      }
  
	} 
	
	public function setMespro($v)
	{

    if ($this->mespro !== $v) {
        $this->mespro = $v;
        $this->modifiedColumns[] = CaprocomartPeer::MESPRO;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = CaprocomartPeer::CODEDO;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CaprocomartPeer::CODCAT;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = CaprocomartPeer::CODCIU;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = CaprocomartPeer::CODMUN;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = CaprocomartPeer::CODFIN;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CaprocomartPeer::CODART;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaprocomartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecprocom = $rs->getDate($startcol + 0, null);

      $this->canpro = $rs->getFloat($startcol + 1);

      $this->monpro = $rs->getFloat($startcol + 2);

      $this->mespro = $rs->getString($startcol + 3);

      $this->codedo = $rs->getString($startcol + 4);

      $this->codcat = $rs->getString($startcol + 5);

      $this->codciu = $rs->getString($startcol + 6);

      $this->codmun = $rs->getString($startcol + 7);

      $this->codfin = $rs->getString($startcol + 8);

      $this->codart = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caprocomart object", $e);
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
			$con = Propel::getConnection(CaprocomartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaprocomartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaprocomartPeer::DATABASE_NAME);
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
					$pk = CaprocomartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaprocomartPeer::doUpdate($this, $con);
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


			if (($retval = CaprocomartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaprocomartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecprocom();
				break;
			case 1:
				return $this->getCanpro();
				break;
			case 2:
				return $this->getMonpro();
				break;
			case 3:
				return $this->getMespro();
				break;
			case 4:
				return $this->getCodedo();
				break;
			case 5:
				return $this->getCodcat();
				break;
			case 6:
				return $this->getCodciu();
				break;
			case 7:
				return $this->getCodmun();
				break;
			case 8:
				return $this->getCodfin();
				break;
			case 9:
				return $this->getCodart();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaprocomartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecprocom(),
			$keys[1] => $this->getCanpro(),
			$keys[2] => $this->getMonpro(),
			$keys[3] => $this->getMespro(),
			$keys[4] => $this->getCodedo(),
			$keys[5] => $this->getCodcat(),
			$keys[6] => $this->getCodciu(),
			$keys[7] => $this->getCodmun(),
			$keys[8] => $this->getCodfin(),
			$keys[9] => $this->getCodart(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaprocomartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecprocom($value);
				break;
			case 1:
				$this->setCanpro($value);
				break;
			case 2:
				$this->setMonpro($value);
				break;
			case 3:
				$this->setMespro($value);
				break;
			case 4:
				$this->setCodedo($value);
				break;
			case 5:
				$this->setCodcat($value);
				break;
			case 6:
				$this->setCodciu($value);
				break;
			case 7:
				$this->setCodmun($value);
				break;
			case 8:
				$this->setCodfin($value);
				break;
			case 9:
				$this->setCodart($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaprocomartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecprocom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCanpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMespro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodedo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcat($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodciu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodmun($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodfin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodart($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaprocomartPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaprocomartPeer::FECPROCOM)) $criteria->add(CaprocomartPeer::FECPROCOM, $this->fecprocom);
		if ($this->isColumnModified(CaprocomartPeer::CANPRO)) $criteria->add(CaprocomartPeer::CANPRO, $this->canpro);
		if ($this->isColumnModified(CaprocomartPeer::MONPRO)) $criteria->add(CaprocomartPeer::MONPRO, $this->monpro);
		if ($this->isColumnModified(CaprocomartPeer::MESPRO)) $criteria->add(CaprocomartPeer::MESPRO, $this->mespro);
		if ($this->isColumnModified(CaprocomartPeer::CODEDO)) $criteria->add(CaprocomartPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(CaprocomartPeer::CODCAT)) $criteria->add(CaprocomartPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaprocomartPeer::CODCIU)) $criteria->add(CaprocomartPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(CaprocomartPeer::CODMUN)) $criteria->add(CaprocomartPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(CaprocomartPeer::CODFIN)) $criteria->add(CaprocomartPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(CaprocomartPeer::CODART)) $criteria->add(CaprocomartPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaprocomartPeer::ID)) $criteria->add(CaprocomartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaprocomartPeer::DATABASE_NAME);

		$criteria->add(CaprocomartPeer::ID, $this->id);

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

		$copyObj->setFecprocom($this->fecprocom);

		$copyObj->setCanpro($this->canpro);

		$copyObj->setMonpro($this->monpro);

		$copyObj->setMespro($this->mespro);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setCodart($this->codart);


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
			self::$peer = new CaprocomartPeer();
		}
		return self::$peer;
	}

} 