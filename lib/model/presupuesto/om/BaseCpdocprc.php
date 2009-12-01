<?php


abstract class BaseCpdocprc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipprc;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $id;

	
	protected $collCpprecoms;

	
	protected $lastCpprecomCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipprc()
  {

    return trim($this->tipprc);

  }
  
  public function getNomext()
  {

    return trim($this->nomext);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipprc($v)
	{

    if ($this->tipprc !== $v) {
        $this->tipprc = $v;
        $this->modifiedColumns[] = CpdocprcPeer::TIPPRC;
      }
  
	} 
	
	public function setNomext($v)
	{

    if ($this->nomext !== $v) {
        $this->nomext = $v;
        $this->modifiedColumns[] = CpdocprcPeer::NOMEXT;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = CpdocprcPeer::NOMABR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdocprcPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipprc = $rs->getString($startcol + 0);

      $this->nomext = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdocprc object", $e);
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
			$con = Propel::getConnection(CpdocprcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdocprcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdocprcPeer::DATABASE_NAME);
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
					$pk = CpdocprcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdocprcPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpprecoms !== null) {
				foreach($this->collCpprecoms as $referrerFK) {
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


			if (($retval = CpdocprcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpprecoms !== null) {
					foreach($this->collCpprecoms as $referrerFK) {
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
		$pos = CpdocprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipprc();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
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
		$keys = CpdocprcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipprc(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdocprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipprc($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdocprcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipprc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdocprcPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdocprcPeer::TIPPRC)) $criteria->add(CpdocprcPeer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(CpdocprcPeer::NOMEXT)) $criteria->add(CpdocprcPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CpdocprcPeer::NOMABR)) $criteria->add(CpdocprcPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpdocprcPeer::ID)) $criteria->add(CpdocprcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdocprcPeer::DATABASE_NAME);

		$criteria->add(CpdocprcPeer::ID, $this->id);

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

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpprecoms() as $relObj) {
				$copyObj->addCpprecom($relObj->copy($deepCopy));
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
			self::$peer = new CpdocprcPeer();
		}
		return self::$peer;
	}

	
	public function initCpprecoms()
	{
		if ($this->collCpprecoms === null) {
			$this->collCpprecoms = array();
		}
	}

	
	public function getCpprecoms($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpprecomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpprecoms === null) {
			if ($this->isNew()) {
			   $this->collCpprecoms = array();
			} else {

				$criteria->add(CpprecomPeer::TIPPRC, $this->getTipprc());

				CpprecomPeer::addSelectColumns($criteria);
				$this->collCpprecoms = CpprecomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpprecomPeer::TIPPRC, $this->getTipprc());

				CpprecomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpprecomCriteria) || !$this->lastCpprecomCriteria->equals($criteria)) {
					$this->collCpprecoms = CpprecomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpprecomCriteria = $criteria;
		return $this->collCpprecoms;
	}

	
	public function countCpprecoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpprecomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpprecomPeer::TIPPRC, $this->getTipprc());

		return CpprecomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpprecom(Cpprecom $l)
	{
		$this->collCpprecoms[] = $l;
		$l->setCpdocprc($this);
	}


	
	public function getCpprecomsJoinOpbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpprecomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpprecoms === null) {
			if ($this->isNew()) {
				$this->collCpprecoms = array();
			} else {

				$criteria->add(CpprecomPeer::TIPPRC, $this->getTipprc());

				$this->collCpprecoms = CpprecomPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CpprecomPeer::TIPPRC, $this->getTipprc());

			if (!isset($this->lastCpprecomCriteria) || !$this->lastCpprecomCriteria->equals($criteria)) {
				$this->collCpprecoms = CpprecomPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		}
		$this->lastCpprecomCriteria = $criteria;

		return $this->collCpprecoms;
	}

} 