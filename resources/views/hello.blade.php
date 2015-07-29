<!DOCTYPE HTML>
<html>
    <head>
        <title></title>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <meta name="description" content=""/>
            <meta name="keywords" content="" />
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery.scrolly.min.js"></script>
            <script src="js/jquery.poptrox.min.js"></script>
            <script src="js/skel.min.js"></script>
            <script src="js/init.js"></script>
            <noscript>
                <link rel="stylesheet" href="css/skel.css" />
                <link rel="stylesheet" href="css/style.css"/>
            </noscript>

    </head>
    <body>
        <section id="header">
            <header>
                <h1>Ive</h1>
                <p>IA</p>
            </header>
            <footer>
                <a href="#banner" class="button style scrolly scrolly-centered">Read</a>
            </footer>
        </section>
        <section id="banner">
            <header>
                <h2>About me</h2>
            </header>
            <p>Lawrence Chan</p>
            <footer>
                <a href="#first" class="button style2 scrolly">More</a>
            </footer>
        </section>
        <article id="first" class="container box style1 right">
            <a href="aaaa" class="image fit"><img src="" alt=""/></a>
            <div class="inner">
                <header>
                    <h2>Lawrence Chan</h2>
                </header>
                <p>Open id:[{{ isset($_GET['aa'])?$_GET['aa']:"12321321214" }}]
                <br>
                <br>
                </p>
            </div>
        </article>
    <section id="footer">
        <div class=copyright">
            <ul class="menu">
                <ul class="icons"></ul>
                <li>&copy;Untited. All rights reserved.</li>
            </ul>
        </div>
    </section>
    </body>

</html>