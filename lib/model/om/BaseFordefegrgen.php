<?php


abstract class BaseFordefegrgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nivproacc;


	
	protected $desproacc;


	
	protected $hasproacc;


	
	protected $lonproacc;


	
	protected $forproacc;


	
	protected $nivaccesp;


	
	protected $desaccesp;


	
	protected $hasaccesp;


	
	protected $lonaccesp;


	
	protected $foraccesp;


	
	protected $nivsubaccesp;


	
	protected $dessubaccesp;


	
	protected $hassubaccesp;


	
	protected $lonsubaccesp;


	
	protected $forsubaccesp;


	
	protected $nivuae;


	
	protected $desuae;


	
	protected $hasuae;


	
	protected $lonuae;


	
	protected $foruae;


	
	protected $corest;


	
	protected $corsec;


	
	protected $corequ;


	
	protected $despar;


	
	protected $haspar;


	
	protected $lonpar;


	
	protected $forpar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getNivproacc()
	{

		return $this->nivproacc;
	}

	
	public function getDesproacc()
	{

		return $this->desproacc;
	}

	
	public function getHasproacc()
	{

		return $this->hasproacc;
	}

	
	public function getLonproacc()
	{

		return $this->lonproacc;
	}

	
	public function getForproacc()
	{

		return $this->forproacc;
	}

	
	public function getNivaccesp()
	{

		return $this->nivaccesp;
	}

	
	public function getDesaccesp()
	{

		return $this->desaccesp;
	}

	
	public function getHasaccesp()
	{

		return $this->hasaccesp;
	}

	
	public function getLonaccesp()
	{

		return $this->lonaccesp;
	}

	
	public function getForaccesp()
	{

		return $this->foraccesp;
	}

	
	public function getNivsubaccesp()
	{

		return $this->nivsubaccesp;
	}

	
	public function getDessubaccesp()
	{

		return $this->dessubaccesp;
	}

	
	public function getHassubaccesp()
	{

		return $this->hassubaccesp;
	}

	
	public function getLonsubaccesp()
	{

		return $this->lonsubaccesp;
	}

	
	public function getForsubaccesp()
	{

		return $this->forsubaccesp;
	}

	
	public function getNivuae()
	{

		return $this->nivuae;
	}

	
	public function getDesuae()
	{

		return $this->desuae;
	}

	
	public function getHasuae()
	{

		return $this->hasuae;
	}

	
	public function getLonuae()
	{

		return $this->lonuae;
	}

	
	public function getForuae()
	{

		return $this->foruae;
	}

	
	public function getCorest()
	{

		return $this->corest;
	}

	
	public function getCorsec()
	{

		return $this->corsec;
	}

	
	public function getCorequ()
	{

		return $this->corequ;
	}

	
	public function getDespar()
	{

		return $this->despar;
	}

	
	public function getHaspar()
	{

		return $this->haspar;
	}

	
	public function getLonpar()
	{

		return $this->lonpar;
	}

	
	public function getForpar()
	{

		return $this->forpar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::CODEMP;
		}

	} 
	
	public function setNivproacc($v)
	{

		if ($this->nivproacc !== $v) {
			$this->nivproacc = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::NIVPROACC;
		}

	} 
	
	public function setDesproacc($v)
	{

		if ($this->desproacc !== $v) {
			$this->desproacc = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::DESPROACC;
		}

	} 
	
	public function setHasproacc($v)
	{

		if ($this->hasproacc !== $v) {
			$this->hasproacc = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::HASPROACC;
		}

	} 
	
	public function setLonproacc($v)
	{

		if ($this->lonproacc !== $v) {
			$this->lonproacc = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::LONPROACC;
		}

	} 
	
	public function setForproacc($v)
	{

		if ($this->forproacc !== $v) {
			$this->forproacc = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::FORPROACC;
		}

	} 
	
	public function setNivaccesp($v)
	{

		if ($this->nivaccesp !== $v) {
			$this->nivaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::NIVACCESP;
		}

	} 
	
	public function setDesaccesp($v)
	{

		if ($this->desaccesp !== $v) {
			$this->desaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::DESACCESP;
		}

	} 
	
	public function setHasaccesp($v)
	{

		if ($this->hasaccesp !== $v) {
			$this->hasaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::HASACCESP;
		}

	} 
	
	public function setLonaccesp($v)
	{

		if ($this->lonaccesp !== $v) {
			$this->lonaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::LONACCESP;
		}

	} 
	
	public function setForaccesp($v)
	{

		if ($this->foraccesp !== $v) {
			$this->foraccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::FORACCESP;
		}

	} 
	
	public function setNivsubaccesp($v)
	{

		if ($this->nivsubaccesp !== $v) {
			$this->nivsubaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::NIVSUBACCESP;
		}

	} 
	
	public function setDessubaccesp($v)
	{

		if ($this->dessubaccesp !== $v) {
			$this->dessubaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::DESSUBACCESP;
		}

	} 
	
	public function setHassubaccesp($v)
	{

		if ($this->hassubaccesp !== $v) {
			$this->hassubaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::HASSUBACCESP;
		}

	} 
	
	public function setLonsubaccesp($v)
	{

		if ($this->lonsubaccesp !== $v) {
			$this->lonsubaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::LONSUBACCESP;
		}

	} 
	
	public function setForsubaccesp($v)
	{

		if ($this->forsubaccesp !== $v) {
			$this->forsubaccesp = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::FORSUBACCESP;
		}

	} 
	
	public function setNivuae($v)
	{

		if ($this->nivuae !== $v) {
			$this->nivuae = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::NIVUAE;
		}

	} 
	
	public function setDesuae($v)
	{

		if ($this->desuae !== $v) {
			$this->desuae = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::DESUAE;
		}

	} 
	
	public function setHasuae($v)
	{

		if ($this->hasuae !== $v) {
			$this->hasuae = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::HASUAE;
		}

	} 
	
	public function setLonuae($v)
	{

		if ($this->lonuae !== $v) {
			$this->lonuae = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::LONUAE;
		}

	} 
	
	public function setForuae($v)
	{

		if ($this->foruae !== $v) {
			$this->foruae = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::FORUAE;
		}

	} 
	
	public function setCorest($v)
	{

		if ($this->corest !== $v) {
			$this->corest = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::COREST;
		}

	} 
	
	public function setCorsec($v)
	{

		if ($this->corsec !== $v) {
			$this->corsec = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::CORSEC;
		}

	} 
	
	public function setCorequ($v)
	{

		if ($this->corequ !== $v) {
			$this->corequ = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::COREQU;
		}

	} 
	
	public function setDespar($v)
	{

		if ($this->despar !== $v) {
			$this->despar = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::DESPAR;
		}

	} 
	
	public function setHaspar($v)
	{

		if ($this->haspar !== $v) {
			$this->haspar = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::HASPAR;
		}

	} 
	
	public function setLonpar($v)
	{

		if ($this->lonpar !== $v) {
			$this->lonpar = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::LONPAR;
		}

	} 
	
	public function setForpar($v)
	{

		if ($this->forpar !== $v) {
			$this->forpar = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::FORPAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefegrgenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->nivproacc = $rs->getFloat($startcol + 1);

			$this->desproacc = $rs->getFloat($startcol + 2);

			$this->hasproacc = $rs->getFloat($startcol + 3);

			$this->lonproacc = $rs->getFloat($startcol + 4);

			$this->forproacc = $rs->getString($startcol + 5);

			$this->nivaccesp = $rs->getFloat($startcol + 6);

			$this->desaccesp = $rs->getFloat($startcol + 7);

			$this->hasaccesp = $rs->getFloat($startcol + 8);

			$this->lonaccesp = $rs->getFloat($startcol + 9);

			$this->foraccesp = $rs->getString($startcol + 10);

			$this->nivsubaccesp = $rs->getFloat($startcol + 11);

			$this->dessubaccesp = $rs->getFloat($startcol + 12);

			$this->hassubaccesp = $rs->getFloat($startcol + 13);

			$this->lonsubaccesp = $rs->getFloat($startcol + 14);

			$this->forsubaccesp = $rs->getString($startcol + 15);

			$this->nivuae = $rs->getFloat($startcol + 16);

			$this->desuae = $rs->getFloat($startcol + 17);

			$this->hasuae = $rs->getFloat($startcol + 18);

			$this->lonuae = $rs->getFloat($startcol + 19);

			$this->foruae = $rs->getString($startcol + 20);

			$this->corest = $rs->getFloat($startcol + 21);

			$this->corsec = $rs->getFloat($startcol + 22);

			$this->corequ = $rs->getFloat($startcol + 23);

			$this->despar = $rs->getInt($startcol + 24);

			$this->haspar = $rs->getInt($startcol + 25);

			$this->lonpar = $rs->getInt($startcol + 26);

			$this->forpar = $rs->getInt($startcol + 27);

			$this->id = $rs->getInt($startcol + 28);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 29; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefegrgen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefegrgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefegrgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefegrgenPeer::DATABASE_NAME);
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
					$pk = FordefegrgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefegrgenPeer::doUpdate($this, $con);
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


			if (($retval = FordefegrgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefegrgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNivproacc();
				break;
			case 2:
				return $this->getDesproacc();
				break;
			case 3:
				return $this->getHasproacc();
				break;
			case 4:
				return $this->getLonproacc();
				break;
			case 5:
				return $this->getForproacc();
				break;
			case 6:
				return $this->getNivaccesp();
				break;
			case 7:
				return $this->getDesaccesp();
				break;
			case 8:
				return $this->getHasaccesp();
				break;
			case 9:
				return $this->getLonaccesp();
				break;
			case 10:
				return $this->getForaccesp();
				break;
			case 11:
				return $this->getNivsubaccesp();
				break;
			case 12:
				return $this->getDessubaccesp();
				break;
			case 13:
				return $this->getHassubaccesp();
				break;
			case 14:
				return $this->getLonsubaccesp();
				break;
			case 15:
				return $this->getForsubaccesp();
				break;
			case 16:
				return $this->getNivuae();
				break;
			case 17:
				return $this->getDesuae();
				break;
			case 18:
				return $this->getHasuae();
				break;
			case 19:
				return $this->getLonuae();
				break;
			case 20:
				return $this->getForuae();
				break;
			case 21:
				return $this->getCorest();
				break;
			case 22:
				return $this->getCorsec();
				break;
			case 23:
				return $this->getCorequ();
				break;
			case 24:
				return $this->getDespar();
				break;
			case 25:
				return $this->getHaspar();
				break;
			case 26:
				return $this->getLonpar();
				break;
			case 27:
				return $this->getForpar();
				break;
			case 28:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefegrgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNivproacc(),
			$keys[2] => $this->getDesproacc(),
			$keys[3] => $this->getHasproacc(),
			$keys[4] => $this->getLonproacc(),
			$keys[5] => $this->getForproacc(),
			$keys[6] => $this->getNivaccesp(),
			$keys[7] => $this->getDesaccesp(),
			$keys[8] => $this->getHasaccesp(),
			$keys[9] => $this->getLonaccesp(),
			$keys[10] => $this->getForaccesp(),
			$keys[11] => $this->getNivsubaccesp(),
			$keys[12] => $this->getDessubaccesp(),
			$keys[13] => $this->getHassubaccesp(),
			$keys[14] => $this->getLonsubaccesp(),
			$keys[15] => $this->getForsubaccesp(),
			$keys[16] => $this->getNivuae(),
			$keys[17] => $this->getDesuae(),
			$keys[18] => $this->getHasuae(),
			$keys[19] => $this->getLonuae(),
			$keys[20] => $this->getForuae(),
			$keys[21] => $this->getCorest(),
			$keys[22] => $this->getCorsec(),
			$keys[23] => $this->getCorequ(),
			$keys[24] => $this->getDespar(),
			$keys[25] => $this->getHaspar(),
			$keys[26] => $this->getLonpar(),
			$keys[27] => $this->getForpar(),
			$keys[28] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefegrgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNivproacc($value);
				break;
			case 2:
				$this->setDesproacc($value);
				break;
			case 3:
				$this->setHasproacc($value);
				break;
			case 4:
				$this->setLonproacc($value);
				break;
			case 5:
				$this->setForproacc($value);
				break;
			case 6:
				$this->setNivaccesp($value);
				break;
			case 7:
				$this->setDesaccesp($value);
				break;
			case 8:
				$this->setHasaccesp($value);
				break;
			case 9:
				$this->setLonaccesp($value);
				break;
			case 10:
				$this->setForaccesp($value);
				break;
			case 11:
				$this->setNivsubaccesp($value);
				break;
			case 12:
				$this->setDessubaccesp($value);
				break;
			case 13:
				$this->setHassubaccesp($value);
				break;
			case 14:
				$this->setLonsubaccesp($value);
				break;
			case 15:
				$this->setForsubaccesp($value);
				break;
			case 16:
				$this->setNivuae($value);
				break;
			case 17:
				$this->setDesuae($value);
				break;
			case 18:
				$this->setHasuae($value);
				break;
			case 19:
				$this->setLonuae($value);
				break;
			case 20:
				$this->setForuae($value);
				break;
			case 21:
				$this->setCorest($value);
				break;
			case 22:
				$this->setCorsec($value);
				break;
			case 23:
				$this->setCorequ($value);
				break;
			case 24:
				$this->setDespar($value);
				break;
			case 25:
				$this->setHaspar($value);
				break;
			case 26:
				$this->setLonpar($value);
				break;
			case 27:
				$this->setForpar($value);
				break;
			case 28:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefegrgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNivproacc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesproacc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHasproacc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLonproacc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setForproacc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNivaccesp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesaccesp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHasaccesp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setLonaccesp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setForaccesp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNivsubaccesp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDessubaccesp($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setHassubaccesp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLonsubaccesp($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setForsubaccesp($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNivuae($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDesuae($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setHasuae($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setLonuae($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setForuae($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCorest($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCorsec($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCorequ($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDespar($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setHaspar($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLonpar($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setForpar($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setId($arr[$keys[28]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefegrgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefegrgenPeer::CODEMP)) $criteria->add(FordefegrgenPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FordefegrgenPeer::NIVPROACC)) $criteria->add(FordefegrgenPeer::NIVPROACC, $this->nivproacc);
		if ($this->isColumnModified(FordefegrgenPeer::DESPROACC)) $criteria->add(FordefegrgenPeer::DESPROACC, $this->desproacc);
		if ($this->isColumnModified(FordefegrgenPeer::HASPROACC)) $criteria->add(FordefegrgenPeer::HASPROACC, $this->hasproacc);
		if ($this->isColumnModified(FordefegrgenPeer::LONPROACC)) $criteria->add(FordefegrgenPeer::LONPROACC, $this->lonproacc);
		if ($this->isColumnModified(FordefegrgenPeer::FORPROACC)) $criteria->add(FordefegrgenPeer::FORPROACC, $this->forproacc);
		if ($this->isColumnModified(FordefegrgenPeer::NIVACCESP)) $criteria->add(FordefegrgenPeer::NIVACCESP, $this->nivaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::DESACCESP)) $criteria->add(FordefegrgenPeer::DESACCESP, $this->desaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::HASACCESP)) $criteria->add(FordefegrgenPeer::HASACCESP, $this->hasaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::LONACCESP)) $criteria->add(FordefegrgenPeer::LONACCESP, $this->lonaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::FORACCESP)) $criteria->add(FordefegrgenPeer::FORACCESP, $this->foraccesp);
		if ($this->isColumnModified(FordefegrgenPeer::NIVSUBACCESP)) $criteria->add(FordefegrgenPeer::NIVSUBACCESP, $this->nivsubaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::DESSUBACCESP)) $criteria->add(FordefegrgenPeer::DESSUBACCESP, $this->dessubaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::HASSUBACCESP)) $criteria->add(FordefegrgenPeer::HASSUBACCESP, $this->hassubaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::LONSUBACCESP)) $criteria->add(FordefegrgenPeer::LONSUBACCESP, $this->lonsubaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::FORSUBACCESP)) $criteria->add(FordefegrgenPeer::FORSUBACCESP, $this->forsubaccesp);
		if ($this->isColumnModified(FordefegrgenPeer::NIVUAE)) $criteria->add(FordefegrgenPeer::NIVUAE, $this->nivuae);
		if ($this->isColumnModified(FordefegrgenPeer::DESUAE)) $criteria->add(FordefegrgenPeer::DESUAE, $this->desuae);
		if ($this->isColumnModified(FordefegrgenPeer::HASUAE)) $criteria->add(FordefegrgenPeer::HASUAE, $this->hasuae);
		if ($this->isColumnModified(FordefegrgenPeer::LONUAE)) $criteria->add(FordefegrgenPeer::LONUAE, $this->lonuae);
		if ($this->isColumnModified(FordefegrgenPeer::FORUAE)) $criteria->add(FordefegrgenPeer::FORUAE, $this->foruae);
		if ($this->isColumnModified(FordefegrgenPeer::COREST)) $criteria->add(FordefegrgenPeer::COREST, $this->corest);
		if ($this->isColumnModified(FordefegrgenPeer::CORSEC)) $criteria->add(FordefegrgenPeer::CORSEC, $this->corsec);
		if ($this->isColumnModified(FordefegrgenPeer::COREQU)) $criteria->add(FordefegrgenPeer::COREQU, $this->corequ);
		if ($this->isColumnModified(FordefegrgenPeer::DESPAR)) $criteria->add(FordefegrgenPeer::DESPAR, $this->despar);
		if ($this->isColumnModified(FordefegrgenPeer::HASPAR)) $criteria->add(FordefegrgenPeer::HASPAR, $this->haspar);
		if ($this->isColumnModified(FordefegrgenPeer::LONPAR)) $criteria->add(FordefegrgenPeer::LONPAR, $this->lonpar);
		if ($this->isColumnModified(FordefegrgenPeer::FORPAR)) $criteria->add(FordefegrgenPeer::FORPAR, $this->forpar);
		if ($this->isColumnModified(FordefegrgenPeer::ID)) $criteria->add(FordefegrgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefegrgenPeer::DATABASE_NAME);

		$criteria->add(FordefegrgenPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNivproacc($this->nivproacc);

		$copyObj->setDesproacc($this->desproacc);

		$copyObj->setHasproacc($this->hasproacc);

		$copyObj->setLonproacc($this->lonproacc);

		$copyObj->setForproacc($this->forproacc);

		$copyObj->setNivaccesp($this->nivaccesp);

		$copyObj->setDesaccesp($this->desaccesp);

		$copyObj->setHasaccesp($this->hasaccesp);

		$copyObj->setLonaccesp($this->lonaccesp);

		$copyObj->setForaccesp($this->foraccesp);

		$copyObj->setNivsubaccesp($this->nivsubaccesp);

		$copyObj->setDessubaccesp($this->dessubaccesp);

		$copyObj->setHassubaccesp($this->hassubaccesp);

		$copyObj->setLonsubaccesp($this->lonsubaccesp);

		$copyObj->setForsubaccesp($this->forsubaccesp);

		$copyObj->setNivuae($this->nivuae);

		$copyObj->setDesuae($this->desuae);

		$copyObj->setHasuae($this->hasuae);

		$copyObj->setLonuae($this->lonuae);

		$copyObj->setForuae($this->foruae);

		$copyObj->setCorest($this->corest);

		$copyObj->setCorsec($this->corsec);

		$copyObj->setCorequ($this->corequ);

		$copyObj->setDespar($this->despar);

		$copyObj->setHaspar($this->haspar);

		$copyObj->setLonpar($this->lonpar);

		$copyObj->setForpar($this->forpar);


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
			self::$peer = new FordefegrgenPeer();
		}
		return self::$peer;
	}

} 