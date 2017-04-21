@extends('layouts.app')
@section('content')
<div id="editItemForm">
	<form action="" method='post' id='editItem'>
		{{csrf_field()}}
		<div class="container">
			<div class="row">
				<div class="col-md-4" style="margin-left:14.75em">
					<br><label>Item Type:&nbsp</label><br>
					<div class="form-group">
						<select size="11" name="types" id="type" style="width:300px">
							<option value=1>Keys</option>
							<option value=2>Wallet</option>
							<option value=3>Cell Phone</option>
							<option value=4>Laptop/Tablet</option>
							<option value=5>AU ID - Official Gov ID Card</option>
							<option value=6>Flash Drive</option>
							<option value=7>Textbook</option>
							<option value=8>Clothing</option>
							<option value=9>Bags - Purses/Backpack</option>
							<option value=10>Debit/Credit Card</option>
							<option value=11>Glasses</option>
							<option value=12>Jewelry</option>
							<option value=13>Charger</option>
							<option value=14>Headphones</option>
							<option value=15>Notebook/Binder</option>
							<option value=16>Other</option>
						</select>
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
					<br><input type="text" name='collected' value="" style="width:300px"><br>
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
			<button type="submit" class="btn btn-primary"> Save Changes</button>
		</div>
		<br>
	</form>
</div>
    @endsection
