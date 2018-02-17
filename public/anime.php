<?php include '/config.php'?>
<?php include 'header.php' ?>
        <div class="container pt-4">
            <ul class="pagination pagination-sm justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Tous</a></li>
                <li class="page-item"><a class="page-link" href="#">A</a></li>
                <li class="page-item"><a class="page-link" href="#">B</a></li>
                <li class="page-item"><a class="page-link" href="#">C</a></li>
                <li class="page-item"><a class="page-link" href="#">D</a></li>
                <li class="page-item"><a class="page-link" href="#">E</a></li>
                <li class="page-item"><a class="page-link" href="#">F</a></li>
                <li class="page-item"><a class="page-link" href="#">G</a></li>
                <li class="page-item"><a class="page-link" href="#">H</a></li>
                <li class="page-item"><a class="page-link" href="#">I</a></li>
                <li class="page-item"><a class="page-link" href="#">J</a></li>
                <li class="page-item"><a class="page-link" href="#">K</a></li>
                <li class="page-item"><a class="page-link" href="#">L</a></li>
                <li class="page-item"><a class="page-link" href="#">M</a></li>
                <li class="page-item"><a class="page-link" href="#">N</a></li>
                <li class="page-item"><a class="page-link" href="#">O</a></li>
                <li class="page-item"><a class="page-link" href="#">P</a></li>
                <li class="page-item"><a class="page-link" href="#">Q</a></li>
                <li class="page-item"><a class="page-link" href="#">R</a></li>
                <li class="page-item"><a class="page-link" href="#">S</a></li>
                <li class="page-item"><a class="page-link" href="#">T</a></li>
                <li class="page-item"><a class="page-link" href="#">U</a></li>
                <li class="page-item"><a class="page-link" href="#">V</a></li>
                <li class="page-item"><a class="page-link" href="#">W</a></li>
                <li class="page-item"><a class="page-link" href="#">X</a></li>
                <li class="page-item"><a class="page-link" href="#">Y</a></li>
                <li class="page-item"><a class="page-link" href="#">Z</a></li>
            </ul>
        </div>


    <div class="row">
        <div class="col-xs-3 col-md-3"></div>
            <div class="input-group col-xs-6 col-md-6">
                <input type="text" class="form-control input-lg" placeholder="Rechercher" />
                <div class="input-append span12">
                    <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                </div>
            </div>
    </div>

    <div class="text-center"><button type="button" class="btn btn-primary" onclick="javascript:afficher_cacher('categories_anime');">Voir plus</button></div>


    <div class="col-xs-3 col-md-3"></div>
    <div id="categories_anime" class="texte" name="categories_anime"><tr>
            <table border="0" cellpadding="1" cellspacing="0" class="space_table" width="100%"><tr><td>
                <input id="genre-1" name="genre[]" type="checkbox" value="1"><label for="genre-1" id="label_for_genre-1">Action</label>
            </td><td>
                <input id="genre-2" name="genre[]" type="checkbox" value="2"><label for="genre-2" id="label_for_genre-2">Adventure</label>
            </td><td>
                <input id="genre-3" name="genre[]" type="checkbox" value="3"><label for="genre-3" id="label_for_genre-3">Cars</label>
            </td><td>
                <input id="genre-4" name="genre[]" type="checkbox" value="4"><label for="genre-4" id="label_for_genre-4">Comedy</label>
            </td><td>
                <input id="genre-5" name="genre[]" type="checkbox" value="5"><label for="genre-5" id="label_for_genre-5">Dementia</label>
            </td><td>
                <input id="genre-6" name="genre[]" type="checkbox" value="6"><label for="genre-6" id="label_for_genre-6">Demons</label>
            </td><td>
                <input id="genre-7" name="genre[]" type="checkbox" value="7"><label for="genre-7" id="label_for_genre-7">Mystery</label>
            </td><td>
                <input id="genre-8" name="genre[]" type="checkbox" value="8"><label for="genre-8" id="label_for_genre-8">Drama</label>
            </td></tr><tr><td>
                <input id="genre-9" name="genre[]" type="checkbox" value="9"><label for="genre-9" id="label_for_genre-9">Ecchi</label>
            </td><td>
                <input id="genre-10" name="genre[]" type="checkbox" value="10"><label for="genre-10" id="label_for_genre-10">Fantasy</label>
            </td><td>
                <input id="genre-11" name="genre[]" type="checkbox" value="11"><label for="genre-11" id="label_for_genre-11">Game</label>
            </td><td>
                <input id="genre-12" name="genre[]" type="checkbox" value="12"><label for="genre-12" id="label_for_genre-12">Hentai</label>
            </td><td>
                <input id="genre-13" name="genre[]" type="checkbox" value="13"><label for="genre-13" id="label_for_genre-13">Historical</label>
            </td><td>
                <input id="genre-14" name="genre[]" type="checkbox" value="14"><label for="genre-14" id="label_for_genre-14">Horror</label>
            </td><td>
                <input id="genre-15" name="genre[]" type="checkbox" value="15"><label for="genre-15" id="label_for_genre-15">Kids</label>
            </td><td>
                <input id="genre-16" name="genre[]" type="checkbox" value="16"><label for="genre-16" id="label_for_genre-16">Magic</label>
            </td></tr><tr><td>
                <input id="genre-17" name="genre[]" type="checkbox" value="17"><label for="genre-17" id="label_for_genre-17">Martial Arts</label>
            </td><td>
                <input id="genre-18" name="genre[]" type="checkbox" value="18"><label for="genre-18" id="label_for_genre-18">Mecha</label>
            </td><td>
                <input id="genre-19" name="genre[]" type="checkbox" value="19"><label for="genre-19" id="label_for_genre-19">Music</label>
            </td><td>
                <input id="genre-20" name="genre[]" type="checkbox" value="20"><label for="genre-20" id="label_for_genre-20">Parody</label>
            </td><td>
                <input id="genre-21" name="genre[]" type="checkbox" value="21"><label for="genre-21" id="label_for_genre-21">Samurai</label>
            </td><td>
                <input id="genre-22" name="genre[]" type="checkbox" value="22"><label for="genre-22" id="label_for_genre-22">Romance</label>
            </td><td>
                <input id="genre-23" name="genre[]" type="checkbox" value="23"><label for="genre-23" id="label_for_genre-23">School</label>
            </td><td>
                <input id="genre-24" name="genre[]" type="checkbox" value="24"><label for="genre-24" id="label_for_genre-24">Sci-Fi</label>
            </td></tr><tr><td>
                <input id="genre-25" name="genre[]" type="checkbox" value="25"><label for="genre-25" id="label_for_genre-25">Shoujo</label>
            </td><td>
                <input id="genre-26" name="genre[]" type="checkbox" value="26"><label for="genre-26" id="label_for_genre-26">Shoujo Ai</label>
            </td><td>
                <input id="genre-27" name="genre[]" type="checkbox" value="27"><label for="genre-27" id="label_for_genre-27">Shounen</label>
            </td><td>
                <input id="genre-28" name="genre[]" type="checkbox" value="28"><label for="genre-28" id="label_for_genre-28">Shounen Ai</label>
            </td><td>
                <input id="genre-29" name="genre[]" type="checkbox" value="29"><label for="genre-29" id="label_for_genre-29">Space</label>
            </td><td>
                <input id="genre-30" name="genre[]" type="checkbox" value="30"><label for="genre-30" id="label_for_genre-30">Sports</label>
            </td><td>
                <input id="genre-31" name="genre[]" type="checkbox" value="31"><label for="genre-31" id="label_for_genre-31">Super Power</label>
            </td><td>
                <input id="genre-32" name="genre[]" type="checkbox" value="32"><label for="genre-32" id="label_for_genre-32">Vampire</label>
            </td></tr><tr><td>
                <input id="genre-33" name="genre[]" type="checkbox" value="33"><label for="genre-33" id="label_for_genre-33">Yaoi</label>
            </td><td>
                <input id="genre-34" name="genre[]" type="checkbox" value="34"><label for="genre-34" id="label_for_genre-34">Yuri</label>
            </td><td>
                <input id="genre-35" name="genre[]" type="checkbox" value="35"><label for="genre-35" id="label_for_genre-35">Harem</label>
            </td><td>
                <input id="genre-36" name="genre[]" type="checkbox" value="36"><label for="genre-36" id="label_for_genre-36">Slice of Life</label>
            </td><td>
                <input id="genre-37" name="genre[]" type="checkbox" value="37"><label for="genre-37" id="label_for_genre-37">Supernatural</label>
            </td><td>
                <input id="genre-38" name="genre[]" type="checkbox" value="38"><label for="genre-38" id="label_for_genre-38">Military</label>
            </td><td>
                <input id="genre-39" name="genre[]" type="checkbox" value="39"><label for="genre-39" id="label_for_genre-39">Police</label>
            </td><td>
                <input id="genre-40" name="genre[]" type="checkbox" value="40"><label for="genre-40" id="label_for_genre-40">Psychological</label>
            </td></tr><tr><td>
                <input id="genre-41" name="genre[]" type="checkbox" value="41"><label for="genre-41" id="label_for_genre-41">Thriller</label>
            </td><td>
                <input id="genre-42" name="genre[]" type="checkbox" value="42"><label for="genre-42" id="label_for_genre-42">Seinen</label>
            </td><td>
                <input id="genre-43" name="genre[]" type="checkbox" value="43"><label for="genre-43" id="label_for_genre-43">Josei</label>
            </td></tr></table>
        <div class="row"></div>
        <div class="text-center"><button type="button" class="btn btn-success">Rechercher</button></div>
        <script type="text/javascript">
            afficher_cacher('categories_anime');
        </script>
    </div>

    <!-- Left-aligned media object -->
    <div class="col-xs-2 col-md-2"></div>
    <div class= "col-xs-8 col-md-8 media">
        <div class="media-left">
            <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/1/1a/Logo_One_piece.svg/250px-Logo_One_piece.svg.png" class="media-object" style="width:200px">
        </div>
        <div class="media-body">
            <h4 class="media-heading">One Piece</h4>
            <p>Ceci est du texte</p>
            <br/>
            <p><a href="#" class="btn btn-primary" role="button">Voir »</a></p>
        </div>
    </div>

    <div class="col-xs-2 col-md-2"></div>
    <div class= "col-xs-8 col-md-8 media">
        <div class="media-left">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c9/Naruto_logo.svg" class="media-object" style="width:200px">
        </div>
        <div class="media-body">
            <h4 class="media-heading">Naruto</h4>
            <p>Ceci est du texte</p>
            <br/>
            <p><a href="#" class="btn btn-primary" role="button">Voir »</a></p>
        </div>
    </div>
    <div class="col-xs-2 col-md-2"></div>
    <div class= "col-xs-8 col-md-8 media">
        <div class="media-left">
            <img src="https://upload.wikimedia.org/wikipedia/fr/0/0e/My_Hero_Academia_logo_fr.png" class="media-object" style="width:200px">
        </div>
        <div class="media-body">
            <h4 class="media-heading">My Hero Academia</h4>
            <p>Ceci est du texte</p>
            <br/>
            <p><a href="#" class="btn btn-primary" role="button">Voir »</a></p>
        </div>
    </div>
<?php include 'footer.php' ?>