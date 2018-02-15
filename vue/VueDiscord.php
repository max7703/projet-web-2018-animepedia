<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 13/02/2018
 * Time: 15:52
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("Discord");

echo '
<div class="container">
    <div class="row pt-3">
        <iframe src="https://discordapp.com/widget?id=285839584892289024&theme=dark" width="1500" 
height="500" allowtransparency="true" frameborder="0"></iframe>
    </div>
</div> 
';

include 'VueFooter.php';