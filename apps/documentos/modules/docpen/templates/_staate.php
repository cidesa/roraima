<?php

  echo select_tag('filters[staate]',options_for_select(Constantes::listaAtencion(),isset($filters['staate']) ? $filters['staate'] : ''));

?>

