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

            $plansdir='plany/';
            $plansextension='.csv';
            
            $plans=array(

                '1aL'=>'najlepsza klasa',
                '1bL'=>'nie najlepsza klasa'

            );

            
            $planfiles=array_diff(scandir($plansdir), array('.', '..'));
            
            
            $currentplan='1aL';

            if(isset($_GET['klasa'])&&in_array($_GET['klasa'].$plansextension, $planfiles))
            {
                $currentplan=$_GET['klasa'];
            }

            foreach($planfiles as $file)
            {
                $classfromfilename=basename($file, $plansextension);
                echo '<li';
                if($currentplan==$classfromfilename)
                {
                    echo ' id="activeplan"';
                }
                echo '><a href="?klasa='.$classfromfilename.'">';
                if(array_key_exists($classfromfilename, $plans)) echo $plans[$classfromfilename];
                else echo $classfromfilename;
                echo'</a></li>';
            }

            ?>
        
        </ul>
        
        
        <div id="plan">
            <table>


                <?php
                
                ini_set("auto_detect_line_endings", true);
                
                if($handle=fopen($plansdir.$currentplan.$plansextension, "r"))
                {
                    $highlightindex=0;
                    $row=fgetcsv($handle, 100, ";");
                    foreach($row as $index => $cell)
                    {
                        if($cell=='Nr') $highlightindex=$index;
                        echo '<th>'.$cell.'</th>';
                    }
                    
                    while($row=fgetcsv($handle, 100, ";"))
                    {
                        echo '<tr>';
                        
                        foreach($row as $index => $cell)
                        {
                            echo '<td';
                            if($index==$highlightindex) echo ' class="index" ';
                            echo '>'.$cell.'</td>';
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
