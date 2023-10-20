<?php $__env->startSection('title',trans('Listing')); ?>

<?php $__env->startSection('banner_heading'); ?>
    <?php echo app('translator')->get('All Listings'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/frontend_leaflet.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/frontendControl.FullScreen.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="listing-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-sm-12 my-4">
                    <form action="<?php echo e(route('listing')); ?>" method="get">
                        <div class="filter-area">
                            <div class="filter-box">
                                <h5><?php echo app('translator')->get('search'); ?></h5>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" class="form-control"
                                           value="<?php echo e(old('name', request()->name)); ?>" autocomplete="off"
                                           placeholder="<?php echo app('translator')->get('Listing name'); ?>"/>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="js-example-basic-single form-control" name="location">
                                        <option selected disabled><?php echo app('translator')->get('Select Location'); ?></option>
                                        <option value="all"
                                                <?php if(request()->location == 'all'): ?> selected <?php endif; ?>><?php echo app('translator')->get('All Location'); ?>
                                        </option>

                                        <?php $__currentLoopData = $all_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option class="m-0" value="<?php echo e($place->id); ?>"
                                                    <?php if(request()->location == $place->id): ?> selected <?php endif; ?>><?php echo app('translator')->get(optional($place->details)->place); ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <select class="listing__category__select2 form-control" name="category[]" multiple>
                                        <option value="all"
                                                <?php if(request()->category && in_array('all', request()->category)): ?>
                                                    selected
                                                <?php endif; ?>><?php echo app('translator')->get('All Category'); ?></option>
                                        <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"
                                                 <?php if(request()->category && in_array($category->id, request()->category)): ?>
                                                        selected
                                                <?php endif; ?>> <?php echo app('translator')->get(optional($category->details)->name); ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-box">
                                <h5><?php echo app('translator')->get('Filter by User'); ?> </h5>
                                <div class="input-group mb-3">
                                    <select class="js-example-basic-single form-control" name="user">
                                        <option selected disabled><?php echo app('translator')->get('Select User'); ?></option>
                                        <option value="all"
                                                <?php if(request()->user == 'all'): ?> selected <?php endif; ?>><?php echo app('translator')->get('All User'); ?></option>
                                        <?php $__currentLoopData = $distinctUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"
                                                    <?php if(request()->user == $user->id): ?> selected <?php endif; ?>><?php echo app('translator')->get($user->fullname); ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-box">
                                <h5><?php echo app('translator')->get('Filter by Ratings'); ?> </h5>
                                <div class="check-box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="5" name="rating[]"
                                               id="check1"
                                               <?php if(isset(request()->rating)): ?>
                                               <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($data == 5): ?> checked <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>/>

                                        <label class="form-check-label" for="check1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="4" name="rating[]"
                                               id="check2"
                                               <?php if(isset(request()->rating)): ?>
                                               <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($data == 4): ?> checked <?php else: ?> <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>/>

                                        <label class="form-check-label" for="check2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="3" name="rating[]"
                                               id="check3"
                                               <?php if(isset(request()->rating)): ?>
                                               <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($data == 3): ?> checked <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>/>
                                        <label class="form-check-label" for="check3">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="2" name="rating[]"
                                               id="check4"
                                               <?php if(isset(request()->rating)): ?>
                                               <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($data == 2): ?> checked <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>/>
                                        <label class="form-check-label" for="check4">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="rating[]"
                                               id="check5"
                                               <?php if(isset(request()->rating)): ?>
                                               <?php $__currentLoopData = request()->rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php if($data == 1): ?> checked <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>/>
                                        <label class="form-check-label" for="check5">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-custom w-100" type="submit"><?php echo app('translator')->get('submit'); ?></button>
                        </div>
                    </form>
                </div>


                <div class="col-xl-6 col-lg-6 col-sm-12 my-4">
                    <?php if( 0 <count($all_listings)): ?>
                        <div class="row g-4">
                            <?php $__empty_1 = true; $__currentLoopData = $all_listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $total = $listing->reviews()[0]->total;
                                    $average_review = $listing->reviews()[0]->average;
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="listing-box listing-map-box" data-lat="<?php echo e($listing->lat); ?>"
                                         data-long="<?php echo e($listing->long); ?>"
                                         data-title="<?php echo app('translator')->get( Str::limit($listing->title, 30)); ?>"
                                         data-image="<?php echo e(getFile($listing->driver, $listing->thumbnail)); ?>"
                                         data-location="<?php echo app('translator')->get($listing->address); ?>"
                                         data-route="<?php echo e(route('listing-details',[slug($listing->title), $listing->id])); ?>">
                                        <div class="img-box">
                                            <img class="img-fluid"
                                                 src="<?php echo e(getFile($listing->driver, $listing->thumbnail)); ?>"
                                                 alt="<?php echo e(config('basic.site_title')); ?>"/>
                                            <button class="save wishList" type="button" id="<?php echo e($key); ?>"
                                                    data-user="<?php echo e(optional($listing->get_user)->id); ?>"
                                                    data-purchase="<?php echo e($listing->purchase_package_id); ?>"
                                                    data-listing="<?php echo e($listing->id); ?>">
                                                <?php if($listing->get_favourite_count > 0): ?>
                                                    <i class="fas fa-heart save<?php echo e($key); ?>"></i>
                                                <?php else: ?>
                                                    <i class="fal fa-heart save<?php echo e($key); ?>"></i>
                                                <?php endif; ?>
                                            </button>
                                        </div>

                                        <div class="text-box">
                                            <div class="review">
                                                <?php
                                                    $isCheck = 0;
                                                    $j = 0;
                                                ?>
                                                <?php if($average_review != intval($average_review)): ?>
                                                    <?php
                                                        $isCheck = 1;
                                                    ?>
                                                <?php endif; ?>

                                                <?php for($i = $average_review; $i > $isCheck; $i--): ?>
                                                    <i class="fas fa-star" aria-hidden="true"></i>
                                                    <?php
                                                        $j = $j + 1;
                                                    ?>
                                                <?php endfor; ?>

                                                <?php if($average_review != intval($average_review)): ?>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <?php
                                                        $j = $j + 1;
                                                    ?>
                                                <?php endif; ?>

                                                <?php if($average_review == 0 || $average_review != null): ?>
                                                    <?php for($j; $j < 5; $j++): ?>
                                                        <i class="far fa-star"></i>
                                                    <?php endfor; ?>
                                                <?php endif; ?>
                                                <span>(<?php echo app('translator')->get($total.' reviews'); ?>)</span>
                                            </div>

                                            <h5 class="title"><?php echo app('translator')->get(Str::limit($listing->title, 30)); ?></h5>
                                            <a class="author"
                                               href="<?php echo e(route('profile', [slug(optional($listing->get_user)->firstname), optional($listing->get_user)->id])); ?>">
                                                <?php echo app('translator')->get(optional($listing->get_user)->firstname); ?> <?php echo app('translator')->get(optional($listing->get_user)->lastname); ?>
                                            </a>
                                            <p class="mb-2">
                                                <span class=""><?php echo app('translator')->get('Category'); ?>: </span> <?php echo e(optional($listing)->getCategoriesName()); ?>

                                            </p>
                                            <p class="address mt-1">
                                                <i class="fal fa-map-marker-alt"></i>
                                                <?php echo app('translator')->get($listing->address); ?> , <?php echo app('translator')->get(optional(optional($listing->get_place)->details)->place); ?>
                                            </p>
                                            <a href="<?php echo e(route('listing-details',[slug($listing->title), $listing->id])); ?>"
                                               class="btn-custom"><?php echo app('translator')->get('View details'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="custom-not-found">
                                    <img src="<?php echo e(asset($themeTrue.'img/no_data_found.png')); ?>"
                                         alt="<?php echo e(config('basic.site_title')); ?>" class="img-fluid">
                                </div>
                            <?php endif; ?>


                            <div class="col-lg-12 d-flex justify-content-center mt-5">
                                <nav aria-label="Page navigation example mt-3">
                                    <?php echo e($all_listings->appends($_GET)->links()); ?>

                                </nav>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="custom-not-found">
                            <img src="<?php echo e(asset($themeTrue.'img/no_data_found.png')); ?>" alt="<?php echo e(config('basic.site_title')); ?>"
                                 class="img-fluid">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-xl-4 col-lg-4 col-sm-12">
                    <div class="h-100" id="map"></div>
                </div>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/global/js/frontend_leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/frontendControl.FullScreen.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/frontend_map.js')); ?>"></script>

    <script>
        'use strict'

        $(".listing__category__select2").select2({
            width: '100%',
            placeholder: '<?php echo app('translator')->get("Select Categories"); ?>',
        });

        var isAuthenticate = '<?php echo e(Auth::check()); ?>';

        $(document).ready(function () {
            $('.wishList').on('click', function () {
                var _this = this.id;
                let user_id = $(this).data('user');
                let listing_id = $(this).data('listing');
                let purchase_package_id = $(this).data('purchase');
                if (isAuthenticate == 1) {
                    wishList(user_id, listing_id, purchase_package_id, _this);
                } else {
                    window.location.href = '<?php echo e(route('login')); ?>';
                }
            });
        });


        function wishList(user_id = null, listing_id = null, purchase_package_id = null, id = null) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "<?php echo e(route('user.wishList')); ?>",
                type: "POST",
                data: {
                    user_id: user_id,
                    listing_id: listing_id,
                    purchase_package_id: purchase_package_id
                },
                success: function (data) {
                    if (data.data == 'added') {
                        $(`.save${id}`).removeClass("fal fa-heart");
                        $(`.save${id}`).addClass("fas fa-heart");
                        Notiflix.Notify.Success("Wishlist added");
                    }
                    if (data.data == 'remove') {
                        $(`.save${id}`).removeClass("fas fa-heart");
                        $(`.save${id}`).addClass("fal fa-heart");
                        Notiflix.Notify.Success("Wishlist removed");
                    }
                },
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\Projects\smith-and-clough-com.stackstaging.com\Live-files-project\Smith-and-Clough-Directory\resources\views/themes/classic/listing.blade.php ENDPATH**/ ?>