<!-- middle -->
<div class="col-7">
    <div class="container-fluid m-0 p-0">
        <div class="row mb-3">
            <div class="col d-flex mt-2">
                <div>
                    <?php if(empty($user->photo)) : ?>
                        <img src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?w=360&t=st=1713095539~exp=1713096139~hmac=b8bc9b0e51087bc4078c0558a5341eb82a57eb587cb7f9468596b4f4c688fa12" alt="profile" style="width:70px;height:70px" class=" mt-1 rounded-pill me-3">
                    <?php else : ?>
                        <img src="<?=imageUri($user->photo)?>" alt="profile" style="width:70px;height:70px" class=" mt-1 rounded-pill me-3">
                    <?php endif; ?>
                </div>
                <div style="width: 90%">
                    <form action="http://localhost/post/add" method="post">
                        <div class="input-group ">
                            <input type="hidden" value="<?= $user->id ?>" name="user_id">
                            <input type="text" name='post_body' class="form-control me-2 rounded border-dark border-1 text-start" placeholder="What's in your mind?" style="height:70px">
                            <button class="btn border-dark rounded-pill border-2 h-25 tweet my-auto">Tweet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php foreach ($posts as $post) { ?>
            <div class="row border-bottom mb-2">
                <div class="col-1 me-3">
                    <?php if (empty($post->photo)) : ?>
                        <img src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?w=360&t=st=1713095539~exp=1713096139~hmac=b8bc9b0e51087bc4078c0558a5341eb82a57eb587cb7f9468596b4f4c688fa12" alt="profile" style="width:70px;height:70px" class=" mt-1 rounded-pill">
                    <?php else : ?>
                        <img src="<?=imageUri($post->photo)?>" alt="profile" style="width:70px;height:70px" class=" mt-1 rounded-pill ">
                    <?php endif; ?>
                </div>
                <div class="col-10 ms-1">
                    <div class="container-fluid p-0 m-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <p class="me-2"><?= $post->name ?></p>
                                    <p><?= showTime($post->created_at) ?></p>
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
                            <div class="col d-flex justify-content-between pt-2 ">
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
</div>