@extends('admin.layouts')

@section('content')
    <h1 class="page-header">Главная страница</h1>
    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="http://localhost/shop/public/images/icon-user.png" width="200" height="200" class="img-circle" alt="Generic placeholder thumbnail">
            <h4><a href="/shop/public/admin/users">Пользователи</a></h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="http://localhost/shop/public/images/icon-goods.png" width="200" height="200" class="img-circle" alt="Generic placeholder thumbnail">
            <h4><a href="/shop/public/admin/goods">Товары</a></h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="http://localhost/shop/public/images/icon-category.jpg" width="200" height="200" class="img-circle" alt="Generic placeholder thumbnail">
            <h4><a href="/shop/public/admin/categories">Категории</a></h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <img src="http://localhost/shop/public/images/icon-orders.jpg" width="200" height="200" class="img-circle" alt="Generic placeholder thumbnail">
            <h4><a href="/shop/public/admin/orders">Заказы</a></h4>
            <span class="text-muted">Something else</span>
        </div>
    </div>
@endsection
