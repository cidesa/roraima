<?php


abstract class BaseCcestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomest;


	
	protected $nomcoo;


	
	protected $telcoo;


	
	protected $codaretel;


	
	protected $dirofi;


	
	protected $cedcoo;


	
	protected $ccperpre_id;

	
	protected $aCcperpre;

	
	protected $collCcanaests;

	
	protected $lastCcanaestCriteria = null;

	
	protected $collCccircuitos;

	
	protected $lastCccircuitoCriteria = null;

	
	protected $collCcciudads;

	
	protected $lastCcciudadCriteria = null;

	
	protected $collCcestanas;

	
	protected $lastCcestanaCriteria = null;

	
	protected $collCcgescobs;

	
	protected $lastCcgescobCriteria = null;

	
	protected $collCcmunicis;

	
	protected $lastCcmuniciCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomest()
  {

    return trim($this->nomest);

  }
  
  public function getNomcoo()
  {

    return trim($this->nomcoo);

  }
  
  public function getTelcoo()
  {

    return trim($this->telcoo);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getDirofi()
  {

    return trim($this->dirofi);

  }
  
  public function getCedcoo()
  {

    return trim($this->cedcoo);

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcestadoPeer::ID;
      }
  
	} 
	
	public function setNomest($v)
	{

    if ($this->nomest !== $v) {
        $this->nomest = $v;
        $this->modifiedColumns[] = CcestadoPeer::NOMEST;
      }
  
	} 
	
	public function setNomcoo($v)
	{

    if ($this->nomcoo !== $v) {
        $this->nomcoo = $v;
        $this->modifiedColumns[] = CcestadoPeer::NOMCOO;
      }
  
	} 
	
	public function setTelcoo($v)
	{

    if ($this->telcoo !== $v) {
        $this->telcoo = $v;
        $this->modifiedColumns[] = CcestadoPeer::TELCOO;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcestadoPeer::CODARETEL;
      }
  
	} 
	
	public function setDirofi($v)
	{

    if ($this->dirofi !== $v) {
        $this->dirofi = $v;
        $this->modifiedColumns[] = CcestadoPeer::DIROFI;
      }
  
	} 
	
	public function setCedcoo($v)
	{

    if ($this->cedcoo !== $v) {
        $this->cedcoo = $v;
        $this->modifiedColumns[] = CcestadoPeer::CEDCOO;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcestadoPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomest = $rs->getString($startcol + 1);

      $this->nomcoo = $rs->getString($startcol + 2);

      $this->telcoo = $rs->getString($startcol + 3);

      $this->codaretel = $rs->getString($startcol + 4);

      $this->dirofi = $rs->getString($startcol + 5);

      $this->cedcoo = $rs->getString($startcol + 6);

      $this->ccperpre_id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccestado object", $e);
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
			$con = Propel::getConnection(CcestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcestadoPeer::DATABASE_NAME);
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


												
			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcanaests !== null) {
				foreach($this->collCcanaests as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccircuitos !== null) {
				foreach($this->collCccircuitos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcciudads !== null) {
				foreach($this->collCcciudads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestanas !== null) {
				foreach($this->collCcestanas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgescobs !== null) {
				foreach($this->collCcgescobs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcmunicis !== null) {
				foreach($this->collCcmunicis as $referrerFK) {
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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}


			if (($retval = CcestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcanaests !== null) {
					foreach($this->collCcanaests as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccircuitos !== null) {
					foreach($this->collCccircuitos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcciudads !== null) {
					foreach($this->collCcciudads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestanas !== null) {
					foreach($this->collCcestanas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgescobs !== null) {
					foreach($this->collCcgescobs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcmunicis !== null) {
					foreach($this->collCcmunicis as $referrerFK) {
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
		$pos = CcestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomest();
				break;
			case 2:
				return $this->getNomcoo();
				break;
			case 3:
				return $this->getTelcoo();
				break;
			case 4:
				return $this->getCodaretel();
				break;
			case 5:
				return $this->getDirofi();
				break;
			case 6:
				return $this->getCedcoo();
				break;
			case 7:
				return $this->getCcperpreId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomest(),
			$keys[2] => $this->getNomcoo(),
			$keys[3] => $this->getTelcoo(),
			$keys[4] => $this->getCodaretel(),
			$keys[5] => $this->getDirofi(),
			$keys[6] => $this->getCedcoo(),
			$keys[7] => $this->getCcperpreId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomest($value);
				break;
			case 2:
				$this->setNomcoo($value);
				break;
			case 3:
				$this->setTelcoo($value);
				break;
			case 4:
				$this->setCodaretel($value);
				break;
			case 5:
				$this->setDirofi($value);
				break;
			case 6:
				$this->setCedcoo($value);
				break;
			case 7:
				$this->setCcperpreId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcoo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelcoo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodaretel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirofi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCedcoo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcperpreId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcestadoPeer::ID)) $criteria->add(CcestadoPeer::ID, $this->id);
		if ($this->isColumnModified(CcestadoPeer::NOMEST)) $criteria->add(CcestadoPeer::NOMEST, $this->nomest);
		if ($this->isColumnModified(CcestadoPeer::NOMCOO)) $criteria->add(CcestadoPeer::NOMCOO, $this->nomcoo);
		if ($this->isColumnModified(CcestadoPeer::TELCOO)) $criteria->add(CcestadoPeer::TELCOO, $this->telcoo);
		if ($this->isColumnModified(CcestadoPeer::CODARETEL)) $criteria->add(CcestadoPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcestadoPeer::DIROFI)) $criteria->add(CcestadoPeer::DIROFI, $this->dirofi);
		if ($this->isColumnModified(CcestadoPeer::CEDCOO)) $criteria->add(CcestadoPeer::CEDCOO, $this->cedcoo);
		if ($this->isColumnModified(CcestadoPeer::CCPERPRE_ID)) $criteria->add(CcestadoPeer::CCPERPRE_ID, $this->ccperpre_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcestadoPeer::DATABASE_NAME);

		$criteria->add(CcestadoPeer::ID, $this->id);

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

		$copyObj->setNomest($this->nomest);

		$copyObj->setNomcoo($this->nomcoo);

		$copyObj->setTelcoo($this->telcoo);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setDirofi($this->dirofi);

		$copyObj->setCedcoo($this->cedcoo);

		$copyObj->setCcperpreId($this->ccperpre_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcanaests() as $relObj) {
				$copyObj->addCcanaest($relObj->copy($deepCopy));
			}

			foreach($this->getCccircuitos() as $relObj) {
				$copyObj->addCccircuito($relObj->copy($deepCopy));
			}

			foreach($this->getCcciudads() as $relObj) {
				$copyObj->addCcciudad($relObj->copy($deepCopy));
			}

			foreach($this->getCcestanas() as $relObj) {
				$copyObj->addCcestana($relObj->copy($deepCopy));
			}

			foreach($this->getCcgescobs() as $relObj) {
				$copyObj->addCcgescob($relObj->copy($deepCopy));
			}

			foreach($this->getCcmunicis() as $relObj) {
				$copyObj->addCcmunici($relObj->copy($deepCopy));
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
			self::$peer = new CcestadoPeer();
		}
		return self::$peer;
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

	
	public function initCcanaests()
	{
		if ($this->collCcanaests === null) {
			$this->collCcanaests = array();
		}
	}

	
	public function getCcanaests($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanaestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaests === null) {
			if ($this->isNew()) {
			   $this->collCcanaests = array();
			} else {

				$criteria->add(CcanaestPeer::CCESTADO_ID, $this->getId());

				CcanaestPeer::addSelectColumns($criteria);
				$this->collCcanaests = CcanaestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanaestPeer::CCESTADO_ID, $this->getId());

				CcanaestPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanaestCriteria) || !$this->lastCcanaestCriteria->equals($criteria)) {
					$this->collCcanaests = CcanaestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanaestCriteria = $criteria;
		return $this->collCcanaests;
	}

	
	public function countCcanaests($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanaestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanaestPeer::CCESTADO_ID, $this->getId());

		return CcanaestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanaest(Ccanaest $l)
	{
		$this->collCcanaests[] = $l;
		$l->setCcestado($this);
	}


	
	public function getCcanaestsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanaestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaests === null) {
			if ($this->isNew()) {
				$this->collCcanaests = array();
			} else {

				$criteria->add(CcanaestPeer::CCESTADO_ID, $this->getId());

				$this->collCcanaests = CcanaestPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanaestPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcanaestCriteria) || !$this->lastCcanaestCriteria->equals($criteria)) {
				$this->collCcanaests = CcanaestPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcanaestCriteria = $criteria;

		return $this->collCcanaests;
	}

	
	public function initCccircuitos()
	{
		if ($this->collCccircuitos === null) {
			$this->collCccircuitos = array();
		}
	}

	
	public function getCccircuitos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccircuitoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccircuitos === null) {
			if ($this->isNew()) {
			   $this->collCccircuitos = array();
			} else {

				$criteria->add(CccircuitoPeer::CCESTADO_ID, $this->getId());

				CccircuitoPeer::addSelectColumns($criteria);
				$this->collCccircuitos = CccircuitoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccircuitoPeer::CCESTADO_ID, $this->getId());

				CccircuitoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccircuitoCriteria) || !$this->lastCccircuitoCriteria->equals($criteria)) {
					$this->collCccircuitos = CccircuitoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccircuitoCriteria = $criteria;
		return $this->collCccircuitos;
	}

	
	public function countCccircuitos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccircuitoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccircuitoPeer::CCESTADO_ID, $this->getId());

		return CccircuitoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccircuito(Cccircuito $l)
	{
		$this->collCccircuitos[] = $l;
		$l->setCcestado($this);
	}

	
	public function initCcciudads()
	{
		if ($this->collCcciudads === null) {
			$this->collCcciudads = array();
		}
	}

	
	public function getCcciudads($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcciudads === null) {
			if ($this->isNew()) {
			   $this->collCcciudads = array();
			} else {

				$criteria->add(CcciudadPeer::CCESTADO_ID, $this->getId());

				CcciudadPeer::addSelectColumns($criteria);
				$this->collCcciudads = CcciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcciudadPeer::CCESTADO_ID, $this->getId());

				CcciudadPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcciudadCriteria) || !$this->lastCcciudadCriteria->equals($criteria)) {
					$this->collCcciudads = CcciudadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcciudadCriteria = $criteria;
		return $this->collCcciudads;
	}

	
	public function countCcciudads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcciudadPeer::CCESTADO_ID, $this->getId());

		return CcciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcciudad(Ccciudad $l)
	{
		$this->collCcciudads[] = $l;
		$l->setCcestado($this);
	}


	
	public function getCcciudadsJoinCcregion($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcciudads === null) {
			if ($this->isNew()) {
				$this->collCcciudads = array();
			} else {

				$criteria->add(CcciudadPeer::CCESTADO_ID, $this->getId());

				$this->collCcciudads = CcciudadPeer::doSelectJoinCcregion($criteria, $con);
			}
		} else {
									
			$criteria->add(CcciudadPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcciudadCriteria) || !$this->lastCcciudadCriteria->equals($criteria)) {
				$this->collCcciudads = CcciudadPeer::doSelectJoinCcregion($criteria, $con);
			}
		}
		$this->lastCcciudadCriteria = $criteria;

		return $this->collCcciudads;
	}

	
	public function initCcestanas()
	{
		if ($this->collCcestanas === null) {
			$this->collCcestanas = array();
		}
	}

	
	public function getCcestanas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestanas === null) {
			if ($this->isNew()) {
			   $this->collCcestanas = array();
			} else {

				$criteria->add(CcestanaPeer::CCESTADO_ID, $this->getId());

				CcestanaPeer::addSelectColumns($criteria);
				$this->collCcestanas = CcestanaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestanaPeer::CCESTADO_ID, $this->getId());

				CcestanaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestanaCriteria) || !$this->lastCcestanaCriteria->equals($criteria)) {
					$this->collCcestanas = CcestanaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestanaCriteria = $criteria;
		return $this->collCcestanas;
	}

	
	public function countCcestanas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestanaPeer::CCESTADO_ID, $this->getId());

		return CcestanaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestana(Ccestana $l)
	{
		$this->collCcestanas[] = $l;
		$l->setCcestado($this);
	}


	
	public function getCcestanasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestanaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestanas === null) {
			if ($this->isNew()) {
				$this->collCcestanas = array();
			} else {

				$criteria->add(CcestanaPeer::CCESTADO_ID, $this->getId());

				$this->collCcestanas = CcestanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestanaPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcestanaCriteria) || !$this->lastCcestanaCriteria->equals($criteria)) {
				$this->collCcestanas = CcestanaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcestanaCriteria = $criteria;

		return $this->collCcestanas;
	}

	
	public function initCcgescobs()
	{
		if ($this->collCcgescobs === null) {
			$this->collCcgescobs = array();
		}
	}

	
	public function getCcgescobs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
			   $this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
					$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgescobCriteria = $criteria;
		return $this->collCcgescobs;
	}

	
	public function countCcgescobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

		return CcgescobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgescob(Ccgescob $l)
	{
		$this->collCcgescobs[] = $l;
		$l->setCcestado($this);
	}


	
	public function getCcgescobsJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcactana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCESTADO_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}

	
	public function initCcmunicis()
	{
		if ($this->collCcmunicis === null) {
			$this->collCcmunicis = array();
		}
	}

	
	public function getCcmunicis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcmunicis === null) {
			if ($this->isNew()) {
			   $this->collCcmunicis = array();
			} else {

				$criteria->add(CcmuniciPeer::CCESTADO_ID, $this->getId());

				CcmuniciPeer::addSelectColumns($criteria);
				$this->collCcmunicis = CcmuniciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcmuniciPeer::CCESTADO_ID, $this->getId());

				CcmuniciPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcmuniciCriteria) || !$this->lastCcmuniciCriteria->equals($criteria)) {
					$this->collCcmunicis = CcmuniciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcmuniciCriteria = $criteria;
		return $this->collCcmunicis;
	}

	
	public function countCcmunicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcmuniciPeer::CCESTADO_ID, $this->getId());

		return CcmuniciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcmunici(Ccmunici $l)
	{
		$this->collCcmunicis[] = $l;
		$l->setCcestado($this);
	}

} 