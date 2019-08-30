<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" integrity="sha256-kEEuwzcrMTLlrazS39JQIwiHUCxx2vRJlZcJ0Tj6MNU=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha256-uKEg9s9/RiqVVOIWQ8vq0IIqdJTdnxDMok9XhiqnApU=" crossorigin="anonymous" />--}}


    <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/assets/app.css">
    <style>
        .container{
            margin: 20px;
        }

        /* autocomplete tagsinput*/
        .label-info {
            background-color: #5bc0de;
            display: inline-block;
            padding: 0.2em 0.6em 0.3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }
        .label-success {
            background-color: #28A745;
            display: inline-block;
            padding: 0.2em 0.6em 0.3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }
        .label-danger {
            background-color: #DC3545;
            display: inline-block;
            padding: 0.2em 0.6em 0.3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }
        .label-warning {
            background-color: #FFC107;
            display: inline-block;
            padding: 0.2em 0.6em 0.3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }
        .label-primary {
            background-color: #007BFF;
            display: inline-block;
            padding: 0.2em 0.6em 0.3em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }

    </style>
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>Tagsinput Autocomplete</label>
                <input type="text" id="tag1" class="form-control" />
            </div>
        </div>
        <div class="col-12">
            <p>ref from : <a href="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/">bootstrap-tagsinput</a></p>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js" integrity="sha256-01/49ElxlWe2RC+C+QOxBu1OzIUM5BV7/ONHZ8MR5Aw=" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha256-Ld9+920D/5mOtGgV8hjGd4hX5fRTl0i3kjA2IDwvrqc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha256-tQ3x4V2JW+L0ew/P3v2xzL46XDjEWUExFkCDY0Rflqc=" crossorigin="anonymous"></script>--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script>

    /*var data =
        '[{ "value": 1, "text": "Task 1", "continent": "Task" }, { "value": 2, "text": "Task 2", "continent": "Task" },' +
        ' { "value": 3, "text": "Task 3", "continent": "Task" }, { "value": 4, "text": "Task 4", "continent": "Task" },' +
        ' { "value": 5, "text": "Task 5", "continent": "Task" }, { "value": 6, "text": "Task 6", "continent": "Task" } ]';*/

   /* var data ='[{"value":1,"text":"Amsterdam","continent":"Europe"},{"value":4,"text":"Washington","continent":"America"},' +
        '{"value":7,"text":"Sydney","continent":"Australia"},{"value":10,"text":"Beijing","continent":"Asia"},' +
        '{"value":13,"text":"Cairo","continent":"Africa"},{"value":3,"text":"India","continent":"Asia"}]';*/

    var data ='{!! json_encode($cities) !!}';
    //get data pass to json
    var task = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace("text"),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: jQuery.parseJSON(data) //your can use json type
    });

    task.initialize();

    var elt = $("#tag1");
    elt.tagsinput({
        tagClass: function(item) {
            switch (item.continent) {
                case 'Europe'   : return 'label label-info';
                case 'America'  : return 'label label-danger';
                case 'Australia': return 'label label-success';
                case 'Africa'   : return 'label label-primary';
                case 'Asia'     : return 'label label-warning';
            }
        },
        itemValue: "value",
        itemText: "text",
        typeaheadjs: {
            name: "task",
            displayKey: "text",
            source: task.ttAdapter()
        }
    });

    //insert data to input in load page
    elt.tagsinput("add", {
        value: 3,
        text: "Patna",
        continent: "Europe"
    });

</script>
</body>
</html>