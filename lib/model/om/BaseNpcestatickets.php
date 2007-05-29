<?php


abstract class BaseNpcestatickets extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $monpor;


	
	protected $valtic;


	
	protected $numtic;


	
	protected $tippag;


	
	protected $numdia;


	
	protected $diahab;


	
	protected $sabado;


	
	protected $doming;


	
	protected $diafer;


	
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
	
	public function getMonpor()
	{

		return $this->monpor; 		
	}
	
	public function getValtic()
	{

		return number_format($this->valtic,2,',','.');
		
	}
	
	public function getNumtic()
	{

		return number_format($this->numtic,2,',','.');
		
	}
	
	public function getTippag()
	{

		return $this->tippag; 		
	}
	
	public function getNumdia()
	{

		return number_format($this->numdia,2,',','.');
		
	}
	
	public function getDiahab()
	{

		return $this->diahab; 		
	}
	
	public function getSabado()
	{

		return $this->sabado; 		
	}
	
	public function getDoming()
	{

		return $this->doming; 		
	}
	
	public function getDiafer()
	{

		return $this->diafer; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::CODCON;
		}

	} 
	
	public function setMonpor($v)
	{

		if ($this->monpor !== $v) {
			$this->monpor = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::MONPOR;
		}

	} 
	
	public function setValtic($v)
	{

		if ($this->valtic !== $v) {
			$this->valtic = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::VALTIC;
		}

	} 
	
	public function setNumtic($v)
	{

		if ($this->numtic !== $v) {
			$this->numtic = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::NUMTIC;
		}

	} 
	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::TIPPAG;
		}

	} 
	
	public function setNumdia($v)
	{

		if ($this->numdia !== $v) {
			$this->numdia = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::NUMDIA;
		}

	} 
	
	public function setDiahab($v)
	{

		if ($this->diahab !== $v) {
			$this->diahab = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::DIAHAB;
		}

	} 
	
	public function setSabado($v)
	{

		if ($this->sabado !== $v) {
			$this->sabado = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::SABADO;
		}

	} 
	
	public function setDoming($v)
	{

		if ($this->doming !== $v) {
			$this->doming = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::DOMING;
		}

	} 
	
	public function setDiafer($v)
	{

		if ($this->diafer !== $v) {
			$this->diafer = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::DIAFER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcestaticketsPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->monpor = $rs->getString($startcol + 2);

			$this->valtic = $rs->getFloat($startcol + 3);

			$this->numtic = $rs->getFloat($startcol + 4);

			$this->tippag = $rs->getString($startcol + 5);

			$this->numdia = $rs->getFloat($startcol + 6);

			$this->diahab = $rs->getString($startcol + 7);

			$this->sabado = $rs->getString($startcol + 8);

			$this->doming = $rs->getString($startcol + 9);

			$this->diafer = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcestatickets object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcestaticketsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcestaticketsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcestaticketsPeer::DATABASE_NAME);
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
					$pk = NpcestaticketsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcestaticketsPeer::doUpdate($this, $con);
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


			if (($retval = NpcestaticketsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcestaticketsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMonpor();
				break;
			case 3:
				return $this->getValtic();
				break;
			case 4:
				return $this->getNumtic();
				break;
			case 5:
				return $this->getTippag();
				break;
			case 6:
				return $this->getNumdia();
				break;
			case 7:
				return $this->getDiahab();
				break;
			case 8:
				return $this->getSabado();
				break;
			case 9:
				return $this->getDoming();
				break;
			case 10:
				return $this->getDiafer();
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
		$keys = NpcestaticketsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getMonpor(),
			$keys[3] => $this->getValtic(),
			$keys[4] => $this->getNumtic(),
			$keys[5] => $this->getTippag(),
			$keys[6] => $this->getNumdia(),
			$keys[7] => $this->getDiahab(),
			$keys[8] => $this->getSabado(),
			$keys[9] => $this->getDoming(),
			$keys[10] => $this->getDiafer(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcestaticketsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setMonpor($value);
				break;
			case 3:
				$this->setValtic($value);
				break;
			case 4:
				$this->setNumtic($value);
				break;
			case 5:
				$this->setTippag($value);
				break;
			case 6:
				$this->setNumdia($value);
				break;
			case 7:
				$this->setDiahab($value);
				break;
			case 8:
				$this->setSabado($value);
				break;
			case 9:
				$this->setDoming($value);
				break;
			case 10:
				$this->setDiafer($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcestaticketsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValtic($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumtic($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTippag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumdia($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiahab($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSabado($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDoming($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDiafer($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcestaticketsPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcestaticketsPeer::CODNOM)) $criteria->add(NpcestaticketsPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpcestaticketsPeer::CODCON)) $criteria->add(NpcestaticketsPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpcestaticketsPeer::MONPOR)) $criteria->add(NpcestaticketsPeer::MONPOR, $this->monpor);
		if ($this->isColumnModified(NpcestaticketsPeer::VALTIC)) $criteria->add(NpcestaticketsPeer::VALTIC, $this->valtic);
		if ($this->isColumnModified(NpcestaticketsPeer::NUMTIC)) $criteria->add(NpcestaticketsPeer::NUMTIC, $this->numtic);
		if ($this->isColumnModified(NpcestaticketsPeer::TIPPAG)) $criteria->add(NpcestaticketsPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(NpcestaticketsPeer::NUMDIA)) $criteria->add(NpcestaticketsPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(NpcestaticketsPeer::DIAHAB)) $criteria->add(NpcestaticketsPeer::DIAHAB, $this->diahab);
		if ($this->isColumnModified(NpcestaticketsPeer::SABADO)) $criteria->add(NpcestaticketsPeer::SABADO, $this->sabado);
		if ($this->isColumnModified(NpcestaticketsPeer::DOMING)) $criteria->add(NpcestaticketsPeer::DOMING, $this->doming);
		if ($this->isColumnModified(NpcestaticketsPeer::DIAFER)) $criteria->add(NpcestaticketsPeer::DIAFER, $this->diafer);
		if ($this->isColumnModified(NpcestaticketsPeer::ID)) $criteria->add(NpcestaticketsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcestaticketsPeer::DATABASE_NAME);

		$criteria->add(NpcestaticketsPeer::ID, $this->id);

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

		$copyObj->setMonpor($this->monpor);

		$copyObj->setValtic($this->valtic);

		$copyObj->setNumtic($this->numtic);

		$copyObj->setTippag($this->tippag);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setDiahab($this->diahab);

		$copyObj->setSabado($this->sabado);

		$copyObj->setDoming($this->doming);

		$copyObj->setDiafer($this->diafer);


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
			self::$peer = new NpcestaticketsPeer();
		}
		return self::$peer;
	}

} 