<?php


abstract class BaseConprestamosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'conprestamos';

	
	const CLASS_DEFAULT = 'lib.model.Conprestamos';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'conprestamos.CODEMP';

	
	const CODCON = 'conprestamos.CODCON';

	
	const CODCAR = 'conprestamos.CODCAR';

	
	const NOMEMP = 'conprestamos.NOMEMP';

	
	const NOMCON = 'conprestamos.NOMCON';

	
	const NOMCAR = 'conprestamos.NOMCAR';

	
	const CANTIDAD = 'conprestamos.CANTIDAD';

	
	const MONTO = 'conprestamos.MONTO';

	
	const FECINI = 'conprestamos.FECINI';

	
	const FECEXP = 'conprestamos.FECEXP';

	
	const FRECON = 'conprestamos.FRECON';

	
	const ASIDED = 'conprestamos.ASIDED';

	
	const ACUCON = 'conprestamos.ACUCON';

	
	const CALCON = 'conprestamos.CALCON';

	
	const ACTIVO = 'conprestamos.ACTIVO';

	
	const ACUMULADO = 'conprestamos.ACUMULADO';

	
	const ID = 'conprestamos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcon', 'Codcar', 'Nomemp', 'Nomcon', 'Nomcar', 'Cantidad', 'Monto', 'Fecini', 'Fecexp', 'Frecon', 'Asided', 'Acucon', 'Calcon', 'Activo', 'Acumulado', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ConprestamosPeer::CODEMP, ConprestamosPeer::CODCON, ConprestamosPeer::CODCAR, ConprestamosPeer::NOMEMP, ConprestamosPeer::NOMCON, ConprestamosPeer::NOMCAR, ConprestamosPeer::CANTIDAD, ConprestamosPeer::MONTO, ConprestamosPeer::FECINI, ConprestamosPeer::FECEXP, ConprestamosPeer::FRECON, ConprestamosPeer::ASIDED, ConprestamosPeer::ACUCON, ConprestamosPeer::CALCON, ConprestamosPeer::ACTIVO, ConprestamosPeer::ACUMULADO, ConprestamosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcon', 'codcar', 'nomemp', 'nomcon', 'nomcar', 'cantidad', 'monto', 'fecini', 'fecexp', 'frecon', 'asided', 'acucon', 'calcon', 'activo', 'acumulado', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcon' => 1, 'Codcar' => 2, 'Nomemp' => 3, 'Nomcon' => 4, 'Nomcar' => 5, 'Cantidad' => 6, 'Monto' => 7, 'Fecini' => 8, 'Fecexp' => 9, 'Frecon' => 10, 'Asided' => 11, 'Acucon' => 12, 'Calcon' => 13, 'Activo' => 14, 'Acumulado' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (ConprestamosPeer::CODEMP => 0, ConprestamosPeer::CODCON => 1, ConprestamosPeer::CODCAR => 2, ConprestamosPeer::NOMEMP => 3, ConprestamosPeer::NOMCON => 4, ConprestamosPeer::NOMCAR => 5, ConprestamosPeer::CANTIDAD => 6, ConprestamosPeer::MONTO => 7, ConprestamosPeer::FECINI => 8, ConprestamosPeer::FECEXP => 9, ConprestamosPeer::FRECON => 10, ConprestamosPeer::ASIDED => 11, ConprestamosPeer::ACUCON => 12, ConprestamosPeer::CALCON => 13, ConprestamosPeer::ACTIVO => 14, ConprestamosPeer::ACUMULADO => 15, ConprestamosPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcon' => 1, 'codcar' => 2, 'nomemp' => 3, 'nomcon' => 4, 'nomcar' => 5, 'cantidad' => 6, 'monto' => 7, 'fecini' => 8, 'fecexp' => 9, 'frecon' => 10, 'asided' => 11, 'acucon' => 12, 'calcon' => 13, 'activo' => 14, 'acumulado' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ConprestamosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ConprestamosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ConprestamosPeer::getTableMap();
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
		return str_replace(ConprestamosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ConprestamosPeer::CODEMP);

		$criteria->addSelectColumn(ConprestamosPeer::CODCON);

		$criteria->addSelectColumn(ConprestamosPeer::CODCAR);

		$criteria->addSelectColumn(ConprestamosPeer::NOMEMP);

		$criteria->addSelectColumn(ConprestamosPeer::NOMCON);

		$criteria->addSelectColumn(ConprestamosPeer::NOMCAR);

		$criteria->addSelectColumn(ConprestamosPeer::CANTIDAD);

		$criteria->addSelectColumn(ConprestamosPeer::MONTO);

		$criteria->addSelectColumn(ConprestamosPeer::FECINI);

		$criteria->addSelectColumn(ConprestamosPeer::FECEXP);

		$criteria->addSelectColumn(ConprestamosPeer::FRECON);

		$criteria->addSelectColumn(ConprestamosPeer::ASIDED);

		$criteria->addSelectColumn(ConprestamosPeer::ACUCON);

		$criteria->addSelectColumn(ConprestamosPeer::CALCON);

		$criteria->addSelectColumn(ConprestamosPeer::ACTIVO);

		$criteria->addSelectColumn(ConprestamosPeer::ACUMULADO);

		$criteria->addSelectColumn(ConprestamosPeer::ID);

	}

	const COUNT = 'COUNT(conprestamos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT conprestamos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ConprestamosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ConprestamosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ConprestamosPeer::doSelectRS($criteria, $con);
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
		$objects = ConprestamosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ConprestamosPeer::populateObjects(ConprestamosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ConprestamosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ConprestamosPeer::getOMClass();
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
		return ConprestamosPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(ConprestamosPeer::ID);
			$selectCriteria->add(ConprestamosPeer::ID, $criteria->remove(ConprestamosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ConprestamosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ConprestamosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Conprestamos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ConprestamosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Conprestamos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ConprestamosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ConprestamosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ConprestamosPeer::DATABASE_NAME, ConprestamosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ConprestamosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ConprestamosPeer::DATABASE_NAME);

		$criteria->add(ConprestamosPeer::ID, $pk);


		$v = ConprestamosPeer::doSelect($criteria, $con);

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
			$criteria->add(ConprestamosPeer::ID, $pks, Criteria::IN);
			$objs = ConprestamosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseConprestamosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ConprestamosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ConprestamosMapBuilder');
}
