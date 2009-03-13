<?php


abstract class BaseCpdisnivPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpdisniv';

	
	const CLASS_DEFAULT = 'lib.model.Cpdisniv';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cpdisniv.CODPRE';

	
	const MONASI = 'cpdisniv.MONASI';

	
	const MODIFICACION = 'cpdisniv.MODIFICACION';

	
	const ASIGACTUAL = 'cpdisniv.ASIGACTUAL';

	
	const MONPRC = 'cpdisniv.MONPRC';

	
	const MONCOM = 'cpdisniv.MONCOM';

	
	const MONCAU = 'cpdisniv.MONCAU';

	
	const MONPAG = 'cpdisniv.MONPAG';

	
	const MONAJU = 'cpdisniv.MONAJU';

	
	const MONDIS = 'cpdisniv.MONDIS';

	
	const DEUDA = 'cpdisniv.DEUDA';

	
	const ID = 'cpdisniv.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Monasi', 'Modificacion', 'Asigactual', 'Monprc', 'Moncom', 'Moncau', 'Monpag', 'Monaju', 'Mondis', 'Deuda', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpdisnivPeer::CODPRE, CpdisnivPeer::MONASI, CpdisnivPeer::MODIFICACION, CpdisnivPeer::ASIGACTUAL, CpdisnivPeer::MONPRC, CpdisnivPeer::MONCOM, CpdisnivPeer::MONCAU, CpdisnivPeer::MONPAG, CpdisnivPeer::MONAJU, CpdisnivPeer::MONDIS, CpdisnivPeer::DEUDA, CpdisnivPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'monasi', 'modificacion', 'asigactual', 'monprc', 'moncom', 'moncau', 'monpag', 'monaju', 'mondis', 'deuda', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Monasi' => 1, 'Modificacion' => 2, 'Asigactual' => 3, 'Monprc' => 4, 'Moncom' => 5, 'Moncau' => 6, 'Monpag' => 7, 'Monaju' => 8, 'Mondis' => 9, 'Deuda' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (CpdisnivPeer::CODPRE => 0, CpdisnivPeer::MONASI => 1, CpdisnivPeer::MODIFICACION => 2, CpdisnivPeer::ASIGACTUAL => 3, CpdisnivPeer::MONPRC => 4, CpdisnivPeer::MONCOM => 5, CpdisnivPeer::MONCAU => 6, CpdisnivPeer::MONPAG => 7, CpdisnivPeer::MONAJU => 8, CpdisnivPeer::MONDIS => 9, CpdisnivPeer::DEUDA => 10, CpdisnivPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'monasi' => 1, 'modificacion' => 2, 'asigactual' => 3, 'monprc' => 4, 'moncom' => 5, 'moncau' => 6, 'monpag' => 7, 'monaju' => 8, 'mondis' => 9, 'deuda' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpdisnivMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpdisnivMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpdisnivPeer::getTableMap();
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
		return str_replace(CpdisnivPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpdisnivPeer::CODPRE);

		$criteria->addSelectColumn(CpdisnivPeer::MONASI);

		$criteria->addSelectColumn(CpdisnivPeer::MODIFICACION);

		$criteria->addSelectColumn(CpdisnivPeer::ASIGACTUAL);

		$criteria->addSelectColumn(CpdisnivPeer::MONPRC);

		$criteria->addSelectColumn(CpdisnivPeer::MONCOM);

		$criteria->addSelectColumn(CpdisnivPeer::MONCAU);

		$criteria->addSelectColumn(CpdisnivPeer::MONPAG);

		$criteria->addSelectColumn(CpdisnivPeer::MONAJU);

		$criteria->addSelectColumn(CpdisnivPeer::MONDIS);

		$criteria->addSelectColumn(CpdisnivPeer::DEUDA);

		$criteria->addSelectColumn(CpdisnivPeer::ID);

	}

	const COUNT = 'COUNT(cpdisniv.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpdisniv.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpdisnivPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpdisnivPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpdisnivPeer::doSelectRS($criteria, $con);
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
		$objects = CpdisnivPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpdisnivPeer::populateObjects(CpdisnivPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpdisnivPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpdisnivPeer::getOMClass();
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
		return CpdisnivPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpdisnivPeer::ID);
			$selectCriteria->add(CpdisnivPeer::ID, $criteria->remove(CpdisnivPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpdisnivPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpdisnivPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpdisniv) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpdisnivPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpdisniv $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpdisnivPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpdisnivPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpdisnivPeer::DATABASE_NAME, CpdisnivPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpdisnivPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpdisnivPeer::DATABASE_NAME);

		$criteria->add(CpdisnivPeer::ID, $pk);


		$v = CpdisnivPeer::doSelect($criteria, $con);

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
			$criteria->add(CpdisnivPeer::ID, $pks, Criteria::IN);
			$objs = CpdisnivPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpdisnivPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpdisnivMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpdisnivMapBuilder');
}
