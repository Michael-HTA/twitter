<!-- header -->
<?php require("components/main/header.php") ?>
<!-- left side setting -->
<?php require("components/main/leftSide.php") ?>
<!-- post -->

<div class="col-7">
    <div class="container-fluid m-0 p-0">
        <div class="row">
            <?php foreach ($users as $user) { ?>
                <div class="col-3 mt-3">
                    <image src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="profile" style="width:60px;height:60px" class="rounded-pill"></image>
                </div>
                <div class="col-3 my-auto">
                    <?= $user->name ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<!-- left side -->
<?php require("components/main/rightSide.php") ?>
<!-- footer -->
<?php require("components/main/footer.php") ?>