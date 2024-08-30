<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        *,::after,::before{box-sizing:border-box}.customer-row{width:100%;margin-bottom:20px;border:1px solid #ccc;padding:10px}.customer-col{width:100%;display:flex;flex-wrap:wrap;gap:20px}.customer-col h2,p{font-size:20px;font-weight:700;margin:0}.customer-info{border:1px solid #000;padding:5px}input{width:100%;margin:5px 0}
    </style>
</head>

<body>
    <div class="container">
        <div class="col-sm-12 py-4">
            <form action="{{ route('search') }}" method="GET">
                <div class="row">
                    <div class="col-sm-3">
                        <input type="text" name="email" class="form-control" placeholder="Customer Email" value="{{ request('email') }}">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="order_number" class="form-control" placeholder="Order Number" value="{{ request('order_number') }}">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="item_name" class="form-control" placeholder="Item Name" value="{{ request('item_name') }}">
                    </div>
                    <div class="col-sm-3 pt-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('listing') }}"  class="btn btn-secondary">Clear</a>
                    </div>
                </div>
            </form>
        </div>
        <h1>Customer List</h1>
        @foreach ($customers as $customer)
        <div class="customer-row">
            <div class="customer-col customer-info">
                <span>
                    {{ $customer->name }}
                </span>
                <span>{{ $customer->email }}</span>
                <span>{{ $customer->phone }}</span>
            </div>
            <div class="customer-col">
                <h2>
                    Orders
                </h2>
                @foreach ($customer->orders as $order)
                    <div class="order-info">
                        <p>
                            Order Number: {{ $order->order_number }}
                        </p>
                        @foreach ($order->items as $item)
                            <div>
                                Item Name: {{ $item->name }}
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
        {{ $customers->links() }}
    </div>
</body>
</html>