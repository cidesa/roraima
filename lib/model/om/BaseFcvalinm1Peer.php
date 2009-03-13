<?php


abstract class BaseFcvalinm1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcvalinm1';

	
	const CLASS_DEFAULT = 'lib.model.Fcvalinm1';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODUSO = 'fcvalinm1.CODUSO';

	
	const VALINI = 'fcvalinm1.VALINI';

	
	const VALFIN = 'fcvalinm1.VALFIN';

	
	const ALIINM = 'fcvalinm1.ALIINM';

	
	const ANOVIG = 'fcvalinm1.ANOVIG';

	
	const DEDUC = 'fcvalinm1.DEDUC';

	
	const CODREF = 'fcvalinm1.CODREF';

	
	const ZONI = 'fcvalinm1.ZONI';

	
	const MANZ = 'fcvalinm1.MANZ';

	
	const PARMTS = 'fcvalinm1.PARMTS';

	
	const VALOR = 'fcvalinm1.VALOR';

	
	const TIPEDI = 'fcvalinm1.TIPEDI';

	
	const DESEDI = 'fcvalinm1.DESEDI';

	
	const NIVEL = 'fcvalinm1.NIVEL';

	
	const TIPO = 'fcvalinm1.TIPO';

	
	const MONTO = 'fcvalinm1.MONTO';

	
	const ID = 'fcvalinm1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coduso', 'Valini', 'Valfin', 'Aliinm', 'Anovig', 'Deduc', 'Codref', 'Zoni', 'Manz', 'Parmts', 'Valor', 'Tipedi', 'Desedi', 'Nivel', 'Tipo', 'Monto', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcvalinm1Peer::CODUSO, Fcvalinm1Peer::VALINI, Fcvalinm1Peer::VALFIN, Fcvalinm1Peer::ALIINM, Fcvalinm1Peer::ANOVIG, Fcvalinm1Peer::DEDUC, Fcvalinm1Peer::CODREF, Fcvalinm1Peer::ZONI, Fcvalinm1Peer::MANZ, Fcvalinm1Peer::PARMTS, Fcvalinm1Peer::VALOR, Fcvalinm1Peer::TIPEDI, Fcvalinm1Peer::DESEDI, Fcvalinm1Peer::NIVEL, Fcvalinm1Peer::TIPO, Fcvalinm1Peer::MONTO, Fcvalinm1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coduso', 'valini', 'valfin', 'aliinm', 'anovig', 'deduc', 'codref', 'zoni', 'manz', 'parmts', 'valor', 'tipedi', 'desedi', 'nivel', 'tipo', 'monto', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coduso' => 0, 'Valini' => 1, 'Valfin' => 2, 'Aliinm' => 3, 'Anovig' => 4, 'Deduc' => 5, 'Codref' => 6, 'Zoni' => 7, 'Manz' => 8, 'Parmts' => 9, 'Valor' => 10, 'Tipedi' => 11, 'Desedi' => 12, 'Nivel' => 13, 'Tipo' => 14, 'Monto' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (Fcvalinm1Peer::CODUSO => 0, Fcvalinm1Peer::VALINI => 1, Fcvalinm1Peer::VALFIN => 2, Fcvalinm1Peer::ALIINM => 3, Fcvalinm1Peer::ANOVIG => 4, Fcvalinm1Peer::DEDUC => 5, Fcvalinm1Peer::CODREF => 6, Fcvalinm1Peer::ZONI => 7, Fcvalinm1Peer::MANZ => 8, Fcvalinm1Peer::PARMTS => 9, Fcvalinm1Peer::VALOR => 10, Fcvalinm1Peer::TIPEDI => 11, Fcvalinm1Peer::DESEDI => 12, Fcvalinm1Peer::NIVEL => 13, Fcvalinm1Peer::TIPO => 14, Fcvalinm1Peer::MONTO => 15, Fcvalinm1Peer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('coduso' => 0, 'valini' => 1, 'valfin' => 2, 'aliinm' => 3, 'anovig' => 4, 'deduc' => 5, 'codref' => 6, 'zoni' => 7, 'manz' => 8, 'parmts' => 9, 'valor' => 10, 'tipedi' => 11, 'desedi' => 12, 'nivel' => 13, 'tipo' => 14, 'monto' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcvalinm1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcvalinm1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcvalinm1Peer::getTableMap();
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
		return str_replace(Fcvalinm1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcvalinm1Peer::CODUSO);

		$criteria->addSelectColumn(Fcvalinm1Peer::VALINI);

		$criteria->addSelectColumn(Fcvalinm1Peer::VALFIN);

		$criteria->addSelectColumn(Fcvalinm1Peer::ALIINM);

		$criteria->addSelectColumn(Fcvalinm1Peer::ANOVIG);

		$criteria->addSelectColumn(Fcvalinm1Peer::DEDUC);

		$criteria->addSelectColumn(Fcvalinm1Peer::CODREF);

		$criteria->addSelectColumn(Fcvalinm1Peer::ZONI);

		$criteria->addSelectColumn(Fcvalinm1Peer::MANZ);

		$criteria->addSelectColumn(Fcvalinm1Peer::PARMTS);

		$criteria->addSelectColumn(Fcvalinm1Peer::VALOR);

		$criteria->addSelectColumn(Fcvalinm1Peer::TIPEDI);

		$criteria->addSelectColumn(Fcvalinm1Peer::DESEDI);

		$criteria->addSelectColumn(Fcvalinm1Peer::NIVEL);

		$criteria->addSelectColumn(Fcvalinm1Peer::TIPO);

		$criteria->addSelectColumn(Fcvalinm1Peer::MONTO);

		$criteria->addSelectColumn(Fcvalinm1Peer::ID);

	}

	const COUNT = 'COUNT(fcvalinm1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcvalinm1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcvalinm1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcvalinm1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcvalinm1Peer::doSelectRS($criteria, $con);
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
		$objects = Fcvalinm1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcvalinm1Peer::populateObjects(Fcvalinm1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcvalinm1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcvalinm1Peer::getOMClass();
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
		return Fcvalinm1Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcvalinm1Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcvalinm1Peer::ID);
			$selectCriteria->add(Fcvalinm1Peer::ID, $criteria->remove(Fcvalinm1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcvalinm1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcvalinm1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcvalinm1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcvalinm1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcvalinm1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcvalinm1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcvalinm1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcvalinm1Peer::DATABASE_NAME, Fcvalinm1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcvalinm1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcvalinm1Peer::DATABASE_NAME);

		$criteria->add(Fcvalinm1Peer::ID, $pk);


		$v = Fcvalinm1Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcvalinm1Peer::ID, $pks, Criteria::IN);
			$objs = Fcvalinm1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcvalinm1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcvalinm1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcvalinm1MapBuilder');
}
