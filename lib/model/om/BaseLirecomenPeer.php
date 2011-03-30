<?php


abstract class BaseLirecomenPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lirecomen';

	
	const CLASS_DEFAULT = 'lib.model.Lirecomen';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMRECOFE = 'lirecomen.NUMRECOFE';

	
	const NUMPLIE = 'lirecomen.NUMPLIE';

	
	const NUMEXP = 'lirecomen.NUMEXP';

	
	const CODEMPADM = 'lirecomen.CODEMPADM';

	
	const CODUNIADM = 'lirecomen.CODUNIADM';

	
	const CODEMPEJE = 'lirecomen.CODEMPEJE';

	
	const CODUNISTE = 'lirecomen.CODUNISTE';

	
	const FECREG = 'lirecomen.FECREG';

	
	const DIAS = 'lirecomen.DIAS';

	
	const FECVEN = 'lirecomen.FECVEN';

	
	const DOCANE1 = 'lirecomen.DOCANE1';

	
	const DOCANE2 = 'lirecomen.DOCANE2';

	
	const DOCANE3 = 'lirecomen.DOCANE3';

	
	const PREPOR = 'lirecomen.PREPOR';

	
	const CARGOPRE = 'lirecomen.CARGOPRE';

	
	const LISICACT_ID = 'lirecomen.LISICACT_ID';

	
	const DETDECMOD = 'lirecomen.DETDECMOD';

	
	const ANAPOR = 'lirecomen.ANAPOR';

	
	const CARGOANA = 'lirecomen.CARGOANA';

	
	const STATUS = 'lirecomen.STATUS';

	
	const RECOMEN = 'lirecomen.RECOMEN';

	
	const ID = 'lirecomen.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numrecofe', 'Numplie', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Cargopre', 'LisicactId', 'Detdecmod', 'Anapor', 'Cargoana', 'Status', 'Recomen', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LirecomenPeer::NUMRECOFE, LirecomenPeer::NUMPLIE, LirecomenPeer::NUMEXP, LirecomenPeer::CODEMPADM, LirecomenPeer::CODUNIADM, LirecomenPeer::CODEMPEJE, LirecomenPeer::CODUNISTE, LirecomenPeer::FECREG, LirecomenPeer::DIAS, LirecomenPeer::FECVEN, LirecomenPeer::DOCANE1, LirecomenPeer::DOCANE2, LirecomenPeer::DOCANE3, LirecomenPeer::PREPOR, LirecomenPeer::CARGOPRE, LirecomenPeer::LISICACT_ID, LirecomenPeer::DETDECMOD, LirecomenPeer::ANAPOR, LirecomenPeer::CARGOANA, LirecomenPeer::STATUS, LirecomenPeer::RECOMEN, LirecomenPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numrecofe', 'numplie', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'docane1', 'docane2', 'docane3', 'prepor', 'cargopre', 'lisicact_id', 'detdecmod', 'anapor', 'cargoana', 'status', 'recomen', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numrecofe' => 0, 'Numplie' => 1, 'Numexp' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Docane1' => 10, 'Docane2' => 11, 'Docane3' => 12, 'Prepor' => 13, 'Cargopre' => 14, 'LisicactId' => 15, 'Detdecmod' => 16, 'Anapor' => 17, 'Cargoana' => 18, 'Status' => 19, 'Recomen' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (LirecomenPeer::NUMRECOFE => 0, LirecomenPeer::NUMPLIE => 1, LirecomenPeer::NUMEXP => 2, LirecomenPeer::CODEMPADM => 3, LirecomenPeer::CODUNIADM => 4, LirecomenPeer::CODEMPEJE => 5, LirecomenPeer::CODUNISTE => 6, LirecomenPeer::FECREG => 7, LirecomenPeer::DIAS => 8, LirecomenPeer::FECVEN => 9, LirecomenPeer::DOCANE1 => 10, LirecomenPeer::DOCANE2 => 11, LirecomenPeer::DOCANE3 => 12, LirecomenPeer::PREPOR => 13, LirecomenPeer::CARGOPRE => 14, LirecomenPeer::LISICACT_ID => 15, LirecomenPeer::DETDECMOD => 16, LirecomenPeer::ANAPOR => 17, LirecomenPeer::CARGOANA => 18, LirecomenPeer::STATUS => 19, LirecomenPeer::RECOMEN => 20, LirecomenPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('numrecofe' => 0, 'numplie' => 1, 'numexp' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'docane1' => 10, 'docane2' => 11, 'docane3' => 12, 'prepor' => 13, 'cargopre' => 14, 'lisicact_id' => 15, 'detdecmod' => 16, 'anapor' => 17, 'cargoana' => 18, 'status' => 19, 'recomen' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LirecomenMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LirecomenMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LirecomenPeer::getTableMap();
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
		return str_replace(LirecomenPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LirecomenPeer::NUMRECOFE);

		$criteria->addSelectColumn(LirecomenPeer::NUMPLIE);

		$criteria->addSelectColumn(LirecomenPeer::NUMEXP);

		$criteria->addSelectColumn(LirecomenPeer::CODEMPADM);

		$criteria->addSelectColumn(LirecomenPeer::CODUNIADM);

		$criteria->addSelectColumn(LirecomenPeer::CODEMPEJE);

		$criteria->addSelectColumn(LirecomenPeer::CODUNISTE);

		$criteria->addSelectColumn(LirecomenPeer::FECREG);

		$criteria->addSelectColumn(LirecomenPeer::DIAS);

		$criteria->addSelectColumn(LirecomenPeer::FECVEN);

		$criteria->addSelectColumn(LirecomenPeer::DOCANE1);

		$criteria->addSelectColumn(LirecomenPeer::DOCANE2);

		$criteria->addSelectColumn(LirecomenPeer::DOCANE3);

		$criteria->addSelectColumn(LirecomenPeer::PREPOR);

		$criteria->addSelectColumn(LirecomenPeer::CARGOPRE);

		$criteria->addSelectColumn(LirecomenPeer::LISICACT_ID);

		$criteria->addSelectColumn(LirecomenPeer::DETDECMOD);

		$criteria->addSelectColumn(LirecomenPeer::ANAPOR);

		$criteria->addSelectColumn(LirecomenPeer::CARGOANA);

		$criteria->addSelectColumn(LirecomenPeer::STATUS);

		$criteria->addSelectColumn(LirecomenPeer::RECOMEN);

		$criteria->addSelectColumn(LirecomenPeer::ID);

	}

	const COUNT = 'COUNT(lirecomen.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lirecomen.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LirecomenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LirecomenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LirecomenPeer::doSelectRS($criteria, $con);
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
		$objects = LirecomenPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LirecomenPeer::populateObjects(LirecomenPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LirecomenPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LirecomenPeer::getOMClass();
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
			$criteria->addSelectColumn(LirecomenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LirecomenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LirecomenPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LirecomenPeer::doSelectRS($criteria, $con);
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

		LirecomenPeer::addSelectColumns($c);
		$startcol = (LirecomenPeer::NUM_COLUMNS - LirecomenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LirecomenPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LirecomenPeer::getOMClass();

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
										$temp_obj2->addLirecomen($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLirecomens();
				$obj2->addLirecomen($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LirecomenPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LirecomenPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LirecomenPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LirecomenPeer::doSelectRS($criteria, $con);
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

		LirecomenPeer::addSelectColumns($c);
		$startcol2 = (LirecomenPeer::NUM_COLUMNS - LirecomenPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LirecomenPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LirecomenPeer::getOMClass();


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
						$temp_obj2->addLirecomen($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLirecomens();
					$obj2->addLirecomen($obj1);
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
		return LirecomenPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LirecomenPeer::ID); 

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
			$comparison = $criteria->getComparison(LirecomenPeer::ID);
			$selectCriteria->add(LirecomenPeer::ID, $criteria->remove(LirecomenPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LirecomenPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LirecomenPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lirecomen) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LirecomenPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lirecomen $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LirecomenPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LirecomenPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LirecomenPeer::DATABASE_NAME, LirecomenPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LirecomenPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LirecomenPeer::DATABASE_NAME);

		$criteria->add(LirecomenPeer::ID, $pk);


		$v = LirecomenPeer::doSelect($criteria, $con);

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
			$criteria->add(LirecomenPeer::ID, $pks, Criteria::IN);
			$objs = LirecomenPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLirecomenPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LirecomenMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LirecomenMapBuilder');
}
