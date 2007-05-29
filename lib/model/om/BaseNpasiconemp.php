<?php


abstract class BaseNpasiconemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcon;


	
	protected $codcar;


	
	protected $nomemp;


	
	protected $nomcon;


	
	protected $nomcar;


	
	protected $cantidad;


	
	protected $monto;


	
	protected $fecini;


	
	protected $fecexp;


	
	protected $frecon;


	
	protected $asided;


	
	protected $acucon;


	
	protected $calcon;


	
	protected $activo;


	
	protected $acumulado;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getNomcon()
	{

		return $this->nomcon; 		
	}
	
	public function getNomcar()
	{

		return $this->nomcar; 		
	}
	
	public function getCantidad()
	{

		return number_format($this->cantidad,2,',','.');
		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
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

	
	public function getFrecon()
	{

		return $this->frecon; 		
	}
	
	public function getAsided()
	{

		return $this->asided; 		
	}
	
	public function getAcucon()
	{

		return $this->acucon; 		
	}
	
	public function getCalcon()
	{

		return $this->calcon; 		
	}
	
	public function getActivo()
	{

		return $this->activo; 		
	}
	
	public function getAcumulado()
	{

		return number_format($this->acumulado,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpasiconempPeer::CODEMP;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpasiconempPeer::CODCON;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpasiconempPeer::CODCAR;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = NpasiconempPeer::NOMEMP;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = NpasiconempPeer::NOMCON;
		}

	} 
	
	public function setNomcar($v)
	{

		if ($this->nomcar !== $v) {
			$this->nomcar = $v;
			$this->modifiedColumns[] = NpasiconempPeer::NOMCAR;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = NpasiconempPeer::CANTIDAD;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NpasiconempPeer::MONTO;
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
			$this->modifiedColumns[] = NpasiconempPeer::FECINI;
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
			$this->modifiedColumns[] = NpasiconempPeer::FECEXP;
		}

	} 
	
	public function setFrecon($v)
	{

		if ($this->frecon !== $v) {
			$this->frecon = $v;
			$this->modifiedColumns[] = NpasiconempPeer::FRECON;
		}

	} 
	
	public function setAsided($v)
	{

		if ($this->asided !== $v) {
			$this->asided = $v;
			$this->modifiedColumns[] = NpasiconempPeer::ASIDED;
		}

	} 
	
	public function setAcucon($v)
	{

		if ($this->acucon !== $v) {
			$this->acucon = $v;
			$this->modifiedColumns[] = NpasiconempPeer::ACUCON;
		}

	} 
	
	public function setCalcon($v)
	{

		if ($this->calcon !== $v) {
			$this->calcon = $v;
			$this->modifiedColumns[] = NpasiconempPeer::CALCON;
		}

	} 
	
	public function setActivo($v)
	{

		if ($this->activo !== $v) {
			$this->activo = $v;
			$this->modifiedColumns[] = NpasiconempPeer::ACTIVO;
		}

	} 
	
	public function setAcumulado($v)
	{

		if ($this->acumulado !== $v) {
			$this->acumulado = $v;
			$this->modifiedColumns[] = NpasiconempPeer::ACUMULADO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpasiconempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->codcar = $rs->getString($startcol + 2);

			$this->nomemp = $rs->getString($startcol + 3);

			$this->nomcon = $rs->getString($startcol + 4);

			$this->nomcar = $rs->getString($startcol + 5);

			$this->cantidad = $rs->getFloat($startcol + 6);

			$this->monto = $rs->getFloat($startcol + 7);

			$this->fecini = $rs->getDate($startcol + 8, null);

			$this->fecexp = $rs->getDate($startcol + 9, null);

			$this->frecon = $rs->getString($startcol + 10);

			$this->asided = $rs->getString($startcol + 11);

			$this->acucon = $rs->getString($startcol + 12);

			$this->calcon = $rs->getString($startcol + 13);

			$this->activo = $rs->getString($startcol + 14);

			$this->acumulado = $rs->getFloat($startcol + 15);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npasiconemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpasiconempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiconempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiconempPeer::DATABASE_NAME);
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
					$pk = NpasiconempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpasiconempPeer::doUpdate($this, $con);
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


			if (($retval = NpasiconempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getNomemp();
				break;
			case 4:
				return $this->getNomcon();
				break;
			case 5:
				return $this->getNomcar();
				break;
			case 6:
				return $this->getCantidad();
				break;
			case 7:
				return $this->getMonto();
				break;
			case 8:
				return $this->getFecini();
				break;
			case 9:
				return $this->getFecexp();
				break;
			case 10:
				return $this->getFrecon();
				break;
			case 11:
				return $this->getAsided();
				break;
			case 12:
				return $this->getAcucon();
				break;
			case 13:
				return $this->getCalcon();
				break;
			case 14:
				return $this->getActivo();
				break;
			case 15:
				return $this->getAcumulado();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getNomemp(),
			$keys[4] => $this->getNomcon(),
			$keys[5] => $this->getNomcar(),
			$keys[6] => $this->getCantidad(),
			$keys[7] => $this->getMonto(),
			$keys[8] => $this->getFecini(),
			$keys[9] => $this->getFecexp(),
			$keys[10] => $this->getFrecon(),
			$keys[11] => $this->getAsided(),
			$keys[12] => $this->getAcucon(),
			$keys[13] => $this->getCalcon(),
			$keys[14] => $this->getActivo(),
			$keys[15] => $this->getAcumulado(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setNomemp($value);
				break;
			case 4:
				$this->setNomcon($value);
				break;
			case 5:
				$this->setNomcar($value);
				break;
			case 6:
				$this->setCantidad($value);
				break;
			case 7:
				$this->setMonto($value);
				break;
			case 8:
				$this->setFecini($value);
				break;
			case 9:
				$this->setFecexp($value);
				break;
			case 10:
				$this->setFrecon($value);
				break;
			case 11:
				$this->setAsided($value);
				break;
			case 12:
				$this->setAcucon($value);
				break;
			case 13:
				$this->setCalcon($value);
				break;
			case 14:
				$this->setActivo($value);
				break;
			case 15:
				$this->setAcumulado($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonto($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecini($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecexp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFrecon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAsided($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAcucon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCalcon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setActivo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAcumulado($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiconempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiconempPeer::CODEMP)) $criteria->add(NpasiconempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpasiconempPeer::CODCON)) $criteria->add(NpasiconempPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpasiconempPeer::CODCAR)) $criteria->add(NpasiconempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpasiconempPeer::NOMEMP)) $criteria->add(NpasiconempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpasiconempPeer::NOMCON)) $criteria->add(NpasiconempPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpasiconempPeer::NOMCAR)) $criteria->add(NpasiconempPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NpasiconempPeer::CANTIDAD)) $criteria->add(NpasiconempPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NpasiconempPeer::MONTO)) $criteria->add(NpasiconempPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpasiconempPeer::FECINI)) $criteria->add(NpasiconempPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpasiconempPeer::FECEXP)) $criteria->add(NpasiconempPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(NpasiconempPeer::FRECON)) $criteria->add(NpasiconempPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(NpasiconempPeer::ASIDED)) $criteria->add(NpasiconempPeer::ASIDED, $this->asided);
		if ($this->isColumnModified(NpasiconempPeer::ACUCON)) $criteria->add(NpasiconempPeer::ACUCON, $this->acucon);
		if ($this->isColumnModified(NpasiconempPeer::CALCON)) $criteria->add(NpasiconempPeer::CALCON, $this->calcon);
		if ($this->isColumnModified(NpasiconempPeer::ACTIVO)) $criteria->add(NpasiconempPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(NpasiconempPeer::ACUMULADO)) $criteria->add(NpasiconempPeer::ACUMULADO, $this->acumulado);
		if ($this->isColumnModified(NpasiconempPeer::ID)) $criteria->add(NpasiconempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiconempPeer::DATABASE_NAME);

		$criteria->add(NpasiconempPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setMonto($this->monto);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setFrecon($this->frecon);

		$copyObj->setAsided($this->asided);

		$copyObj->setAcucon($this->acucon);

		$copyObj->setCalcon($this->calcon);

		$copyObj->setActivo($this->activo);

		$copyObj->setAcumulado($this->acumulado);


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
			self::$peer = new NpasiconempPeer();
		}
		return self::$peer;
	}

} 