<?php


abstract class BaseCfbalcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $orden;


	
	protected $titulo;


	
	protected $cuenta;


	
	protected $nombre;


	
	protected $debito;


	
	protected $credito;


	
	protected $saldo;


	
	protected $cargable;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getOrden()
	{

		return $this->orden;
	}

	
	public function getTitulo()
	{

		return $this->titulo;
	}

	
	public function getCuenta()
	{

		return $this->cuenta;
	}

	
	public function getNombre()
	{

		return $this->nombre;
	}

	
	public function getDebito()
	{

		return $this->debito;
	}

	
	public function getCredito()
	{

		return $this->credito;
	}

	
	public function getSaldo()
	{

		return $this->saldo;
	}

	
	public function getCargable()
	{

		return $this->cargable;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setOrden($v)
	{

		if ($this->orden !== $v) {
			$this->orden = $v;
			$this->modifiedColumns[] = CfbalcomPeer::ORDEN;
		}

	} 
	
	public function setTitulo($v)
	{

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = CfbalcomPeer::TITULO;
		}

	} 
	
	public function setCuenta($v)
	{

		if ($this->cuenta !== $v) {
			$this->cuenta = $v;
			$this->modifiedColumns[] = CfbalcomPeer::CUENTA;
		}

	} 
	
	public function setNombre($v)
	{

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = CfbalcomPeer::NOMBRE;
		}

	} 
	
	public function setDebito($v)
	{

		if ($this->debito !== $v) {
			$this->debito = $v;
			$this->modifiedColumns[] = CfbalcomPeer::DEBITO;
		}

	} 
	
	public function setCredito($v)
	{

		if ($this->credito !== $v) {
			$this->credito = $v;
			$this->modifiedColumns[] = CfbalcomPeer::CREDITO;
		}

	} 
	
	public function setSaldo($v)
	{

		if ($this->saldo !== $v) {
			$this->saldo = $v;
			$this->modifiedColumns[] = CfbalcomPeer::SALDO;
		}

	} 
	
	public function setCargable($v)
	{

		if ($this->cargable !== $v) {
			$this->cargable = $v;
			$this->modifiedColumns[] = CfbalcomPeer::CARGABLE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CfbalcomPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->orden = $rs->getString($startcol + 0);

			$this->titulo = $rs->getString($startcol + 1);

			$this->cuenta = $rs->getString($startcol + 2);

			$this->nombre = $rs->getString($startcol + 3);

			$this->debito = $rs->getFloat($startcol + 4);

			$this->credito = $rs->getFloat($startcol + 5);

			$this->saldo = $rs->getFloat($startcol + 6);

			$this->cargable = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cfbalcom object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CfbalcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CfbalcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CfbalcomPeer::DATABASE_NAME);
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
					$pk = CfbalcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CfbalcomPeer::doUpdate($this, $con);
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


			if (($retval = CfbalcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CfbalcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrden();
				break;
			case 1:
				return $this->getTitulo();
				break;
			case 2:
				return $this->getCuenta();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getDebito();
				break;
			case 5:
				return $this->getCredito();
				break;
			case 6:
				return $this->getSaldo();
				break;
			case 7:
				return $this->getCargable();
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
		$keys = CfbalcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrden(),
			$keys[1] => $this->getTitulo(),
			$keys[2] => $this->getCuenta(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getDebito(),
			$keys[5] => $this->getCredito(),
			$keys[6] => $this->getSaldo(),
			$keys[7] => $this->getCargable(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CfbalcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrden($value);
				break;
			case 1:
				$this->setTitulo($value);
				break;
			case 2:
				$this->setCuenta($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setDebito($value);
				break;
			case 5:
				$this->setCredito($value);
				break;
			case 6:
				$this->setSaldo($value);
				break;
			case 7:
				$this->setCargable($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CfbalcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrden($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCuenta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDebito($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCredito($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSaldo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCargable($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CfbalcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CfbalcomPeer::ORDEN)) $criteria->add(CfbalcomPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(CfbalcomPeer::TITULO)) $criteria->add(CfbalcomPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(CfbalcomPeer::CUENTA)) $criteria->add(CfbalcomPeer::CUENTA, $this->cuenta);
		if ($this->isColumnModified(CfbalcomPeer::NOMBRE)) $criteria->add(CfbalcomPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(CfbalcomPeer::DEBITO)) $criteria->add(CfbalcomPeer::DEBITO, $this->debito);
		if ($this->isColumnModified(CfbalcomPeer::CREDITO)) $criteria->add(CfbalcomPeer::CREDITO, $this->credito);
		if ($this->isColumnModified(CfbalcomPeer::SALDO)) $criteria->add(CfbalcomPeer::SALDO, $this->saldo);
		if ($this->isColumnModified(CfbalcomPeer::CARGABLE)) $criteria->add(CfbalcomPeer::CARGABLE, $this->cargable);
		if ($this->isColumnModified(CfbalcomPeer::ID)) $criteria->add(CfbalcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CfbalcomPeer::DATABASE_NAME);

		$criteria->add(CfbalcomPeer::ID, $this->id);

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

		$copyObj->setOrden($this->orden);

		$copyObj->setTitulo($this->titulo);

		$copyObj->setCuenta($this->cuenta);

		$copyObj->setNombre($this->nombre);

		$copyObj->setDebito($this->debito);

		$copyObj->setCredito($this->credito);

		$copyObj->setSaldo($this->saldo);

		$copyObj->setCargable($this->cargable);


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
			self::$peer = new CfbalcomPeer();
		}
		return self::$peer;
	}

} 