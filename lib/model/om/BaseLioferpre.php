<?php


abstract class BaseLioferpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $lireglic_id;


	
	protected $codlic;


	
	protected $codpro;


	
	protected $codpar;


	
	protected $cant;


	
	protected $precio;


	
	protected $monsiniva;


	
	protected $iva;


	
	protected $montot;


	
	protected $id;

	
	protected $aLireglic;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLireglicId()
  {

    return $this->lireglic_id;

  }
  
  public function getCodlic()
  {

    return trim($this->codlic);

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
  
  public function getMonsiniva($val=false)
  {

    if($val) return number_format($this->monsiniva,2,',','.');
    else return $this->monsiniva;

  }
  
  public function getIva($val=false)
  {

    if($val) return number_format($this->iva,2,',','.');
    else return $this->iva;

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
	
	public function setLireglicId($v)
	{

    if ($this->lireglic_id !== $v) {
        $this->lireglic_id = $v;
        $this->modifiedColumns[] = LioferprePeer::LIREGLIC_ID;
      }
  
		if ($this->aLireglic !== null && $this->aLireglic->getId() !== $v) {
			$this->aLireglic = null;
		}

	} 
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = LioferprePeer::CODLIC;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LioferprePeer::CODPRO;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = LioferprePeer::CODPAR;
      }
  
	} 
	
	public function setCant($v)
	{

    if ($this->cant !== $v) {
        $this->cant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LioferprePeer::CANT;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LioferprePeer::PRECIO;
      }
  
	} 
	
	public function setMonsiniva($v)
	{

    if ($this->monsiniva !== $v) {
        $this->monsiniva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LioferprePeer::MONSINIVA;
      }
  
	} 
	
	public function setIva($v)
	{

    if ($this->iva !== $v) {
        $this->iva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LioferprePeer::IVA;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LioferprePeer::MONTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LioferprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->lireglic_id = $rs->getInt($startcol + 0);

      $this->codlic = $rs->getString($startcol + 1);

      $this->codpro = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->cant = $rs->getFloat($startcol + 4);

      $this->precio = $rs->getFloat($startcol + 5);

      $this->monsiniva = $rs->getFloat($startcol + 6);

      $this->iva = $rs->getFloat($startcol + 7);

      $this->montot = $rs->getFloat($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lioferpre object", $e);
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
			$con = Propel::getConnection(LioferprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LioferprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LioferprePeer::DATABASE_NAME);
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


												
			if ($this->aLireglic !== null) {
				if ($this->aLireglic->isModified()) {
					$affectedRows += $this->aLireglic->save($con);
				}
				$this->setLireglic($this->aLireglic);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LioferprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LioferprePeer::doUpdate($this, $con);
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


												
			if ($this->aLireglic !== null) {
				if (!$this->aLireglic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLireglic->getValidationFailures());
				}
			}


			if (($retval = LioferprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LioferprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLireglicId();
				break;
			case 1:
				return $this->getCodlic();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getCant();
				break;
			case 5:
				return $this->getPrecio();
				break;
			case 6:
				return $this->getMonsiniva();
				break;
			case 7:
				return $this->getIva();
				break;
			case 8:
				return $this->getMontot();
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
		$keys = LioferprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLireglicId(),
			$keys[1] => $this->getCodlic(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getCant(),
			$keys[5] => $this->getPrecio(),
			$keys[6] => $this->getMonsiniva(),
			$keys[7] => $this->getIva(),
			$keys[8] => $this->getMontot(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LioferprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLireglicId($value);
				break;
			case 1:
				$this->setCodlic($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setCant($value);
				break;
			case 5:
				$this->setPrecio($value);
				break;
			case 6:
				$this->setMonsiniva($value);
				break;
			case 7:
				$this->setIva($value);
				break;
			case 8:
				$this->setMontot($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LioferprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLireglicId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodlic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrecio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonsiniva($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIva($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMontot($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LioferprePeer::DATABASE_NAME);

		if ($this->isColumnModified(LioferprePeer::LIREGLIC_ID)) $criteria->add(LioferprePeer::LIREGLIC_ID, $this->lireglic_id);
		if ($this->isColumnModified(LioferprePeer::CODLIC)) $criteria->add(LioferprePeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(LioferprePeer::CODPRO)) $criteria->add(LioferprePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LioferprePeer::CODPAR)) $criteria->add(LioferprePeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(LioferprePeer::CANT)) $criteria->add(LioferprePeer::CANT, $this->cant);
		if ($this->isColumnModified(LioferprePeer::PRECIO)) $criteria->add(LioferprePeer::PRECIO, $this->precio);
		if ($this->isColumnModified(LioferprePeer::MONSINIVA)) $criteria->add(LioferprePeer::MONSINIVA, $this->monsiniva);
		if ($this->isColumnModified(LioferprePeer::IVA)) $criteria->add(LioferprePeer::IVA, $this->iva);
		if ($this->isColumnModified(LioferprePeer::MONTOT)) $criteria->add(LioferprePeer::MONTOT, $this->montot);
		if ($this->isColumnModified(LioferprePeer::ID)) $criteria->add(LioferprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LioferprePeer::DATABASE_NAME);

		$criteria->add(LioferprePeer::ID, $this->id);

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

		$copyObj->setLireglicId($this->lireglic_id);

		$copyObj->setCodlic($this->codlic);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCant($this->cant);

		$copyObj->setPrecio($this->precio);

		$copyObj->setMonsiniva($this->monsiniva);

		$copyObj->setIva($this->iva);

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
			self::$peer = new LioferprePeer();
		}
		return self::$peer;
	}

	
	public function setLireglic($v)
	{


		if ($v === null) {
			$this->setLireglicId(NULL);
		} else {
			$this->setLireglicId($v->getId());
		}


		$this->aLireglic = $v;
	}


	
	public function getLireglic($con = null)
	{
		if ($this->aLireglic === null && ($this->lireglic_id !== null)) {
						include_once 'lib/model/om/BaseLireglicPeer.php';

			$this->aLireglic = LireglicPeer::retrieveByPK($this->lireglic_id, $con);

			
		}
		return $this->aLireglic;
	}

} 