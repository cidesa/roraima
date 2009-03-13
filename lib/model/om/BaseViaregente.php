<?php


abstract class BaseViaregente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $desente;


	
	protected $nacent;


	
	protected $tipent;


	
	protected $actpro;


	
	protected $dirente;


	
	protected $telente;


	
	protected $corente;


	
	protected $actecoente;


	
	protected $id;

	
	protected $collViaciuentes;

	
	protected $lastViaciuenteCriteria = null;

	
	protected $collViaregdetsolvias;

	
	protected $lastViaregdetsolviaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getDesente()
  {

    return trim($this->desente);

  }
  
  public function getNacent()
  {

    return trim($this->nacent);

  }
  
  public function getTipent()
  {

    return trim($this->tipent);

  }
  
  public function getActpro()
  {

    return trim($this->actpro);

  }
  
  public function getDirente()
  {

    return trim($this->dirente);

  }
  
  public function getTelente()
  {

    return trim($this->telente);

  }
  
  public function getCorente()
  {

    return trim($this->corente);

  }
  
  public function getActecoente()
  {

    return trim($this->actecoente);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = ViaregentePeer::CEDRIF;
      }
  
	} 
	
	public function setDesente($v)
	{

    if ($this->desente !== $v) {
        $this->desente = $v;
        $this->modifiedColumns[] = ViaregentePeer::DESENTE;
      }
  
	} 
	
	public function setNacent($v)
	{

    if ($this->nacent !== $v) {
        $this->nacent = $v;
        $this->modifiedColumns[] = ViaregentePeer::NACENT;
      }
  
	} 
	
	public function setTipent($v)
	{

    if ($this->tipent !== $v) {
        $this->tipent = $v;
        $this->modifiedColumns[] = ViaregentePeer::TIPENT;
      }
  
	} 
	
	public function setActpro($v)
	{

    if ($this->actpro !== $v) {
        $this->actpro = $v;
        $this->modifiedColumns[] = ViaregentePeer::ACTPRO;
      }
  
	} 
	
	public function setDirente($v)
	{

    if ($this->dirente !== $v) {
        $this->dirente = $v;
        $this->modifiedColumns[] = ViaregentePeer::DIRENTE;
      }
  
	} 
	
	public function setTelente($v)
	{

    if ($this->telente !== $v) {
        $this->telente = $v;
        $this->modifiedColumns[] = ViaregentePeer::TELENTE;
      }
  
	} 
	
	public function setCorente($v)
	{

    if ($this->corente !== $v) {
        $this->corente = $v;
        $this->modifiedColumns[] = ViaregentePeer::CORENTE;
      }
  
	} 
	
	public function setActecoente($v)
	{

    if ($this->actecoente !== $v) {
        $this->actecoente = $v;
        $this->modifiedColumns[] = ViaregentePeer::ACTECOENTE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaregentePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrif = $rs->getString($startcol + 0);

      $this->desente = $rs->getString($startcol + 1);

      $this->nacent = $rs->getString($startcol + 2);

      $this->tipent = $rs->getString($startcol + 3);

      $this->actpro = $rs->getString($startcol + 4);

      $this->dirente = $rs->getString($startcol + 5);

      $this->telente = $rs->getString($startcol + 6);

      $this->corente = $rs->getString($startcol + 7);

      $this->actecoente = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaregente object", $e);
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
			$con = Propel::getConnection(ViaregentePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaregentePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaregentePeer::DATABASE_NAME);
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
					$pk = ViaregentePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaregentePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = ViaregentePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = ViaregentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getDesente();
				break;
			case 2:
				return $this->getNacent();
				break;
			case 3:
				return $this->getTipent();
				break;
			case 4:
				return $this->getActpro();
				break;
			case 5:
				return $this->getDirente();
				break;
			case 6:
				return $this->getTelente();
				break;
			case 7:
				return $this->getCorente();
				break;
			case 8:
				return $this->getActecoente();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregentePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getDesente(),
			$keys[2] => $this->getNacent(),
			$keys[3] => $this->getTipent(),
			$keys[4] => $this->getActpro(),
			$keys[5] => $this->getDirente(),
			$keys[6] => $this->getTelente(),
			$keys[7] => $this->getCorente(),
			$keys[8] => $this->getActecoente(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaregentePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setDesente($value);
				break;
			case 2:
				$this->setNacent($value);
				break;
			case 3:
				$this->setTipent($value);
				break;
			case 4:
				$this->setActpro($value);
				break;
			case 5:
				$this->setDirente($value);
				break;
			case 6:
				$this->setTelente($value);
				break;
			case 7:
				$this->setCorente($value);
				break;
			case 8:
				$this->setActecoente($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaregentePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesente($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNacent($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipent($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirente($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelente($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCorente($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setActecoente($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaregentePeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaregentePeer::CEDRIF)) $criteria->add(ViaregentePeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(ViaregentePeer::DESENTE)) $criteria->add(ViaregentePeer::DESENTE, $this->desente);
		if ($this->isColumnModified(ViaregentePeer::NACENT)) $criteria->add(ViaregentePeer::NACENT, $this->nacent);
		if ($this->isColumnModified(ViaregentePeer::TIPENT)) $criteria->add(ViaregentePeer::TIPENT, $this->tipent);
		if ($this->isColumnModified(ViaregentePeer::ACTPRO)) $criteria->add(ViaregentePeer::ACTPRO, $this->actpro);
		if ($this->isColumnModified(ViaregentePeer::DIRENTE)) $criteria->add(ViaregentePeer::DIRENTE, $this->dirente);
		if ($this->isColumnModified(ViaregentePeer::TELENTE)) $criteria->add(ViaregentePeer::TELENTE, $this->telente);
		if ($this->isColumnModified(ViaregentePeer::CORENTE)) $criteria->add(ViaregentePeer::CORENTE, $this->corente);
		if ($this->isColumnModified(ViaregentePeer::ACTECOENTE)) $criteria->add(ViaregentePeer::ACTECOENTE, $this->actecoente);
		if ($this->isColumnModified(ViaregentePeer::ID)) $criteria->add(ViaregentePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaregentePeer::DATABASE_NAME);

		$criteria->add(ViaregentePeer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setDesente($this->desente);

		$copyObj->setNacent($this->nacent);

		$copyObj->setTipent($this->tipent);

		$copyObj->setActpro($this->actpro);

		$copyObj->setDirente($this->dirente);

		$copyObj->setTelente($this->telente);

		$copyObj->setCorente($this->corente);

		$copyObj->setActecoente($this->actecoente);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new ViaregentePeer();
		}
		return self::$peer;
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

				$criteria->add(ViaciuentePeer::VIAREGENTE_ID, $this->getId());

				ViaciuentePeer::addSelectColumns($criteria);
				$this->collViaciuentes = ViaciuentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaciuentePeer::VIAREGENTE_ID, $this->getId());

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

		$criteria->add(ViaciuentePeer::VIAREGENTE_ID, $this->getId());

		return ViaciuentePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaciuente(Viaciuente $l)
	{
		$this->collViaciuentes[] = $l;
		$l->setViaregente($this);
	}


	
	public function getViaciuentesJoinOcciudad($criteria = null, $con = null)
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

				$criteria->add(ViaciuentePeer::VIAREGENTE_ID, $this->getId());

				$this->collViaciuentes = ViaciuentePeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaciuentePeer::VIAREGENTE_ID, $this->getId());

			if (!isset($this->lastViaciuenteCriteria) || !$this->lastViaciuenteCriteria->equals($criteria)) {
				$this->collViaciuentes = ViaciuentePeer::doSelectJoinOcciudad($criteria, $con);
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

				$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

				ViaregdetsolviaPeer::addSelectColumns($criteria);
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

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

		$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

		return ViaregdetsolviaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViaregdetsolvia(Viaregdetsolvia $l)
	{
		$this->collViaregdetsolvias[] = $l;
		$l->setViaregente($this);
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

				$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregsolvia($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregsolvia($criteria, $con);
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

				$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregact($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinViaregact($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}


	
	public function getViaregdetsolviasJoinOcciudad($criteria = null, $con = null)
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

				$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(ViaregdetsolviaPeer::VIAREGENTE_ID, $this->getId());

			if (!isset($this->lastViaregdetsolviaCriteria) || !$this->lastViaregdetsolviaCriteria->equals($criteria)) {
				$this->collViaregdetsolvias = ViaregdetsolviaPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastViaregdetsolviaCriteria = $criteria;

		return $this->collViaregdetsolvias;
	}

} 