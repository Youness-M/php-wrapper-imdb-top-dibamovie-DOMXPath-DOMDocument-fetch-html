<div class="dibamovieindex">

    <div class="headerdibamovie">
        جدیدترین فیلم های 2018

    </div>
    <div class="dibamoviecontent">
        <?php
            foreach ($datadibamovie as $value):
        ?>

            <ul>
                <li id="title"><?php echo $value['title']?></li>
                <li id="dibamovieimg"><img src="public/image/dibamovie_img/<?php echo $value['newname_img']?>" alt=""></li>
                <li id="dibamovieimgsource"><a href="<?php echo $value['src']?>"> source of image</a></li>
                <li id="description">خلاصه داستان:<br /><?php echo $value['description']?></li>
            </ul>


        <?php   endforeach;  ?>
    </div>


</div>






