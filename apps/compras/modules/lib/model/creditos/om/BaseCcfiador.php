<?php


abstract class BaseCcfiador extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomfia;


	
	protected $cedfia;


	
	protected $telfia;


	
	protected $celfia;


	
	protected $dirfia;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $parent;


	
	protected $cccredit_id;


	
	protected $ccparroq_id;

	
	protected $aCccredit;

	
	protected $aCcparroq;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomfia()
  {

    return trim($this->nomfia);

  }
  
  public function getCedfia()
  {

    return trim($this->cedfia);

  }
  
  public function getTelfia()
  {

    return trim($this->telfia);

  }
  
  public function getCelfia()
  {

    return trim($this->celfia);

  }
  
  public function getDirfia()
  {

    return trim($this->dirfia);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getParent()
  {

    return trim($this->parent);

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcfiadorPeer::ID;
      }
  
	} 
	
	public function setNomfia($v)
	{

    if ($this->nomfia !== $v) {
        $this->nomfia = $v;
        $this->modifiedColumns[] = CcfiadorPeer::NOMFIA;
      }
  
	} 
	
	public function setCedfia($v)
	{

    if ($this->cedfia !== $v) {
        $this->cedfia = $v;
        $this->modifiedColumns[] = CcfiadorPeer::CEDFIA;
      }
  
	} 
	
	public function setTelfia($v)
	{

    if ($this->telfia !== $v) {
        $this->telfia = $v;
        $this->modifiedColumns[] = CcfiadorPeer::TELFIA;
      }
  
	} 
	
	public function setCelfia($v)
	{

    if ($this->celfia !== $v) {
        $this->celfia = $v;
        $this->modifiedColumns[] = CcfiadorPeer::CELFIA;
      }
  
	} 
	
	public function setDirfia($v)
	{

    if ($this->dirfia !== $v) {
        $this->dirfia = $v;
        $this->modifiedColumns[] = CcfiadorPeer::DIRFIA;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcfiadorPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcfiadorPeer::CODARECEL;
      }
  
	} 
	
	public function setParent($v)
	{

    if ($this->parent !== $v) {
        $this->parent = $v;
        $this->modifiedColumns[] = CcfiadorPeer::PARENT;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcfiadorPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcfiadorPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomfia = $rs->getString($startcol + 1);

      $this->cedfia = $rs->getString($startcol + 2);

      $this->telfia = $rs->getString($startcol + 3);

      $this->celfia = $rs->getString($startcol + 4);

      $this->dirfia = $rs->getString($startcol + 5);

      $this->codaretel = $rs->getString($startcol + 6);

      $this->codarecel = $rs->getString($startcol + 7);

      $this->parent = $rs->getString($startcol + 8);

      $this->cccredit_id = $rs->getInt($startcol + 9);

      $this->ccparroq_id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccfiador object", $e);
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
			$con = Propel::getConnection(CcfiadorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcfiadorPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcfiadorPeer::DATABASE_NAME);
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


												
			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcfiadorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcfiadorPeer::doUpdate($this, $con);
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


												
			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcfiadorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcfiadorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomfia();
				break;
			case 2:
				return $this->getCedfia();
				break;
			case 3:
				return $this->getTelfia();
				break;
			case 4:
				return $this->getCelfia();
				break;
			case 5:
				return $this->getDirfia();
				break;
			case 6:
				return $this->getCodaretel();
				break;
			case 7:
				return $this->getCodarecel();
				break;
			case 8:
				return $this->getParent();
				break;
			case 9:
				return $this->getCccreditId();
				break;
			case 10:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfiadorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomfia(),
			$keys[2] => $this->getCedfia(),
			$keys[3] => $this->getTelfia(),
			$keys[4] => $this->getCelfia(),
			$keys[5] => $this->getDirfia(),
			$keys[6] => $this->getCodaretel(),
			$keys[7] => $this->getCodarecel(),
			$keys[8] => $this->getParent(),
			$keys[9] => $this->getCccreditId(),
			$keys[10] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcfiadorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomfia($value);
				break;
			case 2:
				$this->setCedfia($value);
				break;
			case 3:
				$this->setTelfia($value);
				break;
			case 4:
				$this->setCelfia($value);
				break;
			case 5:
				$this->setDirfia($value);
				break;
			case 6:
				$this->setCodaretel($value);
				break;
			case 7:
				$this->setCodarecel($value);
				break;
			case 8:
				$this->setParent($value);
				break;
			case 9:
				$this->setCccreditId($value);
				break;
			case 10:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfiadorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomfia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedfia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelfia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCelfia($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirfia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaretel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodarecel($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setParent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCccreditId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcparroqId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcfiadorPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcfiadorPeer::ID)) $criteria->add(CcfiadorPeer::ID, $this->id);
		if ($this->isColumnModified(CcfiadorPeer::NOMFIA)) $criteria->add(CcfiadorPeer::NOMFIA, $this->nomfia);
		if ($this->isColumnModified(CcfiadorPeer::CEDFIA)) $criteria->add(CcfiadorPeer::CEDFIA, $this->cedfia);
		if ($this->isColumnModified(CcfiadorPeer::TELFIA)) $criteria->add(CcfiadorPeer::TELFIA, $this->telfia);
		if ($this->isColumnModified(CcfiadorPeer::CELFIA)) $criteria->add(CcfiadorPeer::CELFIA, $this->celfia);
		if ($this->isColumnModified(CcfiadorPeer::DIRFIA)) $criteria->add(CcfiadorPeer::DIRFIA, $this->dirfia);
		if ($this->isColumnModified(CcfiadorPeer::CODARETEL)) $criteria->add(CcfiadorPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcfiadorPeer::CODARECEL)) $criteria->add(CcfiadorPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcfiadorPeer::PARENT)) $criteria->add(CcfiadorPeer::PARENT, $this->parent);
		if ($this->isColumnModified(CcfiadorPeer::CCCREDIT_ID)) $criteria->add(CcfiadorPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcfiadorPeer::CCPARROQ_ID)) $criteria->add(CcfiadorPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcfiadorPeer::DATABASE_NAME);

		$criteria->add(CcfiadorPeer::ID, $this->id);

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

		$copyObj->setNomfia($this->nomfia);

		$copyObj->setCedfia($this->cedfia);

		$copyObj->setTelfia($this->telfia);

		$copyObj->setCelfia($this->celfia);

		$copyObj->setDirfia($this->dirfia);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setParent($this->parent);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcparroqId($this->ccparroq_id);


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
			self::$peer = new CcfiadorPeer();
		}
		return self::$peer;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcparroq($v)
	{


		if ($v === null) {
			$this->setCcparroqId(NULL);
		} else {
			$this->setCcparroqId($v->getId());
		}


		$this->aCcparroq = $v;
	}


	
	public function getCcparroq($con = null)
	{
		if ($this->aCcparroq === null && ($this->ccparroq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';

      $c = new Criteria();
      $c->add(CcparroqPeer::ID,$this->ccparroq_id);
      
			$this->aCcparroq = CcparroqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparroq;
	}

} 