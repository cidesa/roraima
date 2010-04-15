<?php


abstract class BaseCpapafonPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpapafon';

	
	const CLASS_DEFAULT = 'lib.model.Cpapafon';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAPA = 'cpapafon.REFAPA';

	
	const TIPAPA = 'cpapafon.TIPAPA';

	
	const FECAPA = 'cpapafon.FECAPA';

	
	const ANOAPA = 'cpapafon.ANOAPA';

	
	const DESAPA = 'cpapafon.DESAPA';

	
	const DESANU = 'cpapafon.DESANU';

	
	const MONAPA = 'cpapafon.MONAPA';

	
	const SALCOM = 'cpapafon.SALCOM';

	
	const SALCAU = 'cpapafon.SALCAU';

	
	const SALPAG = 'cpapafon.SALPAG';

	
	const SALAJU = 'cpapafon.SALAJU';

	
	const STAAPA = 'cpapafon.STAAPA';

	
	const FECANU = 'cpapafon.FECANU';

	
	const CEDRIF = 'cpapafon.CEDRIF';

	
	const ESTCIE = 'cpapafon.ESTCIE';

	
	const FECCIE = 'cpapafon.FECCIE';

	
	const MONCIE = 'cpapafon.MONCIE';

	
	const ID = 'cpapafon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refapa', 'Tipapa', 'Fecapa', 'Anoapa', 'Desapa', 'Desanu', 'Monapa', 'Salcom', 'Salcau', 'Salpag', 'Salaju', 'Staapa', 'Fecanu', 'Cedrif', 'Estcie', 'Feccie', 'Moncie', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpapafonPeer::REFAPA, CpapafonPeer::TIPAPA, CpapafonPeer::FECAPA, CpapafonPeer::ANOAPA, CpapafonPeer::DESAPA, CpapafonPeer::DESANU, CpapafonPeer::MONAPA, CpapafonPeer::SALCOM, CpapafonPeer::SALCAU, CpapafonPeer::SALPAG, CpapafonPeer::SALAJU, CpapafonPeer::STAAPA, CpapafonPeer::FECANU, CpapafonPeer::CEDRIF, CpapafonPeer::ESTCIE, CpapafonPeer::FECCIE, CpapafonPeer::MONCIE, CpapafonPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refapa', 'tipapa', 'fecapa', 'anoapa', 'desapa', 'desanu', 'monapa', 'salcom', 'salcau', 'salpag', 'salaju', 'staapa', 'fecanu', 'cedrif', 'estcie', 'feccie', 'moncie', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refapa' => 0, 'Tipapa' => 1, 'Fecapa' => 2, 'Anoapa' => 3, 'Desapa' => 4, 'Desanu' => 5, 'Monapa' => 6, 'Salcom' => 7, 'Salcau' => 8, 'Salpag' => 9, 'Salaju' => 10, 'Staapa' => 11, 'Fecanu' => 12, 'Cedrif' => 13, 'Estcie' => 14, 'Feccie' => 15, 'Moncie' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (CpapafonPeer::REFAPA => 0, CpapafonPeer::TIPAPA => 1, CpapafonPeer::FECAPA => 2, CpapafonPeer::ANOAPA => 3, CpapafonPeer::DESAPA => 4, CpapafonPeer::DESANU => 5, CpapafonPeer::MONAPA => 6, CpapafonPeer::SALCOM => 7, CpapafonPeer::SALCAU => 8, CpapafonPeer::SALPAG => 9, CpapafonPeer::SALAJU => 10, CpapafonPeer::STAAPA => 11, CpapafonPeer::FECANU => 12, CpapafonPeer::CEDRIF => 13, CpapafonPeer::ESTCIE => 14, CpapafonPeer::FECCIE => 15, CpapafonPeer::MONCIE => 16, CpapafonPeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('refapa' => 0, 'tipapa' => 1, 'fecapa' => 2, 'anoapa' => 3, 'desapa' => 4, 'desanu' => 5, 'monapa' => 6, 'salcom' => 7, 'salcau' => 8, 'salpag' => 9, 'salaju' => 10, 'staapa' => 11, 'fecanu' => 12, 'cedrif' => 13, 'estcie' => 14, 'feccie' => 15, 'moncie' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpapafonMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpapafonMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpapafonPeer::getTableMap();
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
		return str_replace(CpapafonPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpapafonPeer::REFAPA);

		$criteria->addSelectColumn(CpapafonPeer::TIPAPA);

		$criteria->addSelectColumn(CpapafonPeer::FECAPA);

		$criteria->addSelectColumn(CpapafonPeer::ANOAPA);

		$criteria->addSelectColumn(CpapafonPeer::DESAPA);

		$criteria->addSelectColumn(CpapafonPeer::DESANU);

		$criteria->addSelectColumn(CpapafonPeer::MONAPA);

		$criteria->addSelectColumn(CpapafonPeer::SALCOM);

		$criteria->addSelectColumn(CpapafonPeer::SALCAU);

		$criteria->addSelectColumn(CpapafonPeer::SALPAG);

		$criteria->addSelectColumn(CpapafonPeer::SALAJU);

		$criteria->addSelectColumn(CpapafonPeer::STAAPA);

		$criteria->addSelectColumn(CpapafonPeer::FECANU);

		$criteria->addSelectColumn(CpapafonPeer::CEDRIF);

		$criteria->addSelectColumn(CpapafonPeer::ESTCIE);

		$criteria->addSelectColumn(CpapafonPeer::FECCIE);

		$criteria->addSelectColumn(CpapafonPeer::MONCIE);

		$criteria->addSelectColumn(CpapafonPeer::ID);

	}

	const COUNT = 'COUNT(cpapafon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpapafon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpapafonPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpapafonPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpapafonPeer::doSelectRS($criteria, $con);
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
		$objects = CpapafonPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpapafonPeer::populateObjects(CpapafonPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpapafonPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpapafonPeer::getOMClass();
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
		return CpapafonPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpapafonPeer::ID);
			$selectCriteria->add(CpapafonPeer::ID, $criteria->remove(CpapafonPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpapafonPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpapafonPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpapafon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpapafonPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpapafon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpapafonPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpapafonPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpapafonPeer::DATABASE_NAME, CpapafonPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpapafonPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpapafonPeer::DATABASE_NAME);

		$criteria->add(CpapafonPeer::ID, $pk);


		$v = CpapafonPeer::doSelect($criteria, $con);

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
			$criteria->add(CpapafonPeer::ID, $pks, Criteria::IN);
			$objs = CpapafonPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpapafonPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpapafonMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpapafonMapBuilder');
}
