<?php


abstract class BaseCaresordcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caresordcom';

	
	const CLASS_DEFAULT = 'lib.model.Caresordcom';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDCOM = 'caresordcom.ORDCOM';

	
	const DESRES = 'caresordcom.DESRES';

	
	const CODARTPRO = 'caresordcom.CODARTPRO';

	
	const CANORD = 'caresordcom.CANORD';

	
	const CANAJU = 'caresordcom.CANAJU';

	
	const CANREC = 'caresordcom.CANREC';

	
	const CANTOT = 'caresordcom.CANTOT';

	
	const COSTO = 'caresordcom.COSTO';

	
	const RGOART = 'caresordcom.RGOART';

	
	const TOTART = 'caresordcom.TOTART';

	
	const CODART = 'caresordcom.CODART';

	
	const ID = 'caresordcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom', 'Desres', 'Codartpro', 'Canord', 'Canaju', 'Canrec', 'Cantot', 'Costo', 'Rgoart', 'Totart', 'Codart', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaresordcomPeer::ORDCOM, CaresordcomPeer::DESRES, CaresordcomPeer::CODARTPRO, CaresordcomPeer::CANORD, CaresordcomPeer::CANAJU, CaresordcomPeer::CANREC, CaresordcomPeer::CANTOT, CaresordcomPeer::COSTO, CaresordcomPeer::RGOART, CaresordcomPeer::TOTART, CaresordcomPeer::CODART, CaresordcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom', 'desres', 'codartpro', 'canord', 'canaju', 'canrec', 'cantot', 'costo', 'rgoart', 'totart', 'codart', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Ordcom' => 0, 'Desres' => 1, 'Codartpro' => 2, 'Canord' => 3, 'Canaju' => 4, 'Canrec' => 5, 'Cantot' => 6, 'Costo' => 7, 'Rgoart' => 8, 'Totart' => 9, 'Codart' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CaresordcomPeer::ORDCOM => 0, CaresordcomPeer::DESRES => 1, CaresordcomPeer::CODARTPRO => 2, CaresordcomPeer::CANORD => 3, CaresordcomPeer::CANAJU => 4, CaresordcomPeer::CANREC => 5, CaresordcomPeer::CANTOT => 6, CaresordcomPeer::COSTO => 7, CaresordcomPeer::RGOART => 8, CaresordcomPeer::TOTART => 9, CaresordcomPeer::CODART => 10, CaresordcomPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('ordcom' => 0, 'desres' => 1, 'codartpro' => 2, 'canord' => 3, 'canaju' => 4, 'canrec' => 5, 'cantot' => 6, 'costo' => 7, 'rgoart' => 8, 'totart' => 9, 'codart' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaresordcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaresordcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaresordcomPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(CaresordcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaresordcomPeer::ORDCOM);

		$criteria->addSelectColumn(CaresordcomPeer::DESRES);

		$criteria->addSelectColumn(CaresordcomPeer::CODARTPRO);

		$criteria->addSelectColumn(CaresordcomPeer::CANORD);

		$criteria->addSelectColumn(CaresordcomPeer::CANAJU);

		$criteria->addSelectColumn(CaresordcomPeer::CANREC);

		$criteria->addSelectColumn(CaresordcomPeer::CANTOT);

		$criteria->addSelectColumn(CaresordcomPeer::COSTO);

		$criteria->addSelectColumn(CaresordcomPeer::RGOART);

		$criteria->addSelectColumn(CaresordcomPeer::TOTART);

		$criteria->addSelectColumn(CaresordcomPeer::CODART);

		$criteria->addSelectColumn(CaresordcomPeer::ID);

	}

	const COUNT = 'COUNT(caresordcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caresordcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaresordcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaresordcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaresordcomPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CaresordcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaresordcomPeer::populateObjects(CaresordcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaresordcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaresordcomPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CaresordcomPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(CaresordcomPeer::ID);
			$selectCriteria->add(CaresordcomPeer::ID, $criteria->remove(CaresordcomPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(CaresordcomPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(CaresordcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caresordcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaresordcomPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Caresordcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaresordcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaresordcomPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(CaresordcomPeer::DATABASE_NAME, CaresordcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaresordcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(CaresordcomPeer::DATABASE_NAME);

		$criteria->add(CaresordcomPeer::ID, $pk);


		$v = CaresordcomPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(CaresordcomPeer::ID, $pks, Criteria::IN);
			$objs = CaresordcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaresordcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaresordcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaresordcomMapBuilder');
}
