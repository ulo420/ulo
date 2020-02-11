<?php

$filename=basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

$menuitems=array(
    'index.php' => 'główna',
    'plan.php' => 'plan lekcji',
    'rekrutacja.php' => 'rekrutacja',
    'dziennik.php' => 'dziennik'
);

echo '<div id="navbar" class="content">';

foreach($menuitems as $file => $title)
{
    echo '<a ';
    if($filename==$file) echo 'id="active" ';
    echo 'href="'.$file.'">'.$title.'</a>';
}
    
echo '</div>';

?>