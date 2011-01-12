<?php


abstract class BaseAtfacturas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $numfac;


	
	protected $basimp;


	
	protected $iva;


	
	protected $exentos;


	
	protected $total;


	
	protected $nrospd;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getBasimp($val=false)
  {

    if($val) return number_format($this->basimp,2,',','.');
    else return $this->basimp;

  }
  
  public function getIva($val=false)
  {

    if($val) return number_format($this->iva,2,',','.');
    else return $this->iva;

  }
  
  public function getExentos($val=false)
  {

    if($val) return number_format($this->exentos,2,',','.');
    else return $this->exentos;

  }
  
  public function getTotal($val=false)
  {

    if($val) return number_format($this->total,2,',','.');
    else return $this->total;

  }
  
  public function getNrospd()
  {

    return trim($this->nrospd);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtfacturasPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = AtfacturasPeer::NUMFAC;
      }
  
	} 
	
	public function setBasimp($v)
	{

    if ($this->basimp !== $v) {
        $this->basimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtfacturasPeer::BASIMP;
      }
  
	} 
	
	public function setIva($v)
	{

    if ($this->iva !== $v) {
        $this->iva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtfacturasPeer::IVA;
      }
  
	} 
	
	public function setExentos($v)
	{

    if ($this->exentos !== $v) {
        $this->exentos = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtfacturasPeer::EXENTOS;
      }
  
	} 
	
	public function setTotal($v)
	{

    if ($this->total !== $v) {
        $this->total = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtfacturasPeer::TOTAL;
      }
  
	} 
	
	public function setNrospd($v)
	{

    if ($this->nrospd !== $v) {
        $this->nrospd = $v;
        $this->modifiedColumns[] = AtfacturasPeer::NROSPD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtfacturasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->numfac = $rs->getString($startcol + 1);

      $this->basimp = $rs->getFloat($startcol + 2);

      $this->iva = $rs->getFloat($startcol + 3);

      $this->exentos = $rs->getFloat($startcol + 4);

      $this->total = $rs->getFloat($startcol + 5);

      $this->nrospd = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atfacturas object", $e);
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
			$con = Propel::getConnection(AtfacturasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtfacturasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtfacturasPeer::DATABASE_NAME);
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


												
			if ($this->aAtayudas !== null) {
				if ($this->aAtayudas->isModified()) {
					$affectedRows += $this->aAtayudas->save($con);
				}
				$this->setAtayudas($this->aAtayudas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtfacturasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtfacturasPeer::doUpdate($this, $con);
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


												
			if ($this->aAtayudas !== null) {
				if (!$this->aAtayudas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtayudas->getValidationFailures());
				}
			}


			if (($retval = AtfacturasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtfacturasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getNumfac();
				break;
			case 2:
				return $this->getBasimp();
				break;
			case 3:
				return $this->getIva();
				break;
			case 4:
				return $this->getExentos();
				break;
			case 5:
				return $this->getTotal();
				break;
			case 6:
				return $this->getNrospd();
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
		$keys = AtfacturasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getNumfac(),
			$keys[2] => $this->getBasimp(),
			$keys[3] => $this->getIva(),
			$keys[4] => $this->getExentos(),
			$keys[5] => $this->getTotal(),
			$keys[6] => $this->getNrospd(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtfacturasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setNumfac($value);
				break;
			case 2:
				$this->setBasimp($value);
				break;
			case 3:
				$this->setIva($value);
				break;
			case 4:
				$this->setExentos($value);
				break;
			case 5:
				$this->setTotal($value);
				break;
			case 6:
				$this->setNrospd($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtfacturasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBasimp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIva($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setExentos($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNrospd($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtfacturasPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtfacturasPeer::ATAYUDAS_ID)) $criteria->add(AtfacturasPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtfacturasPeer::NUMFAC)) $criteria->add(AtfacturasPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(AtfacturasPeer::BASIMP)) $criteria->add(AtfacturasPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(AtfacturasPeer::IVA)) $criteria->add(AtfacturasPeer::IVA, $this->iva);
		if ($this->isColumnModified(AtfacturasPeer::EXENTOS)) $criteria->add(AtfacturasPeer::EXENTOS, $this->exentos);
		if ($this->isColumnModified(AtfacturasPeer::TOTAL)) $criteria->add(AtfacturasPeer::TOTAL, $this->total);
		if ($this->isColumnModified(AtfacturasPeer::NROSPD)) $criteria->add(AtfacturasPeer::NROSPD, $this->nrospd);
		if ($this->isColumnModified(AtfacturasPeer::ID)) $criteria->add(AtfacturasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtfacturasPeer::DATABASE_NAME);

		$criteria->add(AtfacturasPeer::ID, $this->id);

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

		$copyObj->setAtayudasId($this->atayudas_id);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setIva($this->iva);

		$copyObj->setExentos($this->exentos);

		$copyObj->setTotal($this->total);

		$copyObj->setNrospd($this->nrospd);


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
			self::$peer = new AtfacturasPeer();
		}
		return self::$peer;
	}

	
	public function setAtayudas($v)
	{


		if ($v === null) {
			$this->setAtayudasId(NULL);
		} else {
			$this->setAtayudasId($v->getId());
		}


		$this->aAtayudas = $v;
	}


	
	public function getAtayudas($con = null)
	{
		if ($this->aAtayudas === null && ($this->atayudas_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';

      $c = new Criteria();
      $c->add(AtayudasPeer::ID,$this->atayudas_id);
      
			$this->aAtayudas = AtayudasPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtayudas;
	}

} 