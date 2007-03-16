<?php


abstract class BaseFacontctePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'facontcte';

	
	const CLASS_DEFAULT = 'lib.model.Facontcte';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCLI = 'facontcte.CODCLI';

	
	const CODCONT = 'facontcte.CODCONT';

	
	const CORRCON = 'facontcte.CORRCON';

	
	const NOMCONT = 'facontcte.NOMCONT';

	
	const CARCONT = 'facontcte.CARCONT';

	
	const CELCONT = 'facontcte.CELCONT';

	
	const TF1CONT = 'facontcte.TF1CONT';

	
	const TF2CONT = 'facontcte.TF2CONT';

	
	const ID = 'facontcte.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcli', 'Codcont', 'Corrcon', 'Nomcont', 'Carcont', 'Celcont', 'Tf1cont', 'Tf2cont', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FacontctePeer::CODCLI, FacontctePeer::CODCONT, FacontctePeer::CORRCON, FacontctePeer::NOMCONT, FacontctePeer::CARCONT, FacontctePeer::CELCONT, FacontctePeer::TF1CONT, FacontctePeer::TF2CONT, FacontctePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcli', 'codcont', 'corrcon', 'nomcont', 'carcont', 'celcont', 'tf1cont', 'tf2cont', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcli' => 0, 'Codcont' => 1, 'Corrcon' => 2, 'Nomcont' => 3, 'Carcont' => 4, 'Celcont' => 5, 'Tf1cont' => 6, 'Tf2cont' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (FacontctePeer::CODCLI => 0, FacontctePeer::CODCONT => 1, FacontctePeer::CORRCON => 2, FacontctePeer::NOMCONT => 3, FacontctePeer::CARCONT => 4, FacontctePeer::CELCONT => 5, FacontctePeer::TF1CONT => 6, FacontctePeer::TF2CONT => 7, FacontctePeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codcli' => 0, 'codcont' => 1, 'corrcon' => 2, 'nomcont' => 3, 'carcont' => 4, 'celcont' => 5, 'tf1cont' => 6, 'tf2cont' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FacontcteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FacontcteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FacontctePeer::getTableMap();
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
		return str_replace(FacontctePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FacontctePeer::CODCLI);

		$criteria->addSelectColumn(FacontctePeer::CODCONT);

		$criteria->addSelectColumn(FacontctePeer::CORRCON);

		$criteria->addSelectColumn(FacontctePeer::NOMCONT);

		$criteria->addSelectColumn(FacontctePeer::CARCONT);

		$criteria->addSelectColumn(FacontctePeer::CELCONT);

		$criteria->addSelectColumn(FacontctePeer::TF1CONT);

		$criteria->addSelectColumn(FacontctePeer::TF2CONT);

		$criteria->addSelectColumn(FacontctePeer::ID);

	}

	const COUNT = 'COUNT(facontcte.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT facontcte.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FacontctePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FacontctePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FacontctePeer::doSelectRS($criteria, $con);
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
		$objects = FacontctePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FacontctePeer::populateObjects(FacontctePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FacontctePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FacontctePeer::getOMClass();
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
		return FacontctePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FacontctePeer::ID);
			$selectCriteria->add(FacontctePeer::ID, $criteria->remove(FacontctePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FacontctePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FacontctePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Facontcte) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FacontctePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Facontcte $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FacontctePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FacontctePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FacontctePeer::DATABASE_NAME, FacontctePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FacontctePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FacontctePeer::DATABASE_NAME);

		$criteria->add(FacontctePeer::ID, $pk);


		$v = FacontctePeer::doSelect($criteria, $con);

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
			$criteria->add(FacontctePeer::ID, $pks, Criteria::IN);
			$objs = FacontctePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFacontctePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FacontcteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FacontcteMapBuilder');
}
