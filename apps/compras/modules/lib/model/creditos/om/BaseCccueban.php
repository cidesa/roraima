<?php


abstract class BaseCccueban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numcue;


	
	protected $estatu;


	
	protected $cctipcue_id;


	
	protected $ccbanco_id;

	
	protected $aCctipcue;

	
	protected $aCcbanco;

	
	protected $collCcdetcuadess;

	
	protected $lastCcdetcuadesCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcpagos;

	
	protected $lastCcpagoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCctipcueId()
  {

    return $this->cctipcue_id;

  }
  
  public function getCcbancoId()
  {

    return $this->ccbanco_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccuebanPeer::ID;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CccuebanPeer::NUMCUE;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CccuebanPeer::ESTATU;
      }
  
	} 
	
	public function setCctipcueId($v)
	{

    if ($this->cctipcue_id !== $v) {
        $this->cctipcue_id = $v;
        $this->modifiedColumns[] = CccuebanPeer::CCTIPCUE_ID;
      }
  
		if ($this->aCctipcue !== null && $this->aCctipcue->getId() !== $v) {
			$this->aCctipcue = null;
		}

	} 
	
	public function setCcbancoId($v)
	{

    if ($this->ccbanco_id !== $v) {
        $this->ccbanco_id = $v;
        $this->modifiedColumns[] = CccuebanPeer::CCBANCO_ID;
      }
  
		if ($this->aCcbanco !== null && $this->aCcbanco->getId() !== $v) {
			$this->aCcbanco = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numcue = $rs->getString($startcol + 1);

      $this->estatu = $rs->getString($startcol + 2);

      $this->cctipcue_id = $rs->getInt($startcol + 3);

      $this->ccbanco_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccueban object", $e);
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
			$con = Propel::getConnection(CccuebanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccuebanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccuebanPeer::DATABASE_NAME);
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


												
			if ($this->aCctipcue !== null) {
				if ($this->aCctipcue->isModified()) {
					$affectedRows += $this->aCctipcue->save($con);
				}
				$this->setCctipcue($this->aCctipcue);
			}

			if ($this->aCcbanco !== null) {
				if ($this->aCcbanco->isModified()) {
					$affectedRows += $this->aCcbanco->save($con);
				}
				$this->setCcbanco($this->aCcbanco);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccuebanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccuebanPeer::doUpdate($this, $con);
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

			if ($this->collCcpagos !== null) {
				foreach($this->collCcpagos as $referrerFK) {
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


												
			if ($this->aCctipcue !== null) {
				if (!$this->aCctipcue->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipcue->getValidationFailures());
				}
			}

			if ($this->aCcbanco !== null) {
				if (!$this->aCcbanco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbanco->getValidationFailures());
				}
			}


			if (($retval = CccuebanPeer::doValidate($this, $columns)) !== true) {
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

				if ($this->collCcpagos !== null) {
					foreach($this->collCcpagos as $referrerFK) {
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
		$pos = CccuebanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumcue();
				break;
			case 2:
				return $this->getEstatu();
				break;
			case 3:
				return $this->getCctipcueId();
				break;
			case 4:
				return $this->getCcbancoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccuebanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumcue(),
			$keys[2] => $this->getEstatu(),
			$keys[3] => $this->getCctipcueId(),
			$keys[4] => $this->getCcbancoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccuebanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumcue($value);
				break;
			case 2:
				$this->setEstatu($value);
				break;
			case 3:
				$this->setCctipcueId($value);
				break;
			case 4:
				$this->setCcbancoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccuebanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEstatu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCctipcueId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcbancoId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccuebanPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccuebanPeer::ID)) $criteria->add(CccuebanPeer::ID, $this->id);
		if ($this->isColumnModified(CccuebanPeer::NUMCUE)) $criteria->add(CccuebanPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CccuebanPeer::ESTATU)) $criteria->add(CccuebanPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CccuebanPeer::CCTIPCUE_ID)) $criteria->add(CccuebanPeer::CCTIPCUE_ID, $this->cctipcue_id);
		if ($this->isColumnModified(CccuebanPeer::CCBANCO_ID)) $criteria->add(CccuebanPeer::CCBANCO_ID, $this->ccbanco_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccuebanPeer::DATABASE_NAME);

		$criteria->add(CccuebanPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCctipcueId($this->cctipcue_id);

		$copyObj->setCcbancoId($this->ccbanco_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdetcuadess() as $relObj) {
				$copyObj->addCcdetcuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagos() as $relObj) {
				$copyObj->addCcpago($relObj->copy($deepCopy));
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
			self::$peer = new CccuebanPeer();
		}
		return self::$peer;
	}

	
	public function setCctipcue($v)
	{


		if ($v === null) {
			$this->setCctipcueId(NULL);
		} else {
			$this->setCctipcueId($v->getId());
		}


		$this->aCctipcue = $v;
	}


	
	public function getCctipcue($con = null)
	{
		if ($this->aCctipcue === null && ($this->cctipcue_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipcuePeer.php';

      $c = new Criteria();
      $c->add(CctipcuePeer::ID,$this->cctipcue_id);
      
			$this->aCctipcue = CctipcuePeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipcue;
	}

	
	public function setCcbanco($v)
	{


		if ($v === null) {
			$this->setCcbancoId(NULL);
		} else {
			$this->setCcbancoId($v->getId());
		}


		$this->aCcbanco = $v;
	}


	
	public function getCcbanco($con = null)
	{
		if ($this->aCcbanco === null && ($this->ccbanco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbancoPeer.php';

      $c = new Criteria();
      $c->add(CcbancoPeer::ID,$this->ccbanco_id);
      
			$this->aCcbanco = CcbancoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbanco;
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

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

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

		$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

		return CcdetcuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetcuades(Ccdetcuades $l)
	{
		$this->collCcdetcuadess[] = $l;
		$l->setCccueban($this);
	}


	
	public function getCcdetcuadessJoinCcpagter($criteria = null, $con = null)
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

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
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

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
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

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

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

		$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCccueban($this);
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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpagter($criteria = null, $con = null)
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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
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

				$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

	
	public function initCcpagos()
	{
		if ($this->collCcpagos === null) {
			$this->collCcpagos = array();
		}
	}

	
	public function getCcpagos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
			   $this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
					$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagoCriteria = $criteria;
		return $this->collCcpagos;
	}

	
	public function countCcpagos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

		return CcpagoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpago(Ccpago $l)
	{
		$this->collCcpagos[] = $l;
		$l->setCccueban($this);
	}


	
	public function getCcpagosJoinCcperparamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}

} 