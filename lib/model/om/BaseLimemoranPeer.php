<?php


abstract class BaseLimemoranPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'limemoran';

	
	const CLASS_DEFAULT = 'lib.model.Limemoran';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMEMO = 'limemoran.NUMEMO';

	
	const NUMPRE = 'limemoran.NUMPRE';

	
	const CODEMPADM = 'limemoran.CODEMPADM';

	
	const CODUNIADM = 'limemoran.CODUNIADM';

	
	const CODEMPEJE = 'limemoran.CODEMPEJE';

	
	const CODUNISTE = 'limemoran.CODUNISTE';

	
	const DESPRO = 'limemoran.DESPRO';

	
	const DOCANE1 = 'limemoran.DOCANE1';

	
	const DOCANE2 = 'limemoran.DOCANE2';

	
	const DOCANE3 = 'limemoran.DOCANE3';

	
	const PREPOR = 'limemoran.PREPOR';

	
	const PREPORCAR = 'limemoran.PREPORCAR';

	
	const LISICACT_ID = 'limemoran.LISICACT_ID';

	
	const DETDECMOD = 'limemoran.DETDECMOD';

	
	const ANAPOR = 'limemoran.ANAPOR';

	
	const ANAPORCAR = 'limemoran.ANAPORCAR';

	
	const STATUS = 'limemoran.STATUS';

	
	const ID = 'limemoran.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numemo', 'Numpre', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Despro', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Detdecmod', 'Anapor', 'Anaporcar', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LimemoranPeer::NUMEMO, LimemoranPeer::NUMPRE, LimemoranPeer::CODEMPADM, LimemoranPeer::CODUNIADM, LimemoranPeer::CODEMPEJE, LimemoranPeer::CODUNISTE, LimemoranPeer::DESPRO, LimemoranPeer::DOCANE1, LimemoranPeer::DOCANE2, LimemoranPeer::DOCANE3, LimemoranPeer::PREPOR, LimemoranPeer::PREPORCAR, LimemoranPeer::LISICACT_ID, LimemoranPeer::DETDECMOD, LimemoranPeer::ANAPOR, LimemoranPeer::ANAPORCAR, LimemoranPeer::STATUS, LimemoranPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numemo', 'numpre', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'despro', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'detdecmod', 'anapor', 'anaporcar', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numemo' => 0, 'Numpre' => 1, 'Codempadm' => 2, 'Coduniadm' => 3, 'Codempeje' => 4, 'Coduniste' => 5, 'Despro' => 6, 'Docane1' => 7, 'Docane2' => 8, 'Docane3' => 9, 'Prepor' => 10, 'Preporcar' => 11, 'LisicactId' => 12, 'Detdecmod' => 13, 'Anapor' => 14, 'Anaporcar' => 15, 'Status' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (LimemoranPeer::NUMEMO => 0, LimemoranPeer::NUMPRE => 1, LimemoranPeer::CODEMPADM => 2, LimemoranPeer::CODUNIADM => 3, LimemoranPeer::CODEMPEJE => 4, LimemoranPeer::CODUNISTE => 5, LimemoranPeer::DESPRO => 6, LimemoranPeer::DOCANE1 => 7, LimemoranPeer::DOCANE2 => 8, LimemoranPeer::DOCANE3 => 9, LimemoranPeer::PREPOR => 10, LimemoranPeer::PREPORCAR => 11, LimemoranPeer::LISICACT_ID => 12, LimemoranPeer::DETDECMOD => 13, LimemoranPeer::ANAPOR => 14, LimemoranPeer::ANAPORCAR => 15, LimemoranPeer::STATUS => 16, LimemoranPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('numemo' => 0, 'numpre' => 1, 'codempadm' => 2, 'coduniadm' => 3, 'codempeje' => 4, 'coduniste' => 5, 'despro' => 6, 'docane1' => 7, 'docane2' => 8, 'docane3' => 9, 'prepor' => 10, 'preporcar' => 11, 'lisicact_id' => 12, 'detdecmod' => 13, 'anapor' => 14, 'anaporcar' => 15, 'status' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LimemoranMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LimemoranMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LimemoranPeer::getTableMap();
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
		return str_replace(LimemoranPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LimemoranPeer::NUMEMO);

		$criteria->addSelectColumn(LimemoranPeer::NUMPRE);

		$criteria->addSelectColumn(LimemoranPeer::CODEMPADM);

		$criteria->addSelectColumn(LimemoranPeer::CODUNIADM);

		$criteria->addSelectColumn(LimemoranPeer::CODEMPEJE);

		$criteria->addSelectColumn(LimemoranPeer::CODUNISTE);

		$criteria->addSelectColumn(LimemoranPeer::DESPRO);

		$criteria->addSelectColumn(LimemoranPeer::DOCANE1);

		$criteria->addSelectColumn(LimemoranPeer::DOCANE2);

		$criteria->addSelectColumn(LimemoranPeer::DOCANE3);

		$criteria->addSelectColumn(LimemoranPeer::PREPOR);

		$criteria->addSelectColumn(LimemoranPeer::PREPORCAR);

		$criteria->addSelectColumn(LimemoranPeer::LISICACT_ID);

		$criteria->addSelectColumn(LimemoranPeer::DETDECMOD);

		$criteria->addSelectColumn(LimemoranPeer::ANAPOR);

		$criteria->addSelectColumn(LimemoranPeer::ANAPORCAR);

		$criteria->addSelectColumn(LimemoranPeer::STATUS);

		$criteria->addSelectColumn(LimemoranPeer::ID);

	}

	const COUNT = 'COUNT(limemoran.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT limemoran.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimemoranPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimemoranPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LimemoranPeer::doSelectRS($criteria, $con);
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
		$objects = LimemoranPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LimemoranPeer::populateObjects(LimemoranPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LimemoranPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LimemoranPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLisicact(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimemoranPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimemoranPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LimemoranPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LimemoranPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLisicact(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LimemoranPeer::addSelectColumns($c);
		$startcol = (LimemoranPeer::NUM_COLUMNS - LimemoranPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LimemoranPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimemoranPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LisicactPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLisicact(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLimemoran($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLimemorans();
				$obj2->addLimemoran($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LimemoranPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LimemoranPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LimemoranPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LimemoranPeer::doSelectRS($criteria, $con);
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

		LimemoranPeer::addSelectColumns($c);
		$startcol2 = (LimemoranPeer::NUM_COLUMNS - LimemoranPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LimemoranPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LimemoranPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = LisicactPeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getLisicact(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addLimemoran($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLimemorans();
					$obj2->addLimemoran($obj1);
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
		return LimemoranPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LimemoranPeer::ID); 

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
			$comparison = $criteria->getComparison(LimemoranPeer::ID);
			$selectCriteria->add(LimemoranPeer::ID, $criteria->remove(LimemoranPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LimemoranPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LimemoranPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Limemoran) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LimemoranPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Limemoran $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LimemoranPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LimemoranPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LimemoranPeer::DATABASE_NAME, LimemoranPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LimemoranPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LimemoranPeer::DATABASE_NAME);

		$criteria->add(LimemoranPeer::ID, $pk);


		$v = LimemoranPeer::doSelect($criteria, $con);

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
			$criteria->add(LimemoranPeer::ID, $pks, Criteria::IN);
			$objs = LimemoranPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLimemoranPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LimemoranMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LimemoranMapBuilder');
}
