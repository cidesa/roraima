<?php


abstract class BaseCobdetfor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $codcli;


	
	protected $correl;


	
	protected $numide;


	
	protected $codban;


	
	protected $monpag;


	
	protected $fatippag_id;


	
	protected $id;

	
	protected $aFatippag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumtra()
  {

    return trim($this->numtra);

  }
  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getCorrel()
  {

    return trim($this->correl);

  }
  
  public function getNumide()
  {

    return trim($this->numide);

  }
  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getFatippagId()
  {

    return $this->fatippag_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = CobdetforPeer::NUMTRA;
      }
  
	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = CobdetforPeer::CODCLI;
      }
  
	} 
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = $v;
        $this->modifiedColumns[] = CobdetforPeer::CORREL;
      }
  
	} 
	
	public function setNumide($v)
	{

    if ($this->numide !== $v) {
        $this->numide = $v;
        $this->modifiedColumns[] = CobdetforPeer::NUMIDE;
      }
  
	} 
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = CobdetforPeer::CODBAN;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdetforPeer::MONPAG;
      }
  
	} 
	
	public function setFatippagId($v)
	{

    if ($this->fatippag_id !== $v) {
        $this->fatippag_id = $v;
        $this->modifiedColumns[] = CobdetforPeer::FATIPPAG_ID;
      }
  
		if ($this->aFatippag !== null && $this->aFatippag->getId() !== $v) {
			$this->aFatippag = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CobdetforPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numtra = $rs->getString($startcol + 0);

      $this->codcli = $rs->getString($startcol + 1);

      $this->correl = $rs->getString($startcol + 2);

      $this->numide = $rs->getString($startcol + 3);

      $this->codban = $rs->getString($startcol + 4);

      $this->monpag = $rs->getFloat($startcol + 5);

      $this->fatippag_id = $rs->getInt($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cobdetfor object", $e);
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
			$con = Propel::getConnection(CobdetforPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobdetforPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobdetforPeer::DATABASE_NAME);
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


												
			if ($this->aFatippag !== null) {
				if ($this->aFatippag->isModified()) {
					$affectedRows += $this->aFatippag->save($con);
				}
				$this->setFatippag($this->aFatippag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CobdetforPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CobdetforPeer::doUpdate($this, $con);
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


												
			if ($this->aFatippag !== null) {
				if (!$this->aFatippag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatippag->getValidationFailures());
				}
			}


			if (($retval = CobdetforPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdetforPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getCodcli();
				break;
			case 2:
				return $this->getCorrel();
				break;
			case 3:
				return $this->getNumide();
				break;
			case 4:
				return $this->getCodban();
				break;
			case 5:
				return $this->getMonpag();
				break;
			case 6:
				return $this->getFatippagId();
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
		$keys = CobdetforPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getCodcli(),
			$keys[2] => $this->getCorrel(),
			$keys[3] => $this->getNumide(),
			$keys[4] => $this->getCodban(),
			$keys[5] => $this->getMonpag(),
			$keys[6] => $this->getFatippagId(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdetforPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setCodcli($value);
				break;
			case 2:
				$this->setCorrel($value);
				break;
			case 3:
				$this->setNumide($value);
				break;
			case 4:
				$this->setCodban($value);
				break;
			case 5:
				$this->setMonpag($value);
				break;
			case 6:
				$this->setFatippagId($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdetforPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorrel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumide($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodban($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFatippagId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobdetforPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobdetforPeer::NUMTRA)) $criteria->add(CobdetforPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobdetforPeer::CODCLI)) $criteria->add(CobdetforPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobdetforPeer::CORREL)) $criteria->add(CobdetforPeer::CORREL, $this->correl);
		if ($this->isColumnModified(CobdetforPeer::NUMIDE)) $criteria->add(CobdetforPeer::NUMIDE, $this->numide);
		if ($this->isColumnModified(CobdetforPeer::CODBAN)) $criteria->add(CobdetforPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CobdetforPeer::MONPAG)) $criteria->add(CobdetforPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CobdetforPeer::FATIPPAG_ID)) $criteria->add(CobdetforPeer::FATIPPAG_ID, $this->fatippag_id);
		if ($this->isColumnModified(CobdetforPeer::ID)) $criteria->add(CobdetforPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobdetforPeer::DATABASE_NAME);

		$criteria->add(CobdetforPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCorrel($this->correl);

		$copyObj->setNumide($this->numide);

		$copyObj->setCodban($this->codban);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setFatippagId($this->fatippag_id);


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
			self::$peer = new CobdetforPeer();
		}
		return self::$peer;
	}

	
	public function setFatippag($v)
	{


		if ($v === null) {
			$this->setFatippagId(NULL);
		} else {
			$this->setFatippagId($v->getId());
		}


		$this->aFatippag = $v;
	}


	
	public function getFatippag($con = null)
	{
		if ($this->aFatippag === null && ($this->fatippag_id !== null)) {
						include_once 'lib/model/om/BaseFatippagPeer.php';

			$this->aFatippag = FatippagPeer::retrieveByPK($this->fatippag_id, $con);

			
		}
		return $this->aFatippag;
	}

} 