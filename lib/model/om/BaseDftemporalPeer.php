<?php


abstract class BaseDftemporalPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dftemporal';

	
	const CLASS_DEFAULT = 'lib.model.Dftemporal';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODIGO = 'dftemporal.CODIGO';

	
	const FECHA = 'dftemporal.FECHA';

	
	const MONTO = 'dftemporal.MONTO';

	
	const ABR = 'dftemporal.ABR';

	
	const BEN = 'dftemporal.BEN';

	
	const FECHAREC = 'dftemporal.FECHAREC';

	
	const ESTAD = 'dftemporal.ESTAD';

	
	const NOMTAB = 'dftemporal.NOMTAB';

	
	const UNI = 'dftemporal.UNI';

	
	const UNIDAD = 'dftemporal.UNIDAD';

	
	const UNIDADORI = 'dftemporal.UNIDADORI';

	
	const VIDA = 'dftemporal.VIDA';

	
	const ID = 'dftemporal.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codigo', 'Fecha', 'Monto', 'Abr', 'Ben', 'Fecharec', 'Estad', 'Nomtab', 'Uni', 'Unidad', 'Unidadori', 'Vida', 'Id', ),
		BasePeer::TYPE_COLNAME => array (DftemporalPeer::CODIGO, DftemporalPeer::FECHA, DftemporalPeer::MONTO, DftemporalPeer::ABR, DftemporalPeer::BEN, DftemporalPeer::FECHAREC, DftemporalPeer::ESTAD, DftemporalPeer::NOMTAB, DftemporalPeer::UNI, DftemporalPeer::UNIDAD, DftemporalPeer::UNIDADORI, DftemporalPeer::VIDA, DftemporalPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codigo', 'fecha', 'monto', 'abr', 'ben', 'fecharec', 'estad', 'nomtab', 'uni', 'unidad', 'unidadori', 'vida', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codigo' => 0, 'Fecha' => 1, 'Monto' => 2, 'Abr' => 3, 'Ben' => 4, 'Fecharec' => 5, 'Estad' => 6, 'Nomtab' => 7, 'Uni' => 8, 'Unidad' => 9, 'Unidadori' => 10, 'Vida' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (DftemporalPeer::CODIGO => 0, DftemporalPeer::FECHA => 1, DftemporalPeer::MONTO => 2, DftemporalPeer::ABR => 3, DftemporalPeer::BEN => 4, DftemporalPeer::FECHAREC => 5, DftemporalPeer::ESTAD => 6, DftemporalPeer::NOMTAB => 7, DftemporalPeer::UNI => 8, DftemporalPeer::UNIDAD => 9, DftemporalPeer::UNIDADORI => 10, DftemporalPeer::VIDA => 11, DftemporalPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codigo' => 0, 'fecha' => 1, 'monto' => 2, 'abr' => 3, 'ben' => 4, 'fecharec' => 5, 'estad' => 6, 'nomtab' => 7, 'uni' => 8, 'unidad' => 9, 'unidadori' => 10, 'vida' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DftemporalMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DftemporalMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DftemporalPeer::getTableMap();
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
		return str_replace(DftemporalPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DftemporalPeer::CODIGO);

		$criteria->addSelectColumn(DftemporalPeer::FECHA);

		$criteria->addSelectColumn(DftemporalPeer::MONTO);

		$criteria->addSelectColumn(DftemporalPeer::ABR);

		$criteria->addSelectColumn(DftemporalPeer::BEN);

		$criteria->addSelectColumn(DftemporalPeer::FECHAREC);

		$criteria->addSelectColumn(DftemporalPeer::ESTAD);

		$criteria->addSelectColumn(DftemporalPeer::NOMTAB);

		$criteria->addSelectColumn(DftemporalPeer::UNI);

		$criteria->addSelectColumn(DftemporalPeer::UNIDAD);

		$criteria->addSelectColumn(DftemporalPeer::UNIDADORI);

		$criteria->addSelectColumn(DftemporalPeer::VIDA);

		$criteria->addSelectColumn(DftemporalPeer::ID);

	}

	const COUNT = 'COUNT(dftemporal.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dftemporal.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DftemporalPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DftemporalPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DftemporalPeer::doSelectRS($criteria, $con);
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
		$objects = DftemporalPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DftemporalPeer::populateObjects(DftemporalPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DftemporalPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DftemporalPeer::getOMClass();
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
		return DftemporalPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DftemporalPeer::ID); 

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
			$comparison = $criteria->getComparison(DftemporalPeer::ID);
			$selectCriteria->add(DftemporalPeer::ID, $criteria->remove(DftemporalPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DftemporalPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DftemporalPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dftemporal) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DftemporalPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dftemporal $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DftemporalPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DftemporalPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DftemporalPeer::DATABASE_NAME, DftemporalPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DftemporalPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DftemporalPeer::DATABASE_NAME);

		$criteria->add(DftemporalPeer::ID, $pk);


		$v = DftemporalPeer::doSelect($criteria, $con);

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
			$criteria->add(DftemporalPeer::ID, $pks, Criteria::IN);
			$objs = DftemporalPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDftemporalPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DftemporalMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DftemporalMapBuilder');
}
