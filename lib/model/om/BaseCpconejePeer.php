<?php


abstract class BaseCpconejePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpconeje';

	
	const CLASS_DEFAULT = 'lib.model.Cpconeje';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cpconeje.CODPRE';

	
	const NOMPRE = 'cpconeje.NOMPRE';

	
	const MONDIS = 'cpconeje.MONDIS';

	
	const MONTRA = 'cpconeje.MONTRA';

	
	const MONADI = 'cpconeje.MONADI';

	
	const MONASI = 'cpconeje.MONASI';

	
	const REF = 'cpconeje.REF';

	
	const FECHA = 'cpconeje.FECHA';

	
	const TIPO = 'cpconeje.TIPO';

	
	const DESCRIP = 'cpconeje.DESCRIP';

	
	const MONIMP = 'cpconeje.MONIMP';

	
	const MONAJU = 'cpconeje.MONAJU';

	
	const STATUS = 'cpconeje.STATUS';

	
	const MONDIM = 'cpconeje.MONDIM';

	
	const MONTRN = 'cpconeje.MONTRN';

	
	const ID = 'cpconeje.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Mondis', 'Montra', 'Monadi', 'Monasi', 'Ref', 'Fecha', 'Tipo', 'Descrip', 'Monimp', 'Monaju', 'Status', 'Mondim', 'Montrn', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpconejePeer::CODPRE, CpconejePeer::NOMPRE, CpconejePeer::MONDIS, CpconejePeer::MONTRA, CpconejePeer::MONADI, CpconejePeer::MONASI, CpconejePeer::REF, CpconejePeer::FECHA, CpconejePeer::TIPO, CpconejePeer::DESCRIP, CpconejePeer::MONIMP, CpconejePeer::MONAJU, CpconejePeer::STATUS, CpconejePeer::MONDIM, CpconejePeer::MONTRN, CpconejePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'mondis', 'montra', 'monadi', 'monasi', 'ref', 'fecha', 'tipo', 'descrip', 'monimp', 'monaju', 'status', 'mondim', 'montrn', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Mondis' => 2, 'Montra' => 3, 'Monadi' => 4, 'Monasi' => 5, 'Ref' => 6, 'Fecha' => 7, 'Tipo' => 8, 'Descrip' => 9, 'Monimp' => 10, 'Monaju' => 11, 'Status' => 12, 'Mondim' => 13, 'Montrn' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (CpconejePeer::CODPRE => 0, CpconejePeer::NOMPRE => 1, CpconejePeer::MONDIS => 2, CpconejePeer::MONTRA => 3, CpconejePeer::MONADI => 4, CpconejePeer::MONASI => 5, CpconejePeer::REF => 6, CpconejePeer::FECHA => 7, CpconejePeer::TIPO => 8, CpconejePeer::DESCRIP => 9, CpconejePeer::MONIMP => 10, CpconejePeer::MONAJU => 11, CpconejePeer::STATUS => 12, CpconejePeer::MONDIM => 13, CpconejePeer::MONTRN => 14, CpconejePeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'mondis' => 2, 'montra' => 3, 'monadi' => 4, 'monasi' => 5, 'ref' => 6, 'fecha' => 7, 'tipo' => 8, 'descrip' => 9, 'monimp' => 10, 'monaju' => 11, 'status' => 12, 'mondim' => 13, 'montrn' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpconejeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpconejeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpconejePeer::getTableMap();
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
		return str_replace(CpconejePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpconejePeer::CODPRE);

		$criteria->addSelectColumn(CpconejePeer::NOMPRE);

		$criteria->addSelectColumn(CpconejePeer::MONDIS);

		$criteria->addSelectColumn(CpconejePeer::MONTRA);

		$criteria->addSelectColumn(CpconejePeer::MONADI);

		$criteria->addSelectColumn(CpconejePeer::MONASI);

		$criteria->addSelectColumn(CpconejePeer::REF);

		$criteria->addSelectColumn(CpconejePeer::FECHA);

		$criteria->addSelectColumn(CpconejePeer::TIPO);

		$criteria->addSelectColumn(CpconejePeer::DESCRIP);

		$criteria->addSelectColumn(CpconejePeer::MONIMP);

		$criteria->addSelectColumn(CpconejePeer::MONAJU);

		$criteria->addSelectColumn(CpconejePeer::STATUS);

		$criteria->addSelectColumn(CpconejePeer::MONDIM);

		$criteria->addSelectColumn(CpconejePeer::MONTRN);

		$criteria->addSelectColumn(CpconejePeer::ID);

	}

	const COUNT = 'COUNT(cpconeje.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpconeje.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpconejePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpconejePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpconejePeer::doSelectRS($criteria, $con);
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
		$objects = CpconejePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpconejePeer::populateObjects(CpconejePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpconejePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpconejePeer::getOMClass();
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
		return CpconejePeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpconejePeer::ID);
			$selectCriteria->add(CpconejePeer::ID, $criteria->remove(CpconejePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpconejePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpconejePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpconeje) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpconejePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpconeje $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpconejePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpconejePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpconejePeer::DATABASE_NAME, CpconejePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpconejePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpconejePeer::DATABASE_NAME);

		$criteria->add(CpconejePeer::ID, $pk);


		$v = CpconejePeer::doSelect($criteria, $con);

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
			$criteria->add(CpconejePeer::ID, $pks, Criteria::IN);
			$objs = CpconejePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpconejePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpconejeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpconejeMapBuilder');
}
