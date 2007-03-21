<?php


abstract class BaseNpcontra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $periodico = 'S';


	
	protected $identi;


	
	protected $tipo = '';


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getPeriodico()
	{

		return $this->periodico;
	}

	
	public function getIdenti()
	{

		return $this->identi;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpcontraPeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpcontraPeer::CODCON;
		}

	} 
	
	public function setPeriodico($v)
	{

		if ($this->periodico !== $v || $v === 'S') {
			$this->periodico = $v;
			$this->modifiedColumns[] = NpcontraPeer::PERIODICO;
		}

	} 
	
	public function setIdenti($v)
	{

		if ($this->identi !== $v) {
			$this->identi = $v;
			$this->modifiedColumns[] = NpcontraPeer::IDENTI;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v || $v === '') {
			$this->tipo = $v;
			$this->modifiedColumns[] = NpcontraPeer::TIPO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcontraPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->periodico = $rs->getString($startcol + 2);

			$this->identi = $rs->getString($startcol + 3);

			$this->tipo = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcontra object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcontraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcontraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcontraPeer::DATABASE_NAME);
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
					$pk = NpcontraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcontraPeer::doUpdate($this, $con);
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


			if (($retval = NpcontraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcontraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getPeriodico();
				break;
			case 3:
				return $this->getIdenti();
				break;
			case 4:
				return $this->getTipo();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcontraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getPeriodico(),
			$keys[3] => $this->getIdenti(),
			$keys[4] => $this->getTipo(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcontraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setPeriodico($value);
				break;
			case 3:
				$this->setIdenti($value);
				break;
			case 4:
				$this->setTipo($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcontraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPeriodico($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdenti($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcontraPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcontraPeer::CODNOM)) $criteria->add(NpcontraPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpcontraPeer::CODCON)) $criteria->add(NpcontraPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpcontraPeer::PERIODICO)) $criteria->add(NpcontraPeer::PERIODICO, $this->periodico);
		if ($this->isColumnModified(NpcontraPeer::IDENTI)) $criteria->add(NpcontraPeer::IDENTI, $this->identi);
		if ($this->isColumnModified(NpcontraPeer::TIPO)) $criteria->add(NpcontraPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(NpcontraPeer::ID)) $criteria->add(NpcontraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcontraPeer::DATABASE_NAME);

		$criteria->add(NpcontraPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setPeriodico($this->periodico);

		$copyObj->setIdenti($this->identi);

		$copyObj->setTipo($this->tipo);


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
			self::$peer = new NpcontraPeer();
		}
		return self::$peer;
	}

} 