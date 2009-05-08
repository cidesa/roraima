<?php


abstract class BaseNpprofesion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprofes;


	
	protected $desprofes;


	
	protected $nivpro;


	
	protected $id;

	
	protected $collNpprocars;

	
	protected $lastNpprocarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodprofes()
  {

    return trim($this->codprofes);

  }
  
  public function getDesprofes()
  {

    return trim($this->desprofes);

  }
  
  public function getNivpro()
  {

    return trim($this->nivpro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodprofes($v)
	{

    if ($this->codprofes !== $v) {
        $this->codprofes = $v;
        $this->modifiedColumns[] = NpprofesionPeer::CODPROFES;
      }
  
	} 
	
	public function setDesprofes($v)
	{

    if ($this->desprofes !== $v) {
        $this->desprofes = $v;
        $this->modifiedColumns[] = NpprofesionPeer::DESPROFES;
      }
  
	} 
	
	public function setNivpro($v)
	{

    if ($this->nivpro !== $v) {
        $this->nivpro = $v;
        $this->modifiedColumns[] = NpprofesionPeer::NIVPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpprofesionPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codprofes = $rs->getString($startcol + 0);

      $this->desprofes = $rs->getString($startcol + 1);

      $this->nivpro = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npprofesion object", $e);
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
			$con = Propel::getConnection(NpprofesionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpprofesionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpprofesionPeer::DATABASE_NAME);
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
					$pk = NpprofesionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpprofesionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collNpprocars !== null) {
				foreach($this->collNpprocars as $referrerFK) {
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


			if (($retval = NpprofesionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNpprocars !== null) {
					foreach($this->collNpprocars as $referrerFK) {
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
		$pos = NpprofesionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprofes();
				break;
			case 1:
				return $this->getDesprofes();
				break;
			case 2:
				return $this->getNivpro();
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
		$keys = NpprofesionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprofes(),
			$keys[1] => $this->getDesprofes(),
			$keys[2] => $this->getNivpro(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprofesionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprofes($value);
				break;
			case 1:
				$this->setDesprofes($value);
				break;
			case 2:
				$this->setNivpro($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpprofesionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprofes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesprofes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNivpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpprofesionPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpprofesionPeer::CODPROFES)) $criteria->add(NpprofesionPeer::CODPROFES, $this->codprofes);
		if ($this->isColumnModified(NpprofesionPeer::DESPROFES)) $criteria->add(NpprofesionPeer::DESPROFES, $this->desprofes);
		if ($this->isColumnModified(NpprofesionPeer::NIVPRO)) $criteria->add(NpprofesionPeer::NIVPRO, $this->nivpro);
		if ($this->isColumnModified(NpprofesionPeer::ID)) $criteria->add(NpprofesionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpprofesionPeer::DATABASE_NAME);

		$criteria->add(NpprofesionPeer::ID, $this->id);

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

		$copyObj->setCodprofes($this->codprofes);

		$copyObj->setDesprofes($this->desprofes);

		$copyObj->setNivpro($this->nivpro);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getNpprocars() as $relObj) {
				$copyObj->addNpprocar($relObj->copy($deepCopy));
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
			self::$peer = new NpprofesionPeer();
		}
		return self::$peer;
	}

	
	public function initNpprocars()
	{
		if ($this->collNpprocars === null) {
			$this->collNpprocars = array();
		}
	}

	
	public function getNpprocars($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNpprocarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNpprocars === null) {
			if ($this->isNew()) {
			   $this->collNpprocars = array();
			} else {

				$criteria->add(NpprocarPeer::CODPROFES, $this->getCodprofes());

				NpprocarPeer::addSelectColumns($criteria);
				$this->collNpprocars = NpprocarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NpprocarPeer::CODPROFES, $this->getCodprofes());

				NpprocarPeer::addSelectColumns($criteria);
				if (!isset($this->lastNpprocarCriteria) || !$this->lastNpprocarCriteria->equals($criteria)) {
					$this->collNpprocars = NpprocarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNpprocarCriteria = $criteria;
		return $this->collNpprocars;
	}

	
	public function countNpprocars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseNpprocarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NpprocarPeer::CODPROFES, $this->getCodprofes());

		return NpprocarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNpprocar(Npprocar $l)
	{
		$this->collNpprocars[] = $l;
		$l->setNpprofesion($this);
	}


	
	public function getNpprocarsJoinNpcargos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNpprocarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNpprocars === null) {
			if ($this->isNew()) {
				$this->collNpprocars = array();
			} else {

				$criteria->add(NpprocarPeer::CODPROFES, $this->getCodprofes());

				$this->collNpprocars = NpprocarPeer::doSelectJoinNpcargos($criteria, $con);
			}
		} else {
									
			$criteria->add(NpprocarPeer::CODPROFES, $this->getCodprofes());

			if (!isset($this->lastNpprocarCriteria) || !$this->lastNpprocarCriteria->equals($criteria)) {
				$this->collNpprocars = NpprocarPeer::doSelectJoinNpcargos($criteria, $con);
			}
		}
		$this->lastNpprocarCriteria = $criteria;

		return $this->collNpprocars;
	}

} 