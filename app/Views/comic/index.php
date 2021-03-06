<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/comic/add" class="btn btn-primary mt-3">Add Comic</a>
            <h1 class="mt-2">Comic List</h1>
            <?php if (session()->getFlashdata('message')) : ?>
        </div>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">More</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($comic as $c) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><img src="/img/<?= $c['cover']; ?>" alt="" class="cover"></td>
                    <td><?= $c['title']; ?></td>
                    <td>
                        <a href="/comic/<?= $c['slug']; ?>" class="btn btn-success">Details</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<?= $this->endSection(); ?>