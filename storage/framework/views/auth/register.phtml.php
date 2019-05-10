<?php include_once locked__view__extends('layouts/app.phtml') ?>

<?php function content($vars) { 
            extract($vars);
        ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo _e('/register') ?>">
                           
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control<?php if (_error('name')) { $message = _error('name'); ?> is-invalid<?php } ?>"
                                    name="name" value="<?php echo _e(_old('name'))?>" required autofocus>

                                    <?php if (_error('name')) { $message = _error('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo _e($message) ?></strong>
                                    </span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control<?php if (_error('email')) { $message = _error('email'); ?> is-invalid<?php } ?>"
                                    name="email" value="<?php echo _e(_old('email'))?>" required>

                                    <?php if (_error('email')) { $message = _error('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo _e($message) ?></strong>
                                    </span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control<?php if (_error('password')) { $message = _error('password'); ?> is-invalid<?php } ?>"
                                    name="password" required>

                                    <?php if (_error('password')) { $message = _error('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo _e($message) ?></strong>
                                    </span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>