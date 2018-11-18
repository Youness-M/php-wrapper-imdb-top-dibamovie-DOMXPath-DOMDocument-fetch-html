<?php

include ('model/Mimdb.php');
$Mimdb=new imdbClass();

//getting_data_from_imdb

set_time_limit(0);
$site = 'https://www.imdb.com/chart/top';

$ch = curl_init($site);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($ch);
//    echo "<pre>";
//    var_dump(curl_getinfo($ch)) . '<br/>';
//    echo curl_errno($ch) . '<br/>';
//    echo curl_error($ch) . '<br/>';
curl_close($ch);


$doc = new DOMDocument();
@$doc->loadHTML($html);

$xpath = new DOMXpath($doc);
$articles = $xpath->query('//tbody[@class="lister-list"]/tr/td[@class="titleColumn"]');


$links = array();
foreach($articles as $container) {
    $arr = $container->getElementsByTagName("a");
    foreach($arr as $item) {

        $href =  $item->getAttribute("href");
        $title = trim(preg_replace("/[\r\n]+/", " ", $item->nodeValue));
//            echo $con.' is:  '.$text.'<br />';
        $links[] = [
            'title' => $title
        ];

    }
}


$doc = new DOMDocument();
@$doc->loadHTML($html);

$xpath = new DOMXpath($doc);
$articles = $xpath->query('//tbody[@class="lister-list"]/tr/td[@class="posterColumn"]/a');

$linksimg = [];
$i=0;
foreach($articles as $container) {
    $arr = $container->getElementsByTagName("img");
    foreach($arr as $item) {

        $f='public/image/imdb_img/';
        $src =  $item->getAttribute("src");
        $d = file_get_contents($src);
        $i=$i+1;
        $n=$i.'_'.time().'.jpg';

        file_put_contents($f . DIRECTORY_SEPARATOR . $n, $d);

        $linksimg[] = [
            'src' => $src,
            'newname_img'=>$n
        ];


    }
}
$j=sizeof($links);
$z=0;
$c=array();
for($i=0;$i<=$j-1;$i++){


    $title=$links[$z]['title'];
    $src=$linksimg[$z]['src'];
    $newname_img=$linksimg[$z]['newname_img'];
    $c[]=['title'=>$title,'src'=>$src,'newname_img'=>$newname_img];
    $z=$z+1;
//    echo $z.'is: '.$title.'<br />';

}

foreach ($c as $row){
    $title=str_replace(array('"','+','\'','%','!','?'),'',$row['title']);
    $src=$row['src'];
    $newname_img=$row['newname_img'];


    $sqlinsert="insert into imdb_tbl (title,src,newname_img) values ('$title','$src','$newname_img')";
    $dataimdb=$Mimdb->query($sqlinsert);

}


//showing_imdb_data_to_user
$sqlselect="select * from imdb_tbl";
$dataimdb=$Mimdb->selectimdb($sqlselect);


include ('view/imdb_top_index/index.php');
