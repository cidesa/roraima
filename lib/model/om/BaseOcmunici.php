<?php


abstract class BaseOcmunici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codciu;


	
	protected $codmun;


	
	protected $nommun;


	
	protected $id;

	
	protected $aOcpais;

	
	protected $aOcestado;

	
	protected $aOcciudad;

	
	protected $collCadefcenacos;

	
	protected $lastCadefcenacoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getNommun()
  {

    return trim($this->nommun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = OcmuniciPeer::CODPAI;
      }
  
		if ($this->aOcpais !== null && $this->aOcpais->getCodpai() !== $v) {
			$this->aOcpais = null;
		}

	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = OcmuniciPeer::CODEDO;
      }
  
		if ($this->aOcestado !== null && $this->aOcestado->getCodedo() !== $v) {
			$this->aOcestado = null;
		}

	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = OcmuniciPeer::CODCIU;
      }
  
		if ($this->aOcciudad !== null && $this->aOcciudad->getCodciu() !== $v) {
			$this->aOcciudad = null;
		}

	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = OcmuniciPeer::CODMUN;
      }
  
	} 
	
	public function setNommun($v)
	{

    if ($this->nommun !== $v) {
        $this->nommun = $v;
        $this->modifiedColumns[] = OcmuniciPeer::NOMMUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcmuniciPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpai = $rs->getString($startcol + 0);

      $this->codedo = $rs->getString($startcol + 1);

      $this->codciu = $rs->getString($startcol + 2);

      $this->codmun = $rs->getString($startcol + 3);

      $this->nommun = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocmunici object", $e);
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
			$con = Propel::getConnection(OcmuniciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcmuniciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcmuniciPeer::DATABASE_NAME);
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


												
			if ($this->aOcpais !== null) {
				if ($this->aOcpais->isModified()) {
					$affectedRows += $this->aOcpais->save($con);
				}
				$this->setOcpais($this->aOcpais);
			}

			if ($this->aOcestado !== null) {
				if ($this->aOcestado->isModified()) {
					$affectedRows += $this->aOcestado->save($con);
				}
				$this->setOcestado($this->aOcestado);
			}

			if ($this->aOcciudad !== null) {
				if ($this->aOcciudad->isModified()) {
					$affectedRows += $this->aOcciudad->save($con);
				}
				$this->setOcciudad($this->aOcciudad);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OcmuniciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcmuniciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCadefcenacos !== null) {
				foreach($this->collCadefcenacos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aOcpais !== null) {
				if (!$this->aOcpais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcpais->getValidationFailures());
				}
			}

			if ($this->aOcestado !== null) {
				if (!$this->aOcestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcestado->getValidationFailures());
				}
			}

			if ($this->aOcciudad !== null) {
				if (!$this->aOcciudad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOcciudad->getValidationFailures());
				}
			}


			if (($retval = OcmuniciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCadefcenacos !== null) {
					foreach($this->collCadefcenacos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpai();
				break;
			case 1:
				return $this->getCodedo();
				break;
			case 2:
				return $this->getCodciu();
				break;
			case 3:
				return $this->getCodmun();
				break;
			case 4:
				return $this->getNommun();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcmuniciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpai(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodciu(),
			$keys[3] => $this->getCodmun(),
			$keys[4] => $this->getNommun(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpai($value);
				break;
			case 1:
				$this->setCodedo($value);
				break;
			case 2:
				$this->setCodciu($value);
				break;
			case 3:
				$this->setCodmun($value);
				break;
			case 4:
				$this->setNommun($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcmuniciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodciu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodmun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNommun($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcmuniciPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcmuniciPeer::CODPAI)) $criteria->add(OcmuniciPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcmuniciPeer::CODEDO)) $criteria->add(OcmuniciPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcmuniciPeer::CODCIU)) $criteria->add(OcmuniciPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(OcmuniciPeer::CODMUN)) $criteria->add(OcmuniciPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(OcmuniciPeer::NOMMUN)) $criteria->add(OcmuniciPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(OcmuniciPeer::ID)) $criteria->add(OcmuniciPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcmuniciPeer::DATABASE_NAME);

		$criteria->add(OcmuniciPeer::ID, $this->id);

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

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setNommun($this->nommun);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCadefcenacos() as $relObj) {
				$copyObj->addCadefcenaco($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new OcmuniciPeer();
		}
		return self::$peer;
	}

	
	public function setOcpais($v)
	{


		if ($v === null) {
			$this->setCodpai(NULL);
		} else {
			$this->setCodpai($v->getCodpai());
		}


		$this->aOcpais = $v;
	}


	
	public function getOcpais($con = null)
	{
		if ($this->aOcpais === null && (($this->codpai !== "" && $this->codpai !== null))) {
						include_once 'lib/model/om/BaseOcpaisPeer.php';

      $c = new Criteria();
      $c->add(OcpaisPeer::CODPAI,$this->codpai);
      
			$this->aOcpais = OcpaisPeer::doSelectOne($c, $con);

			
		}
		return $this->aOcpais;
	}

	
	public function setOcestado($v)
	{


		if ($v === null) {
			$this->setCodedo(NULL);
		} else {
			$this->setCodedo($v->getCodedo());
		}


		$this->aOcestado = $v;
	}


	
	public function getOcestado($con = null)
	{
		if ($this->aOcestado === null && (($this->codedo !== "" && $this->codedo !== null))) {
						include_once 'lib/model/om/BaseOcestadoPeer.php';

      $c = new Criteria();
      $c->add(OcestadoPeer::CODEDO,$this->codedo);
      
			$this->aOcestado = OcestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aOcestado;
	}

	
	public function setOcciudad($v)
	{


		if ($v === null) {
			$this->setCodciu(NULL);
		} else {
			$this->setCodciu($v->getCodciu());
		}


		$this->aOcciudad = $v;
	}


	
	public function getOcciudad($con = null)
	{
		if ($this->aOcciudad === null && (($this->codciu !== "" && $this->codciu !== null))) {
						include_once 'lib/model/om/BaseOcciudadPeer.php';

      $c = new Criteria();
      $c->add(OcciudadPeer::CODCIU,$this->codciu);
      
			$this->aOcciudad = OcciudadPeer::doSelectOne($c, $con);

			
		}
		return $this->aOcciudad;
	}

	
	public function initCadefcenacos()
	{
		if ($this->collCadefcenacos === null) {
			$this->collCadefcenacos = array();
		}
	}

	
	public function getCadefcenacos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
			   $this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

				CadefcenacoPeer::addSelectColumns($criteria);
				$this->collCadefcenacos = CadefcenacoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

				CadefcenacoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
					$this->collCadefcenacos = CadefcenacoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;
		return $this->collCadefcenacos;
	}

	
	public function countCadefcenacos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

		return CadefcenacoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCadefcenaco(Cadefcenaco $l)
	{
		$this->collCadefcenacos[] = $l;
		$l->setOcmunici($this);
	}


	
	public function getCadefcenacosJoinOcpais($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
				$this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcpais($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcpais($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}


	
	public function getCadefcenacosJoinOcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
				$this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcestado($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}


	
	public function getCadefcenacosJoinOcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefcenacoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefcenacos === null) {
			if ($this->isNew()) {
				$this->collCadefcenacos = array();
			} else {

				$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CadefcenacoPeer::CODMUN, $this->getCodmun());

			if (!isset($this->lastCadefcenacoCriteria) || !$this->lastCadefcenacoCriteria->equals($criteria)) {
				$this->collCadefcenacos = CadefcenacoPeer::doSelectJoinOcciudad($criteria, $con);
			}
		}
		$this->lastCadefcenacoCriteria = $criteria;

		return $this->collCadefcenacos;
	}

} 