<?php


abstract class BaseCpdoccau extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipcau;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $refier;


	
	protected $afeprc;


	
	protected $afecom;


	
	protected $afecau;


	
	protected $afedis;


	
	protected $id;

	
	protected $collCpcausads;

	
	protected $lastCpcausadCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getNomext()
  {

    return trim($this->nomext);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getRefier()
  {

    return trim($this->refier);

  }
  
  public function getAfeprc()
  {

    return trim($this->afeprc);

  }
  
  public function getAfecom()
  {

    return trim($this->afecom);

  }
  
  public function getAfecau()
  {

    return trim($this->afecau);

  }
  
  public function getAfedis()
  {

    return trim($this->afedis);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = CpdoccauPeer::TIPCAU;
      }
  
	} 
	
	public function setNomext($v)
	{

    if ($this->nomext !== $v) {
        $this->nomext = $v;
        $this->modifiedColumns[] = CpdoccauPeer::NOMEXT;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = CpdoccauPeer::NOMABR;
      }
  
	} 
	
	public function setRefier($v)
	{

    if ($this->refier !== $v) {
        $this->refier = $v;
        $this->modifiedColumns[] = CpdoccauPeer::REFIER;
      }
  
	} 
	
	public function setAfeprc($v)
	{

    if ($this->afeprc !== $v) {
        $this->afeprc = $v;
        $this->modifiedColumns[] = CpdoccauPeer::AFEPRC;
      }
  
	} 
	
	public function setAfecom($v)
	{

    if ($this->afecom !== $v) {
        $this->afecom = $v;
        $this->modifiedColumns[] = CpdoccauPeer::AFECOM;
      }
  
	} 
	
	public function setAfecau($v)
	{

    if ($this->afecau !== $v) {
        $this->afecau = $v;
        $this->modifiedColumns[] = CpdoccauPeer::AFECAU;
      }
  
	} 
	
	public function setAfedis($v)
	{

    if ($this->afedis !== $v) {
        $this->afedis = $v;
        $this->modifiedColumns[] = CpdoccauPeer::AFEDIS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdoccauPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipcau = $rs->getString($startcol + 0);

      $this->nomext = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->refier = $rs->getString($startcol + 3);

      $this->afeprc = $rs->getString($startcol + 4);

      $this->afecom = $rs->getString($startcol + 5);

      $this->afecau = $rs->getString($startcol + 6);

      $this->afedis = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdoccau object", $e);
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
			$con = Propel::getConnection(CpdoccauPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdoccauPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdoccauPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpdoccauPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdoccauPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpcausads !== null) {
				foreach($this->collCpcausads as $referrerFK) {
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


			if (($retval = CpdoccauPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpcausads !== null) {
					foreach($this->collCpcausads as $referrerFK) {
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
		$pos = CpdoccauPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipcau();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getRefier();
				break;
			case 4:
				return $this->getAfeprc();
				break;
			case 5:
				return $this->getAfecom();
				break;
			case 6:
				return $this->getAfecau();
				break;
			case 7:
				return $this->getAfedis();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdoccauPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipcau(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getRefier(),
			$keys[4] => $this->getAfeprc(),
			$keys[5] => $this->getAfecom(),
			$keys[6] => $this->getAfecau(),
			$keys[7] => $this->getAfedis(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdoccauPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipcau($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setRefier($value);
				break;
			case 4:
				$this->setAfeprc($value);
				break;
			case 5:
				$this->setAfecom($value);
				break;
			case 6:
				$this->setAfecau($value);
				break;
			case 7:
				$this->setAfedis($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdoccauPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipcau($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefier($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAfeprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAfecom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAfecau($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAfedis($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdoccauPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdoccauPeer::TIPCAU)) $criteria->add(CpdoccauPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(CpdoccauPeer::NOMEXT)) $criteria->add(CpdoccauPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CpdoccauPeer::NOMABR)) $criteria->add(CpdoccauPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpdoccauPeer::REFIER)) $criteria->add(CpdoccauPeer::REFIER, $this->refier);
		if ($this->isColumnModified(CpdoccauPeer::AFEPRC)) $criteria->add(CpdoccauPeer::AFEPRC, $this->afeprc);
		if ($this->isColumnModified(CpdoccauPeer::AFECOM)) $criteria->add(CpdoccauPeer::AFECOM, $this->afecom);
		if ($this->isColumnModified(CpdoccauPeer::AFECAU)) $criteria->add(CpdoccauPeer::AFECAU, $this->afecau);
		if ($this->isColumnModified(CpdoccauPeer::AFEDIS)) $criteria->add(CpdoccauPeer::AFEDIS, $this->afedis);
		if ($this->isColumnModified(CpdoccauPeer::ID)) $criteria->add(CpdoccauPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdoccauPeer::DATABASE_NAME);

		$criteria->add(CpdoccauPeer::ID, $this->id);

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

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setRefier($this->refier);

		$copyObj->setAfeprc($this->afeprc);

		$copyObj->setAfecom($this->afecom);

		$copyObj->setAfecau($this->afecau);

		$copyObj->setAfedis($this->afedis);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpcausads() as $relObj) {
				$copyObj->addCpcausad($relObj->copy($deepCopy));
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
			self::$peer = new CpdoccauPeer();
		}
		return self::$peer;
	}

	
	public function initCpcausads()
	{
		if ($this->collCpcausads === null) {
			$this->collCpcausads = array();
		}
	}

	
	public function getCpcausads($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcausadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcausads === null) {
			if ($this->isNew()) {
			   $this->collCpcausads = array();
			} else {

				$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

				CpcausadPeer::addSelectColumns($criteria);
				$this->collCpcausads = CpcausadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

				CpcausadPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpcausadCriteria) || !$this->lastCpcausadCriteria->equals($criteria)) {
					$this->collCpcausads = CpcausadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpcausadCriteria = $criteria;
		return $this->collCpcausads;
	}

	
	public function countCpcausads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcausadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

		return CpcausadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpcausad(Cpcausad $l)
	{
		$this->collCpcausads[] = $l;
		$l->setCpdoccau($this);
	}


	
	public function getCpcausadsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcausadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcausads === null) {
			if ($this->isNew()) {
				$this->collCpcausads = array();
			} else {

				$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

				$this->collCpcausads = CpcausadPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

			if (!isset($this->lastCpcausadCriteria) || !$this->lastCpcausadCriteria->equals($criteria)) {
				$this->collCpcausads = CpcausadPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCpcausadCriteria = $criteria;

		return $this->collCpcausads;
	}


	
	public function getCpcausadsJoinOpbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcausadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcausads === null) {
			if ($this->isNew()) {
				$this->collCpcausads = array();
			} else {

				$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

				$this->collCpcausads = CpcausadPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CpcausadPeer::TIPCAU, $this->getTipcau());

			if (!isset($this->lastCpcausadCriteria) || !$this->lastCpcausadCriteria->equals($criteria)) {
				$this->collCpcausads = CpcausadPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		}
		$this->lastCpcausadCriteria = $criteria;

		return $this->collCpcausads;
	}

} 