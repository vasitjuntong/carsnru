<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Yii::app()->name . ' - ' . Yii::app()->controller->nameController; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!--Bootstrap core CSS--> 
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

        <!--Font Awesome--> 
        <link href="/css/font-awesome.min.css" rel="stylesheet" media="all">

        <!--Endless--> 
        <link href="/css/endless.min.css" rel="stylesheet" media="all">
        <style>
            body{
                font-family: "THSarabunNew";
            }
            .left-padding{
                padding-left: 20px;
            }
            .left-padding-1{
                padding-left: 5px;
            }
            .padding-sub{
                padding-left: 50px;
            }
            .padding-sub-1{
                padding-left: 70px;
            }
            .padding-sub-2{
                padding-left: 90px;
            }
            label.title{
                font-weight: bold;
            }

            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: left;
              }
              .col-sm-12 {
                width: 100%;
              }
              .col-sm-11 {
                width: 91.66666666666666%;
              }
              .col-sm-10 {
                width: 83.33333333333334%;
              }
              .col-sm-9 {
                width: 75%;
              }
              .col-sm-8 {
                width: 66.66666666666666%;
              }
              .col-sm-7 {
                width: 58.333333333333336%;
              }
              .col-sm-6 {
                width: 50%;
              }
              .col-sm-5 {
                width: 41.66666666666667%;
              }
              .col-sm-4 {
                width: 33.33333333333333%;
              }
              .col-sm-3 {
                width: 25%;
              }
              .col-sm-2 {
                width: 16.666666666666664%;
              }
              .col-sm-1 {
                width: 8.333333333333332%;
              }

              
              .col-sm-offset-12 {
                margin-left: 100%;
              }
              .col-sm-offset-11 {
                margin-left: 91.66666666666666%;
              }
              .col-sm-offset-10 {
                margin-left: 83.33333333333334%;
              }
              .col-sm-offset-9 {
                margin-left: 75%;
              }
              .col-sm-offset-8 {
                margin-left: 66.66666666666666%;
              }
              .col-sm-offset-7 {
                margin-left: 58.333333333333336%;
              }
              .col-sm-offset-6 {
                margin-left: 50%;
              }
              .col-sm-offset-5 {
                margin-left: 41.66666666666667%;
              }
              .col-sm-offset-4 {
                margin-left: 33.33333333333333%;
              }
              .col-sm-offset-3 {
                margin-left: 25%;
              }
              .col-sm-offset-2 {
                margin-left: 16.666666666666664%;
              }
              .col-sm-offset-1 {
                margin-left: 8.333333333333332%;
              }
              .col-sm-offset-0 {
                margin-left: 0;
              }
        </style>
    </head>
    <body class="">
        <div id="wrapper" class="container">
            <div class="row">
                <?php echo $content; ?>
            </div>
        </div>
    </body>
</html>
