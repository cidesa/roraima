<?php


abstract class BaseCadetent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rcpart;


	
	protected $codart;


	
	protected $canrec;


	
	protected $montot;


	
	protected $cosart;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRcpart()
  {

    return trim($this->rcpart);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanrec($val=false)
  {

    if($val) return number_format($this->canrec,2,',','.');
    else return $this->canrec;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getCosart($val=false)
  {

    if($val) return number_format($this->cosart,2,',','.');
    else return $this->cosart;

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRcpart($v)
	{

    if ($this->rcpart !== $v) {
        $this->rcpart = $v;
        $this->modifiedColumns[] = CadetentPeer::RCPART;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CadetentPeer::CODART;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::CANREC;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::MONTOT;
      }
  
	} 
	
	public function setCosart($v)
	{

    if ($this->cosart !== $v) {
        $this->cosart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetentPeer::COSART;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadetentPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CadetentPeer::CODUBI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetentPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rcpart = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canrec = $rs->getFloat($startcol + 2);

      $this->montot = $rs->getFloat($startcol + 3);

      $this->cosart = $rs->getFloat($startcol + 4);

      $this->codalm = $rs->getString($startcol + 5);

      $this->codubi = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetent object", $e);
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
			$con = Propel::getConnection(CadetentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetentPeer::DATABASE_NAME);
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
					$pk = CadetentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetentPeer::doUpdate($this, $con);
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


			if (($retval = CadetentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRcpart();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanrec();
				break;
			case 3:
				return $this->getMontot();
				break;
			case 4:
				return $this->getCosart();
				break;
			case 5:
				return $this->getCodalm();
				break;
			case 6:
				return $this->getCodubi();
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
		$keys = CadetentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRcpart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanrec(),
			$keys[3] => $this->getMontot(),
			$keys[4] => $this->getCosart(),
			$keys[5] => $this->getCodalm(),
			$keys[6] => $this->getCodubi(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRcpart($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanrec($value);
				break;
			case 3:
				$this->setMontot($value);
				break;
			case 4:
				$this->setCosart($value);
				break;
			case 5:
				$this->setCodalm($value);
				break;
			case 6:
				$this->setCodubi($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRcpart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCosart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodalm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodubi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetentPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetentPeer::RCPART)) $criteria->add(CadetentPeer::RCPART, $this->rcpart);
		if ($this->isColumnModified(CadetentPeer::CODART)) $criteria->add(CadetentPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadetentPeer::CANREC)) $criteria->add(CadetentPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CadetentPeer::MONTOT)) $criteria->add(CadetentPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CadetentPeer::COSART)) $criteria->add(CadetentPeer::COSART, $this->cosart);
		if ($this->isColumnModified(CadetentPeer::CODALM)) $criteria->add(CadetentPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadetentPeer::CODUBI)) $criteria->add(CadetentPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CadetentPeer::ID)) $criteria->add(CadetentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetentPeer::DATABASE_NAME);

		$criteria->add(CadetentPeer::ID, $this->id);

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

		$copyObj->setRcpart($this->rcpart);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setMontot($this->montot);

		$copyObj->setCosart($this->cosart);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);


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
			self::$peer = new CadetentPeer();
		}
		return self::$peer;
	}

} 