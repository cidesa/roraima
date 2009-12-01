<?php


abstract class BaseCptraslaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cptrasla';

	
	const CLASS_DEFAULT = 'lib.model.presupuesto.Cptrasla';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFTRA = 'cptrasla.REFTRA';

	
	const FECTRA = 'cptrasla.FECTRA';

	
	const ANOTRA = 'cptrasla.ANOTRA';

	
	const PERTRA = 'cptrasla.PERTRA';

	
	const DESTRA = 'cptrasla.DESTRA';

	
	const DESANU = 'cptrasla.DESANU';

	
	const TOTTRA = 'cptrasla.TOTTRA';

	
	const STATRA = 'cptrasla.STATRA';

	
	const FECANU = 'cptrasla.FECANU';

	
	const NRODEC = 'cptrasla.NRODEC';

	
	const ID = 'cptrasla.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra', 'Fectra', 'Anotra', 'Pertra', 'Destra', 'Desanu', 'Tottra', 'Statra', 'Fecanu', 'Nrodec', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CptraslaPeer::REFTRA, CptraslaPeer::FECTRA, CptraslaPeer::ANOTRA, CptraslaPeer::PERTRA, CptraslaPeer::DESTRA, CptraslaPeer::DESANU, CptraslaPeer::TOTTRA, CptraslaPeer::STATRA, CptraslaPeer::FECANU, CptraslaPeer::NRODEC, CptraslaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra', 'fectra', 'anotra', 'pertra', 'destra', 'desanu', 'tottra', 'statra', 'fecanu', 'nrodec', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Reftra' => 0, 'Fectra' => 1, 'Anotra' => 2, 'Pertra' => 3, 'Destra' => 4, 'Desanu' => 5, 'Tottra' => 6, 'Statra' => 7, 'Fecanu' => 8, 'Nrodec' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (CptraslaPeer::REFTRA => 0, CptraslaPeer::FECTRA => 1, CptraslaPeer::ANOTRA => 2, CptraslaPeer::PERTRA => 3, CptraslaPeer::DESTRA => 4, CptraslaPeer::DESANU => 5, CptraslaPeer::TOTTRA => 6, CptraslaPeer::STATRA => 7, CptraslaPeer::FECANU => 8, CptraslaPeer::NRODEC => 9, CptraslaPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('reftra' => 0, 'fectra' => 1, 'anotra' => 2, 'pertra' => 3, 'destra' => 4, 'desanu' => 5, 'tottra' => 6, 'statra' => 7, 'fecanu' => 8, 'nrodec' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/presupuesto/map/CptraslaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.presupuesto.map.CptraslaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CptraslaPeer::getTableMap();
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
		return str_replace(CptraslaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CptraslaPeer::REFTRA);

		$criteria->addSelectColumn(CptraslaPeer::FECTRA);

		$criteria->addSelectColumn(CptraslaPeer::ANOTRA);

		$criteria->addSelectColumn(CptraslaPeer::PERTRA);

		$criteria->addSelectColumn(CptraslaPeer::DESTRA);

		$criteria->addSelectColumn(CptraslaPeer::DESANU);

		$criteria->addSelectColumn(CptraslaPeer::TOTTRA);

		$criteria->addSelectColumn(CptraslaPeer::STATRA);

		$criteria->addSelectColumn(CptraslaPeer::FECANU);

		$criteria->addSelectColumn(CptraslaPeer::NRODEC);

		$criteria->addSelectColumn(CptraslaPeer::ID);

	}

	const COUNT = 'COUNT(cptrasla.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cptrasla.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CptraslaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CptraslaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CptraslaPeer::doSelectRS($criteria, $con);
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
		$objects = CptraslaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CptraslaPeer::populateObjects(CptraslaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CptraslaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CptraslaPeer::getOMClass();
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
		return CptraslaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CptraslaPeer::ID); 

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
			$comparison = $criteria->getComparison(CptraslaPeer::ID);
			$selectCriteria->add(CptraslaPeer::ID, $criteria->remove(CptraslaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CptraslaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CptraslaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cptrasla) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CptraslaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cptrasla $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CptraslaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CptraslaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CptraslaPeer::DATABASE_NAME, CptraslaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CptraslaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CptraslaPeer::DATABASE_NAME);

		$criteria->add(CptraslaPeer::ID, $pk);


		$v = CptraslaPeer::doSelect($criteria, $con);

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
			$criteria->add(CptraslaPeer::ID, $pks, Criteria::IN);
			$objs = CptraslaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCptraslaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/presupuesto/map/CptraslaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.presupuesto.map.CptraslaMapBuilder');
}
