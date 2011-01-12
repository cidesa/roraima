<?php


abstract class BaseNpintfid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecdesde;


	
	protected $fechasta;


	
	protected $codemp;


	
	protected $fechaint;


	
	protected $depos;


	
	protected $deposacum;


	
	protected $capital;


	
	protected $tasa;


	
	protected $interes;


	
	protected $interesacum;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecdesde($format = 'Y-m-d')
  {

    if ($this->fecdesde === null || $this->fecdesde === '') {
      return null;
    } elseif (!is_int($this->fecdesde)) {
            $ts = adodb_strtotime($this->fecdesde);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdesde] as date/time value: " . var_export($this->fecdesde, true));
      }
    } else {
      $ts = $this->fecdesde;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechasta($format = 'Y-m-d')
  {

    if ($this->fechasta === null || $this->fechasta === '') {
      return null;
    } elseif (!is_int($this->fechasta)) {
            $ts = adodb_strtotime($this->fechasta);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechasta] as date/time value: " . var_export($this->fechasta, true));
      }
    } else {
      $ts = $this->fechasta;
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
  
  public function getFechaint($format = 'Y-m-d')
  {

    if ($this->fechaint === null || $this->fechaint === '') {
      return null;
    } elseif (!is_int($this->fechaint)) {
            $ts = adodb_strtotime($this->fechaint);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechaint] as date/time value: " . var_export($this->fechaint, true));
      }
    } else {
      $ts = $this->fechaint;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDepos($val=false)
  {

    if($val) return number_format($this->depos,2,',','.');
    else return $this->depos;

  }
  
  public function getDeposacum($val=false)
  {

    if($val) return number_format($this->deposacum,2,',','.');
    else return $this->deposacum;

  }
  
  public function getCapital($val=false)
  {

    if($val) return number_format($this->capital,2,',','.');
    else return $this->capital;

  }
  
  public function getTasa($val=false)
  {

    if($val) return number_format($this->tasa,2,',','.');
    else return $this->tasa;

  }
  
  public function getInteres($val=false)
  {

    if($val) return number_format($this->interes,2,',','.');
    else return $this->interes;

  }
  
  public function getInteresacum($val=false)
  {

    if($val) return number_format($this->interesacum,2,',','.');
    else return $this->interesacum;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecdesde($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdesde] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdesde !== $ts) {
      $this->fecdesde = $ts;
      $this->modifiedColumns[] = NpintfidPeer::FECDESDE;
    }

	} 
	
	public function setFechasta($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechasta] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechasta !== $ts) {
      $this->fechasta = $ts;
      $this->modifiedColumns[] = NpintfidPeer::FECHASTA;
    }

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpintfidPeer::CODEMP;
      }
  
	} 
	
	public function setFechaint($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechaint] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechaint !== $ts) {
      $this->fechaint = $ts;
      $this->modifiedColumns[] = NpintfidPeer::FECHAINT;
    }

	} 
	
	public function setDepos($v)
	{

    if ($this->depos !== $v) {
        $this->depos = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintfidPeer::DEPOS;
      }
  
	} 
	
	public function setDeposacum($v)
	{

    if ($this->deposacum !== $v) {
        $this->deposacum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintfidPeer::DEPOSACUM;
      }
  
	} 
	
	public function setCapital($v)
	{

    if ($this->capital !== $v) {
        $this->capital = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintfidPeer::CAPITAL;
      }
  
	} 
	
	public function setTasa($v)
	{

    if ($this->tasa !== $v) {
        $this->tasa = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintfidPeer::TASA;
      }
  
	} 
	
	public function setInteres($v)
	{

    if ($this->interes !== $v) {
        $this->interes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintfidPeer::INTERES;
      }
  
	} 
	
	public function setInteresacum($v)
	{

    if ($this->interesacum !== $v) {
        $this->interesacum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpintfidPeer::INTERESACUM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpintfidPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecdesde = $rs->getDate($startcol + 0, null);

      $this->fechasta = $rs->getDate($startcol + 1, null);

      $this->codemp = $rs->getString($startcol + 2);

      $this->fechaint = $rs->getDate($startcol + 3, null);

      $this->depos = $rs->getFloat($startcol + 4);

      $this->deposacum = $rs->getFloat($startcol + 5);

      $this->capital = $rs->getFloat($startcol + 6);

      $this->tasa = $rs->getFloat($startcol + 7);

      $this->interes = $rs->getFloat($startcol + 8);

      $this->interesacum = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npintfid object", $e);
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
			$con = Propel::getConnection(NpintfidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpintfidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpintfidPeer::DATABASE_NAME);
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
					$pk = NpintfidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpintfidPeer::doUpdate($this, $con);
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


			if (($retval = NpintfidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpintfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecdesde();
				break;
			case 1:
				return $this->getFechasta();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getFechaint();
				break;
			case 4:
				return $this->getDepos();
				break;
			case 5:
				return $this->getDeposacum();
				break;
			case 6:
				return $this->getCapital();
				break;
			case 7:
				return $this->getTasa();
				break;
			case 8:
				return $this->getInteres();
				break;
			case 9:
				return $this->getInteresacum();
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
		$keys = NpintfidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecdesde(),
			$keys[1] => $this->getFechasta(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getFechaint(),
			$keys[4] => $this->getDepos(),
			$keys[5] => $this->getDeposacum(),
			$keys[6] => $this->getCapital(),
			$keys[7] => $this->getTasa(),
			$keys[8] => $this->getInteres(),
			$keys[9] => $this->getInteresacum(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpintfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecdesde($value);
				break;
			case 1:
				$this->setFechasta($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setFechaint($value);
				break;
			case 4:
				$this->setDepos($value);
				break;
			case 5:
				$this->setDeposacum($value);
				break;
			case 6:
				$this->setCapital($value);
				break;
			case 7:
				$this->setTasa($value);
				break;
			case 8:
				$this->setInteres($value);
				break;
			case 9:
				$this->setInteresacum($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpintfidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecdesde($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechasta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaint($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepos($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDeposacum($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCapital($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTasa($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setInteres($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setInteresacum($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpintfidPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpintfidPeer::FECDESDE)) $criteria->add(NpintfidPeer::FECDESDE, $this->fecdesde);
		if ($this->isColumnModified(NpintfidPeer::FECHASTA)) $criteria->add(NpintfidPeer::FECHASTA, $this->fechasta);
		if ($this->isColumnModified(NpintfidPeer::CODEMP)) $criteria->add(NpintfidPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpintfidPeer::FECHAINT)) $criteria->add(NpintfidPeer::FECHAINT, $this->fechaint);
		if ($this->isColumnModified(NpintfidPeer::DEPOS)) $criteria->add(NpintfidPeer::DEPOS, $this->depos);
		if ($this->isColumnModified(NpintfidPeer::DEPOSACUM)) $criteria->add(NpintfidPeer::DEPOSACUM, $this->deposacum);
		if ($this->isColumnModified(NpintfidPeer::CAPITAL)) $criteria->add(NpintfidPeer::CAPITAL, $this->capital);
		if ($this->isColumnModified(NpintfidPeer::TASA)) $criteria->add(NpintfidPeer::TASA, $this->tasa);
		if ($this->isColumnModified(NpintfidPeer::INTERES)) $criteria->add(NpintfidPeer::INTERES, $this->interes);
		if ($this->isColumnModified(NpintfidPeer::INTERESACUM)) $criteria->add(NpintfidPeer::INTERESACUM, $this->interesacum);
		if ($this->isColumnModified(NpintfidPeer::ID)) $criteria->add(NpintfidPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpintfidPeer::DATABASE_NAME);

		$criteria->add(NpintfidPeer::ID, $this->id);

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

		$copyObj->setFecdesde($this->fecdesde);

		$copyObj->setFechasta($this->fechasta);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFechaint($this->fechaint);

		$copyObj->setDepos($this->depos);

		$copyObj->setDeposacum($this->deposacum);

		$copyObj->setCapital($this->capital);

		$copyObj->setTasa($this->tasa);

		$copyObj->setInteres($this->interes);

		$copyObj->setInteresacum($this->interesacum);


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
			self::$peer = new NpintfidPeer();
		}
		return self::$peer;
	}

} 