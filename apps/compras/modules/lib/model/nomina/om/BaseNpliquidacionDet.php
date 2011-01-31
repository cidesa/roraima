<?php


abstract class BaseNpliquidacionDet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $concepto;


	
	protected $monto;


	
	protected $asided;


	
	protected $numreg;


	
	protected $codpre;


	
	protected $codcon;


	
	protected $numord;


	
	protected $dias;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getConcepto()
  {

    return trim($this->concepto);

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getAsided()
  {

    return trim($this->asided);

  }
  
  public function getNumreg($val=false)
  {

    if($val) return number_format($this->numreg,2,',','.');
    else return $this->numreg;

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getDias($val=false)
  {

    if($val) return number_format($this->dias,2,',','.');
    else return $this->dias;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::CODEMP;
      }
  
	} 
	
	public function setConcepto($v)
	{

    if ($this->concepto !== $v) {
        $this->concepto = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::CONCEPTO;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpliquidacionDetPeer::MONTO;
      }
  
	} 
	
	public function setAsided($v)
	{

    if ($this->asided !== $v) {
        $this->asided = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::ASIDED;
      }
  
	} 
	
	public function setNumreg($v)
	{

    if ($this->numreg !== $v) {
        $this->numreg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpliquidacionDetPeer::NUMREG;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::CODPRE;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::CODCON;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::NUMORD;
      }
  
	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpliquidacionDetPeer::DIAS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpliquidacionDetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->concepto = $rs->getString($startcol + 1);

      $this->monto = $rs->getFloat($startcol + 2);

      $this->asided = $rs->getString($startcol + 3);

      $this->numreg = $rs->getFloat($startcol + 4);

      $this->codpre = $rs->getString($startcol + 5);

      $this->codcon = $rs->getString($startcol + 6);

      $this->numord = $rs->getString($startcol + 7);

      $this->dias = $rs->getFloat($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating NpliquidacionDet object", $e);
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
			$con = Propel::getConnection(NpliquidacionDetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpliquidacionDetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpliquidacionDetPeer::DATABASE_NAME);
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
					$pk = NpliquidacionDetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpliquidacionDetPeer::doUpdate($this, $con);
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


			if (($retval = NpliquidacionDetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpliquidacionDetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getConcepto();
				break;
			case 2:
				return $this->getMonto();
				break;
			case 3:
				return $this->getAsided();
				break;
			case 4:
				return $this->getNumreg();
				break;
			case 5:
				return $this->getCodpre();
				break;
			case 6:
				return $this->getCodcon();
				break;
			case 7:
				return $this->getNumord();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpliquidacionDetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getConcepto(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getAsided(),
			$keys[4] => $this->getNumreg(),
			$keys[5] => $this->getCodpre(),
			$keys[6] => $this->getCodcon(),
			$keys[7] => $this->getNumord(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpliquidacionDetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setConcepto($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setAsided($value);
				break;
			case 4:
				$this->setNumreg($value);
				break;
			case 5:
				$this->setCodpre($value);
				break;
			case 6:
				$this->setCodcon($value);
				break;
			case 7:
				$this->setNumord($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpliquidacionDetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setConcepto($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAsided($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpliquidacionDetPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpliquidacionDetPeer::CODEMP)) $criteria->add(NpliquidacionDetPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpliquidacionDetPeer::CONCEPTO)) $criteria->add(NpliquidacionDetPeer::CONCEPTO, $this->concepto);
		if ($this->isColumnModified(NpliquidacionDetPeer::MONTO)) $criteria->add(NpliquidacionDetPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpliquidacionDetPeer::ASIDED)) $criteria->add(NpliquidacionDetPeer::ASIDED, $this->asided);
		if ($this->isColumnModified(NpliquidacionDetPeer::NUMREG)) $criteria->add(NpliquidacionDetPeer::NUMREG, $this->numreg);
		if ($this->isColumnModified(NpliquidacionDetPeer::CODPRE)) $criteria->add(NpliquidacionDetPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NpliquidacionDetPeer::CODCON)) $criteria->add(NpliquidacionDetPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpliquidacionDetPeer::NUMORD)) $criteria->add(NpliquidacionDetPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(NpliquidacionDetPeer::DIAS)) $criteria->add(NpliquidacionDetPeer::DIAS, $this->dias);
		if ($this->isColumnModified(NpliquidacionDetPeer::ID)) $criteria->add(NpliquidacionDetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpliquidacionDetPeer::DATABASE_NAME);

		$criteria->add(NpliquidacionDetPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setConcepto($this->concepto);

		$copyObj->setMonto($this->monto);

		$copyObj->setAsided($this->asided);

		$copyObj->setNumreg($this->numreg);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumord($this->numord);

		$copyObj->setDias($this->dias);


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
			self::$peer = new NpliquidacionDetPeer();
		}
		return self::$peer;
	}

} 