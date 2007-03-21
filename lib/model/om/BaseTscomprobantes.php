<?php


abstract class BaseTscomprobantes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipo;


	
	protected $cedrif;


	
	protected $ano;


	
	protected $mes;


	
	protected $comprobante;


	
	protected $numord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getAno()
	{

		return $this->ano;
	}

	
	public function getMes()
	{

		return $this->mes;
	}

	
	public function getComprobante()
	{

		return $this->comprobante;
	}

	
	public function getNumord()
	{

		return $this->numord;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::TIPO;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::CEDRIF;
		}

	} 
	
	public function setAno($v)
	{

		if ($this->ano !== $v) {
			$this->ano = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::ANO;
		}

	} 
	
	public function setMes($v)
	{

		if ($this->mes !== $v) {
			$this->mes = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::MES;
		}

	} 
	
	public function setComprobante($v)
	{

		if ($this->comprobante !== $v) {
			$this->comprobante = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::COMPROBANTE;
		}

	} 
	
	public function setNumord($v)
	{

		if ($this->numord !== $v) {
			$this->numord = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::NUMORD;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TscomprobantesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->tipo = $rs->getString($startcol + 0);

			$this->cedrif = $rs->getString($startcol + 1);

			$this->ano = $rs->getString($startcol + 2);

			$this->mes = $rs->getString($startcol + 3);

			$this->comprobante = $rs->getString($startcol + 4);

			$this->numord = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tscomprobantes object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TscomprobantesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TscomprobantesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TscomprobantesPeer::DATABASE_NAME);
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
					$pk = TscomprobantesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TscomprobantesPeer::doUpdate($this, $con);
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


			if (($retval = TscomprobantesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscomprobantesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipo();
				break;
			case 1:
				return $this->getCedrif();
				break;
			case 2:
				return $this->getAno();
				break;
			case 3:
				return $this->getMes();
				break;
			case 4:
				return $this->getComprobante();
				break;
			case 5:
				return $this->getNumord();
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
		$keys = TscomprobantesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipo(),
			$keys[1] => $this->getCedrif(),
			$keys[2] => $this->getAno(),
			$keys[3] => $this->getMes(),
			$keys[4] => $this->getComprobante(),
			$keys[5] => $this->getNumord(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscomprobantesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipo($value);
				break;
			case 1:
				$this->setCedrif($value);
				break;
			case 2:
				$this->setAno($value);
				break;
			case 3:
				$this->setMes($value);
				break;
			case 4:
				$this->setComprobante($value);
				break;
			case 5:
				$this->setNumord($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscomprobantesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedrif($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAno($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComprobante($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumord($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TscomprobantesPeer::DATABASE_NAME);

		if ($this->isColumnModified(TscomprobantesPeer::TIPO)) $criteria->add(TscomprobantesPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(TscomprobantesPeer::CEDRIF)) $criteria->add(TscomprobantesPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TscomprobantesPeer::ANO)) $criteria->add(TscomprobantesPeer::ANO, $this->ano);
		if ($this->isColumnModified(TscomprobantesPeer::MES)) $criteria->add(TscomprobantesPeer::MES, $this->mes);
		if ($this->isColumnModified(TscomprobantesPeer::COMPROBANTE)) $criteria->add(TscomprobantesPeer::COMPROBANTE, $this->comprobante);
		if ($this->isColumnModified(TscomprobantesPeer::NUMORD)) $criteria->add(TscomprobantesPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(TscomprobantesPeer::ID)) $criteria->add(TscomprobantesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TscomprobantesPeer::DATABASE_NAME);

		$criteria->add(TscomprobantesPeer::ID, $this->id);

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

		$copyObj->setTipo($this->tipo);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setAno($this->ano);

		$copyObj->setMes($this->mes);

		$copyObj->setComprobante($this->comprobante);

		$copyObj->setNumord($this->numord);


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
			self::$peer = new TscomprobantesPeer();
		}
		return self::$peer;
	}

} 