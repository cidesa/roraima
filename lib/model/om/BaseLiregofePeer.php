<?php


abstract class BaseLiregofePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liregofe';

	
	const CLASS_DEFAULT = 'lib.model.Liregofe';

	
	const NUM_COLUMNS = 30;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMOFE = 'liregofe.NUMOFE';

	
	const NUMPLIE = 'liregofe.NUMPLIE';

	
	const NUMEXP = 'liregofe.NUMEXP';

	
	const CODEMPADM = 'liregofe.CODEMPADM';

	
	const CODUNIADM = 'liregofe.CODUNIADM';

	
	const CODEMPEJE = 'liregofe.CODEMPEJE';

	
	const CODUNISTE = 'liregofe.CODUNISTE';

	
	const FECREG = 'liregofe.FECREG';

	
	const DIAS = 'liregofe.DIAS';

	
	const FECVEN = 'liregofe.FECVEN';

	
	const CODPRO = 'liregofe.CODPRO';

	
	const CODTIPEMP = 'liregofe.CODTIPEMP';

	
	const OFENRO = 'liregofe.OFENRO';

	
	const FECOFE = 'liregofe.FECOFE';

	
	const DOCANE1 = 'liregofe.DOCANE1';

	
	const DOCANE2 = 'liregofe.DOCANE2';

	
	const DOCANE3 = 'liregofe.DOCANE3';

	
	const DOCANE4 = 'liregofe.DOCANE4';

	
	const PREPOR = 'liregofe.PREPOR';

	
	const CARGOPRE = 'liregofe.CARGOPRE';

	
	const LISICACT_ID = 'liregofe.LISICACT_ID';

	
	const DETDECMOD = 'liregofe.DETDECMOD';

	
	const ANAPOR = 'liregofe.ANAPOR';

	
	const CARGOANA = 'liregofe.CARGOANA';

	
	const STATUS = 'liregofe.STATUS';

	
	const MONOFE = 'liregofe.MONOFE';

	
	const MONRECOFE = 'liregofe.MONRECOFE';

	
	const PORVAN = 'liregofe.PORVAN';

	
	const DECLAR = 'liregofe.DECLAR';

	
	const ID = 'liregofe.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numofe', 'Numplie', 'Numexp', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Codpro', 'Codtipemp', 'Ofenro', 'Fecofe', 'Docane1', 'Docane2', 'Docane3', 'Docane4', 'Prepor', 'Cargopre', 'LisicactId', 'Detdecmod', 'Anapor', 'Cargoana', 'Status', 'Monofe', 'Monrecofe', 'Porvan', 'Declar', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiregofePeer::NUMOFE, LiregofePeer::NUMPLIE, LiregofePeer::NUMEXP, LiregofePeer::CODEMPADM, LiregofePeer::CODUNIADM, LiregofePeer::CODEMPEJE, LiregofePeer::CODUNISTE, LiregofePeer::FECREG, LiregofePeer::DIAS, LiregofePeer::FECVEN, LiregofePeer::CODPRO, LiregofePeer::CODTIPEMP, LiregofePeer::OFENRO, LiregofePeer::FECOFE, LiregofePeer::DOCANE1, LiregofePeer::DOCANE2, LiregofePeer::DOCANE3, LiregofePeer::DOCANE4, LiregofePeer::PREPOR, LiregofePeer::CARGOPRE, LiregofePeer::LISICACT_ID, LiregofePeer::DETDECMOD, LiregofePeer::ANAPOR, LiregofePeer::CARGOANA, LiregofePeer::STATUS, LiregofePeer::MONOFE, LiregofePeer::MONRECOFE, LiregofePeer::PORVAN, LiregofePeer::DECLAR, LiregofePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numofe', 'numplie', 'numexp', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'codpro', 'codtipemp', 'ofenro', 'fecofe', 'docane1', 'docane2', 'docane3', 'docane4', 'prepor', 'cargopre', 'lisicact_id', 'detdecmod', 'anapor', 'cargoana', 'status', 'monofe', 'monrecofe', 'porvan', 'declar', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numofe' => 0, 'Numplie' => 1, 'Numexp' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Codpro' => 10, 'Codtipemp' => 11, 'Ofenro' => 12, 'Fecofe' => 13, 'Docane1' => 14, 'Docane2' => 15, 'Docane3' => 16, 'Docane4' => 17, 'Prepor' => 18, 'Cargopre' => 19, 'LisicactId' => 20, 'Detdecmod' => 21, 'Anapor' => 22, 'Cargoana' => 23, 'Status' => 24, 'Monofe' => 25, 'Monrecofe' => 26, 'Porvan' => 27, 'Declar' => 28, 'Id' => 29, ),
		BasePeer::TYPE_COLNAME => array (LiregofePeer::NUMOFE => 0, LiregofePeer::NUMPLIE => 1, LiregofePeer::NUMEXP => 2, LiregofePeer::CODEMPADM => 3, LiregofePeer::CODUNIADM => 4, LiregofePeer::CODEMPEJE => 5, LiregofePeer::CODUNISTE => 6, LiregofePeer::FECREG => 7, LiregofePeer::DIAS => 8, LiregofePeer::FECVEN => 9, LiregofePeer::CODPRO => 10, LiregofePeer::CODTIPEMP => 11, LiregofePeer::OFENRO => 12, LiregofePeer::FECOFE => 13, LiregofePeer::DOCANE1 => 14, LiregofePeer::DOCANE2 => 15, LiregofePeer::DOCANE3 => 16, LiregofePeer::DOCANE4 => 17, LiregofePeer::PREPOR => 18, LiregofePeer::CARGOPRE => 19, LiregofePeer::LISICACT_ID => 20, LiregofePeer::DETDECMOD => 21, LiregofePeer::ANAPOR => 22, LiregofePeer::CARGOANA => 23, LiregofePeer::STATUS => 24, LiregofePeer::MONOFE => 25, LiregofePeer::MONRECOFE => 26, LiregofePeer::PORVAN => 27, LiregofePeer::DECLAR => 28, LiregofePeer::ID => 29, ),
		BasePeer::TYPE_FIELDNAME => array ('numofe' => 0, 'numplie' => 1, 'numexp' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'codpro' => 10, 'codtipemp' => 11, 'ofenro' => 12, 'fecofe' => 13, 'docane1' => 14, 'docane2' => 15, 'docane3' => 16, 'docane4' => 17, 'prepor' => 18, 'cargopre' => 19, 'lisicact_id' => 20, 'detdecmod' => 21, 'anapor' => 22, 'cargoana' => 23, 'status' => 24, 'monofe' => 25, 'monrecofe' => 26, 'porvan' => 27, 'declar' => 28, 'id' => 29, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiregofeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiregofeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiregofePeer::getTableMap();
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
		return str_replace(LiregofePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiregofePeer::NUMOFE);

		$criteria->addSelectColumn(LiregofePeer::NUMPLIE);

		$criteria->addSelectColumn(LiregofePeer::NUMEXP);

		$criteria->addSelectColumn(LiregofePeer::CODEMPADM);

		$criteria->addSelectColumn(LiregofePeer::CODUNIADM);

		$criteria->addSelectColumn(LiregofePeer::CODEMPEJE);

		$criteria->addSelectColumn(LiregofePeer::CODUNISTE);

		$criteria->addSelectColumn(LiregofePeer::FECREG);

		$criteria->addSelectColumn(LiregofePeer::DIAS);

		$criteria->addSelectColumn(LiregofePeer::FECVEN);

		$criteria->addSelectColumn(LiregofePeer::CODPRO);

		$criteria->addSelectColumn(LiregofePeer::CODTIPEMP);

		$criteria->addSelectColumn(LiregofePeer::OFENRO);

		$criteria->addSelectColumn(LiregofePeer::FECOFE);

		$criteria->addSelectColumn(LiregofePeer::DOCANE1);

		$criteria->addSelectColumn(LiregofePeer::DOCANE2);

		$criteria->addSelectColumn(LiregofePeer::DOCANE3);

		$criteria->addSelectColumn(LiregofePeer::DOCANE4);

		$criteria->addSelectColumn(LiregofePeer::PREPOR);

		$criteria->addSelectColumn(LiregofePeer::CARGOPRE);

		$criteria->addSelectColumn(LiregofePeer::LISICACT_ID);

		$criteria->addSelectColumn(LiregofePeer::DETDECMOD);

		$criteria->addSelectColumn(LiregofePeer::ANAPOR);

		$criteria->addSelectColumn(LiregofePeer::CARGOANA);

		$criteria->addSelectColumn(LiregofePeer::STATUS);

		$criteria->addSelectColumn(LiregofePeer::MONOFE);

		$criteria->addSelectColumn(LiregofePeer::MONRECOFE);

		$criteria->addSelectColumn(LiregofePeer::PORVAN);

		$criteria->addSelectColumn(LiregofePeer::DECLAR);

		$criteria->addSelectColumn(LiregofePeer::ID);

	}

	const COUNT = 'COUNT(liregofe.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liregofe.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregofePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregofePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiregofePeer::doSelectRS($criteria, $con);
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
		$objects = LiregofePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiregofePeer::populateObjects(LiregofePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiregofePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiregofePeer::getOMClass();
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
			$criteria->addSelectColumn(LiregofePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregofePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LiregofePeer::LISICACT_ID, LisicactPeer::ID);

		$rs = LiregofePeer::doSelectRS($criteria, $con);
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

		LiregofePeer::addSelectColumns($c);
		$startcol = (LiregofePeer::NUM_COLUMNS - LiregofePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LisicactPeer::addSelectColumns($c);

		$c->addJoin(LiregofePeer::LISICACT_ID, LisicactPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregofePeer::getOMClass();

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
										$temp_obj2->addLiregofe($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLiregofes();
				$obj2->addLiregofe($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiregofePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiregofePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(LiregofePeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = LiregofePeer::doSelectRS($criteria, $con);
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

		LiregofePeer::addSelectColumns($c);
		$startcol2 = (LiregofePeer::NUM_COLUMNS - LiregofePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			LisicactPeer::addSelectColumns($c);
			$startcol3 = $startcol2 + LisicactPeer::NUM_COLUMNS;
	
			$c->addJoin(LiregofePeer::LISICACT_ID, LisicactPeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LiregofePeer::getOMClass();


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
						$temp_obj2->addLiregofe($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initLiregofes();
					$obj2->addLiregofe($obj1);
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
		return LiregofePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiregofePeer::ID); 

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
			$comparison = $criteria->getComparison(LiregofePeer::ID);
			$selectCriteria->add(LiregofePeer::ID, $criteria->remove(LiregofePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiregofePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiregofePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liregofe) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiregofePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liregofe $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiregofePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiregofePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiregofePeer::DATABASE_NAME, LiregofePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiregofePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiregofePeer::DATABASE_NAME);

		$criteria->add(LiregofePeer::ID, $pk);


		$v = LiregofePeer::doSelect($criteria, $con);

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
			$criteria->add(LiregofePeer::ID, $pks, Criteria::IN);
			$objs = LiregofePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiregofePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiregofeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiregofeMapBuilder');
}
