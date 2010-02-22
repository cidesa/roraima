<?php


abstract class BaseTstipmov extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $destip;


	
	protected $debcre;


	
	protected $orden;


	
	protected $escheque;


	
	protected $codcon;


	
	protected $id;

	
	protected $collTsmovbans;

	
	protected $lastTsmovbanCriteria = null;

	
	protected $collTsmovlibs;

	
	protected $lastTsmovlibCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getDebcre()
  {

    return trim($this->debcre);

  }
  
  public function getOrden()
  {

    return trim($this->orden);

  }
  
  public function getEscheque()
  {

    return $this->escheque;

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = TstipmovPeer::CODTIP;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = TstipmovPeer::DESTIP;
      }
  
	} 
	
	public function setDebcre($v)
	{

    if ($this->debcre !== $v) {
        $this->debcre = $v;
        $this->modifiedColumns[] = TstipmovPeer::DEBCRE;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = TstipmovPeer::ORDEN;
      }
  
	} 
	
	public function setEscheque($v)
	{

    if ($this->escheque !== $v) {
        $this->escheque = $v;
        $this->modifiedColumns[] = TstipmovPeer::ESCHEQUE;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = TstipmovPeer::CODCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TstipmovPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtip = $rs->getString($startcol + 0);

      $this->destip = $rs->getString($startcol + 1);

      $this->debcre = $rs->getString($startcol + 2);

      $this->orden = $rs->getString($startcol + 3);

      $this->escheque = $rs->getBoolean($startcol + 4);

      $this->codcon = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tstipmov object", $e);
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
			$con = Propel::getConnection(TstipmovPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TstipmovPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TstipmovPeer::DATABASE_NAME);
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
					$pk = TstipmovPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TstipmovPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTsmovbans !== null) {
				foreach($this->collTsmovbans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTsmovlibs !== null) {
				foreach($this->collTsmovlibs as $referrerFK) {
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


			if (($retval = TstipmovPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTsmovbans !== null) {
					foreach($this->collTsmovbans as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTsmovlibs !== null) {
					foreach($this->collTsmovlibs as $referrerFK) {
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
		$pos = TstipmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtip();
				break;
			case 1:
				return $this->getDestip();
				break;
			case 2:
				return $this->getDebcre();
				break;
			case 3:
				return $this->getOrden();
				break;
			case 4:
				return $this->getEscheque();
				break;
			case 5:
				return $this->getCodcon();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TstipmovPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getDestip(),
			$keys[2] => $this->getDebcre(),
			$keys[3] => $this->getOrden(),
			$keys[4] => $this->getEscheque(),
			$keys[5] => $this->getCodcon(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TstipmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtip($value);
				break;
			case 1:
				$this->setDestip($value);
				break;
			case 2:
				$this->setDebcre($value);
				break;
			case 3:
				$this->setOrden($value);
				break;
			case 4:
				$this->setEscheque($value);
				break;
			case 5:
				$this->setCodcon($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TstipmovPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDebcre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrden($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEscheque($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TstipmovPeer::DATABASE_NAME);

		if ($this->isColumnModified(TstipmovPeer::CODTIP)) $criteria->add(TstipmovPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(TstipmovPeer::DESTIP)) $criteria->add(TstipmovPeer::DESTIP, $this->destip);
		if ($this->isColumnModified(TstipmovPeer::DEBCRE)) $criteria->add(TstipmovPeer::DEBCRE, $this->debcre);
		if ($this->isColumnModified(TstipmovPeer::ORDEN)) $criteria->add(TstipmovPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(TstipmovPeer::ESCHEQUE)) $criteria->add(TstipmovPeer::ESCHEQUE, $this->escheque);
		if ($this->isColumnModified(TstipmovPeer::CODCON)) $criteria->add(TstipmovPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(TstipmovPeer::ID)) $criteria->add(TstipmovPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TstipmovPeer::DATABASE_NAME);

		$criteria->add(TstipmovPeer::ID, $this->id);

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

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDestip($this->destip);

		$copyObj->setDebcre($this->debcre);

		$copyObj->setOrden($this->orden);

		$copyObj->setEscheque($this->escheque);

		$copyObj->setCodcon($this->codcon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTsmovbans() as $relObj) {
				$copyObj->addTsmovban($relObj->copy($deepCopy));
			}

			foreach($this->getTsmovlibs() as $relObj) {
				$copyObj->addTsmovlib($relObj->copy($deepCopy));
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
			self::$peer = new TstipmovPeer();
		}
		return self::$peer;
	}

	
	public function initTsmovbans()
	{
		if ($this->collTsmovbans === null) {
			$this->collTsmovbans = array();
		}
	}

	
	public function getTsmovbans($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovbans === null) {
			if ($this->isNew()) {
			   $this->collTsmovbans = array();
			} else {

				$criteria->add(TsmovbanPeer::TIPMOV, $this->getCodtip());

				TsmovbanPeer::addSelectColumns($criteria);
				$this->collTsmovbans = TsmovbanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsmovbanPeer::TIPMOV, $this->getCodtip());

				TsmovbanPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsmovbanCriteria) || !$this->lastTsmovbanCriteria->equals($criteria)) {
					$this->collTsmovbans = TsmovbanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsmovbanCriteria = $criteria;
		return $this->collTsmovbans;
	}

	
	public function countTsmovbans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsmovbanPeer::TIPMOV, $this->getCodtip());

		return TsmovbanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsmovban(Tsmovban $l)
	{
		$this->collTsmovbans[] = $l;
		$l->setTstipmov($this);
	}


	
	public function getTsmovbansJoinTsdefban($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovbans === null) {
			if ($this->isNew()) {
				$this->collTsmovbans = array();
			} else {

				$criteria->add(TsmovbanPeer::TIPMOV, $this->getCodtip());

				$this->collTsmovbans = TsmovbanPeer::doSelectJoinTsdefban($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovbanPeer::TIPMOV, $this->getCodtip());

			if (!isset($this->lastTsmovbanCriteria) || !$this->lastTsmovbanCriteria->equals($criteria)) {
				$this->collTsmovbans = TsmovbanPeer::doSelectJoinTsdefban($criteria, $con);
			}
		}
		$this->lastTsmovbanCriteria = $criteria;

		return $this->collTsmovbans;
	}

	
	public function initTsmovlibs()
	{
		if ($this->collTsmovlibs === null) {
			$this->collTsmovlibs = array();
		}
	}

	
	public function getTsmovlibs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
			   $this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::TIPMOV, $this->getCodtip());

				TsmovlibPeer::addSelectColumns($criteria);
				$this->collTsmovlibs = TsmovlibPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsmovlibPeer::TIPMOV, $this->getCodtip());

				TsmovlibPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
					$this->collTsmovlibs = TsmovlibPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsmovlibCriteria = $criteria;
		return $this->collTsmovlibs;
	}

	
	public function countTsmovlibs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsmovlibPeer::TIPMOV, $this->getCodtip());

		return TsmovlibPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsmovlib(Tsmovlib $l)
	{
		$this->collTsmovlibs[] = $l;
		$l->setTstipmov($this);
	}


	
	public function getTsmovlibsJoinTsdefban($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
				$this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::TIPMOV, $this->getCodtip());

				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTsdefban($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovlibPeer::TIPMOV, $this->getCodtip());

			if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTsdefban($criteria, $con);
			}
		}
		$this->lastTsmovlibCriteria = $criteria;

		return $this->collTsmovlibs;
	}

} 