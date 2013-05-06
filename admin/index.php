<!DOCTYPE html>
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="utf-8">
        <title>Engranaje 2</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" media="all" href="css/style.css">
        <link rel="stylesheet" media="all" href="css/gridster.css">
        <script src="js/jquery.js"></script>
        <script src="js/gridster.js"></script>
    </head>

    <body>
        <header>
            <ul id="top">
                <li>Admin</li>
                <li>Blog</li>
                <li>Option</li>
                <li>Option</li>
                <li class="user">Miguel Rojas</li>
            </ul>
        </header>

        <section class="gridster">
            <ul>
                <li data-row="1" data-col="1" data-sizex="1" data-sizey="1">
                    <h1>Visits</h1>

                    <p class="big">19,000</p>

                    <div class="controls">
                        <a href="#">link 1</a>
                        <a href="#">link 2</a>
                        <a href="#">link 3</a>
                    </div>
                </li>
                <li data-row="2" data-col="1" data-sizex="1" data-sizey="1">
                    <h1>Likes</h1>

                    <p class="big">19,000</p>

                    <div class="controls">
                        <a href="#">link 1</a>
                        <a href="#">link 2</a>
                        <a href="#">link 3</a>
                    </div>
                </li>
                <li data-row="3" data-col="1" data-sizex="1" data-sizey="1"></li>
         
                <li data-row="1" data-col="2" data-sizex="2" data-sizey="1"></li>
         
                <li data-row="1" data-col="4" data-sizex="1" data-sizey="1"></li>
                <li data-row="2" data-col="4" data-sizex="2" data-sizey="1">
                    <h1>Last posts</h1>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor est...</td>
                            <td>4 days ago</td>
                            <td>
                                <a href="#">Edit</a>
                                <a href="#">Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor est...</td>
                            <td>4 days ago</td>
                            <td>
                                <a href="#">Edit</a>
                                <a href="#">Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor est...</td>
                            <td>4 days ago</td>
                            <td>
                                <a href="#">Edit</a>
                                <a href="#">Remove</a>
                            </td>
                        </tr>
                    </table>
                    <div class="controls">
                        <a href="#">View all</a>
                    </div>
                </li>
                <li data-row="3" data-col="4" data-sizex="1" data-sizey="1"></li>
            </ul>
        </section>

        <script> 
            var w = $('.gridster').width() / 4;
            w -=  (w / 30) * 2;

            var grid = $(".gridster ul").gridster({
                widget_margins: [w / 30, w / 30],
                widget_base_dimensions: [w, w]
            });
        </script>
    </body>
</html>