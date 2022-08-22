<?php

$page = "addfaq";
$title = "Add FAQs";
include_once "include/header.php";
include_once "include/sidebar.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add FAQ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Add FAQ</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Add FAQ</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3">
                                <div class="col-12">
                                    <label for="title" class="form-label text-muted">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing.">
                                </div>
                                <div class="col-12">
                                    <label for="editor" class="form-label text-muted">Description</label>
                                    <textarea id="editor"
                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, deleniti?"
                                        class="form-control" style="height: 100px"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Publish</button>
                                    <button type="submit" class="btn btn-warning">Save Draft</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->