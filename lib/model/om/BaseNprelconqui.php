<?php


abstract class BaseNprelconqui extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $cantidad;


	
	protected $monto;


	
	protected $fecini;


	
	protected $fecexp;


	
	protected $calcon;


	
	protected $actcon;


	
	protected $nomsus;


	
	protected $codpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCantidad()
	{

		return $this->cantidad;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecexp($format = 'Y-m-d')
	{

		if ($this->fecexp === null || $this->fecexp === '') {
			return null;
		} elseif (!is_int($this->fecexp)) {
						$ts = strtotime($this->fecexp);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecexp] as date/time value: " . var_export($this->fecexp, true));
			}
		} else {
			$ts = $this->fecexp;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCalcon()
	{

		return $this->calcon;
	}

	
	public function getActcon()
	{

		return $this->actcon;
	}

	
	public function getNomsus()
	{

		return $this->nomsus;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NprelconquiPeer::CODEMP;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NprelconquiPeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NprelconquiPeer::CODCON;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = NprelconquiPeer::CANTIDAD;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NprelconquiPeer::MONTO;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = NprelconquiPeer::FECINI;
		}

	} 
	
	public function setFecexp($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecexp] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecexp !== $ts) {
			$this->fecexp = $ts;
			$this->modifiedColumns[] = NprelconquiPeer::FECEXP;
		}

	} 
	
	public function setCalcon($v)
	{

		if ($this->calcon !== $v) {
			$this->calcon = $v;
			$this->modifiedColumns[] = NprelconquiPeer::CALCON;
		}

	} 
	
	public function setActcon($v)
	{

		if ($this->actcon !== $v) {
			$this->actcon = $v;
			$this->modifiedColumns[] = NprelconquiPeer::ACTCON;
		}

	} 
	
	public function setNomsus($v)
	{

		if ($this->nomsus !== $v) {
			$this->nomsus = $v;
			$this->modifiedColumns[] = NprelconquiPeer::NOMSUS;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = NprelconquiPeer::CODPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NprelconquiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codnom = $rs->getString($startcol + 1);

			$this->codcon = $rs->getString($startcol + 2);

			$this->cantidad = $rs->getFloat($startcol + 3);

			$this->monto = $rs->getFloat($startcol + 4);

			$this->fecini = $rs->getDate($startcol + 5, null);

			$this->fecexp = $rs->getDate($startcol + 6, null);

			$this->calcon = $rs->getString($startcol + 7);

			$this->actcon = $rs->getString($startcol + 8);

			$this->nomsus = $rs->getString($startcol + 9);

			$this->codpre = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nprelconqui object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NprelconquiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NprelconquiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NprelconquiPeer::DATABASE_NAME);
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
					$pk = NprelconquiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NprelconquiPeer::doUpdate($this, $con);
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


			if (($retval = NprelconquiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NprelconquiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getCantidad();
				break;
			case 4:
				return $this->getMonto();
				break;
			case 5:
				return $this->getFecini();
				break;
			case 6:
				return $this->getFecexp();
				break;
			case 7:
				return $this->getCalcon();
				break;
			case 8:
				return $this->getActcon();
				break;
			case 9:
				return $this->getNomsus();
				break;
			case 10:
				return $this->getCodpre();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NprelconquiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getCantidad(),
			$keys[4] => $this->getMonto(),
			$keys[5] => $this->getFecini(),
			$keys[6] => $this->getFecexp(),
			$keys[7] => $this->getCalcon(),
			$keys[8] => $this->getActcon(),
			$keys[9] => $this->getNomsus(),
			$keys[10] => $this->getCodpre(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NprelconquiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setCantidad($value);
				break;
			case 4:
				$this->setMonto($value);
				break;
			case 5:
				$this->setFecini($value);
				break;
			case 6:
				$this->setFecexp($value);
				break;
			case 7:
				$this->setCalcon($value);
				break;
			case 8:
				$this->setActcon($value);
				break;
			case 9:
				$this->setNomsus($value);
				break;
			case 10:
				$this->setCodpre($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NprelconquiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantidad($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecini($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecexp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCalcon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setActcon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNomsus($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodpre($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NprelconquiPeer::DATABASE_NAME);

		if ($this->isColumnModified(NprelconquiPeer::CODEMP)) $criteria->add(NprelconquiPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NprelconquiPeer::CODNOM)) $criteria->add(NprelconquiPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NprelconquiPeer::CODCON)) $criteria->add(NprelconquiPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NprelconquiPeer::CANTIDAD)) $criteria->add(NprelconquiPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NprelconquiPeer::MONTO)) $criteria->add(NprelconquiPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NprelconquiPeer::FECINI)) $criteria->add(NprelconquiPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NprelconquiPeer::FECEXP)) $criteria->add(NprelconquiPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(NprelconquiPeer::CALCON)) $criteria->add(NprelconquiPeer::CALCON, $this->calcon);
		if ($this->isColumnModified(NprelconquiPeer::ACTCON)) $criteria->add(NprelconquiPeer::ACTCON, $this->actcon);
		if ($this->isColumnModified(NprelconquiPeer::NOMSUS)) $criteria->add(NprelconquiPeer::NOMSUS, $this->nomsus);
		if ($this->isColumnModified(NprelconquiPeer::CODPRE)) $criteria->add(NprelconquiPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(NprelconquiPeer::ID)) $criteria->add(NprelconquiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NprelconquiPeer::DATABASE_NAME);

		$criteria->add(NprelconquiPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setMonto($this->monto);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setCalcon($this->calcon);

		$copyObj->setActcon($this->actcon);

		$copyObj->setNomsus($this->nomsus);

		$copyObj->setCodpre($this->codpre);


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
			self::$peer = new NprelconquiPeer();
		}
		return self::$peer;
	}

} 