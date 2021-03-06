{% extends "templates/landing.volt" %}

{% block title %} Articool - writing & blogging platform! {% endblock %}

{% block meta %}
<meta name="description" content="{{ appDescription }}">
<meta name="keywords" content="{{ appName }}, article, Benjamin Akar, Programming, Web, Design, articoolo, free, article platform, writing platform, free writing platform, writing, platform, blogging platform, blog, articool blog">
<meta name="author" content="{{ appName }}">

<!-- Twitter Tags -->
<meta name="twitter:title" content="Articool - writing & blogging platform!" />
<meta name="twitter:site" content="{{ appUrl }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="{{ appDescription }}" />

<!-- Facebook Tags -->
<meta property="og:url" content="{{ appUrl }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Articool - writing & blogging platform!" />
<meta property="og:description" content="{{ appDescription }}" />
<meta property="fb:app_id"	content="181778325703258" />
{% endblock %}

{% block content %}
<!-- Firework Script from https://codepen.io/yshlin/pen/ylDEk
<div class="pyro">
	<div class="before"></div>
	<div class="after"></div>
</div>-->

<div class="frontpage">
	<!-- Welcome Section  -->
	<section class="welcome">
		<div class="welcome__background--overlay">
			<div class="welcome__background"></div>
		</div>

		{% if user is not defined %}
		<nav class="welcome__navbar">
			<ul class="welcome__navbar--links">
				<li class="welcome__navbar--entry"><a href="{{ url('login') }}">Login</a></li>
				<li class="welcome__navbar--entry"><a href="{{ url('explore') }}">Explore</a></li>
				<li class="welcome__navbar--entry"><a href="{{ url('register') }}">Register</a></li>
			</ul>
		</nav>
		{% else %}
		<nav class="welcome__navbar">
			<ul class="welcome__navbar--links">
				<li class="welcome__navbar--entry"><a href="{{ url('explore') }}">Explore</a></li>
				<li class="welcome__navbar--entry"><a href="{{ url('author/') }}{{ user.username }}">Profile</a></li>
			</ul>
		</nav>
		{% endif %}

		<div class="welcome__body">
			<div class="welcome__text">
				<div class="welcome__text--big">articool</div>
				<div class="welcome__text--small">/* A platform where you are given the opportunity to express your feelings, thoughts, and interests – free of charge. You can write about politics, social issues, literature, or anything on your mind. */</div>
			</div>
		</div>

		<div class="welcome__footer">
			<div class="welcome__text nomax">
				<div class="welcome__text--smaller">Learn More</div>
			</div>
			<a class="welcome__footer--arrow" href="#information"></a>
		</div>
	</section>

	<!-- Announcement Section
	<section class="announcement">

		<!-- Firework Script from https://codepen.io/yshlin/pen/ylDEk
		<div class="pyro">
			<div class="before"></div>
			<div class="after"></div>
		</div>

		<div class="announcement__content">

			<div class="announcement__text">
				<div class="announcement__text--big">
					We wish you a Happy New Year!
				</div>
			</div>
			
		</div>
	</section> -->

	<!-- Explore Section -->
	<section class="explore">
		<div class="explore__content">
	
			<div class="explore__text">
				<div class="explore__text--big">
					Take a look at what our authors are writing about!
				</div>
			</div>
	
			<a class="explore__button" href="{{ url('explore') }}">Explore Articools</a>
		</div>
	</section>

	<!-- Statistics Section -->
	<section class="stats">
		<div class="stats__boxes">

			<div class="stats__boxes--entry">
				<div class="stats__boxes--number">{{ registeredUsers }}</div>
				<div class="stats__boxes--description">Authors</div>
				<div class="stats__boxes--hr"></div>
			</div>

			<div class="stats__boxes--entry">
				<div class="stats__boxes--number">{{ allArticoolViews }}</div>
				<div class="stats__boxes--description">People Reached</div>
				<div class="stats__boxes--hr"></div>
			</div>

			<div class="stats__boxes--entry">
				<div class="stats__boxes--number">{{ writtenArticools }}</div>
				<div class="stats__boxes--description">Articools Written</div>
				<div class="stats__boxes--hr"></div>
			</div>

		</div>
	</section>

	<!-- Information Section -->
	<section id="information" class="information">

		<div class="information__left">
			<div class="information__left--items">
				<img class="information__left--logo" src="{{ url('img/logo/logo-small.png') }}" alt="Articool Small Logo">
				<div class="information__left--text">Articool is an article platform designed to improve communication between authors and readers. It’s simplistic design makes sure the reader stays motivated and focused throughout the whole text.
					<br><br>
					You can be assured there will be no interruptions while reading articles, this including no advertisements.
				</div>
			</div>
		</div>

		<div class="information__right">
			<img class="information__right--image" src="{{ url('img/articool_image.jpg') }}" alt="Articool Image">
		</div>
	</section>

	<!-- Register Section -->
	<section class="join">
		<div class="join__content">

			<div class="join__text">
				<div class="join__text--big">
					Give us a try, and maybe you'll find the inner author in you!
				</div>
			</div>

			<a class="join__button" href="{{ url('register') }}">Become an Author</a>

			<div class="join__text">
				<div class="join__text--small">
					<a href="{{ url('login') }}">Already an author?</a>
				</div>
			</div>

		</div>
	</section>

	<!-- Footer -->
	<section class="footer">
		<div class="footer__content">

			<div class="footer__text">
				<div class="footer__text--title">articool</div>
			</div>

			<div class="footer__flexy">
				<div class="footer__list">
					<div class="footer__text">
						<div class="footer__text--small">Explore</div>
					</div>
					<ul class="footer__list--items">
						<li class="footer__list--entry"><a target="_blank" href="{{ url('faq') }}">FAQ</a></li>
					</ul>
				</div>

				<div class="footer__list">
					<div class="footer__text">
						<div class="footer__text--small">Legal</div>
					</div>
					<ul class="footer__list--items">
						<li class="footer__list--entry"><a target="_blank" href="{{ url('terms') }}">Terms of Service</a></li>
						<li class="footer__list--entry"><a target="_blank" href="{{ url('privacy') }}">Privacy Policy</a></li>
					</ul>
				</div>

				<div class="footer__list">
					<div class="footer__text">
						<div class="footer__text--small">Follow</div>
					</div>
					<ul class="footer__list--items">
						<li class="footer__list--entry"><a target="_blank" href="//twitter.com/articool_pf">Twitter</a></li>
						<li class="footer__list--entry"><a target="_blank" href="//facebook.com/articoolplatform">Facebook</a></li>
					</ul>
				</div>
			</div>

			<div class="footer__credits">
				Made with <span class="footer__credits--red">♥</span> by <a href="//benjaminakar.com">Benjamin Akar</a>
				<div class="footer__credits--hr"></div>
			</div>

		</div>
	</section>
</div>
{% endblock %}