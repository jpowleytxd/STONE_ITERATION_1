<?php

foreach(glob('sites/*/templates/*_branded.html') as $filename){
  $template = file_get_contents($filename);

  print_r($template);
}

 ?>
