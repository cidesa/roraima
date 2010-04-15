<?php


abstract class BaseFcdetconfuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdetconfue';

	
	const CLASS_DEFAULT = 'lib.model.Fcdetconfue';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCON = 'fcdetconfue.REFCON';

	
	const NUMDEC = 'fcdetconfue.NUMDEC';

	
	const MONCUO = 'fcdetconfue.MONCUO';

	
	const NUMCUO = 'fcdetconfue.NUMCUO';

	
	const MONPAG = 'fcdetconfue.MONPAG';

	
	const OBSCUO = 'fcdetconfue.OBSCUO';

	
	const FECVEN = 'fcdetconfue.FECVEN';

	
	const FUENTE = 'fcdetconfue.FUENTE';

	
	const ID = 'fcdetconfue.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcon', 'Numdec', 'Moncuo', 'Numcuo', 'Monpag', 'Obscuo', 'Fecven', 'Fuente', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdetconfuePeer::REFCON, FcdetconfuePeer::NUMDEC, FcdetconfuePeer::MONCUO, FcdetconfuePeer::NUMCUO, FcdetconfuePeer::MONPAG, FcdetconfuePeer::OBSCUO, FcdetconfuePeer::FECVEN, FcdetconfuePeer::FUENTE, FcdetconfuePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcon', 'numdec', 'moncuo', 'numcuo', 'monpag', 'obscuo', 'fecven', 'fuente', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcon' => 0, 'Numdec' => 1, 'Moncuo' => 2, 'Numcuo' => 3, 'Monpag' => 4, 'Obscuo' => 5, 'Fecven' => 6, 'Fuente' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FcdetconfuePeer::REFCON => 0, FcdetconfuePeer::NUMDEC => 1, FcdetconfuePeer::MONCUO => 2, FcdetconfuePeer::NUMCUO => 3, FcdetconfuePeer::MONPAG => 4, FcdetconfuePeer::OBSCUO => 5, FcdetconfuePeer::FECVEN => 6, FcdetconfuePeer::FUENTE => 7, FcdetconfuePeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcon' => 0, 'numdec' => 1, 'moncuo' => 2, 'numcuo' => 3, 'monpag' => 4, 'obscuo' => 5, 'fecven' => 6, 'fuente' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcdetconfueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcdetconfueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdetconfuePeer::getTableMap();
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
		return str_replace(FcdetconfuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdetconfuePeer::REFCON);

		$criteria->addSelectColumn(FcdetconfuePeer::NUMDEC);

		$criteria->addSelectColumn(FcdetconfuePeer::MONCUO);

		$criteria->addSelectColumn(FcdetconfuePeer::NUMCUO);

		$criteria->addSelectColumn(FcdetconfuePeer::MONPAG);

		$criteria->addSelectColumn(FcdetconfuePeer::OBSCUO);

		$criteria->addSelectColumn(FcdetconfuePeer::FECVEN);

		$criteria->addSelectColumn(FcdetconfuePeer::FUENTE);

		$criteria->addSelectColumn(FcdetconfuePeer::ID);

	}

	const COUNT = 'COUNT(fcdetconfue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdetconfue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdetconfuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdetconfuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdetconfuePeer::doSelectRS($criteria, $con);
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
		$objects = FcdetconfuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdetconfuePeer::populateObjects(FcdetconfuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdetconfuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdetconfuePeer::getOMClass();
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
		return FcdetconfuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcdetconfuePeer::ID); 

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
			$comparison = $criteria->getComparison(FcdetconfuePeer::ID);
			$selectCriteria->add(FcdetconfuePeer::ID, $criteria->remove(FcdetconfuePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdetconfuePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdetconfuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdetconfue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdetconfuePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdetconfue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdetconfuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdetconfuePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdetconfuePeer::DATABASE_NAME, FcdetconfuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdetconfuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdetconfuePeer::DATABASE_NAME);

		$criteria->add(FcdetconfuePeer::ID, $pk);


		$v = FcdetconfuePeer::doSelect($criteria, $con);

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
			$criteria->add(FcdetconfuePeer::ID, $pks, Criteria::IN);
			$objs = FcdetconfuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdetconfuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcdetconfueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcdetconfueMapBuilder');
}
