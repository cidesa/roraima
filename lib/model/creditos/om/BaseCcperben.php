<?php


abstract class BaseCcperben extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomperben;


	
	protected $cedperben;


	
	protected $dirperben;


	
	protected $telperben;


	
	protected $celular;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $sexperben;


	
	protected $email;


	
	protected $cccargo_id;


	
	protected $ccperpre_id;


	
	protected $ccparroq_id;


	
	protected $ccbenefi_id;

	
	protected $aCccargo;

	
	protected $aCcperpre;

	
	protected $aCcparroq;

	
	protected $aCcbenefi;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomperben()
  {

    return trim($this->nomperben);

  }
  
  public function getCedperben()
  {

    return trim($this->cedperben);

  }
  
  public function getDirperben()
  {

    return trim($this->dirperben);

  }
  
  public function getTelperben()
  {

    return trim($this->telperben);

  }
  
  public function getCelular()
  {

    return trim($this->celular);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getSexperben()
  {

    return trim($this->sexperben);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getCccargoId()
  {

    return $this->cccargo_id;

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcperbenPeer::ID;
      }
  
	} 
	
	public function setNomperben($v)
	{

    if ($this->nomperben !== $v) {
        $this->nomperben = $v;
        $this->modifiedColumns[] = CcperbenPeer::NOMPERBEN;
      }
  
	} 
	
	public function setCedperben($v)
	{

    if ($this->cedperben !== $v) {
        $this->cedperben = $v;
        $this->modifiedColumns[] = CcperbenPeer::CEDPERBEN;
      }
  
	} 
	
	public function setDirperben($v)
	{

    if ($this->dirperben !== $v) {
        $this->dirperben = $v;
        $this->modifiedColumns[] = CcperbenPeer::DIRPERBEN;
      }
  
	} 
	
	public function setTelperben($v)
	{

    if ($this->telperben !== $v) {
        $this->telperben = $v;
        $this->modifiedColumns[] = CcperbenPeer::TELPERBEN;
      }
  
	} 
	
	public function setCelular($v)
	{

    if ($this->celular !== $v) {
        $this->celular = $v;
        $this->modifiedColumns[] = CcperbenPeer::CELULAR;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcperbenPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcperbenPeer::CODARECEL;
      }
  
	} 
	
	public function setSexperben($v)
	{

    if ($this->sexperben !== $v) {
        $this->sexperben = $v;
        $this->modifiedColumns[] = CcperbenPeer::SEXPERBEN;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = CcperbenPeer::EMAIL;
      }
  
	} 
	
	public function setCccargoId($v)
	{

    if ($this->cccargo_id !== $v) {
        $this->cccargo_id = $v;
        $this->modifiedColumns[] = CcperbenPeer::CCCARGO_ID;
      }
  
		if ($this->aCccargo !== null && $this->aCccargo->getId() !== $v) {
			$this->aCccargo = null;
		}

	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcperbenPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcperbenPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcperbenPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomperben = $rs->getString($startcol + 1);

      $this->cedperben = $rs->getString($startcol + 2);

      $this->dirperben = $rs->getString($startcol + 3);

      $this->telperben = $rs->getString($startcol + 4);

      $this->celular = $rs->getString($startcol + 5);

      $this->codaretel = $rs->getString($startcol + 6);

      $this->codarecel = $rs->getString($startcol + 7);

      $this->sexperben = $rs->getString($startcol + 8);

      $this->email = $rs->getString($startcol + 9);

      $this->cccargo_id = $rs->getInt($startcol + 10);

      $this->ccperpre_id = $rs->getInt($startcol + 11);

      $this->ccparroq_id = $rs->getInt($startcol + 12);

      $this->ccbenefi_id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccperben object", $e);
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
			$con = Propel::getConnection(CcperbenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcperbenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcperbenPeer::DATABASE_NAME);
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


												
			if ($this->aCccargo !== null) {
				if ($this->aCccargo->isModified()) {
					$affectedRows += $this->aCccargo->save($con);
				}
				$this->setCccargo($this->aCccargo);
			}

			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}

			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcperbenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcperbenPeer::doUpdate($this, $con);
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


												
			if ($this->aCccargo !== null) {
				if (!$this->aCccargo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccargo->getValidationFailures());
				}
			}

			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}

			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}


			if (($retval = CcperbenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcperbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomperben();
				break;
			case 2:
				return $this->getCedperben();
				break;
			case 3:
				return $this->getDirperben();
				break;
			case 4:
				return $this->getTelperben();
				break;
			case 5:
				return $this->getCelular();
				break;
			case 6:
				return $this->getCodaretel();
				break;
			case 7:
				return $this->getCodarecel();
				break;
			case 8:
				return $this->getSexperben();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getCccargoId();
				break;
			case 11:
				return $this->getCcperpreId();
				break;
			case 12:
				return $this->getCcparroqId();
				break;
			case 13:
				return $this->getCcbenefiId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperbenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomperben(),
			$keys[2] => $this->getCedperben(),
			$keys[3] => $this->getDirperben(),
			$keys[4] => $this->getTelperben(),
			$keys[5] => $this->getCelular(),
			$keys[6] => $this->getCodaretel(),
			$keys[7] => $this->getCodarecel(),
			$keys[8] => $this->getSexperben(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getCccargoId(),
			$keys[11] => $this->getCcperpreId(),
			$keys[12] => $this->getCcparroqId(),
			$keys[13] => $this->getCcbenefiId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcperbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomperben($value);
				break;
			case 2:
				$this->setCedperben($value);
				break;
			case 3:
				$this->setDirperben($value);
				break;
			case 4:
				$this->setTelperben($value);
				break;
			case 5:
				$this->setCelular($value);
				break;
			case 6:
				$this->setCodaretel($value);
				break;
			case 7:
				$this->setCodarecel($value);
				break;
			case 8:
				$this->setSexperben($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setCccargoId($value);
				break;
			case 11:
				$this->setCcperpreId($value);
				break;
			case 12:
				$this->setCcparroqId($value);
				break;
			case 13:
				$this->setCcbenefiId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperbenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomperben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedperben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirperben($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelperben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCelular($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaretel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodarecel($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSexperben($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCccargoId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCcperpreId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCcparroqId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCcbenefiId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcperbenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcperbenPeer::ID)) $criteria->add(CcperbenPeer::ID, $this->id);
		if ($this->isColumnModified(CcperbenPeer::NOMPERBEN)) $criteria->add(CcperbenPeer::NOMPERBEN, $this->nomperben);
		if ($this->isColumnModified(CcperbenPeer::CEDPERBEN)) $criteria->add(CcperbenPeer::CEDPERBEN, $this->cedperben);
		if ($this->isColumnModified(CcperbenPeer::DIRPERBEN)) $criteria->add(CcperbenPeer::DIRPERBEN, $this->dirperben);
		if ($this->isColumnModified(CcperbenPeer::TELPERBEN)) $criteria->add(CcperbenPeer::TELPERBEN, $this->telperben);
		if ($this->isColumnModified(CcperbenPeer::CELULAR)) $criteria->add(CcperbenPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(CcperbenPeer::CODARETEL)) $criteria->add(CcperbenPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcperbenPeer::CODARECEL)) $criteria->add(CcperbenPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcperbenPeer::SEXPERBEN)) $criteria->add(CcperbenPeer::SEXPERBEN, $this->sexperben);
		if ($this->isColumnModified(CcperbenPeer::EMAIL)) $criteria->add(CcperbenPeer::EMAIL, $this->email);
		if ($this->isColumnModified(CcperbenPeer::CCCARGO_ID)) $criteria->add(CcperbenPeer::CCCARGO_ID, $this->cccargo_id);
		if ($this->isColumnModified(CcperbenPeer::CCPERPRE_ID)) $criteria->add(CcperbenPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcperbenPeer::CCPARROQ_ID)) $criteria->add(CcperbenPeer::CCPARROQ_ID, $this->ccparroq_id);
		if ($this->isColumnModified(CcperbenPeer::CCBENEFI_ID)) $criteria->add(CcperbenPeer::CCBENEFI_ID, $this->ccbenefi_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcperbenPeer::DATABASE_NAME);

		$criteria->add(CcperbenPeer::ID, $this->id);

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

		$copyObj->setNomperben($this->nomperben);

		$copyObj->setCedperben($this->cedperben);

		$copyObj->setDirperben($this->dirperben);

		$copyObj->setTelperben($this->telperben);

		$copyObj->setCelular($this->celular);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setSexperben($this->sexperben);

		$copyObj->setEmail($this->email);

		$copyObj->setCccargoId($this->cccargo_id);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCcparroqId($this->ccparroq_id);

		$copyObj->setCcbenefiId($this->ccbenefi_id);


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
			self::$peer = new CcperbenPeer();
		}
		return self::$peer;
	}

	
	public function setCccargo($v)
	{


		if ($v === null) {
			$this->setCccargoId(NULL);
		} else {
			$this->setCccargoId($v->getId());
		}


		$this->aCccargo = $v;
	}


	
	public function getCccargo($con = null)
	{
		if ($this->aCccargo === null && ($this->cccargo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccargoPeer.php';

      $c = new Criteria();
      $c->add(CccargoPeer::ID,$this->cccargo_id);
      
			$this->aCccargo = CccargoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccargo;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
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

	
	public function setCcbenefi($v)
	{


		if ($v === null) {
			$this->setCcbenefiId(NULL);
		} else {
			$this->setCcbenefiId($v->getId());
		}


		$this->aCcbenefi = $v;
	}


	
	public function getCcbenefi($con = null)
	{
		if ($this->aCcbenefi === null && ($this->ccbenefi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';

      $c = new Criteria();
      $c->add(CcbenefiPeer::ID,$this->ccbenefi_id);
      
			$this->aCcbenefi = CcbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbenefi;
	}

} 