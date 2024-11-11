@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid ">
        <div class="row justify-content-between">
            <div class="col-2">
                <h1>Dashboard</h1>
            </div>
            <div class="col-1">
                <h5>Home</h5>
            </div>
        </div>
    </div>
@stop



@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="text-center display-4">Search</h2>
                    <div class="col-md-8 offset-md-2 mb-3">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg"
                                    placeholder="Type your keywords here" id="searchQuery">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default" id="searchQuerySubmitBtn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row" id="searchResultDiv">
                        <div class="col-md-12 mt-5">
                            <center>
                                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <h3 class="profile-username text-center"></h3>

                            <p class="text-muted text-center">

                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Pending</b> <a class="float-right">heelow</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Accepted</b> <a class="float-right">hellow</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Rejected</b> <a class="float-right">hellow</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
        <script>

                $(function() {

            loadInternships();
        });



            function loadInternships() {
                console.log("Hi, I'm using the Laravel-AdminLTE package!");

                $.get('{{ env('APP_URL') }}/api/internship', function(data) {


                        if (data.length == 0) {
                            let dom =
                                '<div class="col-md-12 mt-5">' +
                                '<center>' +
                                'Oops, we couldn\'t find any data!' +
                                '</center>' +
                                '</div>'
                            $('#searchResultDiv').html(dom);
                        } else {
                            $('#searchResultDiv').html('');
                            for (var i = 0; i < data.length; i++) {
                                let dom =
                                    '<div class="col-md-12">' +
                                    '<div class="card">' +
                                    '<div class="card-header">' +
                                    '<h5 class="card-title m-0">' + data[i].department_name + '</h5>' +
                                    '</div>' +
                                    '<div class="card-body">' +
                                    '<h6 class="card-title">' + data[i].title + '</h6>' +

                                    '<p class="card-text msgTextTimp">' + data[i].description + '</p>' +
                                    '<a  style="width:15%;" href="{{ env('APP_URL') }}/internship/' + data[i]
                                    .id + '" class="btn btn-info float-right">View</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';

                                $('#searchResultDiv').append(dom);
                            }
                        }
                        // $(".msgTextTimp").each(function() {
                        //     $(this).text($(this).text().substr(0, 150));
                        //     $(this).append('...');
                        // });





                    }


                );



            }


            document.getElementById("searchQuerySubmitBtn").addEventListener("click", function(event) {
            event.preventDefault();
            var ras = $('#searchQuery').val();
            
            if (ras != undefined && ras != null && ras != '') {
                let dom =
                    '<div class="col-md-12 mt-5">' +
                    '<center>' +
                    '<i class="fas fa-3x fa-sync-alt fa-spin"></i>' +
                    '</center>' +
                    '</div>'
                $('#searchResultDiv').html(dom);
                searchInternship(ras);
            } else {
                refreshIntervalId = setInterval(function() {
                    $('#searchQuery').toggleClass('is-invalid');
                }, 300);

                setTimeout(function() {
                    clearInterval(refreshIntervalId)
                    $('#searchQuery').removeClass('is-invalid');
                }, 1500);
            }
        });


        function searchInternship(ras) {
            $.get('{{ env('APP_URL') }}/api/internship/' + ras, function(data) {
                if (data.length == 0) {
                    let dom =
                        '<div class="col-md-12 mt-5">' +
                        '<center>' +
                        'Oops, we couldn\'t find any data!<a style="cursor:pointer;" class="fas fa-sync-alt ml-2" onClick="searchInternship(\'\')"></a>' +
                        '</center>' +
                        '</div>'
                    $('#searchResultDiv').html(dom);
                } else {
                    $('#searchResultDiv').html('');
                    for (var i = 0; i < data.length; i++) {
                        let dom =
                            '<div class="col-md-12">' +
                            '<div class="card">' +
                            '<div class="card-header">' +
                            '<h5 class="card-title m-0">' + data[i].department_name + '</h5>' +
                            '</div>' +
                            '<div class="card-body">' +
                            '<h6 class="card-title">' + data[i].title + '</h6>' +

                            '<p class="card-text">' + data[i].description + '</p>' +
                            '<a style="width:15%;"  href="{{ env('APP_URL') }}/user/internship/view/' + data[i]
                            .id + '" class="btn btn-info float-right">View</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>';

                        $('#searchResultDiv').append(dom);
                    }
                    $(".msgTextTimp").each(function() {
                        $(this).text($(this).text().substr(0, 150));
                        $(this).append('...');
                    });
                }
            });
        }
        </script>
    @stop
