<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dataStore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {

  die("Connection failed: " . mysqli_connect_error());

}

$sql = "SELECT sku FROM `comboproducts`" ;

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
        echo '<br>';
       $comboSKU = $row['sku'];
    //print_r($comboSKU);
  }

} else {

  echo "0 results";

}

mysqli_close($conn);


//-----------------------------------------------------------------------------------------------------------
         //nanga kuudukura where condition eattaa poola data ah eaduthuu data irruntha array kuula poodum illana 
        // empty array kuula poodum condation eatta poola array ah return pannum

        function fetchDataWithCondition($table,$field,$equalornot,$data,$limit,$con){
        $conn = mysqli_connect('localhost','root', '', 'dataStore');
        $array = array();
        
        if($limit==0 or $limit==''){ // limit 0 or empty ah vantha nadkum

            $sql='SELECT * FROM `'.$table.'` WHERE `'.$field.'`'.$equalornot.'"'.$data.'"';

        }else{
            
            $sql='SELECT * FROM `'.$table.'` WHERE `'.$field.'`'.$equalornot.'"'.$data.'" LIMIT '.$limit;

        }

        $result= mysqli_query($conn, $sql);

        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $array[] = $row; //select panni eadutha data 
            }
        }

        return $array;
    }

    //-------------------------------------------------------------------------------------------------------------------

        function fetchsingleDataWithCondition($table,$field,$equalornot,$data,$whichfield,$con){
        
        $conn = mysqli_connect('localhost','root', '', 'dataStore');

        $field_value = 'empty';

        $sql='SELECT * FROM `'.$table.'` WHERE `'.$field.'`'.$equalornot.'"'.$data.'"';

        $result= mysqli_query($conn, $sql);

        if ($result->num_rows > 0) 

        {

            while($row = $result->fetch_assoc())

            {

                $field_value = $row[$whichfield]; //naga kuudukura field value ah eaduthuu $field_value ka poodum

            }

        }

        return $field_value;
    }



    //----------------------------------------------------------------------------------------


     // remove dash after text in single SKU
    function removeDashAfterTxt($sku){

        $divideSKU= explode('-', $sku);// dash ah vachuu uudachuuuu $divideSKU kuulla poodum 

        $sku=trim($divideSKU[0]);//divideSKU 0 index ah maddum eaduthu tharum 

        return $sku; // antha sku ah return pannum
    }


    //--------------------------------------------------------------------------------------------

    //what is the purpose this function ? 
    //remove PK in SKU
    function removePk($sku){
        $changed = true;
        $pknumber=substr($sku, -3, -2);

        if(substr($sku,0,2)=="CL"){//SK muthal randu char um CL ah vanthudunaaa than intah if work akum

            if($pknumber=="5" || $pknumber=="A" || $pknumber=="F"){ 

                $changed = false;

            }else{

                $changed = true;

            }

        }else{

            $changed = true; //intha kadathukla change true 

        }

        if(!$changed){ // false
            $pknumber=1;
            $new_sku = $sku;
        }else{
            if($pknumber=="A"){
                $pknumber=10;
            }else if($pknumber=="B"){
                $pknumber=15;
            }else if($pknumber=="C"){
                $pknumber=20;
            }else if($pknumber=="D"){
                $pknumber=30;
            }else if($pknumber=="E"){
                $pknumber=50;
            }else if($pknumber=="F"){
                $pknumber=100;
            }else{
                $pknumber = $pknumber;
            }

            $new_sku = substr($sku, 0, -3);
        }

        return array($new_sku,$pknumber);
    }

    //---------------------------------------------------------------------------------------------------------

//vire ku madum pack number illa roll ahh than kuudupanga
function returnQty($sku,$con){
        $qty = array();
        $singleComboQty = array();
        $notOutofstock = true;

        $bool = true;
        $quantity = null;
        $error = null;
        
        $responseCode = "400";

        $divideSKUByDash= explode('-', $sku); //Sku dash ahhla explode pannum paniii $divideSKUByDash enda veriable ka poodum

        if(array_key_exists(1,$divideSKUByDash)){ //$divideSKUByDash eanda array kuulla 1 eanduu vnthuduu endaa 

            $wareHouse = trim($divideSKUByDash[1]); //$divideSKUByDash eanda array kulla irrukura first index ah trim panni ware house kuula poodum 

        }else{

            $wareHouse = "UK";//appdi $divideSKUByDash kuulla 1 illna UK eanda string ah $warehouse kulla poodum

        }

        $sku = $divideSKUByDash[0]; //dash aala uudachathula irrukura first index aathavathuu eathachu oru SKU $sku ulla poodum 

        if(substr($sku,0,3)=="ENC"){ //intha if work aakakurathunaa sku 45 character ahh thandii poona maddum 

            $encresult = fetchsingleDataWithCondition("comboproducts","sku","=",$sku,"originalsku",$con);// fetchsingleDataWithCondition function means naga kuudukura comboproduct eanda table la irrunthu concatenate "panni sku = comboSku da first Sku appdi data anga illana sonna empty eada string ah return pannum" 

            if($encresult !== "empty"){ //if intha empty encresult equal ahh illana 

                $sku = $encresult; // ipa sku kuula database la irrnthuu paticular field irrukura data ahh avchuu irrukum

            }else{

                $sku = "Wrong ENC"; //empty ah irunthuchunaa Wrong ENC eanda string ah $Sku kuula poodu vaikum 

            }
        }
        
        if($sku == "Wrong ENC"){ 

            $responseCode = "400";

            $error = "Wrong ENC. ENC not in database.";

        }else if(strpos($sku, "+") !== false){//intha condition kulla number vantah condition true atha than not equel false eaduu use

            $skuArray = explode("+", $sku);// +ah vachuu Sku ah uudaikum uudachuu $kuarray kuula poodum

            foreach($skuArray as $index => $singlesku) {

                $singlesku = removeDashAfterTxt($singlesku); // eathcum dash appdi irruntha eadukum thaniyaa SKU maddum vachuu irrukum

                if(substr($singlesku, -2)=="PK"){ // $singleSku irrukura kadaii randum PK ah irruntha intha if work aakum

                    $removePK = removePk($singlesku);

                    $singlesku = $removePK[0]; //new Sku

                    $singleskuDivider = $removePK[1];//sku la irrukura number

                }else{

                    $singlesku = $singlesku; //dash remove panna single SKU 

                    $singleskuDivider = 1; // why change num 1 ?

                }

                $singleskuDivider = (int)$singleskuDivider;//decalear in integer veriable

                $new_qty = 0; //0

                $singleData_array = fetchDataWithCondition("products","SKU","=",$singlesku,0,$con);

                $count = count($singleData_array); //data base la irrunthu eaduthu konduu vanthu antha array count panni count eanda veriable kulla poodum 

                if($count>0){
                    foreach ($singleData_array as $singleData) {
                        $outofstock = $singleData['outofstock']; //product eanda table la irrukura outof stock eanda field ah eaduthuu vachuu irrkum 

                        if($wareHouse == "IDE"){//german 
                            $Quantityunit1 = (int)$singleData['germanInventory']; //(int) use panrathuu integer maddum use aaha 
                        }elseif($wareHouse == "CA"){//canada 
                            $Quantityunit1 = (int)$singleData['canada'];
                        }elseif($wareHouse == "IFR"){//france
                            $Quantityunit1 = (int)$singleData['france'];
                        }elseif($wareHouse == "NL"){//natherLand
                            $Quantityunit1 = (int)$singleData['netherland'];
                        }else{
                            $Quantityunit1 = (int)$singleData['Quantity'] + (int)$singleData['unit1'];// cahange unit_1 and unit_2((int)$singleData['unit1'] + (int)$singleData['unit2'])
                        }
                        
                        $new_qty = intdiv($Quantityunit1,$singleskuDivider); // quantityunit/sku la irrunthu vantha number aaum perichu than new quantity 

                        $singleCombQty = $new_qty; //new quantity ah singleCombQty kulla poodurangaaaaa

                        array_push($qty,$new_qty); // mela difine panni irrukura array kuula new quantity ah push pannurangaaa

                        if($outofstock=="yes"){ //product eanda table kuula irrukura outofstock eanda feild la irrrkura data == yes ahh nu check pannuranga 

                            $notOutofstock = false; //nonoutofstock true ahh irrunthatha false ahh mathii irrukanga mela true 
                            
                        }
                    }

                    $bool = $bool * true;

                }else{

                    $bool = $bool * false;
                    $singleCombQty = "#N/A";
                }

                array_push($singleComboQty,array($singlesku,$singleCombQty)); //mela decalear pani vachuu irrukura single combo quantity eanda array kuula innoru array ah push pannuranga

                if($bool){

                    $responseCode = "200";//200 success

                }else{

                    $responseCode = "400"; //400 means error
                    $error = "One or more SKU did not find in Database.";

                }
            }

        }else{

            $sku = removeDashAfterTxt($sku);//dash ellathium remove paniduu thani sku ah maddum vachuu irrukum 

            if(substr($sku, -2)=="PK"){ // Sku ah piinukuu irrunthu check pannum poothu PK ahh vanthaaa 

                $removePK = removePk($sku); //Sku la irrukura Pk ah thooki pooddu atha removePK kuula pooduthuu  

                $sku = $removePK[0]; //PK remove Sku ahh vachuu irruka pooothu removePK[0]

                $skuDivider = $removePK[1]; //PK number 

            }else{//Sku la PK varalanaaa else

                $sku = $sku;

                $skuDivider = 1; //PK count or pck number ah 1 aaa change panni vidurangaaaa
            }

            $singleData_array = fetchDataWithCondition("products","SKU","=",$sku,0,$con);//database la irrunthu data ah eaduthu oru array formet la vachu irrukum 

            $count = count($singleData_array); //antha array ah count panni $count kuula poodum  

            if($count>0){
                foreach ($singleData_array as $singleData) {
                    $outofstock = $singleData['outofstock'];
                    
                    if($wareHouse == "IDE"){
                        $Quantityunit1 = (int)$singleData['germanInventory'];// atha felid kuula irrukura quantity eaduthu vachuu irrukagaa
                    }elseif($wareHouse == "CA"){
                        $Quantityunit1 = (int)$singleData['canada'];
                    }elseif($wareHouse == "IFR"){
                        $Quantityunit1 = (int)$singleData['france'];
                    }elseif($wareHouse == "NL"){
                        $Quantityunit1 = (int)$singleData['netherland'];
                    }else{
                        $Quantityunit1 = (int)$singleData['Quantity'] + (int)$singleData['unit1'];//quantityunit1 =quantity eanda fields irrukura number ahhum unit1 eanda feild irrukura number ahum kuudii $Quantityunit1 kulla poodum 
                    }

                    $new_qty = intdiv($Quantityunit1,$skuDivider); //quantity /SkuDivider 

                    array_push($qty,$new_qty);

                    if($outofstock=="yes"){

                        $notOutofstock = false;
                    }
                }
                $responseCode = "200"; //success 
            }else{
                $responseCode = "400"; //error
                $error = "SKU did not find in Database.";
            }
        }

        if($notOutofstock){
            if(count($qty)>0){
                $quantity = min($qty); // min quantity ah eaduthu
                if($quantity<0){
                    $quantity = 0;
                }
            }
        }else if(!$notOutofstock){
            $quantity = 0;
        }

        return array("responseCode" => $responseCode,"quantity" => $quantity,"singleComboQty" => $singleComboQty, "error" => $error);
        
    }

    echo '<pre>'; 
    print_r(returnQty($comboSKU,$conn));
    echo '</pre>'; 