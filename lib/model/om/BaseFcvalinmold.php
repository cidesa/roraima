<?php


abstract class BaseFcvalinmold extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codzon;


	
	protected $deszon;


	
	protected $codtip;


	
	protected $destip;


	
	protected $valmtr;


	
	protected $valfis;


	
	protected $alitip;


	
	protected $anual;


	
	protected $alitipt;


	
	protected $anualt;


	
	protected $anovig;


	
	protected $porvalfis;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodzon()
  {

    return trim($this->codzon);

  }
  
  public function getDeszon()
  {

    return trim($this->deszon);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getValmtr($val=false)
  {

    if($val) return number_format($this->valmtr,2,',','.');
    else return $this->valmtr;

  }
  
  public function getValfis($val=false)
  {

    if($val) return number_format($this->valfis,2,',','.');
    else return $this->valfis;

  }
  
  public function getAlitip($val=false)
  {

    if($val) return number_format($this->alitip,2,',','.');
    else return $this->alitip;

  }
  
  public function getAnual($val=false)
  {

    if($val) return number_format($this->anual,2,',','.');
    else return $this->anual;

  }
  
  public function getAlitipt($val=false)
  {

    if($val) return number_format($this->alitipt,2,',','.');
    else return $this->alitipt;

  }
  
  public function getAnualt($val=false)
  {

    if($val) return number_format($this->anualt,2,',','.');
    else return $this->anualt;

  }
  
  public function getAnovig()
  {

    return trim($this->anovig);

  }
  
  public function getPorvalfis($val=false)
  {

    if($val) return number_format($this->porvalfis,2,',','.');
    else return $this->porvalfis;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = $v;
        $this->modifiedColumns[] = FcvalinmoldPeer::CODZON;
      }
  
	} 
	
	public function setDeszon($v)
	{

    if ($this->deszon !== $v) {
        $this->deszon = $v;
        $this->modifiedColumns[] = FcvalinmoldPeer::DESZON;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = FcvalinmoldPeer::CODTIP;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = FcvalinmoldPeer::DESTIP;
      }
  
	} 
	
	public function setValmtr($v)
	{

    if ($this->valmtr !== $v) {
        $this->valmtr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::VALMTR;
      }
  
	} 
	
	public function setValfis($v)
	{

    if ($this->valfis !== $v) {
        $this->valfis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::VALFIS;
      }
  
	} 
	
	public function setAlitip($v)
	{

    if ($this->alitip !== $v) {
        $this->alitip = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::ALITIP;
      }
  
	} 
	
	public function setAnual($v)
	{

    if ($this->anual !== $v) {
        $this->anual = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::ANUAL;
      }
  
	} 
	
	public function setAlitipt($v)
	{

    if ($this->alitipt !== $v) {
        $this->alitipt = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::ALITIPT;
      }
  
	} 
	
	public function setAnualt($v)
	{

    if ($this->anualt !== $v) {
        $this->anualt = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::ANUALT;
      }
  
	} 
	
	public function setAnovig($v)
	{

    if ($this->anovig !== $v) {
        $this->anovig = $v;
        $this->modifiedColumns[] = FcvalinmoldPeer::ANOVIG;
      }
  
	} 
	
	public function setPorvalfis($v)
	{

    if ($this->porvalfis !== $v) {
        $this->porvalfis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcvalinmoldPeer::PORVALFIS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcvalinmoldPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codzon = $rs->getString($startcol + 0);

      $this->deszon = $rs->getString($startcol + 1);

      $this->codtip = $rs->getString($startcol + 2);

      $this->destip = $rs->getString($startcol + 3);

      $this->valmtr = $rs->getFloat($startcol + 4);

      $this->valfis = $rs->getFloat($startcol + 5);

      $this->alitip = $rs->getFloat($startcol + 6);

      $this->anual = $rs->getFloat($startcol + 7);

      $this->alitipt = $rs->getFloat($startcol + 8);

      $this->anualt = $rs->getFloat($startcol + 9);

      $this->anovig = $rs->getString($startcol + 10);

      $this->porvalfis = $rs->getFloat($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcvalinmold object", $e);
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
			$con = Propel::getConnection(FcvalinmoldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcvalinmoldPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcvalinmoldPeer::DATABASE_NAME);
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
					$pk = FcvalinmoldPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcvalinmoldPeer::doUpdate($this, $con);
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


			if (($retval = FcvalinmoldPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcvalinmoldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodzon();
				break;
			case 1:
				return $this->getDeszon();
				break;
			case 2:
				return $this->getCodtip();
				break;
			case 3:
				return $this->getDestip();
				break;
			case 4:
				return $this->getValmtr();
				break;
			case 5:
				return $this->getValfis();
				break;
			case 6:
				return $this->getAlitip();
				break;
			case 7:
				return $this->getAnual();
				break;
			case 8:
				return $this->getAlitipt();
				break;
			case 9:
				return $this->getAnualt();
				break;
			case 10:
				return $this->getAnovig();
				break;
			case 11:
				return $this->getPorvalfis();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcvalinmoldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodzon(),
			$keys[1] => $this->getDeszon(),
			$keys[2] => $this->getCodtip(),
			$keys[3] => $this->getDestip(),
			$keys[4] => $this->getValmtr(),
			$keys[5] => $this->getValfis(),
			$keys[6] => $this->getAlitip(),
			$keys[7] => $this->getAnual(),
			$keys[8] => $this->getAlitipt(),
			$keys[9] => $this->getAnualt(),
			$keys[10] => $this->getAnovig(),
			$keys[11] => $this->getPorvalfis(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcvalinmoldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodzon($value);
				break;
			case 1:
				$this->setDeszon($value);
				break;
			case 2:
				$this->setCodtip($value);
				break;
			case 3:
				$this->setDestip($value);
				break;
			case 4:
				$this->setValmtr($value);
				break;
			case 5:
				$this->setValfis($value);
				break;
			case 6:
				$this->setAlitip($value);
				break;
			case 7:
				$this->setAnual($value);
				break;
			case 8:
				$this->setAlitipt($value);
				break;
			case 9:
				$this->setAnualt($value);
				break;
			case 10:
				$this->setAnovig($value);
				break;
			case 11:
				$this->setPorvalfis($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcvalinmoldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodzon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDeszon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtip($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDestip($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValmtr($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setValfis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAlitip($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAnual($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAlitipt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAnualt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAnovig($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPorvalfis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcvalinmoldPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcvalinmoldPeer::CODZON)) $criteria->add(FcvalinmoldPeer::CODZON, $this->codzon);
		if ($this->isColumnModified(FcvalinmoldPeer::DESZON)) $criteria->add(FcvalinmoldPeer::DESZON, $this->deszon);
		if ($this->isColumnModified(FcvalinmoldPeer::CODTIP)) $criteria->add(FcvalinmoldPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FcvalinmoldPeer::DESTIP)) $criteria->add(FcvalinmoldPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(FcvalinmoldPeer::VALMTR)) $criteria->add(FcvalinmoldPeer::VALMTR, $this->valmtr);
		if ($this->isColumnModified(FcvalinmoldPeer::VALFIS)) $criteria->add(FcvalinmoldPeer::VALFIS, $this->valfis);
		if ($this->isColumnModified(FcvalinmoldPeer::ALITIP)) $criteria->add(FcvalinmoldPeer::ALITIP, $this->alitip);
		if ($this->isColumnModified(FcvalinmoldPeer::ANUAL)) $criteria->add(FcvalinmoldPeer::ANUAL, $this->anual);
		if ($this->isColumnModified(FcvalinmoldPeer::ALITIPT)) $criteria->add(FcvalinmoldPeer::ALITIPT, $this->alitipt);
		if ($this->isColumnModified(FcvalinmoldPeer::ANUALT)) $criteria->add(FcvalinmoldPeer::ANUALT, $this->anualt);
		if ($this->isColumnModified(FcvalinmoldPeer::ANOVIG)) $criteria->add(FcvalinmoldPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FcvalinmoldPeer::PORVALFIS)) $criteria->add(FcvalinmoldPeer::PORVALFIS, $this->porvalfis);
		if ($this->isColumnModified(FcvalinmoldPeer::ID)) $criteria->add(FcvalinmoldPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcvalinmoldPeer::DATABASE_NAME);

		$criteria->add(FcvalinmoldPeer::ID, $this->id);

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

		$copyObj->setCodzon($this->codzon);

		$copyObj->setDeszon($this->deszon);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDestip($this->destip);

		$copyObj->setValmtr($this->valmtr);

		$copyObj->setValfis($this->valfis);

		$copyObj->setAlitip($this->alitip);

		$copyObj->setAnual($this->anual);

		$copyObj->setAlitipt($this->alitipt);

		$copyObj->setAnualt($this->anualt);

		$copyObj->setAnovig($this->anovig);

		$copyObj->setPorvalfis($this->porvalfis);


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
			self::$peer = new FcvalinmoldPeer();
		}
		return self::$peer;
	}

} 