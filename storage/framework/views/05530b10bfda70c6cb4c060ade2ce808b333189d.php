<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Listing Edit'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/esri-leaflet-geocoder.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/leaflet-search.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/leaflet.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/Control.FullScreen.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/leaflet-search-two.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/tagsinput.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/image-uploader.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/select2.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrapicons-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/summernote.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid" id="content">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="switcher navigator">
                    <button tab-id="tab1" class="tab active">
                        <?php echo app('translator')->get('Basic Info'); ?>
                        <?php if($errors->has('title') || $errors->has('category_id') || $errors->has('description') || $errors->has('place_id') || $errors->has('lat') || $errors->has('long')): ?>
                            <?php
                                $tabOne = ['title', 'category_id', 'email', 'phone', 'description', 'place_id', 'lat', 'long'];
                            ?>
                            <span class="text-danger" type="button" data-custom-class="custom-tooltip"
                                  data-toggle="tooltip" data-html="true" data-title="
                                <div class='text-start px-3 text-white'>
                                   <ul class=''>
                                      <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($key, $tabOne)): ?>
                                <li class='text-white'><?php echo e($error[0]); ?></li>
                                        <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                             </div>">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        <?php endif; ?>
                    </button>

                    <?php if($single_package_infos->is_video == 1): ?>
                        <button tab-id="tab2" class="tab">
                            <?php echo app('translator')->get('Video'); ?>
                            <?php if($errors->has('youtube_video_id')): ?>
                                <?php
                                    $tabTwo = ['youtube_video_id'];
                                ?>

                                <span class="text-danger" type="button" data-custom-class="custom-tooltip"
                                      data-toggle="tooltip" data-html="true" data-title="
                                    <div class='text-start px-3 text-white'>
                                       <ul class=''>
                                          <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($key, $tabTwo)): ?>
                                    <li class='text-white'><?php echo e($error[0]); ?></li>
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                 </div>">
                                    <i class="fa fa-info-circle"></i>
                                </span>
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>

                    <button tab-id="tab3" class="tab">
                        <?php echo app('translator')->get('Photos'); ?>
                        <?php if($errors->has('thumbnail')): ?>
                            <?php
                                $tabThree = ['thumbnail'];
                            ?>
                            <span class="text-danger" type="button" data-custom-class="custom-tooltip"
                                  data-toggle="tooltip" data-html="true" data-title="
                                <div class='text-start px-3 text-white'>
                                   <ul class=''>
                                      <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($key, $tabThree)): ?>
                                <li class='text-white'><?php echo e($error[0]); ?></li>
                                        <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                             </div>">
                                <i class="fa fa-info-circle"></i>
                            </span>
                        <?php endif; ?>
                    </button>

                    <?php if($single_package_infos->is_amenities == 1): ?>
                        <button tab-id="tab4" class="tab">
                            <?php echo app('translator')->get('Amenities'); ?>
                            <?php if($errors->has('amenity_id.*')): ?>
                                <?php
                                    $tabFour = ['amenity_id'];
                                ?>
                                <span class="text-danger" type="button" data-custom-class="custom-tooltip"
                                      data-toggle="tooltip" data-html="true" data-title="
                                    <div class='text-start px-3 text-white'>
                                       <ul class=''>
                                          <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($key, $tabFour)): ?>
                                    <li class='text-white'><?php echo e($error[0]); ?></li>
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                 </div>">
                                    <i class="fa fa-info-circle"></i>
                                </span>
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>

                    <?php if($single_package_infos->is_product == 1): ?>
                        <button tab-id="tab5" class="tab">
                            <?php echo app('translator')->get('Products'); ?>
                            <?php if($errors->has('product_title.*') || $errors->has('product_price.*') || $errors->has('product_description.*') || $errors->has('product_thumbnail.*')): ?>
                                <?php
                                    $tabFive = ['product_title', 'product_price', 'product_description', 'product_thumbnail'];
                                ?>
                                <span class="text-danger" type="button" data-custom-class="custom-tooltip"
                                      data-toggle="tooltip" data-html="true" data-title="
                                    <div class='text-start px-3 text-white'>
                                       <ul class=''>
                                          <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($key, $tabFive)): ?>
                                    <li class='text-white'><?php echo e($error[0]); ?></li>
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                 </div>">
                                    <i class="fal fa-info-circle"></i>
                                </span>
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>

                    <?php if($single_package_infos->seo == 1): ?>
                        <button tab-id="tab6" class="tab">
                            <?php echo app('translator')->get('SEO'); ?>
                            <?php if($errors->has('seo_image') || $errors->has('meta_title') || $errors->has('meta_keywords') || $errors->has('meta_description')): ?>
                                <?php
                                    $tabSix = ['seo_image', 'meta_title', 'meta_keywords', 'meta_description'];
                                ?>
                                <span class="text-danger" type="button" data-custom-class="custom-tooltip"
                                      data-toggle="tooltip" data-html="true" data-title="
                                    <div class='text-start px-3 text-white'>
                                       <ul class=''>
                                          <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(in_array($key, $tabSix)): ?>
                                    <li class='text-white'><?php echo e($error[0]); ?></li>
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                 </div>">
                                    <i class="fal fa-info-circle"></i>
                                </span>
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>

                    <?php if($single_package_infos->is_whatsapp == 1 || $single_package_infos->is_messenger == 1): ?>
                        <button tab-id="tab7" class="tab">
                            <?php echo app('translator')->get('Communication'); ?>
                            <?php if($errors->has('whatsapp_number') || $errors->has('messenger_app_id') || $errors->has('messenger_page_id')): ?>
                                <?php
                                    $tabSeven = ['whatsapp_number', 'fb_app_id', 'fb_page_id'];
                                ?>

                                <span class="text-danger" type="button" data-bs-custom-class="custom-tooltip"
                                      data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="
                            <div class='text-start px-3 text-white'>
                               <ul class=''>
                                  <?php $__currentLoopData = $errors->getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($key, $tabSeven)): ?>
                                        <li class='text-white'><?php echo e($error[0]); ?></li>
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </ul>
                            </div>">
                            <i class="fal fa-info-circle"></i>
                        </span>
                            <?php endif; ?>
                        </button>
                    <?php endif; ?>
                </div>

                <form action="<?php echo e(route('admin.listingUpdate',$id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="media mt-0 mb-2 d-flex justify-content-end">
                        <a href="<?php echo e(route('admin.viewListings')); ?>" class="btn btn-sm  btn-primary mr-2">
                            <span><i class="fas fa-arrow-left"></i> <?php echo app('translator')->get('Back'); ?></span>
                        </a>
                    </div>

                    <div id="tab1" class="add-listing-form content active">
                        <div class="main row gy-4">
                            <div class="col-xl-12">
                                <h3 class="mb-3 listing-tab-heading"><?php echo app('translator')->get('Basic Info'); ?></h3>
                                <div class="form">
                                    <div class="basic-form">
                                        <div class="row g-3">
                                            <div class="input-box col-md-6">
                                                <input class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       type="text" name="title"
                                                       value="<?php echo e(old('title', $single_listing_infos->title)); ?>"
                                                       placeholder="<?php echo app('translator')->get('title'); ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <?php
                                                $categoryIds = $single_listing_infos->getCategories();
                                            ?>
                                            <div class="input-box col-md-6">
                                                <select
                                                    class="listing__category__select2 form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="category_id[]" multiple data-categories="<?php echo e($single_package_infos->no_of_categories_per_listing); ?>">
                                                    <?php $__currentLoopData = $all_listings_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>" <?php $__currentLoopData = $categoryIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($category->id == $item->id): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                            <?php echo app('translator')->get(optional($item->details)->name); ?>
                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="input-box col-md-6">
                                                <input name="email"
                                                       class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       placeholder="<?php echo app('translator')->get('Email'); ?>"
                                                       value="<?php echo e(old('email', $single_listing_infos->email)); ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                            <div class="input-box col-md-6">
                                                <input class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       type="text" placeholder="<?php echo app('translator')->get('phone'); ?>" name="phone"
                                                       value="<?php echo e(old('phone',  $single_listing_infos->phone )); ?>"/>
                                                <div class="invalid-feedback">
                                                    <?php $__errorArgs = ['phone'];
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
                                                <textarea class="form-control summernote <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" id="summernote" rows="15" value="<?php echo e(old('description', $single_listing_infos->description )); ?>" placeholder="<?php echo app('translator')->get('Description'); ?>"><?php echo e(old('description', $single_listing_infos->description )); ?></textarea>

                                                <div class="invalid-feedback">
                                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <h3 class="mb-4 mt-4 listing-tab-heading"><?php echo app('translator')->get('Location'); ?></h3>
                                <div class="map-box">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form">
                                                <div class="row g-3 location-form">
                                                    <div class="input-box col-md-6">
                                                        <select
                                                            class="js-example-basic-single place_id form-control <?php $__errorArgs = ['place_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="place_id" name="place_id">
                                                            <option selected disabled><?php echo app('translator')->get('Select Place'); ?></option>
                                                            <?php $__currentLoopData = $all_places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item->id); ?>"
                                                                        <?php echo e($item->id == $single_listing_infos->place_id ? 'selected' : ''); ?> data-name="<?php echo e(optional($item->details)->place); ?>"
                                                                        data-lat="<?php echo e($item->lat); ?>"
                                                                        data-long="<?php echo e($item->long); ?>"><?php echo e(optional($item->details)->place); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['place_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="input-box col-md-6">
                                                        <input id="address-search"
                                                               class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               name="address"
                                                               value="<?php echo e(old('address', $single_listing_infos->address)); ?>"
                                                               placeholder="<?php echo app('translator')->get('address'); ?>" type="text"
                                                               autocomplete="off"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="input-box col-md-6">
                                                        <input class="form-control <?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               id="lat" placeholder="<?php echo app('translator')->get('lat'); ?>" name="lat"
                                                               value="<?php echo e(old('lat', $single_listing_infos->lat)); ?>"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                    <div class="input-box col-md-6">
                                                        <input class="form-control <?php $__errorArgs = ['long'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                               placeholder="<?php echo app('translator')->get('long'); ?>" id="lng" name="long"
                                                               value="<?php echo e(old('long', $single_listing_infos->long)); ?>"
                                                               type="text"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['long'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div id="map">
                                                <p>
                                                    <?php echo app('translator')->get('You can also set location moving marker'); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if($single_package_infos->is_business_hour == 1): ?>
                                <div class="col-xl-6 col-md-6 col-sm-12">
                                    <h3 class="mb-4 mt-5 listing-tab-heading"><?php echo app('translator')->get('Business Hours'); ?></h3>
                                    <div class="form business-hour">
                                        <?php
                                            $oldWorkingDaysCount = max(old('working_day', $business_hours) ? count(old('working_day', $business_hours)) : 1, 1);
                                        ?>

                                        <?php if($oldWorkingDaysCount > 0): ?>
                                            <?php for($i = 0; $i < $oldWorkingDaysCount; $i++): ?>
                                                <div
                                                    class="d-sm-flex justify-content-between delete_this removeBusinessHourInputField <?php $__errorArgs = ["working_day.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <div class="input-box w-100 my-1 mx-sm-1">
                                                        <select class="js-example-basic-single form-control"
                                                                name="working_day[]">
                                                            <option
                                                                value="Monday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Monday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Monday'); ?></option>
                                                            <option
                                                                value="Tuesday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Tuesday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Tuesday'); ?></option>
                                                            <option
                                                                value="Wednesday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Wednesday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Wednesday'); ?></option>
                                                            <option
                                                                value="Thursday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Thursday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Thursday'); ?></option>
                                                            <option
                                                                value="Friday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Friday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Friday'); ?></option>
                                                            <option
                                                                value="Saturday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Saturday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Saturday'); ?></option>
                                                            <option
                                                                value="Sunday" <?php echo e(old("working_day.$i", $business_hours[$i]->working_day ?? '') == 'Sunday' ? 'selected' : ''); ?>><?php echo app('translator')->get('Sunday'); ?></option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ["working_day.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="input-box w-100 my-1 me-1">
                                                            <input type="time" name="start_time[]" value="<?php echo e(old("start_time.$i", $business_hours[$i]->start_time ?? '')); ?>" class="form-control <?php $__errorArgs = ["start_time.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo app('translator')->get('Start Hour'); ?>"/>
                                                            <div class="invalid-feedback">
                                                                <?php $__errorArgs = ["start_time.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="input-box w-100 my-1 me-1">
                                                            <input type="time" name="end_time[]"
                                                                   value="<?php echo e(old("end_time.$i", $business_hours[$i]->end_time ?? '')); ?>"
                                                                   class="form-control h-100 <?php $__errorArgs = ["end_time.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                   placeholder="<?php echo app('translator')->get('End Hour'); ?>"/>
                                                            <div class="invalid-feedback">
                                                                <?php $__errorArgs = ["end_time.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="input-box my-1 me-1">
                                                            <?php if($i == 0): ?>
                                                                <button class="btn-custom add-new ml-2" type="button"
                                                                        id="add_business_hour">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            <?php else: ?>
                                                                <button
                                                                    class="btn-custom add-new btn-custom-danger remove_business_hour_input_field_block"
                                                                    type="button">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                        <div class="new_business_hour_form">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <h3 class="mt-5 mb-4 listing-tab-heading"><?php echo app('translator')->get('Websites And Social Links'); ?></h3>

                                <div class="form website_social_links">
                                    <?php
                                        $oldSocialCounts = max(old('social_icon', $social_links) ? count(old('social_icon', $social_links)) : 1, 1);
                                    ?>

                                    <?php if($oldSocialCounts > 0): ?>
                                        <?php for($i = 0; $i < $oldSocialCounts; $i++): ?>
                                            <div
                                                class="d-flex justify-content-between append_new_social_form removeSocialLinksInput">
                                                <div class="input-group mt-1">
                                                    <input type="text" name="social_icon[]"
                                                           value="<?php echo e(old("social_icon.$i", $social_links[$i]->social_icon ?? '')); ?>"
                                                           class="form-control demo__icon__picker iconpicker1 <?php $__errorArgs = ["social_icon.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           placeholder="Pick a icon" aria-label="Pick a icon"
                                                           aria-describedby="basic-addon1" readonly>

                                                    <div class="invalid-feedback">
                                                        <?php $__errorArgs = ["social_icon.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>

                                                <div class="input-box w-100 my-1 me-1">
                                                    <input type="url" name="social_url[]"
                                                           value="<?php echo e(old("social_url.$i", $social_links[$i]->social_url ?? '')); ?>"
                                                           class="form-control h-100 <?php $__errorArgs = ["social_url.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           placeholder="<?php echo app('translator')->get('URL'); ?>"/>
                                                    <?php $__errorArgs = ["social_url.$i"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                </div>
                                                <div class="my-1 me-1">
                                                    <?php if($i == 0): ?>
                                                        <button class="btn-custom add-new border-0" type="button"
                                                                id="add_social_links">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    <?php else: ?>
                                                        <button
                                                            class="btn-custom add-new btn-custom-danger remove_social_link_input_field"
                                                            type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    <?php endif; ?>

                                    <div class="new_social_links_form append_new_social_form">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($single_package_infos->is_video == 1): ?>
                        <div id="tab2" class="add-listing-form content">
                            <div class="main row gy-4">
                                <div class="col-xl-6">
                                    <h3 class="mb-3">
                                        <span class="listing-tab-heading">  <?php echo app('translator')->get('Video'); ?>  </span> <span
                                            class="optional">(<?php echo app('translator')->get('Youtube Video Id'); ?>)</span>
                                    </h3>
                                    <div class="form">
                                        <div class="row g-3">
                                            <div class="input-box col-md-12">
                                                <input class="form-control social-admin-listing-edit mb-3" type="text"
                                                       value="<?php echo e(old('youtube_video_id', $single_listing_infos->youtube_video_id)); ?>"
                                                       name="youtube_video_id" placeholder="<?php echo app('translator')->get('Youtube video id'); ?>"/>
                                            </div>
                                            <div class="col-12">
                                                <div class="youtube nk-plain-video">
                                                    <span class="nk-video-plain-toggle">
                                                       <span class="nk-video-icon">
                                                          <svg class="svg-inline--fa fa-play fa-w-14 pl-5"
                                                               aria-hidden="true" data-prefix="fa" data-icon="play"
                                                               role="img" xmlns="http://www.w3.org/2000/svg"
                                                               viewBox="0 0 448 512" data-fa-i2svg>
                                                             <path fill="#184af9"
                                                                   d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/>
                                                          </svg>
                                                       </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div id="tab3" class="add-listing-form content">
                        <div class="main row gy-4">
                            <div class="col-xl-5">
                                <h3 class="mb-3 listing-tab-heading"><?php echo app('translator')->get('Thumbnail'); ?></h3>
                                <div class="upload-img thumbnail">
                                    <div class="form">
                                        <div class="img-box">
                                            <div class="img-box">
                                                <input accept="image/*" type="file" onchange="previewImage('frame')"
                                                       name="thumbnail"/>
                                                <span class="select-file"
                                                ><?php echo app('translator')->get('Select Image'); ?></span>
                                                <img id="frame"
                                                     src="<?php echo e(getFile($single_listing_infos->driver, $single_listing_infos->thumbnail)); ?>"
                                                     class="img-fluid"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($single_package_infos->is_image == 1): ?>
                                <div class="col-xl-7 custom-margin">
                                    <h3 class="mb-3 listing-tab-heading"><?php echo app('translator')->get('Images'); ?></h3>
                                    <div class="listing-image no_of_listing_image"
                                         data-listingimage="<?php echo e($single_package_infos->is_image == 1 && $single_package_infos->no_of_img_per_listing == null  ? 'unlimited' : $single_package_infos->no_of_img_per_listing); ?>"></div>
                                    <span
                                        class="text-danger"> <?php $__errorArgs = ['listing_image.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($single_package_infos->is_amenities == 1): ?>
                        <div id="tab4" class="add-listing-form content">
                            <div class="main row gy-4">
                                <div class="col-xl-6">
                                    <h3 class="mb-3 listing-tab-heading"><?php echo app('translator')->get('Amenities'); ?></h3>
                                    <div class="form">
                                        <div class="row g-3 amenities_select2__background">
                                            <div class=" input-box col-md-12">
                                                <select class="amenities_select2 form-control" name="amenity_id[]"
                                                        multiple
                                                        data-amenities="<?php echo e($single_package_infos->no_of_amenities_per_listing); ?>">
                                                    <?php $__currentLoopData = $all_amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"
                                                                <?php $__empty_1 = true; $__currentLoopData = $listing_aminities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing_aminity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($listing_aminity->amenity_id == $item->id ): ?> selected <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <?php endif; ?>
                                                        ><?php echo e($item->details->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($single_package_infos->is_product == 1): ?>
                        <div id="tab5" class="add-listing-form content">
                            <div class="d-flex justify-content-start">
                                <h3 class="me-3 mr-3"><?php echo app('translator')->get('Product'); ?></h3>
                                <button class="btn-custom-product add-new-product" type="button" id="add_products"
                                        data-products="<?php echo e($single_package_infos->no_of_product == null ? 'unlimited' : $single_package_infos->no_of_product - 1); ?>">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('Add More'); ?> (<span class="product_count">
                                        <?php if($single_package_infos->no_of_product == null): ?>
                                            <?php echo app('translator')->get('unlimited'); ?>
                                        <?php else: ?>
                                            <?php echo e($single_package_infos->no_of_product - 1); ?>

                                        <?php endif; ?></span>)
                                </button>
                            </div>
                            <div class="main row gy-4 new_product_form">
                                <?php
                                    $productCounts = max(old('product_title', $listing_products) ? count(old('product_title', $listing_products)) : 1, 1);
                                ?>
                                <?php if($productCounts > 0): ?>
                                    <?php for($i = 0; $i < $productCounts; $i++): ?>
                                        <?php ($productKey = $i + 1); ?>
                                        <div class="col-xl-6 removeProductForm">
                                            <div class="form new__product__form">
                                                <?php if($i > 0): ?>
                                                    <span class="product-form-close delete_desc"> <i
                                                            class="fa fa-times"></i> </span>
                                                <?php endif; ?>
                                                <div class="row g-3">
                                                    <input type="hidden" name="product_id[]"
                                                           value="<?php echo e(old("product_id.$i", $listing_products[$i]->id ?? '')); ?>">
                                                    <div class="input-box col-md-6">
                                                        <input class="form-control" type="text" name="product_title[]"
                                                               value="<?php echo e(old("product_title.$i", $listing_products[$i]->product_title ?? '')); ?>"
                                                               placeholder="<?php echo app('translator')->get('Title'); ?>"/>
                                                    </div>
                                                    <div class="input-box col-md-6">
                                                        <input class="form-control" type="text" name="product_price[]"
                                                               value="<?php echo e(old("product_price.$i", $listing_products[$i]->product_price ?? '')); ?>"
                                                               placeholder="<?php echo app('translator')->get('Price'); ?>"/>
                                                    </div>
                                                    <div class="input-box col-12">
                                                        <textarea class="form-control" cols="30" rows="3"
                                                                  name="product_description[]"
                                                                  placeholder="<?php echo app('translator')->get('Description'); ?>"><?php echo e(old("product_description.$i", $listing_products[$i]->product_description ?? '')); ?></textarea>
                                                    </div>

                                                    <div class="pe-2 product__images__width">
                                                        <div class="input-box col-12 no-of-img-per-product">
                                                            <div class="product-image no_of_product_image"
                                                                 id="product-image<?php echo e($productKey); ?>"
                                                                 data-productid="<?php echo e($listing_products[$i]->id ?? ''); ?>"
                                                                 data-productimage="<?php echo e($single_package_infos->is_product == 1 && $single_package_infos->no_of_img_per_product == null  ? 'unlimited' : $single_package_infos->no_of_img_per_product); ?>"
                                                                 data-singleproductimage="<?php echo e($listing_products[$i]->get_product_image->map(function ($image){
                                                $image->src = getFile($image->driver, $image->product_image);
                                                return $image;
                                            }) ?? ''); ?>"></div>
                                                            <span
                                                                class="text-danger"> <?php $__errorArgs = ["product_image.$productKey.*"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> </span>
                                                        </div>
                                                    </div>

                                                    <div class="upload-img thumbnail">
                                                        <div class="form">
                                                            <div class="img-box product-thumbnail">
                                                                <input accept="image/*" type="file"
                                                                       onchange="previewImage('product_thumbnail')"
                                                                       name="product_thumbnail[<?php echo e($i); ?>]"/>
                                                                <span
                                                                    class="select-file"><?php echo app('translator')->get('Product Thumbnail'); ?></span>
                                                                <img id="product_thumbnail"
                                                                     src="<?php echo e(getFile($listing_products[$i]->driver, $listing_products[$i]->product_thumbnail)); ?>"
                                                                     class="img-fluid"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($single_package_infos->seo == 1): ?>
                        <div id="tab6" class="add-listing-form content">
                            <div class="main row gy-4">
                                <div class="col-xl-4">
                                    <div class="upload-img thumbnail">
                                        <div class="form">
                                            <div class="img-box">
                                                <input accept="image/*" type="file"
                                                       onchange="previewImage('meta_image')" name="seo_image"/>
                                                <span class="select-file"><?php echo app('translator')->get('Select Image'); ?></span>
                                                <img id="meta_image"
                                                     src="<?php echo e(getFile(@$listing_seo->driver, @$listing_seo->seo_image)); ?>"
                                                     class="img-fluid"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <h3 class="mb-3 listing-tab-heading"><?php echo app('translator')->get('SEO & META Keywords'); ?></h3>
                                    <div class="form">
                                        <div class="row g-3">
                                            <div class="input-box col-md-12">
                                                <input class="form-control social-admin-listing-edit mb-2" type="text"
                                                       name="meta_title" placeholder="<?php echo app('translator')->get('title'); ?>"
                                                       value="<?php echo e(@$listing_seo->meta_title); ?>"/>
                                            </div>

                                            <div class="input-box col-md-12">
                                                <input
                                                    class="form-control mb-1 tags_input social-admin-listing-edit mb-3"
                                                    type="text" placeholder="<?php echo app('translator')->get('keywords'); ?>" name="meta_keywords"
                                                    value="<?php echo e(@$listing_seo->meta_keywords); ?>" data-role="tagsinput"/>
                                            </div>

                                            <div class="input-box col-12">
                                                <textarea class="form-control seo__desc" cols="30" rows="3"
                                                          name="meta_description"
                                                          placeholder="<?php echo app('translator')->get('description'); ?>"><?php echo e(@$listing_seo->meta_description); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($single_package_infos->is_whatsapp == 1 || $single_package_infos->is_messenger == 1): ?>
                        <div id="tab7" class="add-listing-form content active">
                            <?php if($single_package_infos->is_messenger == 1): ?>
                                <div class="main row gy-4">
                                    <div class="col-xl-6">
                                        <h3 class="mb-3"><?php echo app('translator')->get('FB Messenger Control'); ?></h3>
                                        <div class="form">
                                            <div class="basic-form p-4">
                                                <div class="row g-3">
                                                    <div class="input-box col-md-6">
                                                        <input
                                                            class="form-control <?php $__errorArgs = ['fb_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            type="text" name="fb_app_id"
                                                            value="<?php echo e(old('fb_app_id',  $single_listing_infos->fb_app_id )); ?>"
                                                            placeholder="<?php echo app('translator')->get('App Id'); ?>"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['fb_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>

                                                    <div class="input-box col-md-6">
                                                        <input
                                                            class="form-control <?php $__errorArgs = ['fb_page_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            type="text" name="fb_page_id"
                                                            value="<?php echo e(old('fb_page_id',  $single_listing_infos->fb_page_id )); ?>"
                                                            placeholder="<?php echo app('translator')->get('Page Id'); ?>"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['fb_page_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h3 class="custom__opacity"><?php echo app('translator')->get('test'); ?></h3>
                                        <div class="card card-primary shadow">
                                            <div
                                                class="card-header bg-primary text-white py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h5 class="m-0 font-weight-bold text-white"><?php echo app('translator')->get('Instructions'); ?></h5>

                                            </div>

                                            <div class="card-body">
                                                <strong class="text-dark"><?php echo app('translator')->get("Step 1"); ?> : </strong> <?php echo app('translator')->get("Get Your Facebook Page ID following this article."); ?>
                                                <a href="https://www.facebook.com/help/1503421039731588" target="_blank"><?php echo app('translator')->get("click here"); ?></a>
                                                <br>
                                                <br>

                                                <strong class="text-dark"><?php echo app('translator')->get("Step 2"); ?> : </strong> <?php echo app('translator')->get("Get Your Facebook APP ID following this article."); ?>
                                                <a href="https://www.wikihow.com/Get-an-App-ID-on-Facebook" target="_blank"><?php echo app('translator')->get("click here"); ?></a>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($single_package_infos->is_whatsapp == 1): ?>
                                <div class="main row gy-4">
                                    <div class="col-xl-12">
                                        <h3 class="mb-3"><?php echo app('translator')->get('Whatsapp Chat Control'); ?></h3>
                                        <div class="form">
                                            <div class="basic-form p-4">
                                                <div class="row g-3">
                                                    <div class="input-box col-md-6">
                                                        <input
                                                            class="form-control <?php $__errorArgs = ['whatsapp_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            type="text" name="whatsapp_number"
                                                            value="<?php echo e(old('whatsapp_number',  $single_listing_infos->whatsapp_number )); ?>" placeholder="<?php echo app('translator')->get('whatsapp number'); ?>"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['whatsapp_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>

                                                    <div class="input-box col-md-6">
                                                        <input
                                                            class="form-control <?php $__errorArgs = ['replies_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            type="text" name="replies_text"
                                                            value="<?php echo e(old('replies_text', $single_listing_infos->replies_text )); ?>" placeholder="<?php echo app('translator')->get('Typically replies within a day'); ?>"/>
                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['replies_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>

                                                    <div class="input-box col-md-12">
                                                        <textarea class="form-control summernote <?php $__errorArgs = ['body_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="body_text" id="summernote" rows="15" value="<?php echo e(old('body_text', $single_listing_infos->body_text )); ?>"><?php echo e(old('body_text', $single_listing_infos->body_text)); ?></textarea>

                                                        <div class="invalid-feedback">
                                                            <?php $__errorArgs = ['body_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo app('translator')->get($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-12 mb-3 justify-content-start d-flex mt-4 mb-4">
                        <button type="submit" class="btn-custom btn-custom-two">
                            <i class="fas fa-check-circle" aria-hidden="true"></i><?php echo app('translator')->get(' Save Changes'); ?>
                        </button>
                    </div>
                </form>
            </div>
            <?php $__env->stopSection(); ?>


    <?php $__env->startPush('js'); ?>
        <script src="<?php echo e(asset('assets/global/js/leaflet.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/Control.FullScreen.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/esri-leaflet.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/leaflet-search.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/esri-leaflet-geocoder.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/bootstrap-geocoder.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/map.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/admin/js/summernote.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/tagsinput.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/image-uploader.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/global/js/bootstrapicon-iconpicker.js')); ?>"></script>


        <script>
            'use strict'

            $('.summernote').summernote({
                height: 100,
                callbacks: {
                    onBlurCodeview: function() {
                        let codeviewHtml = $(this).siblings('div.note-editor').find('.note-codable').val();
                        $(this).val(codeviewHtml);
                    }
                }
            });

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
            const tabs = document.getElementsByClassName("tab");
            const contents = document.getElementsByClassName("content");
            for (const element of tabs) {
                const tabId = element.getAttribute("tab-id");
                const content = document.getElementById(tabId);
                element.addEventListener("click", () => {
                    for (const t of tabs) {
                        t.classList.remove("active");
                    }
                    for (const c of contents) {
                        c.classList.remove("active");
                    }
                    element.classList.add("active");
                    content.classList.add("active");
                });
            }
            const previewImage = (id) => {
                document.getElementById(id).src = URL.createObjectURL(event.target.files[0]);
            };

            $(document).ready(function () {
                let maximum_no_of_image_per_listing = $('.no_of_listing_image').data('listingimage');
                var listing_images = <?php echo json_encode($listing_images->toArray()); ?>;
                let preloaded = [];
                listing_images.forEach(function (value, index) {
                    preloaded.push({
                        id: value.id,
                        product_id: value.product_id,
                        image_name: value.listing_image,
                        src: value.src
                    });
                });

                let listingImageOptions = {
                    preloaded: preloaded,
                    imagesInputName: 'listing_image',
                    preloadedInputName: 'old_listing_image',
                    label: 'Drag & Drop files here or click to browse images',
                    extensions: ['.jpg', '.jpeg', '.png'],
                    mimes: ['image/jpeg', 'image/png'],
                    maxSize: 5242880
                };

                if (maximum_no_of_image_per_listing != 'unlimited') {
                    listingImageOptions.maxFiles = maximum_no_of_image_per_listing;
                }
                $('.listing-image').imageUploader(listingImageOptions);


                let maximum_no_of_image_per_product = $('.no_of_product_image').data('productimage');
                let totlaProductImage = $('.product-image').length;
                for (let i = 1; i <= totlaProductImage; i++) {
                    let productPreloaded = [];
                    let productId = $(`#product-image${i}`).data('productid');
                    if ($(`#product-image${i}`).data('singleproductimage').length) {
                        let data = $(`#product-image${i}`).data('singleproductimage').forEach(function (value, index) {
                            productPreloaded.push({
                                id: value.id,
                                image_name: value.product_image,
                                src: value.src
                            });
                        });
                    }

                    let productImageOptions = {
                        preloaded: productPreloaded,
                        imagesInputName: `product_image[${i}]`,
                        preloadedInputName: `old_product_image[${productId}]`,
                        label: 'Drag & Drop files here or click to browse images',
                        extensions: ['.jpg', '.jpeg', '.png'],
                        mimes: ['image/jpeg', 'image/png'],
                        maxSize: 5242880
                    };
                    if (maximum_no_of_image_per_product != 'unlimited') {
                        productImageOptions.maxFiles = maximum_no_of_image_per_product;
                    }
                    $(`#product-image${i}`).imageUploader(productImageOptions);
                }

                $("#add_products").on('click', function () {
                    let productLenght = $('.new__product__form').length + 1;
                    var string = Math.random().toString(10).substring(2, 12);
                    let dataProducts = $('#add_products').data('products');

                    if (dataProducts >= 1 || dataProducts == 'unlimited') {
                        var form = `<div class="col-xl-6 removeProductForm">
                <div class="form new__product__form">
                    <span class="product-form-close" data-id="` + string + `"> <i class="fa fa-times"></i> </span>
                    <div class="row g-3">
                        <div class="input-box col-md-6">
                            <input class="form-control" name="product_title[]" type="text" placeholder="<?php echo app('translator')->get('Title'); ?>"
                            />
                        </div>
                        <div class="input-box col-md-6">
                            <input class="form-control" name="product_price[]" type="text" placeholder="<?php echo app('translator')->get('Price'); ?>"/>
                        </div>

                        <div class="input-box col-12">
                             <textarea class="form-control" name="product_description[]" cols="30" rows="3" placeholder="<?php echo app('translator')->get('Description'); ?>"
                             ></textarea>
                        </div>
                        <div class="pe-2 product__images__width">
                            <div class="input-box col-12 no-of-img-per-product">
                                <div class="product-image no_of_product_image" id="product-image${productLenght}" data-productimage="<?php echo e($single_package_infos->is_product == 1 && $single_package_infos->no_of_img_per_product == null  ? 500 : $single_package_infos->no_of_img_per_product); ?>"></div>
                            </div>
                        </div>

                        <div class="upload-img thumbnail">
                            <div class="form">
                                <div class="img-box product-thumbnail">
                                    <input accept="image/*" type="file" onchange="previewImage('product_thumbnail` + string + `')" name="product_thumbnail[]"/>
                                    <span class="select-file"><?php echo app('translator')->get('Product Thumbnail'); ?></span>
                                    <img id="product_thumbnail` + string + `" src="<?php echo e(getFile(config('location.default'))); ?>" class="img-fluid"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

                        $('.new_product_form').append(form)

                        if (dataProducts != 'unlimited') {
                            let newDataProducts = dataProducts - 1;
                            $('#add_products').data('products', newDataProducts);
                            $('.product_count').text(newDataProducts);
                        }

                        let maximum_no_of_image_per_product = $('.no_of_product_image').data('productimage');
                        let productImageOptions = {
                            imagesInputName: `product_image[${productLenght}]`,
                            label: 'Drag & Drop files here or click to browse images',
                            extensions: ['.jpg', '.jpeg', '.png'],
                            mimes: ['image/jpeg', 'image/png'],
                            maxSize: 5242880
                        };
                        if (maximum_no_of_image_per_product != 'unlimited') {
                            productImageOptions.maxFiles = maximum_no_of_image_per_product;
                        }
                        $(`#product-image${productLenght}`).imageUploader(productImageOptions);

                    } else {
                        Notiflix.Notify.Warning("No more add products");
                    }
                });

                $(document).on('click', '.product-form-close', function () {
                    $(this).parents('.removeProductForm').remove();

                    let dataProducts = $('#add_products').data('products');
                    if (dataProducts != 'unlimited') {
                        let addNewDataProducts = $('#add_products').data('products') + 1
                        $('#add_products').data('products', addNewDataProducts);
                        $('.product_count').text(addNewDataProducts);
                    }
                });

                $(document).on('click', '.product-form-close', function () {
                    let id = $(this).attr('data-id');
                    $('.removeProductForm' + id).remove();

                    let dataProducts = $('#add_products').data('products');
                    if (dataProducts != 'unlimited') {
                        let addNewDataProducts = $('#add_products').data('products') + 1
                        $('#add_products').data('products', addNewDataProducts);
                        $('.product_count').text(addNewDataProducts);
                    }
                });


                $("#add_business_hour").on('click', function () {
                    var form = `<div class="d-sm-flex justify-content-between removeBusinessHourInputField">
                        <div class="input-box w-100 my-1 mx-sm-1">
                            <select class="js-example-basic-single form-control h-100" name="working_day[]">
                                <option value="Monday"><?php echo app('translator')->get('Monday'); ?></option>
                                <option value="Tuesday"><?php echo app('translator')->get('Tuesday'); ?></option>
                                <option value="Wednesday"><?php echo app('translator')->get('Wednesday'); ?></option>
                                <option value="Thursday"><?php echo app('translator')->get('Thursday'); ?></option>
                                <option value="Friday"><?php echo app('translator')->get('Friday'); ?></option>
                                <option value="Saturday"><?php echo app('translator')->get('Saturday'); ?></option>
                                <option value="Sunday"><?php echo app('translator')->get('Sunday'); ?></option>
                            </select>
                        </div>
                        <div class="d-flex input-box-two">
                            <div class="input-box w-100 my-1 me-1">
                                <input type="time" name="start_time[]" class="form-control h-100" placeholder="<?php echo app('translator')->get('Start Hour'); ?>" />
                            </div>
                            <div class="input-box w-100 my-1 me-1">
                                <input type="time" name="end_time[]" class="form-control h-100" placeholder="<?php echo app('translator')->get('End Hour'); ?>" />
                            </div>
                            <div class="input-box my-1 me-1">
                                <button class="btn-custom add-new btn-custom-danger remove_business_hour_input_field_block" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>`;

                    $('.new_business_hour_form').append(form)
                });

                $(document).on('click', '.remove_business_hour_input_field_block', function () {
                    $(this).parents('.removeBusinessHourInputField').remove();
                });

                setIconpicker('.iconpicker1');

                function setIconpicker(selector = '.iconpicker1') {
                    $(selector).iconpicker({
                        title: 'Search Social Icons',
                        selected: false,
                        defaultValue: false,
                        placement: "top",
                        collision: "none",
                        animation: true,
                        hideOnSelect: true,
                        showFooter: false,
                        searchInFooter: false,
                        mustAccept: false,
                        icons: [{
                            title: "bi bi-facebook",
                            searchTerms: ["facebook", "text"]
                        }, {
                            title: "bi bi-instagram",
                            searchTerms: ["instagram", "text"]
                        }, {
                            title: "bi bi-linkedin",
                            searchTerms: ["linkedin", "text"]
                        }, {
                            title: "bi bi-discord",
                            searchTerms: ["discord", "text"]
                        }, {
                            title: "bi bi-youtube",
                            searchTerms: ["youtube", "text"]
                        }, {
                            title: "bi bi-whatsapp",
                            searchTerms: ["whatsapp", "text"]
                        }, {
                            title: "bi bi-twitter",
                            searchTerms: ["twitter", "text"]
                        }, {
                            title: "bi bi-google",
                            searchTerms: ["google", "text"]
                        }, {
                            title: "bi bi-camera-video",
                            searchTerms: ["vimeo", "text"]
                        }, {
                            title: "bi bi-skype",
                            searchTerms: ["skype", "text"]
                        }, {
                            title: "bi bi-camera-video-fill",
                            searchTerms: ["tiktalk", "text"]
                        }, {
                            title: "bi bi-badge-tm-fill",
                            searchTerms: ["tumbler", "text"]
                        }, {
                            title: "bi bi-blockquote-left",
                            searchTerms: ["blogger", "text"]
                        }, {
                            title: "bi bi-file-word-fill",
                            searchTerms: ["wordpress", "text"]
                        }, {
                            title: "bi bi-badge-wc",
                            searchTerms: ["weixin", "text"]
                        }, {
                            title: "bi bi-telegram",
                            searchTerms: ["telegram", "text"]
                        }, {
                            title: "bi bi-bell-fill",
                            searchTerms: ["snapchat", "text"]
                        }, {
                            title: "bi bi-three-dots",
                            searchTerms: ["flickr", "text"]
                        }, {
                            title: "bi bi-file-ppt",
                            searchTerms: ["pinterest", "text"]
                        }],
                        selectedCustomClass: "bg-primary",
                        fullClassFormatter: function (e) {
                            return e;
                        },
                        input: "input,.iconpicker-input",
                        inputSearch: false,
                        container: false,
                        component: ".input-group-addon,.iconpicker-component",
                    })
                }

                let newSocialForm = $('.append_new_social_form').length + 1;
                for (let i = 2; i <= newSocialForm; i++) {
                    setIconpicker(`#iconpicker${i}`);
                }

                $("#add_social_links").on('click', function () {
                    let newSocialForm = $('.append_new_social_form').length + 2;
                    var form = `<div class="d-flex justify-content-between append_new_social_form removeSocialLinksInput">
                        <div class="input-group mt-1">
                           <input type="text" name="social_icon[]" class="form-control demo__icon__picker iconpicker${newSocialForm}" placeholder="Pick a icon" aria-label="Pick a icon"
                           aria-describedby="basic-addon1" readonly>
                        </div>

                        <div class="input-box w-100 my-1 me-1">
                            <input type="url" name="social_url[]" class="form-control h-100" placeholder="<?php echo app('translator')->get('URL'); ?>"/>
                        </div>
                        <div class="my-1 me-1">
                            <button class="btn-custom add-new btn-custom-danger remove_social_link_input_field" type="button">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>`;

                    $('.new_social_links_form').append(form)
                    setIconpicker(`.iconpicker${newSocialForm}`);
                });

                $(document).on('click', '.remove_social_link_input_field', function () {
                    $(this).parents('.removeSocialLinksInput').remove();
                });


                let maxSelectAmenities = $('.amenities_select2').data('amenities');
                $(".amenities_select2").select2({
                    width: '100%',
                    placeholder: '<?php echo app('translator')->get("Select amenities"); ?>',
                    maximumSelectionLength: maxSelectAmenities,
                });

                $('.tags_input').tagsinput({
                    tagClass: function (item) {
                        return 'badge badge-info';
                    },
                    focusClass: 'focus',
                });

                $(document).on('change', '#place_id', function () {
                    let place_name = $("#place_id").select2().find(":selected").data("name");
                    let lat = $("#place_id").select2().find(":selected").data("lat");
                    let long = $("#place_id").select2().find(":selected").data("long");
                    $('#address-search').val(place_name);
                    $('#lat').val(lat);
                    $('#lng').val(long);
                });

                $('select').select2({
                    selectOnClose: true,
                    width: '100%'
                });

                let maxSelectCategories = $('.listing__category__select2').data('categories');
                $(".listing__category__select2").select2({
                    width: '100%',
                    placeholder: '<?php echo app('translator')->get("Select Categories"); ?>',
                    maximumSelectionLength: maxSelectCategories,
                });
            });
        </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\Projects\smith-and-clough-com.stackstaging.com\Live-files-project\Smith-and-Clough-Directory\resources\views/admin/listing/editListing.blade.php ENDPATH**/ ?>