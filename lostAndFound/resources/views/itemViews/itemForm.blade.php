@extends('layouts.app')
@section('content')
<div id="addItemForm">
	<div class="container">
		<div class="row">
			<form action="" method='post' id='addItem'>
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label for="selectbox" class = "control-label">Item Type:</label>
                        <select name="type" id="selectbox" class="form-control">
                            @foreach($formTypes as $element)
                                <option value="{{$element->type_id}}" >{{$element->type}}</option>
                            @endforeach
                        </select>
					</div>
					<div class="form-group">
                        <label for="datepicker1" class = "control-label">Date Found:</label>
                        {{ Form::text('date', '', array('class' => 'makepointer form-control datepicker1')+['required']) }}
                    </div>
					<div class="form-group">
						<label for='description'>Description:&nbsp</label>
						<textarea name ='description' id='description' form="addItem" rows="3" class="form-control" maxlength="500"></textarea>
					</div>
					<div class="form-group">
						<label for='location'>Location Found:&nbsp</label>
						<input type="text" name="location" id='location' class="form-control" maxlength="100">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for='reportnumber'>Report Number:&nbsp</label>
						<input type="text" name='reportnumber' id='reportnumber' class="form-control" maxlength="45">
					</div>
					<div class="form-group">
						<label for='ownerinfo'>Owner Info:&nbsp</label>
						<textarea name ='ownerinfo' id='ownerinfo' form="addItem" rows="3" class="form-control" maxlength="500"></textarea>
					</div>
					<div class="form-group">
						<label for='inventorylocation'>Inventory Location:&nbsp</label>
						<input type="text" name='inventorylocation' id='inventorylocation' class="form-control" maxlength="45">
					</div>
					<div class="form-group">
						<label for='officer'>Officer:&nbsp</label>
						<input type="textarea" name='officer' id='officer' class="form-control" maxlength="45">
					</div>
				</div>
				<div style="text-align:center">
					<button type="submit" class="btn btn-primary">Add Item</button>
				</div>
			</form>
		</div>
	</div>
</div>
    @endsection
