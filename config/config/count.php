<?php 
// COUNT THE AMOUNT OF VIEWS EACH ARTICLE RECEIVES \\
        $NewHits = $ActiveArticle['hits'] + 1;
        $result = mysqli_query($CwDb,"UPDATE articles SET hits='$NewHits' WHERE id='$ActiveArticle[id]' AND webid='$WebId'") 
        or die(mysql_error());
        $NewHits = $NewHits / 2;
        $ActiveArticle["hits"] = round($NewHits);
?>