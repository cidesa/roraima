<?php


abstract class BaseLicomlic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcom;


	
	protected $descom;


	
	protected $fecnom;


	
	protected $decret;


	
	protected $id;

	
	protected $collLidetcoms;

	
	protected $lastLidetcomCriteria = null;

	
	protected $collLiregsols;

	
	protected $lastLiregsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getFecnom($format = 'Y-m-d')
  {

    if ($this->fecnom === null || $this->fecnom === '') {
      return null;
    } elseif (!is_int($this->fecnom)) {
            $ts = adodb_strtotime($this->fecnom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
      }
    } else {
      $ts = $this->fecnom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDecret()
  {

    return trim($this->decret);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = $v;
        $this->modifiedColumns[] = LicomlicPeer::CODCOM;
      }
  
	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = LicomlicPeer::DESCOM;
      }
  
	} 
	
	public function setFecnom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnom !== $ts) {
      $this->fecnom = $ts;
      $this->modifiedColumns[] = LicomlicPeer::FECNOM;
    }

	} 
	
	public function setDecret($v)
	{

    if ($this->decret !== $v) {
        $this->decret = $v;
        $this->modifiedColumns[] = LicomlicPeer::DECRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LicomlicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcom = $rs->getString($startcol + 0);

      $this->descom = $rs->getString($startcol + 1);

      $this->fecnom = $rs->getDate($startcol + 2, null);

      $this->decret = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Licomlic object", $e);
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
			$con = Propel::getConnection(LicomlicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LicomlicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LicomlicPeer::DATABASE_NAME);
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
					$pk = LicomlicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LicomlicPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetcoms !== null) {
				foreach($this->collLidetcoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = LicomlicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetcoms !== null) {
					foreach($this->collLidetcoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = LicomlicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcom();
				break;
			case 1:
				return $this->getDescom();
				break;
			case 2:
				return $this->getFecnom();
				break;
			case 3:
				return $this->getDecret();
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
		$keys = LicomlicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcom(),
			$keys[1] => $this->getDescom(),
			$keys[2] => $this->getFecnom(),
			$keys[3] => $this->getDecret(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicomlicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcom($value);
				break;
			case 1:
				$this->setDescom($value);
				break;
			case 2:
				$this->setFecnom($value);
				break;
			case 3:
				$this->setDecret($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicomlicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDecret($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LicomlicPeer::DATABASE_NAME);

		if ($this->isColumnModified(LicomlicPeer::CODCOM)) $criteria->add(LicomlicPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(LicomlicPeer::DESCOM)) $criteria->add(LicomlicPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(LicomlicPeer::FECNOM)) $criteria->add(LicomlicPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(LicomlicPeer::DECRET)) $criteria->add(LicomlicPeer::DECRET, $this->decret);
		if ($this->isColumnModified(LicomlicPeer::ID)) $criteria->add(LicomlicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LicomlicPeer::DATABASE_NAME);

		$criteria->add(LicomlicPeer::ID, $this->id);

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

		$copyObj->setCodcom($this->codcom);

		$copyObj->setDescom($this->descom);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setDecret($this->decret);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetcoms() as $relObj) {
				$copyObj->addLidetcom($relObj->copy($deepCopy));
			}

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
			self::$peer = new LicomlicPeer();
		}
		return self::$peer;
	}

	
	public function initLidetcoms()
	{
		if ($this->collLidetcoms === null) {
			$this->collLidetcoms = array();
		}
	}

	
	public function getLidetcoms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLidetcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcoms === null) {
			if ($this->isNew()) {
			   $this->collLidetcoms = array();
			} else {

				$criteria->add(LidetcomPeer::LICOMLIC_ID, $this->getId());

				LidetcomPeer::addSelectColumns($criteria);
				$this->collLidetcoms = LidetcomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcomPeer::LICOMLIC_ID, $this->getId());

				LidetcomPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcomCriteria) || !$this->lastLidetcomCriteria->equals($criteria)) {
					$this->collLidetcoms = LidetcomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcomCriteria = $criteria;
		return $this->collLidetcoms;
	}

	
	public function countLidetcoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLidetcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcomPeer::LICOMLIC_ID, $this->getId());

		return LidetcomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcom(Lidetcom $l)
	{
		$this->collLidetcoms[] = $l;
		$l->setLicomlic($this);
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

				$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

				LiregsolPeer::addSelectColumns($criteria);
				$this->collLiregsols = LiregsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

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

		$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

		return LiregsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregsol(Liregsol $l)
	{
		$this->collLiregsols[] = $l;
		$l->setLicomlic($this);
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

				$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

				$this->collLiregsols = LiregsolPeer::doSelectJoinLidatste($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

			if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
				$this->collLiregsols = LiregsolPeer::doSelectJoinLidatste($criteria, $con);
			}
		}
		$this->lastLiregsolCriteria = $criteria;

		return $this->collLiregsols;
	}


	
	public function getLiregsolsJoinLitipsol($criteria = null, $con = null)
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

				$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

				$this->collLiregsols = LiregsolPeer::doSelectJoinLitipsol($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregsolPeer::LICOMLIC_ID, $this->getId());

			if (!isset($this->lastLiregsolCriteria) || !$this->lastLiregsolCriteria->equals($criteria)) {
				$this->collLiregsols = LiregsolPeer::doSelectJoinLitipsol($criteria, $con);
			}
		}
		$this->lastLiregsolCriteria = $criteria;

		return $this->collLiregsols;
	}

} 