<?php


abstract class BaseViadettipser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $montoeur;


	
	protected $montodol;


	
	protected $montobs;


	
	protected $viaregtiptab_id;


	
	protected $occiudad_id;


	
	protected $viaregtipser_id;


	
	protected $id;

	
	protected $aViaregtiptab;

	
	protected $aOcciudad;

	
	protected $aViaregtipser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getMontoeur($val=false)
  {

    if($val) return number_format($this->montoeur,2,',','.');
    else return $this->montoeur;

  }
  
  public function getMontodol($val=false)
  {

    if($val) return number_format($this->montodol,2,',','.');
    else return $this->montodol;

  }
  
  public function getMontobs($val=false)
  {

    if($val) return number_format($this->montobs,2,',','.');
    else return $this->montobs;

  }
  
  public function getViaregtiptabId()
  {

    return $this->viaregtiptab_id;

  }
  
  public function getOcciudadId()
  {

    return $this->occiudad_id;

  }
  
  public function getViaregtipserId()
  {

    return $this->viaregtipser_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setMontoeur($v)
	{

    if ($this->montoeur !== $v) {
        $this->montoeur = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadettipserPeer::MONTOEUR;
      }
  
	} 
	
	public function setMontodol($v)
	{

    if ($this->montodol !== $v) {
        $this->montodol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadettipserPeer::MONTODOL;
      }
  
	} 
	
	public function setMontobs($v)
	{

    if ($this->montobs !== $v) {
        $this->montobs = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadettipserPeer::MONTOBS;
      }
  
	} 
	
	public function setViaregtiptabId($v)
	{

    if ($this->viaregtiptab_id !== $v) {
        $this->viaregtiptab_id = $v;
        $this->modifiedColumns[] = ViadettipserPeer::VIAREGTIPTAB_ID;
      }
  
		if ($this->aViaregtiptab !== null && $this->aViaregtiptab->getId() !== $v) {
			$this->aViaregtiptab = null;
		}

	} 
	
	public function setOcciudadId($v)
	{

    if ($this->occiudad_id !== $v) {
        $this->occiudad_id = $v;
        $this->modifiedColumns[] = ViadettipserPeer::OCCIUDAD_ID;
      }
  
		if ($this->aOcciudad !== null && $this->aOcciudad->getId() !== $v) {
			$this->aOcciudad = null;
		}

	} 
	
	public function setViaregtipserId($v)
	{

    if ($this->viaregtipser_id !== $v) {
        $this->viaregtipser_id = $v;
        $this->modifiedColumns[] = ViadettipserPeer::VIAREGTIPSER_ID;
      }
  
		if ($this->aViaregtipser !== null && $this->aViaregtipser->getId() !== $v) {
			$this->aViaregtipser = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadettipserPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->montoeur = $rs->getFloat($startcol + 0);

      $this->montodol = $rs->getFloat($startcol + 1);

      $this->montobs = $rs->getFloat($startcol + 2);

      $this->viaregtiptab_id = $rs->getInt($startcol + 3);

      $this->occiudad_id = $rs->getInt($startcol + 4);

      $this->viaregtipser_id = $rs->getInt($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadettipser object", $e);
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
			$con = Propel::getConnection(ViadettipserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadettipserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadettipserPeer::DATABASE_NAME);
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


												
			if ($this->aViaregtiptab !== null) {
				if ($this->aViaregtiptab->isModified()) {
					$affectedRows += $this->aViaregtiptab->save($con);
				}
				$this->setViaregtiptab($this->aViaregtiptab);
			}

			if ($this->aOcciudad !== null) {
				if ($this->aOcciudad->isModified()) {
					$affectedRows += $this->aOcciudad->save($con);
				}
				$this->setOcciudad($this->aOcciudad);
			}

			if ($this->aViaregtipser !== null) {
				if ($this->aViaregtipser->isModified()) {
					$affectedRows += $this->aViaregtipser->save($con);
				}
				$this->setViaregtipser($this->aViaregtipser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViadettipserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadettipserPeer::doUpdate($this, $con);
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


												
			if ($this->aViaregtiptab !== null) {
				if (!$this->aViaregtiptab->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregtiptab->getValidationFailures());
				}
			}

			if ($this->aOcciudad !== null) {
				if (!$this->aOcciudad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcciudad->getValidationFailures());
				}
			}

			if ($this->aViaregtipser !== null) {
				if (!$this->aViaregtipser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaregtipser->getValidationFailures());
				}
			}


			if (($retval = ViadettipserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadettipserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMontoeur();
				break;
			case 1:
				return $this->getMontodol();
				break;
			case 2:
				return $this->getMontobs();
				break;
			case 3:
				return $this->getViaregtiptabId();
				break;
			case 4:
				return $this->getOcciudadId();
				break;
			case 5:
				return $this->getViaregtipserId();
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
		$keys = ViadettipserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMontoeur(),
			$keys[1] => $this->getMontodol(),
			$keys[2] => $this->getMontobs(),
			$keys[3] => $this->getViaregtiptabId(),
			$keys[4] => $this->getOcciudadId(),
			$keys[5] => $this->getViaregtipserId(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadettipserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMontoeur($value);
				break;
			case 1:
				$this->setMontodol($value);
				break;
			case 2:
				$this->setMontobs($value);
				break;
			case 3:
				$this->setViaregtiptabId($value);
				break;
			case 4:
				$this->setOcciudadId($value);
				break;
			case 5:
				$this->setViaregtipserId($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadettipserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMontoeur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMontodol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMontobs($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setViaregtiptabId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOcciudadId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setViaregtipserId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadettipserPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadettipserPeer::MONTOEUR)) $criteria->add(ViadettipserPeer::MONTOEUR, $this->montoeur);
		if ($this->isColumnModified(ViadettipserPeer::MONTODOL)) $criteria->add(ViadettipserPeer::MONTODOL, $this->montodol);
		if ($this->isColumnModified(ViadettipserPeer::MONTOBS)) $criteria->add(ViadettipserPeer::MONTOBS, $this->montobs);
		if ($this->isColumnModified(ViadettipserPeer::VIAREGTIPTAB_ID)) $criteria->add(ViadettipserPeer::VIAREGTIPTAB_ID, $this->viaregtiptab_id);
		if ($this->isColumnModified(ViadettipserPeer::OCCIUDAD_ID)) $criteria->add(ViadettipserPeer::OCCIUDAD_ID, $this->occiudad_id);
		if ($this->isColumnModified(ViadettipserPeer::VIAREGTIPSER_ID)) $criteria->add(ViadettipserPeer::VIAREGTIPSER_ID, $this->viaregtipser_id);
		if ($this->isColumnModified(ViadettipserPeer::ID)) $criteria->add(ViadettipserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadettipserPeer::DATABASE_NAME);

		$criteria->add(ViadettipserPeer::ID, $this->id);

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

		$copyObj->setMontoeur($this->montoeur);

		$copyObj->setMontodol($this->montodol);

		$copyObj->setMontobs($this->montobs);

		$copyObj->setViaregtiptabId($this->viaregtiptab_id);

		$copyObj->setOcciudadId($this->occiudad_id);

		$copyObj->setViaregtipserId($this->viaregtipser_id);


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
			self::$peer = new ViadettipserPeer();
		}
		return self::$peer;
	}

	
	public function setViaregtiptab($v)
	{


		if ($v === null) {
			$this->setViaregtiptabId(NULL);
		} else {
			$this->setViaregtiptabId($v->getId());
		}


		$this->aViaregtiptab = $v;
	}


	
	public function getViaregtiptab($con = null)
	{
		if ($this->aViaregtiptab === null && ($this->viaregtiptab_id !== null)) {
						include_once 'lib/model/om/BaseViaregtiptabPeer.php';

			$this->aViaregtiptab = ViaregtiptabPeer::retrieveByPK($this->viaregtiptab_id, $con);

			
		}
		return $this->aViaregtiptab;
	}

	
	public function setOcciudad($v)
	{


		if ($v === null) {
			$this->setOcciudadId(NULL);
		} else {
			$this->setOcciudadId($v->getId());
		}


		$this->aOcciudad = $v;
	}


	
	public function getOcciudad($con = null)
	{
		if ($this->aOcciudad === null && ($this->occiudad_id !== null)) {
						include_once 'lib/model/om/BaseOcciudadPeer.php';

			$this->aOcciudad = OcciudadPeer::retrieveByPK($this->occiudad_id, $con);

			
		}
		return $this->aOcciudad;
	}

	
	public function setViaregtipser($v)
	{


		if ($v === null) {
			$this->setViaregtipserId(NULL);
		} else {
			$this->setViaregtipserId($v->getId());
		}


		$this->aViaregtipser = $v;
	}


	
	public function getViaregtipser($con = null)
	{
		if ($this->aViaregtipser === null && ($this->viaregtipser_id !== null)) {
						include_once 'lib/model/om/BaseViaregtipserPeer.php';

			$this->aViaregtipser = ViaregtipserPeer::retrieveByPK($this->viaregtipser_id, $con);

			
		}
		return $this->aViaregtipser;
	}

} 