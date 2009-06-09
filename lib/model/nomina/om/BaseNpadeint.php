<?php


abstract class BaseNpadeint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codemp;


	
	protected $fecade;


	
	protected $monade;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecade($format = 'Y-m-d')
  {

    if ($this->fecade === null || $this->fecade === '') {
      return null;
    } elseif (!is_int($this->fecade)) {
            $ts = adodb_strtotime($this->fecade);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecade] as date/time value: " . var_export($this->fecade, true));
      }
    } else {
      $ts = $this->fecade;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonade($val=false)
  {

    if($val) return number_format($this->monade,2,',','.');
    else return $this->monade;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpadeintPeer::CODCON;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpadeintPeer::CODEMP;
      }
  
	} 
	
	public function setFecade($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecade] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecade !== $ts) {
      $this->fecade = $ts;
      $this->modifiedColumns[] = NpadeintPeer::FECADE;
    }

	} 
	
	public function setMonade($v)
	{

    if ($this->monade !== $v) {
        $this->monade = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpadeintPeer::MONADE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpadeintPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->fecade = $rs->getDate($startcol + 2, null);

      $this->monade = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npadeint object", $e);
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
			$con = Propel::getConnection(NpadeintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpadeintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpadeintPeer::DATABASE_NAME);
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
					$pk = NpadeintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpadeintPeer::doUpdate($this, $con);
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


			if (($retval = NpadeintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpadeintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getFecade();
				break;
			case 3:
				return $this->getMonade();
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
		$keys = NpadeintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getFecade(),
			$keys[3] => $this->getMonade(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpadeintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setFecade($value);
				break;
			case 3:
				$this->setMonade($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpadeintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecade($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonade($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpadeintPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpadeintPeer::CODCON)) $criteria->add(NpadeintPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpadeintPeer::CODEMP)) $criteria->add(NpadeintPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpadeintPeer::FECADE)) $criteria->add(NpadeintPeer::FECADE, $this->fecade);
		if ($this->isColumnModified(NpadeintPeer::MONADE)) $criteria->add(NpadeintPeer::MONADE, $this->monade);
		if ($this->isColumnModified(NpadeintPeer::ID)) $criteria->add(NpadeintPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpadeintPeer::DATABASE_NAME);

		$criteria->add(NpadeintPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecade($this->fecade);

		$copyObj->setMonade($this->monade);


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
			self::$peer = new NpadeintPeer();
		}
		return self::$peer;
	}

} 