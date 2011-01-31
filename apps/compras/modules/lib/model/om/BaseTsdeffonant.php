<?php


abstract class BaseTsdeffonant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codfon;


	
	protected $desfon;


	
	protected $unieje;


	
	protected $coduniadm;


	
	protected $cedrif;


	
	protected $codcat;


	
	protected $numcue;


	
	protected $tipmovsal;


	
	protected $tipmovren;


	
	protected $monmincon;


	
	protected $monmaxcon;


	
	protected $porrep;


	
	protected $numini;


	
	protected $id;

	
	protected $aBnubica;

	
	protected $aTsuniadm;

	
	protected $aOpbenefi;

	
	protected $aNpcatpre;

	
	protected $aTsdefban;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodfon()
  {

    return trim($this->codfon);

  }
  
  public function getDesfon()
  {

    return trim($this->desfon);

  }
  
  public function getUnieje()
  {

    return trim($this->unieje);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getTipmovsal()
  {

    return trim($this->tipmovsal);

  }
  
  public function getTipmovren()
  {

    return trim($this->tipmovren);

  }
  
  public function getMonmincon($val=false)
  {

    if($val) return number_format($this->monmincon,2,',','.');
    else return $this->monmincon;

  }
  
  public function getMonmaxcon($val=false)
  {

    if($val) return number_format($this->monmaxcon,2,',','.');
    else return $this->monmaxcon;

  }
  
  public function getPorrep($val=false)
  {

    if($val) return number_format($this->porrep,2,',','.');
    else return $this->porrep;

  }
  
  public function getNumini()
  {

    return trim($this->numini);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodfon($v)
	{

    if ($this->codfon !== $v) {
        $this->codfon = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::CODFON;
      }
  
	} 
	
	public function setDesfon($v)
	{

    if ($this->desfon !== $v) {
        $this->desfon = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::DESFON;
      }
  
	} 
	
	public function setUnieje($v)
	{

    if ($this->unieje !== $v) {
        $this->unieje = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::UNIEJE;
      }
  
		if ($this->aBnubica !== null && $this->aBnubica->getCodubi() !== $v) {
			$this->aBnubica = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::CODUNIADM;
      }
  
		if ($this->aTsuniadm !== null && $this->aTsuniadm->getCoduniadm() !== $v) {
			$this->aTsuniadm = null;
		}

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::CODCAT;
      }
  
		if ($this->aNpcatpre !== null && $this->aNpcatpre->getCodcat() !== $v) {
			$this->aNpcatpre = null;
		}

	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::NUMCUE;
      }
  
		if ($this->aTsdefban !== null && $this->aTsdefban->getNumcue() !== $v) {
			$this->aTsdefban = null;
		}

	} 
	
	public function setTipmovsal($v)
	{

    if ($this->tipmovsal !== $v) {
        $this->tipmovsal = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::TIPMOVSAL;
      }
  
	} 
	
	public function setTipmovren($v)
	{

    if ($this->tipmovren !== $v) {
        $this->tipmovren = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::TIPMOVREN;
      }
  
	} 
	
	public function setMonmincon($v)
	{

    if ($this->monmincon !== $v) {
        $this->monmincon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdeffonantPeer::MONMINCON;
      }
  
	} 
	
	public function setMonmaxcon($v)
	{

    if ($this->monmaxcon !== $v) {
        $this->monmaxcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdeffonantPeer::MONMAXCON;
      }
  
	} 
	
	public function setPorrep($v)
	{

    if ($this->porrep !== $v) {
        $this->porrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdeffonantPeer::PORREP;
      }
  
	} 
	
	public function setNumini($v)
	{

    if ($this->numini !== $v) {
        $this->numini = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::NUMINI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdeffonantPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codfon = $rs->getString($startcol + 0);

      $this->desfon = $rs->getString($startcol + 1);

      $this->unieje = $rs->getString($startcol + 2);

      $this->coduniadm = $rs->getString($startcol + 3);

      $this->cedrif = $rs->getString($startcol + 4);

      $this->codcat = $rs->getString($startcol + 5);

      $this->numcue = $rs->getString($startcol + 6);

      $this->tipmovsal = $rs->getString($startcol + 7);

      $this->tipmovren = $rs->getString($startcol + 8);

      $this->monmincon = $rs->getFloat($startcol + 9);

      $this->monmaxcon = $rs->getFloat($startcol + 10);

      $this->porrep = $rs->getFloat($startcol + 11);

      $this->numini = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdeffonant object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdeffonantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdeffonantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdeffonantPeer::DATABASE_NAME);
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


												
			if ($this->aBnubica !== null) {
				if ($this->aBnubica->isModified()) {
					$affectedRows += $this->aBnubica->save($con);
				}
				$this->setBnubica($this->aBnubica);
			}

			if ($this->aTsuniadm !== null) {
				if ($this->aTsuniadm->isModified()) {
					$affectedRows += $this->aTsuniadm->save($con);
				}
				$this->setTsuniadm($this->aTsuniadm);
			}

			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}

			if ($this->aNpcatpre !== null) {
				if ($this->aNpcatpre->isModified()) {
					$affectedRows += $this->aNpcatpre->save($con);
				}
				$this->setNpcatpre($this->aNpcatpre);
			}

			if ($this->aTsdefban !== null) {
				if ($this->aTsdefban->isModified()) {
					$affectedRows += $this->aTsdefban->save($con);
				}
				$this->setTsdefban($this->aTsdefban);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TsdeffonantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdeffonantPeer::doUpdate($this, $con);
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


												
			if ($this->aBnubica !== null) {
				if (!$this->aBnubica->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBnubica->getValidationFailures());
				}
			}

			if ($this->aTsuniadm !== null) {
				if (!$this->aTsuniadm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsuniadm->getValidationFailures());
				}
			}

			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}

			if ($this->aNpcatpre !== null) {
				if (!$this->aNpcatpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNpcatpre->getValidationFailures());
				}
			}

			if ($this->aTsdefban !== null) {
				if (!$this->aTsdefban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefban->getValidationFailures());
				}
			}


			if (($retval = TsdeffonantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdeffonantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodfon();
				break;
			case 1:
				return $this->getDesfon();
				break;
			case 2:
				return $this->getUnieje();
				break;
			case 3:
				return $this->getCoduniadm();
				break;
			case 4:
				return $this->getCedrif();
				break;
			case 5:
				return $this->getCodcat();
				break;
			case 6:
				return $this->getNumcue();
				break;
			case 7:
				return $this->getTipmovsal();
				break;
			case 8:
				return $this->getTipmovren();
				break;
			case 9:
				return $this->getMonmincon();
				break;
			case 10:
				return $this->getMonmaxcon();
				break;
			case 11:
				return $this->getPorrep();
				break;
			case 12:
				return $this->getNumini();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdeffonantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodfon(),
			$keys[1] => $this->getDesfon(),
			$keys[2] => $this->getUnieje(),
			$keys[3] => $this->getCoduniadm(),
			$keys[4] => $this->getCedrif(),
			$keys[5] => $this->getCodcat(),
			$keys[6] => $this->getNumcue(),
			$keys[7] => $this->getTipmovsal(),
			$keys[8] => $this->getTipmovren(),
			$keys[9] => $this->getMonmincon(),
			$keys[10] => $this->getMonmaxcon(),
			$keys[11] => $this->getPorrep(),
			$keys[12] => $this->getNumini(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdeffonantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodfon($value);
				break;
			case 1:
				$this->setDesfon($value);
				break;
			case 2:
				$this->setUnieje($value);
				break;
			case 3:
				$this->setCoduniadm($value);
				break;
			case 4:
				$this->setCedrif($value);
				break;
			case 5:
				$this->setCodcat($value);
				break;
			case 6:
				$this->setNumcue($value);
				break;
			case 7:
				$this->setTipmovsal($value);
				break;
			case 8:
				$this->setTipmovren($value);
				break;
			case 9:
				$this->setMonmincon($value);
				break;
			case 10:
				$this->setMonmaxcon($value);
				break;
			case 11:
				$this->setPorrep($value);
				break;
			case 12:
				$this->setNumini($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdeffonantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodfon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesfon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnieje($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoduniadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedrif($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcat($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipmovsal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipmovren($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonmincon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonmaxcon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPorrep($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumini($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdeffonantPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdeffonantPeer::CODFON)) $criteria->add(TsdeffonantPeer::CODFON, $this->codfon);
		if ($this->isColumnModified(TsdeffonantPeer::DESFON)) $criteria->add(TsdeffonantPeer::DESFON, $this->desfon);
		if ($this->isColumnModified(TsdeffonantPeer::UNIEJE)) $criteria->add(TsdeffonantPeer::UNIEJE, $this->unieje);
		if ($this->isColumnModified(TsdeffonantPeer::CODUNIADM)) $criteria->add(TsdeffonantPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(TsdeffonantPeer::CEDRIF)) $criteria->add(TsdeffonantPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TsdeffonantPeer::CODCAT)) $criteria->add(TsdeffonantPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(TsdeffonantPeer::NUMCUE)) $criteria->add(TsdeffonantPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsdeffonantPeer::TIPMOVSAL)) $criteria->add(TsdeffonantPeer::TIPMOVSAL, $this->tipmovsal);
		if ($this->isColumnModified(TsdeffonantPeer::TIPMOVREN)) $criteria->add(TsdeffonantPeer::TIPMOVREN, $this->tipmovren);
		if ($this->isColumnModified(TsdeffonantPeer::MONMINCON)) $criteria->add(TsdeffonantPeer::MONMINCON, $this->monmincon);
		if ($this->isColumnModified(TsdeffonantPeer::MONMAXCON)) $criteria->add(TsdeffonantPeer::MONMAXCON, $this->monmaxcon);
		if ($this->isColumnModified(TsdeffonantPeer::PORREP)) $criteria->add(TsdeffonantPeer::PORREP, $this->porrep);
		if ($this->isColumnModified(TsdeffonantPeer::NUMINI)) $criteria->add(TsdeffonantPeer::NUMINI, $this->numini);
		if ($this->isColumnModified(TsdeffonantPeer::ID)) $criteria->add(TsdeffonantPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdeffonantPeer::DATABASE_NAME);

		$criteria->add(TsdeffonantPeer::ID, $this->id);

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

		$copyObj->setCodfon($this->codfon);

		$copyObj->setDesfon($this->desfon);

		$copyObj->setUnieje($this->unieje);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setTipmovsal($this->tipmovsal);

		$copyObj->setTipmovren($this->tipmovren);

		$copyObj->setMonmincon($this->monmincon);

		$copyObj->setMonmaxcon($this->monmaxcon);

		$copyObj->setPorrep($this->porrep);

		$copyObj->setNumini($this->numini);


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
			self::$peer = new TsdeffonantPeer();
		}
		return self::$peer;
	}

	
	public function setBnubica($v)
	{


		if ($v === null) {
			$this->setUnieje(NULL);
		} else {
			$this->setUnieje($v->getCodubi());
		}


		$this->aBnubica = $v;
	}


	
	public function getBnubica($con = null)
	{
		if ($this->aBnubica === null && (($this->unieje !== "" && $this->unieje !== null))) {
						include_once 'lib/model/om/BaseBnubicaPeer.php';

      $c = new Criteria();
      $c->add(BnubicaPeer::CODUBI,$this->unieje);
      
			$this->aBnubica = BnubicaPeer::doSelectOne($c, $con);

			
		}
		return $this->aBnubica;
	}

	
	public function setTsuniadm($v)
	{


		if ($v === null) {
			$this->setCoduniadm(NULL);
		} else {
			$this->setCoduniadm($v->getCoduniadm());
		}


		$this->aTsuniadm = $v;
	}


	
	public function getTsuniadm($con = null)
	{
		if ($this->aTsuniadm === null && (($this->coduniadm !== "" && $this->coduniadm !== null))) {
						include_once 'lib/model/om/BaseTsuniadmPeer.php';

      $c = new Criteria();
      $c->add(TsuniadmPeer::CODUNIADM,$this->coduniadm);
      
			$this->aTsuniadm = TsuniadmPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsuniadm;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

      $c = new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->cedrif);
      
			$this->aOpbenefi = OpbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpbenefi;
	}

	
	public function setNpcatpre($v)
	{


		if ($v === null) {
			$this->setCodcat(NULL);
		} else {
			$this->setCodcat($v->getCodcat());
		}


		$this->aNpcatpre = $v;
	}


	
	public function getNpcatpre($con = null)
	{
		if ($this->aNpcatpre === null && (($this->codcat !== "" && $this->codcat !== null))) {
						include_once 'lib/model/nomina/om/BaseNpcatprePeer.php';

      $c = new Criteria();
      $c->add(NpcatprePeer::CODCAT,$this->codcat);
      
			$this->aNpcatpre = NpcatprePeer::doSelectOne($c, $con);

			
		}
		return $this->aNpcatpre;
	}

	
	public function setTsdefban($v)
	{


		if ($v === null) {
			$this->setNumcue(NULL);
		} else {
			$this->setNumcue($v->getNumcue());
		}


		$this->aTsdefban = $v;
	}


	
	public function getTsdefban($con = null)
	{
		if ($this->aTsdefban === null && (($this->numcue !== "" && $this->numcue !== null))) {
						include_once 'lib/model/om/BaseTsdefbanPeer.php';

      $c = new Criteria();
      $c->add(TsdefbanPeer::NUMCUE,$this->numcue);
      
			$this->aTsdefban = TsdefbanPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefban;
	}

} 
