<?php


abstract class BaseNphisconR extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $fecnom;


	
	protected $monto;


	
	protected $codcat;


	
	protected $codpar;


	
	protected $codescuela;


	
	protected $codniv;


	
	protected $codtipgas;


	
	protected $nomcon;


	
	protected $numrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getFecnom($format = 'Y-m-d')
	{

		if ($this->fecnom === null || $this->fecnom === '') {
			return null;
		} elseif (!is_int($this->fecnom)) {
						$ts = strtotime($this->fecnom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
			}
		} else {
			$ts = $this->fecnom;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getCodescuela()
	{

		return $this->codescuela;
	}

	
	public function getCodniv()
	{

		return $this->codniv;
	}

	
	public function getCodtipgas()
	{

		return $this->codtipgas;
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getNumrec()
	{

		return $this->numrec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODNOM;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODEMP;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODCAR;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODCON;
		}

	} 
	
	public function setFecnom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnom !== $ts) {
			$this->fecnom = $ts;
			$this->modifiedColumns[] = NphisconRPeer::FECNOM;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NphisconRPeer::MONTO;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODCAT;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODPAR;
		}

	} 
	
	public function setCodescuela($v)
	{

		if ($this->codescuela !== $v) {
			$this->codescuela = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODESCUELA;
		}

	} 
	
	public function setCodniv($v)
	{

		if ($this->codniv !== $v) {
			$this->codniv = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODNIV;
		}

	} 
	
	public function setCodtipgas($v)
	{

		if ($this->codtipgas !== $v) {
			$this->codtipgas = $v;
			$this->modifiedColumns[] = NphisconRPeer::CODTIPGAS;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = NphisconRPeer::NOMCON;
		}

	} 
	
	public function setNumrec($v)
	{

		if ($this->numrec !== $v) {
			$this->numrec = $v;
			$this->modifiedColumns[] = NphisconRPeer::NUMREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NphisconRPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codemp = $rs->getString($startcol + 1);

			$this->codcar = $rs->getString($startcol + 2);

			$this->codcon = $rs->getString($startcol + 3);

			$this->fecnom = $rs->getDate($startcol + 4, null);

			$this->monto = $rs->getFloat($startcol + 5);

			$this->codcat = $rs->getString($startcol + 6);

			$this->codpar = $rs->getString($startcol + 7);

			$this->codescuela = $rs->getString($startcol + 8);

			$this->codniv = $rs->getString($startcol + 9);

			$this->codtipgas = $rs->getString($startcol + 10);

			$this->nomcon = $rs->getString($startcol + 11);

			$this->numrec = $rs->getFloat($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NphisconR object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NphisconRPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NphisconRPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NphisconRPeer::DATABASE_NAME);
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
					$pk = NphisconRPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NphisconRPeer::doUpdate($this, $con);
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


			if (($retval = NphisconRPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisconRPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getCodcon();
				break;
			case 4:
				return $this->getFecnom();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getCodcat();
				break;
			case 7:
				return $this->getCodpar();
				break;
			case 8:
				return $this->getCodescuela();
				break;
			case 9:
				return $this->getCodniv();
				break;
			case 10:
				return $this->getCodtipgas();
				break;
			case 11:
				return $this->getNomcon();
				break;
			case 12:
				return $this->getNumrec();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisconRPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getCodcon(),
			$keys[4] => $this->getFecnom(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getCodcat(),
			$keys[7] => $this->getCodpar(),
			$keys[8] => $this->getCodescuela(),
			$keys[9] => $this->getCodniv(),
			$keys[10] => $this->getCodtipgas(),
			$keys[11] => $this->getNomcon(),
			$keys[12] => $this->getNumrec(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NphisconRPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setCodcon($value);
				break;
			case 4:
				$this->setFecnom($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setCodcat($value);
				break;
			case 7:
				$this->setCodpar($value);
				break;
			case 8:
				$this->setCodescuela($value);
				break;
			case 9:
				$this->setCodniv($value);
				break;
			case 10:
				$this->setCodtipgas($value);
				break;
			case 11:
				$this->setNomcon($value);
				break;
			case 12:
				$this->setNumrec($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NphisconRPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodescuela($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodniv($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodtipgas($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomcon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NphisconRPeer::DATABASE_NAME);

		if ($this->isColumnModified(NphisconRPeer::CODNOM)) $criteria->add(NphisconRPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NphisconRPeer::CODEMP)) $criteria->add(NphisconRPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NphisconRPeer::CODCAR)) $criteria->add(NphisconRPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NphisconRPeer::CODCON)) $criteria->add(NphisconRPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NphisconRPeer::FECNOM)) $criteria->add(NphisconRPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NphisconRPeer::MONTO)) $criteria->add(NphisconRPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NphisconRPeer::CODCAT)) $criteria->add(NphisconRPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NphisconRPeer::CODPAR)) $criteria->add(NphisconRPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NphisconRPeer::CODESCUELA)) $criteria->add(NphisconRPeer::CODESCUELA, $this->codescuela);
		if ($this->isColumnModified(NphisconRPeer::CODNIV)) $criteria->add(NphisconRPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NphisconRPeer::CODTIPGAS)) $criteria->add(NphisconRPeer::CODTIPGAS, $this->codtipgas);
		if ($this->isColumnModified(NphisconRPeer::NOMCON)) $criteria->add(NphisconRPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NphisconRPeer::NUMREC)) $criteria->add(NphisconRPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(NphisconRPeer::ID)) $criteria->add(NphisconRPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NphisconRPeer::DATABASE_NAME);

		$criteria->add(NphisconRPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setMonto($this->monto);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodescuela($this->codescuela);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodtipgas($this->codtipgas);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNumrec($this->numrec);


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
			self::$peer = new NphisconRPeer();
		}
		return self::$peer;
	}

} 