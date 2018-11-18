<?php

include ('model/Mdibamovie.php');


$Mdibamovie=new dibamovieClass();

//getting_data_from_imdb
set_time_limit(0);
//$site ='http://mydiba.one/';
$site='http://mydiba.xyz/';
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
$articles = $xpath->query('//div[@class="movies"]/article[@class="movie"]/div[@id="plot_posts"]');


$links = array();
$con=0;
foreach($articles as $container) {

    $description = trim(preg_replace("/[\r\n]+/", " ", $container->nodeValue));

    $links[] = [
        'description' => $description
    ];
}




$doc = new DOMDocument();
@$doc->loadHTML($html);

$xpath = new DOMXpath($doc);
$articles = $xpath->query('//div[@class="movies"]/article[@class="movie"]/a');


$linksimg = [];
$i=0;

foreach($articles as $container) {

    $title= $container->getAttribute("title");

    $arr = $container->getElementsByTagName("img");

    foreach($arr as $item) {

        $i=$i+1;
        $f='public/image/dibamovie_img/';
        $src =  $item->getAttribute("src");
        $d = file_get_contents($src);
        $n=$i.'_'.time().'.jpg';
        file_put_contents($f . DIRECTORY_SEPARATOR . $n, $d);

        $linksimg[] = [
            'title'=>$title,
            'src' => $src,
            'newname_img'=>$n
        ];
    }


}

//
$j=sizeof($links);
$z=0;
$c=array();
for($i=0;$i<=$j-1;$i++){


    $description=$links[$z]['description'];
    $src=$linksimg[$z]['src'];
    $title=$linksimg[$z]['title'];
    $newname_img=$linksimg[$z]['newname_img'];
    $c[]=['title'=>$title,'src'=>$src,'newname_img'=>$newname_img,'description'=>$description];
    $z=$z+1;

}
foreach ($c as $row){

    $title=str_replace(array('"','+','\'','%','!','?'),'',$row['title']);
    $src=$row['src'];
    $newname_img=$row['newname_img'];
    $description=$row['description'];

    $sqlinsert="insert into dibamovie_tbl (title,src,newname_img,description) values ('$title','$src','$newname_img','$description')";
    $dataimdb=$Mdibamovie->query($sqlinsert);

}

//showing_imdb_data_to_user
$sqlselect="select * from dibamovie_tbl";
$datadibamovie=$Mdibamovie->selectdibamovie($sqlselect);



include ('view/dibamovie_index/index.php');