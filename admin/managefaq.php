<?php

$page = "managefaq";
$title = "Manage FAQs";
include_once "include/header.php";
include_once "include/sidebar.php";

$success_message = '';
if (isset($_GET["id"])) {

    if ($data->deleteData("allfaqs", "id", $_GET["id"])) {
        $success_message = '<p class="bg-success text-white p-2">' . 'Data Deleted Successfully!' . '</p>';
    } else {
        $success_message = '<p class="bg-danger text-white p-2">' . 'Failed!' . '</p>';
    }

}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage FAQs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Manage FAQs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <?php
if (isset($success_message)) {
    echo $success_message;
}
?>
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales">
                            <div class="card-body">
                                <h5 class="card-title">
                                    All FAQs
                                </h5>


                                <table id="datatable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
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
                                            <td><?php echo substr($post["description"], 0, 70) . "..."; ?></td>
                                            <td><?php echo $post["date"]; ?></td>
                                            <td><?php echo $post["status"] == 1 ? "Published" : "Draft"; ?></td>
                                            <td>
                                                <a href="updatefaq.php?id=<?php echo $post["id"]; ?>"
                                                    class="btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="managefaq.php?id=<?php echo $post["id"]; ?>"
                                                    class="btn-sm btn-danger">
                                                    <i class="bi bi-trash2-fill"></i>
                                                </a>

                                            </td>
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
<?php include_once "include/footer.php";?>