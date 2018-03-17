<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">


    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/basic.css">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

</head>

<body>

<div class="dropzone"
      id="my-awesome-dropzone">

</div>







<script type="text/javascript">//<![CDATA[

    Dropzone.autoDiscover = false;

    // Dropzone class:
    var myDropzone = new Dropzone("#my-awesome-dropzone", {
        url: "{{ url('testUpload') }}",

        params : {
            '_token' : '{{ csrf_token() }}'
        }

    });



</script>





</body></html>