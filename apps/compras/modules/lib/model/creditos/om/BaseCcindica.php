<?php


abstract class BaseCcindica extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomind;


	
	protected $formula;


	
	protected $unidad;


	
	protected $codigo;


	
	protected $operandos;

	
	protected $collCcindbalgers;

	
	protected $lastCcindbalgerCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomind()
  {

    return trim($this->nomind);

  }
  
  public function getFormula()
  {

    return trim($this->formula);

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getCodigo()
  {

    return trim($this->codigo);

  }
  
  public function getOperandos()
  {

    return trim($this->operandos);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcindicaPeer::ID;
      }
  
	} 
	
	public function setNomind($v)
	{

    if ($this->nomind !== $v) {
        $this->nomind = $v;
        $this->modifiedColumns[] = CcindicaPeer::NOMIND;
      }
  
	} 
	
	public function setFormula($v)
	{

    if ($this->formula !== $v) {
        $this->formula = $v;
        $this->modifiedColumns[] = CcindicaPeer::FORMULA;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = CcindicaPeer::UNIDAD;
      }
  
	} 
	
	public function setCodigo($v)
	{

    if ($this->codigo !== $v) {
        $this->codigo = $v;
        $this->modifiedColumns[] = CcindicaPeer::CODIGO;
      }
  
	} 
	
	public function setOperandos($v)
	{

    if ($this->operandos !== $v) {
        $this->operandos = $v;
        $this->modifiedColumns[] = CcindicaPeer::OPERANDOS;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomind = $rs->getString($startcol + 1);

      $this->formula = $rs->getString($startcol + 2);

      $this->unidad = $rs->getString($startcol + 3);

      $this->codigo = $rs->getString($startcol + 4);

      $this->operandos = $rs->getString($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccindica object", $e);
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
			$con = Propel::getConnection(CcindicaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcindicaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcindicaPeer::DATABASE_NAME);
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
					$pk = CcindicaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcindicaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcindbalgers !== null) {
				foreach($this->collCcindbalgers as $referrerFK) {
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


			if (($retval = CcindicaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcindbalgers !== null) {
					foreach($this->collCcindbalgers as $referrerFK) {
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
		$pos = CcindicaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomind();
				break;
			case 2:
				return $this->getFormula();
				break;
			case 3:
				return $this->getUnidad();
				break;
			case 4:
				return $this->getCodigo();
				break;
			case 5:
				return $this->getOperandos();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcindicaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomind(),
			$keys[2] => $this->getFormula(),
			$keys[3] => $this->getUnidad(),
			$keys[4] => $this->getCodigo(),
			$keys[5] => $this->getOperandos(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcindicaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomind($value);
				break;
			case 2:
				$this->setFormula($value);
				break;
			case 3:
				$this->setUnidad($value);
				break;
			case 4:
				$this->setCodigo($value);
				break;
			case 5:
				$this->setOperandos($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcindicaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomind($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFormula($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUnidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodigo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOperandos($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcindicaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcindicaPeer::ID)) $criteria->add(CcindicaPeer::ID, $this->id);
		if ($this->isColumnModified(CcindicaPeer::NOMIND)) $criteria->add(CcindicaPeer::NOMIND, $this->nomind);
		if ($this->isColumnModified(CcindicaPeer::FORMULA)) $criteria->add(CcindicaPeer::FORMULA, $this->formula);
		if ($this->isColumnModified(CcindicaPeer::UNIDAD)) $criteria->add(CcindicaPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(CcindicaPeer::CODIGO)) $criteria->add(CcindicaPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(CcindicaPeer::OPERANDOS)) $criteria->add(CcindicaPeer::OPERANDOS, $this->operandos);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcindicaPeer::DATABASE_NAME);

		$criteria->add(CcindicaPeer::ID, $this->id);

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

		$copyObj->setNomind($this->nomind);

		$copyObj->setFormula($this->formula);

		$copyObj->setUnidad($this->unidad);

		$copyObj->setCodigo($this->codigo);

		$copyObj->setOperandos($this->operandos);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcindbalgers() as $relObj) {
				$copyObj->addCcindbalger($relObj->copy($deepCopy));
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
			self::$peer = new CcindicaPeer();
		}
		return self::$peer;
	}

	
	public function initCcindbalgers()
	{
		if ($this->collCcindbalgers === null) {
			$this->collCcindbalgers = array();
		}
	}

	
	public function getCcindbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcindbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcindbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcindbalgers = array();
			} else {

				$criteria->add(CcindbalgerPeer::CCINDICA_ID, $this->getId());

				CcindbalgerPeer::addSelectColumns($criteria);
				$this->collCcindbalgers = CcindbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcindbalgerPeer::CCINDICA_ID, $this->getId());

				CcindbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcindbalgerCriteria) || !$this->lastCcindbalgerCriteria->equals($criteria)) {
					$this->collCcindbalgers = CcindbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcindbalgerCriteria = $criteria;
		return $this->collCcindbalgers;
	}

	
	public function countCcindbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcindbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcindbalgerPeer::CCINDICA_ID, $this->getId());

		return CcindbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcindbalger(Ccindbalger $l)
	{
		$this->collCcindbalgers[] = $l;
		$l->setCcindica($this);
	}


	
	public function getCcindbalgersJoinCcbalger($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcindbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcindbalgers === null) {
			if ($this->isNew()) {
				$this->collCcindbalgers = array();
			} else {

				$criteria->add(CcindbalgerPeer::CCINDICA_ID, $this->getId());

				$this->collCcindbalgers = CcindbalgerPeer::doSelectJoinCcbalger($criteria, $con);
			}
		} else {
									
			$criteria->add(CcindbalgerPeer::CCINDICA_ID, $this->getId());

			if (!isset($this->lastCcindbalgerCriteria) || !$this->lastCcindbalgerCriteria->equals($criteria)) {
				$this->collCcindbalgers = CcindbalgerPeer::doSelectJoinCcbalger($criteria, $con);
			}
		}
		$this->lastCcindbalgerCriteria = $criteria;

		return $this->collCcindbalgers;
	}

} 