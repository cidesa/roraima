<?php


abstract class BaseInfactura extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numfac;


	
	protected $tipper;


	
	protected $cedrif;


	
	protected $tipconc;


	
	protected $idconc;


	
	protected $moncan;


	
	protected $indefban_id;


	
	protected $numdep;


	
	protected $fecemi;


	
	protected $id;

	
	protected $aIndefban;

	
	protected $collIndetfacs;

	
	protected $lastIndetfacCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getTipconc()
  {

    return trim($this->tipconc);

  }
  
  public function getIdconc()
  {

    return $this->idconc;

  }
  
  public function getMoncan($val=false)
  {

    if($val) return number_format($this->moncan,2,',','.');
    else return $this->moncan;

  }
  
  public function getIndefbanId()
  {

    return $this->indefban_id;

  }
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = InfacturaPeer::NUMFAC;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = InfacturaPeer::TIPPER;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = InfacturaPeer::CEDRIF;
      }
  
	} 
	
	public function setTipconc($v)
	{

    if ($this->tipconc !== $v) {
        $this->tipconc = $v;
        $this->modifiedColumns[] = InfacturaPeer::TIPCONC;
      }
  
	} 
	
	public function setIdconc($v)
	{

    if ($this->idconc !== $v) {
        $this->idconc = $v;
        $this->modifiedColumns[] = InfacturaPeer::IDCONC;
      }
  
	} 
	
	public function setMoncan($v)
	{

    if ($this->moncan !== $v) {
        $this->moncan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = InfacturaPeer::MONCAN;
      }
  
	} 
	
	public function setIndefbanId($v)
	{

    if ($this->indefban_id !== $v) {
        $this->indefban_id = $v;
        $this->modifiedColumns[] = InfacturaPeer::INDEFBAN_ID;
      }
  
		if ($this->aIndefban !== null && $this->aIndefban->getId() !== $v) {
			$this->aIndefban = null;
		}

	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = $v;
        $this->modifiedColumns[] = InfacturaPeer::NUMDEP;
      }
  
	} 
	
	public function setFecemi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = InfacturaPeer::FECEMI;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InfacturaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numfac = $rs->getString($startcol + 0);

      $this->tipper = $rs->getString($startcol + 1);

      $this->cedrif = $rs->getString($startcol + 2);

      $this->tipconc = $rs->getString($startcol + 3);

      $this->idconc = $rs->getInt($startcol + 4);

      $this->moncan = $rs->getFloat($startcol + 5);

      $this->indefban_id = $rs->getInt($startcol + 6);

      $this->numdep = $rs->getString($startcol + 7);

      $this->fecemi = $rs->getDate($startcol + 8, null);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Infactura object", $e);
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
			$con = Propel::getConnection(InfacturaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InfacturaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InfacturaPeer::DATABASE_NAME);
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


												
			if ($this->aIndefban !== null) {
				if ($this->aIndefban->isModified()) {
					$affectedRows += $this->aIndefban->save($con);
				}
				$this->setIndefban($this->aIndefban);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InfacturaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InfacturaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collIndetfacs !== null) {
				foreach($this->collIndetfacs as $referrerFK) {
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


												
			if ($this->aIndefban !== null) {
				if (!$this->aIndefban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aIndefban->getValidationFailures());
				}
			}


			if (($retval = InfacturaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collIndetfacs !== null) {
					foreach($this->collIndetfacs as $referrerFK) {
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
		$pos = InfacturaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumfac();
				break;
			case 1:
				return $this->getTipper();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getTipconc();
				break;
			case 4:
				return $this->getIdconc();
				break;
			case 5:
				return $this->getMoncan();
				break;
			case 6:
				return $this->getIndefbanId();
				break;
			case 7:
				return $this->getNumdep();
				break;
			case 8:
				return $this->getFecemi();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InfacturaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumfac(),
			$keys[1] => $this->getTipper(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getTipconc(),
			$keys[4] => $this->getIdconc(),
			$keys[5] => $this->getMoncan(),
			$keys[6] => $this->getIndefbanId(),
			$keys[7] => $this->getNumdep(),
			$keys[8] => $this->getFecemi(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InfacturaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumfac($value);
				break;
			case 1:
				$this->setTipper($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setTipconc($value);
				break;
			case 4:
				$this->setIdconc($value);
				break;
			case 5:
				$this->setMoncan($value);
				break;
			case 6:
				$this->setIndefbanId($value);
				break;
			case 7:
				$this->setNumdep($value);
				break;
			case 8:
				$this->setFecemi($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InfacturaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumfac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipper($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipconc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIdconc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncan($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIndefbanId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumdep($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecemi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InfacturaPeer::DATABASE_NAME);

		if ($this->isColumnModified(InfacturaPeer::NUMFAC)) $criteria->add(InfacturaPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(InfacturaPeer::TIPPER)) $criteria->add(InfacturaPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(InfacturaPeer::CEDRIF)) $criteria->add(InfacturaPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(InfacturaPeer::TIPCONC)) $criteria->add(InfacturaPeer::TIPCONC, $this->tipconc);
		if ($this->isColumnModified(InfacturaPeer::IDCONC)) $criteria->add(InfacturaPeer::IDCONC, $this->idconc);
		if ($this->isColumnModified(InfacturaPeer::MONCAN)) $criteria->add(InfacturaPeer::MONCAN, $this->moncan);
		if ($this->isColumnModified(InfacturaPeer::INDEFBAN_ID)) $criteria->add(InfacturaPeer::INDEFBAN_ID, $this->indefban_id);
		if ($this->isColumnModified(InfacturaPeer::NUMDEP)) $criteria->add(InfacturaPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(InfacturaPeer::FECEMI)) $criteria->add(InfacturaPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(InfacturaPeer::ID)) $criteria->add(InfacturaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InfacturaPeer::DATABASE_NAME);

		$criteria->add(InfacturaPeer::ID, $this->id);

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

		$copyObj->setNumfac($this->numfac);

		$copyObj->setTipper($this->tipper);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setTipconc($this->tipconc);

		$copyObj->setIdconc($this->idconc);

		$copyObj->setMoncan($this->moncan);

		$copyObj->setIndefbanId($this->indefban_id);

		$copyObj->setNumdep($this->numdep);

		$copyObj->setFecemi($this->fecemi);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getIndetfacs() as $relObj) {
				$copyObj->addIndetfac($relObj->copy($deepCopy));
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
			self::$peer = new InfacturaPeer();
		}
		return self::$peer;
	}

	
	public function setIndefban($v)
	{


		if ($v === null) {
			$this->setIndefbanId(NULL);
		} else {
			$this->setIndefbanId($v->getId());
		}


		$this->aIndefban = $v;
	}


	
	public function getIndefban($con = null)
	{
		if ($this->aIndefban === null && ($this->indefban_id !== null)) {
						include_once 'lib/model/om/BaseIndefbanPeer.php';

			$this->aIndefban = IndefbanPeer::retrieveByPK($this->indefban_id, $con);

			
		}
		return $this->aIndefban;
	}

	
	public function initIndetfacs()
	{
		if ($this->collIndetfacs === null) {
			$this->collIndetfacs = array();
		}
	}

	
	public function getIndetfacs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndetfacPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndetfacs === null) {
			if ($this->isNew()) {
			   $this->collIndetfacs = array();
			} else {

				$criteria->add(IndetfacPeer::INFACTURA_ID, $this->getId());

				IndetfacPeer::addSelectColumns($criteria);
				$this->collIndetfacs = IndetfacPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IndetfacPeer::INFACTURA_ID, $this->getId());

				IndetfacPeer::addSelectColumns($criteria);
				if (!isset($this->lastIndetfacCriteria) || !$this->lastIndetfacCriteria->equals($criteria)) {
					$this->collIndetfacs = IndetfacPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIndetfacCriteria = $criteria;
		return $this->collIndetfacs;
	}

	
	public function countIndetfacs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIndetfacPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IndetfacPeer::INFACTURA_ID, $this->getId());

		return IndetfacPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIndetfac(Indetfac $l)
	{
		$this->collIndetfacs[] = $l;
		$l->setInfactura($this);
	}


	
	public function getIndetfacsJoinInarticulo($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndetfacPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndetfacs === null) {
			if ($this->isNew()) {
				$this->collIndetfacs = array();
			} else {

				$criteria->add(IndetfacPeer::INFACTURA_ID, $this->getId());

				$this->collIndetfacs = IndetfacPeer::doSelectJoinInarticulo($criteria, $con);
			}
		} else {
									
			$criteria->add(IndetfacPeer::INFACTURA_ID, $this->getId());

			if (!isset($this->lastIndetfacCriteria) || !$this->lastIndetfacCriteria->equals($criteria)) {
				$this->collIndetfacs = IndetfacPeer::doSelectJoinInarticulo($criteria, $con);
			}
		}
		$this->lastIndetfacCriteria = $criteria;

		return $this->collIndetfacs;
	}

} 