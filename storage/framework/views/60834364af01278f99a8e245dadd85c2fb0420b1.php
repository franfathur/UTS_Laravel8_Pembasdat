<div class="container">    
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <?php if(session()->has('error')): ?> <span class="text-danger"><?php echo e(session('error')); ?></span> <?php endif; ?>
                        <form wire:submit.prevent="submit">
                        <div class="form-group">
                        <label for="email">Email</label>
                            <input wire:model="form.email" type="text" class="form-control" placeholder="Input your valid email">
                            <?php $__errorArgs = ['form.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                        <label for="email">Password</label>
                            <input wire:model="form.password" type="password" class="form-control" placeholder="Input your valid password">
                            <?php $__errorArgs = ['form.password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary">Login</button>
                        </div>
                        <div>
                            <a href="/register">Register</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>    
</div>
<?php /**PATH B:\Fatur File\xampp\htdocs\cartmaster\cartmaster\resources\views/livewire/auth/login.blade.php ENDPATH**/ ?>