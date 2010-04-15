<?php


abstract class BaseCpdisniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $monasi;


	
	protected $modificacion;


	
	protected $asigactual;


	
	protected $monprc;


	
	protected $moncom;


	
	protected $moncau;


	
	protected $monpag;


	
	protected $monaju;


	
	protected $mondis;


	
	protected $deuda;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonasi($val=false)
  {

    if($val) return number_format($this->monasi,2,',','.');
    else return $this->monasi;

  }
  
  public function getModificacion($val=false)
  {

    if($val) return number_format($this->modificacion,2,',','.');
    else return $this->modificacion;

  }
  
  public function getAsigactual($val=false)
  {

    if($val) return number_format($this->asigactual,2,',','.');
    else return $this->asigactual;

  }
  
  public function getMonprc($val=false)
  {

    if($val) return number_format($this->monprc,2,',','.');
    else return $this->monprc;

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getMoncau($val=false)
  {

    if($val) return number_format($this->moncau,2,',','.');
    else return $this->moncau;

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
  public function getMondis($val=false)
  {

    if($val) return number_format($this->mondis,2,',','.');
    else return $this->mondis;

  }
  
  public function getDeuda($val=false)
  {

    if($val) return number_format($this->deuda,2,',','.');
    else return $this->deuda;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpdisnivPeer::CODPRE;
      }
  
	} 
	
	public function setMonasi($v)
	{

    if ($this->monasi !== $v) {
        $this->monasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONASI;
      }
  
	} 
	
	public function setModificacion($v)
	{

    if ($this->modificacion !== $v) {
        $this->modificacion = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MODIFICACION;
      }
  
	} 
	
	public function setAsigactual($v)
	{

    if ($this->asigactual !== $v) {
        $this->asigactual = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::ASIGACTUAL;
      }
  
	} 
	
	public function setMonprc($v)
	{

    if ($this->monprc !== $v) {
        $this->monprc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONPRC;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONCOM;
      }
  
	} 
	
	public function setMoncau($v)
	{

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONCAU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONPAG;
      }
  
	} 
	
	public function setMonaju($v)
	{

    if ($this->monaju !== $v) {
        $this->monaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONAJU;
      }
  
	} 
	
	public function setMondis($v)
	{

    if ($this->mondis !== $v) {
        $this->mondis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::MONDIS;
      }
  
	} 
	
	public function setDeuda($v)
	{

    if ($this->deuda !== $v) {
        $this->deuda = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisnivPeer::DEUDA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdisnivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpre = $rs->getString($startcol + 0);

      $this->monasi = $rs->getFloat($startcol + 1);

      $this->modificacion = $rs->getFloat($startcol + 2);

      $this->asigactual = $rs->getFloat($startcol + 3);

      $this->monprc = $rs->getFloat($startcol + 4);

      $this->moncom = $rs->getFloat($startcol + 5);

      $this->moncau = $rs->getFloat($startcol + 6);

      $this->monpag = $rs->getFloat($startcol + 7);

      $this->monaju = $rs->getFloat($startcol + 8);

      $this->mondis = $rs->getFloat($startcol + 9);

      $this->deuda = $rs->getFloat($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdisniv object", $e);
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
			$con = Propel::getConnection(CpdisnivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdisnivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdisnivPeer::DATABASE_NAME);
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
					$pk = CpdisnivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpdisnivPeer::doUpdate($this, $con);
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


			if (($retval = CpdisnivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdisnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getMonasi();
				break;
			case 2:
				return $this->getModificacion();
				break;
			case 3:
				return $this->getAsigactual();
				break;
			case 4:
				return $this->getMonprc();
				break;
			case 5:
				return $this->getMoncom();
				break;
			case 6:
				return $this->getMoncau();
				break;
			case 7:
				return $this->getMonpag();
				break;
			case 8:
				return $this->getMonaju();
				break;
			case 9:
				return $this->getMondis();
				break;
			case 10:
				return $this->getDeuda();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdisnivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getMonasi(),
			$keys[2] => $this->getModificacion(),
			$keys[3] => $this->getAsigactual(),
			$keys[4] => $this->getMonprc(),
			$keys[5] => $this->getMoncom(),
			$keys[6] => $this->getMoncau(),
			$keys[7] => $this->getMonpag(),
			$keys[8] => $this->getMonaju(),
			$keys[9] => $this->getMondis(),
			$keys[10] => $this->getDeuda(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdisnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setMonasi($value);
				break;
			case 2:
				$this->setModificacion($value);
				break;
			case 3:
				$this->setAsigactual($value);
				break;
			case 4:
				$this->setMonprc($value);
				break;
			case 5:
				$this->setMoncom($value);
				break;
			case 6:
				$this->setMoncau($value);
				break;
			case 7:
				$this->setMonpag($value);
				break;
			case 8:
				$this->setMonaju($value);
				break;
			case 9:
				$this->setMondis($value);
				break;
			case 10:
				$this->setDeuda($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdisnivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonasi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setModificacion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAsigactual($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMoncau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonaju($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMondis($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDeuda($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdisnivPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdisnivPeer::CODPRE)) $criteria->add(CpdisnivPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpdisnivPeer::MONASI)) $criteria->add(CpdisnivPeer::MONASI, $this->monasi);
		if ($this->isColumnModified(CpdisnivPeer::MODIFICACION)) $criteria->add(CpdisnivPeer::MODIFICACION, $this->modificacion);
		if ($this->isColumnModified(CpdisnivPeer::ASIGACTUAL)) $criteria->add(CpdisnivPeer::ASIGACTUAL, $this->asigactual);
		if ($this->isColumnModified(CpdisnivPeer::MONPRC)) $criteria->add(CpdisnivPeer::MONPRC, $this->monprc);
		if ($this->isColumnModified(CpdisnivPeer::MONCOM)) $criteria->add(CpdisnivPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(CpdisnivPeer::MONCAU)) $criteria->add(CpdisnivPeer::MONCAU, $this->moncau);
		if ($this->isColumnModified(CpdisnivPeer::MONPAG)) $criteria->add(CpdisnivPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CpdisnivPeer::MONAJU)) $criteria->add(CpdisnivPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpdisnivPeer::MONDIS)) $criteria->add(CpdisnivPeer::MONDIS, $this->mondis);
		if ($this->isColumnModified(CpdisnivPeer::DEUDA)) $criteria->add(CpdisnivPeer::DEUDA, $this->deuda);
		if ($this->isColumnModified(CpdisnivPeer::ID)) $criteria->add(CpdisnivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdisnivPeer::DATABASE_NAME);

		$criteria->add(CpdisnivPeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setModificacion($this->modificacion);

		$copyObj->setAsigactual($this->asigactual);

		$copyObj->setMonprc($this->monprc);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setMoncau($this->moncau);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setMondis($this->mondis);

		$copyObj->setDeuda($this->deuda);


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
			self::$peer = new CpdisnivPeer();
		}
		return self::$peer;
	}

} 