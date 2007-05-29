<?php


abstract class BaseCaconpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codconpag;


	
	protected $desconpag;


	
	protected $tipconpag;


	
	protected $numdia;


	
	protected $generaop;


	
	protected $asiparrec;


	
	protected $generacom;


	
	protected $mercon;


	
	protected $ctadev;


	
	protected $ctavco;


	
	protected $univta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodconpag()
	{

		return $this->codconpag; 		
	}
	
	public function getDesconpag()
	{

		return $this->desconpag; 		
	}
	
	public function getTipconpag()
	{

		return $this->tipconpag; 		
	}
	
	public function getNumdia()
	{

		return number_format($this->numdia,2,',','.');
		
	}
	
	public function getGeneraop()
	{

		return $this->generaop; 		
	}
	
	public function getAsiparrec()
	{

		return $this->asiparrec; 		
	}
	
	public function getGeneracom()
	{

		return $this->generacom; 		
	}
	
	public function getMercon()
	{

		return $this->mercon; 		
	}
	
	public function getCtadev()
	{

		return $this->ctadev; 		
	}
	
	public function getCtavco()
	{

		return $this->ctavco; 		
	}
	
	public function getUnivta()
	{

		return $this->univta; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodconpag($v)
	{

		if ($this->codconpag !== $v) {
			$this->codconpag = $v;
			$this->modifiedColumns[] = CaconpagPeer::CODCONPAG;
		}

	} 
	
	public function setDesconpag($v)
	{

		if ($this->desconpag !== $v) {
			$this->desconpag = $v;
			$this->modifiedColumns[] = CaconpagPeer::DESCONPAG;
		}

	} 
	
	public function setTipconpag($v)
	{

		if ($this->tipconpag !== $v) {
			$this->tipconpag = $v;
			$this->modifiedColumns[] = CaconpagPeer::TIPCONPAG;
		}

	} 
	
	public function setNumdia($v)
	{

		if ($this->numdia !== $v) {
			$this->numdia = $v;
			$this->modifiedColumns[] = CaconpagPeer::NUMDIA;
		}

	} 
	
	public function setGeneraop($v)
	{

		if ($this->generaop !== $v) {
			$this->generaop = $v;
			$this->modifiedColumns[] = CaconpagPeer::GENERAOP;
		}

	} 
	
	public function setAsiparrec($v)
	{

		if ($this->asiparrec !== $v) {
			$this->asiparrec = $v;
			$this->modifiedColumns[] = CaconpagPeer::ASIPARREC;
		}

	} 
	
	public function setGeneracom($v)
	{

		if ($this->generacom !== $v) {
			$this->generacom = $v;
			$this->modifiedColumns[] = CaconpagPeer::GENERACOM;
		}

	} 
	
	public function setMercon($v)
	{

		if ($this->mercon !== $v) {
			$this->mercon = $v;
			$this->modifiedColumns[] = CaconpagPeer::MERCON;
		}

	} 
	
	public function setCtadev($v)
	{

		if ($this->ctadev !== $v) {
			$this->ctadev = $v;
			$this->modifiedColumns[] = CaconpagPeer::CTADEV;
		}

	} 
	
	public function setCtavco($v)
	{

		if ($this->ctavco !== $v) {
			$this->ctavco = $v;
			$this->modifiedColumns[] = CaconpagPeer::CTAVCO;
		}

	} 
	
	public function setUnivta($v)
	{

		if ($this->univta !== $v) {
			$this->univta = $v;
			$this->modifiedColumns[] = CaconpagPeer::UNIVTA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaconpagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codconpag = $rs->getString($startcol + 0);

			$this->desconpag = $rs->getString($startcol + 1);

			$this->tipconpag = $rs->getString($startcol + 2);

			$this->numdia = $rs->getFloat($startcol + 3);

			$this->generaop = $rs->getString($startcol + 4);

			$this->asiparrec = $rs->getString($startcol + 5);

			$this->generacom = $rs->getString($startcol + 6);

			$this->mercon = $rs->getString($startcol + 7);

			$this->ctadev = $rs->getString($startcol + 8);

			$this->ctavco = $rs->getString($startcol + 9);

			$this->univta = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caconpag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaconpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaconpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaconpagPeer::DATABASE_NAME);
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
					$pk = CaconpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaconpagPeer::doUpdate($this, $con);
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


			if (($retval = CaconpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodconpag();
				break;
			case 1:
				return $this->getDesconpag();
				break;
			case 2:
				return $this->getTipconpag();
				break;
			case 3:
				return $this->getNumdia();
				break;
			case 4:
				return $this->getGeneraop();
				break;
			case 5:
				return $this->getAsiparrec();
				break;
			case 6:
				return $this->getGeneracom();
				break;
			case 7:
				return $this->getMercon();
				break;
			case 8:
				return $this->getCtadev();
				break;
			case 9:
				return $this->getCtavco();
				break;
			case 10:
				return $this->getUnivta();
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
		$keys = CaconpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodconpag(),
			$keys[1] => $this->getDesconpag(),
			$keys[2] => $this->getTipconpag(),
			$keys[3] => $this->getNumdia(),
			$keys[4] => $this->getGeneraop(),
			$keys[5] => $this->getAsiparrec(),
			$keys[6] => $this->getGeneracom(),
			$keys[7] => $this->getMercon(),
			$keys[8] => $this->getCtadev(),
			$keys[9] => $this->getCtavco(),
			$keys[10] => $this->getUnivta(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaconpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodconpag($value);
				break;
			case 1:
				$this->setDesconpag($value);
				break;
			case 2:
				$this->setTipconpag($value);
				break;
			case 3:
				$this->setNumdia($value);
				break;
			case 4:
				$this->setGeneraop($value);
				break;
			case 5:
				$this->setAsiparrec($value);
				break;
			case 6:
				$this->setGeneracom($value);
				break;
			case 7:
				$this->setMercon($value);
				break;
			case 8:
				$this->setCtadev($value);
				break;
			case 9:
				$this->setCtavco($value);
				break;
			case 10:
				$this->setUnivta($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaconpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodconpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesconpag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipconpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumdia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGeneraop($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAsiparrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGeneracom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMercon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCtadev($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCtavco($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUnivta($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaconpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaconpagPeer::CODCONPAG)) $criteria->add(CaconpagPeer::CODCONPAG, $this->codconpag);
		if ($this->isColumnModified(CaconpagPeer::DESCONPAG)) $criteria->add(CaconpagPeer::DESCONPAG, $this->desconpag);
		if ($this->isColumnModified(CaconpagPeer::TIPCONPAG)) $criteria->add(CaconpagPeer::TIPCONPAG, $this->tipconpag);
		if ($this->isColumnModified(CaconpagPeer::NUMDIA)) $criteria->add(CaconpagPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(CaconpagPeer::GENERAOP)) $criteria->add(CaconpagPeer::GENERAOP, $this->generaop);
		if ($this->isColumnModified(CaconpagPeer::ASIPARREC)) $criteria->add(CaconpagPeer::ASIPARREC, $this->asiparrec);
		if ($this->isColumnModified(CaconpagPeer::GENERACOM)) $criteria->add(CaconpagPeer::GENERACOM, $this->generacom);
		if ($this->isColumnModified(CaconpagPeer::MERCON)) $criteria->add(CaconpagPeer::MERCON, $this->mercon);
		if ($this->isColumnModified(CaconpagPeer::CTADEV)) $criteria->add(CaconpagPeer::CTADEV, $this->ctadev);
		if ($this->isColumnModified(CaconpagPeer::CTAVCO)) $criteria->add(CaconpagPeer::CTAVCO, $this->ctavco);
		if ($this->isColumnModified(CaconpagPeer::UNIVTA)) $criteria->add(CaconpagPeer::UNIVTA, $this->univta);
		if ($this->isColumnModified(CaconpagPeer::ID)) $criteria->add(CaconpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaconpagPeer::DATABASE_NAME);

		$criteria->add(CaconpagPeer::ID, $this->id);

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

		$copyObj->setCodconpag($this->codconpag);

		$copyObj->setDesconpag($this->desconpag);

		$copyObj->setTipconpag($this->tipconpag);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setGeneraop($this->generaop);

		$copyObj->setAsiparrec($this->asiparrec);

		$copyObj->setGeneracom($this->generacom);

		$copyObj->setMercon($this->mercon);

		$copyObj->setCtadev($this->ctadev);

		$copyObj->setCtavco($this->ctavco);

		$copyObj->setUnivta($this->univta);


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
			self::$peer = new CaconpagPeer();
		}
		return self::$peer;
	}

} 