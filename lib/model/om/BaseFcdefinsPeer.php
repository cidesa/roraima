<?php


abstract class BaseFcdefinsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdefins';

	
	const CLASS_DEFAULT = 'lib.model.Fcdefins';

	
	const NUM_COLUMNS = 30;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'fcdefins.CODEMP';

	
	const LONCODACT = 'fcdefins.LONCODACT';

	
	const LONCODVEH = 'fcdefins.LONCODVEH';

	
	const LONCODCAT = 'fcdefins.LONCODCAT';

	
	const LONCODUBIFIS = 'fcdefins.LONCODUBIFIS';

	
	const LONCODUBIMAG = 'fcdefins.LONCODUBIMAG';

	
	const RUPACT = 'fcdefins.RUPACT';

	
	const RUPVEH = 'fcdefins.RUPVEH';

	
	const RUPCAT = 'fcdefins.RUPCAT';

	
	const RUPUBIFIS = 'fcdefins.RUPUBIFIS';

	
	const RUPUBIMAG = 'fcdefins.RUPUBIMAG';

	
	const FORACT = 'fcdefins.FORACT';

	
	const FORVEH = 'fcdefins.FORVEH';

	
	const FORCAT = 'fcdefins.FORCAT';

	
	const FORUBIFIS = 'fcdefins.FORUBIFIS';

	
	const FORUBIMAG = 'fcdefins.FORUBIMAG';

	
	const PORPIC = 'fcdefins.PORPIC';

	
	const PORVEH = 'fcdefins.PORVEH';

	
	const PORINM = 'fcdefins.PORINM';

	
	const UNIPIC = 'fcdefins.UNIPIC';

	
	const VALUNITRI = 'fcdefins.VALUNITRI';

	
	const UNITAS = 'fcdefins.UNITAS';

	
	const CODPIC = 'fcdefins.CODPIC';

	
	const CODVEH = 'fcdefins.CODVEH';

	
	const CODINM = 'fcdefins.CODINM';

	
	const CODPRO = 'fcdefins.CODPRO';

	
	const CODESP = 'fcdefins.CODESP';

	
	const CODAPU = 'fcdefins.CODAPU';

	
	const CODAJUPIC = 'fcdefins.CODAJUPIC';

	
	const ID = 'fcdefins.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Loncodact', 'Loncodveh', 'Loncodcat', 'Loncodubifis', 'Loncodubimag', 'Rupact', 'Rupveh', 'Rupcat', 'Rupubifis', 'Rupubimag', 'Foract', 'Forveh', 'Forcat', 'Forubifis', 'Forubimag', 'Porpic', 'Porveh', 'Porinm', 'Unipic', 'Valunitri', 'Unitas', 'Codpic', 'Codveh', 'Codinm', 'Codpro', 'Codesp', 'Codapu', 'Codajupic', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdefinsPeer::CODEMP, FcdefinsPeer::LONCODACT, FcdefinsPeer::LONCODVEH, FcdefinsPeer::LONCODCAT, FcdefinsPeer::LONCODUBIFIS, FcdefinsPeer::LONCODUBIMAG, FcdefinsPeer::RUPACT, FcdefinsPeer::RUPVEH, FcdefinsPeer::RUPCAT, FcdefinsPeer::RUPUBIFIS, FcdefinsPeer::RUPUBIMAG, FcdefinsPeer::FORACT, FcdefinsPeer::FORVEH, FcdefinsPeer::FORCAT, FcdefinsPeer::FORUBIFIS, FcdefinsPeer::FORUBIMAG, FcdefinsPeer::PORPIC, FcdefinsPeer::PORVEH, FcdefinsPeer::PORINM, FcdefinsPeer::UNIPIC, FcdefinsPeer::VALUNITRI, FcdefinsPeer::UNITAS, FcdefinsPeer::CODPIC, FcdefinsPeer::CODVEH, FcdefinsPeer::CODINM, FcdefinsPeer::CODPRO, FcdefinsPeer::CODESP, FcdefinsPeer::CODAPU, FcdefinsPeer::CODAJUPIC, FcdefinsPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'loncodact', 'loncodveh', 'loncodcat', 'loncodubifis', 'loncodubimag', 'rupact', 'rupveh', 'rupcat', 'rupubifis', 'rupubimag', 'foract', 'forveh', 'forcat', 'forubifis', 'forubimag', 'porpic', 'porveh', 'porinm', 'unipic', 'valunitri', 'unitas', 'codpic', 'codveh', 'codinm', 'codpro', 'codesp', 'codapu', 'codajupic', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Loncodact' => 1, 'Loncodveh' => 2, 'Loncodcat' => 3, 'Loncodubifis' => 4, 'Loncodubimag' => 5, 'Rupact' => 6, 'Rupveh' => 7, 'Rupcat' => 8, 'Rupubifis' => 9, 'Rupubimag' => 10, 'Foract' => 11, 'Forveh' => 12, 'Forcat' => 13, 'Forubifis' => 14, 'Forubimag' => 15, 'Porpic' => 16, 'Porveh' => 17, 'Porinm' => 18, 'Unipic' => 19, 'Valunitri' => 20, 'Unitas' => 21, 'Codpic' => 22, 'Codveh' => 23, 'Codinm' => 24, 'Codpro' => 25, 'Codesp' => 26, 'Codapu' => 27, 'Codajupic' => 28, 'Id' => 29, ),
		BasePeer::TYPE_COLNAME => array (FcdefinsPeer::CODEMP => 0, FcdefinsPeer::LONCODACT => 1, FcdefinsPeer::LONCODVEH => 2, FcdefinsPeer::LONCODCAT => 3, FcdefinsPeer::LONCODUBIFIS => 4, FcdefinsPeer::LONCODUBIMAG => 5, FcdefinsPeer::RUPACT => 6, FcdefinsPeer::RUPVEH => 7, FcdefinsPeer::RUPCAT => 8, FcdefinsPeer::RUPUBIFIS => 9, FcdefinsPeer::RUPUBIMAG => 10, FcdefinsPeer::FORACT => 11, FcdefinsPeer::FORVEH => 12, FcdefinsPeer::FORCAT => 13, FcdefinsPeer::FORUBIFIS => 14, FcdefinsPeer::FORUBIMAG => 15, FcdefinsPeer::PORPIC => 16, FcdefinsPeer::PORVEH => 17, FcdefinsPeer::PORINM => 18, FcdefinsPeer::UNIPIC => 19, FcdefinsPeer::VALUNITRI => 20, FcdefinsPeer::UNITAS => 21, FcdefinsPeer::CODPIC => 22, FcdefinsPeer::CODVEH => 23, FcdefinsPeer::CODINM => 24, FcdefinsPeer::CODPRO => 25, FcdefinsPeer::CODESP => 26, FcdefinsPeer::CODAPU => 27, FcdefinsPeer::CODAJUPIC => 28, FcdefinsPeer::ID => 29, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'loncodact' => 1, 'loncodveh' => 2, 'loncodcat' => 3, 'loncodubifis' => 4, 'loncodubimag' => 5, 'rupact' => 6, 'rupveh' => 7, 'rupcat' => 8, 'rupubifis' => 9, 'rupubimag' => 10, 'foract' => 11, 'forveh' => 12, 'forcat' => 13, 'forubifis' => 14, 'forubimag' => 15, 'porpic' => 16, 'porveh' => 17, 'porinm' => 18, 'unipic' => 19, 'valunitri' => 20, 'unitas' => 21, 'codpic' => 22, 'codveh' => 23, 'codinm' => 24, 'codpro' => 25, 'codesp' => 26, 'codapu' => 27, 'codajupic' => 28, 'id' => 29, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcdefinsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcdefinsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdefinsPeer::getTableMap();
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
		return str_replace(FcdefinsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdefinsPeer::CODEMP);

		$criteria->addSelectColumn(FcdefinsPeer::LONCODACT);

		$criteria->addSelectColumn(FcdefinsPeer::LONCODVEH);

		$criteria->addSelectColumn(FcdefinsPeer::LONCODCAT);

		$criteria->addSelectColumn(FcdefinsPeer::LONCODUBIFIS);

		$criteria->addSelectColumn(FcdefinsPeer::LONCODUBIMAG);

		$criteria->addSelectColumn(FcdefinsPeer::RUPACT);

		$criteria->addSelectColumn(FcdefinsPeer::RUPVEH);

		$criteria->addSelectColumn(FcdefinsPeer::RUPCAT);

		$criteria->addSelectColumn(FcdefinsPeer::RUPUBIFIS);

		$criteria->addSelectColumn(FcdefinsPeer::RUPUBIMAG);

		$criteria->addSelectColumn(FcdefinsPeer::FORACT);

		$criteria->addSelectColumn(FcdefinsPeer::FORVEH);

		$criteria->addSelectColumn(FcdefinsPeer::FORCAT);

		$criteria->addSelectColumn(FcdefinsPeer::FORUBIFIS);

		$criteria->addSelectColumn(FcdefinsPeer::FORUBIMAG);

		$criteria->addSelectColumn(FcdefinsPeer::PORPIC);

		$criteria->addSelectColumn(FcdefinsPeer::PORVEH);

		$criteria->addSelectColumn(FcdefinsPeer::PORINM);

		$criteria->addSelectColumn(FcdefinsPeer::UNIPIC);

		$criteria->addSelectColumn(FcdefinsPeer::VALUNITRI);

		$criteria->addSelectColumn(FcdefinsPeer::UNITAS);

		$criteria->addSelectColumn(FcdefinsPeer::CODPIC);

		$criteria->addSelectColumn(FcdefinsPeer::CODVEH);

		$criteria->addSelectColumn(FcdefinsPeer::CODINM);

		$criteria->addSelectColumn(FcdefinsPeer::CODPRO);

		$criteria->addSelectColumn(FcdefinsPeer::CODESP);

		$criteria->addSelectColumn(FcdefinsPeer::CODAPU);

		$criteria->addSelectColumn(FcdefinsPeer::CODAJUPIC);

		$criteria->addSelectColumn(FcdefinsPeer::ID);

	}

	const COUNT = 'COUNT(fcdefins.CODEMP)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdefins.CODEMP)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdefinsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdefinsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdefinsPeer::doSelectRS($criteria, $con);
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
		$objects = FcdefinsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdefinsPeer::populateObjects(FcdefinsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdefinsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdefinsPeer::getOMClass();
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
		return FcdefinsPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcdefinsPeer::CODEMP);
			$selectCriteria->add(FcdefinsPeer::CODEMP, $criteria->remove(FcdefinsPeer::CODEMP), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdefinsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdefinsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdefins) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdefinsPeer::CODEMP, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdefins $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdefinsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdefinsPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdefinsPeer::DATABASE_NAME, FcdefinsPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdefinsPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdefinsPeer::DATABASE_NAME);

		$criteria->add(FcdefinsPeer::CODEMP, $pk);


		$v = FcdefinsPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdefinsPeer::CODEMP, $pks, Criteria::IN);
			$objs = FcdefinsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdefinsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcdefinsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcdefinsMapBuilder');
}
