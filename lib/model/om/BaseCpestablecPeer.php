<?php


abstract class BaseCpestablecPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpestablec';

	
	const CLASS_DEFAULT = 'lib.model.Cpestablec';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEST = 'cpestablec.CODEST';

	
	const CODENT = 'cpestablec.CODENT';

	
	const HOSAMB = 'cpestablec.HOSAMB';

	
	const CODCEN = 'cpestablec.CODCEN';

	
	const TIPEST = 'cpestablec.TIPEST';

	
	const DIREST = 'cpestablec.DIREST';

	
	const DESEST = 'cpestablec.DESEST';

	
	const URBRUR = 'cpestablec.URBRUR';

	
	const TIPRUR = 'cpestablec.TIPRUR';

	
	const NROCAM = 'cpestablec.NROCAM';

	
	const ATEFIR = 'cpestablec.ATEFIR';

	
	const ID = 'cpestablec.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codest', 'Codent', 'Hosamb', 'Codcen', 'Tipest', 'Direst', 'Desest', 'Urbrur', 'Tiprur', 'Nrocam', 'Atefir', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpestablecPeer::CODEST, CpestablecPeer::CODENT, CpestablecPeer::HOSAMB, CpestablecPeer::CODCEN, CpestablecPeer::TIPEST, CpestablecPeer::DIREST, CpestablecPeer::DESEST, CpestablecPeer::URBRUR, CpestablecPeer::TIPRUR, CpestablecPeer::NROCAM, CpestablecPeer::ATEFIR, CpestablecPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codest', 'codent', 'hosamb', 'codcen', 'tipest', 'direst', 'desest', 'urbrur', 'tiprur', 'nrocam', 'atefir', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codest' => 0, 'Codent' => 1, 'Hosamb' => 2, 'Codcen' => 3, 'Tipest' => 4, 'Direst' => 5, 'Desest' => 6, 'Urbrur' => 7, 'Tiprur' => 8, 'Nrocam' => 9, 'Atefir' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CpestablecPeer::CODEST => 0, CpestablecPeer::CODENT => 1, CpestablecPeer::HOSAMB => 2, CpestablecPeer::CODCEN => 3, CpestablecPeer::TIPEST => 4, CpestablecPeer::DIREST => 5, CpestablecPeer::DESEST => 6, CpestablecPeer::URBRUR => 7, CpestablecPeer::TIPRUR => 8, CpestablecPeer::NROCAM => 9, CpestablecPeer::ATEFIR => 10, CpestablecPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codest' => 0, 'codent' => 1, 'hosamb' => 2, 'codcen' => 3, 'tipest' => 4, 'direst' => 5, 'desest' => 6, 'urbrur' => 7, 'tiprur' => 8, 'nrocam' => 9, 'atefir' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpestablecMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpestablecMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpestablecPeer::getTableMap();
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
		return str_replace(CpestablecPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpestablecPeer::CODEST);

		$criteria->addSelectColumn(CpestablecPeer::CODENT);

		$criteria->addSelectColumn(CpestablecPeer::HOSAMB);

		$criteria->addSelectColumn(CpestablecPeer::CODCEN);

		$criteria->addSelectColumn(CpestablecPeer::TIPEST);

		$criteria->addSelectColumn(CpestablecPeer::DIREST);

		$criteria->addSelectColumn(CpestablecPeer::DESEST);

		$criteria->addSelectColumn(CpestablecPeer::URBRUR);

		$criteria->addSelectColumn(CpestablecPeer::TIPRUR);

		$criteria->addSelectColumn(CpestablecPeer::NROCAM);

		$criteria->addSelectColumn(CpestablecPeer::ATEFIR);

		$criteria->addSelectColumn(CpestablecPeer::ID);

	}

	const COUNT = 'COUNT(cpestablec.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpestablec.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpestablecPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpestablecPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpestablecPeer::doSelectRS($criteria, $con);
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
		$objects = CpestablecPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpestablecPeer::populateObjects(CpestablecPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpestablecPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpestablecPeer::getOMClass();
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
		return CpestablecPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpestablecPeer::ID);
			$selectCriteria->add(CpestablecPeer::ID, $criteria->remove(CpestablecPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpestablecPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpestablecPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpestablec) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpestablecPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpestablec $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpestablecPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpestablecPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpestablecPeer::DATABASE_NAME, CpestablecPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpestablecPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpestablecPeer::DATABASE_NAME);

		$criteria->add(CpestablecPeer::ID, $pk);


		$v = CpestablecPeer::doSelect($criteria, $con);

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
			$criteria->add(CpestablecPeer::ID, $pks, Criteria::IN);
			$objs = CpestablecPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpestablecPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpestablecMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpestablecMapBuilder');
}
