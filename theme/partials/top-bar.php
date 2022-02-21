<div class="top-bar bg-darker text-white d-none d-lg-block">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">

            <?php $contact_data = get_field('contact_data', 'option'); ?>
            <div class="col-auto">
                <?php if ($contact_data['address_1_line']) : ?>
                    <div class="d-inline-block pr-100">
                        <i class="fa fa-map-marker text-primary"></i>
                        <span class="fz-13 ml-50"><?php echo $contact_data['address_1_line']; ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($contact_data['phone']) : ?>
                    <div class="d-inline-block pr-100">
                        <i class="fa fa-phone text-primary"></i>
                        <span class="fz-13 ml-50"><?php echo $contact_data['phone']; ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($contact_data['email']) : ?>
                    <div class="d-inline-block pr-100">
                        <i class="fa fa-envelope text-primary"></i>
                        <span class="fz-13 ml-50"><?php echo $contact_data['email']; ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-auto">
                <?php
                $social = get_field('social', 'option');
                if ($social) : ?>
                    <ul class="nav social justify-content-end">
                        <?php foreach ($social as $key => $valor) {
                            if ($valor) {  ?>
                                <?php switch ($key):
                                    case 'facebook': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <?php break;
                                    case 'messenger': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-facebook-messenger"></i></a></li>
                                    <?php break;
                                    case 'whatsapp': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                    <?php break;
                                    case 'instagram': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <?php break;
                                    case 'twitter': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <?php break;
                                    case 'youtube': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    <?php break;
                                    case 'pinterest': ?>
                                        <li class="nav-item"><a href="<?php echo $valor ?>" class="nav-link" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                        <?php endswitch;
                            }
                        } ?>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>