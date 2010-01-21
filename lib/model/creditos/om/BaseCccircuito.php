<?php


abstract class BaseCccircuito extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomcircuito;


	
	protected $descircuito;


	
	protected $ccestado_id;

	
	protected $aCcestado;

	
	protected $collCcsolicis;

	
	protected $lastCcsoliciCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomcircuito()
  {

    return trim($this->nomcircuito);

  }
  
  public function getDescircuito()
  {

    return trim($this->descircuito);

  }
  
  public function getCcestadoId()
  {

    return $this->ccestado_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccircuitoPeer::ID;
      }
  
	} 
	
	public function setNomcircuito($v)
	{

    if ($this->nomcircuito !== $v) {
        $this->nomcircuito = $v;
        $this->modifiedColumns[] = CccircuitoPeer::NOMCIRCUITO;
      }
  
	} 
	
	public function setDescircuito($v)
	{

    if ($this->descircuito !== $v) {
        $this->descircuito = $v;
        $this->modifiedColumns[] = CccircuitoPeer::DESCIRCUITO;
      }
  
	} 
	
	public function setCcestadoId($v)
	{

    if ($this->ccestado_id !== $v) {
        $this->ccestado_id = $v;
        $this->modifiedColumns[] = CccircuitoPeer::CCESTADO_ID;
      }
  
		if ($this->aCcestado !== null && $this->aCcestado->getId() !== $v) {
			$this->aCcestado = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomcircuito = $rs->getString($startcol + 1);

      $this->descircuito = $rs->getString($startcol + 2);

      $this->ccestado_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccircuito object", $e);
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
			$con = Propel::getConnection(CccircuitoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccircuitoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccircuitoPeer::DATABASE_NAME);
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


												
			if ($this->aCcestado !== null) {
				if ($this->aCcestado->isModified()) {
					$affectedRows += $this->aCcestado->save($con);
				}
				$this->setCcestado($this->aCcestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CccircuitoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccircuitoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcsolicis !== null) {
				foreach($this->collCcsolicis as $referrerFK) {
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


												
			if ($this->aCcestado !== null) {
				if (!$this->aCcestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestado->getValidationFailures());
				}
			}


			if (($retval = CccircuitoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcsolicis !== null) {
					foreach($this->collCcsolicis as $referrerFK) {
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
		$pos = CccircuitoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomcircuito();
				break;
			case 2:
				return $this->getDescircuito();
				break;
			case 3:
				return $this->getCcestadoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccircuitoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomcircuito(),
			$keys[2] => $this->getDescircuito(),
			$keys[3] => $this->getCcestadoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccircuitoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomcircuito($value);
				break;
			case 2:
				$this->setDescircuito($value);
				break;
			case 3:
				$this->setCcestadoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccircuitoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcircuito($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescircuito($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcestadoId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccircuitoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccircuitoPeer::ID)) $criteria->add(CccircuitoPeer::ID, $this->id);
		if ($this->isColumnModified(CccircuitoPeer::NOMCIRCUITO)) $criteria->add(CccircuitoPeer::NOMCIRCUITO, $this->nomcircuito);
		if ($this->isColumnModified(CccircuitoPeer::DESCIRCUITO)) $criteria->add(CccircuitoPeer::DESCIRCUITO, $this->descircuito);
		if ($this->isColumnModified(CccircuitoPeer::CCESTADO_ID)) $criteria->add(CccircuitoPeer::CCESTADO_ID, $this->ccestado_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccircuitoPeer::DATABASE_NAME);

		$criteria->add(CccircuitoPeer::ID, $this->id);

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

		$copyObj->setNomcircuito($this->nomcircuito);

		$copyObj->setDescircuito($this->descircuito);

		$copyObj->setCcestadoId($this->ccestado_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcsolicis() as $relObj) {
				$copyObj->addCcsolici($relObj->copy($deepCopy));
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
			self::$peer = new CccircuitoPeer();
		}
		return self::$peer;
	}

	
	public function setCcestado($v)
	{


		if ($v === null) {
			$this->setCcestadoId(NULL);
		} else {
			$this->setCcestadoId($v->getId());
		}


		$this->aCcestado = $v;
	}


	
	public function getCcestado($con = null)
	{
		if ($this->aCcestado === null && ($this->ccestado_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestadoPeer.php';

      $c = new Criteria();
      $c->add(CcestadoPeer::ID,$this->ccestado_id);
      
			$this->aCcestado = CcestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestado;
	}

	
	public function initCcsolicis()
	{
		if ($this->collCcsolicis === null) {
			$this->collCcsolicis = array();
		}
	}

	
	public function getCcsolicis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
			   $this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
					$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoliciCriteria = $criteria;
		return $this->collCcsolicis;
	}

	
	public function countCcsolicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

		return CcsoliciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolici(Ccsolici $l)
	{
		$this->collCcsolicis[] = $l;
		$l->setCccircuito($this);
	}


	
	public function getCcsolicisJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcmunici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}

} 