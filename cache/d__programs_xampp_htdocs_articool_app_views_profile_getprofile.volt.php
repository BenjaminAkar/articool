<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> <?= $profile->first_name ?> <?= $profile->last_name ?>'s profile  </title>
        
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->url->get('img/favicon/apple-touch-icon.png?v=OmyYv82BBp') ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->url->get('img/favicon/favicon-32x32.png?v=OmyYv82BBp') ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->url->get('img/favicon/favicon-16x16.png?v=OmyYv82BBp') ?>">
        <link rel="manifest" href="<?= $this->url->get('img/favicon/manifest.json?v=OmyYv82BBp') ?>">
        <link rel="mask-icon" href="<?= $this->url->get('img/favicon/safari-pinned-tab.svg?v=OmyYv82BBp') ?>" color="#5bbad5">
        <link rel="shortcut icon" href="<?= $this->url->get('img/favicon/favicon.ico?v=OmyYv82BBp') ?>">
        <meta name="theme-color" content="#ffffff">

        <meta name="twitter:image" content="https://articool.benjaminakar.com/img/logo/facebook-logo.png" />
	    <meta property="og:image" content="https://articool.benjaminakar.com/img/logo/facebook-logo.png" />

        <!-- Output CSS & JS from controllerbase -->
        <?= $this->assets->outputCss() ?>
        <?= $this->assets->outputJs() ?>

        
    </head>

    <body id="body" class="profile">
    
        <!-- Navbar button -->
        <div class="navbar__button">
            <button id="navbar__button">menu</button>
        </div>

        <!-- Navbar -->
        <?= $this->partial('templates/navbar') ?>

        <?= $this->tag->javascriptInclude('js/config.js') ?>
        <div class="container">
            <div class="row">
                <!-- Content for website / body -->
                

    <?php if ($profile) { ?>
    <div class="col-xs-12 col-md-12 col-lg-5">
    	<div class="profile__box">
        <div class="profile__box__avatar" style="background-image: url(<?= $this->url->get('img/avatars/') ?><?= $profile->avatar ?>)"></div>
    		<p class="profile__box__name"><?= $profile->first_name ?> <?= $profile->last_name ?></p>
            <p class="profile__box__description">«<?= $profile->description ?>»</p>

            <?php if ($profile->rank_id >= 2) { ?>
                <div class="rank <?php if ($profile->rank_id == 2) { ?>approved<?php } elseif ($profile->rank_id == 3) { ?>moderator<?php } elseif ($profile->rank_id == 4) { ?>administrator<?php } ?>"></div>
            <?php } ?>

    	</div>

        <?php if (isset($user->username)) { ?>
            <?php if ($profile->username == $user->username) { ?>

                <div id="article__modal" class="modal">
                    <div class="modal__content">
                        <span class="modal__content__close">&times;</span>

                        <?= $this->flash->output() ?>
                        <form id="postArticool" method="POST" action="<?= $this->url->get('api/v1/post/post-articool') ?>">

                            <h1 class="modal__form__title">New Articool</h1>
                            <div class="modal__form__divide"></div>
                            <h1 class="modal__form__title__small">Fill in your Articool title, and body. If you make any mistakes, don't worry, you can edit your Articool later on.</h1>

                            <div class="modal__form__input">
                                <input type="text" id="post_title" name="post_title" maxlength="255" autocomplete="off" required />
                                <label for="post_title">Articool Title</label>
                            </div>

                            <div style="font-family: 'Open Sans', sans-serif;" class="modal__form__input">
                                <div name="post_body" id="post_body"></div><br>
                            </div>

                            <h1 class="modal__form__title">Additional Information</h1>
                            <div class="modal__form__divide"></div>
                            <h1 class="modal__form__title__small">You can add contributors to your article by writing their name in the box below, keep in mind that they will need an Articool account. Leave blank if nobody else contributed to the Articool. By selecting the Articool language, and genre, your Articool will appear under the specified categories, and will do better engagement-wise.</h1>

                            <div class="modal__form__input">
                                <select multiple id="post_authors" name="post_authors[]" data-placeholder="Contributors" class="chosen-select">

                                <?php foreach ($getRegisteredUsers as $author) { ?>
                                    <?php if ($user->username != $author->username) { ?>

                                        <option value="<?= $author->user_id ?>"><?= $author->first_name ?> <?= $author->last_name ?> (<?= $author->username ?>)</option>

                                    <?php } ?>
                                <?php } ?>

                                </select>
                            </div>

                            <div class="modal__form__input two">
                                <select id="post_language" name="post_language" required>
                                    <option value="" disabled selected>Language</option><option value="Afrikanns">Afrikanns</option>
                                    <option value="Albanian">Albanian</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Armenian">Armenian</option>
                                    <option value="Basque">Basque</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Bulgarian">Bulgarian</option>
                                    <option value="Catalan">Catalan</option>
                                    <option value="Cambodian">Cambodian</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Croation">Croation</option>
                                    <option value="Czech">Czech</option>
                                    <option value="Danish">Danish</option>
                                    <option value="Dutch">Dutch</option>
                                    <option value="English" selected>English</option>
                                    <option value="Estonian">Estonian</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finnish">Finnish</option>
                                    <option value="French">French</option>
                                    <option value="Georgian">Georgian</option>
                                    <option value="German">German</option>
                                    <option value="Greek">Greek</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Hebrew">Hebrew</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Hungarian">Hungarian</option>
                                    <option value="Icelandic">Icelandic</option>
                                    <option value="Indonesian">Indonesian</option>
                                    <option value="Irish">Irish</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Javanese">Javanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Latin">Latin</option>
                                    <option value="Latvian">Latvian</option>
                                    <option value="Lithuanian">Lithuanian</option>
                                    <option value="Macedonian">Macedonian</option>
                                    <option value="Malay">Malay</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Maltese">Maltese</option>
                                    <option value="Maori">Maori</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Mongolian">Mongolian</option>
                                    <option value="Nepali">Nepali</option>
                                    <option value="Norwegian">Norwegian</option>
                                    <option value="Persian">Persian</option>
                                    <option value="Polish">Polish</option>
                                    <option value="Portuguese">Portuguese</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Romanian">Romanian</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Samoan">Samoan</option>
                                    <option value="Serbian">Serbian</option>
                                    <option value="Slovak">Slovak</option>
                                    <option value="Slovenian">Slovenian</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Swahili">Swahili</option>
                                    <option value="Swedish">Swedish</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Tatar">Tatar</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Tibetan">Tibetan</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Ukranian">Ukranian</option>
                                    <option value="Urdu">Urdu</option>
                                    <option value="Uzbek">Uzbek</option>
                                    <option value="Vietnamese">Vietnamese</option>
                                    <option value="Welsh">Welsh</option>
                                    <option value="Xhosa">Xhosa</option>
                                </select>

                                <select style="margin: 0;" id="post_genre" name="post_genre" required>
                                    <option value="" disabled selected>Genre</option>
                                    <optgroup label="Literature">
                                        <option value="Analysis">Analysis</option>
                                        <option value="Autobiography">Autobiography</option>
                                        <option value="Biography">Biography</option>
                                        <option value="Essay">Essay</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Non-Fiction">Non-Fiction</option>
                                        <option value="Poetry">Poetry</option>
                                        <option value="Short Story">Short Story</option>
                                    </optgroup>
                                </select>
                            </div>

                            <input type="hidden" id="session_identifier" value="<?= $tokens->session_identifier ?>" />
                            <input type="hidden" id="session_token" value="<?= $tokens->session_token ?>" />

                            <input type="hidden" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>" />

                            <div class="modal__form__input">
                                <input id="articool_submit" type="submit" name="submit" value="Publish Articool" />
                            </div>
                            
                            <div id="feedback_message"></div>

                        </form>

                    </div>
                </div>

            <?php } ?>
        <?php } ?>

        <?php if (isset($user->username)) { ?>
            <?php if ($profile->username == $user->username) { ?>

            	<button style="margin-top: 1rem;" id="new_article" class="button black">
            		<i style="margin-right: .5rem;" class="fa fa-pencil" aria-hidden="true"></i> New Articool
            	</button>

                <a href="<?= $this->url->get('settings/profile') ?>">
                    <button class="button white">
                        <i style="margin-right: .5rem;" class="fa fa-cog" aria-hidden="true"></i> Settings
                    </button>
                </a>

            <?php } ?>
        <?php } ?>

    </div>
    <!-- LEFT NAVBAR -->

    <!-- BODY -->
    <div class="col-xs-12 col col-md-12 col-lg-7">
        <div style="color: black;" class="profile__posts">

        <?php if ($this->length($getUserPosts) == 0) { ?>

            <div class="profile__posts__none">
                <i style="display: inline;" class="fa fa-exclamation" aria-hidden="true"></i>
                <h1><?= $profile->first_name ?> <?= $profile->last_name ?> has not posted any articools.</h1>
            </div>

        <?php } ?>

            <?php foreach ($getUserPosts as $post) { ?>
                <?php if ($post->post_active == 1) { ?>

                <div class="postbox">
                    <p class="postbox__title"><?= $post->post_title ?></p>
                    <p class="postbox__description">«<?= 
                strip_tags(
                    trim(
                        preg_replace("/<p>/", " ", substr($post->post_body, 0, 350))
                    )
                ) ?>...»</p>
                    <div class="postbox__readmore">
                        <a href="<?= $this->url->get('posts/') ?><?= $post->post_id ?>">
                            <i style="margin-right: .5rem;" class="fa fa-arrow-right" aria-hidden="true"></i> Read More
                        </a>
                    </div>
                </div>

                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <!-- BODY -->
    
	<?php } ?>

    <script type="text/javascript">
    
        ClassicEditor
            .create( document.querySelector( '#post_body' ), {
                toolbar: [ 'bold', 'italic', 'underline', 'strikethrough', 'code', 'blockQuote', '|', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ]
            } )
            .then( editor => {
                console.log( editor );
                post_body = editor;
                
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    <!-- Styling some of the CKEDITOR -->
    <style>
        .ck-editor__editable {
            min-height: 10rem;
        }

        .ck-editor__editable p {
            font-family: 'Open Sans', sans-serif;
            color: #222222;
            margin-top: 1rem;
            width: 100%;
            word-spacing: .05rem;
            line-height
            : 1.8rem;
        }
        .ck-editor__editable blockquote {
            border-left: 0.5rem solid #222222;
            font-style: italic;
            padding-left: 1rem;
            margin: 1rem 0 0 1rem;
        }
    </style>

	<script type="text/javascript">
	$(".chosen-select").chosen({
		no_results_text: "We can't find the author ",
		width: "100%"
	}); 
	</script>

    <script type="text/javascript">
        var article__modal = document.getElementById('article__modal');
        var button = document.getElementById('new_article');
        var span = document.getElementsByClassName('modal__content__close')[0];
        var body = document.getElementsByClassName('profile')[0];
        var body = document.getElementById('body');

        button.onclick = function() {
            article__modal.style.display = "block";
            body.style.overflow = "hidden";
        };

        span.onclick = function() {
            article__modal.style.display = "none";
            body.style.overflow = "auto";
        };

        window.onclick = function(event) {
            if(event.target == article__modal) {
                article__modal.style.display = "none";
                body.style.overflow = "auto";
            }
        };
    </script>

    <?= $this->tag->javascriptInclude('js/auth/postArticool.js') ?>

            </div>
        </div>

        <!-- Cooikie warning -->
        <?= $this->partial('templates/partials/cookies') ?>

        <!-- Include Javascript files neccessary for landing to work -->
        <?= $this->tag->javascriptInclude('js/partials/navbar.js') ?>
    </body>
</html>