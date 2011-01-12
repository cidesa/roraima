<?php


abstract class BaseCctitulo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $pregunta;


	
	protected $orden;

	
	protected $collCcbaremos;

	
	protected $lastCcbaremoCriteria = null;

	
	protected $collCcbarinfs;

	
	protected $lastCcbarinfCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPregunta()
  {

    return trim($this->pregunta);

  }
  
  public function getOrden()
  {

    return $this->orden;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CctituloPeer::ID;
      }
  
	} 
	
	public function setPregunta($v)
	{

    if ($this->pregunta !== $v) {
        $this->pregunta = $v;
        $this->modifiedColumns[] = CctituloPeer::PREGUNTA;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = CctituloPeer::ORDEN;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->pregunta = $rs->getString($startcol + 1);

      $this->orden = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cctitulo object", $e);
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
			$con = Propel::getConnection(CctituloPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CctituloPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CctituloPeer::DATABASE_NAME);
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
					$pk = CctituloPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CctituloPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbaremos !== null) {
				foreach($this->collCcbaremos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbarinfs !== null) {
				foreach($this->collCcbarinfs as $referrerFK) {
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


			if (($retval = CctituloPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbaremos !== null) {
					foreach($this->collCcbaremos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbarinfs !== null) {
					foreach($this->collCcbarinfs as $referrerFK) {
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
		$pos = CctituloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPregunta();
				break;
			case 2:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctituloPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPregunta(),
			$keys[2] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctituloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPregunta($value);
				break;
			case 2:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctituloPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPregunta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrden($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CctituloPeer::DATABASE_NAME);

		if ($this->isColumnModified(CctituloPeer::ID)) $criteria->add(CctituloPeer::ID, $this->id);
		if ($this->isColumnModified(CctituloPeer::PREGUNTA)) $criteria->add(CctituloPeer::PREGUNTA, $this->pregunta);
		if ($this->isColumnModified(CctituloPeer::ORDEN)) $criteria->add(CctituloPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CctituloPeer::DATABASE_NAME);

		$criteria->add(CctituloPeer::ID, $this->id);

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

		$copyObj->setPregunta($this->pregunta);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbaremos() as $relObj) {
				$copyObj->addCcbaremo($relObj->copy($deepCopy));
			}

			foreach($this->getCcbarinfs() as $relObj) {
				$copyObj->addCcbarinf($relObj->copy($deepCopy));
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
			self::$peer = new CctituloPeer();
		}
		return self::$peer;
	}

	
	public function initCcbaremos()
	{
		if ($this->collCcbaremos === null) {
			$this->collCcbaremos = array();
		}
	}

	
	public function getCcbaremos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbaremoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbaremos === null) {
			if ($this->isNew()) {
			   $this->collCcbaremos = array();
			} else {

				$criteria->add(CcbaremoPeer::CCTITULO_ID, $this->getId());

				CcbaremoPeer::addSelectColumns($criteria);
				$this->collCcbaremos = CcbaremoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbaremoPeer::CCTITULO_ID, $this->getId());

				CcbaremoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbaremoCriteria) || !$this->lastCcbaremoCriteria->equals($criteria)) {
					$this->collCcbaremos = CcbaremoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbaremoCriteria = $criteria;
		return $this->collCcbaremos;
	}

	
	public function countCcbaremos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbaremoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbaremoPeer::CCTITULO_ID, $this->getId());

		return CcbaremoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbaremo(Ccbaremo $l)
	{
		$this->collCcbaremos[] = $l;
		$l->setCctitulo($this);
	}


	
	public function getCcbaremosJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbaremoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbaremos === null) {
			if ($this->isNew()) {
				$this->collCcbaremos = array();
			} else {

				$criteria->add(CcbaremoPeer::CCTITULO_ID, $this->getId());

				$this->collCcbaremos = CcbaremoPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbaremoPeer::CCTITULO_ID, $this->getId());

			if (!isset($this->lastCcbaremoCriteria) || !$this->lastCcbaremoCriteria->equals($criteria)) {
				$this->collCcbaremos = CcbaremoPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcbaremoCriteria = $criteria;

		return $this->collCcbaremos;
	}

	
	public function initCcbarinfs()
	{
		if ($this->collCcbarinfs === null) {
			$this->collCcbarinfs = array();
		}
	}

	
	public function getCcbarinfs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbarinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbarinfs === null) {
			if ($this->isNew()) {
			   $this->collCcbarinfs = array();
			} else {

				$criteria->add(CcbarinfPeer::CCTITULO_ID, $this->getId());

				CcbarinfPeer::addSelectColumns($criteria);
				$this->collCcbarinfs = CcbarinfPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbarinfPeer::CCTITULO_ID, $this->getId());

				CcbarinfPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbarinfCriteria) || !$this->lastCcbarinfCriteria->equals($criteria)) {
					$this->collCcbarinfs = CcbarinfPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbarinfCriteria = $criteria;
		return $this->collCcbarinfs;
	}

	
	public function countCcbarinfs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbarinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbarinfPeer::CCTITULO_ID, $this->getId());

		return CcbarinfPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbarinf(Ccbarinf $l)
	{
		$this->collCcbarinfs[] = $l;
		$l->setCctitulo($this);
	}


	
	public function getCcbarinfsJoinCcinform($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbarinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbarinfs === null) {
			if ($this->isNew()) {
				$this->collCcbarinfs = array();
			} else {

				$criteria->add(CcbarinfPeer::CCTITULO_ID, $this->getId());

				$this->collCcbarinfs = CcbarinfPeer::doSelectJoinCcinform($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbarinfPeer::CCTITULO_ID, $this->getId());

			if (!isset($this->lastCcbarinfCriteria) || !$this->lastCcbarinfCriteria->equals($criteria)) {
				$this->collCcbarinfs = CcbarinfPeer::doSelectJoinCcinform($criteria, $con);
			}
		}
		$this->lastCcbarinfCriteria = $criteria;

		return $this->collCcbarinfs;
	}

} 