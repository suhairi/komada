@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Nama Pinjaman yang bulanan RM 0.00</h4></div>
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<tr>
						<td>Jenis Pinjaman</td>
						<td>No Gaji</td>
						<td>Tempoh (bulan)</td>
						<td>Status</td>
					</tr>
					@foreach($accounts as $account)
						<tr>
							<td></td>
							<td>{{ $account->no_gaji }}</td>
							<td>{{ $account->tempoh }}</td>
							<td>{{ $account->getStatus->nama }}</td>
						</tr>						
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>



@stop