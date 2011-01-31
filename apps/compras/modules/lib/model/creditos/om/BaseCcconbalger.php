<?php


abstract class BaseCcconbalger extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomconbalger;


	
	protected $codigo;


	
	protected $tipo;


	
	protected $sumres;


	
	protected $ccvariab_id;

	
	protected $aCcvariab;

	
	protected $collCcdetbalgers;

	
	protected $lastCcdetbalgerCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomconbalger()
  {

    return trim($this->nomconbalger);

  }
  
  public function getCodigo()
  {

    return trim($this->codigo);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getSumres()
  {

    return trim($this->sumres);

  }
  
  public function getCcvariabId()
  {

    return $this->ccvariab_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcconbalgerPeer::ID;
      }
  
	} 
	
	public function setNomconbalger($v)
	{

    if ($this->nomconbalger !== $v) {
        $this->nomconbalger = $v;
        $this->modifiedColumns[] = CcconbalgerPeer::NOMCONBALGER;
      }
  
	} 
	
	public function setCodigo($v)
	{

    if ($this->codigo !== $v) {
        $this->codigo = $v;
        $this->modifiedColumns[] = CcconbalgerPeer::CODIGO;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CcconbalgerPeer::TIPO;
      }
  
	} 
	
	public function setSumres($v)
	{

    if ($this->sumres !== $v) {
        $this->sumres = $v;
        $this->modifiedColumns[] = CcconbalgerPeer::SUMRES;
      }
  
	} 
	
	public function setCcvariabId($v)
	{

    if ($this->ccvariab_id !== $v) {
        $this->ccvariab_id = $v;
        $this->modifiedColumns[] = CcconbalgerPeer::CCVARIAB_ID;
      }
  
		if ($this->aCcvariab !== null && $this->aCcvariab->getId() !== $v) {
			$this->aCcvariab = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomconbalger = $rs->getString($startcol + 1);

      $this->codigo = $rs->getString($startcol + 2);

      $this->tipo = $rs->getString($startcol + 3);

      $this->sumres = $rs->getString($startcol + 4);

      $this->ccvariab_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccconbalger object", $e);
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
			$con = Propel::getConnection(CcconbalgerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcconbalgerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcconbalgerPeer::DATABASE_NAME);
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


												
			if ($this->aCcvariab !== null) {
				if ($this->aCcvariab->isModified()) {
					$affectedRows += $this->aCcvariab->save($con);
				}
				$this->setCcvariab($this->aCcvariab);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcconbalgerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcconbalgerPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdetbalgers !== null) {
				foreach($this->collCcdetbalgers as $referrerFK) {
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


												
			if ($this->aCcvariab !== null) {
				if (!$this->aCcvariab->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcvariab->getValidationFailures());
				}
			}


			if (($retval = CcconbalgerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdetbalgers !== null) {
					foreach($this->collCcdetbalgers as $referrerFK) {
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
		$pos = CcconbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomconbalger();
				break;
			case 2:
				return $this->getCodigo();
				break;
			case 3:
				return $this->getTipo();
				break;
			case 4:
				return $this->getSumres();
				break;
			case 5:
				return $this->getCcvariabId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconbalgerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomconbalger(),
			$keys[2] => $this->getCodigo(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getSumres(),
			$keys[5] => $this->getCcvariabId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconbalgerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomconbalger($value);
				break;
			case 2:
				$this->setCodigo($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setSumres($value);
				break;
			case 5:
				$this->setCcvariabId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconbalgerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomconbalger($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodigo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSumres($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcvariabId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcconbalgerPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcconbalgerPeer::ID)) $criteria->add(CcconbalgerPeer::ID, $this->id);
		if ($this->isColumnModified(CcconbalgerPeer::NOMCONBALGER)) $criteria->add(CcconbalgerPeer::NOMCONBALGER, $this->nomconbalger);
		if ($this->isColumnModified(CcconbalgerPeer::CODIGO)) $criteria->add(CcconbalgerPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(CcconbalgerPeer::TIPO)) $criteria->add(CcconbalgerPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CcconbalgerPeer::SUMRES)) $criteria->add(CcconbalgerPeer::SUMRES, $this->sumres);
		if ($this->isColumnModified(CcconbalgerPeer::CCVARIAB_ID)) $criteria->add(CcconbalgerPeer::CCVARIAB_ID, $this->ccvariab_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcconbalgerPeer::DATABASE_NAME);

		$criteria->add(CcconbalgerPeer::ID, $this->id);

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

		$copyObj->setNomconbalger($this->nomconbalger);

		$copyObj->setCodigo($this->codigo);

		$copyObj->setTipo($this->tipo);

		$copyObj->setSumres($this->sumres);

		$copyObj->setCcvariabId($this->ccvariab_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdetbalgers() as $relObj) {
				$copyObj->addCcdetbalger($relObj->copy($deepCopy));
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
			self::$peer = new CcconbalgerPeer();
		}
		return self::$peer;
	}

	
	public function setCcvariab($v)
	{


		if ($v === null) {
			$this->setCcvariabId(NULL);
		} else {
			$this->setCcvariabId($v->getId());
		}


		$this->aCcvariab = $v;
	}


	
	public function getCcvariab($con = null)
	{
		if ($this->aCcvariab === null && ($this->ccvariab_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcvariabPeer.php';

      $c = new Criteria();
      $c->add(CcvariabPeer::ID,$this->ccvariab_id);
      
			$this->aCcvariab = CcvariabPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcvariab;
	}

	
	public function initCcdetbalgers()
	{
		if ($this->collCcdetbalgers === null) {
			$this->collCcdetbalgers = array();
		}
	}

	
	public function getCcdetbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcdetbalgers = array();
			} else {

				$criteria->add(CcdetbalgerPeer::CCCONBALGER_ID, $this->getId());

				CcdetbalgerPeer::addSelectColumns($criteria);
				$this->collCcdetbalgers = CcdetbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetbalgerPeer::CCCONBALGER_ID, $this->getId());

				CcdetbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetbalgerCriteria) || !$this->lastCcdetbalgerCriteria->equals($criteria)) {
					$this->collCcdetbalgers = CcdetbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetbalgerCriteria = $criteria;
		return $this->collCcdetbalgers;
	}

	
	public function countCcdetbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetbalgerPeer::CCCONBALGER_ID, $this->getId());

		return CcdetbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetbalger(Ccdetbalger $l)
	{
		$this->collCcdetbalgers[] = $l;
		$l->setCcconbalger($this);
	}


	
	public function getCcdetbalgersJoinCcbalger($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetbalgers === null) {
			if ($this->isNew()) {
				$this->collCcdetbalgers = array();
			} else {

				$criteria->add(CcdetbalgerPeer::CCCONBALGER_ID, $this->getId());

				$this->collCcdetbalgers = CcdetbalgerPeer::doSelectJoinCcbalger($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetbalgerPeer::CCCONBALGER_ID, $this->getId());

			if (!isset($this->lastCcdetbalgerCriteria) || !$this->lastCcdetbalgerCriteria->equals($criteria)) {
				$this->collCcdetbalgers = CcdetbalgerPeer::doSelectJoinCcbalger($criteria, $con);
			}
		}
		$this->lastCcdetbalgerCriteria = $criteria;

		return $this->collCcdetbalgers;
	}

} 