<?php
require_once('../includes/includes.php');
$result = curl_get("default.html");
$currentsong = curl_get("/addons/youtubePlayer/currentsong.txt");
?>
<script>
    $(window).scrollTop($("*:contains('"+ <?php echo($currentsong); ?> +"'):last").offset().top);
</script> 
<style>
    .playlistid {
        padding: 5px;
        float: left;
    }

    .playlistname {
        background-color: #212121;
        width: 550px;
        padding: 5px;
        float: left;
    }
</style>

<?php
if ($result[1] == 200) {
    echo $result[0];
} else {
    echo 'Failed to get songrequest playlist';
}
?>
