<x-guest-layout>
	<div class="main-wrapper main-wrapper-1">
		@include('layouts.header.index')
		@include('layouts.partials.sidebar')
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>@yield('title', 'Title')</h1>
					@include('layouts.partials.breadcrumb')
				</div>
			</section>
			{{ $slot }}
		</div>
		@include('layouts.footer.index')
	</div>
</x-guest-layout>