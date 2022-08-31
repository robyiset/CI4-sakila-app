<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<header class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1">Film List</h1>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="position-relative mb-5 mr-3">
            <div class="col-auto position-absolute end-0">
                <a class="btn btn-primary" href="<?= base_url('FilmForm') ?>">Add New Film</a>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($film_list as $list) : ?>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Film <?= $list['FID'] ?></text>
                    </svg>

                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $list['title'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted text-center"><?= $list['category'] ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted text-center"><?= $list['rating'] ?></h6>
                        <p class="card-text text-center"><?= $list['description'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#_<?= $list['FID'] ?>_film">Detail</button>
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#_<?= $list['FID'] ?>_edit_film">Edit</button> -->
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="<?= base_url('FilmForm/' . $list['FID'] . '/preview') ?>">Edit</a>

                            </div>
                            <small class="text-muted"><?= $list['length'] ?> mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="_<?= $list['FID'] ?>_film" tabindex="-1" aria-labelledby="exampleModalLabel<?= $list['FID'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?= $list['FID'] ?>"><?= $list['title'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label">category:</label>
                                    <p><?= $list['category'] ?></p>
                                    <label class="col-form-label">Language:</label>
                                    <p><?= $list['language'] ?></p>
                                    <label class="col-form-label">Rating:</label>
                                    <p><?= $list['rating'] ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Release Year:</label>
                                    <p><?= $list['release_year'] ?></p>
                                    <label class="col-form-label">length:</label>
                                    <p><?= $list['length'] ?> mins</p>
                                    <label class="col-form-label">price:</label>
                                    <p>$<?= $list['price'] ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label">Description:</label>
                                    <p><?= $list['description'] ?></p>
                                    <label class="col-form-label">Actors:</label>
                                    <p><?= $list['actors'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#_<?= $list['FID'] ?>_delete_film">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="_<?= $list['FID'] ?>_delete_film" tabindex="-1" aria-labelledby="exampleModalLabel<?= $list['FID'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?= $list['FID'] ?>">Delete <?= $list['title'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this film?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                            <a class="btn btn-danger" href="<?= base_url('/' . $list['FID'] . '/delete') ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
        <?= $pager->links('film_list', 'bootstrap_pagination'); ?>


    </div>
</div>

<?= $this->endSection() ?>