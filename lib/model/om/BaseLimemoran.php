<?php


abstract class BaseLimemoran extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numexp;


	
	protected $numemo;


	
	protected $nompro;


	
	protected $fecha;


	
	protected $codfin;


	
	protected $codcom;


	
	protected $coduniste;


	
	protected $codclacomp;


	
	protected $tipcom;


	
	protected $detmemo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getNumemo()
  {

    return trim($this->numemo);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

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

  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getCodclacomp()
  {

    return trim($this->codclacomp);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getDetmemo()
  {

    return trim($this->detmemo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LimemoranPeer::NUMEXP;
      }
  
	} 
	
	public function setNumemo($v)
	{

    if ($this->numemo !== $v) {
        $this->numemo = $v;
        $this->modifiedColumns[] = LimemoranPeer::NUMEMO;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = LimemoranPeer::NOMPRO;
      }
  
	} 
	
	public function setFecha($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = LimemoranPeer::FECHA;
    }

	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = LimemoranPeer::CODFIN;
      }
  
	} 
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = $v;
        $this->modifiedColumns[] = LimemoranPeer::CODCOM;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LimemoranPeer::CODUNISTE;
      }
  
	} 
	
	public function setCodclacomp($v)
	{

    if ($this->codclacomp !== $v) {
        $this->codclacomp = $v;
        $this->modifiedColumns[] = LimemoranPeer::CODCLACOMP;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = LimemoranPeer::TIPCOM;
      }
  
	} 
	
	public function setDetmemo($v)
	{

    if ($this->detmemo !== $v) {
        $this->detmemo = $v;
        $this->modifiedColumns[] = LimemoranPeer::DETMEMO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LimemoranPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numexp = $rs->getString($startcol + 0);

      $this->numemo = $rs->getString($startcol + 1);

      $this->nompro = $rs->getString($startcol + 2);

      $this->fecha = $rs->getDate($startcol + 3, null);

      $this->codfin = $rs->getString($startcol + 4);

      $this->codcom = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->codclacomp = $rs->getString($startcol + 7);

      $this->tipcom = $rs->getString($startcol + 8);

      $this->detmemo = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Limemoran object", $e);
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
			$con = Propel::getConnection(LimemoranPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LimemoranPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LimemoranPeer::DATABASE_NAME);
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
					$pk = LimemoranPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LimemoranPeer::doUpdate($this, $con);
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


			if (($retval = LimemoranPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LimemoranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumexp();
				break;
			case 1:
				return $this->getNumemo();
				break;
			case 2:
				return $this->getNompro();
				break;
			case 3:
				return $this->getFecha();
				break;
			case 4:
				return $this->getCodfin();
				break;
			case 5:
				return $this->getCodcom();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getCodclacomp();
				break;
			case 8:
				return $this->getTipcom();
				break;
			case 9:
				return $this->getDetmemo();
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
		$keys = LimemoranPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumexp(),
			$keys[1] => $this->getNumemo(),
			$keys[2] => $this->getNompro(),
			$keys[3] => $this->getFecha(),
			$keys[4] => $this->getCodfin(),
			$keys[5] => $this->getCodcom(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getCodclacomp(),
			$keys[8] => $this->getTipcom(),
			$keys[9] => $this->getDetmemo(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LimemoranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumexp($value);
				break;
			case 1:
				$this->setNumemo($value);
				break;
			case 2:
				$this->setNompro($value);
				break;
			case 3:
				$this->setFecha($value);
				break;
			case 4:
				$this->setCodfin($value);
				break;
			case 5:
				$this->setCodcom($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setCodclacomp($value);
				break;
			case 8:
				$this->setTipcom($value);
				break;
			case 9:
				$this->setDetmemo($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LimemoranPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumexp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumemo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNompro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecha($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodclacomp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDetmemo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LimemoranPeer::DATABASE_NAME);

		if ($this->isColumnModified(LimemoranPeer::NUMEXP)) $criteria->add(LimemoranPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LimemoranPeer::NUMEMO)) $criteria->add(LimemoranPeer::NUMEMO, $this->numemo);
		if ($this->isColumnModified(LimemoranPeer::NOMPRO)) $criteria->add(LimemoranPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(LimemoranPeer::FECHA)) $criteria->add(LimemoranPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(LimemoranPeer::CODFIN)) $criteria->add(LimemoranPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(LimemoranPeer::CODCOM)) $criteria->add(LimemoranPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(LimemoranPeer::CODUNISTE)) $criteria->add(LimemoranPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LimemoranPeer::CODCLACOMP)) $criteria->add(LimemoranPeer::CODCLACOMP, $this->codclacomp);
		if ($this->isColumnModified(LimemoranPeer::TIPCOM)) $criteria->add(LimemoranPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(LimemoranPeer::DETMEMO)) $criteria->add(LimemoranPeer::DETMEMO, $this->detmemo);
		if ($this->isColumnModified(LimemoranPeer::ID)) $criteria->add(LimemoranPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LimemoranPeer::DATABASE_NAME);

		$criteria->add(LimemoranPeer::ID, $this->id);

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

		$copyObj->setNumexp($this->numexp);

		$copyObj->setNumemo($this->numemo);

		$copyObj->setNompro($this->nompro);

		$copyObj->setFecha($this->fecha);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setCodcom($this->codcom);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setCodclacomp($this->codclacomp);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setDetmemo($this->detmemo);


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
			self::$peer = new LimemoranPeer();
		}
		return self::$peer;
	}

} 