<?php


abstract class BaseNpempleadosBanco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codempant;


	
	protected $codban;


	
	protected $cuenta_banco;


	
	protected $monto;


	
	protected $codnom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCodempant()
	{

		return $this->codempant; 		
	}
	
	public function getCodban()
	{

		return $this->codban; 		
	}
	
	public function getCuentaBanco()
	{

		return $this->cuenta_banco; 		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getCodnom()
	{

		return $this->codnom; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::CODEMP;
		}

	} 
	
	public function setCodempant($v)
	{

		if ($this->codempant !== $v) {
			$this->codempant = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::CODEMPANT;
		}

	} 
	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::CODBAN;
		}

	} 
	
	public function setCuentaBanco($v)
	{

		if ($this->cuenta_banco !== $v) {
			$this->cuenta_banco = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::CUENTA_BANCO;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::MONTO;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::CODNOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpempleadosBancoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codempant = $rs->getString($startcol + 1);

			$this->codban = $rs->getString($startcol + 2);

			$this->cuenta_banco = $rs->getString($startcol + 3);

			$this->monto = $rs->getFloat($startcol + 4);

			$this->codnom = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NpempleadosBanco object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpempleadosBancoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpempleadosBancoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpempleadosBancoPeer::DATABASE_NAME);
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
					$pk = NpempleadosBancoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpempleadosBancoPeer::doUpdate($this, $con);
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


			if (($retval = NpempleadosBancoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpempleadosBancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodempant();
				break;
			case 2:
				return $this->getCodban();
				break;
			case 3:
				return $this->getCuentaBanco();
				break;
			case 4:
				return $this->getMonto();
				break;
			case 5:
				return $this->getCodnom();
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
		$keys = NpempleadosBancoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodempant(),
			$keys[2] => $this->getCodban(),
			$keys[3] => $this->getCuentaBanco(),
			$keys[4] => $this->getMonto(),
			$keys[5] => $this->getCodnom(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpempleadosBancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodempant($value);
				break;
			case 2:
				$this->setCodban($value);
				break;
			case 3:
				$this->setCuentaBanco($value);
				break;
			case 4:
				$this->setMonto($value);
				break;
			case 5:
				$this->setCodnom($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpempleadosBancoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodempant($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodban($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCuentaBanco($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodnom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpempleadosBancoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpempleadosBancoPeer::CODEMP)) $criteria->add(NpempleadosBancoPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpempleadosBancoPeer::CODEMPANT)) $criteria->add(NpempleadosBancoPeer::CODEMPANT, $this->codempant);
		if ($this->isColumnModified(NpempleadosBancoPeer::CODBAN)) $criteria->add(NpempleadosBancoPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NpempleadosBancoPeer::CUENTA_BANCO)) $criteria->add(NpempleadosBancoPeer::CUENTA_BANCO, $this->cuenta_banco);
		if ($this->isColumnModified(NpempleadosBancoPeer::MONTO)) $criteria->add(NpempleadosBancoPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpempleadosBancoPeer::CODNOM)) $criteria->add(NpempleadosBancoPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpempleadosBancoPeer::ID)) $criteria->add(NpempleadosBancoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpempleadosBancoPeer::DATABASE_NAME);

		$criteria->add(NpempleadosBancoPeer::ID, $this->id);

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

		$copyObj->setCodempant($this->codempant);

		$copyObj->setCodban($this->codban);

		$copyObj->setCuentaBanco($this->cuenta_banco);

		$copyObj->setMonto($this->monto);

		$copyObj->setCodnom($this->codnom);


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
			self::$peer = new NpempleadosBancoPeer();
		}
		return self::$peer;
	}

} 