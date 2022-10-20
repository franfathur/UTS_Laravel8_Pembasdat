<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-md-6"><h3 class="font-weight-bold">Products List</h3></div>
                    <div class="col-md-6"> <input wire:model="search" type="text" class="form-control" placeholder="Search Products..."></div>                     
                </div>
            </div>
            <div class="card-body">                
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-3 mb-3" :key="<?php echo e($product->id); ?>">
                            <div class="card" wire:click="addItem(<?php echo e($product->id); ?>)" style="cursor:pointer">                 
                                <img src="<?php echo e(asset('storage/images/'.$product->image)); ?>" alt="product" style="object-fit: contain  ;width:100%;height:170px">
                                <button class="btn btn-primary btn-sm" style="position:absolute;top:0;right:0;padding: 10px 15px"><i class="fas fa-cart-plus fa-lg"></i></button>
                                <h6 class="text-center font-weight-bold mt-2"><?php echo e($product->name); ?></h6>
                                <h6 class="text-center font-weight-bold" style="color:grey">Rp <?php echo e(number_format($product->price,2,',','.')); ?></h6>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-sm-12 mt-5">
                        <h2 class="text-center font-weight-bold text-primary">No Products Found</h2>                    
                    </div>                        
                    <?php endif; ?>                                     
                </div>
                <div style="display:flex;justify-content:center">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="font-weight-bold">Cart</h3>                              
            </div>
            <div class="card-body">
                <?php if(session()->has('error')): ?>
                        <p class="text-danger font-weight-bold">
                            <?php echo e(session('error')); ?>

                        </p>
                <?php endif; ?>                   
                <table class="table table-sm table-bordered table-hovered">
                    <thead class="bg-white">
                        <tr >
                            <th class="font-weight-bold">No</th>
                            <th class="font-weight-bold">Name</th>
                            <th class="font-weight-bold">Qty</th>
                            <th class="font-weight-bold">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <?php echo e($index + 1); ?>

                                    <br>
                                     <i class="fas fa-trash" wire:click="removeItem('<?php echo e($cart['rowId']); ?>')" style="font-size:13px;cursor:pointer;color:grey;"></i>
                                </td>
                                <td>
                                <a href="#" class="font-weight-bold text-dark"><?php echo e($cart['name']); ?></a> 
                                <br>
                                <a href="">Rp <?php echo e(number_format($cart['pricesingle'],2,',','.')); ?></a>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" style="padding:7px 10px" wire:click="increaseItem('<?php echo e($cart['rowId']); ?>')"><i class="fas fa-plus"></i></button>
                                        <?php echo e($cart['qty']); ?>

                                    <button class="btn btn-info btn-sm" style="padding:7px 10px"  wire:click="decreaseItem('<?php echo e($cart['rowId']); ?>')"><i class="fas fa-minus"></i></button>
                                </td>
                                <td>Rp <?php echo e(number_format($cart['price'],2,',','.')); ?></td>
                            </tr>                                
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="4"><h6 class="text-center">Empty Cart</h6></td>
                        <?php endif; ?>
                    </tbody>
                </table>              
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="font-weight-bold">Cart Summary</h4>
                <h5 class="font-weight-bold">Sub Total: Rp <?php echo e(number_format($summary['sub_total'],2,',','.')); ?> </h5>
                <h5 class="font-weight-bold">Tax: Rp <?php echo e(number_format($summary['pajak'],2,',','.')); ?> </h5>
                <h5 class="font-weight-bold" id="oke">Total: Rp <?php echo e(number_format($summary['total'],2,',','.')); ?> </h5>

                <div class="row mt-4">
                    <div class="col-sm-6">
                         <button wire:click="enableTax" class="btn btn-primary btn-block btn-sm">Add Tax</button>
                    </div>
                    <div class="col-sm-6">
                          <button wire:click="disableTax" class="btn btn-info btn-block btn-sm">Remove Tax</button>
                    </div>      
                </div>
              
              <div class="form-group mt-4">
                <input type="number" wire:model="payment" class="form-control" id="payment" placeholder="Input customer payment amount">
                <input type="hidden" id="total" value="<?php echo e($summary['total']); ?>">
              </div>

                <form wire:submit.prevent="handleSubmit">
                    <div>
                        <label >Payment</label>
                        <h1 id="paymentText" wire:ignore>Rp. 0</h1>
                    </div>

                    <div>
                        <label >kembalian</label>
                        <h1 id="kembalianText" wire:ignore>Rp. 0</h1>
                    </div>
                
                    <div class="mt-4">
                        <button wire:ignore type="submit" id="saveButton" disabled class="btn btn-success btn-block" id="saveButton"><i class="fas fa-save fa-lg"></i> Save Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('script-custom'); ?>
    <script>
        payment.oninput = () => {
            const paymentAmount = document.getElementById("payment").value
            const totalAmount = document.getElementById("total").value

            const kembalian = paymentAmount - totalAmount

            document.getElementById("kembalianText").innerHTML = `Rp ${rupiah(kembalian)} ,00`
            document.getElementById("paymentText").innerHTML = `Rp ${rupiah(paymentAmount)} ,00`

            const saveButton =  document.getElementById("saveButton")

            if(kembalian < 0){
                saveButton.disabled = true
            }else{
                saveButton.disabled = false
            }
        }

        const rupiah = (angka) => {
            const numberString = angka.toString()
            const split = numberString.split(',')
            const sisa = split[0].length % 3
            let rupiah = split[0].substr(0, sisa)
            const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

            if(ribuan){
                const separator = sisa ? '.' : ''
                rupiah += separator + ribuan.join('.')
            }

            return split[1] != undefined ? rupiah + ',' + split[1] : rupiah
        }
    </script>
<?php $__env->stopPush(); ?>


<?php /**PATH B:\Fatur File\xampp\htdocs\cartmaster\cartmaster\resources\views/livewire/cart.blade.php ENDPATH**/ ?>