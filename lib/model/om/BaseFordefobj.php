<?php


abstract class BaseFordefobj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobj;


	
	protected $desobj;


	
	protected $areest;


	
	protected $direst;


	
	protected $objein;


	
	protected $objepr;


	
	protected $enupro;


	
	protected $indact;


	
	protected $indobj;


	
	protected $metpro;


	
	protected $objnet;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodobj()
	{

		return $this->codobj;
	}

	
	public function getDesobj()
	{

		return $this->desobj;
	}

	
	public function getAreest()
	{

		return $this->areest;
	}

	
	public function getDirest()
	{

		return $this->direst;
	}

	
	public function getObjein()
	{

		return $this->objein;
	}

	
	public function getObjepr()
	{

		return $this->objepr;
	}

	
	public function getEnupro()
	{

		return $this->enupro;
	}

	
	public function getIndact()
	{

		return $this->indact;
	}

	
	public function getIndobj()
	{

		return $this->indobj;
	}

	
	public function getMetpro()
	{

		return $this->metpro;
	}

	
	public function getObjnet()
	{

		return $this->objnet;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodobj($v)
	{

		if ($this->codobj !== $v) {
			$this->codobj = $v;
			$this->modifiedColumns[] = FordefobjPeer::CODOBJ;
		}

	} 
	
	public function setDesobj($v)
	{

		if ($this->desobj !== $v) {
			$this->desobj = $v;
			$this->modifiedColumns[] = FordefobjPeer::DESOBJ;
		}

	} 
	
	public function setAreest($v)
	{

		if ($this->areest !== $v) {
			$this->areest = $v;
			$this->modifiedColumns[] = FordefobjPeer::AREEST;
		}

	} 
	
	public function setDirest($v)
	{

		if ($this->direst !== $v) {
			$this->direst = $v;
			$this->modifiedColumns[] = FordefobjPeer::DIREST;
		}

	} 
	
	public function setObjein($v)
	{

		if ($this->objein !== $v) {
			$this->objein = $v;
			$this->modifiedColumns[] = FordefobjPeer::OBJEIN;
		}

	} 
	
	public function setObjepr($v)
	{

		if ($this->objepr !== $v) {
			$this->objepr = $v;
			$this->modifiedColumns[] = FordefobjPeer::OBJEPR;
		}

	} 
	
	public function setEnupro($v)
	{

		if ($this->enupro !== $v) {
			$this->enupro = $v;
			$this->modifiedColumns[] = FordefobjPeer::ENUPRO;
		}

	} 
	
	public function setIndact($v)
	{

		if ($this->indact !== $v) {
			$this->indact = $v;
			$this->modifiedColumns[] = FordefobjPeer::INDACT;
		}

	} 
	
	public function setIndobj($v)
	{

		if ($this->indobj !== $v) {
			$this->indobj = $v;
			$this->modifiedColumns[] = FordefobjPeer::INDOBJ;
		}

	} 
	
	public function setMetpro($v)
	{

		if ($this->metpro !== $v) {
			$this->metpro = $v;
			$this->modifiedColumns[] = FordefobjPeer::METPRO;
		}

	} 
	
	public function setObjnet($v)
	{

		if ($this->objnet !== $v) {
			$this->objnet = $v;
			$this->modifiedColumns[] = FordefobjPeer::OBJNET;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefobjPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codobj = $rs->getString($startcol + 0);

			$this->desobj = $rs->getString($startcol + 1);

			$this->areest = $rs->getString($startcol + 2);

			$this->direst = $rs->getString($startcol + 3);

			$this->objein = $rs->getString($startcol + 4);

			$this->objepr = $rs->getString($startcol + 5);

			$this->enupro = $rs->getString($startcol + 6);

			$this->indact = $rs->getString($startcol + 7);

			$this->indobj = $rs->getString($startcol + 8);

			$this->metpro = $rs->getString($startcol + 9);

			$this->objnet = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefobj object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefobjPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefobjPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefobjPeer::DATABASE_NAME);
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
					$pk = FordefobjPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefobjPeer::doUpdate($this, $con);
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


			if (($retval = FordefobjPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobj();
				break;
			case 1:
				return $this->getDesobj();
				break;
			case 2:
				return $this->getAreest();
				break;
			case 3:
				return $this->getDirest();
				break;
			case 4:
				return $this->getObjein();
				break;
			case 5:
				return $this->getObjepr();
				break;
			case 6:
				return $this->getEnupro();
				break;
			case 7:
				return $this->getIndact();
				break;
			case 8:
				return $this->getIndobj();
				break;
			case 9:
				return $this->getMetpro();
				break;
			case 10:
				return $this->getObjnet();
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
		$keys = FordefobjPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobj(),
			$keys[1] => $this->getDesobj(),
			$keys[2] => $this->getAreest(),
			$keys[3] => $this->getDirest(),
			$keys[4] => $this->getObjein(),
			$keys[5] => $this->getObjepr(),
			$keys[6] => $this->getEnupro(),
			$keys[7] => $this->getIndact(),
			$keys[8] => $this->getIndobj(),
			$keys[9] => $this->getMetpro(),
			$keys[10] => $this->getObjnet(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefobjPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobj($value);
				break;
			case 1:
				$this->setDesobj($value);
				break;
			case 2:
				$this->setAreest($value);
				break;
			case 3:
				$this->setDirest($value);
				break;
			case 4:
				$this->setObjein($value);
				break;
			case 5:
				$this->setObjepr($value);
				break;
			case 6:
				$this->setEnupro($value);
				break;
			case 7:
				$this->setIndact($value);
				break;
			case 8:
				$this->setIndobj($value);
				break;
			case 9:
				$this->setMetpro($value);
				break;
			case 10:
				$this->setObjnet($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefobjPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesobj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAreest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirest($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObjein($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObjepr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEnupro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIndact($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIndobj($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMetpro($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setObjnet($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefobjPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefobjPeer::CODOBJ)) $criteria->add(FordefobjPeer::CODOBJ, $this->codobj);
		if ($this->isColumnModified(FordefobjPeer::DESOBJ)) $criteria->add(FordefobjPeer::DESOBJ, $this->desobj);
		if ($this->isColumnModified(FordefobjPeer::AREEST)) $criteria->add(FordefobjPeer::AREEST, $this->areest);
		if ($this->isColumnModified(FordefobjPeer::DIREST)) $criteria->add(FordefobjPeer::DIREST, $this->direst);
		if ($this->isColumnModified(FordefobjPeer::OBJEIN)) $criteria->add(FordefobjPeer::OBJEIN, $this->objein);
		if ($this->isColumnModified(FordefobjPeer::OBJEPR)) $criteria->add(FordefobjPeer::OBJEPR, $this->objepr);
		if ($this->isColumnModified(FordefobjPeer::ENUPRO)) $criteria->add(FordefobjPeer::ENUPRO, $this->enupro);
		if ($this->isColumnModified(FordefobjPeer::INDACT)) $criteria->add(FordefobjPeer::INDACT, $this->indact);
		if ($this->isColumnModified(FordefobjPeer::INDOBJ)) $criteria->add(FordefobjPeer::INDOBJ, $this->indobj);
		if ($this->isColumnModified(FordefobjPeer::METPRO)) $criteria->add(FordefobjPeer::METPRO, $this->metpro);
		if ($this->isColumnModified(FordefobjPeer::OBJNET)) $criteria->add(FordefobjPeer::OBJNET, $this->objnet);
		if ($this->isColumnModified(FordefobjPeer::ID)) $criteria->add(FordefobjPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefobjPeer::DATABASE_NAME);

		$criteria->add(FordefobjPeer::ID, $this->id);

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

		$copyObj->setCodobj($this->codobj);

		$copyObj->setDesobj($this->desobj);

		$copyObj->setAreest($this->areest);

		$copyObj->setDirest($this->direst);

		$copyObj->setObjein($this->objein);

		$copyObj->setObjepr($this->objepr);

		$copyObj->setEnupro($this->enupro);

		$copyObj->setIndact($this->indact);

		$copyObj->setIndobj($this->indobj);

		$copyObj->setMetpro($this->metpro);

		$copyObj->setObjnet($this->objnet);


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
			self::$peer = new FordefobjPeer();
		}
		return self::$peer;
	}

} 