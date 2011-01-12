<?php


abstract class BaseCcareger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomare;


	
	protected $desare;


	
	protected $objare;


	
	protected $ccgerenc_id;

	
	protected $aCcgerenc;

	
	protected $collCcanaliss;

	
	protected $lastCcanalisCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomare()
  {

    return trim($this->nomare);

  }
  
  public function getDesare()
  {

    return trim($this->desare);

  }
  
  public function getObjare()
  {

    return trim($this->objare);

  }
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcaregerPeer::ID;
      }
  
	} 
	
	public function setNomare($v)
	{

    if ($this->nomare !== $v) {
        $this->nomare = $v;
        $this->modifiedColumns[] = CcaregerPeer::NOMARE;
      }
  
	} 
	
	public function setDesare($v)
	{

    if ($this->desare !== $v) {
        $this->desare = $v;
        $this->modifiedColumns[] = CcaregerPeer::DESARE;
      }
  
	} 
	
	public function setObjare($v)
	{

    if ($this->objare !== $v) {
        $this->objare = $v;
        $this->modifiedColumns[] = CcaregerPeer::OBJARE;
      }
  
	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcaregerPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomare = $rs->getString($startcol + 1);

      $this->desare = $rs->getString($startcol + 2);

      $this->objare = $rs->getString($startcol + 3);

      $this->ccgerenc_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccareger object", $e);
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
			$con = Propel::getConnection(CcaregerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcaregerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcaregerPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcaregerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcaregerPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcanaliss !== null) {
				foreach($this->collCcanaliss as $referrerFK) {
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


												
			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}


			if (($retval = CcaregerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcanaliss !== null) {
					foreach($this->collCcanaliss as $referrerFK) {
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
		$pos = CcaregerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomare();
				break;
			case 2:
				return $this->getDesare();
				break;
			case 3:
				return $this->getObjare();
				break;
			case 4:
				return $this->getCcgerencId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcaregerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomare(),
			$keys[2] => $this->getDesare(),
			$keys[3] => $this->getObjare(),
			$keys[4] => $this->getCcgerencId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcaregerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomare($value);
				break;
			case 2:
				$this->setDesare($value);
				break;
			case 3:
				$this->setObjare($value);
				break;
			case 4:
				$this->setCcgerencId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcaregerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomare($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesare($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObjare($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcgerencId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcaregerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcaregerPeer::ID)) $criteria->add(CcaregerPeer::ID, $this->id);
		if ($this->isColumnModified(CcaregerPeer::NOMARE)) $criteria->add(CcaregerPeer::NOMARE, $this->nomare);
		if ($this->isColumnModified(CcaregerPeer::DESARE)) $criteria->add(CcaregerPeer::DESARE, $this->desare);
		if ($this->isColumnModified(CcaregerPeer::OBJARE)) $criteria->add(CcaregerPeer::OBJARE, $this->objare);
		if ($this->isColumnModified(CcaregerPeer::CCGERENC_ID)) $criteria->add(CcaregerPeer::CCGERENC_ID, $this->ccgerenc_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcaregerPeer::DATABASE_NAME);

		$criteria->add(CcaregerPeer::ID, $this->id);

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

		$copyObj->setNomare($this->nomare);

		$copyObj->setDesare($this->desare);

		$copyObj->setObjare($this->objare);

		$copyObj->setCcgerencId($this->ccgerenc_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcanaliss() as $relObj) {
				$copyObj->addCcanalis($relObj->copy($deepCopy));
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
			self::$peer = new CcaregerPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
	}

	
	public function initCcanaliss()
	{
		if ($this->collCcanaliss === null) {
			$this->collCcanaliss = array();
		}
	}

	
	public function getCcanaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
			   $this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

				CcanalisPeer::addSelectColumns($criteria);
				$this->collCcanaliss = CcanalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

				CcanalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
					$this->collCcanaliss = CcanalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanalisCriteria = $criteria;
		return $this->collCcanaliss;
	}

	
	public function countCcanaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

		return CcanalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanalis(Ccanalis $l)
	{
		$this->collCcanaliss[] = $l;
		$l->setCcareger($this);
	}


	
	public function getCcanalissJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}


	
	public function getCcanalissJoinCctipana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCctipana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCctipana($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}


	
	public function getCcanalissJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCAREGER_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}

} 