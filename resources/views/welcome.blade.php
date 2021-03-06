@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center gap-5" style="height: 100vh;">
        <div class="d-flex flex-column" style="width: 400px;">
            <div class="bg-white rounded-3 shadow py-3">
                <div class="text-primary fs-1 text-center my-3"><i class="bi bi-explicit"></i>nter</div>
                <ul class="d-flex justify-content-center nav nav-tabs px-1" id="myTab" role="tablist">
                    <li class="nav-item w-50 text-center" role="presentation">
                        <button class="btn btn-none fw-bold border-bottom-custom w-100" id="login_tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-person"></i> Вход</button>
                    </li>
                    <li class="nav-item w-50 text-center" role="presentation">
                        <button class="btn btn-none fw-bold color-light w-100" id="reg_tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-person-plus"></i> Регистрация</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active pt-2" id="home" role="tabpanel" aria-labelledby="login_tab">
                        <form action="/login" method="post" class="d-flex flex-column px-4 mt-3">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="tel" name="tel" data-tel-input class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput" class="text-muted"><i class="bi bi-telephone"></i> Телефон</label>
                                @error('tel')<div class="text-danger">{{$message}}</div> @enderror         
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="input_one" placeholder="name@example.com">
                                <div id="show_one" onclick="show(this.id,'input_one')" class="btn btn-eye"><i class="bi bi-eye text-blue fs-5"></i></div>
                                <label for="input_one" class="text-muted">Введите пароль</label>
                                @error('password')<div class="text-danger">{{$message}}</div>@enderror
                            </div>
                            <button class="btn-lg btn_auth"><i class="bi bi-box-arrow-in-right"></i> Войти</button>
                        </form>
                    </div>
                    <div class="tab-pane fade pt-2" id="profile" role="tabpanel" aria-labelledby="reg_tab">
                        <form action="/registr" method="post" class="d-flex flex-column px-4 mt-3">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="tel" name="tel" data-tel-input class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput" class="text-muted"><i class="bi bi-telephone"></i> Телефон</label>
                                @error('tel')<div class="text-danger">{{$message}}</div> @enderror
                            </div>                            
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="input_two" placeholder="name@example.com">
                                <div id="show_two" onclick="show(this.id,'input_two')" class="btn btn-eye"><i class="bi bi-eye text-blue fs-5"></i></div>
                                <label for="password_input_two" class="text-muted">Придумайте пароль</label>
                                @error('password')<div class="text-danger">{{$message}}</div>@enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password_confirmation" class="form-control" id="input_three" placeholder="name@example.com">
                                <div id="show_three" onclick="show(this.id,'input_three')" class="btn btn-eye"><i class="bi bi-eye text-blue fs-5"></i></div>
                                <label for="input_three" class="text-muted">Повторите пароль</label>
                                @error('password_confirmation')<div class="text-danger">{{$message}}</div> @enderror
                            </div>      
                            <button class="btn-lg btn_auth"><i class="bi bi-box-arrow-in-right"></i>  Зарегистрироваться</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

<script>
reg_tab.onclick = function() {
    login_tab.classList.remove('border-bottom-custom')
    login_tab.classList.add('color-light')
    reg_tab.classList.add('border-bottom-custom')
    reg_tab.classList.remove('color-light')
}

login_tab.onclick = function() {
    reg_tab.classList.remove('border-bottom-custom')
    reg_tab.classList.add('color-light')
    login_tab.classList.add('border-bottom-custom')
    login_tab.classList.remove('color-light')
}

function show(btn,input) {

    btn = document.getElementById(btn)
    input = document.getElementById(input)

    if (input.getAttribute('type') === 'password') {
        input.setAttribute('type', 'text')
        btn.innerHTML = '<i class="bi bi-eye-slash text-blue fs-5"></i>';
    } else {
        input.setAttribute('type', 'password')
        btn.innerHTML = '<i class="bi bi-eye text-blue fs-5"></i>';
    }
}

</script>
@endsection