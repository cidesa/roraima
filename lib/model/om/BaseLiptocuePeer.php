<?php


abstract class BaseLiptocuePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liptocue';

	
	const CLASS_DEFAULT = 'lib.model.Liptocue';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPTOCUE = 'liptocue.NUMPTOCUE';

	
	const NUMEMO = 'liptocue.NUMEMO';

	
	const NUMPRE = 'liptocue.NUMPRE';

	
	const CODEMPADM = 'liptocue.CODEMPADM';

	
	const CODUNIADM = 'liptocue.CODUNIADM';

	
	const CODEMPEJE = 'liptocue.CODEMPEJE';

	
	const CODUNISTE = 'liptocue.CODUNISTE';

	
	const DESPRO = 'liptocue.DESPRO';

	
	const DOCANE1 = 'liptocue.DOCANE1';

	
	const DOCANE2 = 'liptocue.DOCANE2';

	
	const DOCANE3 = 'liptocue.DOCANE3';

	
	const PREPOR = 'liptocue.PREPOR';

	
	const PREPORCAR = 'liptocue.PREPORCAR';

	
	const LISICACT_ID = 'liptocue.LISICACT_ID';

	
	const DETDECMOD = 'liptocue.DETDECMOD';

	
	const ANAPOR = 'liptocue.ANAPOR';

	
	const ANAPORCAR = 'liptocue.ANAPORCAR';

	
	const STATUS = 'liptocue.STATUS';

	
	const ID = 'liptocue.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numptocue', 'Numemo', 'Numpre', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Despro', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Detdecmod', 'Anapor', 'Anaporcar', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiptocuePeer::NUMPTOCUE, LiptocuePeer::NUMEMO, LiptocuePeer::NUMPRE, LiptocuePeer::CODEMPADM, LiptocuePeer::CODUNIADM, LiptocuePeer::CODEMPEJE, LiptocuePeer::CODUNISTE, LiptocuePeer::DESPRO, LiptocuePeer::DOCANE1, LiptocuePeer::DOCANE2, LiptocuePeer::DOCANE3, LiptocuePeer::PREPOR, LiptocuePeer::PREPORCAR, LiptocuePeer::LISICACT_ID, LiptocuePeer::DETDECMOD, LiptocuePeer::ANAPOR, LiptocuePeer::ANAPORCAR, LiptocuePeer::STATUS, LiptocuePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numptocue', 'numemo', 'numpre', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'despro', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'detdecmod', 'anapor', 'anaporcar', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numptocue' => 0, 'Numemo' => 1, 'Numpre' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Despro' => 7, 'Docane1' => 8, 'Docane2' => 9, 'Docane3' => 10, 'Prepor' => 11, 'Preporcar' => 12, 'LisicactId' => 13, 'Detdecmod' => 14, 'Anapor' => 15, 'Anaporcar' => 16, 'Status' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (LiptocuePeer::NUMPTOCUE => 0, LiptocuePeer::NUMEMO => 1, LiptocuePeer::NUMPRE => 2, LiptocuePeer::CODEMPADM => 3, LiptocuePeer::CODUNIADM => 4, LiptocuePeer::CODEMPEJE => 5, LiptocuePeer::CODUNISTE => 6, LiptocuePeer::DESPRO => 7, LiptocuePeer::DOCANE1 => 8, LiptocuePeer::DOCANE2 => 9, LiptocuePeer::DOCANE3 => 10, LiptocuePeer::PREPOR => 11, LiptocuePeer::PREPORCAR => 12, LiptocuePeer::LISICACT_ID => 13, LiptocuePeer::DETDECMOD => 14, LiptocuePeer::ANAPOR => 15, LiptocuePeer::ANAPORCAR => 16, LiptocuePeer::STATUS => 17, LiptocuePeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('numptocue' => 0, 'numemo' => 1, 'numpre' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'despro' => 7, 'docane1' => 8, 'docane2' => 9, 'docane3' => 10, 'prepor' => 11, 'preporcar' => 12, 'lisicact_id' => 13, 'detdecmod' => 14, 'anapor' => 15, 'anaporcar' => 16, 'status' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiptocueMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiptocueMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiptocuePeer::getTableMap();
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
		return str_replace(LiptocuePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiptocuePeer::NUMPTOCUE);

		$criteria->addSelectColumn(LiptocuePeer::NUMEMO);

		$criteria->addSelectColumn(LiptocuePeer::NUMPRE);

		$criteria->addSelectColumn(LiptocuePeer::CODEMPADM);

		$criteria->addSelectColumn(LiptocuePeer::CODUNIADM);

		$criteria->addSelectColumn(LiptocuePeer::CODEMPEJE);

		$criteria->addSelectColumn(LiptocuePeer::CODUNISTE);

		$criteria->addSelectColumn(LiptocuePeer::DESPRO);

		$criteria->addSelectColumn(LiptocuePeer::DOCANE1);

		$criteria->addSelectColumn(LiptocuePeer::DOCANE2);

		$criteria->addSelectColumn(LiptocuePeer::DOCANE3);

		$criteria->addSelectColumn(LiptocuePeer::PREPOR);

		$criteria->addSelectColumn(LiptocuePeer::PREPORCAR);

		$criteria->addSelectColumn(LiptocuePeer::LISICACT_ID);

		$criteria->addSelectColumn(LiptocuePeer::DETDECMOD);

		$criteria->addSelectColumn(LiptocuePeer::ANAPOR);

		$criteria->addSelectColumn(LiptocuePeer::ANAPORCAR);

		$criteria->addSelectColumn(LiptocuePeer::STATUS);

		$criteria->addSelectColumn(LiptocuePeer::ID);

	}

	const COUNT = 'COUNT(liptocue.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liptocue.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiptocuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiptocuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiptocuePeer::doSelectRS($criteria, $con);
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
		$objects = LiptocuePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiptocuePeer::populateObjects(LiptocuePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiptocuePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiptocuePeer::getOMClass();
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
			$criteria->addSelectColumn(LiptocuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiptocuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiptocuePeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiptocuePeer::doSelectRS($criteria, $con);
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

		LiptocuePeer::addSelectColumns($c);
		$startcol = (LiptocuePeer::NUM_COLUMNS - LiptocuePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiptocuePeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiptocuePeer::getOMClass();

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
										$temp_obj2->addLiptocue($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiptocues();
				$obj2->addLiptocue($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiptocuePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiptocuePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiptocuePeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiptocuePeer::doSelectRS($criteria, $con);
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

		LiptocuePeer::addSelectColumns($c);
		$startcol2 = (LiptocuePeer::NUM_COLUMNS - LiptocuePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiptocuePeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiptocuePeer::getOMClass();


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
						$temp_obj2->addLiptocue($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiptocues();
					$obj2->addLiptocue($obj1);
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
		return LiptocuePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiptocuePeer::ID); 

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
			$comparison = $criteria->getComparison(LiptocuePeer::ID);
			$selectCriteria->add(LiptocuePeer::ID, $criteria->remove(LiptocuePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiptocuePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiptocuePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liptocue) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiptocuePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liptocue $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiptocuePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiptocuePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiptocuePeer::DATABASE_NAME, LiptocuePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiptocuePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiptocuePeer::DATABASE_NAME);

		$criteria->add(LiptocuePeer::ID, $pk);


		$v = LiptocuePeer::doSelect($criteria, $con);

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
			$criteria->add(LiptocuePeer::ID, $pks, Criteria::IN);
			$objs = LiptocuePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiptocuePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiptocueMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiptocueMapBuilder');
}
