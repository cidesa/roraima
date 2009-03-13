<?php


abstract class BaseRhdefcurPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rhdefcur';

	
	const CLASS_DEFAULT = 'lib.model.Rhdefcur';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCUR = 'rhdefcur.CODCUR';

	
	const DESCUR = 'rhdefcur.DESCUR';

	
	const CODTIPCUR = 'rhdefcur.CODTIPCUR';

	
	const CODPRO = 'rhdefcur.CODPRO';

	
	const FECINI = 'rhdefcur.FECINI';

	
	const FECFIN = 'rhdefcur.FECFIN';

	
	const NOTAPR = 'rhdefcur.NOTAPR';

	
	const DURCUR = 'rhdefcur.DURCUR';

	
	const CODTIT = 'rhdefcur.CODTIT';

	
	const TURCUR = 'rhdefcur.TURCUR';

	
	const ID = 'rhdefcur.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcur', 'Descur', 'Codtipcur', 'Codpro', 'Fecini', 'Fecfin', 'Notapr', 'Durcur', 'Codtit', 'Turcur', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RhdefcurPeer::CODCUR, RhdefcurPeer::DESCUR, RhdefcurPeer::CODTIPCUR, RhdefcurPeer::CODPRO, RhdefcurPeer::FECINI, RhdefcurPeer::FECFIN, RhdefcurPeer::NOTAPR, RhdefcurPeer::DURCUR, RhdefcurPeer::CODTIT, RhdefcurPeer::TURCUR, RhdefcurPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcur', 'descur', 'codtipcur', 'codpro', 'fecini', 'fecfin', 'notapr', 'durcur', 'codtit', 'turcur', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcur' => 0, 'Descur' => 1, 'Codtipcur' => 2, 'Codpro' => 3, 'Fecini' => 4, 'Fecfin' => 5, 'Notapr' => 6, 'Durcur' => 7, 'Codtit' => 8, 'Turcur' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (RhdefcurPeer::CODCUR => 0, RhdefcurPeer::DESCUR => 1, RhdefcurPeer::CODTIPCUR => 2, RhdefcurPeer::CODPRO => 3, RhdefcurPeer::FECINI => 4, RhdefcurPeer::FECFIN => 5, RhdefcurPeer::NOTAPR => 6, RhdefcurPeer::DURCUR => 7, RhdefcurPeer::CODTIT => 8, RhdefcurPeer::TURCUR => 9, RhdefcurPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codcur' => 0, 'descur' => 1, 'codtipcur' => 2, 'codpro' => 3, 'fecini' => 4, 'fecfin' => 5, 'notapr' => 6, 'durcur' => 7, 'codtit' => 8, 'turcur' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RhdefcurMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RhdefcurMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RhdefcurPeer::getTableMap();
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
		return str_replace(RhdefcurPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RhdefcurPeer::CODCUR);

		$criteria->addSelectColumn(RhdefcurPeer::DESCUR);

		$criteria->addSelectColumn(RhdefcurPeer::CODTIPCUR);

		$criteria->addSelectColumn(RhdefcurPeer::CODPRO);

		$criteria->addSelectColumn(RhdefcurPeer::FECINI);

		$criteria->addSelectColumn(RhdefcurPeer::FECFIN);

		$criteria->addSelectColumn(RhdefcurPeer::NOTAPR);

		$criteria->addSelectColumn(RhdefcurPeer::DURCUR);

		$criteria->addSelectColumn(RhdefcurPeer::CODTIT);

		$criteria->addSelectColumn(RhdefcurPeer::TURCUR);

		$criteria->addSelectColumn(RhdefcurPeer::ID);

	}

	const COUNT = 'COUNT(rhdefcur.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rhdefcur.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RhdefcurPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RhdefcurPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RhdefcurPeer::doSelectRS($criteria, $con);
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
		$objects = RhdefcurPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RhdefcurPeer::populateObjects(RhdefcurPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RhdefcurPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RhdefcurPeer::getOMClass();
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
		return RhdefcurPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RhdefcurPeer::ID); 

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
			$comparison = $criteria->getComparison(RhdefcurPeer::ID);
			$selectCriteria->add(RhdefcurPeer::ID, $criteria->remove(RhdefcurPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RhdefcurPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RhdefcurPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Rhdefcur) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RhdefcurPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Rhdefcur $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RhdefcurPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RhdefcurPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RhdefcurPeer::DATABASE_NAME, RhdefcurPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RhdefcurPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RhdefcurPeer::DATABASE_NAME);

		$criteria->add(RhdefcurPeer::ID, $pk);


		$v = RhdefcurPeer::doSelect($criteria, $con);

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
			$criteria->add(RhdefcurPeer::ID, $pks, Criteria::IN);
			$objs = RhdefcurPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRhdefcurPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RhdefcurMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RhdefcurMapBuilder');
}
