<?php


abstract class BaseCcusuario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomusu;


	
	protected $contras;


	
	protected $cedusu;


	
	protected $login;


	
	protected $ccbenefi_id;


	
	protected $ccperpre_id;

	
	protected $aCcbenefi;

	
	protected $aCcperpre;

	
	protected $collCcbalgers;

	
	protected $lastCcbalgerCriteria = null;

	
	protected $collCcbitcreds;

	
	protected $lastCcbitcredCriteria = null;

	
	protected $collCccreusus;

	
	protected $lastCccreusuCriteria = null;

	
	protected $collCcresusus;

	
	protected $lastCcresusuCriteria = null;

	
	protected $collCcsolicis;

	
	protected $lastCcsoliciCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomusu()
  {

    return trim($this->nomusu);

  }
  
  public function getContras()
  {

    return trim($this->contras);

  }
  
  public function getCedusu()
  {

    return trim($this->cedusu);

  }
  
  public function getLogin()
  {

    return trim($this->login);

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcusuarioPeer::ID;
      }
  
	} 
	
	public function setNomusu($v)
	{

    if ($this->nomusu !== $v) {
        $this->nomusu = $v;
        $this->modifiedColumns[] = CcusuarioPeer::NOMUSU;
      }
  
	} 
	
	public function setContras($v)
	{

    if ($this->contras !== $v) {
        $this->contras = $v;
        $this->modifiedColumns[] = CcusuarioPeer::CONTRAS;
      }
  
	} 
	
	public function setCedusu($v)
	{

    if ($this->cedusu !== $v) {
        $this->cedusu = $v;
        $this->modifiedColumns[] = CcusuarioPeer::CEDUSU;
      }
  
	} 
	
	public function setLogin($v)
	{

    if ($this->login !== $v) {
        $this->login = $v;
        $this->modifiedColumns[] = CcusuarioPeer::LOGIN;
      }
  
	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcusuarioPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcusuarioPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomusu = $rs->getString($startcol + 1);

      $this->contras = $rs->getString($startcol + 2);

      $this->cedusu = $rs->getString($startcol + 3);

      $this->login = $rs->getString($startcol + 4);

      $this->ccbenefi_id = $rs->getInt($startcol + 5);

      $this->ccperpre_id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccusuario object", $e);
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
			$con = Propel::getConnection(CcusuarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcusuarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcusuarioPeer::DATABASE_NAME);
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

			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcusuarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcusuarioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbalgers !== null) {
				foreach($this->collCcbalgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbitcreds !== null) {
				foreach($this->collCcbitcreds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccreusus !== null) {
				foreach($this->collCccreusus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcresusus !== null) {
				foreach($this->collCcresusus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolicis !== null) {
				foreach($this->collCcsolicis as $referrerFK) {
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


												
			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}

			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}


			if (($retval = CcusuarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbalgers !== null) {
					foreach($this->collCcbalgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbitcreds !== null) {
					foreach($this->collCcbitcreds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccreusus !== null) {
					foreach($this->collCccreusus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcresusus !== null) {
					foreach($this->collCcresusus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolicis !== null) {
					foreach($this->collCcsolicis as $referrerFK) {
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
		$pos = CcusuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomusu();
				break;
			case 2:
				return $this->getContras();
				break;
			case 3:
				return $this->getCedusu();
				break;
			case 4:
				return $this->getLogin();
				break;
			case 5:
				return $this->getCcbenefiId();
				break;
			case 6:
				return $this->getCcperpreId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcusuarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomusu(),
			$keys[2] => $this->getContras(),
			$keys[3] => $this->getCedusu(),
			$keys[4] => $this->getLogin(),
			$keys[5] => $this->getCcbenefiId(),
			$keys[6] => $this->getCcperpreId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcusuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomusu($value);
				break;
			case 2:
				$this->setContras($value);
				break;
			case 3:
				$this->setCedusu($value);
				break;
			case 4:
				$this->setLogin($value);
				break;
			case 5:
				$this->setCcbenefiId($value);
				break;
			case 6:
				$this->setCcperpreId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcusuarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomusu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setContras($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedusu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLogin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcbenefiId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcperpreId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcusuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcusuarioPeer::ID)) $criteria->add(CcusuarioPeer::ID, $this->id);
		if ($this->isColumnModified(CcusuarioPeer::NOMUSU)) $criteria->add(CcusuarioPeer::NOMUSU, $this->nomusu);
		if ($this->isColumnModified(CcusuarioPeer::CONTRAS)) $criteria->add(CcusuarioPeer::CONTRAS, $this->contras);
		if ($this->isColumnModified(CcusuarioPeer::CEDUSU)) $criteria->add(CcusuarioPeer::CEDUSU, $this->cedusu);
		if ($this->isColumnModified(CcusuarioPeer::LOGIN)) $criteria->add(CcusuarioPeer::LOGIN, $this->login);
		if ($this->isColumnModified(CcusuarioPeer::CCBENEFI_ID)) $criteria->add(CcusuarioPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CcusuarioPeer::CCPERPRE_ID)) $criteria->add(CcusuarioPeer::CCPERPRE_ID, $this->ccperpre_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcusuarioPeer::DATABASE_NAME);

		$criteria->add(CcusuarioPeer::ID, $this->id);

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

		$copyObj->setNomusu($this->nomusu);

		$copyObj->setContras($this->contras);

		$copyObj->setCedusu($this->cedusu);

		$copyObj->setLogin($this->login);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

		$copyObj->setCcperpreId($this->ccperpre_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbalgers() as $relObj) {
				$copyObj->addCcbalger($relObj->copy($deepCopy));
			}

			foreach($this->getCcbitcreds() as $relObj) {
				$copyObj->addCcbitcred($relObj->copy($deepCopy));
			}

			foreach($this->getCccreusus() as $relObj) {
				$copyObj->addCccreusu($relObj->copy($deepCopy));
			}

			foreach($this->getCcresusus() as $relObj) {
				$copyObj->addCcresusu($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolicis() as $relObj) {
				$copyObj->addCcsolici($relObj->copy($deepCopy));
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
			self::$peer = new CcusuarioPeer();
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

	
	public function initCcbalgers()
	{
		if ($this->collCcbalgers === null) {
			$this->collCcbalgers = array();
		}
	}

	
	public function getCcbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

				CcbalgerPeer::addSelectColumns($criteria);
				$this->collCcbalgers = CcbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

				CcbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
					$this->collCcbalgers = CcbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbalgerCriteria = $criteria;
		return $this->collCcbalgers;
	}

	
	public function countCcbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

		return CcbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbalger(Ccbalger $l)
	{
		$this->collCcbalgers[] = $l;
		$l->setCcusuario($this);
	}


	
	public function getCcbalgersJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
				$this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcbalgerCriteria = $criteria;

		return $this->collCcbalgers;
	}


	
	public function getCcbalgersJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
				$this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcbalgerCriteria = $criteria;

		return $this->collCcbalgers;
	}

	
	public function initCcbitcreds()
	{
		if ($this->collCcbitcreds === null) {
			$this->collCcbitcreds = array();
		}
	}

	
	public function getCcbitcreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
			   $this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

				CcbitcredPeer::addSelectColumns($criteria);
				$this->collCcbitcreds = CcbitcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

				CcbitcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
					$this->collCcbitcreds = CcbitcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbitcredCriteria = $criteria;
		return $this->collCcbitcreds;
	}

	
	public function countCcbitcreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

		return CcbitcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbitcred(Ccbitcred $l)
	{
		$this->collCcbitcreds[] = $l;
		$l->setCcusuario($this);
	}


	
	public function getCcbitcredsJoinCcestatu($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
				$this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcestatu($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCcestatu($criteria, $con);
			}
		}
		$this->lastCcbitcredCriteria = $criteria;

		return $this->collCcbitcreds;
	}


	
	public function getCcbitcredsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbitcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbitcreds === null) {
			if ($this->isNew()) {
				$this->collCcbitcreds = array();
			} else {

				$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbitcredPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcbitcredCriteria) || !$this->lastCcbitcredCriteria->equals($criteria)) {
				$this->collCcbitcreds = CcbitcredPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcbitcredCriteria = $criteria;

		return $this->collCcbitcreds;
	}

	
	public function initCccreusus()
	{
		if ($this->collCccreusus === null) {
			$this->collCccreusus = array();
		}
	}

	
	public function getCccreusus($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreusus === null) {
			if ($this->isNew()) {
			   $this->collCccreusus = array();
			} else {

				$criteria->add(CccreusuPeer::CCUSUARIO_ID, $this->getId());

				CccreusuPeer::addSelectColumns($criteria);
				$this->collCccreusus = CccreusuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreusuPeer::CCUSUARIO_ID, $this->getId());

				CccreusuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreusuCriteria) || !$this->lastCccreusuCriteria->equals($criteria)) {
					$this->collCccreusus = CccreusuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreusuCriteria = $criteria;
		return $this->collCccreusus;
	}

	
	public function countCccreusus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreusuPeer::CCUSUARIO_ID, $this->getId());

		return CccreusuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccreusu(Cccreusu $l)
	{
		$this->collCccreusus[] = $l;
		$l->setCcusuario($this);
	}


	
	public function getCccreususJoinCccreden($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreusus === null) {
			if ($this->isNew()) {
				$this->collCccreusus = array();
			} else {

				$criteria->add(CccreusuPeer::CCUSUARIO_ID, $this->getId());

				$this->collCccreusus = CccreusuPeer::doSelectJoinCccreden($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreusuPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCccreusuCriteria) || !$this->lastCccreusuCriteria->equals($criteria)) {
				$this->collCccreusus = CccreusuPeer::doSelectJoinCccreden($criteria, $con);
			}
		}
		$this->lastCccreusuCriteria = $criteria;

		return $this->collCccreusus;
	}

	
	public function initCcresusus()
	{
		if ($this->collCcresusus === null) {
			$this->collCcresusus = array();
		}
	}

	
	public function getCcresusus($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcresusus === null) {
			if ($this->isNew()) {
			   $this->collCcresusus = array();
			} else {

				$criteria->add(CcresusuPeer::CCUSUARIO_ID, $this->getId());

				CcresusuPeer::addSelectColumns($criteria);
				$this->collCcresusus = CcresusuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcresusuPeer::CCUSUARIO_ID, $this->getId());

				CcresusuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcresusuCriteria) || !$this->lastCcresusuCriteria->equals($criteria)) {
					$this->collCcresusus = CcresusuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcresusuCriteria = $criteria;
		return $this->collCcresusus;
	}

	
	public function countCcresusus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcresusuPeer::CCUSUARIO_ID, $this->getId());

		return CcresusuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcresusu(Ccresusu $l)
	{
		$this->collCcresusus[] = $l;
		$l->setCcusuario($this);
	}


	
	public function getCcresususJoinCcpregun($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcresusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcresusus === null) {
			if ($this->isNew()) {
				$this->collCcresusus = array();
			} else {

				$criteria->add(CcresusuPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcresusus = CcresusuPeer::doSelectJoinCcpregun($criteria, $con);
			}
		} else {
									
			$criteria->add(CcresusuPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcresusuCriteria) || !$this->lastCcresusuCriteria->equals($criteria)) {
				$this->collCcresusus = CcresusuPeer::doSelectJoinCcpregun($criteria, $con);
			}
		}
		$this->lastCcresusuCriteria = $criteria;

		return $this->collCcresusus;
	}

	
	public function initCcsolicis()
	{
		if ($this->collCcsolicis === null) {
			$this->collCcsolicis = array();
		}
	}

	
	public function getCcsolicis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
			   $this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
					$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoliciCriteria = $criteria;
		return $this->collCcsolicis;
	}

	
	public function countCcsolicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

		return CcsoliciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolici(Ccsolici $l)
	{
		$this->collCcsolicis[] = $l;
		$l->setCcusuario($this);
	}


	
	public function getCcsolicisJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcmunici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccircuito($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}

} 