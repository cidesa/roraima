<?php


abstract class BaseFcreginm1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcreginm1';

	
	const CLASS_DEFAULT = 'lib.model.Fcreginm1';

	
	const NUM_COLUMNS = 43;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const SERIAL = 'fcreginm1.SERIAL';

	
	const TIPO_BOLET = 'fcreginm1.TIPO_BOLET';

	
	const NOMBRE_PRO = 'fcreginm1.NOMBRE_PRO';

	
	const CI_RIF_PRO = 'fcreginm1.CI_RIF_PRO';

	
	const DIR_INMUEB = 'fcreginm1.DIR_INMUEB';

	
	const TELEFONO = 'fcreginm1.TELEFONO';

	
	const TELEFONO2 = 'fcreginm1.TELEFONO2';

	
	const NOMB_AD_EC = 'fcreginm1.NOMB_AD_EC';

	
	const DIR_ADM_EN = 'fcreginm1.DIR_ADM_EN';

	
	const N_DOCUMENT = 'fcreginm1.N_DOCUMENT';

	
	const FECHA_DOCU = 'fcreginm1.FECHA_DOCU';

	
	const USO_INMUEB = 'fcreginm1.USO_INMUEB';

	
	const TENENCIA = 'fcreginm1.TENENCIA';

	
	const AREA = 'fcreginm1.AREA';

	
	const AREA2 = 'fcreginm1.AREA2';

	
	const UBICACION = 'fcreginm1.UBICACION';

	
	const UBICACION2 = 'fcreginm1.UBICACION2';

	
	const TIPO = 'fcreginm1.TIPO';

	
	const TIPO2 = 'fcreginm1.TIPO2';

	
	const IMP_ANUAL = 'fcreginm1.IMP_ANUAL';

	
	const IMP_ANUAL2 = 'fcreginm1.IMP_ANUAL2';

	
	const IMP_TRIM = 'fcreginm1.IMP_TRIM';

	
	const IMP_TRIM2 = 'fcreginm1.IMP_TRIM2';

	
	const MONT_IMP = 'fcreginm1.MONT_IMP';

	
	const OBSERVACIO = 'fcreginm1.OBSERVACIO';

	
	const COD_CATAST = 'fcreginm1.COD_CATAST';

	
	const FECHA_ELAB = 'fcreginm1.FECHA_ELAB';

	
	const UBI_INMUEB = 'fcreginm1.UBI_INMUEB';

	
	const NORTE = 'fcreginm1.NORTE';

	
	const SUR = 'fcreginm1.SUR';

	
	const ESTE = 'fcreginm1.ESTE';

	
	const OESTE = 'fcreginm1.OESTE';

	
	const ADQUIERE = 'fcreginm1.ADQUIERE';

	
	const F_INSCRIPC = 'fcreginm1.F_INSCRIPC';

	
	const FOLIOS = 'fcreginm1.FOLIOS';

	
	const TOMO = 'fcreginm1.TOMO';

	
	const TRIM = 'fcreginm1.TRIM';

	
	const PROT = 'fcreginm1.PROT';

	
	const FRENTE = 'fcreginm1.FRENTE';

	
	const FONDO = 'fcreginm1.FONDO';

	
	const PRECIO = 'fcreginm1.PRECIO';

	
	const DIR_PROPIE = 'fcreginm1.DIR_PROPIE';

	
	const ID = 'fcreginm1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Serial', 'TipoBolet', 'NombrePro', 'CiRifPro', 'DirInmueb', 'Telefono', 'Telefono2', 'NombAdEc', 'DirAdmEn', 'NDocument', 'FechaDocu', 'UsoInmueb', 'Tenencia', 'Area', 'Area2', 'Ubicacion', 'Ubicacion2', 'Tipo', 'Tipo2', 'ImpAnual', 'ImpAnual2', 'ImpTrim', 'ImpTrim2', 'MontImp', 'Observacio', 'CodCatast', 'FechaElab', 'UbiInmueb', 'Norte', 'Sur', 'Este', 'Oeste', 'Adquiere', 'FInscripc', 'Folios', 'Tomo', 'Trim', 'Prot', 'Frente', 'Fondo', 'Precio', 'DirPropie', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcreginm1Peer::SERIAL, Fcreginm1Peer::TIPO_BOLET, Fcreginm1Peer::NOMBRE_PRO, Fcreginm1Peer::CI_RIF_PRO, Fcreginm1Peer::DIR_INMUEB, Fcreginm1Peer::TELEFONO, Fcreginm1Peer::TELEFONO2, Fcreginm1Peer::NOMB_AD_EC, Fcreginm1Peer::DIR_ADM_EN, Fcreginm1Peer::N_DOCUMENT, Fcreginm1Peer::FECHA_DOCU, Fcreginm1Peer::USO_INMUEB, Fcreginm1Peer::TENENCIA, Fcreginm1Peer::AREA, Fcreginm1Peer::AREA2, Fcreginm1Peer::UBICACION, Fcreginm1Peer::UBICACION2, Fcreginm1Peer::TIPO, Fcreginm1Peer::TIPO2, Fcreginm1Peer::IMP_ANUAL, Fcreginm1Peer::IMP_ANUAL2, Fcreginm1Peer::IMP_TRIM, Fcreginm1Peer::IMP_TRIM2, Fcreginm1Peer::MONT_IMP, Fcreginm1Peer::OBSERVACIO, Fcreginm1Peer::COD_CATAST, Fcreginm1Peer::FECHA_ELAB, Fcreginm1Peer::UBI_INMUEB, Fcreginm1Peer::NORTE, Fcreginm1Peer::SUR, Fcreginm1Peer::ESTE, Fcreginm1Peer::OESTE, Fcreginm1Peer::ADQUIERE, Fcreginm1Peer::F_INSCRIPC, Fcreginm1Peer::FOLIOS, Fcreginm1Peer::TOMO, Fcreginm1Peer::TRIM, Fcreginm1Peer::PROT, Fcreginm1Peer::FRENTE, Fcreginm1Peer::FONDO, Fcreginm1Peer::PRECIO, Fcreginm1Peer::DIR_PROPIE, Fcreginm1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('serial', 'tipo_bolet', 'nombre_pro', 'ci_rif_pro', 'dir_inmueb', 'telefono', 'telefono2', 'nomb_ad_ec', 'dir_adm_en', 'n_document', 'fecha_docu', 'uso_inmueb', 'tenencia', 'area', 'area2', 'ubicacion', 'ubicacion2', 'tipo', 'tipo2', 'imp_anual', 'imp_anual2', 'imp_trim', 'imp_trim2', 'mont_imp', 'observacio', 'cod_catast', 'fecha_elab', 'ubi_inmueb', 'norte', 'sur', 'este', 'oeste', 'adquiere', 'f_inscripc', 'folios', 'tomo', 'trim', 'prot', 'frente', 'fondo', 'precio', 'dir_propie', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Serial' => 0, 'TipoBolet' => 1, 'NombrePro' => 2, 'CiRifPro' => 3, 'DirInmueb' => 4, 'Telefono' => 5, 'Telefono2' => 6, 'NombAdEc' => 7, 'DirAdmEn' => 8, 'NDocument' => 9, 'FechaDocu' => 10, 'UsoInmueb' => 11, 'Tenencia' => 12, 'Area' => 13, 'Area2' => 14, 'Ubicacion' => 15, 'Ubicacion2' => 16, 'Tipo' => 17, 'Tipo2' => 18, 'ImpAnual' => 19, 'ImpAnual2' => 20, 'ImpTrim' => 21, 'ImpTrim2' => 22, 'MontImp' => 23, 'Observacio' => 24, 'CodCatast' => 25, 'FechaElab' => 26, 'UbiInmueb' => 27, 'Norte' => 28, 'Sur' => 29, 'Este' => 30, 'Oeste' => 31, 'Adquiere' => 32, 'FInscripc' => 33, 'Folios' => 34, 'Tomo' => 35, 'Trim' => 36, 'Prot' => 37, 'Frente' => 38, 'Fondo' => 39, 'Precio' => 40, 'DirPropie' => 41, 'Id' => 42, ),
		BasePeer::TYPE_COLNAME => array (Fcreginm1Peer::SERIAL => 0, Fcreginm1Peer::TIPO_BOLET => 1, Fcreginm1Peer::NOMBRE_PRO => 2, Fcreginm1Peer::CI_RIF_PRO => 3, Fcreginm1Peer::DIR_INMUEB => 4, Fcreginm1Peer::TELEFONO => 5, Fcreginm1Peer::TELEFONO2 => 6, Fcreginm1Peer::NOMB_AD_EC => 7, Fcreginm1Peer::DIR_ADM_EN => 8, Fcreginm1Peer::N_DOCUMENT => 9, Fcreginm1Peer::FECHA_DOCU => 10, Fcreginm1Peer::USO_INMUEB => 11, Fcreginm1Peer::TENENCIA => 12, Fcreginm1Peer::AREA => 13, Fcreginm1Peer::AREA2 => 14, Fcreginm1Peer::UBICACION => 15, Fcreginm1Peer::UBICACION2 => 16, Fcreginm1Peer::TIPO => 17, Fcreginm1Peer::TIPO2 => 18, Fcreginm1Peer::IMP_ANUAL => 19, Fcreginm1Peer::IMP_ANUAL2 => 20, Fcreginm1Peer::IMP_TRIM => 21, Fcreginm1Peer::IMP_TRIM2 => 22, Fcreginm1Peer::MONT_IMP => 23, Fcreginm1Peer::OBSERVACIO => 24, Fcreginm1Peer::COD_CATAST => 25, Fcreginm1Peer::FECHA_ELAB => 26, Fcreginm1Peer::UBI_INMUEB => 27, Fcreginm1Peer::NORTE => 28, Fcreginm1Peer::SUR => 29, Fcreginm1Peer::ESTE => 30, Fcreginm1Peer::OESTE => 31, Fcreginm1Peer::ADQUIERE => 32, Fcreginm1Peer::F_INSCRIPC => 33, Fcreginm1Peer::FOLIOS => 34, Fcreginm1Peer::TOMO => 35, Fcreginm1Peer::TRIM => 36, Fcreginm1Peer::PROT => 37, Fcreginm1Peer::FRENTE => 38, Fcreginm1Peer::FONDO => 39, Fcreginm1Peer::PRECIO => 40, Fcreginm1Peer::DIR_PROPIE => 41, Fcreginm1Peer::ID => 42, ),
		BasePeer::TYPE_FIELDNAME => array ('serial' => 0, 'tipo_bolet' => 1, 'nombre_pro' => 2, 'ci_rif_pro' => 3, 'dir_inmueb' => 4, 'telefono' => 5, 'telefono2' => 6, 'nomb_ad_ec' => 7, 'dir_adm_en' => 8, 'n_document' => 9, 'fecha_docu' => 10, 'uso_inmueb' => 11, 'tenencia' => 12, 'area' => 13, 'area2' => 14, 'ubicacion' => 15, 'ubicacion2' => 16, 'tipo' => 17, 'tipo2' => 18, 'imp_anual' => 19, 'imp_anual2' => 20, 'imp_trim' => 21, 'imp_trim2' => 22, 'mont_imp' => 23, 'observacio' => 24, 'cod_catast' => 25, 'fecha_elab' => 26, 'ubi_inmueb' => 27, 'norte' => 28, 'sur' => 29, 'este' => 30, 'oeste' => 31, 'adquiere' => 32, 'f_inscripc' => 33, 'folios' => 34, 'tomo' => 35, 'trim' => 36, 'prot' => 37, 'frente' => 38, 'fondo' => 39, 'precio' => 40, 'dir_propie' => 41, 'id' => 42, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcreginm1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcreginm1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcreginm1Peer::getTableMap();
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
		return str_replace(Fcreginm1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcreginm1Peer::SERIAL);

		$criteria->addSelectColumn(Fcreginm1Peer::TIPO_BOLET);

		$criteria->addSelectColumn(Fcreginm1Peer::NOMBRE_PRO);

		$criteria->addSelectColumn(Fcreginm1Peer::CI_RIF_PRO);

		$criteria->addSelectColumn(Fcreginm1Peer::DIR_INMUEB);

		$criteria->addSelectColumn(Fcreginm1Peer::TELEFONO);

		$criteria->addSelectColumn(Fcreginm1Peer::TELEFONO2);

		$criteria->addSelectColumn(Fcreginm1Peer::NOMB_AD_EC);

		$criteria->addSelectColumn(Fcreginm1Peer::DIR_ADM_EN);

		$criteria->addSelectColumn(Fcreginm1Peer::N_DOCUMENT);

		$criteria->addSelectColumn(Fcreginm1Peer::FECHA_DOCU);

		$criteria->addSelectColumn(Fcreginm1Peer::USO_INMUEB);

		$criteria->addSelectColumn(Fcreginm1Peer::TENENCIA);

		$criteria->addSelectColumn(Fcreginm1Peer::AREA);

		$criteria->addSelectColumn(Fcreginm1Peer::AREA2);

		$criteria->addSelectColumn(Fcreginm1Peer::UBICACION);

		$criteria->addSelectColumn(Fcreginm1Peer::UBICACION2);

		$criteria->addSelectColumn(Fcreginm1Peer::TIPO);

		$criteria->addSelectColumn(Fcreginm1Peer::TIPO2);

		$criteria->addSelectColumn(Fcreginm1Peer::IMP_ANUAL);

		$criteria->addSelectColumn(Fcreginm1Peer::IMP_ANUAL2);

		$criteria->addSelectColumn(Fcreginm1Peer::IMP_TRIM);

		$criteria->addSelectColumn(Fcreginm1Peer::IMP_TRIM2);

		$criteria->addSelectColumn(Fcreginm1Peer::MONT_IMP);

		$criteria->addSelectColumn(Fcreginm1Peer::OBSERVACIO);

		$criteria->addSelectColumn(Fcreginm1Peer::COD_CATAST);

		$criteria->addSelectColumn(Fcreginm1Peer::FECHA_ELAB);

		$criteria->addSelectColumn(Fcreginm1Peer::UBI_INMUEB);

		$criteria->addSelectColumn(Fcreginm1Peer::NORTE);

		$criteria->addSelectColumn(Fcreginm1Peer::SUR);

		$criteria->addSelectColumn(Fcreginm1Peer::ESTE);

		$criteria->addSelectColumn(Fcreginm1Peer::OESTE);

		$criteria->addSelectColumn(Fcreginm1Peer::ADQUIERE);

		$criteria->addSelectColumn(Fcreginm1Peer::F_INSCRIPC);

		$criteria->addSelectColumn(Fcreginm1Peer::FOLIOS);

		$criteria->addSelectColumn(Fcreginm1Peer::TOMO);

		$criteria->addSelectColumn(Fcreginm1Peer::TRIM);

		$criteria->addSelectColumn(Fcreginm1Peer::PROT);

		$criteria->addSelectColumn(Fcreginm1Peer::FRENTE);

		$criteria->addSelectColumn(Fcreginm1Peer::FONDO);

		$criteria->addSelectColumn(Fcreginm1Peer::PRECIO);

		$criteria->addSelectColumn(Fcreginm1Peer::DIR_PROPIE);

		$criteria->addSelectColumn(Fcreginm1Peer::ID);

	}

	const COUNT = 'COUNT(fcreginm1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcreginm1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcreginm1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcreginm1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcreginm1Peer::doSelectRS($criteria, $con);
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
		$objects = Fcreginm1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcreginm1Peer::populateObjects(Fcreginm1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcreginm1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcreginm1Peer::getOMClass();
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
		return Fcreginm1Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcreginm1Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcreginm1Peer::ID);
			$selectCriteria->add(Fcreginm1Peer::ID, $criteria->remove(Fcreginm1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcreginm1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcreginm1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcreginm1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcreginm1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcreginm1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcreginm1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcreginm1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcreginm1Peer::DATABASE_NAME, Fcreginm1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcreginm1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcreginm1Peer::DATABASE_NAME);

		$criteria->add(Fcreginm1Peer::ID, $pk);


		$v = Fcreginm1Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcreginm1Peer::ID, $pks, Criteria::IN);
			$objs = Fcreginm1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcreginm1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcreginm1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcreginm1MapBuilder');
}
