<html>
<head>
<?php include('head.php'); ?>
</head>
<body>

<?php include('titlebar.php'); ?>

<?php include('navbar.php'); ?>

<span class="title">Plan lekcji</span>
    <div id="plancontainer" class="content">
        
        <ul>
        
        <?php 

            $plans=array(

                'najlepsza klasa'=>'plany/1aL.csv'

            );



            $path=$plans['najlepsza klasa'];

            if(isset($_GET['klasa'])&&array_key_exists($_GET['klasa'], $plans))
            {
                $path=$plans[$_GET['klasa']];
            }

            foreach($plans as $name=>$filepath)
            {
                echo '<li';
                if($path==$filepath)
                {
                    echo ' id="activeplan"';
                }
                echo '><a href="?klasa='.$name.'">'.$name.'</a></li>';
            }

            ?>
        
        </ul>
        
        
        <div id="plan">
            <table>


                <?php
                
                ini_set("auto_detect_line_endings", true);
                
                if($handle=fopen($path, "r"))
                {
                    $row=fgetcsv($handle, 100, ";");
                    foreach($row as $cell)
                    {
                        echo '<th>'.$cell.'</th>';
                    }
                    
                    while($row=fgetcsv($handle, 100, ";"))
                    {
                        echo '<tr>';
                        
                        foreach($row as $cell)
                        {
                            echo '<td>'.$cell.'</td>';
                        }
                        
                        echo '</tr>';
                    }
                    
                    fclose($handle);
                }
                
                ?>

            </table>
        </div>
</div>

</body>
</html>
