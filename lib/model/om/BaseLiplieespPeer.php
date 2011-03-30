<?php


abstract class BaseLiplieespPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liplieesp';

	
	const CLASS_DEFAULT = 'lib.model.Liplieesp';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'liplieesp.NUMPLIE';

	
	const NUMCOMINT = 'liplieesp.NUMCOMINT';

	
	const NUMEXP = 'liplieesp.NUMEXP';

	
	const CODEMPADM = 'liplieesp.CODEMPADM';

	
	const CODUNIADM = 'liplieesp.CODUNIADM';

	
	const CODEMPEJE = 'liplieesp.CODEMPEJE';

	
	const CODUNISTE = 'liplieesp.CODUNISTE';

	
	const FECREG = 'liplieesp.FECREG';

	
	const DIAS = 'liplieesp.DIAS';

	
	const FECVEN = 'liplieesp.FECVEN';

	
	const IDIOMA = 'liplieesp.IDIOMA';

	
	const COSPLIE = 'liplieesp.COSPLIE';

	
	const RESOLU = 'liplieesp.RESOLU';

	
	const FECREL = 'liplieesp.FECREL';

	
	const DECRET = 'liplieesp.DECRET';

	
	const FECDEC = 'liplieesp.FECDEC';

	
	const DESCRIP = 'liplieesp.DESCRIP';

	
	const DOCANE1 = 'liplieesp.DOCANE1';

	
	const DOCANE2 = 'liplieesp.DOCANE2';

	
	const DOCANE3 = 'liplieesp.DOCANE3';

	
	const PREPOR = 'liplieesp.PREPOR';

	
	const PREPORCAR = 'liplieesp.PREPORCAR';

	
	const LISICACT_ID = 'liplieesp.LISICACT_ID';

	
	const DETDECMOD = 'liplieesp.DETDECMOD';

	
	const ANAPOR = 'liplieesp.ANAPOR';

	
	const ANAPORCAR = 'liplieesp.ANAPORCAR';

	
	const STATUS = 'liplieesp.STATUS';

	
	const ID = 'liplieesp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numcomint', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Idioma', 'Cosplie', 'Resolu', 'Fecrel', 'Decret', 'Fecdec', 'Descrip', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Preporcar', 'LisicactId', 'Detdecmod', 'Anapor', 'Anaporcar', 'Status', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiplieespPeer::NUMPLIE, LiplieespPeer::NUMCOMINT, LiplieespPeer::NUMEXP, LiplieespPeer::CODEMPADM, LiplieespPeer::CODUNIADM, LiplieespPeer::CODEMPEJE, LiplieespPeer::CODUNISTE, LiplieespPeer::FECREG, LiplieespPeer::DIAS, LiplieespPeer::FECVEN, LiplieespPeer::IDIOMA, LiplieespPeer::COSPLIE, LiplieespPeer::RESOLU, LiplieespPeer::FECREL, LiplieespPeer::DECRET, LiplieespPeer::FECDEC, LiplieespPeer::DESCRIP, LiplieespPeer::DOCANE1, LiplieespPeer::DOCANE2, LiplieespPeer::DOCANE3, LiplieespPeer::PREPOR, LiplieespPeer::PREPORCAR, LiplieespPeer::LISICACT_ID, LiplieespPeer::DETDECMOD, LiplieespPeer::ANAPOR, LiplieespPeer::ANAPORCAR, LiplieespPeer::STATUS, LiplieespPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numcomint', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'idioma', 'cosplie', 'resolu', 'fecrel', 'decret', 'fecdec', 'descrip', 'docane1', 'docane2', 'docane3', 'prepor', 'preporcar', 'lisicact_id', 'detdecmod', 'anapor', 'anaporcar', 'status', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numcomint' => 1, 'Numexp' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Idioma' => 10, 'Cosplie' => 11, 'Resolu' => 12, 'Fecrel' => 13, 'Decret' => 14, 'Fecdec' => 15, 'Descrip' => 16, 'Docane1' => 17, 'Docane2' => 18, 'Docane3' => 19, 'Prepor' => 20, 'Preporcar' => 21, 'LisicactId' => 22, 'Detdecmod' => 23, 'Anapor' => 24, 'Anaporcar' => 25, 'Status' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (LiplieespPeer::NUMPLIE => 0, LiplieespPeer::NUMCOMINT => 1, LiplieespPeer::NUMEXP => 2, LiplieespPeer::CODEMPADM => 3, LiplieespPeer::CODUNIADM => 4, LiplieespPeer::CODEMPEJE => 5, LiplieespPeer::CODUNISTE => 6, LiplieespPeer::FECREG => 7, LiplieespPeer::DIAS => 8, LiplieespPeer::FECVEN => 9, LiplieespPeer::IDIOMA => 10, LiplieespPeer::COSPLIE => 11, LiplieespPeer::RESOLU => 12, LiplieespPeer::FECREL => 13, LiplieespPeer::DECRET => 14, LiplieespPeer::FECDEC => 15, LiplieespPeer::DESCRIP => 16, LiplieespPeer::DOCANE1 => 17, LiplieespPeer::DOCANE2 => 18, LiplieespPeer::DOCANE3 => 19, LiplieespPeer::PREPOR => 20, LiplieespPeer::PREPORCAR => 21, LiplieespPeer::LISICACT_ID => 22, LiplieespPeer::DETDECMOD => 23, LiplieespPeer::ANAPOR => 24, LiplieespPeer::ANAPORCAR => 25, LiplieespPeer::STATUS => 26, LiplieespPeer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numcomint' => 1, 'numexp' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'idioma' => 10, 'cosplie' => 11, 'resolu' => 12, 'fecrel' => 13, 'decret' => 14, 'fecdec' => 15, 'descrip' => 16, 'docane1' => 17, 'docane2' => 18, 'docane3' => 19, 'prepor' => 20, 'preporcar' => 21, 'lisicact_id' => 22, 'detdecmod' => 23, 'anapor' => 24, 'anaporcar' => 25, 'status' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiplieespMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiplieespMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiplieespPeer::getTableMap();
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
		return str_replace(LiplieespPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiplieespPeer::NUMPLIE);

		$criteria->addSelectColumn(LiplieespPeer::NUMCOMINT);

		$criteria->addSelectColumn(LiplieespPeer::NUMEXP);

		$criteria->addSelectColumn(LiplieespPeer::CODEMPADM);

		$criteria->addSelectColumn(LiplieespPeer::CODUNIADM);

		$criteria->addSelectColumn(LiplieespPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiplieespPeer::CODUNISTE);

		$criteria->addSelectColumn(LiplieespPeer::FECREG);

		$criteria->addSelectColumn(LiplieespPeer::DIAS);

		$criteria->addSelectColumn(LiplieespPeer::FECVEN);

		$criteria->addSelectColumn(LiplieespPeer::IDIOMA);

		$criteria->addSelectColumn(LiplieespPeer::COSPLIE);

		$criteria->addSelectColumn(LiplieespPeer::RESOLU);

		$criteria->addSelectColumn(LiplieespPeer::FECREL);

		$criteria->addSelectColumn(LiplieespPeer::DECRET);

		$criteria->addSelectColumn(LiplieespPeer::FECDEC);

		$criteria->addSelectColumn(LiplieespPeer::DESCRIP);

		$criteria->addSelectColumn(LiplieespPeer::DOCANE1);

		$criteria->addSelectColumn(LiplieespPeer::DOCANE2);

		$criteria->addSelectColumn(LiplieespPeer::DOCANE3);

		$criteria->addSelectColumn(LiplieespPeer::PREPOR);

		$criteria->addSelectColumn(LiplieespPeer::PREPORCAR);

		$criteria->addSelectColumn(LiplieespPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiplieespPeer::DETDECMOD);

		$criteria->addSelectColumn(LiplieespPeer::ANAPOR);

		$criteria->addSelectColumn(LiplieespPeer::ANAPORCAR);

		$criteria->addSelectColumn(LiplieespPeer::STATUS);

		$criteria->addSelectColumn(LiplieespPeer::ID);

	}

	const COUNT = 'COUNT(liplieesp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liplieesp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiplieespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiplieespPeer::doSelectRS($criteria, $con);
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
		$objects = LiplieespPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiplieespPeer::populateObjects(LiplieespPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiplieespPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiplieespPeer::getOMClass();
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
			$criteria->addSelectColumn(LiplieespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiplieespPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiplieespPeer::doSelectRS($criteria, $con);
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

		LiplieespPeer::addSelectColumns($c);
		$startcol = (LiplieespPeer::NUM_COLUMNS - LiplieespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiplieespPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiplieespPeer::getOMClass();

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
										$temp_obj2->addLiplieesp($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiplieesps();
				$obj2->addLiplieesp($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiplieespPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiplieespPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiplieespPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiplieespPeer::doSelectRS($criteria, $con);
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

		LiplieespPeer::addSelectColumns($c);
		$startcol2 = (LiplieespPeer::NUM_COLUMNS - LiplieespPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiplieespPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiplieespPeer::getOMClass();


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
						$temp_obj2->addLiplieesp($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiplieesps();
					$obj2->addLiplieesp($obj1);
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
		return LiplieespPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiplieespPeer::ID); 

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
			$comparison = $criteria->getComparison(LiplieespPeer::ID);
			$selectCriteria->add(LiplieespPeer::ID, $criteria->remove(LiplieespPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiplieespPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiplieespPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liplieesp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiplieespPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liplieesp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiplieespPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiplieespPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiplieespPeer::DATABASE_NAME, LiplieespPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiplieespPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiplieespPeer::DATABASE_NAME);

		$criteria->add(LiplieespPeer::ID, $pk);


		$v = LiplieespPeer::doSelect($criteria, $con);

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
			$criteria->add(LiplieespPeer::ID, $pks, Criteria::IN);
			$objs = LiplieespPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiplieespPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiplieespMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiplieespMapBuilder');
}
