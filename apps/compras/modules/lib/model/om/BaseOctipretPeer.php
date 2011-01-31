<?php


abstract class BaseOctipretPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'octipret';

	
	const CLASS_DEFAULT = 'lib.model.Octipret';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTIP = 'octipret.CODTIP';

	
	const DESTIP = 'octipret.DESTIP';

	
	const CODCON = 'octipret.CODCON';

	
	const BASIMP = 'octipret.BASIMP';

	
	const PORRET = 'octipret.PORRET';

	
	const UNITRI = 'octipret.UNITRI';

	
	const FACTOR = 'octipret.FACTOR';

	
	const PORSUS = 'octipret.PORSUS';

	
	const STAMON = 'octipret.STAMON';

	
	const ID = 'octipret.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtip', 'Destip', 'Codcon', 'Basimp', 'Porret', 'Unitri', 'Factor', 'Porsus', 'Stamon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OctipretPeer::CODTIP, OctipretPeer::DESTIP, OctipretPeer::CODCON, OctipretPeer::BASIMP, OctipretPeer::PORRET, OctipretPeer::UNITRI, OctipretPeer::FACTOR, OctipretPeer::PORSUS, OctipretPeer::STAMON, OctipretPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtip', 'destip', 'codcon', 'basimp', 'porret', 'unitri', 'factor', 'porsus', 'stamon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtip' => 0, 'Destip' => 1, 'Codcon' => 2, 'Basimp' => 3, 'Porret' => 4, 'Unitri' => 5, 'Factor' => 6, 'Porsus' => 7, 'Stamon' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (OctipretPeer::CODTIP => 0, OctipretPeer::DESTIP => 1, OctipretPeer::CODCON => 2, OctipretPeer::BASIMP => 3, OctipretPeer::PORRET => 4, OctipretPeer::UNITRI => 5, OctipretPeer::FACTOR => 6, OctipretPeer::PORSUS => 7, OctipretPeer::STAMON => 8, OctipretPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codtip' => 0, 'destip' => 1, 'codcon' => 2, 'basimp' => 3, 'porret' => 4, 'unitri' => 5, 'factor' => 6, 'porsus' => 7, 'stamon' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OctipretMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OctipretMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OctipretPeer::getTableMap();
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
		return str_replace(OctipretPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OctipretPeer::CODTIP);

		$criteria->addSelectColumn(OctipretPeer::DESTIP);

		$criteria->addSelectColumn(OctipretPeer::CODCON);

		$criteria->addSelectColumn(OctipretPeer::BASIMP);

		$criteria->addSelectColumn(OctipretPeer::PORRET);

		$criteria->addSelectColumn(OctipretPeer::UNITRI);

		$criteria->addSelectColumn(OctipretPeer::FACTOR);

		$criteria->addSelectColumn(OctipretPeer::PORSUS);

		$criteria->addSelectColumn(OctipretPeer::STAMON);

		$criteria->addSelectColumn(OctipretPeer::ID);

	}

	const COUNT = 'COUNT(octipret.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT octipret.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OctipretPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OctipretPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OctipretPeer::doSelectRS($criteria, $con);
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
		$objects = OctipretPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OctipretPeer::populateObjects(OctipretPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OctipretPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OctipretPeer::getOMClass();
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
		return OctipretPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OctipretPeer::ID); 

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
			$comparison = $criteria->getComparison(OctipretPeer::ID);
			$selectCriteria->add(OctipretPeer::ID, $criteria->remove(OctipretPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OctipretPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OctipretPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Octipret) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OctipretPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Octipret $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OctipretPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OctipretPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OctipretPeer::DATABASE_NAME, OctipretPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OctipretPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OctipretPeer::DATABASE_NAME);

		$criteria->add(OctipretPeer::ID, $pk);


		$v = OctipretPeer::doSelect($criteria, $con);

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
			$criteria->add(OctipretPeer::ID, $pks, Criteria::IN);
			$objs = OctipretPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOctipretPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OctipretMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OctipretMapBuilder');
}
