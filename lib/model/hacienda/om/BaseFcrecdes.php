<?php


abstract class BaseFcrecdes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrede;


	
	protected $recdes;


	
	protected $desrede;


	
	protected $codcta;


	
	protected $porrede;


	
	protected $codfue;


	
	protected $dias;


	
	protected $porcien;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrede()
  {

    return trim($this->codrede);

  }
  
  public function getRecdes()
  {

    return trim($this->recdes);

  }
  
  public function getDesrede()
  {

    return trim($this->desrede);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getPorrede()
  {

    return trim($this->porrede);

  }
  
  public function getCodfue()
  {

    return trim($this->codfue);

  }
  
  public function getDias($val=false)
  {

    if($val) return number_format($this->dias,2,',','.');
    else return $this->dias;

  }
  
  public function getPorcien($val=false)
  {

    if($val) return number_format($this->porcien,2,',','.');
    else return $this->porcien;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrede($v)
	{

    if ($this->codrede !== $v) {
        $this->codrede = $v;
        $this->modifiedColumns[] = FcrecdesPeer::CODREDE;
      }
  
	} 
	
	public function setRecdes($v)
	{

    if ($this->recdes !== $v) {
        $this->recdes = $v;
        $this->modifiedColumns[] = FcrecdesPeer::RECDES;
      }
  
	} 
	
	public function setDesrede($v)
	{

    if ($this->desrede !== $v) {
        $this->desrede = $v;
        $this->modifiedColumns[] = FcrecdesPeer::DESREDE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = FcrecdesPeer::CODCTA;
      }
  
	} 
	
	public function setPorrede($v)
	{

    if ($this->porrede !== $v) {
        $this->porrede = $v;
        $this->modifiedColumns[] = FcrecdesPeer::PORREDE;
      }
  
	} 
	
	public function setCodfue($v)
	{

    if ($this->codfue !== $v) {
        $this->codfue = $v;
        $this->modifiedColumns[] = FcrecdesPeer::CODFUE;
      }
  
	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrecdesPeer::DIAS;
      }
  
	} 
	
	public function setPorcien($v)
	{

    if ($this->porcien !== $v) {
        $this->porcien = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrecdesPeer::PORCIEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcrecdesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrede = $rs->getString($startcol + 0);

      $this->recdes = $rs->getString($startcol + 1);

      $this->desrede = $rs->getString($startcol + 2);

      $this->codcta = $rs->getString($startcol + 3);

      $this->porrede = $rs->getString($startcol + 4);

      $this->codfue = $rs->getString($startcol + 5);

      $this->dias = $rs->getFloat($startcol + 6);

      $this->porcien = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcrecdes object", $e);
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
			$con = Propel::getConnection(FcrecdesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrecdesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrecdesPeer::DATABASE_NAME);
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
					$pk = FcrecdesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcrecdesPeer::doUpdate($this, $con);
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


			if (($retval = FcrecdesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrede();
				break;
			case 1:
				return $this->getRecdes();
				break;
			case 2:
				return $this->getDesrede();
				break;
			case 3:
				return $this->getCodcta();
				break;
			case 4:
				return $this->getPorrede();
				break;
			case 5:
				return $this->getCodfue();
				break;
			case 6:
				return $this->getDias();
				break;
			case 7:
				return $this->getPorcien();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrecdesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrede(),
			$keys[1] => $this->getRecdes(),
			$keys[2] => $this->getDesrede(),
			$keys[3] => $this->getCodcta(),
			$keys[4] => $this->getPorrede(),
			$keys[5] => $this->getCodfue(),
			$keys[6] => $this->getDias(),
			$keys[7] => $this->getPorcien(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrede($value);
				break;
			case 1:
				$this->setRecdes($value);
				break;
			case 2:
				$this->setDesrede($value);
				break;
			case 3:
				$this->setCodcta($value);
				break;
			case 4:
				$this->setPorrede($value);
				break;
			case 5:
				$this->setCodfue($value);
				break;
			case 6:
				$this->setDias($value);
				break;
			case 7:
				$this->setPorcien($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrecdesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrede($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRecdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrede($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorrede($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodfue($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDias($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPorcien($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrecdesPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrecdesPeer::CODREDE)) $criteria->add(FcrecdesPeer::CODREDE, $this->codrede);
		if ($this->isColumnModified(FcrecdesPeer::RECDES)) $criteria->add(FcrecdesPeer::RECDES, $this->recdes);
		if ($this->isColumnModified(FcrecdesPeer::DESREDE)) $criteria->add(FcrecdesPeer::DESREDE, $this->desrede);
		if ($this->isColumnModified(FcrecdesPeer::CODCTA)) $criteria->add(FcrecdesPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(FcrecdesPeer::PORREDE)) $criteria->add(FcrecdesPeer::PORREDE, $this->porrede);
		if ($this->isColumnModified(FcrecdesPeer::CODFUE)) $criteria->add(FcrecdesPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcrecdesPeer::DIAS)) $criteria->add(FcrecdesPeer::DIAS, $this->dias);
		if ($this->isColumnModified(FcrecdesPeer::PORCIEN)) $criteria->add(FcrecdesPeer::PORCIEN, $this->porcien);
		if ($this->isColumnModified(FcrecdesPeer::ID)) $criteria->add(FcrecdesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrecdesPeer::DATABASE_NAME);

		$criteria->add(FcrecdesPeer::ID, $this->id);

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

		$copyObj->setCodrede($this->codrede);

		$copyObj->setRecdes($this->recdes);

		$copyObj->setDesrede($this->desrede);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setPorrede($this->porrede);

		$copyObj->setCodfue($this->codfue);

		$copyObj->setDias($this->dias);

		$copyObj->setPorcien($this->porcien);


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
			self::$peer = new FcrecdesPeer();
		}
		return self::$peer;
	}

} 