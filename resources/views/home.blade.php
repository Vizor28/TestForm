@extends('layouts.app')

@section('content')

	<div class="container-fluid" id="message_page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="form_my">
						<div class="h1">
							Обратная связь
						</div>
						<div id="message">
						</div>
						<form class="form-horizontal" role="form" action="{{ url('/message') }}" method="POST" id="message_form" enctype="multipart/form-data">
						{{ csrf_field() }}
							<div class="form-group">
								<label for="name" class="col-md-2 col-xs-12 control-label">ФИО <span>*</span></label>
								<div class="col-md-6 col-xs-12">
									<input type="text" name="name" class="form-control input-lg" id="name" placeholder="Имя Фамилия" pattern="[А-ЯA-Z][а-яa-z]{2,}\s[А-ЯA-Z][а-яa-z]{2,}" required value="{{ old('name') }}">
									@if($errors->has('name'))
									<p class="bg-dange">
										{{ $errors->first('name') }}
									</p>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label for="age" class="col-md-2 col-xs-12 control-label">Возраст <span>*</span></label>
								<div class="col-md-6 col-xs-12">
									<input type="number" name="age" class="form-control input-lg" id="age" placeholder="Возраст" min="17" max="65" required value="{{ old('age') }}">
									@if($errors->has('age'))
										<p class="bg-dange">
											{{ $errors->first('age') }}
										</p>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label for="date" class="col-md-2 col-xs-12 control-label">Дата <span>*</span></label>
								<div class="col-md-6 col-xs-12">
									<input type="date" name="date" class="form-control input-lg" id="date" placeholder="Дата" required value="{{ old('date') ?  old('date') : date('Y-m-d',strtotime('tomorrow'))}}" min="{{ date('Y-m-d',strtotime('tomorrow')) }}">
									@if($errors->has('date'))
										<p class="bg-dange">
											{{ $errors->first('date') }}
										</p>
									@endif
								</div>
							</div>

							<div class="form-group">
								<label for="file" class="col-md-2 col-xs-12 control-label">Резюме</label>
								<div class="col-md-6 col-xs-12">
									<input type="file" name="file" class="form-control input-lg" id="file" placeholder="Резюме">
									@if($errors->has('file'))
										<p class="bg-dange">
											{{ $errors->first('file') }}
										</p>
									@endif
								</div>
							</div>

							<div class="clearfix"></div>
							<div class="form_button_block">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<button type="submit" class="btn btn-success btn-lg">отправить</button>
								</div>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>

@endsection
