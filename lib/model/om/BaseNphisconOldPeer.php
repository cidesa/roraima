<?php


abstract class BaseNphisconOldPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nphiscon_old';

	
	const CLASS_DEFAULT = 'lib.model.NphisconOld';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'nphiscon_old.CODNOM';

	
	const CODEMP = 'nphiscon_old.CODEMP';

	
	const CODCAR = 'nphiscon_old.CODCAR';

	
	const CODCON = 'nphiscon_old.CODCON';

	
	const FECNOM = 'nphiscon_old.FECNOM';

	
	const MONTO = 'nphiscon_old.MONTO';

	
	const CODCAT = 'nphiscon_old.CODCAT';

	
	const CODPAR = 'nphiscon_old.CODPAR';

	
	const CODESCUELA = 'nphiscon_old.CODESCUELA';

	
	const CODNIV = 'nphiscon_old.CODNIV';

	
	const CODTIPGAS = 'nphiscon_old.CODTIPGAS';

	
	const NOMCON = 'nphiscon_old.NOMCON';

	
	const NUMREC = 'nphiscon_old.NUMREC';

	
	const CANTIDAD = 'nphiscon_old.CANTIDAD';

	
	const FECNOMDES = 'nphiscon_old.FECNOMDES';

	
	const ESPECIAL = 'nphiscon_old.ESPECIAL';

	
	const FECNOMESPDES = 'nphiscon_old.FECNOMESPDES';

	
	const FECNOMESPHAS = 'nphiscon_old.FECNOMESPHAS';

	
	const ID = 'nphiscon_old.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Codcar', 'Codcon', 'Fecnom', 'Monto', 'Codcat', 'Codpar', 'Codescuela', 'Codniv', 'Codtipgas', 'Nomcon', 'Numrec', 'Cantidad', 'Fecnomdes', 'Especial', 'Fecnomespdes', 'Fecnomesphas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NphisconOldPeer::CODNOM, NphisconOldPeer::CODEMP, NphisconOldPeer::CODCAR, NphisconOldPeer::CODCON, NphisconOldPeer::FECNOM, NphisconOldPeer::MONTO, NphisconOldPeer::CODCAT, NphisconOldPeer::CODPAR, NphisconOldPeer::CODESCUELA, NphisconOldPeer::CODNIV, NphisconOldPeer::CODTIPGAS, NphisconOldPeer::NOMCON, NphisconOldPeer::NUMREC, NphisconOldPeer::CANTIDAD, NphisconOldPeer::FECNOMDES, NphisconOldPeer::ESPECIAL, NphisconOldPeer::FECNOMESPDES, NphisconOldPeer::FECNOMESPHAS, NphisconOldPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'codcar', 'codcon', 'fecnom', 'monto', 'codcat', 'codpar', 'codescuela', 'codniv', 'codtipgas', 'nomcon', 'numrec', 'cantidad', 'fecnomdes', 'especial', 'fecnomespdes', 'fecnomesphas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Codcar' => 2, 'Codcon' => 3, 'Fecnom' => 4, 'Monto' => 5, 'Codcat' => 6, 'Codpar' => 7, 'Codescuela' => 8, 'Codniv' => 9, 'Codtipgas' => 10, 'Nomcon' => 11, 'Numrec' => 12, 'Cantidad' => 13, 'Fecnomdes' => 14, 'Especial' => 15, 'Fecnomespdes' => 16, 'Fecnomesphas' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (NphisconOldPeer::CODNOM => 0, NphisconOldPeer::CODEMP => 1, NphisconOldPeer::CODCAR => 2, NphisconOldPeer::CODCON => 3, NphisconOldPeer::FECNOM => 4, NphisconOldPeer::MONTO => 5, NphisconOldPeer::CODCAT => 6, NphisconOldPeer::CODPAR => 7, NphisconOldPeer::CODESCUELA => 8, NphisconOldPeer::CODNIV => 9, NphisconOldPeer::CODTIPGAS => 10, NphisconOldPeer::NOMCON => 11, NphisconOldPeer::NUMREC => 12, NphisconOldPeer::CANTIDAD => 13, NphisconOldPeer::FECNOMDES => 14, NphisconOldPeer::ESPECIAL => 15, NphisconOldPeer::FECNOMESPDES => 16, NphisconOldPeer::FECNOMESPHAS => 17, NphisconOldPeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'codcar' => 2, 'codcon' => 3, 'fecnom' => 4, 'monto' => 5, 'codcat' => 6, 'codpar' => 7, 'codescuela' => 8, 'codniv' => 9, 'codtipgas' => 10, 'nomcon' => 11, 'numrec' => 12, 'cantidad' => 13, 'fecnomdes' => 14, 'especial' => 15, 'fecnomespdes' => 16, 'fecnomesphas' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NphisconOldMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NphisconOldMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NphisconOldPeer::getTableMap();
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
		return str_replace(NphisconOldPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NphisconOldPeer::CODNOM);

		$criteria->addSelectColumn(NphisconOldPeer::CODEMP);

		$criteria->addSelectColumn(NphisconOldPeer::CODCAR);

		$criteria->addSelectColumn(NphisconOldPeer::CODCON);

		$criteria->addSelectColumn(NphisconOldPeer::FECNOM);

		$criteria->addSelectColumn(NphisconOldPeer::MONTO);

		$criteria->addSelectColumn(NphisconOldPeer::CODCAT);

		$criteria->addSelectColumn(NphisconOldPeer::CODPAR);

		$criteria->addSelectColumn(NphisconOldPeer::CODESCUELA);

		$criteria->addSelectColumn(NphisconOldPeer::CODNIV);

		$criteria->addSelectColumn(NphisconOldPeer::CODTIPGAS);

		$criteria->addSelectColumn(NphisconOldPeer::NOMCON);

		$criteria->addSelectColumn(NphisconOldPeer::NUMREC);

		$criteria->addSelectColumn(NphisconOldPeer::CANTIDAD);

		$criteria->addSelectColumn(NphisconOldPeer::FECNOMDES);

		$criteria->addSelectColumn(NphisconOldPeer::ESPECIAL);

		$criteria->addSelectColumn(NphisconOldPeer::FECNOMESPDES);

		$criteria->addSelectColumn(NphisconOldPeer::FECNOMESPHAS);

		$criteria->addSelectColumn(NphisconOldPeer::ID);

	}

	const COUNT = 'COUNT(nphiscon_old.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nphiscon_old.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NphisconOldPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NphisconOldPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NphisconOldPeer::doSelectRS($criteria, $con);
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
		$objects = NphisconOldPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NphisconOldPeer::populateObjects(NphisconOldPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NphisconOldPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NphisconOldPeer::getOMClass();
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
		return NphisconOldPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NphisconOldPeer::ID);
			$selectCriteria->add(NphisconOldPeer::ID, $criteria->remove(NphisconOldPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NphisconOldPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NphisconOldPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NphisconOld) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NphisconOldPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NphisconOld $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NphisconOldPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NphisconOldPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NphisconOldPeer::DATABASE_NAME, NphisconOldPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NphisconOldPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NphisconOldPeer::DATABASE_NAME);

		$criteria->add(NphisconOldPeer::ID, $pk);


		$v = NphisconOldPeer::doSelect($criteria, $con);

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
			$criteria->add(NphisconOldPeer::ID, $pks, Criteria::IN);
			$objs = NphisconOldPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNphisconOldPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NphisconOldMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NphisconOldMapBuilder');
}
