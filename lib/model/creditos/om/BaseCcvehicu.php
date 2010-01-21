<?php


abstract class BaseCcvehicu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomveh;


	
	protected $marca;


	
	protected $anoveh;


	
	protected $placa;

	
	protected $collCcpolizas;

	
	protected $lastCcpolizaCriteria = null;

	
	protected $collCcvehcreparcons;

	
	protected $lastCcvehcreparconCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomveh()
  {

    return trim($this->nomveh);

  }
  
  public function getMarca()
  {

    return trim($this->marca);

  }
  
  public function getAnoveh()
  {

    return $this->anoveh;

  }
  
  public function getPlaca()
  {

    return trim($this->placa);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcvehicuPeer::ID;
      }
  
	} 
	
	public function setNomveh($v)
	{

    if ($this->nomveh !== $v) {
        $this->nomveh = $v;
        $this->modifiedColumns[] = CcvehicuPeer::NOMVEH;
      }
  
	} 
	
	public function setMarca($v)
	{

    if ($this->marca !== $v) {
        $this->marca = $v;
        $this->modifiedColumns[] = CcvehicuPeer::MARCA;
      }
  
	} 
	
	public function setAnoveh($v)
	{

    if ($this->anoveh !== $v) {
        $this->anoveh = $v;
        $this->modifiedColumns[] = CcvehicuPeer::ANOVEH;
      }
  
	} 
	
	public function setPlaca($v)
	{

    if ($this->placa !== $v) {
        $this->placa = $v;
        $this->modifiedColumns[] = CcvehicuPeer::PLACA;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomveh = $rs->getString($startcol + 1);

      $this->marca = $rs->getString($startcol + 2);

      $this->anoveh = $rs->getInt($startcol + 3);

      $this->placa = $rs->getString($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccvehicu object", $e);
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
			$con = Propel::getConnection(CcvehicuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcvehicuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcvehicuPeer::DATABASE_NAME);
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
					$pk = CcvehicuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcvehicuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcpolizas !== null) {
				foreach($this->collCcpolizas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcvehcreparcons !== null) {
				foreach($this->collCcvehcreparcons as $referrerFK) {
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


			if (($retval = CcvehicuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcpolizas !== null) {
					foreach($this->collCcpolizas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcvehcreparcons !== null) {
					foreach($this->collCcvehcreparcons as $referrerFK) {
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
		$pos = CcvehicuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomveh();
				break;
			case 2:
				return $this->getMarca();
				break;
			case 3:
				return $this->getAnoveh();
				break;
			case 4:
				return $this->getPlaca();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvehicuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomveh(),
			$keys[2] => $this->getMarca(),
			$keys[3] => $this->getAnoveh(),
			$keys[4] => $this->getPlaca(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcvehicuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomveh($value);
				break;
			case 2:
				$this->setMarca($value);
				break;
			case 3:
				$this->setAnoveh($value);
				break;
			case 4:
				$this->setPlaca($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvehicuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomveh($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMarca($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnoveh($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPlaca($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcvehicuPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcvehicuPeer::ID)) $criteria->add(CcvehicuPeer::ID, $this->id);
		if ($this->isColumnModified(CcvehicuPeer::NOMVEH)) $criteria->add(CcvehicuPeer::NOMVEH, $this->nomveh);
		if ($this->isColumnModified(CcvehicuPeer::MARCA)) $criteria->add(CcvehicuPeer::MARCA, $this->marca);
		if ($this->isColumnModified(CcvehicuPeer::ANOVEH)) $criteria->add(CcvehicuPeer::ANOVEH, $this->anoveh);
		if ($this->isColumnModified(CcvehicuPeer::PLACA)) $criteria->add(CcvehicuPeer::PLACA, $this->placa);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcvehicuPeer::DATABASE_NAME);

		$criteria->add(CcvehicuPeer::ID, $this->id);

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

		$copyObj->setNomveh($this->nomveh);

		$copyObj->setMarca($this->marca);

		$copyObj->setAnoveh($this->anoveh);

		$copyObj->setPlaca($this->placa);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcpolizas() as $relObj) {
				$copyObj->addCcpoliza($relObj->copy($deepCopy));
			}

			foreach($this->getCcvehcreparcons() as $relObj) {
				$copyObj->addCcvehcreparcon($relObj->copy($deepCopy));
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
			self::$peer = new CcvehicuPeer();
		}
		return self::$peer;
	}

	
	public function initCcpolizas()
	{
		if ($this->collCcpolizas === null) {
			$this->collCcpolizas = array();
		}
	}

	
	public function getCcpolizas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpolizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpolizas === null) {
			if ($this->isNew()) {
			   $this->collCcpolizas = array();
			} else {

				$criteria->add(CcpolizaPeer::CCVEHICU_ID, $this->getId());

				CcpolizaPeer::addSelectColumns($criteria);
				$this->collCcpolizas = CcpolizaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpolizaPeer::CCVEHICU_ID, $this->getId());

				CcpolizaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpolizaCriteria) || !$this->lastCcpolizaCriteria->equals($criteria)) {
					$this->collCcpolizas = CcpolizaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpolizaCriteria = $criteria;
		return $this->collCcpolizas;
	}

	
	public function countCcpolizas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpolizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpolizaPeer::CCVEHICU_ID, $this->getId());

		return CcpolizaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpoliza(Ccpoliza $l)
	{
		$this->collCcpolizas[] = $l;
		$l->setCcvehicu($this);
	}

	
	public function initCcvehcreparcons()
	{
		if ($this->collCcvehcreparcons === null) {
			$this->collCcvehcreparcons = array();
		}
	}

	
	public function getCcvehcreparcons($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvehcreparconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvehcreparcons === null) {
			if ($this->isNew()) {
			   $this->collCcvehcreparcons = array();
			} else {

				$criteria->add(CcvehcreparconPeer::CCVEHICU_ID, $this->getId());

				CcvehcreparconPeer::addSelectColumns($criteria);
				$this->collCcvehcreparcons = CcvehcreparconPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcvehcreparconPeer::CCVEHICU_ID, $this->getId());

				CcvehcreparconPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcvehcreparconCriteria) || !$this->lastCcvehcreparconCriteria->equals($criteria)) {
					$this->collCcvehcreparcons = CcvehcreparconPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcvehcreparconCriteria = $criteria;
		return $this->collCcvehcreparcons;
	}

	
	public function countCcvehcreparcons($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvehcreparconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcvehcreparconPeer::CCVEHICU_ID, $this->getId());

		return CcvehcreparconPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcvehcreparcon(Ccvehcreparcon $l)
	{
		$this->collCcvehcreparcons[] = $l;
		$l->setCcvehicu($this);
	}


	
	public function getCcvehcreparconsJoinCcparcrecon($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvehcreparconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvehcreparcons === null) {
			if ($this->isNew()) {
				$this->collCcvehcreparcons = array();
			} else {

				$criteria->add(CcvehcreparconPeer::CCVEHICU_ID, $this->getId());

				$this->collCcvehcreparcons = CcvehcreparconPeer::doSelectJoinCcparcrecon($criteria, $con);
			}
		} else {
									
			$criteria->add(CcvehcreparconPeer::CCVEHICU_ID, $this->getId());

			if (!isset($this->lastCcvehcreparconCriteria) || !$this->lastCcvehcreparconCriteria->equals($criteria)) {
				$this->collCcvehcreparcons = CcvehcreparconPeer::doSelectJoinCcparcrecon($criteria, $con);
			}
		}
		$this->lastCcvehcreparconCriteria = $criteria;

		return $this->collCcvehcreparcons;
	}

} 