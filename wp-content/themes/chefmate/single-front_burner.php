           <?php

            if ( in_category( 'menu-ideas' )) {

              include 'fb-menu-ideas.php';

} elseif ( in_category( 'business-tips' )) { 

           include 'fb-business-tips.php';

  } else {
        include 'fb-promo-ideas.php';
  }

  ?>