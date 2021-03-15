<?php

/**
 * @author GREMONT Quentin
 * @author JOUGLET Grégory
 */

?>

<?php 
    function echo_card($img1, $img2, $img3, $titre, $soustitre, $prix, $desc, $lien, $footer) { 
        ?><article class='card'>
            <div class='card__header'>
                <img src='<?php echo "img/$img1";?>' class='card__img'>
                <img src='<?php echo "img/$img2";?>' class='card__img'>
                <img src='<?php echo "img/$img3";?>' class='card__img'>
            </div>
            <div class='card__content'>
                <h3 class='card__text'><?php echo $titre;?></h3>
                <h5 class='card__text'><?php echo $soustitre;?></h5>
                <h3 class='card__text card__text--blue'><?php echo "$prix €";?></h3>
                <p class='card__text'><?php echo nl2br($desc);?></p>
            </div>
            <a href='<?php echo $lien;?>' class='card__footer'><?php echo $footer;?></a>
        </article><?php 
    }


 


    function echo_card_message($titre, $soustitre, $text, $lien, $footer) { 
        ?><article class='card'>
            <div class='card__content'>
                <h3 class='card__text'><?php echo $titre;?></h3>
                <h5 class='card__text'><?php echo $soustitre;?></h5>
                <p class='card__text'><?php echo nl2br($text);?></p>
            </div>
            <a href='<?php echo $lien;?>' class='card__footer'><?php echo $footer;?></a>
        </article><?php
    }

?>