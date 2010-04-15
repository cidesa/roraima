	var NoOffFirstLineMenus=3;			// Number of first level items
	var LowBgColor='#EEEEEE';			// Background color when mouse is not over
	var LowSubBgColor='#EEEEEE';			// Background color when mouse is not over on subs
	var HighBgColor='#666666';			// Background color when mouse is over
	var HighSubBgColor='#666666';			// Background color when mouse is over on subs
	var FontLowColor='black';			// Font color when mouse is not over
	var FontSubLowColor='black';			// Font color subs when mouse is not over
	var FontHighColor='white';			// Font color when mouse is over
	var FontSubHighColor='white';			// Font color subs when mouse is over
	var BorderColor='white';			// Border color
	var BorderSubColor='#999999';			// Border color for subs
	var BorderWidth=0;				// Border width
	var BorderBtwnElmnts=0;			// Border between elements 1 or 0
	var FontFamily="Verdana, Arial, Helvetica, sans-serif"	// Font family menu items
	var FontSize=8;				// Font size menu items
	var FontBold=0;				// Bold menu items 1 or 0
	var FontItalic=0;				// Italic menu items 1 or 0
	var MenuTextCentered='left';			// Item text position 'left', 'center' or 'right'
	var MenuCentered='center';			// Menu horizontal position 'left', 'center' or 'right'
	var MenuVerticalCentered='top';		// Menu vertical position 'top', 'middle','bottom' or static
	var ChildOverlap=.1;				// horizontal overlap child/ parent
	var ChildVerticalOverlap=.1;			// vertical overlap child/ parent
	var StartTop=20;				// Menu offset x coordinate
	var StartLeft=-70;				// Menu offset y coordinate
	var VerCorrect=0;				// Multiple frames y correction
	var HorCorrect=0;				// Multiple frames x correction
	var LeftPaddng=4;				// Left padding
	var TopPaddng=2;				// Top padding
	var FirstLineHorizontal=1;			// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL
	var MenuFramesVertical=1;			// Frames in cols or rows 1 or 0
	var DissapearDelay=700;			// delay before menu folds in
	var TakeOverBgColor=1;			// Menu frame takes over background color subitem frame
	var FirstLineFrame='navig';			// Frame where first level appears
	var SecLineFrame='space';			// Frame where sub levels appear
	var DocTargetFrame='space';			// Frame where target documents appear
	var TargetLoc='';				// span id for relative positioning
	var HideTop=0;				// Hide first level when loading new document 1 or 0
	var MenuWrap=1;				// enables/ disables menu wrap 1 or 0
	var RightToLeft=0;				// enables/ disables right to left unfold 1 or 0
	var UnfoldsOnClick=0;			// Level 1 unfolds onclick/ onmouseover
	var WebMasterCheck=0;			// menu tree checking on or off 1 or 0
	var ShowArrow=1;				// Uses arrow gifs when 1
	var KeepHilite=1;				// Keep selected path highlighted
	var Arrws=['/js/icons/arrow_right.gif',5,9,'/js/icons/arrow_down.gif',9,5,'/js/icons/arrow_left.gif',5,9];	// Arrow source, width and height

function BeforeStart(){return}
function AfterBuild(){return}
function BeforeFirstOpen(){return}
function AfterCloseAll(){return}


// Menu tree
//	MenuX=new Array(Text to show, Link, background image (optional), number of sub elements, height, width);
//	For rollover images set "Text to show" to:  "rollover:Image1.jpg:Image2.jpg"

Menu1=new Array("Funciones","","",4,18,80);
	Menu1_1=new Array("Guardar","#","",0,20,120);	
	Menu1_2=new Array("Cancelar","#","",0);
	Menu1_3=new Array("Eliminar","#","",0);
	Menu1_4=new Array("Vista Previa","#","",0);

Menu2=new Array("Utilidades","","",4);
	Menu2_1=new Array("Calculadora","#","",0,20,120);	
	Menu2_2=new Array("Hoja de Cálculo","#","",0);
	Menu2_3=new Array("Libreta","#","",0);
	Menu2_4=new Array("Calendario","#","",0);

Menu3=new Array("Ayuda","","",3);
	Menu3_1=new Array("Indice de la Ayuda","#","",0,20,140);
	Menu3_2=new Array("Acerca de SIGA...","#","",0);
	Menu3_3=new Array("Sitio Web de Cidesa","#","",0);
