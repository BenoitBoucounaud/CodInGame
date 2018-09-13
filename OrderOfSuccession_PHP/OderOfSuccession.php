<?php

$table=array();

fscanf(STDIN, "%d",
    $n
);
for ($i = 0; $i < $n; $i++)
{
    fscanf(STDIN, "%s %s %d %s %s %s",
        $name,
        $parent,
        $birth,
        $death,
        $religion,
        $gender
    );
    //Regroup data in a array
    $newRow = array($name,$parent,$birth,$gender,$death,$religion);
    array_push($table,$newRow);
}




//Sort by age
for($i=0;$i<count($table);$i++){
    for ($k=0;$k<count($table);$k++){
        if($table[$i][2]<$table[$k][2]){
            $goblet=$table[$k];
            $table[$k]=$table[$i];
            $table[$i]=$goblet;
        }
    }
}



//Sort by gender
$b=1;
$c=count($table);

for($i=0;$i<count($table);$i++){
        if($table[$i][3]=="M"){
            array_splice($table,$b,0,array($table[$i]));
            array_splice($table,$i+1,1);
            $b++;
        }
    }


//Sort by kindship
$k=1;
function sortParent($table, $k){  
    
    global $table;
    global $k;
    
    for($m=0;$m<count($table);$m++){
        $k=$m+1;
        
        for ($i=1;$i<count($table);$i++){
            
            if($table[$i][1]==$table[$m][0]) {
                
                array_splice($table,$k,0,array($table[$i]));
                array_splice($table,$i+1,1);
                $k++;
            }
        }
    }
}
sortParent($table,$k);


//Out dead and not anglican
for($i=0;$i<count($table);$i++){
if($table[$i][4]!=="-" || $table[$i][5]!=="Anglican"){
    array_splice($table,$i,1);
    $i--;
    }
}

//Answer
for ($i=0;$i<count($table);$i++){
    echo ($table[$i][0]."\n");
}

?>