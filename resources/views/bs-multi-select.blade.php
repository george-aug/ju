<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/bootstrap-multiselect.css">
    <style type="text/css">
        .custom-select{
            background-color: #dee2e6;
        }
    </style>
    <title>Hello, world!</title>
</head>
<body>
{{--<div class="container">
    <h4>Bootstrap Custom Select for Bootstrap 4</h4>
    http://davidstutz.de/bootstrap-multiselect/
    <div class="row">
        <div class="col-4">
            <h4>Basic multi-select</h4>
            <select class="custom-select" id="basic" multiple="multiple">
                <option value="cheese">Cheese</option>
                <option value="tomatoes">Tomatoes</option>
                <option value="mozarella">Mozzarella</option>
                <option value="mushrooms">Mushrooms</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="onions">Onions</option>
            </select>
        </div>
        <div class="col-4">
            <h4>Hide checkboxes</h4>
            <select class="custom-select" id="no_checkboxes" multiple="multiple">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-4">
            <h4>Single select</h4>
            <select class="custom-select" id="single_select">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-4">
            <h4>Filter / search</h4>
            <select class="custom-select" id="filtering" multiple="multiple">
                <option value="cheese">Cheese</option>
                <option value="tomatoes">Tomatoes</option>
                <option value="mozzarella">Mozzarella</option>
                <option value="mushrooms">Mushrooms</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="onions">Onions</option>
                <option value="bacon">Bacon</option>
                <option value="potatoes">Potatoes</option>
            </select>
        </div>
        <div class="col-4">
            <h4>Data source</h4>
            <select class="custom-select" id="data_source" multiple="multiple">
            </select>
        </div>
        <div class="col-4">
            <h4>Data (single select)</h4>
            <select class="custom-select" id="data_source_single">
            </select>
        </div>
    </div>
</div>--}}
<div class="container">


    <h3 class="mt-5">Hello World</h3>
    <div class="mt-5 border border-secondary">
        <!-- Build your select: -->
        <select id="example-getting-started" multiple="multiple">
            <option value="cheese">Cheese</option>
            <option value="tomatoes">Tomatoes</option>
            <option value="mozarella">Mozzarella</option>
            <option value="mushrooms">Mushrooms</option>
            <option value="pepperoni">Pepperoni</option>
            <option value="onions">Onions</option>
        </select>
    </div>
</div>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js" integrity="sha256-qoj3D1oB1r2TAdqKTYuWObh01rIVC1Gmw9vWp1+q5xw=" crossorigin="anonymous"></script>
{{--<script>
    $('#basic').multiselect({
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
        }
    });

    $('#no_checkboxes').multiselect({
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
        },
        nonSelectedText: 'Choose...',
        selectedClass: 'bg-light',
        onInitialized: function(select, container) {
            // hide checkboxes
            container.find('input').addClass('d-none');
        }
    });

    $('#single_select').multiselect({
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
        },
        buttonClass: 'btn btn-outline-primary',
        selectedClass: 'bg-light',
        onInitialized: function(select, container) {
            // hide radio
            container.find('input[type=radio]').addClass('d-none');
        }
    });

    $('#filtering').multiselect({
        nonSelectedText: 'Select a food...',
        enableFiltering: true,
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>',
            filter: '<li class="multiselect-item filter"><div class="input-group m-0 mb-1"><input class="form-control multiselect-search" type="text"></div></li>',
            filterClearBtn: '<div class="input-group-append"><button class="btn btn btn-outline-secondary multiselect-clear-filter" type="button"><i class="fa fa-close"></i></button></div>'
        },
        selectedClass: 'bg-light',
        onInitialized: function(select, container) {
            // hide checkboxes
            container.find('input[type=checkbox]').addClass('d-none');
        }
    });


    // data source example with filter by label
    $('#data_source').multiselect({
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
        },
        nonSelectedText: 'Select a name...',
        enableFiltering: true,
        filterBehavior: 'text',
        enableCaseInsensitiveFiltering: true,
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>',
            filter: '<li class="multiselect-item filter"><div class="input-group m-0 mb-1"><input class="form-control multiselect-search" type="text"></div></li>',
            filterClearBtn: '<div class="input-group-append"><button class="btn btn btn-outline-secondary multiselect-clear-filter" type="button"><i class="fa fa-close"></i></button></div>'
        },
    });
    var options = [
        {label: 'Tony', title: 'Tony', value: '1', selected: true},
        {label: 'Tammy', title: 'Tammy', value: '2'},
        {label: 'Bob', title: 'Bob', value: '3'},
        {label: 'Betty', title: 'Betty', value: '4'},
        {label: 'Jim', title: 'Jim', value: '5', selected: true},
        {label: 'James', title: 'James', value: '6'},
        {label: 'Jerry', title: 'Jerry', value: '7', disabled: true},
        {label: 'Amy', title: 'Amy', value: '8'},
        {label: 'Albert', title: 'Albert', value: '9'}
    ];
    $('#data_source').multiselect('dataprovider', options);

    // data source single pick with filter by value and text
    var options2 = [
        {label: 'Rex', value: '1'},
        {label: 'Ryan', value: '2'},
        {label: 'Duke', value: '3'},
        {label: 'Kimo', value: '4'},
        {label: 'Vince', value: '5'},
        {label: 'Puggy', value: '6'},
        {label: 'Boxer', value: '7'}
    ];

    $('#data_source_single').multiselect({
        onInitialized: function(select, container) {
            container.multiselect('dataprovider', options2);
            container.multiselect('setOptions', {
                nonSelectedText: 'Select a pooch...',
                enableFiltering: true,
                filterBehavior: 'both',
                enableCaseInsensitiveFiltering: true,
                templates: {
                    li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>',
                    filter: '<li class="multiselect-item filter"><div class="input-group m-0 mb-1"><input class="form-control multiselect-search" type="text"></div></li>',
                    filterClearBtn: '<div class="input-group-append"><button class="btn btn btn-outline-secondary multiselect-clear-filter" type="button"><i class="fa fa-close"></i></button></div>'
                },
                selectedClass: 'bg-light',
            });
            container.multiselect('rebuild');
            $('input[type=radio]').addClass('d-none');
        }
    });



</script>--}}

<script>

    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
</script>
</body>
</html>