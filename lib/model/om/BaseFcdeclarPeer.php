<?php


abstract class BaseFcdeclarPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcdeclar';

	
	const CLASS_DEFAULT = 'lib.model.Fcdeclar';

	
	const NUM_COLUMNS = 28;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMDEC = 'fcdeclar.NUMDEC';

	
	const FECVEN = 'fcdeclar.FECVEN';

	
	const FUEING = 'fcdeclar.FUEING';

	
	const FECDEC = 'fcdeclar.FECDEC';

	
	const RIFCON = 'fcdeclar.RIFCON';

	
	const TIPO = 'fcdeclar.TIPO';

	
	const NUMREF = 'fcdeclar.NUMREF';

	
	const NOMBRE = 'fcdeclar.NOMBRE';

	
	const MONDEC = 'fcdeclar.MONDEC';

	
	const EDODEC = 'fcdeclar.EDODEC';

	
	const MORA = 'fcdeclar.MORA';

	
	const PRONTOPG = 'fcdeclar.PRONTOPG';

	
	const AUTLIQ = 'fcdeclar.AUTLIQ';

	
	const FUNDEC = 'fcdeclar.FUNDEC';

	
	const CODREC = 'fcdeclar.CODREC';

	
	const MODO = 'fcdeclar.MODO';

	
	const NUMERO = 'fcdeclar.NUMERO';

	
	const CONPAG = 'fcdeclar.CONPAG';

	
	const MONABO = 'fcdeclar.MONABO';

	
	const NUMABO = 'fcdeclar.NUMABO';

	
	const NOMCON = 'fcdeclar.NOMCON';

	
	const OTRO = 'fcdeclar.OTRO';

	
	const MIGINC = 'fcdeclar.MIGINC';

	
	const ANODEC = 'fcdeclar.ANODEC';

	
	const FECULTPAG = 'fcdeclar.FECULTPAG';

	
	const FECINI = 'fcdeclar.FECINI';

	
	const FECCIE = 'fcdeclar.FECCIE';

	
	const ID = 'fcdeclar.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numdec', 'Fecven', 'Fueing', 'Fecdec', 'Rifcon', 'Tipo', 'Numref', 'Nombre', 'Mondec', 'Edodec', 'Mora', 'Prontopg', 'Autliq', 'Fundec', 'Codrec', 'Modo', 'Numero', 'Conpag', 'Monabo', 'Numabo', 'Nomcon', 'Otro', 'Miginc', 'Anodec', 'Fecultpag', 'Fecini', 'Feccie', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcdeclarPeer::NUMDEC, FcdeclarPeer::FECVEN, FcdeclarPeer::FUEING, FcdeclarPeer::FECDEC, FcdeclarPeer::RIFCON, FcdeclarPeer::TIPO, FcdeclarPeer::NUMREF, FcdeclarPeer::NOMBRE, FcdeclarPeer::MONDEC, FcdeclarPeer::EDODEC, FcdeclarPeer::MORA, FcdeclarPeer::PRONTOPG, FcdeclarPeer::AUTLIQ, FcdeclarPeer::FUNDEC, FcdeclarPeer::CODREC, FcdeclarPeer::MODO, FcdeclarPeer::NUMERO, FcdeclarPeer::CONPAG, FcdeclarPeer::MONABO, FcdeclarPeer::NUMABO, FcdeclarPeer::NOMCON, FcdeclarPeer::OTRO, FcdeclarPeer::MIGINC, FcdeclarPeer::ANODEC, FcdeclarPeer::FECULTPAG, FcdeclarPeer::FECINI, FcdeclarPeer::FECCIE, FcdeclarPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numdec', 'fecven', 'fueing', 'fecdec', 'rifcon', 'tipo', 'numref', 'nombre', 'mondec', 'edodec', 'mora', 'prontopg', 'autliq', 'fundec', 'codrec', 'modo', 'numero', 'conpag', 'monabo', 'numabo', 'nomcon', 'otro', 'miginc', 'anodec', 'fecultpag', 'fecini', 'feccie', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numdec' => 0, 'Fecven' => 1, 'Fueing' => 2, 'Fecdec' => 3, 'Rifcon' => 4, 'Tipo' => 5, 'Numref' => 6, 'Nombre' => 7, 'Mondec' => 8, 'Edodec' => 9, 'Mora' => 10, 'Prontopg' => 11, 'Autliq' => 12, 'Fundec' => 13, 'Codrec' => 14, 'Modo' => 15, 'Numero' => 16, 'Conpag' => 17, 'Monabo' => 18, 'Numabo' => 19, 'Nomcon' => 20, 'Otro' => 21, 'Miginc' => 22, 'Anodec' => 23, 'Fecultpag' => 24, 'Fecini' => 25, 'Feccie' => 26, 'Id' => 27, ),
		BasePeer::TYPE_COLNAME => array (FcdeclarPeer::NUMDEC => 0, FcdeclarPeer::FECVEN => 1, FcdeclarPeer::FUEING => 2, FcdeclarPeer::FECDEC => 3, FcdeclarPeer::RIFCON => 4, FcdeclarPeer::TIPO => 5, FcdeclarPeer::NUMREF => 6, FcdeclarPeer::NOMBRE => 7, FcdeclarPeer::MONDEC => 8, FcdeclarPeer::EDODEC => 9, FcdeclarPeer::MORA => 10, FcdeclarPeer::PRONTOPG => 11, FcdeclarPeer::AUTLIQ => 12, FcdeclarPeer::FUNDEC => 13, FcdeclarPeer::CODREC => 14, FcdeclarPeer::MODO => 15, FcdeclarPeer::NUMERO => 16, FcdeclarPeer::CONPAG => 17, FcdeclarPeer::MONABO => 18, FcdeclarPeer::NUMABO => 19, FcdeclarPeer::NOMCON => 20, FcdeclarPeer::OTRO => 21, FcdeclarPeer::MIGINC => 22, FcdeclarPeer::ANODEC => 23, FcdeclarPeer::FECULTPAG => 24, FcdeclarPeer::FECINI => 25, FcdeclarPeer::FECCIE => 26, FcdeclarPeer::ID => 27, ),
		BasePeer::TYPE_FIELDNAME => array ('numdec' => 0, 'fecven' => 1, 'fueing' => 2, 'fecdec' => 3, 'rifcon' => 4, 'tipo' => 5, 'numref' => 6, 'nombre' => 7, 'mondec' => 8, 'edodec' => 9, 'mora' => 10, 'prontopg' => 11, 'autliq' => 12, 'fundec' => 13, 'codrec' => 14, 'modo' => 15, 'numero' => 16, 'conpag' => 17, 'monabo' => 18, 'numabo' => 19, 'nomcon' => 20, 'otro' => 21, 'miginc' => 22, 'anodec' => 23, 'fecultpag' => 24, 'fecini' => 25, 'feccie' => 26, 'id' => 27, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcdeclarMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcdeclarMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcdeclarPeer::getTableMap();
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
		return str_replace(FcdeclarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcdeclarPeer::NUMDEC);

		$criteria->addSelectColumn(FcdeclarPeer::FECVEN);

		$criteria->addSelectColumn(FcdeclarPeer::FUEING);

		$criteria->addSelectColumn(FcdeclarPeer::FECDEC);

		$criteria->addSelectColumn(FcdeclarPeer::RIFCON);

		$criteria->addSelectColumn(FcdeclarPeer::TIPO);

		$criteria->addSelectColumn(FcdeclarPeer::NUMREF);

		$criteria->addSelectColumn(FcdeclarPeer::NOMBRE);

		$criteria->addSelectColumn(FcdeclarPeer::MONDEC);

		$criteria->addSelectColumn(FcdeclarPeer::EDODEC);

		$criteria->addSelectColumn(FcdeclarPeer::MORA);

		$criteria->addSelectColumn(FcdeclarPeer::PRONTOPG);

		$criteria->addSelectColumn(FcdeclarPeer::AUTLIQ);

		$criteria->addSelectColumn(FcdeclarPeer::FUNDEC);

		$criteria->addSelectColumn(FcdeclarPeer::CODREC);

		$criteria->addSelectColumn(FcdeclarPeer::MODO);

		$criteria->addSelectColumn(FcdeclarPeer::NUMERO);

		$criteria->addSelectColumn(FcdeclarPeer::CONPAG);

		$criteria->addSelectColumn(FcdeclarPeer::MONABO);

		$criteria->addSelectColumn(FcdeclarPeer::NUMABO);

		$criteria->addSelectColumn(FcdeclarPeer::NOMCON);

		$criteria->addSelectColumn(FcdeclarPeer::OTRO);

		$criteria->addSelectColumn(FcdeclarPeer::MIGINC);

		$criteria->addSelectColumn(FcdeclarPeer::ANODEC);

		$criteria->addSelectColumn(FcdeclarPeer::FECULTPAG);

		$criteria->addSelectColumn(FcdeclarPeer::FECINI);

		$criteria->addSelectColumn(FcdeclarPeer::FECCIE);

		$criteria->addSelectColumn(FcdeclarPeer::ID);

	}

	const COUNT = 'COUNT(fcdeclar.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcdeclar.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcdeclarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcdeclarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcdeclarPeer::doSelectRS($criteria, $con);
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
		$objects = FcdeclarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcdeclarPeer::populateObjects(FcdeclarPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcdeclarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcdeclarPeer::getOMClass();
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
		return FcdeclarPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcdeclarPeer::ID);
			$selectCriteria->add(FcdeclarPeer::ID, $criteria->remove(FcdeclarPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcdeclarPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcdeclarPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcdeclar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcdeclarPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcdeclar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcdeclarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcdeclarPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcdeclarPeer::DATABASE_NAME, FcdeclarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcdeclarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcdeclarPeer::DATABASE_NAME);

		$criteria->add(FcdeclarPeer::ID, $pk);


		$v = FcdeclarPeer::doSelect($criteria, $con);

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
			$criteria->add(FcdeclarPeer::ID, $pks, Criteria::IN);
			$objs = FcdeclarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcdeclarPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcdeclarMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcdeclarMapBuilder');
}
