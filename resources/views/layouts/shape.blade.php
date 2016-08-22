<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
    </head>
    <body>
        <style>
            #octagon {
                /*padding: 20px;*/
                width: 100px; 
                height: 100px; 
                background: blue;
                position:relative;
            }
            #octagon:before {
                height: 0;
                width: 40px;
                content:"";
                position: absolute; 
                border-bottom: 30px solid blue;
                border-left: 30px solid white; 
                border-right: 30px solid white; 
            }
            #octagon:after {
                height: 0;
                width: 40px;
                content:"";
                position: absolute; 
                border-top: 30px solid blue; 
                border-left: 30px solid white;  
                border-right: 30px solid white; 
                margin: 70px 0 0 0;
            }
        </style>
        <div id="octagon"></div>
    </body>
</html>
