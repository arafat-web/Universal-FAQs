<?php
$page = "dashboard";
$title = "Dashboard";
include_once "include/header.php";
include_once "include/sidebar.php";

include "config/database.php";

$data = new Databases;

$total = $data->viewData("allfaqs", "", "", "");
$published = $data->viewData("allfaqs", "", "status", "1");
$draft = $data->viewData("allfaqs", "", "status", "2");

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total <span>| FAQ</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo count($total) ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Published <span>| FAQ </span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo count($published) ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Draft <span>| FAQ</span></h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo count($draft) ?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales">

                            <div class="card-body">
                                <h5 class="card-title">Recent Activity</h5>

                                <table id="datatable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$post_data = $data->viewData("allfaqs", "", "", "");
foreach ($post_data as $post) {
    ?>
                                        <tr>
                                            <td><?php echo $post["id"]; ?></td>
                                            <td><?php echo $post["title"]; ?></td>
                                            <td><?php echo $post["description"]; ?></td>
                                            <td><?php echo $post["date"]; ?></td>
                                            <td><?php echo $post["status"] == 1 ? "Published" : "Draft"; ?></td>
                                        </tr>
                                        <?php
}
?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->

<?php
include_once "include/footer.php";
?>