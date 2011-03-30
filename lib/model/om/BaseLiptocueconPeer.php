<?php


abstract class BaseLiptocueconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liptocuecon';

	
	const CLASS_DEFAULT = 'lib.model.Liptocuecon';

	
	const NUM_COLUMNS = 29;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPTOCUECON = 'liptocuecon.NUMPTOCUECON';

	
	const NUMPLIE = 'liptocuecon.NUMPLIE';

	
	const NUMEXP = 'liptocuecon.NUMEXP';

	
	const CODEMPADM = 'liptocuecon.CODEMPADM';

	
	const CODUNIADM = 'liptocuecon.CODUNIADM';

	
	const CODEMPEJE = 'liptocuecon.CODEMPEJE';

	
	const CODUNISTE = 'liptocuecon.CODUNISTE';

	
	const FECREG = 'liptocuecon.FECREG';

	
	const DIAS = 'liptocuecon.DIAS';

	
	const FECVEN = 'liptocuecon.FECVEN';

	
	const DETRECOMEN = 'liptocuecon.DETRECOMEN';

	
	const NUMRECOFE = 'liptocuecon.NUMRECOFE';

	
	const CODPRO = 'liptocuecon.CODPRO';

	
	const RESOLU = 'liptocuecon.RESOLU';

	
	const FECREL = 'liptocuecon.FECREL';

	
	const DECRET = 'liptocuecon.DECRET';

	
	const FECDEC = 'liptocuecon.FECDEC';

	
	const DETDECRET = 'liptocuecon.DETDECRET';

	
	const DOCANE1 = 'liptocuecon.DOCANE1';

	
	const DOCANE2 = 'liptocuecon.DOCANE2';

	
	const DOCANE3 = 'liptocuecon.DOCANE3';

	
	const PREPOR = 'liptocuecon.PREPOR';

	
	const CARGOPRE = 'liptocuecon.CARGOPRE';

	
	const LISICACT_ID = 'liptocuecon.LISICACT_ID';

	
	const DETDECMOD = 'liptocuecon.DETDECMOD';

	
	const ANAPOR = 'liptocuecon.ANAPOR';

	
	const CARGOANA = 'liptocuecon.CARGOANA';

	
	const STATUS = 'liptocuecon.STATUS';

	
	const ID = 'liptocuecon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numptocuecon', 'Numplie', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Detrecomen', 'Numrecofe', 'Codpro', 'Resolu', 'Fecrel', 'Decret', 'Fecdec', 'Detdecret', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Cargopre', 'LisicactId', 'Detdecmod', 'Anapor', 'Cargoana', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiptocueconPeer::NUMPTOCUECON, LiptocueconPeer::NUMPLIE, LiptocueconPeer::NUMEXP, LiptocueconPeer::CODEMPADM, LiptocueconPeer::CODUNIADM, LiptocueconPeer::CODEMPEJE, LiptocueconPeer::CODUNISTE, LiptocueconPeer::FECREG, LiptocueconPeer::DIAS, LiptocueconPeer::FECVEN, LiptocueconPeer::DETRECOMEN, LiptocueconPeer::NUMRECOFE, LiptocueconPeer::CODPRO, LiptocueconPeer::RESOLU, LiptocueconPeer::FECREL, LiptocueconPeer::DECRET, LiptocueconPeer::FECDEC, LiptocueconPeer::DETDECRET, LiptocueconPeer::DOCANE1, LiptocueconPeer::DOCANE2, LiptocueconPeer::DOCANE3, LiptocueconPeer::PREPOR, LiptocueconPeer::CARGOPRE, LiptocueconPeer::LISICACT_ID, LiptocueconPeer::DETDECMOD, LiptocueconPeer::ANAPOR, LiptocueconPeer::CARGOANA, LiptocueconPeer::STATUS, LiptocueconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numptocuecon', 'numplie', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'detrecomen', 'numrecofe', 'codpro', 'resolu', 'fecrel', 'decret', 'fecdec', 'detdecret', 'docane1', 'docane2', 'docane3', 'prepor', 'cargopre', 'lisicact_id', 'detdecmod', 'anapor', 'cargoana', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numptocuecon' => 0, 'Numplie' => 1, 'Numexp' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Detrecomen' => 10, 'Numrecofe' => 11, 'Codpro' => 12, 'Resolu' => 13, 'Fecrel' => 14, 'Decret' => 15, 'Fecdec' => 16, 'Detdecret' => 17, 'Docane1' => 18, 'Docane2' => 19, 'Docane3' => 20, 'Prepor' => 21, 'Cargopre' => 22, 'LisicactId' => 23, 'Detdecmod' => 24, 'Anapor' => 25, 'Cargoana' => 26, 'Status' => 27, 'Id' => 28, ),
		BasePeer::TYPE_COLNAME => array (LiptocueconPeer::NUMPTOCUECON => 0, LiptocueconPeer::NUMPLIE => 1, LiptocueconPeer::NUMEXP => 2, LiptocueconPeer::CODEMPADM => 3, LiptocueconPeer::CODUNIADM => 4, LiptocueconPeer::CODEMPEJE => 5, LiptocueconPeer::CODUNISTE => 6, LiptocueconPeer::FECREG => 7, LiptocueconPeer::DIAS => 8, LiptocueconPeer::FECVEN => 9, LiptocueconPeer::DETRECOMEN => 10, LiptocueconPeer::NUMRECOFE => 11, LiptocueconPeer::CODPRO => 12, LiptocueconPeer::RESOLU => 13, LiptocueconPeer::FECREL => 14, LiptocueconPeer::DECRET => 15, LiptocueconPeer::FECDEC => 16, LiptocueconPeer::DETDECRET => 17, LiptocueconPeer::DOCANE1 => 18, LiptocueconPeer::DOCANE2 => 19, LiptocueconPeer::DOCANE3 => 20, LiptocueconPeer::PREPOR => 21, LiptocueconPeer::CARGOPRE => 22, LiptocueconPeer::LISICACT_ID => 23, LiptocueconPeer::DETDECMOD => 24, LiptocueconPeer::ANAPOR => 25, LiptocueconPeer::CARGOANA => 26, LiptocueconPeer::STATUS => 27, LiptocueconPeer::ID => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('numptocuecon' => 0, 'numplie' => 1, 'numexp' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'detrecomen' => 10, 'numrecofe' => 11, 'codpro' => 12, 'resolu' => 13, 'fecrel' => 14, 'decret' => 15, 'fecdec' => 16, 'detdecret' => 17, 'docane1' => 18, 'docane2' => 19, 'docane3' => 20, 'prepor' => 21, 'cargopre' => 22, 'lisicact_id' => 23, 'detdecmod' => 24, 'anapor' => 25, 'cargoana' => 26, 'status' => 27, 'id' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiptocueconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiptocueconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiptocueconPeer::getTableMap();
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
		return str_replace(LiptocueconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiptocueconPeer::NUMPTOCUECON);

		$criteria->addSelectColumn(LiptocueconPeer::NUMPLIE);

		$criteria->addSelectColumn(LiptocueconPeer::NUMEXP);

		$criteria->addSelectColumn(LiptocueconPeer::CODEMPADM);

		$criteria->addSelectColumn(LiptocueconPeer::CODUNIADM);

		$criteria->addSelectColumn(LiptocueconPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiptocueconPeer::CODUNISTE);

		$criteria->addSelectColumn(LiptocueconPeer::FECREG);

		$criteria->addSelectColumn(LiptocueconPeer::DIAS);

		$criteria->addSelectColumn(LiptocueconPeer::FECVEN);

		$criteria->addSelectColumn(LiptocueconPeer::DETRECOMEN);

		$criteria->addSelectColumn(LiptocueconPeer::NUMRECOFE);

		$criteria->addSelectColumn(LiptocueconPeer::CODPRO);

		$criteria->addSelectColumn(LiptocueconPeer::RESOLU);

		$criteria->addSelectColumn(LiptocueconPeer::FECREL);

		$criteria->addSelectColumn(LiptocueconPeer::DECRET);

		$criteria->addSelectColumn(LiptocueconPeer::FECDEC);

		$criteria->addSelectColumn(LiptocueconPeer::DETDECRET);

		$criteria->addSelectColumn(LiptocueconPeer::DOCANE1);

		$criteria->addSelectColumn(LiptocueconPeer::DOCANE2);

		$criteria->addSelectColumn(LiptocueconPeer::DOCANE3);

		$criteria->addSelectColumn(LiptocueconPeer::PREPOR);

		$criteria->addSelectColumn(LiptocueconPeer::CARGOPRE);

		$criteria->addSelectColumn(LiptocueconPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiptocueconPeer::DETDECMOD);

		$criteria->addSelectColumn(LiptocueconPeer::ANAPOR);

		$criteria->addSelectColumn(LiptocueconPeer::CARGOANA);

		$criteria->addSelectColumn(LiptocueconPeer::STATUS);

		$criteria->addSelectColumn(LiptocueconPeer::ID);

	}

	const COUNT = 'COUNT(liptocuecon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liptocuecon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiptocueconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiptocueconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiptocueconPeer::doSelectRS($criteria, $con);
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
		$objects = LiptocueconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiptocueconPeer::populateObjects(LiptocueconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiptocueconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiptocueconPeer::getOMClass();
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
			$criteria->addSelectColumn(LiptocueconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiptocueconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiptocueconPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiptocueconPeer::doSelectRS($criteria, $con);
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

		LiptocueconPeer::addSelectColumns($c);
		$startcol = (LiptocueconPeer::NUM_COLUMNS - LiptocueconPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiptocueconPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiptocueconPeer::getOMClass();

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
										$temp_obj2->addLiptocuecon($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiptocuecons();
				$obj2->addLiptocuecon($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiptocueconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiptocueconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiptocueconPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiptocueconPeer::doSelectRS($criteria, $con);
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

		LiptocueconPeer::addSelectColumns($c);
		$startcol2 = (LiptocueconPeer::NUM_COLUMNS - LiptocueconPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiptocueconPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiptocueconPeer::getOMClass();


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
						$temp_obj2->addLiptocuecon($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiptocuecons();
					$obj2->addLiptocuecon($obj1);
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
		return LiptocueconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiptocueconPeer::ID); 

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
			$comparison = $criteria->getComparison(LiptocueconPeer::ID);
			$selectCriteria->add(LiptocueconPeer::ID, $criteria->remove(LiptocueconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiptocueconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiptocueconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liptocuecon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiptocueconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liptocuecon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiptocueconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiptocueconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiptocueconPeer::DATABASE_NAME, LiptocueconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiptocueconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiptocueconPeer::DATABASE_NAME);

		$criteria->add(LiptocueconPeer::ID, $pk);


		$v = LiptocueconPeer::doSelect($criteria, $con);

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
			$criteria->add(LiptocueconPeer::ID, $pks, Criteria::IN);
			$objs = LiptocueconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiptocueconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiptocueconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiptocueconMapBuilder');
}
