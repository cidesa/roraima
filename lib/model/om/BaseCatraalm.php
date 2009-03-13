<?php


abstract class BaseCatraalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtra;


	
	protected $fectra;


	
	protected $destra;


	
	protected $almori;


	
	protected $codubiori;


	
	protected $almdes;


	
	protected $codubides;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtra()
  {

    return trim($this->codtra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getAlmori()
  {

    return trim($this->almori);

  }
  
  public function getCodubiori()
  {

    return trim($this->codubiori);

  }
  
  public function getAlmdes()
  {

    return trim($this->almdes);

  }
  
  public function getCodubides()
  {

    return trim($this->codubides);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtra($v)
	{

    if ($this->codtra !== $v) {
        $this->codtra = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODTRA;
      }
  
	} 
	
	public function setFectra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = CatraalmPeer::FECTRA;
    }

	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = CatraalmPeer::DESTRA;
      }
  
	} 
	
	public function setAlmori($v)
	{

    if ($this->almori !== $v) {
        $this->almori = $v;
        $this->modifiedColumns[] = CatraalmPeer::ALMORI;
      }
  
	} 
	
	public function setCodubiori($v)
	{

    if ($this->codubiori !== $v) {
        $this->codubiori = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODUBIORI;
      }
  
	} 
	
	public function setAlmdes($v)
	{

    if ($this->almdes !== $v) {
        $this->almdes = $v;
        $this->modifiedColumns[] = CatraalmPeer::ALMDES;
      }
  
	} 
	
	public function setCodubides($v)
	{

    if ($this->codubides !== $v) {
        $this->codubides = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODUBIDES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatraalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->destra = $rs->getString($startcol + 2);

      $this->almori = $rs->getString($startcol + 3);

      $this->codubiori = $rs->getString($startcol + 4);

      $this->almdes = $rs->getString($startcol + 5);

      $this->codubides = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catraalm object", $e);
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
			$con = Propel::getConnection(CatraalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatraalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatraalmPeer::DATABASE_NAME);
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
					$pk = CatraalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatraalmPeer::doUpdate($this, $con);
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


			if (($retval = CatraalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatraalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getDestra();
				break;
			case 3:
				return $this->getAlmori();
				break;
			case 4:
				return $this->getCodubiori();
				break;
			case 5:
				return $this->getAlmdes();
				break;
			case 6:
				return $this->getCodubides();
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
		$keys = CatraalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getDestra(),
			$keys[3] => $this->getAlmori(),
			$keys[4] => $this->getCodubiori(),
			$keys[5] => $this->getAlmdes(),
			$keys[6] => $this->getCodubides(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatraalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setDestra($value);
				break;
			case 3:
				$this->setAlmori($value);
				break;
			case 4:
				$this->setCodubiori($value);
				break;
			case 5:
				$this->setAlmdes($value);
				break;
			case 6:
				$this->setCodubides($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatraalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlmori($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodubiori($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAlmdes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodubides($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatraalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatraalmPeer::CODTRA)) $criteria->add(CatraalmPeer::CODTRA, $this->codtra);
		if ($this->isColumnModified(CatraalmPeer::FECTRA)) $criteria->add(CatraalmPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(CatraalmPeer::DESTRA)) $criteria->add(CatraalmPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(CatraalmPeer::ALMORI)) $criteria->add(CatraalmPeer::ALMORI, $this->almori);
		if ($this->isColumnModified(CatraalmPeer::CODUBIORI)) $criteria->add(CatraalmPeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(CatraalmPeer::ALMDES)) $criteria->add(CatraalmPeer::ALMDES, $this->almdes);
		if ($this->isColumnModified(CatraalmPeer::CODUBIDES)) $criteria->add(CatraalmPeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(CatraalmPeer::ID)) $criteria->add(CatraalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatraalmPeer::DATABASE_NAME);

		$criteria->add(CatraalmPeer::ID, $this->id);

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

		$copyObj->setCodtra($this->codtra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setDestra($this->destra);

		$copyObj->setAlmori($this->almori);

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setAlmdes($this->almdes);

		$copyObj->setCodubides($this->codubides);


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
			self::$peer = new CatraalmPeer();
		}
		return self::$peer;
	}

} 