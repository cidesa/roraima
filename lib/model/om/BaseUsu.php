<?php


abstract class BaseUsu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $loguse;


	
	protected $nomuse;


	
	protected $apluse;


	
	protected $numemp;


	
	protected $pasuse;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $cedemp;


	
	protected $numuni;


	
	protected $codcat;


	
	protected $id;

	
	protected $collDfatendocdets;

	
	protected $lastDfatendocdetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getNomuse()
  {

    return trim($this->nomuse);

  }
  
  public function getApluse()
  {

    return $this->apluse;

  }
  
  public function getNumemp()
  {

    return $this->numemp;

  }
  
  public function getPasuse()
  {

    return trim($this->pasuse);

  }
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getNumuni()
  {

    return trim($this->numuni);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = UsuPeer::LOGUSE;
      }
  
	} 
	
	public function setNomuse($v)
	{

    if ($this->nomuse !== $v) {
        $this->nomuse = $v;
        $this->modifiedColumns[] = UsuPeer::NOMUSE;
      }
  
	} 
	
	public function setApluse($v)
	{

    if ($this->apluse !== $v) {
        $this->apluse = $v;
        $this->modifiedColumns[] = UsuPeer::APLUSE;
      }
  
	} 
	
	public function setNumemp($v)
	{

    if ($this->numemp !== $v) {
        $this->numemp = $v;
        $this->modifiedColumns[] = UsuPeer::NUMEMP;
      }
  
	} 
	
	public function setPasuse($v)
	{

    if ($this->pasuse !== $v) {
        $this->pasuse = $v;
        $this->modifiedColumns[] = UsuPeer::PASUSE;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = UsuPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = UsuPeer::TELEMP;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = UsuPeer::CEDEMP;
      }
  
	} 
	
	public function setNumuni($v)
	{

    if ($this->numuni !== $v) {
        $this->numuni = $v;
        $this->modifiedColumns[] = UsuPeer::NUMUNI;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = UsuPeer::CODCAT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = UsuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->loguse = $rs->getString($startcol + 0);

      $this->nomuse = $rs->getString($startcol + 1);

      $this->apluse = $rs->getString($startcol + 2);

      $this->numemp = $rs->getString($startcol + 3);

      $this->pasuse = $rs->getString($startcol + 4);

      $this->diremp = $rs->getString($startcol + 5);

      $this->telemp = $rs->getString($startcol + 6);

      $this->cedemp = $rs->getString($startcol + 7);

      $this->numuni = $rs->getString($startcol + 8);

      $this->codcat = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Usu object", $e);
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
			$con = Propel::getConnection(UsuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuPeer::DATABASE_NAME);
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
					$pk = UsuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += UsuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocdets !== null) {
				foreach($this->collDfatendocdets as $referrerFK) {
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


			if (($retval = UsuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocdets !== null) {
					foreach($this->collDfatendocdets as $referrerFK) {
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
		$pos = UsuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLoguse();
				break;
			case 1:
				return $this->getNomuse();
				break;
			case 2:
				return $this->getApluse();
				break;
			case 3:
				return $this->getNumemp();
				break;
			case 4:
				return $this->getPasuse();
				break;
			case 5:
				return $this->getDiremp();
				break;
			case 6:
				return $this->getTelemp();
				break;
			case 7:
				return $this->getCedemp();
				break;
			case 8:
				return $this->getNumuni();
				break;
			case 9:
				return $this->getCodcat();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLoguse(),
			$keys[1] => $this->getNomuse(),
			$keys[2] => $this->getApluse(),
			$keys[3] => $this->getNumemp(),
			$keys[4] => $this->getPasuse(),
			$keys[5] => $this->getDiremp(),
			$keys[6] => $this->getTelemp(),
			$keys[7] => $this->getCedemp(),
			$keys[8] => $this->getNumuni(),
			$keys[9] => $this->getCodcat(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLoguse($value);
				break;
			case 1:
				$this->setNomuse($value);
				break;
			case 2:
				$this->setApluse($value);
				break;
			case 3:
				$this->setNumemp($value);
				break;
			case 4:
				$this->setPasuse($value);
				break;
			case 5:
				$this->setDiremp($value);
				break;
			case 6:
				$this->setTelemp($value);
				break;
			case 7:
				$this->setCedemp($value);
				break;
			case 8:
				$this->setNumuni($value);
				break;
			case 9:
				$this->setCodcat($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLoguse($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomuse($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApluse($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPasuse($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiremp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCedemp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumuni($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcat($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuPeer::LOGUSE)) $criteria->add(UsuPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(UsuPeer::NOMUSE)) $criteria->add(UsuPeer::NOMUSE, $this->nomuse);
		if ($this->isColumnModified(UsuPeer::APLUSE)) $criteria->add(UsuPeer::APLUSE, $this->apluse);
		if ($this->isColumnModified(UsuPeer::NUMEMP)) $criteria->add(UsuPeer::NUMEMP, $this->numemp);
		if ($this->isColumnModified(UsuPeer::PASUSE)) $criteria->add(UsuPeer::PASUSE, $this->pasuse);
		if ($this->isColumnModified(UsuPeer::DIREMP)) $criteria->add(UsuPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(UsuPeer::TELEMP)) $criteria->add(UsuPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(UsuPeer::CEDEMP)) $criteria->add(UsuPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(UsuPeer::NUMUNI)) $criteria->add(UsuPeer::NUMUNI, $this->numuni);
		if ($this->isColumnModified(UsuPeer::CODCAT)) $criteria->add(UsuPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(UsuPeer::ID)) $criteria->add(UsuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsuPeer::DATABASE_NAME);

		$criteria->add(UsuPeer::ID, $this->id);

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

		$copyObj->setLoguse($this->loguse);

		$copyObj->setNomuse($this->nomuse);

		$copyObj->setApluse($this->apluse);

		$copyObj->setNumemp($this->numemp);

		$copyObj->setPasuse($this->pasuse);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setNumuni($this->numuni);

		$copyObj->setCodcat($this->codcat);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocdets() as $relObj) {
				$copyObj->addDfatendocdet($relObj->copy($deepCopy));
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
			self::$peer = new UsuPeer();
		}
		return self::$peer;
	}

	
	public function initDfatendocdets()
	{
		if ($this->collDfatendocdets === null) {
			$this->collDfatendocdets = array();
		}
	}

	
	public function getDfatendocdets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
					$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;
		return $this->collDfatendocdets;
	}

	
	public function countDfatendocdets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

		return DfatendocdetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdet(Dfatendocdet $l)
	{
		$this->collDfatendocdets[] = $l;
		$l->setUsu($this);
	}


	
	public function getDfatendocdetsJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
				$this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;

		return $this->collDfatendocdets;
	}


	
	public function getDfatendocdetsJoinAcunidadRelatedByIdAcunidadOri($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
				$this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinAcunidadRelatedByIdAcunidadOri($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinAcunidadRelatedByIdAcunidadOri($criteria, $con);
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;

		return $this->collDfatendocdets;
	}


	
	public function getDfatendocdetsJoinAcunidadRelatedByIdAcunidadDes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
				$this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinAcunidadRelatedByIdAcunidadDes($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinAcunidadRelatedByIdAcunidadDes($criteria, $con);
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;

		return $this->collDfatendocdets;
	}


	
	public function getDfatendocdetsJoinDfrutadoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
				$this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_USUARIO, $this->getId());

			if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfrutadoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;

		return $this->collDfatendocdets;
	}

} 