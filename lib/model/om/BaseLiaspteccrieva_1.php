<?php


abstract class BaseLiaspteccrieva extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcri;


	
	protected $descri;


	
	protected $puntaje;


	
	protected $id;

	
	protected $collLiasptecanaliss;

	
	protected $lastLiasptecanalisCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcri()
  {

    return trim($this->codcri);

  }
  
  public function getDescri()
  {

    return trim($this->descri);

  }
  
  public function getPuntaje($val=false)
  {

    if($val) return number_format($this->puntaje,2,',','.');
    else return $this->puntaje;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcri($v)
	{

    if ($this->codcri !== $v) {
        $this->codcri = $v;
        $this->modifiedColumns[] = LiaspteccrievaPeer::CODCRI;
      }
  
	} 
	
	public function setDescri($v)
	{

    if ($this->descri !== $v) {
        $this->descri = $v;
        $this->modifiedColumns[] = LiaspteccrievaPeer::DESCRI;
      }
  
	} 
	
	public function setPuntaje($v)
	{

    if ($this->puntaje !== $v) {
        $this->puntaje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiaspteccrievaPeer::PUNTAJE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiaspteccrievaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcri = $rs->getString($startcol + 0);

      $this->descri = $rs->getString($startcol + 1);

      $this->puntaje = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liaspteccrieva object", $e);
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
			$con = Propel::getConnection(LiaspteccrievaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiaspteccrievaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiaspteccrievaPeer::DATABASE_NAME);
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
					$pk = LiaspteccrievaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiaspteccrievaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiasptecanaliss !== null) {
				foreach($this->collLiasptecanaliss as $referrerFK) {
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


			if (($retval = LiaspteccrievaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiasptecanaliss !== null) {
					foreach($this->collLiasptecanaliss as $referrerFK) {
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
		$pos = LiaspteccrievaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcri();
				break;
			case 1:
				return $this->getDescri();
				break;
			case 2:
				return $this->getPuntaje();
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
		$keys = LiaspteccrievaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcri(),
			$keys[1] => $this->getDescri(),
			$keys[2] => $this->getPuntaje(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiaspteccrievaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcri($value);
				break;
			case 1:
				$this->setDescri($value);
				break;
			case 2:
				$this->setPuntaje($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiaspteccrievaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcri($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPuntaje($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiaspteccrievaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiaspteccrievaPeer::CODCRI)) $criteria->add(LiaspteccrievaPeer::CODCRI, $this->codcri);
		if ($this->isColumnModified(LiaspteccrievaPeer::DESCRI)) $criteria->add(LiaspteccrievaPeer::DESCRI, $this->descri);
		if ($this->isColumnModified(LiaspteccrievaPeer::PUNTAJE)) $criteria->add(LiaspteccrievaPeer::PUNTAJE, $this->puntaje);
		if ($this->isColumnModified(LiaspteccrievaPeer::ID)) $criteria->add(LiaspteccrievaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiaspteccrievaPeer::DATABASE_NAME);

		$criteria->add(LiaspteccrievaPeer::ID, $this->id);

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

		$copyObj->setCodcri($this->codcri);

		$copyObj->setDescri($this->descri);

		$copyObj->setPuntaje($this->puntaje);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiasptecanaliss() as $relObj) {
				$copyObj->addLiasptecanalis($relObj->copy($deepCopy));
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
			self::$peer = new LiaspteccrievaPeer();
		}
		return self::$peer;
	}

	
	public function initLiasptecanaliss()
	{
		if ($this->collLiasptecanaliss === null) {
			$this->collLiasptecanaliss = array();
		}
	}

	
	public function getLiasptecanaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasptecanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasptecanaliss === null) {
			if ($this->isNew()) {
			   $this->collLiasptecanaliss = array();
			} else {

				$criteria->add(LiasptecanalisPeer::LIASPTECCRIEVA_ID, $this->getId());

				LiasptecanalisPeer::addSelectColumns($criteria);
				$this->collLiasptecanaliss = LiasptecanalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiasptecanalisPeer::LIASPTECCRIEVA_ID, $this->getId());

				LiasptecanalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiasptecanalisCriteria) || !$this->lastLiasptecanalisCriteria->equals($criteria)) {
					$this->collLiasptecanaliss = LiasptecanalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiasptecanalisCriteria = $criteria;
		return $this->collLiasptecanaliss;
	}

	
	public function countLiasptecanaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiasptecanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiasptecanalisPeer::LIASPTECCRIEVA_ID, $this->getId());

		return LiasptecanalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiasptecanalis(Liasptecanalis $l)
	{
		$this->collLiasptecanaliss[] = $l;
		$l->setLiaspteccrieva($this);
	}


	
	public function getLiasptecanalissJoinLireglic($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasptecanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasptecanaliss === null) {
			if ($this->isNew()) {
				$this->collLiasptecanaliss = array();
			} else {

				$criteria->add(LiasptecanalisPeer::LIASPTECCRIEVA_ID, $this->getId());

				$this->collLiasptecanaliss = LiasptecanalisPeer::doSelectJoinLireglic($criteria, $con);
			}
		} else {
									
			$criteria->add(LiasptecanalisPeer::LIASPTECCRIEVA_ID, $this->getId());

			if (!isset($this->lastLiasptecanalisCriteria) || !$this->lastLiasptecanalisCriteria->equals($criteria)) {
				$this->collLiasptecanaliss = LiasptecanalisPeer::doSelectJoinLireglic($criteria, $con);
			}
		}
		$this->lastLiasptecanalisCriteria = $criteria;

		return $this->collLiasptecanaliss;
	}

} 