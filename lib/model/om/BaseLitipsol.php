<?php


abstract class BaseLitipsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dessol;


	
	protected $tipsol;


	
	protected $maxdia;


	
	protected $stasol;


	
	protected $id;

	
	protected $collLiregsols;

	
	protected $lastLiregsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getTipsol()
  {

    return trim($this->tipsol);

  }
  
  public function getMaxdia()
  {

    return trim($this->maxdia);

  }
  
  public function getStasol()
  {

    return trim($this->stasol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = LitipsolPeer::DESSOL;
      }
  
	} 
	
	public function setTipsol($v)
	{

    if ($this->tipsol !== $v) {
        $this->tipsol = $v;
        $this->modifiedColumns[] = LitipsolPeer::TIPSOL;
      }
  
	} 
	
	public function setMaxdia($v)
	{

    if ($this->maxdia !== $v) {
        $this->maxdia = $v;
        $this->modifiedColumns[] = LitipsolPeer::MAXDIA;
      }
  
	} 
	
	public function setStasol($v)
	{

    if ($this->stasol !== $v) {
        $this->stasol = $v;
        $this->modifiedColumns[] = LitipsolPeer::STASOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitipsolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->dessol = $rs->getString($startcol + 0);

      $this->tipsol = $rs->getString($startcol + 1);

      $this->maxdia = $rs->getString($startcol + 2);

      $this->stasol = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litipsol object", $e);
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
			$con = Propel::getConnection(LitipsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitipsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitipsolPeer::DATABASE_NAME);
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
					$pk = LitipsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitipsolPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregsols !== null) {
				foreach($this->collLiregsols as $referrerFK) {
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


			if (($retval = LitipsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregsols !== null) {
					foreach($this->collLiregsols as $referrerFK) {
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
		$pos = LitipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDessol();
				break;
			case 1:
				return $this->getTipsol();
				break;
			case 2:
				return $this->getMaxdia();
				break;
			case 3:
				return $this->getStasol();
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
		$keys = LitipsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDessol(),
			$keys[1] => $this->getTipsol(),
			$keys[2] => $this->getMaxdia(),
			$keys[3] => $this->getStasol(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDessol($value);
				break;
			case 1:
				$this->setTipsol($value);
				break;
			case 2:
				$this->setMaxdia($value);
				break;
			case 3:
				$this->setStasol($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitipsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDessol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMaxdia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStasol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitipsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(LitipsolPeer::DESSOL)) $criteria->add(LitipsolPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(LitipsolPeer::TIPSOL)) $criteria->add(LitipsolPeer::TIPSOL, $this->tipsol);
		if ($this->isColumnModified(LitipsolPeer::MAXDIA)) $criteria->add(LitipsolPeer::MAXDIA, $this->maxdia);
		if ($this->isColumnModified(LitipsolPeer::STASOL)) $criteria->add(LitipsolPeer::STASOL, $this->stasol);
		if ($this->isColumnModified(LitipsolPeer::ID)) $criteria->add(LitipsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitipsolPeer::DATABASE_NAME);

		$criteria->add(LitipsolPeer::ID, $this->id);

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

		$copyObj->setDessol($this->dessol);

		$copyObj->setTipsol($this->tipsol);

		$copyObj->setMaxdia($this->maxdia);

		$copyObj->setStasol($this->stasol);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiregsols() as $relObj) {
				$copyObj->addLiregsol($relObj->copy($deepCopy));
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
			self::$peer = new LitipsolPeer();
		}
		return self::$peer;
	}

	
	public function initLiregsols()
	{
		if ($this->collLiregsols === null) {
			$this->collLiregsols = array();
		}
	}

	
	public function getLiregsols($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregsols === null) {
			if ($this->isNew()) {
			   $this->collLiregsols = array();
			} else {

				$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

				LiregsolPeer::addSelectColumns($criteria);
				$this->collLiregsols = LiregsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

				LiregsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
					$this->collLiregsols = LiregsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregsolCriteria = $criteria;
		return $this->collLiregsols;
	}

	
	public function countLiregsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

		return LiregsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregsol(Liregsol $l)
	{
		$this->collLiregsols[] = $l;
		$l->setLitipsol($this);
	}


	
	public function getLiregsolsJoinLidatste($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregsols === null) {
			if ($this->isNew()) {
				$this->collLiregsols = array();
			} else {

				$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

				$this->collLiregsols = LiregsolPeer::doSelectJoinLidatste($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

			if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
				$this->collLiregsols = LiregsolPeer::doSelectJoinLidatste($criteria, $con);
			}
		}
		$this->lastLiregsolCriteria = $criteria;

		return $this->collLiregsols;
	}


	
	public function getLiregsolsJoinLicomlic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiregsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregsols === null) {
			if ($this->isNew()) {
				$this->collLiregsols = array();
			} else {

				$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

				$this->collLiregsols = LiregsolPeer::doSelectJoinLicomlic($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregsolPeer::LITIPSOL_ID, $this->getId());

			if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
				$this->collLiregsols = LiregsolPeer::doSelectJoinLicomlic($criteria, $con);
			}
		}
		$this->lastLiregsolCriteria = $criteria;

		return $this->collLiregsols;
	}

} 