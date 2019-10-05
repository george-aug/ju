<?php

?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <title>Slim Examples</title>

    <link rel="stylesheet" href="public/css/slim.min.css">

    <style>

        .slim {
            border-radius: 0.5rem;
        }
        /* center main column */
        html {
            font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        main {
            max-width:400px;
            margin:0 auto;
        }
        .slim-btn {
            border-radius: 0;
        }
        .slim-image-editor-btn {
            display:none;
        }

        .disableFirst{
            display:none;
        }



    </style>

</head>
<body>

<main>

    <h1>Examples</h1>

    <h2>Async</h2>



    <h3>Upload new image</h3>

    <p>Default async upload.</p>

    <div class="slim" data-service="slim/async.php"
         data-did-init="slimInitialised"
         data-button-edit-class-name="disableFirst"
    >
        <input type="file"/>
    </div>

    <script>
        function slimInitialised(data) {
            console.log(data);
        }

    </script>


    <h3>Upload and edit existing image</h3>

    <p>With manual remove button.</p>

    <button id="remove-button" type="button">Remove image</button>

    <div class="slim" data-service="slim/async.php"
         data-button-edit-class-name="disableFirst"
         id="my-cropper">
        <input type="file"/>
        <img src="public/images/dune.jpg" alt="">
    </div>

    <script>

        // load this code when the document has loaded
        document.addEventListener('DOMContentLoaded', function() {

            // get a reference to the remove button
            var button = document.querySelector('#remove-button');

            // listen to clicks on the remove button
            button.addEventListener('click', function() {

                // get the element with id 'my-cropper'
                var element = document.querySelector('#my-cropper');

                // find the cropper attached to the element
                var cropper = Slim.find(element);

                // call the remove method on the cropper
                cropper.remove();

            });

        });

    </script>




    <h3>Edit existing image only</h3>

    <p>With altered label values.</p>

    <p>Note that the "edit", "download", "remove", "upload" and "rotate" labels are invisible as Slim uses icons for these buttons. It will show the button title when hovering over the button.</p>

    <p>Read more on labels in <a href="http://slimimagecropper.com/#button-labels">the documentation</a></p>

    <div class="slim"
         data-label="Droppit like it's hot!"
         data-button-confirm-label="Yuup"
         data-button-confirm-title="Yuup"
         data-button-cancel-label="Nooope"
         data-button-cancel-title="Nooope"
         data-button-edit-label="Change!"
         data-button-edit-title="Change!"
         data-button-remove-label="Be gone"
         data-button-remove-title="Be gone"
         data-button-rotate-label="Turn"
         data-button-rotate-title="Turn"
         data-service="slim/async.php">
        <img src="public/images/dune.jpg" alt="">
    </div>




    <h3>Upload and remove images</h3>

    <p>With remove image from server script.</p>

    <div class="slim" data-service="slim/async.php"
         data-did-remove="handleImageRemoval">
        <input type="file"/>
        <img src="uploaded/pics/dune.jpg" alt="">
    </div>

    <script>

        /*function handleImageRemoval(data) {
            console.log(data);
            // can't continue without server file name
            if (!data.server) { return; }

            // setup request and send
            var name = data.server.file;
            var url = './slim/async-remove.php';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url + (url.indexOf('?')===-1?'?':':') + 'name=' + name, true);
            xhr.send();

        }*/
    </script>





    <h2>Sync</h2>

    <p>Accepts only jpegs and gifs.</p>

    <form action="slim/sync.php" method="post" enctype="multipart/form-data">

        <div class="slim">
            <input type="file" accept="image/jpeg, image/gif"/>
        </div>

        <button type="submit">Upload</button>

    </form>




</main>

<script src="public/js/slim.kickstart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script>
    function handleImageRemoval(data){
        console.log(data.input.file.name);

        $(document).ready(function () {
            $.ajax({
                url:"remove-img.php",
                method:'post',
                data:{
                    //pid:$(this).data('id')
                },
                dataType:"text",
                success:function (data, status) {
                    console.log(data);
                    console.log(status);

                }
            });
        });
    }
</script>
</body>
</html>