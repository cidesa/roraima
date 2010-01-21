<?php


abstract class BaseCcdetger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $login;


	
	protected $nomfor;


	
	protected $priusu;


	
	protected $ccgerenc_id;

	
	protected $aCcgerenc;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getLogin()
  {

    return trim($this->login);

  }
  
  public function getNomfor()
  {

    return trim($this->nomfor);

  }
  
  public function getPriusu()
  {

    return $this->priusu;

  }
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdetgerPeer::ID;
      }
  
	} 
	
	public function setLogin($v)
	{

    if ($this->login !== $v) {
        $this->login = $v;
        $this->modifiedColumns[] = CcdetgerPeer::LOGIN;
      }
  
	} 
	
	public function setNomfor($v)
	{

    if ($this->nomfor !== $v) {
        $this->nomfor = $v;
        $this->modifiedColumns[] = CcdetgerPeer::NOMFOR;
      }
  
	} 
	
	public function setPriusu($v)
	{

    if ($this->priusu !== $v) {
        $this->priusu = $v;
        $this->modifiedColumns[] = CcdetgerPeer::PRIUSU;
      }
  
	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcdetgerPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->login = $rs->getString($startcol + 1);

      $this->nomfor = $rs->getString($startcol + 2);

      $this->priusu = $rs->getInt($startcol + 3);

      $this->ccgerenc_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdetger object", $e);
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
			$con = Propel::getConnection(CcdetgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdetgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdetgerPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdetgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdetgerPeer::doUpdate($this, $con);
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


												
			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}


			if (($retval = CcdetgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdetgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getLogin();
				break;
			case 2:
				return $this->getNomfor();
				break;
			case 3:
				return $this->getPriusu();
				break;
			case 4:
				return $this->getCcgerencId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdetgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLogin(),
			$keys[2] => $this->getNomfor(),
			$keys[3] => $this->getPriusu(),
			$keys[4] => $this->getCcgerencId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdetgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLogin($value);
				break;
			case 2:
				$this->setNomfor($value);
				break;
			case 3:
				$this->setPriusu($value);
				break;
			case 4:
				$this->setCcgerencId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdetgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLogin($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPriusu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcgerencId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdetgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdetgerPeer::ID)) $criteria->add(CcdetgerPeer::ID, $this->id);
		if ($this->isColumnModified(CcdetgerPeer::LOGIN)) $criteria->add(CcdetgerPeer::LOGIN, $this->login);
		if ($this->isColumnModified(CcdetgerPeer::NOMFOR)) $criteria->add(CcdetgerPeer::NOMFOR, $this->nomfor);
		if ($this->isColumnModified(CcdetgerPeer::PRIUSU)) $criteria->add(CcdetgerPeer::PRIUSU, $this->priusu);
		if ($this->isColumnModified(CcdetgerPeer::CCGERENC_ID)) $criteria->add(CcdetgerPeer::CCGERENC_ID, $this->ccgerenc_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdetgerPeer::DATABASE_NAME);

		$criteria->add(CcdetgerPeer::ID, $this->id);

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

		$copyObj->setLogin($this->login);

		$copyObj->setNomfor($this->nomfor);

		$copyObj->setPriusu($this->priusu);

		$copyObj->setCcgerencId($this->ccgerenc_id);


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
			self::$peer = new CcdetgerPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
	}

} 