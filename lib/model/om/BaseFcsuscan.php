<?php


abstract class BaseFcsuscan extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsus;


	
	protected $numsol;


	
	protected $numlic;


	
	protected $estlic;


	
	protected $motsus;


	
	protected $fecsus;


	
	protected $resolu;


	
	protected $tomo;


	
	protected $folio;


	
	protected $numero;


	
	protected $funsus;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumsus()
	{

		return $this->numsus;
	}

	
	public function getNumsol()
	{

		return $this->numsol;
	}

	
	public function getNumlic()
	{

		return $this->numlic;
	}

	
	public function getEstlic()
	{

		return $this->estlic;
	}

	
	public function getMotsus()
	{

		return $this->motsus;
	}

	
	public function getFecsus($format = 'Y-m-d')
	{

		if ($this->fecsus === null || $this->fecsus === '') {
			return null;
		} elseif (!is_int($this->fecsus)) {
						$ts = strtotime($this->fecsus);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsus] as date/time value: " . var_export($this->fecsus, true));
			}
		} else {
			$ts = $this->fecsus;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getResolu()
	{

		return $this->resolu;
	}

	
	public function getTomo()
	{

		return $this->tomo;
	}

	
	public function getFolio()
	{

		return $this->folio;
	}

	
	public function getNumero()
	{

		return $this->numero;
	}

	
	public function getFunsus()
	{

		return $this->funsus;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumsus($v)
	{

		if ($this->numsus !== $v) {
			$this->numsus = $v;
			$this->modifiedColumns[] = FcsuscanPeer::NUMSUS;
		}

	} 
	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = FcsuscanPeer::NUMSOL;
		}

	} 
	
	public function setNumlic($v)
	{

		if ($this->numlic !== $v) {
			$this->numlic = $v;
			$this->modifiedColumns[] = FcsuscanPeer::NUMLIC;
		}

	} 
	
	public function setEstlic($v)
	{

		if ($this->estlic !== $v) {
			$this->estlic = $v;
			$this->modifiedColumns[] = FcsuscanPeer::ESTLIC;
		}

	} 
	
	public function setMotsus($v)
	{

		if ($this->motsus !== $v) {
			$this->motsus = $v;
			$this->modifiedColumns[] = FcsuscanPeer::MOTSUS;
		}

	} 
	
	public function setFecsus($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsus] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsus !== $ts) {
			$this->fecsus = $ts;
			$this->modifiedColumns[] = FcsuscanPeer::FECSUS;
		}

	} 
	
	public function setResolu($v)
	{

		if ($this->resolu !== $v) {
			$this->resolu = $v;
			$this->modifiedColumns[] = FcsuscanPeer::RESOLU;
		}

	} 
	
	public function setTomo($v)
	{

		if ($this->tomo !== $v) {
			$this->tomo = $v;
			$this->modifiedColumns[] = FcsuscanPeer::TOMO;
		}

	} 
	
	public function setFolio($v)
	{

		if ($this->folio !== $v) {
			$this->folio = $v;
			$this->modifiedColumns[] = FcsuscanPeer::FOLIO;
		}

	} 
	
	public function setNumero($v)
	{

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = FcsuscanPeer::NUMERO;
		}

	} 
	
	public function setFunsus($v)
	{

		if ($this->funsus !== $v) {
			$this->funsus = $v;
			$this->modifiedColumns[] = FcsuscanPeer::FUNSUS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcsuscanPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numsus = $rs->getString($startcol + 0);

			$this->numsol = $rs->getString($startcol + 1);

			$this->numlic = $rs->getString($startcol + 2);

			$this->estlic = $rs->getString($startcol + 3);

			$this->motsus = $rs->getString($startcol + 4);

			$this->fecsus = $rs->getDate($startcol + 5, null);

			$this->resolu = $rs->getString($startcol + 6);

			$this->tomo = $rs->getString($startcol + 7);

			$this->folio = $rs->getString($startcol + 8);

			$this->numero = $rs->getString($startcol + 9);

			$this->funsus = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcsuscan object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcsuscanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcsuscanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcsuscanPeer::DATABASE_NAME);
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
					$pk = FcsuscanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcsuscanPeer::doUpdate($this, $con);
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


			if (($retval = FcsuscanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsuscanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsus();
				break;
			case 1:
				return $this->getNumsol();
				break;
			case 2:
				return $this->getNumlic();
				break;
			case 3:
				return $this->getEstlic();
				break;
			case 4:
				return $this->getMotsus();
				break;
			case 5:
				return $this->getFecsus();
				break;
			case 6:
				return $this->getResolu();
				break;
			case 7:
				return $this->getTomo();
				break;
			case 8:
				return $this->getFolio();
				break;
			case 9:
				return $this->getNumero();
				break;
			case 10:
				return $this->getFunsus();
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
		$keys = FcsuscanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsus(),
			$keys[1] => $this->getNumsol(),
			$keys[2] => $this->getNumlic(),
			$keys[3] => $this->getEstlic(),
			$keys[4] => $this->getMotsus(),
			$keys[5] => $this->getFecsus(),
			$keys[6] => $this->getResolu(),
			$keys[7] => $this->getTomo(),
			$keys[8] => $this->getFolio(),
			$keys[9] => $this->getNumero(),
			$keys[10] => $this->getFunsus(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsuscanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsus($value);
				break;
			case 1:
				$this->setNumsol($value);
				break;
			case 2:
				$this->setNumlic($value);
				break;
			case 3:
				$this->setEstlic($value);
				break;
			case 4:
				$this->setMotsus($value);
				break;
			case 5:
				$this->setFecsus($value);
				break;
			case 6:
				$this->setResolu($value);
				break;
			case 7:
				$this->setTomo($value);
				break;
			case 8:
				$this->setFolio($value);
				break;
			case 9:
				$this->setNumero($value);
				break;
			case 10:
				$this->setFunsus($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsuscanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsus($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumlic($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstlic($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMotsus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecsus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setResolu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTomo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFolio($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumero($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFunsus($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcsuscanPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcsuscanPeer::NUMSUS)) $criteria->add(FcsuscanPeer::NUMSUS, $this->numsus);
		if ($this->isColumnModified(FcsuscanPeer::NUMSOL)) $criteria->add(FcsuscanPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(FcsuscanPeer::NUMLIC)) $criteria->add(FcsuscanPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcsuscanPeer::ESTLIC)) $criteria->add(FcsuscanPeer::ESTLIC, $this->estlic);
		if ($this->isColumnModified(FcsuscanPeer::MOTSUS)) $criteria->add(FcsuscanPeer::MOTSUS, $this->motsus);
		if ($this->isColumnModified(FcsuscanPeer::FECSUS)) $criteria->add(FcsuscanPeer::FECSUS, $this->fecsus);
		if ($this->isColumnModified(FcsuscanPeer::RESOLU)) $criteria->add(FcsuscanPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(FcsuscanPeer::TOMO)) $criteria->add(FcsuscanPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(FcsuscanPeer::FOLIO)) $criteria->add(FcsuscanPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(FcsuscanPeer::NUMERO)) $criteria->add(FcsuscanPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcsuscanPeer::FUNSUS)) $criteria->add(FcsuscanPeer::FUNSUS, $this->funsus);
		if ($this->isColumnModified(FcsuscanPeer::ID)) $criteria->add(FcsuscanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcsuscanPeer::DATABASE_NAME);

		$criteria->add(FcsuscanPeer::ID, $this->id);

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

		$copyObj->setNumsus($this->numsus);

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumlic($this->numlic);

		$copyObj->setEstlic($this->estlic);

		$copyObj->setMotsus($this->motsus);

		$copyObj->setFecsus($this->fecsus);

		$copyObj->setResolu($this->resolu);

		$copyObj->setTomo($this->tomo);

		$copyObj->setFolio($this->folio);

		$copyObj->setNumero($this->numero);

		$copyObj->setFunsus($this->funsus);


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
			self::$peer = new FcsuscanPeer();
		}
		return self::$peer;
	}

} 