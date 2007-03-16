<?php


abstract class BaseNpcienomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcienom';

	
	const CLASS_DEFAULT = 'lib.model.Npcienom';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npcienom.CODNOM';

	
	const CODCON = 'npcienom.CODCON';

	
	const FECNOM = 'npcienom.FECNOM';

	
	const CODPRE = 'npcienom.CODPRE';

	
	const CODCTA = 'npcienom.CODCTA';

	
	const MONTO = 'npcienom.MONTO';

	
	const ASIDED = 'npcienom.ASIDED';

	
	const CODTIPGAS = 'npcienom.CODTIPGAS';

	
	const CANTIDAD = 'npcienom.CANTIDAD';

	
	const CODBAN = 'npcienom.CODBAN';

	
	const ESPECIAL = 'npcienom.ESPECIAL';

	
	const CODNOMESP = 'npcienom.CODNOMESP';

	
	const NOMNOMESP = 'npcienom.NOMNOMESP';

	
	const ID = 'npcienom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codcon', 'Fecnom', 'Codpre', 'Codcta', 'Monto', 'Asided', 'Codtipgas', 'Cantidad', 'Codban', 'Especial', 'Codnomesp', 'Nomnomesp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcienomPeer::CODNOM, NpcienomPeer::CODCON, NpcienomPeer::FECNOM, NpcienomPeer::CODPRE, NpcienomPeer::CODCTA, NpcienomPeer::MONTO, NpcienomPeer::ASIDED, NpcienomPeer::CODTIPGAS, NpcienomPeer::CANTIDAD, NpcienomPeer::CODBAN, NpcienomPeer::ESPECIAL, NpcienomPeer::CODNOMESP, NpcienomPeer::NOMNOMESP, NpcienomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codcon', 'fecnom', 'codpre', 'codcta', 'monto', 'asided', 'codtipgas', 'cantidad', 'codban', 'especial', 'codnomesp', 'nomnomesp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codcon' => 1, 'Fecnom' => 2, 'Codpre' => 3, 'Codcta' => 4, 'Monto' => 5, 'Asided' => 6, 'Codtipgas' => 7, 'Cantidad' => 8, 'Codban' => 9, 'Especial' => 10, 'Codnomesp' => 11, 'Nomnomesp' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (NpcienomPeer::CODNOM => 0, NpcienomPeer::CODCON => 1, NpcienomPeer::FECNOM => 2, NpcienomPeer::CODPRE => 3, NpcienomPeer::CODCTA => 4, NpcienomPeer::MONTO => 5, NpcienomPeer::ASIDED => 6, NpcienomPeer::CODTIPGAS => 7, NpcienomPeer::CANTIDAD => 8, NpcienomPeer::CODBAN => 9, NpcienomPeer::ESPECIAL => 10, NpcienomPeer::CODNOMESP => 11, NpcienomPeer::NOMNOMESP => 12, NpcienomPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codcon' => 1, 'fecnom' => 2, 'codpre' => 3, 'codcta' => 4, 'monto' => 5, 'asided' => 6, 'codtipgas' => 7, 'cantidad' => 8, 'codban' => 9, 'especial' => 10, 'codnomesp' => 11, 'nomnomesp' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpcienomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpcienomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcienomPeer::getTableMap();
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
		return str_replace(NpcienomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcienomPeer::CODNOM);

		$criteria->addSelectColumn(NpcienomPeer::CODCON);

		$criteria->addSelectColumn(NpcienomPeer::FECNOM);

		$criteria->addSelectColumn(NpcienomPeer::CODPRE);

		$criteria->addSelectColumn(NpcienomPeer::CODCTA);

		$criteria->addSelectColumn(NpcienomPeer::MONTO);

		$criteria->addSelectColumn(NpcienomPeer::ASIDED);

		$criteria->addSelectColumn(NpcienomPeer::CODTIPGAS);

		$criteria->addSelectColumn(NpcienomPeer::CANTIDAD);

		$criteria->addSelectColumn(NpcienomPeer::CODBAN);

		$criteria->addSelectColumn(NpcienomPeer::ESPECIAL);

		$criteria->addSelectColumn(NpcienomPeer::CODNOMESP);

		$criteria->addSelectColumn(NpcienomPeer::NOMNOMESP);

		$criteria->addSelectColumn(NpcienomPeer::ID);

	}

	const COUNT = 'COUNT(npcienom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcienom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcienomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcienomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcienomPeer::doSelectRS($criteria, $con);
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
		$objects = NpcienomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcienomPeer::populateObjects(NpcienomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcienomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcienomPeer::getOMClass();
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
		return NpcienomPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpcienomPeer::ID);
			$selectCriteria->add(NpcienomPeer::ID, $criteria->remove(NpcienomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcienomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcienomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcienom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcienomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcienom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcienomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcienomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcienomPeer::DATABASE_NAME, NpcienomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcienomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcienomPeer::DATABASE_NAME);

		$criteria->add(NpcienomPeer::ID, $pk);


		$v = NpcienomPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcienomPeer::ID, $pks, Criteria::IN);
			$objs = NpcienomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcienomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpcienomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpcienomMapBuilder');
}
