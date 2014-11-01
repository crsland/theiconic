<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Search Page</title>
        <link type="text/css" rel="stylesheet" href="css/styles.css" />
        <script src="js/vendor/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="js/app.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="main" role="main">
            <header>
                <h1>Search Page</h1>
                <form name="search" id="search">
                    <label for="query">Name</label>
                    <input type="text" name="query" id="query" />
                    <label for="searchEngine"></label>
                    <select name="searchEngine" id="searchEngine">
                        <option value="google">Google</option>
                        <option value="yahoo">Yahoo</option>
                        <option value="bing">Bing</option>
                    </select>
                    <input type="submit" name="send" id="send" value="Send >" />
                </form>                
            </header>
            <section id="content"></section>
        </div>
    </body>
</html>
<link href="css/styles.css" rel="stylesheet" type="text/css"/>