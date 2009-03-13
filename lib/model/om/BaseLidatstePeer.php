<?php


abstract class BaseLidatstePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lidatste';

	
	const CLASS_DEFAULT = 'lib.model.Lidatste';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODUNISTE = 'lidatste.CODUNISTE';

	
	const DESUNISTE = 'lidatste.DESUNISTE';

	
	const LITIPSTE_ID = 'lidatste.LITIPSTE_ID';

	
	const DIRSTE = 'lidatste.DIRSTE';

	
	const TELSTE = 'lidatste.TELSTE';

	
	const FAXSTE = 'lidatste.FAXSTE';

	
	const EMASTE = 'lidatste.EMASTE';

	
	const CODEMP = 'lidatste.CODEMP';

	
	const CODPAI = 'lidatste.CODPAI';

	
	const CODEDO = 'lidatste.CODEDO';

	
	const CODMUN = 'lidatste.CODMUN';

	
	const CODPAR = 'lidatste.CODPAR';

	
	const CODSEC = 'lidatste.CODSEC';

	
	const ID = 'lidatste.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coduniste', 'Desuniste', 'LitipsteId', 'Dirste', 'Telste', 'Faxste', 'Emaste', 'Codemp', 'Codpai', 'Codedo', 'Codmun', 'Codpar', 'Codsec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LidatstePeer::CODUNISTE, LidatstePeer::DESUNISTE, LidatstePeer::LITIPSTE_ID, LidatstePeer::DIRSTE, LidatstePeer::TELSTE, LidatstePeer::FAXSTE, LidatstePeer::EMASTE, LidatstePeer::CODEMP, LidatstePeer::CODPAI, LidatstePeer::CODEDO, LidatstePeer::CODMUN, LidatstePeer::CODPAR, LidatstePeer::CODSEC, LidatstePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coduniste', 'desuniste', 'litipste_id', 'dirste', 'telste', 'faxste', 'emaste', 'codemp', 'codpai', 'codedo', 'codmun', 'codpar', 'codsec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coduniste' => 0, 'Desuniste' => 1, 'LitipsteId' => 2, 'Dirste' => 3, 'Telste' => 4, 'Faxste' => 5, 'Emaste' => 6, 'Codemp' => 7, 'Codpai' => 8, 'Codedo' => 9, 'Codmun' => 10, 'Codpar' => 11, 'Codsec' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (LidatstePeer::CODUNISTE => 0, LidatstePeer::DESUNISTE => 1, LidatstePeer::LITIPSTE_ID => 2, LidatstePeer::DIRSTE => 3, LidatstePeer::TELSTE => 4, LidatstePeer::FAXSTE => 5, LidatstePeer::EMASTE => 6, LidatstePeer::CODEMP => 7, LidatstePeer::CODPAI => 8, LidatstePeer::CODEDO => 9, LidatstePeer::CODMUN => 10, LidatstePeer::CODPAR => 11, LidatstePeer::CODSEC => 12, LidatstePeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('coduniste' => 0, 'desuniste' => 1, 'litipste_id' => 2, 'dirste' => 3, 'telste' => 4, 'faxste' => 5, 'emaste' => 6, 'codemp' => 7, 'codpai' => 8, 'codedo' => 9, 'codmun' => 10, 'codpar' => 11, 'codsec' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LidatsteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LidatsteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LidatstePeer::getTableMap();
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
		return str_replace(LidatstePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LidatstePeer::CODUNISTE);

		$criteria->addSelectColumn(LidatstePeer::DESUNISTE);

		$criteria->addSelectColumn(LidatstePeer::LITIPSTE_ID);

		$criteria->addSelectColumn(LidatstePeer::DIRSTE);

		$criteria->addSelectColumn(LidatstePeer::TELSTE);

		$criteria->addSelectColumn(LidatstePeer::FAXSTE);

		$criteria->addSelectColumn(LidatstePeer::EMASTE);

		$criteria->addSelectColumn(LidatstePeer::CODEMP);

		$criteria->addSelectColumn(LidatstePeer::CODPAI);

		$criteria->addSelectColumn(LidatstePeer::CODEDO);

		$criteria->addSelectColumn(LidatstePeer::CODMUN);

		$criteria->addSelectColumn(LidatstePeer::CODPAR);

		$criteria->addSelectColumn(LidatstePeer::CODSEC);

		$criteria->addSelectColumn(LidatstePeer::ID);

	}

	const COUNT = 'COUNT(lidatste.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lidatste.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidatstePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidatstePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LidatstePeer::doSelectRS($criteria, $con);
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
		$objects = LidatstePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LidatstePeer::populateObjects(LidatstePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LidatstePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LidatstePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLitipste(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidatstePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidatstePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidatstePeer::LITIPSTE_ID, LitipstePeer::ID);

		$rs = LidatstePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLitipste(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LidatstePeer::addSelectColumns($c);
		$startcol = (LidatstePeer::NUM_COLUMNS - LidatstePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LitipstePeer::addSelectColumns($c);

		$c->addJoin(LidatstePeer::LITIPSTE_ID, LitipstePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidatstePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LitipstePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLitipste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLidatste($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLidatstes();
				$obj2->addLidatste($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LidatstePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LidatstePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LidatstePeer::LITIPSTE_ID, LitipstePeer::ID);

		$rs = LidatstePeer::doSelectRS($criteria, $con);
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

		LidatstePeer::addSelectColumns($c);
		$startcol2 = (LidatstePeer::NUM_COLUMNS - LidatstePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LitipstePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LitipstePeer::NUM_COLUMNS;

		$c->addJoin(LidatstePeer::LITIPSTE_ID, LitipstePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LidatstePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = LitipstePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLitipste(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLidatste($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLidatstes();
				$obj2->addLidatste($obj1);
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
		return LidatstePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LidatstePeer::ID); 

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
			$comparison = $criteria->getComparison(LidatstePeer::ID);
			$selectCriteria->add(LidatstePeer::ID, $criteria->remove(LidatstePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LidatstePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LidatstePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lidatste) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LidatstePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lidatste $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LidatstePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LidatstePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LidatstePeer::DATABASE_NAME, LidatstePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LidatstePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LidatstePeer::DATABASE_NAME);

		$criteria->add(LidatstePeer::ID, $pk);


		$v = LidatstePeer::doSelect($criteria, $con);

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
			$criteria->add(LidatstePeer::ID, $pks, Criteria::IN);
			$objs = LidatstePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLidatstePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LidatsteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LidatsteMapBuilder');
}
