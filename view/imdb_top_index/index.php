<div class="imdbindex">

    <div class="headerimdb">

        IMDb Charts_Top Rated Movies
    </div>

    <table  border="1" cellpadding="5" cellspacing="0" class="contentimdb">

        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Src of Image</th>
        </tr>

        <?php
        $conter=0;
        foreach ($dataimdb as $value):
            $conter=$conter+1;
            ?>

            <tr>
                <td><img src="public/image/imdb_img/<?php echo $value['newname_img']?>" alt=""> </td>
                <td> <?php echo $conter.'. '.$value['title']?></td>
                <td><a href="<?php echo $value['src']?>"> source of image</a></td>

            </tr>

        <?php   endforeach;  ?>
    </table>

</div>






