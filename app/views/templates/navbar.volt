{% if user is defined %}
<nav id="nav" class="nav">
    <div class="nav__left">
        <a href="{{ url('explore') }}">
            <h1 class="nav__left--text">articool</h1>
        </a>

        <!-- Search field -->
        <form>
            <input id="searchAuthorsField" class="nav__left--input" type="text" placeholder="Search for Author...">
        </form>

    </div>
    <div class="nav__right">
        <div id="nav__user" class="nav__user" style="background-image: url({{ url('img/avatars/') }}{{ user.avatar }})"></div>
    </div>
</nav>

<div id="user__nav" class="user__nav">

    <a href="{{ url('author/') }}{{ user.username }}">
        <div class="user__nav--info">
            <div class="user__nav--image" style="background-image: url({{ url('img/avatars/') }}{{ user.avatar }})"></div>
            <p class="user__nav--name">{{ user.first_name }} {{ user.last_name }}</p>
        </div>
    </a>

    <ul>
        <li class="user__nav--entry"><a href="{{ url('explore') }}">Explore</a></li>
        <li class="user__nav--entry"><a href="{{ url('settings/profile') }}">Settings</a></li>
        <li class="user__nav--entry">
            <form id="authLogout" method="POST" action="{{ url('api/v1/auth/logout') }}">
                <input type="hidden" id="session_identifier" value="{{ tokens.session_identifier }}" />
                <input type="hidden" id="session_token" value="{{ tokens.session_token }}" />
                <input id="logout_submit" type="submit" value="Log out">
            </form>
        </li>
    </ul>
</div>
{{ javascript_include('js/auth/authLogout.js') }}

<!-- Search list -->
<div id="nav__search" class="nav__search">

    <div id="nav__search--authors">

    </div>

    <!--
    <a href="#">
        <div class="nav__search--entry">
            <div class="nav__search--image" style="background-image: url(https://articool.benjaminakar.com/img/avatars/77190dffd281e91c62662944fe74d19d6920a653.jpg)"></div>
            <div class="nav__search--name">Benjamin Akar</div>
        </div>
    </a>
    -->

    <p id="nav__search--results" class="nav__search--result">0</p>
</div>

{% else %}
<nav id="nav" class="nav">
    <div class="nav__left">
        <a href="{{ url('/') }}">
            <h1 class="nav__left--text">articool</h1>
        </a>

        <!-- Search field -->
        <form>
            <input id="searchAuthorsField" class="nav__left--input" type="text" placeholder="Search for Author...">
        </form>

    </div>
    <div class="nav__right">
        <div id="nav__user" class="nav__user" style="background-image: url({{ url('img/avatars/') }}default.jpg)"></div>
    </div>
</nav>

<div id="user__nav" class="user__nav">

    <a href="{{ url('login') }}">
        <div class="user__nav--info">
            <div class="user__nav--image" style="background-image: url({{ url('img/avatars/') }}default.jpg)"></div>
            <p class="user__nav--name">Guest</p>
        </div>
    </a>

    <ul>
        <li class="user__nav--entry"><a href="{{ url('explore') }}">Explore</a></li>
        <li class="user__nav--entry"><a href="{{ url('login') }}">Login</a></li>
        <li class="user__nav--entry"><a href="{{ url('register') }}">Register</a></li>
    </ul>
</div>

<!-- Search list -->
<div id="nav__search" class="nav__search">

    <div id="nav__search--authors">

    </div>

    <!--
    <a href="#">
        <div class="nav__search--entry">
            <div class="nav__search--image" style="background-image: url(https://articool.benjaminakar.com/img/avatars/77190dffd281e91c62662944fe74d19d6920a653.jpg)"></div>
            <div class="nav__search--name">Benjamin Akar</div>
        </div>
    </a>
    -->

    <p id="nav__search--results" class="nav__search--result">0</p>
</div>

{% endif %}
