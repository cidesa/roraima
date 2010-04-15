<?php


abstract class BaseNpcalconcol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codctr;


	
	protected $codcla;


	
	protected $codcon;


	
	protected $cantra;


	
	protected $moncla;


	
	protected $totcla;


	
	protected $bascal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodctr()
  {

    return trim($this->codctr);

  }
  
  public function getCodcla()
  {

    return trim($this->codcla);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCantra($val=false)
  {

    if($val) return number_format($this->cantra,2,',','.');
    else return $this->cantra;

  }
  
  public function getMoncla($val=false)
  {

    if($val) return number_format($this->moncla,2,',','.');
    else return $this->moncla;

  }
  
  public function getTotcla($val=false)
  {

    if($val) return number_format($this->totcla,2,',','.');
    else return $this->totcla;

  }
  
  public function getBascal()
  {

    return trim($this->bascal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodctr($v)
	{

    if ($this->codctr !== $v) {
        $this->codctr = $v;
        $this->modifiedColumns[] = NpcalconcolPeer::CODCTR;
      }
  
	} 
	
	public function setCodcla($v)
	{

    if ($this->codcla !== $v) {
        $this->codcla = $v;
        $this->modifiedColumns[] = NpcalconcolPeer::CODCLA;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpcalconcolPeer::CODCON;
      }
  
	} 
	
	public function setCantra($v)
	{

    if ($this->cantra !== $v) {
        $this->cantra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalconcolPeer::CANTRA;
      }
  
	} 
	
	public function setMoncla($v)
	{

    if ($this->moncla !== $v) {
        $this->moncla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalconcolPeer::MONCLA;
      }
  
	} 
	
	public function setTotcla($v)
	{

    if ($this->totcla !== $v) {
        $this->totcla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcalconcolPeer::TOTCLA;
      }
  
	} 
	
	public function setBascal($v)
	{

    if ($this->bascal !== $v) {
        $this->bascal = $v;
        $this->modifiedColumns[] = NpcalconcolPeer::BASCAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcalconcolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codctr = $rs->getString($startcol + 0);

      $this->codcla = $rs->getString($startcol + 1);

      $this->codcon = $rs->getString($startcol + 2);

      $this->cantra = $rs->getFloat($startcol + 3);

      $this->moncla = $rs->getFloat($startcol + 4);

      $this->totcla = $rs->getFloat($startcol + 5);

      $this->bascal = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcalconcol object", $e);
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
			$con = Propel::getConnection(NpcalconcolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcalconcolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcalconcolPeer::DATABASE_NAME);
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
					$pk = NpcalconcolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcalconcolPeer::doUpdate($this, $con);
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


			if (($retval = NpcalconcolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalconcolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodctr();
				break;
			case 1:
				return $this->getCodcla();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getCantra();
				break;
			case 4:
				return $this->getMoncla();
				break;
			case 5:
				return $this->getTotcla();
				break;
			case 6:
				return $this->getBascal();
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
		$keys = NpcalconcolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodctr(),
			$keys[1] => $this->getCodcla(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getCantra(),
			$keys[4] => $this->getMoncla(),
			$keys[5] => $this->getTotcla(),
			$keys[6] => $this->getBascal(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalconcolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodctr($value);
				break;
			case 1:
				$this->setCodcla($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setCantra($value);
				break;
			case 4:
				$this->setMoncla($value);
				break;
			case 5:
				$this->setTotcla($value);
				break;
			case 6:
				$this->setBascal($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcalconcolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodctr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoncla($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotcla($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBascal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcalconcolPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcalconcolPeer::CODCTR)) $criteria->add(NpcalconcolPeer::CODCTR, $this->codctr);
		if ($this->isColumnModified(NpcalconcolPeer::CODCLA)) $criteria->add(NpcalconcolPeer::CODCLA, $this->codcla);
		if ($this->isColumnModified(NpcalconcolPeer::CODCON)) $criteria->add(NpcalconcolPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpcalconcolPeer::CANTRA)) $criteria->add(NpcalconcolPeer::CANTRA, $this->cantra);
		if ($this->isColumnModified(NpcalconcolPeer::MONCLA)) $criteria->add(NpcalconcolPeer::MONCLA, $this->moncla);
		if ($this->isColumnModified(NpcalconcolPeer::TOTCLA)) $criteria->add(NpcalconcolPeer::TOTCLA, $this->totcla);
		if ($this->isColumnModified(NpcalconcolPeer::BASCAL)) $criteria->add(NpcalconcolPeer::BASCAL, $this->bascal);
		if ($this->isColumnModified(NpcalconcolPeer::ID)) $criteria->add(NpcalconcolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcalconcolPeer::DATABASE_NAME);

		$criteria->add(NpcalconcolPeer::ID, $this->id);

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

		$copyObj->setCodctr($this->codctr);

		$copyObj->setCodcla($this->codcla);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCantra($this->cantra);

		$copyObj->setMoncla($this->moncla);

		$copyObj->setTotcla($this->totcla);

		$copyObj->setBascal($this->bascal);


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
			self::$peer = new NpcalconcolPeer();
		}
		return self::$peer;
	}

} 