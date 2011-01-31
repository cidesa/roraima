<?php


abstract class BaseNpasiconempbckPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npasiconempbck';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npasiconempbck';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npasiconempbck.CODEMP';

	
	const CODCON = 'npasiconempbck.CODCON';

	
	const CODCAR = 'npasiconempbck.CODCAR';

	
	const NOMEMP = 'npasiconempbck.NOMEMP';

	
	const NOMCON = 'npasiconempbck.NOMCON';

	
	const NOMCAR = 'npasiconempbck.NOMCAR';

	
	const CANTIDAD = 'npasiconempbck.CANTIDAD';

	
	const MONTO = 'npasiconempbck.MONTO';

	
	const FECINI = 'npasiconempbck.FECINI';

	
	const FECEXP = 'npasiconempbck.FECEXP';

	
	const FRECON = 'npasiconempbck.FRECON';

	
	const ASIDED = 'npasiconempbck.ASIDED';

	
	const ACUCON = 'npasiconempbck.ACUCON';

	
	const CALCON = 'npasiconempbck.CALCON';

	
	const ACTIVO = 'npasiconempbck.ACTIVO';

	
	const ACUMULADO = 'npasiconempbck.ACUMULADO';

	
	const ID = 'npasiconempbck.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codcon', 'Codcar', 'Nomemp', 'Nomcon', 'Nomcar', 'Cantidad', 'Monto', 'Fecini', 'Fecexp', 'Frecon', 'Asided', 'Acucon', 'Calcon', 'Activo', 'Acumulado', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpasiconempbckPeer::CODEMP, NpasiconempbckPeer::CODCON, NpasiconempbckPeer::CODCAR, NpasiconempbckPeer::NOMEMP, NpasiconempbckPeer::NOMCON, NpasiconempbckPeer::NOMCAR, NpasiconempbckPeer::CANTIDAD, NpasiconempbckPeer::MONTO, NpasiconempbckPeer::FECINI, NpasiconempbckPeer::FECEXP, NpasiconempbckPeer::FRECON, NpasiconempbckPeer::ASIDED, NpasiconempbckPeer::ACUCON, NpasiconempbckPeer::CALCON, NpasiconempbckPeer::ACTIVO, NpasiconempbckPeer::ACUMULADO, NpasiconempbckPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codcon', 'codcar', 'nomemp', 'nomcon', 'nomcar', 'cantidad', 'monto', 'fecini', 'fecexp', 'frecon', 'asided', 'acucon', 'calcon', 'activo', 'acumulado', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codcon' => 1, 'Codcar' => 2, 'Nomemp' => 3, 'Nomcon' => 4, 'Nomcar' => 5, 'Cantidad' => 6, 'Monto' => 7, 'Fecini' => 8, 'Fecexp' => 9, 'Frecon' => 10, 'Asided' => 11, 'Acucon' => 12, 'Calcon' => 13, 'Activo' => 14, 'Acumulado' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (NpasiconempbckPeer::CODEMP => 0, NpasiconempbckPeer::CODCON => 1, NpasiconempbckPeer::CODCAR => 2, NpasiconempbckPeer::NOMEMP => 3, NpasiconempbckPeer::NOMCON => 4, NpasiconempbckPeer::NOMCAR => 5, NpasiconempbckPeer::CANTIDAD => 6, NpasiconempbckPeer::MONTO => 7, NpasiconempbckPeer::FECINI => 8, NpasiconempbckPeer::FECEXP => 9, NpasiconempbckPeer::FRECON => 10, NpasiconempbckPeer::ASIDED => 11, NpasiconempbckPeer::ACUCON => 12, NpasiconempbckPeer::CALCON => 13, NpasiconempbckPeer::ACTIVO => 14, NpasiconempbckPeer::ACUMULADO => 15, NpasiconempbckPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codcon' => 1, 'codcar' => 2, 'nomemp' => 3, 'nomcon' => 4, 'nomcar' => 5, 'cantidad' => 6, 'monto' => 7, 'fecini' => 8, 'fecexp' => 9, 'frecon' => 10, 'asided' => 11, 'acucon' => 12, 'calcon' => 13, 'activo' => 14, 'acumulado' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpasiconempbckMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpasiconempbckMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpasiconempbckPeer::getTableMap();
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
		return str_replace(NpasiconempbckPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpasiconempbckPeer::CODEMP);

		$criteria->addSelectColumn(NpasiconempbckPeer::CODCON);

		$criteria->addSelectColumn(NpasiconempbckPeer::CODCAR);

		$criteria->addSelectColumn(NpasiconempbckPeer::NOMEMP);

		$criteria->addSelectColumn(NpasiconempbckPeer::NOMCON);

		$criteria->addSelectColumn(NpasiconempbckPeer::NOMCAR);

		$criteria->addSelectColumn(NpasiconempbckPeer::CANTIDAD);

		$criteria->addSelectColumn(NpasiconempbckPeer::MONTO);

		$criteria->addSelectColumn(NpasiconempbckPeer::FECINI);

		$criteria->addSelectColumn(NpasiconempbckPeer::FECEXP);

		$criteria->addSelectColumn(NpasiconempbckPeer::FRECON);

		$criteria->addSelectColumn(NpasiconempbckPeer::ASIDED);

		$criteria->addSelectColumn(NpasiconempbckPeer::ACUCON);

		$criteria->addSelectColumn(NpasiconempbckPeer::CALCON);

		$criteria->addSelectColumn(NpasiconempbckPeer::ACTIVO);

		$criteria->addSelectColumn(NpasiconempbckPeer::ACUMULADO);

		$criteria->addSelectColumn(NpasiconempbckPeer::ID);

	}

	const COUNT = 'COUNT(npasiconempbck.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npasiconempbck.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpasiconempbckPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpasiconempbckPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpasiconempbckPeer::doSelectRS($criteria, $con);
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
		$objects = NpasiconempbckPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpasiconempbckPeer::populateObjects(NpasiconempbckPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpasiconempbckPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpasiconempbckPeer::getOMClass();
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
		return NpasiconempbckPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpasiconempbckPeer::ID); 

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
			$comparison = $criteria->getComparison(NpasiconempbckPeer::ID);
			$selectCriteria->add(NpasiconempbckPeer::ID, $criteria->remove(NpasiconempbckPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpasiconempbckPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpasiconempbckPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npasiconempbck) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpasiconempbckPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npasiconempbck $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpasiconempbckPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpasiconempbckPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpasiconempbckPeer::DATABASE_NAME, NpasiconempbckPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpasiconempbckPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpasiconempbckPeer::DATABASE_NAME);

		$criteria->add(NpasiconempbckPeer::ID, $pk);


		$v = NpasiconempbckPeer::doSelect($criteria, $con);

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
			$criteria->add(NpasiconempbckPeer::ID, $pks, Criteria::IN);
			$objs = NpasiconempbckPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpasiconempbckPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpasiconempbckMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpasiconempbckMapBuilder');
}
