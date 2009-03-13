<?php


abstract class BaseLirecaud extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrec;


	
	protected $desrec;


	
	protected $requerido;


	
	protected $id;

	
	protected $collLiasplegcrievas;

	
	protected $lastLiasplegcrievaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getDesrec()
  {

    return trim($this->desrec);

  }
  
  public function getRequerido()
  {

    return trim($this->requerido);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = LirecaudPeer::CODREC;
      }
  
	} 
	
	public function setDesrec($v)
	{

    if ($this->desrec !== $v) {
        $this->desrec = $v;
        $this->modifiedColumns[] = LirecaudPeer::DESREC;
      }
  
	} 
	
	public function setRequerido($v)
	{

    if ($this->requerido !== $v) {
        $this->requerido = $v;
        $this->modifiedColumns[] = LirecaudPeer::REQUERIDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LirecaudPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrec = $rs->getString($startcol + 0);

      $this->desrec = $rs->getString($startcol + 1);

      $this->requerido = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lirecaud object", $e);
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
			$con = Propel::getConnection(LirecaudPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LirecaudPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LirecaudPeer::DATABASE_NAME);
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
					$pk = LirecaudPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LirecaudPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiasplegcrievas !== null) {
				foreach($this->collLiasplegcrievas as $referrerFK) {
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


			if (($retval = LirecaudPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiasplegcrievas !== null) {
					foreach($this->collLiasplegcrievas as $referrerFK) {
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
		$pos = LirecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrec();
				break;
			case 1:
				return $this->getDesrec();
				break;
			case 2:
				return $this->getRequerido();
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
		$keys = LirecaudPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrec(),
			$keys[1] => $this->getDesrec(),
			$keys[2] => $this->getRequerido(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LirecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrec($value);
				break;
			case 1:
				$this->setDesrec($value);
				break;
			case 2:
				$this->setRequerido($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LirecaudPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRequerido($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LirecaudPeer::DATABASE_NAME);

		if ($this->isColumnModified(LirecaudPeer::CODREC)) $criteria->add(LirecaudPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(LirecaudPeer::DESREC)) $criteria->add(LirecaudPeer::DESREC, $this->desrec);
		if ($this->isColumnModified(LirecaudPeer::REQUERIDO)) $criteria->add(LirecaudPeer::REQUERIDO, $this->requerido);
		if ($this->isColumnModified(LirecaudPeer::ID)) $criteria->add(LirecaudPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LirecaudPeer::DATABASE_NAME);

		$criteria->add(LirecaudPeer::ID, $this->id);

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

		$copyObj->setCodrec($this->codrec);

		$copyObj->setDesrec($this->desrec);

		$copyObj->setRequerido($this->requerido);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiasplegcrievas() as $relObj) {
				$copyObj->addLiasplegcrieva($relObj->copy($deepCopy));
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
			self::$peer = new LirecaudPeer();
		}
		return self::$peer;
	}

	
	public function initLiasplegcrievas()
	{
		if ($this->collLiasplegcrievas === null) {
			$this->collLiasplegcrievas = array();
		}
	}

	
	public function getLiasplegcrievas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasplegcrievaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasplegcrievas === null) {
			if ($this->isNew()) {
			   $this->collLiasplegcrievas = array();
			} else {

				$criteria->add(LiasplegcrievaPeer::LIRECAUD_ID, $this->getId());

				LiasplegcrievaPeer::addSelectColumns($criteria);
				$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiasplegcrievaPeer::LIRECAUD_ID, $this->getId());

				LiasplegcrievaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiasplegcrievaCriteria) || !$this->lastLiasplegcrievaCriteria->equals($criteria)) {
					$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiasplegcrievaCriteria = $criteria;
		return $this->collLiasplegcrievas;
	}

	
	public function countLiasplegcrievas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiasplegcrievaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiasplegcrievaPeer::LIRECAUD_ID, $this->getId());

		return LiasplegcrievaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiasplegcrieva(Liasplegcrieva $l)
	{
		$this->collLiasplegcrievas[] = $l;
		$l->setLirecaud($this);
	}


	
	public function getLiasplegcrievasJoinLireglic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasplegcrievaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasplegcrievas === null) {
			if ($this->isNew()) {
				$this->collLiasplegcrievas = array();
			} else {

				$criteria->add(LiasplegcrievaPeer::LIRECAUD_ID, $this->getId());

				$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelectJoinLireglic($criteria, $con);
			}
		} else {
									
			$criteria->add(LiasplegcrievaPeer::LIRECAUD_ID, $this->getId());

			if (!isset($this->lastLiasplegcrievaCriteria) || !$this->lastLiasplegcrievaCriteria->equals($criteria)) {
				$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelectJoinLireglic($criteria, $con);
			}
		}
		$this->lastLiasplegcrievaCriteria = $criteria;

		return $this->collLiasplegcrievas;
	}

} 