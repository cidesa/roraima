<?php


abstract class BaseAtdetayu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $atdonaciones_id;


	
	protected $cantidad;


	
	protected $canapr;


	
	protected $aprobado;


	
	protected $precio;


	
	protected $unidad;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $aAtdonaciones;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getAtdonacionesId()
  {

    return $this->atdonaciones_id;

  }
  
  public function getCantidad()
  {

    return $this->cantidad;

  }
  
  public function getCanapr()
  {

    return $this->canapr;

  }
  
  public function getAprobado()
  {

    return $this->aprobado;

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtdetayuPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setAtdonacionesId($v)
	{

    if ($this->atdonaciones_id !== $v) {
        $this->atdonaciones_id = $v;
        $this->modifiedColumns[] = AtdetayuPeer::ATDONACIONES_ID;
      }
  
		if ($this->aAtdonaciones !== null && $this->aAtdonaciones->getId() !== $v) {
			$this->aAtdonaciones = null;
		}

	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = $v;
        $this->modifiedColumns[] = AtdetayuPeer::CANTIDAD;
      }
  
	} 
	
	public function setCanapr($v)
	{

    if ($this->canapr !== $v) {
        $this->canapr = $v;
        $this->modifiedColumns[] = AtdetayuPeer::CANAPR;
      }
  
	} 
	
	public function setAprobado($v)
	{

    if ($this->aprobado !== $v) {
        $this->aprobado = $v;
        $this->modifiedColumns[] = AtdetayuPeer::APROBADO;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtdetayuPeer::PRECIO;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = AtdetayuPeer::UNIDAD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdetayuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->atdonaciones_id = $rs->getInt($startcol + 1);

      $this->cantidad = $rs->getInt($startcol + 2);

      $this->canapr = $rs->getInt($startcol + 3);

      $this->aprobado = $rs->getBoolean($startcol + 4);

      $this->precio = $rs->getFloat($startcol + 5);

      $this->unidad = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdetayu object", $e);
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
			$con = Propel::getConnection(AtdetayuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdetayuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdetayuPeer::DATABASE_NAME);
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


												
			if ($this->aAtayudas !== null) {
				if ($this->aAtayudas->isModified()) {
					$affectedRows += $this->aAtayudas->save($con);
				}
				$this->setAtayudas($this->aAtayudas);
			}

			if ($this->aAtdonaciones !== null) {
				if ($this->aAtdonaciones->isModified()) {
					$affectedRows += $this->aAtdonaciones->save($con);
				}
				$this->setAtdonaciones($this->aAtdonaciones);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtdetayuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdetayuPeer::doUpdate($this, $con);
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


												
			if ($this->aAtayudas !== null) {
				if (!$this->aAtayudas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtayudas->getValidationFailures());
				}
			}

			if ($this->aAtdonaciones !== null) {
				if (!$this->aAtdonaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtdonaciones->getValidationFailures());
				}
			}


			if (($retval = AtdetayuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdetayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getAtdonacionesId();
				break;
			case 2:
				return $this->getCantidad();
				break;
			case 3:
				return $this->getCanapr();
				break;
			case 4:
				return $this->getAprobado();
				break;
			case 5:
				return $this->getPrecio();
				break;
			case 6:
				return $this->getUnidad();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdetayuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getAtdonacionesId(),
			$keys[2] => $this->getCantidad(),
			$keys[3] => $this->getCanapr(),
			$keys[4] => $this->getAprobado(),
			$keys[5] => $this->getPrecio(),
			$keys[6] => $this->getUnidad(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdetayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setAtdonacionesId($value);
				break;
			case 2:
				$this->setCantidad($value);
				break;
			case 3:
				$this->setCanapr($value);
				break;
			case 4:
				$this->setAprobado($value);
				break;
			case 5:
				$this->setPrecio($value);
				break;
			case 6:
				$this->setUnidad($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdetayuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtdonacionesId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantidad($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanapr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAprobado($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrecio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnidad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdetayuPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdetayuPeer::ATAYUDAS_ID)) $criteria->add(AtdetayuPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtdetayuPeer::ATDONACIONES_ID)) $criteria->add(AtdetayuPeer::ATDONACIONES_ID, $this->atdonaciones_id);
		if ($this->isColumnModified(AtdetayuPeer::CANTIDAD)) $criteria->add(AtdetayuPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(AtdetayuPeer::CANAPR)) $criteria->add(AtdetayuPeer::CANAPR, $this->canapr);
		if ($this->isColumnModified(AtdetayuPeer::APROBADO)) $criteria->add(AtdetayuPeer::APROBADO, $this->aprobado);
		if ($this->isColumnModified(AtdetayuPeer::PRECIO)) $criteria->add(AtdetayuPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(AtdetayuPeer::UNIDAD)) $criteria->add(AtdetayuPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(AtdetayuPeer::ID)) $criteria->add(AtdetayuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdetayuPeer::DATABASE_NAME);

		$criteria->add(AtdetayuPeer::ID, $this->id);

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

		$copyObj->setAtayudasId($this->atayudas_id);

		$copyObj->setAtdonacionesId($this->atdonaciones_id);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setCanapr($this->canapr);

		$copyObj->setAprobado($this->aprobado);

		$copyObj->setPrecio($this->precio);

		$copyObj->setUnidad($this->unidad);


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
			self::$peer = new AtdetayuPeer();
		}
		return self::$peer;
	}

	
	public function setAtayudas($v)
	{


		if ($v === null) {
			$this->setAtayudasId(NULL);
		} else {
			$this->setAtayudasId($v->getId());
		}


		$this->aAtayudas = $v;
	}


	
	public function getAtayudas($con = null)
	{
		if ($this->aAtayudas === null && ($this->atayudas_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';

      $c = new Criteria();
      $c->add(AtayudasPeer::ID,$this->atayudas_id);
      
			$this->aAtayudas = AtayudasPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtayudas;
	}

	
	public function setAtdonaciones($v)
	{


		if ($v === null) {
			$this->setAtdonacionesId(NULL);
		} else {
			$this->setAtdonacionesId($v->getId());
		}


		$this->aAtdonaciones = $v;
	}


	
	public function getAtdonaciones($con = null)
	{
		if ($this->aAtdonaciones === null && ($this->atdonaciones_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtdonacionesPeer.php';

      $c = new Criteria();
      $c->add(AtdonacionesPeer::ID,$this->atdonaciones_id);
      
			$this->aAtdonaciones = AtdonacionesPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtdonaciones;
	}

} 