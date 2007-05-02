<?php


abstract class BaseFcdeclar2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdeclar2';

	
	const CLASS_DEFAULT = 'lib.model.Fcdeclar2';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMDEC = 'fcdeclar2.NUMDEC';

	
	const FECVEN = 'fcdeclar2.FECVEN';

	
	const FUEING = 'fcdeclar2.FUEING';

	
	const FECDEC = 'fcdeclar2.FECDEC';

	
	const RIFCON = 'fcdeclar2.RIFCON';

	
	const TIPO = 'fcdeclar2.TIPO';

	
	const NUMREF = 'fcdeclar2.NUMREF';

	
	const NOMBRE = 'fcdeclar2.NOMBRE';

	
	const MONDEC = 'fcdeclar2.MONDEC';

	
	const EDODEC = 'fcdeclar2.EDODEC';

	
	const MORA = 'fcdeclar2.MORA';

	
	const PRONTOPG = 'fcdeclar2.PRONTOPG';

	
	const AUTLIQ = 'fcdeclar2.AUTLIQ';

	
	const FUNDEC = 'fcdeclar2.FUNDEC';

	
	const CODREC = 'fcdeclar2.CODREC';

	
	const MODO = 'fcdeclar2.MODO';

	
	const NUMERO = 'fcdeclar2.NUMERO';

	
	const CONPAG = 'fcdeclar2.CONPAG';

	
	const MONABO = 'fcdeclar2.MONABO';

	
	const NUMABO = 'fcdeclar2.NUMABO';

	
	const NOMCON = 'fcdeclar2.NOMCON';

	
	const ID = 'fcdeclar2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numdec', 'Fecven', 'Fueing', 'Fecdec', 'Rifcon', 'Tipo', 'Numref', 'Nombre', 'Mondec', 'Edodec', 'Mora', 'Prontopg', 'Autliq', 'Fundec', 'Codrec', 'Modo', 'Numero', 'Conpag', 'Monabo', 'Numabo', 'Nomcon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcdeclar2Peer::NUMDEC, Fcdeclar2Peer::FECVEN, Fcdeclar2Peer::FUEING, Fcdeclar2Peer::FECDEC, Fcdeclar2Peer::RIFCON, Fcdeclar2Peer::TIPO, Fcdeclar2Peer::NUMREF, Fcdeclar2Peer::NOMBRE, Fcdeclar2Peer::MONDEC, Fcdeclar2Peer::EDODEC, Fcdeclar2Peer::MORA, Fcdeclar2Peer::PRONTOPG, Fcdeclar2Peer::AUTLIQ, Fcdeclar2Peer::FUNDEC, Fcdeclar2Peer::CODREC, Fcdeclar2Peer::MODO, Fcdeclar2Peer::NUMERO, Fcdeclar2Peer::CONPAG, Fcdeclar2Peer::MONABO, Fcdeclar2Peer::NUMABO, Fcdeclar2Peer::NOMCON, Fcdeclar2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numdec', 'fecven', 'fueing', 'fecdec', 'rifcon', 'tipo', 'numref', 'nombre', 'mondec', 'edodec', 'mora', 'prontopg', 'autliq', 'fundec', 'codrec', 'modo', 'numero', 'conpag', 'monabo', 'numabo', 'nomcon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numdec' => 0, 'Fecven' => 1, 'Fueing' => 2, 'Fecdec' => 3, 'Rifcon' => 4, 'Tipo' => 5, 'Numref' => 6, 'Nombre' => 7, 'Mondec' => 8, 'Edodec' => 9, 'Mora' => 10, 'Prontopg' => 11, 'Autliq' => 12, 'Fundec' => 13, 'Codrec' => 14, 'Modo' => 15, 'Numero' => 16, 'Conpag' => 17, 'Monabo' => 18, 'Numabo' => 19, 'Nomcon' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (Fcdeclar2Peer::NUMDEC => 0, Fcdeclar2Peer::FECVEN => 1, Fcdeclar2Peer::FUEING => 2, Fcdeclar2Peer::FECDEC => 3, Fcdeclar2Peer::RIFCON => 4, Fcdeclar2Peer::TIPO => 5, Fcdeclar2Peer::NUMREF => 6, Fcdeclar2Peer::NOMBRE => 7, Fcdeclar2Peer::MONDEC => 8, Fcdeclar2Peer::EDODEC => 9, Fcdeclar2Peer::MORA => 10, Fcdeclar2Peer::PRONTOPG => 11, Fcdeclar2Peer::AUTLIQ => 12, Fcdeclar2Peer::FUNDEC => 13, Fcdeclar2Peer::CODREC => 14, Fcdeclar2Peer::MODO => 15, Fcdeclar2Peer::NUMERO => 16, Fcdeclar2Peer::CONPAG => 17, Fcdeclar2Peer::MONABO => 18, Fcdeclar2Peer::NUMABO => 19, Fcdeclar2Peer::NOMCON => 20, Fcdeclar2Peer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('numdec' => 0, 'fecven' => 1, 'fueing' => 2, 'fecdec' => 3, 'rifcon' => 4, 'tipo' => 5, 'numref' => 6, 'nombre' => 7, 'mondec' => 8, 'edodec' => 9, 'mora' => 10, 'prontopg' => 11, 'autliq' => 12, 'fundec' => 13, 'codrec' => 14, 'modo' => 15, 'numero' => 16, 'conpag' => 17, 'monabo' => 18, 'numabo' => 19, 'nomcon' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcdeclar2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcdeclar2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcdeclar2Peer::getTableMap();
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
		return str_replace(Fcdeclar2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcdeclar2Peer::NUMDEC);

		$criteria->addSelectColumn(Fcdeclar2Peer::FECVEN);

		$criteria->addSelectColumn(Fcdeclar2Peer::FUEING);

		$criteria->addSelectColumn(Fcdeclar2Peer::FECDEC);

		$criteria->addSelectColumn(Fcdeclar2Peer::RIFCON);

		$criteria->addSelectColumn(Fcdeclar2Peer::TIPO);

		$criteria->addSelectColumn(Fcdeclar2Peer::NUMREF);

		$criteria->addSelectColumn(Fcdeclar2Peer::NOMBRE);

		$criteria->addSelectColumn(Fcdeclar2Peer::MONDEC);

		$criteria->addSelectColumn(Fcdeclar2Peer::EDODEC);

		$criteria->addSelectColumn(Fcdeclar2Peer::MORA);

		$criteria->addSelectColumn(Fcdeclar2Peer::PRONTOPG);

		$criteria->addSelectColumn(Fcdeclar2Peer::AUTLIQ);

		$criteria->addSelectColumn(Fcdeclar2Peer::FUNDEC);

		$criteria->addSelectColumn(Fcdeclar2Peer::CODREC);

		$criteria->addSelectColumn(Fcdeclar2Peer::MODO);

		$criteria->addSelectColumn(Fcdeclar2Peer::NUMERO);

		$criteria->addSelectColumn(Fcdeclar2Peer::CONPAG);

		$criteria->addSelectColumn(Fcdeclar2Peer::MONABO);

		$criteria->addSelectColumn(Fcdeclar2Peer::NUMABO);

		$criteria->addSelectColumn(Fcdeclar2Peer::NOMCON);

		$criteria->addSelectColumn(Fcdeclar2Peer::ID);

	}

	const COUNT = 'COUNT(fcdeclar2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdeclar2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcdeclar2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcdeclar2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcdeclar2Peer::doSelectRS($criteria, $con);
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
		$objects = Fcdeclar2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcdeclar2Peer::populateObjects(Fcdeclar2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcdeclar2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcdeclar2Peer::getOMClass();
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
		return Fcdeclar2Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Fcdeclar2Peer::ID);
			$selectCriteria->add(Fcdeclar2Peer::ID, $criteria->remove(Fcdeclar2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcdeclar2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcdeclar2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdeclar2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcdeclar2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdeclar2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcdeclar2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcdeclar2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcdeclar2Peer::DATABASE_NAME, Fcdeclar2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcdeclar2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcdeclar2Peer::DATABASE_NAME);

		$criteria->add(Fcdeclar2Peer::ID, $pk);


		$v = Fcdeclar2Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcdeclar2Peer::ID, $pks, Criteria::IN);
			$objs = Fcdeclar2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdeclar2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcdeclar2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcdeclar2MapBuilder');
}
