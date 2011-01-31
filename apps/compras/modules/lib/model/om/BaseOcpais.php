<?php


abstract class BaseOcpais extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpai;


	
	protected $nompai;


	
	protected $id;

	
	protected $collOcestados;

	
	protected $lastOcestadoCriteria = null;

	
	protected $collOcmunicis;

	
	protected $lastOcmuniciCriteria = null;

	
	protected $collOcciudads;

	
	protected $lastOcciudadCriteria = null;

	
	protected $collCadefcenacos;

	
	protected $lastCadefcenacoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getNompai()
  {

    return trim($this->nompai);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = OcpaisPeer::CODPAI;
      }
  
	} 
	
	public function setNompai($v)
	{

    if ($this->nompai !== $v) {
        $this->nompai = $v;
        $this->modifiedColumns[] = OcpaisPeer::NOMPAI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcpaisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpai = $rs->getString($startcol + 0);

      $this->nompai = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocpais object", $e);
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
			$con = Propel::getConnection(OcpaisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcpaisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcpaisPeer::DATABASE_NAME);
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
					$pk = OcpaisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcpaisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOcestados !== null) {
				foreach($this->collOcestados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOcmunicis !== null) {
				foreach($this->collOcmunicis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collOcciudads !== null) {
				foreach($this->collOcciudads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCadefcenacos !== null) {
				foreach($this->collCadefcenacos as $referrerFK) {
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


			if (($retval = OcpaisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOcestados !== null) {
					foreach($this->collOcestados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOcmunicis !== null) {
					foreach($this->collOcmunicis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collOcciudads !== null) {
					foreach($this->collOcciudads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCadefcenacos !== null) {
					foreach($this->collCadefcenacos as $referrerFK) {
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
		$pos = OcpaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpai();
				break;
			case 1:
				return $this->getNompai();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcpaisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpai(),
			$keys[1] => $this->getNompai(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcpaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpai($value);
				break;
			case 1:
				$this->setNompai($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcpaisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompai($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcpaisPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcpaisPeer::CODPAI)) $criteria->add(OcpaisPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcpaisPeer::NOMPAI)) $criteria->add(OcpaisPeer::NOMPAI, $this->nompai);
		if ($this->isColumnModified(OcpaisPeer::ID)) $criteria->add(OcpaisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcpaisPeer::DATABASE_NAME);

		$criteria->add(OcpaisPeer::ID, $this->id);

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

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNompai($this->nompai);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOcestados() as $relObj) {
				$copyObj->addOcestado($relObj->copy($deepCopy));
			}

			foreach($this->getOcmunicis() as $relObj) {
				$copyObj->addOcmunici($relObj->copy($deepCopy));
			}

			foreach($this->getOcciudads() as $relObj) {
				$copyObj->addOcciudad($relObj->copy($deepCopy));
			}

			foreach($this->getCadefcenacos() as $relObj) {
				$copyObj->addCadefcenaco($relObj->copy($deepCopy));
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
			self::$peer = new OcpaisPeer();
		}
		return self::$peer;
	}

	
	public function initOcestados()
	{
		if ($this->collOcestados === null) {
			$this->collOcestados = array();
		}
	}

	
	public function getOcestados($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOcestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOcestados === null) {
			if ($this->isNew()) {
			   $this->collOcestados = array();
			} else {

				$criteria->add(OcestadoPeer::CODPAI, $this->getCodpai());

				OcestadoPeer::addSelectColumns($criteria);
				$this->collOcestados = OcestadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OcestadoPeer::CODPAI, $this->getCodpai());

				OcestadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastOcestadoCriteria) || !$this->lastOcestadoCriteria->equals($criteria)) {
					$this->collOcestados = OcestadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOcestadoCriteria = $criteria;
		return $this->collOcestados;
	}

	
	public function countOcestados($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOcestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OcestadoPeer::CODPAI, $this->getCodpai());

		return OcestadoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOcestado(Ocestado $l)
	{
		$this->collOcestados[] = $l;
		$l->setOcpais($this);
	}

	
	public function initOcmunicis()
	{
		if ($this->collOcmunicis === null) {
			$this->collOcmunicis = array();
		}
	}

	
	public function getOcmunicis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOcmunicis === null) {
			if ($this->isNew()) {
			   $this->collOcmunicis = array();
			} else {

				$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

				OcmuniciPeer::addSelectColumns($criteria);
				$this->collOcmunicis = OcmuniciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

				OcmuniciPeer::addSelectColumns($criteria);
				if (!isset($this->lastOcmuniciCriteria) || !$this->lastOcmuniciCriteria->equals($criteria)) {
					$this->collOcmunicis = OcmuniciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOcmuniciCriteria = $criteria;
		return $this->collOcmunicis;
	}

	
	public function countOcmunicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

		return OcmuniciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOcmunici(Ocmunici $l)
	{
		$this->collOcmunicis[] = $l;
		$l->setOcpais($this);
	}


	
	public function getOcmunicisJoinOcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOcmunicis === null) {
			if ($this->isNew()) {
				$this->collOcmunicis = array();
			} else {

				$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

			if (!isset($this->lastOcmuniciCriteria) || !$this->lastOcmuniciCriteria->equals($criteria)) {
				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcestado($criteria, $con);
			}
		}
		$this->lastOcmuniciCriteria = $criteria;

		return $this->collOcmunicis;
	}


	
	public function getOcmunicisJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOcmuniciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOcmunicis === null) {
			if ($this->isNew()) {
				$this->collOcmunicis = array();
			} else {

				$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(OcmuniciPeer::CODPAI, $this->getCodpai());

			if (!isset($this->lastOcmuniciCriteria) || !$this->lastOcmuniciCriteria->equals($criteria)) {
				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastOcmuniciCriteria = $criteria;

		return $this->collOcmunicis;
	}

	
	public function initOcciudads()
	{
		if ($this->collOcciudads === null) {
			$this->collOcciudads = array();
		}
	}

	
	public function getOcciudads($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOcciudads === null) {
			if ($this->isNew()) {
			   $this->collOcciudads = array();
			} else {

				$criteria->add(OcciudadPeer::CODPAI, $this->getCodpai());

				OcciudadPeer::addSelectColumns($criteria);
				$this->collOcciudads = OcciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OcciudadPeer::CODPAI, $this->getCodpai());

				OcciudadPeer::addSelectColumns($criteria);
				if (!isset($this->lastOcciudadCriteria) || !$this->lastOcciudadCriteria->equals($criteria)) {
					$this->collOcciudads = OcciudadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOcciudadCriteria = $criteria;
		return $this->collOcciudads;
	}

	
	public function countOcciudads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OcciudadPeer::CODPAI, $this->getCodpai());

		return OcciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOcciudad(Occiudad $l)
	{
		$this->collOcciudads[] = $l;
		$l->setOcpais($this);
	}


	
	public function getOcciudadsJoinOcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOcciudads === null) {
			if ($this->isNew()) {
				$this->collOcciudads = array();
			} else {

				$criteria->add(OcciudadPeer::CODPAI, $this->getCodpai());

				$this->collOcciudads = OcciudadPeer::doSelectJoinOcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(OcciudadPeer::CODPAI, $this->getCodpai());

			if (!isset($this->lastOcciudadCriteria) || !$this->lastOcciudadCriteria->equals($criteria)) {
				$this->collOcciudads = OcciudadPeer::doSelectJoinOcestado($criteria, $con);
			}
		}
		$this->lastOcciudadCriteria = $criteria;

		return $this->collOcciudads;
	}

	
	public function initCadefcenacos()
	{
		if ($this->collCadefcenacos === null) {
			$this->collCadefcenacos = array();
		}
	}

	
	public function getCadefcenacos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
			   $this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

				CadefcenacoPeer::addSelectColumns($criteria);
				$this->collCadefcenacos = CadefcenacoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

				CadefcenacoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
					$this->collCadefcenacos = CadefcenacoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;
		return $this->collCadefcenacos;
	}

	
	public function countCadefcenacos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

		return CadefcenacoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCadefcenaco(Cadefcenaco $l)
	{
		$this->collCadefcenacos[] = $l;
		$l->setOcpais($this);
	}


	
	public function getCadefcenacosJoinOcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
				$this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcestado($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}


	
	public function getCadefcenacosJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
				$this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}


	
	public function getCadefcenacosJoinOcmunici($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
				$this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODPAI, $this->getCodpai());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcmunici($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}

} 