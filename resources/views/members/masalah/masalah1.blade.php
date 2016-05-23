@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Nama Tiada No Gaji</h4></div>
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<tr>
						<th>No KP</th>
						<th>No Gaji</th>
						<th>Nama</th>
						<th>Status</th>
					</tr>

					@if($profiles->isEmpty())
						<tr>
							<td colspan="4" class="success" style="color: red">Tiada Masalah</td>
						</tr>
					@else

						@foreach($profiles as $profile)
							<tr>
								<td></td>
								<td>{{ $profile->nokp }}</td>
								<td>{{ $profile->no_gaji }}</td>
								<td>{{ $profile->status->nama }}</td>
							</tr>						
						@endforeach

					@endif					
				</table>
			</div>
		</div>
	</div>
	
</div>



@stop