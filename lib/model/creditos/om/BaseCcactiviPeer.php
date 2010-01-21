<?php


abstract class BaseCcactiviPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ccactivi';

	
	const CLASS_DEFAULT = 'lib.model.creditos.Ccactivi';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'ccactivi.ID';

	
	const NOMACT = 'ccactivi.NOMACT';

	
	const DESACT = 'ccactivi.DESACT';

	
	const FECINI = 'ccactivi.FECINI';

	
	const RESACT = 'ccactivi.RESACT';

	
	const OBSRES = 'ccactivi.OBSRES';

	
	const FECCUL = 'ccactivi.FECCUL';

	
	const ESTATU = 'ccactivi.ESTATU';

	
	const SOLCRENUM = 'ccactivi.SOLCRENUM';

	
	const SOLCRE = 'ccactivi.SOLCRE';

	
	const CCCLAACT_ID = 'ccactivi.CCCLAACT_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Nomact', 'Desact', 'Fecini', 'Resact', 'Obsres', 'Feccul', 'Estatu', 'Solcrenum', 'Solcre', 'CcclaactId', ),
		BasePeer::TYPE_COLNAME => array (CcactiviPeer::ID, CcactiviPeer::NOMACT, CcactiviPeer::DESACT, CcactiviPeer::FECINI, CcactiviPeer::RESACT, CcactiviPeer::OBSRES, CcactiviPeer::FECCUL, CcactiviPeer::ESTATU, CcactiviPeer::SOLCRENUM, CcactiviPeer::SOLCRE, CcactiviPeer::CCCLAACT_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'nomact', 'desact', 'fecini', 'resact', 'obsres', 'feccul', 'estatu', 'solcrenum', 'solcre', 'ccclaact_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nomact' => 1, 'Desact' => 2, 'Fecini' => 3, 'Resact' => 4, 'Obsres' => 5, 'Feccul' => 6, 'Estatu' => 7, 'Solcrenum' => 8, 'Solcre' => 9, 'CcclaactId' => 10, ),
		BasePeer::TYPE_COLNAME => array (CcactiviPeer::ID => 0, CcactiviPeer::NOMACT => 1, CcactiviPeer::DESACT => 2, CcactiviPeer::FECINI => 3, CcactiviPeer::RESACT => 4, CcactiviPeer::OBSRES => 5, CcactiviPeer::FECCUL => 6, CcactiviPeer::ESTATU => 7, CcactiviPeer::SOLCRENUM => 8, CcactiviPeer::SOLCRE => 9, CcactiviPeer::CCCLAACT_ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nomact' => 1, 'desact' => 2, 'fecini' => 3, 'resact' => 4, 'obsres' => 5, 'feccul' => 6, 'estatu' => 7, 'solcrenum' => 8, 'solcre' => 9, 'ccclaact_id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/creditos/map/CcactiviMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.creditos.map.CcactiviMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CcactiviPeer::getTableMap();
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
		return str_replace(CcactiviPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CcactiviPeer::ID);

		$criteria->addSelectColumn(CcactiviPeer::NOMACT);

		$criteria->addSelectColumn(CcactiviPeer::DESACT);

		$criteria->addSelectColumn(CcactiviPeer::FECINI);

		$criteria->addSelectColumn(CcactiviPeer::RESACT);

		$criteria->addSelectColumn(CcactiviPeer::OBSRES);

		$criteria->addSelectColumn(CcactiviPeer::FECCUL);

		$criteria->addSelectColumn(CcactiviPeer::ESTATU);

		$criteria->addSelectColumn(CcactiviPeer::SOLCRENUM);

		$criteria->addSelectColumn(CcactiviPeer::SOLCRE);

		$criteria->addSelectColumn(CcactiviPeer::CCCLAACT_ID);

	}

	const COUNT = 'COUNT(ccactivi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ccactivi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactiviPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactiviPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CcactiviPeer::doSelectRS($criteria, $con);
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
		$objects = CcactiviPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CcactiviPeer::populateObjects(CcactiviPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CcactiviPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CcactiviPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinCcclaact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactiviPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactiviPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CcactiviPeer::CCCLAACT_ID, CcclaactPeer::ID);

		$rs = CcactiviPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinCcclaact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CcactiviPeer::addSelectColumns($c);
		$startcol = (CcactiviPeer::NUM_COLUMNS - CcactiviPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		CcclaactPeer::addSelectColumns($c);

		$c->addJoin(CcactiviPeer::CCCLAACT_ID, CcclaactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactiviPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = CcclaactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCcclaact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCcactivi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCcactivis();
				$obj2->addCcactivi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CcactiviPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CcactiviPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(CcactiviPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
		$rs = CcactiviPeer::doSelectRS($criteria, $con);
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

		CcactiviPeer::addSelectColumns($c);
		$startcol2 = (CcactiviPeer::NUM_COLUMNS - CcactiviPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			CcclaactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + CcclaactPeer::NUM_COLUMNS;
	
			$c->addJoin(CcactiviPeer::CCCLAACT_ID, CcclaactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CcactiviPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = CcclaactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getCcclaact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addCcactivi($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initCcactivis();
					$obj2->addCcactivi($obj1);
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
		return CcactiviPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CcactiviPeer::ID); 

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
			$comparison = $criteria->getComparison(CcactiviPeer::ID);
			$selectCriteria->add(CcactiviPeer::ID, $criteria->remove(CcactiviPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CcactiviPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CcactiviPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ccactivi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CcactiviPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ccactivi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CcactiviPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CcactiviPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CcactiviPeer::DATABASE_NAME, CcactiviPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CcactiviPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CcactiviPeer::DATABASE_NAME);

		$criteria->add(CcactiviPeer::ID, $pk);


		$v = CcactiviPeer::doSelect($criteria, $con);

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
			$criteria->add(CcactiviPeer::ID, $pks, Criteria::IN);
			$objs = CcactiviPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCcactiviPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/creditos/map/CcactiviMapBuilder.php';
	Propel::registerMapBuilder('lib.model.creditos.map.CcactiviMapBuilder');
}
