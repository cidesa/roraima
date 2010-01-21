<?php


abstract class BaseCcregnot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomregnot;


	
	protected $desregnot;


	
	protected $dirregnot;


	
	protected $codaretel;


	
	protected $numtelreg;


	
	protected $codaretel2;


	
	protected $numtelreg2;


	
	protected $tipregnot;


	
	protected $ccmunici_id;

	
	protected $aCcmunici;

	
	protected $collCccreregs;

	
	protected $lastCccreregCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomregnot()
  {

    return trim($this->nomregnot);

  }
  
  public function getDesregnot()
  {

    return trim($this->desregnot);

  }
  
  public function getDirregnot()
  {

    return trim($this->dirregnot);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getNumtelreg()
  {

    return trim($this->numtelreg);

  }
  
  public function getCodaretel2()
  {

    return trim($this->codaretel2);

  }
  
  public function getNumtelreg2()
  {

    return trim($this->numtelreg2);

  }
  
  public function getTipregnot()
  {

    return trim($this->tipregnot);

  }
  
  public function getCcmuniciId()
  {

    return $this->ccmunici_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcregnotPeer::ID;
      }
  
	} 
	
	public function setNomregnot($v)
	{

    if ($this->nomregnot !== $v) {
        $this->nomregnot = $v;
        $this->modifiedColumns[] = CcregnotPeer::NOMREGNOT;
      }
  
	} 
	
	public function setDesregnot($v)
	{

    if ($this->desregnot !== $v) {
        $this->desregnot = $v;
        $this->modifiedColumns[] = CcregnotPeer::DESREGNOT;
      }
  
	} 
	
	public function setDirregnot($v)
	{

    if ($this->dirregnot !== $v) {
        $this->dirregnot = $v;
        $this->modifiedColumns[] = CcregnotPeer::DIRREGNOT;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcregnotPeer::CODARETEL;
      }
  
	} 
	
	public function setNumtelreg($v)
	{

    if ($this->numtelreg !== $v) {
        $this->numtelreg = $v;
        $this->modifiedColumns[] = CcregnotPeer::NUMTELREG;
      }
  
	} 
	
	public function setCodaretel2($v)
	{

    if ($this->codaretel2 !== $v) {
        $this->codaretel2 = $v;
        $this->modifiedColumns[] = CcregnotPeer::CODARETEL2;
      }
  
	} 
	
	public function setNumtelreg2($v)
	{

    if ($this->numtelreg2 !== $v) {
        $this->numtelreg2 = $v;
        $this->modifiedColumns[] = CcregnotPeer::NUMTELREG2;
      }
  
	} 
	
	public function setTipregnot($v)
	{

    if ($this->tipregnot !== $v) {
        $this->tipregnot = $v;
        $this->modifiedColumns[] = CcregnotPeer::TIPREGNOT;
      }
  
	} 
	
	public function setCcmuniciId($v)
	{

    if ($this->ccmunici_id !== $v) {
        $this->ccmunici_id = $v;
        $this->modifiedColumns[] = CcregnotPeer::CCMUNICI_ID;
      }
  
		if ($this->aCcmunici !== null && $this->aCcmunici->getId() !== $v) {
			$this->aCcmunici = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomregnot = $rs->getString($startcol + 1);

      $this->desregnot = $rs->getString($startcol + 2);

      $this->dirregnot = $rs->getString($startcol + 3);

      $this->codaretel = $rs->getString($startcol + 4);

      $this->numtelreg = $rs->getString($startcol + 5);

      $this->codaretel2 = $rs->getString($startcol + 6);

      $this->numtelreg2 = $rs->getString($startcol + 7);

      $this->tipregnot = $rs->getString($startcol + 8);

      $this->ccmunici_id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccregnot object", $e);
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
			$con = Propel::getConnection(CcregnotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcregnotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcregnotPeer::DATABASE_NAME);
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


												
			if ($this->aCcmunici !== null) {
				if ($this->aCcmunici->isModified()) {
					$affectedRows += $this->aCcmunici->save($con);
				}
				$this->setCcmunici($this->aCcmunici);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcregnotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcregnotPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccreregs !== null) {
				foreach($this->collCccreregs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCcmunici !== null) {
				if (!$this->aCcmunici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcmunici->getValidationFailures());
				}
			}


			if (($retval = CcregnotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccreregs !== null) {
					foreach($this->collCccreregs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcregnotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomregnot();
				break;
			case 2:
				return $this->getDesregnot();
				break;
			case 3:
				return $this->getDirregnot();
				break;
			case 4:
				return $this->getCodaretel();
				break;
			case 5:
				return $this->getNumtelreg();
				break;
			case 6:
				return $this->getCodaretel2();
				break;
			case 7:
				return $this->getNumtelreg2();
				break;
			case 8:
				return $this->getTipregnot();
				break;
			case 9:
				return $this->getCcmuniciId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcregnotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomregnot(),
			$keys[2] => $this->getDesregnot(),
			$keys[3] => $this->getDirregnot(),
			$keys[4] => $this->getCodaretel(),
			$keys[5] => $this->getNumtelreg(),
			$keys[6] => $this->getCodaretel2(),
			$keys[7] => $this->getNumtelreg2(),
			$keys[8] => $this->getTipregnot(),
			$keys[9] => $this->getCcmuniciId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcregnotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomregnot($value);
				break;
			case 2:
				$this->setDesregnot($value);
				break;
			case 3:
				$this->setDirregnot($value);
				break;
			case 4:
				$this->setCodaretel($value);
				break;
			case 5:
				$this->setNumtelreg($value);
				break;
			case 6:
				$this->setCodaretel2($value);
				break;
			case 7:
				$this->setNumtelreg2($value);
				break;
			case 8:
				$this->setTipregnot($value);
				break;
			case 9:
				$this->setCcmuniciId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcregnotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomregnot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesregnot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirregnot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodaretel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumtelreg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaretel2($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumtelreg2($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipregnot($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcmuniciId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcregnotPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcregnotPeer::ID)) $criteria->add(CcregnotPeer::ID, $this->id);
		if ($this->isColumnModified(CcregnotPeer::NOMREGNOT)) $criteria->add(CcregnotPeer::NOMREGNOT, $this->nomregnot);
		if ($this->isColumnModified(CcregnotPeer::DESREGNOT)) $criteria->add(CcregnotPeer::DESREGNOT, $this->desregnot);
		if ($this->isColumnModified(CcregnotPeer::DIRREGNOT)) $criteria->add(CcregnotPeer::DIRREGNOT, $this->dirregnot);
		if ($this->isColumnModified(CcregnotPeer::CODARETEL)) $criteria->add(CcregnotPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcregnotPeer::NUMTELREG)) $criteria->add(CcregnotPeer::NUMTELREG, $this->numtelreg);
		if ($this->isColumnModified(CcregnotPeer::CODARETEL2)) $criteria->add(CcregnotPeer::CODARETEL2, $this->codaretel2);
		if ($this->isColumnModified(CcregnotPeer::NUMTELREG2)) $criteria->add(CcregnotPeer::NUMTELREG2, $this->numtelreg2);
		if ($this->isColumnModified(CcregnotPeer::TIPREGNOT)) $criteria->add(CcregnotPeer::TIPREGNOT, $this->tipregnot);
		if ($this->isColumnModified(CcregnotPeer::CCMUNICI_ID)) $criteria->add(CcregnotPeer::CCMUNICI_ID, $this->ccmunici_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcregnotPeer::DATABASE_NAME);

		$criteria->add(CcregnotPeer::ID, $this->id);

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

		$copyObj->setNomregnot($this->nomregnot);

		$copyObj->setDesregnot($this->desregnot);

		$copyObj->setDirregnot($this->dirregnot);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setNumtelreg($this->numtelreg);

		$copyObj->setCodaretel2($this->codaretel2);

		$copyObj->setNumtelreg2($this->numtelreg2);

		$copyObj->setTipregnot($this->tipregnot);

		$copyObj->setCcmuniciId($this->ccmunici_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccreregs() as $relObj) {
				$copyObj->addCccrereg($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CcregnotPeer();
		}
		return self::$peer;
	}

	
	public function setCcmunici($v)
	{


		if ($v === null) {
			$this->setCcmuniciId(NULL);
		} else {
			$this->setCcmuniciId($v->getId());
		}


		$this->aCcmunici = $v;
	}


	
	public function getCcmunici($con = null)
	{
		if ($this->aCcmunici === null && ($this->ccmunici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcmuniciPeer.php';

      $c = new Criteria();
      $c->add(CcmuniciPeer::ID,$this->ccmunici_id);
      
			$this->aCcmunici = CcmuniciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcmunici;
	}

	
	public function initCccreregs()
	{
		if ($this->collCccreregs === null) {
			$this->collCccreregs = array();
		}
	}

	
	public function getCccreregs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreregPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreregs === null) {
			if ($this->isNew()) {
			   $this->collCccreregs = array();
			} else {

				$criteria->add(CccreregPeer::CCREGNOT_ID, $this->getId());

				CccreregPeer::addSelectColumns($criteria);
				$this->collCccreregs = CccreregPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreregPeer::CCREGNOT_ID, $this->getId());

				CccreregPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreregCriteria) || !$this->lastCccreregCriteria->equals($criteria)) {
					$this->collCccreregs = CccreregPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreregCriteria = $criteria;
		return $this->collCccreregs;
	}

	
	public function countCccreregs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreregPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreregPeer::CCREGNOT_ID, $this->getId());

		return CccreregPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccrereg(Cccrereg $l)
	{
		$this->collCccreregs[] = $l;
		$l->setCcregnot($this);
	}


	
	public function getCccreregsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreregPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreregs === null) {
			if ($this->isNew()) {
				$this->collCccreregs = array();
			} else {

				$criteria->add(CccreregPeer::CCREGNOT_ID, $this->getId());

				$this->collCccreregs = CccreregPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreregPeer::CCREGNOT_ID, $this->getId());

			if (!isset($this->lastCccreregCriteria) || !$this->lastCccreregCriteria->equals($criteria)) {
				$this->collCccreregs = CccreregPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCccreregCriteria = $criteria;

		return $this->collCccreregs;
	}

} 