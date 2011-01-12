<?php


abstract class BaseCcpagter extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomter;


	
	protected $rifter;


	
	protected $telter;


	
	protected $codaretel;


	
	protected $dirtel;


	
	protected $observ;


	
	protected $ccacteco_id;


	
	protected $ccperpre_id;


	
	protected $cctipups_id;


	
	protected $ccparroq_id;

	
	protected $aCcacteco;

	
	protected $aCcperpre;

	
	protected $aCctipups;

	
	protected $aCcparroq;

	
	protected $collCcdetcuadess;

	
	protected $lastCcdetcuadesCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomter()
  {

    return trim($this->nomter);

  }
  
  public function getRifter()
  {

    return trim($this->rifter);

  }
  
  public function getTelter()
  {

    return trim($this->telter);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getDirtel()
  {

    return trim($this->dirtel);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCcactecoId()
  {

    return $this->ccacteco_id;

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCctipupsId()
  {

    return $this->cctipups_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcpagterPeer::ID;
      }
  
	} 
	
	public function setNomter($v)
	{

    if ($this->nomter !== $v) {
        $this->nomter = $v;
        $this->modifiedColumns[] = CcpagterPeer::NOMTER;
      }
  
	} 
	
	public function setRifter($v)
	{

    if ($this->rifter !== $v) {
        $this->rifter = $v;
        $this->modifiedColumns[] = CcpagterPeer::RIFTER;
      }
  
	} 
	
	public function setTelter($v)
	{

    if ($this->telter !== $v) {
        $this->telter = $v;
        $this->modifiedColumns[] = CcpagterPeer::TELTER;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcpagterPeer::CODARETEL;
      }
  
	} 
	
	public function setDirtel($v)
	{

    if ($this->dirtel !== $v) {
        $this->dirtel = $v;
        $this->modifiedColumns[] = CcpagterPeer::DIRTEL;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcpagterPeer::OBSERV;
      }
  
	} 
	
	public function setCcactecoId($v)
	{

    if ($this->ccacteco_id !== $v) {
        $this->ccacteco_id = $v;
        $this->modifiedColumns[] = CcpagterPeer::CCACTECO_ID;
      }
  
		if ($this->aCcacteco !== null && $this->aCcacteco->getId() !== $v) {
			$this->aCcacteco = null;
		}

	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcpagterPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCctipupsId($v)
	{

    if ($this->cctipups_id !== $v) {
        $this->cctipups_id = $v;
        $this->modifiedColumns[] = CcpagterPeer::CCTIPUPS_ID;
      }
  
		if ($this->aCctipups !== null && $this->aCctipups->getId() !== $v) {
			$this->aCctipups = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcpagterPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomter = $rs->getString($startcol + 1);

      $this->rifter = $rs->getString($startcol + 2);

      $this->telter = $rs->getString($startcol + 3);

      $this->codaretel = $rs->getString($startcol + 4);

      $this->dirtel = $rs->getString($startcol + 5);

      $this->observ = $rs->getString($startcol + 6);

      $this->ccacteco_id = $rs->getInt($startcol + 7);

      $this->ccperpre_id = $rs->getInt($startcol + 8);

      $this->cctipups_id = $rs->getInt($startcol + 9);

      $this->ccparroq_id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccpagter object", $e);
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
			$con = Propel::getConnection(CcpagterPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcpagterPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcpagterPeer::DATABASE_NAME);
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


												
			if ($this->aCcacteco !== null) {
				if ($this->aCcacteco->isModified()) {
					$affectedRows += $this->aCcacteco->save($con);
				}
				$this->setCcacteco($this->aCcacteco);
			}

			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCctipups !== null) {
				if ($this->aCctipups->isModified()) {
					$affectedRows += $this->aCctipups->save($con);
				}
				$this->setCctipups($this->aCctipups);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcpagterPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcpagterPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdetcuadess !== null) {
				foreach($this->collCcdetcuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcliquids !== null) {
				foreach($this->collCcliquids as $referrerFK) {
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


												
			if ($this->aCcacteco !== null) {
				if (!$this->aCcacteco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcacteco->getValidationFailures());
				}
			}

			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCctipups !== null) {
				if (!$this->aCctipups->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipups->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcpagterPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdetcuadess !== null) {
					foreach($this->collCcdetcuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcliquids !== null) {
					foreach($this->collCcliquids as $referrerFK) {
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
		$pos = CcpagterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomter();
				break;
			case 2:
				return $this->getRifter();
				break;
			case 3:
				return $this->getTelter();
				break;
			case 4:
				return $this->getCodaretel();
				break;
			case 5:
				return $this->getDirtel();
				break;
			case 6:
				return $this->getObserv();
				break;
			case 7:
				return $this->getCcactecoId();
				break;
			case 8:
				return $this->getCcperpreId();
				break;
			case 9:
				return $this->getCctipupsId();
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
		$keys = CcpagterPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomter(),
			$keys[2] => $this->getRifter(),
			$keys[3] => $this->getTelter(),
			$keys[4] => $this->getCodaretel(),
			$keys[5] => $this->getDirtel(),
			$keys[6] => $this->getObserv(),
			$keys[7] => $this->getCcactecoId(),
			$keys[8] => $this->getCcperpreId(),
			$keys[9] => $this->getCctipupsId(),
			$keys[10] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpagterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomter($value);
				break;
			case 2:
				$this->setRifter($value);
				break;
			case 3:
				$this->setTelter($value);
				break;
			case 4:
				$this->setCodaretel($value);
				break;
			case 5:
				$this->setDirtel($value);
				break;
			case 6:
				$this->setObserv($value);
				break;
			case 7:
				$this->setCcactecoId($value);
				break;
			case 8:
				$this->setCcperpreId($value);
				break;
			case 9:
				$this->setCctipupsId($value);
				break;
			case 10:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpagterPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomter($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifter($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelter($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodaretel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirtel($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObserv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcactecoId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcperpreId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCctipupsId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcparroqId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcpagterPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcpagterPeer::ID)) $criteria->add(CcpagterPeer::ID, $this->id);
		if ($this->isColumnModified(CcpagterPeer::NOMTER)) $criteria->add(CcpagterPeer::NOMTER, $this->nomter);
		if ($this->isColumnModified(CcpagterPeer::RIFTER)) $criteria->add(CcpagterPeer::RIFTER, $this->rifter);
		if ($this->isColumnModified(CcpagterPeer::TELTER)) $criteria->add(CcpagterPeer::TELTER, $this->telter);
		if ($this->isColumnModified(CcpagterPeer::CODARETEL)) $criteria->add(CcpagterPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcpagterPeer::DIRTEL)) $criteria->add(CcpagterPeer::DIRTEL, $this->dirtel);
		if ($this->isColumnModified(CcpagterPeer::OBSERV)) $criteria->add(CcpagterPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcpagterPeer::CCACTECO_ID)) $criteria->add(CcpagterPeer::CCACTECO_ID, $this->ccacteco_id);
		if ($this->isColumnModified(CcpagterPeer::CCPERPRE_ID)) $criteria->add(CcpagterPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcpagterPeer::CCTIPUPS_ID)) $criteria->add(CcpagterPeer::CCTIPUPS_ID, $this->cctipups_id);
		if ($this->isColumnModified(CcpagterPeer::CCPARROQ_ID)) $criteria->add(CcpagterPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcpagterPeer::DATABASE_NAME);

		$criteria->add(CcpagterPeer::ID, $this->id);

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

		$copyObj->setNomter($this->nomter);

		$copyObj->setRifter($this->rifter);

		$copyObj->setTelter($this->telter);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setDirtel($this->dirtel);

		$copyObj->setObserv($this->observ);

		$copyObj->setCcactecoId($this->ccacteco_id);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCctipupsId($this->cctipups_id);

		$copyObj->setCcparroqId($this->ccparroq_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdetcuadess() as $relObj) {
				$copyObj->addCcdetcuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
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
			self::$peer = new CcpagterPeer();
		}
		return self::$peer;
	}

	
	public function setCcacteco($v)
	{


		if ($v === null) {
			$this->setCcactecoId(NULL);
		} else {
			$this->setCcactecoId($v->getId());
		}


		$this->aCcacteco = $v;
	}


	
	public function getCcacteco($con = null)
	{
		if ($this->aCcacteco === null && ($this->ccacteco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactecoPeer.php';

      $c = new Criteria();
      $c->add(CcactecoPeer::ID,$this->ccacteco_id);
      
			$this->aCcacteco = CcactecoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcacteco;
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

	
	public function setCctipups($v)
	{


		if ($v === null) {
			$this->setCctipupsId(NULL);
		} else {
			$this->setCctipupsId($v->getId());
		}


		$this->aCctipups = $v;
	}


	
	public function getCctipups($con = null)
	{
		if ($this->aCctipups === null && ($this->cctipups_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipupsPeer.php';

      $c = new Criteria();
      $c->add(CctipupsPeer::ID,$this->cctipups_id);
      
			$this->aCctipups = CctipupsPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipups;
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

	
	public function initCcdetcuadess()
	{
		if ($this->collCcdetcuadess === null) {
			$this->collCcdetcuadess = array();
		}
	}

	
	public function getCcdetcuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
			   $this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
					$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;
		return $this->collCcdetcuadess;
	}

	
	public function countCcdetcuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

		return CcdetcuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetcuades(Ccdetcuades $l)
	{
		$this->collCcdetcuadess[] = $l;
		$l->setCcpagter($this);
	}


	
	public function getCcdetcuadessJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCpcausad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}

	
	public function initCcliquids()
	{
		if ($this->collCcliquids === null) {
			$this->collCcliquids = array();
		}
	}

	
	public function getCcliquids($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
			   $this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
					$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcliquidCriteria = $criteria;
		return $this->collCcliquids;
	}

	
	public function countCcliquids($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCcpagter($this);
	}


	
	public function getCcliquidsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcsolliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPAGTER_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

} 