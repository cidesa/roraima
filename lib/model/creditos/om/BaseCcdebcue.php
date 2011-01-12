<?php


abstract class BaseCcdebcue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numcue;


	
	protected $monto;


	
	protected $cedrif;


	
	protected $empresa;


	
	protected $numexp;


	
	protected $ccdebban_id;

	
	protected $aCcdebban;

	
	protected $collCcamodebcues;

	
	protected $lastCcamodebcueCriteria = null;

	
	protected $collCcdebcueress;

	
	protected $lastCcdebcueresCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getEmpresa()
  {

    return trim($this->empresa);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCcdebbanId()
  {

    return $this->ccdebban_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdebcuePeer::ID;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CcdebcuePeer::NUMCUE;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdebcuePeer::MONTO;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CcdebcuePeer::CEDRIF;
      }
  
	} 
	
	public function setEmpresa($v)
	{

    if ($this->empresa !== $v) {
        $this->empresa = $v;
        $this->modifiedColumns[] = CcdebcuePeer::EMPRESA;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = CcdebcuePeer::NUMEXP;
      }
  
	} 
	
	public function setCcdebbanId($v)
	{

    if ($this->ccdebban_id !== $v) {
        $this->ccdebban_id = $v;
        $this->modifiedColumns[] = CcdebcuePeer::CCDEBBAN_ID;
      }
  
		if ($this->aCcdebban !== null && $this->aCcdebban->getId() !== $v) {
			$this->aCcdebban = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numcue = $rs->getString($startcol + 1);

      $this->monto = $rs->getFloat($startcol + 2);

      $this->cedrif = $rs->getString($startcol + 3);

      $this->empresa = $rs->getString($startcol + 4);

      $this->numexp = $rs->getString($startcol + 5);

      $this->ccdebban_id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdebcue object", $e);
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
			$con = Propel::getConnection(CcdebcuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdebcuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdebcuePeer::DATABASE_NAME);
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


												
			if ($this->aCcdebban !== null) {
				if ($this->aCcdebban->isModified()) {
					$affectedRows += $this->aCcdebban->save($con);
				}
				$this->setCcdebban($this->aCcdebban);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdebcuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdebcuePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcamodebcues !== null) {
				foreach($this->collCcamodebcues as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdebcueress !== null) {
				foreach($this->collCcdebcueress as $referrerFK) {
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


												
			if ($this->aCcdebban !== null) {
				if (!$this->aCcdebban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdebban->getValidationFailures());
				}
			}


			if (($retval = CcdebcuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcamodebcues !== null) {
					foreach($this->collCcamodebcues as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdebcueress !== null) {
					foreach($this->collCcdebcueress as $referrerFK) {
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
		$pos = CcdebcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumcue();
				break;
			case 2:
				return $this->getMonto();
				break;
			case 3:
				return $this->getCedrif();
				break;
			case 4:
				return $this->getEmpresa();
				break;
			case 5:
				return $this->getNumexp();
				break;
			case 6:
				return $this->getCcdebbanId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdebcuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumcue(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getCedrif(),
			$keys[4] => $this->getEmpresa(),
			$keys[5] => $this->getNumexp(),
			$keys[6] => $this->getCcdebbanId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdebcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumcue($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setCedrif($value);
				break;
			case 4:
				$this->setEmpresa($value);
				break;
			case 5:
				$this->setNumexp($value);
				break;
			case 6:
				$this->setCcdebbanId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdebcuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedrif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmpresa($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumexp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcdebbanId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdebcuePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdebcuePeer::ID)) $criteria->add(CcdebcuePeer::ID, $this->id);
		if ($this->isColumnModified(CcdebcuePeer::NUMCUE)) $criteria->add(CcdebcuePeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CcdebcuePeer::MONTO)) $criteria->add(CcdebcuePeer::MONTO, $this->monto);
		if ($this->isColumnModified(CcdebcuePeer::CEDRIF)) $criteria->add(CcdebcuePeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CcdebcuePeer::EMPRESA)) $criteria->add(CcdebcuePeer::EMPRESA, $this->empresa);
		if ($this->isColumnModified(CcdebcuePeer::NUMEXP)) $criteria->add(CcdebcuePeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(CcdebcuePeer::CCDEBBAN_ID)) $criteria->add(CcdebcuePeer::CCDEBBAN_ID, $this->ccdebban_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdebcuePeer::DATABASE_NAME);

		$criteria->add(CcdebcuePeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setMonto($this->monto);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setEmpresa($this->empresa);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCcdebbanId($this->ccdebban_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamodebcues() as $relObj) {
				$copyObj->addCcamodebcue($relObj->copy($deepCopy));
			}

			foreach($this->getCcdebcueress() as $relObj) {
				$copyObj->addCcdebcueres($relObj->copy($deepCopy));
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
			self::$peer = new CcdebcuePeer();
		}
		return self::$peer;
	}

	
	public function setCcdebban($v)
	{


		if ($v === null) {
			$this->setCcdebbanId(NULL);
		} else {
			$this->setCcdebbanId($v->getId());
		}


		$this->aCcdebban = $v;
	}


	
	public function getCcdebban($con = null)
	{
		if ($this->aCcdebban === null && ($this->ccdebban_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdebbanPeer.php';

      $c = new Criteria();
      $c->add(CcdebbanPeer::ID,$this->ccdebban_id);
      
			$this->aCcdebban = CcdebbanPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdebban;
	}

	
	public function initCcamodebcues()
	{
		if ($this->collCcamodebcues === null) {
			$this->collCcamodebcues = array();
		}
	}

	
	public function getCcamodebcues($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamodebcuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamodebcues === null) {
			if ($this->isNew()) {
			   $this->collCcamodebcues = array();
			} else {

				$criteria->add(CcamodebcuePeer::CCDEBCUE_ID, $this->getId());

				CcamodebcuePeer::addSelectColumns($criteria);
				$this->collCcamodebcues = CcamodebcuePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamodebcuePeer::CCDEBCUE_ID, $this->getId());

				CcamodebcuePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamodebcueCriteria) || !$this->lastCcamodebcueCriteria->equals($criteria)) {
					$this->collCcamodebcues = CcamodebcuePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamodebcueCriteria = $criteria;
		return $this->collCcamodebcues;
	}

	
	public function countCcamodebcues($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamodebcuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamodebcuePeer::CCDEBCUE_ID, $this->getId());

		return CcamodebcuePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamodebcue(Ccamodebcue $l)
	{
		$this->collCcamodebcues[] = $l;
		$l->setCcdebcue($this);
	}


	
	public function getCcamodebcuesJoinCcamoact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamodebcuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamodebcues === null) {
			if ($this->isNew()) {
				$this->collCcamodebcues = array();
			} else {

				$criteria->add(CcamodebcuePeer::CCDEBCUE_ID, $this->getId());

				$this->collCcamodebcues = CcamodebcuePeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamodebcuePeer::CCDEBCUE_ID, $this->getId());

			if (!isset($this->lastCcamodebcueCriteria) || !$this->lastCcamodebcueCriteria->equals($criteria)) {
				$this->collCcamodebcues = CcamodebcuePeer::doSelectJoinCcamoact($criteria, $con);
			}
		}
		$this->lastCcamodebcueCriteria = $criteria;

		return $this->collCcamodebcues;
	}

	
	public function initCcdebcueress()
	{
		if ($this->collCcdebcueress === null) {
			$this->collCcdebcueress = array();
		}
	}

	
	public function getCcdebcueress($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdebcueresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdebcueress === null) {
			if ($this->isNew()) {
			   $this->collCcdebcueress = array();
			} else {

				$criteria->add(CcdebcueresPeer::CCDEBCUE_ID, $this->getId());

				CcdebcueresPeer::addSelectColumns($criteria);
				$this->collCcdebcueress = CcdebcueresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdebcueresPeer::CCDEBCUE_ID, $this->getId());

				CcdebcueresPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdebcueresCriteria) || !$this->lastCcdebcueresCriteria->equals($criteria)) {
					$this->collCcdebcueress = CcdebcueresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdebcueresCriteria = $criteria;
		return $this->collCcdebcueress;
	}

	
	public function countCcdebcueress($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdebcueresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdebcueresPeer::CCDEBCUE_ID, $this->getId());

		return CcdebcueresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdebcueres(Ccdebcueres $l)
	{
		$this->collCcdebcueress[] = $l;
		$l->setCcdebcue($this);
	}


	
	public function getCcdebcueressJoinCcrespue($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdebcueresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdebcueress === null) {
			if ($this->isNew()) {
				$this->collCcdebcueress = array();
			} else {

				$criteria->add(CcdebcueresPeer::CCDEBCUE_ID, $this->getId());

				$this->collCcdebcueress = CcdebcueresPeer::doSelectJoinCcrespue($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdebcueresPeer::CCDEBCUE_ID, $this->getId());

			if (!isset($this->lastCcdebcueresCriteria) || !$this->lastCcdebcueresCriteria->equals($criteria)) {
				$this->collCcdebcueress = CcdebcueresPeer::doSelectJoinCcrespue($criteria, $con);
			}
		}
		$this->lastCcdebcueresCriteria = $criteria;

		return $this->collCcdebcueress;
	}

} 