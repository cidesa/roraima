<?php


abstract class BaseCcparcrecon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $monto;


	
	protected $ccparcre_id;


	
	protected $ccconcep_id;

	
	protected $aCcparcre;

	
	protected $aCcconcep;

	
	protected $collCcvehcreparcons;

	
	protected $lastCcvehcreparconCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getCcparcreId()
  {

    return $this->ccparcre_id;

  }
  
  public function getCcconcepId()
  {

    return $this->ccconcep_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparcreconPeer::ID;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparcreconPeer::MONTO;
      }
  
	} 
	
	public function setCcparcreId($v)
	{

    if ($this->ccparcre_id !== $v) {
        $this->ccparcre_id = $v;
        $this->modifiedColumns[] = CcparcreconPeer::CCPARCRE_ID;
      }
  
		if ($this->aCcparcre !== null && $this->aCcparcre->getId() !== $v) {
			$this->aCcparcre = null;
		}

	} 
	
	public function setCcconcepId($v)
	{

    if ($this->ccconcep_id !== $v) {
        $this->ccconcep_id = $v;
        $this->modifiedColumns[] = CcparcreconPeer::CCCONCEP_ID;
      }
  
		if ($this->aCcconcep !== null && $this->aCcconcep->getId() !== $v) {
			$this->aCcconcep = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->monto = $rs->getFloat($startcol + 1);

      $this->ccparcre_id = $rs->getInt($startcol + 2);

      $this->ccconcep_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparcrecon object", $e);
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
			$con = Propel::getConnection(CcparcreconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparcreconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparcreconPeer::DATABASE_NAME);
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


												
			if ($this->aCcparcre !== null) {
				if ($this->aCcparcre->isModified()) {
					$affectedRows += $this->aCcparcre->save($con);
				}
				$this->setCcparcre($this->aCcparcre);
			}

			if ($this->aCcconcep !== null) {
				if ($this->aCcconcep->isModified()) {
					$affectedRows += $this->aCcconcep->save($con);
				}
				$this->setCcconcep($this->aCcconcep);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcparcreconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparcreconPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcvehcreparcons !== null) {
				foreach($this->collCcvehcreparcons as $referrerFK) {
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


												
			if ($this->aCcparcre !== null) {
				if (!$this->aCcparcre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparcre->getValidationFailures());
				}
			}

			if ($this->aCcconcep !== null) {
				if (!$this->aCcconcep->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcconcep->getValidationFailures());
				}
			}


			if (($retval = CcparcreconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcvehcreparcons !== null) {
					foreach($this->collCcvehcreparcons as $referrerFK) {
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
		$pos = CcparcreconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMonto();
				break;
			case 2:
				return $this->getCcparcreId();
				break;
			case 3:
				return $this->getCcconcepId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparcreconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMonto(),
			$keys[2] => $this->getCcparcreId(),
			$keys[3] => $this->getCcconcepId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparcreconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMonto($value);
				break;
			case 2:
				$this->setCcparcreId($value);
				break;
			case 3:
				$this->setCcconcepId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparcreconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcparcreId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcconcepId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparcreconPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparcreconPeer::ID)) $criteria->add(CcparcreconPeer::ID, $this->id);
		if ($this->isColumnModified(CcparcreconPeer::MONTO)) $criteria->add(CcparcreconPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CcparcreconPeer::CCPARCRE_ID)) $criteria->add(CcparcreconPeer::CCPARCRE_ID, $this->ccparcre_id);
		if ($this->isColumnModified(CcparcreconPeer::CCCONCEP_ID)) $criteria->add(CcparcreconPeer::CCCONCEP_ID, $this->ccconcep_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparcreconPeer::DATABASE_NAME);

		$criteria->add(CcparcreconPeer::ID, $this->id);

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

		$copyObj->setMonto($this->monto);

		$copyObj->setCcparcreId($this->ccparcre_id);

		$copyObj->setCcconcepId($this->ccconcep_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcvehcreparcons() as $relObj) {
				$copyObj->addCcvehcreparcon($relObj->copy($deepCopy));
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
			self::$peer = new CcparcreconPeer();
		}
		return self::$peer;
	}

	
	public function setCcparcre($v)
	{


		if ($v === null) {
			$this->setCcparcreId(NULL);
		} else {
			$this->setCcparcreId($v->getId());
		}


		$this->aCcparcre = $v;
	}


	
	public function getCcparcre($con = null)
	{
		if ($this->aCcparcre === null && ($this->ccparcre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';

      $c = new Criteria();
      $c->add(CcparcrePeer::ID,$this->ccparcre_id);
      
			$this->aCcparcre = CcparcrePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparcre;
	}

	
	public function setCcconcep($v)
	{


		if ($v === null) {
			$this->setCcconcepId(NULL);
		} else {
			$this->setCcconcepId($v->getId());
		}


		$this->aCcconcep = $v;
	}


	
	public function getCcconcep($con = null)
	{
		if ($this->aCcconcep === null && ($this->ccconcep_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcconcepPeer.php';

      $c = new Criteria();
      $c->add(CcconcepPeer::ID,$this->ccconcep_id);
      
			$this->aCcconcep = CcconcepPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcconcep;
	}

	
	public function initCcvehcreparcons()
	{
		if ($this->collCcvehcreparcons === null) {
			$this->collCcvehcreparcons = array();
		}
	}

	
	public function getCcvehcreparcons($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvehcreparconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvehcreparcons === null) {
			if ($this->isNew()) {
			   $this->collCcvehcreparcons = array();
			} else {

				$criteria->add(CcvehcreparconPeer::CCPARCRECON_ID, $this->getId());

				CcvehcreparconPeer::addSelectColumns($criteria);
				$this->collCcvehcreparcons = CcvehcreparconPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcvehcreparconPeer::CCPARCRECON_ID, $this->getId());

				CcvehcreparconPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcvehcreparconCriteria) || !$this->lastCcvehcreparconCriteria->equals($criteria)) {
					$this->collCcvehcreparcons = CcvehcreparconPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcvehcreparconCriteria = $criteria;
		return $this->collCcvehcreparcons;
	}

	
	public function countCcvehcreparcons($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvehcreparconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcvehcreparconPeer::CCPARCRECON_ID, $this->getId());

		return CcvehcreparconPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcvehcreparcon(Ccvehcreparcon $l)
	{
		$this->collCcvehcreparcons[] = $l;
		$l->setCcparcrecon($this);
	}


	
	public function getCcvehcreparconsJoinCcvehicu($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcvehcreparconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcvehcreparcons === null) {
			if ($this->isNew()) {
				$this->collCcvehcreparcons = array();
			} else {

				$criteria->add(CcvehcreparconPeer::CCPARCRECON_ID, $this->getId());

				$this->collCcvehcreparcons = CcvehcreparconPeer::doSelectJoinCcvehicu($criteria, $con);
			}
		} else {
									
			$criteria->add(CcvehcreparconPeer::CCPARCRECON_ID, $this->getId());

			if (!isset($this->lastCcvehcreparconCriteria) || !$this->lastCcvehcreparconCriteria->equals($criteria)) {
				$this->collCcvehcreparcons = CcvehcreparconPeer::doSelectJoinCcvehicu($criteria, $con);
			}
		}
		$this->lastCcvehcreparconCriteria = $criteria;

		return $this->collCcvehcreparcons;
	}

} 