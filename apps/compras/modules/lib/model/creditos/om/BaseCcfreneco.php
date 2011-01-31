<?php


abstract class BaseCcfreneco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomfre;


	
	protected $desfre;

	
	protected $collCcfreacts;

	
	protected $lastCcfreactCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomfre()
  {

    return trim($this->nomfre);

  }
  
  public function getDesfre()
  {

    return trim($this->desfre);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcfrenecoPeer::ID;
      }
  
	} 
	
	public function setNomfre($v)
	{

    if ($this->nomfre !== $v) {
        $this->nomfre = $v;
        $this->modifiedColumns[] = CcfrenecoPeer::NOMFRE;
      }
  
	} 
	
	public function setDesfre($v)
	{

    if ($this->desfre !== $v) {
        $this->desfre = $v;
        $this->modifiedColumns[] = CcfrenecoPeer::DESFRE;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomfre = $rs->getString($startcol + 1);

      $this->desfre = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccfreneco object", $e);
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
			$con = Propel::getConnection(CcfrenecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcfrenecoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcfrenecoPeer::DATABASE_NAME);
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
					$pk = CcfrenecoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcfrenecoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcfreacts !== null) {
				foreach($this->collCcfreacts as $referrerFK) {
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


			if (($retval = CcfrenecoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcfreacts !== null) {
					foreach($this->collCcfreacts as $referrerFK) {
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
		$pos = CcfrenecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomfre();
				break;
			case 2:
				return $this->getDesfre();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfrenecoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomfre(),
			$keys[2] => $this->getDesfre(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcfrenecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomfre($value);
				break;
			case 2:
				$this->setDesfre($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcfrenecoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomfre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesfre($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcfrenecoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcfrenecoPeer::ID)) $criteria->add(CcfrenecoPeer::ID, $this->id);
		if ($this->isColumnModified(CcfrenecoPeer::NOMFRE)) $criteria->add(CcfrenecoPeer::NOMFRE, $this->nomfre);
		if ($this->isColumnModified(CcfrenecoPeer::DESFRE)) $criteria->add(CcfrenecoPeer::DESFRE, $this->desfre);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcfrenecoPeer::DATABASE_NAME);

		$criteria->add(CcfrenecoPeer::ID, $this->id);

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

		$copyObj->setNomfre($this->nomfre);

		$copyObj->setDesfre($this->desfre);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcfreacts() as $relObj) {
				$copyObj->addCcfreact($relObj->copy($deepCopy));
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
			self::$peer = new CcfrenecoPeer();
		}
		return self::$peer;
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

				$criteria->add(CcfreactPeer::CCFRENECO_ID, $this->getId());

				CcfreactPeer::addSelectColumns($criteria);
				$this->collCcfreacts = CcfreactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcfreactPeer::CCFRENECO_ID, $this->getId());

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

		$criteria->add(CcfreactPeer::CCFRENECO_ID, $this->getId());

		return CcfreactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcfreact(Ccfreact $l)
	{
		$this->collCcfreacts[] = $l;
		$l->setCcfreneco($this);
	}


	
	public function getCcfreactsJoinCcacteco($criteria = null, $con = null)
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

				$criteria->add(CcfreactPeer::CCFRENECO_ID, $this->getId());

				$this->collCcfreacts = CcfreactPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcfreactPeer::CCFRENECO_ID, $this->getId());

			if (!isset($this->lastCcfreactCriteria) || !$this->lastCcfreactCriteria->equals($criteria)) {
				$this->collCcfreacts = CcfreactPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcfreactCriteria = $criteria;

		return $this->collCcfreacts;
	}

} 