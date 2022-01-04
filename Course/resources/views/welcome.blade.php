@extends('layouts.user.header')
@section('content')
        
        
	<!-- categories section -->
	<section class="categories-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Our Course Lists</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
			<div class="row">
				<!-- categorie -->
                @forelse($Course as $item)
				<div class="col-lg-4 col-md-6 ">
					<div class="categorie-item card rounded">
						<div class="ci-thumb set-bg m-1" data-setbg="{{asset('assets/images/'.$item->image)}}"></div>
                        <a class="text-decoration-none" href="{{route('view-course',$item->id)}}">
                            <div class="ci-text">
                                <h5>{{$item->name}}</h5>
                                <p>{{$item->short_description}}</p>
                                <span>Price :- {{$item->price}}$</span>
                            </div>
                        </a>
					</div>
				</div>
		
				@empty
					<p class="text-danger text-center">No Courses Found...!</p>
				@endforelse 				
			</div>
		</div>
	</section>
	<!-- categories section end -->
@endsection
