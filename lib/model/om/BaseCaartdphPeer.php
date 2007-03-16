<?php


abstract class BaseCaartdphPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'caartdph';

	
	const CLASS_DEFAULT = 'lib.model.Caartdph';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DPHART = 'caartdph.DPHART';

	
	const CODART = 'caartdph.CODART';

	
	const CODCAT = 'caartdph.CODCAT';

	
	const CANDPH = 'caartdph.CANDPH';

	
	const CANDEV = 'caartdph.CANDEV';

	
	const CANTOT = 'caartdph.CANTOT';

	
	const MONTOT = 'caartdph.MONTOT';

	
	const NUMLOT = 'caartdph.NUMLOT';

	
	const CANENT = 'caartdph.CANENT';

	
	const CODFAL = 'caartdph.CODFAL';

	
	const ID = 'caartdph.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Dphart', 'Codart', 'Codcat', 'Candph', 'Candev', 'Cantot', 'Montot', 'Numlot', 'Canent', 'Codfal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CaartdphPeer::DPHART, CaartdphPeer::CODART, CaartdphPeer::CODCAT, CaartdphPeer::CANDPH, CaartdphPeer::CANDEV, CaartdphPeer::CANTOT, CaartdphPeer::MONTOT, CaartdphPeer::NUMLOT, CaartdphPeer::CANENT, CaartdphPeer::CODFAL, CaartdphPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('dphart', 'codart', 'codcat', 'candph', 'candev', 'cantot', 'montot', 'numlot', 'canent', 'codfal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Dphart' => 0, 'Codart' => 1, 'Codcat' => 2, 'Candph' => 3, 'Candev' => 4, 'Cantot' => 5, 'Montot' => 6, 'Numlot' => 7, 'Canent' => 8, 'Codfal' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CaartdphPeer::DPHART => 0, CaartdphPeer::CODART => 1, CaartdphPeer::CODCAT => 2, CaartdphPeer::CANDPH => 3, CaartdphPeer::CANDEV => 4, CaartdphPeer::CANTOT => 5, CaartdphPeer::MONTOT => 6, CaartdphPeer::NUMLOT => 7, CaartdphPeer::CANENT => 8, CaartdphPeer::CODFAL => 9, CaartdphPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('dphart' => 0, 'codart' => 1, 'codcat' => 2, 'candph' => 3, 'candev' => 4, 'cantot' => 5, 'montot' => 6, 'numlot' => 7, 'canent' => 8, 'codfal' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CaartdphMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CaartdphMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CaartdphPeer::getTableMap();
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
		return str_replace(CaartdphPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CaartdphPeer::DPHART);

		$criteria->addSelectColumn(CaartdphPeer::CODART);

		$criteria->addSelectColumn(CaartdphPeer::CODCAT);

		$criteria->addSelectColumn(CaartdphPeer::CANDPH);

		$criteria->addSelectColumn(CaartdphPeer::CANDEV);

		$criteria->addSelectColumn(CaartdphPeer::CANTOT);

		$criteria->addSelectColumn(CaartdphPeer::MONTOT);

		$criteria->addSelectColumn(CaartdphPeer::NUMLOT);

		$criteria->addSelectColumn(CaartdphPeer::CANENT);

		$criteria->addSelectColumn(CaartdphPeer::CODFAL);

		$criteria->addSelectColumn(CaartdphPeer::ID);

	}

	const COUNT = 'COUNT(caartdph.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT caartdph.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CaartdphPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CaartdphPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CaartdphPeer::doSelectRS($criteria, $con);
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
		$objects = CaartdphPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CaartdphPeer::populateObjects(CaartdphPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CaartdphPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CaartdphPeer::getOMClass();
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
		return CaartdphPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CaartdphPeer::ID);
			$selectCriteria->add(CaartdphPeer::ID, $criteria->remove(CaartdphPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CaartdphPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CaartdphPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Caartdph) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CaartdphPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Caartdph $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CaartdphPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CaartdphPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CaartdphPeer::DATABASE_NAME, CaartdphPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CaartdphPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CaartdphPeer::DATABASE_NAME);

		$criteria->add(CaartdphPeer::ID, $pk);


		$v = CaartdphPeer::doSelect($criteria, $con);

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
			$criteria->add(CaartdphPeer::ID, $pks, Criteria::IN);
			$objs = CaartdphPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCaartdphPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CaartdphMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CaartdphMapBuilder');
}
