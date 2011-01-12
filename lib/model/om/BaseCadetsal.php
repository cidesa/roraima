<?php


abstract class BaseCadetsal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsal;


	
	protected $codart;


	
	protected $cantot;


	
	protected $totart;


	
	protected $cosart;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $numjau;


	
	protected $tammet;


	
	protected $numlot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsal()
  {

    return trim($this->codsal);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCantot($val=false)
  {

    if($val) return number_format($this->cantot,2,',','.');
    else return $this->cantot;

  }
  
  public function getTotart($val=false)
  {

    if($val) return number_format($this->totart,2,',','.');
    else return $this->totart;

  }
  
  public function getCosart($val=false)
  {

    if($val) return number_format($this->cosart,2,',','.');
    else return $this->cosart;

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getNumjau($val=false)
  {

    if($val) return number_format($this->numjau,2,',','.');
    else return $this->numjau;

  }
  
  public function getTammet($val=false)
  {

    if($val) return number_format($this->tammet,2,',','.');
    else return $this->tammet;

  }
  
  public function getNumlot()
  {

    return trim($this->numlot);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodsal($v)
	{

    if ($this->codsal !== $v) {
        $this->codsal = $v;
        $this->modifiedColumns[] = CadetsalPeer::CODSAL;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CadetsalPeer::CODART;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetsalPeer::CANTOT;
      }
  
	} 
	
	public function setTotart($v)
	{

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetsalPeer::TOTART;
      }
  
	} 
	
	public function setCosart($v)
	{

    if ($this->cosart !== $v) {
        $this->cosart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetsalPeer::COSART;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadetsalPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CadetsalPeer::CODUBI;
      }
  
	} 
	
	public function setNumjau($v)
	{

    if ($this->numjau !== $v) {
        $this->numjau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetsalPeer::NUMJAU;
      }
  
	} 
	
	public function setTammet($v)
	{

    if ($this->tammet !== $v) {
        $this->tammet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetsalPeer::TAMMET;
      }
  
	} 
	
	public function setNumlot($v)
	{

    if ($this->numlot !== $v) {
        $this->numlot = $v;
        $this->modifiedColumns[] = CadetsalPeer::NUMLOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetsalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsal = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->cantot = $rs->getFloat($startcol + 2);

      $this->totart = $rs->getFloat($startcol + 3);

      $this->cosart = $rs->getFloat($startcol + 4);

      $this->codalm = $rs->getString($startcol + 5);

      $this->codubi = $rs->getString($startcol + 6);

      $this->numjau = $rs->getFloat($startcol + 7);

      $this->tammet = $rs->getFloat($startcol + 8);

      $this->numlot = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetsal object", $e);
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
			$con = Propel::getConnection(CadetsalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetsalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetsalPeer::DATABASE_NAME);
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
					$pk = CadetsalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetsalPeer::doUpdate($this, $con);
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


			if (($retval = CadetsalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsal();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCantot();
				break;
			case 3:
				return $this->getTotart();
				break;
			case 4:
				return $this->getCosart();
				break;
			case 5:
				return $this->getCodalm();
				break;
			case 6:
				return $this->getCodubi();
				break;
			case 7:
				return $this->getNumjau();
				break;
			case 8:
				return $this->getTammet();
				break;
			case 9:
				return $this->getNumlot();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetsalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsal(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCantot(),
			$keys[3] => $this->getTotart(),
			$keys[4] => $this->getCosart(),
			$keys[5] => $this->getCodalm(),
			$keys[6] => $this->getCodubi(),
			$keys[7] => $this->getNumjau(),
			$keys[8] => $this->getTammet(),
			$keys[9] => $this->getNumlot(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsal($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCantot($value);
				break;
			case 3:
				$this->setTotart($value);
				break;
			case 4:
				$this->setCosart($value);
				break;
			case 5:
				$this->setCodalm($value);
				break;
			case 6:
				$this->setCodubi($value);
				break;
			case 7:
				$this->setNumjau($value);
				break;
			case 8:
				$this->setTammet($value);
				break;
			case 9:
				$this->setNumlot($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetsalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCosart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodalm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodubi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumjau($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTammet($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumlot($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetsalPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetsalPeer::CODSAL)) $criteria->add(CadetsalPeer::CODSAL, $this->codsal);
		if ($this->isColumnModified(CadetsalPeer::CODART)) $criteria->add(CadetsalPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadetsalPeer::CANTOT)) $criteria->add(CadetsalPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CadetsalPeer::TOTART)) $criteria->add(CadetsalPeer::TOTART, $this->totart);
		if ($this->isColumnModified(CadetsalPeer::COSART)) $criteria->add(CadetsalPeer::COSART, $this->cosart);
		if ($this->isColumnModified(CadetsalPeer::CODALM)) $criteria->add(CadetsalPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadetsalPeer::CODUBI)) $criteria->add(CadetsalPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CadetsalPeer::NUMJAU)) $criteria->add(CadetsalPeer::NUMJAU, $this->numjau);
		if ($this->isColumnModified(CadetsalPeer::TAMMET)) $criteria->add(CadetsalPeer::TAMMET, $this->tammet);
		if ($this->isColumnModified(CadetsalPeer::NUMLOT)) $criteria->add(CadetsalPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(CadetsalPeer::ID)) $criteria->add(CadetsalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetsalPeer::DATABASE_NAME);

		$criteria->add(CadetsalPeer::ID, $this->id);

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

		$copyObj->setCodsal($this->codsal);

		$copyObj->setCodart($this->codart);

		$copyObj->setCantot($this->cantot);

		$copyObj->setTotart($this->totart);

		$copyObj->setCosart($this->cosart);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setNumjau($this->numjau);

		$copyObj->setTammet($this->tammet);

		$copyObj->setNumlot($this->numlot);


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
			self::$peer = new CadetsalPeer();
		}
		return self::$peer;
	}

} 
