<!-- header -->
<?php require('components/main/header.php'); ?>
<!-- left side -->
<?php require('components/main/leftSide.php'); ?>
<!-- middle -->
<div class="col-7">
    <div class="container-fluid m-0 p-0">
        <div class="row mb-2">
            <div class="col d-flex justify-content-center text-center">
                <?php if (empty($user->photo)): ?>
                    <img src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?w=360&t=st=1713095539~exp=1713096139~hmac=b8bc9b0e51087bc4078c0558a5341eb82a57eb587cb7f9468596b4f4c688fa12" alt="profile" style="width:160px;height:150px" class=" mt-2 rounded-circle">
                <?php else: ?>
                    <img src="<?=imageUri($user->photo) ?>" alt="profile" style="width:160px;height:150px" class=" mt-2 rounded-circle">
                <?php endif; ?>
            </div>
        </div>
        <div class="row border-bottom">
            <div class="col-7 d-flex justify-content-end">
                <strong>
                    <?= $user->first_name . " " . $user->last_name ?>
                </strong>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Setting
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Profile Upload</button>
                        </li>
                        <li><a class="dropdown-item" href="#">Block</a></li>
                        <li><a class="dropdown-item" href="#">Timeline</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php foreach ($posts as $post) { ?>
            <div class="row border-1 mt-2 border-bottom">
                <div class="col-1 me-3">
                    <?php if (empty($user->photo)): ?>
                    <img src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?w=360&t=st=1713095539~exp=1713096139~hmac=b8bc9b0e51087bc4078c0558a5341eb82a57eb587cb7f9468596b4f4c688fa12" alt="profile" style="width:70px;height:70px" class=" mt-1 rounded-pill">
                <?php else: ?>
                    <img src="<?=  imageUri($user->photo) ?>" alt="profile" style="width:70px;height:70px" class=" mt-1 rounded-pill">
                <?php endif; ?>
                </div>
                <div class="col-10 ms-1">
                    <div class="container-fluid p-0 m-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <p class="me-2">
                                        <?= $user->first_name . " " . $user->last_name ?>
                                    </p>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <?= showTime($post->created_at) ?>
                                        </div>
                                        <form action="/post/delete" method="post" class="m-0 p-0">
                                            <input type="hidden" value="<?= $user->id ?>" name="user_id">
                                            <input type="hidden" value="<?= $post->id ?>" name="post_id">
                                            <button class="btn btn-danger m-0 p-0 pb-1">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <?= $post->body ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                                            <div class="col">
                                                <div>
                                                    <img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" style="width:300px;height:250px">
                                                </div>
                                            </div>
                                        </div> -->
                        <div class="row">
                            <div class="col d-flex justify-content-between pt-2">
                                <div>Like</div>
                                <div>Comment</div>
                                <div>Share</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col">
                <div style="height:30px;"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/profile/upload" enctype="multipart/form-data" id="profile" method="post">
                        <div class="input-group mb-3">
                            <input type="file" name="profile" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary" form="profile">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- right side -->
<?php require('components/main/rightSide.php') ?>

<!-- footer -->
<?php require('components/main/footer.php') ?>