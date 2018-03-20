<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 19/03/2018
 * Time: 20:20
 */
define("NOMDEPAGE", "Article");
include_once $_SERVER['DOCUMENT_ROOT'] . '/configuration.php';
require ENTETE;

?>

    <main>
        <!--Main layout-->
        <div class="container">
            <div class="row">
                <!--Main column-->
                <div class="col-md-8">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            ?>
                            <!--Post-->
                            <div class="post-wrapper">
                                <!--Post data-->
                                <a href="<?php echo get_permalink() ?>"><h1 class="h1-responsive"><?php the_title(); ?></h1></a>
                                <h5>Ecris par <span><?php the_author(); ?></span>, <?php echo get_the_date(); ?></h5>
                                <br>
                                <br>

                                <p><?php the_content(); ?></p>

                            </div>
                            <!--/.Post-->
                            <hr>
                            <?php
                        } // end while
                    } // end if
                    ?>
                </div>
            </div>
        </div>
        <!--/.Main layout-->
    </main>

<?php include PIEDDEPAGE;?>