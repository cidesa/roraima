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
	const Nomina = '{Nomina} ';

	public static function ListaGeneraOrdenPago()
	{return array('N' => '(No Afecta)', 'C' => 'Causa', 'O' => 'Compromete y Causa');}
	
	public static function ListaFrecuenciaPago()
	{return array('Q' => 'Quincenal', 'S' => 'Semanal', 'M' => 'Mensual', 'A' => 'Mensual Anticipo');}
	
	public static function ListaTipoCompra()
	{return array('C' => 'Compra', 'S' => 'Servicio', 'M' => 'Mixto');}
	
    public static function ListaEstadoCivil()
	{return array('S' => 'Soltero', 'C' => 'Casado', 'D' => 'Divorciado', 'V' => 'Viudo');}
	
    public static function ListaEstatus()
	{return array('A' => 'Activo', 'P' => 'Permiso Remunerado', 'R' => 'Retirado', 'V' => 'Vacaciones', '-' => 'Permiso No Remunerado');}

    public static function ListaFormaPago()
	{return array('01' => 'Deposito', '02' => 'Cheque', '03' => 'Efectivo');}

    public static function ListaTipoCuenta()
	{return array('Cta Corriente' => 'Cta. Corriente', 'Cta de Ahorros' => 'Cta. de Ahorros');}

    public static function ListaTalla()
	{return array('S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL', 'XXXL' => 'XXXL');}
	
    public static function ListaGrupoSanguineo()
	{return array('ARH+' => 'ARH+', 'ARH-' => 'ARH-', 'BRH+' => 'BRH+', 'BRH-' => 'BRH-', 'ABRH+' => 'ABRH+', 'ABRH-' => 'ABRH-', 'ORH+' => 'ORH+');}
	
    public static function ListaGrupoLaboral()
	{return array('0001' => 'Fijo', '0002' => 'Contratado', '0003' => 'Pasantia', '0004' => 'Periodo de Prueba');}
	
    public static function ListaFormaTraslado()
	{return array('1' => 'Bicicleta', '2' => 'Motocicleta', '3' => 'Carro Propio', '4' => 'A Pie', '5' => 'En Cola', '6' => 'Transporte Publico', '7' => 'Transporte Privado');}
	
    public static function ListaTipoVivienda()
	{return array('1' => 'Rancho', '2' => 'Casa', '3' => 'Apartamento', '4' => 'Otro');}
	
    public static function ListaFormaTenencia()
	{return array('1' => 'Propia', '2' => 'Alquilada', '3' => 'Prestada', '4' => 'Otra');}
	
	
}
