<?php

$page = "updatefaq";
$title = "Update FAQs";
include_once "include/header.php";
include_once "include/sidebar.php";

$success_message = '';

if (isset($_POST["status"])) {

    if (!(empty($_POST['title']) || empty($_POST['description']))) {
        $update_data = array(
            'title' => mysqli_real_escape_string($data->connect, $_POST['title']),
            'description' => mysqli_real_escape_string($data->connect, $_POST['description']),
            'date' => mysqli_real_escape_string($data->connect, date("Y/m/d")),
            'status' => mysqli_real_escape_string($data->connect, $_POST['status']),
        );
        if ($data->updateData('allfaqs', $update_data, $_POST['id'])) {
            $success_message = '<p class="bg-success text-white p-2">' . 'FAQ Updated Successfully' . '</p>';
        } else {
            $success_message = '<p class="bg-danger text-white p-2">' . 'Invalid Input' . '</p>';
        }
    } else {
        $success_message = '<p class="bg-danger text-white p-2">' . 'Invalid Input' . '</p>';
    }

}

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update FAQ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Update FAQ</li>
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

                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Update FAQ</h5>

                            <!-- Vertical Form -->
                            <form method="post" class="row g-3">
                                <?php
$post_data = $data->viewData("allfaqs", "", "id", $_GET['id']);
foreach ($post_data as $post) {
    ?>
                                <div class="col-12">
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <label for="title" class="form-label text-muted">Title</label>
                                    <input type="text" value="<?php echo $post["title"]; ?>" class="form-control"
                                        name="title" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing.">
                                </div>
                                <div class="col-12">
                                    <label for="editor" class="form-label text-muted">Description</label>
                                    <textarea name="description" id="editor"
                                        placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, deleniti?"
                                        class="form-control"
                                        style="height: 100px"><?php echo $post["description"]; ?></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" value="1" name="status"
                                        class="btn btn-primary">Publish</button>
                                    <!-- <input type="submit" class="btn btn-primary" value="1" name="Publish">
                                    <input type="submit" class="btn btn-warning" value="0" name="Save Draft"> -->
                                    <button type="submit" value="2" name="status" class="btn btn-warning">Save
                                        Draft</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                                <?php
}
?>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
<?php include_once "include/footer.php";?>