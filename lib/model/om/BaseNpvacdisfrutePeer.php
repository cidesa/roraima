<?php


abstract class BaseNpvacdisfrutePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacdisfrute';

	
	const CLASS_DEFAULT = 'lib.model.Npvacdisfrute';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npvacdisfrute.CODEMP';

	
	const PERINI = 'npvacdisfrute.PERINI';

	
	const PERFIN = 'npvacdisfrute.PERFIN';

	
	const DIASDISFUTAR = 'npvacdisfrute.DIASDISFUTAR';

	
	const DIASDISFRUTADOS = 'npvacdisfrute.DIASDISFRUTADOS';

	
	const ID = 'npvacdisfrute.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Perini', 'Perfin', 'Diasdisfutar', 'Diasdisfrutados', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacdisfrutePeer::CODEMP, NpvacdisfrutePeer::PERINI, NpvacdisfrutePeer::PERFIN, NpvacdisfrutePeer::DIASDISFUTAR, NpvacdisfrutePeer::DIASDISFRUTADOS, NpvacdisfrutePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'perini', 'perfin', 'diasdisfutar', 'diasdisfrutados', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Perini' => 1, 'Perfin' => 2, 'Diasdisfutar' => 3, 'Diasdisfrutados' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (NpvacdisfrutePeer::CODEMP => 0, NpvacdisfrutePeer::PERINI => 1, NpvacdisfrutePeer::PERFIN => 2, NpvacdisfrutePeer::DIASDISFUTAR => 3, NpvacdisfrutePeer::DIASDISFRUTADOS => 4, NpvacdisfrutePeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'perini' => 1, 'perfin' => 2, 'diasdisfutar' => 3, 'diasdisfrutados' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpvacdisfruteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpvacdisfruteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacdisfrutePeer::getTableMap();
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
		return str_replace(NpvacdisfrutePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacdisfrutePeer::CODEMP);

		$criteria->addSelectColumn(NpvacdisfrutePeer::PERINI);

		$criteria->addSelectColumn(NpvacdisfrutePeer::PERFIN);

		$criteria->addSelectColumn(NpvacdisfrutePeer::DIASDISFUTAR);

		$criteria->addSelectColumn(NpvacdisfrutePeer::DIASDISFRUTADOS);

		$criteria->addSelectColumn(NpvacdisfrutePeer::ID);

	}

	const COUNT = 'COUNT(npvacdisfrute.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacdisfrute.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacdisfrutePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacdisfrutePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacdisfrutePeer::doSelectRS($criteria, $con);
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
		$objects = NpvacdisfrutePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacdisfrutePeer::populateObjects(NpvacdisfrutePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacdisfrutePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacdisfrutePeer::getOMClass();
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
		return NpvacdisfrutePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpvacdisfrutePeer::ID);
			$selectCriteria->add(NpvacdisfrutePeer::ID, $criteria->remove(NpvacdisfrutePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacdisfrutePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacdisfrutePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvacdisfrute) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacdisfrutePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvacdisfrute $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacdisfrutePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacdisfrutePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacdisfrutePeer::DATABASE_NAME, NpvacdisfrutePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacdisfrutePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacdisfrutePeer::DATABASE_NAME);

		$criteria->add(NpvacdisfrutePeer::ID, $pk);


		$v = NpvacdisfrutePeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacdisfrutePeer::ID, $pks, Criteria::IN);
			$objs = NpvacdisfrutePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacdisfrutePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpvacdisfruteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpvacdisfruteMapBuilder');
}
