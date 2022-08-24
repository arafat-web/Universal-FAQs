<?php

$page = "admin-profile";
$title = "Admin Profile";
include_once "include/header.php";
include_once "include/sidebar.php";

// include "config/database.php";
// $data = new Databases;

$admin_details = $data->viewData("admin", "", "", "");
// print_r($admin_details[1]);

$id;
$about;
$company;
$country;
$address;
$phone;
$email;
foreach ($admin_details as $value) {

    $id = $value["id"];
    $about = $value["about"];
    $company = $value["company"];
    $country = $value["country"];
    $address = $value["address"];
    $phone = $value["phone"];
    $email = $value["email"];
}

$success_message = '';

if (isset($_POST["update"])) {
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "images/" . $filename;

    $update_data = array(
        'fullname' => mysqli_real_escape_string($data->connect, $_POST['fullname']),
        'phone' => mysqli_real_escape_string($data->connect, $_POST['phone']),
        'email' => mysqli_real_escape_string($data->connect, $_POST['email']),
        'image' => mysqli_real_escape_string($data->connect, $filename),
        'about' => mysqli_real_escape_string($data->connect, $_POST['about']),
        'company' => mysqli_real_escape_string($data->connect, $_POST['company']),
        'job' => mysqli_real_escape_string($data->connect, $_POST['job']),
        'country' => mysqli_real_escape_string($data->connect, $_POST['country']),
        'address' => mysqli_real_escape_string($data->connect, $_POST['address']),
    );
    if ($data->updateData('admin', $update_data, $_POST['id'])) {
        move_uploaded_file($tempname, $folder);
        $success_message = '<p class="bg-success text-white p-2">' . 'Your Profile  Updated Successfully! Please <a href="">Refresh</a> to see new contents.' . '</p>';
    } else {
        $success_message = '<p class="bg-danger text-white p-2">' . 'Invalid Input' . '</p>';
    }
}
if (isset($_POST["cngpsw"])) {
    // Check current password

    $currentPassword = $_POST["password"];
    $newPassword = $_POST["newpassword"];
    $reNewPassword = $_POST["renewpassword"];
    $getCurrentPasword = $data->viewData("admin", "password", "id", $_POST['id']);

    foreach ($getCurrentPasword as $value) {
        if ($value["password"] == $currentPassword) {
            if ($newPassword == $reNewPassword) {
                $update_data = array(
                    'password' => mysqli_real_escape_string($data->connect, $_POST['newpassword']),
                );
                if ($data->updateData('admin', $update_data, $_POST['id'])) {
                    $success_message = '<p class="bg-success text-white p-2">' . 'Your Password Changed Successfully!' . '</p>';
                } else {
                    $success_message = '<p class="bg-danger text-white p-2">' . 'Invalid Input' . '</p>';
                }
            } else {
                $success_message = '<p class="bg-danger text-white p-2">' . 'New Password Did not Matched' . '</p>';
            }
        } else {
            $success_message = '<p class="bg-danger text-white p-2">' . 'Current Password Did not Matched' . '</p>';
        }
    }

}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <?php
if (isset($success_message)) {
    echo $success_message;
}
?>
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="images/<?php echo $img; ?>" alt="Profile" class="">
                        <h2><?php echo $fullname; ?></h2>
                        <h3><?php echo $job; ?></h3>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change
                                    Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic"><?php echo $about; ?></p>

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $fullname; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $company; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $job; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $country; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $address; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $phone; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $email; ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <!-- <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div> -->
                                            <input name="img" type="file" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullname" type="text" class="form-control"
                                                value="<?php echo $fullname; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about"
                                                style="height: 100px"><?php echo $about; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company"
                                                value="<?php echo $company; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job"
                                                value="<?php echo $job; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="<?php echo $country; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="<?php echo $address; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="<?php echo $phone; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="update" class="btn btn-primary">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post">
                                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="cngpsw" class="btn btn-primary">Change
                                            Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include_once "include/footer.php";?>