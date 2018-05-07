@extends('dashboard')
@section('content')
	<!-- Latest posts -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h6 class="panel-title">Ini masih data sembarangan</h6>
			<div class="heading-elements">
				<ul class="icons-list">
	        		<li><a data-action="collapse"></a></li>
	        		<li><a data-action="reload"></a></li>
	        		<li><a data-action="close"></a></li>
	        	</ul>
	    	</div>
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12">
					{{ count($ctlUsers) }}
					<br>
					@foreach($ctlUsers as $key => $value)
						@if($value->U_ID == 'administrator')
							menu admin <br>
						@else()
							nobody <br>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- /latest posts -->
@endsection