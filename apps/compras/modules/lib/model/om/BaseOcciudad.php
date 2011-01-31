<?php


abstract class BaseOcciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codciu;


	
	protected $nomciu;


	
	protected $id;

	
	protected $aOcpais;

	
	protected $aOcestado;

	
	protected $collOcmunicis;

	
	protected $lastOcmuniciCriteria = null;

	
	protected $collCadefcenacos;

	
	protected $lastCadefcenacoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = OcciudadPeer::CODPAI;
      }
  
		if ($this->aOcpais !== null && $this->aOcpais->getCodpai() !== $v) {
			$this->aOcpais = null;
		}

	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = OcciudadPeer::CODEDO;
      }
  
		if ($this->aOcestado !== null && $this->aOcestado->getCodedo() !== $v) {
			$this->aOcestado = null;
		}

	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = OcciudadPeer::CODCIU;
      }
  
	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = $v;
        $this->modifiedColumns[] = OcciudadPeer::NOMCIU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcciudadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpai = $rs->getString($startcol + 0);

      $this->codedo = $rs->getString($startcol + 1);

      $this->codciu = $rs->getString($startcol + 2);

      $this->nomciu = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Occiudad object", $e);
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
			$con = Propel::getConnection(OcciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcciudadPeer::DATABASE_NAME);
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


												
			if ($this->aOcpais !== null) {
				if ($this->aOcpais->isModified()) {
					$affectedRows += $this->aOcpais->save($con);
				}
				$this->setOcpais($this->aOcpais);
			}

			if ($this->aOcestado !== null) {
				if ($this->aOcestado->isModified()) {
					$affectedRows += $this->aOcestado->save($con);
				}
				$this->setOcestado($this->aOcestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OcciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcciudadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOcmunicis !== null) {
				foreach($this->collOcmunicis as $referrerFK) {
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


												
			if ($this->aOcpais !== null) {
				if (!$this->aOcpais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcpais->getValidationFailures());
				}
			}

			if ($this->aOcestado !== null) {
				if (!$this->aOcestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcestado->getValidationFailures());
				}
			}


			if (($retval = OcciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOcmunicis !== null) {
					foreach($this->collOcmunicis as $referrerFK) {
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
		$pos = OcciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpai();
				break;
			case 1:
				return $this->getCodedo();
				break;
			case 2:
				return $this->getCodciu();
				break;
			case 3:
				return $this->getNomciu();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpai(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodciu(),
			$keys[3] => $this->getNomciu(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpai($value);
				break;
			case 1:
				$this->setCodedo($value);
				break;
			case 2:
				$this->setCodciu($value);
				break;
			case 3:
				$this->setNomciu($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodciu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomciu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcciudadPeer::CODPAI)) $criteria->add(OcciudadPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcciudadPeer::CODEDO)) $criteria->add(OcciudadPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcciudadPeer::CODCIU)) $criteria->add(OcciudadPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(OcciudadPeer::NOMCIU)) $criteria->add(OcciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(OcciudadPeer::ID)) $criteria->add(OcciudadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcciudadPeer::DATABASE_NAME);

		$criteria->add(OcciudadPeer::ID, $this->id);

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

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setNomciu($this->nomciu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOcmunicis() as $relObj) {
				$copyObj->addOcmunici($relObj->copy($deepCopy));
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
			self::$peer = new OcciudadPeer();
		}
		return self::$peer;
	}

	
	public function setOcpais($v)
	{


		if ($v === null) {
			$this->setCodpai(NULL);
		} else {
			$this->setCodpai($v->getCodpai());
		}


		$this->aOcpais = $v;
	}


	
	public function getOcpais($con = null)
	{
		if ($this->aOcpais === null && (($this->codpai !== "" && $this->codpai !== null))) {
						include_once 'lib/model/om/BaseOcpaisPeer.php';

      $c = new Criteria();
      $c->add(OcpaisPeer::CODPAI,$this->codpai);
      
			$this->aOcpais = OcpaisPeer::doSelectOne($c, $con);

			
		}
		return $this->aOcpais;
	}

	
	public function setOcestado($v)
	{


		if ($v === null) {
			$this->setCodedo(NULL);
		} else {
			$this->setCodedo($v->getCodedo());
		}


		$this->aOcestado = $v;
	}


	
	public function getOcestado($con = null)
	{
		if ($this->aOcestado === null && (($this->codedo !== "" && $this->codedo !== null))) {
						include_once 'lib/model/om/BaseOcestadoPeer.php';

      $c = new Criteria();
      $c->add(OcestadoPeer::CODEDO,$this->codedo);
      
			$this->aOcestado = OcestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aOcestado;
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

				$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

				OcmuniciPeer::addSelectColumns($criteria);
				$this->collOcmunicis = OcmuniciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

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

		$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

		return OcmuniciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOcmunici(Ocmunici $l)
	{
		$this->collOcmunicis[] = $l;
		$l->setOcciudad($this);
	}


	
	public function getOcmunicisJoinOcpais($criteria = null, $con = null)
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

				$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcpais($criteria, $con);
			}
		} else {
									
			$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

			if (!isset($this->lastOcmuniciCriteria) || !$this->lastOcmuniciCriteria->equals($criteria)) {
				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcpais($criteria, $con);
			}
		}
		$this->lastOcmuniciCriteria = $criteria;

		return $this->collOcmunicis;
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

				$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(OcmuniciPeer::CODCIU, $this->getCodciu());

			if (!isset($this->lastOcmuniciCriteria) || !$this->lastOcmuniciCriteria->equals($criteria)) {
				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcestado($criteria, $con);
			}
		}
		$this->lastOcmuniciCriteria = $criteria;

		return $this->collOcmunicis;
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

				$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

				CadefcenacoPeer::addSelectColumns($criteria);
				$this->collCadefcenacos = CadefcenacoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

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

		$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

		return CadefcenacoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCadefcenaco(Cadefcenaco $l)
	{
		$this->collCadefcenacos[] = $l;
		$l->setOcciudad($this);
	}


	
	public function getCadefcenacosJoinOcpais($criteria = null, $con = null)
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

				$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcpais($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcpais($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
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

				$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcestado($criteria, $con);
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

				$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODCIU, $this->getCodciu());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcmunici($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}

} 