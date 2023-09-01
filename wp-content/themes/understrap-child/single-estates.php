<?php
get_header();
$estateData = Estates::getEstate($post);
?>
<div class="container">
		<article class="estate-article">
            <div class="row">
                <div class="col col-md-5">
                    <div class="image-container">
                        <img src="<?php echo $estateData['src'];?>" alt="<?php echo $estateData['name'];?>" class="rounded">
                    </div>
                </div>
                <div class="col col-md-7">
                    <h1 class="mb-2"><?php echo $estateData['name']; ?></h1>
                    <?php if($estateData['desc']):?>
                    <div class="desc card-text mb-auto">
	                    <?php echo $estateData['desc']; ?>
                    </div>
                    <?php endif; ?>
                    <ul>
                        <li>
                            <div class="property-row">
                                <span class="prop">
                                    <?php _e('Поверх:', 'understrap-child');?>
                                </span>
                                <span class="val">
                                    <?php echo $estateData['stage'];?>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="property-row">
                                <span class="prop">
                                    <?php _e('Тип будівлі:', 'understrap-child');?>
                                </span>
                                <span class="val">
                                    <?php echo $estateData['type']['label'];?>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="property-row">
                                <span class="prop">
                                    <?php _e('Координати:', 'understrap-child');?>
                                </span>
                                <span class="val">
                                    <?php echo $estateData['coordinates'];?>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
		</article>
</div>
<?php get_footer(); ?>
