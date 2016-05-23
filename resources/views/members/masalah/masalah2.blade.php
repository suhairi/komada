@extends('layouts.members')

@section('content')

<div class="row">
	<div class="col-xs-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Senarai Nama Pinjaman yang bulanan RM 0.00</h4></div>
			<div class="panel-body">
				<table class="table table-condensed table-hover">
					<tr>
						<th>Jenis Pinjaman</th>
						<th>No Gaji</th>
						<th>Bulanan (RM)</th>
						<th>Baki</th>
						<th>Tempoh (bulan)</th>
						<th>Status</th>
					</tr>
					@foreach($accounts as $account)
						<tr>
							<td>
								@if($account->perkhidmatan_id == 1)
									Wang Tunai
								@endif
								@if($account->perkhidmatan_id == 2)
									Buku Sekolah
								@endif
								@if($account->perkhidmatan_id == 3)
									Cukai Jalan
								@endif
								@if($account->perkhidmatan_id == 4)
									Insurans
								@endif
								@if($account->perkhidmatan_id == 5)
									Tayar Bateri
								@endif
								@if($account->perkhidmatan_id == 6)
									Kecemasan
								@endif
							</td>
							<td>{{ $account->no_gaji }}</td>
							<td align="center">{{ number_format($account->bulanan, 2) }}</td>							
							<td align="center">{{ number_format($account->baki, 2) }}</td>							
							<td>{{ $account->tempoh }}</td>
							<td>{{ $account->getStatus->nama }}</td>
						</tr>						
					@endforeach
				</table>
			</div>
		</div>
	</div>
	<div class="col-xs-4">
		<div class="panel panel-primary">
			<div class="panel-heading"><h4>Cadangan</h4></div>
			<div class="panel-body">
				<ul>
					<li>Kebyaknnya tidak dpt kira baki!</li>
					<li>Deactivate tempoh = 0 bulan</li>
					<li>Remove akaunpotongan yang tiada no_gaji</li>
				</ul>
			</div>
		</div>
	</div>
</div>



@stop