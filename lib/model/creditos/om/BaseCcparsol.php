<?php


abstract class BaseCcparsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $monto;


	
	protected $ccpartid_id;


	
	protected $ccsolici_id;


	
	protected $ccconcep_id;

	
	protected $aCcpartid;

	
	protected $aCcsolici;

	
	protected $aCcconcep;

	
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
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcconcepId()
  {

    return $this->ccconcep_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparsolPeer::ID;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparsolPeer::MONTO;
      }
  
	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcparsolPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcparsolPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcconcepId($v)
	{

    if ($this->ccconcep_id !== $v) {
        $this->ccconcep_id = $v;
        $this->modifiedColumns[] = CcparsolPeer::CCCONCEP_ID;
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

      $this->ccpartid_id = $rs->getInt($startcol + 2);

      $this->ccsolici_id = $rs->getInt($startcol + 3);

      $this->ccconcep_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparsol object", $e);
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
			$con = Propel::getConnection(CcparsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparsolPeer::DATABASE_NAME);
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


												
			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCcconcep !== null) {
				if ($this->aCcconcep->isModified()) {
					$affectedRows += $this->aCcconcep->save($con);
				}
				$this->setCcconcep($this->aCcconcep);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcparsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparsolPeer::doUpdate($this, $con);
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


												
			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCcconcep !== null) {
				if (!$this->aCcconcep->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcconcep->getValidationFailures());
				}
			}


			if (($retval = CcparsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCcpartidId();
				break;
			case 3:
				return $this->getCcsoliciId();
				break;
			case 4:
				return $this->getCcconcepId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMonto(),
			$keys[2] => $this->getCcpartidId(),
			$keys[3] => $this->getCcsoliciId(),
			$keys[4] => $this->getCcconcepId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCcpartidId($value);
				break;
			case 3:
				$this->setCcsoliciId($value);
				break;
			case 4:
				$this->setCcconcepId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcpartidId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcsoliciId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcconcepId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparsolPeer::ID)) $criteria->add(CcparsolPeer::ID, $this->id);
		if ($this->isColumnModified(CcparsolPeer::MONTO)) $criteria->add(CcparsolPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CcparsolPeer::CCPARTID_ID)) $criteria->add(CcparsolPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcparsolPeer::CCSOLICI_ID)) $criteria->add(CcparsolPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcparsolPeer::CCCONCEP_ID)) $criteria->add(CcparsolPeer::CCCONCEP_ID, $this->ccconcep_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparsolPeer::DATABASE_NAME);

		$criteria->add(CcparsolPeer::ID, $this->id);

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

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);

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
			self::$peer = new CcparsolPeer();
		}
		return self::$peer;
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

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
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