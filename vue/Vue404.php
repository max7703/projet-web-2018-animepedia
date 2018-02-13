<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 12/02/2018
 * Time: 21:58
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("404");

echo '

<link rel="stylesheet" href="../css/404_.css">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="error-actions">
                    <a href="index" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Back to Home </a><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>

';
include 'VueFooter.php';