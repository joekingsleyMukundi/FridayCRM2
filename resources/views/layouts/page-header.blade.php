<!-- pageheader -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="page-header">
			<h2 class="pageheader-title text-capitalize">{{ app("request")->path() }}</h2>
			<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
				vestibulum mi. Morbi lobortis pulvinar quam.</p>
			<div class="page-breadcrumb">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"
							aria-current="page text-capitalize">{{ app("request")->path() }}</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- end pageheader -->