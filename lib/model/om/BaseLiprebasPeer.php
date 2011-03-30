<?php


abstract class BaseLiprebasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liprebas';

	
	const CLASS_DEFAULT = 'lib.model.Liprebas';

	
	const NUM_COLUMNS = 32;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPRE = 'liprebas.NUMPRE';

	
	const CODEMPADM = 'liprebas.CODEMPADM';

	
	const CODUNIADM = 'liprebas.CODUNIADM';

	
	const CODEMPEJE = 'liprebas.CODEMPEJE';

	
	const CODUNISTE = 'liprebas.CODUNISTE';

	
	const CODCLACOMP = 'liprebas.CODCLACOMP';

	
	const FECREG = 'liprebas.FECREG';

	
	const HORREG = 'liprebas.HORREG';

	
	const DIAS = 'liprebas.DIAS';

	
	const FECVEN = 'liprebas.FECVEN';

	
	const TIPCOM = 'liprebas.TIPCOM';

	
	const CODPRE = 'liprebas.CODPRE';

	
	const NOMPRE = 'liprebas.NOMPRE';

	
	const CODPRIO = 'liprebas.CODPRIO';

	
	const DESPRO = 'liprebas.DESPRO';

	
	const MONPRE = 'liprebas.MONPRE';

	
	const CODMON = 'liprebas.CODMON';

	
	const VALCAM = 'liprebas.VALCAM';

	
	const FECCAM = 'liprebas.FECCAM';

	
	const DOCANE1 = 'liprebas.DOCANE1';

	
	const DOCANE2 = 'liprebas.DOCANE2';

	
	const DOCANE3 = 'liprebas.DOCANE3';

	
	const STATUS = 'liprebas.STATUS';

	
	const LISICACT_ID = 'liprebas.LISICACT_ID';

	
	const DETDECMOD = 'liprebas.DETDECMOD';

	
	const PREPOR = 'liprebas.PREPOR';

	
	const CARGOPRE = 'liprebas.CARGOPRE';

	
	const APRPOR = 'liprebas.APRPOR';

	
	const CARGOAPR = 'liprebas.CARGOAPR';

	
	const TIPCON = 'liprebas.TIPCON';

	
	const ACTO = 'liprebas.ACTO';

	
	const ID = 'liprebas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpre', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Codclacomp', 'Fecreg', 'Horreg', 'Dias', 'Fecven', 'Tipcom', 'Codpre', 'Nompre', 'Codprio', 'Despro', 'Monpre', 'Codmon', 'Valcam', 'Feccam', 'Docane1', 'Docane2', 'Docane3', 'Status', 'LisicactId', 'Detdecmod', 'Prepor', 'Cargopre', 'Aprpor', 'Cargoapr', 'Tipcon', 'Acto', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiprebasPeer::NUMPRE, LiprebasPeer::CODEMPADM, LiprebasPeer::CODUNIADM, LiprebasPeer::CODEMPEJE, LiprebasPeer::CODUNISTE, LiprebasPeer::CODCLACOMP, LiprebasPeer::FECREG, LiprebasPeer::HORREG, LiprebasPeer::DIAS, LiprebasPeer::FECVEN, LiprebasPeer::TIPCOM, LiprebasPeer::CODPRE, LiprebasPeer::NOMPRE, LiprebasPeer::CODPRIO, LiprebasPeer::DESPRO, LiprebasPeer::MONPRE, LiprebasPeer::CODMON, LiprebasPeer::VALCAM, LiprebasPeer::FECCAM, LiprebasPeer::DOCANE1, LiprebasPeer::DOCANE2, LiprebasPeer::DOCANE3, LiprebasPeer::STATUS, LiprebasPeer::LISICACT_ID, LiprebasPeer::DETDECMOD, LiprebasPeer::PREPOR, LiprebasPeer::CARGOPRE, LiprebasPeer::APRPOR, LiprebasPeer::CARGOAPR, LiprebasPeer::TIPCON, LiprebasPeer::ACTO, LiprebasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpre', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'codclacomp', 'fecreg', 'horreg', 'dias', 'fecven', 'tipcom', 'codpre', 'nompre', 'codprio', 'despro', 'monpre', 'codmon', 'valcam', 'feccam', 'docane1', 'docane2', 'docane3', 'status', 'lisicact_id', 'detdecmod', 'prepor', 'cargopre', 'aprpor', 'cargoapr', 'tipcon', 'acto', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpre' => 0, 'Codempadm' => 1, 'Coduniadm' => 2, 'Codempeje' => 3, 'Coduniste' => 4, 'Codclacomp' => 5, 'Fecreg' => 6, 'Horreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Tipcom' => 10, 'Codpre' => 11, 'Nompre' => 12, 'Codprio' => 13, 'Despro' => 14, 'Monpre' => 15, 'Codmon' => 16, 'Valcam' => 17, 'Feccam' => 18, 'Docane1' => 19, 'Docane2' => 20, 'Docane3' => 21, 'Status' => 22, 'LisicactId' => 23, 'Detdecmod' => 24, 'Prepor' => 25, 'Cargopre' => 26, 'Aprpor' => 27, 'Cargoapr' => 28, 'Tipcon' => 29, 'Acto' => 30, 'Id' => 31, ),
		BasePeer::TYPE_COLNAME => array (LiprebasPeer::NUMPRE => 0, LiprebasPeer::CODEMPADM => 1, LiprebasPeer::CODUNIADM => 2, LiprebasPeer::CODEMPEJE => 3, LiprebasPeer::CODUNISTE => 4, LiprebasPeer::CODCLACOMP => 5, LiprebasPeer::FECREG => 6, LiprebasPeer::HORREG => 7, LiprebasPeer::DIAS => 8, LiprebasPeer::FECVEN => 9, LiprebasPeer::TIPCOM => 10, LiprebasPeer::CODPRE => 11, LiprebasPeer::NOMPRE => 12, LiprebasPeer::CODPRIO => 13, LiprebasPeer::DESPRO => 14, LiprebasPeer::MONPRE => 15, LiprebasPeer::CODMON => 16, LiprebasPeer::VALCAM => 17, LiprebasPeer::FECCAM => 18, LiprebasPeer::DOCANE1 => 19, LiprebasPeer::DOCANE2 => 20, LiprebasPeer::DOCANE3 => 21, LiprebasPeer::STATUS => 22, LiprebasPeer::LISICACT_ID => 23, LiprebasPeer::DETDECMOD => 24, LiprebasPeer::PREPOR => 25, LiprebasPeer::CARGOPRE => 26, LiprebasPeer::APRPOR => 27, LiprebasPeer::CARGOAPR => 28, LiprebasPeer::TIPCON => 29, LiprebasPeer::ACTO => 30, LiprebasPeer::ID => 31, ),
		BasePeer::TYPE_FIELDNAME => array ('numpre' => 0, 'codempadm' => 1, 'coduniadm' => 2, 'codempeje' => 3, 'coduniste' => 4, 'codclacomp' => 5, 'fecreg' => 6, 'horreg' => 7, 'dias' => 8, 'fecven' => 9, 'tipcom' => 10, 'codpre' => 11, 'nompre' => 12, 'codprio' => 13, 'despro' => 14, 'monpre' => 15, 'codmon' => 16, 'valcam' => 17, 'feccam' => 18, 'docane1' => 19, 'docane2' => 20, 'docane3' => 21, 'status' => 22, 'lisicact_id' => 23, 'detdecmod' => 24, 'prepor' => 25, 'cargopre' => 26, 'aprpor' => 27, 'cargoapr' => 28, 'tipcon' => 29, 'acto' => 30, 'id' => 31, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiprebasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiprebasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiprebasPeer::getTableMap();
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
		return str_replace(LiprebasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiprebasPeer::NUMPRE);

		$criteria->addSelectColumn(LiprebasPeer::CODEMPADM);

		$criteria->addSelectColumn(LiprebasPeer::CODUNIADM);

		$criteria->addSelectColumn(LiprebasPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiprebasPeer::CODUNISTE);

		$criteria->addSelectColumn(LiprebasPeer::CODCLACOMP);

		$criteria->addSelectColumn(LiprebasPeer::FECREG);

		$criteria->addSelectColumn(LiprebasPeer::HORREG);

		$criteria->addSelectColumn(LiprebasPeer::DIAS);

		$criteria->addSelectColumn(LiprebasPeer::FECVEN);

		$criteria->addSelectColumn(LiprebasPeer::TIPCOM);

		$criteria->addSelectColumn(LiprebasPeer::CODPRE);

		$criteria->addSelectColumn(LiprebasPeer::NOMPRE);

		$criteria->addSelectColumn(LiprebasPeer::CODPRIO);

		$criteria->addSelectColumn(LiprebasPeer::DESPRO);

		$criteria->addSelectColumn(LiprebasPeer::MONPRE);

		$criteria->addSelectColumn(LiprebasPeer::CODMON);

		$criteria->addSelectColumn(LiprebasPeer::VALCAM);

		$criteria->addSelectColumn(LiprebasPeer::FECCAM);

		$criteria->addSelectColumn(LiprebasPeer::DOCANE1);

		$criteria->addSelectColumn(LiprebasPeer::DOCANE2);

		$criteria->addSelectColumn(LiprebasPeer::DOCANE3);

		$criteria->addSelectColumn(LiprebasPeer::STATUS);

		$criteria->addSelectColumn(LiprebasPeer::LISICACT_ID);

		$criteria->addSelectColumn(LiprebasPeer::DETDECMOD);

		$criteria->addSelectColumn(LiprebasPeer::PREPOR);

		$criteria->addSelectColumn(LiprebasPeer::CARGOPRE);

		$criteria->addSelectColumn(LiprebasPeer::APRPOR);

		$criteria->addSelectColumn(LiprebasPeer::CARGOAPR);

		$criteria->addSelectColumn(LiprebasPeer::TIPCON);

		$criteria->addSelectColumn(LiprebasPeer::ACTO);

		$criteria->addSelectColumn(LiprebasPeer::ID);

	}

	const COUNT = 'COUNT(liprebas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liprebas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiprebasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiprebasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiprebasPeer::doSelectRS($criteria, $con);
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
		$objects = LiprebasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiprebasPeer::populateObjects(LiprebasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiprebasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiprebasPeer::getOMClass();
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
			$criteria->addSelectColumn(LiprebasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiprebasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiprebasPeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiprebasPeer::doSelectRS($criteria, $con);
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

		LiprebasPeer::addSelectColumns($c);
		$startcol = (LiprebasPeer::NUM_COLUMNS - LiprebasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiprebasPeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiprebasPeer::getOMClass();

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
										$temp_obj2->addLiprebas($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiprebass();
				$obj2->addLiprebas($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiprebasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiprebasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiprebasPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiprebasPeer::doSelectRS($criteria, $con);
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

		LiprebasPeer::addSelectColumns($c);
		$startcol2 = (LiprebasPeer::NUM_COLUMNS - LiprebasPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiprebasPeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiprebasPeer::getOMClass();


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
						$temp_obj2->addLiprebas($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiprebass();
					$obj2->addLiprebas($obj1);
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
		return LiprebasPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiprebasPeer::ID); 

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
			$comparison = $criteria->getComparison(LiprebasPeer::ID);
			$selectCriteria->add(LiprebasPeer::ID, $criteria->remove(LiprebasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiprebasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiprebasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liprebas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiprebasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liprebas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiprebasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiprebasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiprebasPeer::DATABASE_NAME, LiprebasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiprebasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiprebasPeer::DATABASE_NAME);

		$criteria->add(LiprebasPeer::ID, $pk);


		$v = LiprebasPeer::doSelect($criteria, $con);

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
			$criteria->add(LiprebasPeer::ID, $pks, Criteria::IN);
			$objs = LiprebasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiprebasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiprebasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiprebasMapBuilder');
}
