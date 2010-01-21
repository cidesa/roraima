<?php


abstract class BaseCcsesion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $observ;


	
	protected $fecses;


	
	protected $hora;


	
	protected $estatu;


	
	protected $feccieses;

	
	protected $collCccresess;

	
	protected $lastCccresesCriteria = null;

	
	protected $collCcsolsess;

	
	protected $lastCcsolsesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getFecses($format = 'Y-m-d')
  {

    if ($this->fecses === null || $this->fecses === '') {
      return null;
    } elseif (!is_int($this->fecses)) {
            $ts = adodb_strtotime($this->fecses);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecses] as date/time value: " . var_export($this->fecses, true));
      }
    } else {
      $ts = $this->fecses;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHora()
  {

    return trim($this->hora);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getFeccieses($format = 'Y-m-d')
  {

    if ($this->feccieses === null || $this->feccieses === '') {
      return null;
    } elseif (!is_int($this->feccieses)) {
            $ts = adodb_strtotime($this->feccieses);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccieses] as date/time value: " . var_export($this->feccieses, true));
      }
    } else {
      $ts = $this->feccieses;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsesionPeer::ID;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcsesionPeer::OBSERV;
      }
  
	} 
	
	public function setFecses($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecses] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecses !== $ts) {
      $this->fecses = $ts;
      $this->modifiedColumns[] = CcsesionPeer::FECSES;
    }

	} 
	
	public function setHora($v)
	{

    if ($this->hora !== $v) {
        $this->hora = $v;
        $this->modifiedColumns[] = CcsesionPeer::HORA;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcsesionPeer::ESTATU;
      }
  
	} 
	
	public function setFeccieses($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccieses] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccieses !== $ts) {
      $this->feccieses = $ts;
      $this->modifiedColumns[] = CcsesionPeer::FECCIESES;
    }

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->observ = $rs->getString($startcol + 1);

      $this->fecses = $rs->getDate($startcol + 2, null);

      $this->hora = $rs->getString($startcol + 3);

      $this->estatu = $rs->getString($startcol + 4);

      $this->feccieses = $rs->getDate($startcol + 5, null);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsesion object", $e);
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
			$con = Propel::getConnection(CcsesionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsesionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsesionPeer::DATABASE_NAME);
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
					$pk = CcsesionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsesionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccresess !== null) {
				foreach($this->collCccresess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolsess !== null) {
				foreach($this->collCcsolsess as $referrerFK) {
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


			if (($retval = CcsesionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccresess !== null) {
					foreach($this->collCccresess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolsess !== null) {
					foreach($this->collCcsolsess as $referrerFK) {
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
		$pos = CcsesionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getObserv();
				break;
			case 2:
				return $this->getFecses();
				break;
			case 3:
				return $this->getHora();
				break;
			case 4:
				return $this->getEstatu();
				break;
			case 5:
				return $this->getFeccieses();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsesionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getObserv(),
			$keys[2] => $this->getFecses(),
			$keys[3] => $this->getHora(),
			$keys[4] => $this->getEstatu(),
			$keys[5] => $this->getFeccieses(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsesionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setObserv($value);
				break;
			case 2:
				$this->setFecses($value);
				break;
			case 3:
				$this->setHora($value);
				break;
			case 4:
				$this->setEstatu($value);
				break;
			case 5:
				$this->setFeccieses($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsesionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setObserv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecses($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHora($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstatu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFeccieses($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsesionPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsesionPeer::ID)) $criteria->add(CcsesionPeer::ID, $this->id);
		if ($this->isColumnModified(CcsesionPeer::OBSERV)) $criteria->add(CcsesionPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcsesionPeer::FECSES)) $criteria->add(CcsesionPeer::FECSES, $this->fecses);
		if ($this->isColumnModified(CcsesionPeer::HORA)) $criteria->add(CcsesionPeer::HORA, $this->hora);
		if ($this->isColumnModified(CcsesionPeer::ESTATU)) $criteria->add(CcsesionPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcsesionPeer::FECCIESES)) $criteria->add(CcsesionPeer::FECCIESES, $this->feccieses);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsesionPeer::DATABASE_NAME);

		$criteria->add(CcsesionPeer::ID, $this->id);

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

		$copyObj->setObserv($this->observ);

		$copyObj->setFecses($this->fecses);

		$copyObj->setHora($this->hora);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setFeccieses($this->feccieses);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccresess() as $relObj) {
				$copyObj->addCccreses($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolsess() as $relObj) {
				$copyObj->addCcsolses($relObj->copy($deepCopy));
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
			self::$peer = new CcsesionPeer();
		}
		return self::$peer;
	}

	
	public function initCccresess()
	{
		if ($this->collCccresess === null) {
			$this->collCccresess = array();
		}
	}

	
	public function getCccresess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccresesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccresess === null) {
			if ($this->isNew()) {
			   $this->collCccresess = array();
			} else {

				$criteria->add(CccresesPeer::CCSESION_ID, $this->getId());

				CccresesPeer::addSelectColumns($criteria);
				$this->collCccresess = CccresesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccresesPeer::CCSESION_ID, $this->getId());

				CccresesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccresesCriteria) || !$this->lastCccresesCriteria->equals($criteria)) {
					$this->collCccresess = CccresesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccresesCriteria = $criteria;
		return $this->collCccresess;
	}

	
	public function countCccresess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccresesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccresesPeer::CCSESION_ID, $this->getId());

		return CccresesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccreses(Cccreses $l)
	{
		$this->collCccresess[] = $l;
		$l->setCcsesion($this);
	}


	
	public function getCccresessJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccresesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccresess === null) {
			if ($this->isNew()) {
				$this->collCccresess = array();
			} else {

				$criteria->add(CccresesPeer::CCSESION_ID, $this->getId());

				$this->collCccresess = CccresesPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CccresesPeer::CCSESION_ID, $this->getId());

			if (!isset($this->lastCccresesCriteria) || !$this->lastCccresesCriteria->equals($criteria)) {
				$this->collCccresess = CccresesPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCccresesCriteria = $criteria;

		return $this->collCccresess;
	}

	
	public function initCcsolsess()
	{
		if ($this->collCcsolsess === null) {
			$this->collCcsolsess = array();
		}
	}

	
	public function getCcsolsess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolsesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolsess === null) {
			if ($this->isNew()) {
			   $this->collCcsolsess = array();
			} else {

				$criteria->add(CcsolsesPeer::CCSESION_ID, $this->getId());

				CcsolsesPeer::addSelectColumns($criteria);
				$this->collCcsolsess = CcsolsesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolsesPeer::CCSESION_ID, $this->getId());

				CcsolsesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolsesCriteria) || !$this->lastCcsolsesCriteria->equals($criteria)) {
					$this->collCcsolsess = CcsolsesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolsesCriteria = $criteria;
		return $this->collCcsolsess;
	}

	
	public function countCcsolsess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolsesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolsesPeer::CCSESION_ID, $this->getId());

		return CcsolsesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolses(Ccsolses $l)
	{
		$this->collCcsolsess[] = $l;
		$l->setCcsesion($this);
	}


	
	public function getCcsolsessJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolsesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolsess === null) {
			if ($this->isNew()) {
				$this->collCcsolsess = array();
			} else {

				$criteria->add(CcsolsesPeer::CCSESION_ID, $this->getId());

				$this->collCcsolsess = CcsolsesPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolsesPeer::CCSESION_ID, $this->getId());

			if (!isset($this->lastCcsolsesCriteria) || !$this->lastCcsolsesCriteria->equals($criteria)) {
				$this->collCcsolsess = CcsolsesPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcsolsesCriteria = $criteria;

		return $this->collCcsolsess;
	}

} 