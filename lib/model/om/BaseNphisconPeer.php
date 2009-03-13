<?php


abstract class BaseNphisconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphiscon';

	
	const CLASS_DEFAULT = 'lib.model.Nphiscon';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'nphiscon.CODNOM';

	
	const CODEMP = 'nphiscon.CODEMP';

	
	const CODCAR = 'nphiscon.CODCAR';

	
	const CODCON = 'nphiscon.CODCON';

	
	const FECNOM = 'nphiscon.FECNOM';

	
	const MONTO = 'nphiscon.MONTO';

	
	const CODCAT = 'nphiscon.CODCAT';

	
	const CODPAR = 'nphiscon.CODPAR';

	
	const CODESCUELA = 'nphiscon.CODESCUELA';

	
	const CODNIV = 'nphiscon.CODNIV';

	
	const CODTIPGAS = 'nphiscon.CODTIPGAS';

	
	const NOMCON = 'nphiscon.NOMCON';

	
	const NUMREC = 'nphiscon.NUMREC';

	
	const CANTIDAD = 'nphiscon.CANTIDAD';

	
	const FECNOMDES = 'nphiscon.FECNOMDES';

	
	const ESPECIAL = 'nphiscon.ESPECIAL';

	
	const FECNOMESPDES = 'nphiscon.FECNOMESPDES';

	
	const FECNOMESPHAS = 'nphiscon.FECNOMESPHAS';

	
	const CODNOMESP = 'nphiscon.CODNOMESP';

	
	const NOMNOMESP = 'nphiscon.NOMNOMESP';

	
	const ID = 'nphiscon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Fecnom', 'Monto', 'Codcat', 'Codpar', 'Codescuela', 'Codniv', 'Codtipgas', 'Nomcon', 'Numrec', 'Cantidad', 'Fecnomdes', 'Especial', 'Fecnomespdes', 'Fecnomesphas', 'Codnomesp', 'Nomnomesp', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphisconPeer::CODNOM, NphisconPeer::CODEMP, NphisconPeer::CODCAR, NphisconPeer::CODCON, NphisconPeer::FECNOM, NphisconPeer::MONTO, NphisconPeer::CODCAT, NphisconPeer::CODPAR, NphisconPeer::CODESCUELA, NphisconPeer::CODNIV, NphisconPeer::CODTIPGAS, NphisconPeer::NOMCON, NphisconPeer::NUMREC, NphisconPeer::CANTIDAD, NphisconPeer::FECNOMDES, NphisconPeer::ESPECIAL, NphisconPeer::FECNOMESPDES, NphisconPeer::FECNOMESPHAS, NphisconPeer::CODNOMESP, NphisconPeer::NOMNOMESP, NphisconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'fecnom', 'monto', 'codcat', 'codpar', 'codescuela', 'codniv', 'codtipgas', 'nomcon', 'numrec', 'cantidad', 'fecnomdes', 'especial', 'fecnomespdes', 'fecnomesphas', 'codnomesp', 'nomnomesp', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Fecnom' => 4, 'Monto' => 5, 'Codcat' => 6, 'Codpar' => 7, 'Codescuela' => 8, 'Codniv' => 9, 'Codtipgas' => 10, 'Nomcon' => 11, 'Numrec' => 12, 'Cantidad' => 13, 'Fecnomdes' => 14, 'Especial' => 15, 'Fecnomespdes' => 16, 'Fecnomesphas' => 17, 'Codnomesp' => 18, 'Nomnomesp' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (NphisconPeer::CODNOM => 0, NphisconPeer::CODEMP => 1, NphisconPeer::CODCAR => 2, NphisconPeer::CODCON => 3, NphisconPeer::FECNOM => 4, NphisconPeer::MONTO => 5, NphisconPeer::CODCAT => 6, NphisconPeer::CODPAR => 7, NphisconPeer::CODESCUELA => 8, NphisconPeer::CODNIV => 9, NphisconPeer::CODTIPGAS => 10, NphisconPeer::NOMCON => 11, NphisconPeer::NUMREC => 12, NphisconPeer::CANTIDAD => 13, NphisconPeer::FECNOMDES => 14, NphisconPeer::ESPECIAL => 15, NphisconPeer::FECNOMESPDES => 16, NphisconPeer::FECNOMESPHAS => 17, NphisconPeer::CODNOMESP => 18, NphisconPeer::NOMNOMESP => 19, NphisconPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'fecnom' => 4, 'monto' => 5, 'codcat' => 6, 'codpar' => 7, 'codescuela' => 8, 'codniv' => 9, 'codtipgas' => 10, 'nomcon' => 11, 'numrec' => 12, 'cantidad' => 13, 'fecnomdes' => 14, 'especial' => 15, 'fecnomespdes' => 16, 'fecnomesphas' => 17, 'codnomesp' => 18, 'nomnomesp' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NphisconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NphisconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphisconPeer::getTableMap();
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
		return str_replace(NphisconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphisconPeer::CODNOM);

		$criteria->addSelectColumn(NphisconPeer::CODEMP);

		$criteria->addSelectColumn(NphisconPeer::CODCAR);

		$criteria->addSelectColumn(NphisconPeer::CODCON);

		$criteria->addSelectColumn(NphisconPeer::FECNOM);

		$criteria->addSelectColumn(NphisconPeer::MONTO);

		$criteria->addSelectColumn(NphisconPeer::CODCAT);

		$criteria->addSelectColumn(NphisconPeer::CODPAR);

		$criteria->addSelectColumn(NphisconPeer::CODESCUELA);

		$criteria->addSelectColumn(NphisconPeer::CODNIV);

		$criteria->addSelectColumn(NphisconPeer::CODTIPGAS);

		$criteria->addSelectColumn(NphisconPeer::NOMCON);

		$criteria->addSelectColumn(NphisconPeer::NUMREC);

		$criteria->addSelectColumn(NphisconPeer::CANTIDAD);

		$criteria->addSelectColumn(NphisconPeer::FECNOMDES);

		$criteria->addSelectColumn(NphisconPeer::ESPECIAL);

		$criteria->addSelectColumn(NphisconPeer::FECNOMESPDES);

		$criteria->addSelectColumn(NphisconPeer::FECNOMESPHAS);

		$criteria->addSelectColumn(NphisconPeer::CODNOMESP);

		$criteria->addSelectColumn(NphisconPeer::NOMNOMESP);

		$criteria->addSelectColumn(NphisconPeer::ID);

	}

	const COUNT = 'COUNT(nphiscon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphiscon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphisconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphisconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphisconPeer::doSelectRS($criteria, $con);
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
		$objects = NphisconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphisconPeer::populateObjects(NphisconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphisconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphisconPeer::getOMClass();
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
		return NphisconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NphisconPeer::ID); 

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
			$comparison = $criteria->getComparison(NphisconPeer::ID);
			$selectCriteria->add(NphisconPeer::ID, $criteria->remove(NphisconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphisconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphisconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nphiscon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphisconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nphiscon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphisconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphisconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphisconPeer::DATABASE_NAME, NphisconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphisconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphisconPeer::DATABASE_NAME);

		$criteria->add(NphisconPeer::ID, $pk);


		$v = NphisconPeer::doSelect($criteria, $con);

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
			$criteria->add(NphisconPeer::ID, $pks, Criteria::IN);
			$objs = NphisconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphisconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NphisconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NphisconMapBuilder');
}
