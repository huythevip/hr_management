@extends('base')


<!-- CSS -->
@section('custom_css')


@endsection

<!-- Content -->

@section('content')
<div class="login">
	<table>
		<thead>
			<tr>
				<td colspan="2">Login</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>ID:</td>
				<td><input type="text" placeholder="your ID"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" placeholder="your password"></td>
			</tr>
			<tr>
				<td><button>Log in</button></td>
				<td><button>Sign up</button></td>
			</tr>
		</tbody>
	</table>
</div>
@endsection