<!-- middle -->
<div class="col-7">
    <div class="container-fluid m-0 p-0">
        <div class="row mb-2">
            <div class="col d-flex mt-2">
                <div>
                    <a href="/" class="me-2">
                        <img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="profile" style="width:60px;height:60px" class="rounded-pill  mt-1">
                    </a>
                </div>
                <div style="width: 90%">
                    <form action="#">
                        <div class="input-group ">
                            <input type="text" class="form-control me-2 rounded border-dark border-1 text-start" placeholder="What's in your mind?" style="height:70px">
                            <button class="btn border-dark rounded-pill border-2 h-25 tweet my-auto">Tweet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php foreach ($posts as $post) { ?>
            <div class="row border border-1 border-top border-bottom">
                <div class="col-1">
                    <a href="/" class="me-2">
                        <img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="profile" style="width:60px;height:60px" class="rounded-pill  mt-1">
                    </a>
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
                            <div class="col d-flex justify-content-between">
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