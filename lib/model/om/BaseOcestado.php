<?php


abstract class BaseOcestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $nomedo;


	
	protected $id;

	
	protected $aOcpais;

	
	protected $collOcmunicis;

	
	protected $lastOcmuniciCriteria = null;

	
	protected $collOcciudads;

	
	protected $lastOcciudadCriteria = null;

	
	protected $collCadefcenacos;

	
	protected $lastCadefcenacoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getNomedo()
  {

    return trim($this->nomedo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = OcestadoPeer::CODEDO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = OcestadoPeer::CODPAI;
      }
  
		if ($this->aOcpais !== null && $this->aOcpais->getCodpai() !== $v) {
			$this->aOcpais = null;
		}

	} 
	
	public function setNomedo($v)
	{

    if ($this->nomedo !== $v) {
        $this->nomedo = $v;
        $this->modifiedColumns[] = OcestadoPeer::NOMEDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcestadoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codedo = $rs->getString($startcol + 0);

      $this->codpai = $rs->getString($startcol + 1);

      $this->nomedo = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocestado object", $e);
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
			$con = Propel::getConnection(OcestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcestadoPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OcestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aOcpais !== null) {
				if (!$this->aOcpais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcpais->getValidationFailures());
				}
			}


			if (($retval = OcestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = OcestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodedo();
				break;
			case 1:
				return $this->getCodpai();
				break;
			case 2:
				return $this->getNomedo();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodedo(),
			$keys[1] => $this->getCodpai(),
			$keys[2] => $this->getNomedo(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodedo($value);
				break;
			case 1:
				$this->setCodpai($value);
				break;
			case 2:
				$this->setNomedo($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodedo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpai($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomedo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcestadoPeer::CODEDO)) $criteria->add(OcestadoPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcestadoPeer::CODPAI)) $criteria->add(OcestadoPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcestadoPeer::NOMEDO)) $criteria->add(OcestadoPeer::NOMEDO, $this->nomedo);
		if ($this->isColumnModified(OcestadoPeer::ID)) $criteria->add(OcestadoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcestadoPeer::DATABASE_NAME);

		$criteria->add(OcestadoPeer::ID, $this->id);

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

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNomedo($this->nomedo);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new OcestadoPeer();
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

				$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

				OcmuniciPeer::addSelectColumns($criteria);
				$this->collOcmunicis = OcmuniciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

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

		$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

		return OcmuniciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOcmunici(Ocmunici $l)
	{
		$this->collOcmunicis[] = $l;
		$l->setOcestado($this);
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

				$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcpais($criteria, $con);
			}
		} else {
									
			$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

			if (!isset($this->lastOcmuniciCriteria) || !$this->lastOcmuniciCriteria->equals($criteria)) {
				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcpais($criteria, $con);
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

				$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

				$this->collOcmunicis = OcmuniciPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(OcmuniciPeer::CODEDO, $this->getCodedo());

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

				$criteria->add(OcciudadPeer::CODEDO, $this->getCodedo());

				OcciudadPeer::addSelectColumns($criteria);
				$this->collOcciudads = OcciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OcciudadPeer::CODEDO, $this->getCodedo());

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

		$criteria->add(OcciudadPeer::CODEDO, $this->getCodedo());

		return OcciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOcciudad(Occiudad $l)
	{
		$this->collOcciudads[] = $l;
		$l->setOcestado($this);
	}


	
	public function getOcciudadsJoinOcpais($criteria = null, $con = null)
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

				$criteria->add(OcciudadPeer::CODEDO, $this->getCodedo());

				$this->collOcciudads = OcciudadPeer::doSelectJoinOcpais($criteria, $con);
			}
		} else {
									
			$criteria->add(OcciudadPeer::CODEDO, $this->getCodedo());

			if (!isset($this->lastOcciudadCriteria) || !$this->lastOcciudadCriteria->equals($criteria)) {
				$this->collOcciudads = OcciudadPeer::doSelectJoinOcpais($criteria, $con);
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

				$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

				CadefcenacoPeer::addSelectColumns($criteria);
				$this->collCadefcenacos = CadefcenacoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

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

		$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

		return CadefcenacoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCadefcenaco(Cadefcenaco $l)
	{
		$this->collCadefcenacos[] = $l;
		$l->setOcestado($this);
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

				$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcpais($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcpais($criteria, $con);
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

				$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

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

				$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODEDO, $this->getCodedo());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcmunici($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}

} 