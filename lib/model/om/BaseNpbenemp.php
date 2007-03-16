<?php


abstract class BaseNpbenemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $codemp;


	
	protected $cedben;


	
	protected $nomben;


	
	protected $codban;


	
	protected $numcue;


	
	protected $codcar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCedben()
	{

		return $this->cedben;
	}

	
	public function getNomben()
	{

		return $this->nomben;
	}

	
	public function getCodban()
	{

		return $this->codban;
	}

	
	public function getNumcue()
	{

		return $this->numcue;
	}

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpbenempPeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpbenempPeer::CODCON;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpbenempPeer::CODEMP;
		}

	} 
	
	public function setCedben($v)
	{

		if ($this->cedben !== $v) {
			$this->cedben = $v;
			$this->modifiedColumns[] = NpbenempPeer::CEDBEN;
		}

	} 
	
	public function setNomben($v)
	{

		if ($this->nomben !== $v) {
			$this->nomben = $v;
			$this->modifiedColumns[] = NpbenempPeer::NOMBEN;
		}

	} 
	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = NpbenempPeer::CODBAN;
		}

	} 
	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = NpbenempPeer::NUMCUE;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpbenempPeer::CODCAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpbenempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->codemp = $rs->getString($startcol + 2);

			$this->cedben = $rs->getString($startcol + 3);

			$this->nomben = $rs->getString($startcol + 4);

			$this->codban = $rs->getString($startcol + 5);

			$this->numcue = $rs->getString($startcol + 6);

			$this->codcar = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npbenemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpbenempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpbenempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpbenempPeer::DATABASE_NAME);
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
					$pk = NpbenempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpbenempPeer::doUpdate($this, $con);
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


			if (($retval = NpbenempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbenempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getCedben();
				break;
			case 4:
				return $this->getNomben();
				break;
			case 5:
				return $this->getCodban();
				break;
			case 6:
				return $this->getNumcue();
				break;
			case 7:
				return $this->getCodcar();
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
		$keys = NpbenempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getCedben(),
			$keys[4] => $this->getNomben(),
			$keys[5] => $this->getCodban(),
			$keys[6] => $this->getNumcue(),
			$keys[7] => $this->getCodcar(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpbenempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setCedben($value);
				break;
			case 4:
				$this->setNomben($value);
				break;
			case 5:
				$this->setCodban($value);
				break;
			case 6:
				$this->setNumcue($value);
				break;
			case 7:
				$this->setCodcar($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpbenempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedben($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodcar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpbenempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpbenempPeer::CODNOM)) $criteria->add(NpbenempPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpbenempPeer::CODCON)) $criteria->add(NpbenempPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpbenempPeer::CODEMP)) $criteria->add(NpbenempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpbenempPeer::CEDBEN)) $criteria->add(NpbenempPeer::CEDBEN, $this->cedben);
		if ($this->isColumnModified(NpbenempPeer::NOMBEN)) $criteria->add(NpbenempPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(NpbenempPeer::CODBAN)) $criteria->add(NpbenempPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(NpbenempPeer::NUMCUE)) $criteria->add(NpbenempPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(NpbenempPeer::CODCAR)) $criteria->add(NpbenempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpbenempPeer::ID)) $criteria->add(NpbenempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpbenempPeer::DATABASE_NAME);

		$criteria->add(NpbenempPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedben($this->cedben);

		$copyObj->setNomben($this->nomben);

		$copyObj->setCodban($this->codban);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCodcar($this->codcar);


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
			self::$peer = new NpbenempPeer();
		}
		return self::$peer;
	}

} 