<?php


abstract class BaseDfatendocPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dfatendoc';

	
	const CLASS_DEFAULT = 'lib.model.Dfatendoc';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODDOC = 'dfatendoc.CODDOC';

	
	const DESDOC = 'dfatendoc.DESDOC';

	
	const MONDOC = 'dfatendoc.MONDOC';

	
	const FECDOC = 'dfatendoc.FECDOC';

	
	const STAATE = 'dfatendoc.STAATE';

	
	const ANUATE = 'dfatendoc.ANUATE';

	
	const ESTADO = 'dfatendoc.ESTADO';

	
	const ID_DFTABTIP = 'dfatendoc.ID_DFTABTIP';

	
	const INFDOC1 = 'dfatendoc.INFDOC1';

	
	const INFDOC2 = 'dfatendoc.INFDOC2';

	
	const INFDOC3 = 'dfatendoc.INFDOC3';

	
	const INFDOC4 = 'dfatendoc.INFDOC4';

	
	const ID = 'dfatendoc.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coddoc', 'Desdoc', 'Mondoc', 'Fecdoc', 'Staate', 'Anuate', 'Estado', 'IdDftabtip', 'Infdoc1', 'Infdoc2', 'Infdoc3', 'Infdoc4', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DfatendocPeer::CODDOC, DfatendocPeer::DESDOC, DfatendocPeer::MONDOC, DfatendocPeer::FECDOC, DfatendocPeer::STAATE, DfatendocPeer::ANUATE, DfatendocPeer::ESTADO, DfatendocPeer::ID_DFTABTIP, DfatendocPeer::INFDOC1, DfatendocPeer::INFDOC2, DfatendocPeer::INFDOC3, DfatendocPeer::INFDOC4, DfatendocPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coddoc', 'desdoc', 'mondoc', 'fecdoc', 'staate', 'anuate', 'estado', 'id_dftabtip', 'infdoc1', 'infdoc2', 'infdoc3', 'infdoc4', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coddoc' => 0, 'Desdoc' => 1, 'Mondoc' => 2, 'Fecdoc' => 3, 'Staate' => 4, 'Anuate' => 5, 'Estado' => 6, 'IdDftabtip' => 7, 'Infdoc1' => 8, 'Infdoc2' => 9, 'Infdoc3' => 10, 'Infdoc4' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (DfatendocPeer::CODDOC => 0, DfatendocPeer::DESDOC => 1, DfatendocPeer::MONDOC => 2, DfatendocPeer::FECDOC => 3, DfatendocPeer::STAATE => 4, DfatendocPeer::ANUATE => 5, DfatendocPeer::ESTADO => 6, DfatendocPeer::ID_DFTABTIP => 7, DfatendocPeer::INFDOC1 => 8, DfatendocPeer::INFDOC2 => 9, DfatendocPeer::INFDOC3 => 10, DfatendocPeer::INFDOC4 => 11, DfatendocPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('coddoc' => 0, 'desdoc' => 1, 'mondoc' => 2, 'fecdoc' => 3, 'staate' => 4, 'anuate' => 5, 'estado' => 6, 'id_dftabtip' => 7, 'infdoc1' => 8, 'infdoc2' => 9, 'infdoc3' => 10, 'infdoc4' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DfatendocMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DfatendocMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DfatendocPeer::getTableMap();
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
		return str_replace(DfatendocPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DfatendocPeer::CODDOC);

		$criteria->addSelectColumn(DfatendocPeer::DESDOC);

		$criteria->addSelectColumn(DfatendocPeer::MONDOC);

		$criteria->addSelectColumn(DfatendocPeer::FECDOC);

		$criteria->addSelectColumn(DfatendocPeer::STAATE);

		$criteria->addSelectColumn(DfatendocPeer::ANUATE);

		$criteria->addSelectColumn(DfatendocPeer::ESTADO);

		$criteria->addSelectColumn(DfatendocPeer::ID_DFTABTIP);

		$criteria->addSelectColumn(DfatendocPeer::INFDOC1);

		$criteria->addSelectColumn(DfatendocPeer::INFDOC2);

		$criteria->addSelectColumn(DfatendocPeer::INFDOC3);

		$criteria->addSelectColumn(DfatendocPeer::INFDOC4);

		$criteria->addSelectColumn(DfatendocPeer::ID);

	}

	const COUNT = 'COUNT(dfatendoc.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dfatendoc.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DfatendocPeer::doSelectRS($criteria, $con);
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
		$objects = DfatendocPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DfatendocPeer::populateObjects(DfatendocPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DfatendocPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DfatendocPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinDftabtip(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocPeer::ID_DFTABTIP, DftabtipPeer::ID);

		$rs = DfatendocPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinDftabtip(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocPeer::addSelectColumns($c);
		$startcol = (DfatendocPeer::NUM_COLUMNS - DfatendocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DftabtipPeer::addSelectColumns($c);

		$c->addJoin(DfatendocPeer::ID_DFTABTIP, DftabtipPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DftabtipPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDftabtip(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addDfatendoc($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDfatendocs();
				$obj2->addDfatendoc($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DfatendocPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DfatendocPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DfatendocPeer::ID_DFTABTIP, DftabtipPeer::ID);

		$rs = DfatendocPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DfatendocPeer::addSelectColumns($c);
		$startcol2 = (DfatendocPeer::NUM_COLUMNS - DfatendocPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DftabtipPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DftabtipPeer::NUM_COLUMNS;

		$c->addJoin(DfatendocPeer::ID_DFTABTIP, DftabtipPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DfatendocPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = DftabtipPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDftabtip(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addDfatendoc($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDfatendocs();
				$obj2->addDfatendoc($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return DfatendocPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DfatendocPeer::ID); 

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
			$comparison = $criteria->getComparison(DfatendocPeer::ID);
			$selectCriteria->add(DfatendocPeer::ID, $criteria->remove(DfatendocPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DfatendocPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DfatendocPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dfatendoc) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DfatendocPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dfatendoc $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DfatendocPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DfatendocPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DfatendocPeer::DATABASE_NAME, DfatendocPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DfatendocPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DfatendocPeer::DATABASE_NAME);

		$criteria->add(DfatendocPeer::ID, $pk);


		$v = DfatendocPeer::doSelect($criteria, $con);

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
			$criteria->add(DfatendocPeer::ID, $pks, Criteria::IN);
			$objs = DfatendocPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDfatendocPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DfatendocMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DfatendocMapBuilder');
}
