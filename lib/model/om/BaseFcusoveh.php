<?php


abstract class BaseFcusoveh extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduso;


	
	protected $anovig;


	
	protected $desuso;


	
	protected $monafo;


	
	protected $porali;


	
	protected $anolim;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduso()
	{

		return $this->coduso;
	}

	
	public function getAnovig()
	{

		return $this->anovig;
	}

	
	public function getDesuso()
	{

		return $this->desuso;
	}

	
	public function getMonafo()
	{

		return $this->monafo;
	}

	
	public function getPorali()
	{

		return $this->porali;
	}

	
	public function getAnolim()
	{

		return $this->anolim;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = FcusovehPeer::CODUSO;
		}

	} 
	
	public function setAnovig($v)
	{

		if ($this->anovig !== $v) {
			$this->anovig = $v;
			$this->modifiedColumns[] = FcusovehPeer::ANOVIG;
		}

	} 
	
	public function setDesuso($v)
	{

		if ($this->desuso !== $v) {
			$this->desuso = $v;
			$this->modifiedColumns[] = FcusovehPeer::DESUSO;
		}

	} 
	
	public function setMonafo($v)
	{

		if ($this->monafo !== $v) {
			$this->monafo = $v;
			$this->modifiedColumns[] = FcusovehPeer::MONAFO;
		}

	} 
	
	public function setPorali($v)
	{

		if ($this->porali !== $v) {
			$this->porali = $v;
			$this->modifiedColumns[] = FcusovehPeer::PORALI;
		}

	} 
	
	public function setAnolim($v)
	{

		if ($this->anolim !== $v) {
			$this->anolim = $v;
			$this->modifiedColumns[] = FcusovehPeer::ANOLIM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcusovehPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coduso = $rs->getString($startcol + 0);

			$this->anovig = $rs->getString($startcol + 1);

			$this->desuso = $rs->getString($startcol + 2);

			$this->monafo = $rs->getFloat($startcol + 3);

			$this->porali = $rs->getFloat($startcol + 4);

			$this->anolim = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcusoveh object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcusovehPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcusovehPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcusovehPeer::DATABASE_NAME);
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
					$pk = FcusovehPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcusovehPeer::doUpdate($this, $con);
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


			if (($retval = FcusovehPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcusovehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduso();
				break;
			case 1:
				return $this->getAnovig();
				break;
			case 2:
				return $this->getDesuso();
				break;
			case 3:
				return $this->getMonafo();
				break;
			case 4:
				return $this->getPorali();
				break;
			case 5:
				return $this->getAnolim();
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
		$keys = FcusovehPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduso(),
			$keys[1] => $this->getAnovig(),
			$keys[2] => $this->getDesuso(),
			$keys[3] => $this->getMonafo(),
			$keys[4] => $this->getPorali(),
			$keys[5] => $this->getAnolim(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcusovehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduso($value);
				break;
			case 1:
				$this->setAnovig($value);
				break;
			case 2:
				$this->setDesuso($value);
				break;
			case 3:
				$this->setMonafo($value);
				break;
			case 4:
				$this->setPorali($value);
				break;
			case 5:
				$this->setAnolim($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcusovehPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnovig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesuso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonafo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorali($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnolim($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcusovehPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcusovehPeer::CODUSO)) $criteria->add(FcusovehPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcusovehPeer::ANOVIG)) $criteria->add(FcusovehPeer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(FcusovehPeer::DESUSO)) $criteria->add(FcusovehPeer::DESUSO, $this->desuso);
		if ($this->isColumnModified(FcusovehPeer::MONAFO)) $criteria->add(FcusovehPeer::MONAFO, $this->monafo);
		if ($this->isColumnModified(FcusovehPeer::PORALI)) $criteria->add(FcusovehPeer::PORALI, $this->porali);
		if ($this->isColumnModified(FcusovehPeer::ANOLIM)) $criteria->add(FcusovehPeer::ANOLIM, $this->anolim);
		if ($this->isColumnModified(FcusovehPeer::ID)) $criteria->add(FcusovehPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcusovehPeer::DATABASE_NAME);

		$criteria->add(FcusovehPeer::ANOVIG, $this->anovig);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getAnovig();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setAnovig($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCoduso($this->coduso);

		$copyObj->setDesuso($this->desuso);

		$copyObj->setMonafo($this->monafo);

		$copyObj->setPorali($this->porali);

		$copyObj->setAnolim($this->anolim);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setAnovig(NULL); 
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
			self::$peer = new FcusovehPeer();
		}
		return self::$peer;
	}

} 