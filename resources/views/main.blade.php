<html lang="en" class="gr__getbootstrap_com">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GitHub Repo Compare</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/offcanvas/offcanvas.css" rel="stylesheet">
</head>

<body class="bg-light" data-gr-c-s-loaded="true">

<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">GitHub Repo Comparer</a>
</nav>

<main role="main" class="container">

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-4">Compare 2 Repositories</h6>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('compare') }}">
            @csrf
            <div class="form-group">
                <label for="repo1">Repository 1 URL</label>
                <input type="text" class="form-control" name="repo1" id="repo1" placeholder="https://github.com/author/repo">
            </div>
            <div class="form-group">
                <label for="repo2">Repository 2 URL</label>
                <input type="text" class="form-control" name="repo2" id="repo2" placeholder="https://github.com/author/repo">
            </div>
            <button type="submit" class="btn btn-primary">Compare</button>
        </form>
    </div>

    @isset($repo1)
        <div class="row">
            <div class="col-lg-6">
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">{{ $repo1['full_name'] }}</h6>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Language</strong>
                                <strong>{{ $repo1['language'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Forks</strong>
                                <strong>{{ $repo1['forks'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Stars</strong>
                                <strong>{{ $repo1['stars'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Watchers</strong>
                                <strong>{{ $repo1['watchers'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Date of the latest release</strong>
                                <strong>{{ $repo1['pushed_at'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Number of open pull requests</strong>
                                <strong>{{ $repo1['open_pull_request'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Number of closed pull requests</strong>
                                <strong>{{ $repo1['closed_pull_request'] }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="my-3 p-3 bg-white rounded box-shadow">
                    <h6 class="border-bottom border-gray pb-2 mb-0">{{ $repo2['full_name'] }}</h6>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Language</strong>
                                <strong>{{ $repo2['language'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Forks</strong>
                                <strong>{{ $repo2['forks'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Stars</strong>
                                <strong>{{ $repo2['stars'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Watchers</strong>
                                <strong>{{ $repo2['watchers'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Date of the latest release</strong>
                                <strong>{{ $repo2['pushed_at'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Number of open pull requests</strong>
                                <strong>{{ $repo2['open_pull_request'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <strong class="text-gray-dark">Number of closed pull requests</strong>
                                <strong>{{ $repo2['closed_pull_request'] }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endisset

</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.0/examples/offcanvas/offcanvas.js"></script>


<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" preserveAspectRatio="none"
     style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
    <defs>
        <style type="text/css"></style>
    </defs>
    <text x="0" y="2" style="font-weight:bold;font-size:2pt;font-family:Arial, Helvetica, Open Sans, sans-serif">32x32
    </text>
</svg>
</body>
</html>
