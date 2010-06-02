<?php


abstract class BaseViadetcalviatra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcal;


	
	protected $feccal;


	
	protected $codrub;


	
	protected $numdia;


	
	protected $mondia;


	
	protected $montot;


	
	protected $tipo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcal()
  {

    return trim($this->numcal);

  }
  
  public function getFeccal($format = 'Y-m-d')
  {

    if ($this->feccal === null || $this->feccal === '') {
      return null;
    } elseif (!is_int($this->feccal)) {
            $ts = adodb_strtotime($this->feccal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
      }
    } else {
      $ts = $this->feccal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodrub()
  {

    return trim($this->codrub);

  }
  
  public function getNumdia()
  {

    return $this->numdia;

  }
  
  public function getMondia($val=false)
  {

    if($val) return number_format($this->mondia,2,',','.');
    else return $this->mondia;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcal($v)
	{

    if ($this->numcal !== $v) {
        $this->numcal = $v;
        $this->modifiedColumns[] = ViadetcalviatraPeer::NUMCAL;
      }
  
	} 
	
	public function setFeccal($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccal !== $ts) {
      $this->feccal = $ts;
      $this->modifiedColumns[] = ViadetcalviatraPeer::FECCAL;
    }

	} 
	
	public function setCodrub($v)
	{

    if ($this->codrub !== $v) {
        $this->codrub = $v;
        $this->modifiedColumns[] = ViadetcalviatraPeer::CODRUB;
      }
  
	} 
	
	public function setNumdia($v)
	{

    if ($this->numdia !== $v) {
        $this->numdia = $v;
        $this->modifiedColumns[] = ViadetcalviatraPeer::NUMDIA;
      }
  
	} 
	
	public function setMondia($v)
	{

    if ($this->mondia !== $v) {
        $this->mondia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadetcalviatraPeer::MONDIA;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadetcalviatraPeer::MONTOT;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = ViadetcalviatraPeer::TIPO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadetcalviatraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcal = $rs->getString($startcol + 0);

      $this->feccal = $rs->getDate($startcol + 1, null);

      $this->codrub = $rs->getString($startcol + 2);

      $this->numdia = $rs->getInt($startcol + 3);

      $this->mondia = $rs->getFloat($startcol + 4);

      $this->montot = $rs->getFloat($startcol + 5);

      $this->tipo = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadetcalviatra object", $e);
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
			$con = Propel::getConnection(ViadetcalviatraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadetcalviatraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadetcalviatraPeer::DATABASE_NAME);
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
					$pk = ViadetcalviatraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadetcalviatraPeer::doUpdate($this, $con);
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


			if (($retval = ViadetcalviatraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadetcalviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcal();
				break;
			case 1:
				return $this->getFeccal();
				break;
			case 2:
				return $this->getCodrub();
				break;
			case 3:
				return $this->getNumdia();
				break;
			case 4:
				return $this->getMondia();
				break;
			case 5:
				return $this->getMontot();
				break;
			case 6:
				return $this->getTipo();
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
		$keys = ViadetcalviatraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcal(),
			$keys[1] => $this->getFeccal(),
			$keys[2] => $this->getCodrub(),
			$keys[3] => $this->getNumdia(),
			$keys[4] => $this->getMondia(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getTipo(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadetcalviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcal($value);
				break;
			case 1:
				$this->setFeccal($value);
				break;
			case 2:
				$this->setCodrub($value);
				break;
			case 3:
				$this->setNumdia($value);
				break;
			case 4:
				$this->setMondia($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setTipo($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadetcalviatraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodrub($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumdia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondia($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadetcalviatraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadetcalviatraPeer::NUMCAL)) $criteria->add(ViadetcalviatraPeer::NUMCAL, $this->numcal);
		if ($this->isColumnModified(ViadetcalviatraPeer::FECCAL)) $criteria->add(ViadetcalviatraPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(ViadetcalviatraPeer::CODRUB)) $criteria->add(ViadetcalviatraPeer::CODRUB, $this->codrub);
		if ($this->isColumnModified(ViadetcalviatraPeer::NUMDIA)) $criteria->add(ViadetcalviatraPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(ViadetcalviatraPeer::MONDIA)) $criteria->add(ViadetcalviatraPeer::MONDIA, $this->mondia);
		if ($this->isColumnModified(ViadetcalviatraPeer::MONTOT)) $criteria->add(ViadetcalviatraPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(ViadetcalviatraPeer::TIPO)) $criteria->add(ViadetcalviatraPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(ViadetcalviatraPeer::ID)) $criteria->add(ViadetcalviatraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadetcalviatraPeer::DATABASE_NAME);

		$criteria->add(ViadetcalviatraPeer::ID, $this->id);

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

		$copyObj->setNumcal($this->numcal);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setCodrub($this->codrub);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setMondia($this->mondia);

		$copyObj->setMontot($this->montot);

		$copyObj->setTipo($this->tipo);


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
			self::$peer = new ViadetcalviatraPeer();
		}
		return self::$peer;
	}

} 