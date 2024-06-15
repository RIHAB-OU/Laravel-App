<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('user.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('user.partials.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <!-- Subscription Status -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Subscription Status
                        </div>
                        <div class="card-body">
                            @if ($hasSubscription)
                                <p>You have an active subscription.</p>
                            @else
                                <p>You do not have an active subscription <a class="btn btn-info"
                                    href="{{ route('user.subscriptions.list') }}">click here</a> to access all features.</p>
                            @endif
                        </div>
                    </div>

                    <!-- User Interests -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Your Interests
                        </div>
                        <div class="card-body">
                            @if ($hasInterests)
                                @php
                                    $interests = $user->interests
                                @endphp

                                @foreach ($interests as $question => $answers)
                                    <div>
                                        <strong>{{ ucwords(str_replace('_', ' ', $question)) }}:</strong>
                                        <ul>
                                            @if (is_array($answers))
                                                @foreach ($answers as $answer)
                                                    <li>{{ $answer }}</li>
                                                @endforeach
                                            @else
                                                <li>{{ $answers }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                <p>You have not filled out your interests yet. Please <a class="btn btn-primary"
                                        href="{{ route('user.questionnaires.list') }}">click here</a> to fill out your
                                    interests.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @if ($hasInterests)
                @include('user.partials.index')
            @endif



            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>

</body>

</html>
