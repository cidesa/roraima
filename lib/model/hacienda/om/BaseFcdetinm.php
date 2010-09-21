<?php


abstract class BaseFcdetinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroinm;


	
	protected $anoava;


	
	protected $codest;


	
	protected $codzon;


	
	protected $codtip;


	
	protected $anocon;


	
	protected $valter;


	
	protected $valcon;


	
	protected $mtrter;


	
	protected $mtrcon;


	
	protected $dprcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroinm()
  {

    return trim($this->nroinm);

  }
  
  public function getAnoava()
  {

    return trim($this->anoava);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodzon()
  {

    return trim($this->codzon);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getAnocon()
  {

    return trim($this->anocon);

  }
  
  public function getValter($val=false)
  {

    if($val) return number_format($this->valter,2,',','.');
    else return $this->valter;

  }
  
  public function getValcon($val=false)
  {

    if($val) return number_format($this->valcon,2,',','.');
    else return $this->valcon;

  }
  
  public function getMtrter($val=false)
  {

    if($val) return number_format($this->mtrter,2,',','.');
    else return $this->mtrter;

  }
  
  public function getMtrcon($val=false)
  {

    if($val) return number_format($this->mtrcon,2,',','.');
    else return $this->mtrcon;

  }
  
  public function getDprcon($val=false)
  {

    if($val) return number_format($this->dprcon,2,',','.');
    else return $this->dprcon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroinm($v)
	{

    if ($this->nroinm !== $v) {
        $this->nroinm = $v;
        $this->modifiedColumns[] = FcdetinmPeer::NROINM;
      }
  
	} 
	
	public function setAnoava($v)
	{

    if ($this->anoava !== $v) {
        $this->anoava = $v;
        $this->modifiedColumns[] = FcdetinmPeer::ANOAVA;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = FcdetinmPeer::CODEST;
      }
  
	} 
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = $v;
        $this->modifiedColumns[] = FcdetinmPeer::CODZON;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = FcdetinmPeer::CODTIP;
      }
  
	} 
	
	public function setAnocon($v)
	{

    if ($this->anocon !== $v) {
        $this->anocon = $v;
        $this->modifiedColumns[] = FcdetinmPeer::ANOCON;
      }
  
	} 
	
	public function setValter($v)
	{

    if ($this->valter !== $v) {
        $this->valter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetinmPeer::VALTER;
      }
  
	} 
	
	public function setValcon($v)
	{

    if ($this->valcon !== $v) {
        $this->valcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetinmPeer::VALCON;
      }
  
	} 
	
	public function setMtrter($v)
	{

    if ($this->mtrter !== $v) {
        $this->mtrter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetinmPeer::MTRTER;
      }
  
	} 
	
	public function setMtrcon($v)
	{

    if ($this->mtrcon !== $v) {
        $this->mtrcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetinmPeer::MTRCON;
      }
  
	} 
	
	public function setDprcon($v)
	{

    if ($this->dprcon !== $v) {
        $this->dprcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetinmPeer::DPRCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroinm = $rs->getString($startcol + 0);

      $this->anoava = $rs->getString($startcol + 1);

      $this->codest = $rs->getString($startcol + 2);

      $this->codzon = $rs->getString($startcol + 3);

      $this->codtip = $rs->getString($startcol + 4);

      $this->anocon = $rs->getString($startcol + 5);

      $this->valter = $rs->getFloat($startcol + 6);

      $this->valcon = $rs->getFloat($startcol + 7);

      $this->mtrter = $rs->getFloat($startcol + 8);

      $this->mtrcon = $rs->getFloat($startcol + 9);

      $this->dprcon = $rs->getFloat($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetinm object", $e);
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
			$con = Propel::getConnection(FcdetinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetinmPeer::DATABASE_NAME);
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
					$pk = FcdetinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetinmPeer::doUpdate($this, $con);
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


			if (($retval = FcdetinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroinm();
				break;
			case 1:
				return $this->getAnoava();
				break;
			case 2:
				return $this->getCodest();
				break;
			case 3:
				return $this->getCodzon();
				break;
			case 4:
				return $this->getCodtip();
				break;
			case 5:
				return $this->getAnocon();
				break;
			case 6:
				return $this->getValter();
				break;
			case 7:
				return $this->getValcon();
				break;
			case 8:
				return $this->getMtrter();
				break;
			case 9:
				return $this->getMtrcon();
				break;
			case 10:
				return $this->getDprcon();
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
		$keys = FcdetinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroinm(),
			$keys[1] => $this->getAnoava(),
			$keys[2] => $this->getCodest(),
			$keys[3] => $this->getCodzon(),
			$keys[4] => $this->getCodtip(),
			$keys[5] => $this->getAnocon(),
			$keys[6] => $this->getValter(),
			$keys[7] => $this->getValcon(),
			$keys[8] => $this->getMtrter(),
			$keys[9] => $this->getMtrcon(),
			$keys[10] => $this->getDprcon(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroinm($value);
				break;
			case 1:
				$this->setAnoava($value);
				break;
			case 2:
				$this->setCodest($value);
				break;
			case 3:
				$this->setCodzon($value);
				break;
			case 4:
				$this->setCodtip($value);
				break;
			case 5:
				$this->setAnocon($value);
				break;
			case 6:
				$this->setValter($value);
				break;
			case 7:
				$this->setValcon($value);
				break;
			case 8:
				$this->setMtrter($value);
				break;
			case 9:
				$this->setMtrcon($value);
				break;
			case 10:
				$this->setDprcon($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnoava($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodzon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtip($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnocon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setValter($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setValcon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMtrter($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMtrcon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDprcon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetinmPeer::NROINM)) $criteria->add(FcdetinmPeer::NROINM, $this->nroinm);
		if ($this->isColumnModified(FcdetinmPeer::ANOAVA)) $criteria->add(FcdetinmPeer::ANOAVA, $this->anoava);
		if ($this->isColumnModified(FcdetinmPeer::CODEST)) $criteria->add(FcdetinmPeer::CODEST, $this->codest);
		if ($this->isColumnModified(FcdetinmPeer::CODZON)) $criteria->add(FcdetinmPeer::CODZON, $this->codzon);
		if ($this->isColumnModified(FcdetinmPeer::CODTIP)) $criteria->add(FcdetinmPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FcdetinmPeer::ANOCON)) $criteria->add(FcdetinmPeer::ANOCON, $this->anocon);
		if ($this->isColumnModified(FcdetinmPeer::VALTER)) $criteria->add(FcdetinmPeer::VALTER, $this->valter);
		if ($this->isColumnModified(FcdetinmPeer::VALCON)) $criteria->add(FcdetinmPeer::VALCON, $this->valcon);
		if ($this->isColumnModified(FcdetinmPeer::MTRTER)) $criteria->add(FcdetinmPeer::MTRTER, $this->mtrter);
		if ($this->isColumnModified(FcdetinmPeer::MTRCON)) $criteria->add(FcdetinmPeer::MTRCON, $this->mtrcon);
		if ($this->isColumnModified(FcdetinmPeer::DPRCON)) $criteria->add(FcdetinmPeer::DPRCON, $this->dprcon);
		if ($this->isColumnModified(FcdetinmPeer::ID)) $criteria->add(FcdetinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetinmPeer::DATABASE_NAME);

		$criteria->add(FcdetinmPeer::ID, $this->id);

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

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setAnoava($this->anoava);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodzon($this->codzon);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setAnocon($this->anocon);

		$copyObj->setValter($this->valter);

		$copyObj->setValcon($this->valcon);

		$copyObj->setMtrter($this->mtrter);

		$copyObj->setMtrcon($this->mtrcon);

		$copyObj->setDprcon($this->dprcon);


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
			self::$peer = new FcdetinmPeer();
		}
		return self::$peer;
	}

} 