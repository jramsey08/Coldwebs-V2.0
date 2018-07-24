<?php

$urls ="error_log";
if(file_exists($urls)){

    $page = join("",file("$urls"));
    $kw = explode("\n", $page);

    for($i=0;$i<count($kw);$i++){
        $string = $kw[$i];

        $codelenght = 20;
        while($newcode_length < $codelenght) {
        $x=1;
        $y=3;
        $part = rand($x,$y);
        if($part==1){$a=48;$b=57;}  // Numbers
        if($part==2){$a=65;$b=90;}  // UpperCase
        if($part==3){$a=97;$b=122;} // LowerCase
        $code_part=chr(rand($a,$b));
        $newcode_length = $newcode_length + 1;
        $newcode = $newcode.$code_part;
        } $newcode = $newcode . $i;


        $First_char = substr("$string", 0, 1);
        if($First_char == "["){ 
            $Date = substr("$string", 1, 20);
        }else{ 
            $Date = ""; 
        }

        if($string == ""){
            $No_Content = 1;
        }else{
            if(preg_match("/constant/",$string)){
            }else{
                mysqli_query($CwDb,"INSERT INTO error_log (error, id, date)VALUES ('$string', '$newcode', '$Date')"); 
            }
        }
    }
    unlink($urls);
}else{
    $ourFileName = $urls;
    $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    fclose($ourFileHandle);
}

?>