<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(getFile(config('basic.default_file_driver'),config('basic.logo_image'))); ?>" alt="<?php echo e(config('basic.site_title')); ?>">
        </a>
        <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="far fa-bars"></i>
        </button>
        <?php
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $lastUriSegment = array_pop($uriSegments);
        ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($lastUriSegment == ''): ?> active <?php endif; ?>" href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if($lastUriSegment == 'about'): ?> active <?php endif; ?>" href="<?php echo e(route('about')); ?>"><?php echo app('translator')->get('About'); ?></a>
                </li>

                <?php /*
                <li class="nav-item">
                    <a class="nav-link @if($lastUriSegment == 'pricing') active @endif" href="{{ route('pricing') }}">@lang('Pricing')</a>
                </li> */ ?>

                <li class="nav-item">
                    <a class="nav-link <?php if($lastUriSegment == 'listing'): ?> active <?php endif; ?>" href="<?php echo e(route('listing')); ?>"><?php echo app('translator')->get('Listing'); ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if($lastUriSegment == 'category'): ?> active <?php endif; ?>" href="<?php echo e(route('category')); ?>"><?php echo app('translator')->get('Category'); ?></a>
                </li>


                <?php if(isset($contentDetails['support'])): ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><?php echo app('translator')->get('Selling Your Busines'); ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php $__currentLoopData = $contentDetails['support']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $fldMenuType = ''; $fldparentMenu = '';
                        $fldMenuType = ($data->description)->menu_type;
                        $fldparentMenu = ($data->description)->parent_menu;
                        ?>



                        <?php if($fldMenuType == 'H' && $fldparentMenu == '1'): ?>

                        <a class="dropdown-item" href="<?php echo e(route('getLink', [slug(optional($data->description)->title), $data->content_id])); ?>"><?php echo app('translator')->get(optional($data->description)->title); ?></a>

                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </li>


                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><?php echo app('translator')->get('Buying A Business'); ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php $__currentLoopData = $contentDetails['support']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $fldMenuType = ''; $fldparentMenu = '';
                        $fldMenuType = ($data->description)->menu_type;
                        $fldparentMenu = ($data->description)->parent_menu;
                        ?>



                        <?php if($fldMenuType == 'H' && $fldparentMenu == '2'): ?>

                        <a class="dropdown-item" href="<?php echo e(route('getLink', [slug(optional($data->description)->title), $data->content_id])); ?>"><?php echo app('translator')->get(optional($data->description)->title); ?></a>

                        <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </li>

                <?php endif; ?>


                <li class="nav-item">
                    <a class="nav-link <?php if($lastUriSegment == 'contact'): ?> active <?php endif; ?>" href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('Contact'); ?></a>
                </li>
            </ul>
        </div>

        <div class="navbar-text">
            <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>" class="btn-custom"><?php echo app('translator')->get('Sign in'); ?></a>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('user.home')); ?>" class="btn-custom"><?php echo app('translator')->get('Dashboard'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</nav><?php /**PATH /home/sites/28a/2/26dd80d363/public_html/resources/views/themes/classic/partials/header.blade.php ENDPATH**/ ?>