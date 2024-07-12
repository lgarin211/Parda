@extends('Templates.InventLayout')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Edit Owner
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="ownerName" class="form-label">Owner Name:</label>
                        <input type="text" class="form-control" id="ownerName" value="owner 1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="shopName" class="form-label">Shop Name:</label>
                        <input type="text" class="form-control" id="shopName" value="Shop_owner 1" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" value="*******" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newOwnerName" class="form-label">New Owner Name:</label>
                        <input type="text" class="form-control" id="newOwnerName" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="newShopName" class="form-label">New Shop Name:</label>
                        <input type="text" class="form-control" id="newShopName" placeholder="My Shop">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password:</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
