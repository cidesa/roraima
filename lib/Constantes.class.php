<?php

class Constantes
{
	// Variables de nombres de módulos
	// para ser usados en los Logs del sistema
	// Para los Log se colocaria una instruccion como la siguiente:
	// $this->logMessage(Contantes::Autenticacion.' Mi Mensaje','info');
	// ó
	// $this->logMessage(Contantes::Compras.' Mi Mensaje','info');
	const Autenticacion = '{Autenticacion} ';
	const Compras = '{Compras} ';
	const Tesoreria = '{Tesoreria} ';

	public static function ListaGeneraOrdenPago()
	{return array('N' => '(No Afecta)', 'C' => 'Causa', 'O' => 'Compromete y Causa');}
	
	public static function ListaFrecuenciaPago()
	{return array('Q' => 'Quincenal', 'S' => 'Semanal', 'M' => 'Mensual', 'A' => 'Mensual Anticipo');}
	
	public static function ListaTipoCompra()
	{return array('C' => 'Compra', 'S' => 'Servicio', 'M' => 'Mixto');}
	
	
}
