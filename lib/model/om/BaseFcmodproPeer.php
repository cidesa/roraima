<?php


abstract class BaseFcmodproPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcmodpro';

	
	const CLASS_DEFAULT = 'lib.model.Fcmodpro';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFMOD = 'fcmodpro.REFMOD';

	
	const NROCON = 'fcmodpro.NROCON';

	
	const FECMOD = 'fcmodpro.FECMOD';

	
	const TIPPRO = 'fcmodpro.TIPPRO';

	
	const DESPRO = 'fcmodpro.DESPRO';

	
	const DIRPRO = 'fcmodpro.DIRPRO';

	
	const MONPRO = 'fcmodpro.MONPRO';

	
	const MONIMP = 'fcmodpro.MONIMP';

	
	const TIPPROANT = 'fcmodpro.TIPPROANT';

	
	const DESPROANT = 'fcmodpro.DESPROANT';

	
	const DIRPROANT = 'fcmodpro.DIRPROANT';

	
	const MONPROANT = 'fcmodpro.MONPROANT';

	
	const MONIMPANT = 'fcmodpro.MONIMPANT';

	
	const FUNREC = 'fcmodpro.FUNREC';

	
	const ID = 'fcmodpro.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod', 'Nrocon', 'Fecmod', 'Tippro', 'Despro', 'Dirpro', 'Monpro', 'Monimp', 'Tipproant', 'Desproant', 'Dirproant', 'Monproant', 'Monimpant', 'Funrec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcmodproPeer::REFMOD, FcmodproPeer::NROCON, FcmodproPeer::FECMOD, FcmodproPeer::TIPPRO, FcmodproPeer::DESPRO, FcmodproPeer::DIRPRO, FcmodproPeer::MONPRO, FcmodproPeer::MONIMP, FcmodproPeer::TIPPROANT, FcmodproPeer::DESPROANT, FcmodproPeer::DIRPROANT, FcmodproPeer::MONPROANT, FcmodproPeer::MONIMPANT, FcmodproPeer::FUNREC, FcmodproPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod', 'nrocon', 'fecmod', 'tippro', 'despro', 'dirpro', 'monpro', 'monimp', 'tipproant', 'desproant', 'dirproant', 'monproant', 'monimpant', 'funrec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refmod' => 0, 'Nrocon' => 1, 'Fecmod' => 2, 'Tippro' => 3, 'Despro' => 4, 'Dirpro' => 5, 'Monpro' => 6, 'Monimp' => 7, 'Tipproant' => 8, 'Desproant' => 9, 'Dirproant' => 10, 'Monproant' => 11, 'Monimpant' => 12, 'Funrec' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (FcmodproPeer::REFMOD => 0, FcmodproPeer::NROCON => 1, FcmodproPeer::FECMOD => 2, FcmodproPeer::TIPPRO => 3, FcmodproPeer::DESPRO => 4, FcmodproPeer::DIRPRO => 5, FcmodproPeer::MONPRO => 6, FcmodproPeer::MONIMP => 7, FcmodproPeer::TIPPROANT => 8, FcmodproPeer::DESPROANT => 9, FcmodproPeer::DIRPROANT => 10, FcmodproPeer::MONPROANT => 11, FcmodproPeer::MONIMPANT => 12, FcmodproPeer::FUNREC => 13, FcmodproPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('refmod' => 0, 'nrocon' => 1, 'fecmod' => 2, 'tippro' => 3, 'despro' => 4, 'dirpro' => 5, 'monpro' => 6, 'monimp' => 7, 'tipproant' => 8, 'desproant' => 9, 'dirproant' => 10, 'monproant' => 11, 'monimpant' => 12, 'funrec' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcmodproMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcmodproMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcmodproPeer::getTableMap();
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
		return str_replace(FcmodproPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcmodproPeer::REFMOD);

		$criteria->addSelectColumn(FcmodproPeer::NROCON);

		$criteria->addSelectColumn(FcmodproPeer::FECMOD);

		$criteria->addSelectColumn(FcmodproPeer::TIPPRO);

		$criteria->addSelectColumn(FcmodproPeer::DESPRO);

		$criteria->addSelectColumn(FcmodproPeer::DIRPRO);

		$criteria->addSelectColumn(FcmodproPeer::MONPRO);

		$criteria->addSelectColumn(FcmodproPeer::MONIMP);

		$criteria->addSelectColumn(FcmodproPeer::TIPPROANT);

		$criteria->addSelectColumn(FcmodproPeer::DESPROANT);

		$criteria->addSelectColumn(FcmodproPeer::DIRPROANT);

		$criteria->addSelectColumn(FcmodproPeer::MONPROANT);

		$criteria->addSelectColumn(FcmodproPeer::MONIMPANT);

		$criteria->addSelectColumn(FcmodproPeer::FUNREC);

		$criteria->addSelectColumn(FcmodproPeer::ID);

	}

	const COUNT = 'COUNT(fcmodpro.REFMOD)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcmodpro.REFMOD)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodproPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcmodproPeer::doSelectRS($criteria, $con);
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
		$objects = FcmodproPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcmodproPeer::populateObjects(FcmodproPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcmodproPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcmodproPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFcprolic(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodproPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcmodproPeer::NROCON, FcprolicPeer::NROCON);

		$rs = FcmodproPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFcprolic(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FcmodproPeer::addSelectColumns($c);
		$startcol = (FcmodproPeer::NUM_COLUMNS - FcmodproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FcprolicPeer::addSelectColumns($c);

		$c->addJoin(FcmodproPeer::NROCON, FcprolicPeer::NROCON);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FcmodproPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FcprolicPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFcprolic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFcmodpro($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFcmodpros();
				$obj2->addFcmodpro($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcmodproPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcmodproPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FcmodproPeer::NROCON, FcprolicPeer::NROCON);

		$rs = FcmodproPeer::doSelectRS($criteria, $con);
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

		FcmodproPeer::addSelectColumns($c);
		$startcol2 = (FcmodproPeer::NUM_COLUMNS - FcmodproPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FcprolicPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FcprolicPeer::NUM_COLUMNS;

		$c->addJoin(FcmodproPeer::NROCON, FcprolicPeer::NROCON);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = FcmodproPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = FcprolicPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFcprolic(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addFcmodpro($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initFcmodpros();
				$obj2->addFcmodpro($obj1);
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
		return FcmodproPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcmodproPeer::REFMOD);
			$selectCriteria->add(FcmodproPeer::REFMOD, $criteria->remove(FcmodproPeer::REFMOD), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcmodproPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcmodproPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcmodpro) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcmodproPeer::REFMOD, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcmodpro $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcmodproPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcmodproPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcmodproPeer::DATABASE_NAME, FcmodproPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcmodproPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcmodproPeer::DATABASE_NAME);

		$criteria->add(FcmodproPeer::REFMOD, $pk);


		$v = FcmodproPeer::doSelect($criteria, $con);

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
			$criteria->add(FcmodproPeer::REFMOD, $pks, Criteria::IN);
			$objs = FcmodproPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcmodproPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcmodproMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcmodproMapBuilder');
}
