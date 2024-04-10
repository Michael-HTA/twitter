<!-- header -->
<?php require("components/main/header.php") ?>
<!-- left side setting -->
<?php require("components/main/leftSide.php") ?>
<!-- post -->

<div class="col-7">
    <div class="container-fluid m-0 p-0">
        <div class="row">
            <div class="col-6 btn" id='people'>People</div>
            <div class="col-6 btn" id='posts'>Posts</div>
        </div>
        <div class="row" id= 'box1'>
            <?php foreach ($users as $user) { ?>
                <div class=" col-12 mb-2 mt-3">
                    <div class="card shadow transition">
                        <div class="card-body d-flex justify-content-evenly">
                        <img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" 
                        alt="profile" style="width:60px;height:60px" class="rounded-pill  mt-1">
                        <div class="card-title my-auto"><?=  $user->name ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row"  id= 'box2'>
            <?php foreach ($posts as $post) { ?>
                <div class=" col-12 mb-2 mt-3 box-2">
                    <div class="card shadow transition">
                        <div class="card-body">
                            <div class="card-title border-bottom text-center"><?=  $post->user_name ?></div>
                            <div class="card-text text-center"><?=  $post->body ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- left side -->
<?php require("components/main/rightSide.php") ?>
<!-- footer -->
<?php require("components/main/footer.php") ?>