<!-- memanggil file app.blade.php -->


<!-- mengirimkan nilai ke title untuk ditampilkan -->
<?php $__env->startSection('title', 'Login'); ?>

<!-- batas awal isi konten -->
<?php $__env->startSection('content'); ?>

<style>
    body {
        background: linear-gradient(135deg, #d8f3dc, #f1faee);
        height: 100vh;
    }

    .login-card {
        width: 22rem;
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 128, 0, 0.15);
        overflow: hidden;
    }

    .login-header {
        background-color: #74c69d;
        color: white;
        font-weight: bold;
        font-size: 1.3rem;
        padding: 15px;
    }

    .card-body {
        background-color: #ffffff;
        padding: 25px;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #b7e4c7;
    }

    .form-control:focus {
        border-color: #52b788;
        box-shadow: 0 0 0 0.2rem rgba(82, 183, 136, 0.25);
    }

    .btn-green {
        background-color: #52b788;
        border: none;
        border-radius: 10px;
        width: 100%;
        color: white;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-green:hover {
        background-color: #40916c;
    }

    .badge {
        margin-top: 5px;
    }
</style>

<div class="card login-card text-center position-absolute top-50 start-50 translate-middle">
    <div class="login-header">
        🌿 Login POS
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('auth')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3 text-start">
                <label for="exampleInputEmail1" class="form-label">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    placeholder="Masukkan email">

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="badge text-bg-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4 text-start">
                <label for="exampleInputPassword1" class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    placeholder="Masukkan password">

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="badge text-bg-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="btn btn-green">
                Login
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\apk_pos_seni\seni_POS\resources\views/login.blade.php ENDPATH**/ ?>