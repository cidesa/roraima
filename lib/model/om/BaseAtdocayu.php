<?php


abstract class BaseAtdocayu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $image;


	
	protected $desimg;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getImage()
  {

    return trim($this->image);

  }
  
  public function getDesimg()
  {

    return trim($this->desimg);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtdocayuPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setImage($v)
	{

    if ($this->image !== $v) {
        $this->image = $v;
        $this->modifiedColumns[] = AtdocayuPeer::IMAGE;
      }
  
	} 
	
	public function setDesimg($v)
	{

    if ($this->desimg !== $v) {
        $this->desimg = $v;
        $this->modifiedColumns[] = AtdocayuPeer::DESIMG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdocayuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->image = $rs->getString($startcol + 1);

      $this->desimg = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdocayu object", $e);
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
			$con = Propel::getConnection(AtdocayuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdocayuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdocayuPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtdocayuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdocayuPeer::doUpdate($this, $con);
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


			if (($retval = AtdocayuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdocayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getImage();
				break;
			case 2:
				return $this->getDesimg();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdocayuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getImage(),
			$keys[2] => $this->getDesimg(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdocayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setImage($value);
				break;
			case 2:
				$this->setDesimg($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdocayuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setImage($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesimg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdocayuPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdocayuPeer::ATAYUDAS_ID)) $criteria->add(AtdocayuPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtdocayuPeer::IMAGE)) $criteria->add(AtdocayuPeer::IMAGE, $this->image);
		if ($this->isColumnModified(AtdocayuPeer::DESIMG)) $criteria->add(AtdocayuPeer::DESIMG, $this->desimg);
		if ($this->isColumnModified(AtdocayuPeer::ID)) $criteria->add(AtdocayuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdocayuPeer::DATABASE_NAME);

		$criteria->add(AtdocayuPeer::ID, $this->id);

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

		$copyObj->setImage($this->image);

		$copyObj->setDesimg($this->desimg);


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
			self::$peer = new AtdocayuPeer();
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
						include_once 'lib/model/om/BaseAtayudasPeer.php';

			$this->aAtayudas = AtayudasPeer::retrieveByPK($this->atayudas_id, $con);

			
		}
		return $this->aAtayudas;
	}

} 