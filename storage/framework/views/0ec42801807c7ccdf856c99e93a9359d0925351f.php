<?php $__env->startSection('title',trans('Profile')); ?>

<?php $__env->startSection('banner_heading'); ?>
    <?php echo app('translator')->get('Profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="profile-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cover-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <div class="about d-md-flex">
                                    <img src="<?php echo e(getFile(optional($user_information)->driver, optional($user_information)->image)); ?>" class="img-fluid profile" alt="<?php echo e(config('basic.site_title')); ?>"/>
                                    <div>
                                        <h4 class="name">
                                            <?php echo app('translator')->get($user_information->firstname); ?> <?php echo app('translator')->get($user_information->lastname); ?>
                                            <?php if($user_information->identity_verify ==  2 && $user_information->address_verify ==  2): ?>
                                                <i
                                                    class="fas fa-check-circle"
                                                    aria-hidden="true"
                                                ></i>
                                            <?php endif; ?>
                                        </h4>

                                        <?php if($user_information->bio): ?>
                                            <p class="bio">
                                                <?php echo app('translator')->get($user_information->bio); ?>
                                            </p>
                                        <?php endif; ?>

                                        <div class="links">
                                            <?php if($user_information->website): ?>
                                                <a href="javascript:void(0)" ><i class="fas fa-globe"></i><?php echo app('translator')->get($user_information->website); ?></a>
                                            <?php endif; ?>

                                            <?php if($user_information->address): ?>
                                                <a href="javascript:void(0)"><i class="fas fa-location-arrow"></i><?php echo app('translator')->get($user_information->address); ?></a>
                                            <?php endif; ?>
                                            <?php if($user_information->created_at): ?>
                                                <a href="javascript:void(0)" ><i class="fas fa-calendar-alt"></i><?php echo app('translator')->get('Joined'); ?><?php echo e($user_information->created_at->format('M Y')); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $profileUrl = url()->current();
                            ?>

                            <div class="col-lg-6" id="user_copy_id">
                                <div class="right-wrapper">
                                    <div class="button-group">
                                        <input type="text" class="form-control copyText copy__profile__url opacity-0" value="<?php echo e($profileUrl); ?>">
                                        <button  class="copy-btn">
                                            <span id="profileId"><?php echo app('translator')->get('Copy profile'); ?></span>
                                            <i class="fal fa-copy" aria-hidden="true"></i>
                                        </button>
                                        <button class="share">
                                            <div id="shareBlock"></div>
                                            <i class="fal fa-share-alt" aria-hidden="true"></i>
                                        </button>

                                        <?php if(Auth::check() == true): ?>
                                            <?php if(count($check_follower) < 1): ?>
                                                <form action="<?php echo e(route('user.follow', $user_information->id)); ?>" method="post" class="d-inline-block">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn-custom follow-btn disabled cursor-follow-btn" type="submit">
                                                        <i class="fal fa-plus" aria-hidden="true"></i><?php echo app('translator')->get('follow'); ?>
                                                    </button>
                                                </form>
                                            <?php else: ?>
                                                <form action="<?php echo e(route('user.unFollow', $user_information->id)); ?>" method="post" class="d-inline-block">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn-custom follow-btn disabled cursor-follow-btn" type="submit" >
                                                        <i class="fal fa-minus" aria-hidden="true"></i><?php echo app('translator')->get('unFollow'); ?>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <form action="<?php echo e(route('user.unFollow', $user_information->id)); ?>"
                                                  method="post" class="d-inline-block">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn-custom follow-btn disabled cursor-follow-btn" type="submit">
                                                    <i class="fal fa-plus" aria-hidden="true"></i><?php echo app('translator')->get('Follow'); ?>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(count($user_information->get_social_links_user) > 0): ?>
                                        <div class="social-links">
                                            <?php $__currentLoopData = $user_information->get_social_links_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($social_link->social_url); ?>" target="_blank">
                                                    <i class="<?php echo e($social_link->social_icon); ?>" aria-hidden="true"></i>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="counts">
                                        <div class="count">
                                            <?php echo app('translator')->get('Listing'); ?>
                                            <span><?php echo e(count($user_information->get_listing)); ?></span>
                                        </div>
                                        <div class="count">
                                            <?php echo app('translator')->get('Total Views'); ?>
                                            <span><?php echo e($user_information->total_views_count); ?></span>
                                        </div>
                                        <div class="count">
                                            <?php echo app('translator')->get('Follower'); ?>
                                            <span><?php echo e(count($user_information->follower)); ?></span>
                                        </div>
                                        <div class="count">
                                            <?php echo app('translator')->get('Following'); ?>
                                            <span><?php echo e(count($user_information->following)); ?></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="profile-info-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="followers">
                        <h4><?php echo app('translator')->get('Followers'); ?></h4>
                        <?php $__empty_1 = true; $__currentLoopData = $user_information->follower; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="follower">
                                <a href="<?php echo e(route('profile', [slug(optional($follower->get_follwer_user)->firstname), optional($follower->get_follwer_user)->id])); ?>">
                                    <img src="<?php echo e(getFile(optional($follower->get_follwer_user)->driver, optional($follower->get_follwer_user)->image)); ?>" class="img-fluid" alt="<?php echo app('translator')->get('follower'); ?>"/>
                                </a>
                                <div class="creator-box">
                                    <div class="img-box">
                                        <img src="<?php echo e(getFile(optional($follower->get_follwer_user)->cover_driver, optional($follower->get_follwer_user)->cover_photo)); ?>" alt="<?php echo e(config('basic.site_title')); ?>" class="img-fluid cover"/>
                                        <img src="<?php echo e(getFile(optional($follower->get_follwer_user)->driver, optional($follower->get_follwer_user)->image)); ?>" class="img-fluid profile" alt="<?php echo e(config('basic.site_title')); ?>"/>
                                    </div>

                                    <div class="text-box">
                                        <a class="creator-name" href="<?php echo e(route('profile', [slug(optional($follower->get_follwer_user)->firstname), optional($follower->get_follwer_user)->id])); ?>">
                                            <?php echo app('translator')->get(optional($follower->get_follwer_user)->firstname); ?> <?php echo app('translator')->get(optional($follower->get_follwer_user)->lastname); ?>
                                        </a>
                                        <span><?php echo app('translator')->get('Member since'); ?> <?php echo e(optional($follower->get_follwer_user)->created_at->format('M Y')); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="d-flex justify-content-center"><?php echo app('translator')->get('No Followers'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="followers">
                        <h4><?php echo app('translator')->get('Following'); ?></h4>
                        <?php $__empty_1 = true; $__currentLoopData = $user_information->following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="follower">
                                <a href="<?php echo e(route('profile', [slug(optional($following->get_following_user)->firstname), optional($following->get_following_user)->id])); ?>">
                                    <img src="<?php echo e(getFile(optional($following->get_following_user)->driver, optional($following->get_following_user)->image)); ?>" class="img-fluid" alt="<?php echo app('translator')->get('follower'); ?>"/>
                                </a>
                                <div class="creator-box">
                                    <div class="img-box">
                                        <img src="<?php echo e(getFile(optional($following->get_following_user)->cover_driver, optional($following->get_following_user)->cover_photo)); ?>" alt="<?php echo e(config('basic.site_title')); ?>" class="img-fluid cover"/>
                                        <img src="<?php echo e(getFile(optional($following->get_following_user)->driver, optional($following->get_following_user)->image)); ?>" class="img-fluid profile" alt="<?php echo e(config('basic.site_title')); ?>"/>
                                    </div>
                                    <div class="text-box">
                                        <a class="creator-name" href="<?php echo e(route('profile', [slug(optional($following->get_following_user)->firstname), optional($following->get_following_user)->id])); ?>">
                                            <?php echo app('translator')->get(optional($following->get_following_user)->firstname); ?> <?php echo app('translator')->get(optional($following->get_following_user)->lastname); ?>
                                        </a>
                                        <span><?php echo app('translator')->get('Member since'); ?> <?php echo e(optional($following->get_following_user)->created_at->format('M Y')); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="d-flex justify-content-center"><?php echo app('translator')->get('No Followings'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="side-box">
                        <h5><?php echo app('translator')->get('Contact Creator'); ?></h5>
                        <form action="<?php echo e(route('user.viewerSendMessageToListingUser', $user_information->id)); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row g-3">
                                <div class="input-box col-12">
                                    <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" autocomplete="off" name="name"
                                        <?php if(Auth::check() == true): ?>
                                            <?php if(Auth::id() == $user_id): ?>
                                                placeholder="<?php echo app('translator')->get('Full Name'); ?>"
                                            <?php else: ?>
                                                value="<?php echo app('translator')->get(Auth::user()->firstname); ?> <?php echo app('translator')->get(Auth::user()->lastname); ?>"
                                            <?php endif; ?>
                                        <?php else: ?>
                                            placeholder="<?php echo app('translator')->get('Full Name'); ?>"
                                        <?php endif; ?> />
                                    <div class="invalid-feedback">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="input-box col-12">
                                 <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="30" rows="3" autocomplete="off" name="message" placeholder="<?php echo app('translator')->get('Your message'); ?>"></textarea>
                                    <div class="invalid-feedback">
                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="input-box col-12">
                                    <button class="btn-custom w-100"><?php echo app('translator')->get('send'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php if(count($latest_listings) > 0): ?>
                        <div class="created-listing">
                            <h4><?php echo app('translator')->get('Listings'); ?></h4>
                            <div class="row g-4">
                                <?php $__empty_1 = true; $__currentLoopData = $latest_listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $latest_listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php
                                        $total = $latest_listing->reviews()[0]->total;
                                        $average_review = $latest_listing->reviews()[0]->average;
//                                        $categoryIds = json_decode($latest_listing->category_id);
//                                        $allCategories = $latest_listing->getCategories($categoryIds);
                                    ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="listing-box">
                                            <div class="img-box">
                                                <img class="img-fluid" src="<?php echo e(getFile($latest_listing->driver, $latest_listing->thumbnail)); ?>" alt="<?php echo e(config('basic.site_title')); ?>"/>
                                                <button class="save wishList" type="button" id="<?php echo e($key); ?>" data-user="<?php echo e(optional($latest_listing->get_user)->id); ?>" data-purchase="<?php echo e($latest_listing->purchase_package_id); ?>" data-listing="<?php echo e($latest_listing->id); ?>">
                                                    <?php if($latest_listing->get_favourite_count > 0): ?>
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
                                                            $j++;
                                                        ?>
                                                    <?php endfor; ?>

                                                    <?php if($average_review != intval($average_review)): ?>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <?php
                                                            $j++;
                                                        ?>
                                                    <?php endif; ?>

                                                    <?php if($average_review == 0 || $average_review != null): ?>
                                                        <?php for($j; $j < 5; $j++): ?>
                                                            <i class="far fa-star"></i>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    <span>(<?php echo app('translator')->get($total.' reviews'); ?>)</span>
                                                </div>
                                                <a class="title" href="<?php echo e(route('listing-details', [slug($latest_listing->title), $latest_listing->id] )); ?>">
                                                    <?php echo app('translator')->get(Str::limit($latest_listing->title, 20)); ?>
                                                </a>
                                                <p></p>
                                                <a class="author" href="javascript:void(0)" >
                                                    <?php echo app('translator')->get($user_information->firstname); ?> <?php echo app('translator')->get($user_information->lastname); ?>
                                                </a>
                                                <p class="mb-2">
                                                    <span class=""><?php echo app('translator')->get('Category'); ?>: </span> <?php echo e($latest_listing->getCategoriesName()); ?>

                                                </p>
                                                </p>
                                                <p class="address mt-1">
                                                    <i class="fal fa-map-marker-alt"></i>
                                                    <?php echo app('translator')->get($latest_listing->address); ?> , <?php echo app('translator')->get(optional(optional($latest_listing->get_place)->details)->place); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="d-flex justify-content-center">
                                        <span class="text-center"><?php echo app('translator')->get('No Data Found'); ?></span>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <?php echo e($latest_listings->links()); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';

        var isAuthenticate = '<?php echo e(Auth::check()); ?>';
        $(document).on('click', '.copy-btn', function () {
            var _this = $(this)[0];
            var copyText = $(this).siblings('input');
            $(copyText).prop('disabled', false);
            copyText.select();
            document.execCommand("copy");
            $(copyText).prop('disabled', true);
            $(this).text('Coppied');
            setTimeout(function () {
                $(_this).text('');
                $(_this).html('Copy Profile <i class="fal fa-copy"></i>');
            }, 500)

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

        var newApp = new Vue({
            el: "#user_copy_id",
            data: {
                item: {
                    active: 0,
                },
            },
            mounted() {
            },
            methods: {
                copyTestingCode(copyText) {
                    navigator.clipboard.writeText(copyText);
                    Notiflix.Notify.Success(`Copied: ${copyText}`);
                },
            },
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/profile.blade.php ENDPATH**/ ?>