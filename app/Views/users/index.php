<!-- User List -->
<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
    <section class="container mt-5" style="height: 82vh;">
        <h1 class="text-center"><?= esc($title) ?></h1>
        <div class="d-flex flex-column mb-3 align-items-end">
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <button type="button" class="btn btn-success col-1" data-bs-toggle="modal" data-bs-target="#createUserModal">
            Create User
            </button>
        </div>

        <!-- Create User Modal -->
        <table class="table table-bordered table-responsive table-dark rounded-3">
            <thead class="table-primary">
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Age</th>
                <th scope="col" class="text-center">Date Created</th>
                <th scope="col" class="text-center">Date Updated</th>
                <th scope="col" class="text-center">Actions</th>
            </thead>
            <tbody class="align-middle">
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['age']) ?></td>
                        <td><?= esc($user['date_create']) ?></td>
                        <td><?= esc($user['date_update']) ?></td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateUserModal" data-user='<?= json_encode($user) ?>'>
                                Edit
                            </button>
                            <form action="<?= base_url($user['id']) ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        <?php include('create.php')?>
        <?php include('update.php')?>
    </section>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
    <script>
        // Add any specific JavaScript for this page here
    </script>
<?= $this->endSection() ?>