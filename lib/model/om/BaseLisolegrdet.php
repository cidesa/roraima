<?php


abstract class BaseLisolegrdet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $codart;


	
	protected $codcat;


	
	protected $codpre;


	
	protected $unimed;


	
	protected $cansol;


	
	protected $costo;


	
	protected $subtot;


	
	protected $monrec;


	
	protected $montot;


	
	protected $status;


	
	protected $codmon;


	
	protected $valcam;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getCansol($val=false)
  {

    if($val) return number_format($this->cansol,2,',','.');
    else return $this->cansol;

  }
  
  public function getCosto($val=false)
  {

    if($val) return number_format($this->costo,2,',','.');
    else return $this->costo;

  }
  
  public function getSubtot($val=false)
  {

    if($val) return number_format($this->subtot,2,',','.');
    else return $this->subtot;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValcam($val=false)
  {

    if($val) return number_format($this->valcam,2,',','.');
    else return $this->valcam;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::NUMSOL;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::CODART;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::CODCAT;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::CODPRE;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::UNIMED;
      }
  
	} 
	
	public function setCansol($v)
	{

    if ($this->cansol !== $v) {
        $this->cansol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrdetPeer::CANSOL;
      }
  
	} 
	
	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrdetPeer::COSTO;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrdetPeer::SUBTOT;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrdetPeer::MONREC;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrdetPeer::MONTOT;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::STATUS;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::CODMON;
      }
  
	} 
	
	public function setValcam($v)
	{

    if ($this->valcam !== $v) {
        $this->valcam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrdetPeer::VALCAM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LisolegrdetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->codpre = $rs->getString($startcol + 3);

      $this->unimed = $rs->getString($startcol + 4);

      $this->cansol = $rs->getFloat($startcol + 5);

      $this->costo = $rs->getFloat($startcol + 6);

      $this->subtot = $rs->getFloat($startcol + 7);

      $this->monrec = $rs->getFloat($startcol + 8);

      $this->montot = $rs->getFloat($startcol + 9);

      $this->status = $rs->getString($startcol + 10);

      $this->codmon = $rs->getString($startcol + 11);

      $this->valcam = $rs->getFloat($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lisolegrdet object", $e);
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
			$con = Propel::getConnection(LisolegrdetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LisolegrdetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LisolegrdetPeer::DATABASE_NAME);
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
					$pk = LisolegrdetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LisolegrdetPeer::doUpdate($this, $con);
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


			if (($retval = LisolegrdetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolegrdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCodpre();
				break;
			case 4:
				return $this->getUnimed();
				break;
			case 5:
				return $this->getCansol();
				break;
			case 6:
				return $this->getCosto();
				break;
			case 7:
				return $this->getSubtot();
				break;
			case 8:
				return $this->getMonrec();
				break;
			case 9:
				return $this->getMontot();
				break;
			case 10:
				return $this->getStatus();
				break;
			case 11:
				return $this->getCodmon();
				break;
			case 12:
				return $this->getValcam();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolegrdetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCodpre(),
			$keys[4] => $this->getUnimed(),
			$keys[5] => $this->getCansol(),
			$keys[6] => $this->getCosto(),
			$keys[7] => $this->getSubtot(),
			$keys[8] => $this->getMonrec(),
			$keys[9] => $this->getMontot(),
			$keys[10] => $this->getStatus(),
			$keys[11] => $this->getCodmon(),
			$keys[12] => $this->getValcam(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolegrdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCodpre($value);
				break;
			case 4:
				$this->setUnimed($value);
				break;
			case 5:
				$this->setCansol($value);
				break;
			case 6:
				$this->setCosto($value);
				break;
			case 7:
				$this->setSubtot($value);
				break;
			case 8:
				$this->setMonrec($value);
				break;
			case 9:
				$this->setMontot($value);
				break;
			case 10:
				$this->setStatus($value);
				break;
			case 11:
				$this->setCodmon($value);
				break;
			case 12:
				$this->setValcam($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolegrdetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUnimed($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCansol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCosto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSubtot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMontot($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStatus($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setValcam($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LisolegrdetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LisolegrdetPeer::NUMSOL)) $criteria->add(LisolegrdetPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(LisolegrdetPeer::CODART)) $criteria->add(LisolegrdetPeer::CODART, $this->codart);
		if ($this->isColumnModified(LisolegrdetPeer::CODCAT)) $criteria->add(LisolegrdetPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(LisolegrdetPeer::CODPRE)) $criteria->add(LisolegrdetPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(LisolegrdetPeer::UNIMED)) $criteria->add(LisolegrdetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LisolegrdetPeer::CANSOL)) $criteria->add(LisolegrdetPeer::CANSOL, $this->cansol);
		if ($this->isColumnModified(LisolegrdetPeer::COSTO)) $criteria->add(LisolegrdetPeer::COSTO, $this->costo);
		if ($this->isColumnModified(LisolegrdetPeer::SUBTOT)) $criteria->add(LisolegrdetPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LisolegrdetPeer::MONREC)) $criteria->add(LisolegrdetPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LisolegrdetPeer::MONTOT)) $criteria->add(LisolegrdetPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(LisolegrdetPeer::STATUS)) $criteria->add(LisolegrdetPeer::STATUS, $this->status);
		if ($this->isColumnModified(LisolegrdetPeer::CODMON)) $criteria->add(LisolegrdetPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(LisolegrdetPeer::VALCAM)) $criteria->add(LisolegrdetPeer::VALCAM, $this->valcam);
		if ($this->isColumnModified(LisolegrdetPeer::ID)) $criteria->add(LisolegrdetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LisolegrdetPeer::DATABASE_NAME);

		$criteria->add(LisolegrdetPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCansol($this->cansol);

		$copyObj->setCosto($this->costo);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setMontot($this->montot);

		$copyObj->setStatus($this->status);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValcam($this->valcam);


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
			self::$peer = new LisolegrdetPeer();
		}
		return self::$peer;
	}

} 