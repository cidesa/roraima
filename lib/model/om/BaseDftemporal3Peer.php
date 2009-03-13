<?php


abstract class BaseDftemporal3Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'dftemporal3';

	
	const CLASS_DEFAULT = 'lib.model.Dftemporal3';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODIGO = 'dftemporal3.CODIGO';

	
	const FECHA = 'dftemporal3.FECHA';

	
	const ABR = 'dftemporal3.ABR';

	
	const VIDA = 'dftemporal3.VIDA';

	
	const BEN = 'dftemporal3.BEN';

	
	const USU = 'dftemporal3.USU';

	
	const FECHAREC = 'dftemporal3.FECHAREC';

	
	const FECHAATE = 'dftemporal3.FECHAATE';

	
	const ESTAD = 'dftemporal3.ESTAD';

	
	const RUTA = 'dftemporal3.RUTA';

	
	const NOMTAB = 'dftemporal3.NOMTAB';

	
	const UNIDADORI = 'dftemporal3.UNIDADORI';

	
	const UNIDAD = 'dftemporal3.UNIDAD';

	
	const ANUATE = 'dftemporal3.ANUATE';

	
	const CHKUNI1 = 'dftemporal3.CHKUNI1';

	
	const CHKUNI2 = 'dftemporal3.CHKUNI2';

	
	const CHKUNI3 = 'dftemporal3.CHKUNI3';

	
	const CHKUNI4 = 'dftemporal3.CHKUNI4';

	
	const CHKUNI5 = 'dftemporal3.CHKUNI5';

	
	const CHKUNI6 = 'dftemporal3.CHKUNI6';

	
	const CHKUNI7 = 'dftemporal3.CHKUNI7';

	
	const ID = 'dftemporal3.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codigo', 'Fecha', 'Abr', 'Vida', 'Ben', 'Usu', 'Fecharec', 'Fechaate', 'Estad', 'Ruta', 'Nomtab', 'Unidadori', 'Unidad', 'Anuate', 'Chkuni1', 'Chkuni2', 'Chkuni3', 'Chkuni4', 'Chkuni5', 'Chkuni6', 'Chkuni7', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Dftemporal3Peer::CODIGO, Dftemporal3Peer::FECHA, Dftemporal3Peer::ABR, Dftemporal3Peer::VIDA, Dftemporal3Peer::BEN, Dftemporal3Peer::USU, Dftemporal3Peer::FECHAREC, Dftemporal3Peer::FECHAATE, Dftemporal3Peer::ESTAD, Dftemporal3Peer::RUTA, Dftemporal3Peer::NOMTAB, Dftemporal3Peer::UNIDADORI, Dftemporal3Peer::UNIDAD, Dftemporal3Peer::ANUATE, Dftemporal3Peer::CHKUNI1, Dftemporal3Peer::CHKUNI2, Dftemporal3Peer::CHKUNI3, Dftemporal3Peer::CHKUNI4, Dftemporal3Peer::CHKUNI5, Dftemporal3Peer::CHKUNI6, Dftemporal3Peer::CHKUNI7, Dftemporal3Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codigo', 'fecha', 'abr', 'vida', 'ben', 'usu', 'fecharec', 'fechaate', 'estad', 'ruta', 'nomtab', 'unidadori', 'unidad', 'anuate', 'chkuni1', 'chkuni2', 'chkuni3', 'chkuni4', 'chkuni5', 'chkuni6', 'chkuni7', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codigo' => 0, 'Fecha' => 1, 'Abr' => 2, 'Vida' => 3, 'Ben' => 4, 'Usu' => 5, 'Fecharec' => 6, 'Fechaate' => 7, 'Estad' => 8, 'Ruta' => 9, 'Nomtab' => 10, 'Unidadori' => 11, 'Unidad' => 12, 'Anuate' => 13, 'Chkuni1' => 14, 'Chkuni2' => 15, 'Chkuni3' => 16, 'Chkuni4' => 17, 'Chkuni5' => 18, 'Chkuni6' => 19, 'Chkuni7' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (Dftemporal3Peer::CODIGO => 0, Dftemporal3Peer::FECHA => 1, Dftemporal3Peer::ABR => 2, Dftemporal3Peer::VIDA => 3, Dftemporal3Peer::BEN => 4, Dftemporal3Peer::USU => 5, Dftemporal3Peer::FECHAREC => 6, Dftemporal3Peer::FECHAATE => 7, Dftemporal3Peer::ESTAD => 8, Dftemporal3Peer::RUTA => 9, Dftemporal3Peer::NOMTAB => 10, Dftemporal3Peer::UNIDADORI => 11, Dftemporal3Peer::UNIDAD => 12, Dftemporal3Peer::ANUATE => 13, Dftemporal3Peer::CHKUNI1 => 14, Dftemporal3Peer::CHKUNI2 => 15, Dftemporal3Peer::CHKUNI3 => 16, Dftemporal3Peer::CHKUNI4 => 17, Dftemporal3Peer::CHKUNI5 => 18, Dftemporal3Peer::CHKUNI6 => 19, Dftemporal3Peer::CHKUNI7 => 20, Dftemporal3Peer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('codigo' => 0, 'fecha' => 1, 'abr' => 2, 'vida' => 3, 'ben' => 4, 'usu' => 5, 'fecharec' => 6, 'fechaate' => 7, 'estad' => 8, 'ruta' => 9, 'nomtab' => 10, 'unidadori' => 11, 'unidad' => 12, 'anuate' => 13, 'chkuni1' => 14, 'chkuni2' => 15, 'chkuni3' => 16, 'chkuni4' => 17, 'chkuni5' => 18, 'chkuni6' => 19, 'chkuni7' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Dftemporal3MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Dftemporal3MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Dftemporal3Peer::getTableMap();
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
		return str_replace(Dftemporal3Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Dftemporal3Peer::CODIGO);

		$criteria->addSelectColumn(Dftemporal3Peer::FECHA);

		$criteria->addSelectColumn(Dftemporal3Peer::ABR);

		$criteria->addSelectColumn(Dftemporal3Peer::VIDA);

		$criteria->addSelectColumn(Dftemporal3Peer::BEN);

		$criteria->addSelectColumn(Dftemporal3Peer::USU);

		$criteria->addSelectColumn(Dftemporal3Peer::FECHAREC);

		$criteria->addSelectColumn(Dftemporal3Peer::FECHAATE);

		$criteria->addSelectColumn(Dftemporal3Peer::ESTAD);

		$criteria->addSelectColumn(Dftemporal3Peer::RUTA);

		$criteria->addSelectColumn(Dftemporal3Peer::NOMTAB);

		$criteria->addSelectColumn(Dftemporal3Peer::UNIDADORI);

		$criteria->addSelectColumn(Dftemporal3Peer::UNIDAD);

		$criteria->addSelectColumn(Dftemporal3Peer::ANUATE);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI1);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI2);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI3);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI4);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI5);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI6);

		$criteria->addSelectColumn(Dftemporal3Peer::CHKUNI7);

		$criteria->addSelectColumn(Dftemporal3Peer::ID);

	}

	const COUNT = 'COUNT(dftemporal3.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT dftemporal3.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Dftemporal3Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Dftemporal3Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Dftemporal3Peer::doSelectRS($criteria, $con);
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
		$objects = Dftemporal3Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Dftemporal3Peer::populateObjects(Dftemporal3Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Dftemporal3Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Dftemporal3Peer::getOMClass();
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
		return Dftemporal3Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Dftemporal3Peer::ID);
			$selectCriteria->add(Dftemporal3Peer::ID, $criteria->remove(Dftemporal3Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Dftemporal3Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Dftemporal3Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Dftemporal3) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Dftemporal3Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Dftemporal3 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Dftemporal3Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Dftemporal3Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Dftemporal3Peer::DATABASE_NAME, Dftemporal3Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Dftemporal3Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Dftemporal3Peer::DATABASE_NAME);

		$criteria->add(Dftemporal3Peer::ID, $pk);


		$v = Dftemporal3Peer::doSelect($criteria, $con);

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
			$criteria->add(Dftemporal3Peer::ID, $pks, Criteria::IN);
			$objs = Dftemporal3Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDftemporal3Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Dftemporal3MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Dftemporal3MapBuilder');
}
