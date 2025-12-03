

<section class="py-5">
	<div class="container-fluid">	
				<?php
		
		// Try project-local images first, then site-root images
		$projectImgDir = realpath(__DIR__ . '/../../images/slider/slides');
		$siteImgDir    = realpath($_SERVER['DOCUMENT_ROOT'] . '/images/slider/slides');
		
		$imgDir = $projectImgDir ?: $siteImgDir;
		$files = [];
		if ($imgDir && is_dir($imgDir)) {
			$files = glob($imgDir . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
			sort($files);
		}
		
		$carouselId = 'homeCarousel_' . md5(__FILE__);
		$docRoot = realpath($_SERVER['DOCUMENT_ROOT']);
		?>
		<?php if (!empty($files)): ?>
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
		<div id="<?= $carouselId ?>" class="carousel slide" data-bs-ride="carousel">
		  <div class="carousel-inner">
			<?php foreach ($files as $i => $f):
				$real = str_replace('\\','/', realpath($f));
				// Build web path by removing document root from real path -> ensures correct "/images/..." or "/coastal-bliss/images/..."
				$webPath = '/' . ltrim(str_replace(str_replace('\\','/',$docRoot), '', $real), '/');
				$alt = htmlspecialchars(basename($f));
			?>
			  <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
				<img src="<?= $webPath ?>" class="d-block w-100" alt="<?= $alt ?>" style="object-fit:cover; max-height:600px;">
			  </div>
			<?php endforeach; ?>
		  </div>
		
		  <button class="carousel-control-prev" type="button" data-bs-target="#<?= $carouselId ?>" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#<?= $carouselId ?>" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span>
		  </button>
		</div>
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
		<?php else: ?>
		<!-- No slider images found in images/slider -->
		<?php endif; ?>
	</div>
</div>