<?php


abstract class BaseDftemporal2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codigo;


	
	protected $fecha;


	
	protected $monto;


	
	protected $abr;


	
	protected $ben;


	
	protected $estad;


	
	protected $nomtab;


	
	protected $vida;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodigo()
	{

		return $this->codigo; 		
	}
	
	public function getFecha($format = 'Y-m-d')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
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

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getAbr()
	{

		return $this->abr; 		
	}
	
	public function getBen()
	{

		return $this->ben; 		
	}
	
	public function getEstad()
	{

		return $this->estad; 		
	}
	
	public function getNomtab()
	{

		return $this->nomtab; 		
	}
	
	public function getVida()
	{

		return $this->vida; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodigo($v)
	{

		if ($this->codigo !== $v) {
			$this->codigo = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::CODIGO;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = Dftemporal2Peer::FECHA;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::MONTO;
		}

	} 
	
	public function setAbr($v)
	{

		if ($this->abr !== $v) {
			$this->abr = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::ABR;
		}

	} 
	
	public function setBen($v)
	{

		if ($this->ben !== $v) {
			$this->ben = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::BEN;
		}

	} 
	
	public function setEstad($v)
	{

		if ($this->estad !== $v) {
			$this->estad = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::ESTAD;
		}

	} 
	
	public function setNomtab($v)
	{

		if ($this->nomtab !== $v) {
			$this->nomtab = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::NOMTAB;
		}

	} 
	
	public function setVida($v)
	{

		if ($this->vida !== $v) {
			$this->vida = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::VIDA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Dftemporal2Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codigo = $rs->getString($startcol + 0);

			$this->fecha = $rs->getDate($startcol + 1, null);

			$this->monto = $rs->getFloat($startcol + 2);

			$this->abr = $rs->getString($startcol + 3);

			$this->ben = $rs->getString($startcol + 4);

			$this->estad = $rs->getString($startcol + 5);

			$this->nomtab = $rs->getString($startcol + 6);

			$this->vida = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dftemporal2 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Dftemporal2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Dftemporal2Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Dftemporal2Peer::DATABASE_NAME);
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
					$pk = Dftemporal2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Dftemporal2Peer::doUpdate($this, $con);
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


			if (($retval = Dftemporal2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodigo();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getMonto();
				break;
			case 3:
				return $this->getAbr();
				break;
			case 4:
				return $this->getBen();
				break;
			case 5:
				return $this->getEstad();
				break;
			case 6:
				return $this->getNomtab();
				break;
			case 7:
				return $this->getVida();
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
		$keys = Dftemporal2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodigo(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getAbr(),
			$keys[4] => $this->getBen(),
			$keys[5] => $this->getEstad(),
			$keys[6] => $this->getNomtab(),
			$keys[7] => $this->getVida(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Dftemporal2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodigo($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setAbr($value);
				break;
			case 4:
				$this->setBen($value);
				break;
			case 5:
				$this->setEstad($value);
				break;
			case 6:
				$this->setNomtab($value);
				break;
			case 7:
				$this->setVida($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Dftemporal2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodigo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAbr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstad($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomtab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVida($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Dftemporal2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Dftemporal2Peer::CODIGO)) $criteria->add(Dftemporal2Peer::CODIGO, $this->codigo);
		if ($this->isColumnModified(Dftemporal2Peer::FECHA)) $criteria->add(Dftemporal2Peer::FECHA, $this->fecha);
		if ($this->isColumnModified(Dftemporal2Peer::MONTO)) $criteria->add(Dftemporal2Peer::MONTO, $this->monto);
		if ($this->isColumnModified(Dftemporal2Peer::ABR)) $criteria->add(Dftemporal2Peer::ABR, $this->abr);
		if ($this->isColumnModified(Dftemporal2Peer::BEN)) $criteria->add(Dftemporal2Peer::BEN, $this->ben);
		if ($this->isColumnModified(Dftemporal2Peer::ESTAD)) $criteria->add(Dftemporal2Peer::ESTAD, $this->estad);
		if ($this->isColumnModified(Dftemporal2Peer::NOMTAB)) $criteria->add(Dftemporal2Peer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(Dftemporal2Peer::VIDA)) $criteria->add(Dftemporal2Peer::VIDA, $this->vida);
		if ($this->isColumnModified(Dftemporal2Peer::ID)) $criteria->add(Dftemporal2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Dftemporal2Peer::DATABASE_NAME);

		$criteria->add(Dftemporal2Peer::ID, $this->id);

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

		$copyObj->setCodigo($this->codigo);

		$copyObj->setFecha($this->fecha);

		$copyObj->setMonto($this->monto);

		$copyObj->setAbr($this->abr);

		$copyObj->setBen($this->ben);

		$copyObj->setEstad($this->estad);

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setVida($this->vida);


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
			self::$peer = new Dftemporal2Peer();
		}
		return self::$peer;
	}

} 