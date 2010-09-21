<?php


abstract class BaseFcdefncaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdefnca';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcdefnca';

	
	const NUM_COLUMNS = 39;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPAR = 'fcdefnca.CODPAR';

	
	const CODMUN = 'fcdefnca.CODMUN';

	
	const CODEDO = 'fcdefnca.CODEDO';

	
	const CODPAI = 'fcdefnca.CODPAI';

	
	const NUMNIV = 'fcdefnca.NUMNIV';

	
	const NOMEXT1 = 'fcdefnca.NOMEXT1';

	
	const NOMABR1 = 'fcdefnca.NOMABR1';

	
	const TAMANO1 = 'fcdefnca.TAMANO1';

	
	const NOMEXT2 = 'fcdefnca.NOMEXT2';

	
	const NOMABR2 = 'fcdefnca.NOMABR2';

	
	const TAMANO2 = 'fcdefnca.TAMANO2';

	
	const NOMEXT3 = 'fcdefnca.NOMEXT3';

	
	const NOMABR3 = 'fcdefnca.NOMABR3';

	
	const TAMANO3 = 'fcdefnca.TAMANO3';

	
	const NOMEXT4 = 'fcdefnca.NOMEXT4';

	
	const NOMABR4 = 'fcdefnca.NOMABR4';

	
	const TAMANO4 = 'fcdefnca.TAMANO4';

	
	const NOMEXT5 = 'fcdefnca.NOMEXT5';

	
	const NOMABR5 = 'fcdefnca.NOMABR5';

	
	const TAMANO5 = 'fcdefnca.TAMANO5';

	
	const NOMEXT6 = 'fcdefnca.NOMEXT6';

	
	const NOMABR6 = 'fcdefnca.NOMABR6';

	
	const TAMANO6 = 'fcdefnca.TAMANO6';

	
	const NOMEXT7 = 'fcdefnca.NOMEXT7';

	
	const NOMABR7 = 'fcdefnca.NOMABR7';

	
	const TAMANO7 = 'fcdefnca.TAMANO7';

	
	const NOMEXT8 = 'fcdefnca.NOMEXT8';

	
	const NOMABR8 = 'fcdefnca.NOMABR8';

	
	const TAMANO8 = 'fcdefnca.TAMANO8';

	
	const NOMEXT9 = 'fcdefnca.NOMEXT9';

	
	const NOMABR9 = 'fcdefnca.NOMABR9';

	
	const TAMANO9 = 'fcdefnca.TAMANO9';

	
	const NOMEXT10 = 'fcdefnca.NOMEXT10';

	
	const NOMABR10 = 'fcdefnca.NOMABR10';

	
	const TAMANO10 = 'fcdefnca.TAMANO10';

	
	const NIVINM = 'fcdefnca.NIVINM';

	
	const NUMPER = 'fcdefnca.NUMPER';

	
	const DENUMPER = 'fcdefnca.DENUMPER';

	
	const ID = 'fcdefnca.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpar', 'Codmun', 'Codedo', 'Codpai', 'Numniv', 'Nomext1', 'Nomabr1', 'Tamano1', 'Nomext2', 'Nomabr2', 'Tamano2', 'Nomext3', 'Nomabr3', 'Tamano3', 'Nomext4', 'Nomabr4', 'Tamano4', 'Nomext5', 'Nomabr5', 'Tamano5', 'Nomext6', 'Nomabr6', 'Tamano6', 'Nomext7', 'Nomabr7', 'Tamano7', 'Nomext8', 'Nomabr8', 'Tamano8', 'Nomext9', 'Nomabr9', 'Tamano9', 'Nomext10', 'Nomabr10', 'Tamano10', 'Nivinm', 'Numper', 'Denumper', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdefncaPeer::CODPAR, FcdefncaPeer::CODMUN, FcdefncaPeer::CODEDO, FcdefncaPeer::CODPAI, FcdefncaPeer::NUMNIV, FcdefncaPeer::NOMEXT1, FcdefncaPeer::NOMABR1, FcdefncaPeer::TAMANO1, FcdefncaPeer::NOMEXT2, FcdefncaPeer::NOMABR2, FcdefncaPeer::TAMANO2, FcdefncaPeer::NOMEXT3, FcdefncaPeer::NOMABR3, FcdefncaPeer::TAMANO3, FcdefncaPeer::NOMEXT4, FcdefncaPeer::NOMABR4, FcdefncaPeer::TAMANO4, FcdefncaPeer::NOMEXT5, FcdefncaPeer::NOMABR5, FcdefncaPeer::TAMANO5, FcdefncaPeer::NOMEXT6, FcdefncaPeer::NOMABR6, FcdefncaPeer::TAMANO6, FcdefncaPeer::NOMEXT7, FcdefncaPeer::NOMABR7, FcdefncaPeer::TAMANO7, FcdefncaPeer::NOMEXT8, FcdefncaPeer::NOMABR8, FcdefncaPeer::TAMANO8, FcdefncaPeer::NOMEXT9, FcdefncaPeer::NOMABR9, FcdefncaPeer::TAMANO9, FcdefncaPeer::NOMEXT10, FcdefncaPeer::NOMABR10, FcdefncaPeer::TAMANO10, FcdefncaPeer::NIVINM, FcdefncaPeer::NUMPER, FcdefncaPeer::DENUMPER, FcdefncaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpar', 'codmun', 'codedo', 'codpai', 'numniv', 'nomext1', 'nomabr1', 'tamano1', 'nomext2', 'nomabr2', 'tamano2', 'nomext3', 'nomabr3', 'tamano3', 'nomext4', 'nomabr4', 'tamano4', 'nomext5', 'nomabr5', 'tamano5', 'nomext6', 'nomabr6', 'tamano6', 'nomext7', 'nomabr7', 'tamano7', 'nomext8', 'nomabr8', 'tamano8', 'nomext9', 'nomabr9', 'tamano9', 'nomext10', 'nomabr10', 'tamano10', 'nivinm', 'numper', 'denumper', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpar' => 0, 'Codmun' => 1, 'Codedo' => 2, 'Codpai' => 3, 'Numniv' => 4, 'Nomext1' => 5, 'Nomabr1' => 6, 'Tamano1' => 7, 'Nomext2' => 8, 'Nomabr2' => 9, 'Tamano2' => 10, 'Nomext3' => 11, 'Nomabr3' => 12, 'Tamano3' => 13, 'Nomext4' => 14, 'Nomabr4' => 15, 'Tamano4' => 16, 'Nomext5' => 17, 'Nomabr5' => 18, 'Tamano5' => 19, 'Nomext6' => 20, 'Nomabr6' => 21, 'Tamano6' => 22, 'Nomext7' => 23, 'Nomabr7' => 24, 'Tamano7' => 25, 'Nomext8' => 26, 'Nomabr8' => 27, 'Tamano8' => 28, 'Nomext9' => 29, 'Nomabr9' => 30, 'Tamano9' => 31, 'Nomext10' => 32, 'Nomabr10' => 33, 'Tamano10' => 34, 'Nivinm' => 35, 'Numper' => 36, 'Denumper' => 37, 'Id' => 38, ),
		BasePeer::TYPE_COLNAME => array (FcdefncaPeer::CODPAR => 0, FcdefncaPeer::CODMUN => 1, FcdefncaPeer::CODEDO => 2, FcdefncaPeer::CODPAI => 3, FcdefncaPeer::NUMNIV => 4, FcdefncaPeer::NOMEXT1 => 5, FcdefncaPeer::NOMABR1 => 6, FcdefncaPeer::TAMANO1 => 7, FcdefncaPeer::NOMEXT2 => 8, FcdefncaPeer::NOMABR2 => 9, FcdefncaPeer::TAMANO2 => 10, FcdefncaPeer::NOMEXT3 => 11, FcdefncaPeer::NOMABR3 => 12, FcdefncaPeer::TAMANO3 => 13, FcdefncaPeer::NOMEXT4 => 14, FcdefncaPeer::NOMABR4 => 15, FcdefncaPeer::TAMANO4 => 16, FcdefncaPeer::NOMEXT5 => 17, FcdefncaPeer::NOMABR5 => 18, FcdefncaPeer::TAMANO5 => 19, FcdefncaPeer::NOMEXT6 => 20, FcdefncaPeer::NOMABR6 => 21, FcdefncaPeer::TAMANO6 => 22, FcdefncaPeer::NOMEXT7 => 23, FcdefncaPeer::NOMABR7 => 24, FcdefncaPeer::TAMANO7 => 25, FcdefncaPeer::NOMEXT8 => 26, FcdefncaPeer::NOMABR8 => 27, FcdefncaPeer::TAMANO8 => 28, FcdefncaPeer::NOMEXT9 => 29, FcdefncaPeer::NOMABR9 => 30, FcdefncaPeer::TAMANO9 => 31, FcdefncaPeer::NOMEXT10 => 32, FcdefncaPeer::NOMABR10 => 33, FcdefncaPeer::TAMANO10 => 34, FcdefncaPeer::NIVINM => 35, FcdefncaPeer::NUMPER => 36, FcdefncaPeer::DENUMPER => 37, FcdefncaPeer::ID => 38, ),
		BasePeer::TYPE_FIELDNAME => array ('codpar' => 0, 'codmun' => 1, 'codedo' => 2, 'codpai' => 3, 'numniv' => 4, 'nomext1' => 5, 'nomabr1' => 6, 'tamano1' => 7, 'nomext2' => 8, 'nomabr2' => 9, 'tamano2' => 10, 'nomext3' => 11, 'nomabr3' => 12, 'tamano3' => 13, 'nomext4' => 14, 'nomabr4' => 15, 'tamano4' => 16, 'nomext5' => 17, 'nomabr5' => 18, 'tamano5' => 19, 'nomext6' => 20, 'nomabr6' => 21, 'tamano6' => 22, 'nomext7' => 23, 'nomabr7' => 24, 'tamano7' => 25, 'nomext8' => 26, 'nomabr8' => 27, 'tamano8' => 28, 'nomext9' => 29, 'nomabr9' => 30, 'tamano9' => 31, 'nomext10' => 32, 'nomabr10' => 33, 'tamano10' => 34, 'nivinm' => 35, 'numper' => 36, 'denumper' => 37, 'id' => 38, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcdefncaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcdefncaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdefncaPeer::getTableMap();
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
		return str_replace(FcdefncaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdefncaPeer::CODPAR);

		$criteria->addSelectColumn(FcdefncaPeer::CODMUN);

		$criteria->addSelectColumn(FcdefncaPeer::CODEDO);

		$criteria->addSelectColumn(FcdefncaPeer::CODPAI);

		$criteria->addSelectColumn(FcdefncaPeer::NUMNIV);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT1);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR1);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO1);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT2);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR2);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO2);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT3);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR3);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO3);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT4);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR4);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO4);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT5);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR5);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO5);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT6);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR6);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO6);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT7);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR7);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO7);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT8);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR8);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO8);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT9);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR9);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO9);

		$criteria->addSelectColumn(FcdefncaPeer::NOMEXT10);

		$criteria->addSelectColumn(FcdefncaPeer::NOMABR10);

		$criteria->addSelectColumn(FcdefncaPeer::TAMANO10);

		$criteria->addSelectColumn(FcdefncaPeer::NIVINM);

		$criteria->addSelectColumn(FcdefncaPeer::NUMPER);

		$criteria->addSelectColumn(FcdefncaPeer::DENUMPER);

		$criteria->addSelectColumn(FcdefncaPeer::ID);

	}

	const COUNT = 'COUNT(fcdefnca.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdefnca.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdefncaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdefncaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdefncaPeer::doSelectRS($criteria, $con);
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
		$objects = FcdefncaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdefncaPeer::populateObjects(FcdefncaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdefncaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdefncaPeer::getOMClass();
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
		return FcdefncaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcdefncaPeer::ID); 

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
			$comparison = $criteria->getComparison(FcdefncaPeer::ID);
			$selectCriteria->add(FcdefncaPeer::ID, $criteria->remove(FcdefncaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdefncaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdefncaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdefnca) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdefncaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdefnca $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdefncaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdefncaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdefncaPeer::DATABASE_NAME, FcdefncaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdefncaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdefncaPeer::DATABASE_NAME);

		$criteria->add(FcdefncaPeer::ID, $pk);


		$v = FcdefncaPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdefncaPeer::ID, $pks, Criteria::IN);
			$objs = FcdefncaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdefncaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcdefncaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcdefncaMapBuilder');
}
