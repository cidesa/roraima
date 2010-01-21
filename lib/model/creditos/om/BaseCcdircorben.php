<?php


abstract class BaseCcdircorben extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $dirnomurb;


	
	protected $dirnumcal;


	
	protected $dirnumcasedi;


	
	protected $dirnumpis;


	
	protected $dirnumapt;


	
	protected $dirpunref;


	
	protected $numtel;


	
	protected $numcel;


	
	protected $numfax;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $codarefax;


	
	protected $mail;


	
	protected $ccbenefi_id;


	
	protected $ccparroq_id;

	
	protected $aCcbenefi;

	
	protected $aCcparroq;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getDirnomurb()
  {

    return trim($this->dirnomurb);

  }
  
  public function getDirnumcal()
  {

    return trim($this->dirnumcal);

  }
  
  public function getDirnumcasedi()
  {

    return trim($this->dirnumcasedi);

  }
  
  public function getDirnumpis()
  {

    return trim($this->dirnumpis);

  }
  
  public function getDirnumapt()
  {

    return trim($this->dirnumapt);

  }
  
  public function getDirpunref()
  {

    return trim($this->dirpunref);

  }
  
  public function getNumtel()
  {

    return trim($this->numtel);

  }
  
  public function getNumcel()
  {

    return trim($this->numcel);

  }
  
  public function getNumfax()
  {

    return trim($this->numfax);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getCodarefax()
  {

    return trim($this->codarefax);

  }
  
  public function getMail()
  {

    return trim($this->mail);

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::ID;
      }
  
	} 
	
	public function setDirnomurb($v)
	{

    if ($this->dirnomurb !== $v) {
        $this->dirnomurb = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::DIRNOMURB;
      }
  
	} 
	
	public function setDirnumcal($v)
	{

    if ($this->dirnumcal !== $v) {
        $this->dirnumcal = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::DIRNUMCAL;
      }
  
	} 
	
	public function setDirnumcasedi($v)
	{

    if ($this->dirnumcasedi !== $v) {
        $this->dirnumcasedi = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::DIRNUMCASEDI;
      }
  
	} 
	
	public function setDirnumpis($v)
	{

    if ($this->dirnumpis !== $v) {
        $this->dirnumpis = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::DIRNUMPIS;
      }
  
	} 
	
	public function setDirnumapt($v)
	{

    if ($this->dirnumapt !== $v) {
        $this->dirnumapt = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::DIRNUMAPT;
      }
  
	} 
	
	public function setDirpunref($v)
	{

    if ($this->dirpunref !== $v) {
        $this->dirpunref = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::DIRPUNREF;
      }
  
	} 
	
	public function setNumtel($v)
	{

    if ($this->numtel !== $v) {
        $this->numtel = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::NUMTEL;
      }
  
	} 
	
	public function setNumcel($v)
	{

    if ($this->numcel !== $v) {
        $this->numcel = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::NUMCEL;
      }
  
	} 
	
	public function setNumfax($v)
	{

    if ($this->numfax !== $v) {
        $this->numfax = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::NUMFAX;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::CODARECEL;
      }
  
	} 
	
	public function setCodarefax($v)
	{

    if ($this->codarefax !== $v) {
        $this->codarefax = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::CODAREFAX;
      }
  
	} 
	
	public function setMail($v)
	{

    if ($this->mail !== $v) {
        $this->mail = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::MAIL;
      }
  
	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcdircorbenPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->dirnomurb = $rs->getString($startcol + 1);

      $this->dirnumcal = $rs->getString($startcol + 2);

      $this->dirnumcasedi = $rs->getString($startcol + 3);

      $this->dirnumpis = $rs->getString($startcol + 4);

      $this->dirnumapt = $rs->getString($startcol + 5);

      $this->dirpunref = $rs->getString($startcol + 6);

      $this->numtel = $rs->getString($startcol + 7);

      $this->numcel = $rs->getString($startcol + 8);

      $this->numfax = $rs->getString($startcol + 9);

      $this->codaretel = $rs->getString($startcol + 10);

      $this->codarecel = $rs->getString($startcol + 11);

      $this->codarefax = $rs->getString($startcol + 12);

      $this->mail = $rs->getString($startcol + 13);

      $this->ccbenefi_id = $rs->getInt($startcol + 14);

      $this->ccparroq_id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdircorben object", $e);
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
			$con = Propel::getConnection(CcdircorbenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdircorbenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdircorbenPeer::DATABASE_NAME);
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


												
			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdircorbenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdircorbenPeer::doUpdate($this, $con);
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


												
			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcdircorbenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdircorbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDirnomurb();
				break;
			case 2:
				return $this->getDirnumcal();
				break;
			case 3:
				return $this->getDirnumcasedi();
				break;
			case 4:
				return $this->getDirnumpis();
				break;
			case 5:
				return $this->getDirnumapt();
				break;
			case 6:
				return $this->getDirpunref();
				break;
			case 7:
				return $this->getNumtel();
				break;
			case 8:
				return $this->getNumcel();
				break;
			case 9:
				return $this->getNumfax();
				break;
			case 10:
				return $this->getCodaretel();
				break;
			case 11:
				return $this->getCodarecel();
				break;
			case 12:
				return $this->getCodarefax();
				break;
			case 13:
				return $this->getMail();
				break;
			case 14:
				return $this->getCcbenefiId();
				break;
			case 15:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdircorbenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDirnomurb(),
			$keys[2] => $this->getDirnumcal(),
			$keys[3] => $this->getDirnumcasedi(),
			$keys[4] => $this->getDirnumpis(),
			$keys[5] => $this->getDirnumapt(),
			$keys[6] => $this->getDirpunref(),
			$keys[7] => $this->getNumtel(),
			$keys[8] => $this->getNumcel(),
			$keys[9] => $this->getNumfax(),
			$keys[10] => $this->getCodaretel(),
			$keys[11] => $this->getCodarecel(),
			$keys[12] => $this->getCodarefax(),
			$keys[13] => $this->getMail(),
			$keys[14] => $this->getCcbenefiId(),
			$keys[15] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdircorbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDirnomurb($value);
				break;
			case 2:
				$this->setDirnumcal($value);
				break;
			case 3:
				$this->setDirnumcasedi($value);
				break;
			case 4:
				$this->setDirnumpis($value);
				break;
			case 5:
				$this->setDirnumapt($value);
				break;
			case 6:
				$this->setDirpunref($value);
				break;
			case 7:
				$this->setNumtel($value);
				break;
			case 8:
				$this->setNumcel($value);
				break;
			case 9:
				$this->setNumfax($value);
				break;
			case 10:
				$this->setCodaretel($value);
				break;
			case 11:
				$this->setCodarecel($value);
				break;
			case 12:
				$this->setCodarefax($value);
				break;
			case 13:
				$this->setMail($value);
				break;
			case 14:
				$this->setCcbenefiId($value);
				break;
			case 15:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdircorbenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDirnomurb($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirnumcal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirnumcasedi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirnumpis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirnumapt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDirpunref($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumtel($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcel($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumfax($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodaretel($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodarecel($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodarefax($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMail($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCcbenefiId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCcparroqId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdircorbenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdircorbenPeer::ID)) $criteria->add(CcdircorbenPeer::ID, $this->id);
		if ($this->isColumnModified(CcdircorbenPeer::DIRNOMURB)) $criteria->add(CcdircorbenPeer::DIRNOMURB, $this->dirnomurb);
		if ($this->isColumnModified(CcdircorbenPeer::DIRNUMCAL)) $criteria->add(CcdircorbenPeer::DIRNUMCAL, $this->dirnumcal);
		if ($this->isColumnModified(CcdircorbenPeer::DIRNUMCASEDI)) $criteria->add(CcdircorbenPeer::DIRNUMCASEDI, $this->dirnumcasedi);
		if ($this->isColumnModified(CcdircorbenPeer::DIRNUMPIS)) $criteria->add(CcdircorbenPeer::DIRNUMPIS, $this->dirnumpis);
		if ($this->isColumnModified(CcdircorbenPeer::DIRNUMAPT)) $criteria->add(CcdircorbenPeer::DIRNUMAPT, $this->dirnumapt);
		if ($this->isColumnModified(CcdircorbenPeer::DIRPUNREF)) $criteria->add(CcdircorbenPeer::DIRPUNREF, $this->dirpunref);
		if ($this->isColumnModified(CcdircorbenPeer::NUMTEL)) $criteria->add(CcdircorbenPeer::NUMTEL, $this->numtel);
		if ($this->isColumnModified(CcdircorbenPeer::NUMCEL)) $criteria->add(CcdircorbenPeer::NUMCEL, $this->numcel);
		if ($this->isColumnModified(CcdircorbenPeer::NUMFAX)) $criteria->add(CcdircorbenPeer::NUMFAX, $this->numfax);
		if ($this->isColumnModified(CcdircorbenPeer::CODARETEL)) $criteria->add(CcdircorbenPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcdircorbenPeer::CODARECEL)) $criteria->add(CcdircorbenPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcdircorbenPeer::CODAREFAX)) $criteria->add(CcdircorbenPeer::CODAREFAX, $this->codarefax);
		if ($this->isColumnModified(CcdircorbenPeer::MAIL)) $criteria->add(CcdircorbenPeer::MAIL, $this->mail);
		if ($this->isColumnModified(CcdircorbenPeer::CCBENEFI_ID)) $criteria->add(CcdircorbenPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CcdircorbenPeer::CCPARROQ_ID)) $criteria->add(CcdircorbenPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdircorbenPeer::DATABASE_NAME);

		$criteria->add(CcdircorbenPeer::ID, $this->id);

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

		$copyObj->setDirnomurb($this->dirnomurb);

		$copyObj->setDirnumcal($this->dirnumcal);

		$copyObj->setDirnumcasedi($this->dirnumcasedi);

		$copyObj->setDirnumpis($this->dirnumpis);

		$copyObj->setDirnumapt($this->dirnumapt);

		$copyObj->setDirpunref($this->dirpunref);

		$copyObj->setNumtel($this->numtel);

		$copyObj->setNumcel($this->numcel);

		$copyObj->setNumfax($this->numfax);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setCodarefax($this->codarefax);

		$copyObj->setMail($this->mail);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

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
			self::$peer = new CcdircorbenPeer();
		}
		return self::$peer;
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