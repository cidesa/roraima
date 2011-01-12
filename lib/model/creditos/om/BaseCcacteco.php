<?php


abstract class BaseCcacteco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomacteco;


	
	protected $desacteco;


	
	protected $codciiu;

	
	protected $collCcbenefis;

	
	protected $lastCcbenefiCriteria = null;

	
	protected $collCcdatsoecos;

	
	protected $lastCcdatsoecoCriteria = null;

	
	protected $collCcfreacts;

	
	protected $lastCcfreactCriteria = null;

	
	protected $collCcpagters;

	
	protected $lastCcpagterCriteria = null;

	
	protected $collCcproyecs;

	
	protected $lastCcproyecCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomacteco()
  {

    return trim($this->nomacteco);

  }
  
  public function getDesacteco()
  {

    return trim($this->desacteco);

  }
  
  public function getCodciiu()
  {

    return $this->codciiu;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcactecoPeer::ID;
      }
  
	} 
	
	public function setNomacteco($v)
	{

    if ($this->nomacteco !== $v) {
        $this->nomacteco = $v;
        $this->modifiedColumns[] = CcactecoPeer::NOMACTECO;
      }
  
	} 
	
	public function setDesacteco($v)
	{

    if ($this->desacteco !== $v) {
        $this->desacteco = $v;
        $this->modifiedColumns[] = CcactecoPeer::DESACTECO;
      }
  
	} 
	
	public function setCodciiu($v)
	{

    if ($this->codciiu !== $v) {
        $this->codciiu = $v;
        $this->modifiedColumns[] = CcactecoPeer::CODCIIU;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomacteco = $rs->getString($startcol + 1);

      $this->desacteco = $rs->getString($startcol + 2);

      $this->codciiu = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccacteco object", $e);
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
			$con = Propel::getConnection(CcactecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcactecoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcactecoPeer::DATABASE_NAME);
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
					$pk = CcactecoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcactecoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbenefis !== null) {
				foreach($this->collCcbenefis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdatsoecos !== null) {
				foreach($this->collCcdatsoecos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcfreacts !== null) {
				foreach($this->collCcfreacts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagters !== null) {
				foreach($this->collCcpagters as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcproyecs !== null) {
				foreach($this->collCcproyecs as $referrerFK) {
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


			if (($retval = CcactecoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbenefis !== null) {
					foreach($this->collCcbenefis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdatsoecos !== null) {
					foreach($this->collCcdatsoecos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcfreacts !== null) {
					foreach($this->collCcfreacts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagters !== null) {
					foreach($this->collCcpagters as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcproyecs !== null) {
					foreach($this->collCcproyecs as $referrerFK) {
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
		$pos = CcactecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomacteco();
				break;
			case 2:
				return $this->getDesacteco();
				break;
			case 3:
				return $this->getCodciiu();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcactecoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomacteco(),
			$keys[2] => $this->getDesacteco(),
			$keys[3] => $this->getCodciiu(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcactecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomacteco($value);
				break;
			case 2:
				$this->setDesacteco($value);
				break;
			case 3:
				$this->setCodciiu($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcactecoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomacteco($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesacteco($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodciiu($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcactecoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcactecoPeer::ID)) $criteria->add(CcactecoPeer::ID, $this->id);
		if ($this->isColumnModified(CcactecoPeer::NOMACTECO)) $criteria->add(CcactecoPeer::NOMACTECO, $this->nomacteco);
		if ($this->isColumnModified(CcactecoPeer::DESACTECO)) $criteria->add(CcactecoPeer::DESACTECO, $this->desacteco);
		if ($this->isColumnModified(CcactecoPeer::CODCIIU)) $criteria->add(CcactecoPeer::CODCIIU, $this->codciiu);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcactecoPeer::DATABASE_NAME);

		$criteria->add(CcactecoPeer::ID, $this->id);

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

		$copyObj->setNomacteco($this->nomacteco);

		$copyObj->setDesacteco($this->desacteco);

		$copyObj->setCodciiu($this->codciiu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbenefis() as $relObj) {
				$copyObj->addCcbenefi($relObj->copy($deepCopy));
			}

			foreach($this->getCcdatsoecos() as $relObj) {
				$copyObj->addCcdatsoeco($relObj->copy($deepCopy));
			}

			foreach($this->getCcfreacts() as $relObj) {
				$copyObj->addCcfreact($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagters() as $relObj) {
				$copyObj->addCcpagter($relObj->copy($deepCopy));
			}

			foreach($this->getCcproyecs() as $relObj) {
				$copyObj->addCcproyec($relObj->copy($deepCopy));
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
			self::$peer = new CcactecoPeer();
		}
		return self::$peer;
	}

	
	public function initCcbenefis()
	{
		if ($this->collCcbenefis === null) {
			$this->collCcbenefis = array();
		}
	}

	
	public function getCcbenefis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
			   $this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
					$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbenefiCriteria = $criteria;
		return $this->collCcbenefis;
	}

	
	public function countCcbenefis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

		return CcbenefiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbenefi(Ccbenefi $l)
	{
		$this->collCcbenefis[] = $l;
		$l->setCcacteco($this);
	}


	
	public function getCcbenefisJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcestciv($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcsececo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcorimatpri($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCccargo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcubiadm($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}

	
	public function initCcdatsoecos()
	{
		if ($this->collCcdatsoecos === null) {
			$this->collCcdatsoecos = array();
		}
	}

	
	public function getCcdatsoecos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
			   $this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

				CcdatsoecoPeer::addSelectColumns($criteria);
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

				CcdatsoecoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
					$this->collCcdatsoecos = CcdatsoecoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;
		return $this->collCcdatsoecos;
	}

	
	public function countCcdatsoecos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

		return CcdatsoecoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdatsoeco(Ccdatsoeco $l)
	{
		$this->collCcdatsoecos[] = $l;
		$l->setCcacteco($this);
	}


	
	public function getCcdatsoecosJoinCcorimatpri($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcestruc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcestruc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcestruc($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcriezona($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcriezona($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcriezona($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}

	
	public function initCcfreacts()
	{
		if ($this->collCcfreacts === null) {
			$this->collCcfreacts = array();
		}
	}

	
	public function getCcfreacts($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfreactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcfreacts === null) {
			if ($this->isNew()) {
			   $this->collCcfreacts = array();
			} else {

				$criteria->add(CcfreactPeer::CCACTECO_ID, $this->getId());

				CcfreactPeer::addSelectColumns($criteria);
				$this->collCcfreacts = CcfreactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcfreactPeer::CCACTECO_ID, $this->getId());

				CcfreactPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcfreactCriteria) || !$this->lastCcfreactCriteria->equals($criteria)) {
					$this->collCcfreacts = CcfreactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcfreactCriteria = $criteria;
		return $this->collCcfreacts;
	}

	
	public function countCcfreacts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfreactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcfreactPeer::CCACTECO_ID, $this->getId());

		return CcfreactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcfreact(Ccfreact $l)
	{
		$this->collCcfreacts[] = $l;
		$l->setCcacteco($this);
	}


	
	public function getCcfreactsJoinCcfreneco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfreactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcfreacts === null) {
			if ($this->isNew()) {
				$this->collCcfreacts = array();
			} else {

				$criteria->add(CcfreactPeer::CCACTECO_ID, $this->getId());

				$this->collCcfreacts = CcfreactPeer::doSelectJoinCcfreneco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcfreactPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcfreactCriteria) || !$this->lastCcfreactCriteria->equals($criteria)) {
				$this->collCcfreacts = CcfreactPeer::doSelectJoinCcfreneco($criteria, $con);
			}
		}
		$this->lastCcfreactCriteria = $criteria;

		return $this->collCcfreacts;
	}

	
	public function initCcpagters()
	{
		if ($this->collCcpagters === null) {
			$this->collCcpagters = array();
		}
	}

	
	public function getCcpagters($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
			   $this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

				CcpagterPeer::addSelectColumns($criteria);
				$this->collCcpagters = CcpagterPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

				CcpagterPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
					$this->collCcpagters = CcpagterPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagterCriteria = $criteria;
		return $this->collCcpagters;
	}

	
	public function countCcpagters($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

		return CcpagterPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpagter(Ccpagter $l)
	{
		$this->collCcpagters[] = $l;
		$l->setCcacteco($this);
	}


	
	public function getCcpagtersJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}


	
	public function getCcpagtersJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}


	
	public function getCcpagtersJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}

	
	public function initCcproyecs()
	{
		if ($this->collCcproyecs === null) {
			$this->collCcproyecs = array();
		}
	}

	
	public function getCcproyecs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcproyecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcproyecs === null) {
			if ($this->isNew()) {
			   $this->collCcproyecs = array();
			} else {

				$criteria->add(CcproyecPeer::CCACTECO_ID, $this->getId());

				CcproyecPeer::addSelectColumns($criteria);
				$this->collCcproyecs = CcproyecPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcproyecPeer::CCACTECO_ID, $this->getId());

				CcproyecPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcproyecCriteria) || !$this->lastCcproyecCriteria->equals($criteria)) {
					$this->collCcproyecs = CcproyecPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcproyecCriteria = $criteria;
		return $this->collCcproyecs;
	}

	
	public function countCcproyecs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcproyecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcproyecPeer::CCACTECO_ID, $this->getId());

		return CcproyecPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcproyec(Ccproyec $l)
	{
		$this->collCcproyecs[] = $l;
		$l->setCcacteco($this);
	}


	
	public function getCcproyecsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcproyecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcproyecs === null) {
			if ($this->isNew()) {
				$this->collCcproyecs = array();
			} else {

				$criteria->add(CcproyecPeer::CCACTECO_ID, $this->getId());

				$this->collCcproyecs = CcproyecPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcproyecPeer::CCACTECO_ID, $this->getId());

			if (!isset($this->lastCcproyecCriteria) || !$this->lastCcproyecCriteria->equals($criteria)) {
				$this->collCcproyecs = CcproyecPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcproyecCriteria = $criteria;

		return $this->collCcproyecs;
	}

} 