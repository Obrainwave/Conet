<html>
    <head>
        <title><?php echo APPNAME; ?> - 404 Error Found</title>
    </head>
    <style>
    .body{
        background:    #e1edf0;
        text-align: center;
        height: 100%;
    }

    .container {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
        
        .error{
            display: inline-block;
            text-align: center;
            background:  #f7ade8;
            border-radius: 5px;
            width: 55%;
            height: 50%;
            padding-left: 15px;
            padding-right: 15px;
            
        }

        .error h2{
            padding-top: 50px;
            font-size: 35px;
            font-weight: 900;
        }

        .error p{
            font-size: 20px;
            padding-left: 30px;
            padding-right: 30px;

        }

        .error p a{
            color:  #089eca;
            text-decoration: none;
        }
    </style>
    <body class="body">
        <div class="container">
            <div class="error">
                <h2>Error 404 Found</h2>
                <p>
                    The requested URL <b><q><?php echo $link; ?></q></b> was not found. Please check if the URL is correct or go to the 
                    <b><a href="<?php echo BASEPATH; ?>">homepage</a></b>.
                </p>
            </div>

        </div>
    </body>

</html>