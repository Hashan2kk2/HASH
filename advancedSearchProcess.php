<?php

require "connection.php";

$search = $_POST["search"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$type = $_POST["type"];
$priceFrom = $_POST["priceFrom"];
$priceTo = $_POST["priceTo"];

$query = "SELECT * FROM `product`";
$status = 1;

if (!empty($search)) {
    $query .= " WHERE `productName` LIKE '%" . $search_txt . "%'";
    $status = 1;
}
if ($category != 0 && $status == 0) {
    $query .= " WHERE `category_id` = '" . $category . "'";
    $status = 1;
} else if ($category != 0 && $status == 1) {
    $query .= " AND `category_id`='" . $category . "'";
}

if ($brand != 0 && $status == 0) {
    $query .= " WHERE `brand_id` = '" . $brand . "'";
    $status = 1;
} else if ($brand != 0 && $status == 1) {
    $query .= " AND `brand_id`='" . $brand . "'";
}

if ($type != 0 && $status == 0) {
    $query .= " WHERE `type_id` = '" . $type . "'";
    $status = 1;
} else if ($type != 0 && $status == 1) {
    $query .= " AND `type_id`='" . $type . "'";
}


if (!empty($priceFrom) && empty($priceTo)) {
    if ($status == 0) {
        $query .= "WHERE `price` >= '" . $priceFrom . "'";
        $status = 1;
    } else if ($status == 1) {
        $query .= "AND `price` >= '" . $priceFrom . "'";
    }
} else if (empty($priceFrom) && !empty($priceTo)) {
    if ($status == 0) {
        $query .= "WHERE `price` >= '" . $priceTo . "'";
        $status = 1;
    } else if ($status == 1) {
        $query .= "AND `price` >= '" . $priceTo . "'";
    }
} else if (!empty($priceFrom) && !empty($priceTo)) {
    if ($status == 0) {
        $query .= "WHERE `price` BETWEEN '" . $priceFrom . "' AND '" . $priceTo . "'";
        $status = 1;
    } else if ($status == 1) {
        $query .= "AND `price` BETWEEN '" . $priceFrom . "' AND '" . $priceTo . "'";
    }
}

if (!empty($search)) {

    $query .= " WHERE `title` LIKE '%" . $search . "%' ORDER BY `price` DESC";
    $status = 1;
}
?>

<?php

if ($_POST["page"] != 0) {
    $pageno = $_POST["page"];
} else {
    $pageno = 1;
}

$productRs =  Database::search($query);
$product_num = $productRs->num_rows;

$results_per_page = 8;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {

?>

    <div class="col-7 col-sm-5 col-lg-3">
        <div class="p-2 border bg-light d-flex justify-content-center align-items-center" style="height: 310px; overflow: hidden;">
            <img src='img/profilepic-bg.jpg' alt="shoe" class="img-fluid">
        </div>
        <div class="row p-2">
            <div class="col-10">
                <?php echo $results_data["productName"]; ?>
            </div>
            <div class="col-2 fs-4 wishlist-card-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" style="cursor: pointer;">
                <i class="bx bx-heart"></i>
            </div>
        </div>
        <div class="row mx-1 p-2 price">
            <div class="col-10 text-white">
                <?php echo $results_data["price"]; ?>
            </div>
            <div class="col-2 text-center text-white">
                <i class='bx bxs-message-square-add fs-4'></i>
            </div>
        </div>
    </div>
<?php
}
?>

<div class="offset-lg-4 col-12 col-lg-4 mb-3 text-center">
    <div class="row">

        <div class="pagination">
            <a <?php if ($pageno <= 1) {
                    echo "#";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageno - 1); ?>')" <?php
                                                                        } ?>>&laquo;</a>

            <?php

            for ($page = 1; $page <= $number_of_pages; $page++) {

                if ($page == $pageno) {

            ?>
                    <a onclick="advancedSearch('<?php echo ($page); ?>')" class="active">
                        <?php echo $page; ?>
                    </a>
                <?php

                } else {

                ?>
                    <a onclick="advancedSearch('<?php echo ($page); ?>')">
                        <?php echo $page; ?>
                    </a>
            <?php

                }
            }

            ?>

            <a <?php if ($pageno >= $number_of_pages) {
                    echo "#";
                } else {
                ?> onclick="advancedSearch('<?php echo ($pageno + 1); ?>')" <?php
                                                                        } ?>>&raquo;</a>
        </div>

    </div>
</div>