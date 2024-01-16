<?php foreach ($parentComments as $parentComment) : ?>
    <div class="d-flex flex-column mb-2">
        <div class="d-flex align-items-start gap-3 p-3">
            <?php $user = $userModel->getUserById1($parentComment->user_id) ?>
            <?php if ($user->getImage() == '') : ?>
                <img class="rounded-circle" style="width: 60px; height: 60px;" src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="" />
            <?php else : ?>
                <img style="width: 60px; height: 60px;" class="rounded-circle object-fit-cover" src="<?= ROOT ?>/Public/images/<?= $user->getImage() ?>" alt="" />
            <?php endif; ?>
            <div class="">
                <div class="fs-6 fw-bold"><?= $user->getName() ?></div>
                <span><?= $parentComment->content ?></span>
                <div class="mt-3">
                    <div class="dropdown">
                        <button type="button" style="background-color: transparent !important;" class="text-decoration-none me-2 border-0 text-primary" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            Trả lời
                        </button>
                        <form class="dropdown-menu p-4" style="width: 400px;" action="<?= ROOT ?>/comment/reply?product_id=<?= $parentComment->product_id ?>&comment_id=<?= $parentComment->comment_id ?>" method="post">
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Trả lời bình luận</label>
                                <textarea name="content" class="form-control" placeholder="..." id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger">Bình luận</button>
                        </form>
                    </div>
                    <span><?= $parentComment->comment_date ?></span>
                </div>
            </div>
        </div>
        <?php foreach ($childComments as $childComment) : ?>
            <?php if ($childComment->comment_parent == $parentComment->comment_id) : ?>
                <?php $user = $userModel->getUserById1($childComment->user_id) ?>
                <div class="d-flex align-items-start gap-3 mb-2 ms-5 p-3 rounded-4" style="background-color: #e3d6d6;">
                    <?php if ($user->getImage() == '') : ?>
                        <img style="width: 60px; height: 60px;" class="rounded-circle" src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="" />
                    <?php else : ?>
                        <img style="width: 60px; height: 60px;" class="rounded-circle object-fit-cover" src="<?= ROOT ?>/Public/images/<?= $user->getImage() ?>" alt="" />
                    <?php endif; ?>
                    <div class="">
                        <div class="fs-6 fw-bold"><?= $user->getName() ?></div>
                        <span><?= $childComment->content ?></span>
                        <div class="mt-3">
                            <div class="dropdown">
                                <button type="button" style="background-color: transparent !important;" class="text-decoration-none me-2 border-0 text-primary" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    Trả lời
                                </button>
                                <form class="dropdown-menu p-4" style="width: 400px;" action="<?= ROOT ?>/comment/reply?product_id=<?= $parentComment->product_id ?>&comment_id=<?= $parentComment->comment_id ?>" method="post">
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormEmail2" class="form-label">Trả lời bình luận</label>
                                        <textarea name="content" class="form-control" placeholder="..." id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-danger">Bình luận</button>
                                </form>
                            </div>
                            <span><?= $childComment->comment_date ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>