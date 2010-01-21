<?php


abstract class BaseCcconcre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $montot;


	
	protected $cccredit_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;


	
	protected $ccconcep_id;

	
	protected $aCccredit;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
	protected $aCcconcep;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
  
  public function getCcconcepId()
  {

    return $this->ccconcep_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcconcrePeer::ID;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcconcrePeer::MONTOT;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcconcrePeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcconcrePeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcconcrePeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
	
	public function setCcconcepId($v)
	{

    if ($this->ccconcep_id !== $v) {
        $this->ccconcep_id = $v;
        $this->modifiedColumns[] = CcconcrePeer::CCCONCEP_ID;
      }
  
		if ($this->aCcconcep !== null && $this->aCcconcep->getId() !== $v) {
			$this->aCcconcep = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->montot = $rs->getFloat($startcol + 1);

      $this->cccredit_id = $rs->getInt($startcol + 2);

      $this->ccpartid_id = $rs->getInt($startcol + 3);

      $this->ccprogra_id = $rs->getInt($startcol + 4);

      $this->ccconcep_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccconcre object", $e);
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
			$con = Propel::getConnection(CcconcrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcconcrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcconcrePeer::DATABASE_NAME);
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


												
			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}

			if ($this->aCcconcep !== null) {
				if ($this->aCcconcep->isModified()) {
					$affectedRows += $this->aCcconcep->save($con);
				}
				$this->setCcconcep($this->aCcconcep);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcconcrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcconcrePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}

			if ($this->aCcconcep !== null) {
				if (!$this->aCcconcep->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcconcep->getValidationFailures());
				}
			}


			if (($retval = CcconcrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMontot();
				break;
			case 2:
				return $this->getCccreditId();
				break;
			case 3:
				return $this->getCcpartidId();
				break;
			case 4:
				return $this->getCcprograId();
				break;
			case 5:
				return $this->getCcconcepId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconcrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMontot(),
			$keys[2] => $this->getCccreditId(),
			$keys[3] => $this->getCcpartidId(),
			$keys[4] => $this->getCcprograId(),
			$keys[5] => $this->getCcconcepId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMontot($value);
				break;
			case 2:
				$this->setCccreditId($value);
				break;
			case 3:
				$this->setCcpartidId($value);
				break;
			case 4:
				$this->setCcprograId($value);
				break;
			case 5:
				$this->setCcconcepId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconcrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMontot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCccreditId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcpartidId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcprograId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcconcepId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcconcrePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcconcrePeer::ID)) $criteria->add(CcconcrePeer::ID, $this->id);
		if ($this->isColumnModified(CcconcrePeer::MONTOT)) $criteria->add(CcconcrePeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CcconcrePeer::CCCREDIT_ID)) $criteria->add(CcconcrePeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcconcrePeer::CCPARTID_ID)) $criteria->add(CcconcrePeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcconcrePeer::CCPROGRA_ID)) $criteria->add(CcconcrePeer::CCPROGRA_ID, $this->ccprogra_id);
		if ($this->isColumnModified(CcconcrePeer::CCCONCEP_ID)) $criteria->add(CcconcrePeer::CCCONCEP_ID, $this->ccconcep_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcconcrePeer::DATABASE_NAME);

		$criteria->add(CcconcrePeer::ID, $this->id);

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

		$copyObj->setMontot($this->montot);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);

		$copyObj->setCcconcepId($this->ccconcep_id);


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
			self::$peer = new CcconcrePeer();
		}
		return self::$peer;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
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

} 