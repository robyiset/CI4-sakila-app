<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<header class="jumbotron jumbotron-fluid mt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1">Edit <?= $film_list['title'] ?></h1>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <form action="" method="post" id="film-form">
        <div class="row">
            <div class="row ">
                <input class="hidden" type="hidden" id="fid" name="fid" value="<?= $film_list['FID'] ?>" />
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $film_list['title'] ?>" required />
                </div>
                <div class="col-md-6">
                    <label for="Language" class="form-label">Language:</label>
                    <select class="form-select" aria-label="Add film language" name="language" id="language" required>
                        <option disabled selected>Select Language</option>
                        <?php foreach ($language as $item) : ?>
                            <option value="<?= $item['language_id'] ?>" <?php if ($film_list['language_id'] == $item['language_id']) { ?> selected <?php } ?>><?= $item['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="Language" class="form-label">Release Year:</label>
                    <input type="number" min="1800" class="form-control" aria-label="Release Year" name="release_year" id="release_year" value="<?= $film_list['release_year'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-select" aria-label="Add film category" name="category" id="category" required>
                        <?php foreach ($category as $item) : ?>
                            <option value="<?= $item['category_id'] ?>" <?php if ($film_list['category_id'] == $item['category_id']) { ?> selected <?php } ?>><?= $item['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="rating" class="form-label">Rating:</label>
                    <select class="form-select" aria-label="Add fil rating" required>
                        <option value="G" <?php if ($film_list['rating'] == 'G') { ?> selected <?php } ?>>G</option>
                        <option value="PG" <?php if ($film_list['rating'] == 'PG') { ?> selected <?php } ?>>PG</option>
                        <option value="PG-13" <?php if ($film_list['rating'] == 'PG-13') { ?> selected <?php } ?>>PG-13</option>
                        <option value="NC-17" <?php if ($film_list['rating'] == 'NC-17') { ?> selected <?php } ?>>NC-17</option>
                        <option value="R" <?php if ($film_list['rating'] == 'R') { ?> selected <?php } ?>>R</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="length" class="form-label">Length:</label>
                    <div class="input-group mb-3">
                        <input type="number" min="1" class="form-control" aria-label="Film length" name="length" id="length" value="<?= $film_list['length'] ?>" required>
                        <span class="input-group-text" id="basic-addon2">mins</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Price:</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="number" step=".01" min="0.01" class="form-control" aria-label="Film price" name="price" id="price" value="<?= $film_list['price'] ?>" required>
                    </div>

                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea style="resize: none;" class="form-control" id="description" name="description" rows="3"><?= $film_list['description'] ?></textarea>
            </div>
            <div class="mb-5">
                <label for="actor_id" class="form-label">Actors:</label>
                <select style="width: 100%;" class="select2" name="actor_id[]" multiple="multiple">
                    <?php foreach ($actor as $item) : ?>
                        <option value="<?= $item['actor_id'] ?>" <?php foreach (explode(", ", $film_list['actor_id']) as $ida) {
                                                                        if ($ida == $item['actor_id']) { ?> selected <?php }
                                                                                                                } ?>><?= $item['first_name'] ?> <?= $item['last_name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>