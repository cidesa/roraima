<?php


abstract class BaseOcoferpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $codpro;


	
	protected $codpar;


	
	protected $cant;


	
	protected $precio;


	
	protected $montot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCant($val=false)
  {

    if($val) return number_format($this->cant,2,',','.');
    else return $this->cant;

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = OcoferprePeer::CODOBR;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = OcoferprePeer::CODPRO;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = OcoferprePeer::CODPAR;
      }
  
	} 
	
	public function setCant($v)
	{

    if ($this->cant !== $v) {
        $this->cant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcoferprePeer::CANT;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcoferprePeer::PRECIO;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcoferprePeer::MONTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcoferprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codobr = $rs->getString($startcol + 0);

      $this->codpro = $rs->getString($startcol + 1);

      $this->codpar = $rs->getString($startcol + 2);

      $this->cant = $rs->getFloat($startcol + 3);

      $this->precio = $rs->getFloat($startcol + 4);

      $this->montot = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocoferpre object", $e);
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
			$con = Propel::getConnection(OcoferprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcoferprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcoferprePeer::DATABASE_NAME);
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
					$pk = OcoferprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcoferprePeer::doUpdate($this, $con);
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


			if (($retval = OcoferprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcoferprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getCodpar();
				break;
			case 3:
				return $this->getCant();
				break;
			case 4:
				return $this->getPrecio();
				break;
			case 5:
				return $this->getMontot();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcoferprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getCant(),
			$keys[4] => $this->getPrecio(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcoferprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setCant($value);
				break;
			case 4:
				$this->setPrecio($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcoferprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCant($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrecio($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcoferprePeer::DATABASE_NAME);

		if ($this->isColumnModified(OcoferprePeer::CODOBR)) $criteria->add(OcoferprePeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcoferprePeer::CODPRO)) $criteria->add(OcoferprePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(OcoferprePeer::CODPAR)) $criteria->add(OcoferprePeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcoferprePeer::CANT)) $criteria->add(OcoferprePeer::CANT, $this->cant);
		if ($this->isColumnModified(OcoferprePeer::PRECIO)) $criteria->add(OcoferprePeer::PRECIO, $this->precio);
		if ($this->isColumnModified(OcoferprePeer::MONTOT)) $criteria->add(OcoferprePeer::MONTOT, $this->montot);
		if ($this->isColumnModified(OcoferprePeer::ID)) $criteria->add(OcoferprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcoferprePeer::DATABASE_NAME);

		$criteria->add(OcoferprePeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCant($this->cant);

		$copyObj->setPrecio($this->precio);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new OcoferprePeer();
		}
		return self::$peer;
	}

} 