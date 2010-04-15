<?php


abstract class BaseContabbtempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contabbtemp';

	
	const CLASS_DEFAULT = 'lib.model.Contabbtemp';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'contabbtemp.CODCTA';

	
	const DESCTA = 'contabbtemp.DESCTA';

	
	const FECINI = 'contabbtemp.FECINI';

	
	const FECCIE = 'contabbtemp.FECCIE';

	
	const SALANT = 'contabbtemp.SALANT';

	
	const DEBCRE = 'contabbtemp.DEBCRE';

	
	const CARGAB = 'contabbtemp.CARGAB';

	
	const SALPRGPER = 'contabbtemp.SALPRGPER';

	
	const SALACUPER = 'contabbtemp.SALACUPER';

	
	const SALPRGPERFOR = 'contabbtemp.SALPRGPERFOR';

	
	const ID = 'contabbtemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Descta', 'Fecini', 'Feccie', 'Salant', 'Debcre', 'Cargab', 'Salprgper', 'Salacuper', 'Salprgperfor', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ContabbtempPeer::CODCTA, ContabbtempPeer::DESCTA, ContabbtempPeer::FECINI, ContabbtempPeer::FECCIE, ContabbtempPeer::SALANT, ContabbtempPeer::DEBCRE, ContabbtempPeer::CARGAB, ContabbtempPeer::SALPRGPER, ContabbtempPeer::SALACUPER, ContabbtempPeer::SALPRGPERFOR, ContabbtempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'descta', 'fecini', 'feccie', 'salant', 'debcre', 'cargab', 'salprgper', 'salacuper', 'salprgperfor', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Descta' => 1, 'Fecini' => 2, 'Feccie' => 3, 'Salant' => 4, 'Debcre' => 5, 'Cargab' => 6, 'Salprgper' => 7, 'Salacuper' => 8, 'Salprgperfor' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (ContabbtempPeer::CODCTA => 0, ContabbtempPeer::DESCTA => 1, ContabbtempPeer::FECINI => 2, ContabbtempPeer::FECCIE => 3, ContabbtempPeer::SALANT => 4, ContabbtempPeer::DEBCRE => 5, ContabbtempPeer::CARGAB => 6, ContabbtempPeer::SALPRGPER => 7, ContabbtempPeer::SALACUPER => 8, ContabbtempPeer::SALPRGPERFOR => 9, ContabbtempPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'descta' => 1, 'fecini' => 2, 'feccie' => 3, 'salant' => 4, 'debcre' => 5, 'cargab' => 6, 'salprgper' => 7, 'salacuper' => 8, 'salprgperfor' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ContabbtempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ContabbtempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContabbtempPeer::getTableMap();
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
		return str_replace(ContabbtempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContabbtempPeer::CODCTA);

		$criteria->addSelectColumn(ContabbtempPeer::DESCTA);

		$criteria->addSelectColumn(ContabbtempPeer::FECINI);

		$criteria->addSelectColumn(ContabbtempPeer::FECCIE);

		$criteria->addSelectColumn(ContabbtempPeer::SALANT);

		$criteria->addSelectColumn(ContabbtempPeer::DEBCRE);

		$criteria->addSelectColumn(ContabbtempPeer::CARGAB);

		$criteria->addSelectColumn(ContabbtempPeer::SALPRGPER);

		$criteria->addSelectColumn(ContabbtempPeer::SALACUPER);

		$criteria->addSelectColumn(ContabbtempPeer::SALPRGPERFOR);

		$criteria->addSelectColumn(ContabbtempPeer::ID);

	}

	const COUNT = 'COUNT(contabbtemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contabbtemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContabbtempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContabbtempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContabbtempPeer::doSelectRS($criteria, $con);
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
		$objects = ContabbtempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContabbtempPeer::populateObjects(ContabbtempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContabbtempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContabbtempPeer::getOMClass();
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
		return ContabbtempPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(ContabbtempPeer::ID);
			$selectCriteria->add(ContabbtempPeer::ID, $criteria->remove(ContabbtempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ContabbtempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContabbtempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contabbtemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContabbtempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Contabbtemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContabbtempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContabbtempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContabbtempPeer::DATABASE_NAME, ContabbtempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContabbtempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContabbtempPeer::DATABASE_NAME);

		$criteria->add(ContabbtempPeer::ID, $pk);


		$v = ContabbtempPeer::doSelect($criteria, $con);

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
			$criteria->add(ContabbtempPeer::ID, $pks, Criteria::IN);
			$objs = ContabbtempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabbtempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ContabbtempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ContabbtempMapBuilder');
}
