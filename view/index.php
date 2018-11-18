<div class="wrapper">

    <div class="title">
        <span>برای دریافت اطلاعات از سایت های زیر بر روی گزینه مورد نظر کلیک کنید</span>
    </div>

    <div class="dibamovie">
        <img src="public/image/dibamovie.jpg" alt="">

        <a id="imgdibamoviealert"  href="index.php?c=dibamovie" >دریافت اطلاعات فیلم از دیبا مووی</a>

    </div>

    <div class="imdb">
        <img src="public/image/imdb.jpg" alt="">

        <a id="imgimdbalert" href="index.php?c=imdb">دریافت اطلاعات 250 فیلم برتر از IMDB</a>

    </div>

    <div class="alert">

        this might take a few minutes.
        <br />
        its loading...
    </div>

</div>

<script>
    $("#imgimdbalert,#imgdibamoviealert").click(function () {

        $(".alert").css('display','block');



    })
</script>

