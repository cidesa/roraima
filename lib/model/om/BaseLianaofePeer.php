<?php


abstract class BaseLianaofePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'lianaofe';

	
	const CLASS_DEFAULT = 'lib.model.Lianaofe';

	
	const NUM_COLUMNS = 23;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMANAOFE = 'lianaofe.NUMANAOFE';

	
	const NUMPLIE = 'lianaofe.NUMPLIE';

	
	const NUMEXP = 'lianaofe.NUMEXP';

	
	const CODEMPADM = 'lianaofe.CODEMPADM';

	
	const CODUNIADM = 'lianaofe.CODUNIADM';

	
	const CODEMPEJE = 'lianaofe.CODEMPEJE';

	
	const CODUNISTE = 'lianaofe.CODUNISTE';

	
	const FECREG = 'lianaofe.FECREG';

	
	const DIAS = 'lianaofe.DIAS';

	
	const FECVEN = 'lianaofe.FECVEN';

	
	const NUMOFE = 'lianaofe.NUMOFE';

	
	const DOCANE1 = 'lianaofe.DOCANE1';

	
	const DOCANE2 = 'lianaofe.DOCANE2';

	
	const DOCANE3 = 'lianaofe.DOCANE3';

	
	const DOCANE4 = 'lianaofe.DOCANE4';

	
	const PREPOR = 'lianaofe.PREPOR';

	
	const CARGOPRE = 'lianaofe.CARGOPRE';

	
	const LISICACT_ID = 'lianaofe.LISICACT_ID';

	
	const DETDECMOD = 'lianaofe.DETDECMOD';

	
	const ANAPOR = 'lianaofe.ANAPOR';

	
	const CARGOANA = 'lianaofe.CARGOANA';

	
	const STATUS = 'lianaofe.STATUS';

	
	const ID = 'lianaofe.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numanaofe', 'Numplie', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Numofe', 'Docane1', 'Docane2', 'Docane3', 'Docane4', 'Prepor', 'Cargopre', 'LisicactId', 'Detdecmod', 'Anapor', 'Cargoana', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LianaofePeer::NUMANAOFE, LianaofePeer::NUMPLIE, LianaofePeer::NUMEXP, LianaofePeer::CODEMPADM, LianaofePeer::CODUNIADM, LianaofePeer::CODEMPEJE, LianaofePeer::CODUNISTE, LianaofePeer::FECREG, LianaofePeer::DIAS, LianaofePeer::FECVEN, LianaofePeer::NUMOFE, LianaofePeer::DOCANE1, LianaofePeer::DOCANE2, LianaofePeer::DOCANE3, LianaofePeer::DOCANE4, LianaofePeer::PREPOR, LianaofePeer::CARGOPRE, LianaofePeer::LISICACT_ID, LianaofePeer::DETDECMOD, LianaofePeer::ANAPOR, LianaofePeer::CARGOANA, LianaofePeer::STATUS, LianaofePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numanaofe', 'numplie', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'numofe', 'docane1', 'docane2', 'docane3', 'docane4', 'prepor', 'cargopre', 'lisicact_id', 'detdecmod', 'anapor', 'cargoana', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numanaofe' => 0, 'Numplie' => 1, 'Numexp' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Numofe' => 10, 'Docane1' => 11, 'Docane2' => 12, 'Docane3' => 13, 'Docane4' => 14, 'Prepor' => 15, 'Cargopre' => 16, 'LisicactId' => 17, 'Detdecmod' => 18, 'Anapor' => 19, 'Cargoana' => 20, 'Status' => 21, 'Id' => 22, ),
		BasePeer::TYPE_COLNAME => array (LianaofePeer::NUMANAOFE => 0, LianaofePeer::NUMPLIE => 1, LianaofePeer::NUMEXP => 2, LianaofePeer::CODEMPADM => 3, LianaofePeer::CODUNIADM => 4, LianaofePeer::CODEMPEJE => 5, LianaofePeer::CODUNISTE => 6, LianaofePeer::FECREG => 7, LianaofePeer::DIAS => 8, LianaofePeer::FECVEN => 9, LianaofePeer::NUMOFE => 10, LianaofePeer::DOCANE1 => 11, LianaofePeer::DOCANE2 => 12, LianaofePeer::DOCANE3 => 13, LianaofePeer::DOCANE4 => 14, LianaofePeer::PREPOR => 15, LianaofePeer::CARGOPRE => 16, LianaofePeer::LISICACT_ID => 17, LianaofePeer::DETDECMOD => 18, LianaofePeer::ANAPOR => 19, LianaofePeer::CARGOANA => 20, LianaofePeer::STATUS => 21, LianaofePeer::ID => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('numanaofe' => 0, 'numplie' => 1, 'numexp' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'numofe' => 10, 'docane1' => 11, 'docane2' => 12, 'docane3' => 13, 'docane4' => 14, 'prepor' => 15, 'cargopre' => 16, 'lisicact_id' => 17, 'detdecmod' => 18, 'anapor' => 19, 'cargoana' => 20, 'status' => 21, 'id' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LianaofeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LianaofeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LianaofePeer::getTableMap();
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
		return str_replace(LianaofePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LianaofePeer::NUMANAOFE);

		$criteria->addSelectColumn(LianaofePeer::NUMPLIE);

		$criteria->addSelectColumn(LianaofePeer::NUMEXP);

		$criteria->addSelectColumn(LianaofePeer::CODEMPADM);

		$criteria->addSelectColumn(LianaofePeer::CODUNIADM);

		$criteria->addSelectColumn(LianaofePeer::CODEMPEJE);

		$criteria->addSelectColumn(LianaofePeer::CODUNISTE);

		$criteria->addSelectColumn(LianaofePeer::FECREG);

		$criteria->addSelectColumn(LianaofePeer::DIAS);

		$criteria->addSelectColumn(LianaofePeer::FECVEN);

		$criteria->addSelectColumn(LianaofePeer::NUMOFE);

		$criteria->addSelectColumn(LianaofePeer::DOCANE1);

		$criteria->addSelectColumn(LianaofePeer::DOCANE2);

		$criteria->addSelectColumn(LianaofePeer::DOCANE3);

		$criteria->addSelectColumn(LianaofePeer::DOCANE4);

		$criteria->addSelectColumn(LianaofePeer::PREPOR);

		$criteria->addSelectColumn(LianaofePeer::CARGOPRE);

		$criteria->addSelectColumn(LianaofePeer::LISICACT_ID);

		$criteria->addSelectColumn(LianaofePeer::DETDECMOD);

		$criteria->addSelectColumn(LianaofePeer::ANAPOR);

		$criteria->addSelectColumn(LianaofePeer::CARGOANA);

		$criteria->addSelectColumn(LianaofePeer::STATUS);

		$criteria->addSelectColumn(LianaofePeer::ID);

	}

	const COUNT = 'COUNT(lianaofe.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT lianaofe.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LianaofePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LianaofePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LianaofePeer::doSelectRS($criteria, $con);
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
		$objects = LianaofePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LianaofePeer::populateObjects(LianaofePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LianaofePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LianaofePeer::getOMClass();
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
			$criteria->addSelectColumn(LianaofePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LianaofePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LianaofePeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LianaofePeer::doSelectRS($criteria, $con);
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

		LianaofePeer::addSelectColumns($c);
		$startcol = (LianaofePeer::NUM_COLUMNS - LianaofePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LianaofePeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LianaofePeer::getOMClass();

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
										$temp_obj2->addLianaofe($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLianaofes();
				$obj2->addLianaofe($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LianaofePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LianaofePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LianaofePeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LianaofePeer::doSelectRS($criteria, $con);
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

		LianaofePeer::addSelectColumns($c);
		$startcol2 = (LianaofePeer::NUM_COLUMNS - LianaofePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LianaofePeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LianaofePeer::getOMClass();


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
						$temp_obj2->addLianaofe($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLianaofes();
					$obj2->addLianaofe($obj1);
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
		return LianaofePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LianaofePeer::ID); 

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
			$comparison = $criteria->getComparison(LianaofePeer::ID);
			$selectCriteria->add(LianaofePeer::ID, $criteria->remove(LianaofePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LianaofePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LianaofePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Lianaofe) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LianaofePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Lianaofe $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LianaofePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LianaofePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LianaofePeer::DATABASE_NAME, LianaofePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LianaofePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LianaofePeer::DATABASE_NAME);

		$criteria->add(LianaofePeer::ID, $pk);


		$v = LianaofePeer::doSelect($criteria, $con);

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
			$criteria->add(LianaofePeer::ID, $pks, Criteria::IN);
			$objs = LianaofePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLianaofePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LianaofeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LianaofeMapBuilder');
}
