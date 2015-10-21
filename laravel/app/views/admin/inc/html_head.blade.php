<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ Config::get('site.name') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        {{ HTML::style('http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic') }}
        {{ HTML::style('assets/css/styles.css') }}
        {{ HTML::script('assets/js/modernizr.js') }}

        {{ HTML::script('assets/js/tinymce/tinymce.min.js') }}

        <script>
            tinymce.init({
                selector: "textarea.wysiwyg",
                body_class: "editor",
                theme: "modern",
                removed_menuitems: 'newdocument',
                plugins: [
                     "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality template paste textcolor"
               ],
               content_css: "/assets/css/styles.css",
               toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link preview ",

            });
        </script>



    </head>

    <body>