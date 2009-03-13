<?php


abstract class BaseNppercar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codperfil;


	
	protected $codcar;


	
	protected $puntos;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodperfil()
  {

    return trim($this->codperfil);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getPuntos($val=false)
  {

    if($val) return number_format($this->puntos,2,',','.');
    else return $this->puntos;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodperfil($v)
	{

    if ($this->codperfil !== $v) {
        $this->codperfil = $v;
        $this->modifiedColumns[] = NppercarPeer::CODPERFIL;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NppercarPeer::CODCAR;
      }
  
	} 
	
	public function setPuntos($v)
	{

    if ($this->puntos !== $v) {
        $this->puntos = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NppercarPeer::PUNTOS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NppercarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codperfil = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->puntos = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nppercar object", $e);
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
			$con = Propel::getConnection(NppercarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NppercarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NppercarPeer::DATABASE_NAME);
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
					$pk = NppercarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NppercarPeer::doUpdate($this, $con);
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


			if (($retval = NppercarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NppercarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodperfil();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getPuntos();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NppercarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodperfil(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getPuntos(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NppercarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodperfil($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setPuntos($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NppercarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodperfil($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPuntos($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NppercarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NppercarPeer::CODPERFIL)) $criteria->add(NppercarPeer::CODPERFIL, $this->codperfil);
		if ($this->isColumnModified(NppercarPeer::CODCAR)) $criteria->add(NppercarPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NppercarPeer::PUNTOS)) $criteria->add(NppercarPeer::PUNTOS, $this->puntos);
		if ($this->isColumnModified(NppercarPeer::ID)) $criteria->add(NppercarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NppercarPeer::DATABASE_NAME);

		$criteria->add(NppercarPeer::ID, $this->id);

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

		$copyObj->setCodperfil($this->codperfil);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setPuntos($this->puntos);


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
			self::$peer = new NppercarPeer();
		}
		return self::$peer;
	}

} 