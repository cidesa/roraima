<?php


abstract class BaseCcrespue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $estatu;


	
	protected $nomfis;


	
	protected $monsol;


	
	protected $moncob;


	
	protected $observ;


	
	protected $cedrif;


	
	protected $numcue;


	
	protected $ccresban_id;

	
	protected $aCcresban;

	
	protected $collCcdebcueress;

	
	protected $lastCcdebcueresCriteria = null;

	
	protected $collCcpagress;

	
	protected $lastCcpagresCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getNomfis()
  {

    return trim($this->nomfis);

  }
  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

  }
  
  public function getMoncob($val=false)
  {

    if($val) return number_format($this->moncob,2,',','.');
    else return $this->moncob;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCcresbanId()
  {

    return $this->ccresban_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrespuePeer::ID;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcrespuePeer::ESTATU;
      }
  
	} 
	
	public function setNomfis($v)
	{

    if ($this->nomfis !== $v) {
        $this->nomfis = $v;
        $this->modifiedColumns[] = CcrespuePeer::NOMFIS;
      }
  
	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcrespuePeer::MONSOL;
      }
  
	} 
	
	public function setMoncob($v)
	{

    if ($this->moncob !== $v) {
        $this->moncob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcrespuePeer::MONCOB;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcrespuePeer::OBSERV;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CcrespuePeer::CEDRIF;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CcrespuePeer::NUMCUE;
      }
  
	} 
	
	public function setCcresbanId($v)
	{

    if ($this->ccresban_id !== $v) {
        $this->ccresban_id = $v;
        $this->modifiedColumns[] = CcrespuePeer::CCRESBAN_ID;
      }
  
		if ($this->aCcresban !== null && $this->aCcresban->getId() !== $v) {
			$this->aCcresban = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->estatu = $rs->getString($startcol + 1);

      $this->nomfis = $rs->getString($startcol + 2);

      $this->monsol = $rs->getFloat($startcol + 3);

      $this->moncob = $rs->getFloat($startcol + 4);

      $this->observ = $rs->getString($startcol + 5);

      $this->cedrif = $rs->getString($startcol + 6);

      $this->numcue = $rs->getString($startcol + 7);

      $this->ccresban_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrespue object", $e);
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
			$con = Propel::getConnection(CcrespuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrespuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrespuePeer::DATABASE_NAME);
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


												
			if ($this->aCcresban !== null) {
				if ($this->aCcresban->isModified()) {
					$affectedRows += $this->aCcresban->save($con);
				}
				$this->setCcresban($this->aCcresban);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrespuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrespuePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdebcueress !== null) {
				foreach($this->collCcdebcueress as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagress !== null) {
				foreach($this->collCcpagress as $referrerFK) {
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


												
			if ($this->aCcresban !== null) {
				if (!$this->aCcresban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcresban->getValidationFailures());
				}
			}


			if (($retval = CcrespuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdebcueress !== null) {
					foreach($this->collCcdebcueress as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagress !== null) {
					foreach($this->collCcpagress as $referrerFK) {
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
		$pos = CcrespuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEstatu();
				break;
			case 2:
				return $this->getNomfis();
				break;
			case 3:
				return $this->getMonsol();
				break;
			case 4:
				return $this->getMoncob();
				break;
			case 5:
				return $this->getObserv();
				break;
			case 6:
				return $this->getCedrif();
				break;
			case 7:
				return $this->getNumcue();
				break;
			case 8:
				return $this->getCcresbanId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrespuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEstatu(),
			$keys[2] => $this->getNomfis(),
			$keys[3] => $this->getMonsol(),
			$keys[4] => $this->getMoncob(),
			$keys[5] => $this->getObserv(),
			$keys[6] => $this->getCedrif(),
			$keys[7] => $this->getNumcue(),
			$keys[8] => $this->getCcresbanId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrespuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEstatu($value);
				break;
			case 2:
				$this->setNomfis($value);
				break;
			case 3:
				$this->setMonsol($value);
				break;
			case 4:
				$this->setMoncob($value);
				break;
			case 5:
				$this->setObserv($value);
				break;
			case 6:
				$this->setCedrif($value);
				break;
			case 7:
				$this->setNumcue($value);
				break;
			case 8:
				$this->setCcresbanId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrespuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEstatu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfis($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoncob($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObserv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCedrif($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcue($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcresbanId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrespuePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrespuePeer::ID)) $criteria->add(CcrespuePeer::ID, $this->id);
		if ($this->isColumnModified(CcrespuePeer::ESTATU)) $criteria->add(CcrespuePeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcrespuePeer::NOMFIS)) $criteria->add(CcrespuePeer::NOMFIS, $this->nomfis);
		if ($this->isColumnModified(CcrespuePeer::MONSOL)) $criteria->add(CcrespuePeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(CcrespuePeer::MONCOB)) $criteria->add(CcrespuePeer::MONCOB, $this->moncob);
		if ($this->isColumnModified(CcrespuePeer::OBSERV)) $criteria->add(CcrespuePeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcrespuePeer::CEDRIF)) $criteria->add(CcrespuePeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CcrespuePeer::NUMCUE)) $criteria->add(CcrespuePeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CcrespuePeer::CCRESBAN_ID)) $criteria->add(CcrespuePeer::CCRESBAN_ID, $this->ccresban_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrespuePeer::DATABASE_NAME);

		$criteria->add(CcrespuePeer::ID, $this->id);

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

		$copyObj->setEstatu($this->estatu);

		$copyObj->setNomfis($this->nomfis);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setMoncob($this->moncob);

		$copyObj->setObserv($this->observ);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCcresbanId($this->ccresban_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdebcueress() as $relObj) {
				$copyObj->addCcdebcueres($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagress() as $relObj) {
				$copyObj->addCcpagres($relObj->copy($deepCopy));
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
			self::$peer = new CcrespuePeer();
		}
		return self::$peer;
	}

	
	public function setCcresban($v)
	{


		if ($v === null) {
			$this->setCcresbanId(NULL);
		} else {
			$this->setCcresbanId($v->getId());
		}


		$this->aCcresban = $v;
	}


	
	public function getCcresban($con = null)
	{
		if ($this->aCcresban === null && ($this->ccresban_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcresbanPeer.php';

      $c = new Criteria();
      $c->add(CcresbanPeer::ID,$this->ccresban_id);
      
			$this->aCcresban = CcresbanPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcresban;
	}

	
	public function initCcdebcueress()
	{
		if ($this->collCcdebcueress === null) {
			$this->collCcdebcueress = array();
		}
	}

	
	public function getCcdebcueress($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdebcueresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdebcueress === null) {
			if ($this->isNew()) {
			   $this->collCcdebcueress = array();
			} else {

				$criteria->add(CcdebcueresPeer::CCRESPUE_ID, $this->getId());

				CcdebcueresPeer::addSelectColumns($criteria);
				$this->collCcdebcueress = CcdebcueresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdebcueresPeer::CCRESPUE_ID, $this->getId());

				CcdebcueresPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdebcueresCriteria) || !$this->lastCcdebcueresCriteria->equals($criteria)) {
					$this->collCcdebcueress = CcdebcueresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdebcueresCriteria = $criteria;
		return $this->collCcdebcueress;
	}

	
	public function countCcdebcueress($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdebcueresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdebcueresPeer::CCRESPUE_ID, $this->getId());

		return CcdebcueresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdebcueres(Ccdebcueres $l)
	{
		$this->collCcdebcueress[] = $l;
		$l->setCcrespue($this);
	}


	
	public function getCcdebcueressJoinCcdebcue($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdebcueresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdebcueress === null) {
			if ($this->isNew()) {
				$this->collCcdebcueress = array();
			} else {

				$criteria->add(CcdebcueresPeer::CCRESPUE_ID, $this->getId());

				$this->collCcdebcueress = CcdebcueresPeer::doSelectJoinCcdebcue($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdebcueresPeer::CCRESPUE_ID, $this->getId());

			if (!isset($this->lastCcdebcueresCriteria) || !$this->lastCcdebcueresCriteria->equals($criteria)) {
				$this->collCcdebcueress = CcdebcueresPeer::doSelectJoinCcdebcue($criteria, $con);
			}
		}
		$this->lastCcdebcueresCriteria = $criteria;

		return $this->collCcdebcueress;
	}

	
	public function initCcpagress()
	{
		if ($this->collCcpagress === null) {
			$this->collCcpagress = array();
		}
	}

	
	public function getCcpagress($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagress === null) {
			if ($this->isNew()) {
			   $this->collCcpagress = array();
			} else {

				$criteria->add(CcpagresPeer::CCRESPUE_ID, $this->getId());

				CcpagresPeer::addSelectColumns($criteria);
				$this->collCcpagress = CcpagresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagresPeer::CCRESPUE_ID, $this->getId());

				CcpagresPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagresCriteria) || !$this->lastCcpagresCriteria->equals($criteria)) {
					$this->collCcpagress = CcpagresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagresCriteria = $criteria;
		return $this->collCcpagress;
	}

	
	public function countCcpagress($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagresPeer::CCRESPUE_ID, $this->getId());

		return CcpagresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpagres(Ccpagres $l)
	{
		$this->collCcpagress[] = $l;
		$l->setCcrespue($this);
	}


	
	public function getCcpagressJoinCcpago($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagress === null) {
			if ($this->isNew()) {
				$this->collCcpagress = array();
			} else {

				$criteria->add(CcpagresPeer::CCRESPUE_ID, $this->getId());

				$this->collCcpagress = CcpagresPeer::doSelectJoinCcpago($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagresPeer::CCRESPUE_ID, $this->getId());

			if (!isset($this->lastCcpagresCriteria) || !$this->lastCcpagresCriteria->equals($criteria)) {
				$this->collCcpagress = CcpagresPeer::doSelectJoinCcpago($criteria, $con);
			}
		}
		$this->lastCcpagresCriteria = $criteria;

		return $this->collCcpagress;
	}

} 