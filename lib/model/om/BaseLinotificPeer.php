<?php


abstract class BaseLinotificPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'linotific';

	
	const CLASS_DEFAULT = 'lib.model.Linotific';

	
	const NUM_COLUMNS = 25;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMNOTIF = 'linotific.NUMNOTIF';

	
	const NUMPTOCUECON = 'linotific.NUMPTOCUECON';

	
	const NUMPLIE = 'linotific.NUMPLIE';

	
	const NUMEXP = 'linotific.NUMEXP';

	
	const CODEMPADM = 'linotific.CODEMPADM';

	
	const CODUNIADM = 'linotific.CODUNIADM';

	
	const CODEMPEJE = 'linotific.CODEMPEJE';

	
	const CODUNISTE = 'linotific.CODUNISTE';

	
	const FECREG = 'linotific.FECREG';

	
	const DIAS = 'linotific.DIAS';

	
	const FECVEN = 'linotific.FECVEN';

	
	const DETRECOMEN = 'linotific.DETRECOMEN';

	
	const CODPRO = 'linotific.CODPRO';

	
	const DIRENVCOR = 'linotific.DIRENVCOR';

	
	const DOCANE1 = 'linotific.DOCANE1';

	
	const DOCANE2 = 'linotific.DOCANE2';

	
	const DOCANE3 = 'linotific.DOCANE3';

	
	const PREPOR = 'linotific.PREPOR';

	
	const CARGOPRE = 'linotific.CARGOPRE';

	
	const LISICACT_ID = 'linotific.LISICACT_ID';

	
	const DETDECMOD = 'linotific.DETDECMOD';

	
	const ANAPOR = 'linotific.ANAPOR';

	
	const CARGOANA = 'linotific.CARGOANA';

	
	const STATUS = 'linotific.STATUS';

	
	const ID = 'linotific.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numnotif', 'Numptocuecon', 'Numplie', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Detrecomen', 'Codpro', 'Direnvcor', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Cargopre', 'LisicactId', 'Detdecmod', 'Anapor', 'Cargoana', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LinotificPeer::NUMNOTIF, LinotificPeer::NUMPTOCUECON, LinotificPeer::NUMPLIE, LinotificPeer::NUMEXP, LinotificPeer::CODEMPADM, LinotificPeer::CODUNIADM, LinotificPeer::CODEMPEJE, LinotificPeer::CODUNISTE, LinotificPeer::FECREG, LinotificPeer::DIAS, LinotificPeer::FECVEN, LinotificPeer::DETRECOMEN, LinotificPeer::CODPRO, LinotificPeer::DIRENVCOR, LinotificPeer::DOCANE1, LinotificPeer::DOCANE2, LinotificPeer::DOCANE3, LinotificPeer::PREPOR, LinotificPeer::CARGOPRE, LinotificPeer::LISICACT_ID, LinotificPeer::DETDECMOD, LinotificPeer::ANAPOR, LinotificPeer::CARGOANA, LinotificPeer::STATUS, LinotificPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numnotif', 'numptocuecon', 'numplie', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'detrecomen', 'codpro', 'direnvcor', 'docane1', 'docane2', 'docane3', 'prepor', 'cargopre', 'lisicact_id', 'detdecmod', 'anapor', 'cargoana', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numnotif' => 0, 'Numptocuecon' => 1, 'Numplie' => 2, 'Numexp' => 3, 'Codempadm' => 4, 'Coduniadm' => 5, 'Codempeje' => 6, 'Coduniste' => 7, 'Fecreg' => 8, 'Dias' => 9, 'Fecven' => 10, 'Detrecomen' => 11, 'Codpro' => 12, 'Direnvcor' => 13, 'Docane1' => 14, 'Docane2' => 15, 'Docane3' => 16, 'Prepor' => 17, 'Cargopre' => 18, 'LisicactId' => 19, 'Detdecmod' => 20, 'Anapor' => 21, 'Cargoana' => 22, 'Status' => 23, 'Id' => 24, ),
		BasePeer::TYPE_COLNAME => array (LinotificPeer::NUMNOTIF => 0, LinotificPeer::NUMPTOCUECON => 1, LinotificPeer::NUMPLIE => 2, LinotificPeer::NUMEXP => 3, LinotificPeer::CODEMPADM => 4, LinotificPeer::CODUNIADM => 5, LinotificPeer::CODEMPEJE => 6, LinotificPeer::CODUNISTE => 7, LinotificPeer::FECREG => 8, LinotificPeer::DIAS => 9, LinotificPeer::FECVEN => 10, LinotificPeer::DETRECOMEN => 11, LinotificPeer::CODPRO => 12, LinotificPeer::DIRENVCOR => 13, LinotificPeer::DOCANE1 => 14, LinotificPeer::DOCANE2 => 15, LinotificPeer::DOCANE3 => 16, LinotificPeer::PREPOR => 17, LinotificPeer::CARGOPRE => 18, LinotificPeer::LISICACT_ID => 19, LinotificPeer::DETDECMOD => 20, LinotificPeer::ANAPOR => 21, LinotificPeer::CARGOANA => 22, LinotificPeer::STATUS => 23, LinotificPeer::ID => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('numnotif' => 0, 'numptocuecon' => 1, 'numplie' => 2, 'numexp' => 3, 'codempadm' => 4, 'coduniadm' => 5, 'codempeje' => 6, 'coduniste' => 7, 'fecreg' => 8, 'dias' => 9, 'fecven' => 10, 'detrecomen' => 11, 'codpro' => 12, 'direnvcor' => 13, 'docane1' => 14, 'docane2' => 15, 'docane3' => 16, 'prepor' => 17, 'cargopre' => 18, 'lisicact_id' => 19, 'detdecmod' => 20, 'anapor' => 21, 'cargoana' => 22, 'status' => 23, 'id' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LinotificMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LinotificMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LinotificPeer::getTableMap();
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
		return str_replace(LinotificPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LinotificPeer::NUMNOTIF);

		$criteria->addSelectColumn(LinotificPeer::NUMPTOCUECON);

		$criteria->addSelectColumn(LinotificPeer::NUMPLIE);

		$criteria->addSelectColumn(LinotificPeer::NUMEXP);

		$criteria->addSelectColumn(LinotificPeer::CODEMPADM);

		$criteria->addSelectColumn(LinotificPeer::CODUNIADM);

		$criteria->addSelectColumn(LinotificPeer::CODEMPEJE);

		$criteria->addSelectColumn(LinotificPeer::CODUNISTE);

		$criteria->addSelectColumn(LinotificPeer::FECREG);

		$criteria->addSelectColumn(LinotificPeer::DIAS);

		$criteria->addSelectColumn(LinotificPeer::FECVEN);

		$criteria->addSelectColumn(LinotificPeer::DETRECOMEN);

		$criteria->addSelectColumn(LinotificPeer::CODPRO);

		$criteria->addSelectColumn(LinotificPeer::DIRENVCOR);

		$criteria->addSelectColumn(LinotificPeer::DOCANE1);

		$criteria->addSelectColumn(LinotificPeer::DOCANE2);

		$criteria->addSelectColumn(LinotificPeer::DOCANE3);

		$criteria->addSelectColumn(LinotificPeer::PREPOR);

		$criteria->addSelectColumn(LinotificPeer::CARGOPRE);

		$criteria->addSelectColumn(LinotificPeer::LISICACT_ID);

		$criteria->addSelectColumn(LinotificPeer::DETDECMOD);

		$criteria->addSelectColumn(LinotificPeer::ANAPOR);

		$criteria->addSelectColumn(LinotificPeer::CARGOANA);

		$criteria->addSelectColumn(LinotificPeer::STATUS);

		$criteria->addSelectColumn(LinotificPeer::ID);

	}

	const COUNT = 'COUNT(linotific.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT linotific.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinotificPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinotificPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LinotificPeer::doSelectRS($criteria, $con);
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
		$objects = LinotificPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LinotificPeer::populateObjects(LinotificPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LinotificPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LinotificPeer::getOMClass();
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
			$criteria->addSelectColumn(LinotificPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinotificPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinotificPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LinotificPeer::doSelectRS($criteria, $con);
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

		LinotificPeer::addSelectColumns($c);
		$startcol = (LinotificPeer::NUM_COLUMNS - LinotificPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LinotificPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinotificPeer::getOMClass();

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
										$temp_obj2->addLinotific($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLinotifics();
				$obj2->addLinotific($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinotificPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinotificPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LinotificPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LinotificPeer::doSelectRS($criteria, $con);
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

		LinotificPeer::addSelectColumns($c);
		$startcol2 = (LinotificPeer::NUM_COLUMNS - LinotificPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LinotificPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinotificPeer::getOMClass();


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
						$temp_obj2->addLinotific($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLinotifics();
					$obj2->addLinotific($obj1);
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
		return LinotificPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LinotificPeer::ID); 

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
			$comparison = $criteria->getComparison(LinotificPeer::ID);
			$selectCriteria->add(LinotificPeer::ID, $criteria->remove(LinotificPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LinotificPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LinotificPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Linotific) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LinotificPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Linotific $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LinotificPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LinotificPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LinotificPeer::DATABASE_NAME, LinotificPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LinotificPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LinotificPeer::DATABASE_NAME);

		$criteria->add(LinotificPeer::ID, $pk);


		$v = LinotificPeer::doSelect($criteria, $con);

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
			$criteria->add(LinotificPeer::ID, $pks, Criteria::IN);
			$objs = LinotificPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLinotificPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LinotificMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LinotificMapBuilder');
}
