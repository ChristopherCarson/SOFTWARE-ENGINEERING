
<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    <script type="text/javascript">
        function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'inc/money.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
    }
</script>
        <?php
        include 'inc/functions.php';
        ?>
    </head>
    <body>
        
        <div id="main">
        <?php
            play();
        ?>
        <form>
            <input type="submit" value="Spin"/>
        </form>
        </div>

    </body>
</html>