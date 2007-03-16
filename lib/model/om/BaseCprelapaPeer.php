<?php


abstract class BaseCprelapaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cprelapa';

	
	const CLASS_DEFAULT = 'lib.model.Cprelapa';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFREL = 'cprelapa.REFREL';

	
	const TIPREL = 'cprelapa.TIPREL';

	
	const FECREL = 'cprelapa.FECREL';

	
	const REFAPA = 'cprelapa.REFAPA';

	
	const DESREL = 'cprelapa.DESREL';

	
	const DESANU = 'cprelapa.DESANU';

	
	const MONREL = 'cprelapa.MONREL';

	
	const SALAJU = 'cprelapa.SALAJU';

	
	const STAREL = 'cprelapa.STAREL';

	
	const FECANU = 'cprelapa.FECANU';

	
	const CEDRIF = 'cprelapa.CEDRIF';

	
	const NUMCOM = 'cprelapa.NUMCOM';

	
	const ID = 'cprelapa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refrel', 'Tiprel', 'Fecrel', 'Refapa', 'Desrel', 'Desanu', 'Monrel', 'Salaju', 'Starel', 'Fecanu', 'Cedrif', 'Numcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CprelapaPeer::REFREL, CprelapaPeer::TIPREL, CprelapaPeer::FECREL, CprelapaPeer::REFAPA, CprelapaPeer::DESREL, CprelapaPeer::DESANU, CprelapaPeer::MONREL, CprelapaPeer::SALAJU, CprelapaPeer::STAREL, CprelapaPeer::FECANU, CprelapaPeer::CEDRIF, CprelapaPeer::NUMCOM, CprelapaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refrel', 'tiprel', 'fecrel', 'refapa', 'desrel', 'desanu', 'monrel', 'salaju', 'starel', 'fecanu', 'cedrif', 'numcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refrel' => 0, 'Tiprel' => 1, 'Fecrel' => 2, 'Refapa' => 3, 'Desrel' => 4, 'Desanu' => 5, 'Monrel' => 6, 'Salaju' => 7, 'Starel' => 8, 'Fecanu' => 9, 'Cedrif' => 10, 'Numcom' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CprelapaPeer::REFREL => 0, CprelapaPeer::TIPREL => 1, CprelapaPeer::FECREL => 2, CprelapaPeer::REFAPA => 3, CprelapaPeer::DESREL => 4, CprelapaPeer::DESANU => 5, CprelapaPeer::MONREL => 6, CprelapaPeer::SALAJU => 7, CprelapaPeer::STAREL => 8, CprelapaPeer::FECANU => 9, CprelapaPeer::CEDRIF => 10, CprelapaPeer::NUMCOM => 11, CprelapaPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('refrel' => 0, 'tiprel' => 1, 'fecrel' => 2, 'refapa' => 3, 'desrel' => 4, 'desanu' => 5, 'monrel' => 6, 'salaju' => 7, 'starel' => 8, 'fecanu' => 9, 'cedrif' => 10, 'numcom' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CprelapaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CprelapaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CprelapaPeer::getTableMap();
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
		return str_replace(CprelapaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CprelapaPeer::REFREL);

		$criteria->addSelectColumn(CprelapaPeer::TIPREL);

		$criteria->addSelectColumn(CprelapaPeer::FECREL);

		$criteria->addSelectColumn(CprelapaPeer::REFAPA);

		$criteria->addSelectColumn(CprelapaPeer::DESREL);

		$criteria->addSelectColumn(CprelapaPeer::DESANU);

		$criteria->addSelectColumn(CprelapaPeer::MONREL);

		$criteria->addSelectColumn(CprelapaPeer::SALAJU);

		$criteria->addSelectColumn(CprelapaPeer::STAREL);

		$criteria->addSelectColumn(CprelapaPeer::FECANU);

		$criteria->addSelectColumn(CprelapaPeer::CEDRIF);

		$criteria->addSelectColumn(CprelapaPeer::NUMCOM);

		$criteria->addSelectColumn(CprelapaPeer::ID);

	}

	const COUNT = 'COUNT(cprelapa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cprelapa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CprelapaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CprelapaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CprelapaPeer::doSelectRS($criteria, $con);
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
		$objects = CprelapaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CprelapaPeer::populateObjects(CprelapaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CprelapaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CprelapaPeer::getOMClass();
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
		return CprelapaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(CprelapaPeer::ID);
			$selectCriteria->add(CprelapaPeer::ID, $criteria->remove(CprelapaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CprelapaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CprelapaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cprelapa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CprelapaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cprelapa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CprelapaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CprelapaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CprelapaPeer::DATABASE_NAME, CprelapaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CprelapaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CprelapaPeer::DATABASE_NAME);

		$criteria->add(CprelapaPeer::ID, $pk);


		$v = CprelapaPeer::doSelect($criteria, $con);

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
			$criteria->add(CprelapaPeer::ID, $pks, Criteria::IN);
			$objs = CprelapaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCprelapaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CprelapaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CprelapaMapBuilder');
}
