<?php


abstract class BaseFordefmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $desmet;


	
	protected $nomabr;


	
	protected $codemp;


	
	protected $cantidad;


	
	protected $indpro;


	
	protected $invfun;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getDesmet()
  {

    return trim($this->desmet);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCantidad($val=false)
  {

    if($val) return number_format($this->cantidad,2,',','.');
    else return $this->cantidad;

  }
  
  public function getIndpro()
  {

    return trim($this->indpro);

  }
  
  public function getInvfun()
  {

    return trim($this->invfun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = FordefmetPeer::CODMET;
      }
  
	} 
	
	public function setDesmet($v)
	{

    if ($this->desmet !== $v) {
        $this->desmet = $v;
        $this->modifiedColumns[] = FordefmetPeer::DESMET;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = FordefmetPeer::NOMABR;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = FordefmetPeer::CODEMP;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefmetPeer::CANTIDAD;
      }
  
	} 
	
	public function setIndpro($v)
	{

    if ($this->indpro !== $v) {
        $this->indpro = $v;
        $this->modifiedColumns[] = FordefmetPeer::INDPRO;
      }
  
	} 
	
	public function setInvfun($v)
	{

    if ($this->invfun !== $v) {
        $this->invfun = $v;
        $this->modifiedColumns[] = FordefmetPeer::INVFUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefmetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmet = $rs->getString($startcol + 0);

      $this->desmet = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->codemp = $rs->getString($startcol + 3);

      $this->cantidad = $rs->getFloat($startcol + 4);

      $this->indpro = $rs->getString($startcol + 5);

      $this->invfun = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefmet object", $e);
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
			$con = Propel::getConnection(FordefmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefmetPeer::DATABASE_NAME);
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
					$pk = FordefmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefmetPeer::doUpdate($this, $con);
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


			if (($retval = FordefmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmet();
				break;
			case 1:
				return $this->getDesmet();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getCantidad();
				break;
			case 5:
				return $this->getIndpro();
				break;
			case 6:
				return $this->getInvfun();
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
		$keys = FordefmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getDesmet(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getCantidad(),
			$keys[5] => $this->getIndpro(),
			$keys[6] => $this->getInvfun(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmet($value);
				break;
			case 1:
				$this->setDesmet($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setCantidad($value);
				break;
			case 5:
				$this->setIndpro($value);
				break;
			case 6:
				$this->setInvfun($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCantidad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIndpro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setInvfun($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefmetPeer::CODMET)) $criteria->add(FordefmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordefmetPeer::DESMET)) $criteria->add(FordefmetPeer::DESMET, $this->desmet);
		if ($this->isColumnModified(FordefmetPeer::NOMABR)) $criteria->add(FordefmetPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(FordefmetPeer::CODEMP)) $criteria->add(FordefmetPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FordefmetPeer::CANTIDAD)) $criteria->add(FordefmetPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(FordefmetPeer::INDPRO)) $criteria->add(FordefmetPeer::INDPRO, $this->indpro);
		if ($this->isColumnModified(FordefmetPeer::INVFUN)) $criteria->add(FordefmetPeer::INVFUN, $this->invfun);
		if ($this->isColumnModified(FordefmetPeer::ID)) $criteria->add(FordefmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefmetPeer::DATABASE_NAME);

		$criteria->add(FordefmetPeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setDesmet($this->desmet);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setIndpro($this->indpro);

		$copyObj->setInvfun($this->invfun);


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
			self::$peer = new FordefmetPeer();
		}
		return self::$peer;
	}

} 
