<!-- pageheader -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="page-header">
			<h2 class="pageheader-title text-capitalize">
                @if(app('request')->path() === '/')
                    Dashboard
                @else
                    {{ app('request')->path() }}
                @endif
            </h2>

			<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
				vestibulum mi. Morbi lobortis pulvinar quam.</p>
			<div class="page-breadcrumb">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item {{ app('request')->path() === '/' ? 'active' : '' }}" aria-current="page text-capitalize">
                            @if(app('request')->path() === '/')
                                Dashboard
                            @else
                                {{ app('request')->path() }}
                            @endif
                        </li>

					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- end pageheader -->
