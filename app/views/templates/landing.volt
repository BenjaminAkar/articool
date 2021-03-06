<!DOCTYPE html>
<html>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125829619-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-125829619-1');
        </script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{% block title %}{% endblock %}</title>

        <link rel="apple-touch-icon" sizes="76x76" href="{{ url('img/favicon/apple-touch-icon.png?v=OmyYv82BBp') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/favicon/favicon-32x32.png?v=OmyYv82BBp') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon/favicon-16x16.png?v=OmyYv82BBp') }}">
        <link rel="manifest" href="{{ url('img/favicon/manifest.json?v=OmyYv82BBp') }}">
        <link rel="mask-icon" href="{{ url('img/favicon/safari-pinned-tab.svg?v=OmyYv82BBp') }}" color="#5bbad5">
        <link rel="shortcut icon" href="{{ url('img/favicon/favicon.ico?v=OmyYv82BBp') }}">
        <meta name="theme-color" content="#ffffff">

        <meta name="twitter:image" content="https://articool.benjaminakar.com/img/logo/facebook-logo.png" />
	    <meta property="og:image" content="https://articool.benjaminakar.com/img/logo/facebook-logo.png" />

        <!-- Output CSS from controllerbase -->
        {{ assets.outputCss() }}

        {% block meta %}{% endblock %}
    </head>

    <body>
        <!-- Content for website / body -->
        {% block content %}
        {% endblock %}

        <!-- Cooikie warning -->
        {{ partial('templates/partials/cookies') }}

        <!-- Include Javascript files neccessary for landing to work -->
        {{ javascript_include("//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js") }}
        {{ javascript_include("js/libraries/smoothscroll.js") }}
    </body>
</html>
