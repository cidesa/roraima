<?php


abstract class BaseAtdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $faxemp;


	
	protected $emaemp;


	
	protected $percon;


	
	protected $repleg;


	
	protected $preasi;


	
	protected $monlimben;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getFaxemp()
  {

    return trim($this->faxemp);

  }
  
  public function getEmaemp()
  {

    return trim($this->emaemp);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getRepleg()
  {

    return trim($this->repleg);

  }
  
  public function getPreasi($val=false)
  {

    if($val) return number_format($this->preasi,2,',','.');
    else return $this->preasi;

  }
  
  public function getMonlimben($val=false)
  {

    if($val) return number_format($this->monlimben,2,',','.');
    else return $this->monlimben;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = AtdefempPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = AtdefempPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = AtdefempPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = AtdefempPeer::TELEMP;
      }
  
	} 
	
	public function setFaxemp($v)
	{

    if ($this->faxemp !== $v) {
        $this->faxemp = $v;
        $this->modifiedColumns[] = AtdefempPeer::FAXEMP;
      }
  
	} 
	
	public function setEmaemp($v)
	{

    if ($this->emaemp !== $v) {
        $this->emaemp = $v;
        $this->modifiedColumns[] = AtdefempPeer::EMAEMP;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = AtdefempPeer::PERCON;
      }
  
	} 
	
	public function setRepleg($v)
	{

    if ($this->repleg !== $v) {
        $this->repleg = $v;
        $this->modifiedColumns[] = AtdefempPeer::REPLEG;
      }
  
	} 
	
	public function setPreasi($v)
	{

    if ($this->preasi !== $v) {
        $this->preasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtdefempPeer::PREASI;
      }
  
	} 
	
	public function setMonlimben($v)
	{

    if ($this->monlimben !== $v) {
        $this->monlimben = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtdefempPeer::MONLIMBEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdefempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomemp = $rs->getString($startcol + 1);

      $this->diremp = $rs->getString($startcol + 2);

      $this->telemp = $rs->getString($startcol + 3);

      $this->faxemp = $rs->getString($startcol + 4);

      $this->emaemp = $rs->getString($startcol + 5);

      $this->percon = $rs->getString($startcol + 6);

      $this->repleg = $rs->getString($startcol + 7);

      $this->preasi = $rs->getFloat($startcol + 8);

      $this->monlimben = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdefemp object", $e);
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
			$con = Propel::getConnection(AtdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdefempPeer::DATABASE_NAME);
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
					$pk = AtdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdefempPeer::doUpdate($this, $con);
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


			if (($retval = AtdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getDiremp();
				break;
			case 3:
				return $this->getTelemp();
				break;
			case 4:
				return $this->getFaxemp();
				break;
			case 5:
				return $this->getEmaemp();
				break;
			case 6:
				return $this->getPercon();
				break;
			case 7:
				return $this->getRepleg();
				break;
			case 8:
				return $this->getPreasi();
				break;
			case 9:
				return $this->getMonlimben();
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
		$keys = AtdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getDiremp(),
			$keys[3] => $this->getTelemp(),
			$keys[4] => $this->getFaxemp(),
			$keys[5] => $this->getEmaemp(),
			$keys[6] => $this->getPercon(),
			$keys[7] => $this->getRepleg(),
			$keys[8] => $this->getPreasi(),
			$keys[9] => $this->getMonlimben(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setDiremp($value);
				break;
			case 3:
				$this->setTelemp($value);
				break;
			case 4:
				$this->setFaxemp($value);
				break;
			case 5:
				$this->setEmaemp($value);
				break;
			case 6:
				$this->setPercon($value);
				break;
			case 7:
				$this->setRepleg($value);
				break;
			case 8:
				$this->setPreasi($value);
				break;
			case 9:
				$this->setMonlimben($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiremp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmaemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPercon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRepleg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPreasi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonlimben($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdefempPeer::CODEMP)) $criteria->add(AtdefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(AtdefempPeer::NOMEMP)) $criteria->add(AtdefempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(AtdefempPeer::DIREMP)) $criteria->add(AtdefempPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(AtdefempPeer::TELEMP)) $criteria->add(AtdefempPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(AtdefempPeer::FAXEMP)) $criteria->add(AtdefempPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(AtdefempPeer::EMAEMP)) $criteria->add(AtdefempPeer::EMAEMP, $this->emaemp);
		if ($this->isColumnModified(AtdefempPeer::PERCON)) $criteria->add(AtdefempPeer::PERCON, $this->percon);
		if ($this->isColumnModified(AtdefempPeer::REPLEG)) $criteria->add(AtdefempPeer::REPLEG, $this->repleg);
		if ($this->isColumnModified(AtdefempPeer::PREASI)) $criteria->add(AtdefempPeer::PREASI, $this->preasi);
		if ($this->isColumnModified(AtdefempPeer::MONLIMBEN)) $criteria->add(AtdefempPeer::MONLIMBEN, $this->monlimben);
		if ($this->isColumnModified(AtdefempPeer::ID)) $criteria->add(AtdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdefempPeer::DATABASE_NAME);

		$criteria->add(AtdefempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setEmaemp($this->emaemp);

		$copyObj->setPercon($this->percon);

		$copyObj->setRepleg($this->repleg);

		$copyObj->setPreasi($this->preasi);

		$copyObj->setMonlimben($this->monlimben);


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
			self::$peer = new AtdefempPeer();
		}
		return self::$peer;
	}

} 