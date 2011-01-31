<?php


abstract class BaseIndefdes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddes;


	
	protected $desdes;


	
	protected $tipdes;


	
	protected $valdes;


	
	protected $diades;


	
	protected $tipret;


	
	protected $cuecon;


	
	protected $id;

	
	protected $collIndestipclis;

	
	protected $lastIndestipcliCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddes()
  {

    return trim($this->coddes);

  }
  
  public function getDesdes()
  {

    return trim($this->desdes);

  }
  
  public function getTipdes()
  {

    return trim($this->tipdes);

  }
  
  public function getValdes($val=false)
  {

    if($val) return number_format($this->valdes,2,',','.');
    else return $this->valdes;

  }
  
  public function getDiades()
  {

    return $this->diades;

  }
  
  public function getTipret()
  {

    return trim($this->tipret);

  }
  
  public function getCuecon()
  {

    return trim($this->cuecon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddes($v)
	{

    if ($this->coddes !== $v) {
        $this->coddes = $v;
        $this->modifiedColumns[] = IndefdesPeer::CODDES;
      }
  
	} 
	
	public function setDesdes($v)
	{

    if ($this->desdes !== $v) {
        $this->desdes = $v;
        $this->modifiedColumns[] = IndefdesPeer::DESDES;
      }
  
	} 
	
	public function setTipdes($v)
	{

    if ($this->tipdes !== $v) {
        $this->tipdes = $v;
        $this->modifiedColumns[] = IndefdesPeer::TIPDES;
      }
  
	} 
	
	public function setValdes($v)
	{

    if ($this->valdes !== $v) {
        $this->valdes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = IndefdesPeer::VALDES;
      }
  
	} 
	
	public function setDiades($v)
	{

    if ($this->diades !== $v) {
        $this->diades = $v;
        $this->modifiedColumns[] = IndefdesPeer::DIADES;
      }
  
	} 
	
	public function setTipret($v)
	{

    if ($this->tipret !== $v) {
        $this->tipret = $v;
        $this->modifiedColumns[] = IndefdesPeer::TIPRET;
      }
  
	} 
	
	public function setCuecon($v)
	{

    if ($this->cuecon !== $v) {
        $this->cuecon = $v;
        $this->modifiedColumns[] = IndefdesPeer::CUECON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IndefdesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddes = $rs->getString($startcol + 0);

      $this->desdes = $rs->getString($startcol + 1);

      $this->tipdes = $rs->getString($startcol + 2);

      $this->valdes = $rs->getFloat($startcol + 3);

      $this->diades = $rs->getInt($startcol + 4);

      $this->tipret = $rs->getString($startcol + 5);

      $this->cuecon = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Indefdes object", $e);
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
			$con = Propel::getConnection(IndefdesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IndefdesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IndefdesPeer::DATABASE_NAME);
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
					$pk = IndefdesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IndefdesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collIndestipclis !== null) {
				foreach($this->collIndestipclis as $referrerFK) {
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


			if (($retval = IndefdesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collIndestipclis !== null) {
					foreach($this->collIndestipclis as $referrerFK) {
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
		$pos = IndefdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddes();
				break;
			case 1:
				return $this->getDesdes();
				break;
			case 2:
				return $this->getTipdes();
				break;
			case 3:
				return $this->getValdes();
				break;
			case 4:
				return $this->getDiades();
				break;
			case 5:
				return $this->getTipret();
				break;
			case 6:
				return $this->getCuecon();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndefdesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddes(),
			$keys[1] => $this->getDesdes(),
			$keys[2] => $this->getTipdes(),
			$keys[3] => $this->getValdes(),
			$keys[4] => $this->getDiades(),
			$keys[5] => $this->getTipret(),
			$keys[6] => $this->getCuecon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IndefdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddes($value);
				break;
			case 1:
				$this->setDesdes($value);
				break;
			case 2:
				$this->setTipdes($value);
				break;
			case 3:
				$this->setValdes($value);
				break;
			case 4:
				$this->setDiades($value);
				break;
			case 5:
				$this->setTipret($value);
				break;
			case 6:
				$this->setCuecon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IndefdesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiades($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipret($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCuecon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IndefdesPeer::DATABASE_NAME);

		if ($this->isColumnModified(IndefdesPeer::CODDES)) $criteria->add(IndefdesPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(IndefdesPeer::DESDES)) $criteria->add(IndefdesPeer::DESDES, $this->desdes);
		if ($this->isColumnModified(IndefdesPeer::TIPDES)) $criteria->add(IndefdesPeer::TIPDES, $this->tipdes);
		if ($this->isColumnModified(IndefdesPeer::VALDES)) $criteria->add(IndefdesPeer::VALDES, $this->valdes);
		if ($this->isColumnModified(IndefdesPeer::DIADES)) $criteria->add(IndefdesPeer::DIADES, $this->diades);
		if ($this->isColumnModified(IndefdesPeer::TIPRET)) $criteria->add(IndefdesPeer::TIPRET, $this->tipret);
		if ($this->isColumnModified(IndefdesPeer::CUECON)) $criteria->add(IndefdesPeer::CUECON, $this->cuecon);
		if ($this->isColumnModified(IndefdesPeer::ID)) $criteria->add(IndefdesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IndefdesPeer::DATABASE_NAME);

		$criteria->add(IndefdesPeer::ID, $this->id);

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

		$copyObj->setCoddes($this->coddes);

		$copyObj->setDesdes($this->desdes);

		$copyObj->setTipdes($this->tipdes);

		$copyObj->setValdes($this->valdes);

		$copyObj->setDiades($this->diades);

		$copyObj->setTipret($this->tipret);

		$copyObj->setCuecon($this->cuecon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getIndestipclis() as $relObj) {
				$copyObj->addIndestipcli($relObj->copy($deepCopy));
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
			self::$peer = new IndefdesPeer();
		}
		return self::$peer;
	}

	
	public function initIndestipclis()
	{
		if ($this->collIndestipclis === null) {
			$this->collIndestipclis = array();
		}
	}

	
	public function getIndestipclis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndestipcliPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndestipclis === null) {
			if ($this->isNew()) {
			   $this->collIndestipclis = array();
			} else {

				$criteria->add(IndestipcliPeer::INDEFDES_ID, $this->getId());

				IndestipcliPeer::addSelectColumns($criteria);
				$this->collIndestipclis = IndestipcliPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IndestipcliPeer::INDEFDES_ID, $this->getId());

				IndestipcliPeer::addSelectColumns($criteria);
				if (!isset($this->lastIndestipcliCriteria) || !$this->lastIndestipcliCriteria->equals($criteria)) {
					$this->collIndestipclis = IndestipcliPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIndestipcliCriteria = $criteria;
		return $this->collIndestipclis;
	}

	
	public function countIndestipclis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIndestipcliPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IndestipcliPeer::INDEFDES_ID, $this->getId());

		return IndestipcliPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIndestipcli(Indestipcli $l)
	{
		$this->collIndestipclis[] = $l;
		$l->setIndefdes($this);
	}


	
	public function getIndestipclisJoinIntipcli($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndestipcliPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndestipclis === null) {
			if ($this->isNew()) {
				$this->collIndestipclis = array();
			} else {

				$criteria->add(IndestipcliPeer::INDEFDES_ID, $this->getId());

				$this->collIndestipclis = IndestipcliPeer::doSelectJoinIntipcli($criteria, $con);
			}
		} else {
									
			$criteria->add(IndestipcliPeer::INDEFDES_ID, $this->getId());

			if (!isset($this->lastIndestipcliCriteria) || !$this->lastIndestipcliCriteria->equals($criteria)) {
				$this->collIndestipclis = IndestipcliPeer::doSelectJoinIntipcli($criteria, $con);
			}
		}
		$this->lastIndestipcliCriteria = $criteria;

		return $this->collIndestipclis;
	}

} 