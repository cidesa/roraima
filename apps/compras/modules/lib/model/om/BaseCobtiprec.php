<?php


abstract class BaseCobtiprec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $desrec;


	
	protected $codcon;


	
	protected $tiprec;


	
	protected $valrec;


	
	protected $diarec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getDesrec()
  {

    return trim($this->desrec);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getTiprec()
  {

    return trim($this->tiprec);

  }
  
  public function getValrec($val=false)
  {

    if($val) return number_format($this->valrec,2,',','.');
    else return $this->valrec;

  }
  
  public function getDiarec($val=false)
  {

    if($val) return number_format($this->diarec,2,',','.');
    else return $this->diarec;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = CobtiprecPeer::CODREC;
      }
  
	} 
	
	public function setDesrec($v)
	{

    if ($this->desrec !== $v) {
        $this->desrec = $v;
        $this->modifiedColumns[] = CobtiprecPeer::DESREC;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = CobtiprecPeer::CODCON;
      }
  
	} 
	
	public function setTiprec($v)
	{

    if ($this->tiprec !== $v) {
        $this->tiprec = $v;
        $this->modifiedColumns[] = CobtiprecPeer::TIPREC;
      }
  
	} 
	
	public function setValrec($v)
	{

    if ($this->valrec !== $v) {
        $this->valrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobtiprecPeer::VALREC;
      }
  
	} 
	
	public function setDiarec($v)
	{

    if ($this->diarec !== $v) {
        $this->diarec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobtiprecPeer::DIAREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CobtiprecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrec = $rs->getString($startcol + 0);

      $this->desrec = $rs->getString($startcol + 1);

      $this->codcon = $rs->getString($startcol + 2);

      $this->tiprec = $rs->getString($startcol + 3);

      $this->valrec = $rs->getFloat($startcol + 4);

      $this->diarec = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cobtiprec object", $e);
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
			$con = Propel::getConnection(CobtiprecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobtiprecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobtiprecPeer::DATABASE_NAME);
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
					$pk = CobtiprecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CobtiprecPeer::doUpdate($this, $con);
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


			if (($retval = CobtiprecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtiprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getDesrec();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getTiprec();
				break;
			case 4:
				return $this->getValrec();
				break;
			case 5:
				return $this->getDiarec();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobtiprecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getDesrec(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getTiprec(),
			$keys[4] => $this->getValrec(),
			$keys[5] => $this->getDiarec(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobtiprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setDesrec($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setTiprec($value);
				break;
			case 4:
				$this->setValrec($value);
				break;
			case 5:
				$this->setDiarec($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobtiprecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTiprec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiarec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobtiprecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobtiprecPeer::CODREC)) $criteria->add(CobtiprecPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(CobtiprecPeer::DESREC)) $criteria->add(CobtiprecPeer::DESREC, $this->desrec);
		if ($this->isColumnModified(CobtiprecPeer::CODCON)) $criteria->add(CobtiprecPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(CobtiprecPeer::TIPREC)) $criteria->add(CobtiprecPeer::TIPREC, $this->tiprec);
		if ($this->isColumnModified(CobtiprecPeer::VALREC)) $criteria->add(CobtiprecPeer::VALREC, $this->valrec);
		if ($this->isColumnModified(CobtiprecPeer::DIAREC)) $criteria->add(CobtiprecPeer::DIAREC, $this->diarec);
		if ($this->isColumnModified(CobtiprecPeer::ID)) $criteria->add(CobtiprecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobtiprecPeer::DATABASE_NAME);

		$criteria->add(CobtiprecPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setDesrec($this->desrec);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setTiprec($this->tiprec);

		$copyObj->setValrec($this->valrec);

		$copyObj->setDiarec($this->diarec);


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
			self::$peer = new CobtiprecPeer();
		}
		return self::$peer;
	}

} 