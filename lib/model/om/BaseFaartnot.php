<?php


abstract class BaseFaartnot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nronot;


	
	protected $codart;


	
	protected $codalm;


	
	protected $numlot;


	
	protected $cansol;


	
	protected $canent;


	
	protected $candes;


	
	protected $canaju;


	
	protected $candev;


	
	protected $cantot;


	
	protected $preart;


	
	protected $mondes;


	
	protected $monrgo;


	
	protected $totart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNronot()
  {

    return trim($this->nronot);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getNumlot()
  {

    return trim($this->numlot);

  }
  
  public function getCansol($val=false)
  {

    if($val) return number_format($this->cansol,2,',','.');
    else return $this->cansol;

  }
  
  public function getCanent($val=false)
  {

    if($val) return number_format($this->canent,2,',','.');
    else return $this->canent;

  }
  
  public function getCandes($val=false)
  {

    if($val) return number_format($this->candes,2,',','.');
    else return $this->candes;

  }
  
  public function getCanaju($val=false)
  {

    if($val) return number_format($this->canaju,2,',','.');
    else return $this->canaju;

  }
  
  public function getCandev($val=false)
  {

    if($val) return number_format($this->candev,2,',','.');
    else return $this->candev;

  }
  
  public function getCantot($val=false)
  {

    if($val) return number_format($this->cantot,2,',','.');
    else return $this->cantot;

  }
  
  public function getPreart($val=false)
  {

    if($val) return number_format($this->preart,2,',','.');
    else return $this->preart;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getTotart($val=false)
  {

    if($val) return number_format($this->totart,2,',','.');
    else return $this->totart;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNronot($v)
	{

    if ($this->nronot !== $v) {
        $this->nronot = $v;
        $this->modifiedColumns[] = FaartnotPeer::NRONOT;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartnotPeer::CODART;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FaartnotPeer::CODALM;
      }
  
	} 
	
	public function setNumlot($v)
	{

    if ($this->numlot !== $v) {
        $this->numlot = $v;
        $this->modifiedColumns[] = FaartnotPeer::NUMLOT;
      }
  
	} 
	
	public function setCansol($v)
	{

    if ($this->cansol !== $v) {
        $this->cansol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::CANSOL;
      }
  
	} 
	
	public function setCanent($v)
	{

    if ($this->canent !== $v) {
        $this->canent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::CANENT;
      }
  
	} 
	
	public function setCandes($v)
	{

    if ($this->candes !== $v) {
        $this->candes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::CANDES;
      }
  
	} 
	
	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::CANAJU;
      }
  
	} 
	
	public function setCandev($v)
	{

    if ($this->candev !== $v) {
        $this->candev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::CANDEV;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::CANTOT;
      }
  
	} 
	
	public function setPreart($v)
	{

    if ($this->preart !== $v) {
        $this->preart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::PREART;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::MONDES;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::MONRGO;
      }
  
	} 
	
	public function setTotart($v)
	{

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartnotPeer::TOTART;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartnotPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nronot = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codalm = $rs->getString($startcol + 2);

      $this->numlot = $rs->getString($startcol + 3);

      $this->cansol = $rs->getFloat($startcol + 4);

      $this->canent = $rs->getFloat($startcol + 5);

      $this->candes = $rs->getFloat($startcol + 6);

      $this->canaju = $rs->getFloat($startcol + 7);

      $this->candev = $rs->getFloat($startcol + 8);

      $this->cantot = $rs->getFloat($startcol + 9);

      $this->preart = $rs->getFloat($startcol + 10);

      $this->mondes = $rs->getFloat($startcol + 11);

      $this->monrgo = $rs->getFloat($startcol + 12);

      $this->totart = $rs->getFloat($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartnot object", $e);
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
			$con = Propel::getConnection(FaartnotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartnotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartnotPeer::DATABASE_NAME);
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
					$pk = FaartnotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartnotPeer::doUpdate($this, $con);
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


			if (($retval = FaartnotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartnotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNronot();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodalm();
				break;
			case 3:
				return $this->getNumlot();
				break;
			case 4:
				return $this->getCansol();
				break;
			case 5:
				return $this->getCanent();
				break;
			case 6:
				return $this->getCandes();
				break;
			case 7:
				return $this->getCanaju();
				break;
			case 8:
				return $this->getCandev();
				break;
			case 9:
				return $this->getCantot();
				break;
			case 10:
				return $this->getPreart();
				break;
			case 11:
				return $this->getMondes();
				break;
			case 12:
				return $this->getMonrgo();
				break;
			case 13:
				return $this->getTotart();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartnotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNronot(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodalm(),
			$keys[3] => $this->getNumlot(),
			$keys[4] => $this->getCansol(),
			$keys[5] => $this->getCanent(),
			$keys[6] => $this->getCandes(),
			$keys[7] => $this->getCanaju(),
			$keys[8] => $this->getCandev(),
			$keys[9] => $this->getCantot(),
			$keys[10] => $this->getPreart(),
			$keys[11] => $this->getMondes(),
			$keys[12] => $this->getMonrgo(),
			$keys[13] => $this->getTotart(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartnotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNronot($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodalm($value);
				break;
			case 3:
				$this->setNumlot($value);
				break;
			case 4:
				$this->setCansol($value);
				break;
			case 5:
				$this->setCanent($value);
				break;
			case 6:
				$this->setCandes($value);
				break;
			case 7:
				$this->setCanaju($value);
				break;
			case 8:
				$this->setCandev($value);
				break;
			case 9:
				$this->setCantot($value);
				break;
			case 10:
				$this->setPreart($value);
				break;
			case 11:
				$this->setMondes($value);
				break;
			case 12:
				$this->setMonrgo($value);
				break;
			case 13:
				$this->setTotart($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartnotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNronot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodalm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumlot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCansol($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanent($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCandes($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCanaju($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCandev($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCantot($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPreart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMondes($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonrgo($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTotart($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartnotPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartnotPeer::NRONOT)) $criteria->add(FaartnotPeer::NRONOT, $this->nronot);
		if ($this->isColumnModified(FaartnotPeer::CODART)) $criteria->add(FaartnotPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartnotPeer::CODALM)) $criteria->add(FaartnotPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FaartnotPeer::NUMLOT)) $criteria->add(FaartnotPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(FaartnotPeer::CANSOL)) $criteria->add(FaartnotPeer::CANSOL, $this->cansol);
		if ($this->isColumnModified(FaartnotPeer::CANENT)) $criteria->add(FaartnotPeer::CANENT, $this->canent);
		if ($this->isColumnModified(FaartnotPeer::CANDES)) $criteria->add(FaartnotPeer::CANDES, $this->candes);
		if ($this->isColumnModified(FaartnotPeer::CANAJU)) $criteria->add(FaartnotPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(FaartnotPeer::CANDEV)) $criteria->add(FaartnotPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(FaartnotPeer::CANTOT)) $criteria->add(FaartnotPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(FaartnotPeer::PREART)) $criteria->add(FaartnotPeer::PREART, $this->preart);
		if ($this->isColumnModified(FaartnotPeer::MONDES)) $criteria->add(FaartnotPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(FaartnotPeer::MONRGO)) $criteria->add(FaartnotPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FaartnotPeer::TOTART)) $criteria->add(FaartnotPeer::TOTART, $this->totart);
		if ($this->isColumnModified(FaartnotPeer::ID)) $criteria->add(FaartnotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartnotPeer::DATABASE_NAME);

		$criteria->add(FaartnotPeer::ID, $this->id);

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

		$copyObj->setNronot($this->nronot);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setNumlot($this->numlot);

		$copyObj->setCansol($this->cansol);

		$copyObj->setCanent($this->canent);

		$copyObj->setCandes($this->candes);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setCandev($this->candev);

		$copyObj->setCantot($this->cantot);

		$copyObj->setPreart($this->preart);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTotart($this->totart);


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
			self::$peer = new FaartnotPeer();
		}
		return self::$peer;
	}

} 