<?php


abstract class BaseFcfueprePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcfuepre';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcfuepre';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODFUE = 'fcfuepre.CODFUE';

	
	const NOMFUE = 'fcfuepre.NOMFUE';

	
	const NOMABR = 'fcfuepre.NOMABR';

	
	const FRECOB = 'fcfuepre.FRECOB';

	
	const MONMOR = 'fcfuepre.MONMOR';

	
	const PERMOR = 'fcfuepre.PERMOR';

	
	const PROPAG = 'fcfuepre.PROPAG';

	
	const PERPPG = 'fcfuepre.PERPPG';

	
	const LIQACT = 'fcfuepre.LIQACT';

	
	const DEUFEC = 'fcfuepre.DEUFEC';

	
	const RECFEC = 'fcfuepre.RECFEC';

	
	const FECUFA = 'fcfuepre.FECUFA';

	
	const INGREC = 'fcfuepre.INGREC';

	
	const FUEING = 'fcfuepre.FUEING';

	
	const INIEJE = 'fcfuepre.INIEJE';

	
	const FINEJE = 'fcfuepre.FINEJE';

	
	const DIAVSO = 'fcfuepre.DIAVSO';

	
	const CODPREI = 'fcfuepre.CODPREI';

	
	const DEUFRA = 'fcfuepre.DEUFRA';

	
	const AUTLIQ = 'fcfuepre.AUTLIQ';

	
	const SIMPRE = 'fcfuepre.SIMPRE';

	
	const FECCIE = 'fcfuepre.FECCIE';

	
	const TIPMUL = 'fcfuepre.TIPMUL';

	
	const FECEST = 'fcfuepre.FECEST';

	
	const DIAVEN = 'fcfuepre.DIAVEN';

	
	const TIPVEN = 'fcfuepre.TIPVEN';

	
	const TIPFUE = 'fcfuepre.TIPFUE';

	
	const ID = 'fcfuepre.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codfue', 'Nomfue', 'Nomabr', 'Frecob', 'Monmor', 'Permor', 'Propag', 'Perppg', 'Liqact', 'Deufec', 'Recfec', 'Fecufa', 'Ingrec', 'Fueing', 'Inieje', 'Fineje', 'Diavso', 'Codprei', 'Deufra', 'Autliq', 'Simpre', 'Feccie', 'Tipmul', 'Fecest', 'Diaven', 'Tipven', 'Tipfue', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcfueprePeer::CODFUE, FcfueprePeer::NOMFUE, FcfueprePeer::NOMABR, FcfueprePeer::FRECOB, FcfueprePeer::MONMOR, FcfueprePeer::PERMOR, FcfueprePeer::PROPAG, FcfueprePeer::PERPPG, FcfueprePeer::LIQACT, FcfueprePeer::DEUFEC, FcfueprePeer::RECFEC, FcfueprePeer::FECUFA, FcfueprePeer::INGREC, FcfueprePeer::FUEING, FcfueprePeer::INIEJE, FcfueprePeer::FINEJE, FcfueprePeer::DIAVSO, FcfueprePeer::CODPREI, FcfueprePeer::DEUFRA, FcfueprePeer::AUTLIQ, FcfueprePeer::SIMPRE, FcfueprePeer::FECCIE, FcfueprePeer::TIPMUL, FcfueprePeer::FECEST, FcfueprePeer::DIAVEN, FcfueprePeer::TIPVEN, FcfueprePeer::TIPFUE, FcfueprePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codfue', 'nomfue', 'nomabr', 'frecob', 'monmor', 'permor', 'propag', 'perppg', 'liqact', 'deufec', 'recfec', 'fecufa', 'ingrec', 'fueing', 'inieje', 'fineje', 'diavso', 'codprei', 'deufra', 'autliq', 'simpre', 'feccie', 'tipmul', 'fecest', 'diaven', 'tipven', 'tipfue', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codfue' => 0, 'Nomfue' => 1, 'Nomabr' => 2, 'Frecob' => 3, 'Monmor' => 4, 'Permor' => 5, 'Propag' => 6, 'Perppg' => 7, 'Liqact' => 8, 'Deufec' => 9, 'Recfec' => 10, 'Fecufa' => 11, 'Ingrec' => 12, 'Fueing' => 13, 'Inieje' => 14, 'Fineje' => 15, 'Diavso' => 16, 'Codprei' => 17, 'Deufra' => 18, 'Autliq' => 19, 'Simpre' => 20, 'Feccie' => 21, 'Tipmul' => 22, 'Fecest' => 23, 'Diaven' => 24, 'Tipven' => 25, 'Tipfue' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (FcfueprePeer::CODFUE => 0, FcfueprePeer::NOMFUE => 1, FcfueprePeer::NOMABR => 2, FcfueprePeer::FRECOB => 3, FcfueprePeer::MONMOR => 4, FcfueprePeer::PERMOR => 5, FcfueprePeer::PROPAG => 6, FcfueprePeer::PERPPG => 7, FcfueprePeer::LIQACT => 8, FcfueprePeer::DEUFEC => 9, FcfueprePeer::RECFEC => 10, FcfueprePeer::FECUFA => 11, FcfueprePeer::INGREC => 12, FcfueprePeer::FUEING => 13, FcfueprePeer::INIEJE => 14, FcfueprePeer::FINEJE => 15, FcfueprePeer::DIAVSO => 16, FcfueprePeer::CODPREI => 17, FcfueprePeer::DEUFRA => 18, FcfueprePeer::AUTLIQ => 19, FcfueprePeer::SIMPRE => 20, FcfueprePeer::FECCIE => 21, FcfueprePeer::TIPMUL => 22, FcfueprePeer::FECEST => 23, FcfueprePeer::DIAVEN => 24, FcfueprePeer::TIPVEN => 25, FcfueprePeer::TIPFUE => 26, FcfueprePeer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('codfue' => 0, 'nomfue' => 1, 'nomabr' => 2, 'frecob' => 3, 'monmor' => 4, 'permor' => 5, 'propag' => 6, 'perppg' => 7, 'liqact' => 8, 'deufec' => 9, 'recfec' => 10, 'fecufa' => 11, 'ingrec' => 12, 'fueing' => 13, 'inieje' => 14, 'fineje' => 15, 'diavso' => 16, 'codprei' => 17, 'deufra' => 18, 'autliq' => 19, 'simpre' => 20, 'feccie' => 21, 'tipmul' => 22, 'fecest' => 23, 'diaven' => 24, 'tipven' => 25, 'tipfue' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcfuepreMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcfuepreMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcfueprePeer::getTableMap();
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
		return str_replace(FcfueprePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcfueprePeer::CODFUE);

		$criteria->addSelectColumn(FcfueprePeer::NOMFUE);

		$criteria->addSelectColumn(FcfueprePeer::NOMABR);

		$criteria->addSelectColumn(FcfueprePeer::FRECOB);

		$criteria->addSelectColumn(FcfueprePeer::MONMOR);

		$criteria->addSelectColumn(FcfueprePeer::PERMOR);

		$criteria->addSelectColumn(FcfueprePeer::PROPAG);

		$criteria->addSelectColumn(FcfueprePeer::PERPPG);

		$criteria->addSelectColumn(FcfueprePeer::LIQACT);

		$criteria->addSelectColumn(FcfueprePeer::DEUFEC);

		$criteria->addSelectColumn(FcfueprePeer::RECFEC);

		$criteria->addSelectColumn(FcfueprePeer::FECUFA);

		$criteria->addSelectColumn(FcfueprePeer::INGREC);

		$criteria->addSelectColumn(FcfueprePeer::FUEING);

		$criteria->addSelectColumn(FcfueprePeer::INIEJE);

		$criteria->addSelectColumn(FcfueprePeer::FINEJE);

		$criteria->addSelectColumn(FcfueprePeer::DIAVSO);

		$criteria->addSelectColumn(FcfueprePeer::CODPREI);

		$criteria->addSelectColumn(FcfueprePeer::DEUFRA);

		$criteria->addSelectColumn(FcfueprePeer::AUTLIQ);

		$criteria->addSelectColumn(FcfueprePeer::SIMPRE);

		$criteria->addSelectColumn(FcfueprePeer::FECCIE);

		$criteria->addSelectColumn(FcfueprePeer::TIPMUL);

		$criteria->addSelectColumn(FcfueprePeer::FECEST);

		$criteria->addSelectColumn(FcfueprePeer::DIAVEN);

		$criteria->addSelectColumn(FcfueprePeer::TIPVEN);

		$criteria->addSelectColumn(FcfueprePeer::TIPFUE);

		$criteria->addSelectColumn(FcfueprePeer::ID);

	}

	const COUNT = 'COUNT(fcfuepre.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcfuepre.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcfueprePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcfueprePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcfueprePeer::doSelectRS($criteria, $con);
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
		$objects = FcfueprePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcfueprePeer::populateObjects(FcfueprePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcfueprePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcfueprePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return FcfueprePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcfueprePeer::ID); 

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
			$comparison = $criteria->getComparison(FcfueprePeer::ID);
			$selectCriteria->add(FcfueprePeer::ID, $criteria->remove(FcfueprePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcfueprePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcfueprePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcfuepre) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcfueprePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcfuepre $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcfueprePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcfueprePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcfueprePeer::DATABASE_NAME, FcfueprePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcfueprePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcfueprePeer::DATABASE_NAME);

		$criteria->add(FcfueprePeer::ID, $pk);


		$v = FcfueprePeer::doSelect($criteria, $con);

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
			$criteria->add(FcfueprePeer::ID, $pks, Criteria::IN);
			$objs = FcfueprePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcfueprePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcfuepreMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcfuepreMapBuilder');
}
