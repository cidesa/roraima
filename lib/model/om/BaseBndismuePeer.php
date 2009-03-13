<?php


abstract class BaseBndismuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndismue';

	
	const CLASS_DEFAULT = 'lib.model.Bndismue';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bndismue.CODACT';

	
	const CODMUE = 'bndismue.CODMUE';

	
	const NRODISMUE = 'bndismue.NRODISMUE';

	
	const MOTDISMUE = 'bndismue.MOTDISMUE';

	
	const TIPDISMUE = 'bndismue.TIPDISMUE';

	
	const FECDISMUE = 'bndismue.FECDISMUE';

	
	const FECDEVDIS = 'bndismue.FECDEVDIS';

	
	const MONDISMUE = 'bndismue.MONDISMUE';

	
	const DETDISMUE = 'bndismue.DETDISMUE';

	
	const CODUBIORI = 'bndismue.CODUBIORI';

	
	const CODUBIDES = 'bndismue.CODUBIDES';

	
	const OBSDISMUE = 'bndismue.OBSDISMUE';

	
	const STADISMUE = 'bndismue.STADISMUE';

	
	const CODMOT = 'bndismue.CODMOT';

	
	const VIDUTIL = 'bndismue.VIDUTIL';

	
	const ID = 'bndismue.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Nrodismue', 'Motdismue', 'Tipdismue', 'Fecdismue', 'Fecdevdis', 'Mondismue', 'Detdismue', 'Codubiori', 'Codubides', 'Obsdismue', 'Stadismue', 'Codmot', 'Vidutil', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndismuePeer::CODACT, BndismuePeer::CODMUE, BndismuePeer::NRODISMUE, BndismuePeer::MOTDISMUE, BndismuePeer::TIPDISMUE, BndismuePeer::FECDISMUE, BndismuePeer::FECDEVDIS, BndismuePeer::MONDISMUE, BndismuePeer::DETDISMUE, BndismuePeer::CODUBIORI, BndismuePeer::CODUBIDES, BndismuePeer::OBSDISMUE, BndismuePeer::STADISMUE, BndismuePeer::CODMOT, BndismuePeer::VIDUTIL, BndismuePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'nrodismue', 'motdismue', 'tipdismue', 'fecdismue', 'fecdevdis', 'mondismue', 'detdismue', 'codubiori', 'codubides', 'obsdismue', 'stadismue', 'codmot', 'vidutil', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Nrodismue' => 2, 'Motdismue' => 3, 'Tipdismue' => 4, 'Fecdismue' => 5, 'Fecdevdis' => 6, 'Mondismue' => 7, 'Detdismue' => 8, 'Codubiori' => 9, 'Codubides' => 10, 'Obsdismue' => 11, 'Stadismue' => 12, 'Codmot' => 13, 'Vidutil' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (BndismuePeer::CODACT => 0, BndismuePeer::CODMUE => 1, BndismuePeer::NRODISMUE => 2, BndismuePeer::MOTDISMUE => 3, BndismuePeer::TIPDISMUE => 4, BndismuePeer::FECDISMUE => 5, BndismuePeer::FECDEVDIS => 6, BndismuePeer::MONDISMUE => 7, BndismuePeer::DETDISMUE => 8, BndismuePeer::CODUBIORI => 9, BndismuePeer::CODUBIDES => 10, BndismuePeer::OBSDISMUE => 11, BndismuePeer::STADISMUE => 12, BndismuePeer::CODMOT => 13, BndismuePeer::VIDUTIL => 14, BndismuePeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'nrodismue' => 2, 'motdismue' => 3, 'tipdismue' => 4, 'fecdismue' => 5, 'fecdevdis' => 6, 'mondismue' => 7, 'detdismue' => 8, 'codubiori' => 9, 'codubides' => 10, 'obsdismue' => 11, 'stadismue' => 12, 'codmot' => 13, 'vidutil' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndismueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndismueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndismuePeer::getTableMap();
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
		return str_replace(BndismuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndismuePeer::CODACT);

		$criteria->addSelectColumn(BndismuePeer::CODMUE);

		$criteria->addSelectColumn(BndismuePeer::NRODISMUE);

		$criteria->addSelectColumn(BndismuePeer::MOTDISMUE);

		$criteria->addSelectColumn(BndismuePeer::TIPDISMUE);

		$criteria->addSelectColumn(BndismuePeer::FECDISMUE);

		$criteria->addSelectColumn(BndismuePeer::FECDEVDIS);

		$criteria->addSelectColumn(BndismuePeer::MONDISMUE);

		$criteria->addSelectColumn(BndismuePeer::DETDISMUE);

		$criteria->addSelectColumn(BndismuePeer::CODUBIORI);

		$criteria->addSelectColumn(BndismuePeer::CODUBIDES);

		$criteria->addSelectColumn(BndismuePeer::OBSDISMUE);

		$criteria->addSelectColumn(BndismuePeer::STADISMUE);

		$criteria->addSelectColumn(BndismuePeer::CODMOT);

		$criteria->addSelectColumn(BndismuePeer::VIDUTIL);

		$criteria->addSelectColumn(BndismuePeer::ID);

	}

	const COUNT = 'COUNT(bndismue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndismue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndismuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndismuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndismuePeer::doSelectRS($criteria, $con);
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
		$objects = BndismuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndismuePeer::populateObjects(BndismuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndismuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndismuePeer::getOMClass();
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
		return BndismuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BndismuePeer::ID); 

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
			$comparison = $criteria->getComparison(BndismuePeer::ID);
			$selectCriteria->add(BndismuePeer::ID, $criteria->remove(BndismuePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndismuePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndismuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndismue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndismuePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bndismue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndismuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndismuePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndismuePeer::DATABASE_NAME, BndismuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndismuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndismuePeer::DATABASE_NAME);

		$criteria->add(BndismuePeer::ID, $pk);


		$v = BndismuePeer::doSelect($criteria, $con);

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
			$criteria->add(BndismuePeer::ID, $pks, Criteria::IN);
			$objs = BndismuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndismuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndismueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndismueMapBuilder');
}
