<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Conet - Simple PHP Web development structural template with optional database connection function">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Olaiwola Akeem A.K.A Brainwave, he is the founder of M3 Technology">
        <title><?php echo APPNAME; ?> - <?php echo $error; ?></title>
        <style>
    .body{
        background: #e1edf0;
        height: 100%;
        padding: 0px;
        padding-left: -10px;
    }

    .head-section{
        float: left;
        margin: 0px;
        
        padding-left: 20px;
        background: purple;
        width: 98.5%;
    }

    .left-side{
        font-size: 20px;
        font-weight: 700;
        color: white;
        line-height: 10px;
    }

    .left-side p{
        padding-left: 30px;
    }

    .container {
        height: 95%;
        margin-top: 0px;
        align-items: center;
        justify-content: center;
    }
        
        .error{
            display: inline-block;
            text-align: center;
            background:  white;
            margin-top: 5px;
            width: 97.5%;
            height: 90%;
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
            color: grey;

        }

        .error p a{
            color:  #089eca;
            text-decoration: none;
        }

        .error p hr{
            color: blue;
        }
    </style>
    </head>