<?php


abstract class BaseNphiscon06022007SincambioPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphiscon_06022007_sincambio';

	
	const CLASS_DEFAULT = 'lib.model.Nphiscon06022007Sincambio';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'nphiscon_06022007_sincambio.CODNOM';

	
	const CODEMP = 'nphiscon_06022007_sincambio.CODEMP';

	
	const CODCAR = 'nphiscon_06022007_sincambio.CODCAR';

	
	const CODCON = 'nphiscon_06022007_sincambio.CODCON';

	
	const FECNOM = 'nphiscon_06022007_sincambio.FECNOM';

	
	const MONTO = 'nphiscon_06022007_sincambio.MONTO';

	
	const CODCAT = 'nphiscon_06022007_sincambio.CODCAT';

	
	const CODPAR = 'nphiscon_06022007_sincambio.CODPAR';

	
	const CODESCUELA = 'nphiscon_06022007_sincambio.CODESCUELA';

	
	const CODNIV = 'nphiscon_06022007_sincambio.CODNIV';

	
	const CODTIPGAS = 'nphiscon_06022007_sincambio.CODTIPGAS';

	
	const NOMCON = 'nphiscon_06022007_sincambio.NOMCON';

	
	const NUMREC = 'nphiscon_06022007_sincambio.NUMREC';

	
	const CANTIDAD = 'nphiscon_06022007_sincambio.CANTIDAD';

	
	const FECNOMDES = 'nphiscon_06022007_sincambio.FECNOMDES';

	
	const ESPECIAL = 'nphiscon_06022007_sincambio.ESPECIAL';

	
	const FECNOMESPDES = 'nphiscon_06022007_sincambio.FECNOMESPDES';

	
	const FECNOMESPHAS = 'nphiscon_06022007_sincambio.FECNOMESPHAS';

	
	const CODNOMESP = 'nphiscon_06022007_sincambio.CODNOMESP';

	
	const NOMNOMESP = 'nphiscon_06022007_sincambio.NOMNOMESP';

	
	const ID = 'nphiscon_06022007_sincambio.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Fecnom', 'Monto', 'Codcat', 'Codpar', 'Codescuela', 'Codniv', 'Codtipgas', 'Nomcon', 'Numrec', 'Cantidad', 'Fecnomdes', 'Especial', 'Fecnomespdes', 'Fecnomesphas', 'Codnomesp', 'Nomnomesp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Nphiscon06022007SincambioPeer::CODNOM, Nphiscon06022007SincambioPeer::CODEMP, Nphiscon06022007SincambioPeer::CODCAR, Nphiscon06022007SincambioPeer::CODCON, Nphiscon06022007SincambioPeer::FECNOM, Nphiscon06022007SincambioPeer::MONTO, Nphiscon06022007SincambioPeer::CODCAT, Nphiscon06022007SincambioPeer::CODPAR, Nphiscon06022007SincambioPeer::CODESCUELA, Nphiscon06022007SincambioPeer::CODNIV, Nphiscon06022007SincambioPeer::CODTIPGAS, Nphiscon06022007SincambioPeer::NOMCON, Nphiscon06022007SincambioPeer::NUMREC, Nphiscon06022007SincambioPeer::CANTIDAD, Nphiscon06022007SincambioPeer::FECNOMDES, Nphiscon06022007SincambioPeer::ESPECIAL, Nphiscon06022007SincambioPeer::FECNOMESPDES, Nphiscon06022007SincambioPeer::FECNOMESPHAS, Nphiscon06022007SincambioPeer::CODNOMESP, Nphiscon06022007SincambioPeer::NOMNOMESP, Nphiscon06022007SincambioPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'fecnom', 'monto', 'codcat', 'codpar', 'codescuela', 'codniv', 'codtipgas', 'nomcon', 'numrec', 'cantidad', 'fecnomdes', 'especial', 'fecnomespdes', 'fecnomesphas', 'codnomesp', 'nomnomesp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Fecnom' => 4, 'Monto' => 5, 'Codcat' => 6, 'Codpar' => 7, 'Codescuela' => 8, 'Codniv' => 9, 'Codtipgas' => 10, 'Nomcon' => 11, 'Numrec' => 12, 'Cantidad' => 13, 'Fecnomdes' => 14, 'Especial' => 15, 'Fecnomespdes' => 16, 'Fecnomesphas' => 17, 'Codnomesp' => 18, 'Nomnomesp' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (Nphiscon06022007SincambioPeer::CODNOM => 0, Nphiscon06022007SincambioPeer::CODEMP => 1, Nphiscon06022007SincambioPeer::CODCAR => 2, Nphiscon06022007SincambioPeer::CODCON => 3, Nphiscon06022007SincambioPeer::FECNOM => 4, Nphiscon06022007SincambioPeer::MONTO => 5, Nphiscon06022007SincambioPeer::CODCAT => 6, Nphiscon06022007SincambioPeer::CODPAR => 7, Nphiscon06022007SincambioPeer::CODESCUELA => 8, Nphiscon06022007SincambioPeer::CODNIV => 9, Nphiscon06022007SincambioPeer::CODTIPGAS => 10, Nphiscon06022007SincambioPeer::NOMCON => 11, Nphiscon06022007SincambioPeer::NUMREC => 12, Nphiscon06022007SincambioPeer::CANTIDAD => 13, Nphiscon06022007SincambioPeer::FECNOMDES => 14, Nphiscon06022007SincambioPeer::ESPECIAL => 15, Nphiscon06022007SincambioPeer::FECNOMESPDES => 16, Nphiscon06022007SincambioPeer::FECNOMESPHAS => 17, Nphiscon06022007SincambioPeer::CODNOMESP => 18, Nphiscon06022007SincambioPeer::NOMNOMESP => 19, Nphiscon06022007SincambioPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'fecnom' => 4, 'monto' => 5, 'codcat' => 6, 'codpar' => 7, 'codescuela' => 8, 'codniv' => 9, 'codtipgas' => 10, 'nomcon' => 11, 'numrec' => 12, 'cantidad' => 13, 'fecnomdes' => 14, 'especial' => 15, 'fecnomespdes' => 16, 'fecnomesphas' => 17, 'codnomesp' => 18, 'nomnomesp' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Nphiscon06022007SincambioMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Nphiscon06022007SincambioMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Nphiscon06022007SincambioPeer::getTableMap();
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
		return str_replace(Nphiscon06022007SincambioPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODNOM);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODEMP);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODCAR);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODCON);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::FECNOM);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::MONTO);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODCAT);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODPAR);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODESCUELA);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODNIV);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODTIPGAS);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::NOMCON);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::NUMREC);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CANTIDAD);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::FECNOMDES);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::ESPECIAL);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::FECNOMESPDES);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::FECNOMESPHAS);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::CODNOMESP);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::NOMNOMESP);

		$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::ID);

	}

	const COUNT = 'COUNT(nphiscon_06022007_sincambio.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphiscon_06022007_sincambio.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Nphiscon06022007SincambioPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Nphiscon06022007SincambioPeer::doSelectRS($criteria, $con);
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
		$objects = Nphiscon06022007SincambioPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Nphiscon06022007SincambioPeer::populateObjects(Nphiscon06022007SincambioPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Nphiscon06022007SincambioPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Nphiscon06022007SincambioPeer::getOMClass();
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
		return Nphiscon06022007SincambioPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Nphiscon06022007SincambioPeer::ID);
			$selectCriteria->add(Nphiscon06022007SincambioPeer::ID, $criteria->remove(Nphiscon06022007SincambioPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Nphiscon06022007SincambioPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Nphiscon06022007SincambioPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nphiscon06022007Sincambio) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Nphiscon06022007SincambioPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nphiscon06022007Sincambio $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Nphiscon06022007SincambioPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Nphiscon06022007SincambioPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Nphiscon06022007SincambioPeer::DATABASE_NAME, Nphiscon06022007SincambioPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Nphiscon06022007SincambioPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Nphiscon06022007SincambioPeer::DATABASE_NAME);

		$criteria->add(Nphiscon06022007SincambioPeer::ID, $pk);


		$v = Nphiscon06022007SincambioPeer::doSelect($criteria, $con);

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
			$criteria->add(Nphiscon06022007SincambioPeer::ID, $pks, Criteria::IN);
			$objs = Nphiscon06022007SincambioPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphiscon06022007SincambioPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Nphiscon06022007SincambioMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Nphiscon06022007SincambioMapBuilder');
}
