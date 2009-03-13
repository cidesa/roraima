<?php


abstract class BaseNphisconBorraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphiscon_borra';

	
	const CLASS_DEFAULT = 'lib.model.NphisconBorra';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'nphiscon_borra.CODNOM';

	
	const CODEMP = 'nphiscon_borra.CODEMP';

	
	const CODCAR = 'nphiscon_borra.CODCAR';

	
	const CODCON = 'nphiscon_borra.CODCON';

	
	const FECNOM = 'nphiscon_borra.FECNOM';

	
	const MONTO = 'nphiscon_borra.MONTO';

	
	const CODCAT = 'nphiscon_borra.CODCAT';

	
	const CODPAR = 'nphiscon_borra.CODPAR';

	
	const CODESCUELA = 'nphiscon_borra.CODESCUELA';

	
	const CODNIV = 'nphiscon_borra.CODNIV';

	
	const CODTIPGAS = 'nphiscon_borra.CODTIPGAS';

	
	const NOMCON = 'nphiscon_borra.NOMCON';

	
	const NUMREC = 'nphiscon_borra.NUMREC';

	
	const CANTIDAD = 'nphiscon_borra.CANTIDAD';

	
	const FECNOMDES = 'nphiscon_borra.FECNOMDES';

	
	const ESPECIAL = 'nphiscon_borra.ESPECIAL';

	
	const FECNOMESPDES = 'nphiscon_borra.FECNOMESPDES';

	
	const FECNOMESPHAS = 'nphiscon_borra.FECNOMESPHAS';

	
	const ID = 'nphiscon_borra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Fecnom', 'Monto', 'Codcat', 'Codpar', 'Codescuela', 'Codniv', 'Codtipgas', 'Nomcon', 'Numrec', 'Cantidad', 'Fecnomdes', 'Especial', 'Fecnomespdes', 'Fecnomesphas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphisconBorraPeer::CODNOM, NphisconBorraPeer::CODEMP, NphisconBorraPeer::CODCAR, NphisconBorraPeer::CODCON, NphisconBorraPeer::FECNOM, NphisconBorraPeer::MONTO, NphisconBorraPeer::CODCAT, NphisconBorraPeer::CODPAR, NphisconBorraPeer::CODESCUELA, NphisconBorraPeer::CODNIV, NphisconBorraPeer::CODTIPGAS, NphisconBorraPeer::NOMCON, NphisconBorraPeer::NUMREC, NphisconBorraPeer::CANTIDAD, NphisconBorraPeer::FECNOMDES, NphisconBorraPeer::ESPECIAL, NphisconBorraPeer::FECNOMESPDES, NphisconBorraPeer::FECNOMESPHAS, NphisconBorraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'fecnom', 'monto', 'codcat', 'codpar', 'codescuela', 'codniv', 'codtipgas', 'nomcon', 'numrec', 'cantidad', 'fecnomdes', 'especial', 'fecnomespdes', 'fecnomesphas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Fecnom' => 4, 'Monto' => 5, 'Codcat' => 6, 'Codpar' => 7, 'Codescuela' => 8, 'Codniv' => 9, 'Codtipgas' => 10, 'Nomcon' => 11, 'Numrec' => 12, 'Cantidad' => 13, 'Fecnomdes' => 14, 'Especial' => 15, 'Fecnomespdes' => 16, 'Fecnomesphas' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (NphisconBorraPeer::CODNOM => 0, NphisconBorraPeer::CODEMP => 1, NphisconBorraPeer::CODCAR => 2, NphisconBorraPeer::CODCON => 3, NphisconBorraPeer::FECNOM => 4, NphisconBorraPeer::MONTO => 5, NphisconBorraPeer::CODCAT => 6, NphisconBorraPeer::CODPAR => 7, NphisconBorraPeer::CODESCUELA => 8, NphisconBorraPeer::CODNIV => 9, NphisconBorraPeer::CODTIPGAS => 10, NphisconBorraPeer::NOMCON => 11, NphisconBorraPeer::NUMREC => 12, NphisconBorraPeer::CANTIDAD => 13, NphisconBorraPeer::FECNOMDES => 14, NphisconBorraPeer::ESPECIAL => 15, NphisconBorraPeer::FECNOMESPDES => 16, NphisconBorraPeer::FECNOMESPHAS => 17, NphisconBorraPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'fecnom' => 4, 'monto' => 5, 'codcat' => 6, 'codpar' => 7, 'codescuela' => 8, 'codniv' => 9, 'codtipgas' => 10, 'nomcon' => 11, 'numrec' => 12, 'cantidad' => 13, 'fecnomdes' => 14, 'especial' => 15, 'fecnomespdes' => 16, 'fecnomesphas' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NphisconBorraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NphisconBorraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphisconBorraPeer::getTableMap();
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
		return str_replace(NphisconBorraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphisconBorraPeer::CODNOM);

		$criteria->addSelectColumn(NphisconBorraPeer::CODEMP);

		$criteria->addSelectColumn(NphisconBorraPeer::CODCAR);

		$criteria->addSelectColumn(NphisconBorraPeer::CODCON);

		$criteria->addSelectColumn(NphisconBorraPeer::FECNOM);

		$criteria->addSelectColumn(NphisconBorraPeer::MONTO);

		$criteria->addSelectColumn(NphisconBorraPeer::CODCAT);

		$criteria->addSelectColumn(NphisconBorraPeer::CODPAR);

		$criteria->addSelectColumn(NphisconBorraPeer::CODESCUELA);

		$criteria->addSelectColumn(NphisconBorraPeer::CODNIV);

		$criteria->addSelectColumn(NphisconBorraPeer::CODTIPGAS);

		$criteria->addSelectColumn(NphisconBorraPeer::NOMCON);

		$criteria->addSelectColumn(NphisconBorraPeer::NUMREC);

		$criteria->addSelectColumn(NphisconBorraPeer::CANTIDAD);

		$criteria->addSelectColumn(NphisconBorraPeer::FECNOMDES);

		$criteria->addSelectColumn(NphisconBorraPeer::ESPECIAL);

		$criteria->addSelectColumn(NphisconBorraPeer::FECNOMESPDES);

		$criteria->addSelectColumn(NphisconBorraPeer::FECNOMESPHAS);

		$criteria->addSelectColumn(NphisconBorraPeer::ID);

	}

	const COUNT = 'COUNT(nphiscon_borra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphiscon_borra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphisconBorraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphisconBorraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphisconBorraPeer::doSelectRS($criteria, $con);
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
		$objects = NphisconBorraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphisconBorraPeer::populateObjects(NphisconBorraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphisconBorraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphisconBorraPeer::getOMClass();
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
		return NphisconBorraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NphisconBorraPeer::ID); 

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
			$comparison = $criteria->getComparison(NphisconBorraPeer::ID);
			$selectCriteria->add(NphisconBorraPeer::ID, $criteria->remove(NphisconBorraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphisconBorraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphisconBorraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NphisconBorra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphisconBorraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NphisconBorra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphisconBorraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphisconBorraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphisconBorraPeer::DATABASE_NAME, NphisconBorraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphisconBorraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphisconBorraPeer::DATABASE_NAME);

		$criteria->add(NphisconBorraPeer::ID, $pk);


		$v = NphisconBorraPeer::doSelect($criteria, $con);

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
			$criteria->add(NphisconBorraPeer::ID, $pks, Criteria::IN);
			$objs = NphisconBorraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphisconBorraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NphisconBorraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NphisconBorraMapBuilder');
}
