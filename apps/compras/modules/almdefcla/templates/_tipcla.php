<?  if ($cadefcla->getTipcla()=='F'){
    echo radiobutton_tag('cadefcla[tipcla]','F', true, array()) .'&nbsp;&nbsp;'. "Fiel Cumplimiento  ";
    echo radiobutton_tag('cadefcla[tipcla]','P', false, array()) .'&nbsp;&nbsp;'. "Penal  ";
    echo radiobutton_tag('cadefcla[tipcla]','E', false, array()) .'&nbsp;&nbsp;'. "Especial  ";
    echo radiobutton_tag('cadefcla[tipcla]','X', false, array()) .'&nbsp;&nbsp;'. "Extra  ";

  }elseif ($cadefcla->getTipcla()=='P'){
    echo radiobutton_tag('cadefcla[tipcla]','F', false, array()) .'&nbsp;&nbsp;'. "Fiel Cumplimiento  ";
    echo radiobutton_tag('cadefcla[tipcla]','P', true, array()) .'&nbsp;&nbsp;'. "Penal  ";
    echo radiobutton_tag('cadefcla[tipcla]','E', false, array()) .'&nbsp;&nbsp;'. "Especial  ";
    echo radiobutton_tag('cadefcla[tipcla]','X', false, array()) .'&nbsp;&nbsp;'. "Extra  ";

  }elseif ($cadefcla->getTipcla()=='E'){
    echo radiobutton_tag('cadefcla[tipcla]','F', false, array()) .'&nbsp;&nbsp;'. "Fiel Cumplimiento  ";
    echo radiobutton_tag('cadefcla[tipcla]','P', false, array()) .'&nbsp;&nbsp;'. "Penal  ";
    echo radiobutton_tag('cadefcla[tipcla]','E', true, array()) .'&nbsp;&nbsp;'. "Especial  ";
    echo radiobutton_tag('cadefcla[tipcla]','X', false, array()) .'&nbsp;&nbsp;'. "Extra  ";

  }elseif ($cadefcla->getTipcla()=='X'){
    echo radiobutton_tag('cadefcla[tipcla]','F', false, array()) .'&nbsp;&nbsp;'. "Fiel Cumplimiento  ";
    echo radiobutton_tag('cadefcla[tipcla]','P', false, array()) .'&nbsp;&nbsp;'. "Penal  ";
    echo radiobutton_tag('cadefcla[tipcla]','E', false, array()) .'&nbsp;&nbsp;'. "Especial  ";
    echo radiobutton_tag('cadefcla[tipcla]','X', true, array()) .'&nbsp;&nbsp;'. "Extra";
  }else{
    echo radiobutton_tag('cadefcla[tipcla]','F', true, array()) .'&nbsp;&nbsp;'. "Fiel Cumplimiento  ";
    echo radiobutton_tag('cadefcla[tipcla]','P', false, array()) .'&nbsp;&nbsp;'. "Penal  ";
    echo radiobutton_tag('cadefcla[tipcla]','E', false, array()) .'&nbsp;&nbsp;'. "Especial  ";
    echo radiobutton_tag('cadefcla[tipcla]','X', false, array()) .'&nbsp;&nbsp;'. "Extra  ";
  }?>