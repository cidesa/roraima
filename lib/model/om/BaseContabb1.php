<?php


abstract class BaseContabb1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcta;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $pereje;


	
	protected $totdeb;


	
	protected $totcre;


	
	protected $salact;


	
	protected $salprgper;


	
	protected $salprgperfor;


	
	protected $id;

	
	protected $aContabb;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcta()
	{

		return $this->codcta;
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

	
	public function getFeccie($format = 'Y-m-d')
	{

		if ($this->feccie === null || $this->feccie === '') {
			return null;
		} elseif (!is_int($this->feccie)) {
						$ts = strtotime($this->feccie);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
			}
		} else {
			$ts = $this->feccie;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPereje()
	{

		return $this->pereje;
	}

	
	public function getTotdeb()
	{

		return $this->totdeb;
	}

	
	public function getTotcre()
	{

		return $this->totcre;
	}

	
	public function getSalact()
	{

		return $this->salact;
	}

	
	public function getSalprgper()
	{

		return $this->salprgper;
	}

	
	public function getSalprgperfor()
	{

		return $this->salprgperfor;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = Contabb1Peer::CODCTA;
		}

		if ($this->aContabb !== null && $this->aContabb->getCodcta() !== $v) {
			$this->aContabb = null;
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
			$this->modifiedColumns[] = Contabb1Peer::FECINI;
		}

	} 
	
	public function setFeccie($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccie !== $ts) {
			$this->feccie = $ts;
			$this->modifiedColumns[] = Contabb1Peer::FECCIE;
		}

	} 
	
	public function setPereje($v)
	{

		if ($this->pereje !== $v) {
			$this->pereje = $v;
			$this->modifiedColumns[] = Contabb1Peer::PEREJE;
		}

	} 
	
	public function setTotdeb($v)
	{

		if ($this->totdeb !== $v) {
			$this->totdeb = $v;
			$this->modifiedColumns[] = Contabb1Peer::TOTDEB;
		}

	} 
	
	public function setTotcre($v)
	{

		if ($this->totcre !== $v) {
			$this->totcre = $v;
			$this->modifiedColumns[] = Contabb1Peer::TOTCRE;
		}

	} 
	
	public function setSalact($v)
	{

		if ($this->salact !== $v) {
			$this->salact = $v;
			$this->modifiedColumns[] = Contabb1Peer::SALACT;
		}

	} 
	
	public function setSalprgper($v)
	{

		if ($this->salprgper !== $v) {
			$this->salprgper = $v;
			$this->modifiedColumns[] = Contabb1Peer::SALPRGPER;
		}

	} 
	
	public function setSalprgperfor($v)
	{

		if ($this->salprgperfor !== $v) {
			$this->salprgperfor = $v;
			$this->modifiedColumns[] = Contabb1Peer::SALPRGPERFOR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Contabb1Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcta = $rs->getString($startcol + 0);

			$this->fecini = $rs->getDate($startcol + 1, null);

			$this->feccie = $rs->getDate($startcol + 2, null);

			$this->pereje = $rs->getString($startcol + 3);

			$this->totdeb = $rs->getFloat($startcol + 4);

			$this->totcre = $rs->getFloat($startcol + 5);

			$this->salact = $rs->getFloat($startcol + 6);

			$this->salprgper = $rs->getFloat($startcol + 7);

			$this->salprgperfor = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Contabb1 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Contabb1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Contabb1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Contabb1Peer::DATABASE_NAME);
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


												
			if ($this->aContabb !== null) {
				if ($this->aContabb->isModified()) {
					$affectedRows += $this->aContabb->save($con);
				}
				$this->setContabb($this->aContabb);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = Contabb1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Contabb1Peer::doUpdate($this, $con);
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


												
			if ($this->aContabb !== null) {
				if (!$this->aContabb->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContabb->getValidationFailures());
				}
			}


			if (($retval = Contabb1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Contabb1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcta();
				break;
			case 1:
				return $this->getFecini();
				break;
			case 2:
				return $this->getFeccie();
				break;
			case 3:
				return $this->getPereje();
				break;
			case 4:
				return $this->getTotdeb();
				break;
			case 5:
				return $this->getTotcre();
				break;
			case 6:
				return $this->getSalact();
				break;
			case 7:
				return $this->getSalprgper();
				break;
			case 8:
				return $this->getSalprgperfor();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Contabb1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcta(),
			$keys[1] => $this->getFecini(),
			$keys[2] => $this->getFeccie(),
			$keys[3] => $this->getPereje(),
			$keys[4] => $this->getTotdeb(),
			$keys[5] => $this->getTotcre(),
			$keys[6] => $this->getSalact(),
			$keys[7] => $this->getSalprgper(),
			$keys[8] => $this->getSalprgperfor(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Contabb1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcta($value);
				break;
			case 1:
				$this->setFecini($value);
				break;
			case 2:
				$this->setFeccie($value);
				break;
			case 3:
				$this->setPereje($value);
				break;
			case 4:
				$this->setTotdeb($value);
				break;
			case 5:
				$this->setTotcre($value);
				break;
			case 6:
				$this->setSalact($value);
				break;
			case 7:
				$this->setSalprgper($value);
				break;
			case 8:
				$this->setSalprgperfor($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Contabb1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccie($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPereje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotdeb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotcre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSalact($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalprgper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalprgperfor($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Contabb1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Contabb1Peer::CODCTA)) $criteria->add(Contabb1Peer::CODCTA, $this->codcta);
		if ($this->isColumnModified(Contabb1Peer::FECINI)) $criteria->add(Contabb1Peer::FECINI, $this->fecini);
		if ($this->isColumnModified(Contabb1Peer::FECCIE)) $criteria->add(Contabb1Peer::FECCIE, $this->feccie);
		if ($this->isColumnModified(Contabb1Peer::PEREJE)) $criteria->add(Contabb1Peer::PEREJE, $this->pereje);
		if ($this->isColumnModified(Contabb1Peer::TOTDEB)) $criteria->add(Contabb1Peer::TOTDEB, $this->totdeb);
		if ($this->isColumnModified(Contabb1Peer::TOTCRE)) $criteria->add(Contabb1Peer::TOTCRE, $this->totcre);
		if ($this->isColumnModified(Contabb1Peer::SALACT)) $criteria->add(Contabb1Peer::SALACT, $this->salact);
		if ($this->isColumnModified(Contabb1Peer::SALPRGPER)) $criteria->add(Contabb1Peer::SALPRGPER, $this->salprgper);
		if ($this->isColumnModified(Contabb1Peer::SALPRGPERFOR)) $criteria->add(Contabb1Peer::SALPRGPERFOR, $this->salprgperfor);
		if ($this->isColumnModified(Contabb1Peer::ID)) $criteria->add(Contabb1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Contabb1Peer::DATABASE_NAME);

		$criteria->add(Contabb1Peer::ID, $this->id);

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

		$copyObj->setCodcta($this->codcta);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setPereje($this->pereje);

		$copyObj->setTotdeb($this->totdeb);

		$copyObj->setTotcre($this->totcre);

		$copyObj->setSalact($this->salact);

		$copyObj->setSalprgper($this->salprgper);

		$copyObj->setSalprgperfor($this->salprgperfor);


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
			self::$peer = new Contabb1Peer();
		}
		return self::$peer;
	}

	
	public function setContabb($v)
	{


		if ($v === null) {
			$this->setCodcta(NULL);
		} else {
			$this->setCodcta($v->getCodcta());
		}


		$this->aContabb = $v;
	}


	
	public function getContabb($con = null)
	{
				include_once 'lib/model/om/BaseContabbPeer.php';

		if ($this->aContabb === null && (($this->codcta !== "" && $this->codcta !== null))) {

			$this->aContabb = ContabbPeer::retrieveByPK($this->codcta, $con);

			
		}
		return $this->aContabb;
	}

} 