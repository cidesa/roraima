<?php


abstract class BaseNpasiconempPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npasiconemp';

	
	const CLASS_DEFAULT = 'lib.model.Npasiconemp';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npasiconemp.CODEMP';

	
	const CODCON = 'npasiconemp.CODCON';

	
	const CODCAR = 'npasiconemp.CODCAR';

	
	const NOMEMP = 'npasiconemp.NOMEMP';

	
	const NOMCON = 'npasiconemp.NOMCON';

	
	const NOMCAR = 'npasiconemp.NOMCAR';

	
	const CANTIDAD = 'npasiconemp.CANTIDAD';

	
	const MONTO = 'npasiconemp.MONTO';

	
	const FECINI = 'npasiconemp.FECINI';

	
	const FECEXP = 'npasiconemp.FECEXP';

	
	const FRECON = 'npasiconemp.FRECON';

	
	const ASIDED = 'npasiconemp.ASIDED';

	
	const ACUCON = 'npasiconemp.ACUCON';

	
	const CALCON = 'npasiconemp.CALCON';

	
	const ACTIVO = 'npasiconemp.ACTIVO';

	
	const ACUMULADO = 'npasiconemp.ACUMULADO';

	
	const ID = 'npasiconemp.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcon', 'Codcar', 'Nomemp', 'Nomcon', 'Nomcar', 'Cantidad', 'Monto', 'Fecini', 'Fecexp', 'Frecon', 'Asided', 'Acucon', 'Calcon', 'Activo', 'Acumulado', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpasiconempPeer::CODEMP, NpasiconempPeer::CODCON, NpasiconempPeer::CODCAR, NpasiconempPeer::NOMEMP, NpasiconempPeer::NOMCON, NpasiconempPeer::NOMCAR, NpasiconempPeer::CANTIDAD, NpasiconempPeer::MONTO, NpasiconempPeer::FECINI, NpasiconempPeer::FECEXP, NpasiconempPeer::FRECON, NpasiconempPeer::ASIDED, NpasiconempPeer::ACUCON, NpasiconempPeer::CALCON, NpasiconempPeer::ACTIVO, NpasiconempPeer::ACUMULADO, NpasiconempPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcon', 'codcar', 'nomemp', 'nomcon', 'nomcar', 'cantidad', 'monto', 'fecini', 'fecexp', 'frecon', 'asided', 'acucon', 'calcon', 'activo', 'acumulado', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcon' => 1, 'Codcar' => 2, 'Nomemp' => 3, 'Nomcon' => 4, 'Nomcar' => 5, 'Cantidad' => 6, 'Monto' => 7, 'Fecini' => 8, 'Fecexp' => 9, 'Frecon' => 10, 'Asided' => 11, 'Acucon' => 12, 'Calcon' => 13, 'Activo' => 14, 'Acumulado' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (NpasiconempPeer::CODEMP => 0, NpasiconempPeer::CODCON => 1, NpasiconempPeer::CODCAR => 2, NpasiconempPeer::NOMEMP => 3, NpasiconempPeer::NOMCON => 4, NpasiconempPeer::NOMCAR => 5, NpasiconempPeer::CANTIDAD => 6, NpasiconempPeer::MONTO => 7, NpasiconempPeer::FECINI => 8, NpasiconempPeer::FECEXP => 9, NpasiconempPeer::FRECON => 10, NpasiconempPeer::ASIDED => 11, NpasiconempPeer::ACUCON => 12, NpasiconempPeer::CALCON => 13, NpasiconempPeer::ACTIVO => 14, NpasiconempPeer::ACUMULADO => 15, NpasiconempPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcon' => 1, 'codcar' => 2, 'nomemp' => 3, 'nomcon' => 4, 'nomcar' => 5, 'cantidad' => 6, 'monto' => 7, 'fecini' => 8, 'fecexp' => 9, 'frecon' => 10, 'asided' => 11, 'acucon' => 12, 'calcon' => 13, 'activo' => 14, 'acumulado' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpasiconempMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpasiconempMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpasiconempPeer::getTableMap();
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
		return str_replace(NpasiconempPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpasiconempPeer::CODEMP);

		$criteria->addSelectColumn(NpasiconempPeer::CODCON);

		$criteria->addSelectColumn(NpasiconempPeer::CODCAR);

		$criteria->addSelectColumn(NpasiconempPeer::NOMEMP);

		$criteria->addSelectColumn(NpasiconempPeer::NOMCON);

		$criteria->addSelectColumn(NpasiconempPeer::NOMCAR);

		$criteria->addSelectColumn(NpasiconempPeer::CANTIDAD);

		$criteria->addSelectColumn(NpasiconempPeer::MONTO);

		$criteria->addSelectColumn(NpasiconempPeer::FECINI);

		$criteria->addSelectColumn(NpasiconempPeer::FECEXP);

		$criteria->addSelectColumn(NpasiconempPeer::FRECON);

		$criteria->addSelectColumn(NpasiconempPeer::ASIDED);

		$criteria->addSelectColumn(NpasiconempPeer::ACUCON);

		$criteria->addSelectColumn(NpasiconempPeer::CALCON);

		$criteria->addSelectColumn(NpasiconempPeer::ACTIVO);

		$criteria->addSelectColumn(NpasiconempPeer::ACUMULADO);

		$criteria->addSelectColumn(NpasiconempPeer::ID);

	}

	const COUNT = 'COUNT(npasiconemp.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npasiconemp.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpasiconempPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpasiconempPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpasiconempPeer::doSelectRS($criteria, $con);
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
		$objects = NpasiconempPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpasiconempPeer::populateObjects(NpasiconempPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpasiconempPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpasiconempPeer::getOMClass();
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
		return NpasiconempPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpasiconempPeer::ID);
			$selectCriteria->add(NpasiconempPeer::ID, $criteria->remove(NpasiconempPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpasiconempPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpasiconempPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npasiconemp) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpasiconempPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npasiconemp $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpasiconempPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpasiconempPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpasiconempPeer::DATABASE_NAME, NpasiconempPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpasiconempPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpasiconempPeer::DATABASE_NAME);

		$criteria->add(NpasiconempPeer::ID, $pk);


		$v = NpasiconempPeer::doSelect($criteria, $con);

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
			$criteria->add(NpasiconempPeer::ID, $pks, Criteria::IN);
			$objs = NpasiconempPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpasiconempPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpasiconempMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpasiconempMapBuilder');
}
