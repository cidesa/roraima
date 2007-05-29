<?php


abstract class BaseNpinffam extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $nomfam;


	
	protected $sexfam;


	
	protected $fecnac;


	
	protected $edafam;


	
	protected $parfam;


	
	protected $edociv;


	
	protected $grains;


	
	protected $traofi;


	
	protected $codgua;


	
	protected $seghcm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCedfam()
	{

		return $this->cedfam; 		
	}
	
	public function getNomfam()
	{

		return $this->nomfam; 		
	}
	
	public function getSexfam()
	{

		return $this->sexfam; 		
	}
	
	public function getFecnac($format = 'Y-m-d')
	{

		if ($this->fecnac === null || $this->fecnac === '') {
			return null;
		} elseif (!is_int($this->fecnac)) {
						$ts = strtotime($this->fecnac);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
			}
		} else {
			$ts = $this->fecnac;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEdafam()
	{

		return number_format($this->edafam,2,',','.');
		
	}
	
	public function getParfam()
	{

		return $this->parfam; 		
	}
	
	public function getEdociv()
	{

		return $this->edociv; 		
	}
	
	public function getGrains()
	{

		return $this->grains; 		
	}
	
	public function getTraofi()
	{

		return $this->traofi; 		
	}
	
	public function getCodgua()
	{

		return $this->codgua; 		
	}
	
	public function getSeghcm()
	{

		return $this->seghcm; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpinffamPeer::CODEMP;
		}

	} 
	
	public function setCedfam($v)
	{

		if ($this->cedfam !== $v) {
			$this->cedfam = $v;
			$this->modifiedColumns[] = NpinffamPeer::CEDFAM;
		}

	} 
	
	public function setNomfam($v)
	{

		if ($this->nomfam !== $v) {
			$this->nomfam = $v;
			$this->modifiedColumns[] = NpinffamPeer::NOMFAM;
		}

	} 
	
	public function setSexfam($v)
	{

		if ($this->sexfam !== $v) {
			$this->sexfam = $v;
			$this->modifiedColumns[] = NpinffamPeer::SEXFAM;
		}

	} 
	
	public function setFecnac($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnac !== $ts) {
			$this->fecnac = $ts;
			$this->modifiedColumns[] = NpinffamPeer::FECNAC;
		}

	} 
	
	public function setEdafam($v)
	{

		if ($this->edafam !== $v) {
			$this->edafam = $v;
			$this->modifiedColumns[] = NpinffamPeer::EDAFAM;
		}

	} 
	
	public function setParfam($v)
	{

		if ($this->parfam !== $v) {
			$this->parfam = $v;
			$this->modifiedColumns[] = NpinffamPeer::PARFAM;
		}

	} 
	
	public function setEdociv($v)
	{

		if ($this->edociv !== $v) {
			$this->edociv = $v;
			$this->modifiedColumns[] = NpinffamPeer::EDOCIV;
		}

	} 
	
	public function setGrains($v)
	{

		if ($this->grains !== $v) {
			$this->grains = $v;
			$this->modifiedColumns[] = NpinffamPeer::GRAINS;
		}

	} 
	
	public function setTraofi($v)
	{

		if ($this->traofi !== $v) {
			$this->traofi = $v;
			$this->modifiedColumns[] = NpinffamPeer::TRAOFI;
		}

	} 
	
	public function setCodgua($v)
	{

		if ($this->codgua !== $v) {
			$this->codgua = $v;
			$this->modifiedColumns[] = NpinffamPeer::CODGUA;
		}

	} 
	
	public function setSeghcm($v)
	{

		if ($this->seghcm !== $v) {
			$this->seghcm = $v;
			$this->modifiedColumns[] = NpinffamPeer::SEGHCM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpinffamPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->cedfam = $rs->getString($startcol + 1);

			$this->nomfam = $rs->getString($startcol + 2);

			$this->sexfam = $rs->getString($startcol + 3);

			$this->fecnac = $rs->getDate($startcol + 4, null);

			$this->edafam = $rs->getFloat($startcol + 5);

			$this->parfam = $rs->getString($startcol + 6);

			$this->edociv = $rs->getString($startcol + 7);

			$this->grains = $rs->getString($startcol + 8);

			$this->traofi = $rs->getString($startcol + 9);

			$this->codgua = $rs->getString($startcol + 10);

			$this->seghcm = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npinffam object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinffamPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
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
					$pk = NpinffamPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpinffamPeer::doUpdate($this, $con);
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


			if (($retval = NpinffamPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinffamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCedfam();
				break;
			case 2:
				return $this->getNomfam();
				break;
			case 3:
				return $this->getSexfam();
				break;
			case 4:
				return $this->getFecnac();
				break;
			case 5:
				return $this->getEdafam();
				break;
			case 6:
				return $this->getParfam();
				break;
			case 7:
				return $this->getEdociv();
				break;
			case 8:
				return $this->getGrains();
				break;
			case 9:
				return $this->getTraofi();
				break;
			case 10:
				return $this->getCodgua();
				break;
			case 11:
				return $this->getSeghcm();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinffamPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCedfam(),
			$keys[2] => $this->getNomfam(),
			$keys[3] => $this->getSexfam(),
			$keys[4] => $this->getFecnac(),
			$keys[5] => $this->getEdafam(),
			$keys[6] => $this->getParfam(),
			$keys[7] => $this->getEdociv(),
			$keys[8] => $this->getGrains(),
			$keys[9] => $this->getTraofi(),
			$keys[10] => $this->getCodgua(),
			$keys[11] => $this->getSeghcm(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinffamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCedfam($value);
				break;
			case 2:
				$this->setNomfam($value);
				break;
			case 3:
				$this->setSexfam($value);
				break;
			case 4:
				$this->setFecnac($value);
				break;
			case 5:
				$this->setEdafam($value);
				break;
			case 6:
				$this->setParfam($value);
				break;
			case 7:
				$this->setEdociv($value);
				break;
			case 8:
				$this->setGrains($value);
				break;
			case 9:
				$this->setTraofi($value);
				break;
			case 10:
				$this->setCodgua($value);
				break;
			case 11:
				$this->setSeghcm($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinffamPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedfam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSexfam($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEdafam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setParfam($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEdociv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGrains($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTraofi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodgua($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSeghcm($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinffamPeer::CODEMP)) $criteria->add(NpinffamPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinffamPeer::CEDFAM)) $criteria->add(NpinffamPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(NpinffamPeer::NOMFAM)) $criteria->add(NpinffamPeer::NOMFAM, $this->nomfam);
		if ($this->isColumnModified(NpinffamPeer::SEXFAM)) $criteria->add(NpinffamPeer::SEXFAM, $this->sexfam);
		if ($this->isColumnModified(NpinffamPeer::FECNAC)) $criteria->add(NpinffamPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(NpinffamPeer::EDAFAM)) $criteria->add(NpinffamPeer::EDAFAM, $this->edafam);
		if ($this->isColumnModified(NpinffamPeer::PARFAM)) $criteria->add(NpinffamPeer::PARFAM, $this->parfam);
		if ($this->isColumnModified(NpinffamPeer::EDOCIV)) $criteria->add(NpinffamPeer::EDOCIV, $this->edociv);
		if ($this->isColumnModified(NpinffamPeer::GRAINS)) $criteria->add(NpinffamPeer::GRAINS, $this->grains);
		if ($this->isColumnModified(NpinffamPeer::TRAOFI)) $criteria->add(NpinffamPeer::TRAOFI, $this->traofi);
		if ($this->isColumnModified(NpinffamPeer::CODGUA)) $criteria->add(NpinffamPeer::CODGUA, $this->codgua);
		if ($this->isColumnModified(NpinffamPeer::SEGHCM)) $criteria->add(NpinffamPeer::SEGHCM, $this->seghcm);
		if ($this->isColumnModified(NpinffamPeer::ID)) $criteria->add(NpinffamPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		$criteria->add(NpinffamPeer::ID, $this->id);

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

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setNomfam($this->nomfam);

		$copyObj->setSexfam($this->sexfam);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setEdafam($this->edafam);

		$copyObj->setParfam($this->parfam);

		$copyObj->setEdociv($this->edociv);

		$copyObj->setGrains($this->grains);

		$copyObj->setTraofi($this->traofi);

		$copyObj->setCodgua($this->codgua);

		$copyObj->setSeghcm($this->seghcm);


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
			self::$peer = new NpinffamPeer();
		}
		return self::$peer;
	}

} 