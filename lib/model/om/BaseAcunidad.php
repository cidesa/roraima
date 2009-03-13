<?php


abstract class BaseAcunidad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numuni;


	
	protected $nomuni;


	
	protected $desuni;


	
	protected $id;

	
	protected $collDfatendocdetsRelatedByIdAcunidadOri;

	
	protected $lastDfatendocdetRelatedByIdAcunidadOriCriteria = null;

	
	protected $collDfatendocdetsRelatedByIdAcunidadDes;

	
	protected $lastDfatendocdetRelatedByIdAcunidadDesCriteria = null;

	
	protected $collDfrutadocs;

	
	protected $lastDfrutadocCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumuni()
  {

    return trim($this->numuni);

  }
  
  public function getNomuni()
  {

    return trim($this->nomuni);

  }
  
  public function getDesuni()
  {

    return trim($this->desuni);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumuni($v)
	{

    if ($this->numuni !== $v) {
        $this->numuni = $v;
        $this->modifiedColumns[] = AcunidadPeer::NUMUNI;
      }
  
	} 
	
	public function setNomuni($v)
	{

    if ($this->nomuni !== $v) {
        $this->nomuni = $v;
        $this->modifiedColumns[] = AcunidadPeer::NOMUNI;
      }
  
	} 
	
	public function setDesuni($v)
	{

    if ($this->desuni !== $v) {
        $this->desuni = $v;
        $this->modifiedColumns[] = AcunidadPeer::DESUNI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AcunidadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numuni = $rs->getString($startcol + 0);

      $this->nomuni = $rs->getString($startcol + 1);

      $this->desuni = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Acunidad object", $e);
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
			$con = Propel::getConnection(AcunidadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AcunidadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AcunidadPeer::DATABASE_NAME);
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
					$pk = AcunidadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AcunidadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocdetsRelatedByIdAcunidadOri !== null) {
				foreach($this->collDfatendocdetsRelatedByIdAcunidadOri as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDfatendocdetsRelatedByIdAcunidadDes !== null) {
				foreach($this->collDfatendocdetsRelatedByIdAcunidadDes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDfrutadocs !== null) {
				foreach($this->collDfrutadocs as $referrerFK) {
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


			if (($retval = AcunidadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocdetsRelatedByIdAcunidadOri !== null) {
					foreach($this->collDfatendocdetsRelatedByIdAcunidadOri as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDfatendocdetsRelatedByIdAcunidadDes !== null) {
					foreach($this->collDfatendocdetsRelatedByIdAcunidadDes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDfrutadocs !== null) {
					foreach($this->collDfrutadocs as $referrerFK) {
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
		$pos = AcunidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumuni();
				break;
			case 1:
				return $this->getNomuni();
				break;
			case 2:
				return $this->getDesuni();
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
		$keys = AcunidadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumuni(),
			$keys[1] => $this->getNomuni(),
			$keys[2] => $this->getDesuni(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcunidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumuni($value);
				break;
			case 1:
				$this->setNomuni($value);
				break;
			case 2:
				$this->setDesuni($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcunidadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumuni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesuni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AcunidadPeer::DATABASE_NAME);

		if ($this->isColumnModified(AcunidadPeer::NUMUNI)) $criteria->add(AcunidadPeer::NUMUNI, $this->numuni);
		if ($this->isColumnModified(AcunidadPeer::NOMUNI)) $criteria->add(AcunidadPeer::NOMUNI, $this->nomuni);
		if ($this->isColumnModified(AcunidadPeer::DESUNI)) $criteria->add(AcunidadPeer::DESUNI, $this->desuni);
		if ($this->isColumnModified(AcunidadPeer::ID)) $criteria->add(AcunidadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AcunidadPeer::DATABASE_NAME);

		$criteria->add(AcunidadPeer::ID, $this->id);

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

		$copyObj->setNumuni($this->numuni);

		$copyObj->setNomuni($this->nomuni);

		$copyObj->setDesuni($this->desuni);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocdetsRelatedByIdAcunidadOri() as $relObj) {
				$copyObj->addDfatendocdetRelatedByIdAcunidadOri($relObj->copy($deepCopy));
			}

			foreach($this->getDfatendocdetsRelatedByIdAcunidadDes() as $relObj) {
				$copyObj->addDfatendocdetRelatedByIdAcunidadDes($relObj->copy($deepCopy));
			}

			foreach($this->getDfrutadocs() as $relObj) {
				$copyObj->addDfrutadoc($relObj->copy($deepCopy));
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
			self::$peer = new AcunidadPeer();
		}
		return self::$peer;
	}

	
	public function initDfatendocdetsRelatedByIdAcunidadOri()
	{
		if ($this->collDfatendocdetsRelatedByIdAcunidadOri === null) {
			$this->collDfatendocdetsRelatedByIdAcunidadOri = array();
		}
	}

	
	public function getDfatendocdetsRelatedByIdAcunidadOri($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadOri === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdetsRelatedByIdAcunidadOri = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdetRelatedByIdAcunidadOriCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria->equals($criteria)) {
					$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria = $criteria;
		return $this->collDfatendocdetsRelatedByIdAcunidadOri;
	}

	
	public function countDfatendocdetsRelatedByIdAcunidadOri($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

		return DfatendocdetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdetRelatedByIdAcunidadOri(Dfatendocdet $l)
	{
		$this->collDfatendocdetsRelatedByIdAcunidadOri[] = $l;
		$l->setAcunidadRelatedByIdAcunidadOri($this);
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadOriJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadOri === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadOriCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadOri;
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadOriJoinUsuarios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadOri === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinUsuarios($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadOriCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinUsuarios($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadOri;
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadOriJoinDfrutadoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadOri === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadOriCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadOri;
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadOriJoinDfmedtra($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadOri === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinDfmedtra($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadOriCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadOri = DfatendocdetPeer::doSelectJoinDfmedtra($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadOriCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadOri;
	}

	
	public function initDfatendocdetsRelatedByIdAcunidadDes()
	{
		if ($this->collDfatendocdetsRelatedByIdAcunidadDes === null) {
			$this->collDfatendocdetsRelatedByIdAcunidadDes = array();
		}
	}

	
	public function getDfatendocdetsRelatedByIdAcunidadDes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadDes === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdetsRelatedByIdAcunidadDes = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdetRelatedByIdAcunidadDesCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria->equals($criteria)) {
					$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria = $criteria;
		return $this->collDfatendocdetsRelatedByIdAcunidadDes;
	}

	
	public function countDfatendocdetsRelatedByIdAcunidadDes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

		return DfatendocdetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdetRelatedByIdAcunidadDes(Dfatendocdet $l)
	{
		$this->collDfatendocdetsRelatedByIdAcunidadDes[] = $l;
		$l->setAcunidadRelatedByIdAcunidadDes($this);
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadDesJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadDes === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadDesCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadDes;
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadDesJoinUsuarios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadDes === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinUsuarios($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadDesCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinUsuarios($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadDes;
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadDesJoinDfrutadoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadDes === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadDesCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadDes;
	}


	
	public function getDfatendocdetsRelatedByIdAcunidadDesJoinDfmedtra($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdetsRelatedByIdAcunidadDes === null) {
			if ($this->isNew()) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinDfmedtra($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->getId());

			if (!isset($this->lastDfatendocdetRelatedByIdAcunidadDesCriteria) || !$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria->equals($criteria)) {
				$this->collDfatendocdetsRelatedByIdAcunidadDes = DfatendocdetPeer::doSelectJoinDfmedtra($criteria, $con);
			}
		}
		$this->lastDfatendocdetRelatedByIdAcunidadDesCriteria = $criteria;

		return $this->collDfatendocdetsRelatedByIdAcunidadDes;
	}

	
	public function initDfrutadocs()
	{
		if ($this->collDfrutadocs === null) {
			$this->collDfrutadocs = array();
		}
	}

	
	public function getDfrutadocs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
			   $this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

				DfrutadocPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
					$this->collDfrutadocs = DfrutadocPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfrutadocCriteria = $criteria;
		return $this->collDfrutadocs;
	}

	
	public function countDfrutadocs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

		return DfrutadocPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfrutadoc(Dfrutadoc $l)
	{
		$this->collDfrutadocs[] = $l;
		$l->setAcunidad($this);
	}


	
	public function getDfrutadocsJoinDftabtip($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfrutadocs === null) {
			if ($this->isNew()) {
				$this->collDfrutadocs = array();
			} else {

				$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

				$this->collDfrutadocs = DfrutadocPeer::doSelectJoinDftabtip($criteria, $con);
			}
		} else {
									
			$criteria->add(DfrutadocPeer::ID_ACUNIDAD, $this->getId());

			if (!isset($this->lastDfrutadocCriteria) || !$this->lastDfrutadocCriteria->equals($criteria)) {
				$this->collDfrutadocs = DfrutadocPeer::doSelectJoinDftabtip($criteria, $con);
			}
		}
		$this->lastDfrutadocCriteria = $criteria;

		return $this->collDfrutadocs;
	}

} 