<?php


abstract class BaseCatdefaval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddivgeo;


	
	protected $nrocas;


	
	protected $fecaval;


	
	protected $status;


	
	protected $id;

	
	protected $collCatdetavals;

	
	protected $lastCatdetavalCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddivgeo()
  {

    return trim($this->coddivgeo);

  }
  
  public function getNrocas()
  {

    return trim($this->nrocas);

  }
  
  public function getFecaval($format = 'Y-m-d')
  {

    if ($this->fecaval === null || $this->fecaval === '') {
      return null;
    } elseif (!is_int($this->fecaval)) {
            $ts = adodb_strtotime($this->fecaval);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaval] as date/time value: " . var_export($this->fecaval, true));
      }
    } else {
      $ts = $this->fecaval;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddivgeo($v)
	{

    if ($this->coddivgeo !== $v) {
        $this->coddivgeo = $v;
        $this->modifiedColumns[] = CatdefavalPeer::CODDIVGEO;
      }
  
	} 
	
	public function setNrocas($v)
	{

    if ($this->nrocas !== $v) {
        $this->nrocas = $v;
        $this->modifiedColumns[] = CatdefavalPeer::NROCAS;
      }
  
	} 
	
	public function setFecaval($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaval] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaval !== $ts) {
      $this->fecaval = $ts;
      $this->modifiedColumns[] = CatdefavalPeer::FECAVAL;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = CatdefavalPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatdefavalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddivgeo = $rs->getString($startcol + 0);

      $this->nrocas = $rs->getString($startcol + 1);

      $this->fecaval = $rs->getDate($startcol + 2, null);

      $this->status = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catdefaval object", $e);
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
			$con = Propel::getConnection(CatdefavalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatdefavalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatdefavalPeer::DATABASE_NAME);
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
					$pk = CatdefavalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatdefavalPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatdetavals !== null) {
				foreach($this->collCatdetavals as $referrerFK) {
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


			if (($retval = CatdefavalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatdetavals !== null) {
					foreach($this->collCatdetavals as $referrerFK) {
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
		$pos = CatdefavalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddivgeo();
				break;
			case 1:
				return $this->getNrocas();
				break;
			case 2:
				return $this->getFecaval();
				break;
			case 3:
				return $this->getStatus();
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
		$keys = CatdefavalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddivgeo(),
			$keys[1] => $this->getNrocas(),
			$keys[2] => $this->getFecaval(),
			$keys[3] => $this->getStatus(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatdefavalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddivgeo($value);
				break;
			case 1:
				$this->setNrocas($value);
				break;
			case 2:
				$this->setFecaval($value);
				break;
			case 3:
				$this->setStatus($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatdefavalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddivgeo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrocas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecaval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatdefavalPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatdefavalPeer::CODDIVGEO)) $criteria->add(CatdefavalPeer::CODDIVGEO, $this->coddivgeo);
		if ($this->isColumnModified(CatdefavalPeer::NROCAS)) $criteria->add(CatdefavalPeer::NROCAS, $this->nrocas);
		if ($this->isColumnModified(CatdefavalPeer::FECAVAL)) $criteria->add(CatdefavalPeer::FECAVAL, $this->fecaval);
		if ($this->isColumnModified(CatdefavalPeer::STATUS)) $criteria->add(CatdefavalPeer::STATUS, $this->status);
		if ($this->isColumnModified(CatdefavalPeer::ID)) $criteria->add(CatdefavalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatdefavalPeer::DATABASE_NAME);

		$criteria->add(CatdefavalPeer::ID, $this->id);

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

		$copyObj->setCoddivgeo($this->coddivgeo);

		$copyObj->setNrocas($this->nrocas);

		$copyObj->setFecaval($this->fecaval);

		$copyObj->setStatus($this->status);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatdetavals() as $relObj) {
				$copyObj->addCatdetaval($relObj->copy($deepCopy));
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
			self::$peer = new CatdefavalPeer();
		}
		return self::$peer;
	}

	
	public function initCatdetavals()
	{
		if ($this->collCatdetavals === null) {
			$this->collCatdetavals = array();
		}
	}

	
	public function getCatdetavals($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatdetavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatdetavals === null) {
			if ($this->isNew()) {
			   $this->collCatdetavals = array();
			} else {

				$criteria->add(CatdetavalPeer::CATDEFAVAL_ID, $this->getId());

				CatdetavalPeer::addSelectColumns($criteria);
				$this->collCatdetavals = CatdetavalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatdetavalPeer::CATDEFAVAL_ID, $this->getId());

				CatdetavalPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatdetavalCriteria) || !$this->lastCatdetavalCriteria->equals($criteria)) {
					$this->collCatdetavals = CatdetavalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatdetavalCriteria = $criteria;
		return $this->collCatdetavals;
	}

	
	public function countCatdetavals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatdetavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatdetavalPeer::CATDEFAVAL_ID, $this->getId());

		return CatdetavalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatdetaval(Catdetaval $l)
	{
		$this->collCatdetavals[] = $l;
		$l->setCatdefaval($this);
	}


	
	public function getCatdetavalsJoinCatusoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatdetavalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatdetavals === null) {
			if ($this->isNew()) {
				$this->collCatdetavals = array();
			} else {

				$criteria->add(CatdetavalPeer::CATDEFAVAL_ID, $this->getId());

				$this->collCatdetavals = CatdetavalPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CatdetavalPeer::CATDEFAVAL_ID, $this->getId());

			if (!isset($this->lastCatdetavalCriteria) || !$this->lastCatdetavalCriteria->equals($criteria)) {
				$this->collCatdetavals = CatdetavalPeer::doSelectJoinCatusoesp($criteria, $con);
			}
		}
		$this->lastCatdetavalCriteria = $criteria;

		return $this->collCatdetavals;
	}

} 