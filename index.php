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
                <form name="search" id="search" action="app/Search.php">
                    <label for="query">Search</label>
                    <input type="text" name="query" id="query" placeholder="Search" />
                    <label for="searchEngine"></label>
                    <select name="searchEngine" id="searchEngine">
                        <option value="google">Google</option>
                        <option value="exalead">ExaLead</option>
                        <option value="yahoo">Yahoo</option>
                        <option value="bing">Bing</option>
                    </select>
                    <label for="Go" style="display: none;">Go</label>
                    <input type="submit" name="Go" id="Go" value="Go" />
                </form>
            </header>
            <img src="img/loader.gif" name="loader" id="loader" alt="Loading..." />
            <section id="content"></section>
        </div>
    </body>
</html>