@extends('layouts.app')

@section('title', 'Login')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mateus Seiboth and Flávio">
    <title>Loja</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .ms-n5 {
            margin-left: -40px;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
          
        }
    </style>

</head>

<body>
    <section class="h-100 gradient-form" style="background-image: url('{{ asset('images/dark-theme.jpg') }}');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <i class="bi bi-shield-check" style="font-size: 5rem;"></i>
                                        <h4 class="mt-1 mb-5 pb-1 mt-3">Loja</h4>
                                    </div>
                                    <form action="{{ url('login/') }}" method="POST">
                                        @csrf
                                        <p>Por favor, faça login para continuar</p>
                                        <div class="form-outline mb-4">
                                            <input name="username" type="text" id="form2Example11"
                                                class="form-control"
                                                placeholder="Username fornecido pelo administrador" />
                                            <label class="form-label" for="form2Example11">Username</label>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <div class="input-group">
                                                <input name="password" type="password"
                                                    placeholder="Senha fornecida pelo administrador" id="senha"
                                                    class="form-control border-end-0 border">
                                                <span class="input-group-append">
                                                    <button id="password"
                                                        class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                                                        type="button">
                                                        <i id="icone" class="bi bi-eye"></i>
                                                    </button>
                                                </span>

                                            </div>
                                            <label class="form-label" for="senha">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg mb-3"
                                                type="submit">Entrar</button>
                                            <a class="text-muted" href="#!">Esqueceu a senha?</a>
                                        </div>
                                    </form>

                                </div>
                            </div>

                         


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

    <script>
     
        const senha = document.getElementById('senha');
        const showPassword = document.getElementById('password');
        const icone = document.getElementById('icone');
        console.log(icone);
       
        showPassword.addEventListener('click', function() {
           
            if (senha.type === 'password') {
                senha.type = 'text';
                icone.classList.remove('bi-eye');
                icone.classList.add('bi-eye-slash');
            } else {
                senha.type = 'password';
                icone.classList.remove('bi-eye-slash');
                icone.classList.add('bi-eye');
            }
        });
    </script>

</body>