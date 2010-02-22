<?php


abstract class BaseOpbenefiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'opbenefi';

	
	const CLASS_DEFAULT = 'lib.model.Opbenefi';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDRIF = 'opbenefi.CEDRIF';

	
	const NOMBEN = 'opbenefi.NOMBEN';

	
	const DIRBEN = 'opbenefi.DIRBEN';

	
	const TELBEN = 'opbenefi.TELBEN';

	
	const CODCTA = 'opbenefi.CODCTA';

	
	const NITBEN = 'opbenefi.NITBEN';

	
	const CODTIPBEN = 'opbenefi.CODTIPBEN';

	
	const TIPPER = 'opbenefi.TIPPER';

	
	const NACIONALIDAD = 'opbenefi.NACIONALIDAD';

	
	const RESIDENTE = 'opbenefi.RESIDENTE';

	
	const CONSTITUIDA = 'opbenefi.CONSTITUIDA';

	
	const CODORD = 'opbenefi.CODORD';

	
	const CODPERCON = 'opbenefi.CODPERCON';

	
	const CODORDADI = 'opbenefi.CODORDADI';

	
	const CODPERCONADI = 'opbenefi.CODPERCONADI';

	
	const CODORDCONTRA = 'opbenefi.CODORDCONTRA';

	
	const CODPERCONTRA = 'opbenefi.CODPERCONTRA';

	
	const TEMCEDRIF = 'opbenefi.TEMCEDRIF';

	
	const CODCTASEC = 'opbenefi.CODCTASEC';

	
	const CODCTACAJCHI = 'opbenefi.CODCTACAJCHI';

	
	const ID = 'opbenefi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrif', 'Nomben', 'Dirben', 'Telben', 'Codcta', 'Nitben', 'Codtipben', 'Tipper', 'Nacionalidad', 'Residente', 'Constituida', 'Codord', 'Codpercon', 'Codordadi', 'Codperconadi', 'Codordcontra', 'Codpercontra', 'Temcedrif', 'Codctasec', 'Codctacajchi', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OpbenefiPeer::CEDRIF, OpbenefiPeer::NOMBEN, OpbenefiPeer::DIRBEN, OpbenefiPeer::TELBEN, OpbenefiPeer::CODCTA, OpbenefiPeer::NITBEN, OpbenefiPeer::CODTIPBEN, OpbenefiPeer::TIPPER, OpbenefiPeer::NACIONALIDAD, OpbenefiPeer::RESIDENTE, OpbenefiPeer::CONSTITUIDA, OpbenefiPeer::CODORD, OpbenefiPeer::CODPERCON, OpbenefiPeer::CODORDADI, OpbenefiPeer::CODPERCONADI, OpbenefiPeer::CODORDCONTRA, OpbenefiPeer::CODPERCONTRA, OpbenefiPeer::TEMCEDRIF, OpbenefiPeer::CODCTASEC, OpbenefiPeer::CODCTACAJCHI, OpbenefiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrif', 'nomben', 'dirben', 'telben', 'codcta', 'nitben', 'codtipben', 'tipper', 'nacionalidad', 'residente', 'constituida', 'codord', 'codpercon', 'codordadi', 'codperconadi', 'codordcontra', 'codpercontra', 'temcedrif', 'codctasec', 'codctacajchi', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrif' => 0, 'Nomben' => 1, 'Dirben' => 2, 'Telben' => 3, 'Codcta' => 4, 'Nitben' => 5, 'Codtipben' => 6, 'Tipper' => 7, 'Nacionalidad' => 8, 'Residente' => 9, 'Constituida' => 10, 'Codord' => 11, 'Codpercon' => 12, 'Codordadi' => 13, 'Codperconadi' => 14, 'Codordcontra' => 15, 'Codpercontra' => 16, 'Temcedrif' => 17, 'Codctasec' => 18, 'Codctacajchi' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (OpbenefiPeer::CEDRIF => 0, OpbenefiPeer::NOMBEN => 1, OpbenefiPeer::DIRBEN => 2, OpbenefiPeer::TELBEN => 3, OpbenefiPeer::CODCTA => 4, OpbenefiPeer::NITBEN => 5, OpbenefiPeer::CODTIPBEN => 6, OpbenefiPeer::TIPPER => 7, OpbenefiPeer::NACIONALIDAD => 8, OpbenefiPeer::RESIDENTE => 9, OpbenefiPeer::CONSTITUIDA => 10, OpbenefiPeer::CODORD => 11, OpbenefiPeer::CODPERCON => 12, OpbenefiPeer::CODORDADI => 13, OpbenefiPeer::CODPERCONADI => 14, OpbenefiPeer::CODORDCONTRA => 15, OpbenefiPeer::CODPERCONTRA => 16, OpbenefiPeer::TEMCEDRIF => 17, OpbenefiPeer::CODCTASEC => 18, OpbenefiPeer::CODCTACAJCHI => 19, OpbenefiPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrif' => 0, 'nomben' => 1, 'dirben' => 2, 'telben' => 3, 'codcta' => 4, 'nitben' => 5, 'codtipben' => 6, 'tipper' => 7, 'nacionalidad' => 8, 'residente' => 9, 'constituida' => 10, 'codord' => 11, 'codpercon' => 12, 'codordadi' => 13, 'codperconadi' => 14, 'codordcontra' => 15, 'codpercontra' => 16, 'temcedrif' => 17, 'codctasec' => 18, 'codctacajchi' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OpbenefiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OpbenefiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OpbenefiPeer::getTableMap();
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
		return str_replace(OpbenefiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OpbenefiPeer::CEDRIF);

		$criteria->addSelectColumn(OpbenefiPeer::NOMBEN);

		$criteria->addSelectColumn(OpbenefiPeer::DIRBEN);

		$criteria->addSelectColumn(OpbenefiPeer::TELBEN);

		$criteria->addSelectColumn(OpbenefiPeer::CODCTA);

		$criteria->addSelectColumn(OpbenefiPeer::NITBEN);

		$criteria->addSelectColumn(OpbenefiPeer::CODTIPBEN);

		$criteria->addSelectColumn(OpbenefiPeer::TIPPER);

		$criteria->addSelectColumn(OpbenefiPeer::NACIONALIDAD);

		$criteria->addSelectColumn(OpbenefiPeer::RESIDENTE);

		$criteria->addSelectColumn(OpbenefiPeer::CONSTITUIDA);

		$criteria->addSelectColumn(OpbenefiPeer::CODORD);

		$criteria->addSelectColumn(OpbenefiPeer::CODPERCON);

		$criteria->addSelectColumn(OpbenefiPeer::CODORDADI);

		$criteria->addSelectColumn(OpbenefiPeer::CODPERCONADI);

		$criteria->addSelectColumn(OpbenefiPeer::CODORDCONTRA);

		$criteria->addSelectColumn(OpbenefiPeer::CODPERCONTRA);

		$criteria->addSelectColumn(OpbenefiPeer::TEMCEDRIF);

		$criteria->addSelectColumn(OpbenefiPeer::CODCTASEC);

		$criteria->addSelectColumn(OpbenefiPeer::CODCTACAJCHI);

		$criteria->addSelectColumn(OpbenefiPeer::ID);

	}

	const COUNT = 'COUNT(opbenefi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT opbenefi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OpbenefiPeer::doSelectRS($criteria, $con);
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
		$objects = OpbenefiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OpbenefiPeer::populateObjects(OpbenefiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OpbenefiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OpbenefiPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinOptipben(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpbenefiPeer::CODTIPBEN, OptipbenPeer::CODTIPBEN);

		$rs = OpbenefiPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinOptipben(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		OpbenefiPeer::addSelectColumns($c);
		$startcol = (OpbenefiPeer::NUM_COLUMNS - OpbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		OptipbenPeer::addSelectColumns($c);

		$c->addJoin(OpbenefiPeer::CODTIPBEN, OptipbenPeer::CODTIPBEN);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpbenefiPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = OptipbenPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getOptipben(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addOpbenefi($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initOpbenefis();
				$obj2->addOpbenefi($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OpbenefiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OpbenefiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(OpbenefiPeer::CODTIPBEN, OptipbenPeer::CODTIPBEN);

		$rs = OpbenefiPeer::doSelectRS($criteria, $con);
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

		OpbenefiPeer::addSelectColumns($c);
		$startcol2 = (OpbenefiPeer::NUM_COLUMNS - OpbenefiPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		OptipbenPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + OptipbenPeer::NUM_COLUMNS;

		$c->addJoin(OpbenefiPeer::CODTIPBEN, OptipbenPeer::CODTIPBEN);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = OpbenefiPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = OptipbenPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getOptipben(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addOpbenefi($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initOpbenefis();
				$obj2->addOpbenefi($obj1);
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
		return OpbenefiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(OpbenefiPeer::ID); 

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
			$comparison = $criteria->getComparison(OpbenefiPeer::ID);
			$selectCriteria->add(OpbenefiPeer::ID, $criteria->remove(OpbenefiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OpbenefiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OpbenefiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Opbenefi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OpbenefiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Opbenefi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OpbenefiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OpbenefiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OpbenefiPeer::DATABASE_NAME, OpbenefiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OpbenefiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OpbenefiPeer::DATABASE_NAME);

		$criteria->add(OpbenefiPeer::ID, $pk);


		$v = OpbenefiPeer::doSelect($criteria, $con);

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
			$criteria->add(OpbenefiPeer::ID, $pks, Criteria::IN);
			$objs = OpbenefiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOpbenefiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OpbenefiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OpbenefiMapBuilder');
}
