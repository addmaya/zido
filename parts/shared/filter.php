<div class="o-filter__wrap">
	<div class="o-filter">
		<a href="#" class="o-filter__label">
			<span class="o-filter__active"><?php echo date("Y"); ?></span>
			<div class="o-arrow">
				<span></span><span></span>
			</div>
		</a>
		<div class="o-filter-list js-months">
			<ul>
				<li><a href="#" data-query="fetch" data-type="year" data-content="all">All</a></li>
				<?php 
					$i = 2014;
					foreach (range(date('Y'), $i) as $y) {
					    echo '<li><a href="#" data-query="fetch" data-type="year" data-content="'.$y.'">'.$y.'</a></li>';
					}
				 ?>
			</ul>
		</div>
	</div>
	<!-- <div class="o-filter">
		<a href="#" class="o-filter__label">
			<span class="o-filter__active"><?php echo date("F"); ?></span>
			<div class="o-arrow">
				<span></span><span></span>
			</div>
		</a>
		<div class="o-filter-list js-months">
			<ul>
				<?php 
				for ($m=1; $m<=12; $m++) {
				     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
				     	echo '<li><a href="#" data-type="month" data-content="'.$month.'">'.$month.'</a></li>';
				     }
				 ?>
			</ul>
		</div>
	</div> -->
	<a href="#" class="o-filter__button u-hide js-fetch-projects" data-query="fetch" data-category="<?php echo $category_id; ?>"><span>Filter</span></a>
</div>