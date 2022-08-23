<!--
    FAQs Design
    13 - 8 - 2022
    Arafat Hossain Ar
 -->

<?php
    /*
    FAQs Backend
    23 - 8 - 2022
    Arafat Hossain Ar
    */
include "admin/config/database.php";

$data = new Databases;

$post_data = $data->viewData("allfaqs", "", "status", "1");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

</head>

<body>
    <main>

        <h1 class="faq-heading">FAQ'S</h1>
        <section class="faq-container">

            <?php

foreach ($post_data as $post) {

    ?>
            <div class="faq">
                <!-- faq question -->
                <h1 class="faq-page"><?php echo $post["title"] ?></h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p><?php echo $post["description"] ?></p>
                </div>
            </div>
            <hr class="hr-line">

            <?php
}
?>


        </section>
    </main>
    <script src="script/script.js"></script>
</body>


</html>