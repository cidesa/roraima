<?php


abstract class BaseCcfuefin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomfuefin;


	
	protected $alias;


	
	protected $rif;


	
	protected $contabb_id;

	
	protected $aContabb;

	
	protected $collCccredits;

	
	protected $lastCccreditCriteria = null;

	
	protected $collCcprogras;

	
	protected $lastCcprograCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomfuefin()
  {

    return trim($this->nomfuefin);

  }
  
  public function getAlias()
  {

    return trim($this->alias);

  }
  
  public function getRif()
  {

    return trim($this->rif);

  }
  
  public function getContabbId()
  {

    return $this->contabb_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcfuefinPeer::ID;
      }
  
	} 
	
	public function setNomfuefin($v)
	{

    if ($this->nomfuefin !== $v) {
        $this->nomfuefin = $v;
        $this->modifiedColumns[] = CcfuefinPeer::NOMFUEFIN;
      }
  
	} 
	
	public function setAlias($v)
	{

    if ($this->alias !== $v) {
        $this->alias = $v;
        $this->modifiedColumns[] = CcfuefinPeer::ALIAS;
      }
  
	} 
	
	public function setRif($v)
	{

    if ($this->rif !== $v) {
        $this->rif = $v;
        $this->modifiedColumns[] = CcfuefinPeer::RIF;
      }
  
	} 
	
	public function setContabbId($v)
	{

    if ($this->contabb_id !== $v) {
        $this->contabb_id = $v;
        $this->modifiedColumns[] = CcfuefinPeer::CONTABB_ID;
      }
  
		if ($this->aContabb !== null && $this->aContabb->getId() !== $v) {
			$this->aContabb = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomfuefin = $rs->getString($startcol + 1);

      $this->alias = $rs->getString($startcol + 2);

      $this->rif = $rs->getString($startcol + 3);

      $this->contabb_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccfuefin object", $e);
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
			$con = Propel::getConnection(CcfuefinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcfuefinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcfuefinPeer::DATABASE_NAME);
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


												
			if ($this->aContabb !== null) {
				if ($this->aContabb->isModified()) {
					$affectedRows += $this->aContabb->save($con);
				}
				$this->setContabb($this->aContabb);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcfuefinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcfuefinPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccredits !== null) {
				foreach($this->collCccredits as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcprogras !== null) {
				foreach($this->collCcprogras as $referrerFK) {
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


												
			if ($this->aContabb !== null) {
				if (!$this->aContabb->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContabb->getValidationFailures());
				}
			}


			if (($retval = CcfuefinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccredits !== null) {
					foreach($this->collCccredits as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcprogras !== null) {
					foreach($this->collCcprogras as $referrerFK) {
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
		$pos = CcfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomfuefin();
				break;
			case 2:
				return $this->getAlias();
				break;
			case 3:
				return $this->getRif();
				break;
			case 4:
				return $this->getContabbId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfuefinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomfuefin(),
			$keys[2] => $this->getAlias(),
			$keys[3] => $this->getRif(),
			$keys[4] => $this->getContabbId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomfuefin($value);
				break;
			case 2:
				$this->setAlias($value);
				break;
			case 3:
				$this->setRif($value);
				break;
			case 4:
				$this->setContabbId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfuefinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomfuefin($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlias($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContabbId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcfuefinPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcfuefinPeer::ID)) $criteria->add(CcfuefinPeer::ID, $this->id);
		if ($this->isColumnModified(CcfuefinPeer::NOMFUEFIN)) $criteria->add(CcfuefinPeer::NOMFUEFIN, $this->nomfuefin);
		if ($this->isColumnModified(CcfuefinPeer::ALIAS)) $criteria->add(CcfuefinPeer::ALIAS, $this->alias);
		if ($this->isColumnModified(CcfuefinPeer::RIF)) $criteria->add(CcfuefinPeer::RIF, $this->rif);
		if ($this->isColumnModified(CcfuefinPeer::CONTABB_ID)) $criteria->add(CcfuefinPeer::CONTABB_ID, $this->contabb_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcfuefinPeer::DATABASE_NAME);

		$criteria->add(CcfuefinPeer::ID, $this->id);

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

		$copyObj->setNomfuefin($this->nomfuefin);

		$copyObj->setAlias($this->alias);

		$copyObj->setRif($this->rif);

		$copyObj->setContabbId($this->contabb_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccredits() as $relObj) {
				$copyObj->addCccredit($relObj->copy($deepCopy));
			}

			foreach($this->getCcprogras() as $relObj) {
				$copyObj->addCcprogra($relObj->copy($deepCopy));
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
			self::$peer = new CcfuefinPeer();
		}
		return self::$peer;
	}

	
	public function setContabb($v)
	{


		if ($v === null) {
			$this->setContabbId(NULL);
		} else {
			$this->setContabbId($v->getId());
		}


		$this->aContabb = $v;
	}


	
	public function getContabb($con = null)
	{
		if ($this->aContabb === null && ($this->contabb_id !== null)) {
						include_once 'lib/model/contabilidad/om/BaseContabbPeer.php';

      $c = new Criteria();
      $c->add(ContabbPeer::ID,$this->contabb_id);
      
			$this->aContabb = ContabbPeer::doSelectOne($c, $con);

			
		}
		return $this->aContabb;
	}

	
	public function initCccredits()
	{
		if ($this->collCccredits === null) {
			$this->collCccredits = array();
		}
	}

	
	public function getCccredits($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
			   $this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
					$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreditCriteria = $criteria;
		return $this->collCccredits;
	}

	
	public function countCccredits($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

		return CccreditPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccredit(Cccredit $l)
	{
		$this->collCccredits[] = $l;
		$l->setCcfuefin($this);
	}


	
	public function getCccreditsJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipcar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipmon($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcbanco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcagenci($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcprioridad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}

	
	public function initCcprogras()
	{
		if ($this->collCcprogras === null) {
			$this->collCcprogras = array();
		}
	}

	
	public function getCcprogras($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprogras === null) {
			if ($this->isNew()) {
			   $this->collCcprogras = array();
			} else {

				$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

				CcprograPeer::addSelectColumns($criteria);
				$this->collCcprogras = CcprograPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

				CcprograPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcprograCriteria) || !$this->lastCcprograCriteria->equals($criteria)) {
					$this->collCcprogras = CcprograPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcprograCriteria = $criteria;
		return $this->collCcprogras;
	}

	
	public function countCcprogras($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

		return CcprograPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcprogra(Ccprogra $l)
	{
		$this->collCcprogras[] = $l;
		$l->setCcfuefin($this);
	}


	
	public function getCcprograsJoinCcperiod($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprogras === null) {
			if ($this->isNew()) {
				$this->collCcprogras = array();
			} else {

				$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

				$this->collCcprogras = CcprograPeer::doSelectJoinCcperiod($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCcprograCriteria) || !$this->lastCcprograCriteria->equals($criteria)) {
				$this->collCcprogras = CcprograPeer::doSelectJoinCcperiod($criteria, $con);
			}
		}
		$this->lastCcprograCriteria = $criteria;

		return $this->collCcprogras;
	}


	
	public function getCcprograsJoinCpdoccom($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprograPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprogras === null) {
			if ($this->isNew()) {
				$this->collCcprogras = array();
			} else {

				$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

				$this->collCcprogras = CcprograPeer::doSelectJoinCpdoccom($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprograPeer::CCFUEFIN_ID, $this->getId());

			if (!isset($this->lastCcprograCriteria) || !$this->lastCcprograCriteria->equals($criteria)) {
				$this->collCcprogras = CcprograPeer::doSelectJoinCpdoccom($criteria, $con);
			}
		}
		$this->lastCcprograCriteria = $criteria;

		return $this->collCcprogras;
	}

} 