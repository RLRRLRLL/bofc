@extends('layouts.app')

@section('content')

	<form action="/" method="POST" id="addPomForm">
		@csrf @method('PUT')

		<div class="card">
			<div class="card-header">
				<h3>Images</h3>
			</div>
			<div class="card-body">
				<!-- -------------------------------------------- -->
				<div class="form-group add-pom-group col-md-3">
					<label for="name">
						name
					</label>

					<input id="name"
							name="name"
							type="text" 
							class="form-control" 
							placeholder="Enter name">
				</div> <!-- -------------------------------------- -->
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h3>Info</h3>
			</div>
			<div class="card-body">
				<!-- -------------------------------------------- -->
				<div class="form-group add-pom-group col-md-3">
					<label for="name">
						name
					</label>

					<input id="name"
							name="name"
							type="text" 
							class="form-control" 
							placeholder="Enter name">
				</div> <!-- -------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="color">
						color
					</label>

					<input id="color"
							name="color"
							type="text" 
							class="form-control" 
							placeholder="Enter color">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="gender">
						gender
					</label>

					<input id="gender"
							name="gender"
							type="text" 
							class="form-control" 
							placeholder="Enter gender">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="height">
						height
					</label>

					<input id="height"
							name="height"
							type="text" 
							class="form-control" 
							placeholder="Enter height">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="weight">
						weight
					</label>

					<input id="weight"
							name="weight"
							type="text" 
							class="form-control" 
							placeholder="Enter weight">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="teeth">
						teeth
					</label>

					<input id="teeth"
							name="teeth"
							type="text" 
							class="form-control" 
							placeholder="Enter teeth">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="birthday">
						birthday
					</label>

					<input id="birthday"
							name="birthday"
							type="text" 
							class="form-control" 
							placeholder="Enter birthday">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="rodnik">
						rodnik
					</label>

					<input id="rodnik"
							name="rodnik"
							type="text" 
							class="form-control" 
							placeholder="Enter rodnik">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="breeder">
						breeder
					</label>

					<input id="breeder"
							name="breeder"
							type="text" 
							class="form-control" 
							placeholder="Enter breeder">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="owner">
						owner
					</label>

					<input id="owner"
							name="owner"
							type="text" 
							class="form-control" 
							placeholder="Enter owner">
				</div> <!-- ------------------------------------- -->

				<div class="form-group add-pom-group col-md-3">
					<label for="title">
						title
					</label>

					<input id="title"
							name="title"
							type="text" 
							class="form-control" 
							placeholder="Enter title">
				</div> <!-- ------------------------------------- -->

			</div>
		</div>

	</form>

@endsection