<?php


abstract class BaseLitiplic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $destiplic;


	
	protected $maxunitri;


	
	protected $artley;


	
	protected $id;

	
	protected $collLireglics;

	
	protected $lastLireglicCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDestiplic()
  {

    return trim($this->destiplic);

  }
  
  public function getMaxunitri($val=false)
  {

    if($val) return number_format($this->maxunitri,2,',','.');
    else return $this->maxunitri;

  }
  
  public function getArtley()
  {

    return trim($this->artley);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDestiplic($v)
	{

    if ($this->destiplic !== $v) {
        $this->destiplic = $v;
        $this->modifiedColumns[] = LitiplicPeer::DESTIPLIC;
      }
  
	} 
	
	public function setMaxunitri($v)
	{

    if ($this->maxunitri !== $v) {
        $this->maxunitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LitiplicPeer::MAXUNITRI;
      }
  
	} 
	
	public function setArtley($v)
	{

    if ($this->artley !== $v) {
        $this->artley = $v;
        $this->modifiedColumns[] = LitiplicPeer::ARTLEY;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitiplicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->destiplic = $rs->getString($startcol + 0);

      $this->maxunitri = $rs->getFloat($startcol + 1);

      $this->artley = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litiplic object", $e);
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
			$con = Propel::getConnection(LitiplicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitiplicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitiplicPeer::DATABASE_NAME);
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
					$pk = LitiplicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitiplicPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLireglics !== null) {
				foreach($this->collLireglics as $referrerFK) {
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


			if (($retval = LitiplicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLireglics !== null) {
					foreach($this->collLireglics as $referrerFK) {
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
		$pos = LitiplicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDestiplic();
				break;
			case 1:
				return $this->getMaxunitri();
				break;
			case 2:
				return $this->getArtley();
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
		$keys = LitiplicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDestiplic(),
			$keys[1] => $this->getMaxunitri(),
			$keys[2] => $this->getArtley(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitiplicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDestiplic($value);
				break;
			case 1:
				$this->setMaxunitri($value);
				break;
			case 2:
				$this->setArtley($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitiplicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDestiplic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMaxunitri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setArtley($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitiplicPeer::DATABASE_NAME);

		if ($this->isColumnModified(LitiplicPeer::DESTIPLIC)) $criteria->add(LitiplicPeer::DESTIPLIC, $this->destiplic);
		if ($this->isColumnModified(LitiplicPeer::MAXUNITRI)) $criteria->add(LitiplicPeer::MAXUNITRI, $this->maxunitri);
		if ($this->isColumnModified(LitiplicPeer::ARTLEY)) $criteria->add(LitiplicPeer::ARTLEY, $this->artley);
		if ($this->isColumnModified(LitiplicPeer::ID)) $criteria->add(LitiplicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitiplicPeer::DATABASE_NAME);

		$criteria->add(LitiplicPeer::ID, $this->id);

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

		$copyObj->setDestiplic($this->destiplic);

		$copyObj->setMaxunitri($this->maxunitri);

		$copyObj->setArtley($this->artley);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLireglics() as $relObj) {
				$copyObj->addLireglic($relObj->copy($deepCopy));
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
			self::$peer = new LitiplicPeer();
		}
		return self::$peer;
	}

	
	public function initLireglics()
	{
		if ($this->collLireglics === null) {
			$this->collLireglics = array();
		}
	}

	
	public function getLireglics($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
			   $this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
					$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLireglicCriteria = $criteria;
		return $this->collLireglics;
	}

	
	public function countLireglics($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

		return LireglicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLireglic(Lireglic $l)
	{
		$this->collLireglics[] = $l;
		$l->setLitiplic($this);
	}


	
	public function getLireglicsJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
				$this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

				$this->collLireglics = LireglicPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

			if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
				$this->collLireglics = LireglicPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLireglicCriteria = $criteria;

		return $this->collLireglics;
	}


	
	public function getLireglicsJoinLiregsol($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
				$this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

				$this->collLireglics = LireglicPeer::doSelectJoinLiregsol($criteria, $con);
			}
		} else {
									
			$criteria->add(LireglicPeer::LITIPLIC_ID, $this->getId());

			if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
				$this->collLireglics = LireglicPeer::doSelectJoinLiregsol($criteria, $con);
			}
		}
		$this->lastLireglicCriteria = $criteria;

		return $this->collLireglics;
	}

} 