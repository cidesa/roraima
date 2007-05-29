<?php


abstract class BaseCsrecobrind extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprod;


	
	protected $codfas;


	
	protected $codmanobr;


	
	protected $canemp;


	
	protected $horemp;


	
	protected $tipcon;


	
	protected $costot;


	
	protected $jornada;


	
	protected $nroord;


	
	protected $cosobr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodprod()
	{

		return $this->codprod; 		
	}
	
	public function getCodfas()
	{

		return $this->codfas; 		
	}
	
	public function getCodmanobr()
	{

		return $this->codmanobr; 		
	}
	
	public function getCanemp()
	{

		return number_format($this->canemp,2,',','.');
		
	}
	
	public function getHoremp()
	{

		return number_format($this->horemp,2,',','.');
		
	}
	
	public function getTipcon()
	{

		return $this->tipcon; 		
	}
	
	public function getCostot()
	{

		return number_format($this->costot,2,',','.');
		
	}
	
	public function getJornada()
	{

		return $this->jornada; 		
	}
	
	public function getNroord()
	{

		return $this->nroord; 		
	}
	
	public function getCosobr()
	{

		return number_format($this->cosobr,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodprod($v)
	{

		if ($this->codprod !== $v) {
			$this->codprod = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::CODPROD;
		}

	} 
	
	public function setCodfas($v)
	{

		if ($this->codfas !== $v) {
			$this->codfas = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::CODFAS;
		}

	} 
	
	public function setCodmanobr($v)
	{

		if ($this->codmanobr !== $v) {
			$this->codmanobr = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::CODMANOBR;
		}

	} 
	
	public function setCanemp($v)
	{

		if ($this->canemp !== $v) {
			$this->canemp = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::CANEMP;
		}

	} 
	
	public function setHoremp($v)
	{

		if ($this->horemp !== $v) {
			$this->horemp = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::HOREMP;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::TIPCON;
		}

	} 
	
	public function setCostot($v)
	{

		if ($this->costot !== $v) {
			$this->costot = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::COSTOT;
		}

	} 
	
	public function setJornada($v)
	{

		if ($this->jornada !== $v) {
			$this->jornada = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::JORNADA;
		}

	} 
	
	public function setNroord($v)
	{

		if ($this->nroord !== $v) {
			$this->nroord = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::NROORD;
		}

	} 
	
	public function setCosobr($v)
	{

		if ($this->cosobr !== $v) {
			$this->cosobr = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::COSOBR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsrecobrindPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprod = $rs->getString($startcol + 0);

			$this->codfas = $rs->getString($startcol + 1);

			$this->codmanobr = $rs->getString($startcol + 2);

			$this->canemp = $rs->getFloat($startcol + 3);

			$this->horemp = $rs->getFloat($startcol + 4);

			$this->tipcon = $rs->getString($startcol + 5);

			$this->costot = $rs->getFloat($startcol + 6);

			$this->jornada = $rs->getString($startcol + 7);

			$this->nroord = $rs->getString($startcol + 8);

			$this->cosobr = $rs->getFloat($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csrecobrind object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsrecobrindPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsrecobrindPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsrecobrindPeer::DATABASE_NAME);
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
					$pk = CsrecobrindPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsrecobrindPeer::doUpdate($this, $con);
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


			if (($retval = CsrecobrindPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecobrindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprod();
				break;
			case 1:
				return $this->getCodfas();
				break;
			case 2:
				return $this->getCodmanobr();
				break;
			case 3:
				return $this->getCanemp();
				break;
			case 4:
				return $this->getHoremp();
				break;
			case 5:
				return $this->getTipcon();
				break;
			case 6:
				return $this->getCostot();
				break;
			case 7:
				return $this->getJornada();
				break;
			case 8:
				return $this->getNroord();
				break;
			case 9:
				return $this->getCosobr();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsrecobrindPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprod(),
			$keys[1] => $this->getCodfas(),
			$keys[2] => $this->getCodmanobr(),
			$keys[3] => $this->getCanemp(),
			$keys[4] => $this->getHoremp(),
			$keys[5] => $this->getTipcon(),
			$keys[6] => $this->getCostot(),
			$keys[7] => $this->getJornada(),
			$keys[8] => $this->getNroord(),
			$keys[9] => $this->getCosobr(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecobrindPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprod($value);
				break;
			case 1:
				$this->setCodfas($value);
				break;
			case 2:
				$this->setCodmanobr($value);
				break;
			case 3:
				$this->setCanemp($value);
				break;
			case 4:
				$this->setHoremp($value);
				break;
			case 5:
				$this->setTipcon($value);
				break;
			case 6:
				$this->setCostot($value);
				break;
			case 7:
				$this->setJornada($value);
				break;
			case 8:
				$this->setNroord($value);
				break;
			case 9:
				$this->setCosobr($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsrecobrindPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmanobr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHoremp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCostot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setJornada($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNroord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCosobr($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsrecobrindPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsrecobrindPeer::CODPROD)) $criteria->add(CsrecobrindPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(CsrecobrindPeer::CODFAS)) $criteria->add(CsrecobrindPeer::CODFAS, $this->codfas);
		if ($this->isColumnModified(CsrecobrindPeer::CODMANOBR)) $criteria->add(CsrecobrindPeer::CODMANOBR, $this->codmanobr);
		if ($this->isColumnModified(CsrecobrindPeer::CANEMP)) $criteria->add(CsrecobrindPeer::CANEMP, $this->canemp);
		if ($this->isColumnModified(CsrecobrindPeer::HOREMP)) $criteria->add(CsrecobrindPeer::HOREMP, $this->horemp);
		if ($this->isColumnModified(CsrecobrindPeer::TIPCON)) $criteria->add(CsrecobrindPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(CsrecobrindPeer::COSTOT)) $criteria->add(CsrecobrindPeer::COSTOT, $this->costot);
		if ($this->isColumnModified(CsrecobrindPeer::JORNADA)) $criteria->add(CsrecobrindPeer::JORNADA, $this->jornada);
		if ($this->isColumnModified(CsrecobrindPeer::NROORD)) $criteria->add(CsrecobrindPeer::NROORD, $this->nroord);
		if ($this->isColumnModified(CsrecobrindPeer::COSOBR)) $criteria->add(CsrecobrindPeer::COSOBR, $this->cosobr);
		if ($this->isColumnModified(CsrecobrindPeer::ID)) $criteria->add(CsrecobrindPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsrecobrindPeer::DATABASE_NAME);

		$criteria->add(CsrecobrindPeer::ID, $this->id);

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

		$copyObj->setCodprod($this->codprod);

		$copyObj->setCodfas($this->codfas);

		$copyObj->setCodmanobr($this->codmanobr);

		$copyObj->setCanemp($this->canemp);

		$copyObj->setHoremp($this->horemp);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setCostot($this->costot);

		$copyObj->setJornada($this->jornada);

		$copyObj->setNroord($this->nroord);

		$copyObj->setCosobr($this->cosobr);


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
			self::$peer = new CsrecobrindPeer();
		}
		return self::$peer;
	}

} 