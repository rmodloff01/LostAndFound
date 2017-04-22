@extends('layouts.app')
@section('content')
<div id="editItemForm">
	<form action="" method='post' id='editItem'>
		{{csrf_field()}}
		<div class="container">
			<div class="row">
				<div class="col-md-4" style="margin-left:16em">
					<br><label>Item Type:&nbsp</label><br>
					<div class="form-group">
						<?php
						echo Form::select('types', array('1' => 'Keys', '2' => 'Wallet',
									'3' => 'Cell Phones', '4' => 'Laptop/Tablets', '5' => 'AU ID - Official Gov ID Card',
									'6' => 'Flash Drive',  '7' => 'Textbook', '8' => 'Clothing',  '9' => 'Bags - Purses/Backpack',
									'10' => 'Debit/Credit Card',  '11' => 'Glasses', '12' => 'Jewelry',  '13' => 'Charger', '14' => 'Headphones',
								  '15' => 'Notebook/Binder', '16' => 'Other'), $item->type_id, ['size' => '11']); ?>
					</div>
					<input type='hidden' name='id' value= {{$item->item_id}}>
					<label>Location Found:&nbsp</label>
					<br><input type="text" name="location" value= "{{$item->location_found}}" style="width:300px"><br>
					<br><label>Description:&nbsp</label><br>
					<textarea name ='description' form="editItem" style="width:300px" rows="3">{{$item->description}}</textarea>
					<br>
				</div>
				<div class="col-md-4">
					<br><label>Collected By:&nbsp</label>
					<br><input type="text" name='collected' value= "{{$item->collected_by}}" style="width:300px"><br>
					<br><label>Report Number:&nbsp</label>
					<br><input type="text" name='reportnumber' value= "{{$item->report_number}}" style="width:300px"><br>
					<br><label>Owner Info:&nbsp</label>
					<br><textarea name ='ownerinfo' form="editItem" style="width:300px" rows="3"> {{$item->owner_info}} </textarea><br><br>
					<label>Inventory Location:&nbsp</label>
					<br><input type="text" name='inventorylocation' value= "{{$item->inventory_location}}" style="width:300px"><br><br>
					<label>Officer:&nbsp</label>
					<br><input type="textarea" name='officer' value= "{{$item->officer}}" style="width:300px"><br><br>
				</div>
			</div>
		</div>
		<div style="text-align:center">
			<button type="submit" class="btn btn-primary">Save Changes</button>
		</div>
		<br>
	</form>
</div>
    @endsection
