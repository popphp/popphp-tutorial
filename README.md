Pop PHP Skeleton Application
============================

OVERVIEW
--------

This is a basic skeleton application for the Pop PHP Framework to demonstrate how to
wire up some simple routes for a web-facing application and a CLI-based application.

INSTALL
-------

Create a new proiect with it:

```console
$ composer create-project popphp/popphp-skeleton project-folder
```

Or clone the repository and install it:

```console
$ composer install
```

Once installed, the web access point is at `public/index.php` and the main
CLI access point is at `script/pop`

#### PERMISSIONS

You must change the permissions of the `app/data` and `script` folders and
their contents to writable in order for the application to fully work.

BASIC USAGE
-----------

### Web

Running the built-in PHP web server with `php -S localhost:8000 -t public`,
try accessing web application:

    http://localhost:8000/

You should see the main home page with comment form at the bottom. You can submit
a comment and see it be added to the list of comments on the page.

### CLI

Setting the `script/pop` script to be executable, you can test the CLI
application like this:

```console
$ ./script/pop help
$ ./script/pop show
$ ./script/pop delete
```

The first command shows the help screen; the second command shows any comments that have
been posted; the third command allows you to select a post to delete.

NOTES
-----

* The web application has a view folder, `app/view`, that holds the view scripts for web page display.
* The web application is utilizing the `pop-http` component to leverage the HTTP request and
response objects within the controller object.
* The CLI application is utilizing the `pop-console` component to leverage it for parsing
the CLI requests and returning the appropriate responses to the CLI.
