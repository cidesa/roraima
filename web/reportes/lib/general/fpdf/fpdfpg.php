<?php
//SHOW A DATABASE ON A PDF FILE
//FILE CREATED BY: Carlos José Vásquez Sáez
//YOU CAN CONTACT ME: carlos@magallaneslibre.com
//FROM PUNTA ARENAS, MAGALLANES

define('FPDF_FONTPATH','font/');
require('fpdf.php');

//Connect to your database
$link=pg_connect('dbname=curso port=5432 user=postgres password=manager');

//Select the Products you want to show in your PDF file
$result=pg_query($link,"select codpro,nompro,prepro from productos ORDER BY codpro");
$number_of_products = pg_numrows($result);

//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$total = 0;

//For each row, add the field to the corresponding column
while($tb->fields = pg_fetch_array($result))
{
	$code = $tb->fields["codpro"];
	$name = substr($tb->fields["nompro"],0,20);
	$real_price = $tb->fields["prepro"];
	$price_to_show = number_format($tb->fields["prepro"],',','.','.');

	$column_code = $column_code.$code."\n";
	$column_name = $column_name.$name."\n";
	$column_price = $column_price.$price_to_show."\n";

	//Sum all the Prices (TOTAL)
	$total = $total+$real_price;
}
pg_close();

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
$total = number_format($total,',','.','.');

//Create a new PDF file
$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'CODIGO',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'NOMBRE',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'PRECIO',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$columna_price,1,'R');
$pdf->SetX(135);
$pdf->MultiCell(30,6,'$ '.$total,1,'R');
$pdf->SetX(135);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(45);
	$pdf->MultiCell(120,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>  
