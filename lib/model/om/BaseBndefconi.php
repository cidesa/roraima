<?php


abstract class BaseBndefconi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codinm;


	
	protected $ctadepcar;


	
	protected $ctadepabo;


	
	protected $ctaajucar;


	
	protected $ctaajuabo;


	
	protected $ctarevcar;


	
	protected $ctarevabo;


	
	protected $stacta;


	
	protected $ctapercar;


	
	protected $ctaperabo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getCodinm()
	{

		return $this->codinm; 		
	}
	
	public function getCtadepcar()
	{

		return $this->ctadepcar; 		
	}
	
	public function getCtadepabo()
	{

		return $this->ctadepabo; 		
	}
	
	public function getCtaajucar()
	{

		return $this->ctaajucar; 		
	}
	
	public function getCtaajuabo()
	{

		return $this->ctaajuabo; 		
	}
	
	public function getCtarevcar()
	{

		return $this->ctarevcar; 		
	}
	
	public function getCtarevabo()
	{

		return $this->ctarevabo; 		
	}
	
	public function getStacta()
	{

		return $this->stacta; 		
	}
	
	public function getCtapercar()
	{

		return $this->ctapercar; 		
	}
	
	public function getCtaperabo()
	{

		return $this->ctaperabo; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BndefconiPeer::CODACT;
		}

	} 
	
	public function setCodinm($v)
	{

		if ($this->codinm !== $v) {
			$this->codinm = $v;
			$this->modifiedColumns[] = BndefconiPeer::CODINM;
		}

	} 
	
	public function setCtadepcar($v)
	{

		if ($this->ctadepcar !== $v) {
			$this->ctadepcar = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTADEPCAR;
		}

	} 
	
	public function setCtadepabo($v)
	{

		if ($this->ctadepabo !== $v) {
			$this->ctadepabo = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTADEPABO;
		}

	} 
	
	public function setCtaajucar($v)
	{

		if ($this->ctaajucar !== $v) {
			$this->ctaajucar = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTAAJUCAR;
		}

	} 
	
	public function setCtaajuabo($v)
	{

		if ($this->ctaajuabo !== $v) {
			$this->ctaajuabo = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTAAJUABO;
		}

	} 
	
	public function setCtarevcar($v)
	{

		if ($this->ctarevcar !== $v) {
			$this->ctarevcar = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTAREVCAR;
		}

	} 
	
	public function setCtarevabo($v)
	{

		if ($this->ctarevabo !== $v) {
			$this->ctarevabo = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTAREVABO;
		}

	} 
	
	public function setStacta($v)
	{

		if ($this->stacta !== $v) {
			$this->stacta = $v;
			$this->modifiedColumns[] = BndefconiPeer::STACTA;
		}

	} 
	
	public function setCtapercar($v)
	{

		if ($this->ctapercar !== $v) {
			$this->ctapercar = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTAPERCAR;
		}

	} 
	
	public function setCtaperabo($v)
	{

		if ($this->ctaperabo !== $v) {
			$this->ctaperabo = $v;
			$this->modifiedColumns[] = BndefconiPeer::CTAPERABO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndefconiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->codinm = $rs->getString($startcol + 1);

			$this->ctadepcar = $rs->getString($startcol + 2);

			$this->ctadepabo = $rs->getString($startcol + 3);

			$this->ctaajucar = $rs->getString($startcol + 4);

			$this->ctaajuabo = $rs->getString($startcol + 5);

			$this->ctarevcar = $rs->getString($startcol + 6);

			$this->ctarevabo = $rs->getString($startcol + 7);

			$this->stacta = $rs->getString($startcol + 8);

			$this->ctapercar = $rs->getString($startcol + 9);

			$this->ctaperabo = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndefconi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndefconiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndefconiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndefconiPeer::DATABASE_NAME);
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
					$pk = BndefconiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndefconiPeer::doUpdate($this, $con);
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


			if (($retval = BndefconiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefconiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodinm();
				break;
			case 2:
				return $this->getCtadepcar();
				break;
			case 3:
				return $this->getCtadepabo();
				break;
			case 4:
				return $this->getCtaajucar();
				break;
			case 5:
				return $this->getCtaajuabo();
				break;
			case 6:
				return $this->getCtarevcar();
				break;
			case 7:
				return $this->getCtarevabo();
				break;
			case 8:
				return $this->getStacta();
				break;
			case 9:
				return $this->getCtapercar();
				break;
			case 10:
				return $this->getCtaperabo();
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
		$keys = BndefconiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodinm(),
			$keys[2] => $this->getCtadepcar(),
			$keys[3] => $this->getCtadepabo(),
			$keys[4] => $this->getCtaajucar(),
			$keys[5] => $this->getCtaajuabo(),
			$keys[6] => $this->getCtarevcar(),
			$keys[7] => $this->getCtarevabo(),
			$keys[8] => $this->getStacta(),
			$keys[9] => $this->getCtapercar(),
			$keys[10] => $this->getCtaperabo(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndefconiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodinm($value);
				break;
			case 2:
				$this->setCtadepcar($value);
				break;
			case 3:
				$this->setCtadepabo($value);
				break;
			case 4:
				$this->setCtaajucar($value);
				break;
			case 5:
				$this->setCtaajuabo($value);
				break;
			case 6:
				$this->setCtarevcar($value);
				break;
			case 7:
				$this->setCtarevabo($value);
				break;
			case 8:
				$this->setStacta($value);
				break;
			case 9:
				$this->setCtapercar($value);
				break;
			case 10:
				$this->setCtaperabo($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndefconiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtadepcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCtadepabo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCtaajucar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCtaajuabo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCtarevcar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCtarevabo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStacta($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCtapercar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCtaperabo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndefconiPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndefconiPeer::CODACT)) $criteria->add(BndefconiPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndefconiPeer::CODINM)) $criteria->add(BndefconiPeer::CODINM, $this->codinm);
		if ($this->isColumnModified(BndefconiPeer::CTADEPCAR)) $criteria->add(BndefconiPeer::CTADEPCAR, $this->ctadepcar);
		if ($this->isColumnModified(BndefconiPeer::CTADEPABO)) $criteria->add(BndefconiPeer::CTADEPABO, $this->ctadepabo);
		if ($this->isColumnModified(BndefconiPeer::CTAAJUCAR)) $criteria->add(BndefconiPeer::CTAAJUCAR, $this->ctaajucar);
		if ($this->isColumnModified(BndefconiPeer::CTAAJUABO)) $criteria->add(BndefconiPeer::CTAAJUABO, $this->ctaajuabo);
		if ($this->isColumnModified(BndefconiPeer::CTAREVCAR)) $criteria->add(BndefconiPeer::CTAREVCAR, $this->ctarevcar);
		if ($this->isColumnModified(BndefconiPeer::CTAREVABO)) $criteria->add(BndefconiPeer::CTAREVABO, $this->ctarevabo);
		if ($this->isColumnModified(BndefconiPeer::STACTA)) $criteria->add(BndefconiPeer::STACTA, $this->stacta);
		if ($this->isColumnModified(BndefconiPeer::CTAPERCAR)) $criteria->add(BndefconiPeer::CTAPERCAR, $this->ctapercar);
		if ($this->isColumnModified(BndefconiPeer::CTAPERABO)) $criteria->add(BndefconiPeer::CTAPERABO, $this->ctaperabo);
		if ($this->isColumnModified(BndefconiPeer::ID)) $criteria->add(BndefconiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndefconiPeer::DATABASE_NAME);

		$criteria->add(BndefconiPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodinm($this->codinm);

		$copyObj->setCtadepcar($this->ctadepcar);

		$copyObj->setCtadepabo($this->ctadepabo);

		$copyObj->setCtaajucar($this->ctaajucar);

		$copyObj->setCtaajuabo($this->ctaajuabo);

		$copyObj->setCtarevcar($this->ctarevcar);

		$copyObj->setCtarevabo($this->ctarevabo);

		$copyObj->setStacta($this->stacta);

		$copyObj->setCtapercar($this->ctapercar);

		$copyObj->setCtaperabo($this->ctaperabo);


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
			self::$peer = new BndefconiPeer();
		}
		return self::$peer;
	}

} 