<?php


abstract class BaseCcbalger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fecbalger;


	
	protected $ccbenefi_id;


	
	protected $ccsolici_id;


	
	protected $ccusuario_id;

	
	protected $aCcbenefi;

	
	protected $aCcsolici;

	
	protected $aCcusuario;

	
	protected $collCcdetbalgers;

	
	protected $lastCcdetbalgerCriteria = null;

	
	protected $collCcindbalgers;

	
	protected $lastCcindbalgerCriteria = null;

	
	protected $collCcvarbalgers;

	
	protected $lastCcvarbalgerCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getFecbalger($format = 'Y-m-d')
  {

    if ($this->fecbalger === null || $this->fecbalger === '') {
      return null;
    } elseif (!is_int($this->fecbalger)) {
            $ts = adodb_strtotime($this->fecbalger);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecbalger] as date/time value: " . var_export($this->fecbalger, true));
      }
    } else {
      $ts = $this->fecbalger;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcusuarioId()
  {

    return $this->ccusuario_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbalgerPeer::ID;
      }
  
	} 
	
	public function setFecbalger($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecbalger] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecbalger !== $ts) {
      $this->fecbalger = $ts;
      $this->modifiedColumns[] = CcbalgerPeer::FECBALGER;
    }

	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcbalgerPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcbalgerPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcusuarioId($v)
	{

    if ($this->ccusuario_id !== $v) {
        $this->ccusuario_id = $v;
        $this->modifiedColumns[] = CcbalgerPeer::CCUSUARIO_ID;
      }
  
		if ($this->aCcusuario !== null && $this->aCcusuario->getId() !== $v) {
			$this->aCcusuario = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->fecbalger = $rs->getDate($startcol + 1, null);

      $this->ccbenefi_id = $rs->getInt($startcol + 2);

      $this->ccsolici_id = $rs->getInt($startcol + 3);

      $this->ccusuario_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbalger object", $e);
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
			$con = Propel::getConnection(CcbalgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbalgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbalgerPeer::DATABASE_NAME);
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

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCcusuario !== null) {
				if ($this->aCcusuario->isModified()) {
					$affectedRows += $this->aCcusuario->save($con);
				}
				$this->setCcusuario($this->aCcusuario);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbalgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbalgerPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdetbalgers !== null) {
				foreach($this->collCcdetbalgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcindbalgers !== null) {
				foreach($this->collCcindbalgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcvarbalgers !== null) {
				foreach($this->collCcvarbalgers as $referrerFK) {
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

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCcusuario !== null) {
				if (!$this->aCcusuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuario->getValidationFailures());
				}
			}


			if (($retval = CcbalgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdetbalgers !== null) {
					foreach($this->collCcdetbalgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcindbalgers !== null) {
					foreach($this->collCcindbalgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcvarbalgers !== null) {
					foreach($this->collCcvarbalgers as $referrerFK) {
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
		$pos = CcbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFecbalger();
				break;
			case 2:
				return $this->getCcbenefiId();
				break;
			case 3:
				return $this->getCcsoliciId();
				break;
			case 4:
				return $this->getCcusuarioId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbalgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFecbalger(),
			$keys[2] => $this->getCcbenefiId(),
			$keys[3] => $this->getCcsoliciId(),
			$keys[4] => $this->getCcusuarioId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFecbalger($value);
				break;
			case 2:
				$this->setCcbenefiId($value);
				break;
			case 3:
				$this->setCcsoliciId($value);
				break;
			case 4:
				$this->setCcusuarioId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbalgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecbalger($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcbenefiId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcsoliciId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcusuarioId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbalgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbalgerPeer::ID)) $criteria->add(CcbalgerPeer::ID, $this->id);
		if ($this->isColumnModified(CcbalgerPeer::FECBALGER)) $criteria->add(CcbalgerPeer::FECBALGER, $this->fecbalger);
		if ($this->isColumnModified(CcbalgerPeer::CCBENEFI_ID)) $criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CcbalgerPeer::CCSOLICI_ID)) $criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcbalgerPeer::CCUSUARIO_ID)) $criteria->add(CcbalgerPeer::CCUSUARIO_ID, $this->ccusuario_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbalgerPeer::DATABASE_NAME);

		$criteria->add(CcbalgerPeer::ID, $this->id);

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

		$copyObj->setFecbalger($this->fecbalger);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);

		$copyObj->setCcusuarioId($this->ccusuario_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdetbalgers() as $relObj) {
				$copyObj->addCcdetbalger($relObj->copy($deepCopy));
			}

			foreach($this->getCcindbalgers() as $relObj) {
				$copyObj->addCcindbalger($relObj->copy($deepCopy));
			}

			foreach($this->getCcvarbalgers() as $relObj) {
				$copyObj->addCcvarbalger($relObj->copy($deepCopy));
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
			self::$peer = new CcbalgerPeer();
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

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
	}

	
	public function setCcusuario($v)
	{


		if ($v === null) {
			$this->setCcusuarioId(NULL);
		} else {
			$this->setCcusuarioId($v->getId());
		}


		$this->aCcusuario = $v;
	}


	
	public function getCcusuario($con = null)
	{
		if ($this->aCcusuario === null && ($this->ccusuario_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';

      $c = new Criteria();
      $c->add(CcusuarioPeer::ID,$this->ccusuario_id);
      
			$this->aCcusuario = CcusuarioPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuario;
	}

	
	public function initCcdetbalgers()
	{
		if ($this->collCcdetbalgers === null) {
			$this->collCcdetbalgers = array();
		}
	}

	
	public function getCcdetbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcdetbalgers = array();
			} else {

				$criteria->add(CcdetbalgerPeer::CCBALGER_ID, $this->getId());

				CcdetbalgerPeer::addSelectColumns($criteria);
				$this->collCcdetbalgers = CcdetbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetbalgerPeer::CCBALGER_ID, $this->getId());

				CcdetbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetbalgerCriteria) || !$this->lastCcdetbalgerCriteria->equals($criteria)) {
					$this->collCcdetbalgers = CcdetbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetbalgerCriteria = $criteria;
		return $this->collCcdetbalgers;
	}

	
	public function countCcdetbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetbalgerPeer::CCBALGER_ID, $this->getId());

		return CcdetbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetbalger(Ccdetbalger $l)
	{
		$this->collCcdetbalgers[] = $l;
		$l->setCcbalger($this);
	}


	
	public function getCcdetbalgersJoinCcconbalger($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetbalgers === null) {
			if ($this->isNew()) {
				$this->collCcdetbalgers = array();
			} else {

				$criteria->add(CcdetbalgerPeer::CCBALGER_ID, $this->getId());

				$this->collCcdetbalgers = CcdetbalgerPeer::doSelectJoinCcconbalger($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetbalgerPeer::CCBALGER_ID, $this->getId());

			if (!isset($this->lastCcdetbalgerCriteria) || !$this->lastCcdetbalgerCriteria->equals($criteria)) {
				$this->collCcdetbalgers = CcdetbalgerPeer::doSelectJoinCcconbalger($criteria, $con);
			}
		}
		$this->lastCcdetbalgerCriteria = $criteria;

		return $this->collCcdetbalgers;
	}

	
	public function initCcindbalgers()
	{
		if ($this->collCcindbalgers === null) {
			$this->collCcindbalgers = array();
		}
	}

	
	public function getCcindbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcindbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcindbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcindbalgers = array();
			} else {

				$criteria->add(CcindbalgerPeer::CCBALGER_ID, $this->getId());

				CcindbalgerPeer::addSelectColumns($criteria);
				$this->collCcindbalgers = CcindbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcindbalgerPeer::CCBALGER_ID, $this->getId());

				CcindbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcindbalgerCriteria) || !$this->lastCcindbalgerCriteria->equals($criteria)) {
					$this->collCcindbalgers = CcindbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcindbalgerCriteria = $criteria;
		return $this->collCcindbalgers;
	}

	
	public function countCcindbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcindbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcindbalgerPeer::CCBALGER_ID, $this->getId());

		return CcindbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcindbalger(Ccindbalger $l)
	{
		$this->collCcindbalgers[] = $l;
		$l->setCcbalger($this);
	}


	
	public function getCcindbalgersJoinCcindica($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcindbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcindbalgers === null) {
			if ($this->isNew()) {
				$this->collCcindbalgers = array();
			} else {

				$criteria->add(CcindbalgerPeer::CCBALGER_ID, $this->getId());

				$this->collCcindbalgers = CcindbalgerPeer::doSelectJoinCcindica($criteria, $con);
			}
		} else {
									
			$criteria->add(CcindbalgerPeer::CCBALGER_ID, $this->getId());

			if (!isset($this->lastCcindbalgerCriteria) || !$this->lastCcindbalgerCriteria->equals($criteria)) {
				$this->collCcindbalgers = CcindbalgerPeer::doSelectJoinCcindica($criteria, $con);
			}
		}
		$this->lastCcindbalgerCriteria = $criteria;

		return $this->collCcindbalgers;
	}

	
	public function initCcvarbalgers()
	{
		if ($this->collCcvarbalgers === null) {
			$this->collCcvarbalgers = array();
		}
	}

	
	public function getCcvarbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvarbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvarbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcvarbalgers = array();
			} else {

				$criteria->add(CcvarbalgerPeer::CCBALGER_ID, $this->getId());

				CcvarbalgerPeer::addSelectColumns($criteria);
				$this->collCcvarbalgers = CcvarbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcvarbalgerPeer::CCBALGER_ID, $this->getId());

				CcvarbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcvarbalgerCriteria) || !$this->lastCcvarbalgerCriteria->equals($criteria)) {
					$this->collCcvarbalgers = CcvarbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcvarbalgerCriteria = $criteria;
		return $this->collCcvarbalgers;
	}

	
	public function countCcvarbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvarbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcvarbalgerPeer::CCBALGER_ID, $this->getId());

		return CcvarbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcvarbalger(Ccvarbalger $l)
	{
		$this->collCcvarbalgers[] = $l;
		$l->setCcbalger($this);
	}


	
	public function getCcvarbalgersJoinCcvariab($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvarbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvarbalgers === null) {
			if ($this->isNew()) {
				$this->collCcvarbalgers = array();
			} else {

				$criteria->add(CcvarbalgerPeer::CCBALGER_ID, $this->getId());

				$this->collCcvarbalgers = CcvarbalgerPeer::doSelectJoinCcvariab($criteria, $con);
			}
		} else {
									
			$criteria->add(CcvarbalgerPeer::CCBALGER_ID, $this->getId());

			if (!isset($this->lastCcvarbalgerCriteria) || !$this->lastCcvarbalgerCriteria->equals($criteria)) {
				$this->collCcvarbalgers = CcvarbalgerPeer::doSelectJoinCcvariab($criteria, $con);
			}
		}
		$this->lastCcvarbalgerCriteria = $criteria;

		return $this->collCcvarbalgers;
	}

} 