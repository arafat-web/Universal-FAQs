<?php

$page = "managefaq";
$title = "Manage FAQs";
include_once "include/header.php";
include_once "include/sidebar.php";
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

                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Pariatur quaerat accusamus earum sint eaque sunt cupiditate deleniti
                                                quisquam a iste?
                                            </td>
                                            <td>14/8/2022</td>
                                            <td>Published</td>
                                            <td>
                                                <a href="" class="btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="" class="btn-sm btn-danger">
                                                    <i class="bi bi-trash2-fill"></i>
                                                </a>

                                            </td>
                                        </tr>
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