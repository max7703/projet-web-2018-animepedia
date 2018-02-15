<?php
/**
 * Created by PhpStorm.
 * User: max77
 * Date: 14/02/2018
 * Time: 21:23
 */

require_once 'VueHeader.php';

$header = new VueHeader();
$header->printHeader("Mon profil");

echo '
<link rel="stylesheet" href="../css/profil_.css">
<div class="container">

<h2>Profile of <strong class="text-default">max7703</strong></h2>

<div class="row"">
	<div class="col-sm-2">
		<img class="avatar" src="https://www.gravatar.com/avatar/b95af81b980e4148dea02dc6be3c2dce?s=120&amp;d=https%3A%2F%2Fnyaa.si%2Fstatic%2Fimg%2Favatar%2Fdefault.png&amp;r=pg">
	</div>
	<div class="col-sm-10">
		<dl class="row">
			<dt class="col-sm-2">User ID:</dt><dd class="col-sm-10">16478</dd>
			<dt class="col-sm-2">User Class:</dt><dd class="col-sm-10">User</dd>
			<dt class="col-sm-2">User Created on:</dt><dd class="col-sm-10">2017-07-07 15:51:25</dd>
		</dl>
	</div>
</div>

<ul class="nav nav-tabs" id="profileTabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#password-change" id="password-change-tab" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Password</a>
    </li>
    <li role="presentation">
        <a href="#email-change" id="email-change-tab" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Email</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade" role="tabpanel" id="password-change" aria-labelledby="password-change-tab">
        <form method="POST">
            <div class="row">
                <div class="form-group col-md-4">
                    	<div class="form-group">
		<label class="control-label" for="current_password">Current Password</label>
		<input class="form-control" id="current_password" name="current_password" placeholder="Current password" title="" type="password" value="">
	</div>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    	<div class="form-group">
		<label class="control-label" for="new_password">New Password</label>
		<input class="form-control" id="new_password" name="new_password" placeholder="New password" title="" type="password" value="">
	</div>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    	<div class="form-group">
		<label class="control-label" for="password_confirm">Repeat New Password</label>
		<input class="form-control" id="password_confirm" name="password_confirm" placeholder="New password (confirm)" title="" type="password" value="">
	</div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="email-change" aria-labelledby="email-change-tab">
        <form method="POST">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="control-label" for="current_email">Current Email</label>
                    <div>max7703@live.fr</div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    	<div class="form-group">
		<label class="control-label" for="email">New Email Address</label>
		<input class="form-control" id="email" name="email" placeholder="New email address" title="" type="email" value="">
	</div>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    	<div class="form-group">
		<label class="control-label" for="current_password">Current Password</label>
		<input class="form-control" id="current_password" name="current_password" placeholder="Current password" title="" type="password" value="">
	</div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

';

include 'VueFooter.php';