<?php


abstract class BaseRhdefnivPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'rhdefniv';

	
	const CLASS_DEFAULT = 'lib.model.Rhdefniv';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNIV = 'rhdefniv.CODNIV';

	
	const DESNIV = 'rhdefniv.DESNIV';

	
	const MINPUN = 'rhdefniv.MINPUN';

	
	const MAXPUN = 'rhdefniv.MAXPUN';

	
	const TOTPES = 'rhdefniv.TOTPES';

	
	const CODRAN = 'rhdefniv.CODRAN';

	
	const TIPCAL = 'rhdefniv.TIPCAL';

	
	const ID = 'rhdefniv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codniv', 'Desniv', 'Minpun', 'Maxpun', 'Totpes', 'Codran', 'Tipcal', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RhdefnivPeer::CODNIV, RhdefnivPeer::DESNIV, RhdefnivPeer::MINPUN, RhdefnivPeer::MAXPUN, RhdefnivPeer::TOTPES, RhdefnivPeer::CODRAN, RhdefnivPeer::TIPCAL, RhdefnivPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codniv', 'desniv', 'minpun', 'maxpun', 'totpes', 'codran', 'tipcal', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codniv' => 0, 'Desniv' => 1, 'Minpun' => 2, 'Maxpun' => 3, 'Totpes' => 4, 'Codran' => 5, 'Tipcal' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (RhdefnivPeer::CODNIV => 0, RhdefnivPeer::DESNIV => 1, RhdefnivPeer::MINPUN => 2, RhdefnivPeer::MAXPUN => 3, RhdefnivPeer::TOTPES => 4, RhdefnivPeer::CODRAN => 5, RhdefnivPeer::TIPCAL => 6, RhdefnivPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codniv' => 0, 'desniv' => 1, 'minpun' => 2, 'maxpun' => 3, 'totpes' => 4, 'codran' => 5, 'tipcal' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RhdefnivMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RhdefnivMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RhdefnivPeer::getTableMap();
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
		return str_replace(RhdefnivPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RhdefnivPeer::CODNIV);

		$criteria->addSelectColumn(RhdefnivPeer::DESNIV);

		$criteria->addSelectColumn(RhdefnivPeer::MINPUN);

		$criteria->addSelectColumn(RhdefnivPeer::MAXPUN);

		$criteria->addSelectColumn(RhdefnivPeer::TOTPES);

		$criteria->addSelectColumn(RhdefnivPeer::CODRAN);

		$criteria->addSelectColumn(RhdefnivPeer::TIPCAL);

		$criteria->addSelectColumn(RhdefnivPeer::ID);

	}

	const COUNT = 'COUNT(rhdefniv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT rhdefniv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RhdefnivPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RhdefnivPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RhdefnivPeer::doSelectRS($criteria, $con);
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
		$objects = RhdefnivPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RhdefnivPeer::populateObjects(RhdefnivPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RhdefnivPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RhdefnivPeer::getOMClass();
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
		return RhdefnivPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(RhdefnivPeer::ID); 

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
			$comparison = $criteria->getComparison(RhdefnivPeer::ID);
			$selectCriteria->add(RhdefnivPeer::ID, $criteria->remove(RhdefnivPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RhdefnivPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RhdefnivPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Rhdefniv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RhdefnivPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Rhdefniv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RhdefnivPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RhdefnivPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RhdefnivPeer::DATABASE_NAME, RhdefnivPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RhdefnivPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RhdefnivPeer::DATABASE_NAME);

		$criteria->add(RhdefnivPeer::ID, $pk);


		$v = RhdefnivPeer::doSelect($criteria, $con);

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
			$criteria->add(RhdefnivPeer::ID, $pks, Criteria::IN);
			$objs = RhdefnivPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRhdefnivPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RhdefnivMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RhdefnivMapBuilder');
}
