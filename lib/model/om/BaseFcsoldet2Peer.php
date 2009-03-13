<?php


abstract class BaseFcsoldet2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcsoldet2';

	
	const CLASS_DEFAULT = 'lib.model.Fcsoldet2';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODSOL = 'fcsoldet2.CODSOL';

	
	const CODFUE = 'fcsoldet2.CODFUE';

	
	const NOMFUE = 'fcsoldet2.NOMFUE';

	
	const OBJETO = 'fcsoldet2.OBJETO';

	
	const FECVEN = 'fcsoldet2.FECVEN';

	
	const EDODEC = 'fcsoldet2.EDODEC';

	
	const CONPAG = 'fcsoldet2.CONPAG';

	
	const FECULTPAG = 'fcsoldet2.FECULTPAG';

	
	const ID = 'fcsoldet2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codsol', 'Codfue', 'Nomfue', 'Objeto', 'Fecven', 'Edodec', 'Conpag', 'Fecultpag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcsoldet2Peer::CODSOL, Fcsoldet2Peer::CODFUE, Fcsoldet2Peer::NOMFUE, Fcsoldet2Peer::OBJETO, Fcsoldet2Peer::FECVEN, Fcsoldet2Peer::EDODEC, Fcsoldet2Peer::CONPAG, Fcsoldet2Peer::FECULTPAG, Fcsoldet2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codsol', 'codfue', 'nomfue', 'objeto', 'fecven', 'edodec', 'conpag', 'fecultpag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codsol' => 0, 'Codfue' => 1, 'Nomfue' => 2, 'Objeto' => 3, 'Fecven' => 4, 'Edodec' => 5, 'Conpag' => 6, 'Fecultpag' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Fcsoldet2Peer::CODSOL => 0, Fcsoldet2Peer::CODFUE => 1, Fcsoldet2Peer::NOMFUE => 2, Fcsoldet2Peer::OBJETO => 3, Fcsoldet2Peer::FECVEN => 4, Fcsoldet2Peer::EDODEC => 5, Fcsoldet2Peer::CONPAG => 6, Fcsoldet2Peer::FECULTPAG => 7, Fcsoldet2Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codsol' => 0, 'codfue' => 1, 'nomfue' => 2, 'objeto' => 3, 'fecven' => 4, 'edodec' => 5, 'conpag' => 6, 'fecultpag' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcsoldet2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcsoldet2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcsoldet2Peer::getTableMap();
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
		return str_replace(Fcsoldet2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcsoldet2Peer::CODSOL);

		$criteria->addSelectColumn(Fcsoldet2Peer::CODFUE);

		$criteria->addSelectColumn(Fcsoldet2Peer::NOMFUE);

		$criteria->addSelectColumn(Fcsoldet2Peer::OBJETO);

		$criteria->addSelectColumn(Fcsoldet2Peer::FECVEN);

		$criteria->addSelectColumn(Fcsoldet2Peer::EDODEC);

		$criteria->addSelectColumn(Fcsoldet2Peer::CONPAG);

		$criteria->addSelectColumn(Fcsoldet2Peer::FECULTPAG);

		$criteria->addSelectColumn(Fcsoldet2Peer::ID);

	}

	const COUNT = 'COUNT(fcsoldet2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcsoldet2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcsoldet2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcsoldet2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcsoldet2Peer::doSelectRS($criteria, $con);
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
		$objects = Fcsoldet2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcsoldet2Peer::populateObjects(Fcsoldet2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcsoldet2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcsoldet2Peer::getOMClass();
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
		return Fcsoldet2Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcsoldet2Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcsoldet2Peer::ID);
			$selectCriteria->add(Fcsoldet2Peer::ID, $criteria->remove(Fcsoldet2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcsoldet2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcsoldet2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcsoldet2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcsoldet2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcsoldet2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcsoldet2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcsoldet2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcsoldet2Peer::DATABASE_NAME, Fcsoldet2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcsoldet2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcsoldet2Peer::DATABASE_NAME);

		$criteria->add(Fcsoldet2Peer::ID, $pk);


		$v = Fcsoldet2Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcsoldet2Peer::ID, $pks, Criteria::IN);
			$objs = Fcsoldet2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcsoldet2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcsoldet2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcsoldet2MapBuilder');
}
