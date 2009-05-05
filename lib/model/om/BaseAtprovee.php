<?php


abstract class BaseAtprovee extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nompro;


	
	protected $rifpro;


	
	protected $nitpro;


	
	protected $dirpro;


	
	protected $telpro;


	
	protected $id;

	
	protected $collAtpresupuestosRelatedByAtprovee1;

	
	protected $lastAtpresupuestoRelatedByAtprovee1Criteria = null;

	
	protected $collAtpresupuestosRelatedByAtprovee2;

	
	protected $lastAtpresupuestoRelatedByAtprovee2Criteria = null;

	
	protected $collAtpresupuestosRelatedByAtprovee3;

	
	protected $lastAtpresupuestoRelatedByAtprovee3Criteria = null;

	
	protected $collAtpresupuestosRelatedByAtprovee4;

	
	protected $lastAtpresupuestoRelatedByAtprovee4Criteria = null;

	
	protected $collAtpresupuestosRelatedByAtprovee5;

	
	protected $lastAtpresupuestoRelatedByAtprovee5Criteria = null;

	
	protected $collAtpresupuestosRelatedByAtprovee6;

	
	protected $lastAtpresupuestoRelatedByAtprovee6Criteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getNitpro()
  {

    return trim($this->nitpro);

  }
  
  public function getDirpro()
  {

    return trim($this->dirpro);

  }
  
  public function getTelpro()
  {

    return trim($this->telpro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = AtproveePeer::NOMPRO;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = AtproveePeer::RIFPRO;
      }
  
	} 
	
	public function setNitpro($v)
	{

    if ($this->nitpro !== $v) {
        $this->nitpro = $v;
        $this->modifiedColumns[] = AtproveePeer::NITPRO;
      }
  
	} 
	
	public function setDirpro($v)
	{

    if ($this->dirpro !== $v) {
        $this->dirpro = $v;
        $this->modifiedColumns[] = AtproveePeer::DIRPRO;
      }
  
	} 
	
	public function setTelpro($v)
	{

    if ($this->telpro !== $v) {
        $this->telpro = $v;
        $this->modifiedColumns[] = AtproveePeer::TELPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtproveePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nompro = $rs->getString($startcol + 0);

      $this->rifpro = $rs->getString($startcol + 1);

      $this->nitpro = $rs->getString($startcol + 2);

      $this->dirpro = $rs->getString($startcol + 3);

      $this->telpro = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atprovee object", $e);
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
			$con = Propel::getConnection(AtproveePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtproveePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtproveePeer::DATABASE_NAME);
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
					$pk = AtproveePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtproveePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtpresupuestosRelatedByAtprovee1 !== null) {
				foreach($this->collAtpresupuestosRelatedByAtprovee1 as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtpresupuestosRelatedByAtprovee2 !== null) {
				foreach($this->collAtpresupuestosRelatedByAtprovee2 as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtpresupuestosRelatedByAtprovee3 !== null) {
				foreach($this->collAtpresupuestosRelatedByAtprovee3 as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtpresupuestosRelatedByAtprovee4 !== null) {
				foreach($this->collAtpresupuestosRelatedByAtprovee4 as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtpresupuestosRelatedByAtprovee5 !== null) {
				foreach($this->collAtpresupuestosRelatedByAtprovee5 as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtpresupuestosRelatedByAtprovee6 !== null) {
				foreach($this->collAtpresupuestosRelatedByAtprovee6 as $referrerFK) {
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


			if (($retval = AtproveePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtpresupuestosRelatedByAtprovee1 !== null) {
					foreach($this->collAtpresupuestosRelatedByAtprovee1 as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtpresupuestosRelatedByAtprovee2 !== null) {
					foreach($this->collAtpresupuestosRelatedByAtprovee2 as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtpresupuestosRelatedByAtprovee3 !== null) {
					foreach($this->collAtpresupuestosRelatedByAtprovee3 as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtpresupuestosRelatedByAtprovee4 !== null) {
					foreach($this->collAtpresupuestosRelatedByAtprovee4 as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtpresupuestosRelatedByAtprovee5 !== null) {
					foreach($this->collAtpresupuestosRelatedByAtprovee5 as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtpresupuestosRelatedByAtprovee6 !== null) {
					foreach($this->collAtpresupuestosRelatedByAtprovee6 as $referrerFK) {
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
		$pos = AtproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNompro();
				break;
			case 1:
				return $this->getRifpro();
				break;
			case 2:
				return $this->getNitpro();
				break;
			case 3:
				return $this->getDirpro();
				break;
			case 4:
				return $this->getTelpro();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtproveePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNompro(),
			$keys[1] => $this->getRifpro(),
			$keys[2] => $this->getNitpro(),
			$keys[3] => $this->getDirpro(),
			$keys[4] => $this->getTelpro(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNompro($value);
				break;
			case 1:
				$this->setRifpro($value);
				break;
			case 2:
				$this->setNitpro($value);
				break;
			case 3:
				$this->setDirpro($value);
				break;
			case 4:
				$this->setTelpro($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtproveePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNompro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNitpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtproveePeer::DATABASE_NAME);

		if ($this->isColumnModified(AtproveePeer::NOMPRO)) $criteria->add(AtproveePeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(AtproveePeer::RIFPRO)) $criteria->add(AtproveePeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(AtproveePeer::NITPRO)) $criteria->add(AtproveePeer::NITPRO, $this->nitpro);
		if ($this->isColumnModified(AtproveePeer::DIRPRO)) $criteria->add(AtproveePeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(AtproveePeer::TELPRO)) $criteria->add(AtproveePeer::TELPRO, $this->telpro);
		if ($this->isColumnModified(AtproveePeer::ID)) $criteria->add(AtproveePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtproveePeer::DATABASE_NAME);

		$criteria->add(AtproveePeer::ID, $this->id);

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

		$copyObj->setNompro($this->nompro);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setNitpro($this->nitpro);

		$copyObj->setDirpro($this->dirpro);

		$copyObj->setTelpro($this->telpro);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtpresupuestosRelatedByAtprovee1() as $relObj) {
				$copyObj->addAtpresupuestoRelatedByAtprovee1($relObj->copy($deepCopy));
			}

			foreach($this->getAtpresupuestosRelatedByAtprovee2() as $relObj) {
				$copyObj->addAtpresupuestoRelatedByAtprovee2($relObj->copy($deepCopy));
			}

			foreach($this->getAtpresupuestosRelatedByAtprovee3() as $relObj) {
				$copyObj->addAtpresupuestoRelatedByAtprovee3($relObj->copy($deepCopy));
			}

			foreach($this->getAtpresupuestosRelatedByAtprovee4() as $relObj) {
				$copyObj->addAtpresupuestoRelatedByAtprovee4($relObj->copy($deepCopy));
			}

			foreach($this->getAtpresupuestosRelatedByAtprovee5() as $relObj) {
				$copyObj->addAtpresupuestoRelatedByAtprovee5($relObj->copy($deepCopy));
			}

			foreach($this->getAtpresupuestosRelatedByAtprovee6() as $relObj) {
				$copyObj->addAtpresupuestoRelatedByAtprovee6($relObj->copy($deepCopy));
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
			self::$peer = new AtproveePeer();
		}
		return self::$peer;
	}

	
	public function initAtpresupuestosRelatedByAtprovee1()
	{
		if ($this->collAtpresupuestosRelatedByAtprovee1 === null) {
			$this->collAtpresupuestosRelatedByAtprovee1 = array();
		}
	}

	
	public function getAtpresupuestosRelatedByAtprovee1($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee1 === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestosRelatedByAtprovee1 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE1, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestosRelatedByAtprovee1 = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATPROVEE1, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoRelatedByAtprovee1Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee1Criteria->equals($criteria)) {
					$this->collAtpresupuestosRelatedByAtprovee1 = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee1Criteria = $criteria;
		return $this->collAtpresupuestosRelatedByAtprovee1;
	}

	
	public function countAtpresupuestosRelatedByAtprovee1($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATPROVEE1, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuestoRelatedByAtprovee1(Atpresupuesto $l)
	{
		$this->collAtpresupuestosRelatedByAtprovee1[] = $l;
		$l->setAtproveeRelatedByAtprovee1($this);
	}


	
	public function getAtpresupuestosRelatedByAtprovee1JoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee1 === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestosRelatedByAtprovee1 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE1, $this->getId());

				$this->collAtpresupuestosRelatedByAtprovee1 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATPROVEE1, $this->getId());

			if (!isset($this->lastAtpresupuestoRelatedByAtprovee1Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee1Criteria->equals($criteria)) {
				$this->collAtpresupuestosRelatedByAtprovee1 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee1Criteria = $criteria;

		return $this->collAtpresupuestosRelatedByAtprovee1;
	}

	
	public function initAtpresupuestosRelatedByAtprovee2()
	{
		if ($this->collAtpresupuestosRelatedByAtprovee2 === null) {
			$this->collAtpresupuestosRelatedByAtprovee2 = array();
		}
	}

	
	public function getAtpresupuestosRelatedByAtprovee2($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee2 === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestosRelatedByAtprovee2 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE2, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestosRelatedByAtprovee2 = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATPROVEE2, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoRelatedByAtprovee2Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee2Criteria->equals($criteria)) {
					$this->collAtpresupuestosRelatedByAtprovee2 = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee2Criteria = $criteria;
		return $this->collAtpresupuestosRelatedByAtprovee2;
	}

	
	public function countAtpresupuestosRelatedByAtprovee2($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATPROVEE2, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuestoRelatedByAtprovee2(Atpresupuesto $l)
	{
		$this->collAtpresupuestosRelatedByAtprovee2[] = $l;
		$l->setAtproveeRelatedByAtprovee2($this);
	}


	
	public function getAtpresupuestosRelatedByAtprovee2JoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee2 === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestosRelatedByAtprovee2 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE2, $this->getId());

				$this->collAtpresupuestosRelatedByAtprovee2 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATPROVEE2, $this->getId());

			if (!isset($this->lastAtpresupuestoRelatedByAtprovee2Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee2Criteria->equals($criteria)) {
				$this->collAtpresupuestosRelatedByAtprovee2 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee2Criteria = $criteria;

		return $this->collAtpresupuestosRelatedByAtprovee2;
	}

	
	public function initAtpresupuestosRelatedByAtprovee3()
	{
		if ($this->collAtpresupuestosRelatedByAtprovee3 === null) {
			$this->collAtpresupuestosRelatedByAtprovee3 = array();
		}
	}

	
	public function getAtpresupuestosRelatedByAtprovee3($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee3 === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestosRelatedByAtprovee3 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE3, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestosRelatedByAtprovee3 = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATPROVEE3, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoRelatedByAtprovee3Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee3Criteria->equals($criteria)) {
					$this->collAtpresupuestosRelatedByAtprovee3 = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee3Criteria = $criteria;
		return $this->collAtpresupuestosRelatedByAtprovee3;
	}

	
	public function countAtpresupuestosRelatedByAtprovee3($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATPROVEE3, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuestoRelatedByAtprovee3(Atpresupuesto $l)
	{
		$this->collAtpresupuestosRelatedByAtprovee3[] = $l;
		$l->setAtproveeRelatedByAtprovee3($this);
	}


	
	public function getAtpresupuestosRelatedByAtprovee3JoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee3 === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestosRelatedByAtprovee3 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE3, $this->getId());

				$this->collAtpresupuestosRelatedByAtprovee3 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATPROVEE3, $this->getId());

			if (!isset($this->lastAtpresupuestoRelatedByAtprovee3Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee3Criteria->equals($criteria)) {
				$this->collAtpresupuestosRelatedByAtprovee3 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee3Criteria = $criteria;

		return $this->collAtpresupuestosRelatedByAtprovee3;
	}

	
	public function initAtpresupuestosRelatedByAtprovee4()
	{
		if ($this->collAtpresupuestosRelatedByAtprovee4 === null) {
			$this->collAtpresupuestosRelatedByAtprovee4 = array();
		}
	}

	
	public function getAtpresupuestosRelatedByAtprovee4($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee4 === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestosRelatedByAtprovee4 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE4, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestosRelatedByAtprovee4 = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATPROVEE4, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoRelatedByAtprovee4Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee4Criteria->equals($criteria)) {
					$this->collAtpresupuestosRelatedByAtprovee4 = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee4Criteria = $criteria;
		return $this->collAtpresupuestosRelatedByAtprovee4;
	}

	
	public function countAtpresupuestosRelatedByAtprovee4($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATPROVEE4, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuestoRelatedByAtprovee4(Atpresupuesto $l)
	{
		$this->collAtpresupuestosRelatedByAtprovee4[] = $l;
		$l->setAtproveeRelatedByAtprovee4($this);
	}


	
	public function getAtpresupuestosRelatedByAtprovee4JoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee4 === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestosRelatedByAtprovee4 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE4, $this->getId());

				$this->collAtpresupuestosRelatedByAtprovee4 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATPROVEE4, $this->getId());

			if (!isset($this->lastAtpresupuestoRelatedByAtprovee4Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee4Criteria->equals($criteria)) {
				$this->collAtpresupuestosRelatedByAtprovee4 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee4Criteria = $criteria;

		return $this->collAtpresupuestosRelatedByAtprovee4;
	}

	
	public function initAtpresupuestosRelatedByAtprovee5()
	{
		if ($this->collAtpresupuestosRelatedByAtprovee5 === null) {
			$this->collAtpresupuestosRelatedByAtprovee5 = array();
		}
	}

	
	public function getAtpresupuestosRelatedByAtprovee5($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee5 === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestosRelatedByAtprovee5 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE5, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestosRelatedByAtprovee5 = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATPROVEE5, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoRelatedByAtprovee5Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee5Criteria->equals($criteria)) {
					$this->collAtpresupuestosRelatedByAtprovee5 = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee5Criteria = $criteria;
		return $this->collAtpresupuestosRelatedByAtprovee5;
	}

	
	public function countAtpresupuestosRelatedByAtprovee5($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATPROVEE5, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuestoRelatedByAtprovee5(Atpresupuesto $l)
	{
		$this->collAtpresupuestosRelatedByAtprovee5[] = $l;
		$l->setAtproveeRelatedByAtprovee5($this);
	}


	
	public function getAtpresupuestosRelatedByAtprovee5JoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee5 === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestosRelatedByAtprovee5 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE5, $this->getId());

				$this->collAtpresupuestosRelatedByAtprovee5 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATPROVEE5, $this->getId());

			if (!isset($this->lastAtpresupuestoRelatedByAtprovee5Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee5Criteria->equals($criteria)) {
				$this->collAtpresupuestosRelatedByAtprovee5 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee5Criteria = $criteria;

		return $this->collAtpresupuestosRelatedByAtprovee5;
	}

	
	public function initAtpresupuestosRelatedByAtprovee6()
	{
		if ($this->collAtpresupuestosRelatedByAtprovee6 === null) {
			$this->collAtpresupuestosRelatedByAtprovee6 = array();
		}
	}

	
	public function getAtpresupuestosRelatedByAtprovee6($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee6 === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestosRelatedByAtprovee6 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE6, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestosRelatedByAtprovee6 = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATPROVEE6, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoRelatedByAtprovee6Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee6Criteria->equals($criteria)) {
					$this->collAtpresupuestosRelatedByAtprovee6 = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee6Criteria = $criteria;
		return $this->collAtpresupuestosRelatedByAtprovee6;
	}

	
	public function countAtpresupuestosRelatedByAtprovee6($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATPROVEE6, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuestoRelatedByAtprovee6(Atpresupuesto $l)
	{
		$this->collAtpresupuestosRelatedByAtprovee6[] = $l;
		$l->setAtproveeRelatedByAtprovee6($this);
	}


	
	public function getAtpresupuestosRelatedByAtprovee6JoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestosRelatedByAtprovee6 === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestosRelatedByAtprovee6 = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATPROVEE6, $this->getId());

				$this->collAtpresupuestosRelatedByAtprovee6 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATPROVEE6, $this->getId());

			if (!isset($this->lastAtpresupuestoRelatedByAtprovee6Criteria) || !$this->lastAtpresupuestoRelatedByAtprovee6Criteria->equals($criteria)) {
				$this->collAtpresupuestosRelatedByAtprovee6 = AtpresupuestoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtpresupuestoRelatedByAtprovee6Criteria = $criteria;

		return $this->collAtpresupuestosRelatedByAtprovee6;
	}

} 