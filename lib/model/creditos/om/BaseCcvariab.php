<?php


abstract class BaseCcvariab extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomvar;


	
	protected $tipo;


	
	protected $valor;


	
	protected $abrevi;

	
	protected $collCcconbalgers;

	
	protected $lastCcconbalgerCriteria = null;

	
	protected $collCcvarbalgers;

	
	protected $lastCcvarbalgerCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomvar()
  {

    return trim($this->nomvar);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getValor($val=false)
  {

    if($val) return number_format($this->valor,2,',','.');
    else return $this->valor;

  }
  
  public function getAbrevi()
  {

    return trim($this->abrevi);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcvariabPeer::ID;
      }
  
	} 
	
	public function setNomvar($v)
	{

    if ($this->nomvar !== $v) {
        $this->nomvar = $v;
        $this->modifiedColumns[] = CcvariabPeer::NOMVAR;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CcvariabPeer::TIPO;
      }
  
	} 
	
	public function setValor($v)
	{

    if ($this->valor !== $v) {
        $this->valor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcvariabPeer::VALOR;
      }
  
	} 
	
	public function setAbrevi($v)
	{

    if ($this->abrevi !== $v) {
        $this->abrevi = $v;
        $this->modifiedColumns[] = CcvariabPeer::ABREVI;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomvar = $rs->getString($startcol + 1);

      $this->tipo = $rs->getString($startcol + 2);

      $this->valor = $rs->getFloat($startcol + 3);

      $this->abrevi = $rs->getString($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccvariab object", $e);
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
			$con = Propel::getConnection(CcvariabPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcvariabPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcvariabPeer::DATABASE_NAME);
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
					$pk = CcvariabPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcvariabPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcconbalgers !== null) {
				foreach($this->collCcconbalgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcvarbalgers !== null) {
				foreach($this->collCcvarbalgers as $referrerFK) {
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


			if (($retval = CcvariabPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcconbalgers !== null) {
					foreach($this->collCcconbalgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcvarbalgers !== null) {
					foreach($this->collCcvarbalgers as $referrerFK) {
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
		$pos = CcvariabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomvar();
				break;
			case 2:
				return $this->getTipo();
				break;
			case 3:
				return $this->getValor();
				break;
			case 4:
				return $this->getAbrevi();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvariabPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomvar(),
			$keys[2] => $this->getTipo(),
			$keys[3] => $this->getValor(),
			$keys[4] => $this->getAbrevi(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcvariabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomvar($value);
				break;
			case 2:
				$this->setTipo($value);
				break;
			case 3:
				$this->setValor($value);
				break;
			case 4:
				$this->setAbrevi($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcvariabPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomvar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAbrevi($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcvariabPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcvariabPeer::ID)) $criteria->add(CcvariabPeer::ID, $this->id);
		if ($this->isColumnModified(CcvariabPeer::NOMVAR)) $criteria->add(CcvariabPeer::NOMVAR, $this->nomvar);
		if ($this->isColumnModified(CcvariabPeer::TIPO)) $criteria->add(CcvariabPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CcvariabPeer::VALOR)) $criteria->add(CcvariabPeer::VALOR, $this->valor);
		if ($this->isColumnModified(CcvariabPeer::ABREVI)) $criteria->add(CcvariabPeer::ABREVI, $this->abrevi);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcvariabPeer::DATABASE_NAME);

		$criteria->add(CcvariabPeer::ID, $this->id);

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

		$copyObj->setNomvar($this->nomvar);

		$copyObj->setTipo($this->tipo);

		$copyObj->setValor($this->valor);

		$copyObj->setAbrevi($this->abrevi);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcconbalgers() as $relObj) {
				$copyObj->addCcconbalger($relObj->copy($deepCopy));
			}

			foreach($this->getCcvarbalgers() as $relObj) {
				$copyObj->addCcvarbalger($relObj->copy($deepCopy));
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
			self::$peer = new CcvariabPeer();
		}
		return self::$peer;
	}

	
	public function initCcconbalgers()
	{
		if ($this->collCcconbalgers === null) {
			$this->collCcconbalgers = array();
		}
	}

	
	public function getCcconbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcconbalgers = array();
			} else {

				$criteria->add(CcconbalgerPeer::CCVARIAB_ID, $this->getId());

				CcconbalgerPeer::addSelectColumns($criteria);
				$this->collCcconbalgers = CcconbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconbalgerPeer::CCVARIAB_ID, $this->getId());

				CcconbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconbalgerCriteria) || !$this->lastCcconbalgerCriteria->equals($criteria)) {
					$this->collCcconbalgers = CcconbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconbalgerCriteria = $criteria;
		return $this->collCcconbalgers;
	}

	
	public function countCcconbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconbalgerPeer::CCVARIAB_ID, $this->getId());

		return CcconbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconbalger(Ccconbalger $l)
	{
		$this->collCcconbalgers[] = $l;
		$l->setCcvariab($this);
	}

	
	public function initCcvarbalgers()
	{
		if ($this->collCcvarbalgers === null) {
			$this->collCcvarbalgers = array();
		}
	}

	
	public function getCcvarbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvarbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvarbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcvarbalgers = array();
			} else {

				$criteria->add(CcvarbalgerPeer::CCVARIAB_ID, $this->getId());

				CcvarbalgerPeer::addSelectColumns($criteria);
				$this->collCcvarbalgers = CcvarbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcvarbalgerPeer::CCVARIAB_ID, $this->getId());

				CcvarbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcvarbalgerCriteria) || !$this->lastCcvarbalgerCriteria->equals($criteria)) {
					$this->collCcvarbalgers = CcvarbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcvarbalgerCriteria = $criteria;
		return $this->collCcvarbalgers;
	}

	
	public function countCcvarbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvarbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcvarbalgerPeer::CCVARIAB_ID, $this->getId());

		return CcvarbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcvarbalger(Ccvarbalger $l)
	{
		$this->collCcvarbalgers[] = $l;
		$l->setCcvariab($this);
	}


	
	public function getCcvarbalgersJoinCcbalger($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvarbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvarbalgers === null) {
			if ($this->isNew()) {
				$this->collCcvarbalgers = array();
			} else {

				$criteria->add(CcvarbalgerPeer::CCVARIAB_ID, $this->getId());

				$this->collCcvarbalgers = CcvarbalgerPeer::doSelectJoinCcbalger($criteria, $con);
			}
		} else {
									
			$criteria->add(CcvarbalgerPeer::CCVARIAB_ID, $this->getId());

			if (!isset($this->lastCcvarbalgerCriteria) || !$this->lastCcvarbalgerCriteria->equals($criteria)) {
				$this->collCcvarbalgers = CcvarbalgerPeer::doSelectJoinCcbalger($criteria, $con);
			}
		}
		$this->lastCcvarbalgerCriteria = $criteria;

		return $this->collCcvarbalgers;
	}

} 