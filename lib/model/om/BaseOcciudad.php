<?php


abstract class BaseOcciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codciu;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $nomciu;


	
	protected $id;

	
	protected $collViadettipsers;

	
	protected $lastViadettipserCriteria = null;

	
	protected $collViaciuentes;

	
	protected $lastViaciuenteCriteria = null;

	
	protected $collViaregdetsolvias;

	
	protected $lastViaregdetsolviaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = OcciudadPeer::CODCIU;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = OcciudadPeer::CODEDO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = OcciudadPeer::CODPAI;
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

      $this->codciu = $rs->getString($startcol + 0);

      $this->codedo = $rs->getString($startcol + 1);

      $this->codpai = $rs->getString($startcol + 2);

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

			if ($this->collViadettipsers !== null) {
				foreach($this->collViadettipsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collViaciuentes !== null) {
				foreach($this->collViaciuentes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collViaregdetsolvias !== null) {
				foreach($this->collViaregdetsolvias as $referrerFK) {
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


			if (($retval = OcciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViadettipsers !== null) {
					foreach($this->collViadettipsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collViaciuentes !== null) {
					foreach($this->collViaciuentes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collViaregdetsolvias !== null) {
					foreach($this->collViaregdetsolvias as $referrerFK) {
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
				return $this->getCodciu();
				break;
			case 1:
				return $this->getCodedo();
				break;
			case 2:
				return $this->getCodpai();
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
			$keys[0] => $this->getCodciu(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodpai(),
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
				$this->setCodciu($value);
				break;
			case 1:
				$this->setCodedo($value);
				break;
			case 2:
				$this->setCodpai($value);
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

		if (array_key_exists($keys[0], $arr)) $this->setCodciu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpai($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomciu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcciudadPeer::CODCIU)) $criteria->add(OcciudadPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(OcciudadPeer::CODEDO)) $criteria->add(OcciudadPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcciudadPeer::CODPAI)) $criteria->add(OcciudadPeer::CODPAI, $this->codpai);
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

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNomciu($this->nomciu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViadettipsers() as $relObj) {
				$copyObj->addViadettipser($relObj->copy($deepCopy));
			}

			foreach($this->getViaciuentes() as $relObj) {
				$copyObj->addViaciuente($relObj->copy($deepCopy));
			}

			foreach($this->getViaregdetsolvias() as $relObj) {
				$copyObj->addViaregdetsolvia($relObj->copy($deepCopy));
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

	
	public function initViadettipsers()
	{
		if ($this->collViadettipsers === null) {
			$this->collViadettipsers = array();
		}
	}

	
	public function getViadettipsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
			   $this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

				ViadettipserPeer::addSelectColumns($criteria);
				$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

				ViadettipserPeer::addSelectColumns($criteria);
				if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
					$this->collViadettipsers = ViadettipserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViadettipserCriteria = $criteria;
		return $this->collViadettipsers;
	}

	
	public function countViadettipsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

		return ViadettipserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViadettipser(Viadettipser $l)
	{
		$this->collViadettipsers[] = $l;
		$l->setOcciudad($this);
	}


	
	public function getViadettipsersJoinViaregtiptab($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
				$this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtiptab($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtiptab($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}


	
	public function getViadettipsersJoinViaregtipser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViadettipserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViadettipsers === null) {
			if ($this->isNew()) {
				$this->collViadettipsers = array();
			} else {

				$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		} else {
									
			$criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->getId());

			if (!isset($this->lastViadettipserCriteria) || !$this->lastViadettipserCriteria->equals($criteria)) {
				$this->collViadettipsers = ViadettipserPeer::doSelectJoinViaregtipser($criteria, $con);
			}
		}
		$this->lastViadettipserCriteria = $criteria;

		return $this->collViadettipsers;
	}

	
	public function initViaciuentes()
	{
		if ($this->collViaciuentes === null) {
			$this->collViaciuentes = array();
		}
	}

	
	public function getViaciuentes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaciuentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaciuentes === null) {
			if ($this->isNew()) {
			   $this->collViaciuentes = array();
			} else {

				$criteria->add(ViaciuentePeer::OCCIUDAD_ID, $this->getId());

				ViaciuentePeer::addSelectColumns($criteria);
				$this->collViaciuentes = ViaciuentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaciuentePeer::OCCIUDAD_ID, $this->getId());

				ViaciuentePeer::addSelectColumns($criteria);
				if (!isset($this->lastViaciuenteCriteria) || !$this->lastViaciuenteCriteria->equals($criteria)) {
					$this->collViaciuentes = ViaciuentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaciuenteCriteria = $criteria;
		return $this->collViaciuentes;
	}

	
	public function countViaciuentes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaciuentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaciuentePeer::OCCIUDAD_ID, $this->getId());

		return ViaciuentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaciuente(Viaciuente $l)
	{
		$this->collViaciuentes[] = $l;
		$l->setOcciudad($this);
	}


	
	public function getViaciuentesJoinViaregente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaciuentePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaciuentes === null) {
			if ($this->isNew()) {
				$this->collViaciuentes = array();
			} else {

				$criteria->add(ViaciuentePeer::OCCIUDAD_ID, $this->getId());

				$this->collViaciuentes = ViaciuentePeer::doSelectJoinViaregente($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaciuentePeer::OCCIUDAD_ID, $this->getId());

			if (!isset($this->lastViaciuenteCriteria) || !$this->lastViaciuenteCriteria->equals($criteria)) {
				$this->collViaciuentes = ViaciuentePeer::doSelectJoinViaregente($criteria, $con);
			}
		}
		$this->lastViaciuenteCriteria = $criteria;

		return $this->collViaciuentes;
	}

	
	public function initViaregdetsolvias()
	{
		if ($this->collViaregdetsolvias === null) {
			$this->collViaregdetsolvias = array();
		}
	}

	
	public function getViaregdetsolvias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
			   $this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
					$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;
		return $this->collViaregdetsolvias;
	}

	
	public function countViaregdetsolvias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

		return ViaregdetsolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregdetsolvia(Viaregdetsolvia $l)
	{
		$this->collViaregdetsolvias[] = $l;
		$l->setOcciudad($this);
	}


	
	public function getViaregdetsolviasJoinViaregsolvia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregsolvia($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregsolvia($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinViaregente($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregente($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregente($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinViaregact($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViaregdetsolviaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViaregdetsolvias === null) {
			if ($this->isNew()) {
				$this->collViaregdetsolvias = array();
			} else {

				$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregact($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::OCCIUDAD_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregact($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}

} 