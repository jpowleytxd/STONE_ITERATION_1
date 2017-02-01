<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0 user-scalable=no">
  <meta charset="UTF-8">

  <title>Stonegate Templates</title>

  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="styesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/main.js" type="text/javascript"></script>
</head>

<body>

<div class="navigation-container">
  <div class="navigation-block">
    <div class="navigation-title">Build</div>
    <div class="navigation-items">
      <?php
        foreach(glob('builders/*.php') as $filename){
          $type = preg_replace('/.*?\/(.*?).php/', '$1', $filename);
          $lowerType = $type;
          $type =  str_replace('_', ' ', $type);
          if(strpos($filename, 'common') === false){
            print_r('<div class="navigation-item" data-link="builder" data-type="' . $lowerType . '">');
            print_r(ucwords($type));
            print_r('</div>');
          }
        }
       ?>
     </div>
  </div>
  <div class="navigation-block">
    <div class="navigation-title">Insert</div>
    <div class="navigation-items">
      <?php
        foreach(glob('inserters/*.php') as $filename){
          $type = preg_replace('/.*?\/(.*?).php/', '$1', $filename);
          $lowerType = $type;
          $type =  str_replace('_', ' ', $type);
          if(strpos($filename, 'common') === false){
            print_r('<div class="navigation-item" data-link="inserter" data-type="' . $lowerType . '">');
            print_r(ucwords($type));
            print_r('</div>');
          }
        }
       ?>
    </div>
  </div>
  <div class="navigation-block">
    <div class="navigation-title">Update</div>
    <div class="navigation-items">
      <?php
        foreach(glob('updaters/*.php') as $filename){
          $type = preg_replace('/.*?\/(.*?).php/', '$1', $filename);
          $lowerType = $type;
          $type =  str_replace('_', ' ', $type);
          if(strpos($filename, 'common') === false){
            print_r('<div class="navigation-item" data-link="updater" data-type="' . $lowerType . '">');
            print_r(ucwords($type));
            print_r('</div>');
          }
        }
       ?>
    </div>
  </div>
  <div class="navigation-block">
    <div class="navigation-title">View</div>
    <div class="navigation-items">
      <?php
        foreach(glob('viewers/*.php') as $filename){
          $type = preg_replace('/.*?\/(.*?).php/', '$1', $filename);
          $lowerType = $type;
          $type =  str_replace('_', ' ', $type);
          if(strpos($filename, 'common') === false){
            print_r('<div class="navigation-item" data-link="viewer" data-type="' . $lowerType . '">');
            print_r(ucwords($type));
            print_r('</div>');
          }
        }
       ?>
    </div>
  </div>
</div>
</body>

</html>
