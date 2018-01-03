# Ubiweb Domain

This is a bare bones ubiweb site. It requires [ubiweb-core](https://github.com/ubiweb-media/ubiweb-core) to function. Use this to set up a new Ubiweb domain.

## Dev Setup
- Make a directory structure such as:

```
.
+ ubiweb
+-- ubiweb-core
+-- domains
|	+-- domain.com
```
- [Install ubiweb-core](https://github.com/ubiweb-media/ubiweb-core).
- Clone domain framework: `git clone https://github.com/ubiweb-media/ubiweb-domain.git domain.com`
- Adjust `CORE_PATH` path in `.env` to the location of `ubiweb-core/bootstrap.php`

**OR** 

For a more streamlined approach: 
- Install [Laravel Valet](https://laravel.com/docs/5.5/valet) and park your domains directory.
- Use `.test` as the TLD (default `.dev` is used by Chrome), by running `valet domain test`
- Then under `/usr/local/etc/nginx/fastcgi_params` append the entries: `fastcgi_param CORE_PATH  "/path/to/core";` so we won't need a `.env` file in each domain.

That's it! Of course, you're going to want to configure this more to have a presentable website.

## Setup

- First [choose a base template](https://github.com/ubiweb-media/template-starter).
- Require it in your project with `composer require ubiweb/{templateName}`
- Update your `config.yml` to specific the `Template`
- Create your stylesheet:

### Styles
- By default, the main stylesheet will point to `domain.com/assets/main.css`, so your styles must be compiled here. Edit your stylesheet under `content/styles/main.scss` to import your template, like so:
``` scss
@import "_variables.scss"; // optional customization
@import "../../vendor/templateName/styles/main.scss";

// Your custom styles.
```
- Run `sass content/styles/main.scss:assets/main.css` or `sass watch content/styles/main.scss:assets/main.css` to watch for changes.

## Content
All of the site's content and configuration resides in `./content`.
- `config.yml` contains the installation configuration. There are some special names for things like the template, otherwise you can define your own arbitrary global variables here.
- `pages.yml` contains the site's pages and is where you define the route URIs. If it doesn't exist here, the request will throw a 404. You can define more complicated POST, or DELETE routes by including an `./app/routes.php`.
- `translations.yml` is where you can supply translations for things like routes and overriding template variables. The main content is simply translated via its content directory `eg) ./content/fr/about.html`.
- `en/*` page content must always reside in its language folder. Specifying the default language in the config will remove the language from the URI. These pages are blade templates and can execute PHP.

## Pages
Pages use the [blade template](https://laravel.com/docs/5.4/blade) language. This is useful because it gives us a lot of convenience, but can also execute plain PHP.

Every page should contain at a bare minimum a declared layout, and some main content:
``` blade
@extends "layout/main"

@section('content')
<p>Hello World</p>
@endsection
```

You can extend some parts of the layout easily by providing some special sections:
``` blade
@extends "layout/main"

@section('title', 'Page Title')

@section('head')
<!-- Maybe some SEO tags -->
<meta property=”og:type” content=”website” />
@endsection

@section('styles')
<!-- and some extra styles  -->
<link rel="stylesheet" href="/assets/styles/custom.css" />
@endsection

@section('scripts')
<!-- and some extra scripts  -->
<script>
alert("Holy cow, it works!")
</script>
@endsection

@section('content')
<p>Hello World</p>
@endsection
```

Perhaps your template gives you different layouts, change them like so and take advantage of their extra sections
``` blade
@extends "layout/interior-sidebar"

@section('sidebar')
<p>This layout has a sidebar.</p>
<aside class="widget">
  <h1>Let's put a widget here</h1>
</aside>
@endsection

@section('content')
<p>Hello World</p>
@endsection
```

## Extending Functionality

Sometimes you may want to do more. What we've outlined so far is the basics for a working site, but you can also extend it to do alot more.

### Extending Layouts
You can override your templates layouts by copying `vendor/templateName/layout.html` or any other template file and putting it in a `./content/layouts` directory. This directory overrides any templates or partials with the same name.

### Creating an APP
You can optionally create a directory called `./app` that can be used to build ontop of the current framework and build your own custom application. There are some functions and files already available for your convenience. For example, maybe you want to have a route we can post to and log someone in. Try the following

- Create a POST route in `./app/routes.php`, like so `$app->post('login', 'AuthController@login')`
- Create a corresponding controller in `./app/controller/AuthController.php` in order to receive your request.
- Do something like:
``` PHP
<?php

class AuthController extends Controller {
  public function login()
  {
    setCookie('user', 'A user's authorization cookie');
  }
}
```
