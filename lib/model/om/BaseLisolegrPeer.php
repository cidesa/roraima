<?php


abstract class BaseLisolegrPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lisolegr';

	
	const CLASS_DEFAULT = 'lib.model.Lisolegr';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'lisolegr.NUMSOL';

	
	const NUMPRE = 'lisolegr.NUMPRE';

	
	const CODEMPADM = 'lisolegr.CODEMPADM';

	
	const CODUNIADM = 'lisolegr.CODUNIADM';

	
	const CODEMPEJE = 'lisolegr.CODEMPEJE';

	
	const CODUNISTE = 'lisolegr.CODUNISTE';

	
	const DESPRO = 'lisolegr.DESPRO';

	
	const MONSOL = 'lisolegr.MONSOL';

	
	const CODMON = 'lisolegr.CODMON';

	
	const VALCAM = 'lisolegr.VALCAM';

	
	const FECCAM = 'lisolegr.FECCAM';

	
	const DOCANE1 = 'lisolegr.DOCANE1';

	
	const DOCANE2 = 'lisolegr.DOCANE2';

	
	const DOCANE3 = 'lisolegr.DOCANE3';

	
	const STATUS = 'lisolegr.STATUS';

	
	const LISICACT_ID = 'lisolegr.LISICACT_ID';

	
	const DETDECMOD = 'lisolegr.DETDECMOD';

	
	const PREPOR = 'lisolegr.PREPOR';

	
	const CARGOPRE = 'lisolegr.CARGOPRE';

	
	const APRPOR = 'lisolegr.APRPOR';

	
	const CARGOAPR = 'lisolegr.CARGOAPR';

	
	const ID = 'lisolegr.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Numpre', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Despro', 'Monsol', 'Codmon', 'Valcam', 'Feccam', 'Docane1', 'Docane2', 'Docane3', 'Status', 'LisicactId', 'Detdecmod', 'Prepor', 'Cargopre', 'Aprpor', 'Cargoapr', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LisolegrPeer::NUMSOL, LisolegrPeer::NUMPRE, LisolegrPeer::CODEMPADM, LisolegrPeer::CODUNIADM, LisolegrPeer::CODEMPEJE, LisolegrPeer::CODUNISTE, LisolegrPeer::DESPRO, LisolegrPeer::MONSOL, LisolegrPeer::CODMON, LisolegrPeer::VALCAM, LisolegrPeer::FECCAM, LisolegrPeer::DOCANE1, LisolegrPeer::DOCANE2, LisolegrPeer::DOCANE3, LisolegrPeer::STATUS, LisolegrPeer::LISICACT_ID, LisolegrPeer::DETDECMOD, LisolegrPeer::PREPOR, LisolegrPeer::CARGOPRE, LisolegrPeer::APRPOR, LisolegrPeer::CARGOAPR, LisolegrPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'numpre', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'despro', 'monsol', 'codmon', 'valcam', 'feccam', 'docane1', 'docane2', 'docane3', 'status', 'lisicact_id', 'detdecmod', 'prepor', 'cargopre', 'aprpor', 'cargoapr', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Numpre' => 1, 'Codempadm' => 2, 'Coduniadm' => 3, 'Codempeje' => 4, 'Coduniste' => 5, 'Despro' => 6, 'Monsol' => 7, 'Codmon' => 8, 'Valcam' => 9, 'Feccam' => 10, 'Docane1' => 11, 'Docane2' => 12, 'Docane3' => 13, 'Status' => 14, 'LisicactId' => 15, 'Detdecmod' => 16, 'Prepor' => 17, 'Cargopre' => 18, 'Aprpor' => 19, 'Cargoapr' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (LisolegrPeer::NUMSOL => 0, LisolegrPeer::NUMPRE => 1, LisolegrPeer::CODEMPADM => 2, LisolegrPeer::CODUNIADM => 3, LisolegrPeer::CODEMPEJE => 4, LisolegrPeer::CODUNISTE => 5, LisolegrPeer::DESPRO => 6, LisolegrPeer::MONSOL => 7, LisolegrPeer::CODMON => 8, LisolegrPeer::VALCAM => 9, LisolegrPeer::FECCAM => 10, LisolegrPeer::DOCANE1 => 11, LisolegrPeer::DOCANE2 => 12, LisolegrPeer::DOCANE3 => 13, LisolegrPeer::STATUS => 14, LisolegrPeer::LISICACT_ID => 15, LisolegrPeer::DETDECMOD => 16, LisolegrPeer::PREPOR => 17, LisolegrPeer::CARGOPRE => 18, LisolegrPeer::APRPOR => 19, LisolegrPeer::CARGOAPR => 20, LisolegrPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'numpre' => 1, 'codempadm' => 2, 'coduniadm' => 3, 'codempeje' => 4, 'coduniste' => 5, 'despro' => 6, 'monsol' => 7, 'codmon' => 8, 'valcam' => 9, 'feccam' => 10, 'docane1' => 11, 'docane2' => 12, 'docane3' => 13, 'status' => 14, 'lisicact_id' => 15, 'detdecmod' => 16, 'prepor' => 17, 'cargopre' => 18, 'aprpor' => 19, 'cargoapr' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LisolegrMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LisolegrMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LisolegrPeer::getTableMap();
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
		return str_replace(LisolegrPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LisolegrPeer::NUMSOL);

		$criteria->addSelectColumn(LisolegrPeer::NUMPRE);

		$criteria->addSelectColumn(LisolegrPeer::CODEMPADM);

		$criteria->addSelectColumn(LisolegrPeer::CODUNIADM);

		$criteria->addSelectColumn(LisolegrPeer::CODEMPEJE);

		$criteria->addSelectColumn(LisolegrPeer::CODUNISTE);

		$criteria->addSelectColumn(LisolegrPeer::DESPRO);

		$criteria->addSelectColumn(LisolegrPeer::MONSOL);

		$criteria->addSelectColumn(LisolegrPeer::CODMON);

		$criteria->addSelectColumn(LisolegrPeer::VALCAM);

		$criteria->addSelectColumn(LisolegrPeer::FECCAM);

		$criteria->addSelectColumn(LisolegrPeer::DOCANE1);

		$criteria->addSelectColumn(LisolegrPeer::DOCANE2);

		$criteria->addSelectColumn(LisolegrPeer::DOCANE3);

		$criteria->addSelectColumn(LisolegrPeer::STATUS);

		$criteria->addSelectColumn(LisolegrPeer::LISICACT_ID);

		$criteria->addSelectColumn(LisolegrPeer::DETDECMOD);

		$criteria->addSelectColumn(LisolegrPeer::PREPOR);

		$criteria->addSelectColumn(LisolegrPeer::CARGOPRE);

		$criteria->addSelectColumn(LisolegrPeer::APRPOR);

		$criteria->addSelectColumn(LisolegrPeer::CARGOAPR);

		$criteria->addSelectColumn(LisolegrPeer::ID);

	}

	const COUNT = 'COUNT(lisolegr.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lisolegr.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LisolegrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LisolegrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LisolegrPeer::doSelectRS($criteria, $con);
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
		$objects = LisolegrPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LisolegrPeer::populateObjects(LisolegrPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LisolegrPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LisolegrPeer::getOMClass();
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
			$criteria->addSelectColumn(LisolegrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LisolegrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LisolegrPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LisolegrPeer::doSelectRS($criteria, $con);
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

		LisolegrPeer::addSelectColumns($c);
		$startcol = (LisolegrPeer::NUM_COLUMNS - LisolegrPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LisolegrPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LisolegrPeer::getOMClass();

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
										$temp_obj2->addLisolegr($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLisolegrs();
				$obj2->addLisolegr($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LisolegrPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LisolegrPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LisolegrPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LisolegrPeer::doSelectRS($criteria, $con);
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

		LisolegrPeer::addSelectColumns($c);
		$startcol2 = (LisolegrPeer::NUM_COLUMNS - LisolegrPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LisolegrPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LisolegrPeer::getOMClass();


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
						$temp_obj2->addLisolegr($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLisolegrs();
					$obj2->addLisolegr($obj1);
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
		return LisolegrPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LisolegrPeer::ID); 

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
			$comparison = $criteria->getComparison(LisolegrPeer::ID);
			$selectCriteria->add(LisolegrPeer::ID, $criteria->remove(LisolegrPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LisolegrPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LisolegrPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lisolegr) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LisolegrPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lisolegr $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LisolegrPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LisolegrPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LisolegrPeer::DATABASE_NAME, LisolegrPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LisolegrPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LisolegrPeer::DATABASE_NAME);

		$criteria->add(LisolegrPeer::ID, $pk);


		$v = LisolegrPeer::doSelect($criteria, $con);

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
			$criteria->add(LisolegrPeer::ID, $pks, Criteria::IN);
			$objs = LisolegrPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLisolegrPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LisolegrMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LisolegrMapBuilder');
}
