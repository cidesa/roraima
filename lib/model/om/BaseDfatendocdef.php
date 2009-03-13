<?php


abstract class BaseDfatendocdef extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_dfatendoc;


	
	protected $id_usuarios;


	
	protected $fecrec;


	
	protected $horrec;


	
	protected $fecate;


	
	protected $horate;


	
	protected $id_numuni;


	
	protected $id_numuniori;


	
	protected $id;


	
	protected $id_dfrutadoc;

	
	protected $aDfatendoc;

	
	protected $aAcunidadRelatedByIdNumuni;

	
	protected $aAcunidadRelatedByIdNumuniori;

	
	protected $aDfrutadoc;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdDfatendoc()
	{

		return $this->id_dfatendoc;
	}

	
	public function getIdUsuarios()
	{

		return $this->id_usuarios;
	}

	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorrec($format = 'Y-m-d')
	{

		if ($this->horrec === null || $this->horrec === '') {
			return null;
		} elseif (!is_int($this->horrec)) {
						$ts = strtotime($this->horrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horrec] as date/time value: " . var_export($this->horrec, true));
			}
		} else {
			$ts = $this->horrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecate($format = 'Y-m-d')
	{

		if ($this->fecate === null || $this->fecate === '') {
			return null;
		} elseif (!is_int($this->fecate)) {
						$ts = strtotime($this->fecate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecate] as date/time value: " . var_export($this->fecate, true));
			}
		} else {
			$ts = $this->fecate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorate($format = 'Y-m-d')
	{

		if ($this->horate === null || $this->horate === '') {
			return null;
		} elseif (!is_int($this->horate)) {
						$ts = strtotime($this->horate);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [horate] as date/time value: " . var_export($this->horate, true));
			}
		} else {
			$ts = $this->horate;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIdNumuni()
	{

		return $this->id_numuni;
	}

	
	public function getIdNumuniori()
	{

		return $this->id_numuniori;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdDfrutadoc()
	{

		return $this->id_dfrutadoc;
	}

	
	public function setIdDfatendoc($v)
	{

		if ($this->id_dfatendoc !== $v) {
			$this->id_dfatendoc = $v;
			$this->modifiedColumns[] = DfatendocdefPeer::ID_DFATENDOC;
		}

		if ($this->aDfatendoc !== null && $this->aDfatendoc->getId() !== $v) {
			$this->aDfatendoc = null;
		}

	} 
	
	public function setIdUsuarios($v)
	{

		if ($this->id_usuarios !== $v) {
			$this->id_usuarios = $v;
			$this->modifiedColumns[] = DfatendocdefPeer::ID_USUARIOS;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = DfatendocdefPeer::FECREC;
		}

	} 
	
	public function setHorrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horrec !== $ts) {
			$this->horrec = $ts;
			$this->modifiedColumns[] = DfatendocdefPeer::HORREC;
		}

	} 
	
	public function setFecate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecate !== $ts) {
			$this->fecate = $ts;
			$this->modifiedColumns[] = DfatendocdefPeer::FECATE;
		}

	} 
	
	public function setHorate($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [horate] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->horate !== $ts) {
			$this->horate = $ts;
			$this->modifiedColumns[] = DfatendocdefPeer::HORATE;
		}

	} 
	
	public function setIdNumuni($v)
	{

		if ($this->id_numuni !== $v) {
			$this->id_numuni = $v;
			$this->modifiedColumns[] = DfatendocdefPeer::ID_NUMUNI;
		}

		if ($this->aAcunidadRelatedByIdNumuni !== null && $this->aAcunidadRelatedByIdNumuni->getId() !== $v) {
			$this->aAcunidadRelatedByIdNumuni = null;
		}

	} 
	
	public function setIdNumuniori($v)
	{

		if ($this->id_numuniori !== $v) {
			$this->id_numuniori = $v;
			$this->modifiedColumns[] = DfatendocdefPeer::ID_NUMUNIORI;
		}

		if ($this->aAcunidadRelatedByIdNumuniori !== null && $this->aAcunidadRelatedByIdNumuniori->getId() !== $v) {
			$this->aAcunidadRelatedByIdNumuniori = null;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DfatendocdefPeer::ID;
		}

	} 
	
	public function setIdDfrutadoc($v)
	{

		if ($this->id_dfrutadoc !== $v) {
			$this->id_dfrutadoc = $v;
			$this->modifiedColumns[] = DfatendocdefPeer::ID_DFRUTADOC;
		}

		if ($this->aDfrutadoc !== null && $this->aDfrutadoc->getId() !== $v) {
			$this->aDfrutadoc = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_dfatendoc = $rs->getInt($startcol + 0);

			$this->id_usuarios = $rs->getInt($startcol + 1);

			$this->fecrec = $rs->getDate($startcol + 2, null);

			$this->horrec = $rs->getDate($startcol + 3, null);

			$this->fecate = $rs->getDate($startcol + 4, null);

			$this->horate = $rs->getDate($startcol + 5, null);

			$this->id_numuni = $rs->getInt($startcol + 6);

			$this->id_numuniori = $rs->getInt($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->id_dfrutadoc = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Dfatendocdef object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DfatendocdefPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfatendocdefPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfatendocdefPeer::DATABASE_NAME);
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


												
			if ($this->aDfatendoc !== null) {
				if ($this->aDfatendoc->isModified()) {
					$affectedRows += $this->aDfatendoc->save($con);
				}
				$this->setDfatendoc($this->aDfatendoc);
			}

			if ($this->aAcunidadRelatedByIdNumuni !== null) {
				if ($this->aAcunidadRelatedByIdNumuni->isModified()) {
					$affectedRows += $this->aAcunidadRelatedByIdNumuni->save($con);
				}
				$this->setAcunidadRelatedByIdNumuni($this->aAcunidadRelatedByIdNumuni);
			}

			if ($this->aAcunidadRelatedByIdNumuniori !== null) {
				if ($this->aAcunidadRelatedByIdNumuniori->isModified()) {
					$affectedRows += $this->aAcunidadRelatedByIdNumuniori->save($con);
				}
				$this->setAcunidadRelatedByIdNumuniori($this->aAcunidadRelatedByIdNumuniori);
			}

			if ($this->aDfrutadoc !== null) {
				if ($this->aDfrutadoc->isModified()) {
					$affectedRows += $this->aDfrutadoc->save($con);
				}
				$this->setDfrutadoc($this->aDfrutadoc);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfatendocdefPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DfatendocdefPeer::doUpdate($this, $con);
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


												
			if ($this->aDfatendoc !== null) {
				if (!$this->aDfatendoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDfatendoc->getValidationFailures());
				}
			}

			if ($this->aAcunidadRelatedByIdNumuni !== null) {
				if (!$this->aAcunidadRelatedByIdNumuni->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAcunidadRelatedByIdNumuni->getValidationFailures());
				}
			}

			if ($this->aAcunidadRelatedByIdNumuniori !== null) {
				if (!$this->aAcunidadRelatedByIdNumuniori->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAcunidadRelatedByIdNumuniori->getValidationFailures());
				}
			}

			if ($this->aDfrutadoc !== null) {
				if (!$this->aDfrutadoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDfrutadoc->getValidationFailures());
				}
			}


			if (($retval = DfatendocdefPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocdefPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdDfatendoc();
				break;
			case 1:
				return $this->getIdUsuarios();
				break;
			case 2:
				return $this->getFecrec();
				break;
			case 3:
				return $this->getHorrec();
				break;
			case 4:
				return $this->getFecate();
				break;
			case 5:
				return $this->getHorate();
				break;
			case 6:
				return $this->getIdNumuni();
				break;
			case 7:
				return $this->getIdNumuniori();
				break;
			case 8:
				return $this->getId();
				break;
			case 9:
				return $this->getIdDfrutadoc();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocdefPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdDfatendoc(),
			$keys[1] => $this->getIdUsuarios(),
			$keys[2] => $this->getFecrec(),
			$keys[3] => $this->getHorrec(),
			$keys[4] => $this->getFecate(),
			$keys[5] => $this->getHorate(),
			$keys[6] => $this->getIdNumuni(),
			$keys[7] => $this->getIdNumuniori(),
			$keys[8] => $this->getId(),
			$keys[9] => $this->getIdDfrutadoc(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocdefPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdDfatendoc($value);
				break;
			case 1:
				$this->setIdUsuarios($value);
				break;
			case 2:
				$this->setFecrec($value);
				break;
			case 3:
				$this->setHorrec($value);
				break;
			case 4:
				$this->setFecate($value);
				break;
			case 5:
				$this->setHorate($value);
				break;
			case 6:
				$this->setIdNumuni($value);
				break;
			case 7:
				$this->setIdNumuniori($value);
				break;
			case 8:
				$this->setId($value);
				break;
			case 9:
				$this->setIdDfrutadoc($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocdefPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdDfatendoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdUsuarios($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHorrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHorate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIdNumuni($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIdNumuniori($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIdDfrutadoc($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfatendocdefPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfatendocdefPeer::ID_DFATENDOC)) $criteria->add(DfatendocdefPeer::ID_DFATENDOC, $this->id_dfatendoc);
		if ($this->isColumnModified(DfatendocdefPeer::ID_USUARIOS)) $criteria->add(DfatendocdefPeer::ID_USUARIOS, $this->id_usuarios);
		if ($this->isColumnModified(DfatendocdefPeer::FECREC)) $criteria->add(DfatendocdefPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(DfatendocdefPeer::HORREC)) $criteria->add(DfatendocdefPeer::HORREC, $this->horrec);
		if ($this->isColumnModified(DfatendocdefPeer::FECATE)) $criteria->add(DfatendocdefPeer::FECATE, $this->fecate);
		if ($this->isColumnModified(DfatendocdefPeer::HORATE)) $criteria->add(DfatendocdefPeer::HORATE, $this->horate);
		if ($this->isColumnModified(DfatendocdefPeer::ID_NUMUNI)) $criteria->add(DfatendocdefPeer::ID_NUMUNI, $this->id_numuni);
		if ($this->isColumnModified(DfatendocdefPeer::ID_NUMUNIORI)) $criteria->add(DfatendocdefPeer::ID_NUMUNIORI, $this->id_numuniori);
		if ($this->isColumnModified(DfatendocdefPeer::ID)) $criteria->add(DfatendocdefPeer::ID, $this->id);
		if ($this->isColumnModified(DfatendocdefPeer::ID_DFRUTADOC)) $criteria->add(DfatendocdefPeer::ID_DFRUTADOC, $this->id_dfrutadoc);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfatendocdefPeer::DATABASE_NAME);

		$criteria->add(DfatendocdefPeer::ID, $this->id);

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

		$copyObj->setIdDfatendoc($this->id_dfatendoc);

		$copyObj->setIdUsuarios($this->id_usuarios);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setHorrec($this->horrec);

		$copyObj->setFecate($this->fecate);

		$copyObj->setHorate($this->horate);

		$copyObj->setIdNumuni($this->id_numuni);

		$copyObj->setIdNumuniori($this->id_numuniori);

		$copyObj->setIdDfrutadoc($this->id_dfrutadoc);


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
			self::$peer = new DfatendocdefPeer();
		}
		return self::$peer;
	}

	
	public function setDfatendoc($v)
	{


		if ($v === null) {
			$this->setIdDfatendoc(NULL);
		} else {
			$this->setIdDfatendoc($v->getId());
		}


		$this->aDfatendoc = $v;
	}


	
	public function getDfatendoc($con = null)
	{
				include_once 'lib/model/om/BaseDfatendocPeer.php';

		if ($this->aDfatendoc === null && ($this->id_dfatendoc !== null)) {

			$this->aDfatendoc = DfatendocPeer::retrieveByPK($this->id_dfatendoc, $con);

			
		}
		return $this->aDfatendoc;
	}

	
	public function setAcunidadRelatedByIdNumuni($v)
	{


		if ($v === null) {
			$this->setIdNumuni(NULL);
		} else {
			$this->setIdNumuni($v->getId());
		}


		$this->aAcunidadRelatedByIdNumuni = $v;
	}


	
	public function getAcunidadRelatedByIdNumuni($con = null)
	{
				include_once 'lib/model/om/BaseAcunidadPeer.php';

		if ($this->aAcunidadRelatedByIdNumuni === null && ($this->id_numuni !== null)) {

			$this->aAcunidadRelatedByIdNumuni = AcunidadPeer::retrieveByPK($this->id_numuni, $con);

			
		}
		return $this->aAcunidadRelatedByIdNumuni;
	}

	
	public function setAcunidadRelatedByIdNumuniori($v)
	{


		if ($v === null) {
			$this->setIdNumuniori(NULL);
		} else {
			$this->setIdNumuniori($v->getId());
		}


		$this->aAcunidadRelatedByIdNumuniori = $v;
	}


	
	public function getAcunidadRelatedByIdNumuniori($con = null)
	{
				include_once 'lib/model/om/BaseAcunidadPeer.php';

		if ($this->aAcunidadRelatedByIdNumuniori === null && ($this->id_numuniori !== null)) {

			$this->aAcunidadRelatedByIdNumuniori = AcunidadPeer::retrieveByPK($this->id_numuniori, $con);

			
		}
		return $this->aAcunidadRelatedByIdNumuniori;
	}

	
	public function setDfrutadoc($v)
	{


		if ($v === null) {
			$this->setIdDfrutadoc(NULL);
		} else {
			$this->setIdDfrutadoc($v->getId());
		}


		$this->aDfrutadoc = $v;
	}


	
	public function getDfrutadoc($con = null)
	{
				include_once 'lib/model/om/BaseDfrutadocPeer.php';

		if ($this->aDfrutadoc === null && ($this->id_dfrutadoc !== null)) {

			$this->aDfrutadoc = DfrutadocPeer::retrieveByPK($this->id_dfrutadoc, $con);

			
		}
		return $this->aDfrutadoc;
	}

} 