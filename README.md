Pop PHP Tutorial Application
============================

OVERVIEW
--------

This is a basic tutorial application for the Pop PHP Framework to demonstrate how to
wire up some simple routes for a web-facing application and a CLI-based application.

INSTALL
-------

Create a new project with it:

```console
$ composer create-project popphp/popphp-tutorial project-folder
```

Or clone the repository and install it:

```console
$ composer install
```

Once installed, the web access point is at `public/index.php` and the main
CLI access point is at `script/pop`

#### Permissions

You must change the permissions of the `database` and `script` folders and
their contents to writable in order for the application to fully work.

BASIC USAGE
-----------

### Web

Start the web server by running:

```bash
$ ./kettle serve
```

And then access the web application at these address:

    http://localhost:8000/

You should see the main home page with comment form at the bottom. You can submit
a comment and see it added to the list of comments on the page.

### Console

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

* The tutorial application uses the `pop-db` component to store the comments in a small SQLite database.
* The tutorial application uses the `pop-form` component to create, render and validate the comment form.
* The web application has a view folder, `app/view`, that holds the view scripts for web page display.
* The web application is utilizing the `pop-http` component to leverage the HTTP request and
response objects within the controller object.
* The CLI application is utilizing the `pop-console` component to leverage it for parsing
the CLI requests and returning the appropriate responses to the CLI.
