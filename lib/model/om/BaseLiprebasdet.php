<?php


abstract class BaseLiprebasdet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpre;


	
	protected $codart;


	
	protected $codcat;


	
	protected $codpre;


	
	protected $unimed;


	
	protected $cansol;


	
	protected $canapr;


	
	protected $costo;


	
	protected $subtot;


	
	protected $monrec;


	
	protected $montot;


	
	protected $status;


	
	protected $codmon;


	
	protected $valcam;


	
	protected $codfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpre()
  {

    return trim($this->numpre);

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
  
  public function getCanapr($val=false)
  {

    if($val) return number_format($this->canapr,2,',','.');
    else return $this->canapr;

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
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::NUMPRE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::CODART;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::CODCAT;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::CODPRE;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::UNIMED;
      }
  
	} 
	
	public function setCansol($v)
	{

    if ($this->cansol !== $v) {
        $this->cansol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::CANSOL;
      }
  
	} 
	
	public function setCanapr($v)
	{

    if ($this->canapr !== $v) {
        $this->canapr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::CANAPR;
      }
  
	} 
	
	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::COSTO;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::SUBTOT;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::MONREC;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::MONTOT;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::STATUS;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::CODMON;
      }
  
	} 
	
	public function setValcam($v)
	{

    if ($this->valcam !== $v) {
        $this->valcam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprebasdetPeer::VALCAM;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::CODFIN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiprebasdetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpre = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->codpre = $rs->getString($startcol + 3);

      $this->unimed = $rs->getString($startcol + 4);

      $this->cansol = $rs->getFloat($startcol + 5);

      $this->canapr = $rs->getFloat($startcol + 6);

      $this->costo = $rs->getFloat($startcol + 7);

      $this->subtot = $rs->getFloat($startcol + 8);

      $this->monrec = $rs->getFloat($startcol + 9);

      $this->montot = $rs->getFloat($startcol + 10);

      $this->status = $rs->getString($startcol + 11);

      $this->codmon = $rs->getString($startcol + 12);

      $this->valcam = $rs->getFloat($startcol + 13);

      $this->codfin = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liprebasdet object", $e);
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
			$con = Propel::getConnection(LiprebasdetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiprebasdetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiprebasdetPeer::DATABASE_NAME);
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
					$pk = LiprebasdetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiprebasdetPeer::doUpdate($this, $con);
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


			if (($retval = LiprebasdetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiprebasdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpre();
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
				return $this->getCanapr();
				break;
			case 7:
				return $this->getCosto();
				break;
			case 8:
				return $this->getSubtot();
				break;
			case 9:
				return $this->getMonrec();
				break;
			case 10:
				return $this->getMontot();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getCodmon();
				break;
			case 13:
				return $this->getValcam();
				break;
			case 14:
				return $this->getCodfin();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiprebasdetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCodpre(),
			$keys[4] => $this->getUnimed(),
			$keys[5] => $this->getCansol(),
			$keys[6] => $this->getCanapr(),
			$keys[7] => $this->getCosto(),
			$keys[8] => $this->getSubtot(),
			$keys[9] => $this->getMonrec(),
			$keys[10] => $this->getMontot(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getCodmon(),
			$keys[13] => $this->getValcam(),
			$keys[14] => $this->getCodfin(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiprebasdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpre($value);
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
				$this->setCanapr($value);
				break;
			case 7:
				$this->setCosto($value);
				break;
			case 8:
				$this->setSubtot($value);
				break;
			case 9:
				$this->setMonrec($value);
				break;
			case 10:
				$this->setMontot($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setCodmon($value);
				break;
			case 13:
				$this->setValcam($value);
				break;
			case 14:
				$this->setCodfin($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiprebasdetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUnimed($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCansol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanapr($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCosto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSubtot($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMontot($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodmon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setValcam($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodfin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiprebasdetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiprebasdetPeer::NUMPRE)) $criteria->add(LiprebasdetPeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(LiprebasdetPeer::CODART)) $criteria->add(LiprebasdetPeer::CODART, $this->codart);
		if ($this->isColumnModified(LiprebasdetPeer::CODCAT)) $criteria->add(LiprebasdetPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(LiprebasdetPeer::CODPRE)) $criteria->add(LiprebasdetPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(LiprebasdetPeer::UNIMED)) $criteria->add(LiprebasdetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LiprebasdetPeer::CANSOL)) $criteria->add(LiprebasdetPeer::CANSOL, $this->cansol);
		if ($this->isColumnModified(LiprebasdetPeer::CANAPR)) $criteria->add(LiprebasdetPeer::CANAPR, $this->canapr);
		if ($this->isColumnModified(LiprebasdetPeer::COSTO)) $criteria->add(LiprebasdetPeer::COSTO, $this->costo);
		if ($this->isColumnModified(LiprebasdetPeer::SUBTOT)) $criteria->add(LiprebasdetPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiprebasdetPeer::MONREC)) $criteria->add(LiprebasdetPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiprebasdetPeer::MONTOT)) $criteria->add(LiprebasdetPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(LiprebasdetPeer::STATUS)) $criteria->add(LiprebasdetPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiprebasdetPeer::CODMON)) $criteria->add(LiprebasdetPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(LiprebasdetPeer::VALCAM)) $criteria->add(LiprebasdetPeer::VALCAM, $this->valcam);
		if ($this->isColumnModified(LiprebasdetPeer::CODFIN)) $criteria->add(LiprebasdetPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(LiprebasdetPeer::ID)) $criteria->add(LiprebasdetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiprebasdetPeer::DATABASE_NAME);

		$criteria->add(LiprebasdetPeer::ID, $this->id);

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

		$copyObj->setNumpre($this->numpre);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCansol($this->cansol);

		$copyObj->setCanapr($this->canapr);

		$copyObj->setCosto($this->costo);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setMontot($this->montot);

		$copyObj->setStatus($this->status);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValcam($this->valcam);

		$copyObj->setCodfin($this->codfin);


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
			self::$peer = new LiprebasdetPeer();
		}
		return self::$peer;
	}

} 