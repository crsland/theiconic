<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Search Page</title>
        <script src="js/vendor/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="js/app.js" type="text/javascript"></script>
    </head>
    <body>
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
    </body>
</html>
