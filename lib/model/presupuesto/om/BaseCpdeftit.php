<?php


abstract class BaseCpdeftit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $codcta;


	
	protected $stacod;


	
	protected $coduni;


	
	protected $estatus;


	
	protected $codtip;


	
	protected $id;

	
	protected $aContabb;

	
	protected $collCpasiinis;

	
	protected $lastCpasiiniCriteria = null;

	
	protected $collCpimpcoms;

	
	protected $lastCpimpcomCriteria = null;

	
	protected $collCpimpprcs;

	
	protected $lastCpimpprcCriteria = null;

	
	protected $collCpmovadis;

	
	protected $lastCpmovadiCriteria = null;

	
	protected $collCpmovajus;

	
	protected $lastCpmovajuCriteria = null;

	
	protected $collCpmovtrasRelatedByCodori;

	
	protected $lastCpmovtraRelatedByCodoriCriteria = null;

	
	protected $collCpmovtrasRelatedByCoddes;

	
	protected $lastCpmovtraRelatedByCoddesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getNompre()
  {

    return trim($this->nompre);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getStacod()
  {

    return trim($this->stacod);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getEstatus()
  {

    return trim($this->estatus);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpdeftitPeer::CODPRE;
      }
  
	} 
	
	public function setNompre($v)
	{

    if ($this->nompre !== $v) {
        $this->nompre = $v;
        $this->modifiedColumns[] = CpdeftitPeer::NOMPRE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CpdeftitPeer::CODCTA;
      }
  
		if ($this->aContabb !== null && $this->aContabb->getCodcta() !== $v) {
			$this->aContabb = null;
		}

	} 
	
	public function setStacod($v)
	{

    if ($this->stacod !== $v) {
        $this->stacod = $v;
        $this->modifiedColumns[] = CpdeftitPeer::STACOD;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = CpdeftitPeer::CODUNI;
      }
  
	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = CpdeftitPeer::ESTATUS;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = CpdeftitPeer::CODTIP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdeftitPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpre = $rs->getString($startcol + 0);

      $this->nompre = $rs->getString($startcol + 1);

      $this->codcta = $rs->getString($startcol + 2);

      $this->stacod = $rs->getString($startcol + 3);

      $this->coduni = $rs->getString($startcol + 4);

      $this->estatus = $rs->getString($startcol + 5);

      $this->codtip = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdeftit object", $e);
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
			$con = Propel::getConnection(CpdeftitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdeftitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdeftitPeer::DATABASE_NAME);
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
					$pk = CpdeftitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdeftitPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpasiinis !== null) {
				foreach($this->collCpasiinis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpimpcoms !== null) {
				foreach($this->collCpimpcoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpimpprcs !== null) {
				foreach($this->collCpimpprcs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpmovadis !== null) {
				foreach($this->collCpmovadis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpmovajus !== null) {
				foreach($this->collCpmovajus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpmovtrasRelatedByCodori !== null) {
				foreach($this->collCpmovtrasRelatedByCodori as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpmovtrasRelatedByCoddes !== null) {
				foreach($this->collCpmovtrasRelatedByCoddes as $referrerFK) {
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


			if (($retval = CpdeftitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpasiinis !== null) {
					foreach($this->collCpasiinis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpimpcoms !== null) {
					foreach($this->collCpimpcoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpimpprcs !== null) {
					foreach($this->collCpimpprcs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpmovadis !== null) {
					foreach($this->collCpmovadis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpmovajus !== null) {
					foreach($this->collCpmovajus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpmovtrasRelatedByCodori !== null) {
					foreach($this->collCpmovtrasRelatedByCodori as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpmovtrasRelatedByCoddes !== null) {
					foreach($this->collCpmovtrasRelatedByCoddes as $referrerFK) {
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
		$pos = CpdeftitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getNompre();
				break;
			case 2:
				return $this->getCodcta();
				break;
			case 3:
				return $this->getStacod();
				break;
			case 4:
				return $this->getCoduni();
				break;
			case 5:
				return $this->getEstatus();
				break;
			case 6:
				return $this->getCodtip();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdeftitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getNompre(),
			$keys[2] => $this->getCodcta(),
			$keys[3] => $this->getStacod(),
			$keys[4] => $this->getCoduni(),
			$keys[5] => $this->getEstatus(),
			$keys[6] => $this->getCodtip(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdeftitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setNompre($value);
				break;
			case 2:
				$this->setCodcta($value);
				break;
			case 3:
				$this->setStacod($value);
				break;
			case 4:
				$this->setCoduni($value);
				break;
			case 5:
				$this->setEstatus($value);
				break;
			case 6:
				$this->setCodtip($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdeftitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStacod($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodtip($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdeftitPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdeftitPeer::CODPRE)) $criteria->add(CpdeftitPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpdeftitPeer::NOMPRE)) $criteria->add(CpdeftitPeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(CpdeftitPeer::CODCTA)) $criteria->add(CpdeftitPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CpdeftitPeer::STACOD)) $criteria->add(CpdeftitPeer::STACOD, $this->stacod);
		if ($this->isColumnModified(CpdeftitPeer::CODUNI)) $criteria->add(CpdeftitPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(CpdeftitPeer::ESTATUS)) $criteria->add(CpdeftitPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(CpdeftitPeer::CODTIP)) $criteria->add(CpdeftitPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(CpdeftitPeer::ID)) $criteria->add(CpdeftitPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdeftitPeer::DATABASE_NAME);

		$criteria->add(CpdeftitPeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNompre($this->nompre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setStacod($this->stacod);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setEstatus($this->estatus);

		$copyObj->setCodtip($this->codtip);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpasiinis() as $relObj) {
				$copyObj->addCpasiini($relObj->copy($deepCopy));
			}

			foreach($this->getCpimpcoms() as $relObj) {
				$copyObj->addCpimpcom($relObj->copy($deepCopy));
			}

			foreach($this->getCpimpprcs() as $relObj) {
				$copyObj->addCpimpprc($relObj->copy($deepCopy));
			}

			foreach($this->getCpmovadis() as $relObj) {
				$copyObj->addCpmovadi($relObj->copy($deepCopy));
			}

			foreach($this->getCpmovajus() as $relObj) {
				$copyObj->addCpmovaju($relObj->copy($deepCopy));
			}

			foreach($this->getCpmovtrasRelatedByCodori() as $relObj) {
				$copyObj->addCpmovtraRelatedByCodori($relObj->copy($deepCopy));
			}

			foreach($this->getCpmovtrasRelatedByCoddes() as $relObj) {
				$copyObj->addCpmovtraRelatedByCoddes($relObj->copy($deepCopy));
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
			self::$peer = new CpdeftitPeer();
		}
		return self::$peer;
	}

	
	public function setContabb($v)
	{


		if ($v === null) {
			$this->setCodcta(NULL);
		} else {
			$this->setCodcta($v->getCodcta());
		}


		$this->aContabb = $v;
	}


	
	public function getContabb($con = null)
	{
		if ($this->aContabb === null && (($this->codcta !== "" && $this->codcta !== null))) {
						include_once 'lib/model/contabilidad/om/BaseContabbPeer.php';

      $c = new Criteria();
      $c->add(ContabbPeer::CODCTA,$this->codcta);
      
			$this->aContabb = ContabbPeer::doSelectOne($c, $con);

			
		}
		return $this->aContabb;
	}

	
	public function initCpasiinis()
	{
		if ($this->collCpasiinis === null) {
			$this->collCpasiinis = array();
		}
	}

	
	public function getCpasiinis($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpasiiniPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpasiinis === null) {
			if ($this->isNew()) {
			   $this->collCpasiinis = array();
			} else {

				$criteria->add(CpasiiniPeer::CODPRE, $this->getCodpre());

				CpasiiniPeer::addSelectColumns($criteria);
				$this->collCpasiinis = CpasiiniPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpasiiniPeer::CODPRE, $this->getCodpre());

				CpasiiniPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpasiiniCriteria) || !$this->lastCpasiiniCriteria->equals($criteria)) {
					$this->collCpasiinis = CpasiiniPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpasiiniCriteria = $criteria;
		return $this->collCpasiinis;
	}

	
	public function countCpasiinis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpasiiniPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpasiiniPeer::CODPRE, $this->getCodpre());

		return CpasiiniPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpasiini(Cpasiini $l)
	{
		$this->collCpasiinis[] = $l;
		$l->setCpdeftit($this);
	}

	
	public function initCpimpcoms()
	{
		if ($this->collCpimpcoms === null) {
			$this->collCpimpcoms = array();
		}
	}

	
	public function getCpimpcoms($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpcoms === null) {
			if ($this->isNew()) {
			   $this->collCpimpcoms = array();
			} else {

				$criteria->add(CpimpcomPeer::CODPRE, $this->getCodpre());

				CpimpcomPeer::addSelectColumns($criteria);
				$this->collCpimpcoms = CpimpcomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpimpcomPeer::CODPRE, $this->getCodpre());

				CpimpcomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpimpcomCriteria) || !$this->lastCpimpcomCriteria->equals($criteria)) {
					$this->collCpimpcoms = CpimpcomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpimpcomCriteria = $criteria;
		return $this->collCpimpcoms;
	}

	
	public function countCpimpcoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpimpcomPeer::CODPRE, $this->getCodpre());

		return CpimpcomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpimpcom(Cpimpcom $l)
	{
		$this->collCpimpcoms[] = $l;
		$l->setCpdeftit($this);
	}


	
	public function getCpimpcomsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpcoms === null) {
			if ($this->isNew()) {
				$this->collCpimpcoms = array();
			} else {

				$criteria->add(CpimpcomPeer::CODPRE, $this->getCodpre());

				$this->collCpimpcoms = CpimpcomPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CpimpcomPeer::CODPRE, $this->getCodpre());

			if (!isset($this->lastCpimpcomCriteria) || !$this->lastCpimpcomCriteria->equals($criteria)) {
				$this->collCpimpcoms = CpimpcomPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCpimpcomCriteria = $criteria;

		return $this->collCpimpcoms;
	}

	
	public function initCpimpprcs()
	{
		if ($this->collCpimpprcs === null) {
			$this->collCpimpprcs = array();
		}
	}

	
	public function getCpimpprcs($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpprcs === null) {
			if ($this->isNew()) {
			   $this->collCpimpprcs = array();
			} else {

				$criteria->add(CpimpprcPeer::CODPRE, $this->getCodpre());

				CpimpprcPeer::addSelectColumns($criteria);
				$this->collCpimpprcs = CpimpprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpimpprcPeer::CODPRE, $this->getCodpre());

				CpimpprcPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpimpprcCriteria) || !$this->lastCpimpprcCriteria->equals($criteria)) {
					$this->collCpimpprcs = CpimpprcPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpimpprcCriteria = $criteria;
		return $this->collCpimpprcs;
	}

	
	public function countCpimpprcs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpimpprcPeer::CODPRE, $this->getCodpre());

		return CpimpprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpimpprc(Cpimpprc $l)
	{
		$this->collCpimpprcs[] = $l;
		$l->setCpdeftit($this);
	}


	
	public function getCpimpprcsJoinCpprecom($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpprcs === null) {
			if ($this->isNew()) {
				$this->collCpimpprcs = array();
			} else {

				$criteria->add(CpimpprcPeer::CODPRE, $this->getCodpre());

				$this->collCpimpprcs = CpimpprcPeer::doSelectJoinCpprecom($criteria, $con);
			}
		} else {
									
			$criteria->add(CpimpprcPeer::CODPRE, $this->getCodpre());

			if (!isset($this->lastCpimpprcCriteria) || !$this->lastCpimpprcCriteria->equals($criteria)) {
				$this->collCpimpprcs = CpimpprcPeer::doSelectJoinCpprecom($criteria, $con);
			}
		}
		$this->lastCpimpprcCriteria = $criteria;

		return $this->collCpimpprcs;
	}

	
	public function initCpmovadis()
	{
		if ($this->collCpmovadis === null) {
			$this->collCpmovadis = array();
		}
	}

	
	public function getCpmovadis($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadis === null) {
			if ($this->isNew()) {
			   $this->collCpmovadis = array();
			} else {

				$criteria->add(CpmovadiPeer::CODPRE, $this->getCodpre());

				CpmovadiPeer::addSelectColumns($criteria);
				$this->collCpmovadis = CpmovadiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovadiPeer::CODPRE, $this->getCodpre());

				CpmovadiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovadiCriteria) || !$this->lastCpmovadiCriteria->equals($criteria)) {
					$this->collCpmovadis = CpmovadiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovadiCriteria = $criteria;
		return $this->collCpmovadis;
	}

	
	public function countCpmovadis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovadiPeer::CODPRE, $this->getCodpre());

		return CpmovadiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovadi(Cpmovadi $l)
	{
		$this->collCpmovadis[] = $l;
		$l->setCpdeftit($this);
	}


	
	public function getCpmovadisJoinCpadidis($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadis === null) {
			if ($this->isNew()) {
				$this->collCpmovadis = array();
			} else {

				$criteria->add(CpmovadiPeer::CODPRE, $this->getCodpre());

				$this->collCpmovadis = CpmovadiPeer::doSelectJoinCpadidis($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovadiPeer::CODPRE, $this->getCodpre());

			if (!isset($this->lastCpmovadiCriteria) || !$this->lastCpmovadiCriteria->equals($criteria)) {
				$this->collCpmovadis = CpmovadiPeer::doSelectJoinCpadidis($criteria, $con);
			}
		}
		$this->lastCpmovadiCriteria = $criteria;

		return $this->collCpmovadis;
	}

	
	public function initCpmovajus()
	{
		if ($this->collCpmovajus === null) {
			$this->collCpmovajus = array();
		}
	}

	
	public function getCpmovajus($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovajuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovajus === null) {
			if ($this->isNew()) {
			   $this->collCpmovajus = array();
			} else {

				$criteria->add(CpmovajuPeer::CODPRE, $this->getCodpre());

				CpmovajuPeer::addSelectColumns($criteria);
				$this->collCpmovajus = CpmovajuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovajuPeer::CODPRE, $this->getCodpre());

				CpmovajuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovajuCriteria) || !$this->lastCpmovajuCriteria->equals($criteria)) {
					$this->collCpmovajus = CpmovajuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovajuCriteria = $criteria;
		return $this->collCpmovajus;
	}

	
	public function countCpmovajus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovajuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovajuPeer::CODPRE, $this->getCodpre());

		return CpmovajuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovaju(Cpmovaju $l)
	{
		$this->collCpmovajus[] = $l;
		$l->setCpdeftit($this);
	}


	
	public function getCpmovajusJoinCpajuste($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovajuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovajus === null) {
			if ($this->isNew()) {
				$this->collCpmovajus = array();
			} else {

				$criteria->add(CpmovajuPeer::CODPRE, $this->getCodpre());

				$this->collCpmovajus = CpmovajuPeer::doSelectJoinCpajuste($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovajuPeer::CODPRE, $this->getCodpre());

			if (!isset($this->lastCpmovajuCriteria) || !$this->lastCpmovajuCriteria->equals($criteria)) {
				$this->collCpmovajus = CpmovajuPeer::doSelectJoinCpajuste($criteria, $con);
			}
		}
		$this->lastCpmovajuCriteria = $criteria;

		return $this->collCpmovajus;
	}

	
	public function initCpmovtrasRelatedByCodori()
	{
		if ($this->collCpmovtrasRelatedByCodori === null) {
			$this->collCpmovtrasRelatedByCodori = array();
		}
	}

	
	public function getCpmovtrasRelatedByCodori($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtrasRelatedByCodori === null) {
			if ($this->isNew()) {
			   $this->collCpmovtrasRelatedByCodori = array();
			} else {

				$criteria->add(CpmovtraPeer::CODORI, $this->getCodpre());

				CpmovtraPeer::addSelectColumns($criteria);
				$this->collCpmovtrasRelatedByCodori = CpmovtraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovtraPeer::CODORI, $this->getCodpre());

				CpmovtraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovtraRelatedByCodoriCriteria) || !$this->lastCpmovtraRelatedByCodoriCriteria->equals($criteria)) {
					$this->collCpmovtrasRelatedByCodori = CpmovtraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovtraRelatedByCodoriCriteria = $criteria;
		return $this->collCpmovtrasRelatedByCodori;
	}

	
	public function countCpmovtrasRelatedByCodori($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovtraPeer::CODORI, $this->getCodpre());

		return CpmovtraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovtraRelatedByCodori(Cpmovtra $l)
	{
		$this->collCpmovtrasRelatedByCodori[] = $l;
		$l->setCpdeftitRelatedByCodori($this);
	}


	
	public function getCpmovtrasRelatedByCodoriJoinCptrasla($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtrasRelatedByCodori === null) {
			if ($this->isNew()) {
				$this->collCpmovtrasRelatedByCodori = array();
			} else {

				$criteria->add(CpmovtraPeer::CODORI, $this->getCodpre());

				$this->collCpmovtrasRelatedByCodori = CpmovtraPeer::doSelectJoinCptrasla($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovtraPeer::CODORI, $this->getCodpre());

			if (!isset($this->lastCpmovtraRelatedByCodoriCriteria) || !$this->lastCpmovtraRelatedByCodoriCriteria->equals($criteria)) {
				$this->collCpmovtrasRelatedByCodori = CpmovtraPeer::doSelectJoinCptrasla($criteria, $con);
			}
		}
		$this->lastCpmovtraRelatedByCodoriCriteria = $criteria;

		return $this->collCpmovtrasRelatedByCodori;
	}

	
	public function initCpmovtrasRelatedByCoddes()
	{
		if ($this->collCpmovtrasRelatedByCoddes === null) {
			$this->collCpmovtrasRelatedByCoddes = array();
		}
	}

	
	public function getCpmovtrasRelatedByCoddes($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtrasRelatedByCoddes === null) {
			if ($this->isNew()) {
			   $this->collCpmovtrasRelatedByCoddes = array();
			} else {

				$criteria->add(CpmovtraPeer::CODDES, $this->getCodpre());

				CpmovtraPeer::addSelectColumns($criteria);
				$this->collCpmovtrasRelatedByCoddes = CpmovtraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovtraPeer::CODDES, $this->getCodpre());

				CpmovtraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovtraRelatedByCoddesCriteria) || !$this->lastCpmovtraRelatedByCoddesCriteria->equals($criteria)) {
					$this->collCpmovtrasRelatedByCoddes = CpmovtraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovtraRelatedByCoddesCriteria = $criteria;
		return $this->collCpmovtrasRelatedByCoddes;
	}

	
	public function countCpmovtrasRelatedByCoddes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovtraPeer::CODDES, $this->getCodpre());

		return CpmovtraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovtraRelatedByCoddes(Cpmovtra $l)
	{
		$this->collCpmovtrasRelatedByCoddes[] = $l;
		$l->setCpdeftitRelatedByCoddes($this);
	}


	
	public function getCpmovtrasRelatedByCoddesJoinCptrasla($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovtrasRelatedByCoddes === null) {
			if ($this->isNew()) {
				$this->collCpmovtrasRelatedByCoddes = array();
			} else {

				$criteria->add(CpmovtraPeer::CODDES, $this->getCodpre());

				$this->collCpmovtrasRelatedByCoddes = CpmovtraPeer::doSelectJoinCptrasla($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovtraPeer::CODDES, $this->getCodpre());

			if (!isset($this->lastCpmovtraRelatedByCoddesCriteria) || !$this->lastCpmovtraRelatedByCoddesCriteria->equals($criteria)) {
				$this->collCpmovtrasRelatedByCoddes = CpmovtraPeer::doSelectJoinCptrasla($criteria, $con);
			}
		}
		$this->lastCpmovtraRelatedByCoddesCriteria = $criteria;

		return $this->collCpmovtrasRelatedByCoddes;
	}

} 